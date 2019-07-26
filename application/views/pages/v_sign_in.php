<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
  <title>SIGN IN</title>
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
  @font-face {
    font-family: 'OpenSans';
    src: url('<?php echo base_url('assets/vendor/font/OpenSans/OpenSans-Regular.ttf'); ?>');
  }
  @font-face {
    font-family: 'Raleway';
    src: url('<?php echo base_url('assets/vendor/font/Raleway/Raleway-Regular.ttf'); ?>');
    scroll-behavior: smooth;
  }
  * {
    font-family: 'OpenSans', 'Raleway', sans-serif;
  }
  html, body {
    background-color: #FFF;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  body {
    position: relative;
    background-image: linear-gradient(120deg, #84fab0 0%, #E08FF4 100%);
    height: 100vh;
  }
  div.form-group {
    margin-bottom: 1.5em;
    position: relative;
  }
  div.form-group label {
    position: absolute;
    top: 10px;
    left: 0;
    pointer-events: none;
    transition: all 0.3s ease;
    color: #bab6b6;
    font-weight: normal;
  }
  div.form-group input.form-control:focus ~ label,
  div.form-group input.form-control:valid ~ label {
    top: -10px;
    left: 0px;
    color: #2093be;
    font-size: 12px;
    font-weight: bold;
    letter-spacing: 0.5px;
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
    border-bottom: 1px solid #B0B0B0 !important;
    box-shadow: none;
    border-radius: 0 !important;
    padding: 12px 0 !important;
    transition: 0.4s;
    background-color: #FFF;
    position: relative;
  }
  /*ANIMATE */ 
  .form-group .animate {
    position: absolute;
    display: inline-block;
    width: 0;
    height: 0;
    bottom: 0;
    /*border-bottom: 1px solid #999;*/
    z-index: 9;
    transform: scaleX(0);
    transition: 0.3s;
  }

  .form-group input[type="text"].form-control:focus ~ .animate ,
  .form-group input[type="text"].form-control:active ~ .animate ,
  .form-group input[type="password"].form-control:focus ~ .animate ,
  .form-group input[type="password"].form-control:active ~ .animate {
    border-bottom: 2px solid #2093be ;
    z-index: 9;
    width: 100%;
    transform: scaleX(1);
  }
  /*ANIMATE*/

  /*.form-group input[type="text"].form-control:focus,
  .form-group input[type="text"].form-control:active,
  .form-group input[type="password"].form-control:focus,
  .form-group input[type="password"].form-control:active {
    background-color: #FFF;
    border-bottom: 2px solid #2093be !important;
    box-shadow: none !important; 
  }*/

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
  .btn { transition: 0.3s; }
  .jumbotron {
    /* border: 1px solid #ddd; */
    -moz-box-shadow: 0 1px 4px 0px rgba(0, 0, 0, 0.2);
    -webkit-box-shadow: 0 1px 4px 0px rgba(0, 0, 0, 0.2);
    box-shadow: 0 1px 4px 0px rgba(0, 0, 0, 0.2);
  }

  /* LOGIN */
  .login {
    display: grid;
    grid-template-columns: 42% 58%;
    margin: 70px 150px;
    -webkit-box-shadow: -1px 6px 38px -11px rgba(0,0,0,0.59);
    -moz-box-shadow: -1px 6px 38px -11px rgba(0,0,0,0.59);
    box-shadow: -1px 6px 38px -11px rgba(0,0,0,0.59);
    background-color: #FFF;
    position: absolute;
    width: calc(100% - 300px);
    max-height: 490px;
    box-sizing: border-box;
    /* transform: translate(-50%, -50%); */
  }
  .login .content {
    padding: 2em 4em;
  }
  .fancy-checkbox input[type="checkbox"]:checked + span:before {
    color: #2093be;
  }

  #background {
    background: url(<?= base_url('assets/img/login-bg.jpg')?>);
    background-position: center;
    object-fit: contain;
    background-repeat: no-repeat;
    max-height: 490px;
    background-size: cover;
  }
  .alert.alert-danger {
    background-color: #E62D5D;
    color: #FFF;
    padding: 8px 5px;
    font-size: 14px;
  }

  .button-sign-in {
    background-color: transparent;
    color: black;
  }
  .button-sign-in h2 {
    background-color: transparent;
    font-size: 36px;
    color: #182A2F;
    text-shadow: 1px 2px 3px #777;
  }
  .btn-sign-in {
    text-decoration: none;
    display: inline-block;
    color: #fff;
    font-size: 16px;
    background-color: #00AAFF;
    border-color: #00a0f0;
    padding: 10px 3em;
    margin-top: 6px;
    border-radius: 45px;
    letter-spacing: 1px;
    text-transform: uppercase;
    transition: 0.3s;
    font-weight: 100;
  }
  .btn-sign-in:hover {
    color: #FFF;
    background-color: #0793D9;
    box-shadow: 0px 0px 2px 0 #66BAE6;
  }
  .btn.btn-primary:focus {
    outline: none;
    -moz-outline: none;
  }
  .btn.btn-primary {
    border-radius: 30px;
    transition: 0.3s;
    outline: none;
    letter-spacing: 1px;
    text-transform: uppercase;
    font-weight: 100;
  }
  .btn-success.btn-block {
    border-radius: 40px;
    letter-spacing: 1px;
  }

  /* END LOGIN */

  /* MOBILE */ 
  @media (max-width: 430px) {
    .login {
      grid-template-columns: 100%;
      margin: 0 0;
      width: 100%;
      min-height: 100%;
    }
    .login #background {
      display: none;
      opacity: 0;
      visibility: hidden;
    }
    .btn-primary.btn-lg,
    .btn-success.btn-block {
      padding: 12px;
      font-size: 14px;
    }
    input::placeholder {
      font-size: 14px !important;
    }
  }
  /* END MOBILE */
</style>

</head>
<body>
  <div class="login">
    <div class="content">
      <div class="form-group">
        <center>
          <div class="text-center">
            <h1 style="font-family: ''"><a href="<?= base_url('home')?>">ZOONOSIS</a></h1>
          </div>
          <h4>Login to your account</h4>
          <br>
        </center>
      </div>
      <?php echo $this->session->userdata('err'); ?>
      
      <form method="post" action="<?= base_url('welcome/proses_login'); ?>" id="form-login">
        <div class="form-group">
          <input type="text" class="form-control input-lg" name="username" autocomplete="off" required="true" value="<?php if(isset($_COOKIE["username"])) echo $_COOKIE['username']; ?>">
          <label class="control-label">Username</label>
          <span class="animate"></span>
        </div>
        <div class="form-group">
          <input type="password" class="form-control input-lg" name="password" autocomplete="off" required="true" value="<?php if(isset($_COOKIE["password"])) echo $_COOKIE['password']; ?>">
          <label class="control-label">Password</label>
          <span class="animate"></span>
        </div>
        <div class="clearfix">
          <label class="fancy-checkbox element-left">
            <input type="checkbox" name="remember_me" <?php if(isset($_COOKIE['remember'])) {echo 'checked'; }else {echo '';} ?>>
            <span>Ingat saya</span>
          </label>
        </div>
        <div class="form-group" style="margin-top: 20px;">
          <input type="submit" class="btn btn-block btn-primary btn-lg" name="masuk" value="MASUK" />
        </div>

      </form>
      <div class="form-group visible-xs">
        <a class="btn btn-success btn-lg btn-block text-uppercase" href="<?= base_url('sign-up'); ?>">Buat Akun</a>
      </div>
    </div>
    <div id="background" class="content">
      <div class="button-sign-in">
        <h2>Belum mempunyai akun?</h2>
        <a href="<?= base_url('sign-up') ?>" class="btn-sign-in">Buat Akun</a>
      </div>
      <div class="form-group">
        
      </div>
    </div>
  </div>

</body>
</html>