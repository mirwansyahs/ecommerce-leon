<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table            = 'order_product';
    protected $primaryKey       = 'order_id';
    protected $allowedFields    = ['invoice', 'user_id', 'product_id', 'size_item', 'color_item', 'qty', 'status_item', 'delivery_id', 'resi', 'subtotal', 'shiping', 'total', 'payment_id', 'booking_date', 'delivery_date', 'date_received'];

    function getAll()
    {
        $builder = $this->db->table('order_product');
        $builder->join('user', 'user.id = order_product.user_id');
        $builder->join('product', 'product.id = order_product.product_id');
        $builder->join('order_delivery', 'order_delivery.id = order_product.delivery_id');
        $builder->join('payment_details', 'payment_details.id = order_product.payment_id');
        $builder->join('user_address', 'user_address.id = user.id');
        $query = $builder->get();
        return $query->getResultArray();
    }

    function report($start_date, $end_date) {
        $builder = $this->db->table('order_product');
        $builder->join('user', 'user.id = order_product.user_id');
        $builder->join('product', 'product.id = order_product.product_id');
        $builder->join('order_delivery', 'order_delivery.id = order_product.delivery_id');
        $builder->join('payment_details', 'payment_details.id = order_product.payment_id');
        $builder->join('user_address', 'user_address.id = user.id');
        $builder->where('date_received >=', $start_date)->where('date_received <=', $end_date);
        $query = $builder->get();
        return $query->getResultArray();
    }
}
