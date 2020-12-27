
<!-- Navbar login -->
<?php $this->load->view('customer/component/navbar_after_login'); ?>
<!-- End Navbar login -->

<!-- Profile Header -->
<?php $this->load->view('customer/component/profile_customer_header'); ?>
<!-- End Profile Header -->

<div class="active-project px-5 my-5">
	<div class="container-fluid">
		<div class="row my-3">
			<div class="col-12">
				<a href="<?=site_url('customer/profile');?>">
					<h4 class="color-red poppins-bold"><i class="fa fa-arrow-left mr-3 text-body" aria-hidden="true"></i> Proyek Aktif</h4>
				</a>
			</div>
		</div>
		<?php
            if(empty($data_project)){
                echo "<div class='col-12 col-md-12 py-5 my-3'><h6 class='d-flex justify-content-center color-gray'>Tidak ada proyek aktif!</h6></div>";
            } else {
            
            foreach ($data_project as $key => $valProj) { 
            // if($valProj->category == 1) {
        ?>
		<div class="row my-5 font-size-13">
			
			<div class="col-md-9">
				<div class="d-flex justify-content-start shadow rounded p-3 h-100">
					<div>
						<img class="align-self-center mr-5 rounded-circle" style="width:50px;object-fit:cover" src="<?=base_url("asset/img/profil-pic-dummy.png");?>">
					</div>
					<!-- <div class="d-flex flex-column pr-5">
						<span class="color-gray mb-2">ID</span>
						<span>123</span>
					</div> -->
					<div class="d-flex flex-column pr-5" style="width: 35%">
						<span class="color-gray mb-2">Judul</span>
						<span><?= word_limiter($valProj->post_name,5);?></span>
					</div>
					<div class="d-flex flex-column pr-5" style="width: 13.5%">
						<span class="color-gray mb-2">Jenis</span>
						<span><?= $valProj->category_name;?></span>
					</div>
					<?php if(!empty($valProj->pj_date_fr)){ ?>
					<div class="d-flex flex-column pr-5">
						<span class="color-gray mb-2">Mulai</span>
						<span><?=date("M, d Y", strtotime($valProj->pj_date_fr));?></span>
					</div>
					<?php } ?>
					<div class="d-flex flex-column">
						<span class="color-gray mb-2">Berakhir</span>
						<span><?=date("M, d Y", strtotime($valProj->est_date_to));?></span>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="d-flex justify-content-between shadow rounded p-3 h-100">
					<div class="d-flex flex-column w-75" style="height: 2.3rem">
						<span class="color-gray mb-2">Progres</span>
						<div class="progress">
						  <div class="progress-bar bg-success" role="progressbar" style="width: <?=empty($valProj->progress) ? '0%' : $valProj->progress.'%';?>" aria-valuenow="<?=empty($valProj->progress) ? '0' : $valProj->progress.'%';?>" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
					</div>
					<div class="d-flex align-items-center align-content-center">
						<h5 class="font-weight-bold"><?=empty($valProj->progress) ? '0%' : $valProj->progress.'%';?></h5>
					</div>
				</div>
			</div>

		</div>
		<?php } } ?>

	</div>
</div>

<?php $this->load->view('component/footer'); ?>