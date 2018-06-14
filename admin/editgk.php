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
	$id  = $_GET['id'];
	$sql = mysqli_query($koneksi,"SELECT * FROM gangguan_kesehatan WHERE id_gangguan_kesehatan=".$id."") or die(mysqli_error());
	$row = mysqli_fetch_array($sql);
	function aman($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
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
					<li class="active"><?php echo '<a href="editgk.php?id='.$id.'">Ubah Data Gangguan Kesehatan</a>'?></li>
					<li><?php echo '<a href="editgk1.php?id='.$id.'">Ubah Gambar Titik Bekam</a>'?></li>
				</ul>
				<p>
				<p>
					 <!-- TAB PANE DATA GANGGUAN KESEHATAN -->
						<div class="container">
							<div class="row">
								<div class="col-lg-8 col-lg-offset-2">
									<h2 class="h-bold" style="margin-top:50px;" align="center">Ubah Data Gangguan Kesehatan</h2>
										<div class="divider-header"></div>
								</div>
							</div>
							<div class="row">	
								<div class="col-sm-10 col-lg-offset-1">
									<div class="panel panel-primary">
										<div class="panel-heading"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;Ubah Data Gangguan Kesehatan</div>
											<div class="panel-body"> 
											<?php
											//set variabel
											$namagk=$solusigk="";
											$c1=$c2=$c3=$c4=$c5=$c6=$c7=$c8=$c9=$c10=$c11=$c12=$c13=$c14=$c15=$c16="";
											if (isset($_POST["submit"])){
												//posting data	
												//$id 	   = aman($_POST['id']);
												$namagk	   = aman ($_POST['namagk']);
												$solusigk  = aman ($_POST['solusigk']);
												$c1=$_POST['c1'];
												$c2=$_POST['c2'];
												$c3=$_POST['c3'];
												$c4=$_POST['c4'];
												$c5=$_POST['c5'];
												$c6=$_POST['c6'];
												$c7=$_POST['c7'];
												$c8=$_POST['c8'];
												$c9=$_POST['c9'];
												$c10=$_POST['c10'];
												$c11=$_POST['c11'];
												$c12=$_POST['c12'];
												$c13=$_POST['c13'];
												$c14=$_POST['c14'];
												$c15=$_POST['c15'];
												$c16=$_POST['c16'];
												//$allowed_ext	= array('png','jpg');
												//$value 			= explode('.', $_FILES['file']['name']);
												//$ext 			= strtolower(array_pop($value));
												//$file_name		= array_shift($value);
												//$file_size		= $_FILES['file']['size'];
												//$file_tmp	 	= $_FILES['file']['tmp_name'];
												//update kedalam database
												$update = mysqli_query($koneksi,
												"UPDATE gangguan_kesehatan
												SET
													nama_gangguan_kesehatan = '$namagk',
													solusi_gangguan_kesehatan = '$solusigk',
													c1 = '$c1',
													c2 = '$c2',
													c3 = '$c3',
													c4 = '$c4',
													c5 = '$c5',
													c6 = '$c6',
													c7 = '$c7',
													c8 = '$c8',
													c9 = '$c9',
													c10 = '$c10',
													c11 = '$c11',
													c12 = '$c12',
													c13 = '$c13',
													c14 = '$c14',
													c15 = '$c15',
													c16 = '$c16'
												WHERE
												id_gangguan_kesehatan = '$id' ") or die(mysqli_error());
												if($update){
														//jika database dapat diinputkan
														header("Location: editgk.php?id=".$id."&pesan=sukses");
												}else{
														//jika ubah data gagal
														echo '<div class="alert alert-danger">Ubah Data gagal dilakukan, silahkan coba lagi.</div>';
													 }
												} 
											if(isset($_GET['pesan'])){
												 echo '<div class="alert alert-success">Data berhasil diubah.</div>';
											}
											?>
												<div class="table-responsive">		
												<table class="table table-danger">
												<form class="form-horizontal"  method="post" enctype="multipart/form-data">
													<tr>
													 <td><label>ID</label></td>
													 <td>:</td>
													 <td><?php echo $row['id_gangguan_kesehatan'];?></td>
													</tr>
													<tr>
													 <td><label>Jenis Gangguan Kesehatan</label></td>
													 <td>:</td>
													 <td><input type="text" value="<?php echo $row['nama_gangguan_kesehatan']; ?>" name="namagk" class="form-control" placeholder="jenis gangguan kesehatan" required></td>
													</tr>
													<tr>
													 <td><label>Solusi Gangguan Kesehatan</label></td>
													 <td>:</td>
													 <td><input type="text" value="<?php echo $row['solusi_gangguan_kesehatan']; ?>" name="solusigk" class="form-control" placeholder="solusi gangguan kesehatan" required></td>
													</tr>
													<tr>
													<td><label>1.Tingkat Warna Gelap pada jari-jari</label></td>
													<td>:</td>
													<td><select name="c1" class="form-control" required>
															<option value="<?php echo $row['c1']; ?>">bobot</option>
															<option value ="VL">Very low</option>
															<option value ="L">low</option>
															<option value ="M">Medium</option>
															<option value ="H">High</option>
															<option value ="MH">Very High</option>
														</select>
													</td>
													</tr>
													<tr>
													<td><label class="main">2.Tingkat Warna Gelap pada telapak tangan</label></td>						
													<td>:</td>
													<td><select  name="c2" class="form-control" required>
															<option value="<?php echo $row['c2']; ?>">bobot</option>
															<option value ="VL">Very low</option>
															<option value ="L">low</option>
															<option value ="M">Medium</option>
															<option value ="H">High</option>
															<option value ="MH">Very High</option>
														</select>
													</td>
													</tr>
													<tr>
													<td><label>3.Tingkat bintik-bintik merah/putih pada telapak tangan</</label></td>
													<td>:</td>
													<td><select  name="c3" class="form-control"required>
															<option value="<?php echo $row['c3']; ?>">bobot</option>
															<option value ="VL">Very low</option>
															<option value ="L">low</option>
															<option value ="M">Medium</option>
															<option value ="H">High</option>
															<option value ="MH">Very High</option>
														</select>
													</td>
													</tr>
													<tr>
													<td><label>4.Tingkat warna urat biru pada telapak tangan</label></td>						
													<td>:</td>
													<td><select  name="c4" class="form-control" required>
															<option value="<?php echo $row['c4']; ?>">bobot</option>
															<option value ="VL">Very low</option>
															<option value ="L">low</option>
															<option value ="M">Medium</option>
															<option value ="H">High</option>
															<option value ="MH">Very High</option>
														</select>
													</td>
													</tr>
													<tr>
													<td><label>5.Tingkat warna merah pucat pada telapak tangan</label></td>
													<td>:</td>
													<td><select  name="c5" class="form-control" required>
															<option value="<?php echo $row['c5']; ?>">bobot</option>
															<option value ="VL">Very low</option>
															<option value ="L">low</option>
															<option value ="M">Medium</option>
															<option value ="H">High</option>
															<option value ="MH">Very High</option>
														</select>
													</td>
													</tr>
													<tr>
													<td><label>6.Tingkat warna merah pada ruas ujung jari</label></td>						
													<td>:</td>
													<td><select  name="c6" class="form-control" required>
															<option value="<?php echo $row['c6']; ?>">bobot</option>
															<option value ="VL">Very low</option>
															<option value ="L">low</option>
															<option value ="M">Medium</option>
															<option value ="H">High</option>
															<option value ="MH">Very High</option>
														</select>
													</td>
													</tr>
													<tr>
													<td><label>7.Tingkat bengkok pada ibu jari</label></td>
													<td>:</td>
													<td><select  name="c7" class="form-control" required>
															<option value="<?php echo $row['c7']; ?>">bobot</option>
															<option value ="VL">Very low</option>
															<option value ="L">low</option>
															<option value ="M">Medium</option>
															<option value ="H">High</option>
															<option value ="MH">Very High</option>
														</select>
													</td>
													</tr>
													<tr>
													<td><label>8.Tingkat Bengkok pada jari kelingking</label></td>						
													<td>:</td>
													<td><select  name="c8" class="form-control" required>
															<option value="<?php echo $row['c8']; ?>">bobot</option>
															<option value ="VL">Very low</option>
															<option value ="L">low</option>
															<option value ="M">Medium</option>
															<option value ="H">High</option>
															<option value ="MH">Very High</option>
														</select>
													</td>
													</tr>
													<tr>
													<td><label>9.Tingkat Bengkok pada jari tengah</</label></td>
													<td>:</td>
													<td><select  name="c9" class="form-control" required>
															<option value="<?php echo $row['c9']; ?>">bobot</option>
															<option value ="VL">Very low</option>
															<option value ="L">low</option>
															<option value ="M">Medium</option>
															<option value ="H">High</option>
															<option value ="MH">Very High</option>
														</select>
													</td>
													</tr>
													<tr>
													<td><label>10.Tingkat Bengkok ke dalam pada ujung-ujung jari</label></td>						
													<td>:</td>
													<td><select  name="c10" class="form-control" required>
															<option value="<?php echo $row['c10']; ?>">bobot</option>
															<option value ="VL">Very low</option>
															<option value ="L">low</option>
															<option value ="M">Medium</option>
															<option value ="H">High</option>
															<option value ="MH">Very High</option>
														</select>
													</td>
													</tr>
													<tr>
													<td><label>11.Tingkat Bengkok pada jari telunjuk</label></td>
													<td>:</td>
													<td><select  name="c11" class="form-control" required>
															<option value="<?php echo $row['c11']; ?>">bobot</option>
															<option value ="VL">Very low</option>
															<option value ="L">low</option>
															<option value ="M">Medium</option>
															<option value ="H">High</option>
															<option value ="MH">Very High</option>
														</select>
													</td>
													</tr>
													<tr>
													<td><label>12.Tingkat Bengkok pada jari manis</label></td>						
													<td>:</td>
													<td><select  name="c12"  class="form-control"required>
															<option value="<?php echo $row['c12']; ?>">bobot</option>
															<option value ="VL">Very low</option>
															<option value ="L">low</option>
															<option value ="M">Medium</option>
															<option value ="H">High</option>
															<option value ="MH">Very High</option>
														</select>
													</td>
													</tr>
													<tr>
													<td><label>13.Tingkat Kempot pada jari kelingking</label></td>
													<td>:</td>
													<td><select  name="c13" class="form-control" required>
															<option value="<?php echo $row['c13']; ?>">bobot</option>
															<option value ="VL">Very low</option>
															<option value ="L">low</option>
															<option value ="M">Medium</option>
															<option value ="H">High</option>
															<option value ="MH">Very High</option>
														</select>
													</td>
													</tr>
													<tr>
													<td><label>14.Tingkat Kempot pada ibu jari</label></td>						
													<td>:</td>
													<td><select  name="c14" class="form-control" required>
															<option value="<?php echo $row['c14']; ?>">bobot</option>
															<option value ="VL">Very low</option>
															<option value ="L">low</option>
															<option value ="M">Medium</option>
															<option value ="H">High</option>
															<option value ="MH">Very High</option>
														</select>
													</td>
													</tr>
													<tr>
													<td><label>15.Tingkat Keringat pada tangan</label></td>
													<td>:</td>
													<td><select  name="c15"  class="form-control"required>
															<option value="<?php echo $row['c15']; ?>">bobot</option>
															<option value ="VL">Very low</option>
															<option value ="L">low</option>
															<option value ="M">Medium</option>
															<option value ="H">High</option>
															<option value ="MH">Very High</option>
														</select>
													</td>
													</tr>
													<tr>
													<td><label>16.Tingkat Nyeri pada tangan</label></td>						
													<td>:</td>
													<td><select  name="c16"  class="form-control"required>
															<option value="<?php echo $row['c16']; ?>">bobot</option>
															<option value ="VL">Very low</option>
															<option value ="L">low</option>
															<option value ="M">Medium</option>
															<option value ="H">High</option>
															<option value ="MH">Very High</option>
														</select>
													</td>
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

