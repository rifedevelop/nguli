

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light box-shadow">
    <div class="container-fluid">
        <a class="navbar-brand d-lg-none d-xl-none" href="<?=base_url();?>">
            <img src="<?=base_url().'asset/img/logo-nguliyuk.png';?>" height="70" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <a class="d-none d-sm-block navbar-brand" href="<?=base_url();?>">
                <img src="<?=base_url().'asset/img/logo-nguliyuk.png';?>" height="70" alt="logo">
            </a>
            <div class="navbar-nav nav-mitra">
                <li class="nav-item">
                    <a class="nav-link">
                        <div class="toggle d-inline-block">
                            <input type="checkbox" id="lang" class="check">
                            <b class="b switch"></b>
                            <b class="b track"></b>
                        </div>
                    </a>
                </li>
                <!--<li class="nav-item lang">
                    <a href="<?=site_url('language/set/indonesia');?>" class="nav-link">ID</a>
                </li>
                <li class="nav-item lang">
                    <a class="nav-link">/</a>
                </li>
                <li class="nav-item lang">
                    <a href="<?=site_url('language/set/english');?>" class="nav-link">ENG</a>
                </li>-->
                <!-- <li class="nav-item">
                        <a class="nav-link" href="<?=base_url('mitra/profile');?>"><?=$this->lang->line('menu-6');?></a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="<?=site_url();?>"><?=$this->lang->line('menu-home');?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><?=$this->lang->line('menu-msg');?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=site_url('mitra/certificate');?>"><?=$this->lang->line('menu-cert');?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><?=$this->lang->line('menu-srvc');?></a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#"><?=$this->lang->line('menu-reg-code');?></a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('project');?>"><?=$this->lang->line('menu-3');?></a>
                </li>
                <li class="nav-item dropdown avatar">
                    <a class="nav-link dropdown-toggle  p-0" href="#" id="menuDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php if(empty($_SESSION['data_session']['photo_profile'])) { ?>
                        <img src="<?=base_url("asset/img/profil-pic-dummy.png");?>" width="40" height="40" style="object-fit: cover;" class="rounded-circle">
                    <?php } else { ?>
                        <img src="<?=base_url('uploads/mitra/profile/'.$_SESSION['data_session']['photo_profile']);?>" width="40" height="40" style="object-fit: cover;" class="rounded-circle">
                    <?php } ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="menuDropdown">
                     <a class="dropdown-item" href="<?=base_url('mitra/profile');?>"><?=$this->lang->line('menu-6');?></a>
                     <div class="dropdown-divider"></div>
                        <h3 class="dropdown-header">Proyek Saya</h3>
                            <!-- <a class="dropdown-item" href="<?=base_url('customer/profile');?>">Penawaran Berlangsung</a> -->
                            <a class="dropdown-item" href="<?=site_url('mitra/ongoing_project');?>">Proyek Aktif</a>
                    <div class="dropdown-divider"></div>
                        <h3 class="dropdown-header">Tagihan</h3>
                            <a class="dropdown-item" href="#">Riwayat Proyek</a>
                            <a class="dropdown-item" href="<?=base_url('customer/profile');?>"></a>
                    <a class="dropdown-item" href="<?= base_url('login/logout'); ?>"><?=$this->lang->line('menu-7');?></a>
                    </div>
                </li>   
            </div>
        </div>
    </div>
</nav>
<!-- /Navbar -->