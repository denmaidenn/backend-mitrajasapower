<?php

namespace App\Http\Controllers;

use App\Models\Pengiriman;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    public function index(Request $request)
    {
        $query = Pengiriman::query();

        // Search functionality - akan langsung mencari saat mengetik
        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('nomor_resi', 'like', "%{$searchTerm}%")
                  ->orWhere('dari', 'like', "%{$searchTerm}%")
                  ->orWhere('ke', 'like', "%{$searchTerm}%")
                  ->orWhere('jenis_barang', 'like', "%{$searchTerm}%")
                  ->orWhere('tipe_pengiriman', 'like', "%{$searchTerm}%")
                  ->orWhere('status', 'like', "%{$searchTerm}%");
            });
        }

        // Date range filter - hanya untuk export
        if ($request->has('export_start_date') && $request->export_start_date) {
            $query->whereDate('created_at', '>=', $request->export_start_date);
        }
        if ($request->has('export_end_date') && $request->export_end_date) {
            $query->whereDate('created_at', '<=', $request->export_end_date);
        }

        $pengiriman = $query->orderBy('created_at', 'desc')->get();
        return view('pengiriman.pengiriman', compact('pengiriman'));
    }

    public function create()
    {
        return view('pengiriman.create');
    }

    public function store(Request $request)
    {
        try {
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

            \Log::info('Validasi berhasil, mencoba menyimpan data:', $validatedData);

            $pengiriman = Pengiriman::create($validatedData);
            
            \Log::info('Data berhasil disimpan:', ['id' => $pengiriman->id]);
            
            return redirect()->route('pengiriman.index')->with('success', 'Pengiriman berhasil ditambahkan');
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Validasi gagal:', ['errors' => $e->errors()]);
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            \Log::error('Error saat menyimpan pengiriman:', ['error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Gagal menambahkan pengiriman: ' . $e->getMessage())->withInput();
        }
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
