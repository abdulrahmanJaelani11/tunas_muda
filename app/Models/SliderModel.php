<?php

namespace App\Models;

use CodeIgniter\Model;

class SliderModel extends Model
{
    protected $table = 'slider';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'img',
        'judul_ket',
        'keterangan',
        'aktif',
        'created_date',
        'created_by',
        'updated_date',
        'updated_by',
    ];


    public function getData($id = null, $offset = null, $limit = null, $order = null, $filters = null)
    {
        $builder = $this->db->table($this->table . ' a');
        $builder->select('*');
        $builder->where('a.aktif', 1);

        if ($id == null or $id == "") {
            if (!empty($filters)) {
                if (is_array($filters) && count($filters) >= 1) {
                    $builder->groupStart();
                    $builder->like('a.img', $filters[0]['value']);
                    $builder->orLike('a.judul_ket', $filters[0]['value']);
                    $builder->orLike('a.keterangan', $filters[0]['value']);
                    $builder->groupEnd();
                }
            }

            if (!empty($order)) {
                $builder->orderBy($order[0]['field'], $order[0]['dir'], TRUE);
            } else {
                $builder->orderBy('a.id', 'desc');
            }

            if (empty($offset)) $offset = 0;
            if (empty($limit)) $limit = 10;

            $builder->limit($limit, $offset);

            $this->_data = $builder->get()->getResult();
        } else {
            $builder->where("a.id", $id);

            $this->_data = $builder->get()->getRow();
        }

        // $this->_data = $builder->get()->getResult();

        return $this->_data;
    }

    function getDataCnt($filters = null)
    {
        $builder = $this->db->table($this->table . " a");

        $builder->select("count(a.id) as _cnt");
        $builder->where('a.aktif', 1);

        if (!empty($filters)) {
            if (is_array($filters) && count($filters) >= 1) {
                $builder->groupStart();
                $builder->like('a.img', $filters[0]['value']);
                $builder->orLike('a.judul_ket', $filters[0]['value']);
                $builder->orLike('a.keterangan', $filters[0]['value']);
                $builder->groupEnd();
            }
        }

        $this->_data = $builder->get()->getRow()->_cnt;

        return $this->_data;
    }

    function getSlider()
    {
        $builder = $this->db->table($this->table . ' a');
        $builder->select("a.*");
        $builder->where("a.aktif", 1);

        $data = $builder->get()->getResult();
        return $data;
    }
}
