<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        return view('website.gallery', compact('galleries'));
    }

    public function create()
    {
        return view('website.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/galleries', $imageName);

                Gallery::create([
                    'title' => $request->title,
                    'image' => 'galleries/' . $imageName
                ]);

                return redirect()->route('website.gallery')->with('success', 'Gallery berhasil ditambahkan');
            }
            
            return back()->with('error', 'Gagal mengunggah gambar');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('website.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);
        
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            if ($request->hasFile('image')) {
                // Hapus gambar lama
                if($gallery->image) {
                    Storage::delete('public/' . $gallery->image);
                }
                
                // Upload gambar baru
                $image = $request->file('image');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs('public/galleries', $imageName);
                
                $gallery->image = 'galleries/' . $imageName;
            }

            $gallery->title = $request->title;
            $gallery->save();

            return redirect()->route('website.gallery')->with('success', 'Gallery berhasil diupdate');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $gallery = Gallery::findOrFail($id);
            
            if($gallery->image) {
                Storage::delete('public/' . $gallery->image);
            }
            
            $gallery->delete();

            return redirect()->route('website.gallery')->with('success', 'Gallery berhasil dihapus');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
} 