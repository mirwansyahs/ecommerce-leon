<?= $this->extend('layout/back-end/main') ?>

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
            <form method="post" action="<?= site_url('updatesize/' . $size->id) ?>" class="needs-validation" novalidate="">
              <?php csrf_field(); ?>
              <div class="card-header">
                <h4><?= $title; ?></h4>
              </div>
              <input type="hidden" name="_method" value="PUT">
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-lg-12">
                    <label>Produk</label>
                    <select name="product" class="form-control select2" required>
                      <option value="">-- Pilih --</option>
                      <?php foreach ($product as $p) { ?>
                        <option <?php if ($size->product_id == $p['id']) {
                                  echo "selected='selected'";
                                } ?> value="<?= $p['id'] ?>"><?= $p['name'] ?></option>
                      <?php } ?>
                    </select>
                    <div class="invalid-feedback">
                      Produk tidak boleh kosong
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-lg-12">
                    <label>Ukuran</label>
                    <input type="text" class="form-control" name="size" value="<?= $size->size ?>" required>
                    <div class="invalid-feedback">
                      Ukuran tidak boleh kosong
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Ubah</button>
                <a href="<?= site_url('ukuran') ?>" class="btn btn-danger">Kembali</a>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>
</div>

<?= $this->endSection() ?>