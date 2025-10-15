<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MahasiswaController extends Controller
{
    /**
     * Logika dari: data_mahasiswa.php
     */
    public function index()
    {
        return response()->json(['data' => Mahasiswa::all()]);
    }

    /**
     * Logika dari: tambah_mahasiswa.php
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => 'required|string|max:15|unique:mahasiswa,nim',
            'nama' => 'required|string|max:100',
            'jurusan' => 'required|string|max:50',
            'email' => 'nullable|email',
        ]);

        $mahasiswa = Mahasiswa::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Data mahasiswa berhasil ditambahkan.',
            'data' => $mahasiswa
        ], 201);
    }

    /**
     * Menampilkan satu data (tambahan untuk best practice)
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return response()->json(['data' => $mahasiswa]);
    }

    /**
     * Logika dari: edit_mahasiswa.php
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validated = $request->validate([
            'nim' => ['required', 'string', 'max:15', Rule::unique('mahasiswa')->ignore($mahasiswa->id)],
            'nama' => 'required|string|max:100',
            'jurusan' => 'required|string|max:50',
            'email' => 'nullable|email',
        ]);

        $mahasiswa->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Data mahasiswa berhasil diperbarui.',
            'data' => $mahasiswa
        ]);
    }

    /**
     * Logika dari: hapus_mahasiswa.php
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return response()->json(['status' => 'success', 'message' => 'Data mahasiswa berhasil dihapus.']);
    }
}