<?php

namespace App\Http\Controllers;

use App\Models\PusatBantuan;
use Illuminate\Http\Request;

class PusatBantuanController extends Controller
{
    public function index()
    {
        try {
            $pusatBantuan = PusatBantuan::all();
            return view('website.pusatbantuan', ['pusatBantuan' => $pusatBantuan]);
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function create()
    {
        return view('website.pusatbantuan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pertanyaan' => 'required',
            'jawaban' => 'required',
            'kategori' => 'required'
        ]);

        try {
            PusatBantuan::create([
                'pertanyaan' => $request->pertanyaan,
                'jawaban' => $request->jawaban,
                'kategori' => $request->kategori
            ]);

            return redirect()->route('website.pusatbantuan')->with('success', 'FAQ berhasil ditambahkan');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $pusatBantuan = PusatBantuan::findOrFail($id);
        return view('website.pusatbantuan.edit', compact('pusatBantuan'));
    }

    public function update(Request $request, $id)
    {
        $pusatBantuan = PusatBantuan::findOrFail($id);
        
        $request->validate([
            'pertanyaan' => 'required',
            'jawaban' => 'required',
            'kategori' => 'required'
        ]);

        try {
            $pusatBantuan->update([
                'pertanyaan' => $request->pertanyaan,
                'jawaban' => $request->jawaban,
                'kategori' => $request->kategori
            ]);

            return redirect()->route('website.pusatbantuan')->with('success', 'FAQ berhasil diupdate');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $pusatBantuan = PusatBantuan::findOrFail($id);
            $pusatBantuan->delete();

            return redirect()->route('website.pusatbantuan')->with('success', 'FAQ berhasil dihapus');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
} 