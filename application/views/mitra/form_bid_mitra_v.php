
<!-- Nav Bar Login Session -->
<?php $this->load->view('mitra/component/navbar_after_login'); ?>
<!-- End Nav Bar Login Session -->

<div class="form-project my-4 py-3">
    <div class="container">
        <div class="row">

            <div class="col-md-8 border p-5" style="background-color: rgba(204,227,250,0.50)">
                <div class="row border-bottom mb-5">
                    <div class="col-md-6">
                        <div class="d-flex flex-row">
                            <img src="<?=base_url('asset/img/project-list.png');?>" class="img-fluid mr-3" style="height:1.5rem">
                            <div class="d-flex flex-column">
                                <h6 class="poppins-bold mt-0">
                                    <?= 
                                        $dataBid->post_name;
                                    // empty($val->category_id) ? $val->category_en : $val->category_id;
                                    ?>
                                </h6>
                                <p class=""><?=$dataBid->name;?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 pb-3">
                        <div class="d-flex flex-column text-right">
                            <h6 class="poppins-bold mt-0">IDR <?=number_format($dataBid->budget_min, 0, '', '.');?>-<?=number_format($dataBid->budget_max, 0, '', '.');?> </h6>
                            <h6>Jenis Proyek : <?= empty($dataBid->category_id) ? $dataBid->category_en : $dataBid->category_id;?></h6>
                            <h6>Luas Tanah : <?=$dataBid->area;?> m2</h6>
                            <h6><i class="fa fa-clock-o" style="font-size:1.3rem"></i> <span class="color-red mx-1">Tutup Tender</span> <?=$dataBid->selisih.' hari lagi';?></h6>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <?= form_open_multipart('bid_project/savebid','class="needs-validation" novalidate'); ?>

                            <div class="form-group row pb-4">
                                <label for="valueProject" class="col-md-12 poppins-extra-bold h6 pb-2">Nilai Proyek</label>
                                <div class="input-group col-md-6">
                                    <div class="input-group-prepend">
                                        <button class="btn border border-danger bg-white color-gray" type="button" id="button-addon1">IDR</button>
                                    </div>
                                    <input type="text" name="project_value" class="input-mask form-control border border-danger text-center" id="valueProject" placeholder="10.000.000" required>
                                </div>
                            </div>
                            <div class="form-group row pb-4">
                                <label for="description" class="col-md-12 poppins-extra-bold h6 pb-2">List Proyek yang Diterima Customer</label>
                                <div class="col-md-12">
                                    <textarea name="description" id="description" class="form-control border border-danger p-3" rows="5" placeholder="Deskripsikan list project yang dapat diterima oleh customer dari hasil pekerjaan Anda." reqiured></textarea>
                                </div>
                            </div>
                            <div class="form-group row pb-4">
                                <div class="col-md-12">
                                    <div class="input_fields_wrap">
                                        <div>
                                            <input class="my-2" type="file" name="images[]" accept="image/*" required="required">
                                        </div>
                                    </div>
                                    <button class="add_field_button btn bg-red text-white px-3 mt-3"><i class="fa fa-plus"></i> Tambah File</button>
                                </div>
                            </div>
                            <div class="form-group row pb-4">
                                <label for="duration" class="col-md-12 poppins-extra-bold h6 pb-2">Durasi Proyek</label>
                                <div class="col-md-3">
                                    <input type="text" name="duration" class="form-control border border-danger" id="duration" placeholder="5" autocomplete="off" required>
                                </div>
                                <span class="col-md-4 align-self-center">Hari Kalender</span>
                            </div>

                            <input type="hidden" name="id_post" value="<?=$dataBid->id_post;?>">
                            <input type="hidden" name="customer_id" value="<?=$dataBid->customer_id;?>">
                            <button class="btn btn-md bg-red text-white float-right" type="submit">POSTING</button>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="row px-3 d-flex align-items-stretch h-100">
                    <div class="col-md-12">
                        <div class="px-3 py-2" style="background:#F9F9F9;">
                            <h5 class="h4 poppins-medium border-bottom py-2 color-red" style="border-color:#990000!important"><i class="fa fa-info-circle mr-3" style="font-size:2.5rem"></i> <span class="align-self-center">PRO TIPS</span> </h5>
                            <p>Upload gambar berupa 3D atau 2D, denah.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Footer -->
<?php $this->load->view('component/footer'); ?>
<!-- End Footer -->

<script src="<?=base_url('asset/js/jquery.inputmask.bundle-3.2.6.min.js');?>"></script>
<script>

    $(document).ready(function(){
      $(".input-mask").inputmask('decimal', { radixPoint:",",  groupSeparator: ".",  digits: 0, autoGroup: true, prefix: '', rightAlignNumerics: false });
    });

    if (window.File && window.FileList && window.FileReader) {
        $("#images").on("change", function(e) {
            var files = e.target.files,
            filesLength = files.length;
            for (var i = 0;(i < 4 && i < filesLength); i++) {
                var f = files[i]
                var fileReader = new FileReader();
                fileReader.onload = (function(e) {
                var file = e.target;
                $("<div class=\"col-md-6 pip\">" +
                    "<img class=\"img-fluid\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                    "<br/><span class=\"remove\">Remove image</span>" +
                    "</div>").insertAfter("#upload-image");
                $(".remove").click(function(){
                    $(this).parent(".pip").remove();
                });
                
                });
                fileReader.readAsDataURL(f);
            }
        });
    } else {
        alert("Your browser doesn't support to File API")
    }

    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            var forms = document.getElementsByClassName('needs-validation');
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

    $( ".datepicker" ).datepicker({
        dateFormat: 'yy-mm-dd',
        minDate: new Date(),
    });

    $(document).ready(function() {
        var max_fields      = 5; //maximum input boxes allowed
        var wrapper         = $(".input_fields_wrap"); //Fields wrapper
        var add_button      = $(".add_field_button"); //Add button ID
        
        var x = 1; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div><input class="my-2" type="file" name="images[]" accept="image/*" required="required"><a href="#" class="remove_field color-red">Remove</a></div>'); //add input box
            }
        });
        
        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });
</script>