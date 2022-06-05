<?php if (!$this->session->has_userdata('email'))  redirect(); ?>
<main role="main" class="col-md-12 ml-sm-auto col-lg-10 px-4 mb-5">

  <h4>Welcome, <?php echo $this->session->userdata('fname') . " " . $this->session->userdata('lname'); ?></h4>
  <hr>
  <!--------------Container Fluids ----->

  <section class="container">
    <div class="row mb-3">
      <div class="col-xl-3 col-sm-6 py-2">
        <div class="card bg-info text-white h-100">
          <a class="text-white" href="<?php echo base_url().'dashboard_controller/list_trainee'; ?>" style="text-decoration: none;">
            <div class="card-body bg-info">
              <div class="rotate">
                <i class="fa fa-users fa-4x"></i>
              </div>
              <h6 class="text-uppercase">Total Trainee's</h6>
              <h1 class="display-4"><?php echo 10 ?></h1>
            </div>
        </div>
        </a>
      </div>
      <div class="col-xl-3 col-sm-6 py-2">
        <div class="card bg-info text-white h-100">
          <a class="text-white" href="<?php echo base_url().'dashboard_controller/list_mentors'; ?>" style="text-decoration: none;">
            <div class="card-body bg-info">
              <div class="rotate">
                <i class="fa fa-users fa-4x"></i>
              </div>
              <h6 class="text-uppercase">Total Mentors</h6>
              <h1 class="display-4"><?php echo 10 ?></h1>
            </div>
        </div>
        </a>
      </div>
      <div class="col-xl-3 col-sm-6 py-2">
        <div class="card bg-info text-white h-100">
          <a class="text-white" href="<?php echo base_url().'dashboard_controller/list_traineer'; ?>" style="text-decoration: none;">
            <div class="card-body bg-info">
              <div class="rotate">
                <i class="fa fa-users fa-4x"></i>
              </div>
              <h6 class="text-uppercase">Total Traineers</h6>
              <h1 class="display-4"><?php echo 10 ?></h1>
            </div>
        </div>
        </a>
      </div>
      <div class="col-xl-3 col-sm-6 py-2">
        <div class="card bg-info text-white h-100">
          <a class="text-white" href="<?php echo base_url().'dashboard_controller/list_courses'; ?>" style="text-decoration: none;">
            <div class="card-body bg-info">
              <div class="rotate">
                <i class="fa fa-users fa-4x"></i>
              </div>
              <h6 class="text-uppercase">Total Courses</h6>
              <h1 class="display-4"><?php echo 10 ?></h1>
            </div>
        </div>
        </a>
      </div>
    </div>

  </section>