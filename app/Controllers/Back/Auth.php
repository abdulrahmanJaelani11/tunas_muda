<?php

namespace App\Controllers\Back;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class Auth extends BaseController
{
    protected $UsersModel;

    public function __construct()
    {
        $this->UsersModel = new UsersModel();
    }

    public function login()
    {
        return view('back/login');
    }

    public function ProsesLogin()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $data = $this->UsersModel->getData(null, ['email' => $email]);
        $respons = [];

        if ($data && $data[0]->password == $password) {
            $_SESSION['login'] = true;
            $_SESSION['user_id'] = $data[0]->id;
            $_SESSION['username'] = $data[0]->username;
            $_SESSION['email'] = $data[0]->email;

            // $respons = [
            //     'status' => 200,
            //     'message' => 'Login Berhasil'
            // ];
            return redirect()->to(base_url('beranda'));
        } else {
            // $respons = [
            //     'status' => 500,
            //     'message' => 'Login Gagal'
            // ];
            $this->session->setFlashdata('error', 'Login Gagal');
            return redirect()->back()->withInput();
        }

        // echo json_encode($respons);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}
