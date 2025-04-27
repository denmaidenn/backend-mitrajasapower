<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialControllerAPI extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        return response()->json($testimonials);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'asal' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'testimoni' => 'required|string'
        ]);

        $testimonial = Testimonial::create($validated);

        return response()->json([
            'message' => 'Testimonial berhasil ditambahkan',
            'data' => $testimonial
        ], 201);
    }

    public function show(Testimonial $testimonial)
    {
        return response()->json($testimonial);
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'asal' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'testimoni' => 'required|string'
        ]);

        $testimonial->update($validated);

        return response()->json([
            'message' => 'Testimonial berhasil diperbarui',
            'data' => $testimonial
        ]);
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return response()->json([
            'message' => 'Testimonial berhasil dihapus'
        ]);
    }
}
