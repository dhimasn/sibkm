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
	<script type="text/javascript">
    function printDiv(elementId) {
    var a = document.getElementById('print-area-1').value;
    var b = document.getElementById(elementId).innerHTML;
    window.frames["print_frame"].document.title = document.title;
    window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
    window.frames["print_frame"].window.focus();
    window.frames["print_frame"].window.print();
	}
	</script>
<body>
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
								<li class="active"><a href="hasilpenentuan.php">Hasil SPKGK</a></li>						
								<li><a href="bantuan.php">Bantuan</a></li>
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
	
	<div id="print-area-1" class="print-area">
	<div class="container">
	
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<h2 class="h-bold" style="margin-top:50px;" align="center">Detail Hasil Pasien</h2> 
					<div class="divider-header"></div>
			</div>
		</div>
		
		<div class="row">
		<div class="col-lg-8 col-lg-offset-2">
			<div class="panel panel-primary">
				<div class="panel-heading"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;Detail Hasil Pasien</div>
				<div class="panel-body">	
					<?php
						$id = $_GET['idpasien'];
						$sql = mysqli_query($koneksi,
							"SELECT
								diagnosa.idpasien,
								diagnosa.id_gangguan_kesehatan,
								diagnosa.nilai_fsaw,
								diagnosa.hasil_akhir,
								pasien.nama,
								gangguan_kesehatan.nama_gangguan_kesehatan,
								gangguan_kesehatan.solusi_gangguan_kesehatan,
								gangguan_kesehatan.titik_bekam								
							FROM
								diagnosa
							JOIN pasien ON diagnosa.idpasien = pasien.idpasien
							JOIN gangguan_kesehatan ON diagnosa.id_gangguan_kesehatan = gangguan_kesehatan.id_gangguan_kesehatan");
						$data = mysqli_fetch_assoc($sql);
						
						if(mysqli_num_rows($sql) > 0){
						$sql1 = mysqli_query($koneksi,"SELECT * FROM pasien WHERE idpasien=".$id."");
						$row = mysqli_fetch_assoc($sql1);}	
						?>
						<img src="<?php echo $data['titik_bekam'];?>"/></img> 
				<div class="col-lg-6">				
					<div class="table-responsive">	
						<table class="table table-danger">
								<tr>
								 <td>Nama</td>
								 <td>:</td>
								 <td><?php echo $row['nama']; ?></td>
								</tr>
								<tr>
								 <td>No Handphone</td>
								 <td>:</td>
								 <td><?php echo $row['no']; ?></td>
								</tr>
								<tr>
								 <td>Umur</td>
								 <td>:</td>
								 <td><?php echo $row['umur']; ?></td>
								</tr>
								<tr>
								 <td>Kelamin</td>
								 <td>:</td>
								 <td><?php echo $row['kelamin']; ?></td>
								</tr>
								<tr>
								 <td>Alamat</td>
								 <td>:</td>
								 <td><?php echo $row['alamat']; ?></td>
								</tr>
								<tr>
								 <td>Keluhan</td>
								 <td>:</td>
								 <td><?php echo $row['keluhan']; ?></td>
								</tr>
								<tr colspan="3">
								<td>
									<a href="hasilpenentuan.php" class="btn btn-success btn-sm" id="batal">Kembali</a>
									<a class="no-print btn btn-sm btn-warning" href="javascript:printDiv('print-area-1');" ><span class="glyphicon glyphicon-print"></span> Cetak</a>
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
	<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
	<!-- Core JavaScript Files -->
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	</body>
		<div class="container">
			<div class="row">
				<div class="text-right">
					<b>Copyirght © Bekam Learning Center</b> All rights reserved
				</div>
			</div>
		</div>	
	</html>
	<?php }?>