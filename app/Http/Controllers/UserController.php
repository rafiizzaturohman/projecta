<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('prodi')->paginate(10);
        return view('users.index', compact('users'));
    }

    public function search(Request $request)
    {
        $keyword = $request->get('query');

        $users = User::with('prodi')
            ->where('nama', 'like', "%{$keyword}%")
            ->orWhere('email', 'like', "%{$keyword}%")
            ->orWhere('role', 'like', "%{$keyword}%")
            ->get();

        return response()->json([
        'html' => view('users.partials.table-body', compact('users'))->render(),
    ]);
    }

    public function create()
    {
        $prodis = Prodi::all();
        return view('users.create', compact('prodis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
            'role' => ['required', Rule::in(['admin', 'dosen', 'mahasiswa'])],
            'nim' => ['nullable', 'string', 'unique:users'],
            'nidn' => ['nullable', 'string', 'unique:users'],
            'nip' => ['nullable', 'string'],
            'kd_prodi' => ['nullable', 'exists:prodis,kd_prodi'],
        ]);

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role, // jangan ditimpa
            'nim' => $request->role === 'mahasiswa' ? $request->nim : null,
            'nidn' => $request->role === 'dosen' ? $request->nidn : null,
            'nip' => $request->nip,
            'kd_prodi' => $request->role === 'mahasiswa' ? $request->kd_prodi : null,
        ]);


        return redirect()->route('userManagement.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit(User $user, $id)
    {
        $user = $user::findOrFail($id);
        $prodis = Prodi::all();
        return view('users.edit', compact('user', 'prodis'));
    }

    public function update(Request $request, User $user, $id)
    {

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($id)],
            'role' => ['required', Rule::in(['admin', 'dosen', 'mahasiswa'])],
            'nim' => ['nullable', 'string', Rule::unique('users')->ignore($id)],
            'nidn' => ['nullable', 'string', Rule::unique('users')->ignore($id)],
            'nip' => ['nullable', 'string'],
            'kd_prodi' => ['nullable', 'exists:prodis,kd_prodi'],
        ]);

        $findUser = $user::findOrFail($id);

        // Sesuaikan berdasarkan role
        if ($validated['role'] !== 'mahasiswa') {
            $validated['nim'] = null;
            $validated['kd_prodi'] = null;
        }

        if ($validated['role'] !== 'dosen') {
            $validated['nidn'] = null;
        }

        $findUser->update($validated);

        return redirect()->route('userManagement.index')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $deleteUser = User::findOrFail($id);

        $deleteUser->delete();

        return redirect()->route('userManagement.index')->with('success', 'User berhasil dihapus.');
    }
}
