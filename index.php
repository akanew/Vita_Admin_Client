<?php
	require_once('CurlSend.php');
	try {
		$curl = new CurlSend();
		$json_string='{"add":{"id":3, "name":"Чёрный лебедь", "sanatoriumId": "2"}}';
		$obj=json_decode($json_string);
		$curl->configure('http://localhost', $obj, 'POST');
		//$curl->configure('http://vhost27259.cpsite.ru/index.php', ['z'=>'1'], 'POST');
		echo $response = $curl->execute();
		$curl->close();
	} catch (Exception $exception) {
		die('An exception has been thrown: ' . $exception->getMessage());
	}
	
	/* //Работа с JSON (http://www.codeisart.ru/blog/creating-parsing-json-data-php/)
	$json_data = array ('id'=>1,'name'=>"ivan",'country'=>'Russia',"office"=>array("yandex"," management"));
	$json_string=json_encode($json_data);
	echo $json_string;
	//$json_string='{"id":2,"name":"ivan","country":"Russia","office":["yandex"," management"]} ';
	$obj=json_decode($json_string);
	var_dump($obj);*/
?>