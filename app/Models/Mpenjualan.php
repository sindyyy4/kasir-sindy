<?php

namespace App\Models;

use CodeIgniter\Model;

class Mpenjualan extends Model
{
    protected $table            = 'tbl_penjualan';
    protected $primaryKey       = 'kode_penjualan';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['kode_penjualan', 'tgl_penjualan', 'grand_total', 'no_faktur'];

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

    //  public function generateNoFaktur()
    //  {
    //     $prefix = 'PJLT';
    //     $lastFaktur = $this->orderBy('kode_penjualan', 'DESC')->first();

    //     if (!$lastFaktur) {
    //         $code = $prefix . '001';
    //     } else {
    //         $lastCode = substr($lastFaktur['no_faktur'], strlen($prefix));
    //         $nextCode = str_pad($lastCode + 1, 3, '0', STR_PAD_LEFT);
    //         $code = $prefix . $nextCode;
    //     }
    //     return $code;
    //  }

    //  public function getPenjualan(){
    //     $produk = NEW Mproduk();        
    //     $produk->select('tbl_penjualan,no_faktur, tbl_penjualan.tgl_penjualan, tbl_penjualan.waktu, tbl_penjualan.grand_total');   
          
    //     $produk->orderBy('tbl_penjualan.id_penjualan', 'DESC');
    //     return $produk->find();      

    //  }

    public function getDetailPenjualan($idPenjualan){
        return $this->db->table('tbl_detailpenjualan')
            ->select('tbl_detailpenjualan.*, tbl_penjualan.no_faktur,tbl_produk.nama_produk')
            ->join('tbl_penjualan', 'tbl_penjualan.kode_penjualan = tbl_detailpenjualan.kode_penjualan')
            ->join('tbl_produk', 'tbl_produk.id_produk = tbl_detailpenjualan.kode_produk')
            ->where('tbl_detailpenjualan.kode_penjualan', $idPenjualan)
            ->get()
            ->getResultArray();
}
public function generateNoFaktur(){
    // Dapatkan tahun dua angka terakhir
    $tanggal = date('Ymd');
    // no urut terakhir dari database
    $lastTransaction = $this->orderBy('kode_penjualan', 'DESC')->first();
    // Ambil nomor urut terakhir atau setel ke 0 jika belum ada transaksi sebelumnya
    $lastNumber = ($lastTransaction) ? intval(substr($lastTransaction['no_faktur'], -4)) : 0;
    // Increment nomor urut
    $nextNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
    // Hasilkan nomor transaksi dengan format SCDPSYYMMDDXXXX
    $no_faktur = 'INV-' . $tanggal . $nextNumber;
    // Simpan nomor transaksi dalam sesi
    session()->set('GeneratedTransactionNumber', $no_faktur);
    return $no_faktur;
}
public function getTotalHargaById($idPenjualan){
    $query = $this->select('grand_total')->where('kode_penjualan', $idPenjualan)->first();
        // Periksa apakah hasil kueri tidak kosong sebelum mengakses indeks 'total'
        if ($query) {
        return $query['grand_total'];
        } else {
        // Jika hasil kueri kosong, kembalikan nilai default, misalnya 0
        return 0;
        }
}
}