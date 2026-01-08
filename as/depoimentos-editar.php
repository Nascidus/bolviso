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
<div class="painel-cliente-icone"><img src="img/icons/depoimentos.png" width="100%"/></div>
<div class="alinha14"><a href="depoimentos">DEPOIMENTOS</a> >> EDITAR</div></div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">
<div style="display: none"><a href="banner-filtro"><div class="painel-banner-botoes2"><img src="img/filtro.jpg" width="100%"/></div></a></div>

<a href="depoimentos-cadastrar"><div class="painel-banner-botoes1"><a href="depoimentos-cadastrar"><img src="img/novo_video.jpg" width="100%"/></a></div></a>


<a href="depoimentos-imagem-cadastrar"><div class="painel-banner-botoes1"><a href="depoimentos-imagem-cadastrar"><img src="img/novo_foto.jpg" width="100%"/></a></div></a>

</div></div></div>

<div id="painel-cliente">
<div class="alinha15">EDITAR DEPOIMENTO SELECIONADO</div>

<div class="cut1">
	
<?php
$id =$_GET['id'];
$sql = "SELECT * FROM depoimentos WHERE id = $id";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){

$id = $res['id'];
$nome = $res ['nome'];
$imagem = $res ['imagem'];	
$video = $res ['video'];	
$data_cadastro = $res ['data_cadastro'];
$depoimento = $res ['depoimento'];	
$i++;
	
echo"	

<form action='depoimentos-editar?acao=alterar&id=$id' method='post'>
	
<div id=\"formulario\">
<label for=\"nome\">Nome:</label>
<input type=\"text\" name=\"nome\" value=\"$nome\" class=\"form3\" required/>
</div>
		

	
<div id=\"grid12E\">
<label for=\"depoimento\">Depoimento:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Descrição completa da Notícia</span>
</div></label>
<textarea class='form4' name='depoimento'/>$depoimento</textarea>
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
$imagem = $_POST ['imagem'];	
$video = $_POST ['video'];	
$data_cadastro = $_POST ['data_cadastro'];
$depoimento = addslashes($_POST['depoimento']); 	

$caminho = "<script language='javascript'>function alerta(){alert('Dados Alterados com Sucesso!'); }alerta();document.location='depoimentos';</script>";

$id = $_GET['id'];
$sql="UPDATE `depoimentos` SET
`nome` =  '$nome', 
`video` =  '$video',
`depoimento` =  '$depoimento'
 WHERE  `id` ='$id'; ";

if ($conn->query($sql) === TRUE) {

echo"$caminho";}

else{ echo "<script language='javascript'>function alerta(){alert('Erro Econtrado!');}alerta();document.location='javascript:history.go(-1)';</script>";

}}?>


</body>
</html>