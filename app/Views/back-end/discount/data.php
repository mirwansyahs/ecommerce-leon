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
            <?php if(session()->getFlashdata('error')) { ?>
              <div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                  <button class="close" data-dismiss="alert">x</button>
                  <b>Error !</b>
                  <?= session()->getFlashdata('error'); ?>
                </div>
              </div>
            <?php } else if(session()->getFlashdata('success')) { ?>
              <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                  <button class="close" data-dismiss="alert">x</button>
                  <?= session()->getFlashdata('success'); ?>
                </div>
              </div>
            <?php } ?>
            <div class="card">
              <div class="card-header">
                <a href="tambah-diskon" class="btn btn-primary">
                  <i class="fas fa-plus"></i> Tambah
                </a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped" id="table-2">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Diskon</th>
                        <th>Deskripsi</th>
                        <th>Diskon Persen</th>
                        <th>Status</th>
                        <th width="18%">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;
                        foreach ($discount as $d) {
                      ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $d['discount_name']; ?></td>
                        <td><?= word_limiter($d['discount_desc'], 10); ?></td>
                        <td><?= $d['discount_percent']; ?>%</td>
                        <td>
                          <?php if ($d['active'] == "failed") { ?>
                            <div class="badge badge-danger">Tidak aktif</div>
                          <?php } else { ?>
                            <div class="badge badge-success">Aktif</div>
                          <?php } ?>
                        </td>
                        <td>
                          <a href="edit-diskon/<?= $d['discount_id']?>" class="btn btn-success">Edit</a>
                          <form action="hapus-diskon/<?= $d['discount_id']?>" method="post" class="d-inline">
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