<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class Mrev extends Model
{
    protected $table            = 'revision';
    protected $primaryKey       = 'id_Revisi';
    protected $allowedFields    = ['MHS_nrp','dosen_nip','TA_id','Status','Ket_revisi'];
}