<?php session_start(); if((!isset($_SESSION[login])) AND (!isset($_SESSION[senha])))Header("Location: index.php?erro=logar");
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
<div class="painel-cliente-icone"><img src="img/icons/produtos.png" width="100%"/></div>
<div class="alinha14"><a href="produtos">PRODUTOS</a> >> EDITAR</div></div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">	

<div style="display: none"><a href="produtos-filtro"><div class="painel-banner-botoes2"><img src="img/filtro.jpg" width="100%"/></div></a></div>

<a href="produtos-subcategorias"><div class="painel-banner-botoes1"><img src="img/subcategorias.jpg" width="100%"/></div></a>

<a href="produtos-categorias"><div class="painel-banner-botoes1"><img src="img/categorias.jpg" width="100%"/></div></a>

<a href="produtos-cadastrar"><div class="painel-banner-botoes1"><a href="produtos-cadastrar"><img src="img/novo.jpg" width="100%"/></a></div></a>
</div></div></div>








<div id="painel-cliente">



<div class="alinha15">IMAGEM DE CAPA</div>
<div class="cut3">	
<?php
$id =$_GET['id'];
$sql = "SELECT * FROM produtos WHERE id = $id";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){
$id = $res ['id'];
$imagem = $res ['imagem'];
	
echo"
<div style=\"width: 16%; background-color: ; float: left; padding: 10px;\">";

if ($imagem ==''){echo"<img src='avatar.jpg'  width='96%' border='0' >

<a href=\"produtos-editar-capa.php?&id=$id\">	
<div id=\"grid12\">
<div class=\"cadastrar\">
<input type=\"submit\" name=\"submit\" style=\"cursor:pointer\" class=\"cadastrar\" value=\"INSERIR IMAGEM\"/>
</div></div></a>";}

else {echo"<img src='../img2/produtos/$imagem' width='96%' border='0'>

<a href=\"produtos-editar-capa.php?&id=$id\">	
<div id=\"grid12\">
<div class=\"cadastrar\">
<input type=\"submit\" name=\"submit\" style=\"cursor:pointer\" class=\"cadastrar\" value=\"ALTERAR IMAGEM\">
</div></div></a>"; }  

echo"</div>";  }?>
</div>




<div class="alinha15">EDITAR PRODUTO SELECIONADO</div>

<div class="cut1">
	
<?php
$id =$_GET['id'];
$sql = "SELECT * FROM produtos WHERE id = $id";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){

$id = $res['id'];
$nome = $res ['nome'];
$nome_slug = $res ['nome_slug'];
$categoria = $res ['categoria'];
$subcategoria = $res ['subcategoria'];
$desc = $res ['desc'];
$valor = $res ['valor'];
$destaque = $res ['destaque'];
$imagem = $res ['imagem'];
$estilo = $res ['estilo'];		

$i++;
	
echo"	

<form action='produtos-editar?acao=alterar&id=$id' method='post'>
	
<div id=\"formulario\">
<label for=\"nome\">Nome:</label>
<input type=\"text\" name=\"nome\" class=\"form3\" value=\"$nome\" required/>
</div>
	
<div id=\"formulario\">
<label for=\"valor\">Valor:</label>
<input type=\"text\" name=\"valor\" value=\"$valor\" class=\"form3\" disabled/>
</div>
	

<div id=\"formulario\">
<label for=\"destaque\">Produto em Destaque:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Produto em destaque Home</span>
</div></label>
<select name=\"destaque\" class=\"form3\" required>
	<option value=\"$destaque\">$destaque</option>
	<option value=\"Sim\">Sim</option>
	<option value=\"Não\">Não</option>
</select>
</div>
	

<div id=\"formulario\">
<label for=\"categoria\">Categoria:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Categoria do Produto</span>
</div></label>
<select name=\"categoria\" class=\"form3\" required>
<option value=\"$categoria\">$categoria</option>
";




$sql2 = "SELECT * FROM categorias WHERE tipo ='produtos' ORDER BY categoria ASC";
$comando2 = mysqli_query($conn, $sql2);
while($res = mysqli_fetch_assoc($comando2)){
$id = $res['id'];
$categoriax= $res['categoria']; 
$categoria_slugx= $res['categoria_slug']; 
echo "<option value=\"$categoria_slugx\">$categoriax</option>"; }
	
echo"</select></div>



<div id=\"formulario\">
<label for=\"categoria\">Subcategoria:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Subcategoria do Produto</span>
</div></label>
<select name=\"subcategoria\" class=\"form3\" >
<option value=\"$subcategoria\">$subcategoria</option>";





$sql3 = "SELECT * FROM subcategorias WHERE tipo ='produtos' ORDER BY subcategoria ASC";
$comando3 = mysqli_query($conn, $sql3);
while($res = mysqli_fetch_assoc($comando3)){
$id = $res['id'];
$subcategoria= $res['subcategoria']; 
$subcategoria_slug= $res['subcategoria_slug']; 
echo "<option value=\"$subcategoria_slug\">$subcategoria</option>"; }


echo"</select></div>




<div id=\"formulario\">
<label for=\"estilo\">Estilo do Produto:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Estilo de Exibição</span>
</div></label>
<select name=\"estilo\" class=\"form3\" required>
	<option value=\"$estilo\">$estilo</option>
	<option value=\"01\">01</option>
	<option value=\"02\">02</option>
	<option value=\"03\">03</option>
</select>
</div>

	

<div id=\"grid12E\">
<label for=\"desc\">Descrição do Produto:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Descrição completa do produto</span>
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
$nome = $_POST ['nome'];
$nome_slug = $_POST ['nome_slug'];
$categoria = $_POST ['categoria'];
$subcategoria = $_POST ['subcategoria'];
$desc = $_POST ['desc'];
$valor = $_POST ['valor'];
$destaque = $_POST ['destaque'];
$imagem = $_POST ['imagem'];
$estilo = $_POST ['estilo'];


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

$nome_slug = toAscii($nome);


$caminho = "<script language='javascript'>function alerta(){alert('Dados Alterados com Sucesso!'); }alerta();document.location='produtos';</script>";

$id = $_GET['id'];
$sql="UPDATE `produtos` SET
`nome` =  '$nome',
`nome_slug` =  '$nome_slug', 
`desc` =  '$desc',
`valor` =  '$valor',
`destaque` =  '$destaque',
`categoria` =  '$categoria',
`estilo` =  '$estilo',
`subcategoria` =  '$subcategoria'
 WHERE  `id` ='$id'; ";

if ($conn->query($sql) === TRUE) {

echo"$caminho";}

else{ echo "<script language='javascript'>function alerta(){alert('Erro Econtrado!');}alerta();document.location='javascript:history.go(-1)';</script>";

}}?>



</body>
</html>