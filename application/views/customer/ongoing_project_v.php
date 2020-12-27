
<?php $this->load->view('customer/component/navbar_after_login'); ?>

<section class="list-content-profile py-5 px-4" style="min-height: 800px;">
    <div class="container-fluid">
        <div class="row">
            <?php
                if(empty($data_project)){
                    echo "<div class='col-12 col-md-12 py-5 my-3'><h6 class='d-flex justify-content-center color-gray'>Tidak ada proyek aktif!</h6></div>";
                } else {
                
                foreach ($data_project as $key => $valProj) { 
                if($valProj->category == 1) {
            ?>

            <div class="col-6 col-md-4 pb-5">
                <div class="item-submis">
                    <div class="item-submis-head text-white">
                        <div class="item-head-cover cover-design d-flex justify-content-between p-3" style="height: 150px;">
                            <div class="d-flex align-items-start flex-column poppins-medium" style="width: 65%">
                                <h6 class="poppins-black"><?= word_limiter($valProj->post_name,4);?></h6>
                                <span>Luas Tanah: <?=$valProj->area;?> m2 </span>
                                <span>IDR: <?=number_format($valProj->budget,2,",",".");?></span>
                                <span class="mt-auto"><?=$valProj->customer_name;?></span>
                            </div>
                            <div class="d-flex align-items-start flex-column">
                                <h6 class="poppins-black"><i class="fa fa-tag"></i> <?= $valProj->category_name;?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="item-submis-body pt-3 pb-0 px-3 d-flex justify-content-between position-relative">
                        <div class="d-flex align-items-start flex-column">
                            <h6 class="poppins-bold">Daftar Pekerjaan</h6>
                            <ul class="submis-list-doc">
                            <?php 
                                $doc = json_decode($valProj->document, TRUE);
                                foreach ($doc[0] as $key => $valDoc) {
                                    echo '<li><i class="fa fa-check"></i> '.$valDoc.'</li>';
                                } 
                            ?>
                            </ul>
                            <a href="<?=site_url('customer/detail_ongoing_design/'.md5((string)$valProj->id));?>" class="mt-auto mb-3" style="color: #58A6F3;">Lihat selengkapnya...</a>
                        </div>
                        <div class="d-flex align-items-end flex-column">
                            <img src="<?=base_url('uploads/customer/profile/'.$valProj->photo);?>">
                            <h6 class="mt-auto" style="font-size:12px">Durasi: <?=date("d/m/Y", strtotime($valProj->est_date_to));?> - <?=date("d/m/Y", strtotime($valProj->est_date_fr));?></h6>
                        </div>
                    </div>
                    <div class="item-submis-footer text-white poppins-medium">
                        <div class="item-footer-cont footer-design display-inline px-4 py-2 w-50">
                            <span><?=empty($valProj->progress) ? '0%' : $valProj->progress.'%';?> - <?=$valProj->duration.' hari kalender';?></span>
                        </div>
                    </div>
                </div>
            </div>

            <?php } else { ?>

            <div class="col-6 col-md-4 pb-5">
                <div class="item-submis">
                    <div class="item-submis-head text-white">
                        <div class="item-head-cover cover-construct d-flex justify-content-between p-3" style="height: 150px;">
                            <div class="d-flex align-items-start flex-column poppins-medium" style="width: 65%">
                                <h6 class="poppins-black"><?= word_limiter($valProj->post_name,4);?></h6>
                                <span>Luas Tanah: <?=$valProj->area;?> m2 </span>
                                <span>IDR: <?=number_format($valProj->budget,2,",",".");?></span>
                                <span class="mt-auto"><?=$valProj->customer_name;?></span>
                            </div>
                            <div class="d-flex align-items-start flex-column">
                                <h6 class="poppins-black"><i class="fa fa-tag"></i> <?= $valProj->category_name;?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="item-submis-body pt-3 pb-0 px-3 d-flex justify-content-between position-relative">
                        <div class="d-flex align-items-start flex-column">
                            <h6 class="poppins-bold">Daftar Dokumen</h6>
                            <ul class="submis-list-doc">
                                <?php 
                                    $doc = json_decode($valProj->document, TRUE);
                                    $i=0;
                                    foreach ($doc as $key => $valDoc) {
                                        $i++;
                                        echo '<li><i class="fa fa-check"></i> '.character_limiter($valDoc['doc-'.$i], 20).'</li>';
                                        if($i==3){
                                            break;
                                        } 
                                    } 
                                ?>
                            </ul>
                            <a href="<?=site_url('mitra/detail_ongoing_project/'.md5((string)$valProj->id));?>" class="mt-auto mb-3" style="color: #58A6F3;">Lihat selengkapnya...</a>
                        </div>
                        <div class="d-flex align-items-end flex-column">
                            <img src="<?=base_url('uploads/customer/profile/'.$valProj->photo);?>">
                            <h6 class="mt-auto" style="font-size:12px">Durasi: <?=date("d/m/Y", strtotime($valProj->est_date_fr));?> - <?=date("d/m/Y", strtotime($valProj->est_date_to));?></h6>
                            <h6 class="" style="font-size:12px">Serah terima: <?=date("d/m/Y", strtotime($valProj->handover_date));?></h6>
                        </div>
                    </div>
                    <div class="item-submis-footer text-white">
                        <div class="item-footer-cont footer-construct display-inline px-4 py-2 w-75">
                            <span>Minggu ke-11 - <?=$valProj->duration.' hari kalender';?></span>
                        </div>
                    </div>
                </div>
            </div>

            <?php } } } ?>

        </div>
    </div>
</section>


<?php $this->load->view('component/footer'); ?>