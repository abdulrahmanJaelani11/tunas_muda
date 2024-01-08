<?php

namespace App\Controllers\Back;

use App\Controllers\BaseController;
use App\Models\JurusanModel;
use App\Models\UsersModel;

class Jurusan extends BaseController
{
    protected $v_url;

    protected $UsersModel;
    protected $JurusanModel;
    protected $data;

    public function __construct()
    {
        $this->v_url = "back/jurusan";

        $this->UsersModel = new UsersModel();
        $this->JurusanModel = new JurusanModel();
    }

    public function index()
    {
        $this->data['title'] = "Daftar Jurusan";
        return view($this->v_url . "/v_jurusan", $this->data);
    }

    public function lists()
    {
        $start      = $this->request->getPost('start');
        $limit      = $this->request->getPost('length');
        $filters    = $this->request->getPost('filters');
        $order      = $this->request->getPost('order');

        // parameter untuk referensi di form balai
        $results = $this->JurusanModel->getData(null, $start, $limit, $order, $filters);
        $totalfiltered = $this->JurusanModel->getDataCnt($filters);
        $totaldata = $this->JurusanModel->getDataCnt();
        $maxpage = ceil(intval($totalfiltered) / intval($limit));

        $build_array = array(
            "last_page" => $maxpage,
            "recordsTotal" => $totaldata,
            "recordsFiltered" => $totalfiltered,
            "data" => array()
        );

        foreach ($results as $row) {
            $id = $row->id;

            $btnAction = '
            <a href="' . base_url("jurusan/edit/" . $id) . '" class="btn btn-sm btn-info"><i class="feather icon-edit"></i></a>
            <button type="button" onclick="console.log("tes");" class="btn btn-sm btn-danger btn_hapus"><i class="feather icon-delete"></i></button>
            ';

            $aktif =  ($row->aktif) ? "<a href='javascript:void(0)' class='atr_active' data-item-active='master/organisasi/deactivate/" . $id . "' data-confirm-message='Anda yakin ingin menonaktifkan organisasi ini?'><i class='fa fa-check text-success'>&nbsp;</i></a>" :
                "<a href='javascript:void(0)' class='atr_active' data-item-active='master/organisasi/activate/" . $id . "' data-confirm-message='Anda yakin ingin mengaktifkan organisasi ini?'><i class='fa fa-times text-danger'>&nbsp;</i></a>";

            array_push(
                $build_array["data"],
                array(
                    "aksi" => $btnAction,
                    "nama_jurusan" => $row->nama_jurusan,
                    "judul" => $row->judul,
                    "keterangan" => $row->keterangan,
                    "img" => $row->img,
                    "status" => $aktif,
                )
            );
        }
        return $this->response->setJSON($build_array);
    }

    public function form($id = null)
    {
        if ($id != null) {
            $this->data['title'] = 'Edit Jurusan';

            $data = $this->JurusanModel->getData($id);
            $this->data['dt_jurusan'] = $data;
        } else {
            $this->data['title'] = 'Tambah Jurusan';
        }

        return view($this->v_url . '/v_jurusan_form', $this->data);
    }

    public function simpan()
    {
        $id_jurusan = $this->request->getPost('id');
        $nama_jurusan = $this->request->getPost('nama_jurusan');
        $judul = $this->request->getPost('judul');
        $keterangan = $this->request->getPost('keterangan');

        if (isset($_FILES['file'])) {
            $file = $this->request->getFile('file');
            $nama_file = $file->getRandomName();
            $file->move('uploads/jurusan/img', $nama_file);
            $data['img'] = 'uploads/jurusan/img/' . $nama_file;
        }

        $data['nama_jurusan'] = $nama_jurusan;
        $data['judul'] = $judul;
        $data['keterangan'] = $keterangan;
        $data['aktif'] = 1;

        if (!empty($id_jurusan)) {
            $data['updated_date'] = date('Y-m-d H:i:s');
            $update = $this->JurusanModel->update($id_jurusan, $data);
            if ($update) {
                $respons = [
                    'status' => 200,
                    'message' => 'Berhasil mengupdate data jurusan'
                ];

                echo json_encode($respons);
            }
        } else {
            $data['created_date'] = date('Y-m-d H:i:s');

            $insert = $this->JurusanModel->insert($data);

            if ($insert) {
                $respons = [
                    'status' => 200,
                    'message' => 'Berhasil menambahkan data jurusan'
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

    public function hapus($id)
    {
        $data['aktif'] = 0;
        $data['updated_date'] = date('Y-m-d H:i:s');
        $del = $this->JurusanModel->update($id, $data);
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
        $dt = $this->JurusanModel->getAnggota();
        echo json_encode($dt);
    }
}
