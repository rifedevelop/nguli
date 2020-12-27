
<!-- Nav Bar Login Session -->
<?php $this->load->view('mitra/component/navbar_after_login'); ?>
<!-- End Nav Bar Login Session -->

<div class="list-content-profile my-5 pb-md-5" style="min-height: 350px;">
    <div class="container">
        <div class="row text-center">

            <div class="col-lg-4 col-md-4 col-6">
                <a data-toggle="modal" href="#certificate" class="d-block mb-4 h-100">
                    <div class="img-container d-inline-block position-relative">
                        <img class="img-fluid d-block" src="<?=base_url('asset/img/certificat1.png');?>" alt="">
                        <div class="overlay text-white d-flex flex-column justify-content-center">
                            <h4 class="m-0">Sertifikat</h4>
                            <p>click to see detail</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <div class="img-container d-inline-block position-relative">
                        <img class="img-fluid d-block" src="<?=base_url('asset/img/certificat1.png');?>" alt="">
                        <div class="overlay text-white d-flex flex-column justify-content-center">
                            <h4 class="m-0">Sertifikat</h4>
                            <p>click to see detail</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <div class="img-container d-inline-block position-relative">
                        <img class="img-fluid d-block" src="<?=base_url('asset/img/certificat1.png');?>" alt="">
                        <div class="overlay text-white d-flex flex-column justify-content-center">
                            <h4 class="m-0">Sertifikat</h4>
                            <p>click to see detail</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <div class="img-container d-inline-block position-relative">
                        <img class="img-fluid d-block" src="<?=base_url('asset/img/certificat1.png');?>" alt="">
                        <div class="overlay text-white d-flex flex-column justify-content-center">
                            <h4 class="m-0">Sertifikat</h4>
                            <p>click to see detail</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <div class="img-container d-inline-block position-relative">
                        <img class="img-fluid d-block" src="<?=base_url('asset/img/certificat1.png');?>" alt="">
                        <div class="overlay text-white d-flex flex-column justify-content-center">
                            <h4 class="m-0">Sertifikat</h4>
                            <p>click to see detail</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <div class="img-container d-inline-block position-relative">
                        <img class="img-fluid d-block" src="<?=base_url('asset/img/certificat1.png');?>" alt="">
                        <div class="overlay text-white d-flex flex-column justify-content-center">
                            <h4 class="m-0">Sertifikat</h4>
                            <p>click to see detail</p>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
</div>

<!-- Modal Sertificate -->
<div class="modal fade" id="certificate" tabindex="-1" role="dialog" aria-labelledby="certificate" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-red text-white">

      <div class="modal-header border-0">
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="form-title text-center">
            <h5><strong>BUAT PROYEK BARU</strong></h5>
        </div>
        <img class="img-fluid w-100 mb-4" src="<?=base_url('asset/img/certificat1.png');?>" alt="">
        <h5>Sertifikat Pelatihan Arsitektur</h5>
        <h6><i class="fa fa-map-marker"></i> Jakarta, Indonesia</h6>
        <p class="bg-white text-dark mt-3 p-4">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sed congue purus. Nam rhoncus velit orci. Maecenas ut tristique justo. Pellentesque iaculis massa et nunc egestas pellentesque. Pellentesque gravida pharetra laoreet. Aliquam erat volutpat. In cursus, mi in posuere tincidunt, dui ex aliquet sapien, a condimentum libero odio quis purus.
        </p>
        <ul class="list-inline">
            <li class="list-inline-item"><i class="fa fa-heart"></i> 16</li>
            <li class="list-inline-item"><i class="fa fa-eye"></i> 20</li>
            <li class="list-inline-item"><i class="fa fa-comment"></i> 5 Comment</li>
        </ul>
      </div>

      <div class="modal-footer border-0">
      </div>
    </div>
  </div>
</div>
<!-- End Modal Sertificate -->

<!-- Footer -->
<?php $this->load->view('component/footer'); ?>
<!-- End Footer -->