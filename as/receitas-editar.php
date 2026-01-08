<?php session_start(); if((!isset($_SESSION[login])) AND (!isset($_SESSION[senha])))Header("Location: index.php?erro=logar");
$login = $_SESSION['login'];
$senha = $_SESSION['senha'];  
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<?php  include'head.php';?>
	<script type="text/javascript" src="nicEdit.js"></script>
<script type="text/javascript">
bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
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
<div class="painel-cliente-icone"><img src="img/icons/receitas.png" width="100%"/></div>
<div class="alinha14"><a href="noticias">RECEITAS</a> >> EDITAR</div></div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">
<div style="display: none"><a href="banner-filtro"><div class="painel-banner-botoes2"><img src="img/filtro.jpg" width="100%"/></div></a></div>
<div class="painel-banner-botoes1"><a href="receitas-categorias"><img src="img/categorias.jpg" width="100%"/></a></div>
<div class="painel-banner-botoes1"><a href="receitas-cadastrar.php"><img src="img/novo.jpg" width="100%"/></a></div>
</div></div></div>

<div id="painel-cliente">
<div class="alinha15">EDITAR RECEITA SELECIONADA</div>

<div class="cut1">
	
<?php
$id =$_GET['id'];
$sql = "SELECT * FROM receitas WHERE id = $id";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){

$id = $res ['id'];
$titulo = $res ['titulo'];
$data_cadastro = $res ['data_cadastro'];
$imagem = $res ['imagem'];
$video = $res ['video'];	
$categoria = $res ['categoria'];
$produto = $res ['produto'];
$preparo = $res ['preparo'];	
$rendimento = $res ['rendimento'];	
$ingredientes = $res ['ingredientes'];	
$modo_preparo = $res ['modo_preparo'];	


		
$i++;
	
echo"	

<form action='receitas-editar?acao=alterar&id=$id' method='post'>
	
<div id=\"formulario\">
<label for=\"titulo\">Nome da Receita:</label>
<input type=\"text\" name=\"titulo\" class=\"form3\" value=\"$titulo\" required/>
</div>
	



<div id=\"formulario\">
<label for=\"video\">Vídeo: (ID Youtube)</label>
<input type=\"text\" name=\"video\" value=\"$video\" class=\"form3\" required/>
</div>
	

<div id=\"formulario\">
<label for=\"rendimento\">Porções de Rendimento:</label>
<input type=\"text\" name=\"rendimento\" value=\"$rendimento\" class=\"form3\" required/>
</div>


<div id=\"formulario\">
<label for=\"preparo\">Tempo de Preparo:</label>
<input type=\"text\" name=\"preparo\" value=\"$preparo\" class=\"form3\" required/>
</div>








<div id=\"formulario\">
<label for=\"categoria\">Categoria:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Categoria do Produto</span>
</div></label>
<select name=\"categoria\" class=\"form3\" required>";

$sql2 = "SELECT * FROM categorias WHERE tipo ='receitas' ORDER BY categoria ASC";
$comando2 = mysqli_query($conn, $sql2);
while($res = mysqli_fetch_assoc($comando2)){
$id = $res['id'];
$categoria= $res['categoria']; 
$categoria_slug= $res['categoria_slug']; 
echo "<option value=\"$categoria_slug\">$categoria</option>"; }


echo"
</select></div>







<div id=\"formulario\">
<label for=\"produto\">Produto:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Produto da Receita</span>
</div></label>
<select name=\"produto\" class=\"form3\" required>
<option value=\"$produto\">$categoria - $produto</option>";

$sql3 = "SELECT * FROM produtos  ORDER BY nome ASC";
$comando3 = mysqli_query($conn, $sql3);
while($res = mysqli_fetch_assoc($comando3)){
$id = $res['id'];
$nome= $res['nome']; 
$categoria= $res['categoria']; 


$sql4 = "SELECT * FROM categorias WHERE tipo ='produtos' and categoria_slug = '$categoria' ORDER BY categoria ASC";
$comando4 = mysqli_query($conn, $sql4);
while($res = mysqli_fetch_assoc($comando4)){
$id = $res['id'];
$categoriax= $res['categoria']; 
$categoria_slugx= $res['categoria_slug']; 



echo "<option value=\"$nome\">$nome</option>"; }}

echo"
</select></div>


<div id=\"grid12E\">
<label for=\"ingredientes\">Ingredientes:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Ingredientes</span>
</div></label>
<textarea class='form4' name='ingredientes'/>$ingredientes</textarea>
</div>	
	


	<div id=\"grid12E\">
<label for=\"modo_preparo\">Modo de Preparo:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Modo de Preparo</span>
</div></label>
<textarea class='form4' name='modo_preparo'/>$modo_preparo</textarea>
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
$data_cadastro = $_POST ['data_cadastro'];
$imagem = $_POST ['imagem'];
$video = $_POST ['video'];	
$categoria = $_POST ['categoria'];
$produto = $_POST ['produto'];
$preparo = $_POST ['preparo'];	
$rendimento = $_POST ['rendimento'];	
$ingredientes = $_POST ['ingredientes'];	
$modo_preparo = $_POST ['modo_preparo'];
		
		


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


$caminho = "<script language='javascript'>function alerta(){alert('Dados Alterados com Sucesso!'); }alerta();document.location='receitas';</script>";

$id = $_GET['id'];
$sql="UPDATE `receitas` SET
`titulo` =  '$titulo', 
`titulo_slug` =  '$titulo_slug', 
`video` =  '$video',
`categoria` =  '$categoria',
`produto` =  '$produto',
`preparo` =  '$preparo',
`rendimento` =  '$rendimento',
`ingredientes` =  '$ingredientes',
`modo_preparo` =  '$modo_preparo'
 WHERE  `id` ='$id'; ";
 
if ($conn->query($sql) === TRUE) {

echo"$caminho";}

else{ echo "<script language='javascript'>function alerta(){alert('Erro Econtrado!');}alerta();document.location='javascript:history.go(-1)';</script>";

}}?>



</body>
</html>