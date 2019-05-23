<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login Pelanggan</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?= base_url()?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url()?>assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= base_url()?>assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?= base_url()?>assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="<?= base_url()?>assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="<?= base_url()?>assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?= base_url()?>assets/img/favicon.png">
	<script src="<?= base_url()?>assets/vendor/jquery/jquery.min.js"></script>
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="<?= base_url()?>assets/img/logo-dark.png" alt="Klorofil Logo"></div>			
							</div>
							<?php
								$pesan = $this->session->flashdata('pesan');
								if($pesan != NULL){
									echo ' <div class="alert alert-danger">'.$pesan.'</div>';
								}

							?>
							<form id="sign_in" class="form-auth-small" method="POST" action="<?= base_url()?>index.php/Login_pelanggan/cek_login">
								<div class="form-group">
									<label  class="control-label sr-only">Username</label>
									<input type="text" class="form-control"  placeholder="Username" name="username">
								</div>
								<div class="form-group">
									<label class="control-label sr-only">Password</label>
									<input type="password" class="form-control"  placeholder="Password" name="password">
								</div>
						
								
								<div class="row">
									<div class="col-xs-6">
										<button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
									</div>
									<div class="col-xs-6">
										<a href="<?= base_url()?>index.php/Login_pelanggan/tampil_daftar" class="btn btn-success btn-lg btn-block" data-toggle="modal" type="button" >Daftar </a>
									</div>
								</div>							
								
								
								<div class="bottom">
									

								</div>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">LOGIN PELANGGAN</h1>
							<p>Restaurant UKL</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>

	<!-- END WRAPPER -->

</body>

</html>
