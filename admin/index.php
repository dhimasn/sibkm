<!DOCTYPE html>
<?php 
	//koneksi
	session_start();
	if ( !isset($_SESSION) ||$_SESSION['status'] !== 'admin') {
		header('Location: ../index.php');
	exit;
	} else {
		include("../config.php");
?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<script type="text/javascript" src="prmajax.js"></script>
	<title>SI BEKAM</title>
	<!-- css -->
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
	<link href="../color/default.css" rel="stylesheet">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body data-target=".navbar-custom">
		<!-- Navigation -->
			<div id="navigation">
				<nav class="navbar navbar-default" role="navigation">
					<div class="container">
						<div class="row">
							<div class="col-md-2">
								<div class="site-logo">
									<a href="index.php" class="brand">SI BEKAM</a>
								</div>
							</div>
								<div class="col-md-10">
									<!-- Brand and toggle get grouped for better mobile display -->
									<div class="navbar-header">
									<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
									<i class="fa fa-bars"></i>
									</button>
								</div>
								<!-- Collect the nav links, forms, and other content for toggling -->
								<div class="collapse navbar-collapse" id="menu">
								<ul class="nav navbar-nav navbar-right">
									<li class="active"><a href="index.php">Beranda</a></li>
									<li ><a href="masterdata.php">Master Data</a></li>	
									<li ><a href="kelolaakun.php">Kelola Akun</a></li>
									<li><a href="bantuan.php">Bantuan</a></li>
									<li><a> </a></li>
									<li>
									<div class="btn-group pull-right">
										<button class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
											<i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs">Admin</span>
											<span class="caret"></span>
										</button>
										<ul class="dropdown-menu">
											<li><a href="#"><?php echo ($_SESSION['nama']); ?></a></li>
											<li class="divider"></li>
											<li><a href="logout.php">Logout</a></li>
										</ul>
									</div>
									</li>
								</ul>
							  </div>
								<!-- /.Navbar-collapse -->
								</div>
							</div>
						</div>
					<!-- /.container -->
				</nav>
			</div>
			<!-- /Navigation -->
				<!-- Section: about -->
			<section id="about" class="home-section color-dark bg-white">
			<div class="container marginbot-50">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2">
							<h2 class="h-bold" align="center">Selamat Datang</h2>
							<div class="divider-header"></div>
					</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2">
						<p>Bekam merupakan salah satu metode pengobatan yang diajarkan oleh Rasulullah SAW dengan cara mengeluarkan darah kotor yang terkontaminasi  oksidan dari dalam tubuh melalui permukaan kulit. Dalam istilah medis dikenal dengan istilah Oxidant Release therapy</p>
						<p>Sistem Pendukung Keputusan Penentuan Gangguan Kesehatan Terapi Bekam Diagnosa Telapak Tangan Menggunakan Metode Fuzzy Simple Additive Weighting (FSAW). Membantu Ahli bekam dalam menentukan gangguan kesehatan menggunakan diagnosa Telapak Tangan</p>
						<p>Terima Kasih</p>
					</div>
				</div>
			</section>
	<!-- Core JavaScript Files -->
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
	<div class="container">
		<div class="row">
			<div class="text-right">
				<b>Copyirght © Bekam Learning Center</b> All rights reserved</p>
			</div>
		</div>
	</div>	
</html>
<?php }?>

