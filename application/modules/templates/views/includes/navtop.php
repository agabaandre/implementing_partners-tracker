<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark" style="background: rgb(131, 101, 9);
    color:inherit; text-align:center;">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <div class="header-title" style="color:#FFF; margin-top:5px;">
      </div>
    </li>
    <li class="nav-item d-none d-sm-inline-block">

    </li>
  </ul>

  <h6 style="color:#FFF;"><?php if (!empty($uptitle)) {
                            echo urldecode($uptitle);
                          } ?></h6>

  <!-- SEARCH FORM -->
  <form class="form-inline ml-3" style="display:none;">
    <div class="input-group input-group-sm">
      <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-navbar" type="submit">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </div>
  </form>
  <?php //print_r($this->session->userdata())
  ?>

  <!-- Right navbar links -->

  <ul class="navbar-nav ml-auto">

    <li class="nav-item dropdown show" style="margin-right:20px; margin-left:20px; animation: growDown 300ms ease-in-out forwards;">
      <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
        <span style="clear:both; color:#FFFFFF !important;">

          <?php

          echo $this->session->userdata('user')->name;

          // print_r($userdata); 

          ?>

        </span>
        <span>
          <img src="<?php echo base_url(); ?>assets/img/user.jpg" alt="" class="img-circle elevation-2" style="max-width:20px;" /></span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item" data-toggle="modal" data-target="#profile"><i class="fa fa-user"></i> Profile</a>

        <div class="dropdown-divider"></div>
        <a href="<?php echo base_url(); ?>auth/logout" class="dropdown-item"><i class="fa fa-arrow-left"></i> Logout</a>
        <div class="dropdown-divider"></div>
        <a href="<?php echo base_url(); ?>#" class="dropdown-item" data-toggle="modal" role="button" data-target="#changepassword"><i class="fa fa-lock"></i> Change Password</a>

      </div>
    </li>





  </ul>
</nav>
<!-- /.navbar -->