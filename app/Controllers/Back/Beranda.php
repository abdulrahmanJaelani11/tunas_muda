<?php

namespace App\Controllers\Back;

use App\Controllers\BaseController;
use App\Models\SitusModel;
use App\Models\UsersModel;

class Beranda extends BaseController
{
    protected $UsersModel;
    protected $SitusModel;
    protected $data;

    public function __construct()
    {
        $this->UsersModel = new UsersModel();
        $this->SitusModel = new SitusModel();
    }

    public function index()
    {
        $this->data['title'] = "Beranda";

        return view('back/beranda', $this->data);
    }
}
