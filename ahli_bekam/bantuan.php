<!DOCTYPE html>
<?php
	//koneksi
	session_start();
	if ( !isset($_SESSION) ||$_SESSION['status'] !== 'user') {
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
	<script type="text/javascript" src="../prmajax.js"></script>
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
<body>
	<!-- Navigation -->
	<div id="navigation">
	<nav class="navbar navbar-default" role="navigation">
		<div class="container">
			<div class="row">
				<div class="col-md-2">
					<div class="site-logo">
						<a href="beranda.php" class="brand">SI BEKAM</a>
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
						<li><a href="beranda.php">Beranda</a></li>
						<li><a href="penentuan.php">SPKGK</a></li>
						<li><a href="hasilpenentuan.php">Hasil SPKGK</a></li>						
						<li class="active"><a href="bantuan.php">Bantuan</a></li>
						<li><a> </a></li>
						<li>
						<div class="btn-group pull-right">
							<button class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
								<i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs">Pengguna</span>
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
		<div class="col-lg-6">
		<div class="panel panel-primary alert-info">
			<div class="panel-heading"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;Beranda</div>
			<div class="panel-body">	
				<p>Menu Beranda berisi informasi mengenai gangguan kesehatan terdapat beberapa penjelasan mengenai gambaran dari  gangguan kesehatan.<p>
			</div>
		</div>
		</div>
		<div class="col-lg-6">
		<div class="panel panel-primary alert-info">
		<div class="panel-heading"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;SPK GK</div>
		<div class="panel-body">
				<p>Menu SPK GK sebuah Step form yang digunakan ahli bekam untuk menentukan gangguan pada kesehatan yang tepat pada pasien berdasarkan kriteria yang dibutuhkan sistem penentuan gangguan kesehatan. Ahli Bekam di minta untuk menginputkan data sesuai dengan kondisi fisik pasien selanjutnya sistem akan menampilkan hasil gangguan kesehatan yang di diderita pasien beserta solusinya.</p>
		</div>
		</div>
		</div>
		<div class="col-lg-6">
		<div class="panel panel-primary alert-info">
			<div class="panel-heading"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;Hasil SPK GK</div>
			<div class="panel-body">	
				<p>Menu Hasil SPK GK berisikan informasi hasil penentuan gangguan kesehatan pada pasien yang telah ditentukan berdasarkan metode Fuzzy Simple Additive Weighting Diagnosa Telapak Tangan<p>
			</div>
		</div>
		</div>
		<div class="col-lg-6">
		<div class="panel panel-primary alert-info">
		<div class="panel-heading"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;Bantuan</div>
		<div class="panel-body">
				<p>Menu bantuan berisikan informasi terkait sistem dan menu yang ada.</p>
		</div>
		</div>
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

