<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light box-shadow">
    <div class="container-fluid">
        <a class="navbar-brand d-lg-none d-xl-none" href="<?=base_url();?>">
            <img src="<?=base_url().'asset/img/logo.png';?>" height="50" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <a class="d-none d-sm-block navbar-brand" href="<?=base_url();?>">
                <img src="<?=base_url().'asset/img/logo.png';?>" height="50" alt="">
            </a>
            <nav class="nav nav-payment">
                <a class="nav-link" href="#"><span class="text-white">1</span> Detail Pesanan</a>
                <a class="nav-link" href="#"><i class="fa fa-angle-right" style="font-size:1.6rem"></i></a>
                <a class="nav-link color-gray" href="#"><span class="text-white">2</span> Pembayaran</a>
            </nav>
            <div class="navbar-nav">
                <li class="nav-item dropdown avatar">
                    <a class="nav-link dropdown-toggle p-0" href="#" id="menuDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg" width="40" height="40" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="menuDropdown">
                    <?php if($_SESSION['data_session']['type_user'] === 'customer') { ?>
                        <a class="dropdown-item" href="<?=base_url('profile/customer');?>"><?=$this->lang->line('menu-6');?></a>
                    <?php } else if($_SESSION['data_session']['type_user'] === 'mitra'){ ?>
                        <a class="dropdown-item" href="<?=base_url('profile/mitra');?>"><?=$this->lang->line('menu-6');?></a>
                    <?php } ?>
                    <a class="dropdown-item" href="<?= base_url('login/logout'); ?>"><?=$this->lang->line('menu-7');?></a>
                    </div>
                </li>   
            </div>
        </div>
    </div>
</nav>
<!-- /Navbar -->