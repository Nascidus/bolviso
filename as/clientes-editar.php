<?php
session_start();
if((!isset($_SESSION['login']))
AND (!isset($_SESSION['senha'])))
Header("Location: index.php?erro=logar");
$login = $_SESSION['login'];
$senha = $_SESSION['senha'];  
?>

<!doctype html>
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
<div class="painel-cliente-icone"><img src="img/icons/clientes.png" width="100%"/></div>
<div class="alinha14"><a href="clientes">CLIENTES</a> >> EDITAR</div></div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">
<div style="display: none"><a href="banner-filtro"><div class="painel-banner-botoes2"><img src="img/filtro.jpg" width="100%"/></div></a></div>

<div style="display: none;" class="painel-banner-botoes1"><a href="clientes-categorias"><img src="img/categorias.jpg" width="100%"/></a></div>

<div class="painel-banner-botoes1"><a href="clientes-cadastrar.php"><img src="img/novo.jpg" width="100%"/></a></div>
</div></div></div>

<div id="painel-cliente">
<div class="alinha15">EDITAR CLIENTE SELECIONADO</div>

<div class="cut1">
	
<?php
$id =$_GET['id'];
$sql = "SELECT * FROM clientes WHERE id = $id";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){

$id = $res ['id'];
$link = $res ['link'];
$posicao = $res ['posicao'];
$nome = $res ['nome'];
$i++;
	
echo"	

<form action='clientes-editar?acao=alterar&id=$id' method='post'>


	
<div id=\"formulario\">
<label for=\"nome\">Nome:</label>
<input type=\"text\" name=\"nome\"  value='$nome' class=\"form3\" required/>
</div>
	
<div id=\"formulario\">
<label for=\"link\">Link:</label>
<input type=\"text\" name=\"link\"  value='$link' class=\"form3\" required/>
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
	<option value=\"11\">11</option>
	<option value=\"12\">12</option>
	<option value=\"13\">13</option>
	<option value=\"14\">14</option>
	<option value=\"15\">15</option>
	<option value=\"16\">16</option>
	<option value=\"17\">17</option>
	<option value=\"18\">18</option>
	<option value=\"19\">19</option>
	<option value=\"20\">20</option>
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

$id = $_POST ['id'];
$link = $_POST ['link'];
$posicao = $_POST ['posicao'];
$nome = $_POST ['nome'];

$caminho = "<script language='javascript'>function alerta(){alert('Dados Alterados com Sucesso!'); }alerta();document.location='clientes';</script>";

$id = $_GET['id'];
$sql="UPDATE `clientes` SET
`link` =  '$link', 
`nome` =  '$nome',
`posicao` =  '$posicao'
 WHERE  `id` ='$id'; ";


if ($conn->query($sql) === TRUE) {

echo"$caminho";}

else{ echo "<script language='javascript'>function alerta(){alert('Erro Econtrado!');}alerta();document.location='javascript:history.go(-1)';</script>";

}}?>



</body>
</html>