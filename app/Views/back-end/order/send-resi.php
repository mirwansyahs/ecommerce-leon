<!-- Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalresi">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?= site_url('sendResi/' . $order['order_id']) ?>" method="post">
        <?php csrf_field(); ?>
        <input type="hidden" name="_method" value="PUT">
        <div class="modal-header">
          <h5 class="modal-title">Konfirmasi Pengiriman</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="order_id" class="form-control" value="<?= $order['order_id'] ?>">
          <input type="text" name="resi" id="resi" class="form-control" placeholder="Masukkan no resi">
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
        </div>
      </form>
    </div>
  </div>
</div>