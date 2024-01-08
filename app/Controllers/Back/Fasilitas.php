<?php

namespace App\Controllers\Back;

use App\Controllers\BaseController;
use App\Models\AnggotaModel;
use App\Models\FasilitasModel;
use App\Models\UsersModel;

class Fasilitas extends BaseController
{
    protected $v_url;
    protected $v_url_front;

    protected $UsersModel;
    protected $AnggotaModel;
    protected $FasilitasModel;
    protected $data;

    public function __construct()
    {
        $this->v_url = "back/fasilitas";
        $this->v_url_front = "front/fasilitas";

        $this->UsersModel = new UsersModel();
        $this->AnggotaModel = new AnggotaModel();
        $this->FasilitasModel = new FasilitasModel();
    }

    public function index()
    {
        $this->data['title'] = "Daftar Fasilitas";
        $this->data['data_fasilitas'] = $this->FasilitasModel->getData();
        return view($this->v_url . "/v_fasilitas", $this->data);
    }


    public function lists()
    {
        $start      = $this->request->getPost('start');
        $limit      = $this->request->getPost('length');
        $filters    = $this->request->getPost('filters');
        $order      = $this->request->getPost('order');

        // parameter untuk referensi di form balai
        $results = $this->FasilitasModel->getData(null, $start, $limit, $order, $filters);
        $totalfiltered = $this->FasilitasModel->getDataCnt($filters);
        $totaldata = $this->FasilitasModel->getDataCnt();
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
                    "nama_anggota" => $row->nama_fasilitas,
                    "panggilan" => $row->keterangan,
                    "status" => $aktif,
                )
            );
        }
        return $this->response->setJSON($build_array);
    }

    public function form($id = null)
    {
        if ($id != null) {
            $this->data['title'] = 'Edit Fasilitas';

            $data = $this->FasilitasModel->getData($id);
            $this->data['dt_berita'] = $data;
        } else {
            $this->data['title'] = 'Tambah Fasilitas';
        }

        return view($this->v_url . '/v_fasilitas_form', $this->data);
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
            $update = $this->FasilitasModel->update($id_berita, $data);
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

            $insert = $this->FasilitasModel->insert($data);

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

        $data = $this->FasilitasModel->getData($id);
        // dd($data);
        $this->data['dt_berita'] = $data;

        return view($this->v_url_front . '/v_berita_detail', $this->data);
    }

    public function hapus($id)
    {
        $data['aktif'] = 0;
        $data['updated_date'] = date('Y-m-d H:i:s');
        $del = $this->FasilitasModel->update($id, $data);
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
        $dt = $this->FasilitasModel->getAnggota();
        echo json_encode($dt);
    }
}
