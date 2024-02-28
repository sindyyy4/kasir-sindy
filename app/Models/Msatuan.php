<?php

namespace App\Models;

use CodeIgniter\Model;

class Msatuan extends Model
{
    protected $table            = 'tbl_satuan';
    protected $primaryKey       = 'id_satuan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_satuan', 'nama_satuan'];

    protected bool $allowEmptyInserts = false;

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

     // public function getSatuan()
    // {

    //     $satuan = new Msatuan;
    //     $querySatuan = $satuan->query("SELECT * FROM tbl_satuan")->getResult();
    //     return $querySatuan;
    //     //     if ($id == false ) {
    //     //         return $this->findAll();
    //     //     }
    //     //    return $this->where(['id_satuan' => $id])->first();
    //     //     }
    // }
}
