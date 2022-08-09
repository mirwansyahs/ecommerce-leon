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
                <h4>Data <?= $title; ?></h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped" id="table-2">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th width="30%">Nama Lengkap</th>
                        <th>Telepon</th>
                        <th>Negara</th>
                        <th>Provinsi</th>
                        <th>Kabupaten</th>
                        <th>Kecamatan</th>
                        <th>Desa</th>
                        <th>Kode Pos</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $no = 1;
                        foreach ($costumer as $c) {
                            if ($c['level'] == 'user') {
                      ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $c['first_name']; ?> <?= $c['last_name']; ?></td>
                        <td><?= $c['telephone']; ?></td>
                        <td><?= $c['country']; ?></td>
                        <td><?= $c['province']; ?></td>
                        <td><?= $c['city']; ?></td>
                        <td><?= $c['district']; ?></td>
                        <td><?= $c['village']; ?></td>
                        <td><?= $c['postal_code']; ?></td>
                      </tr>
                      <?php 
                           }
                        } 
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </section>
    </div>
<?= $this->endSection() ?>