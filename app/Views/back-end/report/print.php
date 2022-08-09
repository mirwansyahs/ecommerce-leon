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
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA -->
</head>

<body>
    <div class="pt-5">
        <center>
            <h1>Laporan Orderan</h1>
            <p>Periode <?= $start_date ?> - <?= $end_date ?></p>
            
            <div class="col-lg-12">
                <div class="container">
                    <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th width="2%">No</th>
                                <th width="20%">Invoice</th>
                                <th width="20%">Nama Produk</th>
                                <th>Ukuran</th>
                                <th>Warna</th>
                                <th width="15%">Harga</th>
                                <th>Qty</th>
                                <th>Pembayaran</th>
                                <th width="15%">Subtotal</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $no = 1;
                                $total = 0;
                                foreach ($report as $r) {
                                    $total += $r['subtotal'];
                            ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $r['invoice']; ?></td>
                                <td><?= $r['name']; ?></td>
                                <td><?= $r['size_item']; ?></td>
                                <td><?= $r['color_item']; ?></td>
                                <td>Rp <?= number_format($r['price'], 0, ',', '.')?></td>
                                <td><?= $r['qty']; ?></td>
                                <td><?= $r['bank']; ?></td>
                                <td>Rp <?= number_format($r['subtotal'], 0, ',', '.')?></td>
                            </tr>
                            <?php } ?>
                            </tbody>
                            <tfoot>
                                <th colspan="8" class="text-right">Total Keseluruhan Harga</th>
                                <td>Rp <?= number_format($total, 0, ',', '.')?></td>
                            </tfoot>
                        </table>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </center>
    </div>
</body>


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