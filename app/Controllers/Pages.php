<?php

namespace App\Controllers;
use App\Models\PemasukanModel;
use App\Models\PengeluaranModel;
use App\Models\KaryawanModel;
use CodeIgniter\Controller;

class Pages extends BaseController
{
    public function index()
    {
        $pemasukanModel = new PemasukanModel();
        $pengeluaranModel = new PengeluaranModel();
        $karyawanModel = new KaryawanModel();

        $totalPemasukan = $pemasukanModel->selectSum('jumlah')->first()['jumlah'];
        $totalPengeluaran = $pengeluaranModel->selectSum('jumlah')->first()['jumlah'];
        $total = $totalPemasukan - $totalPengeluaran;
        $totalKaryawan = $karyawanModel->countAllResults();

        $data = [
            'title' => 'Dashboard | MaKun',
            'totalPemasukan' => $totalPemasukan,
            'totalPengeluaran' => $totalPengeluaran,
            'total' => $total,
            'totalKaryawan' => $totalKaryawan
        ];
        
        echo view('Pages/Dashboard', $data);
    }
}
