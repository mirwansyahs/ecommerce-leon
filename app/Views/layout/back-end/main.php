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

  <?= $this->renderSection('css') ?>

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
  <div id="app">
    <div class="main-wrapper main-wrapper-1">

      <!-- Topbar -->
      <?= $this->include('layout/back-end/topbar') ?>

      <!-- Sidebar -->
      <?= $this->include('layout/back-end/sidebar') ?>

      <?= $this->renderSection('content') ?>

      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2022 <div class="bullet"></div> Design By <a href="/"><?= $query->name; ?></a>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
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

  <?= $this->renderSection('javascript') ?>
  </script>
</body>
</html>