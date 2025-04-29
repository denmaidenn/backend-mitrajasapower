<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    public function index(Request $request)
    {
        $query = Pemasukan::query();

        // Search functionality - akan langsung mencari saat mengetik
        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('detail_pemasukan', 'like', "%{$searchTerm}%")
                  ->orWhere('bank_dompet', 'like', "%{$searchTerm}%")
                  ->orWhere('rekening_nomor', 'like', "%{$searchTerm}%")
                  ->orWhere('nominal_pemasukan', 'like', "%{$searchTerm}%");
            });
        }

        // Date range filter - hanya untuk export
        if ($request->has('export_start_date') && $request->export_start_date) {
            $query->whereDate('created_at', '>=', $request->export_start_date);
        }
        if ($request->has('export_end_date') && $request->export_end_date) {
            $query->whereDate('created_at', '<=', $request->export_end_date);
        }

        $pemasukan = $query->orderBy('created_at', 'desc')->get();
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