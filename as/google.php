<?php
session_start();
if((!isset($_SESSION['login']))
AND (!isset($_SESSION['senha'])))
Header("Location: index.php?erro=logar");
$login = $_SESSION['login'];
$senha = $_SESSION['senha'];  
?><!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<?php  include'head.php';?>	
</head>

<body>
	<?php  include'topo-mobile.php';?>

<div id="sistemas-topo"><div class="center"><div class="clearfix">
<?php  include'topo-desktop.php';?>
</div></div></div>

<div class="center"><div class="clearfix">
<div id="sistemas-infos">

<div id="grid12">
<div class="painel-cliente-icone"><img src="img/icons/institucional.png" width="100%"/></div>
<div class="alinha14">META TAGS FACEBOOK</div>
</div>

<div id="painel-cliente">
	
	
	
<?php

$sql = "SELECT * FROM google  ";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){
	
$id = $res['id'];

$google_maps = $res['google_maps']; 
$texto_busca = $res['texto_busca']; 
$google_analytics = $res['google_analytics']; 
$google_tag_manager = $res['google_tag_manager']; 
$rd_station = $res['rd_station']; 
	
}?>

<form action='google?acao=editar&id=<?php echo"$id"; ?>' method='POST'>
	
<div id="notas">Campo Técnico, favor solicitar ao programador as informações!</div>

	
<div id="grid12E">
<label for="google_maps">Google Maps:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Código para exibição do mapa de localização</span>
</div></label>
<textarea class='form4' name='google_maps'/><?php echo"$google_maps";?></textarea>
</div>
	
	
	

<div id="grid12E">
<label for="texto_busca">Texto Exibição Busca Google:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Máximo 20 palavras</span>
</div></label>
<textarea class='form4' name='texto_busca'/><?php echo"$texto_busca";?></textarea>
</div>

	
	
<div id="grid12E">
<label for="google_analytics">Código Google Analytics:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Código para relatórios Google Analytics</span>
</div></label>
<textarea class='form4' name='google_analytics'/><?php echo"$google_analytics";?></textarea>
</div>
	

<div id="grid12E">
<label for="google_tag_manager">Código Google Tag Manager:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Código para relatórios Google Tag Manager</span>
</div></label>
<textarea class='form4' name='google_tag_manager'/><?php echo"$google_tag_manager";?></textarea>
</div>
	



<div id="grid12E">
<label for="rd_station">Código RD Station:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Código Integração RD Station</span>
</div></label>
<textarea class='form4' name='rd_station'/><?php echo"$rd_station";?></textarea>
</div>
	
	

<div id="grid12">
<div class="alterar"><a href="sistema">
	<input type="submit" name="submit" style="cursor:pointer" class="alterar" value="ALTERAR"/></a></div>
</div></div></div>
	
</form>

<div id="sistemas-menu-lateral">
<div id="grid12"><div class="sistemas-marcador"><img src="img/marcador.png"/></div></div>
	<?php  include'menu-lateral.php';?>
</div></div></div>

<?php  include'menu-lateral-mobiles.php';?>



<?php

$id = $_GET['id'];
$acao = $_GET['acao'];
if ($acao=='editar'){

	
$google_maps = $_POST['google_maps']; 
$texto_busca = $_POST['texto_busca']; 
$google_analytics = $_POST['google_analytics'];
$google_tag_manager = $_POST['google_tag_manager']; 
$rd_station = $_POST['rd_station']; 
	
 
$caminho = "<script language='javascript'>function alerta(){alert('Dados alterados com sucesso!');}alerta(); document.location='google'; </script>";


$sql="UPDATE `google` SET 
`google_maps` = '$google_maps', 
`texto_busca` = '$texto_busca', 
`google_analytics` = '$google_analytics', 
`google_tag_manager` = '$google_tag_manager',
`rd_station` = '$rd_station'    
WHERE `id` =$id";     


if ($conn->query($sql) === TRUE) {

echo"$caminho";}

else{ echo "<script language='javascript'>function alerta(){alert('Erro Econtrado!');}alerta();document.location='javascript:history.go(-1)';</script>";

}}?>




</body>
</html>