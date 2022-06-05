<main role="main" class="col-md-12 ml-sm-auto col-lg-10 px-4 mb-5">

<span class="display-4"><?php echo (isset($mentor_details['id']))?"Edit Mentor":"Add Mentor"; ?></span>
	<?php echo anchor('dashboard_controller/list_mentors', '<i class="fas fa-user"></i> View Mentor\'s List',array("class"=>"btn btn-success float-right")); ?>
	
	<hr />
	<!--------------Container Fluids ----->

	<section class="container">
		<form action="<?php echo base_url() . "dashboard_controller/add_mentor/"; ?>" method="POST">
			<div class="row">
				<div class="form-group col-lg-6 col-12  d-inline-block">
					<label for="first name">Mentor First Name:</label>
					<input type="text" class="form-control" placeholder="Enter Mentor First Name" name="mentor_fname" value="<?php echo isset($mentor_details['fname'])?$mentor_details['fname']:''; ?>">
				</div>

				<div class="form-group col-lg-6 col-12 mx-auto d-inline-block">
					<label for="last name">Mentor Last Name::</label>
					<input type="text" class="form-control" placeholder="Enter Mentor last Name" name="mentor_lname" value="<?php echo isset($mentor_details['lname'])?$mentor_details['lname']:''; ?>">
				</div>
				<div class="form-group col-lg-6 col-12 mx-auto d-inline-block">
					<label for="email">Email:</label>
					<input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo isset($mentor_details['email'])?$mentor_details['email']:''; ?>">
				</div>
				<div class="form-group col-lg-6 col-12 mx-auto d-inline-block">
					<label for="password">Password:</label>
					<input type="password" class="form-control" placeholder="password" name="password" value="<?php echo isset($mentor_details['password'])?$mentor_details['password']:''; ?>">
				</div>
			</div>
			<input type="hidden" name="edit_id" value="<?php echo (isset($mentor_details['id']))?$mentor_details['id']:'' ?>">
			<input type="submit" name="submit" value="<?php echo (isset($mentor_details['id']))?"Edit Mentor":"Add Mentor"; ?>" class="btn btn-primary">
		</form>
	</section>