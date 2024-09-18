<?php

namespace App\Controllers;
use App\Models\PengeluaranModel;

class Pengeluaran extends BaseController
{
    protected $pm;

    public function __construct()
    {
        $this->pm = new PengeluaranModel();
    }

    public function Pengeluaran()
    {
        $pm = $this->pm->findAll();
        $data = [
            'title' => 'Pengeluaran | MaKun',
            'pm' => $pm
        ];
        echo view('Pages/Pengeluaran', $data);   
    }

    public function save(){
        // validasi input
        if(!$this->validate([
            'tgl_pengeluaran' => 'required',
            'jumlah' => 'required'
        ])) {
            session()->setFlashdata('Kosong', 'Data harus diisi lengkap!');
            return redirect()->to('/Pengeluaran');
        }else{
        $this->request->getPost();
        $this->pm->save([
            'tgl_pengeluaran' => $this->request->getPost('tgl_pengeluaran'),
            'jumlah' => $this->request->getPost('jumlah'),
            'catatan' => $this->request->getPost('catatan')
        ]);

        session()->setFlashdata('Pesan', 'Data berhasil ditambah!');

        return redirect()->to('/Pengeluaran');
        }
    }
    
    public function edit($id_pengeluaran)
    {
            $this->request->getPost();
            $this->pm->save([
                'id_pengeluaran' => $id_pengeluaran,
                'tgl_pengeluaran' => $this->request->getPost('tgl_pengeluaran'),
                'jumlah' => $this->request->getPost('jumlah'),
                'catatan' => $this->request->getPost('catatan')
            ]);
    
            session()->setFlashdata('Pesan', 'Data berhasil diubah!');
    
            return redirect()->to('/Pengeluaran');
    }

    public function delete($id_pengeluaran)
    {
        $this->pm->delete($id_pengeluaran);
        return redirect()->to('/Pengeluaran');
    }

}
