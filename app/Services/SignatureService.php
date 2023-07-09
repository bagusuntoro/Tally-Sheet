<?php

namespace App\Services;
use App\Repositories\SignatureRepository;

class SignatureService
{
    private $signatureRepository;
    public function __construct()
    {
        $this->signatureRepository = new SignatureRepository();
    }

    public function listSignature()
    {
        return $this->signatureRepository->listSignature();
    }

    public function signatureNote($dataRequest)
    {
        return $this->signatureRepository->signatureNote($dataRequest);
    }
}