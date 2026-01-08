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
<div class="painel-cliente-icone"><img src="img/icons/redes.png" width="100%"/></div>
<div class="alinha14">REDES SOCIAIS</div>
</div>

<div id="painel-cliente">
	
	
	
<?php

$sql = "SELECT * FROM redes_sociais  ORDER BY id DESC ";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){
	
$id = $res['id'];

$facebook= $res['facebook']; $facebook_link= $res['facebook_link'];
$twitter= $res['twitter'];
$youtube= $res['youtube']; $youtube_link= $res['youtube_link']; 
$google_plus= $res['google_plus'];  $
$vimeo= $res['vimeo'];	
$pinterest= $res['pinterest']; 
$palco_mp3= $res['palco_mp3']; 
$sua_musica= $res['sua_musica']; 
$vagalume= $res['vagalume']; 
$ta_estourado= $res['ta_estourado'];
$linkedin= $res['linkedin'];
$behance= $res['behance'];
$whatsapp= $res['whatsapp'];
$whatsapp_link= $res['whatsapp_link'];		
$itunes= $res['itunes']; $itunes_link= $res['itunes_link']; 
$deezer= $res['deezer']; $deezer_link= $res['deezer_link']; 
$spotify= $res['spotify'];  $spotify_link= $res['spotify_link']; 
$loja_virtual= $res['loja_virtual'];  
$instagram= $res['instagram']; $instagram_link= $res['instagram_link']; 
$linkedin_link= $res['linkedin_link'];
$behance_link= $res['behance_link'];
	
	
}?>

<form action='redes-sociais?acao=editar&id=<?php echo"$id"; ?>' method='POST'>
	

<div class="cut1">
	
	
<?php if ($facebook=='Não'){echo"";} else {echo"	
<div id=\"formulario\">
<label for=\"facebook_link\">Facebook:</label>
<input type=\"text\" name=\"facebook_link\" value=\"$facebook_link\" class=\"form3\"/>
</div>	";} ?>

<?php if ($instagram=='Não'){echo"";} else {echo"	
<div id=\"formulario\">
<label for=\"instagram_link\">Instagram:</label>
<input type=\"text\" name=\"instagram_link\" value=\"$instagram_link\" class=\"form3\"/>
</div>	";} ?>	
	
<?php if ($youtube=='Não'){echo"";} else {echo"	
<div id=\"formulario\">
<label for=\"youtube_link\">Youtube:</label>
<input type=\"text\" name=\"youtube_link\" value=\"$youtube_link\" class=\"form3\"/>
</div>	";} ?>		

<?php if ($itunes=='Não'){echo"";} else {echo"	
<div id=\"formulario\">
<label for=\"itunes_link\">Itunes:</label>
<input type=\"text\" name=\"itunes_link\" value=\"$itunes_link\" class=\"form3\"/>
</div>	";} ?>	
	
<?php if ($spotify=='Não'){echo"";} else {echo"	
<div id=\"formulario\">
<label for=\"spotify_link\">Spotify:</label>
<input type=\"text\" name=\"spotify_link\" value=\"$spotify_link\" class=\"form3\"/>
</div>	";} ?>	
	
<?php if ($deezer=='Não'){echo"";} else {echo"	
<div id=\"formulario\">
<label for=\"deezer_link\">Deezer:</label>
<input type=\"text\" name=\"deezer_link\" value=\"$deezer_link\" class=\"form3\"/>
</div>	";} ?>	
	

<?php if ($whatsapp=='Não'){echo"";} else {echo"	
<div id=\"formulario\">
<label for=\"whatsapp\">Whatsapp:</label>
<input type=\"text\" name=\"whatsapp_link\" value=\"$whatsapp_link\" class=\"form3\"/>
</div>	";} ?>	
	
<?php if ($linkedin=='Não'){echo"";} else {echo"	
<div id=\"formulario\">
<label for=\"linkedin\">Linkedin:</label>
<input type=\"text\" name=\"linkedin_link\" value=\"$linkedin_link\" class=\"form3\"/>
</div>	";} ?>	


<?php if ($behance=='Não'){echo"";} else {echo"	
<div id=\"formulario\">
<label for=\"behance\">Behance:</label>
<input type=\"text\" name=\"behance_link\" value=\"$behance_link\" class=\"form3\"/>
</div>	";} ?>	

	
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

	

$facebook= $_POST['facebook'];  $facebook_link= $_POST['facebook_link']; 
$twitter= $_POST['twitter']; 
$youtube= $_POST['youtube'];  $youtube_link= $_POST['youtube_link']; 
$google_plus= $_POST['google_plus'];  
$vimeo= $_POST['vimeo'];
	
$pinterest= $_POST['pinterest']; 
$palco_mp3= $_POST['palco_mp3']; 
$sua_musica= $_POST['sua_musica']; 
$vagalume= $_POST['vagalume'];  
$ta_estourado= $_POST['ta_estourado'];
$linkedin= $_POST['linkedin'];
$whatsapp= $_POST['whatsapp'];
$whatsapp_link= $_POST['whatsapp_link'];		
	
$itunes= $_POST['itunes'];  $itunes_link= $_POST['itunes_link']; 
$deezer= $_POST['deezer'];  $deezer_link= $_POST['deezer_link']; 
$spotify= $_POST['spotify'];  $spotify_link= $_POST['spotify_link']; 
$loja_virtual= $_POST['loja_virtual'];  
$instagram= $_POST['instagram']; $instagram_link= $_POST['instagram_link'];

$linkedin_link= $_POST['linkedin_link'];
$behance_link= $_POST['behance_link'];

 
$caminho = "<script language='javascript'>function alerta(){alert('Dados alterados com sucesso!');}alerta(); document.location='redes-sociais'; </script>";


$sql="UPDATE `redes_sociais` SET 

`whatsapp_link` =  '$whatsapp_link',
`facebook_link` = '$facebook_link', 
`instagram_link` = '$instagram_link', 
`youtube_link` = '$youtube_link',
`itunes_link` = '$itunes_link', 
`deezer_link` = '$deezer_link', 
`linkedin_link` = '$linkedin_link', 
`behance_link` = '$behance_link', 
`spotify_link` = '$spotify_link'

WHERE `id` =$id";     


if ($conn->query($sql) === TRUE) {

echo"$caminho";}

else{ echo "<script language='javascript'>function alerta(){alert('Erro Econtrado!');}alerta();document.location='javascript:history.go(-1)';</script>";


}}?>


</body>
</html>