<?php session_start();?>
<!doctype html>
<html>
<head>
<?php
include'head.php';?>	
</head>

<body>
<div class="center"><div class="clearfix">
<div id="grid12"><div class="index-logo-cliente"><img src="img/cliente.png" width="100%"/></div></div>

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
if ($erro == "senha"){echo "<CENTER><span style='color: red;'>Usuário/Senha inválidos</span></CENTER>";}
if ($erro == "logar"){echo "<CENTER><span style='color: red;'>Área restrita, faça o login para acessar</span></CENTER>";}}

else {
$logout = $_GET['logout'];

if ($logout == "true"){
unset($_SESSION['login']);unset($_SESSION['tempo']);unset($_SESSION['senha']);session_destroy();Header("Location: sistema.php");}

$login = $_SESSION['login'];
echo "Olá $login, <br> você está logado.<br>";
echo "<a href=\"sistema.php\">Acessar Dados</a><br>";
echo "<a href=\"index.php?logout=true\">Logout</a><br>";}?>
	
<div class="alinha3">desenvolvido por:</div>
<div class="index-logoas">
<a href='http://asweb.com.br/' target='_blank' title='Desenvolvimento - AS Web'><img src="img/as.png" width="100%"/></a>
</div>

</div></div>
</body>
</html>