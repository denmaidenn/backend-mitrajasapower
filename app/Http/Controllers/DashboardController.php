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

        // Ambil data pengiriman terbaru (5 teratas)
        $pengiriman = Pengiriman::latest()->take(5)->get();

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

        // Hitung persentase perubahan
        $lastMonthPemasukan = Pemasukan::whereMonth('tanggal', Carbon::now()->subMonth()->month)
            ->whereYear('tanggal', $year)
            ->sum('nominal_pemasukan');
        
        $lastMonthPengeluaran = Pengeluaran::whereMonth('tanggal', Carbon::now()->subMonth()->month)
            ->whereYear('tanggal', $year)
            ->sum('nominal_pengeluaran');
            
        $currentMonthPemasukan = Pemasukan::whereMonth('tanggal', Carbon::now()->month)
            ->whereYear('tanggal', $year)
            ->sum('nominal_pemasukan');
            
        $currentMonthPengeluaran = Pengeluaran::whereMonth('tanggal', Carbon::now()->month)
            ->whereYear('tanggal', $year)
            ->sum('nominal_pengeluaran');

        $pemasukanPercentage = $lastMonthPemasukan > 0 
            ? (($currentMonthPemasukan - $lastMonthPemasukan) / $lastMonthPemasukan) * 100 
            : 0;
            
        $pengeluaranPercentage = $lastMonthPengeluaran > 0 
            ? (($currentMonthPengeluaran - $lastMonthPengeluaran) / $lastMonthPengeluaran) * 100 
            : 0;

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
            'pengiriman'
        ));
    }
} 