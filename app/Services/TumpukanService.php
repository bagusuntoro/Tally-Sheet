<?php

namespace App\Services;
use App\Repositories\TumpukanRepository;

class TumpukanService
{
    private $tumpukanRepository;
    public function __construct()   
    {
        $this->tumpukanRepository = new TumpukanRepository();
    }

    public function listTumpukan()
    {
        return $this->tumpukanRepository->listTumpukan();
    }

    public function createTumpukan($dataRequest)
    {
        return $this->tumpukanRepository->createTumpukan($dataRequest);
    }
}