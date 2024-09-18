<?php

namespace App\Controllers;
use App\Models\PemasukanModel;
use App\Models\PengeluaranModel;

class Laporan extends BaseController
{
    protected $pm;
    protected $p;

    public function __construct()
    {
        $this->pm = new PemasukanModel();
        $this->p = new PengeluaranModel();
    }

    public function Laporan()
    {
        $pm = $this->pm->findAll();
        $p = $this->p->findAll();
        $data = [
            'title' => 'Laporan | MaKun',
            'pm' => $pm,
            'p' => $p
        ];
        echo view('Pages/Laporan', $data);  
    }

}
