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

<html>
	<head>
		<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="./bootstrap/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="./css/style.css">
		<meta charset="UTF-8">
	</head>
	<body class="no-margin">
		<div class="row header no-margin">
			<? include("./templates/header.php"); ?>
		</div>
		<div style="position: relative; z-index: 10; width: 250px; height: 102px; background:white; border-radius:35px; margin-top: -87px; margin-left: 70px; margin-bottom: -40px; box-shadow: 0 0 12px rgba(0,0,0,0.6) inset, 0 0 5px rgba(0,0,0,0.5); ">
		<img src="./logo3.png" alt="logo" style="width: 150px; /*border-radius:50%;*/ margin-left: 20px; margin-top: 15px;"/>
		</div>
		<div style="position: relative; z-index: 10; width: 150px; height: 150px; background:white; border-radius:50%; margin-top: -125px; margin-left: 250px; margin-bottom: -40px; box-shadow: 0 0 10px rgba(0,0,0,0.8);">
			<img src="./logo2.png" alt="logo" style="border-radius:50%; margin-left: 15px; margin-top: 15px;"/>
		</div>
		<div class="row body no-margin">
			<? include("./templates/body.php"); ?>
		</div>
		<div class="row footer no-margin navbar-fixed-bottom">
			<? include("./templates/footer.php"); ?>
		</div>
		<script src="./bootstrap/js/jquery-3.0.0.min.js"></script>
		<script src="./js/script.js"></script>
		<script>
			$( window ).resize(
				function() {
					$('.body').css('height',(document.body.clientHeight-($('.header').height()+$('.footer').height()))+'px');
					$('.block-menu').css('height',(document.body.clientHeight-($('.header').height()+$('.footer').height()))+'px');
					$('.block-body').css('height',(document.body.clientHeight-($('.header').height()+$('.footer').height()))+'px');
					$('.toggle-div').css('height',(document.body.clientHeight-($('.header').height()+$('.footer').height()))+'px');
					$("#toggle-frm").css('display','none');
					$("#toggle-li-text").css('display','none');
				}				
			);
			$(window).resize();
			$( ".toggle-btn" ).click(function() {
			  $("#toggle-frm").slideToggle("slow");
			  $("#toggle-li-btn").css('display','none');
			  $("#toggle-li-text").css('display','block');
			});
		</script>
		<script src="./bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>
<!--<html>
	<head>
	<style>
#grey_box {
	width: 200px;
	height: 200px;
	border: solid 1px #ccc;
	background: #ddd;
	position: relative;
	z-index: 1;
}
 
#blue_box {
	width: 200px;
	height: 200px;
	border: solid 1px #4a7497;
	background: #8daac3;
	position: relative;
	z-index: 0;
	margin-top: -50px;
	margin-left: 50px;
}
</style>
</head>
<body>
<div id="grey_box"></div>
<div id="blue_box"></div>
<div id="grey_box" class="row header no-margin">
	<? //include("./templates/header.php"); ?>
</div>
</body>
</html>-->