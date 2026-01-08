<?php session_start(); ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
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

<?php  include'conecta.php';?>	
</head>

<body>
<div class="center"><div class="clearfix">
		
		   	
<?php
$sql = "SELECT * FROM img_adm WHERE categoria ='logotipo_principal' ORDER BY id DESC  LIMIT 1 ";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){
$id = $res['id'];
$imgname= $res['imgname']; 	
echo"
		
<div id=\"grid12\"><div class=\"index-logo-cliente\"><img src=\"img2/img_adm/$imgname\" width=\"100%\"/></div></div>"
; }?>
				

<?php if( (!isset($_SESSION['login'])) AND (!isset($_SESSION['nome'])) ){
echo "
	
<div id=\"grid12\"><div id=\"index-login\">
<div class=\"alinha1\">FAZER LOGIN</div>
<form action=autentica.php method='POST'>
<label for=\"login\" class=\"alinha2\">Login:</label>
<input type=\"text\" name=\"login\" class=\"form1\" required/>
<br><br>
<label for=\"telefone\" class=\"alinha2\">Senha:</label>
<input type=\"password\" name=\"senha\" class=\"form1\" required>
<div class=\"acessar\"><a href=\"sistema\"><input type=\"submit\" name=\"submit\" style=\"cursor:pointer\" class=\"acessar\" value=\"ACESSAR\"/></form></a></div>
</div></div>";
	
	

$erro = $_GET['erro'];
if ($erro == "senha"){
echo "<span style='color: red;'>Usuário/Senha inválidos</span>";
}
if ($erro == "logar"){
echo "<span style='color: red;'>Área restrita, faça o login para acessar</span>";
}

} else {

$logout = $_GET['logout'];

if ($logout == "true"){

unset($_SESSION['login']);
unset($_SESSION['tempo']);
unset($_SESSION['senha']);
session_destroy();


Header("Location: sistema.php");

}

$login = $_SESSION['login'];

echo "<div style=\" width: 100%; float: left; background-color: none; text-align: center;\"> Olá $login, você está logado.<br>";
echo "<a href=\"sistema.php\">Acessar Dados</a><br>";
echo "<a href=\"index.php?logout=true\">Logout</a><br>";


}

?>
	
	

<div class="alinha3">desenvolvido por:</div>
<div class="index-logoas">
<a href='http://asweb.com.br/' target='_blank' title='Desenvolvimento - AS Web'><img src="img/as.png" width="100%"/></a>
</div>

</div></div>
</body>
</html>