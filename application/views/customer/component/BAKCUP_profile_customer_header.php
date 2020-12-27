
<!-- Profile Header -->
<div class="customer-profile bg-white">
    <div class="container-fluid">
        <div class="row ">
            <div class="col">
                <div class="media p-md-5">
                        <img class="align-self-center mr-5 rounded-circle w-50" src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg" alt="Generic placeholder image">
                        <div class="media-body">
                            <h5 class="mt-0 color-red"><?php echo $data_session['name']; ?> <i class="fa fa-check-circle" style="color:#009923;"></i></h5>
                            <p><i class="fa fa-map-marker"></i> Jakarta Timur</p>
                            <p class="color-yellow"><i class="fa fa-map-marker"></i> Grade A+ <i class="fa fa-star"></i> 5.0</p>
                            <p><button class="btn bg-green text-white" style="border-radius: 1.5rem;padding: 3px 25px"><i class="fa fa-eye pr-2"></i> <?=$this->lang->line('v-profile');?></button></p>
                            <p><button class="btn bg-red text-white" style="border-radius: 1.5rem;padding: 3px 25px"><i class="fa fa-pencil-square-o pr-2"></i> <?=$this->lang->line('c-profile');?></button></p>
                        </div>
                </div>
            </div>
            <div class="col d-flex justify-content-md-end">
                <div class="d-flex align-items-end p-md-5">
                    <ul class="list-unstyled align-self-end">
                        <li class="d-flex align-items-center p-2">
                            <img class="img-fluid pr-2" src="<?=base_url('asset/img/coupon-thumbnail.png');?>">
                            <a href="#" class="badge badge-warning text-white w-100" style="padding:10px 20px"> <?=$this->lang->line('v-coupon');?></a>
                        </li>
                        <li class="d-flex align-items-center p-2">
                            <img class="img-fluid pr-2" src="<?=base_url('asset/img/point-thumbnail.png');?>"> 
                            <a href="#" class="badge badge-warning text-white w-100" style="padding:10px 20px">  <?=$this->lang->line('v-ticket');?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Profile Header -->

<!-- Nav Button Profile -->
<div class="nav-button-profile mt-3 mb-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-tab-nguli nav-justified border-0">
                    <a data-toggle="modal" href="#newProject" class="nav-item shadow d-flex justify-content-center align-items-center bg-white py-3 my-2 mx-3">
                        <?=$this->lang->line('n-project');?>
                    </a>
                    <a href="<?=base_url('customer/ongoing_project');?>" class="nav-item shadow d-flex justify-content-center align-items-center bg-white py-3 my-2 mx-3">
                        <?=$this->lang->line('o-project');?>
                    </a>
                    <a href="#" class="nav-item shadow d-flex justify-content-center align-items-center bg-white py-3 my-2 mx-3">
                        <?=$this->lang->line('l-project');?>
                    </a>
                    <a href="<?=base_url('customer/ongoing_bidding');?>" class="nav-item shadow d-flex justify-content-center align-items-center bg-white py-3 my-2 mx-3">
                        <?=$this->lang->line('o-bidding');?>
                    </a>
                    <a href="#" class="nav-item shadow d-flex justify-content-center align-items-center bg-white py-3 my-2 mx-3">
                        <?=$this->lang->line('l-tender');?>
                    </a>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Nav Button Profile -->

<!-- Modal Form New Project -->
<div class="modal fade" id="newProject" tabindex="-1" role="dialog" aria-labelledby="newProjectForm" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-red text-white">

      <div class="modal-header border-0">
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <?= form_open_multipart('post/save_post','id="submit-post"'); ?>
        <div class="modal-body">
            <div class="form-title text-center">
                <h5><strong>BUAT PROYEK BARU</strong></h5>
            </div>
            <div id="select-category" class="form-group row">
                <label for="selectCategory" class="col-sm-5 col-md-4 col-form-label">Kebutuhan</label>
                <div class="col-sm-7 col-md-8">
                    <select name="category" value="<?php echo set_value('category'); ?>" class="custom-select" id="selectCategory" required>
                        <?php foreach ($categoryPost as $key => $val) { ?>
                            <option value="<?=$val->id;?>"><?= empty($val->category_id) ? $val->category_en : $val->category_id;?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            
            <div id="design">
                <div class="form-group row field-luas">
                    <label for="buildingArea" class="col-sm-5 col-md-4 col-form-label">Luas Tanah</label>
                    <div class="col-sm-7 col-md-8">
                    <input type="text" name="building_area" value="<?php echo set_value('building_area'); ?>" class="form-control" id="buildingArea" placeholder="2 m2" required>
                    </div>
                </div>
                <div class="form-group row field-range">
                    <label for="budget" class="col-sm-5 col-md-4 col-form-label">Range Tarif</label>
                    <div class="col-sm-7 col-md-4 mb-2 mb-md-0">
                        <select name="range_min" value="<?php echo set_value('range_min'); ?>" class="custom-select" id="range-min" required>
                        <?php
                        foreach (range(30000, 500000, 10000) as $number) {
                            echo '<option value="'.$number.'">Rp '.number_format($number, 0, '', '.').'</option>';
                        }
                        ?>
                        </select>
                    </div>
                    <div class="col-sm-7 col-md-4 mb-2 mb-md-0">
                        <select name="range_max" class="custom-select" id="range-max" required>
                        </select>
                    </div>
                </div>
                <div class="form-group row field-budget">
                    <label for="budget" class="col-sm-5 col-md-4 col-form-label">Budget</label>
                    <div class="col-sm-7 col-md-4">
                        <input type="text" name="budget_min" value="<?=set_value('budget_min');?>" class="form-control" id="budget" placeholder="Rp 100.000" required>
                    </div>
                    <div class="col-sm-7 col-md-4">
                        <input type="text" name="budget_max" value="<?=set_value('budget_max');?>" class="form-control" placeholder="Rp 200.000" required>
                    </div>
                </div>
                <div class="form-group row field-criteria">
                    <label for="descProject" id="labelDesc" class="col-sm-5 col-md-4 col-form-label">Kriteria Bangunan</label>
                    <div class="col-sm-7 col-md-8">
                        <textarea name="description" value="<?set_value('description');?>" class="form-control p-2" style="font-size:14px;" id="descProject" rows="10"></textarea>
                    </div>
                </div>
                <div class="form-group row field-image">
                    <label for="descProject" class="col-sm-5 col-md-4 col-form-label">Upload Image</label>
                    <div class="col-sm-7 col-md-8">
                        <div class="row upload-wraps">
                            <div class="col-md-12" id="upload-image" class="upload-field">
                                <!-- <div class="uploadpreview view-1"></div> -->
                                <input type="file" id="images" name="images[]" accept="image/*" onchange="imgLoad(event)" multiple required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row field-close">
                    <label for="closeTender" class="col-sm-5 col-md-4 col-form-label">Tutup Tender</label>
                    <div class="col-sm-7 col-md-8">
                        <input type="text" name="close_tender" value="<?=set_value('close_tender'); ?>" class="datepicker form-control" id="closeTender" placeholder="20 April 2020" autocomplete="off" required>
                    </div>
                </div>
                <div class="form-group row field-announce">
                    <label for="announceTender" class="col-sm-5 col-md-4 col-form-label">Pengumuman Tender</label>
                    <div class="col-sm-7 col-md-8">
                        <input type="text" name="notif_tender" value="<?php echo set_value('notif_tender'); ?>" class="datepicker form-control" id="announceTender" placeholder="30 April 2020" autocomplete="off" required>
                    </div>
                </div>
            </div>
                
        </div>
        <div class="modal-footer border-0">
            <div class="col-md-12 d-flex flex-row justify-content-center">
                <button type="submit" class="btn btn-success m-md-2 px-md-5">Post</button>
                <button type="button" class="btn btn-danger m-md-2 px-md-5">Edit</button>
            </div>
        </div>
      <?= form_close(); ?>
    </div>
  </div>
</div>
<!-- End Modal Form New Project -->

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
                    <div class="form-group row field-daily-worker">
                        <label for="jumlahPekerja" class="col-sm-5 col-md-4 col-form-label">Jumlah Pekerja</label>
                        <div class="col-sm-7 col-md-8">
                        <input type="text" name="worker" class="form-control" id="jumlahPekerja" placeholder="2 orang" required>
                        </div>
                    </div>
                    <div class="form-group row field-daily-execution">
                        <label for="execution" class="col-sm-5 col-md-4 col-form-label">Tanggal Pengerjaan</label>
                        <div class="col-sm-7 col-md-8">
                        <input type="text" name="execution" class="form-control datepicker" id="execution" placeholder="2020-06-30" autocomplete="off" required>
                        </div>
                    </div>
                </div>
            `).insertAfter("#select-category");

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
                    <div class="form-group row field-luas">
                        <label for="buildingArea" class="col-sm-5 col-md-4 col-form-label">Luas Tanah</label>
                        <div class="col-sm-7 col-md-8">
                        <input type="text" name="building_area" value="<?php echo set_value('building_area'); ?>" class="form-control" id="buildingArea" placeholder="2 m2" required>
                        </div>
                    </div>
                    <div class="form-group row field-budget">
                        <label for="budget" class="col-sm-5 col-md-4 col-form-label">Budget</label>
                        <div class="col-sm-7 col-md-4">
                            <input type="text" name="budget_min" value="<?=set_value('budget_min');?>" class="form-control" id="budget" placeholder="Rp 100.000" required>
                        </div>
                        <div class="col-sm-7 col-md-4">
                            <input type="text" name="budget_max" value="<?=set_value('budget_max');?>" class="form-control" placeholder="Rp 200.000" required>
                        </div>
                    </div>
                    <div class="form-group row field-criteria">
                        <label for="descProject" id="labelDesc" class="col-sm-5 col-md-4 col-form-label">Kriteria Bangunan</label>
                        <div class="col-sm-7 col-md-8">
                            <textarea name="description" value="<?set_value('description');?>" class="form-control p-2" style="font-size:14px;" id="descProject" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group row field-image">
                        <label for="descProject" class="col-sm-5 col-md-4 col-form-label">Upload Image</label>
                        <div class="col-sm-7 col-md-8">
                            <div class="row upload-wraps">
                                <div class="col-md-12" id="upload-image" class="upload-field">
                                    <!-- <div class="uploadpreview view-1"></div> -->
                                    <input type="file" id="images" name="images[]" accept="image/*" onchange="imgLoad(event)" multiple required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row field-close">
                        <label for="closeTender" class="col-sm-5 col-md-4 col-form-label">Tutup Tender</label>
                        <div class="col-sm-7 col-md-8">
                            <input type="text" name="close_tender" value="<?=set_value('close_tender'); ?>" class="datepicker form-control" id="closeTender" placeholder="20 April 2020" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group row field-announce">
                        <label for="announceTender" class="col-sm-5 col-md-4 col-form-label">Pengumuman Tender</label>
                        <div class="col-sm-7 col-md-8">
                            <input type="text" name="notif_tender" value="<?php echo set_value('notif_tender'); ?>" class="datepicker form-control" id="announceTender" placeholder="30 April 2020" autocomplete="off" required>
                        </div>
                    </div>
                </div>
            `).insertAfter("#select-category");
            $("#labelDesc").text("Desain Bangunan");
            $( ".datepicker" ).datepicker({
                dateFormat: 'yy-mm-dd',
                minDate: new Date(),
            });
            
        } else if(this.value == 1){
            $("#construct").remove();
            $("#dialy-project").remove();
            $("#submit-post").attr('action', '<?=base_url("post/save_post");?>');
            $(`
                <div id="design">
                    <div class="form-group row field-luas">
                        <label for="buildingArea" class="col-sm-5 col-md-4 col-form-label">Luas Tanah</label>
                        <div class="col-sm-7 col-md-8">
                        <input type="text" name="building_area" value="<?php echo set_value('building_area'); ?>" class="form-control" id="buildingArea" placeholder="2 m2" required>
                        </div>
                    </div>
                    <div class="form-group row field-range">
                        <label for="budget" class="col-sm-5 col-md-4 col-form-label">Range Tarif</label>
                        <div class="col-sm-7 col-md-4 mb-2 mb-md-0">
                            <select name="range_min" value="<?php echo set_value('range_min'); ?>" class="custom-select" id="range-min" required>
                            <?php
                            foreach (range(30000, 500000, 10000) as $number) {
                                echo '<option value="'.$number.'">Rp '.number_format($number, 0, '', '.').'</option>';
                            }
                            ?>
                            </select>
                        </div>
                        <div class="col-sm-7 col-md-4 mb-2 mb-md-0">
                            <select name="range_max" class="custom-select" id="range-max" required>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row field-budget">
                        <label for="budget" class="col-sm-5 col-md-4 col-form-label">Budget</label>
                        <div class="col-sm-7 col-md-4">
                            <input type="text" name="budget_min" value="<?=set_value('budget_min');?>" class="form-control" id="budget" placeholder="Rp 100.000" required>
                        </div>
                        <div class="col-sm-7 col-md-4">
                            <input type="text" name="budget_max" value="<?=set_value('budget_max');?>" class="form-control" placeholder="Rp 200.000" required>
                        </div>
                    </div>
                    <div class="form-group row field-criteria">
                        <label for="descProject" id="labelDesc" class="col-sm-5 col-md-4 col-form-label">Kriteria Bangunan</label>
                        <div class="col-sm-7 col-md-8">
                            <textarea name="description" value="<?set_value('description');?>" class="form-control p-2" style="font-size:14px;" id="descProject" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group row field-image">
                        <label for="descProject" class="col-sm-5 col-md-4 col-form-label">Upload Image</label>
                        <div class="col-sm-7 col-md-8">
                            <div class="row upload-wraps">
                                <div class="col-md-12" id="upload-image" class="upload-field">
                                    <!-- <div class="uploadpreview view-1"></div> -->
                                    <input type="file" id="images" name="images[]" accept="image/*" onchange="imgLoad(event)" multiple required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row field-close">
                        <label for="closeTender" class="col-sm-5 col-md-4 col-form-label">Tutup Tender</label>
                        <div class="col-sm-7 col-md-8">
                            <input type="text" name="close_tender" value="<?=set_value('close_tender'); ?>" class="datepicker form-control" id="closeTender" placeholder="20 April 2020" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="form-group row field-announce">
                        <label for="announceTender" class="col-sm-5 col-md-4 col-form-label">Pengumuman Tender</label>
                        <div class="col-sm-7 col-md-8">
                            <input type="text" name="notif_tender" value="<?php echo set_value('notif_tender'); ?>" class="datepicker form-control" id="announceTender" placeholder="30 April 2020" autocomplete="off" required>
                        </div>
                    </div>
                </div>
            `).insertAfter("#select-category");

            $("#labelDesc").text("Kriteria Bangunan");
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
</script>