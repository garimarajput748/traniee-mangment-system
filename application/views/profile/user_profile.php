<?php if (!$this->session->has_userdata('email'))  redirect(); ?>
<main role="main" class="col-md-12 ml-sm-auto col-lg-10 px-4">

	<?php

	$email = $this->session->userdata('email');
	$id = $this->session->userdata('id');
	$fname = $this->session->userdata('fname');
	$lname = $this->session->userdata('lname');
	$user_type = $this->session->userdata('user_type');


	?>

	<section class="container">
		<div class="row">
			<div class="col-xl-3 col-md-12">
				<div class="card p-2" style="border: 0px;">
					<img src="<?php if (!empty($user_data)) {
									echo base_url() . 'assets/img/profile_pics/' . $user_data[0]['uni_pic'];
								} ?>" class="card-img">
				</div>
				<form action="<?php echo base_url() . 'dashboard_controller/uni_image/'; ?>" method="POST" enctype="multipart/form-data">
					<div class="card p-2" style="border: 0px;">
						<input type="file" name="uni_pic">
						<input type="submit" name="img_update" style="border-radius:0px;" value="Upload Image" class="btn btn-block btn-primary mt-2">
				</form>
				<a href="<?php echo base_url() . 'dashboard_controller/admin_dashboard'; ?>" name="stu_update" style="border-radius:0px;" class="btn btn-block btn-dark mt-2">Update Details</a>
			</div>
		</div>
		<div class="col-1"></div>
		<div class="col-8 p-2">

			<div class="row mt-1">
				<div class="col-md-6">
					<div class="col-md-12">
						<h4 class="fw-20"><b>First Name</b></h4>
					</div>
					<div class="col-md-12">
						<p class="fw-100"><?php if (!empty($fname)) {
												echo $fname;
											}  ?></p>
					</div>
				</div>
				<div class="col-md-6">
					<div class="col-md-12">
						<h4 class="fw-20"><b>Last Name</b></h4>
					</div>
					<div class="col-md-12">
						<p class="fw-100"><?php if (!empty($lname)) {
												echo $lname;
											}  ?></p>
					</div>
				</div>
			</div>

			<div class="row mt-1">
				<div class="col-md-6">
					<div class="col-md-12">
						<h4 class="fw-20"><b>Email</b></h4>
					</div>
					<div class="col-md-12">
						<p class="fw-100"><?php if (!empty($email)) {
												echo $email;
											}  ?></p>
					</div>
				</div>
			</div>

		</div>
	</section>