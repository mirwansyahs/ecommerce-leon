<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingModel extends Model
{
    protected $table            = 'store';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['name', 'image', 'email', 'telephone', 'about', 'address', 'facebook', 'instagram', 'twitter', 'created_at', 'modified_at'];
}
