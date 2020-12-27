
<?php $this->load->view('customer/component/navbar_after_login'); ?>

<!-- Profile Header -->
<?php $this->load->view('customer/component/profile_customer_header'); ?>
<!-- End Profile Header -->


<!-- Nav Button Profile -->
<?php $this->load->view('customer/component/navbar_button_header_v2'); ?>
<!-- End Nav Button Profile -->

<div class="list-content-profile px-3" style="min-height: 350px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-12">         
                 
                <div class="table-responsive">
                    <table class="table text-center table-borderless">
                        <tbody>
                        <?php foreach ($dataPost as $key => $val) : ?>
                            <tr class="mb-3 shadow-sm bg-white">
                                <td class="align-middle"><i class="fa fa-bars align-items-center" style="font-size:2rem;"></i></td>
                                <td class="">
                                    <div class="d-flex align-items-center justify-content-start">
                                        <i class="fa fa-briefcase color-red align-middle ml-3 mr-3" style="font-size:2rem;"></i> 
                                        <div class="d-flex flex-column align-self-center justify-content-start text-left">
                                            <p class="h6 font-weight-bold m-0"><?=$val->post_name;?></p>
                                            <p class="h6 font-weight-bold m-0"><?=$val->invoice_code;?></p>
                                            <p class="m-0">Status
                                                <?php
                                                    switch ($val->payment_status) {
                                                        case '0':
                                                            echo "<span class='badge badge-warning'>Unpaid</span>";
                                                            break;
                                                        case '1':
                                                            echo "<span class='badge badge-success'>Paid</span>";
                                                            break;
                                                        case '2':
                                                            echo "<span class='badge badge-danger'>Paid</span>";
                                                            break;
                                                        
                                                        default:
                                                            echo "<span class='badge badge-warning'>Unpaid</span>";
                                                            break;
                                                    }
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <a href="<?=site_url('customer/detail_transaction_project/'.md5((string)$val->id));?>" class="btn bg-red text-white" style="border-radius: 1.5rem;padding: 3px 25px">Lihat Detail</a>
                                    <?php if($val->payment_status < 1){ ?>
                                    <button class="btn bg-red text-white" data-id="<?=$val->invoice_id;?>" data-code="<?=$val->invoice_code;?>" data-toggle="modal" data-header="#<?=$val->invoice_code;?>" data-target="#confirm" style="border-radius: 1.5rem;padding: 3px 25px">Konfirmasi</button>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
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