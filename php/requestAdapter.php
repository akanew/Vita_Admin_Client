<?
	include("./php/CurlSend.php");
	
	function jsonRequest($url, $type, $jsonString){
		try {
			$curl = new CurlSend();
			$obj=json_decode($jsonString);
			$curl->configure($url, $obj, $type);
			$response = $curl->execute();
			//$curl->close();
		} catch (Exception $exception) {
			$response = 'An exception has been thrown: ' . $exception->getMessage();
		}
		return $response;
	}
?>

<?php
	/*require_once('CurlSend.php');
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
	}*/
?>