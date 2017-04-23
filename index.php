<?php
	require_once('CurlSend.php');
	try {
		$curl = new CurlSend();
		$json_string='{"id":20}';
		$obj=json_decode($json_string);
		$curl->configure('http://localhost', $obj, 'DELETE');
		//$curl->configure('http://vhost27259.cpsite.ru/index.php', ['z'=>'1'], 'POST');
		echo $response = $curl->execute();
		$curl->close();
	} catch (Exception $exception) {
		die('An exception has been thrown: ' . $exception->getMessage());
	}
/*	$curl = curl_init("http://127.0.0.1:12345");
	$json_string='{"id":"1", "name":"bn"}';
	$data=json_decode($json_string);
	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
	curl_setopt($curl, CURLOPT_HEADER, false);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json',"OAuth-Token: $token"));
	curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));

	// Make the REST call, returning the result
	$response = curl_exec($curl);
	if (!$response) {
		die("Connection Failure.n");
	}
	echo($response);
	/* //Работа с JSON (http://www.codeisart.ru/blog/creating-parsing-json-data-php/)
	$json_data = array ('id'=>1,'name'=>"ivan",'country'=>'Russia',"office"=>array("yandex"," management"));
	$json_string=json_encode($json_data);
	echo $json_string;
	//$json_string='{"id":2,"name":"ivan","country":"Russia","office":["yandex"," management"]} ';
	$obj=json_decode($json_string);
	var_dump($obj);*/
?>