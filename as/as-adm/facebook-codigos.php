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
<div class="alinha6">FACEBOOK CÓDIGOS</div>
</div>
	
	
<div id="ferramentas-painel-padding">
	
<div id="codigos_php"><strong>Nome do Banco de Dados:</strong> facebook</div>	
		

<div id="codigos_php">
<strong>URL: </strong>$url<BR><BR>
<strong>Title:</strong> $title<BR><BR>
<strong>Site Name:</strong> $site_name<BR><BR>
<strong>Imagem:</strong> $image<BR><BR>
<strong>Type:</strong> $type<BR><BR>
<strong>Description:</strong> $description<BR><BR>
</div>
	
	

<div id="codigos_php"><strong>FORMA DE UTILIZAÇÃO:</strong> 
	
<BR><BR> Intenção deste código é quando jogar o link do site dentro do Facebook ele reconhecer algumas informações.	<BR><BR> 
	
<strong>Uso: </strong> Criar um arquivo php facebook-codes.php, incluir o mesmo dentro de todas as páginas do site, menos em páginas que já irão ter botões de ações do Facebook como Notícias, Artigos etc.<BR><BR></div>
	
	
<div id="codigos_php"><strong>EXEMPLO DE UTILIZAÇÃO:</strong></div>
	
	
&lt;meta property=&quot;og:url&quot; content=&quot;$url&quot; /&gt;<br>
&lt;meta property=&quot;og:type&quot; content=&quot;$type&quot; /&gt;<br>
&lt;meta property=&quot;og:title&quot; content=&quot;$title&quot; /&gt;<br>
&lt;meta property=&quot;og:description&quot; content=&quot;$description&quot; /&gt;<br>
&lt;meta property=&quot;og:image&quot; content=&quot;$image&quot; /&gt;<br>

	
	
	
	
</div></div>

<div id="sistemas-menu-lateral">
<div id="grid12"><div class="sistemas-marcador"><img src="img/marcador.png"/></div></div>
	<?php  include'menu-lateral.php';?>
	
</div></div></div>
	
	
	
	
</body>
</html>