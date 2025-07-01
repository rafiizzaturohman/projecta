<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    // Tampilkan semua prodi
    public function index()
    {
        $prodis = Prodi::all();
        return view ('prodi.index', compact('prodis'));
    }

    // Simpan prodi baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kd_prodi' => 'required|unique:prodis,kd_prodi',
            'nama' => 'required|string|max:255',
        ]);

        $prodi = Prodi::create($validated);
        return redirect()->route('prodi.index')->with('success', 'Prodi created successfully');
    }

    // Tampilkan detail satu prodi
    public function create()
    {
        return view('prodi.create');
    }

    // Update data prodi
    public function update(Request $request, $id)
    {
        $prodi = Prodi::findOrFail($id);

        $validated = $request->validate([
            'kd_prodi' => 'sometimes|required|unique:prodis,kd_prodi,' . $id,
            'nama' => 'sometimes|required|string|max:255',
        ]);

        $prodi->update($validated);
        return redirect()->route('prodi.index')->with('success', 'Prodi updated successfully');
    }

    // Soft delete prodi
    public function destroy($id)
    {
        $prodi = Prodi::findOrFail($id);
        $prodi->delete();
        return redirect()->route('prodi.index')->with('success', 'Prodi deleted successfully');
    }
}
