<?php

namespace App\Exports;

use App\Models\Pemasukan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PemasukanExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    public function collection()
    {
        return Pemasukan::all();
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Nominal Pemasukan',
            'Detail Pemasukan',
            'Bank/Dompet',
            'Rekening/Nomor'
        ];
    }

    public function map($pemasukan): array
    {
        return [
            $pemasukan->tanggal->format('d/m/Y'),
            'Rp' . number_format($pemasukan->nominal_pemasukan, 0, ',', '.'),
            $pemasukan->detail_pemasukan,
            $pemasukan->bank_dompet,
            $pemasukan->rekening_nomor
        ];
    }
} 