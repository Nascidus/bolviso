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

<div class="alinha14">BANNER >> <?php
$nome_slug = $_GET['nome_slug'];
$sql = "SELECT * FROM projetos WHERE nome_slug = '$nome_slug' ORDER BY id DESC";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){
$nome = $res ['nome'];	
echo"$nome"; }?> >> EDITAR</div></div></div>

<div id="grid12F"><div id="painel-banner-botoes-center">
</div></div></div>

<div id="painel-cliente">
<div class="alinha15">EDITAR BANNER SELECIONADO</div>

<div class="cut1">
	
<?php
$id =$_GET['id'];
$sql = "SELECT * FROM banner_conteudo WHERE id = $id";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){

$id = $res['id'];
$titulo= $res['titulo']; 
$link= $res['link'];
$categoria= $res['categoria']; 
$posicao= $res['posicao']; 
$imagem= $res['imagem']; 
$estilo= $res['estilo']; 
$i++;
	
echo"	

<img src=\"../img2/banner_conteudo/$imagem\" width=\"30%\">

<form action='banner-conteudo-editar?acao=alterar&id=$id' method='post'>
	
<div id=\"formulario\">
<label for=\"titulo\">Título:</label>
<input type=\"text\" name=\"titulo\" value=\"$titulo\" class=\"form3\" required/>
</div>

<div id=\"formulario\">
<label for=\"estilo\">Estilo:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Estilo do Banner</span>
</div></label>
<select name=\"estilo\" class=\"form3\" required>
    <option value=\"$estilo\">$estilo</option>
	<option value=\"Inteiro\">Inteiro</option>
	<option value=\"Metade\">Metade</option>
</select>
</div>

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
	<option value=\"6\">6</option>
	<option value=\"7\">7</option>
	<option value=\"8\">8</option>
	<option value=\"9\">9</option>
	<option value=\"10\">10</option>
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
$estilo = $_POST ['estilo'];

$caminho = "<script language='javascript'>function alerta(){alert('Dados Alterados com Sucesso!'); }alerta();document.location='javascript:history.go(-1)';</script>";

$id = $_GET['id'];
$sql="UPDATE `banner_conteudo` SET
`titulo` =  '$titulo', 
`estilo` =  '$estilo', 
`posicao` =  '$posicao'
 WHERE  `id` ='$id'; ";

if ($conn->query($sql) === TRUE) {

echo"$caminho";}

else{ echo "<script language='javascript'>function alerta(){alert('Erro Econtrado!');}alerta();document.location='javascript:history.go(-1)';</script>";

}}?>




</body>
</html>