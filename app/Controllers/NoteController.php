<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Services\NoteService;

class NoteController extends ResourceController
{
    private $noteService;
    public function __construct()
    {
        $this->noteService = new NoteService();
    }

    use ResponseTrait;
    public function listNotes()
    {
        $response = [
            'status' => 200,
            'error' => null,
            'messages' => [
                'success' => 'get data success'
            ],
            'data' => $this->noteService->listNotes()
            ];
        return $this->respond($response);
    }

    public function getNoteById($id = null)
    {
        $note = $this->noteService->getNoteById($id);
    
        if ($note === null) {
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
                'data' => $note
            ];
        }
    
        return $this->respond($response);
    }

    public function createNote()
    {
        helper(['form']);
        $rules = [
            'location' => 'required',
            'date' => 'required',
            'no_container' => 'required',
            'no_seal' => 'required',
            'destination' => 'required',
            'no_truck' => 'required',
            'driver' => 'required',
            'telp' => 'required',
            // 'id_signature' => 'numeric'
        ];

        $dataRequest = [
            'location' => $this->request->getVar('location'),
            'date' => $this->request->getVar('date'),
            'no_container' => $this->request->getVar('no_container'),
            'no_seal' => $this->request->getVar('no_seal'),
            'destination' => $this->request->getVar('destination'),
            'no_truck' => $this->request->getVar('no_truck'),
            'driver' => $this->request->getVar('driver'),
            'telp' => $this->request->getVar('telp'),
            'id_signature' => $this->request->getVar('id_signature'),
        ];
    
        if (!$this->validate($rules)) return $this->fail($this->validator->getErrors());
    
        $dataResponse = $this->noteService->createNote($dataRequest);
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

    public function updateNote($id = null)
    {
        helper(['form']);
        $rules = [
            'location' => 'required',
            'date' => 'required',
            'no_container' => 'required',
            'no_seal' => 'required',
            'destination' => 'required',
            'no_truck' => 'required',
            'driver' => 'required',
            'telp' => 'required',
            // 'id_signature' => 'required'
        ];
        $dataRequest = [
            'location' => $this->request->getVar('location'),
            'date' => $this->request->getVar('date'),
            'no_container' => $this->request->getVar('no_container'),
            'no_seal' => $this->request->getVar('no_seal'),
            'destination' => $this->request->getVar('destination'),
            'no_truck' => $this->request->getVar('no_truck'),
            'driver' => $this->request->getVar('driver'),
            'telp' => $this->request->getVar('telp'),
            'id_signature' => $this->request->getVar('id_signature'),
        ];
    
        if (!$this->validate($rules)) return $this->fail($this->validator->getErrors());
    
        $note = $this->noteService->updateNote($id, $dataRequest);
    
        if ($note === null) {
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
                'data' => $note
            ];
        }
    
        return $this->respond($response);
    }

    public function deleteNote($id)
    {
        $result = $this->noteService->deleteNote($id);
    
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
    
            
            return $this->respond($response);
       }
}



