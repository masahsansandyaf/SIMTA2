<?php
 
namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\dosenmodel;
 
class DosenAPIController extends ResourceController
{
    use ResponseTrait;
    // all users
    public function index()
    {
        $model = new dosenmodel();
        $data['dosen'] = $model->orderBy('nip', 'DESC')->findAll();
        return $this->respond($data);
    }
    // create
    public function create()
    {
        $model = new dosenmodel();
        $data = [
            'nip'=> $this->request->getVar('nip'),
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'phone' => $this->request->getVar('phone'),
            'address' => $this->request->getVar('address'),
        ];
        $model->insert($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data produk berhasil ditambahkan.'
            ]
        ];
        return $this->respondCreated($response);
    }
    // single user
    public function show($id = null)
    {
        $model = new dosenmodel();
        $data = $model->getWhere(['nip'=> $id])->getResult();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }
    // update
    public function update($id = null)
    {
        $model = new dosenmodel();
        $json = $this->request->getJSON();
        if($json){ 
            $data = [
                'name' => $json->name,
                'email' => $json->email,
                'phone' => $json->phone,
                'address'=> $json->address,
            ];
        }else{
            $input = $this->request->getRawInput();
            $data = [
                'name' => $this->request->getPost['name'],
                'email' => $this->request->getPost['email'],
                'phone' => $this->request->getPost['phone'],
                'address'=> $this->request->getPost['address']
            ];
        }
        $model->update($id, $data);
        $response = [
            'status' => 200,
            'error' => null,
            'messages' => ['Updated successfully']
        ];
        return $this->respond($response);
    }
    // public function edit($nip)
    // {
        
    //     $this->Dosen->update($nip, [
    //             'name' => $this->request->getPost('name'),
    //             'email' => $this->request->getPost('email'),
    //             'phone' => $this->request->getPost('phone'),
    //             'address' => $this->request->getPost('address'),
    //         ]);

    //         return redirect('Dosen')->with('success', 'Data Updated Successfully');
    // }
    // public function update($id = null)
    // {
    //     $model = new dosenmodel();
    //     $id = $this->request->getVar('nip');
    //     $data = [
    //         'name' => $this->request->getVar('name'),
    //         'email' => $this->request->getVar('email'),
    //         'phone' => $this->request->getVar('phone'),
    //         'address' => $this->request->getVar('address'),
    //     ];
    //     $model->update($id, $data);
    //     $response = [
    //         'status'   => 200,
    //         'error'    => null,
    //         'messages' => [
    //             'success' => 'Data produk berhasil diubah.'
    //         ]
    //     ];
    //     return $this->respond($response);
    // }
    // delete
    public function delete($id = null)
    {
        $model = new dosenmodel();
        $data = $model->where('nip', $id)->delete($id);
        if ($data) {
            $model->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Data produk berhasil dihapus.'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
    }
}