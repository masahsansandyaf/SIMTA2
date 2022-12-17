<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Revision;

class RevisiController extends BaseController
{
    protected $Revision;
 
    function __construct()
    {
        $this->Revision = new Revision();
    }

    public function index()
    {        
	$data['Revision'] = $this->Revision->findAll();
    // dd($data);

        return view('Revisi/index', $data);
    }

    public function create()
    {
        $this->Revision->insert([
            'id_Revisi'=> $this->request->getPost('id_Revisi'),
            'MHS_nrp' => $this->request->getPost('MHS_nrp'),
            'dosen_nip' => $this->request->getPost('dosen_nip'),
            'TA_id' => $this->request->getPost('TA_id'),
            'Status' => $this->request->getPost('Status'),
            'Ket_revisi' => $this->request->getPost('Ket_revisi'),
        ]);

		return redirect('Revision')->with('success', 'Data Added Successfully');	
    }
    public function edit($id_Revisi)
    {
        
        $this->Revision->update($id_Revisi, [
                'Status' => $this->request->getPost('Status'),
                'Ket_revisi' => $this->request->getPost('Ket_revisi'),
            ]);

            return redirect('Revision')->with('success', 'Data Updated Successfully');
    }
    public function delete($id_Revisi)
    {
        $this->Revision->delete($id_Revisi);

    return redirect('Revision')->with('success', 'Data Deleted Successfully');
    }
//     public function store(){
//         $data = $this->request->
//     }

}
