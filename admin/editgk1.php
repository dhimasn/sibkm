<!DOCTYPE html>
<?php 
//koneksi
	session_start();
	if ( !isset($_SESSION) ||$_SESSION['status'] !== 'admin') {
		header('Location: ../index.php');
	exit;
	} else {
	include("../config.php");
	$id = $_GET['id'];
	$sql = mysqli_query($koneksi,"SELECT * FROM gangguan_kesehatan WHERE id_gangguan_kesehatan=".$id."");
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
	  <!-- /Navigation -->
	  <p>
	  <p> 
		 <div class="container">
			<div id="content">
				<ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
					<li><?php echo '<a href="editgk.php?id='.$id.'">Ubah Data Gangguan Kesehatan</a>'?></li>
					<li class='active'><?php echo '<a href="editgk1.php?id='.$id.'">Ubah Gambar Titik Bekam</a>'?></li>
				</ul>
				<p>
				<p>
					 <!-- TAB PANE DATA GANGGUAN KESEHATAN -->				
						<div class="container">
							<div class="row">
								<div class="col-lg-8 col-lg-offset-2">
									<h2 class="h-bold" style="margin-top:50px;" align="center">Ubah Gambar Titik Bekam</h2>
									<div class="divider-header"></div>
								</div>
							</div>
					<div class="row">
						<div class="col-sm-10 col-lg-offset-1">
							<div class="panel panel-primary">
								<div class="panel-heading"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;Ubah Gambar Titik Bekam</div>
									<div class="panel-body">
										<div class="table-responsive">
										<table class="table table-danger">
										<?php
										  if (isset($_POST["submit"])){		  
										  $foto= $_FILES['foto']['name'];
										  $tmp = $_FILES['foto']['tmp_name'];
										  
										  //Rename nama fotonya dengan menambahkan tanggal dan jam upload
										  $fotobaru = date('dmYHis').$foto;
										  
										  //Set path folder tempat menyimpan fotonya
										  $path = "../gambar/".$fotobaru;

										  //Proses upload
										  if(move_uploaded_file($tmp, $path)){ 
											//Cek apakah gambar berhasil diupload atau tidak
											//Query untuk menampilkan data gangguan berdasarkan id yang dikirim
											$query = "SELECT * FROM gangguan_kesehatan WHERE id_gangguan_kesehatan='".$id."'";
											$sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
											$data = mysqli_fetch_array($sql); // Ambil data dari hasil eksekusi $sql

											//Cek apakah file foto sebelumnya ada di folder images
											if(is_file("../gambar/".$data['titik_bekam'])){ // Jika foto ada
											  unlink("../gambar/".$data['titik_bekam']); // Hapus file foto sebelumnya yang ada di folder images
											
											//Proses ubah data ke Database
											$query = "UPDATE gangguan_kesehatan SET titik_bekam='../gambar/".$fotobaru."' WHERE id_gangguan_kesehatan='".$id."'";
											$sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query

												if($sql){ // Cek jika proses simpan ke database sukses atau tidak
												  //Jika Sukses, Lakukan :
												  header("Location: editgk1.php?id=".$id."&pesan=sukses"); // Redirect ke halaman index.php
												}else{
												  // Jika Gagal, Lakukan :
												  echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
												}
											}
											else{
												// Jika gambar gagal diupload, Lakukan :
												echo "Maaf, Gambar gagal untuk diupload.";
												}
											}
											}
											if(isset($_GET['pesan'])){
												 echo '<div class="alert alert-success">Data berhasil diubah.</div>';
											}
										?>
										<form class="form-horizontal"  method="post" enctype="multipart/form-data">
										<tr>
											<td>
											<img src="<?php echo $row['titik_bekam']; ?>" border="0"/> 
											</td>
										</tr>
										<tr colspan="3">
										<td>Foto</td>
										<td><input type="file" name="foto" required/></td>
										</tr>
										<tr colspan="3">
											 <td>
											 <a href="masterdata.php" class="btn btn-danger btn-sm" id="batal">BATAL</a>	
											 <button type="submit" name="submit" class="btn btn-warning btn-sm" value="Submit">KIRIM</button>
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
	</div>
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

