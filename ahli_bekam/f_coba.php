<?php	
	 //DATA UJI
		$pu = pengujian(3);
		$du = deffuzifikasi($pu);
		$pu = normalisasi($du);

		//DATA ALTERNATIF
		$bk = alternatif(302);
		$at = konversi($bk);
		$nr = normalisasi($at);

		//PERKALIAN MATRIKS
		$mt = matriks($pu,$nr);

		//FUNGSI MENGAMBIL DATA UJI
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
		print_r($hitung);
		return $hitung;
		}
		//FUNGSI MENGAMBIL DATA BOBOT KRITERIA
		function alternatif($id){	
		include('../config.php');
		//select data bobot dari database
		$sql= mysqli_query($koneksi,"SELECT c1,c2,c3,c4,c5,c6,c7,c8,c9,c10,c11,c12,c13,c14,c15,c16 FROM gangguan_kesehatan WHERE id_gangguan_kesehatan='$id'");
		$bobot = array();
		$bobot = mysqli_fetch_row($sql);
		print_r($bobot);
		return $bobot;
		}

		//FUNGSI KONVERSI DATA BOBOT KRITERIA
			function konversi($bk){
	  $vl  = array(0.0,0.0,0.2);
	  $l   = array(0.0,0.2,0.4);
	  $m   = array(0.2,0.4,0.6);
	  $h   = array(0.4,0.6,0.8);
	  $vh  = array(0.6,0.8,1);
	  foreach($bk as $key=>$value){
	  if($value == 'VH')
		$tfn[] = $vh;    //konversi = konversi data awal ke data fuzzy
	  elseif($value == 'H')
	    $tfn[] = $h;
	  elseif($value == 'M')
	    $tfn[] = $m;
	  elseif($value == 'L')
	    $tfn[] = $l;
	  else
	    $tfn[] = $vl;
	 }
	 foreach($tfn as $j => $b){
	   $sum = 0;
	   foreach($b as $c){
		  $sum += $c;
	   }
	   $deffval[$j] = $sum/3; //deff = deffuzifikasi
	 }
	 $deff['tfn'] 	= $tfn;
	 $deff['deffval']  = $deffval;
	 print_r($deff);
	 return($deffval);
	 }

	 //FUNGSI DEFFUZIFIKASI
		function deffuzifikasi($hitung){
			 foreach($hitung as $j => $b){
	   		$sum = 0;
	   	foreach($b as $c){
		  		$sum += $c;
	   }
	   		$deffval[$j] = $sum/3; //deff = deffuzifikasi
	 		}	
		print_r($deffval);
		return $deffval;
		}

	//FUNGSI NORMALISASI DATA
	function normalisasi($normal){
		$total = array_sum($normal);
		foreach($normal as $c){
		  $normalized[] = $c/$total;
		}
		  $normalisasi['total'] 	  = $total;
		  $normalisasi['normalized'] = $normalized;
		  print_r($normalisasi);
		  return $normalisasi;
	 }

	 
	//FUNGSI PERKALIAN MATRIKS
	function matriks(){
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
?>
