<?php

namespace App\Models;

use CodeIgniter\Model;

class ShoppingSessionModel extends Model
{
    protected $table            = 'Shopping_session';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['user_id', 'total', 'created_at', 'modified_at'];
}
