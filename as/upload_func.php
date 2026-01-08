<?php

function upload($tmp, $nome, $largura, $pasta){
	
	
	$img = imagecreatefromjpeg($tmp); 
	$x = imagesx($img);
	$y = imagesy ($img);
	$altura = ($largura*$y) / $x;
	$nova = imagecreatetruecolor ($largura, $altura);	
	imagecopyresampled($nova, $img, 0, 0, 0, 0, $largura, $altura, $x, $y);
	imagedestroy($img);	
	
	
	$marca = imagecreatefrompng('marca.png');
	$marcax = imagesx($marca);
	$marcay = imagesy($marca);
	$localx = $largura-80;
	$localy = $altura-30;
	imagecopyresampled($nova, $marca, $localx, $localy, 0, 0, 60, 30, $marcax, $marcay);
	
	
	imagejpeg($nova, "$pasta/$nome");
	imagedestroy($nova);
	return($nome);
	
	
}


?>