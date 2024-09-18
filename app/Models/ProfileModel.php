<?php 

namespace App\Models;
use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    protected $allowedFields = ['nama', 'email', 'password'];
}
