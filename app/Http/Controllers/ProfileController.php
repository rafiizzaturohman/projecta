<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Prodi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
            'prodis' => Prodi::all(), // kirim data prodi jika perlu dropdown
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        $data = $request->validated();

        // Cek jika email berubah → reset verifikasi
        if ($data['email'] !== $user->email) {
            $user->email_verified_at = null;
        }

        $user->fill([
            'nama' => $data['nama'],
            'email' => $data['email'],
            'nim' => $data['nim'] ?? null,
            'nidn' => $data['nidn'] ?? null,
            'nip' => $data['nip'] ?? null,
            'kd_prodi' => $data['kd_prodi'] ?? null,
            'role' => $data['role'], // pastikan sudah tervalidasi
        ]);

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
