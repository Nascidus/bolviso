<!doctype html>
<html>
<head>
	<?php  include'head.php'; include'verifica.php'; include'conecta.php';?>	
</head>

<body>
    <?php  include'topo-mobile.php';?>

    <?php  include'topo.php';?>	

	<?php  include'menu-lateral-mobiles.php';?>

<div class="center"><div class="clearfix">
<div id="sistemas-infos"><div id="grid12">
<div class="ferramentas-painel-logo"><img src="img/icons/redes.png" width="100%"/></div>
<div class="alinha6">REDES SOCIAIS CÓDIGOS</div>
</div>
	
	
		   	
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM redes_sociais";
$linhas = mysqli_num_rows($comando); 
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
	
	
$itunes= $res['itunes']; 
$deezer= $res['deezer']; 
$spotify= $res['spotify']; 
$loja_virtual= $res['loja_virtual'];  
$instagram= $res['instagram']; $instagram_link= $res['instagram_link']; 

	
}?>
	


<div id="ferramentas-painel-padding">
	
	

<div id="codigos_php"><strong>Nome do Banco de Dados:</strong> redes_sociais</div>	
		

<?php if ($facebook=='Sim')	{echo"
<div id=\"codigos_php\">
<strong>FACEBOOK</strong><BR><BR>
<strong>Varíavel Facebook: </strong>$ facebook<BR>
<strong>Variavel Link Facebook:</strong> $ facebook_link	
</div>";} else {echo"";}?>	
	
<?php if ($instagram=='Sim')	{echo"
<div id=\"codigos_php\">
<strong>INSTAGRAM</strong><BR><BR>
<strong>Varíavel Instagram: </strong>$ instagram<BR>
<strong>Variavel Link Instagram:</strong> $ instagram_link	
</div>";} else {echo"";}?>	
	
<?php if ($youtube=='Sim')	{echo"
<div id=\"codigos_php\">
<strong>YOUTUBE</strong><BR><BR>
<strong>Varíavel Youtube: </strong>$ youtube<BR>
<strong>Variavel Link Youtube:</strong> $ youtube_link	
</div>";} else {echo"";}?>
	


</div></div>

<div id="sistemas-menu-lateral">
<div id="grid12"><div class="sistemas-marcador"><img src="img/marcador.png"/></div></div>
	<?php  include'menu-lateral.php';?>
	
</div></div></div>
	
	
	
	
</body>
</html>