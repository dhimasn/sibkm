<?php
session_start();
include('config.php');
$nama  = aman($_POST['nama']);
$password = aman(md5($_POST['password']));
	if($koneksi){
		$login = "SELECT * FROM user WHERE nama='$nama' AND password='$password'";
		$result =mysqli_query($koneksi,$login);
		if ($result) {
		$r = mysqli_fetch_array ($result);
			if ($r > 0)
			{
				$_SESSION['nama']  = $r['nama'];
				$_SESSION['status']= $r['status'];	
				if($_SESSION['status'] == 'admin'){
					header('location:admin/index.php');
				}
				else if ($_SESSION['status'] == 'user'){
					header('location:ahli_bekam/beranda.php');
				}				
			}
			else
			{ 	echo "<script language=javascript>
						 alert('Login gagal!,Silahkan masukkan kategori user, username dan password dengan benar');</script>";
				echo '<script type=text/javascript>
					<!--
					window.location = "index.php"
					//-->
					</script>';
			}
		}mysqli_free_result($result);
	}
function aman($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
