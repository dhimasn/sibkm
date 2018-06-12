<!DOCTYPE html>
<?php 
//koneksi
	session_start();
	if ( !isset($_SESSION) ||$_SESSION['status'] !== 'admin') {
		header('Location: ../index.php');
	exit;
	} else {
		include("../config.php");
		if ($koneksi->connect_errno){ 
			die ("Could not connect to the database: <br />". $koneksi>connect_error); 
		}
		$id = $_GET['id'];
		$sql = mysqli_query($koneksi,"SELECT * FROM gangguan_kesehatan WHERE id_gangguan_kesehatan=".$id."") or die(mysqli_error());
		$row = mysqli_fetch_array($sql);
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
	<link href="../data_tables/css/dataTables.bootstrap.css" rel="stylesheet">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<!-- koneksi  -->
<body>
	<!-- Navigation -->
	<div id="navigation">
		<nav class="navbar navbar-default" role="navigation">
			  <div class="container">
					<div class="row">
						  <div class="col-md-2">
								<div class="site-logo">
									<a href="index.html" class="brand">SI BEKAM</a>
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
						  <div class="collapse navbar-collapse">
							<ul class="nav navbar-nav navbar-right">
								<li><a href="index.php">Beranda</a></li>
								<li class="active"><a href="masterdata.php">Master Data</a></li>	
								<li><a href="kelolaakun.php">Kelola Akun</a></li>
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
	  <p>
	  <p>
		  <div class="container">
			<div id="content">
				<ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
					<li class="active"><a href="#tab-1" data-toggle="tab">Data Gangguan Kesehatan</a></li>
					<li><a href="#tab-2" data-toggle="tab">Gambar Titik Bekam</a></li>
				</ul>	
	 <p>
	 <p>
	<div id="my-tab-content" class="tab-content">
		<div class="tab-pane active" id="tab-1">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2">
						<h2 class="h-bold" style="margin-top:50px;" align="center">Data Gangguan Kesehatan</h2>
				<div class="divider-header"></div>
			</div>
		</div>
		<!-- TAB PANE DATA GANGGUAN KESEHATAN -->
		<div class="row">	
			<div class="col-sm-8 col-lg-offset-2">
				<div class="panel panel-primary">
					<div class="panel-heading"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;Data Gangguan Kesehatan</div>
				<div class="panel-body">
					<div class="table-responsive">		
						<table class="table table-danger">
							<form class="form-horizontal" method="post">
								<tr>
									 <td><label>ID</label></td>
									 <td>:</td>
									 <td><?php echo $row['id_gangguan_kesehatan']; ?></td>
								</tr>
								<tr>
									 <td><label>Jenis Gangguan Kesehatan</label></td>
									 <td>:</td>
									 <td><?php echo $row['nama_gangguan_kesehatan']; ?></td>
								</tr>
								<tr>
									 <td><label>Solusi Gangguan Kesehatan</label></td>
									 <td>:</td>
									 <td><?php echo $row['solusi_gangguan_kesehatan']; ?></td>
								</tr>
								<tr>
									<td><label>1.Tingkat Warna Gelap pada jari-jari</label></td>
									<td>:</td>
									<td><?php echo $row['c1']; ?></td>
								</tr>
								<tr>
									<td><label class="main">2.Tingkat Warna Gelap pada telapak tangan</label></td>						
									<td>:</td>
									<td><?php echo $row['c2']; ?></td>
								</tr>
								<tr>
									<td><label>3.Tingkat bintik-bintik merah/putih pada telapak tangan</</label></td>
									<td>:</td>
									<td><?php echo $row['c3']; ?></td>
								</tr>
								<tr>
									<td><label>4.Tingkat warna urat biru pada telapak tangan</label></td>						
									<td>:</td>
									<td><?php echo $row['c4']; ?></td>
								</tr>
								<tr>
									<td><label>5.Tingkat warna merah pucat pada telapak tangan</label></td>
									<td>:</td>
									<td><?php echo $row['c5']; ?></td>
								</tr>
								<tr>
									<td><label>6.Tingkat warna merah pada ruas ujung jari</label></td>						
									<td>:</td>
									<td><?php echo $row['c6']; ?></td>
								</tr>
								<tr>
									<td><label>7.Tingkat bengkok pada ibu jari</label></td>
									<td>:</td>
									<td><?php echo $row['c7']; ?></td>
								</tr>
								<tr>
									<td><label>8.Tingkat Bengkok pada jari kelingking</label></td>						
									<td>:</td>
									<td><?php echo $row['c8']; ?></td>
								</tr>
								<tr>
									<td><label>9.Tingkat Bengkok pada jari tengah</</label></td>
									<td>:</td>
									<td><?php echo $row['c9']; ?></td>
								</tr>
								<tr>
									<td><label>10.Tingkat Bengkok ke dalam pada ujung-ujung jari</label></td>						
									<td>:</td>
									<td><?php echo $row['c10']; ?></td>
								</tr>
								<tr>
									<td><label>11.Tingkat Bengkok pada jari telunjuk</label></td>
									<td>:</td>
									<td><?php echo $row['c11']; ?></td>
								</tr>
								<tr>
									<td><label>12.Tingkat Bengkok pada jari manis</label></td>						
									<td>:</td>
									<td><?php echo $row['c12']; ?></td>
								</tr>
								<tr>
									<td><label>13.Tingkat Kempot pada jari kelingking</label></td>
									<td>:</td>
									<td><?php echo $row['c13']; ?></td>
								</tr>
								<tr>
									<td><label>14.Tingkat Kempot pada ibu jari</label></td>						
									<td>:</td>
									<td><?php echo $row['c14']; ?></td>
								</tr>
								<tr>
									<td><label>15.Tingkat Keringat pada tangan</label></td>
									<td>:</td>
									<td><?php echo $row['c15']; ?></td>
								</tr>
								<tr>
									<td><label>16.Tingkat Nyeri pada tangan</label></td>						
									<td>:</td>
									<td><?php echo $row['c16']; ?></td>
								</tr>
								<tr colspan="3">
									<td>
									<a href="masterdata.php" class="btn btn-success btn-sm" id="batal">KEMBALI</a>
									</td>
								</tr>
							</form> 
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
	<!-- TAB PANE GAMBAR GANGGUAN KESEHATAN -->
	<div class="tab-pane" id="tab-2">
		<div class="container">
			<div class="col-lg-8 col-lg-offset-2">
				<h2 class="h-bold" style="margin-top:50px;" align="center">Gambar Titik Bekam</h2>
					<div class="divider-header"></div>
			</div>
		</div>
	<div class="row">
		<div class="col-sm-10 col-lg-offset-1">
			<div class="panel panel-primary">
				<div class="panel-heading"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;Gambar Titik Bekam</div>
					<div class="panel-body">
						<div class="table-responsive">
						<table class="table table-danger">
							<tr>
								<td>
									<img src="<?php echo $row['titik_bekam']; ?>" border="0"/> 
								</td>
							</tr>
							<tr colspan="3">
								<td>
									<a href="masterdata.php" class="btn btn-success btn-sm" id="batal">KEMBALI</a>
								</td>
							</tr>
						</table>
					</div>	
				</div>
			</div>	
		</div>
	</div>
	
				</div>	
			</div>
		</div>
	</div>
</div>
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

