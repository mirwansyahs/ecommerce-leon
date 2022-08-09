<?php

namespace App\Models;

use CodeIgniter\Model;

class UserPaymentModel extends Model
{
    protected $table            = 'user_payment';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['user_id', 'payment_type', 'va_number', 'expiry'];
}
