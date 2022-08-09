<?= $this->extend('layout/front-end/main') ?>

<?= $this->section('content') ?>
<section class="h-100 h-custom" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <div class="card">
                    <div class="card-body p-4">

                        <?php if (session()->getFlashdata('success')) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= session()->getFlashdata('success'); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <div class="row">

                            <div class="col-lg-12">
                                <?php foreach ($order as $o) { ?>
                                    <?php if ($o['status_item'] == 'in') { ?>
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex flex-row align-items-center">
                                                        <div>
                                                            <img src="<?= site_url('img/product/' . $o['image']) ?>" class="img-fluid rounded-3" alt="Shopping item" style="width: 65px; height: 68px">
                                                        </div>
                                                        <div class="ms-3">
                                                            <h5 style="font-size: 18px;"><?= $o['name'] ?></h5>
                                                            <p class="small mb-0"><?= $o['size_item'] ?>, <?= $o['color_item'] ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-row align-items-center">
                                                        <div class="ms-3">
                                                            <h6 class="mb-0">Pesanan Dikemas</h6>
                                                            <p class="small mb-0">Tanggal: <?= date('d-m-Y', strtotime($o['booking_date'])) ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-row align-items-center">
                                                        <div class="ms-3">
                                                            <h6 class="mb-0">qty</h6>
                                                            <center>
                                                                <p class="small mb-0"><?= $o['qty'] ?></p>
                                                            </center>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-row align-items-center">
                                                        <div class="ms-3">
                                                            <h6 class="mb-0">Subtotal</h6>
                                                            <center>
                                                                <p class="small mb-0">Rp <?= number_format($o['subtotal'], 0, ',', '.') ?></p>
                                                            </center>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } else { ?>
                                        <center>
                                            <h5>Tidak ada data pesanan!</h5>
                                        </center>
                                    <?php } ?>
                                <?php } ?>
                            </div>

                            <!-- </form> -->
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<div class="viewmodal" style="display: none;"></div>
<?= $this->endSection() ?>