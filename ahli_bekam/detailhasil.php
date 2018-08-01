<!DOCTYPE html>
<?php 
    //koneksi
	session_start();
	if ( !isset($_SESSION) ||$_SESSION['status'] !== 'user') {
		header('Location: ../index.php');
	exit;
	} else {
    include("../config.php");
    //cek koneksi
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
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="../js/html5shiv.min.js"></script>
      <script src="../js/respond.min.js"></script>
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
								<li><a href="penentuan.php">Diagnosa</a></li>
								<li class="active"><a href="hasilpenentuan.php">Hasil Diagnosa</a></li>						
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
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="animatedParent">
						<h2 class="h-bold" style="margin-top:50px;" align="center">Detail Hasil</h2>
					<div class="divider-header"></div>
				</div>
			</div>
		</div>
		<div class="row">
		<div class="col-lg-7">
			<div class="panel panel-primary">
				<div class="panel-heading"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;Gambar Titik Bekam</div>
				<div class="panel-body">	
					<?php
						$id = $_GET['id'];
						$sql = mysqli_query($koneksi,
							"SELECT
								diagnosa.id_gangguan_kesehatan,
								diagnosa.nilai_A1,
								diagnosa.nilai_A2,
								diagnosa.nilai_A3,
								diagnosa.nilai_A4,
								diagnosa.nilai_A5,
								diagnosa.nilai_A6,
								diagnosa.nilai_fsaw,								
								gangguan_kesehatan.nama_gangguan_kesehatan,
								gangguan_kesehatan.solusi_gangguan_kesehatan,
								gangguan_kesehatan.titik_bekam								
							FROM
								diagnosa
							JOIN gangguan_kesehatan ON diagnosa.id_gangguan_kesehatan = gangguan_kesehatan.id_gangguan_kesehatan 
							WHERE idpasien=".$id."")or die(mysqli_error());
						$data = mysqli_fetch_assoc($sql);
						if(mysqli_num_rows($sql) > 0){
						$sql1 = mysqli_query($koneksi,"SELECT * FROM pasien WHERE idpasien=".$id."")or die(mysqli_error());
						$row = mysqli_fetch_assoc($sql1);}	
						?>
						<div class="table-responsive" align="center">
						<div class="col-lg-12" align="center">
						<div class="animatedParent">
							<h6 class="h-bold" align="center">Disarankan Untuk Melakukan Terapi Bekam Pada Titik</h6>
						</div>
						<table class="table table-danger">
							<td>
								<a class="thumbnail" href="#">
									<img class="img-responsive" src="<?php echo $data['titik_bekam'];?>" alt="">
								</a>
							</td>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-5">
			<div class="panel panel-primary">
					<div class="panel-heading"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;Detail Hasil Diagnosa</div>
						<div class="panel-body" align="center">
						<div id="print-area-1" class="print-area">						
						<div class="animatedParent">
							<h6 class="h-bold" align="center">Data Pasien</h6>
						</div>
						<table class="table table-danger" align="center">
							<tr>
								<td><b>Nama</b></td>
								<td>:</td>
								<td><b><?php echo $row['nama']; ?></b></td>
							</tr>
							<tr>
								<td><b>No</b></td>
								<td>:</td>
								<td><b><?php echo $row['no']; ?></b></td>
							</tr>
							<tr>
								<td><b>Umur</b></td>
								<td>:</td>
								<td><b><?php echo $row['umur']; ?></b></td>
							</tr>
							<tr>
								<td><b>Kelamin</b></td>
								<td>:</td>
								<td><b><?php  if($row['kelamin']=='L')
											echo 'Laki-Laki';
											else 
											echo 'Perempuan';?></b></td>
							</tr>
							<tr>
								<td><b>alamat</b></td>
								<td>:</td>
								<td><b><?php echo $row['alamat']; ?></b></td>
							</tr>
							<tr>
								<td><b>Keluhan<b></td>
								<td>:</td>
								<td><b><?php echo $row['keluhan']; ?></b></td>
							</tr>
						</table>
						<div class="animatedParent">
							<h6 class="h-bold" align="center">Nilai Prefensi</h6>
						</div>
						<table class="table table-danger" align="center">
							<tr>
								<td><b>Gangguan pada Kolesterol</b></td>
								<td>:</td>
								<td><b><?php echo round($data['nilai_A1'],5); ?></b></td>
							</tr>
							<tr>
								<td><b>Gangguan pada Usus Besar</b></td>
								<td>:</td>
								<td><b><?php echo round($data['nilai_A2'],5); ?></b></td>
							</tr>
							<tr>
								<td><b>Hormon tidak seimbang</b></td>
								<td>:</td>
								<td><b><?php echo round($data['nilai_A3'],5); ?></b></td>
							</tr>
							<tr>
								<td><b>Gangguan pada Ginjal</b></td>
								<td>:</td>
								<td><b><?php echo  round($data['nilai_A4'],5); ?></b></td>
							</tr>
							<tr>
								<td><b>Daya tahan tubuh lemah</b></td>
								<td>:</td>
								<td><b><?php echo  round($data['nilai_A5'],5); ?></b></td>
							</tr>
							<tr>
								<td><b>Gangguan pada Jantung</b></td>
								<td>:</td>
								<td><b><?php echo  round($data['nilai_A6'],5); ?></b></td>
							</tr>
						</table>
						<div class="animatedParent">
							<h6 class="h-bold" align="center">Solusi Herbal</h6>
						</div>
						<table class="table table-danger" align="center">
							<tr>
								<td><b><?php echo $data['solusi_gangguan_kesehatan']; ?></b></td>
							</tr>	
						</table>
						<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
						<div class="col-lg-6 col-lg-offset-3">
								<a href="hasilpenentuan.php" class="btn btn-success btn-sm" id="batal">Kembali</a>
								<a class="no-print btn btn-sm btn-warning" href="javascript:printDiv('print-area-1');" ><span class="glyphicon glyphicon-print"></span> Cetak</a>
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
					<b>Copyirght © Bekam Holistic Center</b> All rights reserved
				</div>
			</div>
		</div>	
	</html>
	<?php }?>