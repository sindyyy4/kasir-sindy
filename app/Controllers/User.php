<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class User extends BaseController
{
    public function index()
    {
     return view('login/page-login');
    }
    public function tampilPengguna()
    {
      $data = [
            'listPengguna' => $this->user->findAll()
        ];
        return view('user/data-pengguna', $data);
    }
    public function tambahPengguna()
    {
      $data = [
            'listPengguna' => $this->user->findAll()
        ];
        return view('user/tambah-pengguna', $data);
    }
    public function simpanPengguna()
    {
        $validation =\Config\Services::validation();
        $validation->setRule('password','Password','required|is_unique[tbl_user.password]',[
            'is_unique' => '{field} sudah di gunakan',
        ]);

        $datavalid =[
            'password'=>$this->request->getPost('password'),
        ];
        if(!$validation->run($datavalid)){
            return redirect()->back()->withInput()->with('errors',$validation->getErrors());
        }
     $data=[
         'username'=>$this->request->getVar('username'),
         'nama_user'=>$this->request->getVar('nama_user'),
         'password'=>$this->request->getVar('password'),
         'level'=>$this->request->getVar('level')

     ];

    //  var_dump($data);
     $this->user->save($data);
     return redirect()->to('data-pengguna');
    }
    public function login()
    {
        // 1 membuat validasi form
        $validasiForm = [
            'username' => 'required',
            'password' => 'required'
        ];

        // pengujian validasi form
        if ($this->validate($validasiForm)) {
            // siapkan 2 var yaitu $user dan $pass
            $user = $this->request->getPost('username');
            $pass = $this->request->getPost('password');

            // var digunakan untuk mengecek siapa yang login 
            $whereLogin = [
                'username' => $user,
                'password' => $pass
            ];

            //select = form user where username= '$user' and password= '$pass'
            $cekLogin = $this->user->getUser($user, $pass);

            // var_dump($ceklogin);
            if (count($cekLogin) == 1) { //untuk kasus sukses login
            // jika ditemukan 1 data
            $dataSession = [
                'nama_user' => $cekLogin[0]['nama_user'],
                'username' => $cekLogin[0]['username'],
                'password' => $cekLogin[0]['password'],
                'level' => $cekLogin[0]['level'],
                'sudahKahLogin' => true
            ];
            session()->set($dataSession);

            return redirect()->to('/dashboard');
            } else {
                // jika tidak ditemukan data apapun
                return redirect()->to('/login')->with('pesan', 
                '<p class="text-danger text-center">Username atau Password Salah.</p>');
            }
        }
        return view('user/login');
    }
    public function logout(){
        session()->destroy();
        return redirect()->to('login');
    }
   public function editUser($id_user){
    $syarat=[
        'id_user'=>$id_user
    ];
    $data=[
    
        'dataPengguna'=> $this->user->where($syarat)->findAll(),
    ];
    return view('user/edit-pengguna',$data);
}
    public function updateUser(){
       $data =[
        'id_user'=>$this->request->getVar('id_user'),
        'nama_user'=>$this->request->getVar('nama_user'),
        'username'=>$this->request->getVar('username'),
        'password'=>$this->request->getVar('password'),
        'level'=>$this->request->getVar('level')
       ];
       $this->user->update($this->request->getVar('id_user'), $data);
        session()->setFlashdata('pesan', 'data berhasil di edit!!');
        return redirect()->to('/data-pengguna');
    }
public function hapusUser($id_user)
{
    $this->user->delete($id_user);

    return redirect()->to('/data-pengguna');
}
}
