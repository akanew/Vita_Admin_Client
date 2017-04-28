<html>
	<head>
		<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="./bootstrap/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="./css/style.css">
		<? include("./php/requestAdapter.php"); ?>
		<meta charset="UTF-8">
	</head>
	<body class="no-margin">
		<?
			$url = "http://mentalritm.ru/vita/teams.php";
			
			$type = $_POST['type'];
			if($_POST['page'])
				$page = $_POST['page'];
			else {
				$_POST=array('action'=>'','page'=>'getTeam');
				$page = $_POST['page'];
			}
			
			if(isset($_POST['action']))
			{
				switch($page){
					case 'addTeam':
						$jsonString = '{"id":"'.$_POST["id"].'","name":"'.$_POST["name"].'","sanatoriumId":"'.$_POST["sanatoriumId"].'"}';						
						$jsonAnswer = jsonRequest($url, $type, $jsonString);
					break;
					case 'getTeam':						
						//$jsonAnswer = jsonRequest($url, 'GET', '{}');
					break;
					case 'deleteTeam':						
						$jsonString = '{"id":"'.$_POST["id"].'"}';
						$jsonAnswer = jsonRequest($url, $type, $jsonString);
					break;
					case 'updateTeam':						
						$jsonString = '{"id":"'.$_POST["id"].'","name":"'.$_POST["name"].'","sanatoriumId":"'.$_POST["sanatoriumId"].'"}';
						$jsonAnswer = jsonRequest($url, $type, $jsonString);
					break;
					default;
				}
				$jsonAnswer = jsonRequest($url, 'GET', '{}');
			}
		?>
		<div class="row header no-margin">
			<? include("./templates/header.php"); ?>
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
					// настройка высоты основных блоков при ресайзе окна
					$('.body').css('height',(document.body.clientHeight-($('.header').height()+$('.footer').height()))+'px');
					$('.block-menu').css('height',(document.body.clientHeight-($('.header').height()+$('.footer').height()))+'px');
					$('.block-body').css('height',(document.body.clientHeight-($('.header').height()+$('.footer').height()))+'px');
					$('.toggle-div').css('height',(document.body.clientHeight-($('.header').height()+$('.footer').height()))+'px');
					$("#toggle-frm").css('display','none');
					$("#toggle-li-text").css('display','none');
					
					// для адаптивности сайта
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
			
			//Выпадающая форма снизу рабочей области
			$( ".toggle-btn" ).click(function() {
				$("#toggle-frm").slideToggle("slow");
				$("#toggle-li-btn").css('display','none');
				$("#toggle-li-text").css('display','block');
			});
						
			$( ".edit-btn" ).click(function() {
				$("#toggle-frm").slideToggle("slow");
				$("#toggle-li-btn").css('display','none');
				$("#toggle-li-text").css('display','block');
				document.getElementsByClassName('add-btn')[0].value = 'Изменить запись';
				var addForm = document.getElementsByClassName('add-form')[0];
				addForm.getElementsByTagName('input')[0].value = 'PUT';
				addForm.getElementsByTagName('input')[1].value = 'updateTeam';
			});
			
			$( ".toggle-li" ).click(function() {
				document.getElementsByClassName('add-btn')[0].value = 'Добавить запись';
				var addForm = document.getElementsByClassName('add-form')[0];
				addForm.getElementsByTagName('input')[0].value = 'POST';
				addForm.getElementsByTagName('input')[1].value = 'addTeam';
			});
			
		</script>
		<script src="./bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>