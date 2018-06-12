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
								<li class=""><a href="masterdata.php">Master Data</a></li>	
								<li class="active"><a href="kelolaakun.php">Kelola Akun</a></li>
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
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<h2 class="h-bold" style="margin-top:50px;" align="center">Data Ahli Bekam</h2>
					<div class="divider-header"></div>
			</div>
		</div>
		<section>
			<div class="col-lg-8 col-lg-offset-2">
				<div class="panel panel-primary alert-info">
					<div class="panel-heading"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;DATA AHLI BEKAM</div>
						<div class="panel-body">	
							<div class="table-responsive">
							<table id="example1" class="table table-bordered" style="background-color:#fff" >
							<?php
							if(isset($_GET['aksi']) == 'delete'){
								$id = $_GET['iduser'];
								$cek = mysqli_query($koneksi,"SELECT * FROM user WHERE iduser='$id'")or die(mysqli_error());
								if(mysqli_num_rows($cek) == 0){
									echo '<div class="alert alert-info">Data tidak ditemukan.</div>';
								}else{
									$delete = mysqli_query($koneksi,"DELETE FROM user WHERE iduser='$id'")or die(mysqli_error());
									if($delete){
										echo '<div class="alert alert-danger">Data berhasil dihapus.</div>';
									}else{
										echo '<div class="alert alert-info">Data gagal dihapus.</div>';
									}
								}
							}
							?>
							<a href="tambahahli.php" type="button" class="btn btn-primary">Tambah data</a>
							  <p>
							<thead>
								<th>No</th>
								<th>Nama</th>
								<th>ID user</th>
								<th>Action</th>
							</thead>
							<?php
							$sql = mysqli_query($koneksi ,"SELECT * FROM user WHERE status='user'")or die(mysqli_error());
							if(mysqli_num_rows($sql) > 0){
							$no = 1;
							while($data = mysqli_fetch_assoc($sql)){
							echo'<tr bgcolor="#fff">
									<td align="center">'.$no.'</td>
									<td align="center">'.$data['nama'].'</td>
									<td align="center">'.$data['iduser'].'</td>
									<td align="center">
									<a href="editahli.php?id='.$data['iduser'].'"><button class="btn btn-warning btn-sm">ubah</button></a>  
									<a href="kelolaakun.php?aksi=delete&iduser='.$data['iduser'].'"onclick="return confirm(\'Yakin?\')"><button type="button" class="btn btn-danger">HAPUS</button></a>
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
			</div>
		</section>				
	</div>
	<!-- Modal -->
	<!-- <div class="modal fade bs-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel">Hapus Ahli Bekam?</h4>
		  </div>
		  <div class="modal-body" align="center">
			<a href=""><button type="button" class="btn btn-success btn-sm">Ya</button></a>
			<button type="button" class="btn btn-danger btn-sm btn-lg" data-dismiss="modal">Tidak</button>
		  </div>
		  <div class="modal-footer">
		  </div>
		</div>
	  </div>
	</div> -->
	
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
				<b>Copyirght © Bekam Learning Center</b> All rights reserved</p>
			</div>
		</div>
	</div>	
</html>
<?php }?>

