<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>SIGN UP</title>
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
		/* MOBILE VERSION */
		@media (max-width: 420px) {
			body {
				background-image: none;
			}
			body .box {
				grid-template-columns: 100%;
				margin-top: 0;
				margin-bottom: 0;
				margin-left: 0;
				margin-right: 0;
				padding: 0;
				width: 100%;
				height: 100vh;
				background-image: none;
			}
			.box .content {
				width: 100%;
				height: 100vh;
			}
			#background {
				display: none;
				opacity: 0;
				visibility: hidden;
			}
			.btn-primary.btn-lg,
			.btn-success.btn-block {
				border-radius: 40px;
	      padding: 12px;
	      font-size: 14px;
	      letter-spacing: 1px;
	    }
	    input::placeholder {
	      font-size: 14px !important;
	    }
		}
		/* END MOBILE VERSION */

		@font-face {
      font-family: 'OpenSans';
      src: url('<?php echo base_url('assets/vendor/font/OpenSans/OpenSans-Regular.ttf'); ?>');
    }
		@font-face {
	    font-family: 'Raleway';
    	src: url('<?php echo base_url('assets/vendor/font/Raleway/Raleway-Regular.ttf'); ?>');
	  }
	  * {
	    font-family: 'OpenSans', sans-serif;
	  }
		html, body, * {
			font-family: 'OpenSans';
			margin: 0;
			padding: 0;
			scroll-behavior: smooth;
		}
		body {
			background-image: linear-gradient(to top, #fbc2eb 0%, #a6c1ee 100%);
		}
		label {
			font-weight: normal;
			color: #999;
		}
		div.form-group {
			margin-bottom: 1.69em;
			position: relative;
		}
		input[type="text"].form-control::placeholder,
		input[type="password"].form-control::placeholder {
			color: #bab6b6;
		}
		.form-group.has-error .form-control,
		.form-group.has-error .form-control:focus {
			border-bottom: 2px solid #ff0039 !important;
			box-shadow: none;
		}
		input[type="text"].form-control,
		input[type="password"].form-control {
			border: none;
			border-bottom: 1px solid #999;
			background-color: #FFFFFF;
			box-shadow: none;
			border-radius: 0;
			padding: 12px 0;
			transition: all 0.5s ease;
		}
		.form-group input.form-control:focus{
			background-color: #FFF;
			border: none;
			/*border-bottom: 2px solid #2093be;*/
			box-shadow: none;
		}
		.form-group input.form-control:focus ~ label,
	  .form-group input.form-control:valid ~ label {
	    top: -10px;
	    left: 0px;
	    color: #2093be; 
	    /*color: #999;*/
	    font-size: 12px;
	    font-weight: bold;
	    letter-spacing: 0.5px;
	  }
	  .form-group.has-error > label {
	  	color: #ff0039 !important;
	  } 
		.form-group label{
			position: absolute;
			top: 10px;
			left: 0;
			pointer-events: none;
			transition: all 0.3s ease;
		}

		/*ANIMATE */ 
	  .form-group .animate {
	    position: absolute;
	    display: inline-block;
	    width: 0;
	    height: 0;
	    bottom: 0;
	    border-bottom: 1px solid #999;
	    /*z-index: 9;*/
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
	  .form-group.has-error .form-control:focus ~ .animate,
	  .form-group.has-error .form-control:active ~ .animate {
	  	transform: scaleX(0) !important;
	  }
	  /*ANIMATE*/

		.box {
			display: grid;
			grid-template-columns: 40% 60%;
			margin-left: 100px;
			margin-right: 100px;
			margin-top: 50px;
			margin-bottom: 50px;
			-webkit-box-shadow: -1px 6px 38px -11px rgba(0,0,0,0.59);
    	-moz-box-shadow: -1px 6px 38px -11px rgba(0,0,0,0.59);
    	box-shadow: -1px 6px 38px -11px rgba(0,0,0,0.59);
			background-color: #FFF;
		}
		.box .content {
			padding: 1.5em 3.5em;
		}
		#background {
			background: url(<?= base_url('assets/img/login-bg.jpg')?>);
			background-position: center;
			object-fit: cover;
			background-repeat: no-repeat;
		}
		.button-sign-in {
			background-color: transparent;
			color: black;
		}
		.button-sign-in h2 {
			background-color: transparent;
			font-size: 36px;
			text-shadow: 1px 2px 4px #777;
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
		#handphone {
			font-family: 'Verdana';
		}

	</style>

</head>
<body>

	<!-- <div id="wrapper"> -->

		<div class="box">
			<div class="content">
				<!-- FORM DAFTAR -->
				<div class="form-group">
					<center>
						<a href="<?= base_url('home'); ?>"><h2><span style="color: #3ec1d5">ZOO</span>NOSIS</h2></a>
						<p>Create your account</p>
					</center>
				</div>

				<form class="form-auth-small" method="POST" action="<?php echo base_url('welcome/proses_daftar') ?>" id="form-daftar">
					<div class="form-group">
						<input type="text" name="name" id="name" class="form-control" autocomplete="off" required="true">
						<label for="name" control-label>Nama Lengkap</label>
						<span class="animate"></span>
					</div>
					<div class="form-group">
						<input type="text" name="username" id="username" class="form-control" required="true" autocomplete="off">
						<label class="control-label">Username</label>
						<span class="animate"></span>
					</div>
					<div class="form-group">
						<input type="password" name="password" id="password" class="form-control" required="true" autocomplete="off">
						<label control-label>Password</label>
						<span class="animate"></span>
					</div>
					<div class="form-group">
						<input type="password" name="konfirmasi_password" id="konfirmasi_password" class="form-control" required="true" autocomplete="off">
						<label control-label>Konfirmasi Password</label>
						<span class="animate"></span>
					</div>
					<div class="form-group">
						<input type="text" name="handphone" id="handphone" class="form-control open" required="true" autocomplete="off">
						<label control-label>Nomor Handphone</label>
						<span class="animate"></span>
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary btn-lg btn-block" value="Daftar" name="daftar"  />
					</div>
				</form>

				<div class="form-group visible-xs">
	        <a class="btn btn-success btn-lg btn-block text-uppercase" href="<?= base_url('sign-in'); ?>">Login</a>
	      </div>
				<!-- END FORM -->
			</div>
			<div class="content" id="background">
				<div class="button-sign-in">
					<h2>Sudah mempunyai akun?</h2>
					<a href="<?= base_url('sign-in') ?>" class="btn-sign-in">Masuk</a>
				</div>
			</div>
		</div>
	<!-- </div> -->

		<script src="<?php echo base_url('assets/vendor/sweetalert/sweetalert.min.js') ?>"></script>
		<script src="<?= base_url('assets/vendor/jquery-blockUI/jquery.blockUI.js') ?>"></script>

		<script>

			$(document).ready(function() {

				$('#form-daftar').on('submit', function(e) {
					e.preventDefault();
					var form = $(this);
					var data = form.serialize();

					$.ajax({
						url: form.attr('action'),
						type: 'post',
						data: data,
						dataType: 'json',
						beforeSend: function() {
							$.blockUI({
								message: '<img src="<?= base_url()?>assets/img/loading.gif" width="100px"><p>Please wait...</p>'
							});
						},
						success: (result) => {
							console.log(result);

							if(result.success == true) {
								resetForm();
								swal("Sukses!", "Anda telah berhasil mendaftar!", "success");
							} else {
								$.each(result.messages, (key, val) => {
									var el = $('#' + key);

									el.closest('div.form-group')
									.removeClass('has-error')
									.removeClass('has-success')
									.addClass(val.length > 0 ? 'has-error' : 'has-success')
									.find('.help-block')
									.remove();

									el.after(val);
								});
							}
						},
						complete: function() {
							$.unblockUI();
						},
						error: (xhr, stat, err) => {
							console.log(err);
						}
					});
				});
			});

			function resetForm() {
				$('#form-daftar')[0].reset();

				$('div.form-group')
				.removeClass('has-error')
				.removeClass('has-success')
				.find('.help-block')
				.remove();
			}

		</script>

	</body>
	</html>