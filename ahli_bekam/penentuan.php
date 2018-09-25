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
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" src="../prmajax.js"></script>
<title>SI BEKAM</title>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/bootstrap-theme.min.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
<link href="../color/default.css" rel="stylesheet">
<style>
/* Style the input fields */
input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}
/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}
/* select.invalid {
  background-color: #ffdddd;
} */
textarea.invalid {
  background-color: #ffdddd;
}
radio.invalid {
  background-color: #ffdddd;
}
/* Hide all steps by default: */
.tab {
  display: none;
}
/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none; 
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}
/* Mark the active step: */
.step.active {
  opacity: 1;
}
/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}
</style>
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
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu"><i class="fa fa-bars"></i></button>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
						<li><a href="beranda.php">Beranda</a></li>
						<li class="active"><a href="penentuan.php">Diagnosa</a></li>
						<li><a href="hasilpenentuan.php">Hasil Diagnosa</a></li>						
						<li><a href="bantuan.php">Bantuan</a></li>	
						<li><a> </a></li>
						<li>
						<div class="btn-group pull-right">
							<button class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
								<i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs">Pengguna</span>
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li><a href="#">nandi</a></li>
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
		</nav>
	</div>
	<!-- /Navigation -->  
	<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="animatedParent">
					<h2 class="h-bold" style="margin-top:50px;" align="center">Diagnose of Hand</h2>
				<div class="divider-header"></div>
			</div>
		</div>
	</div>
	</div>
	<div class="container">
	<div class="col-md-10 col-lg-offset-1">
		<div class="panel panel-primary">
		 <div class="panel-heading"><span class="glyphicon glyphicon-book"></span>&nbsp;&nbsp;ISI DATA PASIEN</div>
			<div class="panel-body">
				<div class="tab">
				<div class="table-responsive">
				<?php
				   if(isset($_GET['pesan'])){
				   				$id=$_GET['id'];
				   				if ('sukses'==$_GET['pesan']){
				   				  echo '<div class="alert alert-success"><a href="detailhasil.php?id='.$id.'">Data berhasil diTambah, Lihat Hasil</a></div>';
											}else if ('ada'==$_GET['pesan']) {
						 	      echo '<div class="alert alert-danger">Data ID pasien sudah ada, silahkan coba lagi.</div>';
				   				    }else{
										echo '<div class="alert alert-danger">Data gagal disimpan, silahkan coba lagi.</div>';
											}
				    }
				?>		
					<table class="table table-danger">
					  <form class="form-horizontal" id="regForm" action="f_tambahdata.php" method="post">
					  <tr>
						<td>ID Pasien</td>
						<td>:</td>
						<td>
							<input class="form-control" name="id" type="number" placeholder="ID Pasien" oninput="this.className = ''">
						</td>
					  </tr>
					  <tr>
						<td>Nama</td>
						<td>:</td>
						<td>	
							<input class="form-control" name="nama" type="text" placeholder="Nama" oninput="this.className = ''">
						</td> 
					  </tr>
					  <tr>
						<td>No Handphone</td>
						<td>:</td>
						<td>	
							<input class="form-control" name="number" type="number" placeholder="No handphone" oninput="this.className = ''">
						</td>
					  </tr>
					  <tr>
						<td>Umur</td>
						<td>:</td>	
						<td>		
							<input class="form-control" name="umur" type="number" placeholder="Umur" oninput="this.className = ''">
						</td>
					  </tr>
					  <tr>
						<td>Kelamin</td>
						<td>:</td>
						<td>
							<label><input name="jk" type="radio" value="L" oninput="this.className = ''">Laki-Laki</label>
							<label><input name="jk" type="radio" value="P" oninput="this.className = ''">Perempuan</label>
						</td>
					  </tr>
					  <tr>
						<td>Alamat</td>
						<td>:</td>
						<td>
							<textarea class="form-control" name="alamat" placeholder="Alamat" style="width: 100%;"  rows="4" oninput="this.className = ''"></textarea>
						</td>
					  </tr>
					  <tr>
						<td>Keluhan</td>
						<td>:</td>	
						<td>
							<textarea class="form-control" name="keluhan" placeholder="Keluhan" style="width: 100%;"  rows="4" oninput="this.className = ''"></textarea>
						</td>
					  </tr>
				</table>	
			</div>
		</div>
		<div class="tab">				
			<div class="table-responsive">		
				<table class="table table-danger">
					<tr>
						<td><label class="control-label">1) Tingkat kegelapan pada ruas garis jari-jari</label></td>		
						<td>:</td>	
						<td>
						<label><input name="c1" type="radio" value="tfn1" oninput="this.className = ''">tidak gelap</label><br>	
						<label><input name="c1" type="radio" value="tfn2" oninput="this.className = ''">sedikit gelap</label><br>
						<label><input name="c1" type="radio" value="tfn3" oninput="this.className = ''">sangat gelap</label>	
						</td>	
					</tr>
					<tr>
						<td><label class="control-label" >2) Tingkat kegelapan pada ruas garis telapak tangan</label></td>			
						<td>:</td>	
						<td>
						<label><input name="c2" type="radio" value="tfn1" oninput="this.className = ''">tidak gelap</label><br>	
						<label><input name="c2" type="radio" value="tfn2" oninput="this.className = ''">sedikit gelap</label><br>
						<label><input name="c2" type="radio" value="tfn3" oninput="this.className = ''">sangat gelap</label>	
						</td>
					</tr>
					<tr>
						<td><label class="control-label">3) Tingkat kehitaman pada telapak tangan</label></td>
						<td>:</td>
						<td>
						<label><input name="c3" type="radio" value="tfn1" oninput="this.className = ''">tidak hitam</label><br>	
						<label><input name="c3" type="radio" value="tfn2" oninput="this.className = ''">sedikit hitam</label><br>
						<label><input name="c3" type="radio" value="tfn3" oninput="this.className = ''">sangat hitam</label>
						</td>	
					</tr>
					<tr>
						<td><label class="control-label">4) Tingkat banyaknya urat berwarna biru pada telapak tangan</label></td>
						<td>:</td>
						<td>
						<label><input name="c4" type="radio" value="tfn1" oninput="this.className = ''">tidak terdapat urat berwarna biru</label><br>	
						<label><input name="c4" type="radio" value="tfn2" oninput="this.className = ''">sedikit terdapat urat berwarna biru</label><br>
						<label><input name="c4" type="radio" value="tfn3" oninput="this.className = ''">sangat banyak terdapat urat berwarna biru</label>
						<td>
					<tr>
					<tr>
						<td><label class="control-label">5) Tingkat warna merah pucat pada telapak tangan</label></td>	
						<td>:</td>
						<td>
						<label><input name="c5" type="radio" value="tfn1" oninput="this.className = ''">tidak berwarna merah pucat</label><br>	
						<label><input name="c5" type="radio" value="tfn2" oninput="this.className = ''">sedikit berwarna merah pucat</label><br>
						<label><input name="c5" type="radio" value="tfn3" oninput="this.className = ''">sangat berwarna merah pucat</label>
						</td>	
					</tr>
					<tr>	
						<td><label class="control-label">6) Tingkat warna merah pada ruas ujung jari</label></td>
						<td>:</td>
						<td>
						<label><input name="c6" type="radio" value="tfn1" oninput="this.className = ''">Berwarna merah normal</label><br>	
						<label><input name="c6" type="radio" value="tfn2" oninput="this.className = ''">Berwarna merah dari ruas jari sekitarnya</label><br>
						<label><input name="c6" type="radio" value="tfn3" oninput="this.className = ''">Sangat berwarna merah dari ruas jari sekitarnya</label>
						</td>	
					</tr>
					<tr>
						<td><label class="control-label">7) Tingkat Kebengkokan pada ibu jari</label></td>
						<td>:</td>
						<td>
						<label><input name="c7" type="radio" value="tfn1" oninput="this.className = ''">tidak bengkok</label><br>	
						<label><input name="c7" type="radio" value="tfn2" oninput="this.className = ''">sedikit bengkok</label><br>
						<label><input name="c7" type="radio" value="tfn3" oninput="this.className = ''">sangat bengkok</label>	
						</td>
					</tr>
					<tr>
						<td><label class="control-label">8) Tingkat kebengkokan pada jari kelingking</label></td>
						<td>:</td>
						<td>
						<label><input name="c8" type="radio" value="tfn1" oninput="this.className = ''">tidak bengkok</label><br>	
						<label><input name="c8" type="radio" value="tfn2" oninput="this.className = ''">sedikit bengkok</label><br>
						<label><input name="c8" type="radio" value="tfn3" oninput="this.className = ''">sangat bengkok</label>	
						</td>
					</tr>
				</table>
			</div>
		</div>
			<div class="tab">
				<div class="table-responsive">		
					<table class="table table-danger">
					<tr>
						<td><label class="control-label">9) Tingkat kebengkokan pada jari tengah</label></td>				
						<td>:</td>
						<td>
						<label><input name="c9" type="radio" value="tfn1" oninput="this.className = ''">tidak bengkok</label><br>	
						<label><input name="c9" type="radio" value="tfn2" oninput="this.className = ''">sedikit bengkok</label><br>
						<label><input name="c9" type="radio" value="tfn3" oninput="this.className = ''">sangat bengkok</label>
						</td>
					</tr>
					<tr>
						<td><label class="control-label">10) Tingkat kebengkokan ke dalam pada ujung-ujung jari</label></td>						
						<td>:</td>
						<td>
						<label><input name="c10" type="radio" value="tfn1" oninput="this.className = ''">tidak bengkok</label><br>	
						<label><input name="c10" type="radio" value="tfn2" oninput="this.className = ''">sedikit bengkok</label><br>
						<label><input name="c10" type="radio" value="tfn3" oninput="this.className = ''">sangat bengkok</label>
						</td>
					</tr>
					<tr>
						<td><label class="control-label">11) Tingkat kebengkokan pada jari manis</label></td>
						<td>:</td>
						<td>
						<label><input name="c11" type="radio" value="tfn1" oninput="this.className = ''">tidak bengkok</label><br>	
						<label><input name="c11" type="radio" value="tfn2" oninput="this.className = ''">sedikit bengkok</label><br>
						<label><input name="c11" type="radio" value="tfn3" oninput="this.className = ''">sangat bengkok</label>
						</td>
					</tr>
					<tr>
						<td><label class="control-label">12) Tingkat ruas pertama pada jari telunjuk keriput</label></td>
						<td>:</td>
						<td>
						<label><input name="c12" type="radio" value="tfn1" oninput="this.className = ''">Tidak keriput</label><br>	
						<label><input name="c12" type="radio" value="tfn2" oninput="this.className = ''">Sedikit keriput</label><br>
						<label><input name="c12" type="radio" value="tfn3" oninput="this.className = ''">Sangat keriput</label>
						</td>
					</tr>
					<tr>
						<td><label class="control-label">13) Tingkat kempot pada jari kelingking</label></td>											
						<td>:</td>
						<td>
						<label><input name="c13" type="radio" value="tfn1" oninput="this.className = ''">tidak kempot</label><br>	
						<label><input name="c13" type="radio" value="tfn2" oninput="this.className = ''">sedikit kempot</label><br>
						<label><input name="c13" type="radio" value="tfn3" oninput="this.className = ''">sangat kempot</label>
						</td>
					</tr>
					<tr>
						<td><label class="control-label">14) Tingkat ruas pertama seluruh jari terlihat kembung</label></td>							
						<td>:</td>
						<td>
						<label><input name="c14" type="radio" value="tfn1" oninput="this.className = ''">tidak kembung</label><br>	
						<label><input name="c14" type="radio" value="tfn2" oninput="this.className = ''">sedikit kembung</label><br>
						<label><input name="c14" type="radio" value="tfn3" oninput="this.className = ''">sangat kembung</label>
						</td>
					</tr>
					<tr>
						<td><label class="control-label">15) Tingkat keringat pada tangan</label></td>
						<td>:</td>
						<td>
						<label><input name="c15" type="radio" value="tfn1" oninput="this.className = ''">tidak berkeringat</label><br>	
						<label><input name="c15" type="radio" value="tfn2" oninput="this.className = ''">sedikit berkeringat</label><br>
						<label><input name="c15" type="radio" value="tfn3" oninput="this.className = ''">sangat berkeringat</label>
						</td>
					</tr>	
					<tr>
						<td><label class="control-label">16) Tingkat kenyerian pada tangan</label></td>						
						<td>:</td>
						<td>
						<label><input name="c16" type="radio" value="tfn1" oninput="this.className = ''">tidak nyeri</label><br>	
						<label><input name="c16" type="radio" value="tfn2" oninput="this.className = ''">sedikit nyeri</label><br>
						<label><input name="c16" type="radio" value="tfn3" oninput="this.className = ''">sangat nyeri</label>
						</td>
					</table>
				</div>
			</div>
					<div style="overflow:auto;">
					  <div style="float:right;">
					    <button type="button" class="btn btn-primary" id="prevBtn" onclick="nextPrev(-1)">Sebelumnya</button>
					    <button type="button" class="btn btn-primary" id="nextBtn" onclick="nextPrev(1)">Lanjut</button>
					  </div>
					</div>
					<!-- Circles which indicates the steps of the form: -->
					<div style="text-align:center;margin-top:40px;">
					  <span class="step"></span>
					  <span class="step"></span>
					  <span class="step"></span>
					</div>
					</form>
				   </div>
				  </div>
				 </div>
			    </section>
			   </div>
			  </div>
			 </div>
			</div>
<!-- </div> -->
<!-- Core JavaScript Files -->
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script>
	var currentTab = 0; // Current tab is set to be the first tab (0)
	showTab(currentTab); // Display the current tab

	function showTab(n) {
	  // This function will display the specified tab of the form ...
	  var x = document.getElementsByClassName("tab");
	  x[n].style.display = "block";
	  // ... and fix the Previous/Next buttons:
	  if (n == 0) {
	    document.getElementById("prevBtn").style.display = "none";
	  } else {
	    document.getElementById("prevBtn").style.display = "inline";
	  }
	  if (n == (x.length - 1)) {
	    document.getElementById("nextBtn").innerHTML = "Tambah";
	  } else {
	    document.getElementById("nextBtn").innerHTML = "Lanjut";
	  }
	  // ... and run a function that displays the correct step indicator:
	  fixStepIndicator(n)
	}
	  function nextPrev(n) {
	  // This function will figure out which tab to display
	  var x = document.getElementsByClassName("tab");
	  // Exit the function if any field in the current tab is invalid:
	  if (n == 1 && !validateForm()) return false;
	  // Hide the current tab:
	  x[currentTab].style.display = "none";
	  // Increase or decrease the current tab by 1:
	  currentTab = currentTab + n;
	  // if you have reached the end of the form... :
	  if (currentTab >= x.length) {
	    //...the form gets submitted:
	    document.getElementById("regForm").submit();
	    return false;
	  }
	  // Otherwise, display the correct tab:
	  showTab(currentTab);
	}
	  function validateForm() {
	  // This function deals with validation of the form fields
	  var x, y, i, valid = true;
	  x = document.getElementsByClassName("tab");
	  y = x[currentTab].getElementsByTagName("input");
		w = x[currentTab].getElementsByTagName("textarea");
	  z = x[currentTab].getElementsByTagName("radio");
		// A loop that checks every input field in the current tab:
	  for (i = 0; i < y.length; i++) {
	    // If a field is empty...
	    if (y[i].value == "") {
	      // add an "invalid" class to the field:
	      y[i].className += " invalid";
	      // and set the current valid status to false:
	      valid = false;
	    }
	  }
		for (i = 0; i < w.length; i++) {
	    // If a field is empty...
	    if (w[i].value == "") {
	      // add an "invalid" class to the field:
	      w[i].className += " invalid";
	      // and set the current valid status to false:
	      valid = false;
	    }
	  }
		for (i = 0; i < z.length; i++) {
	    // If a field is empty...
	    if (z[i].value == "") {
	      // add an "invalid" class to the field:
	      z[i].className += " invalid";
	      // and set the current valid status to false:
	      valid = false;
	    }
	  }
	  // If the valid status is true, mark the step as finished and valid:
	  if (valid) {
	    document.getElementsByClassName("step")[currentTab].className += " finish";
	  }
	  return valid; // return the valid status
	}
	  function fixStepIndicator(n) {
	  // This function removes the "active" class of all steps...
	  var i, x = document.getElementsByClassName("step");
	  for (i = 0; i < x.length; i++) {
	    x[i].className = x[i].className.replace(" active", "");
	  }
	  //... and adds the "active" class to the current step:
	  x[n].className += " active";
	}
</script>
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
