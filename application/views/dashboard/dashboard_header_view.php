<?php defined('BASEPATH') or exit('No direct script access allowed');
$data = $this->session->userdata(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title> Trainee Management System</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/dashboardstyle.css'; ?>">

  <!--------------------------------------Javascript Files---------------------------------------------------------->

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


</head>

<body>

  <header>
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg fixed-top" style="padding: 1rem 1rem;">
      <a class="navbar-brand col-md-2 col-sm-3" href="#"><i class="fa fa-graduation-cap"></i> Trainee Management System</a>

      <button class="navbar-toggler" type="button" id="show_menu">
        <span class="navbar-toggler-icon"></span>
      </button>

    </nav>
  </header>

  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 bg-light sidebar d-lg-block d-none" id="sidebar_menu" style="padding-top: 65px;">
        <div class="sidebar-sticky">
          <ul class="nav flex-column mx-4 p-2">
            <li class="nav-item">
              <a class="nav-link active" href="<?php
                                                if ($data['user_type'] == 'student') {
                                                  echo base_url() . 'dashboard_controller/';
                                                } else if ($data['user_type'] == 'mentor') {
                                                  echo base_url() . 'dashboard_controller/mentor_dashboard';
                                                } else if ($data['user_type'] == 'super_admin') {
                                                  echo base_url() . 'dashboard_controller/admin_dashboard';
                                                } else {
                                                  echo base_url();
                                                } ?>">
                <i class="fas fa-home"></i>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php
                                        if ($data['user_type'] == 'student') {
                                          echo base_url() . 'dashboard_controller/student_profile/';
                                        } elseif ($data['user_type'] == 'mentor') {
                                          echo base_url() . 'dashboard_controller/mentor_profile/';
                                        } elseif ($data['user_type'] == 'super_admin') {
                                          echo base_url() . 'dashboard_controller/user_profile/';
                                        } else {
                                          echo base_url();
                                        }  ?>">
                <i class="fas fa-user-alt"></i>
                Profile
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php
                        if (($data['user_type'] == 'mentor') || ($data['user_type'] == 'super_admin')) {
                          echo base_url() . 'dashboard_controller/add_trainee';
                        } else {
                          echo base_url();
                        } ?>" class="nav-link <?php if ($data['user_type'] == 'student') {
                                                echo 'd-none';
                                              } ?>">
                <i class="fas fa-user-graduate"></i> Add Trainee's</a>
            </li>
            <li class="nav-item">
              <a href="<?php
                        if ($data['user_type'] == 'super_admin') {
                          echo base_url() . 'dashboard_controller/add_mentor';
                        } else {
                          echo base_url();
                        } ?>" class="nav-link <?php if (($data['user_type'] == 'student') || ($data['user_type'] == 'mentor')) {
                                                echo 'd-none';
                                              } ?>">
                <i class="fas fa-chalkboard-teacher"></i>Add Mentor's</a>
            </li>
            <li class="nav-item">
              <a href="<?php
                        if ($data['user_type'] == 'super_admin') {
                          echo base_url() . 'dashboard_controller/add_trainor';
                        } else {
                          echo base_url();
                        } ?>" class="nav-link <?php if (($data['user_type'] == 'student') || ($data['user_type'] == 'mentor')) {
                                                echo 'd-none';
                                              } ?>">
                <i class="fas fa-chalkboard-teacher"></i>Add Trainor's</a>
            </li>
            <li class="nav-item">
              <a href="<?php
                        if ($data['user_type'] == 'super_admin') {
                          echo base_url() . 'dashboard_controller/add_course';
                        } else {
                          echo base_url();
                        } ?>" class="nav-link <?php if (($data['user_type'] == 'student') || ($data['user_type'] == 'course')) {
                                                echo 'd-none';
                                              } ?>">
                <i class="fas fa-chalkboard-teacher"></i>Add Course's</a>
            </li>
            <li class="nav-item">
              <a href="<?php
                        if (($data['user_type'] == 'mentor') || ($data['user_type'] == 'super_admin')) {
                          echo base_url() . 'dashboard_controller/list_trainee';
                        } else {
                          echo base_url();
                        } ?>" class="nav-link <?php if ($data['user_type'] == 'student') {
                                                echo 'd-none';
                                              } ?>">
                <i class="fas fa-user-graduate"></i> Trainee's List </a>
            </li>
            <li class="nav-item">
              <a href="<?php
                        if ($data['user_type'] == 'super_admin') {
                          echo base_url() . 'dashboard_controller/list_mentors';
                        } else {
                          echo base_url();
                        } ?>" class="nav-link <?php if (($data['user_type'] == 'student') || ($data['user_type'] == 'mentor')) {
                                                echo 'd-none';
                                              } ?>">
                <i class="fas fa-chalkboard-teacher"></i> Mentor's List</a>
            </li>
            <li class="nav-item">
              <a href="<?php
                        if ($data['user_type'] == 'super_admin') {
                          echo base_url() . 'dashboard_controller/list_trainors';
                        } else {
                          echo base_url();
                        } ?>" class="nav-link <?php if (($data['user_type'] == 'student') || ($data['user_type'] == 'trainor')) {
                                                echo 'd-none';
                                              } ?>">
                <i class="fas fa-chalkboard-teacher"></i> Trainor's List</a>
            </li>
            <li class="nav-item">
              <a href="<?php
                        if ($data['user_type'] == 'super_admin') {
                          echo base_url() . 'dashboard_controller/list_course';
                        } else {
                          echo base_url();
                        } ?>" class="nav-link <?php if (($data['user_type'] == 'student') || ($data['user_type'] == 'course')) {
                                                echo 'd-none';
                                              } ?>">
                <i class="fas fa-chalkboard-teacher"></i> Course's List</a>
            </li>

            <li class="nav-item">
              <a href="<?php echo base_url() . 'dashboard_controller/logout/' ?>" class="nav-link">
                <i class="fas fa-sign-out-alt"></i> Log Out</a>
            </li>
          </ul>
        </div>
      </nav>
      <script>
        $("#show_menu").click(function() {
          $("#sidebar_menu").toggleClass("d-none");
        });
      </script>