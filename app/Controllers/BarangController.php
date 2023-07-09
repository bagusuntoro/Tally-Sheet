<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Services\BarangService;

class BarangController extends ResourceController
{
   private $barangService;
   public function __construct()
   {
    $this->barangService = new BarangService();
   }

   use ResponseTrait;
   public function listBarang()
   {
    $response = [
        'status' => 200,
        'error' => null,
        'messages' => [
            'success' => 'get data success'
        ],
        'data' => $this->barangService->listBarang()
        ];
    return $this->respond($response);
   }

   public function getBarangById($id = null)
   {
    $barang = $this->barangService->getBarangById($id);

    if ($barang === null) {
        $response = [
            'status' => 404,
            'error' => 'Not found',
            'messages' => [
                'error' => 'Data not found'
            ],
            'data' => null
        ];
    } else {
        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'Data found'
            ],
            'data' => $barang
        ];
    }

    return $this->respond($response);
   }

   public function createBarang()
   {
    helper(['form']);
    $rules = [
        'jenis_barang' => 'required|string'
    ];
    $dataRequest = [
        'jenis_barang' => $this->request->getVar('jenis_barang'),
    ];

    if (!$this->validate($rules)) return $this->fail($this->validator->getErrors());

    $dataResponse = $this->barangService->createBarang($dataRequest);
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

   public function updateBarang($id = null)
   {
    helper(['form']);
    $rules = [
        'jenis_barang' => 'required'
    ];
    $dataRequest = [
        'jenis_barang' => $this->request->getVar('jenis_barang')
    ];

    if (!$this->validate($rules)) return $this->fail($this->validator->getErrors());

    $barang = $this->barangService->updateBarang($id, $dataRequest);

    if ($barang === null) {
        $response = [
            'status' => 404,
            'error' => 'Not found',
            'messages' => [
                'error' => 'Data not found'
            ],
            'data' => null
        ];
    } else {
        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'Data updated successfully'
            ],
            'data' => $barang
        ];
    }

    return $this->respond($response);
   }

   public function deleteBarang($id = null)
   {
    $result = $this->barangService->deleteBarang($id);

        if ($result === false) {
            $response = [
                'status' => 404,
                'error' => 'Not found',
                'messages' => [
                    'error' => 'Data not found'
                ],
                'data' => null
            ];
        } else {
            $response = [
                'status' => 200,
                'error' => null,
                'messages' => [
                    'success' => 'Data deleted successfully'
                ],
                'data' => null
            ];
        }

        
        // return $this->respond($response);
        return $this->respond($response)->header('Access-Control-Allow-Origin', 'http://localhost:5173');
   }
}
