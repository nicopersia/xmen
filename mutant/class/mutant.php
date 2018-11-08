<?php

class Mutant 
{

    public function isMutant($dna = array()){
    $arrayMulti = []; $dnaC = count($dna); $size = 0;

    //Ingresamos los datos en un array multidimensional

    for ($j=0; $j < $dnaC ;$j++) {
        $arraySplit = str_split($dna[$j]);
        $size = count($arraySplit);
        for ($i=0; $i < $size ; $i++) {
            $arrayMulti[$j][$i] = $arraySplit[$i];
        }
    }

    // Variables del blucle

    $coinEsp = 4; $cont = 0; $coincideX = true; $coincideY = true; $coincideD = true; $coincideDN = true; $cantCoincide = 0; $arrayAux = [];

    //Comienza busqueda de coincidencias

    for ($i=0; $i < $size; $i++) { 
        for ($j=0; $j < $size; $j++) { 
            if ($i<$size && $j<$size) {

                // Buscamos coincidencias horizontales

                while ($coincideX == true && $cantCoincide<=$coinEsp) {

                    if($cantCoincide == 0){
                        $arrayAux[0] = $i; $arrayAux[1] = $j+1;
                    }

                    if($arrayAux[0]<$size && $arrayAux[1]<$size){

                    if($arrayMulti[$i][$j] == $arrayMulti[$arrayAux[0]][$arrayAux[1]] && $coincideX == true){

                        $arrayAux[1] = $arrayAux[1]+1; $cantCoincide += 1;

                        if($cantCoincide == $coinEsp-1){
                            $cont += 1; $cantCoincide = 0;
                            break;
                        }

                    }else{
                        $coincideX = false; $cantCoincide = 0;
                    }
                }else{
                    $coincideX = false; $cantCoincide = 0;
                }

                }

                //Buscamos coincidencias verticales

                while($coincideY == true && $cantCoincide<=$coinEsp){

                    if($cantCoincide == 0){
                        $arrayAux[0] = ($i+1); $arrayAux[1] = $j;
                    }

                    if($arrayAux[0]<$size && $arrayAux[1]<$size){

                    if($arrayMulti[$i][$j] == $arrayMulti[$arrayAux[0]][$arrayAux[1]] && $coincideY == true){

                        $arrayAux[0] = $arrayAux[0]+1; $cantCoincide += 1;

                        if($cantCoincide == $coinEsp-1){
                            $cont += 1; $cantCoincide = 0;
                            break;

                        }

                    }else{
                        $coincideY = false; $cantCoincide = 0;
                    }

                }else{
                    $coincideY = false; $cantCoincide = 0;
                }

                }

                //Buscamos coincidencias diagonales descendentes

                while($coincideD == true && $cantCoincide<=$coinEsp){
            
                    if($cantCoincide == 0){
                        $arrayAux[0] = ($i+1); $arrayAux[1] = ($j+1);
                    }
            
                    if($arrayAux[0]<=$size-3 && $arrayAux[1]<=$size-3){
            
                    if($arrayMulti[$i][$j] == $arrayMulti[$arrayAux[0]][$arrayAux[1]] && $coincideD == true){
            
                        $arrayAux[0] = $arrayAux[0]+1; $arrayAux[1] = $arrayAux[1]+1; $cantCoincide += 1;
            
                        if($cantCoincide == $coinEsp-1){
                            $cont += 1; $cantCoincide = 0;
                            break;
            
                        }
            
                    }else{
                        $coincideD = false; $cantCoincide = 0;
                    }
            
                }else{
                    $coincideD = false; $cantCoincide = 0;
                }
            
                }

                //Buscamos coincidencias diagonales ascendentes

                while($coincideDN == true && $cantCoincide<=$coinEsp){
            
                    if($cantCoincide == 0){
                        $arrayAux[0] = ($i-1); $arrayAux[1] = ($j+1);
                    }
            
                    if($arrayAux[0]>=$size-6  && $arrayAux[1]<$size-2){
            
                    if($arrayMulti[$i][$j] == $arrayMulti[$arrayAux[0]][$arrayAux[1]] && $coincideDN == true){
            
                        $arrayAux[0] = $arrayAux[0]-1; $arrayAux[1] = $arrayAux[1]+1; $cantCoincide += 1;
            
                        if($cantCoincide == $coinEsp-1){
                            $cont += 1; $cantCoincide = 0;
                            break;
            
                        }
            
                    }else{
                        $coincideDN = false; $cantCoincide = 0;
                    }
            
                }else{
                    $coincideDN = false; $cantCoincide = 0;
                }
            
                }
            

            $cantCoincide = 0; $coincideX = true; $coincideY = true; $coincideD = true; $coincideDN = true;

        }

        $cantCoincide = 0; $coincideX = true; $coincideY = true; $coincideD = true; $coincideDN = true;
    }

    }

        if($cont > 1){
            return true;
        }else{
            return false;
        }
    }
}

?>
