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
                  <form method="post" action="<?= site_url('updatediscount/' . $discount->discount_id)?>" class="needs-validation" novalidate="">
                    <?php csrf_field(); ?>
                    <div class="card-header">
                      <h4><?= $title; ?></h4>
                    </div>
                    <input type="hidden" name="_method" value="PUT">
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label>Nama Diskon</label>
                                <input type="text" class="form-control" name="name" value="<?= $discount->discount_name?>" required>
                                <div class="invalid-feedback">
                                    Nama Diskon tidak boleh kosong
                                </div>         
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label>Deskripsi</label>
                                <textarea class="form-control" name="desc" required><?= $discount->discount_desc?></textarea>
                                <div class="invalid-feedback">
                                    Deskripsi tidak boleh kosong
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label>Persen Diskon (%)</label>
                                <input type="number" class="form-control" name="percent" value="<?= $discount->discount_percent?>" required>
                                <div class="invalid-feedback">
                                    Persen diskon tidak boleh kosong
                                </div>         
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label>Status Diskon</label>
                                <select name="active" class="form-control select2" required>
                                <option <?php if($discount->active == "active"){ echo "selected='selected'";} ?> value="active">Aktif</option>
                                <option <?php if($discount->active == "failed"){ echo "selected='selected'";} ?> value="failed">Tidak Akif</option>
                                </select>
                                <div class="invalid-feedback">
                                    Status diskon tidak boleh kosong
                                </div>         
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                      <button type="submit" class="btn btn-primary">Ubah</button>
                      <a href="<?= site_url('diskon')?>" class="btn btn-danger">Kembali</a>
                    </div>
                  </form>
                </div>
              </div>

            </div>
          </div>
        </section>
    </div>
  
<?= $this->endSection() ?>