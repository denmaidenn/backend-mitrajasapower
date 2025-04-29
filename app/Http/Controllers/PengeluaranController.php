<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function index(Request $request)
    {
        $query = Pengeluaran::query();

        // Search functionality - akan langsung mencari saat mengetik
        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('detail_pengeluaran', 'like', "%{$searchTerm}%")
                  ->orWhere('bank_dompet', 'like', "%{$searchTerm}%")
                  ->orWhere('rekening_nomor', 'like', "%{$searchTerm}%")
                  ->orWhere('nominal_pengeluaran', 'like', "%{$searchTerm}%");
            });
        }

        // Date range filter - hanya untuk export
        if ($request->has('export_start_date') && $request->export_start_date) {
            $query->whereDate('created_at', '>=', $request->export_start_date);
        }
        if ($request->has('export_end_date') && $request->export_end_date) {
            $query->whereDate('created_at', '<=', $request->export_end_date);
        }

        $pengeluaran = $query->orderBy('created_at', 'desc')->get();
        return view('pengeluaran.pengeluaran', compact('pengeluaran'));
    }

    public function create()
    {
        return view('pengeluaran.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'nominal_pengeluaran' => 'required|numeric',
            'detail_pengeluaran' => 'required|string',
            'bank_dompet' => 'required|string',
            'rekening_nomor' => 'required|string'
        ]);

        Pengeluaran::create($validated);

        return redirect()->route('pengeluaran.index')
            ->with('success', 'Pengeluaran berhasil ditambahkan');
    }

    public function edit(Pengeluaran $pengeluaran)
    {
        return view('pengeluaran.edit', compact('pengeluaran'));
    }

    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'nominal_pengeluaran' => 'required|numeric',
            'detail_pengeluaran' => 'required|string',
            'bank_dompet' => 'required|string',
            'rekening_nomor' => 'required|string'
        ]);

        $pengeluaran->update($validated);

        return redirect()->route('pengeluaran.index')
            ->with('success', 'Pengeluaran berhasil diperbarui');
    }

    public function destroy(Pengeluaran $pengeluaran)
    {
        $pengeluaran->delete();

        return redirect()->route('pengeluaran.index')
            ->with('success', 'Pengeluaran berhasil dihapus');
    }
} 