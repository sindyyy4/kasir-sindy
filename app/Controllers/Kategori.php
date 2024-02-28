<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Kategori extends BaseController
{
    public function tampilKategori()
    {
    
        $data = [
            'listKategori' => $this->Kategori->findAll()
        ];
        return view('kategori/data-kategori', $data);
    }
    public function tambahKategori()
    {

        return view('kategori/tambah-kategori');
    }
    public function simpanKategori()
    {
        $validation =\Config\Services::validation();
        $validation->setRule('nama_kategori','Nama Kategori','required|is_unique[tbl_kategori.nama_kategori]',[
            'is_unique' => '{field} sudah di gunakan',
        ]);

        $datavalid =[
            'nama_kategori'=>$this->request->getPost('nama_kategori'),
        ];
        if(!$validation->run($datavalid)){
            return redirect()->back()->withInput()->with('errors',$validation->getErrors());
        }
        $data = ['nama_kategori'=> $this->request->getVar('nama_kategori')
    ];
    $this->Kategori->save($data);
    return redirect()->to('/data-kategori');
    }
    public function editKategori($kodekategori)
    {

        $syarat = [
            'kode_kategori' => $kodekategori
        ];

        $data = [
            'detailKategori' => $this->Kategori->where($syarat)->findAll(),
        ];
        return view('Kategori/edit-kategori', $data);
    }

    public function simpanEditKategori()
    {
        $data = [
            'kode_kategori' => $this->request->getVar('kode_kategori'),
            'nama_kategori' => $this->request->getVar('nama_kategori')
        ];
        $this->Kategori->update($this->request->getVar('kode_kategori'), $data);
        return redirect()->to('data-kategori');
    }
    public function hapusKategori($kodekategori)
    {
        $syarat = [
            'kode_kategori' => $kodekategori
        ];
        $this->Kategori->where($syarat)->delete();
        return redirect()->to('data-kategori');
    }
}
