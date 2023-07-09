<?php

namespace App\Repositories;
use App\Models\BarangModel;

class BarangRepository
{
    private $barangModel;
    public function __construct()
    {
        $this->barangModel = new BarangModel();
    }

    public function listBarang()
    {
        $data = $this->barangModel->findAll();
        return $data;
    }

    public function getBarangById($id)
    {
        $data = $this->barangModel->find($id);
        return $data;
    }

    public function createBarang($dataRequest)
    {
        if ($this->barangModel->insert($dataRequest)) {
            return true;
        }
        return false;
    }

    public function updateBarang($id, $dataRequest)
    {
        return $this->barangModel->update($id, $dataRequest);
    }

    public function deleteBarang($id)
    {
        if ($this->getBarangById($id)) {
            $this->barangModel->delete($id);
            return true;
        }
        return false;
    }
}