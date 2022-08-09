<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\BrandModel;
use App\Models\DiscountModel;
use App\Models\SizeModel;
use App\Models\ColorModel;
use App\Models\CartModel;
use App\Models\SettingModel;
use App\Models\ProfileModel;
use App\Models\UserAddressModel;
use App\Models\DeliveryModel;
use App\Models\ShoppingSessionModel;
use App\Models\UserPaymentModel;
use App\Models\PaymentDetailsModel;
use App\Models\OrderModel;
use CodeIgniter\I18n\Time;

class Home extends BaseController
{
    public function __construct()
    {
        $this->product = new ProductModel();
        $this->category = new CategoryModel();
        $this->brand = new BrandModel();
        $this->discount = new DiscountModel();
        $this->size = new SizeModel();
        $this->color = new ColorModel();
        $this->cart = new CartModel();
        $this->setting = new SettingModel();
        $this->profile = new ProfileModel();
        $this->address = new UserAddressModel();
        $this->delivery = new DeliveryModel();
        $this->shopping = new ShoppingSessionModel();
        $this->userPayment = new UserPaymentModel();
        $this->payment = new PaymentDetailsModel();
        $this->order = new OrderModel();
        helper('array');
    }

    public function index()
    {
        $data = [
            'recent_product' => $this->db->query("SELECT * FROM product ORDER BY product.id DESC LIMIT 8")->getResultArray(),
            'product' => $this->product->getAll(),
            'setting' => $this->product->getAll()
        ];

        return view('front-end/index', $data);
    }

    public function detail($slug)
    {
        $query = $this->product->getWhere(['slug' => $slug])->getRow();

        $product_id = $query->id;

        $data = [
            'product' => $query,
            'brand' => $this->brand->findAll(),
            'discount' => $this->discount->findAll(),
            'size' => $this->size->where('product_id', $product_id)->get()->getResultArray(),
            'color' => $this->color->where('product_id', $product_id)->get()->getResultArray(),
        ];

        return view('front-end/product/detail', $data);
    }

    public function invoice()
    {
        $tgl = date('Y-m-d');
        $query = $this->db->query("SELECT MAX(invoice) AS invoice
                 FROM order_details WHERE DATE_FORMAT(booking_date, '%Y-%m-%d') = '$tgl'");
        $result = $query->getRowArray();
        $data = $result['invoice'];

        $lastNoUrut = substr($data, -4);

        // no urut ditambah 1
        $nextNoUrut = intval($lastNoUrut) + 1;

        // membuat format nomor transaksi berikutnya
        $invoiceCode = 'INV' . date('dmy', strtotime($tgl)) . sprintf('%04s', $nextNoUrut);

        return $invoiceCode;
    }

    public function addCart()
    {

        if (!session('id')) {
            return redirect()->to(site_url('masuk'));
        }
        $product_id = $this->request->getVar('product_id');
        $size = $this->request->getVar('size');
        $color = $this->request->getVar('color');
        $price = $this->request->getVar('price');
        $quantity = $this->request->getVar('quantity');
        $total = $price * $quantity;

        $paramSession = [
            'user_id'   => session('id'),
            'total'     => $total,
            'created_at' => Time::now('Asia/Jakarta', 'en_ID'),
        ];

        $this->shopping->insert($paramSession);

        $sessionShop = $this->shopping->groupBy('id')->orderBy('id', 'DESC')->first();

        $paramsCart = [
            'session_id' => $sessionShop['id'],
            'product_id' => $product_id,
            'size'       => $size,
            'color'      => $color,
            'quantity'   => $quantity,
            'created_at' => Time::now('Asia/Jakarta', 'en_ID'),
        ];

        $this->cart->insert($paramsCart);
        return redirect()->to(site_url('keranjang'))->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function cart()
    {
        $data = [
            'cart'      => $this->cart->select('cart_item.*, product.image, product.name, product.price, shopping_session.user_id, shopping_session.total')
                ->join('product', 'product.id = cart_item.product_id')
                ->join('shopping_session', 'shopping_session.id = cart_item.session_id')
                ->where('user_id', session('id'))->get()->getResultArray(),
            'address'   => $this->profile->select('user.first_name, user.last_name, user.email, user_address.*')
                ->join('user_address', 'user_address.user_id = user.id')
                ->getWhere(['user_id' => session('id')])->getRow(),
            'delivery'  => $this->delivery->findAll(),
        ];

        return view('front-end/order/cart', $data);
    }

    public function checkout()
    {
        if ($this->request->isAJAX()) {
            $delivery_id = $this->request->getVar('delivery_id');
            $subtotal = $this->request->getVar('subtotal');
            $shiping = $this->request->getVar('shiping');
            $total = $this->request->getVar('total');

            $user = $this->profile->select('user.first_name, user.last_name, user.email, user_address.*')
                ->join('user_address', 'user_address.user_id = user.id')
                ->getWhere(['user_id' => session('id')])->getRow();

            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = 'SB-Mid-server-1zZ935BBzYSassJ7t24ER6_b';
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            $billing_address = array(
                'first_name'   => $user->first_name,
                'last_name'    => $user->last_name,
                'address'      => $user->address,
                'city'         => $user->city,
                'postal_code'  => $user->postal_code,
                'phone'        => $user->telephone,
                'country_code' => 'IDN'
            );

            // Populate customer's info
            $customer_details = array(
                'first_name'       => $user->first_name,
                'last_name'        => $user->last_name,
                'email'            => $user->email,
                'phone'            => $user->telephone,
                'billing_address'  => $billing_address,
            );

            $params = [
                'transaction_details' => [
                    'order_id' => rand(),
                    'gross_amount' => $total,
                ],
                'customer_details' => $customer_details,
            ];

            $json = [
                'delivery_id' => $delivery_id,
                'subtotal'    => $subtotal,
                'shiping'     => $shiping,
                'total'       => $total,
                'invoice'       => $this->invoice(),
                'snapToken'   => \Midtrans\Snap::getSnapToken($params),
            ];
            echo json_encode($json);
        }
    }

    public function checkoutProsses()
    {
        if ($this->request->isAJAX()) {
            $order_id = $this->request->getVar('order_id');
            $delivery_id = $this->request->getVar('delivery_id');
            $subtotal = $this->request->getVar('subtotal');
            $shiping = $this->request->getVar('shiping');
            $total = $this->request->getVar('total');
            $payment_type = $this->request->getVar('payment_type');
            $transaction_time = $this->request->getVar('transaction_time');
            $transaction_status = $this->request->getVar('transaction_status');
            $va_number = $this->request->getVar('va_number');
            $bank = $this->request->getVar('bank');
            $invoice = $this->request->getVar('invoice');

            $userPayParams = [
                'user_id'      => session('id'),
                'payment_type' => $payment_type,
                'va_number'    => $va_number,
            ];

            $this->userPayment->insert($userPayParams);

            $user_payment_id = $this->userPayment->where('user_id', session('id'))->orderBy('id', 'DESC')->first();

            $payParams = [
                'user_payment_id'    => $user_payment_id['id'],
                'gross_amount'       => $total,
                'bank'               => $bank,
                'transaction_status' => $transaction_status,
                'transaction_time'   => $transaction_time,
            ];

            $this->payment->insert($payParams);

            $payment = $this->payment->where('user_payment_id', $user_payment_id['id'])->get()->getResultArray();
            foreach ($payment as $p) {
                $payment_id = $p['id'];
            }

            $shopping = $this->cart->join('shopping_session', 'shopping_session.id = cart_item.session_id')
                                ->where('user_id', session('id'))->get()->getResultArray();
            $orderParam = [];
            foreach ($shopping as $s) {
                $orderParam[] = [
                    'invoice'       => $invoice,
                    'user_id'       => session('id'),
                    'product_id'    => $s['product_id'],
                    'payment_id'    => $payment_id,
                    'delivery_id'   => $delivery_id,
                    'size_item'     => $s['size'],
                    'color_item'    => $s['color'],
                    'qty'           => $s['quantity'],
                    'status_item'   => 'in',
                    'subtotal'      => $s['total'],
                    'shiping'       => $shiping,
                    'total'         => $total,
                    'booking_date'  => Time::now('Asia/Jakarta', 'en_ID'),
                ];
            }

            $this->order->insertBatch($orderParam);

            $this->db->table('shopping_session')->where(['user_id' => session('id')])->delete();

            $msg = [
                'success' => 'Data transaksi berhasil tersimpan. Silahkan lakukan pembayaran!'
            ];

            echo json_encode($msg);
        }
    }

    public function deleteItem($id)
    {
        $this->cart->delete($id);
        return redirect()->to(site_url('keranjang'))->with('success', 'Produk di dalam keranjang berhasil dihapus!');
    }

    public function changeAddress()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id');

            $address = $this->profile->select('user.first_name, user.last_name, user.email, user_address.*')
                ->join('user_address', 'user_address.user_id = user.id')
                ->getWhere(['user_id' => session('id')])->getRow();

            $data = [
                'address' => $address
            ];

            $msg = [
                'data' => view('front-end/order/changeAddress', $data)
            ];

            echo json_encode($msg);
        }
    }

    public function sendChangeAddress($id)
    {
        $telephone = $this->request->getVar('telephone');
        $postal_code = $this->request->getVar('postal_code');
        $address = $this->request->getVar('address');

        $params = [
            'telephone' => $telephone,
            'postal_code' => $postal_code,
            'address' => $address,
        ];

        $this->db->table('user_address')->where(['id' => $id])->update($params);

        return redirect()->to(site_url('keranjang'))->with('success', 'Selamat data berhasil diubah!');
    }

    public function profile($username)
    {
        $data['user'] = $this->profile->getWhere(['username' => $username])->getRow();
        return view('front-end/account/profile', $data);
    }

    public function saveProfile($username)
    {
        $first_name = $this->request->getVar('first_name');
        $last_name = $this->request->getVar('last_name');
        $telephone = $this->request->getVar('telephone');
        $email = $this->request->getVar('email');

        $fileUploadImage = $_FILES['image']['name'];
        $profile = $this->profile->getWhere(['username' => $username])->getRow();

        if ($fileUploadImage != NULL) {
            if ($profile->image == "avatar-1.png") {
                $nameFileImage = "$username";
                $fileImage = $this->request->getFile('image');
                $fileImage->move('img/avatar/', $nameFileImage . '.' . $fileImage->getExtension());

                $pathImage = $fileImage->getName();
            } else {
                // unlink('img/avatar/' . $profile->image);

                $nameFileImage = "$username";
                $fileImage = $this->request->getFile('image');
                $fileImage->move('img/avatar/', $nameFileImage . '.' . $fileImage->getExtension());

                $pathImage = $fileImage->getName();
            }
        } else {
            $pathImage = $profile->image;
        }

        $params = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'telephone' => $telephone,
            'email' => $email,
            'image' => $pathImage,
            'modified_at' => Time::now('Asia/Jakarta', 'en_ID')
        ];

        $this->profile->update($username, $params);

        return redirect()->to(site_url('akun-saya/' . $username))->with('success', 'Profil berhasil diubah!');
    }

    public function address($username)
    {
        $data['user'] = $this->profile->select('user.username, user.first_name, user.last_name, user_address.*')
            ->join('user_address', 'user_address.user_id = user.id')
            ->getWhere(['username' => $username])->getRow();
        return view('front-end/account/address', $data);
    }

    public function saveAddress($username)
    {
        $id = $this->request->getVar('id');
        $country = $this->request->getVar('country');
        $province = $this->request->getVar('province');
        $city = $this->request->getVar('city');
        $district = $this->request->getVar('district');
        $village = $this->request->getVar('village');
        $postal_code = $this->request->getVar('postal_code');
        $telephone = $this->request->getVar('telephone');
        $address = $this->request->getVar('address');

        $params = [
            'country' => $country,
            'province' => $province,
            'city' => $city,
            'district' => $district,
            'village' => $village,
            'postal_code' => $postal_code,
            'telephone' => $telephone,
            'address' => $address,
            'modified_at' => Time::now('Asia/Jakarta', 'en_ID')
        ];

        $this->address->update($id, $params);

        return redirect()->to(site_url('ubah-alamat/' . $username))->with('success', 'Alamat berhasil diubah!');
    }

    public function myOrder()
    {
        $data = [
            'order' => $this->order->select('order_product.*, product.name, product.image')
                ->join('product', 'product.id = order_product.product_id')
                ->where('user_id', session('id'))->get()->getResultArray()
        ];

        return view('front-end/order/myOrder', $data);
    }

    public function orderSent()
    {
        $data = [
            'order' => $this->order->select('order_product.*, product.name, product.image')
                ->join('product', 'product.id = order_product.product_id')
                ->where('user_id', session('id'))->get()->getResultArray()
        ];

        return view('front-end/order/orderSent', $data);
    }

    public function orderSentUpdate($id)
    {
        $param = [
            'status_item'   => 'complete',
            'date_received' => Time::now('Asia/Jakarta', 'en_ID'),
        ];

        $this->order->update($id, $param);
        return redirect()->to(site_url('pesanan-dikirim'))->with('success', 'Terima kasih sudah menerima barangnya!');
    }

    public function orderAccepted()
    {
        $data = [
            'order' => $this->order->select('order_product.*, product.name, product.image')
                ->join('product', 'product.id = order_product.product_id')
                ->where('user_id', session('id'))->get()->getResultArray()
        ];

        return view('front-end/order/orderAccepted', $data);
    }
}
