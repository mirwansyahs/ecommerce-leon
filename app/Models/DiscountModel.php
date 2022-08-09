<?php

namespace App\Models;

use CodeIgniter\Model;

class DiscountModel extends Model
{
    protected $table            = 'discount';
    protected $primaryKey       = 'discount_id';
    protected $allowedFields    = ['discount_name', 'discount_desc', 'discount_percent', 'active', 'created_at', 'modified_at', 'deleted_at'];
}
