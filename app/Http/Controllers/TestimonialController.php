<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('website.testimonial', compact('testimonials'));
    }

    public function create()
    {
        return view('website.testimonial.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'asal' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'testimoni' => 'required|string'
        ]);

        Testimonial::create($request->all());

        return redirect()->route('website.testimonial')
            ->with('success', 'Testimonial berhasil ditambahkan');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('website.testimonial.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'asal' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'testimoni' => 'required|string'
        ]);

        $testimonial->update($request->all());

        return redirect()->route('website.testimonial')
            ->with('success', 'Testimonial berhasil diperbarui');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect()->route('website.testimonial')
            ->with('success', 'Testimonial berhasil dihapus');
    }
} 