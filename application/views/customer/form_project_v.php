
<!-- Nav Bar Login Session -->
<?php $this->load->view('customer/component/navbar_after_login'); ?>
<!-- End Nav Bar Login Session -->

<div class="form-project my-4 py-3">
    <div class="container">
        <div class="row">

            <div class="col-md-8 p-5" style="background-color: rgba(204,227,250,0.50)">
                <?= form_open_multipart('post/save_post','id="submit-post"'); ?>

                <div id="select-category" class="form-group pb-3">
                    <label for="selectCategory" class="poppins-extra-bold h5 pb-2">Proyek apa yang ingin Anda selesaikan?</label>
                    <select name="category" value="<?php echo set_value('category'); ?>" class="custom-select" id="selectCategory" required>
                        <?php foreach ($categoryPost as $key => $val) { ?>
                            <option value="<?=$val->id;?>"><?= empty($val->category_id) ? $val->category_en : $val->category_id;?></option>
                        <?php } ?>
                    </select>
                </div>
                
                <div id="design">
                    <div class="form-group row field-luas pb-3">
                        <label for="buildingArea" class="poppins-extra-bold col-md-3 align-self-center h5 pb-2">Nama Proyek</label>
                        <div class="col-md-12">
                            <input type="text" name="project_name" value="<?php echo set_value('building_area'); ?>" class="form-control" id="buildingArea" placeholder="Ruko 2 lantai" required>
                        </div>
                    </div>
                    <div class="form-group row field-luas pb-3">
                        <label for="buildingArea" class="poppins-extra-bold col-md-3 align-self-center h5">Luas Tanah</label>
                        <div class="col-md-3">
                            <input type="text" name="building_area" value="<?php echo set_value('building_area'); ?>" class="form-control" id="buildingArea" placeholder="2" required>
                        </div>
                        <span class="col-md-4 align-self-center">m2</span>
                    </div>
                    <div class="form-group row field-range pb-3">
                        <label for="budget" class="col-md-12 poppins-extra-bold h5 pb-2">Range Tarif Desain</label>
                        <div class="col-md-4 mb-2 mb-md-0">
                            <select name="range_min" value="<?php echo set_value('range_min'); ?>" class="custom-select" id="range-min" required>
                            <?php
                            foreach (range(30000, 500000, 10000) as $number) {
                                echo '<option value="'.$number.'">Rp '.number_format($number, 0, '', '.').'</option>';
                            }
                            ?>
                            </select>
                        </div>
                        <div class="col-md-1 text-center align-self-center color-gray">
                            <span>s/d</span>
                        </div>
                        <div class="col-md-4 mb-2 mb-md-0">
                            <select name="range_max" class="custom-select" id="range-max" required>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row field-budget pb-3">
                        <label for="budget" class="col-md-12 poppins-extra-bold h5 pb-2">Biaya yang Anda disedikan</label>
                        <div class="col-md-4">
                            <input type="text" name="budget_min" value="<?=set_value('budget_min');?>" class="form-control input-mask" id="budget" placeholder="Rp 100.000" required>
                        </div>
                        <div class="col-md-1 text-center align-self-center color-gray">
                            <span>s/d</span>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="budget_max" value="<?=set_value('budget_max');?>" class="form-control input-mask" placeholder="Rp 200.000" required>
                        </div>
                    </div>
                    <div class="form-group row field-criteria pb-3">
                        <label for="descProject" id="labelDesc" class="col-md-12 poppins-extra-bold h5 pb-2">Deskripsi Detail Bangunan</label>
                        <div class="col-md-12">
                            <textarea name="description" value="<?set_value('description');?>" class="form-control p-2" style="font-size:14px;" id="descProject" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group row field-image pb-3">
                        <label for="descProject" class="col-sm-5 col-md-4 poppins-extra-bold h5">Unggah Foto</label>
                        <div class="col-sm-7 col-md-8">
                            <div class="input_fields_wrap">
                                <button class="add_field_button btn bg-red text-white px-3 mb-2">Tambah Foto</button>
                                <div><input class="my-2" type="file" name="images[]" accept="image/*" required="required"></div>
                            </div>
                            <!-- <div class="row upload-wraps">
                                <div class="col-md-12" id="upload-image" class="upload-field">
                                    <div class="uploadpreview view-1">OFF</div>
                                    <input type="file" id="images" name="images[]" accept="image/*" onchange="imgLoad(event)" multiple required>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="form-group row pb-3">
                        <div class="col-md-6 field-close">
                            <label for="closeTender" class="poppins-extra-bold h5 pb-2">Tutup Tender</label>
                            <input type="datetime-local" name="close_tender" value="<?=set_value('close_tender'); ?>" class="form-control" id="closeTender" placeholder="20 April 2020" autocomplete="off" required>
                        </div>
                        <div class="col-md-6 field-announce">
                            <label for="announceTender" class="poppins-extra-bold h5 pb-2">Pengumuman Tender</label>
                            <input type="text" name="notif_tender" value="<?php echo set_value('notif_tender'); ?>" class="datepicker form-control" id="announceTender" placeholder="30 April 2020" autocomplete="off" required>
                        </div>
                    </div>
                </div>

                <div class="form-group pb-3">
                    <button type="submit" id="btn-submit" class="btn bg-red text-white float-right px-4 py-2" style="font-size:1.1rem">POSTING</button>
                </div>

                <?= form_close(); ?>
            </div>
            
            <div class="col-md-4">
                <div class="row px-3 d-flex align-items-stretch h-100">
                    <div class="col-md-12">
                        <div class="px-3 py-2" style="background:#F9F9F9;">
                            <h5 class="h4 poppins-medium border-bottom py-2 color-red" style="border-color:#990000!important"><i class="fa fa-info-circle mr-3" style="font-size:2.5rem"></i> <span class="align-self-center">PRO TIPS</span> </h5>
                            <p>Pilih kategori yang sangat sesuai dengan kebutuhan Anda.</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="px-3 py-2 align-self-center" style="background:#F9F9F9;">
                            <h5 class="h4 poppins-medium border-bottom py-2 color-red" style="border-color:#990000!important"><i class="fa fa-info-circle mr-3" style="font-size:2.5rem"></i> <span class="align-self-center">PRO TIPS</span> </h5>
                            <p>Masukkan kriteria sesuai budget Anda.</p>
                        </div>
                    </div>
                    <div class="col-md-12 align-self-end">
                        <div class="px-3 py-2" style="background:#F9F9F9;">
                            <h5 class="h4 poppins-medium border-bottom py-2 color-red" style="border-color:#990000!important"><i class="fa fa-info-circle mr-3" style="font-size:2.5rem"></i> <span class="align-self-center">PRO TIPS</span> </h5>
                            <p>Tambahkan gambar yang tepat untuk memudahkan mitra membayangkan detail bangunan yang Anda inginkan.</p>
                        </div>
                    </div>
                    <div class="col-md-12 align-self-end">
                        <div class="px-3 py-2" style="background:#F9F9F9;">
                            <h5 class="h4 poppins-medium border-bottom py-2 color-red" style="border-color:#990000!important"><i class="fa fa-info-circle mr-3" style="font-size:2.5rem"></i> <span class="align-self-center">PRO TIPS</span> </h5>
                            <p>Lampirkan dokumen berisi detail bangunan sesuai kebutuhan Anda.</p>
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
<script type="text/javascript">

 // Upload Multiple Image
 function imgLoad(e) {
    if (window.File && window.FileList && window.FileReader) {
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
    } else {
        alert("Your browser doesn't support to File API")
    }
}
    
$(document).ready(function(){

    // Select Range
    var selectmin = $("#range-min").find("option:selected").val();
    var max = parseInt(selectmin)+50000;
    for (i of range(max, 500000, 10000)){
        $("#range-max").append("<option value='"+i+"'>"+formatNumber(i,0,".",".")+"</option>");
    }
    $('#range-min').change(function(){
        var gap = parseInt($(this).val())+50000;
        // Empty last selected
        $("#range-max").empty();
        for (i of range(gap, 500000, 10000)){
            $("#range-max").append("<option value='"+i+"'>"+formatNumber(i,0,".",".")+"</option>");
        }
    });
    function range(start, end, step = 1) {
        const len = Math.floor((end - start) / step) + 1
        return Array(len).fill().map((_, idx) => start + (idx * step))
    }
    function formatNumber (num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
    }

    // Selected category input
    $('#selectCategory').change(function() {
        if (this.value == 3){
            $("#dialy-project").remove();
            $("#design").remove();
            $("#construct").remove();
            $("#submit-post").attr('action', '<?=base_url("post/save_daily");?>');
            $(`
                <div id="dialy-project">
                    <div class="form-group row field-luas pb-3">
                        <label for="buildingArea" class="poppins-extra-bold col-md-3 align-self-center h5 pb-2">Nama Proyek</label>
                        <div class="col-md-12">
                            <input type="text" name="project_name" value="<?php echo set_value('building_area'); ?>" class="form-control" id="buildingArea" placeholder="Ruko 2 lantai" required>
                        </div>
                    </div>
                    <div id="type-daily" class="form-group row field-daily">
                        <label for="selectSubCategory" class="col-sm-5 col-md-4 col-form-label">Jenis Pekerjaan</label>
                        <div class="col-sm-7 col-md-8">
                            <select name="subcategory" value="<?php echo set_value('subcategory'); ?>" class="custom-select" id="selectSubCategory" required>
                                <?php foreach ($subCategoryDialy as $key => $val) { ?>
                                    <option value="<?=$val->id;?>"><?= empty($val->subcategory_idn) ? $val->subcategory_en : $val->subcategory_idn;?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row field-daily-desc">
                        <label for="descProject" id="dailyDesc" class="col-sm-5 col-md-4 col-form-label">Deskripsi Pekerjaan</label>
                        <div class="col-sm-7 col-md-8">
                            <textarea name="daily_desc" class="form-control p-2" style="font-size:14px;" id="dailyDesc" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group row field-daily-worker pb-3">
                        <label for="jumlahPekerja" class="col-sm-5 col-md-4 col-form-label">Jumlah Pekerja</label>
                        <div class="col-sm-7 col-md-8">
                        <input type="text" name="worker" class="form-control" id="jumlahPekerja" placeholder="2 orang" required>
                        </div>
                    </div>
                    <div class="form-group row field-daily-execution  pb-3">
                        <label for="execution" class="col-md-12 poppins-extra-bold h5 pb-2">Tanggal Pengerjaan</label>
                        <div class="col-md-6">
                        <input type="text" name="execution" class="form-control datepicker" id="execution" placeholder="2020-06-30" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group row pb-3">
                        <div class="col-md-6 field-daily-start">
                            <label for="startDaily" class="poppins-extra-bold h5">Mulai Pengerjaan</label>
                            <input type="text" name="start_daily" class="form-control datepicker" id="startDaily" placeholder="2020-06-30" autocomplete="off" required>
                        </div>
                        <div class="col-md-6 field-daily-end">
                            <label for="startDaily" class="poppins-extra-bold h5">Selesai Pengerjaan</label>
                            <input type="text" name="end_daily" class="form-control datepicker" id="endDaily" placeholder="2020-06-30" autocomplete="off" required>
                        </div>
                    </div>
                </div>
            `).insertAfter("#select-category");
            
            $("#btn-submit").text("PROSES");
            $( ".datepicker" ).datepicker({
                dateFormat: 'yy-mm-dd',
                minDate: new Date(),
            });
        } else if(this.value == 2){
            $("#dialy-project").remove();
            $(".field-range").remove();
            $("#design").remove();
            $("#submit-post").attr('action', '<?=base_url("post/save_post");?>');
            $(`
                <div id="construct">
                    <div class="form-group row field-luas pb-3">
                        <label for="buildingArea" class="poppins-extra-bold col-md-3 align-self-center h5 pb-2">Nama Proyek</label>
                        <div class="col-md-12">
                            <input type="text" name="project_name" value="<?php echo set_value('building_area'); ?>" class="form-control" id="buildingArea" placeholder="Ruko 2 lantai" required>
                        </div>
                    </div>
                    <div class="form-group row field-luas pb-3">
                        <label for="buildingArea" class="poppins-extra-bold col-md-3 align-items-center h5">Luas Tanah</label>
                        <div class="col-md-3">
                        <input type="text" name="building_area" value="<?php echo set_value('building_area'); ?>" class="form-control" id="buildingArea" placeholder="2 m2" required>
                        </div>
                        <span class="col-md-4 align-self-center">m2</span>
                    </div>
                    <div class="form-group row field-budget pb-3">
                        <label for="budget" class="col-md-12 poppins-extra-bold align-items-center h5">Biaya yang Anda sediakan</label>
                        <div class="col-md-4">
                            <input type="text" name="budget_min" value="<?=set_value('budget_min');?>" class="form-control input-mask" id="budget" placeholder="Rp 100.000" required>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="budget_max" value="<?=set_value('budget_max');?>" class="form-control input-mask" placeholder="Rp 200.000" required>
                        </div>
                    </div>
                    <div class="form-group field-criteria pb-3">
                        <label for="descProject" id="labelDesc" class="poppins-extra-bold align-items-center h5">Deskripsi Detail Bangunan</label>
                        <textarea name="description" value="<?set_value('description');?>" class="form-control p-2" id="descProject" rows="5" placeholder="Deskripsikan detail bangunan yang Anda inginkan secara jelas."></textarea>
                    </div>
                    <div class="form-group row field-image pb-3">
                        <label for="descProject" class="col-sm-5 col-md-4 poppins-extra-bold h5">Unggah Foto</label>
                        <div class="col-sm-7 col-md-8">
                            <div class="input_fields_wrap">
                                <button type="button" class="add_field_button btn bg-red text-white px-3 mb-2">Tambah Foto</button>
                                <div><input class="my-2" type="file" name="images[]" accept="image/*" required="required"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 field-close">
                            <label for="closeTender" class="poppins-extra-bold h5">Tutup Tender</label>
                            <input type="datetime-local" name="close_tender" value="<?=set_value('close_tender'); ?>" class="form-control" id="closeTender" placeholder="20 April 2020" autocomplete="off" required>
                        </div>
                        
                        <div class="col-md-6 field-announce">
                            <label for="announceTender" class="poppins-extra-bold h5">Pengumuman Tender</label>
                            <input type="text" name="notif_tender" value="<?php echo set_value('notif_tender'); ?>" class="datepicker form-control" id="announceTender" placeholder="30 April 2020" autocomplete="off" required>
                        </div>
                    </div>
                </div>
            `).insertAfter("#select-category");

            $(".input-mask").inputmask('decimal', { radixPoint:",",  groupSeparator: ".",  digits: 0, autoGroup: true, prefix: '', rightAlignNumerics: false });
            
            $("#btn-submit").text("POSTING");
            $( ".datepicker" ).datepicker({
                dateFormat: 'yy-mm-dd',
                minDate: new Date(),
            });

            var max_fields = 5; //maximum input boxes allowed
            var wrapper    = $(".input_fields_wrap"); //Fields wrapper
            var add_button = $(".add_field_button"); //Add button ID
            
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
            
        } else if(this.value == 1){
            $("#construct").remove();
            $("#dialy-project").remove();
            $("#submit-post").attr('action', '<?=base_url("post/save_post");?>');
            $(`
                <div id="design">
                    <div class="form-group row field-luas pb-3">
                        <label for="buildingArea" class="poppins-extra-bold col-md-3 align-self-center h5 pb-2">Nama Proyek</label>
                        <div class="col-md-12">
                            <input type="text" name="project_name" value="<?php echo set_value('building_area'); ?>" class="form-control" id="buildingArea" placeholder="Ruko 2 lantai" required>
                        </div>
                    </div>
                    <div class="form-group row field-luas pb-3">
                        <label for="buildingArea" class="poppins-extra-bold col-md-3 align-self-center h5 pb-2">Luas Tanah</label>
                        <div class="col-md-3">
                            <input type="text" name="building_area" value="<?php echo set_value('building_area'); ?>" class="form-control" id="buildingArea" placeholder="2" required>
                        </div>
                        <span class="col-md-4 align-self-center">m2</span>
                    </div>
                    <div class="form-group row field-range pb-3">
                        <label for="budget" class="col-md-12 poppins-extra-bold h5 pb-2">Range Tarif Desain</label>
                        <div class="col-md-4 mb-2 mb-md-0">
                            <select name="range_min" value="<?php echo set_value('range_min'); ?>" class="custom-select" id="range-min" required>
                            <?php
                            foreach (range(30000, 500000, 10000) as $number) {
                                echo '<option value="'.$number.'">Rp '.number_format($number, 0, '', '.').'</option>';
                            }
                            ?>
                            </select>
                        </div>
                        <div class="col-md-1 text-center align-self-center color-gray">
                            <span>s/d</span>
                        </div>
                        <div class="col-md-4 mb-2 mb-md-0">
                            <select name="range_max" class="custom-select" id="range-max" required>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row field-budget pb-3">
                        <label for="budget" class="col-md-12 poppins-extra-bold h5 pb-2">Biaya yang Anda disedikan</label>
                        <div class="col-md-4">
                            <input type="text" name="budget_min" value="<?=set_value('budget_min');?>" class="form-control input-mask" id="budget" placeholder="Rp 100.000" required>
                        </div>
                        <div class="col-md-1 text-center align-self-center color-gray">
                            <span>s/d</span>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="budget_max" value="<?=set_value('budget_max');?>" class="form-control input-mask" placeholder="Rp 200.000" required>
                        </div>
                    </div>
                    <div class="form-group row field-criteria pb-3">
                        <label for="descProject" id="labelDesc" class="col-md-12 poppins-extra-bold h5 pb-2">Deskripsi Detail Bangunan</label>
                        <div class="col-md-12">
                            <textarea name="description" value="<?set_value('description');?>" class="form-control p-2" style="font-size:14px;" id="descProject" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group row field-image pb-3">
                        <label for="descProject" class="col-sm-5 col-md-4 poppins-extra-bold h5">Unggah Foto</label>
                        <div class="col-sm-7 col-md-8">
                            <div class="input_fields_wrap">
                                <button type="button" class="add_field_button btn bg-red text-white px-3 mb-2">Tambah Foto</button>
                                <div><input class="my-2" type="file" name="images[]" accept="image/*" required="required"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 field-close">
                            <label for="closeTender" class="poppins-extra-bold h5 pb-2">Tutup Tender</label>
                            <input type="text" name="close_tender" value="<?=set_value('close_tender'); ?>" class="datepicker form-control" id="closeTender" placeholder="20 April 2020" autocomplete="off" required>
                        </div>
                        <div class="col-md-6 field-announce">
                            <label for="announceTender" class="poppins-extra-bold h5 pb-2">Pengumuman Tender</label>
                            <input type="text" name="notif_tender" value="<?php echo set_value('notif_tender'); ?>" class="datepicker form-control" id="announceTender" placeholder="30 April 2020" autocomplete="off" required>
                        </div>
                    </div>
                </div>
            `).insertAfter("#select-category");

            $(".input-mask").inputmask('decimal', { radixPoint:",",  groupSeparator: ".",  digits: 0, autoGroup: true, prefix: '', rightAlignNumerics: false });

            $("#btn-submit").text("POSTING");
            // $("#labelDesc").text("Kriteria Bangunan");
            // Select Range
            var selectmin = $("#range-min").find("option:selected").val();
            var max = parseInt(selectmin)+50000;
            for (i of range(max, 500000, 10000)){
                $("#range-max").append("<option value='"+i+"'>"+formatNumber(i,0,".",".")+"</option>");
            }
            $('#range-min').change(function(){
                var gap = parseInt($(this).val())+50000;
                // Empty last selected
                $("#range-max").empty();
                for (i of range(gap, 500000, 10000)){
                    $("#range-max").append("<option value='"+i+"'>"+formatNumber(i,0,".",".")+"</option>");
                }
            });
            function range(start, end, step = 1) {
                const len = Math.floor((end - start) / step) + 1;
                return Array(len).fill().map((_, idx) => start + (idx * step));
            }
            function formatNumber (num) {
                return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
            }
            $( ".datepicker" ).datepicker({
                dateFormat: 'yy-mm-dd',
                minDate: new Date(),
            });

            var max_fields = 5; //maximum input boxes allowed
            var wrapper    = $(".input_fields_wrap"); //Fields wrapper
            var add_button = $(".add_field_button"); //Add button ID
            
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
            });
        }
    });

    $( ".datepicker" ).datepicker({
        dateFormat: 'yy-mm-dd',
        minDate: new Date(),
    });

    // Text Editor
    // tinymce.init({
    //     selector: '#descProject',
    //     height: 300,
    //     plugins: "lists",
    //     toolbar: "numlist bullist | bold italic | styleselect | fullscreen alignleft aligncenter alignright",
    //     menubar: false,
    // });

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

    $(".input-mask").inputmask('decimal', { radixPoint:",",  groupSeparator: ".",  digits: 0, autoGroup: true, prefix: '', rightAlignNumerics: false });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>