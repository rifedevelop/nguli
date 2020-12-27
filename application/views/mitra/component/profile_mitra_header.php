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
                                echo '<img class="align-self-center mr-5 rounded-circle" style="width:200px;height:200px;object-fit:cover" src="'.base_url()."uploads/mitra/profile/".$data_session["photo_profile"].'">';
                            }
                        ?>
                        <!-- <img class="align-self-center mr-5 rounded-circle w-50" src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg" alt="Generic placeholder image"> -->
                        <div class="media-body">
                            <h5 class="mt-0 color-red"><?= $data_session['name']; ?> <?php if($data_session['status_verif'] == 1){ ?><i class="fa fa-check-circle" style="color:#009923;"></i><?php } ?></h5>
                            <p><i class="fa fa-map-marker"></i> Jakarta Timur</p>
                            <p class="color-yellow"><i class="fa fa-map-marker"></i> Grade A+ <i class="fa fa-star"></i> 5.0</p>
                            <p><button class="btn bg-green text-white" style="border-radius: 1.5rem;padding: 3px 25px"><i class="fa fa-eye pr-2"></i> <?=$this->lang->line('v-profile');?></button></p>
                        </div>
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-end py-4">
                <div class="d-flex align-items-center p-md-5">
                    <a href="<?=base_url('mitra/edit_profile');?>" class="px-sm-3 py-sm-1 px-md-5 py-md-2 color-red h3"><?=$this->lang->line('c-profile');?> <i class="fa fa-pencil-square-o pl-2"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Profile Header -->

<!-- Nav Button Profile -->

<!-- <div class="nav-button-profile mt-3 mb-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-tab-nguli nav-justified border-0">
                    <a href="<?=site_url('mitra/ongoing_project');?>" class="nav-item shadow d-flex justify-content-center align-items-center bg-white py-3 my-2 mx-3">
                        <?=$this->lang->line('o-project');?>
                    </a>
                    <a href="#" class="nav-item shadow d-flex justify-content-center align-items-center bg-white py-3 my-2 mx-3">
                        <?=$this->lang->line('l-project');?>
                    </a>
                    <a href="#" class="nav-item shadow d-flex justify-content-center align-items-center bg-white py-3 my-2 mx-3">
                        <?=$this->lang->line('o-bidding');?>
                    </a>
                    <a href="#" class="nav-item shadow d-flex justify-content-center align-items-center bg-white py-3 my-2 mx-3">
                        <?=$this->lang->line('l-bidding');?>
                    </a>
                    <a href="<?=base_url('mitra/certificate');?>" class="nav-item shadow d-flex justify-content-center align-items-center bg-white py-3 my-2 mx-3">
                        <?=$this->lang->line('c-team');?>
                    </a>
                    <a href="#" class="nav-item shadow d-flex justify-content-center align-items-center bg-white py-3 my-2 mx-3">
                        <?=$this->lang->line('p-team');?>
                    </a>
                </ul>
            </div>
        </div>
    </div>
</div> -->
<!-- End Nav Button Profile -->

