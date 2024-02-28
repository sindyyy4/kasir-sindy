<?php

namespace App\Models;

use CodeIgniter\Model;

class Mdetailpenjualan extends Model
{
    protected $table            = 'tbl_detailpenjualan';
    protected $primaryKey       = 'id_detail';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_detail', 'kode_penjualan', 'kode_produk', 'harga_jual', 'qty', 'total_harga'];

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


    public function getDetailPenjualan($idPenjualan){
        return $this->db->table('tbl_detailpenjualan')
            ->select('tbl_detailpenjualan.*, tbl_penjualan.no_faktur,tbl_produk.nama_produk')
            ->join('tbl_penjualan', 'tbl_penjualan.kode_penjualan = tbl_detailpenjualan.kode_penjualan')
            ->join('tbl_produk', 'tbl_produk.id_produk = tbl_detailpenjualan.id_produk')
            ->where('tbl_detailpenjualan.kode_penjualan', $idPenjualan)
            ->get()
            ->getResultArray();
    }

    public function hapusdetail($idDetail){
        $detailPenjualan = NEW MDetailPenjualan;
        $detailPenjualan->query("CALL hapus_detailPenjualan('".$idDetail."')");
    }
}
