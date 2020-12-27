
<!-- Nav Bar Login Session -->
<?php $this->load->view('mitra/component/navbar_after_login'); ?>
<!-- End Nav Bar Login Session -->

<div class="py-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 mx-auto shadow bg-white py-5 px-4">
                <h4 class="text-center mb-5">Verifikasi data diri</h4>
                <?= form_open_multipart('mitra/save_profile','class="needs-validation" novalidate'); ?>
                    <div class="form-row px-4">
                        <div class="col-md-12 row mb-4">
                            <label for="ktp" class="col-md-12">Foto KTP</label>
                            <?php 
                                if($dataUser->verif_status == 1){ 
                            ?>
                            <input type="hidden" name="ktp_helper" value="<?= $dataUser->img_ktp;?>" >
                            <div class="col-md-4">
                                <img class="p-1" style="object-fit: cover;width: 100%;height: 99%" src="<?= base_url('uploads/mitra/nik/'.$dataUser->img_ktp);?>" alt="<?= $dataUser->img_ktp;?>">
                            </div>
                            <?php } else { ?>
                            <div class="col-md-8 d-flex align-items-end">
                                <input type="file" name="img_ktp" class="form-control-file" id="ktp" required>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="col-md-12 row mb-4">
                            <label for="npwp" class="col-md-12">Foto NPWP</label>
                            <?php if($dataUser->verif_status == 1){ ?>
                                <input type="hidden" name="npwp_helper" value="<?= $dataUser->img_npwp;?>">
                                <div class="col-md-4">
                                    <img class="p-1" style="object-fit: cover;width: 100%;height: 99%" src="<?= base_url('uploads/mitra/npwp/'.$dataUser->img_npwp);?>" alt="<?= $dataUser->img_npwp;?>" />
                                </div>
                            <?php } else { ?>
                            <div class="col-md-8 d-flex align-items-end">
                                <input type="file" name="img_npwp" class="form-control-file" id="npwp" required>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="col-md-12 row mb-4">
                            <label for="kk" class="col-md-12">Foto KK</label>
                            <?php if($dataUser->verif_status == 1){ ?>
                                <input type="hidden" name="kk_helper" value="<?= $dataUser->img_kk;?>" >
                                <div class="col-md-4">
                                    <img class="p-1" style="object-fit: cover;width: 100%;height: 99%" src="<?= base_url('uploads/mitra/kk/'.$dataUser->img_kk);?>" alt="<?= $dataUser->img_kk;?>" />
                                </div>
                            <?php } else { ?>
                            <div class="col-md-8 d-flex align-items-end">
                                <input type="file" name="img_kk" class="form-control-file" id="kk" required>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="nik">NIK</label>
                            <input type="text" name="nik" class="form-control" id="nik" placeholder="3990909xxxx" value="<?=$dataUser->nik;?>" required>
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="npwp">NPWP</label>
                            <input type="text" name="npwp" class="form-control" id="npwp" placeholder="3990909xxxx" value="<?=$dataUser->npwp;?>" required>
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

            <div class="col-md-6 mx-auto shadow bg-white py-5 px-4">
                <h4 class="text-center mb-5">Verifikasi data diri</h4>
                <?= form_open_multipart('mitra/save_profile','class="needs-validation" novalidate'); ?>
                    <div class="form-row px-4">
                        <div class="col-md-12 mb-5 d-flex justify-content-center">
                            <input id="js-file-uploader" style="display: none;" name="img_profile" type="file" accept="image/png, image/jpeg" />
                            <input type="hidden" name="photo_helper" value="<?= $dataUser->photo;?>" >
                            <div id="js-profile-pic" class="profile-pic__container">
                                <div id="js-profile-trigger" class="profile-pic__foreground">Upload Profile Pic</div>
                            </div>
                        </div>
                        <div class="col-md-12 row mb-4">
                            <label for="ktp" class="col-md-12">Foto KTP</label>
                            <?php 
                                if($dataUser->verif_status == 1){ 
                            ?>
                            <input type="hidden" name="ktp_helper" value="<?= $dataUser->img_ktp;?>" >
                            <div class="col-md-4">
                                <img class="p-1" style="object-fit: cover;width: 100%;height: 99%" src="<?= base_url('uploads/mitra/nik/'.$dataUser->img_ktp);?>" alt="<?= $dataUser->img_ktp;?>">
                            </div>
                            <?php } else { ?>
                            <div class="col-md-8 d-flex align-items-end">
                                <input type="file" name="img_ktp" class="form-control-file" id="ktp" required>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="col-md-12 row mb-4">
                            <label for="npwp" class="col-md-12">Foto NPWP</label>
                            <?php if($dataUser->verif_status == 1){ ?>
                                <input type="hidden" name="npwp_helper" value="<?= $dataUser->img_npwp;?>">
                                <div class="col-md-4">
                                    <img class="p-1" style="object-fit: cover;width: 100%;height: 99%" src="<?= base_url('uploads/mitra/npwp/'.$dataUser->img_npwp);?>" alt="<?= $dataUser->img_npwp;?>" />
                                </div>
                            <?php } else { ?>
                            <div class="col-md-8 d-flex align-items-end">
                                <input type="file" name="img_npwp" class="form-control-file" id="npwp" required>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="col-md-12 row mb-4">
                            <label for="kk" class="col-md-12">Foto KK</label>
                            <?php if($dataUser->verif_status == 1){ ?>
                                <input type="hidden" name="kk_helper" value="<?= $dataUser->img_kk;?>" >
                                <div class="col-md-4">
                                    <img class="p-1" style="object-fit: cover;width: 100%;height: 99%" src="<?= base_url('uploads/mitra/kk/'.$dataUser->img_kk);?>" alt="<?= $dataUser->img_kk;?>" />
                                </div>
                            <?php } else { ?>
                            <div class="col-md-8 d-flex align-items-end">
                                <input type="file" name="img_kk" class="form-control-file" id="kk" required>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="nik">NIK</label>
                            <input type="text" name="nik" class="form-control" id="nik" placeholder="3990909xxxx" value="<?=$dataUser->nik;?>" required>
                        </div>
                        <div class="col-md-12 mb-4">
                            <label for="npwp">NPWP</label>
                            <input type="text" name="npwp" class="form-control" id="npwp" placeholder="3990909xxxx" value="<?=$dataUser->npwp;?>" required>
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
                        <div class="col-md-12 row mb-4">
                            <label class="col-md-12" for="address">Status</label>
                            <div class="col-md-12">
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="lajang" name="status" value="1" class="custom-control-input" <?=$dataUser->status_nikah == 1 ? 'checked' : '';?> >
                                  <label class="custom-control-label" for="lajang">Lajang</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="menikah" name="status" value="2" class="custom-control-input" <?=$dataUser->status_nikah == 2 ? 'checked' : '';?> >
                                  <label class="custom-control-label" for="menikah">Menikah</label>
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

<script type="text/javascript">
// Image elements
const fileUpload        = document.querySelector('#js-file-uploader');
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
    profileBackground.style.backgroundImage = "url(<?=base_url('uploads/mitra/profile/'.$dataUser->photo);?>)";
}


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
</script>

<!-- Footer -->
<?php $this->load->view('component/footer'); ?>
<!-- End Footer -->