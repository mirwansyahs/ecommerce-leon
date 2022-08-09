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

            <?php if(session()->getFlashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">x</button>
                        <?= session()->getFlashdata('success'); ?>
                    </div>
                </div>
            <?php endif; ?>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4><?= $title; ?></h4>
                  </div>
                  <div class="card-body">

                    <?= csrf_field(); ?>
                    <form action="savesetting" method="POST" class="needs-validation" novalidate="" enctype="multipart/form-data">
                      <input type="hidden" name="id" value="<?= $setting['id']; ?>">
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Toko</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control" name="name" value="<?= $setting['name']; ?>" required>
                          <div class="invalid-feedback">
                            Nama toko tidak boleh kosong
                          </div>
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Logo</label>
                        <img src="/img/logo/<?= $setting['image']; ?>" class="col-sm-12 col-md-2" width="50px" height="100px">
                        <div class="col-sm-12 col-md-4">
                          <input type="file" class="form-control" name="image">
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="email" class="form-control" name="email" value="<?= $setting['email']; ?>" required>
                          <div class="invalid-feedback">
                            Email tidak boleh kosong
                          </div>
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">No. Telepon</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="number" class="form-control" name="telephone" value="<?= $setting['telephone']; ?>" required>
                          <div class="invalid-feedback">
                            No. telepon tidak boleh kosong
                          </div>
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tentang</label>
                        <div class="col-sm-12 col-md-7">
                          <textarea class="form-control" name="about" required><?= $setting['about']; ?></textarea>
                          <div class="invalid-feedback">
                            Tentang tidak boleh kosong
                          </div>
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                        <div class="col-sm-12 col-md-7">
                          <textarea class="form-control" name="address" required><?= $setting['address']; ?></textarea>
                          <div class="invalid-feedback">
                            Alamat depan tidak boleh kosong
                          </div>
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Facebook</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control" name="facebook" value="<?= $setting['facebook']; ?>">
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Instagram</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control" name="instagram" value="<?= $setting['instagram']; ?>">
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Twitter</label>
                        <div class="col-sm-12 col-md-7">
                          <input type="text" class="form-control" name="twitter" value="<?= $setting['twitter']; ?>">
                        </div>
                      </div>
                      <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                        <div class="col-sm-12 col-md-7">
                          <button class="btn btn-primary">Simpan</button>
                        </div>
                      </div>
                    </form>

                  </div>
                </div>
              </div>
            </div>
              
          </div>
        </section>
    </div>

  <!-- JS Libraies -->
  <script src="<?= base_url('back-end/dist/assets/modules/sweetalert/sweetalert.min.js'); ?>" type="text/javascript"></script>
  
<?= $this->endSection() ?>