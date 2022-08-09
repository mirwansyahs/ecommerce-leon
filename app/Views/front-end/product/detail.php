<?= $this->extend('layout/front-end/main') ?>

<?= $this->section('content') ?>

<!-- special products -->
<section id="semua-produk" class="py-5">
    <div class="container">
        <form action="<?= site_url('addCart') ?>" method="post">
            <?= csrf_field(); ?>
            <input type="hidden" name="product_id" value="<?= $product->id ?>">
            <div class="row">
                <div class="col-md-6 col-lg-6 text-center mb-3">
                    <a href=<?= site_url('produk-detail/') . $product->slug ?>>
                        <img src="<?= site_url('img/product/') . $product->image ?>" width="300px" height="350px">
                    </a>
                </div>
                <div class="col-md-6 col-lg-6 mb-3">
                    <h3 class="mb-3"><?= $product->name ?></h3>
                    <?php foreach ($discount as $d) { ?>
                        <?php if ($product->discount_id == $d['discount_id']) { ?>
                            <h5>
                                <?php if ($d['discount_percent'] != 0) { ?><s class="text-danger h6">Rp <?= number_format($product->original_price, 0, ',', '.') ?></s><?php } ?>
                                Rp <?= number_format($product->price, 0, ',', '.') ?>
                                <input type="hidden" name="price" value="<?= $product->price ?>">
                            </h5>
                        <?php } ?>
                    <?php } ?>
                    <ul class="list-group list-group-flush mb-3">
                        <?php foreach ($brand as $b) { ?>
                            <?php if ($product->brand_id == $b['id']) { ?>
                                <li class="list-group-item">Brand : <?= $b['name'] ?></li>
                            <?php } ?>
                        <?php } ?>
                        <li class="list-group-item">Bahan : <?= $product->material ?></li>
                        <li class="list-group-item">Stok : <?= $product->quantity ?></li>
                    </ul>
                    <h6 class="mt-2 fw-bold">Ukuran</h6>
                    <div class="selectgroup w-100">
                        <?php foreach ($size as $s) { ?>
                            <label class="selectgroup-item">
                                <input type="radio" name="size" value="<?= $s['size'] ?>" class="selectgroup-input">
                                <span class="selectgroup-button"><?= $s['size'] ?></span>
                            </label>
                        <?php } ?>
                    </div>
                    <h6 class="mt-2 fw-bold">Warna</h6>
                    <div class="selectgroup w-100 mb-3">
                        <?php foreach ($color as $c) { ?>
                            <label class="selectgroup-item">
                                <input type="radio" name="color" value="<?= $c['color'] ?>" class="selectgroup-input">
                                <span class="selectgroup-button"><?= $c['color'] ?></span>
                            </label>
                        <?php } ?>
                    </div>

                    <div class="row">
                        <div class="col-sm-3">
                            <?php if ($product->quantity != 0) { ?>
                                <div class="d-flex flex-row">
                                    <button type="button" class="btn btn-link px-2 text-dark" onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                        <i class="fas fa-minus"></i>
                                    </button>

                                    <input id="form1" min="1" max="<?= $product->quantity ?>" name="quantity" value="1" type="number" class="form-control form-control-sm" style="width: 50px;" />

                                    <button type="button" class="btn btn-link px-2 text-dark" onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            <?php } else { ?>
                                <div class="d-flex flex-row">
                                    <button type="button" class="btn btn-link px-2 text-dark">
                                        <i class="fas fa-minus"></i>
                                    </button>

                                    <input id="form1" min="0" name="quantity" value="0" type="number" class="form-control form-control-sm" style="width: 50px;" readonly />

                                    <button type="button" class="btn btn-link px-2 text-dark">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-dark">Tambah ke keranjang</button>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md col-lg">
                    <div class="container">
                        <h6 class="fw-bold">Deskripsi</h6>
                        <p><?= $product->desc ?></p>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- end of special products -->
<?= $this->endSection() ?>