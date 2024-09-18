<?php 

namespace App\Models;
use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $table = 'karyawan';
    protected $primaryKey = 'id_karyawan';
    protected $allowedFields = ['nama', 'posisi', 'alamat', 'umur', 'kontak'];
}

