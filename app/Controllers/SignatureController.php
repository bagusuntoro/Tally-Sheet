<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Services\SignatureService;

class SignatureController extends ResourceController
{
    private $signatureService;
    public function __construct()
    {
        $this->signatureService = new SignatureService;
    }


    use ResponseTrait;
    public function listSignature()
    {
        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'get data success'
            ],
            'data' => $this->signatureService->listSignature()
            ];
        return $this->respond($response);
    }

    public function signatureNote()
    {
     helper(['form']);
     $rules = [
         'name' => 'required|string',
         'signature' => 'required|string',
         'id_note' => 'required|numeric'
     ];
     $dataRequest = [
         'name' => $this->request->getVar('name'),
         'signature' => $this->request->getVar('signature'),
         'id_note' => $this->request->getVar('id_note'),
     ];
 
     if (!$this->validate($rules)) return $this->fail($this->validator->getErrors());
 
     $dataResponse = $this->signatureService->signatureNote($dataRequest);
     if ($dataResponse) {
         $response = [
             'status' => 201,
             'error' => null,
             'messages' => [
                 'success' => 'data inserted'
             ]
         ];
         return $this->respondCreated($response);
     }
     $response = [
         'status' => 401,
         'error' => 'failed',
     ];
     return $this->respondCreated($response);
    }


    public function createTumpukan()
    {
        helper(['form']);
        
        $response = [
            'status' => 201,
            'error' => null,
            'messages' => [
                'success' => 'data inserted'
            ]
        ];
        return $this->respondCreated($response);
    }

}

