
<!-- Nav Bar Login Session -->
<?php $this->load->view('customer/component/navbar_payment'); ?>
<!-- End Nav Bar Login Session -->

<div id="payment" class="py-5">
    <div class="container-fluid">
        <div class="row px-5">

            <div class="col-md-8">

            	<div class="row">
	            	<div class="col-md-4">
	                    <img src="<?=base_url('uploads/customer/post/').$image->img;?>" class="w-100" style="object-fit: cover;height:200px">
	            	</div>
	            	<div class="col-md-8">
	            		<h4 class="poppins-extra-bold mr-auto"><?=$post->name;?></h4>
	            		<!-- <p class="h6">Nilai Project : IDR 2.500.000</p> -->
	            	</div>
            	</div>

            </div>

            <div class="col-md-4">
                <div class="border border-secondary rounded" style="background:#E6EEF7;">
                    <div class="row px-4 py-4 pb-5 mb-3">
                        <div class="col-md-12">
                            <h5 class="poppins-extra-bold pt-3 mb-5">Ringkasan Pembelian</h5>
                            <div class="d-flex justify-content-between">
                                <p>Subtotal</p>
                                <p>IDR <?= number_format($subtotal,0,",",".");?></p>
                            </div>
                            <!-- <div class="d-flex justify-content-between">
                                <p>PPN</p>
                                <p>IDR </p>
                            </div> -->
                            <hr>
                            <div class="d-flex justify-content-between">
                                <p>Total</p>
                                <p>IDR <?= number_format($subtotal,0,",",".");?></p>
                            </div>
                        </div>
                        <div class="col-md-12 text-center mt-3">
                            <a href="<?=site_url('payment_post/method');?>" id="btn-submit" class="btn bg-red text-white px-4 py-2" style="font-size:.9rem">PESAN SEKARANG</a>
                            <!-- <form action='payment/method'>
                            <input type="hidden" name="project_id" value="<?=$project->id;?>">
                            <button type="submit" id="btn-submit" class="btn bg-red text-white px-4 py-2" style="font-size:.9rem">PESAN SEKARANG</button>
                            </form> -->
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

<script type="text/javascript">
    $( ".nav-payment a" ).first().addClass( " active" );
</script>