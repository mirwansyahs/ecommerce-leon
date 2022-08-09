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
            <form method="post" action="printReport" target="_blank" class="needs-validation" novalidate="">
              <?php csrf_field(); ?>
              <div class="card-header">
                <h4><?= $title; ?></h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-lg-12">
                    <label>Tanggal Awal</label>
                    <input type="date" class="form-control" name="start_date" required autofocus>
                    <div class="invalid-feedback">
                      Tanggal awal tidak boleh kosong
                    </div>
                  </div>
                  <div class="form-group col-lg-12">
                    <label>Tanggal Akhir</label>
                    <input type="date" class="form-control" name="end_date" required>
                    <div class="invalid-feedback">
                      Tanggal akhir tidak boleh kosong
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary"><i class="fas fa-print"></i> Cetak Laporan</button>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </section>
</div>

<?= $this->endSection() ?>