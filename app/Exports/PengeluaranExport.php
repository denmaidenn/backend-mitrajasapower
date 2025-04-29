<?php

namespace App\Exports;

use App\Models\Pengeluaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PengeluaranExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    public function collection()
    {
        return Pengeluaran::all();
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Nominal Pengeluaran',
            'Detail Pengeluaran',
            'Bank/Dompet',
            'Rekening/Nomor'
        ];
    }

    public function map($pengeluaran): array
    {
        return [
            $pengeluaran->tanggal->format('d/m/Y'),
            'Rp' . number_format($pengeluaran->nominal_pengeluaran, 0, ',', '.'),
            $pengeluaran->detail_pengeluaran,
            $pengeluaran->bank_dompet,
            $pengeluaran->rekening_nomor
        ];
    }
} 