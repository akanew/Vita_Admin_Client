<!--<!DOCTYPE HTML>
<html>
	<head>
		<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="./bootstrap/css/bootstrap-theme.min.css">
	</head>
	<body>
	
		<script src="./bootstrap/js/jquery.js"></script>
		<script src="./bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>-->
<?php
	$arr = array("s"=>"sd", "d", "ds");
	echo '<pre>';
	var_dump($arr);
	echo '</pre>';
	
	element('input', array('type'=>'submit','onclick'=>'alert(\'123\')'), null, null);
	echo '<br/>';
	echo '<br/>';
	
	function element($tagName, $attributes = [], $script=null, $valueText=null){
		$elementBody="";
		foreach($attributes as $name => $value){
			if(is_int($name)){
				$elementBody.=' '.$value;
			}
			else {
				$valList="";
				if(is_array($value)){
					foreach($value as $operation => $param)
						if(is_int($operation))
							$valList.=$param.', ';
						else
						$valList.=$operation.':'.$param.'; ';
				}
				else $valList=$value.', ';
				$valList=substr($valList, 0, -2);
				
				$elementBody.=' '.$name.'="'.$valList.'"';
			}
		}

		if($valueText == null)
			$elementCode="<".$tagName.$elementBody.(($script != null)? ' script="'.$script.'"': "")."/>";
		else $elementCode="<".$tagName.$elementBody.(($script != null)? ' script="'.$script.'"': "").">".$valueText."</".$tagName.">";
		echo $elementCode;
	}
	
	$tags = array('label', 'input','br','label', 'input','br', 'input');
	$attributes = array(array('for'=>'login'), array('name'=>'login', 'placeholder'=>'login'),array(),array('for'=>'password'), array('name'=>'password', 'placeholder'=>'password'),array(), array('type'=>'submit'));
	$scripts = array(null,null,null,null,null,null,null,);
	$values = array('','','','','','','');
	
	$i=0;
	$res="";
	while($i<7){
		$res.=element($tags[$i], $attributes[$i], $scripts[$i], $values[$i]);
		$i+=1;
	}
	element('form', array('method'=>'POST', 'style' => array('border'=>'1px solid black')), null, $res);
?>