
<!-- Nav Bar Login Session -->
<?php $this->load->view('customer/component/navbar_after_login'); ?>
<!-- End Nav Bar Login Session -->

<div class="form-project my-4 py-3">
    <div class="container">
        <div class="row">

            <div class="col-md-8 p-5" style="background-color: rgba(204,227,250,0.50)">
                <?= form_open_multipart('post/save_daily','id="submit-post"'); ?>

                <div id="select-category" class="form-group pb-3">
                    <label for="selectCategory" class="poppins-extra-bold h5 pb-2">Proyek apa yang ingin Anda selesaikan?</label>
                    <select name="category" value="<?php echo set_value('category'); ?>" class="custom-select" id="selectCategory" required>
                        <?php foreach ($categoryPost as $key => $val) { ?>
                            <option value="<?=$val->id;?>" <?= $val->id == 3 ? 'selected="selected"' : "";?>><?= empty($val->category_id) ? $val->category_en : $val->category_id;?></option>
                        <?php } ?>
                    </select>
                </div>
                
                <div id="dialy-project">
                    <div id="type-daily" class="form-group row field-daily pb-3">
                        <label for="selectSubCategory" class="col-md-12 poppins-extra-bold h5 pb-2">Jenis Pekerjaan</label>
                        <div class="col-md-12">
                            <select name="subcategory" value="<?php echo set_value('subcategory'); ?>" class="custom-select" id="selectSubCategory" required>
                                <?php foreach ($subCategoryDialy as $key => $val) { ?>
                                    <option value="<?=$val->id;?>"><?= empty($val->subcategory_idn) ? $val->subcategory_en : $val->subcategory_idn;?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row field-daily-desc pb-3">
                        <label for="descProject" id="dailyDesc" class="col-md-12 poppins-extra-bold h5 pb-2">Deskripsi Pekerjaan</label>
                        <div class="col-md-12">
                            <textarea name="daily_desc" class="form-control p-2" style="font-size:14px;" id="dailyDesc" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group row field-daily-worker pb-3">
                        <div class="col-md-6 pb-2">
                            <label for="jumlahPekerja" class="poppins-extra-bold h5 pb-2">Jumlah Pekerja</label>
                            <input type="text" name="worker" class="form-control" id="jumlahPekerja" placeholder="2 orang" required>
                        </div>
                        <div class="col-md-6 pb-2">
                            <label for="execution" class="poppins-extra-bold h5 pb-2">Tanggal Pengerjaan</label>
                            <input type="text" name="execution" class="form-control datepicker" id="execution" placeholder="2020-06-30" autocomplete="off" required>
                        </div>
                    </div>
                </div>

                <div class="form-group py-3">
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

<!-- Modal Coming Soon -->
<div class="modal fade" id="comingSoon" tabindex="-1" role="dialog" aria-labelledby="comingSoonTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content bg-red text-white">

      <div class="modal-header border-0">
        <!-- <h5 class="modal-title" id="comingSoonTitle"></h5> -->
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body text-center">
        <h4>Coming Soon!!!</h4>
      </div>

      <div class="modal-footer border-0">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>

    </div>
  </div>
</div>

<!-- Footer -->
<?php $this->load->view('component/footer'); ?>
<!-- End Footer -->

<script type="text/javascript">
    
$(document).ready(function(){

    // Selected category input
    $('#selectCategory').change(function() {
        if (this.value == 3){
            $("#dialy-project").remove();
            $("#design").remove();
            $("#construct").remove();
            $("#cs").remove();
            $("#submit-post").attr('action', '<?=base_url("post/save_daily");?>');
            $(`
                <div id="dialy-project">
                    <div id="type-daily" class="form-group row field-daily pb-3">
                        <label for="selectSubCategory" class="col-md-12 poppins-extra-bold h5 pb-2">Jenis Pekerjaan</label>
                        <div class="col-md-12">
                            <select name="subcategory" value="<?php echo set_value('subcategory'); ?>" class="custom-select" id="selectSubCategory" required>
                                <?php foreach ($subCategoryDialy as $key => $val) { ?>
                                    <option value="<?=$val->id;?>"><?= empty($val->subcategory_idn) ? $val->subcategory_en : $val->subcategory_idn;?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row field-daily-desc pb-3">
                        <label for="descProject" id="dailyDesc" class="col-md-12 poppins-extra-bold h5 pb-2">Deskripsi Pekerjaan</label>
                        <div class="col-md-12">
                            <textarea name="daily_desc" class="form-control p-2" style="font-size:14px;" id="dailyDesc" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group row field-daily-worker pb-3">
                        <div class="col-md-6 pb-2">
                            <label for="jumlahPekerja" class="poppins-extra-bold h5 pb-2">Jumlah Pekerja</label>
                            <input type="text" name="worker" class="form-control" id="jumlahPekerja" placeholder="2 orang" required>
                        </div>
                        <div class="col-md-6 pb-2">
                            <label for="execution" class="poppins-extra-bold h5 pb-2">Tanggal Pengerjaan</label>
                            <input type="text" name="execution" class="form-control datepicker" id="execution" placeholder="2020-06-30" autocomplete="off" required>
                        </div>
                    </div>
                </div>
                <div class="form-group py-3">
                    <button type="submit" id="btn-submit" class="btn bg-red text-white float-right px-4 py-2" style="font-size:1.1rem">POSTING</button>
                </div>
            `).insertAfter("#select-category");
            
            $("#btn-submit").text("PROSES");
            $( ".datepicker" ).datepicker({
                dateFormat: 'yy-mm-dd',
                minDate: new Date(),
            });
        } else if(this.value == 2){
            $("#dialy-project").remove();
            $("#btn-submit").remove();
            $("#cs").remove();
            $(`
                <p id="cs" class="text-center h5">Coming Soon</p>
            `).insertAfter("#select-category");
            $('#comingSoon').modal('show');
            // $('#comingSoonTitle').text('Konstruksi');
            
        } else if(this.value == 1){
            $("#dialy-project").remove();
            $("#btn-submit").remove();
            $("#cs").remove();
            $(`
                <p id="cs" class="text-center h5">Coming Soon</p>
            `).insertAfter("#select-category");
            $('#comingSoon').modal('show');
            // $('#comingSoonTitle').text('Desain');
        }
    });

    $( ".datepicker" ).datepicker({
        dateFormat: 'yy-mm-dd',
        minDate: new Date(),
    });

});
</script>