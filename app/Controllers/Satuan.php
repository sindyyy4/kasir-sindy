<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Satuan extends BaseController
{
    public function tampilSatuan()
    {
        $data = [
            'listSatuan' => $this->satuan->findAll()
        ];
        return view('satuan/data-satuan', $data);
    }
    public function tambahSatuan(){

        return view('satuan/tambah-satuan');
    }
    public function simpanSatuan()
    {
        $validation =\Config\Services::validation();
        $validation->setRule('nama_satuan','Nama Satuan','required|is_unique[tbl_satuan.nama_satuan]',[
            'is_unique' => '{field} sudah di gunakan',
        ]);

        $datavalid =[
            'nama_satuan'=>$this->request->getPost('nama_satuan'),
        ];
        if(!$validation->run($datavalid)){
            return redirect()->back()->withInput()->with('errors',$validation->getErrors());
        }
        $data =
         [
            'nama_satuan'=> $this->request->getVar('nama_satuan')
    ];
    $this->satuan->save($data);
    return redirect()->to('/data-satuan');
    }
    public function editSatuan($idsatuan)
    {

        $syarat = [
            'id_satuan' => $idsatuan
        ];

        $data = [
            'detailSatuan' => $this->satuan->where($syarat)->findAll(),
        ];
        return view('Satuan/edit-satuan', $data);
    }

    public function simpanEditSatuan()
    {
        $data = [
            'id_satuan' => $this->request->getVar('id_satuan'),
            'nama_satuan' => $this->request->getVar('nama_satuan')
        ];
        $this->satuan->update($this->request->getVar('id_satuan'), $data);
        return redirect()->to('data-satuan');
    }
    public function hapusSatuan($idsatuan)
    {
        $syarat = [
            'id_satuan' => $idsatuan
        ];
        $this->satuan->where($syarat)->delete();
        return redirect()->to('data-satuan');
    }
}
