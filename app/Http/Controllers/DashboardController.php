<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\Pengiriman;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Ambil tahun dari request atau gunakan tahun sekarang
        $year = $request->year ?? Carbon::now()->year;
        
        // Hitung total pemasukan untuk tahun yang dipilih
        $totalPemasukan = Pemasukan::whereYear('tanggal', $year)->sum('nominal_pemasukan');
        
        // Hitung total pengeluaran untuk tahun yang dipilih
        $totalPengeluaran = Pengeluaran::whereYear('tanggal', $year)->sum('nominal_pengeluaran');

        // Hitung total untuk tahun sebelumnya
        $totalPemasukanTahunSebelumnya = Pemasukan::whereYear('tanggal', $year - 1)->sum('nominal_pemasukan');
        $totalPengeluaranTahunSebelumnya = Pengeluaran::whereYear('tanggal', $year - 1)->sum('nominal_pengeluaran');

        // Hitung persentase perubahan year-over-year
        $pemasukanPercentage = $totalPemasukanTahunSebelumnya > 0 
            ? (($totalPemasukan - $totalPemasukanTahunSebelumnya) / $totalPemasukanTahunSebelumnya) * 100 
            : 0;
            
        $pengeluaranPercentage = $totalPengeluaranTahunSebelumnya > 0 
            ? (($totalPengeluaran - $totalPengeluaranTahunSebelumnya) / $totalPengeluaranTahunSebelumnya) * 100 
            : 0;

        // Ambil data pengiriman terbaru (5 teratas)
        $pengiriman = Pengiriman::orderBy('tanggal', 'desc')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Data untuk grafik
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];
        $chartData = [];
        
        foreach ($months as $index => $month) {
            $monthNumber = $index + 1;
            
            // Data pemasukan per bulan
            $pemasukan = Pemasukan::whereMonth('tanggal', $monthNumber)
                ->whereYear('tanggal', $year)
                ->sum('nominal_pemasukan');
                
            // Data pengeluaran per bulan
            $pengeluaran = Pengeluaran::whereMonth('tanggal', $monthNumber)
                ->whereYear('tanggal', $year)
                ->sum('nominal_pengeluaran');
                
            $chartData[] = [
                'month' => $month,
                'pemasukan' => $pemasukan,
                'pengeluaran' => $pengeluaran
            ];
        }

        // Generate range tahun (5 tahun ke belakang dan 5 tahun ke depan dari tahun sekarang)
        $currentYear = Carbon::now()->year;
        $years = range($currentYear - 5, $currentYear + 5);

        return view('dashboard', compact(
            'totalPemasukan',
            'totalPengeluaran',
            'chartData',
            'pemasukanPercentage',
            'pengeluaranPercentage',
            'years',
            'year',
            'pengiriman',
            'totalPemasukanTahunSebelumnya',
            'totalPengeluaranTahunSebelumnya'
        ));
    }
} 