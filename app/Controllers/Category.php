<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use CodeIgniter\I18n\Time;

class Category extends BaseController
{
    public function __construct()
    {
        $this->category = new CategoryModel();
        helper('text');
    }

    public function index()
    {
        $data = [
            'title' => 'Kategori',
            'category' => $this->category->findAll()
        ];
        return view('back-end/category/data', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Tambah Kategori'
        ];
        return view('back-end/category/add', $data);
    }

    public function save()
    {
        $name = $this->request->getVar('name');
        $desc = $this->request->getVar('desc');

        $params = [
            'category_name' => $name,
            'category_slug' => strtolower(url_title($name)),
            'category_desc' => $desc,
            'created_at' => Time::now('Asia/Jakarta', 'en_ID')
        ];

        $this->category->insert($params);
        return redirect()->to(site_url('kategori'))->with('success', 'Selamat data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        if ($id != null) {
            $query = $this->db->table('product_category')->getWhere(['category_id' => $id]);
            
            if ($query->resultID->num_rows > 0) {
                $data = [
                    'title' => 'Edit Kategori',
                    'category' => $query->getRow(),
                ];
        
                return view('back-end/category/edit', $data);
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

        $param = [
            'category_name' => $name,
            'category_desc' => $desc,
            'category_slug' => strtolower(url_title($name)),
            'modified_at' => Time::now('Asia/Jakarta', 'en_ID')
        ];

        $this->db->table('product_category')->where(['category_id' => $id])->update($param);
        return redirect()->to(site_url('kategori'))->with('success', 'Selamat data berhasil diubah!');
    }

    public function delete($id)
    {
        $this->category->delete($id);
        return redirect()->to(site_url('kategori'))->with('success', 'Data berhasil dihapus!');
    }
}
