<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('website.layanan', compact('services'));
    }

    public function create()
    {
        return view('website.services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120'
        ]);

        $imagePath = $request->file('image')->store('services', 'public');

        Service::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath
        ]);

        return redirect()->route('website.layanan')->with('success', 'Layanan berhasil ditambahkan');
    }

    public function edit(Service $service)
    {
        return view('website.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120'
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            Storage::disk('public')->delete($service->image);
            
            // Simpan gambar baru
            $imagePath = $request->file('image')->store('services', 'public');
            $service->image = $imagePath;
        }

        $service->title = $request->title;
        $service->description = $request->description;
        $service->save();

        return redirect()->route('website.layanan')->with('success', 'Layanan berhasil diperbarui');
    }

    public function destroy(Service $service)
    {
        Storage::disk('public')->delete($service->image);
        $service->delete();

        return redirect()->route('website.layanan')->with('success', 'Layanan berhasil dihapus');
    }
} 