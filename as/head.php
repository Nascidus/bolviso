<?php
session_start();
if((!isset($_SESSION['login']))
AND (!isset($_SESSION['senha'])))
Header("Location: index.php?erro=logar");
$login = $_SESSION['login'];
$senha = $_SESSION['senha'];  
?>
<?php  include'conecta.php';?>
<?php  include'verifica.php';?>



	<meta name='author' content='www.aswebdesign.com.br'/>
	<link type="text/css"	rel="stylesheet"	media="screen"	href="desktop.css"/>    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   	<link rel="icon" type="image/png" sizes="70x70" href="/fav.png">
	<link href="https://fonts.googleapis.com/css?family=Jaldi" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Source+Code+Pro" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
	<title>PAINEL AS WEB</title>
