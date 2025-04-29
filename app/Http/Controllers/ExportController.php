<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\Pengiriman;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PDF;

class ExportController extends Controller
{
    public function export($type, $format)
    {
        try {
            switch($type) {
                case 'pemasukan':
                    $query = Pemasukan::query();
                    break;
                case 'pengeluaran':
                    $query = Pengeluaran::query();
                    break;
                case 'pengiriman':
                    $query = Pengiriman::query();
                    break;
                default:
                    return redirect()->back()->with('error', 'Tipe export tidak valid');
            }

            // Apply date range filter for export
            if (request()->has('export_start_date') && request('export_start_date')) {
                $query->whereDate('tanggal', '>=', request('export_start_date'));
            }
            if (request()->has('export_end_date') && request('export_end_date')) {
                $query->whereDate('tanggal', '<=', request('export_end_date'));
            }

            // Apply filters from request
            if ($search = request('search')) {
                $query->where(function($q) use ($search) {
                    if ($type === 'pemasukan') {
                        $q->where('detail_pemasukan', 'like', "%{$search}%")
                          ->orWhere('bank_dompet', 'like', "%{$search}%")
                          ->orWhere('rekening_nomor', 'like', "%{$search}%");
                    } elseif ($type === 'pengeluaran') {
                        $q->where('detail_pengeluaran', 'like', "%{$search}%")
                          ->orWhere('bank_dompet', 'like', "%{$search}%")
                          ->orWhere('rekening_nomor', 'like', "%{$search}%");
                    } else {
                        $q->where('nomor_resi', 'like', "%{$search}%")
                          ->orWhere('dari', 'like', "%{$search}%")
                          ->orWhere('ke', 'like', "%{$search}%");
                    }
                });
            }

            if ($format === 'excel') {
                $spreadsheet = new Spreadsheet();
                $sheet = $spreadsheet->getActiveSheet();
                
                switch($type) {
                    case 'pemasukan':
                        // Set headers
                        $sheet->setCellValue('A1', 'Tanggal');
                        $sheet->setCellValue('B1', 'Nominal Pemasukan');
                        $sheet->setCellValue('C1', 'Detail Pemasukan');
                        $sheet->setCellValue('D1', 'Bank/Dompet');
                        $sheet->setCellValue('E1', 'Rekening/Nomor');
                        
                        // Set data
                        $row = 2;
                        foreach($query->get() as $item) {
                            $sheet->setCellValue('A' . $row, $item->tanggal->format('d/m/Y'));
                            $sheet->setCellValue('B' . $row, 'Rp' . number_format($item->nominal_pemasukan, 0, ',', '.'));
                            $sheet->setCellValue('C' . $row, $item->detail_pemasukan);
                            $sheet->setCellValue('D' . $row, $item->bank_dompet);
                            $sheet->setCellValue('E' . $row, $item->rekening_nomor);
                            $row++;
                        }
                        
                        // Auto size columns
                        foreach(range('A','E') as $column) {
                            $sheet->getColumnDimension($column)->setAutoSize(true);
                        }
                        break;
                        
                    case 'pengeluaran':
                        // Set headers
                        $sheet->setCellValue('A1', 'Tanggal');
                        $sheet->setCellValue('B1', 'Nominal Pengeluaran');
                        $sheet->setCellValue('C1', 'Detail Pengeluaran');
                        $sheet->setCellValue('D1', 'Bank/Dompet');
                        $sheet->setCellValue('E1', 'Rekening/Nomor');
                        
                        // Set data
                        $row = 2;
                        foreach($query->get() as $item) {
                            $sheet->setCellValue('A' . $row, $item->tanggal->format('d/m/Y'));
                            $sheet->setCellValue('B' . $row, 'Rp' . number_format($item->nominal_pengeluaran, 0, ',', '.'));
                            $sheet->setCellValue('C' . $row, $item->detail_pengeluaran);
                            $sheet->setCellValue('D' . $row, $item->bank_dompet);
                            $sheet->setCellValue('E' . $row, $item->rekening_nomor);
                            $row++;
                        }
                        
                        // Auto size columns
                        foreach(range('A','E') as $column) {
                            $sheet->getColumnDimension($column)->setAutoSize(true);
                        }
                        break;
                        
                    case 'pengiriman':
                        // Set headers
                        $sheet->setCellValue('A1', 'Nomor Resi');
                        $sheet->setCellValue('B1', 'Dari');
                        $sheet->setCellValue('C1', 'Ke');
                        $sheet->setCellValue('D1', 'Jenis Barang');
                        $sheet->setCellValue('E1', 'Tipe Pengiriman');
                        $sheet->setCellValue('F1', 'Status');
                        
                        // Set data
                        $row = 2;
                        foreach($query->get() as $item) {
                            $sheet->setCellValue('A' . $row, $item->nomor_resi);
                            $sheet->setCellValue('B' . $row, $item->dari);
                            $sheet->setCellValue('C' . $row, $item->ke);
                            $sheet->setCellValue('D' . $row, $item->jenis_barang);
                            $sheet->setCellValue('E' . $row, $item->tipe_pengiriman);
                            $sheet->setCellValue('F' . $row, $item->status);
                            $row++;
                        }
                        
                        // Auto size columns
                        foreach(range('A','F') as $column) {
                            $sheet->getColumnDimension($column)->setAutoSize(true);
                        }
                        break;
                }
                
                $writer = new Xlsx($spreadsheet);
                $filename = $type . '.xlsx';
                
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="' . $filename . '"');
                header('Cache-Control: max-age=0');
                
                $writer->save('php://output');
                exit;
            } else {
                $data = $query->get();
                $pdf = PDF::loadView('exports.' . $type . '-pdf', compact('data'));
                return $pdf->download($type . '.pdf');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengekspor data: ' . $e->getMessage());
        }
    }
} 