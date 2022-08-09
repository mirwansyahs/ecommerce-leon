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
        <div class="card-header">
          <a href="tambah-produk" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah
          </a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped" id="table-2">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Foto</th>
                  <th>Deskripsi</th>
                  <th>Kategori</th>
                  <th>Stok</th>
                  <th>Diskon</th>
                  <th>Harga Asli (tanpa diskon)</th>
                  <th>Harga Jual (harga diskon)</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($product as $p) {
                ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $p['name']; ?></td>
                    <td><img src="/img/product/<?= $p['image']; ?>" alt="product" width="50px" height="50px"></td>
                    <td><?= word_limiter($p['desc'], 10); ?></td>
                    <td><?= $p['category_name']; ?></td>
                    <td><?= $p['quantity']; ?></td>
                    <td><?= $p['discount_percent']; ?>%</td>
                    <td>Rp <?= number_format($p['original_price'], 0, ',', '.') ?></td>
                    <td>Rp <?= number_format($p['price'], 0, ',', '.') ?></td>
                    <td>
                      <a href="edit-produk/<?= $p['id'] ?>" class="btn btn-success mb-2">Edit</a>
                      <form action="hapus-produk/<?= $p['id'] ?>" method="post" class="d-inline">
                        <?php csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger">Hapus</button>
                      </form>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?= $this->endSection() ?>