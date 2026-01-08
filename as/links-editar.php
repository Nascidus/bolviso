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
<div class="painel-cliente-icone"><img src="img/icons/linksuteis.png" width="100%"/></div>
<div class="alinha14"><a href="links-uteis">ORIENTAÇÃO TÉCNICA</a> >> EDITAR</div></div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">
<div class="painel-banner-botoes2"><a href="links-filtro"><img src="img/filtro.jpg" width="100%"/></a></div>
<div style="display: none;" class="painel-banner-botoes1"><a href="links-categorias"><img src="img/categorias.jpg" width="100%"/></a></div>
<div  style="display: none;" class="painel-banner-botoes1"><a href="links-cadastrar"><img src="img/novo.jpg" width="100%"/></a></div>
</div></div></div>

<div id="painel-cliente">
<div class="alinha15">EDITAR CADASTRO SELECIONADO</div>




<?php
$id =$_GET['id'];
$sql = "SELECT * FROM links_uteis WHERE id = $id";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){

$id = $res ['id'];
$link = $res ['link'];
$posicao = $res ['posicao'];
$i++;
	
echo"	



<form action='links-editar?acao=alterar&id=$id' method='post'>


<div class=\"cut1\">
<div id=\"formulario\">
<label for=\"titulo\">Título:</label>
<input type=\"text\" name=\"titulo\" value=\"$titulo\" class=\"form3\"/>
</div>

<div id=\"formulario\">
<label for=\"link\">Link:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Informação Extra</span>
</div></label>
<input type=\"text\" name=\"link\" value=\"$link\" class="form3"/>
</div>


<div id=\"formulario\">
<label for=\"posicao\">Posição:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Informação Extra</span>
</div></label>
<select name=\"posicao\" class=\"form3\">
	<option value="">Posição</option>
	<option value=\"$posicao\">$posicao</option>
	<option value=\"1\">1</option>
	<option value=\"2\">2</option>
	<option value=\"3\">3</option>
	<option value=\"4\">4</option>
	<option value=\"5\">5</option>
</select>
</div> "; }?>

</div>

<div id="grid12"><div class="cadastrar"><input type="submit" name="submit" style="cursor:pointer" class="cadastrar" value="EDITAR"/></div></div>
</div></div>

<div id="sistemas-menu-lateral">
<div id="grid12"><div class="sistemas-marcador"><img src="img/marcador.png"/></div></div>
	<?php  include'menu-lateral.php';?>
</div></div></div>

<?php  include'menu-lateral-mobiles.php';?>



	
<?php

$acao = $_GET['acao'];
$id = $_GET['id'];

if ($acao == 'alterar'){

$id = $_POST ['id'];
$link = $_POST ['link'];
$titulo = $_POST ['titulo'];
$posicao = $_POST ['posicao'];


$caminho = "<script language='javascript'>function alerta(){alert('Dados Alterados com Sucesso!'); }alerta();document.location='clientes';</script>";

$id = $_GET['id'];
$sql="UPDATE `links_uteis` SET
`link` =  '$link', 
`titulo` =  '$titulo', 
`posicao` =  '$posicao'
 WHERE  `id` ='$id'; ";


if ($conn->query($sql) === TRUE) {

echo"$caminho";}

else{ echo "<script language='javascript'>function alerta(){alert('Erro Econtrado!');}alerta();document.location='javascript:history.go(-1)';</script>";

}}?>




</body>
</html>