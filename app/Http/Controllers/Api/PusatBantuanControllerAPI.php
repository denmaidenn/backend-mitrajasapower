<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PusatBantuan;
use Illuminate\Http\Request;

class PusatBantuanControllerAPI extends Controller
{
    public function index()
    {
        try {
            $data = PusatBantuan::all();
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'pertanyaan' => 'required',
            'jawaban' => 'required',
            'kategori' => 'required'
        ]);

        try {
            $data = PusatBantuan::create([
                'pertanyaan' => $request->pertanyaan,
                'jawaban' => $request->jawaban,
                'kategori' => $request->kategori
            ]);

            return response()->json([
                'message' => 'FAQ berhasil ditambahkan',
                'data' => $data
            ], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $data = PusatBantuan::findOrFail($id);
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pertanyaan' => 'required',
            'jawaban' => 'required',
            'kategori' => 'required'
        ]);

        try {
            $data = PusatBantuan::findOrFail($id);
            $data->update([
                'pertanyaan' => $request->pertanyaan,
                'jawaban' => $request->jawaban,
                'kategori' => $request->kategori
            ]);

            return response()->json([
                'message' => 'FAQ berhasil diupdate',
                'data' => $data
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $data = PusatBantuan::findOrFail($id);
            $data->delete();

            return response()->json(['message' => 'FAQ berhasil dihapus']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }
}
