<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand d-lg-none d-xl-none" href="#">
            <img src="<?=base_url().'asset/img/logo-nguliyuk.png';?>" height="70" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <a class="d-none d-sm-block navbar-brand" href="#">
                <img src="<?=base_url().'asset/img/logo-nguliyuk.png';?>" height="70" alt="logo">
            </a>
            <div class="navbar-nav before-login">
                <a class="nav-item">
                    <div class="toggle d-inline-block">
                        <input type="checkbox" id="lang" class="check">
                        <b class="b switch"></b>
                        <b class="b track"></b>
                    </div>
                </a>
                <!-- <a href="<?=site_url('language/set/indonesia');?>" class="nav-item lang color-gray">ID</a>
                <a class="nav-item lang color-gray">/</a>
                <a href="<?=site_url('language/set/english');?>" class="nav-item lang color-gray pr-4">ENG</a> -->
                <a data-toggle="modal" class="nav-item color-gray" href="#signinModal"><?=$this->lang->line('menu-4');?></a>
                <a data-toggle="modal" class="nav-item color-red n-join d-inline-block" href="#signupModal"><?=$this->lang->line('menu-5');?></a>
            </div>
        </div>
    </div>
</nav>
<!-- /Navbar -->