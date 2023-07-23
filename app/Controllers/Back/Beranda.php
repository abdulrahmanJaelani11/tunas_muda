<?php

namespace App\Controllers\Back;

use App\Controllers\BaseController;
use App\Models\UsersModel;

class Beranda extends BaseController
{
    protected $UsersModel;

    public function __construct()
    {
        $this->UsersModel = new UsersModel();
    }

    public function index()
    {
        return view('back/beranda');
    }

    public function ProsesLogin()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $data = $this->UsersModel->getData(null, ['email' => $email]);
        $respons = [];

        if ($data && $data[0]->password == $password) {
            $respons = [
                'status' => 200,
                'message' => 'Login Berhasil'
            ];
        } else {
            $respons = [
                'status' => 500,
                'message' => 'Login Gagal'
            ];
        }

        echo json_encode($respons);
    }
}
