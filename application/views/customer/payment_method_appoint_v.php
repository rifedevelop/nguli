<!-- Nav Bar Login Session -->
<?php $this->load->view('customer/component/navbar_payment'); ?>
<!-- End Nav Bar Login Session -->

<div id="payment" class="py-5">
  <div class="container-fluid">
    <?= form_open('payment_appoint/save'); ?>
    <div class="row px-5">
      <div class="col-md-8">
        <h5 class="poppins-extra-bold pt-3 mb-5">Pilih Pembayaran</h5>
        <fieldset class="form-group">
          <div class="row">
            <div class="col-sm-10">
              <div class="form-check d-flex align-items-center flex-row mb-2">
                <input class="form-check-input" type="radio" name="method_pay" id="bca" value="1" checked>
                <label class="form-check-label" for="bca">
                  <img src="<?= base_url('asset/img/payment-bca.png'); ?>" class="" style="object-fit: cover;width:80px;height: 50px"> Transfer Bank BCA
                </label>
              </div>
              <div class="form-check d-flex align-items-center flex-row mb-2">
                <input class="form-check-input" type="radio" name="method_pay" id="mandiri" value="2">
                <label class="form-check-label" for="mandiri">
                  <img src="<?= base_url('asset/img/payment-mandiri.png'); ?>" class="" style="object-fit: cover;width:80px;height: 50px">
                  Transfer Bank Mandiri
                </label>
              </div>
              <div class="form-check d-flex align-items-center flex-row mb-2">
                <input class="form-check-input" type="radio" name="method_pay" id="gopay" value="3">
                <label class="form-check-label" for="gopay">
                  <img src="<?= base_url('asset/img/payment-gopay.png'); ?>" class="" style="object-fit: cover;width:80px;height: 50px">
                  Transfer via Gopay
                </label>
              </div>
              <div class="form-check d-flex align-items-center flex-row mb-2">
                <input class="form-check-input" type="radio" name="method_pay" id="ovo" value="4">
                <label class="form-check-label" for="ovo">
                  <img src="<?= base_url('asset/img/payment-ovo.png'); ?>" class="" style="object-fit: cover;width:80px;height:50px">
                  Transfer via OVO
                </label>
              </div>
            </div>
          </div>
        </fieldset>
      </div>

      <div class="col-md-4">
        <div class="border border-secondary rounded" style="background:#E6EEF7;">
          <div class="row px-4 py-4 pb-5 mb-3">
            <div class="col-md-12">
              <h5 class="poppins-extra-bold pt-3 mb-5">Ringkasan Pembelian</h5>
              <div class="d-flex justify-content-between">
                <p>Subtotal</p>
                <p>IDR <?= number_format($_SESSION['payment_appoint']['budget'], 0, ",", "."); ?></p>
              </div>
              <!-- <div class="d-flex justify-content-between">
                                <p>PPN</p>
                                <p>IDR </p>
                            </div> -->
              <hr>
              <div class="d-flex justify-content-between">
                <p>Total</p>
                <p>IDR <?= number_format($_SESSION['payment_appoint']['total'], 0, ",", "."); ?></p>
              </div>
              <div class="d-flex justify-content-between">
                <p>Penyelesaian</p>
                <p><?= $_SESSION['payment_appoint']['duration']; ?> Hari</p>
              </div>
            </div>
            <div class="col-md-12 text-center mt-3">

              <input type="hidden" name="project_id" value="<?= $_SESSION['payment_appoint']['project_id']; ?>">
              <input type="hidden" name="total" value="<?= $_SESSION['payment_appoint']['budget']; ?>">
              <button type="submit" id="btn-submit" class="btn bg-red text-white px-4 py-2" style="font-size:.9rem">BAYAR SEKARANG</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?= form_close(); ?>
  </div>
</div>

<!-- Footer -->
<?php $this->load->view('component/footer'); ?>
<!-- End Footer -->

<script type="text/javascript">
  $(".nav-payment a").last().addClass(" active");
</script>