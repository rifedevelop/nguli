
<!-- Navbar -->
<?php $this->load->view('mitra/component/navbar_after_login'); ?>
<!-- End Navbar -->

<!-- Main -->
<div class="pt-5 pb-5 bg-white">
    <div class="container-fluid">

        <!-- Row -->
        <div class="row px-4 pb-5 mb-3">
            <div class="col-md-8 p-5" style="background-color: rgba(204,227,250,0.50)">
                <?= form_open('Appoint_project/save','id="submit-post"'); ?>

                    <!-- <input type="hidden" name="customer_id" value="<?=$dataBidMitra->customer_id;?>">
                    <input type="hidden" name="customer_name" value="<?=$dataBidMitra->customer_name;?>">
                    <input type="hidden" name="mitra_id" value="<?=$dataBidMitra->mitra_id;?>"> -->
                    <input type="hidden" name="category" value="<?=$data_project->category;?>">
                    <input type="hidden" name="project_id" value="<?=$data_project->id;?>">

                    <div class="form-group row field-luas pb-3">
                        <label for="area" class="poppins-extra-bold col-md-12 align-self-center h5">Luas Bangunan</label>
                        <div class="col-md-4">
                            <input type="text" name="area" class="form-control" id="area" placeholder="2" required>
                        </div>
                        <span class="col-md-4 align-self-center">m2</span>
                    </div>

                    <div class="form-group row field-luas pb-3">
                        <label for="budget" class="poppins-extra-bold col-md-12 align-self-center h5">Nilai Proyek</label>
                        <div class="col-md-4">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text">IDR</span>
                              </div>
                              <input type="text" name="budget" class="form-control" id="budget" placeholder="11.250.000" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row field-duration pb-3">
                        <label for="duration" class="poppins-extra-bold col-md-12 align-self-center h5">Durasi Proyek</label>
                        <div class="col-md-3">
                            <input type="text" name="duration" class="form-control" id="duration" placeholder="30" required>
                        </div>
                        <span class="col-md-4 align-self-center">Hari Kalender</span>
                    </div>

                    <div class="form-group row field-daily-worker pb-3">
                        <div class="col-md-4 pb-2">
                            <label for="start" class="poppins-extra-bold h5 pb-2">Mulai Pengerjaan</label>
                            <input type="text" name="start_project" class="form-control datepicker" id="start" placeholder="2020-06-30" autocomplete="off" required>
                        </div>
                        <div class="col-md-4 pb-2">
                            <label for="finish" class="poppins-extra-bold h5 pb-2">Selesai Pengerjaan</label>
                            <input type="text" name="finish_project" class="form-control" id="finish" placeholder="2020-06-30" autocomplete="off" required readonly="readonly">
                        </div>
                    </div>

                    <?php if($data_project->category == $this->config->item('design')){ ?>
                        <div class="form-group row pb-3">
                            <label for="document" class="poppins-extra-bold col-md-12 h5 mb-3">Dokumen yang akan diperoleh</label>

                            <div id="document-field" class="col-md-12">
                                <div>
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <input type="text" name="document[]" class="form-control" placeholder="Tampak Depan, Samping, Atas" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="document-field-other"></div>
                            <div class="col-md-12 form text-center">
                                <a href="javascript:void(0);" id="add-field" class="btn btn-danger">Add Other</a>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="form-group row field-daily-worker pb-3">
                            <div class="col-md-4 pb-2">
                                <label for="handover" class="poppins-extra-bold h5 pb-2">Serah Terima Proyek</label>
                                <input type="text" name="handover_project" class="form-control" id="handover" placeholder="2020-06-30" autocomplete="off" required>
                            </div>
                        </div>
                    <?php } ?>

                <div class="form-group py-3">
                    <button type="submit" id="btn-submit" class="btn bg-red text-white float-right px-4 py-2" style="font-size:1.1rem">POSTING</button>
                </div>

                <?= form_close(); ?>
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
$("#start").on("change", function(){
    var start = new Date( $("#start").val());
    var duration = $('#duration').val();
    var nextDay = new Date(start);
    nextDay.setDate(start.getDate() + parseInt(duration));
    var dateString = new Date(nextDay.getTime() - (nextDay.getTimezoneOffset() * 60000 ))
                    .toISOString().split("T")[0];
    $('#finish').attr("value", dateString);

    // Handover
    var handover = 7;
    nextDay.setDate(start.getDate() + parseInt(handover));
    var dateString = new Date(nextDay.getTime() - (nextDay.getTimezoneOffset() * 60000 ))
                    .toISOString().split("T")[0];
    $('#handover').attr("value", dateString);
});

$("#duration").on("change", function(){
    var start = new Date( $("#start").val());
    var duration = $('#duration').val();
    var nextDay = new Date(start);
    nextDay.setDate(start.getDate() + parseInt(duration));
    var dateString = new Date(nextDay.getTime() - (nextDay.getTimezoneOffset() * 60000 ))
                    .toISOString().split("T")[0];
    $('#finish').attr("value", dateString);

    // Handover
    var handover = 7;
    nextDay.setDate(start.getDate() + parseInt(handover));
    var dateString = new Date(nextDay.getTime() - (nextDay.getTimezoneOffset() * 60000 ))
                    .toISOString().split("T")[0];
    $('#handover').attr("value", dateString);
});
    
$(document).ready(function(){
    // Date Picker
    $( ".datepicker" ).datepicker({
        dateFormat: 'yy-mm-dd',
        minDate: new Date(),
    });

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
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <input type="text" name="document[]" class="form-control" placeholder="Tampak Depan, Samping, Atas" required>
                            <a href="javascript:void(0);" id="remove_field" class="remove_field float-right">Remove</a>
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