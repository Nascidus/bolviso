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
	
<div id="sistemas-infos">
	
<div id="grid12">		
<div class="ferramentas-painel-logo"><img src="img/icons/videos.png" width="100%"/></div>
<div class="alinha6">GALERIA DE FOTOS CÓDIGOS</div>
</div>
		
<div id="ferramentas-painel-padding">
	
<div id="codigos_php"><strong>Nome do Banco de Dados:</strong> videos</div>	
		


<div id="codigos_php">
<strong>Título:</strong> $titulo<BR><BR>
<strong>Data de Cadastro:</strong> $data_cadastro<BR><BR>	
<strong>Id  Vídeo do Youtube:</strong> $video<BR><BR>
<strong>Descrição do Vìdeo:</strong> $desc<BR><BR>
<strong>Vìdeo em Destaque:</strong> $destaque<BR><BR>
</div>
	
	
<div id="codigos_php"><strong>Exemplo de Utilização:</strong> <br>
<br><br> Na opção vídeos existe a função "destaque" que sinaliza que o vídeo vai ser o destaque ou da página inicial do site ou dea página de vídeos. Para chamar os vídeos em destaque segue o exemplo<br><br>	
SELECT * FROM videos WHERE destaque='Sim'<br><br>
	
Caso deseje chamar no banco de dados somente os vídeos que não estão em destaque, segue o código.<br>
<br>SELECT * FROM videos WHERE destaque='Não'<br><br>
	
</div>	

	
</div></div>
	 
	

	
	

<div id="sistemas-menu-lateral">
<div id="grid12"><div class="sistemas-marcador"><img src="img/marcador.png"/></div></div>
	<?php  include'menu-lateral.php';?>
	
</div></div></div>
	
	
	
	
</body>
</html>