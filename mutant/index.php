<?php

include 'class/mutant.php';
include 'functions.php';

//Instanciamos la clase Mutante

$mutante = new Mutant();

//Obtenemos los datos que ingresan por post

$request_body = file_get_contents('php://input');

$datos = json_decode($request_body, true);

if(isset($datos['dna'])){

$data = $datos['dna'];

$result = $mutante->isMutant($data);

	if($result){
		$codigo = 200;
		$isMutant = 1;
	}else{
		$codigo = 403;
		$isMutant = 0;
	}

	$url = 'https://xmen-221503.appspot.com/insert/';

	$data = ['dna' => json_encode($data), 'isMutant' => $isMutant];

	// $headers = "accept: */*\r\n" .
	// "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36\r\n" .
	// "Content-Type: application/x-www-form-urlencoded\r\n" .
	// "Access-Control-Allow-Origin: *\r\n" .
	// "Access-Control-Allow-Methods: POST\r\n" .
	// "Access-Control-Allow-Headers:  content-type\r\n";

	// $context = [
    // 'http' => [
    //     'method' => 'POST',
    //     'header' => $headers,
    //     'content' => http_build_query($data),
    // ]
	// ];
	// $context = stream_context_create($context);
	// $result = file_get_contents($url, false, $context);

	$s = curl_init();
    	curl_setopt($s, CURLOPT_URL, $url);
		curl_setopt($s, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($s, CURLOPT_CUSTOMREQUEST, 'POST');
		curl_setopt($s, CURLOPT_POSTFIELDS, json_encode($data, true));
		

	$response = curl_exec($s);
	echo $response;
	curl_close($s);

	http_response_code($codigo);

}else{
	echo 'Formato de JSON incorrecto, se esperaba dna: []';
}

?>