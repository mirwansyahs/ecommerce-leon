<?php

namespace App\Controllers;

use App\Models\OrderModel;

class Report extends BaseController
{
    public function __construct()
    {
        $this->order = new OrderModel();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'Laporan',
        ];

        return view('back-end/report/data', $data);
    }

    public function printReport()
    {
        $start_date = $this->request->getVar('start_date');
        $end_date = $this->request->getVar('end_date');

        $report = $this->order->report($start_date, $end_date);

        $data = [
            'title'      => 'Print Laporan',
            'report'     => $report,
            'start_date' => $start_date,
            'end_date'   => $end_date,
        ];

        return view('back-end/report/print', $data);
    }
}
