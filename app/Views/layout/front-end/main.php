<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    $db = db_connect();
    $query = $db->table('store')->getWhere([])->getRow();
    ?>
    <title><?= $query->name; ?></title>

    <!-- Favicons -->
    <link href="<?= '/img/logo/' . $query->image; ?>" rel="icon">
    <link href="<?= '/img/logo/' . $query->image; ?>" rel="apple-touch-icon">

    <!-- fontawesome css -->
    <link rel="stylesheet" href="<?= site_url('front-end/dist/fontawesome/css/all.min.css') ?>">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="<?= site_url('front-end/dist/bootstrap-5.0.2/css/bootstrap.min.css') ?>">
    <!-- custom css -->
    <link rel="stylesheet" href="<?= site_url('front-end/css/main.css') ?>">

    <!-- Sweetalert -->
    <link rel="stylesheet" href="<?= base_url('front-end/dist/sweetalert2.11.4.4/dist//sweetalert2.min.css') ?>">
    <?= $this->renderSection('css') ?>
</head>

<body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-4 sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex justify-content-between align-items-center order-lg-0" href="index.html">
                <img src="<?= site_url('img/logo/') . $query->image ?>" alt="site icon">
                <span class="text-uppercase fw-lighter ms-2"><?= $query->name; ?></span>
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse order-lg-1" id="navMenu">
                <ul class="navbar-nav mx-auto text-center">
                    <li class="nav-item px-2 py-2">
                        <a class="nav-link text-uppercase text-dark" href="<?= site_url() ?>">Beranda</a>
                    </li>
                    <li class="nav-item px-2 py-2">
                        <a class="nav-link text-uppercase text-dark" href="#produk-terbaru">Produk Terbaru</a>
                    </li>
                    <li class="nav-item px-2 py-2">
                        <a class="nav-link text-uppercase text-dark" href="#tentang-kami">Tentang Kami</a>
                    </li>
                    <li class="nav-item px-2 py-2 border-0">
                        <a class="nav-link text-uppercase text-dark" href="#semua-produk">Semua Produk</a>
                    </li>
                </ul>

                <ul class="navbar-nav">
                    <li class="nav-item px-2 py-2 border-0 dropdown">
                        <a class="nav-link text-uppercase text-dark position-relative beep" href="<?= site_url('keranjang') ?>">
                            <i class="fa fa-shopping-cart"></i>
                            <?php

                            use App\Models\CartModel;

                            $cart = new CartModel();
                            $query = $cart->join('shopping_session', 'shopping_session.id = cart_item.session_id');
                            $count = $query->where('user_id', session('id'))->get()->getNumRows();
                            ?>
                            <span class="position-absolute start-100 translate-middle badge bg-danger"><?= $count ?></span>
                        </a>
                    </li>
                    <li class="nav-item px-2 py-2">
                        <!-- <a class="nav-link text-uppercase text-dark position-relative beep" href="#" id="chat">
                            <i class="fa fa-envelope"></i>
                        </a> -->
                    </li>
                    <?php if (!session('id')) { ?>
                        <li class="nav-item px-2 py-2 border-0">
                            <a class="nav-link text-uppercase text-dark position-relative" href="<?= site_url('daftar') ?>">Daftar</a>
                        </li>
                        <li class="nav-item px-2 py-2 border-0">
                            <a class="nav-link text-uppercase text-dark position-relative" href="<?= site_url('masuk') ?>">Masuk</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item dropdown">
                            <?php
                            $id = session('id');
                            $db = db_connect();
                            $user = $db->table('user')->getWhere(['id' => $id])->getRow();
                            ?>
                            <img src="/img/avatar/<?= $user->image; ?>" class="rounded-circle dropdown-toggle" width="50px" alt="avatar" data-bs-toggle="dropdown" aria-expanded="false">
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?= site_url('akun-saya/' . $user->username) ?>/"><i class="fa fa-user"></i> Akun Saya</a></li>
                                <li><a class="dropdown-item" href="<?= site_url('ubah-alamat/' . $user->username) ?>"><i class="fa-solid fa-location-dot"></i> Ubah Alamat</a></li>
                                <li><a class="dropdown-item" href="<?= site_url('pesanan-saya') ?>"><i class="fa-solid fa-clipboard-list"></i> Pesanan Saya</a></li>
                                <li><a class="dropdown-item" href="<?= site_url('pesanan-dikirim') ?>"><i class="fa-solid fa-truck"></i> Pesanan Dikirim</a></li>
                                <li><a class="dropdown-item" href="<?= site_url('pesanan-diterima') ?>"><i class="fas fa-box"></i></i> Pesanan Diterima</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="<?= site_url('keluar') ?>"><i class="fas fa-sign-out-alt"></i> Keluar</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end of navbar -->

    <?= $this->renderSection('content') ?>

    <!-- footer -->
    <footer class="bg-dark py-5">
        <div class="container">
            <?php
            $db = db_connect();
            $query = $db->table('store')->getWhere([])->getRow();
            ?>
            <div class="row text-white g-4">
                <div class="col-md-6 col-lg-3">
                    <a class="text-uppercase text-decoration-none brand text-white" href="index.html"><?= $query->name; ?></a>
                    <p class="text-white text-muted mt-3"><?= $query->about; ?></p>
                </div>

                <div class="col-md-6 col-lg-3">
                    <h5 class="fw-light">Tautan</h5>
                    <ul class="list-unstyled">
                        <li class="my-3">
                            <a href="<?= site_url() ?>" class="text-white text-decoration-none text-muted">
                                <i class="fas fa-chevron-right me-1"></i> Beranda
                            </a>
                        </li>
                        <li class="my-3">
                            <a href="#produk-terbaru" class="text-white text-decoration-none text-muted">
                                <i class="fas fa-chevron-right me-1"></i> produk-terbaru
                            </a>
                        </li>
                        <li class="my-3">
                            <a href="tentang-kami" class="text-white text-decoration-none text-muted">
                                <i class="fas fa-chevron-right me-1"></i> Tentang Kami
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-6 col-lg-3">
                    <h5 class="fw-light mb-3">Hubungi kami</h5>
                    <div class="d-flex justify-content-start align-items-start my-2 text-muted">
                        <span class="me-3">
                            <i class="fas fa-map-marked-alt"></i>
                        </span>
                        <span class="fw-light">
                            <?= $query->address; ?>
                        </span>
                    </div>
                    <div class="d-flex justify-content-start align-items-start my-2 text-muted">
                        <span class="me-3">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="fw-light">
                            <?= $query->email; ?>
                        </span>
                    </div>
                    <div class="d-flex justify-content-start align-items-start my-2 text-muted">
                        <span class="me-3">
                            <i class="fas fa-phone-alt"></i>
                        </span>
                        <span class="fw-light">
                            <?= $query->telephone; ?>
                        </span>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <h5 class="fw-light mb-3">Ikuti kami</h5>
                    <div>
                        <ul class="list-unstyled d-flex">
                            <li>
                                <a href="<?= $query->facebook; ?>" class="text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?= $query->twitter; ?>" class="text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?= $query->instagram; ?>" class="text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end of footer -->


    <!-- jquery -->
    <script src="<?= site_url('front-end/js/jquery-3.6.0.js') ?>"></script>
    <!-- bootstrap js -->
    <script src="<?= site_url('front-end/dist/bootstrap-5.0.2/js/bootstrap.min.js') ?>"></script>
    <!-- Sweetalert -->
    <script src="<?= base_url('front-end/dist/sweetalert2.11.4.4/dist/sweetalert2.all.min.js') ?>"></script>
    <!-- custom js -->
    <script src="<?= site_url('front-end/js/script.js') ?>"></script>

    <?= $this->renderSection('javascript') ?>
</body>

</html>