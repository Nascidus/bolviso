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
<div class="ferramentas-painel-logo"><img src="img/icons/produtos.png" width="100%"/></div>
<div class="alinha6">CÓDIGOS PRODUTOS</div>
</div>
		
<div id="ferramentas-painel-padding">
	
<div id="codigos_php"><strong>Nome do Banco de Dados:</strong> produtos</div>	
		
<div id="codigos_php"><strong>Pasta de Imagem:</strong> img2/produtos</div>	

<div id="codigos_php">
<strong>Nome: </strong>$nome<BR><BR>
<strong>Categoria:</strong> $categoria<BR><BR>
<strong>Descrição:</strong> $desc<BR><BR>
<strong>Valor:</strong> $valor<BR><BR>
<strong>Produto em Destaque:</strong> $destaque<BR><BR>
<strong>Imagem:</strong> $imagem<BR><BR>
<strong>Data Cadastro:</strong> $data_cadastro<BR><BR>
</div>
	
	
<div id="grid12">
<div class="ferramentas-painel-logo"><img src="img/icons/produtos.png" width="100%"/></div>
<div class="alinha6">PRODUTOS FOTOS CÓDIGOS</div>
</div>
		
<div id="codigos_php"><strong>Nome do Banco de Dados:</strong> fotos_produtos</div>	
		
<div id="codigos_php"><strong>Pasta de Imagem:</strong> img2/fotos_produtos</div>		

<div id="codigos_php">
<strong>Postid: </strong>$postid<BR><BR>
<strong>Imagem:</strong> $imagem<BR><BR>
</div>
		
<div id="codigos_php"><strong>Exemplo de Utilização:</strong>	
SELECT * FROM fotos_produtos WHERE '$id' = postid		
</div>	
	
	
	
	
	
<div id="grid12">
<div class="ferramentas-painel-logo"><img src="img/icons/produtos.png" width="100%"/></div>
<div class="alinha6">CATEGORIAS PRODUTOS</div>
</div>
		
<div id="codigos_php"><strong>Nome do Banco de Dados:</strong> categorias</div>	
		
<div id="codigos_php">
<strong>Categoria: </strong>$categoria<BR><BR>
<strong>Categoria Slug: </strong>$categoria_slug<BR><BR>
<strong>Tipo:</strong> $tipo<BR><BR>
<strong>Data de Cadastro:</strong> $data_cadastro<BR><BR>
</div>
		
<div id="codigos_php"><strong>Exemplo de Utilização:</strong>	
SELECT * FROM categorias WHERE tipo='produtos'		
</div>	
	
</div></div>
	
	

	
	

<div id="sistemas-menu-lateral">
<div id="grid12"><div class="sistemas-marcador"><img src="img/marcador.png"/></div></div>
	<?php  include'menu-lateral.php';?>
	
</div></div></div>
	
	
	
	
</body>
</html>