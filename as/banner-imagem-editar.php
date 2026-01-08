<!doctype html>
<html>
<head>
	<?php  include'head.php';?>	
</head>

<body>
	<?php  include'topo-mobile.php';?>

<div id="sistemas-topo"><div class="center"><div class="clearfix">
<?php  include'topo-desktop.php';?>
</div></div></div>

<div class="center"><div class="clearfix"><div id="sistemas-infos">

<div id="painel-banner">
<div id="painel-banner-padding">
<div id="grid12">
<div class="painel-cliente-icone"><img src="img/icons/banner.png" width="100%"/></div>
<div class="alinha18"><a href="banner">BANNER</a> >> EDITAR IMAGEM</div></div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">
<div class="painel-banner-botoes2"><a href="banner-filtro"><img src="img/filtro.jpg" width="100%"/></a></div>
<div class="painel-banner-botoes1"><a href="banner-categorias"><img src="img/categorias.jpg" width="100%"/></a></div>
<div class="painel-banner-botoes1"><a href="banner-cadastrar"><img src="img/novo.jpg" width="100%"/></a></div>
</div></div></div>

<div class="painel-banner-listagemIcon-img"><img src="img/banner.jpg" width="100%"/></div>
<div id="grid12"><div class="painel-banner-listagemIcon-botao"><img src="img/apagar.jpg"/></div></div>

<div id="painel-cliente">
<div id="painel-banner">
<div class="alinha15">CADASTRAR NOVA IMAGEM</div>
<div id="formulario">
<label for="nome">Nome:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Informação Extra</span>
</div></label>
<input type="text" name="nome" class="form3"/>
</div>
<div id="painel-banner-categorias">
<div id="grid12"><div class="cadastrar2"><input type="submit" name="submit" style="cursor:pointer" class="cadastrar2" value="CADASTRAR"/></div></div>
</div></div>

</div></div>

<div id="sistemas-menu-lateral">
<div id="grid12"><div class="sistemas-marcador"><img src="img/marcador.png"/></div></div>
	<?php  include'menu-lateral.php';?>
</div></div></div>

<?php  include'menu-lateral-mobiles.php';?>

</body>
</html>