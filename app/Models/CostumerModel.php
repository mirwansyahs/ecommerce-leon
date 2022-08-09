<?php

namespace App\Models;

use CodeIgniter\Model;

class CostumerModel extends Model
{
    function getAll()
    {
        $builder = $this->db->table('user_address');
        $builder->join('user', 'user.id = user_address.user_id');
        $query = $builder->get();
        return $query->getResultArray();
    }
}
