<?php

namespace App\Controllers;

use App\Models\BrandModel;
use CodeIgniter\I18n\Time;

class Brand extends BaseController
{
    public function __construct()
    {
        $this->brand = new BrandModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Brand',
            'brand' => $this->brand->findAll()
        ];
        return view('back-end/brand/data', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Tambah Brand'
        ];
        return view('back-end/brand/add', $data);
    }

    public function save()
    {
        $name = $this->request->getVar('name');

        $params = [
            'name' => $name,
            'slug' => strtolower(url_title($name)),
            'created_at' => Time::now('Asia/Jakarta', 'en_ID')
        ];

        $this->brand->insert($params);
        return redirect()->to(site_url('brand'))->with('success', 'Selamat data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        if ($id != null) {
            $query = $this->db->table('product_brand')->getWhere(['id' => $id]);
            
            if ($query->resultID->num_rows > 0) {
                $data = [
                    'title' => 'Edit Brand',
                    'brand' => $query->getRow(),
                ];
        
                return view('back-end/brand/edit', $data);
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

        $param = [
            'name' => $name,
            'slug' => strtolower(url_title($name)),
            'modified_at' => Time::now('Asia/Jakarta', 'en_ID')
        ];

        $this->db->table('product_brand')->where(['id' => $id])->update($param);
        return redirect()->to(site_url('brand'))->with('success', 'Selamat data berhasil diubah!');
    }

    public function delete($id)
    {
        $this->brand->delete($id);
        return redirect()->to(site_url('brand'))->with('success', 'Data berhasil dihapus!');
    }
}
