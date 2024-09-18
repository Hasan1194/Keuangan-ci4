<?php

namespace App\Controllers;
use App\Models\KaryawanModel;

class Karyawan extends BaseController
{
    protected $pm;

    public function __construct()
    {
        $this->pm = new KaryawanModel();
    }

    public function Karyawan()
    {
        $pm = $this->pm->findAll();
        $data = [
            'title' => 'Karyawan | MaKun',
            'pm' => $pm
        ];
        echo view('Pages/Karyawan', $data);  
    }

    public function save(){
        // validasi input
        if(!$this->validate([
            'nama' => 'required',
            'posisi' => 'required',
            'alamat' => 'required',
            'umur' => 'required',
            'kontak' => 'required'
        ])) {
            session()->setFlashdata('Kosong', 'Data harus diisi lengkap!');
            return redirect()->to('/Karyawan');
        }else{
            $this->request->getPost();
            $this->pm->save([
                'nama' => $this->request->getPost('nama'),
                'posisi' => $this->request->getPost('posisi'),
                'alamat' => $this->request->getPost('alamat'),
                'umur' => $this->request->getPost('umur'),
                'kontak' => $this->request->getPost('kontak')
            ]);
    
            session()->setFlashdata('Pesan', 'Data berhasil ditambah!');
    
            return redirect()->to('/Karyawan');
        }
    }

    public function edit($id_karyawan)
    {
        if(!$this->validate([
            'nama' => 'required',
            'posisi' => 'required',
            'alamat' => 'required',
            'umur' => 'required',
            'kontak' => 'required'
        ])) {
            session()->setFlashdata('Kosong', 'Data harus diisi lengkap!');
            return redirect()->to('/Karyawan');
        }else{
            $this->request->getPost();
            $this->pm->save([
                'id_karyawan' => $id_karyawan,
                'nama' => $this->request->getPost('nama'),
                'posisi' => $this->request->getPost('posisi'),
                'alamat' => $this->request->getPost('alamat'),
                'umur' => $this->request->getPost('umur'),
                'kontak' => $this->request->getPost('kontak')
            ]);
    
            session()->setFlashdata('Pesan', 'Data berhasil diubah!');
    
            return redirect()->to('/Karyawan');
        }
    }

    public function delete($id_karyawan)
    {
        $this->pm->delete($id_karyawan);
        return redirect()->to('/Karyawan');
    }

}
