<?php	
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
				rating_pasien.idpasien ='$idpasien'")or die(mysqli_error());
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
		return $hitung;
		}
		//FUNGSI MENGAMBIL DATA BOBOT KRITERIA
		function alternatif($id){	
		include('../config.php');
		//select data bobot dari database
		$sql= mysqli_query($koneksi,"SELECT c1,c2,c3,c4,c5,c6,c7,c8,c9,c10,c11,c12,c13,c14,c15,c16 FROM gangguan_kesehatan WHERE id_gangguan_kesehatan='$id'") or die(mysqli_error());
		$bobot = array();
        $bobot = mysqli_fetch_row($sql);
		return $bobot;
		}
		//FUNGSI KONVERSI DATA BOBOT KRITERIA
		function konversi($bk){
		include('../config.php');
		//select data konversi
		$sql= mysqli_query($koneksi,"SELECT `nilai_l`,`nilai_m`,`nilai_u` FROM `bobot`") or die(mysqli_error()); 
		for($i=0;$i<mysqli_num_rows($sql);$i++){
		$data = mysqli_fetch_array($sql);
		$kon[$i] = array 
		(
			$nilai_l = $data['nilai_l'],
			$nilai_m = $data['nilai_m'],
			$nilai_u = $data['nilai_u']
		);
		}
		$vl  = $kon[0];
		$l   = $kon[1];
		$m   = $kon[2];
		$h   = $kon[3];
		$vh  = $kon[4];
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
		
		return $deffval;
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

		return $normalized;
		}
		//FUNGSI PERKALIAN MATRIKS
		function matriksPerkalian($matrixA, $matrixB){
		$colsA = count($matrixA);
		$rowsA = count($matrixA);	
		$rowsB = count($matrixB);
		$matrixProduct = array();
			for($i =0; $i < $colsA; $i++){
				$sum = 0; 
				for($j = 0; $j < $rowsB; $j++){
						for($p = 0; $p < $rowsA; $p++){
					$sum += $matrixA[$i][$p] * $matrixB[$p];
					}
				$matrixProduct[$i] = $sum;
			}
		}
		return $matrixProduct;
		}

		//FUNGSI MENCARI NILAI MAKSIMAL
		function maks($sort){
		$max=max($sort);
		return $max;	
		} 
		
		//FUNGSI PENENTUAN
		function penentuan($hasil){
		$max=max($hasil);
		if ($max == $hasil[0]) {
			$id = '301';
			return $id;
		} else if ($max == $hasil[1]) {
			$id = '302';
			return $id;
		} else if ($max == $hasil[2]){
			$id = '303';
			return $id;
		} else if ($max == $hasil[3]){
			$id = '304';
			return $id;
		} else if ($max == $hasil[4]){
			$id = '305';
			return $id;
		} else {
			$id = '306';
			return $id;
		}
		}
	function diagnosa($id,$mt,$maks,$rk){
		include('../config.php');
		$idpasien = $id;
		$nilai_fsaw = $maks;
		$id_gangguan_kesehatan = $rk;
		$nilai_A1 = $mt[0];
		$nilai_A2 = $mt[1];
		$nilai_A3 = $mt[2];
		$nilai_A4 = $mt[3];
		$nilai_A5 = $mt[4];
		$nilai_A6 = $mt[5];
		$sql = "INSERT INTO diagnosa(idpasien,id_gangguan_kesehatan,nilai_A1,nilai_A2,nilai_A3,nilai_A4,nilai_A5,nilai_A6,nilai_fsaw) VALUES ('$idpasien','$id_gangguan_kesehatan','$nilai_A1','$nilai_A2','$nilai_A3','$nilai_A4','$nilai_A5','$nilai_A6','$nilai_fsaw')";
		$insert = mysqli_query($koneksi,$sql) or die(mysqli_error());
		if ($insert){ 
			$valid = TRUE; 
		}else{ 
			$valid = FALSE; 
		}
		return $valid; 
	}

?>
