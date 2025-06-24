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

        // Tambahkan validasi tambahan untuk mahasiswa
        if ($request->role === 'mahasiswa') {
            $baseRules['kd_prodi']    = ['required', 'exists:prodis,kd_prodi'];
            $baseRules['tahun_masuk'] = ['required', 'digits:2'];
        }

        $validated = $request->validate($baseRules);

        $nim = null;

        if ($request->role === 'mahasiswa') {
            // Generate NIM = tahun + kd_prodi + urutan
            $tahun    = $request->tahun_masuk; // e.g. 25
            $kdProdi  = str_pad($request->kd_prodi, 3, '0', STR_PAD_LEFT); // e.g. 110
            $count    = User::where('kd_prodi', $request->kd_prodi)->whereNotNull('nim')->count() + 1;
            $urutan   = str_pad($count, 3, '0', STR_PAD_LEFT); // e.g. 153
            $nim      = $tahun . $kdProdi . $urutan; // 25110153
        }

        $user = User::create([
            'nama'     => $request->nama,
            'email'    => $request->email,
            'role'     => $request->role,
            'kd_prodi' => $request->role === 'mahasiswa' ? $request->kd_prodi : null,
            'nim'      => $nim,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return redirect()->route('dashboard')->with('success', 'User berhasil ditambahkan.');
    }
}
