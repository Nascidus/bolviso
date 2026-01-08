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
<div class="painel-cliente-icone"><img src="img/icons/noticias.png" width="100%"/></div>
<div class="alinha14"><a href="cursos">CURSOS</a> >> EDITAR</div></div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">

<div style="display: none"><a href="banner-filtro"><div class="painel-banner-botoes2"><img src="img/filtro.jpg" width="100%"/></div></a></div>

<div style="display: none"><div class="painel-banner-botoes1"><a href="noticias-categorias"><img src="img/categorias.jpg" width="100%"/></a></div></div>

<div class="painel-banner-botoes1"><a href="cursos-cadastrar.php"><img src="img/novo.jpg" width="100%"/></a></div>
</div></div></div>

<div id="painel-cliente">
<div class="alinha15">EDITAR NOTÍCIA SELECIONADA</div>

<div class="cut1">
	
<?php
$id =$_GET['id'];
$sql = "SELECT * FROM cursos WHERE id = $id";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){

$id = $res ['id'];
$id = $res ['id'];
$nome = $res ['nome'];
$desc = $res ['desc'];
$data = $res ['data'];
$valor = $res ['valor'];
$imagem = $res ['imagem'];	
$local = $res ['local'];	
$link = $res ['link'];	
		
$i++;
	
echo"	

<form action='cursos-editar?acao=alterar&id=$id' method='post'>
	
<div id=\"formulario\">
<label for=\"nome\">Nome:</label>
<input type=\"text\" name=\"nome\" class=\"form3\" value=\"$nome\" required/>
</div>
	
<div id=\"formulario\">
<label for=\"valor\">Valor:</label>
<input type=\"text\" name=\"valor\" class=\"form3\" value=\"$valor\" required/>
</div>


<div id=\"formulario\">
<label for=\"data\">Data:</label>
<input type=\"text\" name=\"data\" class=\"form3\" value=\"$data\" required/>
</div>
	

<div id=\"formulario\">
<label for=\"local\">Local:</label>
<input type=\"text\" name=\"local\" class=\"form3\" value=\"$local\" required/>
</div>

<div id=\"formulario\">
<label for=\"link\">Link Externo:</label>
<input type=\"text\" name=\"link\" class=\"form3\"  value=\"$link\" required/>
</div>


<div id=\"grid12E\">
<label for=\"desc\">Descrição do Curso:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Descrição completa da Notícia</span>
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
$desc = $_POST ['desc'];
$data = $_POST ['data'];
$valor = $_POST ['valor'];
$imagem = $_POST ['imagem'];	
$local = $_POST ['local'];	
$link = $_POST ['link'];			
	
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


$caminho = "<script language='javascript'>function alerta(){alert('Dados Alterados com Sucesso!'); }alerta();document.location='cursos';</script>";

$id = $_GET['id'];
$sql="UPDATE `cursos` SET
`nome` =  '$nome', 
`nome_slug` =  '$nome_slug', 
`desc` =  '$desc',
`valor` =  '$valor',
`data` =  '$data',
`link` =  '$link',
`local` =  '$local'
 WHERE  `id` ='$id'; ";
 
if ($conn->query($sql) === TRUE) {

echo"$caminho";}

else{ echo "<script language='javascript'>function alerta(){alert('Erro Econtrado!');}alerta();document.location='javascript:history.go(-1)';</script>";

}}?>



</body>
</html>