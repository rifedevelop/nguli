
<!-- Navbar -->
<?php $this->load->view('customer/component/navbar_after_login'); ?>
<!-- End Navbar -->

<!-- Main -->
<section id="detail-submis" class="p-4 bg-white" style="min-height: 800px">
    <div class="container">

            <?php
                
                foreach ($detail_project as $key => $valProj) {
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
                                    <span class="mt-auto"><?=$valProj->mitra_name;?></span>
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
                                <img class="avatar-submis" src="<?=base_url('uploads/mitra/profile/'.$valProj->photo_mitra);?>">
                                
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
                            <h6 class="mb-3">Mengerjakan Pondasi</h6>
                            <div class="d-flex flex-row">
                                <i class="fa fa-align-left mr-3"></i>
                                <i class="fa fa-comment mr-3"></i>
                                <i class="fa fa-paperclip mr-3"></i>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-center pr-5">
                            <!-- <i class="fa fa-check-circle" style="font-size: 1.8rem;color: #1DB431;"></i> -->
                            <i class="fa fa-eye" style="font-size: 1.8rem;color: #1DB431;"></i>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-12 mt-4 px-5">
                    <a href="#listJobsModal" data-toggle="modal" id="list-jobs" class=""><i class="fa fa-plus"></i> Tambah daftar pekerjaan</a>
                </div> -->
            </div>

            
            <?php } ?>

    </div>
</section>
<!-- End Main -->

<!-- Footer -->
<?php $this->load->view('component/footer'); ?>
<!-- End Footer -->


<!-- List Jobs Modal -->
<div class="modal fade" id="listJobsModal" tabindex="-1" role="dialog" aria-labelledby="listJobsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 800px">
      <div class="modal-content">

        <div class="modal-header border-bottom-0">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <?= form_open('forgot/insForgotMitra', 'class="needs-validation"'); ?>
        <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-12">
                        <label for="jobsTitle">Nama Pekerjaan</label>
                        <input type="text" name="jobs_name" class="form-control" id="jobsTitle" placeholder="name@example.com">
                    </div>
                    <div class="form-group col-12">
                        <label for="description">Deskripsi Pekerjaan</label>
                        <textarea class="form-control" id="description" rows="3" placeholder="Tuliskan deskripsi tentang pekerjaan..." required></textarea>
                    </div>
                    <div class="form-group col-12">
                        <label for="jobsTitle"><i class="fa fa-paperclip"></i> Lampiran</label>
                        <div id="document-field" class="col-md-12">
                            <div>
                                <div class="row mb-2">
                                    <div class="col-md-12 row">
                                        <input type="file" name="images[]" class="form-control-file col-4 pr-3" required="">
                                        <textarea name="document[]" class="form-control col-5" rows="2" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="document-field-other"></div>
                        <a href="javascript:void(0);" id="add-field" class="mt-2 mx-2"><i class="fa fa-plus"></i> Tambahkan lampiran</a>
                    </div>
                </div>
        </div>

        <div class="modal-footer d-flex justify-content-end border-0">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            <button type="button" class="btn btn-primary">Simpan & Ajukan</button>
            <!-- <button type="submit" class="btn btn-block btn-primary text-white">Simpan & Ajukan</button> -->
        </div>
        <?= form_close(); ?>

      </div>
    </div>
</div>
<!-- End List Jobs Modal -->

<script type="text/javascript">
// Goto Signin
$("#list-jobs").on( "click", function() {
    $('#listJobsModal').modal('show');   
});

$(document).ready(function(){
    var max_fields = 10;
    var wrapperForm = $("#document-field"); 
    var wrapper = $("#document-field-other"); 
    var add_button = $("#add-field");
      
    var i = 1;
    var x = 1;
    $(add_button).click(function(e){
        e.preventDefault();
        if(x < max_fields){
            x++;
            $(wrapperForm).append(`
                <div>
                    <div class="row mb-2">
                        <div class="col-md-12 row">
                            <input type="file" name="images[]" class="col-4 form-control-file pr-3" required="">
                            <textarea name="document[]" class="form-control col-5" rows="2" required></textarea>
                            <a href="javascript:void(0);" id="remove_field" class="col-3 align-self-center remove_field float-right"><i class="fa fa-trash"></i></a>
                        </div>
                    <div>
                </div>
            `);
        }
    });
    
    // $(wrapper).on("click",".remove_field", function(e){
    //     e.preventDefault(); $(this).parent('div').remove(); x--;
    // });
    $(wrapperForm).on("click",".remove_field", function(e){
        e.preventDefault(); $(this).parent('div').remove(); x--;
    });
});

</script>