<?php

namespace App\Controllers;
use App\Models\PemasukanModel;

class Pendapatan extends BaseController
{
    protected $pm;

    public function __construct()
    {
        $this->pm = new PemasukanModel();
    }

    public function Pendapatan()
    {
        $pm = $this->pm->findAll();
        $data = [
            'title' => 'Pendapatan | MaKun',
            'pm' => $pm
        ];
        echo view('Pages/Pendapatan', $data);  
    }

    public function save(){
        // validasi input
        if(!$this->validate([
            'tgl_pemasukan' => 'required',
            'jumlah' => 'required'
        ])) {
            session()->setFlashdata('Kosong', 'Data harus diisi lengkap!');
            return redirect()->to('/Pendapatan');
        }else{
            $this->request->getPost();
            $this->pm->save([
                'tgl_pemasukan' => $this->request->getPost('tgl_pemasukan'),
                'jumlah' => $this->request->getPost('jumlah'),
                'sumber' => $this->request->getPost('sumber')
            ]);
    
            session()->setFlashdata('Pesan', 'Data berhasil ditambah!');
    
            return redirect()->to('/Pendapatan');
        }
    }

    public function edit($id_pemasukan)
    {
        if(!$this->validate([
            'tgl_pemasukan' => 'required',
            'jumlah' => 'required'
        ])) {
            session()->setFlashdata('Kosong', 'Data harus diisi lengkap!');
            return redirect()->to('/Pendapatan');
        }else{
            $this->request->getPost();
            $this->pm->save([
                'id_pemasukan' => $id_pemasukan,
                'tgl_pemasukan' => $this->request->getPost('tgl_pemasukan'),
                'jumlah' => $this->request->getPost('jumlah'),
                'sumber' => $this->request->getPost('sumber')
            ]);
    
            session()->setFlashdata('Pesan', 'Data berhasil diubah!');
    
            return redirect()->to('/Pendapatan');
        }
    }

    public function delete($id_pemasukan)
    {
        $this->pm->delete($id_pemasukan);
        return redirect()->to('/Pendapatan');
    }

}
