<!-- Modal -->
<div class="modal fade" id="changeAddress" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="<?= site_url('sendChangeAddress/' . $address->id) ?>" method="post" class="needs-validation" novalidate="">
        <?php csrf_field(); ?>
        <input type="hidden" name="_method" value="PUT">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pengiriman</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" class="form-control" value="<?= $address->id ?>">
          <div class="form-group mb-3">
            <label>Nama Lengkap</label>
            <input type="text" class="form-control" value="<?= $address->first_name ?> <?= $address->last_name ?>">
          </div>
          <div class="form-group mb-3">
            <label>Email</label>
            <input type="email" class="form-control" value="<?= $address->email ?>">
          </div>
          <div class="form-group mb-3">
            <label>No. Telepon</label>
            <input type="number" name="telephone" class="form-control" value="<?= $address->telephone ?>" required>
            <div class="invalid-feedback">
              No. telepon tidak boleh kosong
            </div>
          </div>
          <div class="form-group mb-3">
            <label>Kode Pos</label>
            <input type="text" name="postal_code" class="form-control" value="<?= $address->postal_code ?>" required>
            <div class="invalid-feedback">
              Kode pos tidak boleh kosong
            </div>
          </div>
          <div class="form-group mb-3">
            <label>Alamat</label>
            <textarea type="text" name="address" class="form-control"><?= $address->address ?></textarea>
            <div class="invalid-feedback">
              Alamat tidak boleh kosong
            </div>
          </div>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
        </div>
      </form>
    </div>
  </div>
</div>