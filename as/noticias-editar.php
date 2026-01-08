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
<div class="alinha14"><a href="noticias">NOTÍCIAS</a> >> EDITAR</div></div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">
<div style="display: none"><a href="banner-filtro"><div class="painel-banner-botoes2"><img src="img/filtro.jpg" width="100%"/></div></a></div>
<div class="painel-banner-botoes1"><a href="noticias-categorias"><img src="img/categorias.jpg" width="100%"/></a></div>
<div class="painel-banner-botoes1"><a href="noticias-cadastrar.php"><img src="img/novo.jpg" width="100%"/></a></div>
</div></div></div>

<div id="painel-cliente">


<div class="alinha15">IMAGEM DE CAPA</div>
<div class="cut3">	
<?php
$id =$_GET['id'];
$sql = "SELECT * FROM noticias WHERE id = $id";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){
$id = $res ['id'];
$imagem = $res ['imagem'];
	
echo"
<div style=\"width: 16%; background-color: ; float: left; padding: 10px;\">";

if ($imagem ==''){echo"<img src='avatar.jpg'  width='96%' border='0' >

<a href=\"noticias-editar-capa.php?&id=$id\">	
<div id=\"grid12\">
<div class=\"cadastrar\">
<input type=\"submit\" name=\"submit\" style=\"cursor:pointer\" class=\"cadastrar\" value=\"INSERIR IMAGEM\"/>
</div></div></a>";}

else {echo"<img src='../img2/noticias/$imagem' width='96%' border='0'>

<a href=\"noticias-editar-capa.php?&id=$id\">	
<div id=\"grid12\">
<div class=\"cadastrar\">
<input type=\"submit\" name=\"submit\" style=\"cursor:pointer\" class=\"cadastrar\" value=\"ALTERAR IMAGEM\">
</div></div></a>"; }  

echo"</div>";  }?>
</div>





<div class="alinha15">EDITAR NOTÍCIA SELECIONADA</div>
<div class="cut1">
	
<?php
$id =$_GET['id'];
$sql = "SELECT * FROM noticias WHERE id = $id";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){

$id = $res ['id'];
$titulo = $res ['titulo'];
$titulo_slug = $res ['titulo_slug'];
$categoria = $res ['categoria'];
$data_cadastro = $res ['data_cadastro'];
$imagem = $res ['imagem'];	
$desc = $res ['desc'];	
$fonte = $res ['fonte'];
$video = $res ['video'];
$destaque = $res ['destaque'];
$ebook = $res ['ebook'];
		
$i++;	
echo"	
<form action='noticias-editar?acao=alterar&id=$id' method='post'>
	
<div id=\"formulario\">
<label for=\"titulo\">Nome:</label>
<input type=\"text\" name=\"titulo\" class=\"form3\" value=\"$titulo\" required/>
</div>
	
<div id=\"formulario\">
<label for=\"fonte\">Fonte:</label>
<input type=\"text\" name=\"fonte\" value=\"$fonte\" class=\"form3\" />
</div>

<div id=\"formulario\">
<label for=\"ebook\">E-book (Link Externo):</label>
<input type=\"text\" name=\"ebook\" value=\"$ebook\" class=\"form3\" />
</div>

<div id=\"formulario\">
<label for=\"destaque\">Destaque:</label>
<select name=\"destaque\" class=\"form3\" required/>
<option value=\"$destaque\">$destaque</option>
<option value=\"Sim\">Sim</option>
<option value=\"Não\">Não</option>
</select>
</div>	

<div id=\"formulario\">
<label for=\"video\">Vídeo:</label>
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">ID do Vídeo no Youtube</span>
</div></label>
<input type=\"text\" name=\"video\" value=\"$video\" class=\"form3\"/>
</div>

<div id=\"formulario\">
<label for=\"categoria\">Categoria:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Categoria do Produto</span>
</div></label>
<select name=\"categoria\" class=\"form3\" required>
";

$sql2 = "SELECT * FROM categorias WHERE tipo ='noticias' ORDER BY categoria ASC";
$comando2 = mysqli_query($conn, $sql2);
while($res = mysqli_fetch_assoc($comando2)){
$id = $res['id'];
$categoria= $res['categoria']; 
$categoria_slug= $res['categoria_slug']; 
echo "<option value=\"$categoria_slug\">$categoria</option>"; }

echo"	
</select></div>
<div id=\"grid12E\">
<label for=\"desc\">Descrição da Notícia:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Descrição completa da notícia</span>
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
$categoria = $_POST ['categoria'];
$data_cadastro = $_POST ['data_cadastro'];
$imagem = $_POST ['imagem'];	
$desc = $_POST ['desc'];	
$fonte = $_POST ['fonte'];
$video = $_POST ['video'];
$destaque = $_POST ['destaque'];		
$ebook = $_POST ['ebook'];		


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


$caminho = "<script language='javascript'>function alerta(){alert('Dados Alterados com Sucesso!'); }alerta();document.location='noticias';</script>";

$id = $_GET['id'];
$sql="UPDATE `noticias` SET
`titulo` =  '$titulo', 
`titulo_slug` =  '$titulo_slug', 
`fonte` =  '$fonte',
`video` =  '$video',
`ebook` =  '$ebook',
`destaque` =  '$destaque',
`desc` =  '$desc'
 WHERE  `id` ='$id'; ";
 
if ($conn->query($sql) === TRUE) {

echo"$caminho";}

else{ echo "<script language='javascript'>function alerta(){alert('Erro Econtrado!');}alerta();document.location='javascript:history.go(-1)';</script>";

}}?>



</body>
</html>