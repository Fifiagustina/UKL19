<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login Register</title>
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
								
								<p class="lead">Daftarkan Akun Anda</p>
								
							</div>
							<?php
								$pesan = $this->session->flashdata('pesan');
								if($pesan != NULL){
									echo ' <div class="alert alert-danger">'.$pesan.'</div>';
								}

							?>
							<form id="" class="form-auth-small" method="POST" action="<?= base_url()?>index.php/Login_pelanggan/proses_daftar">
								<div class="form-group">
									
									<input type="text" class="form-control"  placeholder="nama" name="nama">
								</div>
								
								<div class="form-group">
									
									<input type="text" class="form-control"  placeholder="alamat" name="alamat">
								</div>
								<div class="form-group">
									
									<input type="text" class="form-control"  placeholder="no Telepon" name="telp">
								</div>
								<div class="form-group">
									
									<input type="text" class="form-control"  placeholder="username" name="username">
								</div>
								<div class="form-group">
									
									<input type="password" class="form-control"  placeholder="password" name="password">
								</div>	
								
								<div class="row">
									<div class="bottom">
										<a href="<?= base_url()?>index.php/Login_pelanggan" class=".text-primary">KEMBALI</a>
									</div>
									<div class="col-xs-12">
										<button type="submit" class="btn btn-success btn-lg btn-block" name="simpan" value="Simpan">DAFTAR</button>

									</div>

								</div>
														
						</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">REGISTER PELANGGAN</h1>
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
