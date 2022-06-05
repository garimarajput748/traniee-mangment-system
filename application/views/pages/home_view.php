<?php echo validation_errors(); ?>

<div class="imgbg">
  <div class="dark-overlay">

    <div class="col-lg-12 d-lg-block">
      <div class="mx-5">
        <h1 class="title"> Trainee Management System</h1>
      </div>
    </div>
    <div id="first">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 mx-auto mt-5">
            <div class="card">
              <div class="card-header">
                <h4 class="text-center">
                  Login Panel
                </h4>
                <hr style="border-color:white; border-style:solid;">
                <div class="card-body">
                  <form action="<?php echo base_url() . 'home_controller/login' ?>" method="post">
                    <div class="form-group">
                      <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" name="log_password" placeholder="Password">
                    </div>
                    <input type="submit" class="btn btn-success btn-block mt-1" value="Login" name="login_button">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </body>