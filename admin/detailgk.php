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
      <script src="../js/html5shiv.min.js"></script>
      <script src="../js/respond.min.js"></script>
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
			<div class="col-sm-10 col-lg-offset-1">
				<div class="panel panel-primary">
					<div class="panel-heading"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;Data Gangguan Kesehatan</div>
				<div class="panel-body">
					<div class="table-responsive">		
						<table class="table table-danger">
							<form class="form-horizontal" method="post">
								<tr>
									 <td><label>ID Gangguan Kesehatan</label></td>
									 <td>:</td>
									 <td><?php echo $row['id_gangguan_kesehatan']; ?></td>
								</tr>
								<tr>
									 <td><label>Jenis Gangguan Kesehatan</label></td>
									 <td>:</td>
									 <td><?php echo $row['nama_gangguan_kesehatan']; ?></td>
								</tr>
								<tr>
									 <td><label>Solusi Herbal</label></td>
									 <td>:</td>
									 <td width="400px"><?php echo $row['solusi_gangguan_kesehatan']; ?></td>
								</tr>
								<tr>
									<td><label>1) Tingkat kegelapan pada ruas garis jari-jari</label></td>
									<td>:</td>
									<td><?php if($row['c1']=='VL')
											echo 'Very Low';
											elseif($row['c1']=='L') 
											echo 'Low';
											elseif($row['c1']=='M') 
											echo 'Medium';
											elseif($row['c1']=='H') 
											echo 'High';
											else
											echo 'Very High';
											;?>
									</td>
								</tr>
								<tr>
									<td><label>2) Tingkat kegelapan pada ruas garis telapak tangan</label></td>						
									<td>:</td>
									<td><?php if($row['c2']=='VL')
											echo 'Very Low';
											elseif($row['c2']=='L') 
											echo 'Low';
											elseif($row['c2']=='M') 
											echo 'Medium';
											elseif($row['c2']=='H') 
											echo 'High';
											else
											echo 'Very High';
											;?></td>
								</tr>
								<tr>
									<td><label>3) Tingkat kehitaman pada telapak tangan</</label></td>
									<td>:</td>
									<td><?php if($row['c3']=='VL')
											echo 'Very Low';
											elseif($row['c3']=='L') 
											echo 'Low';
											elseif($row['c3']=='M') 
											echo 'Medium';
											elseif($row['c3']=='H') 
											echo 'High';
											else
											echo 'Very High';
											;?></td>
								</tr>
								<tr>
									<td><label>4) Tingkat banyaknya urat berwarna biru pada telapak tangan</label></td>						
									<td>:</td>
									<td><?php if($row['c4']=='VL')
											echo 'Very Low';
											elseif($row['c4']=='L') 
											echo 'Low';
											elseif($row['c4']=='M') 
											echo 'Medium';
											elseif($row['c4']=='H') 
											echo 'High';
											else
											echo 'Very High';
											;?></td>
								</tr>
								<tr>
									<td><label>5) Tingkat warna merah pucat pada telapak tangan</label></td>
									<td>:</td>
									<td><?php if($row['c5']=='VL')
											echo 'Very Low';
											elseif($row['c5']=='L') 
											echo 'Low';
											elseif($row['c5']=='M') 
											echo 'Medium';
											elseif($row['c5']=='H') 
											echo 'High';
											else
											echo 'Very High';
											;?></td>
								</tr>
								<tr>
									<td><label>6) Tingkat warna merah pada ruas ujung jari</label></td>						
									<td>:</td>
									<td><?php if($row['c6']=='VL')
											echo 'Very Low';
											elseif($row['c6']=='L') 
											echo 'Low';
											elseif($row['c6']=='M') 
											echo 'Medium';
											elseif($row['c6']=='H') 
											echo 'High';
											else
											echo 'Very High';
											;?></td>
								</tr>
								<tr>
									<td><label>7) Tingkat kebengkokan pada ibu jari</label></td>
									<td>:</td>
									<td><?php if($row['c7']=='VL')
											echo 'Very Low';
											elseif($row['c7']=='L') 
											echo 'Low';
											elseif($row['c7']=='M') 
											echo 'Medium';
											elseif($row['c7']=='H') 
											echo 'High';
											else
											echo 'Very High';
											;?></td>
								</tr>
								<tr>
									<td><label>8) Tingkat kebengkokan pada jari kelingking</label></td>						
									<td>:</td>
									<td><?php if($row['c8']=='VL')
											echo 'Very Low';
											elseif($row['c8']=='L') 
											echo 'Low';
											elseif($row['c8']=='M') 
											echo 'Medium';
											elseif($row['c8']=='H') 
											echo 'High';
											else
											echo 'Very High';
											;?></td>
								</tr>
								<tr>
									<td><label>9) Tingkat kebengkokan pada jari tengah</</label></td>
									<td>:</td>
									<td><?php if($row['c9']=='VL')
											echo 'Very Low';
											elseif($row['c9']=='L') 
											echo 'Low';
											elseif($row['c9']=='M') 
											echo 'Medium';
											elseif($row['c9']=='H') 
											echo 'High';
											else
											echo 'Very High';
											;?></td>
								</tr>
								<tr>
									<td><label>10) Tingkat kebengkokan ke dalam pada ujung-ujung jari</label></td>						
									<td>:</td>
									<td><?php if($row['c10']=='VL')
											echo 'Very Low';
											elseif($row['c10']=='L') 
											echo 'Low';
											elseif($row['c10']=='M') 
											echo 'Medium';
											elseif($row['c10']=='H') 
											echo 'High';
											else
											echo 'Very High';
											;?></td>
								</tr>
								<tr>
									<td><label>11) Tingkat kebengkokan pada jari manis</label></td>
									<td>:</td>
									<td><?php if($row['c11']=='VL')
											echo 'Very Low';
											elseif($row['c11']=='L') 
											echo 'Low';
											elseif($row['c11']=='M') 
											echo 'Medium';
											elseif($row['c11']=='H') 
											echo 'High';
											else
											echo 'Very High';
											;?></td>
								</tr>
								<tr>
									<td><label>12) Tingkat ruas pertama pada jari telunjuk keriput</label></td>						
									<td>:</td>
									<td><?php if($row['c12']=='VL')
											echo 'Very Low';
											elseif($row['c12']=='L') 
											echo 'Low';
											elseif($row['c12']=='M') 
											echo 'Medium';
											elseif($row['c12']=='H') 
											echo 'High';
											else
											echo 'Very High';
											;?></td>
								</tr>
								<tr>
									<td><label>13) Tingkat kempot pada jari kelingking</label></td>
									<td>:</td>
									<td><?php if($row['c13']=='VL')
											echo 'Very Low';
											elseif($row['c13']=='L') 
											echo 'Low';
											elseif($row['c13']=='M') 
											echo 'Medium';
											elseif($row['c13']=='H') 
											echo 'High';
											else
											echo 'Very High';
											;?></td>
								</tr>
								<tr>
									<td><label>14) Tingkat ruas pertama seluruh jari terlihat kembung</label></td>						
									<td>:</td>
									<td><?php if($row['c14']=='VL')
											echo 'Very Low';
											elseif($row['c14']=='L') 
											echo 'Low';
											elseif($row['c14']=='M') 
											echo 'Medium';
											elseif($row['c14']=='H') 
											echo 'High';
											else
											echo 'Very High';
											;?></td>
								</tr>
								<tr>
									<td><label>15) Tingkat keringat pada tangan</label></td>
									<td>:</td>
									<td><?php if($row['c15']=='VL')
											echo 'Very Low';
											elseif($row['c15']=='L') 
											echo 'Low';
											elseif($row['c15']=='M') 
											echo 'Medium';
											elseif($row['c15']=='H') 
											echo 'High';
											else
											echo 'Very High';
											;?></td>
								</tr>
								<tr>
									<td><label>16) Tingkat kenyerian pada tangan</label></td>						
									<td>:</td>
									<td><?php if($row['c16']=='VL')
											echo 'Very Low';
											elseif($row['c16']=='L') 
											echo 'Low';
											elseif($row['c16']=='M') 
											echo 'Medium';
											elseif($row['c16']=='H') 
											echo 'High';
											else
											echo 'Very High';
											;?></td>
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
									 <a class="thumbnail" href="#">
										<img class="img-responsive" src="<?php echo $row['titik_bekam'];?>" alt="">
									 </a>
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
				<b>Copyirght © Bekam Holistic Center</b> All rights reserved</p>
			</div>
		</div>
	</div>	
</html>
<?php }?>

