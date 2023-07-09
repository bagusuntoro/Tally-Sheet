<?php

namespace App\Repositories;
use App\Models\TumpukanModel;

class TumpukanRepository
{
    private $tumpukanModel;
    public function __construct()
    {
        $this->tumpukanModel = new TumpukanModel();
    }

    public function listTumpukan()
    {
        $data = $this->tumpukanModel->findAll();
        return $data;
    }

    public function createTumpukan($dataRequest)
    {
        if ($this->tumpukanModel->insert($dataRequest)) {
            return true;
        }
        return false;
    }
}