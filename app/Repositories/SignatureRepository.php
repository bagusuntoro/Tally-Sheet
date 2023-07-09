<?php

namespace App\Repositories;
use App\Models\SignatureModel;

class SignatureRepository
{
    private $signatureModel;
    public function __construct()
    {
        $this->signatureModel = new SignatureModel();
    }

    public function listSignature()
    {
        return $this->signatureModel->findAll();
    }

    public function signatureNote($dataRequest)
    {
        return $this->signatureModel->insert($dataRequest);
    }

}