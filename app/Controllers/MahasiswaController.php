<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Mahasiswa;

class MahasiswaController extends BaseController
{
    protected $Mahasiswa;
 
    function __construct()
    {
        $this->Mahasiswa = new Mahasiswa();
    }

    public function index()
    {        
	$data['Mahasiswa'] = $this->Mahasiswa->findAll();

        return view('Mahasiswa/index', $data);
    }

    public function create()
    {
        $this->Mahasiswa->insert([
            'nrp' => $this->request->getPost('nrp'),
            'name_MHS' => $this->request->getPost('name_MHS'),
            'email_MHS' => $this->request->getPost('email_MHS'),
            'phone_MHS' => $this->request->getPost('phone_MHS'),
            'address_MHS' => $this->request->getPost('address_MHS'),
        ]);

		return redirect('Mahasiswa')->with('success', 'Data Added Successfully');	
    }
    public function edit($nrp)
    {
        
        $this->Mahasiswa->update($nrp, [
            'name_MHS' => $this->request->getPost('name_MHS'),
            'email_MHS' => $this->request->getPost('email_MHS'),
            'phone_MHS' => $this->request->getPost('phone_MHS'),
            'address_MHS' => $this->request->getPost('address_MHS'),
            ]);

            return redirect('mahasiswa')->with('success', 'Data Updated Successfully');
    }
    public function delete($nrp)
    {
        $this->Mahasiswa->delete($nrp);

    return redirect('mahasiswa')->with('success', 'Data Deleted Successfully');
    }
}
