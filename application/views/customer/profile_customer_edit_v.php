
<!-- Nav Bar Login Session -->
<?php $this->load->view('customer/component/navbar_after_login'); ?>
<!-- End Nav Bar Login Session -->

<div class="py-5">
    <div class="container">
        <div class="row">

            <div class="col-md-6 row mx-autos px-4">
                <div class="col-12 py-5 px-4 shadow bg-white">
                    <h4 class="text-center mb-5">Verifikasi data diri</h4>
                    <?= form_open_multipart('customer/save_verif','class="needs-validation" novalidate'); ?>
                        <div class="form-row px-4">
                            <div class="col-md-12 row mb-4">
                                <label for="ktp" class="col-md-12">KTP</label>
                                <?php 
                                    $disabled = $dataUser->verif_status == 1 ? 'disabled' : '';
                                    $required_ktp = $dataUser->img_ktp == null ? 'required' : '';
                                    $required_npwp = $dataUser->img_npwp == null ? 'required' : '';
                                    $required_kk = $dataUser->img_kk == null ? 'required' : '';
                                    // if($dataUser->verif_status == 1){ 
                                ?>
                                <input type="hidden" name="ktp_helper" value="<?= $dataUser->img_ktp;?>" >
                                <?php if($dataUser->img_ktp !== null) { ?>
                                    <div class="col-md-4" data-toggle="modal" data-target="#img-popup" data-img="<?= base_url('uploads/customer/nik/'.$dataUser->img_ktp);?>">
                                        <img class="p-1" style="object-fit: cover;width: 100%;height: 99%" src="<?= base_url('uploads/customer/nik/'.$dataUser->img_ktp);?>" alt="<?= $dataUser->img_ktp;?>">
                                    </div>
                                <?php } ?>
                                <div class="col-md-8 d-flex align-items-end">
                                    <input type="file" name="img_ktp" style="overflow: hidden!important;" class="form-control-file" id="ktp" <?=$required_ktp.' '.$disabled;?> >
                                </div>
                            </div>
                            <div class="col-md-12 row mb-4">
                                <label for="npwp" class="col-md-12">NPWP</label>
                                    <input type="hidden" name="npwp_helper" value="<?= $dataUser->img_npwp;?>">
                                    <?php if($dataUser->img_npwp !== null) { ?>
                                    <div class="col-md-4" data-toggle="modal" data-target="#img-popup" data-img="<?= base_url('uploads/customer/npwp/'.$dataUser->img_npwp);?>">
                                        <img class="p-1" style="object-fit: cover;width: 100%;height: 99%" src="<?= base_url('uploads/customer/npwp/'.$dataUser->img_npwp);?>" alt="<?= $dataUser->img_npwp;?>" />
                                    </div>
                                    <?php } ?>
                                <div class="col-md-8 d-flex align-items-end">
                                    <input type="file" name="img_npwp" style="overflow: hidden!important;" class="form-control-file" id="npwp" <?=$required_npwp.' '.$disabled;?> >
                                </div>
                            </div>
                            <div class="col-md-12 row mb-4">
                                <label for="kk" class="col-md-12">Foto KK</label>
                                    <input type="hidden" name="kk_helper" value="<?= $dataUser->img_kk;?>" >
                                    <?php if($dataUser->img_kk !== null) { ?>
                                    <div class="col-md-4" data-toggle="modal" data-target="#img-popup" data-img="<?= base_url('uploads/customer/kk/'.$dataUser->img_kk);?>">
                                        <img class="p-1" style="object-fit: cover;width: 100%;height: 99%" src="<?= base_url('uploads/customer/kk/'.$dataUser->img_kk);?>" alt="<?= $dataUser->img_kk;?>" />
                                    </div>
                                    <?php } ?>
                                <div class="col-md-8 d-flex align-items-end">
                                    <input type="file" name="img_kk" style="overflow: hidden!important;" class="form-control-file" id="kk" <?=$required_kk.' '.$disabled;?> >
                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <label for="nik">NIK</label>
                                <input type="text" name="nik" class="form-control" id="nik" placeholder="NIK" value="<?=$dataUser->nik;?>" required <?=$disabled;?> >
                            </div>
                            <div class="col-md-12 mb-4">
                                <label for="npwp">NPWP</label>
                                <input type="text" name="npwp" class="form-control" id="npwp" placeholder="NPWP" value="<?=$dataUser->npwp;?>" required <?=$disabled;?>>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="<?= md5((string)$dataUser->user_id);?>" >
                        <input type="hidden" name="name" value="<?= $dataUser->name;?>" >
                        <button class="btn bg-red text-white px-4 float-right mt-5" type="submit">Simpan</button>
                    <?= form_close(); ?>

                </div>
            </div>

            <div class="col-md-6 row mx-autos px-4">
                <div class="col-12 py-5 px-4 shadow bg-white">
                    <h4 class="text-center mb-5">Edit Profile</h4>
                    <?= form_open_multipart('customer/save_profile','class="needs-validation" novalidate'); ?>
                        <div class="form-row px-4">
                             <div class="col-md-12 mb-5 d-flex justify-content-center">
                                    <input id="js-file-uploader" style="display: none;" name="img_profile" type="file" accept="image/png, image/jpeg" />
                                    <input type="hidden" name="photo_helper" value="<?= $dataUser->photo;?>" >
                                <div id="js-profile-pic" class="profile-pic__container">
                                    <div id="js-profile-trigger" class="profile-pic__foreground">Upload Profile Pic</div>
                                </div>
                            </div>
                            <div class="col-md-12 row mb-4">
                                <label class="col-md-12" for="address">Jenis Kelamin</label>
                                <div class="col-md-12">
                                    <div class="custom-control custom-radio custom-control-inline">
                                      <input type="radio" id="pria" name="gender" value="1" class="custom-control-input" <?=$dataUser->gender == 1 ? 'checked' : '';?> >
                                      <label class="custom-control-label" for="pria">Pria</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                      <input type="radio" id="wanita" name="gender" value="2" class="custom-control-input" <?=$dataUser->gender == 2 ? 'checked' : '';?> >
                                      <label class="custom-control-label" for="wanita">Wanita</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mb-4">
                                <label for="address">Alamat</label>
                                <input type="text" name="address" class="form-control" id="address" placeholder="Alamat" value="<?=$dataUser->address;?>" required>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="<?= md5((string)$dataUser->user_id);?>" >
                        <input type="hidden" name="name" value="<?= $dataUser->name;?>" >
                        <button class="btn bg-red text-white px-4 float-right mt-5" type="submit">Simpan</button>
                    <?= form_close(); ?>

                    <script>
                    // Example starter JavaScript for disabling form submissions if there are invalid fields
                    (function() {
                        'use strict';
                        window.addEventListener('load', function() {
                            // Fetch all the forms we want to apply custom Bootstrap validation styles to
                            var forms = document.getElementsByClassName('needs-validation');
                            // Loop over them and prevent submission
                            var validation = Array.prototype.filter.call(forms, function(form) {
                            form.addEventListener('submit', function(event) {
                                if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                                }
                                form.classList.add('was-validated');
                            }, false);
                            });
                        }, false);
                    })();
                    </script>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Image Popup -->
<div id="img-popup" class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="detailLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="img-popup-item" src="" class="img-fluid">
            </div>
        </div>
    </div>
</div>
<!-- Image Popup -->

<script type="text/javascript">

$(document).ready(function() {

    // Image elements
    var fileUpload        = document.querySelector('#js-file-uploader');
    const profileTrigger    = document.querySelector('#js-profile-trigger');
    const profileBackground = document.querySelector('#js-profile-pic');
    // Trigger the file upload to set the profile picture
    profileTrigger.addEventListener('click', function(event) {
      event.preventDefault();
      fileUpload.click();
    });

    var foto = "<?php echo $dataUser->photo; ?>";
    console.log(foto);
    if(foto !== ""){
        profileBackground.style.backgroundImage = "url(<?=base_url('uploads/customer/profile/'.$dataUser->photo);?>)";
    } else {
        profileBackground.style.backgroundImage = "url(<?=base_url('asset/img/profil-pic-dummy.png');?>)";
    }

    // Image popup
    $("#img-popup").on('show.bs.modal', function (event) {
        var div = $(event.relatedTarget);
        var modal = $(this);

        modal.find('#img-popup-item').attr("src",div.data('img'));
    });

    // new profile pic added, display it
    fileUpload.addEventListener("change", function(event) {
      if (fileUpload.files && fileUpload.files[0]) {
        let reader = new FileReader();
        reader.onload = function(event) {
          // Remove the initial 'set picture image' text
          profileBackground.childNodes[0].nodeValue = "";
          // Set the new image src as the background
          profileBackground.style.backgroundImage = "url('" + event.target.result + "')";
        }
        reader.readAsDataURL(fileUpload.files[0]);
      }
    });

});
</script>

<!-- Footer -->
<?php $this->load->view('component/footer'); ?>
<!-- End Footer -->