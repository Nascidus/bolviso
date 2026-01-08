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

$sql = "SELECT * FROM facebook";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){
	
$id = $res['id'];
$url = $res['url']; $url = utf8_encode($url);
$title = $res['title']; $title = utf8_encode($title);
$site_name = $res['site_name']; $site_name = utf8_encode($site_name);
$image = $res['image']; $image = utf8_encode($image);	
$type = $res['type']; $type = utf8_encode($type);		
$description = $res['description']; $description = utf8_encode($description);		
	
	
}?>

<form action='meta-tags-facebook?acao=editar&id=<?php echo"$id"; ?>' method='POST'>
	
<div id="notas">Campo Técnico, favor solicitar ao programador as informações!</div>

<div class="cut1">
	
<div id="formulario">
<label for="url">URL:</label>
<input type="text" name="url" value="<?php echo"$url";?>" class="form3"/>
</div>
	

<div id="formulario">
<label for="title">Title:</label>
<input type="text" name="title" value="<?php echo"$title";?>" class="form3"/>
</div>
	
<div id="formulario">
<label for="site_name">Site Name:</label>
<input type="text" name="site_name" value="<?php echo"$site_name";?>" class="form3"/>
</div>
	
<div id="formulario">
<label for="image">Imagem do Site:</label>
<input type="text" name="image" value="<?php echo"$image";?>" class="form3"/>
</div>
	
<div id="formulario">
<label for="type">Type:</label>
<input type="text" name="type" value="<?php echo"$type";?>" class="form3"/>
</div>
	
</div>
	
	
<div id="grid12E">
<label for="description">Description:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Descrição do site para compartilhamento no Facebook</span>
</div></label>
<textarea class='form4' name='description'/><?php echo"$description";?></textarea>
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

	

$url = $_POST['url']; $url = utf8_encode($url);
$title = $_POST['title']; $title = utf8_encode($title);
$site_name = $_POST['site_name']; $site_name = utf8_encode($site_name);
$image = $_POST['image']; $image = utf8_encode($image);	
$type = $_POST['type']; $type = utf8_encode($type);		
$description = $_POST['description']; $description = utf8_encode($description);
	
 
$caminho = "<script language='javascript'>function alerta(){alert('Dados alterados com sucesso!');}alerta(); document.location='meta-tags-facebook'; </script>";


$sql="UPDATE `facebook` SET `url` = '$url', `title` = '$title', `site_name` = '$site_name' , `image` = '$image' , `type` = '$type' , `description` = '$description'  WHERE `id` =$id";     

if ($conn->query($sql) === TRUE) {

echo"$caminho";}

else{ echo "<script language='javascript'>function alerta(){alert('Erro Econtrado!');}alerta();document.location='javascript:history.go(-1)';</script>";

}}?>




</body>
</html>