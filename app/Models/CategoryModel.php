<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table            = 'product_category';
    protected $primaryKey       = 'category_id';
    protected $allowedFields    = ['category_name', 'category_slug', 'category_desc', 'created_at', 'modified_at', 'deleted_at'];
}
