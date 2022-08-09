<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\BrandModel;
use App\Models\DiscountModel;
use App\Models\SizeModel;
use App\Models\ColorModel;
use CodeIgniter\I18n\Time;

class Product extends BaseController
{
    public function __construct()
    {
        helper('text');
        $this->product = new ProductModel();
        $this->category = new CategoryModel();
        $this->brand = new BrandModel();
        $this->discount = new DiscountModel();
        $this->size = new SizeModel();
        $this->color = new ColorModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Produk',
            'product' => $this->product->getAll()
        ];

        return view('back-end/product/data', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Tambah Produk',
            'category' => $this->category->findAll(),
            'brand' => $this->brand->findAll(),
            'discount' => $this->discount->findAll(),
            'size' => $this->size->findAll(),
            'color' => $this->color->findAll(),
        ];

        return view('back-end/product/add', $data);
    }

    public function save()
    {
        $name = $this->request->getVar('name');
        $desc = $this->request->getVar('desc');
        $category = $this->request->getVar('category');
        $brand = $this->request->getVar('brand');
        $size = $this->request->getVar('size');
        $color = $this->request->getVar('color');
        $material = $this->request->getVar('material');
        $stock = $this->request->getVar('stock');
        $discount = $this->request->getVar('discount');
        $original_price = $this->request->getVar('price');
        $discount_percent = $this->request->getVar('percent');
        $count = $original_price * $discount_percent / 100;
        $price = $original_price - $count;

        $fileUploadImage = $_FILES['image']['name'];

        if ($fileUploadImage != NULL) {
            $nameFileImage = "$name";
            $fileImage = $this->request->getFile('image');
            $fileImage->move('img/product', $nameFileImage . '.' . $fileImage->getExtension());

            $pathImage = $fileImage->getName();
        } else {
            $pathImage = '';
        }

        $params = [
            'name' => $name,
            'slug' => strtolower(url_title($name)),
            'image' => $pathImage,
            'desc' => $desc,
            'category_id' => $category,
            'brand_id' => $brand,
            'material' => $material,
            'quantity' => $stock,
            'discount_id' => $discount,
            'original_price' => $original_price,
            'price' => $price,
            'created_at' => Time::now('Asia/Jakarta', 'en_ID'),
        ];

        $this->product->insert($params);

        $product = $this->product->groupBy('id')->orderBy('id', 'DESC')->first();


        for ($i = 0; $i < count($size); $i++) {
            for ($i = 0; $i < count($color); $i++) {
                $size_params = [
                    'product_id'    => $product['id'],
                    'size_id'          => $size[$i],
                    'color_id'          => $color[$i],
                    'created_at'    => Time::now('Asia/Jakarta', 'en_ID'),
                ];
                $this->detail->insert($size_params);
            }
        }


        return redirect()->to(site_url('produk'))->with('success', 'Selamat data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $query = $this->product->getWhere(['id' => $id]);

        $data = [
            'title' => 'Edit Produk',
            'product' => $query->getRow(),
            'category' => $this->category->findAll(),
            'brand' => $this->brand->findAll(),
            'discount' => $this->discount->findAll(),
        ];

        return view('back-end/product/edit', $data);
    }

    public function update($id)
    {
        $detail_id = $this->request->getVar('detail_id');
        $name = $this->request->getVar('name');
        $desc = $this->request->getVar('desc');
        $category = $this->request->getVar('category');
        $brand = $this->request->getVar('brand');
        $material = $this->request->getVar('material');
        $stock = $this->request->getVar('stock');
        $discount = $this->request->getVar('discount');
        $original_price = $this->request->getVar('price');
        $discount_percent = $this->request->getVar('percent');
        $count = $original_price * $discount_percent / 100;
        $price = $original_price - $count;

        $fileUploadImage = $_FILES['image']['name'];
        $product = $this->db->table('product')->getWhere(['id' => $id])->getRow();

        if ($fileUploadImage != NULL) {
            if ($product->image == "") {
                $nameFileImage = "$name";
                $fileImage = $this->request->getFile('image');
                $fileImage->move('img/product/', $nameFileImage . '.' . $fileImage->getExtension());

                $pathImage = $fileImage->getName();
            } else {
                unlink('img/product/' . $product->image);

                $nameFileImage = "$name";
                $fileImage = $this->request->getFile('image');
                $fileImage->move('img/product/', $nameFileImage . '.' . $fileImage->getExtension());

                $pathImage = $fileImage->getName();
            }
        } else {
            $pathImage = $product->image;
        }

        $params = [
            'name' => $name,
            'slug' => strtolower(url_title($name)),
            'image' => $pathImage,
            'desc' => $desc,
            'category_id' => $category,
            'brand_id' => $brand,
            'material' => $material,
            'quantity' => $stock,
            'discount_id' => $discount,
            'original_price' => $original_price,
            'price' => $price,
            'modified_at' => Time::now('Asia/Jakarta', 'en_ID'),
        ];

        $this->db->table('product')->where(['id' => $id])->update($params);

        return redirect()->to(site_url('produk'))->with('success', 'Selamat data berhasil diubah!');
    }

    public function delete($id)
    {
        $this->product->delete($id);
        return redirect()->to(site_url('produk'))->with('success', 'Data berhasil dihapus!');
    }
}
