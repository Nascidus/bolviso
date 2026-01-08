<?php
session_start();
if((!isset($_SESSION['login']))
AND (!isset($_SESSION['senha'])))
Header("Location: index.php?erro=logar");
$login = $_SESSION['login'];
$senha = $_SESSION['senha'];  
?><!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<?php  include'head.php';?>	
</head>

<body>
	<?php  include'topo-mobile.php';?>

<div id="sistemas-topo"><div class="center"><div class="clearfix">
<?php  include'topo-desktop.php';?>
</div></div></div>

<div class="center"><div class="clearfix">
<div id="sistemas-infos">

<div id="painel-banner">
<div id="painel-banner-padding">
<div id="grid12">
<div class="painel-cliente-icone"><img src="img/icons/banner.png" width="100%"/></div>
<div class="alinha14"><a href="banner">BANNER</a> >> EDITAR</div></div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">
<div style="display: none"><a href="banner-filtro"><div class="painel-banner-botoes2"><img src="img/filtro.jpg" width="100%"/></div></a></div>
<div class="painel-banner-botoes1"><a href="banner-categorias"><img src="img/categorias.jpg" width="100%"/></a></div>
<div class="painel-banner-botoes1"><a href="banner-cadastrar"><img src="img/novo.jpg" width="100%"/></a></div>
</div></div></div>

<div id="painel-cliente">
<div class="alinha15">EDITAR BANNER SELECIONADO</div>

<div class="cut1">
	
<?php
$id =$_GET['id'];
$sql = "SELECT * FROM banner WHERE id = $id";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){

$id = $res['id'];
$titulo= $res['titulo']; 
$link= $res['link'];
$categoria= $res['categoria']; 
$posicao= $res['posicao']; 
$i++;
	
echo"	

<form action='banner-editar?acao=alterar&id=$id' method='post'>
	
<div id=\"formulario\">
<label for=\"titulo\">Título:</label>
<input type=\"text\" name=\"titulo\" value=\"$titulo\" class=\"form3\" required/>
</div>

<div id=\"formulario\">
<label for=\"link\">Link:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">URL Completa para clique</span>
</div></label>
<input type=\"text\" name=\"link\" value=\"$link\" class=\"form3\"/>
</div>

<div id=\"formulario\">
<label for=\"categoria\">Categoria:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Sessão do site para inclusão do banner</span>
</div></label>
<select name=\"categoria\" class=\"form3\" required>";
	

$sql2 = "SELECT * FROM categorias WHERE tipo ='banner' and categoria_slug = '$categoria'";
$comando2 = mysqli_query($conn, $sql2);
while($res = mysqli_fetch_assoc($comando2)){

$categoriax = $res['categoria'];
	
echo"<option value=\"$categoria\">$categoriax</option>";}


$sql3 = "SELECT * FROM categorias WHERE tipo ='banner' ORDER BY categoria ASC";
$comando2 = mysqli_query($conn, $sql2);
while($res = mysqli_fetch_assoc($comando)){

$id = $res['id'];
$categoria= $res['categoria']; 
$categoria_slug= $res['categoria_slug']; 
$i++;

echo "<option value=\"$categoria_slug\">$categoria</option>"; }
 
	
echo"	
</select></div>

<div id=\"formulario\">
<label for=\"posicao\">Posição:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Posição de exibição do banner</span>
</div></label>
<select name=\"posicao\" class=\"form3\" required>
    <option value=\"$posicao\">$posicao</option>
	<option value=\"1\">1</option>
	<option value=\"2\">2</option>
	<option value=\"3\">3</option>
	<option value=\"4\">4</option>
	<option value=\"5\">5</option>
</select>
</div>	


	
"; }?>
	
	
</div>
	
	
<div id="grid12"><div class="cadastrar"><input type="submit" name="submit" style="cursor:pointer" class="cadastrar" value="EDITAR"/></div></div>
</div></div></form>

<div id="sistemas-menu-lateral">
<div id="grid12"><div class="sistemas-marcador"><img src="img/marcador.png"/></div></div>
	<?php  include'menu-lateral.php';?>
</div></div></div>

<?php  include'menu-lateral-mobiles.php';?>
	
	

	
<?php

$acao = $_GET['acao'];
$id = $_GET['id'];

if ($acao == 'alterar'){

$titulo = $_POST ['titulo'];
$link = $_POST ['link'];
$categoria = $_POST ['categoria'];
$posicao = $_POST ['posicao'];


$caminho = "<script language='javascript'>function alerta(){alert('Dados Alterados com Sucesso!'); }alerta();document.location='banner';</script>";

$id = $_GET['id'];
$sql="UPDATE `banner` SET
`titulo` =  '$titulo', 
`link` =  '$link',
`categoria` =  '$categoria',
`posicao` =  '$posicao'
 WHERE  `id` ='$id'; ";

if ($conn->query($sql) === TRUE) {

echo"$caminho";}

else{ echo "<script language='javascript'>function alerta(){alert('Erro Econtrado!');}alerta();document.location='javascript:history.go(-1)';</script>";

}}?>




</body>
</html>