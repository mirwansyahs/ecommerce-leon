<?= $this->extend('layout/auth/main') ?>

<?= $this->section('content') ?>
    <div class="card bg-dark">
        <div class="card-header">
            <h4>Setel Ulang Kata Sandi</h4>
        </div>

        <div class="card-body">
            <?php if(session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">x</button>
                        <b>Error !</b>
                        <?= session()->getFlashdata('error'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php $validation =  \Config\Services::validation(); ?>
            <form method="POST" action="resetPassword" class="needs-validation" novalidate="">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label for="new_password">Kata Sandi Baru</label>
                    <input id="new_password" type="password" class="form-control <?php if($validation->getError('new_password')): ?>is-invalid<?php endif ?>" name="new_password" tabindex="1" value="<?= old('new_password'); ?>" autofocus>
                    <?php if ($validation->getError('new_password')): ?>
                        <div class="invalid-feedback">
                          <?= $validation->getError('new_password') ?>
                      </div>                                
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="confirm_password">Konfirmasi Kata Sandi</label>
                    <input id="confirm_password" type="password" class="form-control <?php if($validation->getError('confirm_password')): ?>is-invalid<?php endif ?>" name="confirm_password" tabindex="1" autofocus>
                    <?php if ($validation->getError('confirm_password')): ?>
                        <div class="invalid-feedback">
                            <?= $validation->getError('confirm_password') ?>
                        </div>                                
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-dark btn-lg btn-block" tabindex="4">
                      Setel Ulang
                    </button>

                    <div class="mt-4 text-muted text-center text-decoration-none">
                        <a href="lupa-kata-sandi" class="text-dark">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?= $this->endSection() ?>