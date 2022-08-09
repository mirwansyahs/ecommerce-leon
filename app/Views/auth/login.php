<?= $this->extend('layout/auth/main') ?>

<?= $this->section('content') ?>
    <div class="card card-dark">
        <div class="card-header">
            <h4>Masuk</h4>
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

            <form method="POST" action="login" class="needs-validation" novalidate="">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label for="no_hp">No. Telepon</label>
                    <input id="no_hp" type="number" class="form-control" name="no_hp" tabindex="1" value="<?= old('no_hp'); ?>" required autofocus>
                    <div class="invalid-feedback">
                      No. telepon tidak boleh kosong
                    </div>
                </div>

                <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Kata Sandi</label>
                      <div class="float-right">
                        <a href="lupa-kata-sandi" class="text-small text-dark">
                          Lupa Kata Sandi?
                        </a>
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                        Kata sandi tidak boleh kosong
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-dark btn-lg btn-block" tabindex="4">
                      Masuk
                    </button>
                </div>

            </form>
        </div>
    </div>
    
    <div class="mt-5 text-muted text-center">
        Belum punya akun? Silahkan <a href="daftar" class="text-dark">Daftar</a>
    </div>
<?= $this->endSection() ?>