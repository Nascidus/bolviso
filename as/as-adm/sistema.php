<?php session_start();
if((!isset($_SESSION['login']))
AND (!isset($_SESSION['senha'])))
Header("Location: index.php?erro=logar");
$login = $_SESSION['login'];
$senha = $_SESSION['senha'];  
?><!doctype html>
<!doctype html>
<html>
<head>
	<?php  include'head.php';  include'verifica.php';
	$login = $_GET['login'];
	$senha = $_GET['senha'];
	$login = $_SESSION['login'];?>	
</head>

<body>
<?php  include'topo-mobile.php';?>
<?php  include'topo.php';?>	

<div class="center"><div class="clearfix">
<div id="sistemas-infos">
<div id="grid12">
<div class="alinha5">III</div>
<div class="alinha6">PAINEL ADMINISTRATIVO AS WEB</div>
</div>
<div class="alinha7">Acesso Exclusivo As Web Design</div>
<div class="alinha7">Versão 4.0 (Mysqli)</div>	
</div>

<div id="sistemas-menu-lateral">
<div id="grid12"><div class="sistemas-marcador"><img src="img/marcador.png"/></div></div>
	<?php  include'menu-lateral.php';?>
</div></div></div>

<?php  include'menu-lateral-mobiles.php';?>

</body>
</html>