<?php session_start(); if((!isset($_SESSION[login])) AND (!isset($_SESSION[senha])))Header("Location: index.php?erro=logar");
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

<div class="center"><div class="clearfix"><div id="sistemas-infos">

<div id="painel-banner">
<div id="painel-banner-padding">
<div id="grid12">
<div class="painel-cliente-icone"><img src="img/icons/receitas.png" width="100%"/></div>
<div class="alinha14"><a href="receitas">RECEITAS</a> >> CATEGORIAS</div></div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">	

<div style="display: none"><a href="produtos-filtro"><div class="painel-banner-botoes2"><img src="img/filtro.jpg" width="100%"/></div></a></div>


<a href="receitas-categorias"><div class="painel-banner-botoes1"><img src="img/categorias.jpg" width="100%"/></div></a>

<a href="receitas-cadastrar"><div class="painel-banner-botoes1"><a href="receitas-cadastrar"><img src="img/novo.jpg" width="100%"/></a></div></a>
</div></div></div>

	
	
	
<div id="painel-cliente">
<div id="painel-banner">
	
<div class="alinha15">CADASTRAR</div>
	
<form action='receitas-categorias?acao=cadastrar' method='POST' enctype="multipart/form-data">

	
<div id="formulario">
<label for="categoria">Nome:</label>
<input type="text" name="categoria" class="form3"/>
</div>
	
<div id="painel-banner-categorias">
<div id="grid12"><div class="cadastrar2"><input type="submit" name='upload' style="cursor:pointer" class="cadastrar2" value="CADASTRAR"/></div></div>
</div></div>

</form>
	
	


	
	
	
<?php

$sql = "SELECT * FROM categorias WHERE tipo ='receitas' ORDER BY categoria ASC";
$comando = mysqli_query($conn, $sql);
$linhas = mysqli_num_rows($comando); 
echo"<div class=\"alinha16\">EDITAR CADASTROS ($linhas)</div>";
while($res = mysqli_fetch_assoc($comando)){

$id = $res['id'];
$categoria= $res['categoria']; 
$data_cadastro = $res ['data_cadastro'];
$i++;

echo "	
	
<div id=\"painel-banner-listagem\">
<div class=\"painel-banner-text\">$i</div>
<div class=\"painel-banner-text\">$data_cadastro</div>
<div class=\"painel-banner-text\">$categoria</div>
<div id=\"grid12F\"><div id=\"painel-banner-listagemIcon-center\">
<div class=\"painel-banner-listagem-icon\">
<a href='receitas-categorias?acao=remove&id=$id' onclick=\"return confirm('Certeza que deseja excluir?');\"><img src=\"img/excluir2.png\"/></a>
</div>
</div></div></div>
	
"; }?>	
	
	
	

</div></div>

<div id="sistemas-menu-lateral">
<div id="grid12"><div class="sistemas-marcador"><img src="img/marcador.png"/></div></div>
	<?php  include'menu-lateral.php';?>
</div></div></div>

<?php  include'menu-lateral-mobiles.php';?>
	
	
	
	
<?php

$acao = $_GET ['acao'];
if ($acao=='cadastrar'){

$id = $_POST ['id'];
$categoria = $_POST ['categoria']; 
$categoria_slug = $_POST ['categoria_slug']; 
$tipo = $_POST ['tipo'];
$data_cadastro = $_POST ['data_cadastro'];

$diaatual = date('d');
$mesatual = date('m');	
$anoatual = date('20y');
	
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

$url = toAscii($categoria);
	

$sql =" 
INSERT INTO `categorias` ( `id` , `categoria`  , `categoria_slug` , `tipo` , `data_cadastro` )
VALUES (NULL , '$categoria',  '$url'  , 'receitas'   , '$diaatual/$mesatual/$anoatual'   )"; 

if ($conn->query($sql) === TRUE) {  
  
  echo"<BR><script language='javascript'>
      function alerta(){
      alert('Categoria cadastrada com sucesso! ');
      }
      alerta();
      document.location='javascript:history.go(-1)';
      </script></b>";
  
    }}?>

	
	
	
	
	
<?php
$acao = $_GET['acao'];
$id = $_GET['id'];
if ($acao == 'remove'){
$sql = "DELETE FROM `categorias` WHERE id = $id";
$comando = mysqli_query($conn, $sql);;

if ($conn->query($sql) === TRUE) {
echo "<script language='javascript'>function alerta(){alert('Removido com sucesso!'); }alerta();document.location='javascript:history.go(-1)';</script>";
}}?>






</body>
</html>