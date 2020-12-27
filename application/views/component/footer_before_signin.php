
<!-- Footer -->
<section class="footer bg-red text-white pt-5 pb-3">
    <div class="container pl-5 pr-5">
        <div class="row footer-menu pb-3 text-left">
            <div class="col">
                <h5 class="poppins-extra-bold"><?=$this->lang->line('f1');?></h5>
                <nav class="nav flex-column pt-4">
                    <a class="mb-2 text-white" href="#"><?=$this->lang->line('f1-subs-1');?></a>
                    <a class="mb-2 text-white" href="#"><?=$this->lang->line('f1-subs-2');?></a>
                    <a class="mb-2 text-white" href="#"><?=$this->lang->line('f1-subs-3');?></a>
                    <a class="mb-2 text-white" href="#"><?=$this->lang->line('f1-subs-4');?></a>
                    <a class="mb-2 text-white" href="#"><?=$this->lang->line('f1-subs-5');?></a>
                </nav>                  
            </div>
            <div class="col">
                <h5 class="poppins-extra-bold"><?=$this->lang->line('f2');?></h5>
                <nav class="nav flex-column pt-4">
                    <a class="mb-2 text-white" href="#"><?=$this->lang->line('f2-subs-1');?></a>
                    <a class="mb-2 text-white" href="#"><?=$this->lang->line('f2-subs-2');?></a>
                    <a class="mb-2 text-white" href="#"><?=$this->lang->line('f2-subs-3');?></a>
                    <a class="mb-2 text-white" href="#"><?=$this->lang->line('f2-subs-4');?></a>
                    <a class="mb-2 text-white" href="#"><?=$this->lang->line('f2-subs-5');?></a>
                </nav> 
            </div>
            <div class="col">
                <h5 class="poppins-extra-bold"><?=$this->lang->line('f3');?></h5>
                <nav class="nav flex-column pt-4">
                    <a class="mb-2 text-white" href="#"><?=$this->lang->line('f3-subs-1');?></a>
                    <a class="mb-2 text-white" href="#"><?=$this->lang->line('f3-subs-2');?></a>
                    <a class="mb-2 text-white" href="#"><?=$this->lang->line('f3-subs-3');?></a>
                </nav> 
            </div>
        </div>
        <div class="row">
            <div class="container d-sm-flex flex-sm-column flex-md-row justify-content-between py-4">
                <div class="mb-sm-5">
                  <div class="copyright">
                    <strong class="h2 poppins-extra-bold align-middle">nguliyuk.com</strong><small class="poppins-regular pl-3">&#9400; 2020 nguliyuk.com All right reserved.</small>
                  </div>
                </div>
                <div class="social-links text-center text-md-right">
                    <a href="#"><i class="fa fa-facebook-square"></i></a>
                    <a href="#"><i class="fa fa-twitter-square"></i></a>
                    <a href="#"><i class="fa fa-linkedin-square"></i></a>
                    <a href="#"><span class=""><?=$this->lang->line('f-lang');?> &bull; <?=$this->lang->line('f-currency');?></span></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Footer -->


<!-- Signup Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <div class="modal-header border-bottom-0">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-title text-center">
                <h6><strong><?=$this->lang->line('signup-title');?></strong></h6>
            </div>
            <nav class="mb-3">
                <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-mitra-tab" data-toggle="tab" href="#nav-mitra" role="tab" aria-controls="nav-home" aria-selected="true">Mitra</a>
                    <a class="nav-item nav-link" id="nav-customer-tab" data-toggle="tab" href="#nav-customer" role="tab" aria-controls="nav-customer" aria-selected="false">Costumer</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-mitra" role="tabpanel" aria-labelledby="nav-mitra-tab">
                    <div class="d-flex flex-column text-center">
                        <?= form_open_multipart('register/insertregismitra', 'method="post" class="needs-validation"'); ?>
                        <div class="form-row">
                            <div class="form-group col-12">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Nama" required>
                            </div>
                            <div class="form-group col-12">
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                            </div>
                            <div class="form-group col-12">
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                            </div>
                            <!-- <div class="form-group">
                                <label for="nik">Upload foto NIK</label>
                                <input type="file" name="nik" class="form-control" id="nik" required>
                            </div>
                            <div class="form-group">
                                <label for="npwp">Upload foto NPWP</label>
                                <input type="file" name="npwp" class="form-control" id="npwp" required>
                            </div> -->
                            <button type="submit" class="btn btn-block bg-red text-white"><?=$this->lang->line('signup-btn');?></button>
                        </div>
                        <?= form_close(); ?>
                        <div class="or-seperator"><i><?=$this->lang->line('or');?></i></div>
                        <div class="social-sign">
                            <a href="#" class="btn btn-block btn-facebook"><i class="fa fa-facebook-square align-middle"></i> <?=$this->lang->line('login-facebook');?></a>
                            <a href="#" class="btn btn-block btn-google"><i class="fa fa-google align-middle"></i> <?=$this->lang->line('login-google');?></a>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-customer" role="tabpanel" aria-labelledby="nav-customer-tab">
                <div class="d-flex flex-column text-center">
                        <?= form_open_multipart('register/insertregiscustomer', 'method="post"'); ?>
                        <div class="form-row">
                            <div class="form-group col-12">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Nama" required>
                            </div>
                            <div class="form-group col-12">
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                            </div>
                            <div class="form-group col-12">
                                <input type="text" name="hp" class="form-control" id="hp" placeholder="Nomor Hp" required>
                            </div>
                            <div class="form-group col-12">
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                            </div>
                            <!-- <div class="form-group">
                                <label for="nik">Upload foto NIK</label>
                                <input type="file" name="nik" class="form-control" id="nik" required>
                            </div>
                            <div class="form-group">
                                <label for="npwp">Upload foto NPWP</label>
                                <input type="file" name="npwp" class="form-control" id="npwp" required>
                            </div> -->
                            
                            <button type="submit" class="btn btn-block bg-red text-white"><?=$this->lang->line('signup-btn');?></button>
                        </div>
                        <?= form_close(); ?>
                        <div class="or-seperator"><i><?=$this->lang->line('or');?></i></div>
                        <div class="social-sign">
                            <a href="#" class="btn btn-block btn-facebook"><i class="fa fa-facebook-square align-middle"></i> <?=$this->lang->line('login-facebook');?></a>
                            <a href="#" class="btn btn-block btn-google"><i class="fa fa-google align-middle"></i> <?=$this->lang->line('login-google');?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer d-flex justify-content-center">
            <div class="signup-section"><?=$this->lang->line('h-account');?> <a href="#" class="color-red to-sign"> <?=$this->lang->line('login-btn');?></a>.</div>
        </div>
      </div>
    </div>
</div>
<!-- End Signup Modal -->

<!-- Forgot Password Modal -->
<div class="modal fade" id="forgotModal" tabindex="-1" role="dialog" aria-labelledby="forgotModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <div class="modal-header border-bottom-0">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
            <div class="form-title text-center">
                <h6><strong><?=$this->lang->line('forgot');?></strong></h6>
            </div>
            <nav class="mb-3">
                <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-mitraForgot-tab" data-toggle="tab" href="#nav-mitraForgot" role="tab" aria-controls="nav-mitraForgot" aria-selected="true">Mitra</a>
                    <a class="nav-item nav-link" id="nav-customerForgot-tab" data-toggle="tab" href="#nav-customerForgot" role="tab" aria-controls="nav-customerForgot" aria-selected="false">Customer</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-mitraForgot" role="tabpanel" aria-labelledby="nav-mitraForgot-tab">
                    <?= form_open('forgot/insForgotMitra', 'class="needs-validation"'); ?>
                        <div class="form-row">
                            <div class="form-group col-12">
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>
                            <button type="submit" class="btn btn-block bg-red text-white">Submit</button>
                        </div>
                    <?= form_close(); ?>
                </div>
                <div class="tab-pane fade" id="nav-customerForgot" role="tabpanel" aria-labelledby="nav-Forgot-tab">
                    <?= form_open('forgot/insForgotCustomer', 'class="needs-validation"'); ?>
                        <div class="form-row">
                            <div class="form-group col-12">
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>
                            <button type="submit" class="btn btn-block bg-red text-white">Submit</button>
                        </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>

        <div class="modal-footer d-flex justify-content-center">
            <div class="signup-section"><?=$this->lang->line('h-account');?> <a href="#" class="color-red to-sign"> <?=$this->lang->line('login-btn');?></a>.</div>
        </div>

      </div>
    </div>
</div>
<!-- End Forgot Password Modal -->

<!-- Signin Modal -->
<div class="modal fade" id="signinModal" tabindex="-1" role="dialog" aria-labelledby="signinModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-title text-center">
                    <h6><strong><?=$this->lang->line('login-title');?></strong></h6>
                </div>
                <nav class="mb-3">
                    <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-mitraSignin-tab" data-toggle="tab" href="#nav-mitraSignin" role="tab" aria-controls="nav-mitraSignin" aria-selected="true">Mitra</a>
                        <a class="nav-item nav-link" id="nav-customerSignin-tab" data-toggle="tab" href="#nav-customerSignin" role="tab" aria-controls="nav-customerSignin" aria-selected="false">Customer</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-mitraSignin" role="tabpanel" aria-labelledby="nav-mitraSignin-tab">
                        <div class="d-flex flex-column text-center">
                            <?= form_open('login/authmitra', 'method="post" class="needs-validation" accept-charset="utf-8"'); ?>
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                                </div>
                                <div class="form-group col-12">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                                </div>
                                <button type="submit" class="btn btn-block bg-red text-white"><?=$this->lang->line('login-btn');?></button>
                                <div class="col-12 clearfix pt-3">
                                    <label class="pull-left checkbox-inline color-gray align-middle"><input type="checkbox"> <?=$this->lang->line('remember');?></label>
                                    <a href="javascript:void(0)" class="pull-right color-red to-forgot"><?=$this->lang->line('forgot');?></a>
                                </div>  
                            </div>
                            <?= form_close(); ?>
                            <div class="or-seperator"><i><?=$this->lang->line('or');?></i></div>
                            <div class="social-sign">
                                <a href="#" class="btn btn-block btn-facebook"><i class="fa fa-facebook-square align-middle"></i> <?=$this->lang->line('login-facebook');?></a>
                                <a href="#" class="btn btn-block btn-google"><i class="fa fa-google align-middle"></i> <?=$this->lang->line('login-google');?></a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-customerSignin" role="tabpanel" aria-labelledby="nav-customerSignin-tab">
                        <div class="d-flex flex-column text-center">
                            <?= form_open('login/authcustomer', 'method="post" class="needs-validation" accept-charset="utf-8"'); ?>
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                                </div>
                                <div class="form-group col-12">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                                </div>

                                <button type="submit" class="btn btn-block bg-red text-white"><?=$this->lang->line('login-btn');?></button>
                                <div class="col-12 clearfix pt-3">
                                    <label class="pull-left checkbox-inline color-gray align-middle"><input type="checkbox"> <?=$this->lang->line('remember');?></label>
                                    <a href="javascript:void(0)" class="pull-right color-red to-forgot"><?=$this->lang->line('forgot');?></a>
                                </div>  
                            </div>
                            <?= form_close(); ?>
                            <div class="or-seperator"><i>atau</i></div>
                            <div class="social-sign">
                                <a href="#" class="btn btn-block btn-facebook"><i class="fa fa-facebook-square align-middle"></i> <?=$this->lang->line('login-facebook');?></a>
                                <a href="#" class="btn btn-block btn-google"><i class="fa fa-google align-middle"></i> <?=$this->lang->line('login-google');?></a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        <div class="modal-footer d-flex justify-content-center">
            <div class="signup-section"><?=$this->lang->line('d-h-account');?> <a href="#" class="color-red to-join"> <?=$this->lang->line('signup-btn');?></a>.</div>
        </div>
    </div>
</div>
<!-- End Signin Modal -->


<script type="text/javascript">
    // Goto Signup
    $(".to-join").on( "click", function() {
        $('#signinModal').modal('hide'); 
        $('#forgotModal').modal('hide'); 
        $('#signupModal').modal('show');   
    });
    // Goto Forgot
    $(".to-forgot").on( "click", function() {
        $('#signupModal').modal('hide'); 
        $('#signinModal').modal('hide'); 
        $('#forgotModal').modal('show');   
    });
    // Goto Signin
    $(".to-sign").on( "click", function() {
        $('#signupModal').modal('hide'); 
        $('#forgotModal').modal('hide'); 
        $('#signinModal').modal('show');   
    });
</script>