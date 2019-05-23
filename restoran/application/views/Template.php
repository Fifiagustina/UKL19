<!doctype html>
<html lang="en">

<head>
	<title>Restoran UKL</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?= base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url()?>assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= base_url()?>assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="<?= base_url()?>assets/vendor/chartist/css/chartist-custom.css">
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
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="index.html"><img src="<?= base_url()?>assets/img/logo-dark.png" alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				
				
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						
					
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span><?php echo $this->session->userdata('username'); ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<?php
									if ($this->session->userdata('nama_level')=='kasir') 
									{
										?>
										<li><a href="<?= base_url()?>index.php/Login/logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
								<?php
									}
									else if ($this->session->userdata('nama_level')=='admin') 
									{
										?>
										<li><a href="<?= base_url()?>index.php/Login/logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
								<?php
									}
									else
									{
										?>
										<li><a href="<?= base_url()?>index.php/Login_pelanggan/logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
								<?php
									}
								?>
								
							</ul>
						</li>
						<!-- <li>
							<a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
						</li> -->
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">

						<?php
							if ($this->session->userdata('nama_level') == 'kasir') 
							{
								?>
								<li><a href="<?php echo base_url('index.php/Dashboard/tampil_kasir'); ?>" class=""><i class="fa fa-paper-plane-o"></i> <span>Verifikasi</span></a></li>
								<li><a href="<?php echo base_url('index.php/Dashboard/tampil_nota'); ?>" class=""><i class="fa fa-credit-card"></i> <span>Laporan</span></a></li>

						<?php		
							}
							else if ($this->session->userdata('nama_level') == 'admin')
							{
								?>
									<li><a href="<?php echo base_url('index.php/Dashboard'); ?>" class=""><i class="fa fa-home"></i> <span>Beranda</span></a></li>
									<li><a href="<?php echo base_url('index.php/Masakan'); ?>" class=""><i class="fa fa-thumbs-up"></i> <span>Masakan</span></a></li>
									<li><a href="<?php echo base_url('index.php/Pelanggan'); ?>" class=""><i class="lnr lnr-user"></i> <span>Pelanggan</span></a></li>
									<li><a href="<?php echo base_url('index.php/Dashboard/tampil_kasir'); ?>" class=""><i class="fa fa-paper-plane-o"></i> <span>Verifikasi</span></a></li>
									<li><a href="<?php echo base_url('index.php/Dashboard/tampil_nota'); ?>" class=""><i class="fa fa-credit-card"></i> <span>Laporan</span></a></li>

						<?php		
							}
							else
							{
								?>
								
								<li><a href="#" class=""><i class="fa fa-shopping-bag"></i> <span>Pemesanan</span></a></li>
								<li> 
									<a href=""><i class="fa fa-shopping-cart"></i> <span id="cart" style="font-size: 30px">0</span> Keranjang</a>
								</li>
						<?php		
							}
							    ?>

					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">


					<?php
               			 $this->load->view($konten);
            			?>
					</div>
					
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	
	<script src="<?= base_url()?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?= base_url()?>assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?= base_url()?>assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="<?= base_url()?>assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="<?= base_url()?>assets/scripts/klorofil-common.js"></script>
	<script type="text/javascript">
		//show total cart
		
	</script>
</body>

</html>
