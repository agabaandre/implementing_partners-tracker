<?php
date_default_timezone_set('Africa/Kampala');
require_once("includes/header.php");
require_once("includes/navtop.php");
require_once("includes/sidenav.php");

//db connection
?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">

        </div>
        <div class="col-sm-6" style="font-size:11px;">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?><?php echo $this->uri->segment(1) ?>"><?php echo ucwords($this->uri->segment(1)); ?></a></li>
            <li class="breadcrumb-item active"> <?php if (!empty($uptitle)) {
                                                  echo urldecode($uptitle);
                                                } ?></li>
          </ol>
        </div>
      </div>
    </div>



  </section>
  <!-- /.container-fluid -->

  <!-- Main content -->
  <!-- <div id="preloader">
    <div id="status">
    </div>
  </div> -->
  <section class="content">

    <div class="container-fluid" style="font-size:12px;  margin-top:40px;">

      <div class="row">
        <div class="col-12" style="margin-bottom:3px;">



          <?php
          print_r($userdata);

          $this->load->view($module . "/" . $view);

          ?>


        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
require_once("includes/footer.php");
?>