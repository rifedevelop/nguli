
<?php if($_SESSION['data_session']['type_user'] === 'customer') { ?>

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
            <div class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link">
                        <div class="toggle d-inline-block">
                            <input type="checkbox" id="lang" class="check">
                            <b class="b switch"></b>
                            <b class="b track"></b>
                        </div>
                    </a>
                </li>
                <!-- <li class="nav-item lang">
                    <a href="<?=site_url('language/set/indonesia');?>" class="nav-link">ID</a>
                </li>
                <li class="nav-item lang">
                    <a class="nav-link">/</a>
                </li>
                <li class="nav-item lang">
                    <a href="<?=site_url('language/set/english');?>" class="nav-link">ENG</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('customer/profile');?>"><?=$this->lang->line('menu-1');?></a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" href="#"><?=$this->lang->line('menu-2');?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('project');?>"><?=$this->lang->line('menu-3');?></a>
                </li>
                <!-- <li class="nav-item avatar">
                    <a class="nav-link p-0" href="#">
                      <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg" class="rounded-circle z-depth-0"
                        alt="avatar image" height="35">
                    </a>
                </li> -->
                <li class="nav-item dropdown avatar">
                    <a class="nav-link dropdown-toggle  p-0" href="#" id="menuDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php if(empty($_SESSION['data_session']['photo_profile'])) { ?>
                        <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg" width="40" height="40" class="rounded-circle">
                    <?php } else { ?>
                        <img src="<?=base_url('uploads/customer/profile/'.$_SESSION['data_session']['photo_profile']);?>" width="40" height="40" class="rounded-circle">
                    <?php } ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="menuDropdown">
                        <a class="dropdown-item" href="<?=base_url('customer/profile');?>"><?=$this->lang->line('menu-6');?></a>
                        <a class="dropdown-item" href="<?= base_url('login/logout'); ?>"><?=$this->lang->line('menu-7');?></a>
                    </div>
                </li>   
            </div>
        </div>
    </div>
</nav>
<!-- /Navbar -->

<?php } else if($_SESSION['data_session']['type_user'] === 'mitra'){ ?>
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
            <div class="navbar-nav">
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
                <li class="nav-item">
                        <a class="nav-link" href="<?=base_url('mitra/profile');?>"><?=$this->lang->line('menu-6');?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="modal" href="#"><?=$this->lang->line('menu-2');?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=base_url('project');?>"><?=$this->lang->line('menu-3');?></a>
                </li>
                <!-- <li class="nav-item avatar">
                    <a class="nav-link p-0" href="#">
                      <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg" class="rounded-circle z-depth-0"
                        alt="avatar image" height="35">
                    </a>
                </li> -->
                <li class="nav-item dropdown avatar">
                    <a class="nav-link dropdown-toggle  p-0" href="#" id="menuDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php if(empty($_SESSION['data_session']['photo_profile'])) { ?>
                        <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg" width="40" height="40" class="rounded-circle">
                    <?php } else { ?>
                        <img src="<?=base_url('uploads/customer/profile/'.$_SESSION['data_session']['photo_profile']);?>" width="40" height="40" class="rounded-circle">
                    <?php } ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="menuDropdown">
                     <a class="dropdown-item" href="<?=base_url('mitra/profile');?>"><?=$this->lang->line('menu-6');?></a>
                    <a class="dropdown-item" href="<?= base_url('login/logout'); ?>"><?=$this->lang->line('menu-7');?></a>
                    </div>
                </li>   
            </div>
        </div>
    </div>
</nav>
<!-- /Navbar -->
<?php } ?>