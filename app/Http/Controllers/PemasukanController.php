<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    public function index()
    {
        $pemasukan = Pemasukan::all();
        return view('pemasukan.pemasukan', compact('pemasukan'));
    }

    public function create()
    {
        return view('pemasukan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'nominal_pemasukan' => 'required|numeric',
            'detail_pemasukan' => 'required|string',
            'bank_dompet' => 'required|string',
            'rekening_nomor' => 'required|string'
        ]);

        Pemasukan::create($request->all());

        return redirect()->route('pemasukan.index')
            ->with('success', 'Pemasukan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pemasukan = Pemasukan::findOrFail($id);
        return view('pemasukan.edit', compact('pemasukan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'nominal_pemasukan' => 'required|numeric',
            'detail_pemasukan' => 'required|string',
            'bank_dompet' => 'required|string',
            'rekening_nomor' => 'required|string'
        ]);

        $pemasukan = Pemasukan::findOrFail($id);
        $pemasukan->update($request->all());

        return redirect()->route('pemasukan.index')
            ->with('success', 'Pemasukan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pemasukan = Pemasukan::findOrFail($id);
        $pemasukan->delete();

        return redirect()->route('pemasukan.index')
            ->with('success', 'Pemasukan berhasil dihapus.');
    }
} 