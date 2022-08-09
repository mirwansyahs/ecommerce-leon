<?= $this->extend('layout/front-end/main') ?>

<?= $this->section('content') ?>
<section class="h-100 h-custom" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card">
          <div class="card-body p-4">

            <?php if (session()->getFlashdata('success')) : ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= session()->getFlashdata('success'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php endif; ?>

            <div class="row">

              <div class="col-lg-7">
                <?php if ($cart != null) { ?>
                  <?php foreach ($cart as $c) { ?>
                    <?php if ($c['user_id'] == session('id')) { ?>
                      <div class="card mb-3">
                        <div class="card-body">
                          <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                              <div>
                                <img src="<?= site_url('img/product/' . $c['image']) ?>" class="img-fluid rounded-3" alt="Shopping item" style="width: 65px; height: 68px">
                              </div>
                              <div class="ms-3">
                                <h5 style="font-size: 18px;"><?= $c['name'] ?></h5>
                                <p class="small mb-0"><?= $c['size'] ?>, <?= $c['color'] ?></p>
                              </div>
                            </div>
                            <div class="d-flex flex-row align-items-center">
                              <div style="width: 50px;">
                                <div class="d-flex flex-row">
                                  <h5 class="fw-normal mb-0"><?= $c['quantity'] ?></h5>
                                </div>
                              </div>
                              <div style="width: 100px;">
                                <h6 class="mb-0">Rp <?= number_format($c['total'], 0, ',', '.') ?></h6>
                              </div>
                              <form action="deleteItem/<?= $c['id'] ?>" method="post">
                                <?php csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="bg-white" style="border: none;"><i class="fas fa-trash-alt text-danger"></i></button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php } ?>
                  <?php } ?>
                <?php } else { ?>
                  <center>
                    <h5>Tidak ada data pesanan yang dikeranjang!</h5>
                  </center>
                <?php } ?>

                <hr>

                <div class="card mb-3 mb-lg-0">
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <div class="d-flex flex-row align-items-center">
                        <div class="ms-3">
                          <h5>Alamat</h5>
                          <p class="small mb-0"><?= $address->first_name ?> <?= $address->last_name ?></p>
                          <p class="small mb-0"><?= $address->email ?></p>
                          <p class="small mb-0"><?= $address->telephone ?></p>
                          <p class="small mb-0"><?= $address->address ?></p>
                          <p class="small mb-0">Kode Pos: <?= $address->postal_code ?></p>
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center">
                        <div style="width: 150px;">
                          <h6 class="text-dark" onclick="changeAddress('<?= $address->id ?>')">Ubah Alamat</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>

              <div class="col-lg-5">
                <div class="card text-dark rounded-3">
                  <div class="card-body">
                    <div class="form-group mb-3">
                      <label class="form-label">Jasa Pengiriman</label>
                      <select name="expedition" id="expedition" class="form-control select2" required>
                        <option value="">-- Pilih --</option>
                        <?php foreach ($delivery as $d) { ?>
                          <option value="<?= $d['id'] ?>" data-expedition="<?= $d['shiping'] ?>"><?= $d['expedition'] ?></option>
                        <?php } ?>
                      </select>
                      <div class="invalid-feedback">
                        Jasa pengiriman tidak boleh kosong
                      </div>
                    </div>

                    <hr class="my-4">

                    <?php
                    $subtotal = 0;
                    foreach ($cart as $c) {
                      $subtotal += $c['total'];
                    }
                    ?>
                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Subtotal</p>
                      <p class="mb-2" id="subtotal">Rp <?= number_format($subtotal, 0, ',', '.') ?></p>
                    </div>

                    <div class="d-flex justify-content-between">
                      <p class="mb-2">Ongkos Kirim</p>
                      <p class="mb-2" id="shiping">Rp 0</p>
                    </div>

                    <div class="d-flex justify-content-between mb-4">
                      <p class="mb-2">Total</p>
                      <p class="mb-2" id="total">Rp 0</p>
                    </div>

                    <center>
                      <button type="button" id="pay-button" class="btn btn-primary text-center btn-lg">
                        <div class="d-flex justify-content-between">
                          <span class="ms-2" id="total1">Rp 0</span>
                          <span class="ms-2">Checkout<i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                        </div>
                      </button>
                    </center>

                  </div>
                </div>

                <!-- </form> -->
              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="viewmodal" style="display: none;"></div>
<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-zTSmizcoVqlH4aZZ"></script>
<script type="text/javascript"></script>
<script>
  function changeAddress(id) {
    $.ajax({
      url: "<?= site_url('changeAddress') ?>",
      dataType: "json",
      data: {
        id: id
      },
      success: function(response) {
        if (response.data) {
          $('.viewmodal').html(response.data).show();
          $('#changeAddress').on('shown.bs.modal', function(event) {
            $('#address').focus();
          });
          $('#changeAddress').modal('show');
        }
      },
      error: function(xhr, thrownError) {
        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
      }
    });
  };

  $(document).ready(function() {
    $('#expedition').on('change', function() {
      // ambil data dari elemen option yang dipilih
      const expedition = $('#expedition option:selected').data('expedition');

      // tampilkan
      var number_string = expedition.toString(),
        sisa = number_string.length % 3,
        rupiah = number_string.substr(0, sisa),
        ribuan = number_string.substr(sisa).match(/\d{3}/g);

      if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }

      $('#shiping').text('Rp ' + rupiah);

      var subtotal = <?= $subtotal ?>;
      // console.log(subtotal);
      var shiping = expedition;

      var total = subtotal + shiping;

      var number_str = total.toString(),
        sisa = number_str.length % 3,
        rupiahtotal = number_str.substr(0, sisa),
        ribuan = number_str.substr(sisa).match(/\d{3}/g);

      if (ribuan) {
        separator = sisa ? '.' : '';
        rupiahtotal += separator + ribuan.join('.');
      }
      $('#total').text('Rp ' + rupiahtotal);
      $('#total1').text('Rp ' + rupiahtotal);
    });

    $('#pay-button').click(function(e) {
      e.preventDefault();
      var expedition = $('#expedition').val();
      var shiping = $('#expedition option:selected').data('expedition');
      var total = <?= $subtotal ?> + shiping;
      $.ajax({
        type: "post",
        url: "<?= site_url('checkout') ?>",
        data: {
          delivery_id: expedition,
          subtotal: <?= $subtotal ?>,
          shiping: shiping,
          total: total,
        },
        dataType: 'json',
        success: function(response) {
          snap.pay(response.snapToken, {
            onSuccess: function(result) {
              let dataResult = JSON.stringify(result, null, 2);
              let dataObject = JSON.parse(dataResult);

              $.ajax({
                type: "post",
                url: "<?= site_url('checkoutProsses') ?>",
                data: {
                  delivery_id: response.delivery_id,
                  subtotal: response.subtotal,
                  shiping: response.shiping,
                  total: response.total,
                  invoice: response.invoice,
                  order_id: dataObject.order_id,
                  payment_type: dataObject.payment_type,
                  transaction_time: dataObject.transaction_time,
                  transaction_status: dataObject.transaction_status,
                  va_number: dataObject.va_numbers[0].va_number,
                  bank: dataObject.va_numbers[0].bank,
                },
                dataType: "json",
                success: function(response) {
                  if (response.success) {
                    if (response.success) {
                      Swal.fire(
                        'Berhasil!',
                        response.success,
                        'success'
                      ).then((result) => {
                        if (result.isConfirmed) {
                          location.reload();
                        }
                      });
                    }
                  }
                },
                error: function(xhr, thrownError) {
                  alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
              });
            },
            onPending: function(result) {
              let dataResult = JSON.stringify(result, null, 2);
              let dataObject = JSON.parse(dataResult);

              $.ajax({
                type: "post",
                url: "<?= site_url('checkoutProsses') ?>",
                data: {
                  delivery_id: response.delivery_id,
                  subtotal: response.subtotal,
                  shiping: response.shiping,
                  total: response.total,
                  invoice: response.invoice,
                  order_id: dataObject.order_id,
                  payment_type: dataObject.payment_type,
                  transaction_time: dataObject.transaction_time,
                  transaction_status: dataObject.transaction_status,
                  va_number: dataObject.va_numbers[0].va_number,
                  bank: dataObject.va_numbers[0].bank,
                },
                dataType: "json",
                success: function(response) {
                  if (response.success) {
                    if (response.success) {
                      Swal.fire(
                        'Berhasil!',
                        response.success,
                        'success'
                      ).then((result) => {
                        if (result.isConfirmed) {
                          location.reload();
                        }
                      });
                    }
                  }
                },
                error: function(xhr, thrownError) {
                  alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
              });
            },
            onError: function(result) {
              let dataResult = JSON.stringify(result, null, 2);
              let dataObject = JSON.parse(dataResult);

              $.ajax({
                type: "post",
                url: "<?= site_url('checkoutProsses') ?>",
                data: {
                  delivery_id: response.delivery_id,
                  subtotal: response.subtotal,
                  shiping: response.shiping,
                  total: response.total,
                  invoice: response.invoice,
                  order_id: dataObject.order_id,
                  payment_type: dataObject.payment_type,
                  transaction_time: dataObject.transaction_time,
                  transaction_status: dataObject.transaction_status,
                  va_number: dataObject.va_numbers[0].va_number,
                  bank: dataObject.va_numbers[0].bank,
                },
                dataType: "json",
                success: function(response) {
                  if (response.success) {
                    if (response.success) {
                      Swal.fire(
                        'Berhasil!',
                        response.success,
                        'success'
                      ).then((result) => {
                        if (result.isConfirmed) {
                          location.reload();
                        }
                      });
                    }
                  }
                },
                error: function(xhr, thrownError) {
                  alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
              });
            }
          });
        },
        error: function(xhr, thrownError) {
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
      });
    });
  });
</script>
<?= $this->endSection() ?>