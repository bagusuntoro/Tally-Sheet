<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Services\TumpukanService;

class TumpukanController extends ResourceController
{
    private $tumpukanService;
    public function __construct()
    {
        $this->tumpukanService = new TumpukanService();
    }

    use ResponseTrait;
    public function listTumpukan()
    {
        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'get data success'
            ],
            'data' => $this->tumpukanService->listTumpukan()
            ];
        return $this->respond($response);
    }

    public function createTumpukan()
    {
        helper(['form']);
        $rules = [
            'tumpukan_1' => 'numeric',
            'tumpukan_2' => 'numeric',
            'tumpukan_3' => 'numeric',
            'tumpukan_4' => 'numeric',
            'tumpukan_5' => 'numeric',
            'tumpukan_6' => 'numeric',
            'tumpukan_7' => 'numeric',
            'tumpukan_8' => 'numeric',
            'tumpukan_9' => 'numeric',
            'tumpukan_10' => 'numeric',
            'total' => 'numeric',
            'id_barang' => 'numeric',
        ];

        $dataRequest = [
            'tumpukan_1' => $this->request->getVar('tumpukan_1'),
            'tumpukan_2' => $this->request->getVar('tumpukan_2'),
            'tumpukan_3' => $this->request->getVar('tumpukan_3'),
            'tumpukan_4' => $this->request->getVar('tumpukan_4'),
            'tumpukan_5' => $this->request->getVar('tumpukan_5'),
            'tumpukan_6' => $this->request->getVar('tumpukan_6'),
            'tumpukan_7' => $this->request->getVar('tumpukan_7'),
            'tumpukan_8' => $this->request->getVar('tumpukan_8'),
            'tumpukan_9' => $this->request->getVar('tumpukan_9'),
            'tumpukan_10' => $this->request->getVar('tumpukan_10'),
            'total' => $this->request->getVar('total'),
            'id_barang' => $this->request->getVar('id_barang'),
        ];
    
        // if (!$this->validate($rules)) return $this->fail($this->validator->getErrors());
    
        $dataResponse = $this->tumpukanService->createTumpukan($dataRequest);
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
}
