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
<div class="painel-cliente-icone"><img src="img/icons/banner.png" width="100%"/></div>
<div class="alinha14"><a href="banner">SERVIÇOS</a> >> EDITAR</div></div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">
<div style="display: none"><a href="banner-filtro"><div class="painel-banner-botoes2"><img src="img/filtro.jpg" width="100%"/></div></a></div>
<div style="display: none"><div class="painel-banner-botoes1"><a href="banner-categorias"><img src="img/categorias.jpg" width="100%"/></a></div></div>
<div class="painel-banner-botoes1"><a href="servicos-cadastrar"><img src="img/novo.jpg" width="100%"/></a></div>
</div></div></div>

<div id="painel-cliente">





<div class="alinha15">IMAGEM DE CAPA</div>
<div class="cut3">	
<?php
$id =$_GET['id'];
$sql = "SELECT * FROM servicos WHERE id = $id";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){
$id = $res ['id'];
$imagem = $res ['imagem'];
	
echo"
<div style=\"width: 16%; background-color: ; float: left; padding: 10px;\">";

if ($imagem ==''){echo"<img src='avatar.jpg'  width='96%' border='0' >

<a href=\"servicos-editar-capa.php?&id=$id\">	
<div id=\"grid12\">
<div class=\"cadastrar\">
<input type=\"submit\" name=\"submit\" style=\"cursor:pointer\" class=\"cadastrar\" value=\"INSERIR IMAGEM\"/>
</div></div></a>";}

else {echo"<img src='../img2/servicos/$imagem' width='96%' border='0'>

<a href=\"servicos-editar-capa.php?&id=$id\">	
<div id=\"grid12\">
<div class=\"cadastrar\">
<input type=\"submit\" name=\"submit\" style=\"cursor:pointer\" class=\"cadastrar\" value=\"ALTERAR IMAGEM\">
</div></div></a>"; }  

echo"</div>";  }?>
</div>


<div class="alinha15">EDITAR SERVIÇO SELECIONADO</div>

<div class="cut1">
	
<?php
$id =$_GET['id'];
$sql = "SELECT * FROM servicos WHERE id = $id";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){

$id = $res['id'];
$titulo = $res ['titulo'];
$imagem = $res ['imagem'];
$posicao = $res ['posicao'];
$data_cadastro = $res ['data_cadastro'];
$desc = $res ['desc'];
$i++;
	
echo"	

<form action='servicos-editar?acao=alterar&id=$id' method='post'>
	
<div id=\"formulario\">
<label for=\"titulo\">Título:</label>
<input type=\"text\" name=\"titulo\" value=\"$titulo\" class=\"form3\" required/>
</div>


<div id=\"formulario\">
<label for=\"posicao\">Posição:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Posição de exibição do serviço</span>
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
	<option value=\"19\">18</option>
	<option value=\"19\">19</option>
	<option value=\"20\">20</option>
</select>
</div>
	
	
<div id=\"grid12E\">
<label for=\"desc\">Descrição:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Descrição do serviço</span>
</div></label>
<textarea class='form4' name='desc'/>$desc</textarea>
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
$titulo = $_POST ['titulo'];
$titulo_slug = $_POST ['titulo_slug'];
$imagem = $_POST ['imagem'];
$posicao = $_POST ['posicao'];
$data_cadastro = $_POST ['data_cadastro'];
$desc = $_POST ['desc'];


setlocale(LC_ALL, 'en_US.UTF8');
function toAscii($str, $replace=array(), $delimiter='-') {
    if( !empty($replace) ) {
        $str = str_replace((array)$replace, ' ', $str);
    } 
    $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
    $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
    $clean = strtolower(trim($clean, '-'));
    $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
     return $clean;}

$titulo_slug = toAscii($titulo);

$caminho = "<script language='javascript'>function alerta(){alert('Dados Alterados com Sucesso!'); }alerta();document.location='servicos';</script>";

$id = $_GET['id'];
$sql="UPDATE `servicos` SET 
`titulo` = '$titulo', 
`titulo_slug` = '$titulo_slug', 
`posicao` = '$posicao', 
`desc` = '$desc' 
 WHERE  `id` ='$id'; ";

if ($conn->query($sql) === TRUE) {

echo"$caminho";}

else{ echo "<script language='javascript'>function alerta(){alert('Erro Econtrado!');}alerta();document.location='javascript:history.go(-1)';</script>";

}}?>





</body>
</html>