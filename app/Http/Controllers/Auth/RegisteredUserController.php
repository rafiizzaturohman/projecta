<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Tampilkan form registrasi
     */
    public function create(): View
    {
        $prodis = Prodi::all();
        return view('auth.register', compact('prodis'));
    }

    /**
     * Simpan data registrasi user baru
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi dasar
        $baseRules = [
            'nama'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'email', 'max:255', 'unique:users,email'],
            'role'     => ['required', 'in:mahasiswa,dosen,admin'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];

        // Tambahkan validasi untuk mahasiswa
        if ($request->role === 'mahasiswa') {
            $baseRules['nim']      = ['required', 'string', 'unique:users,nim'];
            $baseRules['kd_prodi'] = ['required', 'exists:prodis,kd_prodi'];
        }

        $validated = $request->validate($baseRules);

        $user = User::create([
            'nama'     => $request->nama,
            'email'    => $request->email,
            'role'     => $request->role,
            'kd_prodi' => $request->role === 'mahasiswa' ? $request->kd_prodi : null,
            'nim'      => $request->role === 'mahasiswa' ? $request->nim : null,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return redirect()->route('dashboard')->with('success', 'User berhasil ditambahkan.');
    }
}
