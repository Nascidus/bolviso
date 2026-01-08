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
<div class="alinha14"><a href="clipping">CLIPPING</a> >> CADASTRAR</div></div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">
<div class="painel-banner-botoes2"><a href="clipping-filtro"><img src="img/filtro.jpg" width="100%"/></a></div>
<div class="painel-banner-botoes1"><a href="clipping-categorias"><img src="img/categorias.jpg" width="100%"/></a></div>
<div class="painel-banner-botoes1"><a href="clipping-cadastrar"><img src="img/novo.jpg" width="100%"/></a></div>
</div></div></div>

<div id="painel-cliente">
<div class="alinha15">CADASTRAR</div>

<div class="cut1">
<div id="formulario">
<label for="titulo">Título:</label>
<input type="text" name="titulo" class="form3"/>
</div>

<div id="formulario">
<label for="link_externo">Link Externo:</label>
<input type="text" name="link_externo" class="form3"/>
</div>

<div id="formulario">
<label for="categoria">Categoria:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Informação Extra</span>
</div></label>
<select name="categoria" class="form3">
	<option value="">Categoria</option>
	<option value="1">Categoria 1</option>
	<option value="2">Categoria 2</option>
	<option value="3">Categoria 3</option>    
	<option value="4">Categoria 4</option>    
	<option value="5">Categoria 5</option>    
	<option value="6">Categoria 6</option>        
</select>
</div>

<div id="formulario">
<label for="imagem">Imagem:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Informação Extra</span>
</div></label>
<input type="text" name="imagem" class="form3"/>
</div>

<div id="formulario">
<label for="video">Vídeo:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Informação Extra</span>
</div></label>
<select name="video" class="form3">
	<option value="">Posição</option>
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
</select>
</div>

<div id="formulario">
<label for="campo_extra">Campo Extra:</label>
<input type="text" name="campo_extra" class="form3"/>
</div></div>
<div id="grid12"><div class="cadastrar"><input type="submit" name="submit" style="cursor:pointer" class="cadastrar" value="CADASTRAR"/></div></div>
</div></div>

<div id="sistemas-menu-lateral">
<div id="grid12"><div class="sistemas-marcador"><img src="img/marcador.png"/></div></div>
	<?php  include'menu-lateral.php';?>
</div></div></div>

<?php  include'menu-lateral-mobiles.php';?>

</body>
</html>