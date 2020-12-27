
<?php $this->load->view('component/navbar'); ?>

<div class="container">
	<div class="row">
		<div class="col-md-5 mx-auto my-5">
			<h3 class="mb-5 text-center">Reset Password</h3>
			<?= form_open('forgot/savePasswordMitra'); ?>
			  <div class="form-group">
			    <label for="resetPassword">Password Baru</label>
			    <input type="password" name="password" class="form-control" id="resetPassword" aria-describedby="emailHelp" placeholder="Masukan password baru">
			    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
			  </div>
			  <div class="form-group">
			    <label for="confirm-password">Konfirmasi Password</label>
			    <input type="password" name="confirm_password" class="form-control" id="confirm-password" placeholder="Masukan ulang password">
			  </div>
			  <input type="hidden" name="id" value="<?= md5((string)$this->session->tempdata('id'));?>">
			  <button type="submit" class="btn bg-red float-right text-white">Submit</button>
			<?= form_close(); ?>
		</div>
	</div>
</div>

<?php $this->load->view('component/footer'); ?>