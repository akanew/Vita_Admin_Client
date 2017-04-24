<?php
	require_once('CurlSend.php');
	try {
		$curl = new CurlSend();
		$json_string='';//'{"id":"24","name":"Солнышки", "sanatoriumId":"1"}';
		$obj=json_decode($json_string);
		//$curl->configure('http://test/teams.php', $obj, 'PUT');//http://mentalritm.ru/vita/teams.php
		$curl->configure('http://mentalritm.ru/vita/teams.php', $obj, 'GET');//http://mentalritm.ru/vita/teams.php
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