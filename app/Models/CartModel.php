<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table            = 'cart_item';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['session_id', 'product_id', 'size', 'color', 'quantity', 'created_at', 'modified_at'];
}
