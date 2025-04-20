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
        $request->validate([
            'nomor_resi' => 'required|unique:pengiriman',
            'dari' => 'required',
            'ke' => 'required',
            'jenis_barang' => 'required',
            'tipe_pengiriman' => 'required',
            'status' => 'required|in:Approved,Pending,Complete,Rejected,In Progress'
        ]);

        Pengiriman::create($request->all());
        return redirect()->route('pengiriman.index')->with('success', 'Pengiriman berhasil ditambahkan');
    }

    public function edit(Pengiriman $pengiriman)
    {
        return view('pengiriman.edit', compact('pengiriman'));
    }

    public function update(Request $request, Pengiriman $pengiriman)
    {
        $request->validate([
            'nomor_resi' => 'required|unique:pengiriman,nomor_resi,'.$pengiriman->id,
            'dari' => 'required',
            'ke' => 'required',
            'jenis_barang' => 'required',
            'tipe_pengiriman' => 'required',
            'status' => 'required|in:Approved,Pending,Complete,Rejected,In Progress'
        ]);

        $pengiriman->update($request->all());
        return redirect()->route('pengiriman.index')->with('success', 'Pengiriman berhasil diperbarui');
    }

    public function destroy(Pengiriman $pengiriman)
    {
        $pengiriman->delete();
        return redirect()->route('pengiriman.index')->with('success', 'Pengiriman berhasil dihapus');
    }
} 