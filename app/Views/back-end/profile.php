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
            <h2 class="section-title">Hi, <?= $profile['first_name']; ?>!</h2>
            <p class="section-lead">
              Ubah informasi tentang diri anda di halaman ini.
            </p>

            <?php if(session()->getFlashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">x</button>
                        <?= session()->getFlashdata('success'); ?>
                    </div>
                </div>
            <?php endif; ?>

            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                  <div class="profile-widget-header">                     
                    <img alt="image" src="/img/avatar/<?= $profile['image']; ?>" class="rounded-circle profile-widget-picture">
                  </div>
                  <div class="profile-widget-description">
                    <div class="profile-widget-name"><?= $profile['username']; ?> <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> <?= $profile['level']; ?></div></div>
                    <div class="row">
                      <div class="col-md-5">
                        <label class="profile-widget-name text-muted">Nama Depan</label>
                      </div>
                      <div class="col-md-7">
                        <h4 class="profile-widget-name"><?= $profile['first_name']; ?></h4>
                      </div>
                      <div class="col-md-5">
                        <label class="profile-widget-name text-muted">Nama Belakang</label>
                      </div>
                      <div class="col-md-7">
                        <h4 class="profile-widget-name"><?= $profile['last_name']; ?></h4>
                      </div>
                      <div class="col-md-5">
                        <label class="profile-widget-name text-muted">Email</label>
                      </div>
                      <div class="col-md-7">
                        <h4 class="profile-widget-name"><?= $profile['email']; ?></h4>
                      </div>
                      <div class="col-md-5">
                        <label class="profile-widget-name text-muted">No. Telepon</label>
                      </div>
                      <div class="col-md-7">
                        <h4 class="profile-widget-name"><?= $profile['telephone']; ?></h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                  <?php $validation =  \Config\Services::validation(); ?>
                  <form method="post" action="save" class="needs-validation" novalidate="" enctype="multipart/form-data">
                    <?php csrf_field(); ?>
                    <div class="card-header">
                      <h4>Ubah Profil</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">                               
                          <div class="form-group col-lg-12">
                            <label for="formFile" class="form-label">Foto</label>
                            <input class="form-control" type="file" id="formFile" name="image">
                          </div>
                          <div class="form-group col-lg-12">
                            <label>Username</label>
                            <input type="text" class="form-control <?php if($validation->getError('username')): ?>is-invalid<?php endif ?>" name="username" value="<?= $profile['username']; ?>">
                            <?php if ($validation->getError('username')): ?>
                              <div class="invalid-feedback">
                                  <?= $validation->getError('username') ?>
                              </div>                                
                            <?php endif; ?>
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Nama Depan</label>
                            <input type="text" class="form-control" name="first_name" value="<?= $profile['first_name']; ?>" required>
                            <div class="invalid-feedback">
                              Nama depan tidak boleh kosong
                            </div>
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Nama Belakang</label>
                            <input type="text" class="form-control" name="last_name" value="<?= $profile['last_name']; ?>" required>
                            <div class="invalid-feedback">
                              Nama belakang tidak boleh kosong
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-lg-12">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="<?= $profile['email']; ?>" required>
                            <div class="invalid-feedback">
                              Email tidak boleh kosong
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-lg-12">
                            <label>No. Telepon</label>
                            <input type="number" class="form-control" name="telephone" value="<?= $profile['telephone']; ?>" required>
                            <div class="invalid-feedback">
                              No. telepon tidak boleh kosong
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </form>
                </div>
              </div>

            </div>
          </div>
        </section>
    </div>
  
<?= $this->endSection() ?>