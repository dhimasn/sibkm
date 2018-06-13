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
	  <p>
	  <!-- /Navigation -->
	  <div class="container">
		<div id="content">
			<ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
				<li class="active"><a href="#tab-1" data-toggle="tab">Data Gangguan Kesehatan</a></li>
				<li><a href="#tab-3" data-toggle="tab">Kepentingan Kriteria</a></li>
				<li><a href="#tab-4" data-toggle="tab">Kepentingan Alternatif</a></li>
			</ul>
				<div id="my-tab-content" class="tab-content">
					<div class="tab-pane active" id="tab-1">
						<div class="container">
							<div class="row">
								 <div class="col-lg-8 col-lg-offset-2">						
									<h2 class="h-bold" style="margin-top:50px;" align="center">Data Gangguan Kesehatan</h2>
									<div class="divider-header"></div>
								</div>
							</div>
						<section>
							<div class="col-lg-12">
								<div class="panel panel-primary alert-info">
									<div class="panel-heading"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;DATA GANGGUAN KESEHATAN</div>
										<div class="panel-body">	
											<div class="table-responsive">
												<table id="example1" class="table table-bordered" style="background-color:#fff" cellspacing="0" width="100%" >
										  <p>
											<thead>
												<th>No</th>
												<th>ID</th>
												<th>Nama Gangguan Kesehatan</th>							
												<th>Solusi Gangguan Kesehatan</th>
												<th>Aksi</th>
											</thead>
										<?php
										$sql = mysqli_query($koneksi ,"SELECT nama_gangguan_kesehatan,id_gangguan_kesehatan,alternatif,solusi_gangguan_kesehatan FROM gangguan_kesehatan") or die(mysqli_error());
										if(mysqli_num_rows($sql) > 0){
										$no = 1;
										while($data = mysqli_fetch_assoc($sql)){
										echo'<tr bgcolor="#fff">
												<td align="center">'.$no.'</td>
												<td align="center">'.$data['alternatif'].'</td>
												<td align="center">'.$data['nama_gangguan_kesehatan'].'</td>
												<td align="center">'.$data['solusi_gangguan_kesehatan'].'</td>
												<td align="center"> 
												<a href="detailgk.php?id='.$data['id_gangguan_kesehatan'].'"><button class="btn btn-info btn-sm">Detail</button></a> 
												<a href="editgk.php?id='.$data['id_gangguan_kesehatan'].'"><button class="btn btn-warning btn-sm">ubah</button></a>
												</td>
											</tr>';
										$no++;
											}
										}
										?>
										</table>
											</div>
										</div>
									</div>
								</div>
							</section>
						</div>
					</div>
					<div class="tab-pane" id="tab-3">
						<div class="container">
							<div class="row">
								 <div class="col-lg-8 col-lg-offset-2">
									<h2 class="h-bold" style="margin-top:50px;" align="center">Kepentingan Kriteria</h2>
									<div class="divider-header"></div>
								</div>
							</div>
						<section>
						<div class="col-lg-12">
						<div class="panel panel-primary alert-info">
							<div class="panel-heading"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;KEPENTINGAN KRITERIA</div>
								<div class="panel-body">	
									<div class="table-responsive">
										<table id="example2" class="table table-bordered" style="background-color:#fff" cellspacing="0" width="100%" >
										  <p>
											<thead>
												<th>No</th>
												<th>ID kriteria</th>
												<th>Kepentingan</th>
												<th>Keterangan Kepentingan</th>
												<th>TFN LMU</th>
												<th>Aksi</th>
											</thead>
										<?php
										$sql = mysqli_query($koneksi ,"SELECT idtfn,kepentingan,ket_kepentingan,tfn_lmu FROM rating")or die(mysqli_error());
										if(mysqli_num_rows($sql) > 0){
										$no = 1;
										while($data = mysqli_fetch_assoc($sql)){
										echo'<tr bgcolor="#fff">
												<td align="center">'.$no.'</td>
												<td align="center">'.$data['idtfn'].'</td>
												<td align="center">'.$data['kepentingan'].'</td>
												<td align="center">'.$data['ket_kepentingan'].'</td>
												<td align="center">'.$data['tfn_lmu'].'</td>
												<td align="center"> 
												<a href="editkriteria.php?id='.$data['idtfn'].'"><button class="btn btn-warning btn-sm">ubah</button></a>
												</td>
											</tr>';
										$no++;
											}
										}
										?>
										</table>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
				<div class="tab-pane" id="tab-4">
					<div class="container">
						<div class="row">
							 <div class="col-lg-8 col-lg-offset-2">
								<h2 class="h-bold" style="margin-top:50px;" align="center">Kepentingan Alternatif</h2>
								<div class="divider-header"></div>
							</div>
						</div>
					<section>
					<div class="col-lg-12">
						<div class="panel panel-primary alert-info">
							<div class="panel-heading"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;KEPENTINGAN ALTERNATIF</div>
								<div class="panel-body">	
									<div class="table-responsive">
									<table id="example3" class="table table-bordered" style="background-color:#fff" cellspacing="0" width="100%" >
									  <p>
										<thead>
											<th>No</th>
											<th>ID kriteria</th>
											<th>Kepentingan</th>
											<th>Keterangan Kepentingan</th>
											<th>TFN LMU</th>
											<th>Aksi</th>
										</thead>
									<?php
									$sql = mysqli_query($koneksi ,"SELECT id_kriteria,kepentingan,ket_kepentingan,tfn_lmu FROM bobot")or die(mysqli_error());
									if(mysqli_num_rows($sql) > 0){
									$no = 1;
									while($data = mysqli_fetch_assoc($sql)){
									echo'<tr bgcolor="#fff">
											<td align="center">'.$no.'</td>
											<td align="center">'.$data['id_kriteria'].'</td>
											<td align="center">'.$data['kepentingan'].'</td>
											<td align="center">'.$data['ket_kepentingan'].'</td>
											<td align="center">'.$data['tfn_lmu'].'</td>
											<td align="center"> 
												<a href="editatt.php?id='.$data['id_kriteria'].'"><button class="btn btn-warning btn-sm">ubah</button></a>
											</td>
										</tr>';
									$no++;
										}
									}
									?>
									</table>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
	</div>
	</div>
	<!-- Core JavaScript Files -->
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../data_tables/js/jquery.dataTables.min.js"></script>
	<script src="../data_tables/js/dataTables.bootstrap.js"></script>	
	<script type="text/javascript">
			$(function() {
                $('#example1').dataTable();
            });
			$(function() {
                $('#example2').dataTable();
            });
			$(function() {
                $('#example3').dataTable();
            });
			jQuery(document).ready(function ($) {
				$('#tabs').tab();
			});
	</script>		
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

