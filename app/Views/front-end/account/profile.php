<?= $this->extend('layout/front-end/main') ?>

<?= $this->section('content') ?>

<section class="py-5">
    <div class="container">
        <div class="card">
            <div class="card-header bg-dark">
                <h5 class="text-white">Akun Saya</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 mt-3">
                        <div class="container">
                            <center>
                                <img src="<?= site_url('img/avatar/') . $user->image?>" alt="avatar" class="shadow mb-3" width="200px" height="220px">
                            </center>
                        </div>
                    </div>
                    <div class="col-lg-9 mt-3">
                    <?php if(session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('success'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    
                        <div class="container">
                            <form method="POST" action="<?= site_url('simpan-akun-saya/'.$user->username)?>" class="needs-validation" novalidate="" enctype="multipart/form-data">
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group mb-2">
                                    <div class="row">
                                        <div class="col-md-4 mt-2">
                                            <label class="control-label">Foto</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <div class="row">
                                        <div class="col-md-4 mt-2">
                                            <label class="control-label">Username</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="username" class="form-control" value="<?= $user->username; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <div class="row">
                                        <div class="col-md-4 mt-2">
                                            <label class="control-label">Nama Depan</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="first_name" class="form-control" value="<?= $user->first_name; ?>" required>
                                            <div class="invalid-feedback">
                                                Nama depan tidak boleh kosong
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <div class="row">
                                        <div class="col-md-4 mt-2">
                                            <label class="control-label">Nama Belakang</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="last_name" class="form-control" value="<?= $user->last_name; ?>" required>
                                            <div class="invalid-feedback">
                                                Nama belakang tidak boleh kosong
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <div class="row">
                                        <div class="col-md-4 mt-2">
                                            <label class="control-label">Email</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="email" name="email" class="form-control" value="<?= $user->email; ?>" required>
                                            <div class="invalid-feedback">
                                                Email tidak boleh kosong
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-2">
                                    <div class="row">
                                        <div class="col-md-4 mt-2">
                                            <label class="control-label">No. Telepone</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="telephone" class="form-control" value="<?= $user->telephone; ?>" required>
                                            <div class="invalid-feedback">
                                                No. telepon tidak boleh kosong
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <center>
                                        <button type="submit" class="btn btn-dark btn-block">Simpan</button>
                                    </center>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>