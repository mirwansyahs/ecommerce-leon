<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\BrandModel;
use App\Models\DiscountModel;
use App\Models\CategoryModel;
use App\Models\ProfileModel;
use App\Models\OrderModel;
use CodeIgniter\I18n\Time;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->product = new ProductModel();
        $this->brand = new BrandModel();
        $this->discount = new DiscountModel();
        $this->category = new CategoryModel();
        $this->costumer = new ProfileModel();
        $this->order = new OrderModel();
    }

    public function index()
    {
        $data = [
            'title'         => 'Dashboard',
            'product'       => $this->product->get()->getNumRows(),
            'brand'         => $this->brand->get()->getNumRows(),
            'discount'      => $this->discount->get()->getNumRows(),
            'category'      => $this->category->get()->getNumRows(),
            'costumer'      => $this->costumer->where('level', 'user')->get()->getNumRows(),
            'orderIn'       => $this->order->where('status_item', 'in')->get()->getNumRows(),
            'orderDelivery' => $this->order->where('status_item', 'delivery')->get()->getNumRows(),
            'orderComplete' => $this->order->where('status_item', 'complete')->get()->getNumRows(),
            'incomePerDay'  => $this->order->select('SUM(order_product.subtotal)')->groupBy('DAY(date_received)')->orderBy('order_id', 'DESC')->first(),
            'incomePerMonth'=> $this->order->select('SUM(order_product.subtotal)')->groupBy('MONTH(date_received)')->orderBy('order_id', 'DESC')->first(),
            'incomePerYear' => $this->order->select('SUM(order_product.subtotal)')->groupBy('YEAR(date_received)')->orderBy('order_id', 'DESC')->first(),
            'graph'         => $this->db->query("SELECT date_received, subtotal FROM order_product WHERE DATE_FORMAT(date_received, '%Y-%m') ORDER BY date_received ASC")->getResultArray(),
        ];

        return view('back-end/index', $data);
    }
}
