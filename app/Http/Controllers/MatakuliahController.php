<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    // Menampilkan semua matakuliah
    public function index()
    {
        $matakuliahs = Matakuliah::with('dosen')->get();
        return response()->json($matakuliahs);
    }

    // Menyimpan matakuliah baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kd_matakuliah' => 'required|string|unique:matakuliahs,kd_matakuliah',
            'nama' => 'required|string',
            'semester' => 'required|integer',
            'sks' => 'required|integer',
            'dosen_nidn' => 'nullable|exists:users,nidn',
        ]);

        $matakuliah = Matakuliah::create($validated);
        return response()->json($matakuliah, 201);
    }

    // Menampilkan detail satu matakuliah
    public function show($id)
    {
        $matakuliah = Matakuliah::with('dosen')->findOrFail($id);
        return response()->json($matakuliah);
    }

    // Memperbarui matakuliah
    public function update(Request $request, $id)
    {
        $matakuliah = Matakuliah::findOrFail($id);

        $validated = $request->validate([
            'kd_matakuliah' => 'sometimes|required|string|unique:matakuliahs,kd_matakuliah,' . $id,
            'nama' => 'sometimes|required|string',
            'semester' => 'sometimes|required|integer',
            'sks' => 'sometimes|required|integer',
            'dosen_nidn' => 'nullable|exists:users,nidn',
        ]);

        $matakuliah->update($validated);
        return response()->json($matakuliah);
    }

    // Menghapus matakuliah
    public function destroy($id)
    {
        $matakuliah = Matakuliah::findOrFail($id);
        $matakuliah->delete();

        return response()->json(['message' => 'Matakuliah berhasil dihapus']);
    }
}
