<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'email',
        'username',
        'password'
    ];


    public function getData($id, $filter = null)
    {

        $data = '';
        if ($id != null) {
            $data = $this->find($id);
        } else {
            $data = $this->where($filter)->get();
        }
        return $data->getResult();
    }
}
