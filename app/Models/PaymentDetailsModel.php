<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentDetailsModel extends Model
{
    protected $table            = 'payment_details';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['user_payment_id', 'gross_amount', 'bank', 'transaction_status', 'transaction_time'];
}
