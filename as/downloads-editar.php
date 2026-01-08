<?php session_start(); if((!isset($_SESSION['login'])) AND (!isset($_SESSION['senha'])))Header("Location: index.php?erro=logar");
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
<div class="painel-cliente-icone"><img src="img/icons/download.png" width="100%"/></div>
<div class="alinha14"><a href="fotos">DOWNLOADS</a> >> EDITAR</div></div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">
<div style="display: none"><a href="banner-filtro"><div class="painel-banner-botoes2"><img src="img/filtro.jpg" width="100%"/></div></a></div>
<div style="display: none"><div class="painel-banner-botoes1"><a href="banner-categorias"><img src="img/categorias.jpg" width="100%"/></a></div></div>
<div class="painel-banner-botoes1"><a href="downloads-cadastrar.php"><img src="img/novo.jpg" width="100%"/></a></div>
</div></div></div>

<div id="painel-cliente">
<div class="alinha15">EDITAR DOWNLOAD SELECIONADO</div>

<div class="cut1">
	
<?php
$id =$_GET['id'];
$sql = "SELECT * FROM downloads WHERE id = $id";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){

$id = $res['id'];
$nome_arquivo = $res ['nome_arquivo'];
$desc = $res ['desc'];
$link_arquivo = $res ['link_arquivo'];
$i++;
	
echo"	

<form action='downloads-editar?acao=alterar&id=$id' method='post'>
	
<div id=\"formulario\">
<label for=\"nome_arquivo\">Nome do Arquivo:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Link Arquivo</span>
</div></label>
<input type=\"text\" name=\"nome_arquivo\" value=\"$nome_arquivo\" class=\"form3\" required/>
</div>
		
<div id=\"formulario\">
<label for=\"link_arquivo\">Link Arquivo:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Link Arquivo:</span>
</div></label>
<input type=\"text\" name=\"link_arquivo\" value=\"$link_arquivo\" class=\"form3\" required/>
</div>
	
<div id=\"grid12E\">
<label for=\"desc\">Descrição do Arquivo:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Descrição do Arquivo:</span>
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
$nome_arquivo = $_POST ['nome_arquivo'];
$desc = $_POST ['desc'];
$link_arquivo = $_POST ['link_arquivo'];

$caminho = "<script language='javascript'>function alerta(){alert('Dados Alterados com Sucesso!'); }alerta();document.location='downloads';</script>";

$id = $_GET['id'];
$sql="UPDATE `downloads` SET
`nome_arquivo` =  '$nome_arquivo', 
`desc` =  '$desc',
`link_arquivo` =  '$link_arquivo'
 WHERE  `id` ='$id'; ";

if ($conn->query($sql) === TRUE) {

echo"$caminho";}

else{ echo "<script language='javascript'>function alerta(){alert('Erro Econtrado!');}alerta();document.location='javascript:history.go(-1)';</script>";

}}?>


</body>
</html>