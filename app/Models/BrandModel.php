<?php

namespace App\Models;

use CodeIgniter\Model;

class BrandModel extends Model
{
    protected $table            = 'product_brand';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['name', 'slug', 'created_at', 'modified_at', 'deleted_at'];
}
