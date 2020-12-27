
<!-- Navbar -->
<?php $this->load->view('mitra/component/navbar_after_login'); ?>
<!-- End Navbar -->

<!-- Main -->
<section id="detail-submis" class="p-4 bg-white" style="min-height: 800px">
    <div class="container">

            <?php
                
                foreach ($detail_project as $key => $valProj) { 
                if($valProj->category == 1) {
            ?>

            <div class="row my-5 py-4">
                <div class="col-md-12">
                    <div class="detail-submis">
                        <div class="detail-submis-head text-white">
                            <div class="detail-head-cover cover-design d-flex justify-content-between p-4" style="height: 230px;">
                                <div class="d-flex align-items-start flex-column poppins-medium" style="width: 65%">
                                    <h3 class="poppins-black"><?= word_limiter($valProj->post_name,4);?></h3>
                                    <span>Luas Tanah: <?=$valProj->area;?> m2 </span>
                                    <span>IDR: <?=number_format($valProj->budget,2,",",".");?></span>
                                    <span class="mt-auto"><?=$valProj->customer_name;?></span>
                                </div>
                                <div class="d-flex align-items-start flex-column">
                                    <h6 class="poppins-black"><i class="fa fa-tag"></i> <?= $valProj->category_name;?></h6>
                                </div>
                            </div>
                        </div>
                        <div class="detail-submis-body pt-5 pb-0 px-3 d-flex justify-content-between position-relative">
                            <div class="d-flex align-items-start flex-column">
                                <h6 class="poppins-bold">Progress - <?=$valProj->duration;?> Hari Kalender</h6>
                                <h6 class="mt-auto" style="font-size:12px"><i class="fa fa-calendar"></i> <?=date("d/m/Y", strtotime($valProj->est_date_to));?> - <?=date("d/m/Y", strtotime($valProj->est_date_fr));?></h6>
                            </div>
                            <div class="d-flex align-items-end flex-column">
                                <img class="avatar-submis" src="<?=base_url('uploads/customer/profile/'.$valProj->photo);?>">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row my-5 py-4">
                <div class="col-md-12 text-center">
                    <span class="progress-item h3 active">25 %</span>
                    <span class="progress-item h3">50 %</span>
                    <span class="progress-item h3">75 %</span>
                    <span class="progress-item h3">100 %</span>
                </div>
            </div>

            <div class="row my-5 py-4" style="background-color: #F2F2F2;">
                <div class="col-md-12 px-5 py-3">
                    <h6>Apa yang saya kerjakan?</h6>
                </div>
                <div class="col-md-12">
                    <div class="d-flex justify-content-between bg-white p-3">
                        <div class="d-flex flex-column">
                            <h6>Mengerjakan Pondasi</h6>
                            <div class="d-flex flex-row">
                                <i class="fa fa-align-left mr-3"></i>
                                <i class="fa fa-comment mr-3"></i>
                                <i class="fa fa-paperclip mr-3"></i>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-center pr-5">
                            <i class="fa fa-check-circle" style="font-size: 1.8rem;color: #1DB431;"></i>
                        </div>
                    </div>
                </div>
            </div>

            <?php } else { ?>

            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="detail-submis">
                        <div class="detail-submis-head text-white">
                            <div class="detail-head-cover cover-construct d-flex justify-content-between p-4" style="height: 230px;">
                                <div class="d-flex align-items-start flex-column poppins-medium" style="width: 65%">
                                    <h3 class="poppins-black"><?= word_limiter($valProj->post_name,4);?></h3>
                                    <span>Luas Tanah: <?=$valProj->area;?> m2 </span>
                                    <span>IDR: <?=number_format($valProj->budget,2,",",".");?></span>
                                    <span class="mt-auto"><?=$valProj->mitra_name;?></span>
                                </div>
                                <div class="d-flex align-items-start flex-column">
                                    <h6 class="poppins-black"><i class="fa fa-tag"></i> <?= $valProj->category_name;?></h6>

                                    <span class="mt-auto"><?=$valProj->customer_name;?></span>
                                </div>
                            </div>
                        </div>
                        <div class="detail-submis-body pt-3 pb-0 px-3 d-flex justify-content-between position-relative">
                            <div class="d-flex align-items-start flex-column">
                                <h6 class="poppins-bold">Progress - <?=$valProj->duration;?> Hari Kalender</h6>
                                <h6 class="mt-auto" style="font-size:12px">Durasi: <?=date("d/m/Y", strtotime($valProj->est_date_fr));?> - <?=date("d/m/Y", strtotime($valProj->est_date_to));?></h6>
                                <!-- <h6 class="" style="font-size:12px">Serah terima: <?=date("d/m/Y", strtotime($valProj->handover_date));?></h6> -->
                            </div>
                            <div class="d-flex align-items-end flex-column">
                                <img class="avatar-submis" src="<?=base_url('uploads/customer/profile/'.$valProj->photo);?>">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } } ?>

        <!-- Row -->
        <!-- <div class="row px-4 pb-5 mb-3 border-bottom">         
            <div class="col-md-6">
                <div class="d-flex flex-column">
                    <h4 class="poppins-bold mt-0">
                        <?= 
                            $dataProject->post_name;
                        ?>
                    </h4>
                    <div class="d-flex flex-row align-items-center">
                        <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg" width="40" height="40" class="rounded-circle align-self-center mr-3">
                        <p class="align-self-center"><?=$dataProject->name;?></p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 pb-3">
                <div class="d-flex flex-column text-right">
                    <h6 class="poppins-bold mt-0">IDR <?=number_format($dataProject->budget_min, 0, '', '.');?>-<?=number_format($dataProject->budget_max, 0, '', '.');?> </h6>
                    <h6>Jenis Proyek : <?=$dataProject->category_name;?></h6>
                    <h6>Luas Tanah : <?=$dataProject->area;?> m2</h6>
                    <h6><i class="fa fa-clock-o" style="font-size:1.3rem"></i> <span class="color-red mx-1">Tutup Tender</span> <?=$dataProject->selisih.' hari lagi';?></h6>
                </div>
            </div>
        </div> -->
        <!-- End Row -->

        <!-- Row -->
        <!-- <div class="row px-4 pb-5 mb-3">
            <div class="col-md-12 d-flex py-3 flex-column mb-3">
                <h5 class="poppins-extra-bold">Deskripsi Detail Bangunan</h5>
                <p><?=$dataProject->description;?></p>
            </div>
        </div> -->
        <!-- End Row -->

        <!-- Row -->
        <!-- < div class="row px-4 pb-5 mb-3">
            <div class="col-md-12 mb-3">
                <h5 class="poppins-extra-bold">Photo Gallery</h5>
                <div id="myCarousel" class="carousel slide w-50" data-ride="carousel">
                    <div class="carousel-inner row w-100" role="listbox">
                        <?php 
                            foreach ($dataImg as $key => $val) : 
                            if($key == 0) {
                        ?>
                        <div class="carousel-item active">
                            <div class="col-lg-4 col-md-6">
                                <img class="img-fluid" src="<?=base_url().'uploads/customer/post/'.$val->img;?>" style="width:330px;height:130px;object-fit:cover;">
                            </div>
                        </div>
                        <?php } else { ?>
                        <div class="carousel-item">
                            <div class="col-lg-4 col-md-6">
                                <img class="img-fluid" src="<?=base_url().'uploads/customer/post/'.$val->img;?>" style="width:330px;height:130px;object-fit:cover;">
                            </div>
                        </div>
                        <?php } endforeach; ?>
                    </div>
                        
                    <a class="carousel-control-prev w-auto" href="#myCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next w-auto" href="#myCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div> -->
        <!-- End Row -->

        <!-- Row -->
       <!--  <div class="border border-secondary" style="background:#E6EEF7;">
            <div class="row px-4 py-4 pb-5 mb-3">
                <div class="col-md-12">
                    <h4 class="poppins-extra-bold pt-3 mb-5">Penawaran oleh Mitra Lain</h4>
                    <div class="table-responsive">
                        <table class="table text-center table-borderless">
                            <tbody>
                            <?php foreach ($detail_project as $key => $valBidMitra) : ?>
                                <tr class="mb-3">
                                    <td class="align-middle w-25">
                                        <div class="d-flex flex-row">
                                            <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg" width="40" height="40" class="rounded-circle align-self-center mr-3"><p class="h6 align-self-center" style="color:#549EFF"><?=$valBidMitra->name;?></p>
                                        </div>
                                    </td>
                                    <td class="align-middle poppins-medium font-weight-bold">IDR <?=number_format($valBidMitra->proposed_price, 0, '', '.');?></td>
                                    <td class="align-middle">
                                        <a href="<?=site_url('customer/ongoing_bidding_mitra?id='.md5((string)$valBidMitra->id));?>" class="color-red mr-3">Lihat Detail</a>
                                        <a href="<?=site_url('customer/form_pemilihan?id='.md5((string)$valBidMitra->id));?>" class="btn bg-red text-white px-4 py-1" style="border-radius: 1.5rem;">Pilih</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- End Row -->

    </div>
</section>
<!-- End Main -->

<!-- Footer -->
<?php $this->load->view('component/footer'); ?>
<!-- End Footer -->
