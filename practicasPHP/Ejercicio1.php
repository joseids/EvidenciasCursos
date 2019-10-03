<?php 

$arreglo = [

	'keyStr1' => 'Lado, ',
	0 => 'ledo, ',

	'keyStr2' => 'lido, ',
	1 => 'lodo, ',
	2 => 'ludo. ',
	
	'keyStr3' => 'decirlo ',
	3 => 'al ',
	
	'keyStr4' => 'revéz ',
	4 => 'lo ',
	5 => 'dudo.',
	
	'keyStr5' => 'Ludo ',
	6 => 'lado.',
	
  	'keyStr6' => '¡Qué ',
	7 => 'trabajo ',
	8 => 'me ',
	
	'keyStr7' => 'ha ',
	9 => 'costado!'
	];
?>
<html>
  <p> 
        <?php 
	   echo $arreglo ['keyStr1'];
	   echo $arreglo [0];
	   echo $arreglo ['keyStr2'];
	   echo $arreglo [1];	
	   echo $arreglo [2];
        ?> 
        <br>
	<?php 
	   echo $arreglo ['keyStr3'];
	   echo $arreglo [3];
	   echo $arreglo ['keyStr4'];
	   echo $arreglo [4];	
	   echo $arreglo [5];
        ?> 
	<br>
	<?php 
	   echo $arreglo ['keyStr5'];
	   echo $arreglo [1];
	   echo $arreglo ['keyStr2'];
	   echo $arreglo [0];	
	   echo $arreglo [6];
        ?> 
	<br>
	<?php 
	   echo $arreglo ['keyStr6'];
	   echo $arreglo [7];
	   echo $arreglo [8];
	   echo $arreglo ['keyStr7'];	
	   echo $arreglo [9];
        ?> 
  <p>
  
</html>
