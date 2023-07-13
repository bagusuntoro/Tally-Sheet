<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;

class Register extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $rules = [
            'name' => [
                'rules' => 'required|string'
            ],
            'telp' => [
                'rules' => 'required|string'
            ],
            'nik' => [
                'rules' => 'required|string'
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[users.email]'
            ],
            'password' => [
                'rules' => 'required|min_length[6]'
            ],
            'confirm_password' => [
                'rules' => 'required|matches[password]'
            ]
        ];

        if ($this->validate($rules)) {
            $userModel = new UserModel;

            $userData = [
                'name' => $this->request->getVar('name'),
                'telp' => $this->request->getVar('telp'),
                'nik' => $this->request->getVar('nik'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT)
            ];

            $userModel->save($userData);

            return $this->respond(['status' => true, 'message' => 'Register berhasil'], 200);
        } else {
            $response = [
                'status' => false,
                'errors' => $this->validator->getErrors(),
            ];

            return $this->respond($response, 422);
        }
    }
}
