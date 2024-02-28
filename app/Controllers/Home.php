<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // echo view('layout/header');
        // echo view('layout/sidebar');
        echo view('login/page-login');
        // echo view('layout/footer');
    }
    public function dashboard()
    {
       
        echo view('dashboard');
    }
    public function logout(){
        session()->destroy();
        return redirect()->to('/');
}
}