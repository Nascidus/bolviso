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
<div class="ferramentas-painel-logo"><img src="img/icons/institucional.png" width="100%"/></div>
<div class="alinha6">INSTITUCIONAL CÓDIGOS</div>
</div>
	
	
<div id="ferramentas-painel-padding">
	
<div id="codigos_php"><strong>Nome do Banco de Dados:</strong> institucional</div>	
		

<div id="codigos_php">
<strong>Nome do Cliente: </strong>$nome<BR><BR>
<strong>Título do Site:</strong> $titulo<BR><BR>
<strong>E-mail:</strong> $email<BR><BR>
<strong>Telefone 1:</strong> $telefone1<BR><BR>
<strong>Telefone 2:</strong> $telefone2<BR><BR>	
<strong>Endereço:</strong> $endereco<BR><BR>
<strong>Setor:</strong> $setor<BR><BR>
<strong>Cidade:</strong> $cidade<BR><BR>	
<strong>Estado:</strong> $estado<BR><BR>	
<strong>CEP:</strong> $cep<BR><BR>	
<strong>Texto Página Institucional:</strong> $texto_institucional<BR><BR>
<strong>Texto Home Institucional:</strong> $texto_apresentacao<BR><BR>
<strong>Missão:</strong> $missao<BR><BR>
<strong>Visão:</strong> $visao<BR><BR>
<strong>Valores:</strong> $valores<BR><BR>	
</div>
	
	


</div></div>

<div id="sistemas-menu-lateral">
<div id="grid12"><div class="sistemas-marcador"><img src="img/marcador.png"/></div></div>
	<?php  include'menu-lateral.php';?>
	
</div></div></div>
	
	
	
	
</body>
</html>