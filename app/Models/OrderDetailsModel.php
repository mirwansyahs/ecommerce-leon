<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderDetailsModel extends Model
{
    protected $table            = 'order_details';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['invoice', 'user_id', 'delivery_id', 'resi', 'subtotal', 'shiping', 'total', 'payment_id', 'booking_date', 'delivery_date', 'date_received'];
}
