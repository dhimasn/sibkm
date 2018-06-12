<?php
// connect database
include('../config.php');
include('f_perhitungan.php');
//cek koneksi
if ($koneksi->connect_errno){ 
		die ("Could not connect to the database: <br />". $koneksi>connect_error); 
	}
//set variabel
function aman($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$error_nama=$valid_nama=$error_number=$valid_number=" ";
$error_alamat=$valid_alamat=$error_keluhan=$valid_keluhan=" ";
$id=$nama=$number=$umur=$jk=$alamat=$keluhan=" ";
//$c[]=" ";
if($_SERVER["REQUEST_METHOD"] == "POST"){
	//posting data
	$id      = aman($_POST['id']);
	$nama    = aman($_POST['nama']);
	$number  = aman($_POST['number']);
	$umur    = aman($_POST['umur']);
	$jk      = aman($_POST['jk']);
	$alamat  = aman($_POST['alamat']);
	$keluhan = aman($_POST['keluhan']);
	$c[]=$_POST['c1'];
	$c[]=$_POST['c2'];
	$c[]=$_POST['c3'];
	$c[]=$_POST['c4'];
	$c[]=$_POST['c5'];
	$c[]=$_POST['c6'];
	$c[]=$_POST['c7'];
	$c[]=$_POST['c8'];
	$c[]=$_POST['c9'];
	$c[]=$_POST['c10'];
	$c[]=$_POST['c11'];
	$c[]=$_POST['c12'];
	$c[]=$_POST['c13'];
	$c[]=$_POST['c14'];
	$c[]=$_POST['c15'];
	$c[]=$_POST['c16'];

	//checking ID
	

	//checking nama
	if ($nama == ''){ 
		$error_nama = "Name is required"; 
		$valid_nama = FALSE; 
	}else
	if (!preg_match("/^[a-zA-Z ]*$/",$nama)) { 
		$error_nama = "Only letters and white space allowed"; 
		$valid_nama = FALSE; 
	}else{ 
		$valid_nama = TRUE; 
	}  
	
	//checking number
	if ($number == ''){ 
		$error_number = "number is required"; 
		$valid_number = FALSE; 
	}else
	if (!preg_match("/^[0-9]*$/",$number)) { 
		$error_number = "Only numbers allowed"; 
		$valid_number = FALSE; 
	}else{ 
		$valid_number = TRUE; 
	}

	//alamat 
	if ($alamat == ''){ 
		$error_alamat = "alamat is required"; 
		$valid_alamat = FALSE; 
	}else{ 
		$valid_alamat = TRUE; 
	}
	
	//keluhan 
	if ($keluhan == ''){ 
		$error_keluhan = "keluhan is required"; 
		$valid_keluhan = FALSE; 
	}else{ 
		$valid_keluhan = TRUE; 
	} 

}
				
if($valid_nama && $valid_number && $valid_alamat && $valid_keluhan){ 
	//escape inputs data
	$nama = $koneksi->real_escape_string($nama);
	$number = $koneksi->real_escape_string($number);
	$alamat = $koneksi->real_escape_string($alamat);   
	$keluhan = $koneksi->real_escape_string($keluhan);
	
	//query data
	$sql =  "INSERT INTO pasien (idpasien,nama,no,umur,kelamin,alamat,keluhan) VALUES ('$id','$nama','$number','$umur','$jk','$alamat','$keluhan')";

	$sql1 =  'INSERT INTO rating_pasien (idpasien,nama,idtfn) VALUES';
	 for($x=0; $x < count($c) ; $x++){
	  $sql1 .= '("'.$id.'","'.$nama.'","'.$c[$x].'"),'; 
	 }

	$sql1 = rtrim($sql1,",");
	// insert data pasien
	$insert = mysqli_query($koneksi,$sql);
	// insert data rating	
	$insert1 = mysqli_query($koneksi,$sql1);
	
	//DATA UJI
	$pu = pengujian($id);
	$du = deffuzifikasi($pu);
	$ns = normalisasi($du);

	//DATA ALTERNATIF
	$a = array();
	$bk1 = alternatif(301);
	$at1 = konversi($bk1);
	$nr1 = normalisasi($at1);
	$a[] = $nr1;

	$bk2 = alternatif(302);
	$at2 = konversi($bk2);
	$nr2 = normalisasi($at2);
	$a[] = $nr2;

	$bk3 = alternatif(303);
	$at3 = konversi($bk3);
	$nr3 = normalisasi($at3);
	$a[] = $nr3;

	$bk4 = alternatif(304);
	$at4 = konversi($bk4);
	$nr4 = normalisasi($at4);
	$a[] = $nr4;

	$bk5 = alternatif(305);
	$at5 = konversi($bk5);
	$nr5 = normalisasi($at5);
	$a[] = $nr5;

	$bk6 = alternatif(306);
	$at6 = konversi($bk6);
	$nr6 = normalisasi($at6);
	$a[] = $nr6;

	//PERKALIAN MATRIKS
	$mt = matriksPerkalian($a,$ns);
	
	//MENCARI NILAI TERTINGGI
	$maks = maks($mt);

	//MENCARI ID penentuan
	$rk = penentuan($mt);

	//UPLOAD DATA
	$valid = diagnosa($id,$mt,$maks,$rk);

	//notifikasi proses input
	if($valid){		
		header("Location: penentuan.php?pesan=sukses&id=$id");
	 }else{ 
		header("Location: penentuan.php?pesan=gagal&id=$id");
	 }
	}
?>				
				

