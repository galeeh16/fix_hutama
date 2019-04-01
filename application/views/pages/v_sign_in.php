<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
  <title><?php echo $title; ?></title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <!-- VENDOR CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendor/font-awesome/css/font-awesome.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendor/linearicons/style.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/vendor/chartist/css/chartist-custom.css') ?>">
  <!-- MAIN CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>">
  <!-- ICONS -->
  <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/img/apple-icon.png') ?>">
  <link rel="icon" type="image/png" sizes="96x96" href="<?= base_url('assets/img/favicon.png') ?>">

  <!-- MYCSS -->
  <link rel="stylesheet" href="<?= base_url('assets/css/mycss.css'); ?>">

  <!-- Javascript -->
  <script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
  <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
  <script src="<?= base_url('assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js'); ?>"></script>
  <script src="<?= base_url('assets/vendor/chartist/js/chartist.min.js'); ?>"></script>
  <script src="<?= base_url('assets/scripts/klorofil-common.js'); ?>"></script>

<style>
  html, body {
    background-color: #FFF;
  }
  body {
    background-image: linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%);
  }
  div.form-group {
		margin-bottom: 1.5em;
	}
  input[type="text"].form-control::placeholder,
  input[type="password"].form-control::placeholder {
    color: #bab6b6 !important;
  }
	.form-group.has-error > .form-control {
		border-bottom: 2px solid #ff0039 !important;
		box-shadow: none !important;
	}
	input[type="text"].form-control,
	input[type="password"].form-control {
		border: none !important;
		border-bottom: 1px solid #999 !important;
		box-shadow: none;
		border-radius: 0 !important;
		padding: 12px 0 !important;
		transition: 0.4s;
    background-color: #FFF;
	}
	.form-group input[type="text"].form-control:focus,
	.form-group input[type="text"].form-control:active,
	.form-group input[type="password"].form-control:focus,
	.form-group input[type="password"].form-control:active {
		background-color: #FFF;
		border-bottom: 2px solid #2093be !important;
		box-shadow: none !important;
	}
  .container-fluid {
    margin-top: 50%;
    margin-left: 50%;
  }
  .row {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 33%;
  }
  .jumbotron {
    /* border: 1px solid #ddd; */
    -moz-box-shadow: 0 1px 4px 0px rgba(0, 0, 0, 0.2);
    -webkit-box-shadow: 0 1px 4px 0px rgba(0, 0, 0, 0.2);
    box-shadow: 0 1px 4px 0px rgba(0, 0, 0, 0.2);
  }
</style>

</head>
<body>
<div id="wrapper">
  <div class="row">
    <div class="col-md-12">
      <div class="jumbotron" style="background-color: #fff; padding-right: 30px; padding-left: 30px;">
        <div class="form-group">
          <center>
            <div class="text-center">
              <a href="<?= base_url('home')?>"><img src="<?= base_url('assets/img/zoonosis.jpg'); ?>" alt="Klorofil Logo" width="150px"></a>
            </div>
            <h4>Login to your account</h4>
            <br>
          </center>
        </div>
        <?php echo $this->session->userdata('err'); ?>
          <form method="POST" action="<?= base_url('welcome/proses_login'); ?>">
            <div class="form-group">
              <label class="control-label sr-only">Username</label>
              <input type="text" class="form-control input-lg" id="username" name="username"placeholder="Username" autocomplete="off" required="true" value="<?php if(isset($_COOKIE["username"])) echo $_COOKIE['username']; ?>">
            </div>
            <div class="form-group">
              <label class="control-label sr-only">Password</label>
              <input type="password" class="form-control input-lg" id="password" name="password"placeholder="Password" autocomplete="off" required="true" value="<?php if(isset($_COOKIE["password"])) echo $_COOKIE['password']; ?>">
            </div>
            <div class="form-group clearfix">
              <label class="fancy-checkbox element-left">
                <input type="checkbox" name="remember_me" <?php if(isset($_COOKIE['remember'])) {echo 'checked'; }else {echo '';} ?>>
                <span>Ingat saya</span>
              </label>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-block btn-primary btn-lg" name="masuk" value="Masuk" />
            </div>
        </form>
        <div class="form-group">
          <p style="font-size: 15px">Belum mempunyai akun? <a href="<?= base_url('sign-up');?>" title="Buat Akun">Buat Akun</a></p>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
