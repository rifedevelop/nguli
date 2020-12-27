
<!-- Navbar -->
<?php $this->load->view('customer/component/navbar_after_login'); ?>
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

    </div>
</section>
<!-- End Main -->

<!-- Footer -->
<?php $this->load->view('component/footer'); ?>
<!-- End Footer -->