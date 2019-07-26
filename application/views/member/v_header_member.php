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

  <!-- IMAGE HOVER -->
  <link rel="stylesheet" href="<?= base_url('assets/css/imagehover.min.css')?>">

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
      scroll-behavior: smooth;
    }
    @font-face {
      font-family: 'Quicksand';
      src: url('<?php echo base_url('assets/vendor/font/Quicksand-Regular.ttf'); ?>');
      scroll-behavior: smooth;
    }
    @font-face {
      font-family: 'Raleway';
      src: url('<?php echo base_url('assets/vendor/font/Raleway/Raleway-Regular.ttf'); ?>');
      scroll-behavior: smooth;
    }
    * {
      font-family: 'OpenSans', sans-serif;
    }
    a, a:link, a:visited { color: #3cad51; transition: 0.3s; }
    a:hover { color: #33b6a3; }
    .open { font-family: 'Raleway' !important; }
    .ls-1 { letter-spacing: 1px; }
    .bold { font-weight: bold; }
    .uppercase { text-transform: uppercase; }
    .large { font-size: large; }
    .lh-32 { line-height: 32px; }
    .ti { text-indent: 2em; }
    /* .gold { color: #9a932f; } */
    .gold { color: #B9B245; }
    .green { color: #8C842F; }
    .black { color: #161616; }
    .gray { color: #727272; }
    .thin { font-weight: 100 !important; }
    p {
      font-size: 16px;
      line-height: 32px;
    }
    h2 { font-size: 26px; }
    hr { border: 0.5px solid #A59F3D; }

    @media (min-width: 768px) {
      html, body{
        font-size: 16px;
      }
      .f-18 { font-size: 18px !important; }
      .f-16 { font-size: 16px !important; }
      .f-15 { font-size: 15px; }
    }

    @media (max-width: 420px) {
      html, body {
        font-size: 14px !important;
      }
      .f-18 { font-size: 14px !important; }
      .f-16 { font-size: 14px !important; }
      .f-15 { font-size: 14px; }
       p {
        font-size: 14px;
        line-height: 28px;
      }
      hr {border: 0.5px solid #ddd; }
      .large { font-size: 14px; }
      h2 { font-size: 16px; }
    }

    html, body{
      color: #373737 !important;
      background-color: #FFF;
      box-sizing: border-box;
    }
    .mt-1 { margin-top: 1em; }
    .mt-2 { margin-top: 2em; }
    .mt-3 { margin-top: 3em; }
    div.jumbotron, div.well, .panel{
      border: 0.5px solid #eee;
    }
    .container-fluid div.jumbotron, .container div.jumbotron {
      border-radius: 2px;
      background-color: #FFF;
    }
    .navbar {
      min-height: 50px;
      max-height: 100px;
      box-shadow: none !important;
      box-sizing: border-box;
      border-bottom: 0.2px solid #eee;
    }
    div.navbar-btn a.btn-sign-in {
      color: #f5f4f4 !important;
      font-family: 'Raleway' !important;
      background-color: #36a14a;
      padding: 5px 30px;
      border: none;
      border-radius: 50px;
      display: inline-block;
      letter-spacing: 1px;
      margin: 0px;
      -webkit-transition: background-color 0.4s ease-in;
      -moz-transition: background-color 0.4s ease-in;
      -o-transition: background-color 0.4s ease-in;
      transition: background-color 0.4s ease-in;
    }

    div.navbar-btn a.btn-sign-in:hover {
      color: #fff !important;
      background-color: #18A67C;
    }
    /* .navbar.navbar-default {
      background: -webkit-linear-gradient(-45deg, #57cfb0, #2ab5d3);
      background: linear-gradient(-45deg, #57cfb0, #2ab5d3);
    } */
    .navbar.navbar-default .brand a {
      font-family: 'Quicksand' !important;
      color: #36a14a;
      font-size: 28px;
      letter-spacing: 1px;
      font-weight: bold;
      /*text-shadow: 1px 1px rgba(0,0,0,0.5);*/
    }
    .navbar .brand {
      background: transparent !important;
      padding: 20px 40px;
      letter-spacing: 1px;
    }
    .navbar-link a {
      color: #373737 !important;
      font-size: 14px;
      font-family: 'Raleway';
      font-weight: 600;
      letter-spacing: 1px;
      text-transform: uppercase;
    }

    .navbar-default .navbar-nav>.active>a,
    .navbar-default .navbar-nav>.active>a:focus,
    .navbar-default .navbar-nav>.active>a:hover {
      color: #3cad51 !important;
      background-color: #FFF;
      transition: 0.3s;
    }
    .my-navbar .navbar-link:hover a {
      color: #3cad51 !important;
    }
    .navbar-default.my-navbar  .navbar-nav li::before {
      content: '';
      height: 0;
      width: 0;
      right: 0;
      left: 15px;
      bottom: 14px;
      position: absolute;
      text-align: center;
      border-bottom: 2px solid #3cad51;
      z-index: 22;
      transition: 0.3s;
      transform: scaleX(0); 
    }
    .navbar-default .navbar-nav li:hover::before {
      width: calc(100% - 30px);
      transform: scaleX(1);
    }
    .navbar-default .navbar-nav li.active::before {
      width: calc(100% - 30px);
      transform: scaleX(1);
     }
  </style>
</head>

<body>

  <div id="wrapper">

    <!-- NAVBAR -->
    <nav class="navbar navbar-default my-navbar navbar-fixed-top">
      <div class="navbar-header brand" style="margin-left: 80px;">
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="<?= base_url() ?>">
          ZOONOSIS
        </a>
      </div>
      <div class="container">

      <div id="navbar-menu" >
        <ul class="nav navbar-nav" style="margin-left: 100px;">
          <li class="navbar-link active">
            <a href="javascript:void(0);">MEMBER HOME</a>
          </li>
          <!-- <li class="navbar-link active">
            <a href="#home">Home</a>
          </li>
          <li class="navbar-link">
            <a href="#info">Informasi Penyakit</a>
          </li>
          <li class="navbar-link">
            <a href="#about-us">Tentang Kami</a>
          </li>
          <li class="navbar-link">
            <a href="#bantuan">Bantuan</a>
          </li> -->
        </ul>

      <?php if($this->session->has_userdata('logged_in')) : ?>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php if($this->session->userdata('photo') == ''): ?>
                  <img src="<?= base_url('assets/img/user/user.png')?>" class="img-circle" alt="Avatar">
                <?php else: ?>
                  <img src="<?= base_url('assets/img/user/'.$this->session->userdata('photo'))?>" class="img-circle" alt="Avatar">
                <?php endif ?>
                  <span><?php echo $this->session->userdata('name'); ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a href="<?= base_url('member/profile'); ?>"><i class="lnr lnr-user"></i> <span>My Profile</span></a>
                </li>
                <li class="divider"></li>
                <li>
                  <a href="<?= base_url('member/home'); ?>"><i class="lnr lnr-bug"></i> <span>Diagnose</span></a>
                </li>
                <li class="divider"></li>
                <li>
                  <a href="<?= base_url('member/news'); ?>"><i class="lnr lnr-alarm"></i> <span>News</span></a>
                </li>
                <li class="divider"></li>
                <li>
                  <a href="<?= base_url('welcome/logout') ?>"><i class="lnr lnr-exit"></i> <span>Logout</span></a>
                </li>
              </ul>
          </li>
        </ul>
      <?php else : ?>
         <div class="navbar-btn navbar-btn-right">
          <a class="btn btn-sign-in" id="btn-grad" href="<?= base_url('sign-in'); ?>"><span class="open">SIGN IN <i class="fa fa-sign-in"></i></span></a>
         </div>
      <?php endif ?>
      </div>

      </div>
    </nav>
    <!-- END NAVBAR -->
