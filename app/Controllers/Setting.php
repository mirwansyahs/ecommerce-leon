<?php

namespace App\Controllers;

use App\Models\SettingModel;
use CodeIgniter\I18n\Time;

class Setting extends BaseController
{
    public function __construct()
    {
        $this->setting = new SettingModel();
    }

    public function index()
    {
        $query = $this->db->table('user')->getWhere([]);
        $param = $query->getRow();
        
        $data = [
            'title' => 'Pengaturan',
            'setting' => $this->setting->find($param->id)
        ];
        return view('back-end/setting', $data);
    }

    public function save()
    {
        $id = $this->request->getVar('id');
        
        $name = $this->request->getVar('name');
        $email = $this->request->getVar('email');
        $telephone = $this->request->getVar('telephone');
        $about = $this->request->getVar('about');
        $address = $this->request->getVar('address');
        $facebook = $this->request->getVar('facebook');
        $instagram = $this->request->getVar('instagram');
        $twitter = $this->request->getVar('twitter');
       
        $fileUpload = $_FILES['image']['name'];
        $setting = $this->setting->find($id);

        if ($fileUpload != NULL) {
            if ($setting['image'] == "") {
                $nameFile = "$name";
                $fileImage = $this->request->getFile('image');
                $fileImage->move('img/logo/', $nameFile . '.' .$fileImage->getExtension());
                
                $pathImage = $fileImage->getName();
            } else {
                unlink('img/logo/' . $setting['image']);

                $nameFile = "$name";
                $fileImage = $this->request->getFile('image');
                $fileImage->move('img/logo/', $nameFile . '.' .$fileImage->getExtension());
                
                $pathImage = $fileImage->getName();
            }
        } else {
            $pathImage = $setting['image'];
        }

        $params = [
            'name' => $name,
            'image' => $pathImage,
            'email' => $email,
            'telephone' => $telephone,
            'about' => $about,
            'address' => $address,
            'facebook' => $facebook,
            'instagram' => $instagram,
            'twitter' => $twitter,
            'modified_at' => Time::now('Asia/Jakarta', 'en_ID')
        ];

        $this->setting->update($id, $params);

        return redirect()->to(site_url('pengaturan'))->with('success', 'Pengaturan berhasil diubah!');
    }
}
