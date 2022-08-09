<?= $this->extend('layout/back-end/main') ?>

<?= $this->section('content') ?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title; ?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><?= $title; ?></div>
      </div>
    </div>

    <?php csrf_field(); ?>
    <div class="section-body">
      <div class="invoice">
        <div class="invoice-print">
          <div class="row">
            <div class="col-lg-12">
              <div class="invoice-title">
                <h2>Invoice</h2>
                <div class="invoice-number"><?= $order->invoice ?></div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-6">
                  <address>
                    <strong>Tanggal Pemesanan:</strong><br>
                    <?= date('d-M-Y', strtotime($order->booking_date)) ?><br><br>
                    <strong>Pembayaran:</strong><br>
                    <?= $order->bank ?> (Transfer)<br>
                  </address>
                </div>
                <div class="col-md-6 text-md-right">
                  <address>
                    <strong>Jasa Pengiriman:</strong><br>
                    <?= $order->expedition ?><br><br>
                    <strong>Dikirim ke:</strong><br>
                    <?= $order->first_name ?> <?= $order->last_name ?><br>
                    <?= $order->telephone ?><br>
                    <?= $order->address ?><br>
                    Kode Pos <?= $order->postal_code ?>
                  </address>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="section-title">Pesanan</div>
              <div class="table-responsive">
                <table class="table table-striped table-hover table-md">
                  <tr>
                    <th>Item</th>
                    <th class="text-center">Berat</th>
                    <th class="text-center">Harga</th>
                    <th class="text-center">Qty</th>
                    <th class="text-right">subtotal</th>
                  </tr>
                  <tbody>
                    <tr id="order">
                      <td><?= $order->name ?></td>
                      <td class="text-center"><?= $order->weight ?></td>
                      <td class="text-center">Rp <?= number_format($order->price, 0, ',', '.') ?></td>
                      <td class="text-center"><?= $order->qty ?></td>
                      <td class="text-right">Rp <?= number_format($order->subtotal, 0, ',', '.') ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="row mt-4">
                <div class="col-lg-8">
                </div>
                <div class="col-lg-4 text-right">
                  <div class="invoice-detail-item">
                    <div class="invoice-detail-name">Subtotal</div>
                    <div class="invoice-detail-value">Rp <?= number_format($order->subtotal, 0, ',', '.') ?></div>
                  </div>
                  <div class="invoice-detail-item">
                    <div class="invoice-detail-name">Pengiriman</div>
                    <div class="invoice-detail-value">Rp <?= number_format($order->shiping, 0, ',', '.') ?></div>
                  </div>
                  <hr class="mt-2 mb-2">
                  <div class="invoice-detail-item">
                    <div class="invoice-detail-name">Total</div>
                    <div class="invoice-detail-value invoice-detail-value-lg">Rp <?= number_format($order->total, 0, ',', '.') ?></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr>
        <div class="text-md-right">
          <div class="float-lg-left mb-lg-0 mb-3">
            <a href="<?= site_url('orderan-masuk') ?>" class="btn btn-danger btn-icon icon-left"><i class="fas fa-arrow-left"></i> Kembali</a>
          </div>
          <a href="<?= site_url('orderan-print/') . $order->order_id ?>" class="btn btn-primary btn-icon icon-left" target="_blank"><i class="fas fa-print"></i> Print</a>
        </div>
      </div>
    </div>
  </section>
</div>

<?= $this->endSection() ?>