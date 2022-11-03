<!-- Main Sidebar Container -->


<aside class="main-sidebar  elevation-4" style="background:#000;">
  <!-- Brand Logo -->
  <a href="<?php echo base_url(); ?>" class="brand-link" style="background: #7d101b;
    color: #FFFFFF; text-align:center;">
    <!-- <img src="../../dist/img/AdminLTELogo.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8"> -->
    <span class="brand-text  font-weight-bold" style="text-align:center;"><?php echo $setting->title; ?></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar  sido" style="width:100% !important;">
    <!-- Sidebar user (optional) -->

    <div class="user-panel mt-2 pb-3 mb-2" style="text-align:center; line-height:0.2cm;">


    </div>
    <hr style="color:#FFF;">

    <!-- Sidebar Menu -->
    <nav class="mt-2" style="overflow:hidden; font-size:14px;">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview">
          <a href="<?php echo base_url(); ?>" class="nav-link">
            <i class="fa fa-tachometer-alt"></i>
            <p>
              Main Dashboard
              </i>
            </p>
          </a>
        </li>

        <!--user perm 14-->
        <?php if (in_array('13', $permissions)) { ?>
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link">
              <i class="fa fa-building"></i>
              <p>
                Partners Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">

                <?php if (in_array('13', $permissions)) { ?>
                  <a href="<?php echo base_url(); ?>partners/partners_profile" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Register</p>
                  </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>partners/manage_partners" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage</p>
                </a>
              </li>
            <?php } ?>

            </ul>
          </li>
        <?php } ?>


        <!--user perm 14-->
        <?php if (in_array('13', $permissions)) { ?>
          <li class="nav-item has-treeview ">
            <a href="<?php echo base_url(); ?>partners/activities" class="nav-link">
              <i class="fa fa-road"></i>
              <p>
                Submit Report
              </p>
            </a>
          </li>
        <?php } ?>

        <!--user perm 26-->
        <?php if (in_array('17', $permissions)) { ?>
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link">
              <i class="fa fa-th"></i>
              <p>
                Reports

              </p>
            </a>

          </li>
        <?php } ?>

        <!--user perm 14-->
        <?php if (in_array('35', $permissions)) { ?>
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link">
              <i class="fa fa-list"></i>
              <p>
                Standard Form Lists
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">

                <?php if (in_array('15', $permissions)) { ?>

              <li class="nav-item">
                <a href="<?php echo base_url(); ?>partners/work_areas" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Areas of Intervention</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>partners/partners" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Partners</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>partners/funders" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Funders</p>
                </a>
              </li>

            <?php } ?>



            </ul>
          </li>
        <?php } ?>

        <!--user perm 14-->
        <?php if (in_array('35', $permissions)) { ?>
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link">
              <i class="fa fa-cog"></i>
              <p>
                System Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">

                <?php if (in_array('15', $permissions)) { ?>
                  <a href="<?php echo base_url(); ?>auth/users" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Manage User</p>
                  </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/groups" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Group Permissions</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>admin/showLogs" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Logs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>forms/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Constants & Variables</p>
                </a>
              </li>
            <?php } ?>



            </ul>
          </li>
        <?php } ?>



        <li class="nav-item has-treeview">
          <a href="<?php echo base_url(); ?>" class="nav-link" class="passchange nav-link dropdown-toggle" data-toggle="modal" role="button" data-target="#changepassword">
            <i class="fa fa-lock"></i>
            <p>
              Change Password
              </i>
            </p>
          </a>
        </li>



      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>