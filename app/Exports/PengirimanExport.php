<?php

namespace App\Exports;

use App\Models\Pengiriman;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PengirimanExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    public function collection()
    {
        return Pengiriman::all();
    }

    public function headings(): array
    {
        return [
            'Nomor Resi',
            'Dari',
            'Ke',
            'Jenis Barang',
            'Tipe Pengiriman',
            'Status'
        ];
    }

    public function map($pengiriman): array
    {
        return [
            $pengiriman->nomor_resi,
            $pengiriman->dari,
            $pengiriman->ke,
            $pengiriman->jenis_barang,
            $pengiriman->tipe_pengiriman,
            $pengiriman->status
        ];
    }
} 