<?= $this->extend('layout/back-end/main') ?>

<?= $this->section('content') ?>

<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= $title; ?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="dashboard">Dashboard</a></div>
        <div class="breadcrumb-item"><?= $title; ?></div>
      </div>
    </div>

    <div class="col-12">
      <?php if (session()->getFlashdata('error')) { ?>
        <div class="alert alert-danger alert-dismissible show fade">
          <div class="alert-body">
            <button class="close" data-dismiss="alert">x</button>
            <b>Error !</b>
            <?= session()->getFlashdata('error'); ?>
          </div>
        </div>
      <?php } else if (session()->getFlashdata('success')) { ?>
        <div class="alert alert-success alert-dismissible show fade">
          <div class="alert-body">
            <button class="close" data-dismiss="alert">x</button>
            <?= session()->getFlashdata('success'); ?>
          </div>
        </div>
      <?php } ?>
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped" id="table-2">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Invoice</th>
                  <th>Nama Pembeli</th>
                  <th>Nama Produk</th>
                  <th>Foto Produk</th>
                  <th>Ukuran</th>
                  <th>Warna</th>
                  <th>Harga</th>
                  <th>Qty</th>
                  <th>Pembayaran</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($order as $o) {
                  if ($o['status_item'] == 'in') {
                ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $o['invoice']; ?></td>
                      <td><?= $o['first_name']; ?> <?= $o['last_name']; ?></td>
                      <td><?= $o['name']; ?></td>
                      <td><img src="/img/product/<?= $o['image']; ?>" alt="product" width="50px" height="50px"></td>
                      <td><?= $o['size_item']; ?></td>
                      <td><?= $o['color_item']; ?></td>
                      <td>Rp <?= number_format($o['price'], 0, ',', '.') ?></td>
                      <td><?= $o['qty']; ?></td>
                      <td><?= $o['bank']; ?></td>
                      <td>
                        <?php if ($o['status_item'] == 'in') { ?>
                          <div class="badge bg-warning text-white">Dikemas</div>
                        <?php } ?>
                      </td>
                      <td>
                        <a href="orderan-print/<?= $o['order_id'] ?>" class="btn btn-primary mb-2" target="_blank">Cetak</a>
                        <a href="detail-orderan-masuk/<?= $o['order_id'] ?>" class="btn btn-info mb-2">Detail</a>
                        <button class="btn btn-success" onclick="sendresi('<?= $o['order_id'] ?>')">Dikirim</button>
                      </td>
                    </tr>
                <?php }
                } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="viewmodal" style="display: none;"></div>
</div>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script src="<?= site_url('back-end/dist/assets/js/page/bootstrap-modal.js') ?>"></script>
<script>
  function sendresi(id) {
    $.ajax({
      url: "<?= site_url('konfiramsi-pengiriman') ?>",
      dataType: "json",
      data: {
        order_id: id
      },
      success: function(response) {
        if (response.data) {
          $('.viewmodal').html(response.data).show();
          $('#modalresi').on('shown.bs.modal', function(event) {
            $('#resi').focus();
          });
          $('#modalresi').modal('show');
        }
      },
      error: function(xhr, thrownError) {
        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
      }
    });
  }
</script>
<?= $this->endSection() ?>