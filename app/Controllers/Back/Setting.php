<?php

namespace App\Controllers\Back;

use App\Controllers\BaseController;
use App\Models\SitusModel;
use App\Models\SliderModel;
use App\Models\UsersModel;

class Setting extends BaseController
{
    protected $v_url;
    protected $v_url_front;
    protected $data;

    protected $UsersModel;
    protected $SitusModel;
    protected $SliderModel;

    public function __construct()
    {
        $this->v_url = "back/setting";
        $this->v_url_front = "front/setting/";

        $this->UsersModel = new UsersModel();
        $this->SitusModel = new SitusModel();
        $this->SliderModel = new SliderModel();
    }

    public function situs($id = null)
    {
        $this->data['title'] = "Pengaturan Situs";
        if (!empty($id)) {
            $dt_situs = $this->SitusModel->getData($id);
            $this->data['dt_situs'] = $dt_situs;
        }
        return view($this->v_url . '/v_situs_form', $this->data);
    }

    public function save_situs()
    {
        $nama_situs = $this->request->getPost('nama_situs');
        $email = $this->request->getPost('email');
        $slogan = $this->request->getPost('slogan');
        $alamat = $this->request->getPost('alamat');
        $tentang = $this->request->getPost('tentang');
        $visi = $this->request->getPost('visi');
        $misi = $this->request->getPost('misi');
        $sejarah = $this->request->getPost('sejarah');
        $sambutan_kepsek = $this->request->getPost('sambutan_kepsek');
        $id = $this->request->getPost('id');

        $data = [
            'nama_situs' => $nama_situs,
            'email' => $email,
            'slogan' => $slogan,
            'alamat' => $alamat,
            'tentang' => $tentang,
            'visi' => $visi,
            'misi' => $misi,
            'sejarah' => $sejarah,
            'sambutan_kepsek' => $sambutan_kepsek,
        ];

        if (empty($id)) {
            $data['created_date'] = date('Y-m-d H:i:s');
            // $data['created_by'] = $this->session;
            $insert = $this->SitusModel->insert($data);
            if ($insert) {
                $this->session->setFlashdata('message', "Data berhasil disimpan");
            } else {
                $this->session->setFlashdata('err', "Data gagal disimpan");
            }
        } else {
            $data['updated_date'] = date('Y-m-d H:i:s');
            // $data['updated_by'] = $this->session;
            $update = $this->SitusModel->update($id, $data);
            if ($update) {
                $this->session->setFlashdata('message', "Data berhasil di edit");
            } else {
                $this->session->setFlashdata('err', "Data gagal di edit");
            }
        }
        return redirect()->to(base_url('setting/situs/' . 1));
    }

    public function slider()
    {
        $this->data['title'] = "Daftar Slide";
        return view($this->v_url . '/slider/v_slider', $this->data);
    }

    public function lists_slider()
    { {
            $start      = $this->request->getPost('start');
            $limit      = $this->request->getPost('length');
            $filters    = $this->request->getPost('filters');
            $order      = $this->request->getPost('order');

            // parameter untuk referensi di form balai
            $results = $this->SliderModel->getData(null, $start, $limit, $order, $filters);
            $totalfiltered = $this->SliderModel->getDataCnt($filters);
            $totaldata = $this->SliderModel->getDataCnt();
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
                <a href="' . base_url("setting/slider/edit/" . $id) . '" class="btn btn-sm btn-info"><i class="feather icon-edit"></i></a>
                <button type="button" onclick="hapus(' . $id . ')" class="btn btn-sm btn-danger btn_hapus"><i class="feather icon-delete"></i></button>
                ';

                $img = '<img src="/' . $row->img . '" alt="" class="img-fluid img-thumbnail" style="width:100px;">';

                $aktif =  ($row->aktif) ? "<a href='javascript:void(0)' class='atr_active' data-item-active='master/organisasi/deactivate/" . $id . "' data-confirm-message='Anda yakin ingin menonaktifkan organisasi ini?'><i class='fa fa-check text-success'>&nbsp;</i></a>" :
                    "<a href='javascript:void(0)' class='atr_active' data-item-active='master/organisasi/activate/" . $id . "' data-confirm-message='Anda yakin ingin mengaktifkan organisasi ini?'><i class='fa fa-times text-danger'>&nbsp;</i></a>";

                array_push(
                    $build_array["data"],
                    array(
                        "aksi" => $btnAction,
                        "img" => $img,
                        "judul_ket" => $row->judul_ket,
                        "keterangan" => $row->keterangan,
                        "status" => $aktif,
                    )
                );
            }
            return $this->response->setJSON($build_array);
        }
    }

    public function form_slider($id = null)
    {
        if (!empty($id)) {
            $this->data['title'] = "Edit Slide";
            $slider = $this->SliderModel->getData($id);
            $this->data['slider'] = $slider;
        } else {
            $this->data['title'] = "Tambah Slide";
        }
        return view($this->v_url . '/slider/v_slider_form', $this->data);
    }

    public function save_slider()
    {
        $judul_ket = $this->request->getPost('judul_ket');
        $keterangan = $this->request->getPost('keterangan');
        $id = $this->request->getPost('id');

        $path = 'assets/images/slide/';
        if (isset($_FILES['slide1'])) {
            $file_slide1 = $this->request->getFile('slide1');
            if ($file_slide1->isValid() && !$file_slide1->hasMoved()) {
                $nama_file = $file_slide1->getRandomName();
                $file_slide1->move($path, $nama_file);
                $data['img'] = $path . $nama_file;
            }
        }
        $data['judul_ket'] = $judul_ket;
        $data['keterangan'] = $keterangan;
        $data['aktif'] = 1;

        if (!empty($id)) {
            $data['updated_date'] = date('Y-m-d H:i:s');
            $this->SliderModel->update($id, $data);
        } else {
            $data['created_date'] = date('Y-m-d H:i:s');
            $this->SliderModel->insert($data);
        }

        $this->session->setFlashdata('message', 'Berhasil Menambahkan slider');
        return redirect()->to(base_url('setting/slider'));
    }

    public function sejarah()
    {
        $data = $this->SitusModel->getData(null, null, 9999);
        $sejarah = $data[0]->sejarah;
        $this->data['title'] = "Sejarah";
        $this->data['sejarah'] = $sejarah;
        return view($this->v_url_front . 'sejarah/v_sejarah', $this->data);
    }

    public function sambutan_kepsek()
    {
        $data = $this->SitusModel->getData(null, null, 9999);
        $sambutan_kepsek = $data[0]->sambutan_kepsek;
        $this->data['title'] = "Sambutan Kepala Sekolah";
        $this->data['sambutan_kepsek'] = $sambutan_kepsek;
        return view($this->v_url_front . 'sambutan_kepsek/v_sambutan_kepsek', $this->data);
    }

    public function visi_misi()
    {
        $data = $this->SitusModel->getData(null, null, 9999);
        $visi_misi = $data[0];
        $this->data['title'] = "Visi & Misi";
        $this->data['visi_misi'] = $visi_misi;
        return view($this->v_url_front . 'visi_misi/v_visi_misi', $this->data);
    }
}
