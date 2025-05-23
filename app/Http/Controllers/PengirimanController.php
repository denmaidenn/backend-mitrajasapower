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

        // Filter tahun
        if ($request->has('year') && $request->year != '') {
            $query->whereYear('created_at', $request->year);
        }

        // Date range filter - hanya untuk export
        if ($request->has('export_start_date') && $request->export_start_date) {
            $query->whereDate('created_at', '>=', $request->export_start_date);
        }
        if ($request->has('export_end_date') && $request->export_end_date) {
            $query->whereDate('created_at', '<=', $request->export_end_date);
        }

        $pengiriman = $query->orderBy('created_at', 'desc')->get();
        
        // Generate range tahun (5 tahun ke belakang dan 5 tahun ke depan dari tahun sekarang)
        $currentYear = now()->year;
        $years = range($currentYear - 5, $currentYear + 5);
        
        return view('pengiriman.pengiriman', compact('pengiriman', 'years'));
    }

    public function create()
    {
        return view('pengiriman.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal' => 'required|date',
            'nomor_resi' => 'required|string|max:255',
            'dari' => 'required|string|max:255',
            'ke' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'jenis_barang' => 'required|string|max:255',
            'tipe_pengiriman' => 'required|string|max:255',
            'status' => 'required|string|max:255'
        ]);

        try {
            Pengiriman::create($validatedData);
            return redirect()->route('pengiriman.index')->with('success', 'Pengiriman berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan pengiriman: ' . $e->getMessage())->withInput();
        }
    }

    public function edit(Pengiriman $pengiriman)
    {
        return view('pengiriman.edit', compact('pengiriman'));
    }

    public function update(Request $request, Pengiriman $pengiriman)
    {
        try {
            $validatedData = $request->validate([
                'tanggal' => 'required|date',
                'nomor_resi' => 'required|string|max:255|unique:pengiriman,nomor_resi,' . $pengiriman->id,
                'dari' => 'required|string|max:255',
                'ke' => 'required|string|max:255',
                'latitude' => 'required|numeric|between:-90,90',
                'longitude' => 'required|numeric|between:-180,180',
                'jenis_barang' => 'required|string|max:255',
                'tipe_pengiriman' => 'required|string|max:255',
                'status' => 'required|in:Pending,Approved,Complete,Rejected,In Progress'
            ]);

            $pengiriman->update($validatedData);
            
            return redirect()
                ->route('pengiriman.index')
                ->with('success', 'Pengiriman berhasil diperbarui');
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()
                ->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Gagal memperbarui pengiriman: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function destroy(Pengiriman $pengiriman)
    {
        $pengiriman->delete();
        return redirect()->route('pengiriman.index')->with('success', 'Pengiriman berhasil dihapus');
    }
}
