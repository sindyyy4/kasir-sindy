<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\Mdetailpenjualan;
use App\Models\Mproduk;

class Penjualan extends BaseController
{
    public function index()
    {
        //
    }
    public function lihatPenjualan(){
           
       $no_faktur = $this->penjualan->generateNoFaktur();
   
       $data =[
           'no_faktur'=>$no_faktur,
           'listProduk'=> $this->produk->getAllDetailProduk(),
           'listPenjualan' => $this->penjualan->getDetailPenjualan(session()->get('idPenjualan')),
           'totalHarga' => $this->penjualan->getTotalHargaById(session()->get('idPenjualan'))
       ];
   
       return view('penjualan/form-penjualan', $data);
   
   }
   
   public function savePenjualan() {
       // ambil detail barang yang dijual
       $where=['id_produk'=>$this->request->getPost('id_produk')];
       $cekBarang=$this->produk->where($where)->findAll(); 
       $hargaJual=$cekBarang[0]['harga_jual'];
   
       if(session()->get('idPenjualan') == null){            
           // 1. Menyiapkan data penjualan
           date_default_timezone_set('Asia/Jakarta');
           // Mendapatkan waktu saat ini dalam zona waktu yang telah diatur
           $tanggal_sekarang = date('Y-m-d H:i:s');
   
           $grandTotal = $hargaJual * $this->request->getPost('jumlah'); // Hitung grand total dari barang pertama kali ditambahkan
   
           $dataPenjualan=[
               'no_faktur'=>$this->request->getPost('no_faktur'),
               'tgl_penjualan'=>$tanggal_sekarang, // Perbaiki format tanggal
               'grand_total'=> $grandTotal // Simpan grand total sebagai total harga barang pertama kali
           ];
           
           // 2. Menyimpan data ke dalam tabel penjualan
           $this->penjualan->insert($dataPenjualan);
   
           // 3. Menyiapkan data untuk menyimpan detail penjualan
           $idPenjualanBaru = $this->penjualan->insertID(); // Mendapatkan ID penjualan baru
           $dataDetailPenjualan=[
               'kode_penjualan'=>$idPenjualanBaru,
               'id_produk'=>$this->request->getPost('id_produk'),
               'qty'=> $this->request->getPost('jumlah'),
               'total_harga'=>$hargaJual*$this->request->getPost('jumlah') // Perbaiki perhitungan total harga
           ];
   
           // 4. Menyimpan data ke dalam tabel detail penjualan
           $this->penjualan->insert($dataDetailPenjualan);
   
           // 5. Membuat session untuk penjualan baru
           session()->set('idPenjualan', $idPenjualanBaru);
       } else {
           // Jika ada ID penjualan yang sudah tersimpan di sesi, gunakan ID itu untuk menyimpan detail penjualan
           $idPenjualanSaatIni = session()->get('idPenjualan');
           $dataDetailPenjualan=[
               'kode_penjualan'=>$idPenjualanSaatIni,
               'id_produk'=>$this->request->getPost('id_produk'),
               'qty'=> $this->request->getPost('jumlah'),
               'total_harga'=>$hargaJual*$this->request->getPost('jumlah') // Perbaiki perhitungan total harga
           ];
   
           // Simpan data ke dalam tabel detail penjualan
           $this->penjualan->insert($dataDetailPenjualan);
   
           // Perbarui grand total dalam tabel penjualan dengan menambahkan total harga barang baru
           $grandTotalSebelumnya = $this->penjualan->getTotalHargaById($idPenjualanSaatIni);
           $grandTotalBaru = $grandTotalSebelumnya + ($hargaJual * $this->request->getPost('jumlah'));
           $this->penjualan->update($idPenjualanSaatIni, ['grand_total' => $grandTotalBaru]);
       }
   
       // Mengarahkan pengguna kembali ke halaman transaksi penjualan
       return redirect()->to('/form-penjualan');
   }
   
   public function savePembayaran()
   {
       // Mendapatkan ID penjualan yang selesai
       $idPenjualanSelesai = session()->get('idPenjualan');
       
       // Reset session kode penjualan untuk transaksi baru
       session()->remove('idPenjualan');
   
       // Mengarahkan pengguna kembali ke halaman transaksi penjualan
       return redirect()->to('/form-penjualan');
   }
   
   public function hapus($idNya){
          $this->penjualan->hapusDetail($idNya);
           session()->setFlashdata('hapus','Data berhasil dihapus');
           return redirect()->to('/form-penjualan');
}
}