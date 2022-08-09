<?= $this->extend('layout/front-end/main') ?>

<?= $this->section('content') ?>    
    <!-- header -->
    <header id="header" class="vh-100 carousel slide" data-bs-ride="carousel">
        <div class="container h-100 d-flex align-items-center carousel-inner">
            <div class="text-center carousel-item active">
                <h2 class="text-capitalize text-white">Koleksi Terbaik</h2>
                <h1 class="text-uppercase py-2 fw-bold text-white">Terbaru</h1>
                <a href="#" class="btn mt-3 text-uppercase" style="border: 1px solid rgb(85, 85, 85)">Belanja Sekarang</a>
            </div>
            <div class="text-center carousel-item">
                <h2 class="text-capitalize text-white">Harga & Penawaran Terbaik</h2>
                <h1 class="text-uppercase py-2 fw-bold text-white">Musim Baru</h1>
                <a href="#" class="btn mt-3 text-uppercase" style="border: 1px solid rgb(85, 85, 85)">Beli Sekarang</a>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#header" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </header>
    <!-- end of header -->

    <!-- special products -->
    <section id="produk-terbaru" class="py-5">
        <div class="container">
            <div class="title text-center py-5">
                <h2 class="position-relative d-inline-block">Produk Terbaru</h2>
            </div>

            <div class="special-list row g-0">
                <?php foreach ($recent_product as $rp) { ?>
                <div class="col-md-6 col-lg-4 col-xl-3 p-2">
                    <div class="special-img position-relative overflow-hidden">
                        <a href="<?= site_url('produk-detail/') . $rp['slug']?>"><img src="<?= site_url('img/product/') . $rp['image']?>" class="w-100" height="280px"></a>
                    </div>
                    <div class="text-center">
                        <a href="<?= site_url('produk-detail/') . $rp['slug']?>" class="text-decoration-none text-dark">
                            <p class="text-capitalize mt-3 mb-1"><?= $rp['name']?></p>
                        </a>
                        <span class="fw-bold d-block">Rp. <?= number_format($rp['price'], 0, ',', '.')?></span>
                    </div>
                </div>
                <?php } ?>

            </div>
        </div>
    </section>
    <!-- end of special products -->

    <!-- blogs -->
    <section id="offers" class="py-5">
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center text-center justify-content-lg-start text-lg-start">
                <div class="offers-content">
                    <span class="text-white">Diskon Hingga 40%</span>
                    <h2 class="mt-2 mb-4 text-white">Penawaran Penjualan Besar!</h2>
                    <a href="#" class="btn btn-dark">Beli Sekarang</a>
                </div>
            </div>
        </div>
    </section>
    <!-- end of blogs -->

    <!-- about us -->
    <section id="tentang-kami" class="py-5">
        <div class="container">
            <div class="row gy-lg-5 align-items-center">
                <div class="col-lg-6 order-lg-1 text-center text-lg-start">
                    <div class="title pt-3 pb-5">
                        <h2 class="position-relative d-inline-block ms-4">Tentang Kami</h2>
                    </div>
                    <p class="lead text-muted">Leon ID</p>
                    <p>Leon ID merupakan sebuah usaha toko online shop yang bergerak di bidang fashion</p>
                </div>
                <div class="col-lg-6 order-lg-0">
                    <img src="<?= site_url('front-end/images/about_us.jpg')?>" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <!-- end of about us -->

    <!-- special products -->
    <section id="semua-produk" class="py-5">
        <div class="container">
            <div class="title text-center py-5">
                <h2 class="position-relative d-inline-block">Semua Produk</h2>
            </div>

            <div class="special-list row g-0">
                <?php foreach ($product as $p) { ?>
                <div class="col-md-6 col-lg-4 col-xl-3 p-2">
                    <div class="special-img position-relative overflow-hidden">
                        <a href="<?= site_url('produk-detail/') . $p['slug']?>"><img src="<?= site_url('img/product/') . $p['image']?>" class="w-100" height="280px"></a>
                    </div>
                    <div class="text-center">
                        <a href="<?= site_url('produk-detail/') . $rp['slug']?>" class="text-decoration-none text-dark">
                            <p class="text-capitalize mt-3 mb-1"><?= $p['name']?></p>
                        </a>
                        <span class="fw-bold d-block">Rp. <?= number_format($rp['price'], 0, ',', '.')?></span>
                    </div>
                </div>
                <?php } ?>

            </div>
        </div>
    </section>
    <!-- end of special products -->
<?= $this->endSection() ?>