
<!-- Navbar -->
<?php $this->load->view('customer/component/navbar_after_login'); ?>
<!-- End Navbar -->

<!-- Main -->
<div class="pt-5 pb-5 bg-white">
    <div class="container-fluid">
    
        <!-- Row -->
        <div class="row px-4 pb-5 mb-3 border-bottom">
                        
            <div class="col-md-6">
                <div class="d-flex flex-column">
                    <h4 class="poppins-bold mt-0">
                        <?= 
                            $dataProject->categoryid == 1 ? "Desain Interior" : "Bangun Rumah";
                        // empty($val->category_id) ? $val->category_en : $val->category_id;
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
                    <h6 class="poppins-bold mt-0">IDR <?=number_format($dataProject->budget, 0, '', '.');?></h6>
                    <h6>Jenis Proyek : <?= empty($dataProject->category_id) ? $dataProject->category_en : $dataProject->category_id;?></h6>
                    <h6>Luas Tanah : <?=$dataProject->area;?> m2</h6>
                    <h6><i class="fa fa-clock-o" style="font-size:1.3rem"></i> <span class="color-red mx-1">Tutup Tender</span> <?=$dataProject->selisih.' hari lagi';?></h6>
                </div>
            </div>
        </div>
        <!-- End Row -->

        <!-- Row -->
        <div class="row px-4 pb-5 mb-3">
            <div class="col-md-12 d-flex py-3 flex-column mb-3">
                <h5 class="poppins-extra-bold">Deskripsi Detail Bangunan</h5>
                <p><?=$dataProject->description;?></p>
            </div>
        </div>
        <!-- End Row -->

        <!-- Row -->
        <div class="row px-4 pb-5 mb-3">
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
        </div>
        <!-- End Row -->

        <!-- Row -->
        <div class="border border-secondary" style="background:#E6EEF7;">
            <div class="row px-4 py-4 pb-5 mb-3">
                <div class="col-md-12">
                    <h4 class="poppins-extra-bold pt-3 mb-5">Penawaran oleh Mitra Lain</h4>
                    <div class="table-responsive">
                        <table class="table text-center table-borderless">
                            <tbody>
                            <?php foreach ($dataBidMitra as $key => $valBidMitra) : ?>
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
        </div>
        <!-- End Row -->

    </div>
</div>
<!-- End Main -->

<!-- Footer -->
<?php $this->load->view('component/footer'); ?>
<!-- End Footer -->

<script>

</script>