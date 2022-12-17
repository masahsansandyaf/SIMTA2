<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\Revision;

class RevisionController extends ResourceController
{
    use ResponseTrait;
    // all users
    public function index()
    {
        $model = new Revision();
        $data['revision'] = $model->orderBy('id_revisi', 'DESC')->findAll();
        return $this->respond($data);
    }
    // create
    public function create()
    {
        $model = new Revision();
        $data = [
            'id_Revisi'=> $this->request->getVar('id_Revisi'),
            'MHS_nrp' => $this->request->getVar('MHS_nrp'),
            'dosen_nip' => $this->request->getVar('dosen_nip'),
            'TA_id' => $this->request->getVar('TA_id'),
            'Status' => $this->request->getVar('Status'),
            'Ket_revisi' => $this->request->getVar('Ket_revisi'),
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
    //SIngle USer
    public function show($id = null)
    {
        $model = new Revision();
        $data = $model->getWhere(['id_Revisi'=> $id])->getResult();
        if($data){
            return $this->respond($data);
        }else{
            return $this->failNotFound("No data");
        }
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
     // update
     public function update($id = null)
     {
         $model = new Revision();
         $json = $this->request->getJSON();
         if($json){ 
             $data = [
                'Status' => $json->Status,
                'Ket_revisi' => $json->Ket_revisi,
             ];
         }else{
             $input = $this->request->getRawInput();
             $data = [
                 'Status' => $this->request->getPost['Status'],
                 'Ket_revisi'=> $this->request->getPost['Ket_revisi']
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
    public function delete($id = null)
    {
        $model = new Revision();
        $data = $model->find($id);
        if($data){
            $model->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Data Deleted'
                ]
            ];
             
            return $this->respondDeleted($response);
        }else{
            return $this->failNotFound('No Data Found with id '.$id);
        }
    }

}