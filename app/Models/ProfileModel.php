<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['username', 'password', 'image', 'first_name', 'last_name', 'email', 'telephone', 'level', 'status', 'created_at', 'modified_at'];
}
