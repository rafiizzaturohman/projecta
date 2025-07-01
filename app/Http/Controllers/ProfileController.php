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
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
            'prodis' => Prodi::all(),
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $data = $request->validated();

        if ($data['email'] !== $user->email) {
            $user->email_verified_at = null;
        }

        $user->fill([
            'nama' => $data['nama'],
            'email' => $data['email'],
            'role' => $data['role'],
        ]);

        if ($data['role'] === 'mahasiswa') {
            $user->nim = $data['nim'] ?? null;
            $user->kd_prodi = $data['kd_prodi'] ?? null;
            $user->nidn = null;
            $user->nip = null;
        } elseif ($data['role'] === 'dosen') {
            $user->nidn = $data['nidn'] ?? null;
            $user->nip = $data['nip'] ?? null;
            $user->nim = null;
            $user->kd_prodi = null;
        } elseif ($data['role'] === 'admin') {
            $user->nip = $data['nip'] ?? null;
            $user->nim = null;
            $user->kd_prodi = null;
            $user->nidn = null;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

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
