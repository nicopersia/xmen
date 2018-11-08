<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers:  content-type");
header('Content-Type: application/json');

function isMutant($dna = array()){

// $string = ["ATGCGA","CAGTGC","TTATGT","AGAAGG","CCCCTA","TCACTG"];

$arrayMulti = [];

$dnaC = count($dna);

$size = 0;

// foreach ($dna as $indice => $value) {

// 	$arraySplit = str_split($value);

// 	$size = count($arraySplit);

// 	for ($i=0; $i < $size ; $i++) { 
		
// 		$arrayMulti[$i][$indice] = $arraySplit[$i];
// 	}
// }

for ($j=0; $j < $dnaC ;$j++) {

	$arraySplit = str_split($dna[$j]);

	$size = count($arraySplit);

	for ($i=0; $i < $size ; $i++) { 
		
		$arrayMulti[$j][$i] = $arraySplit[$i];
	}
}

//echo $arrayMulti[1][0];

$coinEsp = 4;
$cont = 0;
$coincideX = true;
$coincideY = true;
$coincideD = true;
$coincideDN = true;
$cantCoincide = 0;
$ci = "";
$arrayAux = [];

for ($i=0; $i < $size; $i++) { 
	for ($j=0; $j < $size; $j++) { 
		if ($i<$size && $j<$size) {

			while ($coincideX == true && $cantCoincide<=$coinEsp) {

				//echo 'Salto X';

				if($cantCoincide == 0){
					$arrayAux[0] = $i;
					$arrayAux[1] = $j+1;
				}

				if($arrayAux[0]<$size && $arrayAux[1]<$size){

				if($arrayMulti[$i][$j] == $arrayMulti[$arrayAux[0]][$arrayAux[1]] && $coincideX == true){
					//echo '<br>Comparando array: '.$i.$j.' con array: '.$arrayAux[0].$arrayAux[1];
					//echo " Encontrado: X".$arrayMulti[$i][$j]."=".$arrayMulti[$arrayAux[0]][$arrayAux[1]];

					$arrayAux[1] = $arrayAux[1]+1;

					$cantCoincide += 1;

					//echo 'Coincidencia: X'.$cantCoincide;

					if($cantCoincide == $coinEsp-1){
						//echo 'Salto X';
						$cont += 1;
						//$ci = $i.$j.($i+1).$j;
						$ci = $arrayMulti[$i][$j].$arrayMulti[$arrayAux[0]][$arrayAux[0]];
						$cii = $i;
						$cii .= $j;
						$cii .= $arrayAux[0];
						$cii .= $arrayAux[1];
						$cantCoincide = 0;
						//echo 'Estoy saltando X';
						break;

					}

					//break;

				}else{
					$coincideX = false;
					$cantCoincide = 0;
				}
			}else{
				$coincideX = false;
				$cantCoincide = 0;
			}

			}

			while($coincideY == true && $cantCoincide<=$coinEsp){

				//echo 'Salto Y';

				if($cantCoincide == 0){
					$arrayAux[0] = ($i+1);
					$arrayAux[1] = $j;
				}

				if($arrayAux[0]<$size && $arrayAux[1]<$size){

				if($arrayMulti[$i][$j] == $arrayMulti[$arrayAux[0]][$arrayAux[1]] && $coincideY == true){

					//echo '<br>Comparando array: '.$i.$j.' con array: '.$arrayAux[0].$arrayAux[1];
					//echo " Encontrado: Y".$arrayMulti[$i][$j]."=".$arrayMulti[$arrayAux[0]][$arrayAux[1]];

					$arrayAux[0] = $arrayAux[0]+1;

					$cantCoincide += 1;

					//echo 'Coincidencia: Y'.$cantCoincide;

					if($cantCoincide == $coinEsp-1){
						//echo 'Salto Y';
						$cont += 1;
						//$ci = $i.$j.($i+1).$j;
						$ci = $arrayMulti[$i][$j].$arrayMulti[$arrayAux[0]][$arrayAux[1]];
						$cii = $i;
						$cii .= $j;
						$cii .= $arrayAux[0];
						$cii .= $arrayAux[1];
						$cantCoincide = 0;
						//echo 'Estoy saltando Y';
						break;

					}

					//break;

				}else{
					$coincideY = false;
					$cantCoincide = 0;
				}

			}else{
				$coincideY = false;
				$cantCoincide = 0;
			}

			}

			while($coincideD == true && $cantCoincide<=$coinEsp){

				//echo 'Salto D';
		
				if($cantCoincide == 0){
					$arrayAux[0] = ($i+1);
					$arrayAux[1] = ($j+1);
				}
		
				if($arrayAux[0]<=$size-3 && $arrayAux[1]<=$size-3){
		
				if($arrayMulti[$i][$j] == $arrayMulti[$arrayAux[0]][$arrayAux[1]] && $coincideD == true){
		
					//echo '<br>Comparando array: '.$i.$j.' con array: '.$arrayAux[0].$arrayAux[1];
					//echo " Encontrado: D".$arrayMulti[$i][$j]."=".$arrayMulti[$arrayAux[0]][$arrayAux[1]];
		
					$arrayAux[0] = $arrayAux[0]+1;
					$arrayAux[1] = $arrayAux[1]+1;
		
					$cantCoincide += 1;
		
					//echo 'Coincidencia: Y'.$cantCoincide;
		
					if($cantCoincide == $coinEsp-1){
						//echo 'Salto Y';
						$cont += 1;
						//$ci = $i.$j.($i+1).$j;
						$ci = $arrayMulti[$i][$j].$arrayMulti[$arrayAux[0]][$arrayAux[1]];
						$cii = $i;
						$cii .= $j;
						$cii .= $arrayAux[0];
						$cii .= $arrayAux[1];
						$cantCoincide = 0;
						//echo 'Estoy saltando Y';
						break;
		
					}
		
				}else{
					$coincideD = false;
					$cantCoincide = 0;
				}
		
			}else{
				$coincideD = false;
				$cantCoincide = 0;
			}
		
			}

			while($coincideDN == true && $cantCoincide<=$coinEsp){

				//echo 'Entro DN';
		
				if($cantCoincide == 0){
					$arrayAux[0] = ($i-1);
					$arrayAux[1] = ($j+1);
				}
		
				if($arrayAux[0]>=$size-6  && $arrayAux[1]<$size-2){
		
				if($arrayMulti[$i][$j] == $arrayMulti[$arrayAux[0]][$arrayAux[1]] && $coincideDN == true){
					//echo '<br>Comparando array: '.$i.$j.' con array: '.$arrayAux[0].$arrayAux[1];
					//echo " Encontrado: DN".$arrayMulti[$i][$j]."=".$arrayMulti[$arrayAux[0]][$arrayAux[1]];
		
					$arrayAux[0] = $arrayAux[0]-1;
					$arrayAux[1] = $arrayAux[1]+1;
		
					$cantCoincide += 1;
		
					//echo 'Coincidencia: Y'.$cantCoincide;
		
					if($cantCoincide == $coinEsp-1){
						//echo 'Salto Y';
						$cont += 1;
						//$ci = $i.$j.($i+1).$j;
						$cantCoincide = 0;
						//echo 'Estoy saltando Y';
						break;
		
					}
		
					//break;
		
				}else{
					$coincideDN = false;
					$cantCoincide = 0;
				}
		
			}else{
				$coincideDN = false;
				$cantCoincide = 0;
			}
		
			}
		

		$cantCoincide = 0;
		$coincideX = true;
		$coincideY = true;
		$coincideD = true;
		$coincideDN = true;

	}

	$cantCoincide = 0;
	$coincideX = true;
	$coincideY = true;
	$coincideD = true;
	$coincideDN = true;
}

}

if($cont >= 1){
	//echo 'Cantidad de coincidencias: '.$cont;
	return true;
}else{
	//echo 'Cantidad de coincidencias: '.$cont;
	return false;
}

// if($datos['numero'] == 1){
// 	http_response_code(200);
// }else{
// 	http_response_code(403);
// }

//echo json_encode($arrayMulti);
//echo $arrayMulti[3][4];

}

$request_body = file_get_contents('php://input');

$datos = json_decode($request_body, true);

$data = $datos['dna'];

$result = isMutant($data);

if($result){
	http_response_code(200);
}else{
	http_response_code(403);
}

?>