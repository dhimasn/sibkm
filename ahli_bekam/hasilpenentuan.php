<!DOCTYPE html>
<?php
	//KONEKSI
	session_start();
	if ( !isset($_SESSION) ||$_SESSION['status'] !== 'user') {
		header('Location: ../index.php');
	exit;
	} else {
		include("../config.php");
    //CEK KONEKSI
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
      <script src="../js/html5shiv.min.js"></script>
      <script src="../js/respond.min.js"></script>
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
      <!-- /Navigation -->
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="animatedParent">
					<h2 class="h-bold" style="margin-top:50px;" align="center">Hasil Penentuan</h2>
				<div class="divider-header"></div>
			</div>
		</div>
	</div>
<section>
	<div class="col-sm-12" >
	<div class="panel panel-primary alert-info">
		<div class="panel-heading"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;HASIL PENENTUAN</div>
			<div class="panel-body">
			<?php
			if(isset($_GET['aksi']) == 'delete'){
				$idpasien = $_GET['idpasien'];
				$cek = mysqli_query($koneksi, "SELECT * FROM pasien WHERE idpasien='$idpasien'") or die(mysqli_error());
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-info">Data tidak ditemukan.</div>';
				}else{
					$delete = mysqli_query($koneksi, "DELETE FROM pasien WHERE idpasien='$idpasien'") or die(mysqli_error());
					$delete1 = mysqli_query($koneksi, "DELETE FROM rating_pasien WHERE idpasien='$idpasien'") or die(mysqli_error());
					$delete2 = mysqli_query($koneksi, "DELETE FROM diagnosa WHERE idpasien='$idpasien'") or die(mysqli_error());
					if($delete && $delete1 && $delete2){
						echo '<div class="alert alert-danger">Data berhasil dihapus.</div>';
					}else{
						echo '<div class="alert alert-info">Data gagal dihapus.</div>';
					}
				}
			}
			?>	
				<div class="table-responsive">
					<span id="tblArea">
							<table id="example1" class="table table-bordered table-condensed table-hover" style="background-color:#fff" cellspacing="0" width="100%" >
								<thead>
									<th>No</th>
									<th>Id pasien</th>
									<th>Nama</th>
									<th>Nama gangguan</th>
									<th>Solusi gangguan</th>
									<th>Nilai FSAW</th>
									<th>Action</th>
								</thead>
							<?php
							$sql = mysqli_query($koneksi,
							"SELECT
								diagnosa.idpasien,
								diagnosa.id_gangguan_kesehatan,
								diagnosa.nilai_fsaw,
								pasien.nama,
								gangguan_kesehatan.nama_gangguan_kesehatan,
								gangguan_kesehatan.solusi_gangguan_kesehatan
							FROM
								diagnosa
							JOIN pasien ON diagnosa.idpasien = pasien.idpasien
							JOIN gangguan_kesehatan ON diagnosa.id_gangguan_kesehatan = gangguan_kesehatan.id_gangguan_kesehatan") or die(mysqli_error());
							if(mysqli_num_rows($sql) > 0){
							$no = 1;
							while($data = mysqli_fetch_assoc($sql)){
							echo'<tr bgcolor="#fff">
									<td align="center">'.$no.'</td>
									<td align="center">'.$data['idpasien'].'</td>
									<td align="center">'.$data['nama'].'</td>
									<td align="center">'.$data['nama_gangguan_kesehatan'].'</td>
									<td align="center">'.$data['solusi_gangguan_kesehatan'].'</td>
									<td align="center">'.$data['nilai_fsaw'].'</td>
									<td align="center">
									<a href="detailhasil.php?id='.$data['idpasien'].'"><button class="btn btn-info btn-sm">Detail</button></a>	
									<a href="hasilpenentuan.php?aksi=delete&idpasien='.$data['idpasien'].'"onclick="return confirm(\'Yakin?\')"><button type="button" class="btn btn-danger" aria-label="delete">HAPUS</button></a>
									</td>
								</tr>';
							$no++;
								}
							}
							?>
							</table>
							<span id="tblArea">
						</div>
					</div>
				</div>	
			</div>
		</div>
	</div>
	</section>
    <!-- Core JavaScript Files -->
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../data_tables/js/jquery.dataTables.min.js"></script>
	<script src="../data_tables/js/dataTables.bootstrap.js"></script>	
	<script type="text/javascript">
            $(function() {
                $('#example1').dataTable();
            });
	</script>	
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
