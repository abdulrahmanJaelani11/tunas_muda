<?php

namespace App\Controllers\Back;

use App\Controllers\BaseController;
use App\Models\AnggotaModel;
use App\Models\UsersModel;

class Anggota extends BaseController
{
    protected $v_url;

    protected $UsersModel;
    protected $AnggotaModel;
    protected $data;

    public function __construct()
    {
        $this->v_url = "back/anggota";

        $this->UsersModel = new UsersModel();
        $this->AnggotaModel = new AnggotaModel();
    }

    public function index()
    {
        $this->data['title'] = "Daftar Anggota";
        return view($this->v_url . "/v_anggota", $this->data);
    }

    public function lists()
    {
        $start      = $this->request->getPost('start');
        $limit      = $this->request->getPost('length');
        $filters    = $this->request->getPost('filters');
        $order      = $this->request->getPost('order');

        // parameter untuk referensi di form balai
        $results = $this->AnggotaModel->getData(null, $start, $limit, $order, $filters);
        $totalfiltered = $this->AnggotaModel->getDataCnt($filters);
        $totaldata = $this->AnggotaModel->getDataCnt();
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
            <a href="' . base_url("anggota/edit/" . $id) . '" class="btn btn-sm btn-info"><i class="feather icon-edit"></i></a>
            <button type="button" onclick="console.log("tes");" class="btn btn-sm btn-danger btn_hapus"><i class="feather icon-delete"></i></button>
            ';

            $aktif =  ($row->aktif) ? "<a href='javascript:void(0)' class='atr_active' data-item-active='master/organisasi/deactivate/" . $id . "' data-confirm-message='Anda yakin ingin menonaktifkan organisasi ini?'><i class='fa fa-check text-success'>&nbsp;</i></a>" :
                "<a href='javascript:void(0)' class='atr_active' data-item-active='master/organisasi/activate/" . $id . "' data-confirm-message='Anda yakin ingin mengaktifkan organisasi ini?'><i class='fa fa-times text-danger'>&nbsp;</i></a>";

            array_push(
                $build_array["data"],
                array(
                    "aksi" => $btnAction,
                    "nama_anggota" => $row->nama_anggota,
                    "panggilan" => $row->panggilan,
                    "email" => $row->email,
                    "no_wa" => $row->no_wa,
                    "status" => $aktif,
                )
            );
        }
        return $this->response->setJSON($build_array);
    }

    public function form($id = null)
    {
        if ($id != null) {
            $this->data['title'] = 'Edit Anggota';

            $data = $this->AnggotaModel->find($id);
            $this->data['dt_anggota'] = $data;
        } else {
            $this->data['title'] = 'Tambah Anggota';
        }

        return view($this->v_url . '/v_anggota_form', $this->data);
    }

    public function simpan()
    {
        $id_anggota = $this->request->getPost('id');
        $nama_anggota = $this->request->getPost('nama_anggota');
        $panggilan = $this->request->getPost('panggilan');
        $email = $this->request->getPost('email');
        $no_wa = $this->request->getPost('no_wa');
        $status = $this->request->getPost('status');

        if (isset($_FILES['file'])) {
            $file = $this->request->getFile('file');
            $nama_file = $file->getRandomName();
            $file->move('uploads/foto_anggota', $nama_file);
            $data['img'] = 'uploads/foto_anggota/' . $nama_file;
        }

        $data['nama_anggota'] = $nama_anggota;
        $data['panggilan'] = $panggilan;
        $data['email'] = $email;
        $data['no_wa'] = $no_wa;
        $data['status'] = $status;
        $data['aktif'] = 1;

        if (!empty($id_anggota)) {
            $data['updated_date'] = date('Y-m-d H:i:s');
            $update = $this->AnggotaModel->update($id_anggota, $data);
            if ($update) {
                $respons = [
                    'status' => 200,
                    'message' => 'Berhasil mengupdate data anggota'
                ];

                echo json_encode($respons);
            }
        } else {
            $data['created_date'] = date('Y-m-d H:i:s');

            $insert = $this->AnggotaModel->insert($data);

            if ($insert) {
                $respons = [
                    'status' => 200,
                    'message' => 'Berhasil menambahkan data anggota'
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
        $del = $this->AnggotaModel->update($id, $data);
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
        $dt = $this->AnggotaModel->getAnggota();
        echo json_encode($dt);
    }
}
