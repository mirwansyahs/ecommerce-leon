<?= $this->extend('layout/front-end/main') ?>

<?= $this->section('content') ?>

<section class="py-5">
    <div class="container">
        <center>
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header bg-dark">
                        <h5 class="text-white">Ubah Alamat</h5>
                    </div>
                    <div class="card-body">
                        <?php if (session()->getFlashdata('success')) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('success'); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <form method="POST" action="<?= site_url('simpan-ubah-alamat/' . $user->username) ?>" class="needs-validation" novalidate="">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="id" value="<?= $user->id?>">
                            <div class="form-group mb-2">
                                <div class="row">
                                    <div class="col-md-4 mt-2">
                                        <label class="control-label">Nama Lengkap</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" value="<?= $user->first_name; ?> <?= $user->last_name; ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <div class="row">
                                    <div class="col-md-4 mt-2">
                                        <label class="control-label">No. Telepon</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="telephone" class="form-control" value="<?= $user->telephone; ?>" required>
                                        <div class="invalid-feedback">
                                            No. telepon tidak boleh kosong
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <div class="row">
                                    <div class="col-md-4 mt-2">
                                        <label class="control-label">Negara</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="country" class="form-control" value="<?= $user->country; ?>" required>
                                        <div class="invalid-feedback">
                                            Negara tidak boleh kosong
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <div class="row">
                                    <div class="col-md-4 mt-2">
                                        <label class="control-label">Provinsi</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="province" class="form-control" value="<?= $user->province; ?>" required>
                                        <div class="invalid-feedback">
                                            Provinsi tidak boleh kosong
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <div class="row">
                                    <div class="col-md-4 mt-2">
                                        <label class="control-label">Kecamatan</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="district" class="form-control" value="<?= $user->district; ?>" required>
                                        <div class="invalid-feedback">
                                            Kecamatan tidak boleh kosong
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <div class="row">
                                    <div class="col-md-4 mt-2">
                                        <label class="control-label">Kabupaten/Kota</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="city" class="form-control" value="<?= $user->city; ?>" required>
                                        <div class="invalid-feedback">
                                            Kabupaten/Kota tidak boleh kosong
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <div class="row">
                                    <div class="col-md-4 mt-2">
                                        <label class="control-label">Desa/Kelurahan</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="village" class="form-control" value="<?= $user->village; ?>" required>
                                        <div class="invalid-feedback">
                                            Desa/Kelurahan tidak boleh kosong
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <div class="row">
                                    <div class="col-md-4 mt-2">
                                        <label class="control-label">Kode Pos</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="number" name="postal_code" class="form-control" value="<?= $user->postal_code; ?>" required>
                                        <div class="invalid-feedback">
                                            Kode Pos tidak boleh kosong
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <div class="row">
                                    <div class="col-md-4 mt-2">
                                        <label class="control-label">Alamat Lengkap</label>
                                    </div>
                                    <div class="col-md-8">
                                        <textarea name="address" class="form-control" cols="30" rows="5" required><?= $user->address; ?></textarea>
                                        <div class="invalid-feedback">
                                            Alamat tidak boleh kosong
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
        </center>
    </div>
</section>

<?= $this->endSection() ?>