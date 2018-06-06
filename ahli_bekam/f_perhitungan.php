<?php	
		function pengujian($idpasien){
		include('../config.php');
		//mengambil nilai kriteria dari pasien.
		$sql = mysqli_query($koneksi,
			"SELECT
				rating.nilai_l,
				rating.nilai_m,
				rating.nilai_u
			FROM
				rating_pasien
			JOIN rating ON rating_pasien.idtfn = rating.idtfn
			WHERE
				rating_pasien.idpasien ='$idpasien'");
		//deklarasi array of array
		$hitung = array();
		for($i=0;$i<mysqli_num_rows($sql);$i++){
		$data = mysqli_fetch_array($sql);
		$hitung[$i] =array 
				(
				$nilai_l = $data['nilai_l'],
				$nilai_m = $data['nilai_m'],
				$nilai_u = $data['nilai_u']
				);
			}
		//print_r($hitung);
		return $hitung;
		}
		
		function defuzifikasi($hitung){
		$defuzifikasi = array();
		for($i=0;$i<count($hitung);$i++){
				$defuzifikasi[$i]= ($hitung[$i][0] + $hitung[$i][1] + $hitung[$i][2])/3.0;	
		}
		//print_r($defuzifikasi);
		return $defuzifikasi;
		}
		
		function normalisasi($defuzifikasi){
		$max = max($defuzifikasi);																					
		$normalisasi = array();
		for ($i=0; $i < count($defuzifikasi); $i++) { 
				$normalisasi[$i]= $defuzifikasi[$i]/$max;
			}
		//print_r ($normalisasi);
		return $normalisasi;
		}
		
		function PerkalianMatriks($normalisasi,$normalisasi_bobot){			
			$matriks_a=$normalisasi;
			$matriks_b=$normalisasi_bobot;
			//$hasil = array();
			$temp = 0;
			for ($i=0; $i<sizeof($matriks_a); $i++) {
				for ($j=0; $j<sizeof($matriks_b); $j++) {
					$temp += $matriks_a[$i] * $matriks_b[$j];
				}
			}
		$hasil = $temp;
		//print_r($hasil);
		return $hasil;
		}
		
		function rangking($hsl1,$hsl2,$hsl3,$hsl4,$hsl5,$hsl6){
			$rangking =array($hsl1,$hsl2,$hsl3,$hsl4,$hsl5,$hsl6);
			sort($rangking);
			//print_r($rangking);
			return($rangking);
		}
		
		function penentuan($hsl1,$hsl2,$hsl3,$hsl4,$hsl5,$hsl6){
			$prefensiMax=max($hsl1,$hsl2,$hsl3,$hsl4,$hsl5,$hsl6);
			if ($prefensiMax == $hsl1)
				{
				$id_gk = '301';
				}  
			elseif($prefensiMax == $hsl2)
			    {
				$id_gk = '302';
				}
			elseif($prefensiMax == $hsl3)
			    {
				$id_gk = '303';
			    }			    
			elseif($prefensiMax == $hsl4)
			    {
				$id_gk = '304';
				}
			elseif($prefensiMax == $hsl5)
				{
				$id_gk = '305';
				}
			else 
				{
				$id_gk = '306';
				};
			//print_r($id_gk);
			return($id_gk);
		}			
?>
<?php 		
			//mengambil data id
			//tahap1
			// $idpasien        = $id;
			// $tahap1          = pengujian($idpasien);
			// //tahap2
			// $tahap2    = alternatif();
			// //tahap3
			// $tahap3          = defuzifikasi($tahap1);
			// //tahap4
			// $tahap4    = defuzifikasi($tahap2);
			// //tahap5
			// $tahap5          = normalisasi($tahap3);  
			// //tahap6
			// $tahap6          = normalisasi($tahap4);
			// //tahap7
			// $att1 = att1($tahap6);
			// $att2 = att2($tahap6);
			// $att3 = att3($tahap6);
			// $att4 = att4($tahap6);
			// $att5 = att5($tahap6);
			// $att6 = att6($tahap6);
			// $hsl1 = PerkalianMatriks($tahap5,$att1);
			// $hsl2 = PerkalianMatriks($tahap5,$att2);
			// $hsl3 = PerkalianMatriks($tahap5,$att3);
			// $hsl4 = PerkalianMatriks($tahap5,$att4);
			// $hsl5 = PerkalianMatriks($tahap5,$att5);
			// $hsl6 = PerkalianMatriks($tahap5,$att6);
			// //tahap8
			// //$rangking = rangking($hsl1,$hsl2,$hsl3,$hsl4,$hsl5,$hsl6); 
			// $id_gk = penentuan($hsl1,$hsl2,$hsl3,$hsl4,$hsl5,$hsl6); 
			// //simpan database
			// $hasil = max($hsl1,$hsl2,$hsl3,$hsl4,$hsl5,$hsl6);
			// $sql2 =  "INSERT INTO diagnosa(idpasien,id_gangguan_kesehatan,hasil_akhir,nilai_fsaw)
			// VALUES ('$idpasien','$id_gk','$hasil','$hasil')";
			// //insert data
		//  $insert = mysqli_query($koneksi,$sql2);
		//  if ($insert){
		//      echo 'Data berhasil di tambahkan!';//Pesan jika proses tambah sukses
		//      echo '<a href="hasilpenentuan.php">LANJUT</a>';
		//     }else {
		//      echo 'Gagal menambahkan data! '; 
		//     }

		// }
?>
