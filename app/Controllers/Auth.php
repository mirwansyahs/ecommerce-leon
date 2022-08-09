<?php

namespace App\Controllers;

use App\Models\ProfileModel;
use App\Models\UserAddressModel;
use CodeIgniter\I18n\Time;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->profile = new ProfileModel();
        $this->userAddress = new UserAddressModel();
    }

    public function index()
    {
        if (session('id')) {
            session()->remove('telp');
            return redirect()->to(site_url('dashboard'));
        }
        $data['title'] = 'Masuk';
        return view('auth/login', $data);
    }

    public function proccess()
    {
        $post = $this->request->getPost();
        $query = $this->db->table('user')->getWhere(['telephone' => $post['no_hp']]);
        $user = $query->getRow();
        
        if ($user) {
            $level = $user->level;
            if ($level == 'admin') {
                if (password_verify($post['password'], $user->password)) {
                    $params = [
                        'id' => $user->id,
                        'image' => $user->image,
                        'level' => $user->level,
                    ];
                    session()->set($params);
                    
                    $params = [
                        'status'      => 'online'
                    ];
                    $id = session('id');
                    $this->profile->update($id, $params);
                    return redirect()->to(site_url('dashboard'));
                } else {
                    return redirect()->back()->with('error', 'Password tidak sesuai!');
                }
            } else if ($level == 'user') {
                if (password_verify($post['password'], $user->password)) {
                    $params = [
                        'id' => $user->id,
                        'image' => $user->image,
                        'level' => $user->level,
                    ];
                    session()->set($params);
                    
                    $params = [
                        'status'      => 'online'
                    ];
                    $id = session('id');
                    $this->profile->update($id, $params);
                    return redirect()->to(site_url());
                } else {
                    return redirect()->back()->with('error', 'Password tidak sesuai!');
                }
            } else {
                return redirect()->back()->with('error', 'No. telepon dan kata sandi belum terdaftar');
            }
        } else {
            return redirect()->back()->with('error', 'No. telepon tidak ditemukan');
        }
    }

    public function register()
    {
        if (session('id')) {
            session()->remove('telp');
            return redirect()->to(site_url('dashboard'));
        }
        $data['title'] = 'Daftar';
        return view('auth/register', $data);
    }

    public function save()
    {
        $doValid = $this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required|alpha_dash|is_unique[user.username]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} tidak boleh sama',
                    'alpha_dash' => '{field} hanya boleh berisi karakter alfanumerik, garis bawah, dan tanda hubung',
                ]
            ],
            'telephone' => [
                'label' => 'No. telepon',
                'rules' => 'required|is_unique[user.telephone]|min_length[10]|max_length[13]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah terdaftar',
                    'min_length' => '{field} harus memiliki panjang setidaknya {param} karakter',
                    'max_length' => '{field} maksimal memiliki panjang {param} karakter',
                ]
            ],
            'password' => [
                'label' => 'Kata sandi',
                'rules' => 'required|min_length[5]|matches[password2]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} harus memiliki panjang setidaknya {param} karakter',
                    'matches' => '{field} tidak sama dengan {param}',
                ]
            ],
            'password2' => [
                'label' => 'Konfirmasi kata sandi',
                'rules' => 'required|min_length[5]|matches[password]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} harus memiliki panjang setidaknya {param} karakter',
                    'matches' => '{field} tidak sama dengan {param}',
                ]
            ],
            'postal_code' => [
                'label' => 'Kode pos',
                'rules' => 'required|max_length[5]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'max_length' => '{field} maksimal memiliki panjang {param} karakter',
                ]
            ],
        ]);

        if (!$doValid) {
            if (session('id')) {
                session()->remove('telp');
                return redirect()->to(site_url('dashboard'));
            }
            $data = [
                'title' => 'Daftar',
                'validation' => $this->validator
            ];
            return view('auth/register', $data);
        } else {
            $first_name = $this->request->getVar('first_name');
            $last_name = $this->request->getVar('last_name');
            $username = $this->request->getVar('username');
            $email = $this->request->getVar('email');
            $telephone = $this->request->getVar('telephone');
            $password = $this->request->getVar('password2');
            $country = $this->request->getVar('country');
            $province = $this->request->getVar('province');
            $city = $this->request->getVar('city');
            $district = $this->request->getVar('district');
            $village = $this->request->getVar('village');
            $postal_code = $this->request->getVar('postal_code');
            $address = $this->request->getVar('address');

            $user = [
                'first_name' => $first_name,
                'last_name' => $last_name,
                'username' => $username,
                'email' => $email,
                'telephone' => $telephone,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'image' => 'avatar-1.png',
                'level' => 'user',
                'created_at' => Time::now('Asia/Jakarta', 'en_ID'),
                'modified_at' => Time::now('Asia/Jakarta', 'en_ID'),
            ];

            $this->profile->insert($user);

            $query = $this->db->table('user')->getWhere(['telephone' => $telephone])->getRow();
            
            if ($query) {
                $user_id = $query->id;
                $userAddress = [
                    'user_id' => $user_id,
                    'address' => $address,
                    'country' => $country,
                    'province' => $province,
                    'city' => $city,
                    'district' => $district,
                    'village' => $village,
                    'postal_code' => $postal_code,
                    'telephone' => $telephone,
                ];
    
                $this->userAddress->insert($userAddress);
                return redirect()->to(site_url('masuk'))->with('success', 'Selamat akun anda sudah terdaftar!');
            }
        }
    }

    public function forgotPassword()
    {
        $data['title'] = 'Lupa Kata Sandi';
        session()->remove('telp');
        return view('auth/forgotPassword', $data);
    }

    public function forgotPasswordProccess()
    {
        $telp = $this->request->getPost('no_hp');
        $query = $this->db->table('user')->getWhere(['telephone' => $telp]);
        $user = $query->getRow();

        if ($user) {
            $params = [
                'id' => $user->id,
                'telp' => $user,
            ];
            
            session()->set($params);
            session()->remove('id');
            return redirect()->to(site_url('setel-ulang-kata-sandi'));
        } else {
                return redirect()->to(site_url('lupa-kata-sandi'))->with('error', 'No. telepon belum terdaftar!');
        }
    }
    
    public function resetPassword()
    {
        if (!session('telp')) {
            return redirect()->to(site_url('masuk'));
        }

        $data['title'] = 'Setel Ulang Kata Sandi';

        return view('auth/resetPassword', $data);
    }

    public function resetPasswordProccess()
    {
        $doValid = $this->validate([
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
            if (!session('telp')) {
                return redirect()->to(site_url('masuk'));
            }

            $data = [
                'title' => 'Setel Ulang Kata Sandi',
                'validation' => $this->validator
            ];
            return view('auth/resetPassword', $data);
        } else {
            $new_password = $this->request->getVar('new_password');

            $id = session('id');
            $param = [
                'password' => password_hash($new_password, PASSWORD_DEFAULT),
                'modified_at' => Time::now('Asia/Jakarta', 'en_ID')
            ];
            $this->profile->update($id, $param);
            session()->remove('id');
            session()->remove('telp');
            return redirect()->to(site_url('masuk'))->with('success', 'Kata sandi berhasil diubah!');
        }
    }
    
    public function logout()
    {
        $params = [
            'status'      => 'offline'
        ];
        $id = session('id');
        $this->profile->update($id, $params);
        session()->remove('id');
        return redirect()->to(site_url('masuk'));
    }
}
