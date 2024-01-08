<?php

namespace App\Controllers\Back;

use App\Controllers\BaseController;
use App\Models\AnggotaModel;
use App\Models\BeritaModel;
use App\Models\UsersModel;

class Berita extends BaseController
{
    protected $v_url;
    protected $v_url_front;

    protected $UsersModel;
    protected $AnggotaModel;
    protected $BeritaModel;
    protected $data;

    public function __construct()
    {
        $this->v_url = "back/berita";
        $this->v_url_front = "front/berita";

        $this->UsersModel = new UsersModel();
        $this->AnggotaModel = new AnggotaModel();
        $this->BeritaModel = new BeritaModel();
    }

    public function index()
    {
        $this->data['title'] = "Daftar Berita";
        $this->data['data_berita'] = $this->BeritaModel->getData();
        return view($this->v_url . "/v_berita", $this->data);
    }

    public function form($id = null)
    {
        if ($id != null) {
            $this->data['title'] = 'Edit Berita';

            $data = $this->BeritaModel->getData($id);
            $this->data['dt_berita'] = $data;
        } else {
            $this->data['title'] = 'Tambah Berita';
        }

        return view($this->v_url . '/v_berita_form', $this->data);
    }

    public function simpan()
    {
        $id_berita = $this->request->getPost('id');
        $judul = $this->request->getPost('judul');
        $keterangan = $this->request->getPost('keterangan');

        if (isset($_FILES['img'])) {
            $file = $this->request->getFile('img');
            $nama_file = $file->getRandomName();
            $file->move('uploads/foto_berita', $nama_file);
            $data['img'] = 'uploads/foto_berita/' . $nama_file;
        }

        $data['judul'] = htmlentities($judul);
        $data['keterangan'] = htmlentities($keterangan);
        $data['aktif'] = 1;

        if (!empty($id_berita)) {
            $data['updated_date'] = date('Y-m-d H:i:s');
            $data['updated_by'] = $this->session->user_id;
            $update = $this->BeritaModel->update($id_berita, $data);
            if ($update) {
                $respons = [
                    'status' => 200,
                    'message' => 'Berhasil mengupdate berita'
                ];

                echo json_encode($respons);
            }
        } else {
            $data['created_date'] = date('Y-m-d H:i:s');
            $data['created_by'] = $this->session->user_id;

            $insert = $this->BeritaModel->insert($data);

            if ($insert) {
                $respons = [
                    'status' => 200,
                    'message' => 'Berhasil menambahkan berita'
                ];

                echo json_encode($respons);
            } else {
                $respons = [
                    'status' => 500,
                    'message' => 'Gagal menambahkan data anggota'
                ];

                echo json_encode($respons);
            }
        }
    }

    public function detail($id = null)
    {
        $this->data['title'] = 'Detail Berita';

        $data = $this->BeritaModel->getData($id);
        // dd($data);
        $this->data['dt_berita'] = $data;

        return view($this->v_url_front . '/v_berita_detail', $this->data);
    }

    public function hapus($id)
    {
        $data['aktif'] = 0;
        $data['updated_date'] = date('Y-m-d H:i:s');
        $del = $this->BeritaModel->update($id, $data);
        // $del = 1;
        if ($del) {
            $respons = [
                'status' => 200,
                'message' => 'Berhasil manghapus anggota'
            ];

            echo json_encode($respons);
        }
    }

    public function getData()
    {
        $dt = $this->BeritaModel->getAnggota();
        echo json_encode($dt);
    }
}
