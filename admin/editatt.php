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
		die ("Could not connect to the database:<br/>".$koneksi>connect_error); 
	}
	$id_kriteria = $_GET['id_kriteria'];
	$sql = mysqli_query($koneksi,"SELECT * FROM bobot WHERE id_kriteria='$id_kriteria'") or die(mysqli_error());
    $row = mysqli_fetch_assoc($sql);
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
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<h2 class="h-bold" style="margin-top:50px;" align="center">Data Kepentingan Alternatif</h2>
					<div class="divider-header"></div>
  				</div>
		    </div>
      <div class="row">
       <div class="col-sm-6 col-sm-offset-3">
        <div class="panel panel-primary">
         <div class="panel-heading"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;Ubah Data Kepentingan Alternatif</div>
          <div class="panel-body">
           <div class="table-responsive">			
           <?php						
           if(isset($_POST["save"])){
            $kepentingan	    =  aman($_POST['kepentingan']);
            $ket_kepentingan =  aman($_POST['ket_kepentingan']);
            $nilai_l		       =  aman($_POST['nilai_l']);
            $nilai_m		       =  aman($_POST['nilai_m']);
            $nilai_u		       =  aman($_POST['nilai_u']);
            $tfn_lmu         =  aman($_POST['tfn_lmu']);
             $update = mysqli_query($koneksi,"UPDATE bobot SET kepentingan='$kepentingan',ket_kepentingan='$ket_kepentingan',nilai_l='$nilai_l',nilai_m='$nilai_m',nilai_u='$nilai_u',tfn_lmu='$tfn_lmu' WHERE id_kriteria='$id_kriteria'") or die(mysqli_error());
             if($update){
              header("Location: editatt.php?id_kriteria=$id_kriteria&pesan=sukses");
             }else{
              echo '<div class="alert alert-danger">Data gagal disimpan, silahkan coba lagi.</div>';
             }
           }
           if(isset($_GET['pesan'])){
            echo '<div class="alert alert-success">Data berhasil diubah.</div>';
           }
           ?>
						  <table class="table table-danger">
							 <form class="form-horizontal" method="post">
								<tr>
								<td>ID Kepentingan Alternatif</td>
								<td>:</td>
								<td><?php echo $row['id_kriteria'];?></td>
								</tr>
								<tr>
								<td>Kepentingan</td>
								<td>:</td>
								<td><input type="text" value="<?php echo $row['kepentingan'];?>" name="kepentingan" class="form-control" required></td>
								</tr>
								<tr>
								<td>Keterangan Kepentingan</td>
								<td>:</td>
								<td><input type="text" value="<?php echo $row['ket_kepentingan'];?>" name="ket_kepentingan" class="form-control"  required></td>
								</tr>
        <tr>
								<td>Nilai Lower</td>
								<td>:</td>
								<td><input type="text" value="<?php echo $row['nilai_l'];?>" name="nilai_l" class="form-control" required></td>
								</tr>
        <tr>
								<td>Nilai Middle</td>
								<td>:</td>
								<td><input type="text" value="<?php echo $row['nilai_m'];?>" name="nilai_m" class="form-control" required></td>
								</tr>
        <tr>
								<td>Nilai Upper</td>
								<td>:</td>
								<td><input type="text" value="<?php echo $row['nilai_u'];?>" name="nilai_u" class="form-control" required></td>
								</tr>
        <tr>
								<td>Nilai TFN LMU</td>
								<td>:</td>
								<td><input type="text" value="<?php echo $row['tfn_lmu'];?>" name="tfn_lmu" class="form-control" required></td>
								</tr>							
								<tr colspan="3">
								<td>  
								<input type="submit" name="save" value="simpan" class="btn btn-warning btn-sm">	
        <a href="masterdata.php" class="btn btn-danger btn-sm" id="batal">BATAL</a></td>
								<td></td>
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
<!-- Core JavaScript Files -->
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
	<div class="container">
		<div class="row">
			<div class = "text-right">
				<b>Copyirght © Bekam Learning Center</b> All rights reserved</p>
			</div>
		</div>
	</div>	
</html>
<?php }?>