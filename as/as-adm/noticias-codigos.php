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
<div class="ferramentas-painel-logo"><img src="img/icons/noticias.png" width="100%"/></div>
<div class="alinha6">CÓDIGOS NOTÍCIAS</div>
</div>
		
<div id="ferramentas-painel-padding">
	
<div id="codigos_php"><strong>Nome do Banco de Dados:</strong> noticias</div>	
		
<div id="codigos_php"><strong>Pasta de Imagem:</strong> img2/noticias</div>	

<div id="codigos_php">
<strong>Título: </strong>$titulo<BR><BR>
<strong>Categoria:</strong> $categoria<BR><BR>
<strong>Data Cadastro:</strong> $data_cadastro<BR><BR>
<strong>Imagem:</strong> $imagem<BR><BR>
<strong>Descrição:</strong> $desc<BR><BR>
<strong>Fonte:</strong> $fonte<BR><BR>


</div>
	

	
</div></div>
	
	

	
	

<div id="sistemas-menu-lateral">
<div id="grid12"><div class="sistemas-marcador"><img src="img/marcador.png"/></div></div>
	<?php  include'menu-lateral.php';?>
	
</div></div></div>
	
	
	
	
</body>
</html>