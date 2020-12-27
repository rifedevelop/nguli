
<!-- Navbar login -->
<?php $this->load->view('customer/component/navbar_after_login'); ?>
<!-- End Navbar login -->


<div class="active-project px-5 my-5">
    <div class="container-fluid">
        <div class="row my-3">
            <div class="col-12">
                <a href="<?=site_url('customer/profile');?>">
                    <h4 class="color-red poppins-bold"><i class="fa fa-arrow-left mr-3 text-body" aria-hidden="true"></i> Transaksi Proyek</h4>
                </a>
            </div>
        </div>

        <?php
            if(empty($data_transaction)){
                echo "<div class='col-12 col-md-12 py-5 my-3'><h6 class='d-flex justify-content-center color-gray'>Tidak ada transaksi proyek!</h6></div>";
            } else {
            
            foreach ($data_transaction as $key => $valTrans) { 
            // if($valTrans->category == 1) {
                if($key == '5') break;
        ?>
        <div class="row my-5 font-size-13">
            <div class="col-md-12">

                <div class="accordion shadow rounded" id="accordionExample">

                    <div class="card border-0">
                        <div class="card-header" id="heading<?=$key;?>">
                            
                                <div class="d-flex justify-content-between align-item-center p-3">
                                    <div>
                                        <img class="align-self-center mr-5 rounded-circle" style="width:50px;object-fit:cover" src="<?=base_url("asset/img/profil-pic-dummy.png");?>">
                                    </div>
                                    <div class="align-self-center pr-5" style="width: 30%">
                                        <span><?= word_limiter($valTrans->post_name,5);?></span>
                                    </div>
                                    <div class="align-self-center pr-5">
                                        <?php
                                            switch ($valTrans->payment_status) {
                                                case '0':
                                                    echo "<span class='badge badge-warning px-3 py-2'>Unpaid</span>";
                                                    break;
                                                case '1':
                                                    echo "<span class='badge badge-success px-3 py-2'>Paid</span>";
                                                    break;
                                                case '2':
                                                    echo "<span class='badge badge-danger px-3 py-2'>Paid</span>";
                                                    break;
                                                
                                                default:
                                                    echo "<span class='badge badge-warning px-3 py-2'>Unpaid</span>";
                                                break;
                                        }
                                    ?>
                                </div>
                                <div class="align-self-center pr-5" style="width: 13.5%">
                                    <span><?= $valTrans->category_name;?></span>
                                </div>
                                <div class="align-self-center pr-5">
                                    <span><?=date("M, d Y", strtotime($valTrans->est_date_to));?></span>
                                </div>
                                <div  class="align-self-center">
                                    <a href="#collapse<?=$key;?>" class="collapsed" data-toggle="collapse" data-target="#collapse<?=$key;?>" aria-expanded="false" aria-controls="collapse<?=$key;?>">
                                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                    </a>
                                </div>
                                <div  class="align-self-center">
                                    <a href="javascript:void(0)" class="dropdown-toggles dropdown-toggle-split" id="dropdownMenuReference" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                      <a class="dropdown-item " href="#confirm" data-id="<?=$valTrans->invoice_id;?>" data-code="<?=$valTrans->invoice_code;?>" data-toggle="modal" data-header="#<?=$valTrans->invoice_code;?>" data-targets="#confirm">Konfirmasi</a>
                                      <!-- <div class="dropdown-divider"></div>
                                      <a class="dropdown-item" href="#">Separated link</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="collapse<?=$key;?>" class="collapse" aria-labelledby="heading<?=$key;?>" data-parent="#accordionExample">
                          <div class="card-body">
                                <div class="row">
                                    <div class="col d-flex flex-column">
                                        <p>Ringkasan Pembayaran</p>
                                        <div class="d-flex flex-column bg-gray-old p-3 w-100 h-100">
                                            <span>Jenis Proyek: <?= $valTrans->category_name;?></span>
                                            <span>Luas Tanah: <?= $valTrans->area;?>m2</span>
                                            <span class="color-red"><i class="fa fa-clock"></i> <?=$valTrans->selisih;?> hari kalender</span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <div class="col-6 d-flex flex-column pt-1 pb-2">
                                                <span>Status</span>
                                                <span class="poppins-bold">
                                                    <?php
                                                    switch ($valTrans->payment_status) {
                                                        case '0':
                                                            echo "Unpaid";
                                                            break;
                                                        case '1':
                                                            echo "Paid";
                                                            break;
                                                        case '2':
                                                            echo "Paid";
                                                            break;
                                                        
                                                        default:
                                                            echo "Unpaid";
                                                            break;
                                                    }
                                                    ?>
                                                </span>
                                            </div>
                                            <div class="col-6 d-flex flex-column pt-1 pb-2">
                                                <span>Invoiced</span>
                                                <span class="poppins-bold"><?=$valTrans->created_on;?></span>
                                            </div>
                                            <div class="col-6 d-flex flex-column pt-1 pb-2">
                                                <span>ID Number</span>
                                                <span class="poppins-bold">
                                                    <?=$valTrans->invoice_code;?>
                                                </span>
                                            </div>
                                            <?php if($valTrans->paid_on > 0){ ?>
                                            <div class="col-6 d-flex flex-column pt-1 pb-2">
                                                <span>Date Paid</span>
                                                <span class="poppins-bold"><?=$valTrans->paid_on;?></span>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col d-flex flex-column border-left pt-1 pb-2 text-right">
                                        <span>Amount Due</span>
                                        <span class="poppins-bold">IDR <?=number_format($valTrans->total_price,0,"",".");?></span>
                                    </div>
                                </div>
                          </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <?php } } ?>

    </div>
</div>


<!-- Modal Confirm -->
<div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="newProjectForm" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-red text-white">

        <?= form_open_multipart('payment_post/confirm'); ?>
        <div class="modal-header border-0 text-white">
            <h4 id="titleHeader"></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="image-confirm">Upload bukti transfer</label>
                <div class="row upload-wraps">
                    <div class="col-md-12" id="upload-image" class="upload-field">
                        <!-- <div class="uploadpreview view-1"></div> -->
                        <input type="file" id="image-confirm" name="image" onchange="imgLoad(event)" accept="image/*" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer border-0">
            <input type="hidden" name="invoice_id" id="id-invoice">
            <input type="hidden" name="invoice_code" id="invoiceCode">
            <button class="btn btn-warning">Konfirmasi</button>
        </div>
        <?= form_close(); ?>
    </div>
  </div>
</div>
<!-- Modal Confirm -->

<?php $this->load->view('component/footer'); ?>

<script type="text/javascript">
    $(document).ready(function(){
        $("#confirm").on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget);
            var modal = $(this);
            modal.find('#titleHeader').text(div.data('header'));
            modal.find('#id-invoice').attr('value',div.data('id'));
            modal.find('#invoiceCode').attr('value',div.data('code'));
        });
    });
</script>