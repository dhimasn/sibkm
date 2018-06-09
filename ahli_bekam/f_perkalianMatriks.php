<?php
/* Fungsi perkalian matriks
* @f2face - 2013
*/
function perkalian_matriks($matriks_a, $matriks_b) {
	$hasil = array();
	for ($i=0; $i<count($matriks_a); $i++) {
		$temp = 0;
		for ($j=0; $j<count($matriks_a); $j++) {
			for ($k=0; $k<count($matriks_b); $k++) {
				$temp += $matriks_a[$j][$k] * $matriks_b[$k];
			}
			$hasil[$j][$k] = $temp;
		}
	}
	return $hasil;
}
//---------------------------------------------------------------------------
// Contoh penggunaan :
// Matriks A
// $a = array();
// $a[] = array(1, 2, 3);
// $a[] = array(4, 5, 6);
// $a[] = array(7, 8, 9);
// $a[] = array(10, 11, 12);
// // Matriks B
// $b = array();
// $b[] = array(1, 2, 3, 4);
// $b[] = array(5, 6, 7, 8);
// $b[] = array(9, 10, 11, 12);
// // Kalikan
// $hasil = perkalian_matriks($a, $b);
// echo "<table border='1' cellspacing='0' cellpadding='5'>";
// for ($i=0; $i<sizeof($hasil); $i++) {
// 	echo "<tr>";
// 	for ($j=0; $j<sizeof($hasil[$i]); $j++) {
// 		echo "<td>". round($hasil[$i][$j], 4) ."</td>";
// 	}
// 	echo "</tr>";
// }
// echo "</table>";
	function tahap6($normalized, $deff2){
	   $n = array($normalized);
	   foreach($n as $a){
		$key = 1;
		foreach($a as $b){
		  $w[1][$key] = $b;
		  $key++;
		}
         }
	   $r 	= matrixTranspose($deff2);
	   $hasil 	= matriksPerkalian($w, $r);
	   $thp6['w'] 		= $w;
	   $thp6['r'] 		= $r;
	   $thp6['hasil'] 	= $hasil;
	   return $thp6;
	}

      /*tahap 7*/
      function ranking($x){
	  $sortArray = array();
	  foreach($x as $a){
	    foreach($a as $key=>$value){
		if(!isset($sortArray[$key])){
		  $sortArray[$key] = array();
		}
		$sortArray[$key][] = $value;
	  }
      }
	$orderby = "value";
	array_multisort($sortArray[$orderby], SORT_DESC, $x);
	foreach ($x as $value) {
	   $ranking['sort'][] = $value;
	}
      $sort = array();
	foreach($ranking['sort'] as $a){
	  foreach($a as $key=>$value){
	    if(!isset($sort[$key])){
		$sort[$key] = array();
	    }
          $sort[$key][] = $value;
	  }
	}
for($i=0;$i<count($sort['key']);$i++) {
	  for($j=0;$j<count($sortArray['key']);$j++){
		if($sortArray['key'][$i] == $sort['key'][$j]){
		  $ranking['alternatif'][$i]['key'] = $sortArray['key'][$i];
		  $ranking['alternatif'][$i]['value'] = $sort['value'][$j];
	        $ranking['alternatif'][$i]['ranking'] = $j;
		}
	  }
	}
      return $ranking;
    }	

    function tahap7($hasil){
	 foreach($hasil as $x){
		foreach($x as $key => $y){
		   $v[$key]['key'] = 'A'.$key;
		   $v[$key]['value'] = $y;
		}
       }
	 $v_urut = ranking($v);
	 return $v_urut;
    }
										
    function hasil($nik, $ranking){
	$a = 1;
	foreach($nik as $key => $value){
	   $warga[$key] = 'A'.$a;
	   $a++;
	}
	$no = 0;
	foreach($ranking as $a){
	   foreach($warga as $key => $value){
		if($a['key'] == $value){
			$hasil[$no]['nik'] 	 = $key;
		      $hasil[$no]['nilai'] = $a['value'];
		}
	   }	
	   $no++;
	}
	return $hasil;
    }

    // proses SAW tahap 2 - 7
    // $tahap2 = tahap2($tahap1);
    // $tahap3 = tahap3($tahap2);
    // $tahap4 = tahap4($tahap3);
    // $tahap5 = tahap5($bobot_kp);
    // $thp5 	= thp5($tahap5['deffval']);
    // $tahap6 = tahap6($thp5['normalized'], $tahap4['deff2']);
    // $tahap7 = tahap7($tahap6['hasil']);
    // $data_hasil = hasil($nilai_linguistik, $tahap7['sort']);
?>