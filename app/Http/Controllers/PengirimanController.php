<?php

namespace App\Http\Controllers;

use App\Models\Pengiriman;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    public function index()
    {
        $pengiriman = Pengiriman::all();
        return view('pengiriman.pengiriman', compact('pengiriman'));
    }

    public function create()
    {
        return view('pengiriman.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomor_resi' => 'required|unique:pengiriman',
            'dari' => 'required',
            'ke' => 'required',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'jenis_barang' => 'required',
            'tipe_pengiriman' => 'required',
            'status' => 'required|in:Approved,Pending,Complete,Rejected,In Progress'
        ]);

        Pengiriman::create($validatedData);

        return redirect()->route('pengiriman.index')->with('success', 'Pengiriman berhasil ditambahkan');
    }

    public function edit(Pengiriman $pengiriman)
    {
        return view('pengiriman.edit', compact('pengiriman'));
    }

    public function update(Request $request, Pengiriman $pengiriman)
    {
        $validatedData = $request->validate([
            'nomor_resi' => 'required|unique:pengiriman,nomor_resi,' . $pengiriman->id,
            'dari' => 'required',
            'ke' => 'required',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'jenis_barang' => 'required',
            'tipe_pengiriman' => 'required',
            'status' => 'required|in:Approved,Pending,Complete,Rejected,In Progress'
        ]);

        $pengiriman->update($validatedData);

        return redirect()->route('pengiriman.index')->with('success', 'Pengiriman berhasil diperbarui');
    }

    public function destroy(Pengiriman $pengiriman)
    {
        $pengiriman->delete();
        return redirect()->route('pengiriman.index')->with('success', 'Pengiriman berhasil dihapus');
    }
}
