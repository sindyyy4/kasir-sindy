<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Login extends BaseController
{
    public function index()
    {
        //
    }
    public function login()
    {
        return view('login/page-login');
    }

    public function prosesLogin()
    {
        $validasiForm = [
            'username' => 'required',
            'Password' => 'required'
        ];

        if ($this->validate($validasiForm)) {

            $pengguna = $this->user->getPengguna(
                $this->request->getPost('username'),
                $this->request->getPost('Password')
            );

            if (count($pengguna) == 1) {

                $dataSession = [
                    'nama_user' => $pengguna[0]['nama_user'],
                    'username' => $pengguna[0]['username'],
                    'password' => $pengguna[0]['password'],
                    'level' => $pengguna[0]['level'],
                    'sudahKahLogin' => true
                ];

                session()->set($dataSession);
                return redirect()->to('/dashboard');
            } else {
                // pesan kesalahan jika login gagal
                return redirect()->to('/')
                    ->with('pesan', '<div class="alert alert-danger" role= </div>')
                    ->withInput();
            }
        } else {
            return redirect()->to('/')
                ->with('pesan', '<div class="alert alert-danger" role="alert")
                </div>');
        }
    }

    
   
}

