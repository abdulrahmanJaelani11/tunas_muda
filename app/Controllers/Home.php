<?php

namespace App\Controllers;

use App\Models\BeritaModel;
use App\Models\JurusanModel;

class Home extends BaseController
{
    protected $BeritaModel;
    protected $JurusanModel;

    function __construct()
    {
        $this->BeritaModel = new BeritaModel();
        $this->JurusanModel = new JurusanModel();
    }

    public function index()
    {
        $berita = $this->BeritaModel->getData(null, null, 9999);
        $this->data['berita'] =  $berita;

        $jurusan = $this->JurusanModel->getData(null, null, 9999);
        $this->data['jurusan'] =  $jurusan;

        return view('front/index', $this->data);
    }
}
