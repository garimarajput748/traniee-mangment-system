<main role="main" class="col-md-12 ml-sm-auto col-lg-10 px-4 mb-5">

<span class="display-4"><?php echo (isset($trainor_details['id']))?"Edit Trainor":"Add Trainor"; ?></span>
	<?php echo anchor('dashboard_controller/list_trainors', '<i class="fas fa-user"></i> View Trainor\'s List',array("class"=>"btn btn-success float-right")); ?>
	
	<hr />
	<!--------------Container Fluids ----->

	<section class="container">
		<form action="<?php echo base_url() . "dashboard_controller/add_trainor/"; ?>" method="POST">
			<div class="row">
				<div class="form-group col-lg-6 col-12  d-inline-block">
					<label for="first name">Trainor First Name:</label>
					<input type="text" class="form-control" placeholder="Enter trainor First Name" name="trainor_fname" value="<?php echo isset($trainor_details['fname'])?$trainor_details['fname']:''; ?>">
				</div>

				<div class="form-group col-lg-6 col-12 mx-auto d-inline-block">
					<label for="last name">Trainor Last Name::</label>
					<input type="text" class="form-control" placeholder="Enter trainor last Name" name="trainor_lname" value="<?php echo isset($trainor_details['lname'])?$trainor_details['lname']:''; ?>">
				</div>
				<div class="form-group col-lg-6 col-12 mx-auto d-inline-block">
					<label for="email">Email:</label>
					<input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo isset($trainor_details['email'])?$trainor_details['email']:''; ?>">
				</div>
				<div class="form-group col-lg-6 col-12 mx-auto d-inline-block">
					<label for="password">Password:</label>
					<input type="password" class="form-control" placeholder="password" name="password" value="<?php echo isset($trainor_details['password'])?$trainor_details['password']:''; ?>">
				</div>
			</div>
			<input type="hidden" name="edit_id" value="<?php echo (isset($trainor_details['id']))?$trainor_details['id']:'' ?>">
			<input type="submit" name="submit" value="<?php echo (isset($trainor_details['id']))?"Edit Trainor":"Add Trainor"; ?>" class="btn btn-primary">
		</form>
	</section>