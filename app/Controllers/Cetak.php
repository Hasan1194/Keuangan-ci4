<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\PemasukanModel;
use App\Models\PengeluaranModel;

class Cetak extends Controller
{
    protected $pm;
    protected $p;

    public function __construct()
    {
        $this->pm = new PemasukanModel();
        $this->p = new PengeluaranModel();
    }
    public function index()
    {
        $pm = $this->pm->findAll();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'ID Pemasukan');
        $sheet->setCellValue('B1', 'Tanggal Pemasukan');
        $sheet->setCellValue('C1', 'Jumlah');
        $sheet->setCellValue('D1', 'Sumber');

        $row = 2;

        foreach ($pm as $data) {
            $sumber = $this->getSumberInfo($data['sumber']);

            $sheet->setCellValue('A' . $row, $data['id_pemasukan']);
            $sheet->setCellValue('B' . $row, $data['tgl_pemasukan']);
            $sheet->setCellValue('C' . $row, $data['jumlah']);
            $sheet->setCellValue('D' . $row, $sumber);

            $row++;
        }

        $filename = 'laporan_masuk.xlsx';

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        $writer->save('php://output');
    }
    public function keluar()
    {
        $p = $this->p->findAll();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'ID Pengeluaran');
        $sheet->setCellValue('B1', 'Tanggal Pengeluaran');
        $sheet->setCellValue('C1', 'Jumlah');
        $sheet->setCellValue('D1', 'Catatan');

        $row = 2;

        foreach ($p as $data) {

            $sheet->setCellValue('A' . $row, $data['id_pengeluaran']);
            $sheet->setCellValue('B' . $row, $data['tgl_pengeluaran']);
            $sheet->setCellValue('C' . $row, $data['jumlah']);
            $sheet->setCellValue('D' . $row, $data['catatan']);

            $row++;
        }

        $filename = 'laporan_keluar.xlsx';

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        $writer->save('php://output');
    }

    private function getSumberInfo($id)
    {
        $sumber = '';

        if ($id === 'Toko Online') {
            $sumber = 'Berasal dari Toko Online';
        } elseif ($id === 'Toserba') {
            $sumber = 'Berasal dari Toserba';
        } elseif ($id === 'Imah Teuweul') {
            $sumber = 'Berasal dari Imah Teuweul';
        } else {
            $sumber = 'Tidak diketahui';
        }

        return $sumber;
    }

}
