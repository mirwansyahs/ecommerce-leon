<?= $this->extend('layout/auth/main') ?>

<?= $this->section('content') ?>
    <div class="card card-dark">
        <div class="card-header">
            <h4>Lupa Kata Sandi</h4>
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
            <form method="POST" action="forgotpassword" class="needs-validation" novalidate="">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label for="no_hp">No. Telepon</label>
                    <input id="no_hp" type="number" class="form-control" name="no_hp" tabindex="1" value="<?= old('no_hp'); ?>" required autofocus>
                    <div class="invalid-feedback">
                      No. telepon tidak boleh kosong
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-dark btn-lg btn-block" tabindex="4">
                      Lupa Kata Sandi
                    </button>

                    <div class="mt-4 text-muted text-center text-decoration-none">
                        <a href="masuk" class="text-dark">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?= $this->endSection() ?>