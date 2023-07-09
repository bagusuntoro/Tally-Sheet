<?php

namespace App\Models;

use CodeIgniter\Model;

class TumpukanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tumpukans';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'tumpukan_1',
        'tumpukan_2',
        'tumpukan_3',
        'tumpukan_4',
        'tumpukan_5',
        'tumpukan_6',
        'tumpukan_7',
        'tumpukan_8',
        'tumpukan_9',
        'tumpukan_10',
        'total',
        'id_note',
        'id_barang',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
