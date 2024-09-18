<?php
namespace App\Controllers;
use App\Models\ProfileModel;

class Profile extends BaseController
{
    protected $pm;
    public function __construct()
    {
        $this->pm = new ProfileModel();
    }

    public function Profile()
    {
        $pm = $this->pm->findAll();
        $data = [
            'title' => 'Kelola Admin | MaKun',
            'pm' => $pm
        ];
        echo view('Pages/Profile', $data);  
    }

    public function save(){
        // validasi input
        if(!$this->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required'
        ])) {
            session()->setFlashdata('Kosong', 'Data harus diisi lengkap!');
            return redirect()->to('/Profile');
        }else{
            $this->request->getPost();
            $this->pm->save([
                'nama' => $this->request->getPost('nama'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password')
            ]);
    
            session()->setFlashdata('Pesan', 'Data berhasil ditambah!');
    
            return redirect()->to('/Profile');
        }
    }

    public function edit($id_admin)
    {
        if(!$this->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required'
        ])) {
            session()->setFlashdata('Kosong', 'Data harus diisi lengkap!');
            return redirect()->to('/Profile');
        }else{
            $this->request->getPost();
            $this->pm->save([
                'id_admin' => $id_admin,
                'nama' => $this->request->getPost('nama'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password')
            ]);
    
            session()->setFlashdata('Pesan', 'Data berhasil diubah!');
    
            return redirect()->to('/Profile');
        }
    }

}
