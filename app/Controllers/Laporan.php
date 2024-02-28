<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Laporan extends BaseController
{
    public function index()
    {
        return view('laporan/data-laporan');
    }

    public function tampilLaporan()
    {
        $data =[
            'listProduk'=>$this->produk->getLaporanProduk()
        ];

        // $listProduk = $this->produk->getLaporanProduk();

        return view('laporan/data-laporan', $data);
    }
}
