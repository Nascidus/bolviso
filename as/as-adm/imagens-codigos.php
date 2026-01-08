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
<div class="ferramentas-painel-logo"><img src="img/icons/imagens.png" width="100%"/></div>
<div class="alinha6">IMAGENS CÓDIGOS</div>
</div>
	
	
<div id="ferramentas-painel-padding">
	
<div id="codigos_php"><strong>Nome do Banco de Dados:</strong> img_adm</div>	
	
<div id="codigos_php"><strong>Pasta de Imagem:</strong> as/img2/img_adm</div>	

<div id="codigos_php">
<strong>Imagem: </strong>$imgname<BR><BR>
<strong>Categoria da Imagem:</strong> $categoria<BR><BR>
</div>	
	
	
	
<div id="codigos_php"><strong>FORMA DE UTILIZAÇÃO:</strong> 
		
As imagens cadastradas via sistema são definidas via categoria, segue nomes de cada categoria.<BR><BR>
	
<strong>Logotipo Principal:</strong> logotipo_principal	<BR><BR>
<strong>Logotipo Secundário:</strong> logotipo_secundario 	<BR><BR>
<strong>Background Principal:</strong> background_principal 	<BR><BR>
<strong>Background Secundário:</strong> background_secundario 	<BR><BR>
<strong>Ícone Facebook:</strong> icone_facebook	<BR><BR>	
<strong>Ícone Instagram:</strong> icone_instagram 	<BR><BR>		
<strong>Ícone Youtube:</strong> icone_youtube	<BR><BR>		
<strong>Ícone Twitter:</strong> icone_twitter	<BR><BR>	
<strong>Ícone Linkedin:</strong> icone_linkedin 	<BR><BR>	
<strong>Ícone Whatsapp:</strong> icone_whatsapp 	<BR><BR>	
<strong>Ícone Telefone:</strong> icone_telefone	<BR><BR>	
<strong>Ícone Endereço:</strong> icone_endereco	<BR><BR>	
<strong>Ícone Favicon .ICO:</strong> favicon_ico	<BR><BR>
<strong>Ícone Favicon .PNG:</strong> favicon_png	<BR><BR>	
		
</div>	
	
	
<div id="codigos_php"><strong>EXEMPLO DE UTILIZAÇÃO:</strong> 
		
SELECT * FROM img_adm WHERE categoria ='Nome da categoria de imagem que deseja utilizar'
		
</div>	


</div></div>

<div id="sistemas-menu-lateral">
<div id="grid12"><div class="sistemas-marcador"><img src="img/marcador.png"/></div></div>
	<?php  include'menu-lateral.php';?>
	
</div></div></div>
	
	
	
	
</body>
</html>