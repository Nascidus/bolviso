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
<div class="ferramentas-painel-logo"><img src="img/icons/clientes.png" width="100%"/></div>
<div class="alinha6">CÓDIGOS CLIENTES</div>
</div>
		
<div id="ferramentas-painel-padding">
	
<div id="codigos_php"><strong>Nome do Banco de Dados:</strong> clientes</div>	
		
<div id="codigos_php"><strong>Pasta de Imagem:</strong> img2/clientes</div>	

<div id="codigos_php">
<strong>Imagem:</strong> $imagem<BR><BR>
<strong>Link:</strong> $link<BR><BR>
<strong>Posição:</strong> $posicao<BR><BR>
<strong>Data de Cadastro:</strong> $data_cadastro<BR><BR>	
</div>
	

	
</div></div>
	
	

	
	

<div id="sistemas-menu-lateral">
<div id="grid12"><div class="sistemas-marcador"><img src="img/marcador.png"/></div></div>
	<?php  include'menu-lateral.php';?>
	
</div></div></div>
	
	
	
	
</body>
</html>