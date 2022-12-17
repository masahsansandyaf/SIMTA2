<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class dosenmodel extends Model
{
    protected $table = 'dosen';
    protected $primaryKey = 'nip';
    protected $allowedFields = ['name','email','phone','address'];
}