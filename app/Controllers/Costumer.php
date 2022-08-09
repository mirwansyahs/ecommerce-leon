<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CostumerModel;

class Costumer extends BaseController
{
    public function __construct()
    {
        $this->costumer = new CostumerModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Pelanggan',
            'costumer' => $this->costumer->getAll()
        ];

        return view('back-end/costumer/data', $data);
    }
}
