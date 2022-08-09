<?= $this->extend('layout/auth/mainRegister') ?>

<?= $this->section('content') ?>
    <div class="card card-dark">
        <div class="card-header">
            <h4>Daftar</h4>
        </div>

        <div class="card-body">
            <?php if(session()->getFlashdata('error')) { ?>
                <div class="alert alert-danger alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">x</button>
                        <b>Error !</b>
                        <?= session()->getFlashdata('error'); ?>
                    </div>
                </div>
            <?php } else if(session()->getFlashdata('success')) { ?>
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">x</button>
                        <?= session()->getFlashdata('success'); ?>
                    </div>
                </div>
            <?php } ?>

            <?php $validation =  \Config\Services::validation(); ?>
            <form method="POST" action="register" class="needs-validation" novalidate="">
                <?= csrf_field(); ?>
                <div class="row">
                    <div class="form-group col-6">
                        <label for="frist_name">Nama Depan</label>
                        <input id="frist_name" type="text" class="form-control" name="first_name" autofocus required>
                        <div class="invalid-feedback">
                            Nama depan tidak boleh kosong
                        </div>
                    </div>
                    <div class="form-group col-6">
                        <label for="last_name">Nama Belakang</label>
                        <input id="last_name" type="text" class="form-control" name="last_name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="text" class="form-control <?php if($validation->getError('username')): ?>is-invalid<?php endif ?>" name="username">
                    <?php if ($validation->getError('username')): ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('username') ?>
                        </div>                                
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="telephone">No. Telepon</label>
                    <input id="telephone" type="number" class="form-control <?php if($validation->getError('telephone')): ?>is-invalid<?php endif ?>" name="telephone">
                    <?php if ($validation->getError('telephone')): ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('telephone') ?>
                        </div>                                
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" required>
                    <div class="invalid-feedback">
                        Email tidak boleh kosong
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-6">
                        <label for="password" class="d-block">Kata Sandi</label>
                        <input id="password" type="password" class="form-control <?php if($validation->getError('password')): ?>is-invalid<?php endif ?>" name="password">
                        <?php if ($validation->getError('password')): ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('password') ?>
                            </div>                                
                        <?php endif; ?>
                    </div>
                    <div class="form-group col-6">
                        <label for="password2" class="d-block">Konfirmasi Kata Sandi</label>
                        <input id="password2" type="password" class="form-control <?php if($validation->getError('password2')): ?>is-invalid<?php endif ?>" name="password2">
                        <?php if ($validation->getError('password2')): ?>
                            <div class="invalid-feedback">
                              <?= $validation->getError('password2') ?>
                            </div>                                
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-divider">
                    Tempat Tinggal
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label>Negara</label>
                        <input type="text" class="form-control" name="country" required>
                        <div class="invalid-feedback">
                            Negara tidak boleh kosong
                        </div>
                    </div>
                    <div class="form-group col-6">
                        <label>Provinsi</label>
                        <input type="text" class="form-control" name="province" required>
                        <div class="invalid-feedback">
                            Provinsi tidak boleh kosong
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label>Kota</label>
                        <input type="text" class="form-control" name="city" required>
                        <div class="invalid-feedback">
                            Kota tidak boleh kosong
                        </div>
                    </div>
                    <div class="form-group col-6">
                        <label>Kecamatan</label>
                        <input type="text" class="form-control" name="district" required>
                        <div class="invalid-feedback">
                            Kecamatan tidak boleh kosong
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <label>Desa/Kelurahan</label>
                        <input type="text" class="form-control" name="village" required>
                        <div class="invalid-feedback">
                            Desa/Kelurahan tidak boleh kosong
                        </div>
                    </div>
                    <div class="form-group col-6">
                        <label>Kode Pos</label>
                        <input type="number" class="form-control <?php if($validation->getError('postal_code')): ?>is-invalid<?php endif ?>" name="postal_code" required>
                        <?php if ($validation->getError('postal_code')): ?>
                            <div class="invalid-feedback">
                              <?= $validation->getError('postal_code') ?>
                            </div>                                
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="address">Alamat</label>
                    <textarea id="address" class="form-control" name="address" required></textarea>
                    <div class="invalid-feedback">
                        Alamat tidak boleh kosong
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-dark btn-lg btn-block" tabindex="4">
                      Daftar
                    </button>
                </div>

            </form>
        </div>
    </div>
    
    <div class="mt-5 text-muted text-center">
        Sudah punya akun? Silahkan <a href="masuk" class="text-dark">Masuk</a>
    </div>
<?= $this->endSection() ?>