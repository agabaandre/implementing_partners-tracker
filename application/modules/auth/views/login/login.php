<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Partners Registration Portal</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">

  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css?v=3.2.0">

</head>

<body class="hold-transition login-page">
  <div class="login-box">

    <div class="card card-outline card-deafult">
      <div class="card-header text-center">
        <p>
        <h3>Partners Registration Portal</h3>
        </p>
        <a href="<?php echo base_url() ?>assets/"><img src="<?php echo base_url() ?>assets/images/MOH.jpg" alt="Logo MoH" width=95> </a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <?php echo form_open_multipart('auth/login'); ?>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Username / Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>

          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>

        </div>
        </form>


        <!-- <p class="mb-1">
          <a href="forgot-password.html">I forgot my password</a>
        </p>
        <p class="mb-0">
          <a href="register.html" class="text-center">Register a new membership</a>
        </p> -->
      </div>

    </div>

  </div>


  <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>

  <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js?v=3.2.0"></script>
</body>

</html>