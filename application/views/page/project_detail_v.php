<!-- Navbar -->
<?php
if ($this->session->userdata('data_session') == null) {
    $this->load->view('component/navbar');
} else {
    $this->load->view('component/navbar_after_login');
}
?>
<!-- End Navbar -->

<!-- Main -->
<div class="pt-5 pb-5 bg-white">

    <div class="container-fluid w-100 px-3 px-md-5">
        <!-- Row -->
        <div class="row pb-5">
            <div class="col-md-3">
                <?php if ($dataImg == null) { ?>
                    <img src="<?= base_url('asset/img/bg-carousel-1.png'); ?>" alt="" class="img-fluid" style="object-fit: cover;min-height:300px">
                <?php } else { ?>
                    <img src="<?= base_url() . 'uploads/customer/post/' . $dataImg[0]->img; ?>" alt="" class="img-fluid" style="object-fit: cover;min-height:300px">
                <?php } ?>
            </div>

            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12 d-flex flex-column mb-3">
                        <div class="d-flex">
                            <h4 class="poppins-extra-bold mr-auto"><?= $dataProject->post_name; ?></h4>
                            <div class="btn bg-green text-white"><?= $dataProject->category_name; ?></div>
                        </div>
                        <div class="d-flex flex-row align-items-center">
                            <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg" width="40" height="40" class="rounded-circle">
                            <h5 class="pl-2"><?= $dataProject->name; ?></h5>
                            <div class="star-poin ml-1" style="color:#e3cb4b;">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <span>5.0</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 d-flex py-3 flex-column mb-3">
                        <h5 class="poppins-extra-bold">List Project yang Diterima Customer</h5>
                        <p><?= $dataProject->description; ?></p>
                    </div>

                    <div class="col-md-8 mb-3">
                        <h5 class="poppins-extra-bold">Photo Gallery</h5>
                        <div id="myCarousel" class="carousel slide w-100" data-ride="carousel">
                            <div class="carousel-inner row w-100" role="listbox">
                                <?php
                                foreach ($dataImg as $key => $val) :
                                    if ($key == 0) {
                                ?>
                                        <div class="carousel-item active">
                                            <div class="col-lg-4 col-md-6">
                                                <img class="img-fluid" src="<?= base_url() . 'uploads/customer/post/' . $val->img; ?>" style="width:330px;height:130px;object-fit:cover;">
                                            </div>
                                        </div>
                                    <?php } else { ?>
                                        <div class="carousel-item">
                                            <div class="col-lg-4 col-md-6">
                                                <img class="img-fluid" src="<?= base_url() . 'uploads/customer/post/' . $val->img; ?>" style="width:330px;height:130px;object-fit:cover;">
                                            </div>
                                        </div>
                                <?php }
                                endforeach; ?>
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

            </div>
        </div>
        <!-- End Row -->

        <!-- Row -->
        <div class="row mt-5">
            <div class="col-md-6">
                <!-- <h5 class="poppins-extra-bold mb-4">Attachment</h5>
                <ul class="list-unstyled w-75">
                    <li class="rounded py-3 pl-4" style="color:#52A3F3;border: 1px solid #990000;font-size:1rem"><img src="<?= base_url('asset/img/icon-attachment.png'); ?>" class="img-fluid mr-2" style="height:1.2rem"> Attachment-1.pdf</li>
                </ul> -->
            </div>
            <div class="col-md-6 border border-secondary">
                <div class="row border-secondary border-bottom py-4 px-1">
                    <div class="col-md-6">
                        <div class="d-flex flex-row">
                            <img src="<?= base_url('asset/img/project-list.png'); ?>" class="img-fluid mr-3" style="height:1.5rem">
                            <h5 class="poppins-bold mt-0">
                                <?=
                                    $dataProject->post_name;
                                // empty($val->category_id) ? $val->category_en : $val->category_id;
                                ?>
                            </h5>
                        </div>
                    </div>

                    <div class="col-md-6 pb-3">
                        <div class="d-flex flex-column text-right">
                            <h6 class="poppins-bold mt-0">IDR <?= number_format($dataProject->budget_min, 0, '', '.'); ?>-<?= number_format($dataProject->budget_max, 0, '', '.'); ?> </h6>
                            <h6>Jenis Proyek : <?= $dataProject->category_name; ?></h6>
                            <h6>Luas Tanah : <?= $dataProject->area; ?> m2</h6>
                            <h6><i class="fa fa-clock-o" style="font-size:1.3rem"></i> <span class="color-red mx-1">Tutup Tender</span> <?= $dataProject->selisih . ' hari lagi'; ?></h6>
                        </div>
                    </div>
                </div>

                <div class="row py-4 px-1">
                    <div class="col-md-12 mb-3">
                        <!-- <div class="d-flex flex-row">
                            <h5 class="poppins-bold mr-auto">Nilai Project</h5>
                            <h5 class="poppins-bold">IDR</h5>
                        </div> -->
                    </div>

                    <?php if ($_SESSION['data_session']['type_user'] === 'mitra') { ?>
                        <div class="col-md-12 text-center mt-5">
                            <a href="<?= base_url('bid_project/form_bid?id=' . md5((string)$dataProject->post_id)); ?>" class="d-block bg-red text-white px-5 py-2 rounded" style="font-size:1rem;">REQUEST BIDDING</a>
                        </div>
                    <?php } ?>
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