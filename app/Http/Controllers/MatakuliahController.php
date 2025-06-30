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
        return  view('matakuliah.index', compact('matakuliahs'));
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
        return redirect('matakuliah');
    }

    // Menampilkan detail satu matakuliah
    public function create()
    {
        return view('matakuliah.create');
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
        return redirect('matakuliah');
    }

    // Menghapus matakuliah
    public function destroy($id)
    {
        $matakuliah = Matakuliah::findOrFail($id);
        $matakuliah->delete();
        return redirect('matakuliah')->with('success', 'Matakuliah deleted successfully');
    }
}
