<?php
namespace App\Controllers;
use App\Models\LoginModel;
use CodeIgniter\Controller;
class Login extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function auth()
    {
        $session = session();
        $model = new LoginModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        
        $data = $model->where('email', $email)->first();
        
        if ($data) {
            if ($password === $data['password']) {
                $ses_data = [
                    'id_admin'       => $data['id_admin'],
                    'email'    => $data['email'],
                    'nama'       => $data['nama'],
                    'logged_in'=> TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/Dashboard');
            } else {
                $session->setFlashdata('fail', 'Password Salah');
                return redirect()->to('/');
            }
        } else {
            $session->setFlashdata('fail', 'Email Tidak Ditemukan');
            return redirect()->to('/');
        }
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
