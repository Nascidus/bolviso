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
<div class="ferramentas-painel-logo"><img src="img/icons/google.png" width="100%"/></div>
<div class="alinha6">GOOGLE CÓDIGOS</div>
</div>
	
	
<div id="ferramentas-painel-padding">
	
<div id="codigos_php"><strong>Nome do Banco de Dados:</strong> google</div>	
		

<div id="codigos_php">
<strong>Google Maps: </strong>$google_maps<BR><BR>
<strong>Descrição Meta Tag Description:</strong> $texto_busca<BR><BR>
<strong>Google Analytics:</strong> $google_analytics<BR><BR>
<strong>Google Tag Manager:</strong> $google_tag_manager<BR><BR>

</div>
	
	


</div></div>

<div id="sistemas-menu-lateral">
<div id="grid12"><div class="sistemas-marcador"><img src="img/marcador.png"/></div></div>
	<?php  include'menu-lateral.php';?>
	
</div></div></div>
	
	
	
	
</body>
</html>