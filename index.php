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
		<link rel="stylesheet" href="./css/new_style.css">
		<meta charset="UTF-8">
	</head>
	<body class="no-margin">
		<div class="row header no-margin">
			<? include("./templates/header.php"); ?>
		</div>
		<div class="logo hidden-xs">
			<div class="logo-text">
				<img src="./logo3.png" alt="logo"/>
			</div>
			<div class="logo-img">
				<img src="./logo2.png" alt="logo"/>
			</div>
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
					
					if(document.body.clientWidth < 950){
						$(".logo-text").css('margin-left',"0");
						$(".logo-img").css('margin-left',"170px");
						$(".vertical-menu").css('margin-top',"8px");
					}
					else {
						$(".logo-text").css('margin-left',"70px");
						$(".logo-img").css('margin-left',"250px");
						$(".vertical-menu").css('margin-top',"0");
					}
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