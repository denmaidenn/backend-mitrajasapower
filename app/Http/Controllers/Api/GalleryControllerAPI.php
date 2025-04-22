<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryControllerAPI extends Controller
{
    public function index()
    {
        try {
            $galleries = Gallery::all();
            return response()->json($galleries);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('galleries', 'public');

                $gallery = Gallery::create([
                    'title' => $request->title,
                    'image' => $imagePath
                ]);

                return response()->json([
                    'message' => 'Gallery berhasil ditambahkan',
                    'data' => $gallery
                ], 201);
            }

            return response()->json(['error' => 'Gagal mengunggah gambar'], 400);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $gallery = Gallery::findOrFail($id);
            return response()->json($gallery);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            $gallery = Gallery::findOrFail($id);

            $gallery->title = $request->title;

            if ($request->hasFile('image')) {
                // Hapus gambar lama
                if ($gallery->image) {
                    Storage::disk('public')->delete($gallery->image);
                }

                // Upload gambar baru
                $imagePath = $request->file('image')->store('galleries', 'public');
                $gallery->image = $imagePath;
            }

            $gallery->save();

            return response()->json([
                'message' => 'Gallery berhasil diupdate',
                'data' => $gallery
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $gallery = Gallery::findOrFail($id);

            if ($gallery->image) {
                Storage::disk('public')->delete($gallery->image);
            }

            $gallery->delete();

            return response()->json(['message' => 'Gallery berhasil dihapus']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }
}
