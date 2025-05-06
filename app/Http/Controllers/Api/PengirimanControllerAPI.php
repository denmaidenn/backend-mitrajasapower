<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pengiriman;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PengirimanControllerAPI extends Controller
{
    public function index(Request $request)
    {
        $query = Pengiriman::query();

        // Search
        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
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

        // Date range
        if ($request->has('export_start_date')) {
            $query->whereDate('created_at', '>=', $request->export_start_date);
        }
        if ($request->has('export_end_date')) {
            $query->whereDate('created_at', '<=', $request->export_end_date);
        }

        $pengiriman = $query->orderBy('created_at', 'desc')->get();

        return response()->json([
            'success' => true,
            'data' => $pengiriman
        ]);
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
            $pengiriman = Pengiriman::create($validatedData);
            return response()->json(['success' => true, 'data' => $pengiriman], 201);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function show(Pengiriman $pengiriman)
    {
        return response()->json([
            'success' => true,
            'data' => $pengiriman
        ]);
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

            return response()->json(['success' => true, 'data' => $pengiriman]);
        } catch (ValidationException $e) {
            return response()->json(['success' => false, 'errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function destroy(Pengiriman $pengiriman)
    {
        try {
            $pengiriman->delete();
            return response()->json(['success' => true, 'message' => 'Pengiriman berhasil dihapus']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
}
