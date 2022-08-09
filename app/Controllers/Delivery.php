<?php

namespace App\Controllers;

use App\Models\DeliveryModel;
use CodeIgniter\I18n\Time;

class Delivery extends BaseController
{
    public function __construct()
    {
        $this->delivery = new DeliveryModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Jasa Pengiriman',
            'delivery' => $this->delivery->findAll()
        ];
        return view('back-end/delivery/data', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Tambah Jasa Pengiriman'
        ];
        return view('back-end/delivery/add', $data);
    }

    public function save()
    {
        $expedition = $this->request->getVar('expedition');
        $shiping = $this->request->getVar('shiping');

        $params = [
            'expedition' => $expedition,
            'shiping'    => $shiping,
            'created_at' => Time::now('Asia/Jakarta', 'en_ID')
        ];

        $this->delivery->insert($params);
        return redirect()->to(site_url('jasa-pengiriman'))->with('success', 'Selamat data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        if ($id != null) {
            $query = $this->db->table('order_delivery')->getWhere(['id' => $id]);
            
            if ($query->resultID->num_rows > 0) {
                $data = [
                    'title' => 'Edit Jasa Pengiriman',
                    'delivery' => $query->getRow(),
                ];
        
                return view('back-end/delivery/edit', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($id)
    { 
        $expedition = $this->request->getVar('expedition');
        $shiping = $this->request->getVar('shiping');

        $param = [
            'expedition' => $expedition,
            'shiping'    => $shiping,
            'modified_at' => Time::now('Asia/Jakarta', 'en_ID')
        ];

        $this->db->table('order_delivery')->where(['id' => $id])->update($param);
        return redirect()->to(site_url('jasa-pengiriman'))->with('success', 'Selamat data berhasil diubah!');
    }

    public function delete($id)
    {
        $this->delivery->delete($id);
        return redirect()->to(site_url('jasa-pengiriman'))->with('success', 'Data berhasil dihapus!');
    }
}
