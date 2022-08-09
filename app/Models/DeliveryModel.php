<?php

namespace App\Models;

use CodeIgniter\Model;

class DeliveryModel extends Model
{
    protected $table            = 'order_delivery';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['expedition', 'shiping', 'created_at', 'modified_at'];
}
