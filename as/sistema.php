<?php
session_start();
if((!isset($_SESSION['login']))
AND (!isset($_SESSION['senha'])))
Header("Location: index.php?erro=logar");
$login = $_SESSION['login'];
$senha = $_SESSION['senha'];  
?>
<!doctype html>
<html>
<head>
	<?php  include'head.php';?>	
	<?php  include'conecta.php';?>	
</head>

<body>
	<?php  include'topo-mobile.php';?>

<div id="sistemas-topo"><div class="center"><div class="clearfix">
<?php  include'topo-desktop.php';?>
</div></div></div>

<div class="center"><div class="clearfix">
<div id="sistemas-infos">
<div id="grid12">
<div class="alinha5">III</div>
<div class="alinha6">PAINEL ADMINISTRATIVO AS WEB</div>
</div>
	
<?php
$sql = "SELECT * FROM usuarios WHERE  login = '$login' and senha = '$senha' ORDER BY id DESC";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){
	
$id = $res['id'];
$empresa= $res['empresa'];
$responsavel= $res['responsavel'];
$data_cadastro= $res['data_cadastro']; }?>	
	

<div class="alinha7">Cliente: <?php echo"$empresa "; ?></div>
<div class="alinha7">Data de criação do Site: <?php echo"$data_cadastro"; ?></div>
</div>

<div id="sistemas-menu-lateral">
<div id="grid12"><div class="sistemas-marcador"><img src="img/marcador.png"/></div></div>
	<?php  include'menu-lateral.php';?>
</div></div></div>

<?php  include'menu-lateral-mobiles.php';?>

</body>
</html>
