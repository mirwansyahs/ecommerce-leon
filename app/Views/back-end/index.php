<?= $this->extend('layout/back-end/main') ?>

<?= $this->section('content') ?>
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>

    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="fas fa-th"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Kategori</h4>
            </div>
            <div class="card-body">
              <?= $category ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="fas fa-tshirt"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Produk</h4>
            </div>
            <div class="card-body">
              <?= $product ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="fas fa-copyright"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Brand</h4>
            </div>
            <div class="card-body">
              <?= $brand ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="fas fa-percent"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Diskon</h4>
            </div>
            <div class="card-body">
              <?= $discount ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="fas fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Pelanggan</h4>
            </div>
            <div class="card-body">
              <?= $costumer ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="fas fa-box-open"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Orderan Masuk</h4>
            </div>
            <div class="card-body">
              <?= $orderIn ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="fas fa-truck"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Orderan Dikirim</h4>
            </div>
            <div class="card-body">
              <?= $orderDelivery ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="fas fa-check"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Orderan Diterima</h4>
            </div>
            <div class="card-body">
              <?= $orderComplete ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="fas fa-money-bill-wave"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Pendapatan Perhari</h4>
            </div>
            <div class="card-body">
              <?php if ($incomePerDay == null) { ?>
                Rp. 0
              <?php } else { ?>
                Rp <?= number_format($incomePerDay['SUM(order_product.subtotal)'], 0, ',', '.') ?>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="fas fa-money-bill-wave"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Pendapatan Perbulan</h4>
            </div>
            <div class="card-body">
              <?php if ($incomePerMonth == null) { ?>
                Rp. 0
              <?php } else { ?>
                Rp <?= number_format($incomePerMonth['SUM(order_product.subtotal)'], 0, ',', '.') ?>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="fas fa-money-bill-wave"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Pendapatan Pertahun</h4>
            </div>
            <div class="card-body">
              <?php if ($incomePerYear == null) { ?>
                Rp. 0
              <?php } else { ?>
                Rp <?= number_format($incomePerYear['SUM(order_product.subtotal)'], 0, ',', '.') ?>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-lg-12 col-md-12 col-12 col-sm-12">
        <div class="card">
          <div class="card-header">
            <h4>Statistik</h4>
          </div>
          <div class="card-body">
            <canvas id="myChart" height="182"></canvas>
            <?php
            $date = "";
            $total = "";

            foreach ($graph as $g) {
              $dt = date('d-F-Y', strtotime($g['date_received']));
              $date .= "'$dt'" . ",";

              $subtotal = $g['subtotal'];
              $total .= "'$subtotal'" . ",";
            }
            ?>
          </div>
        </div>
      </div>
  </section>
</div>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script src="<?= site_url('back-end/dist/assets/modules/chart.min.js') ?>"></script>
<script>
  var ctx = document.getElementById("myChart").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'line',
    responsive: true,
    data: {
      labels: [<?= $date ?>],
      datasets: [{
        label: 'Satistik Penjualan',
        data: [<?= $total ?>],
        borderWidth: 2,
        backgroundColor: 'rgba(63,82,227,.8)',
        borderWidth: 0,
        borderColor: 'transparent',
        pointBorderWidth: 0,
        pointRadius: 3.5,
        pointBackgroundColor: 'transparent',
        pointHoverBackgroundColor: 'rgba(63,82,227,.8)',
      }]
    },
  });
</script>
<?= $this->endSection() ?>