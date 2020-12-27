
<!-- Navbar -->
<?php 
    if($this->session->userdata('data_session') == null)
    {
        $this->load->view('component/navbar');
    } else {
        $this->load->view('component/navbar_after_login');
    }
?>
<!-- End Navbar -->

<!-- Main -->
<div class="pt-5 pb-5 bg-white">
    <div class="w-100 px-3 px-md-5">
        <div class="row">

            <div class="col-md-4 pr-sm-5">
                <div class="row">

                    <div class="col-md-12 mb-5">
                        <div class="border border-secondary p-4 d-flex flex-column align-items-start">
                            <h5 class="poppins-bold mb-5"><b>Filter Proyek</b></h5>
                            <div class="pb-4">
                                <h5 class="poppins-bold">Tipe Proyek</h5>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                    Honorer
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                    <label class="form-check-label" for="exampleRadios2">
                                    Permanen
                                    </label>
                                </div>
                            </div>
                            
                            <div class="pb-3">
                                <h5 class="poppins-bold">Harga</h5>
                                <form>
                                    <div class="form-group">
                                    <label for="formControlRange">Example Range input</label>
                                    <input type="range" class="form-control-range" id="formControlRange">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <?php if($_SESSION['data_session']['type_user'] === 'customer') 
                    echo '<div class="col-md-12 text-center">
                        <a href="'.site_url('customer/form_project').'" class="btn-floating bg-red text-white px-4 py-3" style="font-size:1.3rem;border-radius:2rem"><i class="fa fa-plus-circle align-self-center pr-2" aria-hidden="true"></i>Buat Proyek Baru</a>
                    </div>';
                    ?>
                </div>
            </div>

            <div class="col-md-8 pt-2">
                <div class="border border-bottom-0 border-secondary py-3 px-4">
                    <div class="row">
                        <div class="col-md-7 d-flex flex-row align-items-center">
                            <div class="input-group w-75 pr-2 mb-3 mb-md-0">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-transparent" id="search" style="border-radius: 15px 0 0 15px"><i class="fa fa-search" aria-hidden="true"></i></span>
                                </div>
                                <input type="text" class="form-control border-left-0"  style="border-radius: 0 15px 15px 0" placeholder="Cari Pekerjaan" aria-label="search" aria-describedby="search">
                            </div>
                            <span><?= $total;?> hasil</span>
                        </div>
                        <div class="col-md-5 d-flex align-items-center justify-content-end">
                            <span>Filter Berdasarkan: <span class="color-red">Harga Tinggi</span></span>
                        </div>
                    </div>
                </div>

                <div class="border border-bottom-0 border-secondary">
                    <?php if($listPost == null)  { 
                    	 echo '<h6 class="text-center pt-3">No Project!!!</h6>';
                    	} else {
                    	foreach($listPost as $key => $val) { 
                    ?>
                    <div class="border-bottom border-secondary mb-3 mt-3 p-4">
                        <div class="media flex-column flex-sm-row">
                            <img src="<?=base_url('asset/img/project-list.png');?>" class="img-fluid mr-3" style="height:1.5rem">
                            <div class="media-body">
                                <a href="<?=base_url('project/detail?id='.md5((string)$val->id_post));?>">
                                    <h5 class="poppins-bold mt-0">
                                        <?= 
                                            $val->post_name;
                                        // empty($val->category_id) ? $val->category_en : $val->category_id;
                                        ?>
                                    </h5>
                                </a>
                                <h6><?=$val->name;?></h6>
                                <p class="color-gray"><?=$val->description;?></p>
                                <ul class="list-unstyled">
                                    <li><i class="fa fa-clock-o" style="font-size:1.3rem"></i> <span class="color-red mx-2">Tutup Tender</span> 
                                        <?php
                                            echo $val->selisih.' hari lagi';
                                            // $dateNow = date_create(date("Y-m-d"));
                                            // $dateTo = date_create($val->est_date_to);
                                            // $diff = date_diff($dateNow,$dateTo);
                                            // echo $diff->days.' hari lagi';
                                        ?>
                                    </li>
                                </ul>
                            </div>
                            <span class="d-flex flex-row flex-sm-column align-self-start ml-3 text-right" style="font-size:25px;">
                                <h5><?=number_format($val->budget_min, 0, '', '.');?>-<?=number_format($val->budget_max, 0, '', '.');?> </h5>
                                <h5>IDR</h5>
                            </span>
                        </div>
                        <div class="d-flex flex-row-reverse">
                            <div class="btn bg-green text-white"><?= empty($val->category_id) ? $val->category_en : $val->category_id;?></div>
                        </div>
                    </div>
                    <?php } } ?>

                    <div class="border-bottom border-secondary mb-3 mt-3 p-4">
                        <div class="row">
                            <div class="col-md-6 d-flex flex-sm-row">
                               <!-- <?php echo $link; ?> -->
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End Main -->

<!-- Footer -->
<?php $this->load->view('component/footer'); ?>
<!-- End Footer -->