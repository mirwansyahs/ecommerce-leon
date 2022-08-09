<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\DiscountModel;
use CodeIgniter\I18n\Time;

class Discount extends BaseController
{
    public function __construct()
    {
        $this->discount = new DiscountModel();
        helper('text');
    }

    public function index()
    {
        $data = [
            'title' => 'Diskon',
            'discount' => $this->discount->findAll()
        ];

        return view('back-end/discount/data', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Tambah Diskon'
        ];
        return view('back-end/discount/add', $data);
    }

    public function save()
    {
        $name = $this->request->getVar('name');
        $desc = $this->request->getVar('desc');
        $percent = $this->request->getVar('percent');
        $active = $this->request->getVar('active');

        $params = [
            'discount_name' => $name,
            'discount_desc' => $desc,
            'discount_percent' => $percent,
            'active' => $active,
            'created_at' => Time::now('Asia/Jakarta', 'en_ID')
        ];

        $this->discount->insert($params);
        return redirect()->to(site_url('diskon'))->with('success', 'Selamat data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        if ($id != null) {
            $query = $this->db->table('discount')->getWhere(['discount_id' => $id]);
            
            if ($query->resultID->num_rows > 0) {
                $data = [
                    'title' => 'Edit Diskon',
                    'discount' => $query->getRow(),
                ];
        
                return view('back-end/discount/edit', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($id)
    {
        $name = $this->request->getVar('name');
        $desc = $this->request->getVar('desc');
        $percent = $this->request->getVar('percent');
        $active = $this->request->getVar('active');

        $params = [
            'discount_name' => $name,
            'discount_desc' => $desc,
            'discount_percent' => $percent,
            'active' => $active,
            'modified_at' => Time::now('Asia/Jakarta', 'en_ID')
        ];

        $this->db->table('discount')->where(['discount_id' => $id])->update($params);
        return redirect()->to(site_url('diskon'))->with('success', 'Selamat data berhasil diubah!');
    }

    public function delete($id)
    {
        $this->discount->delete($id);
        return redirect()->to(site_url('diskon'))->with('success', 'Selamat data berhasil dihapus!');
    }
}
