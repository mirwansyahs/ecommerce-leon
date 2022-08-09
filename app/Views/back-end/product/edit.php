<?= $this->extend('layout/back-end/main') ?>

<?= $this->section('css') ?>
<link rel="stylesheet" href="<?= base_url('back-end/dist/assets/modules/summernote/summernote-bs4.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="dashboard">Dashboard</a></div>
                <div class="breadcrumb-item"><?= $title; ?></div>
            </div>
        </div>
        <div class="section-body">

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form method="post" action="<?= site_url('updateproduct/' . $product->id) ?>" class="needs-validation" novalidate="" enctype="multipart/form-data">
                            <?php csrf_field(); ?>
                            <input type="hidden" name="detail_id" value="<?= $product->id ?>">
                            <div class="card-header">
                                <h4><?= $title; ?></h4>
                            </div>
                            <input type="hidden" name="_method" value="PUT">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label>Nama Produk</label>
                                        <input type="text" class="form-control" name="name" value="<?= $product->name ?>" required>
                                        <div class="invalid-feedback">
                                            Nama produk tidak boleh kosong
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label>Foto</label>
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label>Deskripsi</label>
                                        <textarea class="form-control summernote" name="desc" required><?= $product->desc ?></textarea>
                                        <div class="invalid-feedback">
                                            Deskripsi tidak boleh kosong
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label>Kategori</label>
                                        <select name="category" class="form-control select2" required>
                                            <option value="">-- Pilih --</option>
                                            <?php foreach ($category as $c) { ?>
                                                <option <?php if ($product->category_id == $c['category_id']) {
                                                            echo "selected='selected'";
                                                        } ?> value="<?= $c['category_id']; ?>"><?= $c['category_name']; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            Kategori tidak boleh kosong
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label>Brand</label>
                                        <select name="brand" class="form-control select2" required>
                                            <option value="">-- Pilih --</option>
                                            <?php foreach ($brand as $b) { ?>
                                                <option <?php if ($product->brand_id == $b['id']) {
                                                            echo "selected='selected'";
                                                        } ?> value="<?= $b['id']; ?>"><?= $b['name']; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            Brand tidak boleh kosong
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label>Bahan</label>
                                        <input type="text" class="form-control" name="material" value="<?= $product->material ?>">
                                        <div class="invalid-feedback">
                                            Bahan tidak boleh kosong
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label>Stok</label>
                                        <input type="number" class="form-control" name="stock" value="<?= $product->quantity ?>" required>
                                        <div class="invalid-feedback">
                                            Stok tidak boleh kosong
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label>Diskon</label>
                                        <select name="discount" id="discount" class="form-control select2" required>
                                            <option value="">-- Pilih --</option>
                                            <?php
                                            foreach ($discount as $d) {
                                                if ($d['active'] == 'active') {
                                            ?>
                                                    <option <?php if ($product->discount_id == $d['discount_id']) {
                                                                echo "selected='selected'";
                                                            } ?> value="<?= $d['discount_id']; ?>" data-discount="<?= $d['discount_percent'] ?>"><?= $d['discount_name']; ?>
                                                    </option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            Status diskon tidak boleh kosong
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label>Besaran Discount</label>
                                        <?php
                                        foreach ($discount as $d) {
                                            if ($product->discount_id == $d['discount_id']) {
                                        ?>
                                                <input type="number" class="form-control" name="percent" value="<?= $d['discount_percent'] ?>" readonly>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-lg-12">
                                        <label>Harga</label>
                                        <input type="number" class="form-control" name="price" value="<?= $product->original_price ?>" required>
                                        <div class="invalid-feedback">
                                            Harga tidak boleh kosong
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="<?= site_url('produk') ?>" class="btn btn-danger">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script src="<?= base_url('back-end/dist/assets/modules/summernote/summernote-bs4.js') ?>"></script>
<script>
    $('#discount').on('change', function() {
        // ambil data dari elemen option yang dipilih
        const discount = $('#discount option:selected').data('discount');

        // tampilkan
        $('[name=percent]').val(discount);
    });
</script>
<?= $this->endSection() ?>