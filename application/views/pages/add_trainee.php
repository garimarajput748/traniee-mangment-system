<main role="main" class="col-md-12 ml-sm-auto col-lg-10 px-4 mb-5">
	<span class="display-4"><?php echo (isset($trainee_details['id']))?"Edit Trainee":"Add Trainee"; ?></span>
	<?php echo anchor('dashboard_controller/list_trainee', '<i class="fas fa-user"></i> View Trainee\'s List',array("class"=>"btn btn-success float-right")); ?>
	
	<hr />
	<!--------------Container Fluids ----->

	<section class="container">
		<form action="<?php echo base_url() . "dashboard_controller/add_trainee/"; ?>" method="POST">
			<div class="row">
				<div class="form-group col-lg-6 col-12  d-inline-block">
					<label for="Full Name"> Trainee Name:</label>
					<input type="text" class="form-control" placeholder="Enter Trainee name" name="trainee_name" value="<?php if(isset($trainee_details['name'])) echo $trainee_details['name'] ?>">
				</div>

				<div class="form-group col-lg-6 col-12 mx-auto d-inline-block">
					<label for="email">Email:</label>
					<input type="email" class="form-control" placeholder="Email" name="email" value="<?php if(isset($trainee_details['email'])) echo $trainee_details['email'] ?>">
				</div>
			</div>
			<input type="hidden" name="edit_id" value="<?php echo (isset($trainee_details['id']))?$trainee_details['id']:'' ?>">
			<input type="submit" name="submit" value="<?php echo (isset($trainee_details['id']))?"Edit Trainee":"Add Trainee"; ?>" class="btn btn-primary">
		</form>
	</section>