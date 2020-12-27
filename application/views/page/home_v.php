
<!-- Navbar -->
<?php 
    if($this->session->userdata('data_session') == null)
    {
        $this->load->view('component/navbar');
    } else {
        if($_SESSION['data_session']['type_user'] === 'customer')
        {
            $this->load->view('customer/component/navbar_after_login');
        } else {
            $this->load->view('mitra/component/navbar_after_login');
        }
    }
?>
<!-- End Navbar -->

<!-- Slider -->
<section class="banner position-relative">
    <div class="container-fluid">
        <div class="row">
            <div class="col b-search">
                <p><?=$this->lang->line('banner-text');?></p>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-white"><i class="fa fa-search"></i></span>
                    </div>
                    <input type="text" class="form-control pl-4 py-3" placeholder="Coba &quot;Design Interior&quot;">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary px-5" style="background-color:#009923;color:#ffffff;border-radius:0px 15px 15px 0px;" type="button">Cari</button>
                    </div>
                </div>
            </div>
            <div class="col b-slide text-center">
                <img src="asset/img/slide.png" alt="">
            </div>
        </div>
    </div>
    <img src="asset/img/bg-slider.png" class="bg-slider" alt="">
</section>
<!-- /Slider -->

<!-- Carousel -->
<section class="carousel pt-5 pb-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <h4 class="poppins-extra-bold"><?=$this->lang->line('carousel-text');?></h4>
                
            </div>
        </div>
        <div class="row">
            <div class="col-12 pl-5 pr-5">
                <div class="row carousel-slick">
                    <div style="background-image:url('asset/img/bg-carousel-1.png');" class="col bg-carousel d-flex align-items-center justify-content-center rounded text-white">
                        <h3>Desain Interior</h3>
                    </div>
                    <div style="background-image:url('asset/img/bg-carousel-2.png');" class="col bg-carousel d-flex align-items-center justify-content-center rounded text-white">
                        <h3>Desain Interior</h3>
                    </div>
                    <div style="background-image:url('asset/img/bg-carousel-3.png');" class="col bg-carousel d-flex align-items-center justify-content-center rounded text-white">
                        <h3>Desain Interior</h3>
                    </div>
                    <div style="background-image:url('asset/img/bg-carousel-4.png');" class="col bg-carousel d-flex align-items-center justify-content-center rounded text-white">
                        <h3>Desain Interior</h3>
                    </div>
                    <div style="background-image:url('asset/img/bg-carousel-4.png');" class="col bg-carousel d-flex align-items-center justify-content-center rounded text-white">
                        <h3>Desain Interior</h3>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="#" class="btn btn-lg bg-red text-white rounded pt-3 pb-3 pl-5 pr-5"><?=$this->lang->line('view-btn');?></a>
            </div>
        </div>
    </div>
</section>
<!-- End Carousel -->

<!-- Procedure -->
<section class="procedure pt-5 pb-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <h4 class="poppins-extra-bold"><?=$this->lang->line('procedure-text');?></h4>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-4 p-5">
                <img src="asset/img/progress-1.png" class="img-fluid" alt="">
                <h5 class="procedure-title mt-4"><?=$this->lang->line('p-subs-1');?></h5>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod.</p>
            </div>
            <div class="col-md-4 p-5">
                <img src="asset/img/progress-2.png" class="img-fluid" alt="">
                <h5 class="procedure-title mt-4"><?=$this->lang->line('p-subs-2');?></h5>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod.</p>
            </div>
            <div class="col-md-4 p-5">
                <img src="asset/img/progress-3.png" class="img-fluid" alt="">
                <h5 class="procedure-title mt-4"><?=$this->lang->line('p-subs-3');?></h5>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod.</p>
            </div>
        </div>
    </div>
</section>
<!-- End Procedure -->

<!-- Why -->
<section class="why pt-5 pb-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <h4 class="poppins-extra-bold"><?=$this->lang->line('why-text');?></h4>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-4 p-5">
                <img src="asset/img/service.png" class="img-fluid" alt="">
                <h4 class="pt-3 pb-5"><?=$this->lang->line('w-subs-1');?></h4>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod.</p>
            </div>
            <div class="col-md-4 p-5">
                <img src="asset/img/secure.png" class="img-fluid" alt="">
                <h4 class="pt-3 pb-5"><?=$this->lang->line('w-subs-2');?></h4>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod.</p>
            </div>
            <div class="col-md-4 p-5">
                <img src="asset/img/monitoring.png" class="img-fluid" alt="">
                <h4 class="pt-3 pb-3"><?=$this->lang->line('w-subs-3');?></h4>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod.</p>
            </div>
        </div>
    </div>
</section>
<!-- End Why -->

<!-- How -->
<section class="how pt-5 pb-5">
    <div class="container">
        <div class="row pb-5">
            <div class="col-md-12 text-center">
                <h4 class="poppins-extra-bold"><?=$this->lang->line('how-text');?></h4>
            </div>
        </div>
        <div class="row pt-5 text-center">
            <span class="line"></span>
            <div class="col-md-6 position-relative">
                <img src="asset/img/quotes-top.png" class="quotes-top">
                <img src="asset/img/how-1.png" alt="Review">
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod.</p>
                <b class="poppins-bold">Armand, Arsitek</b>
                <img src="asset/img/quotes-bottom.png" class="quotes-bottom">
            </div>
            <div class="col-md-6 position-relative">
                <img src="asset/img/quotes-top.png" class="quotes-top">
                <img src="asset/img/how-2.png" alt="Review">
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod.</p>
                <b class="poppins-bold">John, CEO of Company</b>
                <img src="asset/img/quotes-bottom.png" class="quotes-bottom">
            </div>
        </div>
    </div>
</section>
<!-- How -->

<!-- Start Search-->
<section class="start-search bg-white pt-5 pb-5">
    <div class="container">
        <div class="row pb-5">
            <div class="col-md-12 text-center">
                <h4 class="poppins-extra-bold"><?=$this->lang->line('service-text');?></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="#" class="btn btn-lg bg-red text-white rounded pt-3 pb-3 pl-5 pr-5"><?=$this->lang->line('search-btn');?></a>
            </div>
        </div>
    </div>
</section>
<!-- End Start Search-->

<?php $this->load->view('component/footer_before_signin'); ?>
