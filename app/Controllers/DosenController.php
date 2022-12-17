<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Dosen;

class DosenController extends BaseController
{
    protected $Dosen;
 
    function __construct()
    {
        $this->Dosen = new Dosen();
    }

    public function index()
    {        
	$data['Dosen'] = $this->Dosen->findAll();
    // dd($data);

        return view('Dosens/index', $data);
    }

    public function create()
    {
        $this->Dosen->insert([
            'nip'=> $this->request->getPost('nip'),
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
        ]);

		return redirect('Dosen')->with('success', 'Data Added Successfully');	
    }
    public function edit($nip)
    {
        
        $this->Dosen->update($nip, [
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'phone' => $this->request->getPost('phone'),
                'address' => $this->request->getPost('address'),
            ]);

            return redirect('Dosen')->with('success', 'Data Updated Successfully');
    }
    public function delete($nip)
    {
        $this->Dosen->delete($nip);

    return redirect('Dosen')->with('success', 'Data Deleted Successfully');
    }
//     public function store(){
//         $data = $this->request->
//     }

}
