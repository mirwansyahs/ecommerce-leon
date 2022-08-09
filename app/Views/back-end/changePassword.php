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
              Ubah kata sandi anda di halaman ini.
            </p>

            <div class="row mt-sm-6">
              <div class="col-12 col-md-12 col-lg-6">
                <?php if(session()->getFlashdata('success')) {  ?>
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">x</button>
                            <?= session()->getFlashdata('success'); ?>
                        </div>
                    </div>
                <?php } else if(session()->getFlashdata('error')) { ?>
                    <div class="alert alert-danger alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">x</button>
                            <?= session()->getFlashdata('error'); ?>
                        </div>
                    </div>
                <?php } ?>
                <div class="card">
                  <?php $validation =  \Config\Services::validation(); ?>
                  <form method="post" action="changepassword" class="needs-validation" novalidate="">
                  <?= csrf_field(); ?>
                    <div class="card-header">
                      <h4>Ganti Kata Sandi</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                          <div class="form-group col-lg-12">
                            <label>Kata Sandi Lama</label>
                            <input type="password" class="form-control <?php if($validation->getError('old_password')): ?>is-invalid<?php endif ?>" name="old_password">
                            <?php if ($validation->getError('old_password')): ?>
                              <div class="invalid-feedback">
                                  <?= $validation->getError('old_password') ?>
                              </div>                                
                            <?php endif; ?>
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Kata Sandi Baru</label>
                            <input type="password" class="form-control <?php if($validation->getError('new_password')): ?>is-invalid<?php endif ?>" name="new_password">
                            <?php if ($validation->getError('new_password')): ?>
                              <div class="invalid-feedback">
                                  <?= $validation->getError('new_password') ?>
                              </div>                                
                            <?php endif; ?>
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Konfirmasi Kata Sandi</label>
                            <input type="password" class="form-control <?php if($validation->getError('confirm_password')): ?>is-invalid<?php endif ?>" name="confirm_password">
                            <?php if ($validation->getError('confirm_password')): ?>
                              <div class="invalid-feedback">
                                  <?= $validation->getError('confirm_password') ?>
                              </div>                                
                            <?php endif; ?>
                          </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary">Simpan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
    </div>

<?= $this->endSection() ?>