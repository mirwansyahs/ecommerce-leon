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
  <link rel="stylesheet" href="<?= base_url('back-end/dist/assets/modules/bootstrap-social/bootstrap-social.css'); ?>">

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
<!-- /END GA --></head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="/img/logo/<?= $query->image; ?>" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <?= $this->renderSection('content') ?>
            
            <div class="simple-footer">
              Copyright &copy; <?= $query->name; ?> 2022
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="<?= base_url('back-end/dist/assets/modules/jquery.min.js'); ?>"></script>
  <script src="<?= base_url('back-end/dist/assets/modules/popper.js'); ?>"></script>
  <script src="<?= base_url('back-end/dist/assets/modules/tooltip.js'); ?>"></script>
  <script src="<?= base_url('back-end/dist/assets/modules/bootstrap/js/bootstrap.min.js'); ?>"></script>
  <script src="<?= base_url('back-end/dist/assets/modules/nicescroll/jquery.nicescroll.min.js'); ?>"></script>
  <script src="<?= base_url('back-end/dist/assets/modules/moment.min.js'); ?>"></script>
  <script src="<?= base_url('back-end/dist/assets/js/stisla.js'); ?>"></script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="<?= base_url('back-end/dist/assets/js/scripts.js'); ?>"></script>
  <script src="<?= base_url('back-end/dist/assets/js/custom.js'); ?>"></script>
</body>
</html>