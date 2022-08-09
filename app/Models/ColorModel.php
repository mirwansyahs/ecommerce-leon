<?php

namespace App\Models;

use CodeIgniter\Model;

class ColorModel extends Model
{
    protected $table            = 'color';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['product_id', 'color', 'created_at', 'modified_at'];
}
