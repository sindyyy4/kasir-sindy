<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Produk extends BaseController
{
    public function tampilProduk()
    {
        $data = [
            'listProduk' => $this->produk->getAllProduk(),
        ];
        return view('produk/data-produk', $data);
    }
   public function tambahProduk()
   {
    $data=[
        'listSatuan' => $this->satuan->findAll(),
        'listKategori' => $this->Kategori->findAll(),
        
    ];
    return view('produk/tambah-produk',$data);
   }

   public function simpanProduk()
   {
    $validation =\Config\Services::validation();
        $validation->setRule('kode_produk','Kode Produk','required|is_unique[tbl_produk.kode_produk]',[
            'is_unique' => '{field} sudah di gunakan',
        ]);

        $datavalid =[
            'kode_produk'=>$this->request->getPost('kode_produk'),
        ];
        if(!$validation->run($datavalid)){
            return redirect()->back()->withInput()->with('errors',$validation->getErrors());
        }
    $data=[
        'kode_produk'=>$this->request->getVar('kode_produk'),
        'nama_produk'=>$this->request->getVar('nama_produk'),
        'harga_jual'=>  str_replace('.', '',$this-> request->getVar('harga_jual')),
        'kode_kategori'=>$this->request->getVar('jenis_kategori'),
        'stok'=>$this->request->getVar('stok'),
        'harga_beli'=>  str_replace('.', '',$this->request->getVar('harga_beli')),
        'id_satuan'=>$this->request->getVar('jenis_satuan'),
    ];
    $this->produk->save($data);
    var_dump($data);
    return redirect()->to('data-produk');
   }
   public function editProduk($idProduk){
    $syarat=[
        'id_produk'=>$idProduk
    ];
    $data=[
        'listSatuan' => $this->satuan->findAll(),
        'listKategori' => $this->Kategori->findAll(),
        'dataProduk'=> $this->produk->where($syarat)->findAll(),
    ];
    return view('produk/edit-produk',$data);
}

    public function updateProduk(){
       $data =[
            'id_produk'=>$this->request->getVar('id_produk'),
            'kode_produk'=>$this->request->getVar('kode_produk'),
            'nama_produk'=>$this->request->getVar('nama_produk'),
            'harga_jual'=> str_replace('.', '', $this->request->getVar('harga_jual')),
            'kode_kategori'=>$this->request->getVar('kode_kategori'),
            'stok'=>$this->request->getVar('stok'),
            'harga_beli'=> str_replace('.', '', $this->request->getVar('harga_beli')),
            'id_satuan'=>$this->request->getVar('id_satuan'),
       ];
       $this->produk->update($this->request->getVar('id_produk'), $data);
        session()->setFlashdata('pesan', 'data berhasil di edit!!');
        return redirect()->to('/data-produk');
    }



public function hapusProduk($id)
{
    $this->produk->delete($id);

    return redirect()->to('/data-produk');
}
}

