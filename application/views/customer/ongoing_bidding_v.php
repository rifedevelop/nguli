
<?php $this->load->view('customer/component/navbar_after_login'); ?>


<div class="list-content-profile px-3 my-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-12">         
                 
                <div class="table-responsive">
                    <table class="table text-center table-borderless">
                        <tbody>
                        <?php 
                        if(empty($dataBid)){
                            echo "<div class='col-12 col-md-12 py-5 my-3'><h6 class='d-flex justify-content-center color-gray'>Tidak ada penawaran!</h6></div>";
                        } else {
                            foreach ($dataBid as $key => $val) : ?>
                                <tr class="mb-3 shadow-sm bg-white">
                                    <td class="align-middle"><i class="fa fa-bars align-items-center" style="font-size:2rem;"></i></td>
                                    <td class="">
                                        <div class="d-flex align-items-center justify-content-start">
                                            <i class="fa fa-briefcase color-red align-middle ml-3 mr-3" style="font-size:2rem;"></i> 
                                            <div class="d-flex flex-column align-self-center justify-content-start text-left">
                                                <p class="h6 font-weight-bold m-0"><?=$val->post_name;?></p>
                                                <p class="m-0"><?=$val->countbid;?> Request Bid</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <a href="<?=site_url('customer/ongoing_bidding_detail?id='.md5((string)$val->id_post));?>" class="btn bg-red text-white" style="border-radius: 1.5rem;padding: 3px 25px">Lihat Detail</a>
                                    </td>
                                </tr>
                        <?php endforeach; } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>


<?php $this->load->view('component/footer'); ?>