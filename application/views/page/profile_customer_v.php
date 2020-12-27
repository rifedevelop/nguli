
<!-- Nav Bar Login Session -->
<?php $this->load->view($navbar); ?>
<!-- End Nav Bar Login Session -->

<!-- Profile Header -->
<div class="customer-profile bg-white">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-md-6">
                <div class="media p-md-5">
                        <?php 
                            if($data_session['photo_profile'] == ''){
                                echo '<img class="align-self-center mr-5 rounded-circle" style="width:200px;height:200px;object-fit:cover" src="'.base_url("asset/img/profil-pic-dummy.png").'">';
                            } else {
                                echo '<img class="align-self-center mr-5 rounded-circle" style="width:200px;height:200px;object-fit:cover" src="'.base_url()."uploads/customer/profile/".$dataCustomer->customer_photo.'">';
                            }
                        ?>
                        <!-- <img class="align-self-center mr-5 rounded-circle w-50" src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg" alt="Generic placeholder image"> -->
                        <div class="media-body">
                            <h5 class="mt-0 color-red"><?= $dataCustomer->customer_name; ?> <?php if($data_session['status_verif'] == 1){ ?><i class="fa fa-check-circle" style="color:#009923;"></i><?php } ?></h5>
                            <p><i class="fa fa-map-marker"></i> Jakarta Timur</p>
                            <p class="color-yellow"><i class="fa fa-map-marker"></i> Grade A+ <i class="fa fa-star"></i> 5.0</p>
                            <!-- <p><button class="btn bg-green text-white" style="border-radius: 1.5rem;padding: 3px 25px"><i class="fa fa-eye pr-2"></i> <?=$this->lang->line('v-profile');?></button></p> -->
                        </div>
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-end py-4">
                <div class="d-flex align-items-center p-md-5">
                    <a href="<?=base_url('mitra/edit_profile');?>" class="px-sm-3 py-sm-1 px-md-5 py-md-2 color-red h3">Kirim pesan <i class="fa fa-pencil-square-o pl-2"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Profile Header -->


<div class="list-content-profile" style="min-height: 350px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php $this->load->view('component/footer'); ?>
<!-- End Footer -->