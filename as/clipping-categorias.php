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
<div class="painel-cliente-icone"><img src="img/icons/clipping.png" width="100%"/></div>
<div class="alinha14"><a href="clipping">CLIPPING</a> >> CATEGORIAS</div></div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">
<div class="painel-banner-botoes2"><a href="clipping-filtro"><img src="img/filtro.jpg" width="100%"/></a></div>
<div class="painel-banner-botoes1"><a href="clipping-categorias"><img src="img/categorias.jpg" width="100%"/></a></div>
<div class="painel-banner-botoes1"><a href="clipping-cadastrar"><img src="img/novo.jpg" width="100%"/></a></div>
</div></div></div>

<div id="painel-cliente">
<div id="painel-banner">
<div class="alinha15">CADASTRAR</div>
<div id="formulario">
<label for="nome">Nome:</label>
<input type="text" name="nome" class="form3"/>
</div>
<div id="painel-banner-categorias">
<div id="grid12"><div class="cadastrar2"><input type="submit" name="submit" style="cursor:pointer" class="cadastrar2" value="CADASTRAR"/></div></div>
</div></div>

<div class="alinha16">EDITAR CADASTROS</div>
<div id="painel-banner-listagem">
<div class="painel-banner-text">01</div>
<div class="painel-banner-text">10/10/2010</div>
<div class="painel-banner-text">Nome da Categoria</div>
<div id="grid12F"><div id="painel-banner-listagemIcon-center">
<div class="painel-banner-listagem-icon"><img src="img/excluir2.png"/></div>
<div class="painel-banner-listagem-icon"><a href="clipping-imagem-editar"><img src="img/listagem.png"/></a></div>
<div class="painel-banner-listagem-icon"><a href="clipping-editar"><img src="img/editar2.png"/></a></div>
</div></div></div>

</div></div>

<div id="sistemas-menu-lateral">
<div id="grid12"><div class="sistemas-marcador"><img src="img/marcador.png"/></div></div>
	<?php  include'menu-lateral.php';?>
</div></div></div>

<?php  include'menu-lateral-mobiles.php';?>

</body>
</html>