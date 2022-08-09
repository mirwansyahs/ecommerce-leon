<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <?php
  $db = db_connect();
  $query = $db->table('store')->getWhere([])->getRow();
  ?>
  <title><?= $title; ?> | <?= $query->name; ?></title>

  <!-- Favicons -->
  <link href="<?= '/img/logo/' . $query->image; ?>" rel="icon">
  <link href="<?= '/img/logo/' . $query->image; ?>" rel="apple-touch-icon">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url('back-end/dist/assets/modules/bootstrap/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('back-end/dist/assets/modules/fontawesome/css/all.min.css'); ?>">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url('back-end/dist/assets/modules/datatables/datatables.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('back-end/dist/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('back-end/dist/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('back-end/dist/assets/modules/prism/prism.css'); ?>">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url('back-end/dist/assets/css/style.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('back-end/dist/assets/css/components.css'); ?>">
  <!-- Start GA -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-94034622-3');
  </script>
  <!-- /END GA -->
</head>

<!-- Main Content -->
<div class="container">
  <section class="section">
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
              <strong>Pesanan</strong>
              <div class="table-responsive mt-2">
                <table class="table table-striped table-hover table-md">
                  <tr>
                    <th>Item</th>
                    <th class="text-center">Berat</th>
                    <th class="text-center">Harga</th>
                    <th class="text-center">Qty</th>
                    <th class="text-right">Total</th>
                  </tr>
                  <tr>
                    <td><?= $order->name ?></td>
                    <td class="text-center"><?= $order->weight ?></td>
                    <td class="text-center">Rp <?= number_format($order->price, 0, ',', '.') ?></td>
                    <td class="text-center"><?= $order->qty ?></td>
                    <td class="text-right">Rp <?= number_format($order->subtotal, 0, ',', '.') ?></td>
                  </tr>
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
      </div>
    </div>
  </section>
</div>


<!-- General JS Scripts -->
<script src="<?= base_url('back-end/dist/assets/modules/jquery.min.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('back-end/dist/assets/modules/popper.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('back-end/dist/assets/modules/tooltip.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('back-end/dist/assets/modules/bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('back-end/dist/assets/modules/nicescroll/jquery.nicescroll.min.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('back-end/dist/assets/modules/moment.min.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('back-end/dist/assets/js/stisla.js'); ?>" type="text/javascript"></script>

<!-- JS Libraies -->
<script src="<?= base_url('back-end/dist/assets/modules/datatables/datatables.min.js'); ?>"></script>
<script src="<?= base_url('back-end/dist/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js'); ?>"></script>
<script src="<?= base_url('back-end/dist/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js'); ?>"></script>
<script src="<?= base_url('back-end/dist/assets/modules/jquery-ui/jquery-ui.min.js'); ?>"></script>
<script src="<?= base_url('back-end/dist/assets/modules/prism/prism.js'); ?>"></script>


<!-- Page Specific JS File -->
<script src="<?= base_url('back-end/dist/assets/js/page/modules-datatables.js'); ?>"></script>
<script src="<?= base_url('back-end/dist/assets/js/page/bootstrap-modal.js'); ?>"></script>

<!-- Template JS File -->
<script src="<?= base_url('back-end/dist/assets/js/scripts.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('back-end/dist/assets/js/custom.js'); ?>" type="text/javascript"></script>
<script>
  window.print();
</script>
</body>

</html>