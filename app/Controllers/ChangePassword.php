<?php

namespace App\Controllers;

use App\Models\ProfileModel;
use CodeIgniter\I18n\Time;

class ChangePassword extends BaseController
{
    public function __construct()
    {
        $this->profile = new ProfileModel();
    }

    public function index()
    {
        $id = session('id');
        $data['title'] = 'Ubah Kata Sandi';
        $data['profile'] = $this->profile->find($id);
        return view('back-end/changePassword', $data);
    }

    public function save()
    {

        $doValid = $this->validate([
            'old_password' => [
                'label' => 'kata sandi lama',
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} harus memiliki panjang setidaknya {param} karakter',
                ]
            ],
            'new_password' => [
                'label' => 'kata sandi baru',
                'rules' => 'required|min_length[5]|matches[confirm_password]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} harus memiliki panjang setidaknya {param} karakter',
                    'matches' => '{field} tidak sama dengan {param}',
                ]
            ],
            'confirm_password' => [
                'label' => 'konfirmasi kata sandi',
                'rules' => 'required|min_length[5]|matches[new_password]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} harus memiliki panjang setidaknya {param} karakter',
                    'matches' => '{field} tidak sama dengan {param}',
                ]
            ],
        ]);


        if (!$doValid) {
            $id = session('id');
            $data = [
                'title' => 'Ubah Kata Sandi',
                'profile' => $this->profile->find($id),
                'validation' => $this->validator
            ];

            return view('back-end/changePassword', $data);
        } else {
            $old_password = $this->request->getVar('old_password');
            $new_password = $this->request->getVar('confirm_password');

            $id = session('id');
            $query = $this->db->table('user')->getWhere(['id' => $id]);
            $profile = $query->getRow();
                    
            if ($profile) {
                $password = password_verify($old_password, $profile->password);
                if ($password) {
                    $id = session('id');
                    $param = [
                        'password' => password_hash($new_password, PASSWORD_DEFAULT),
                        'modified_at' => Time::now('Asia/Jakarta', 'en_ID')
                    ];
    
                    $this->profile->update($id, $param);
    
                    return redirect()->to(site_url('ubah-kata-sandi'))->with('success', 'Kata sandi berhasil diubah!');
                } else {
                    return redirect()->to(site_url('ubah-kata-sandi'))->with('error', 'Kata sandi lama tidak sama!');
                }
            } else {
                return redirect()->to(site_url('ubah-kata-sandi'))->with('error', 'Kata sandi gagal diubah!');
            }
        }
    }
}
