<?php

namespace App\Controllers;

use App\Models\ProfileModel;
use CodeIgniter\I18n\Time;

class Profile extends BaseController
{
    public function __construct()
    {
        $this->profile = new ProfileModel();
    }

    public function index()
    {
        $id = session('id');
        $data = [
            'title' => 'Profil',
            'profile' => $this->profile->find($id)
        ];
        return view('back-end/profile', $data);
    }

    public function save()
    {
        $doValid = $this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required|alpha_dash',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'alpha_dash' => '{field} hanya boleh berisi karakter alfanumerik, garis bawah, dan tanda hubung',
                ]
            ],
        ]);

        if (!$doValid) {
            $id = session('id');
            $data = [
                'title' => 'Profil',
                'profile' => $this->profile->find($id)
            ];
            return view('back-end/profile', $data);
        } else {  
            $id = session('id');
    
            $username = $this->request->getVar('username');
            $first_name = $this->request->getVar('first_name');
            $last_name = $this->request->getVar('last_name');
            $email = $this->request->getVar('email');
            $telephone = $this->request->getVar('telephone');
    
            $fileUploadImage = $_FILES['image']['name'];
            $profile = $this->profile->find($id);
    
            if ($fileUploadImage != NULL) {
                if ($profile['image'] == "avatar-1.png") {
                    $nameFileImage = "$username";
                    $fileImage = $this->request->getFile('image');
                    $fileImage->move('img/avatar/', $nameFileImage . '.' .$fileImage->getExtension());
    
                    $pathImage = $fileImage->getName();
                }else {
                    unlink('img/avatar/' . $profile['image']);
    
                    $nameFileImage = "$username";
                    $fileImage = $this->request->getFile('image');
                    $fileImage->move('img/avatar/', $nameFileImage . '.' .$fileImage->getExtension());
    
                    $pathImage = $fileImage->getName();
                }
            } else {
                $pathImage = $profile['image'];
            }
            
            $params = [
                'username' => $username,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'telephone' => $telephone,
                'image' => $pathImage,
                'modified_at' => Time::now('Asia/Jakarta', 'en_ID')
            ];
            
            $this->profile->update($id, $params);
    
            return redirect()->to(site_url('profil'))->with('success', 'Profil berhasil diubah!');
        }

    }
}
