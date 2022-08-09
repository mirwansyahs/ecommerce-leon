<?php

namespace App\Controllers;

use App\Models\ColorModel;
use App\Models\ProductModel;
use CodeIgniter\I18n\Time;

class Color extends BaseController
{
    public function __construct()
    {
        $this->color = new ColorModel();
        $this->product = new ProductModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Warna',
            'color' => $this->color->select('color.*, product.name, product.image')
                ->join('product', 'product.id = color.product_id')
                ->orderBy('id', 'DESC')->get()->getResultArray()
        ];
        return view('back-end/color/data', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Tambah Warna',
            'product' => $this->product->findAll(),
        ];
        return view('back-end/color/add', $data);
    }

    public function save()
    {
        $product_id = $this->request->getVar('product');
        $color = $this->request->getVar('color');

        $params = [
            'color'         => $color,
            'product_id'    => $product_id,
            'created_at'    => Time::now('Asia/Jakarta', 'en_ID')
        ];

        $this->color->insert($params);
        return redirect()->to(site_url('warna'))->with('success', 'Selamat data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        if ($id != null) {
            $query = $this->db->table('color')->getWhere(['id' => $id]);

            if ($query->resultID->num_rows > 0) {
                $data = [
                    'title' => 'Edit Warna',
                    'color' => $query->getRow(),
                    'product' => $this->product->findAll(),
                ];

                return view('back-end/color/edit', $data);
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }

    public function update($id)
    {
        $product_id = $this->request->getVar('product');
        $color = $this->request->getVar('color');

        $param = [
            'color'         => $color,
            'product_id'    => $product_id,
            'modified_at'   => Time::now('Asia/Jakarta', 'en_ID')
        ];

        $this->db->table('color')->where(['id' => $id])->update($param);
        return redirect()->to(site_url('warna'))->with('success', 'Selamat data berhasil diubah!');
    }

    public function delete($id)
    {
        $this->color->delete($id);
        return redirect()->to(site_url('warna'))->with('success', 'Data berhasil dihapus!');
    }
}
