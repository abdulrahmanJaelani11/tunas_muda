<?php

namespace App\Models;

use CodeIgniter\Model;

class FasilitasModel extends Model
{
    protected $table = 'ref_fasilitas';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama_fasilitas',
        'keterangan',
        'created_date',
        'created_by',
        'updated_by',
        'updated_date',
    ];


    public function getData($id = null, $offset = null, $limit = null, $order = null, $filters = null)
    {
        $builder = $this->db->table($this->table . ' a');
        $builder->select('a.*');

        if ($id == null or $id == "") {
            if (!empty($filters)) {
                if (is_array($filters) && count($filters) >= 1) {
                    $builder->groupStart();
                    $builder->like('a.nama_fasilitas', $filters[0]['value']);
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

        if (!empty($filters)) {
            if (is_array($filters) && count($filters) >= 1) {
                $builder->groupStart();
                $builder->like('a.nama_fasilitas', $filters[0]['value']);
                $builder->orLike('a.keterangan', $filters[0]['value']);
                $builder->groupEnd();
            }
        }

        $this->_data = $builder->get()->getRow()->_cnt;

        return $this->_data;
    }

    function getAnggota()
    {
        $builder = $this->db->table($this->table . ' a');
        $builder->select("a.*");
        $builder->where("a.aktif", 1);

        $data = $builder->get()->getResult();
        return $data;
    }
}