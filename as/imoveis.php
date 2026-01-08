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

<div class="center"><div class="clearfix"><div id="sistemas-infos">

<div id="painel-banner">
<div id="painel-banner-padding">
<div id="grid12">
<div class="painel-cliente-icone"><img src="img/icons/imoveis.png" width="100%"/></div>
	

<?php
$sql = "SELECT * FROM imoveis ORDER BY id DESC";
$comando = mysqli_query($conn, $sql);
$linhas = mysqli_num_rows($comando); 
echo"<div class=\"alinha14\">IMÓVEIS ($linhas)</div>";?> 
	

</div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">	

<a href="imoveis-cadastrar"><div class="painel-banner-botoes1"><a href="imoveis-cadastrar"><img src="img/novo.jpg" width="100%"/></a></div></a>

</div></div></div>

<div id="painel-cliente">	
	
<?php

$sql = "SELECT * FROM imoveis ORDER BY id DESC";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){

$id = $res ['id'];
$tipo_imovel = $res ['tipo_imovel'];
$finalidade = $res ['finalidade'];
$imagem = $res ['imagem'];
$area_construida = $res ['area_construida'];
$situacao = $res ['situacao'];
$valor = $res ['valor'];
$desc = $res ['desc'];
$data_cadastro = $res ['data_cadastro'];
$i++;

echo "		

<div id=\"painel-banner-listagem\">
<div class=\"painel-banner-text\">$i</div>
<div class=\"painel-banner-text\">$data_cadastro</div>
<div class=\"painel-banner-text\">$tipo_imovel</div>
<div class=\"painel-banner-text\">$finalidade</div>";

if ($destaque=='Sim'){echo"<div class=\"painel-banner-text\">Em Destaque</div>";}
	else {echo"";}

echo"
<div id=\"grid12F\"><div id=\"painel-banner-listagemIcon-center\">



<div class=\"painel-banner-listagem-icon\"><a href=\"imoveis-fotos?id=$id\" title=\"Inserir Fotos\"><img src=\"img/listagem.png\"/></a></div>

<div class=\"painel-banner-listagem-icon\"><a href=\"imoveis-editar?id=$id\" title=\"Editar Imóvel\"><img src=\"img/editar2.png\"/></a></div>

<div class=\"painel-banner-listagem-icon\"><a href='imoveis?acao=remove&id=$id' onclick=\"return confirm('Certeza que deseja excluir?');\"><img src=\"img/excluir2.png\"/></a></div>
</div></div>


<img src=\"../img2/imoveis/$imagem\" style=\"margin-top: 50px;\">

</div>




"; }?>
	

</div></div>

<div id="sistemas-menu-lateral">
<div id="grid12"><div class="sistemas-marcador"><img src="img/marcador.png"/></div></div>
	<?php  include'menu-lateral.php';?>
</div></div></div>

<?php  include'menu-lateral-mobiles.php';?>
	
	
	
<?php
$acao = $_GET['acao'];
$id = $_GET['id'];
if ($acao == 'remove'){
$sql = "DELETE FROM `imoveis` WHERE id = $id";
$comando = mysqli_query($conn, $sql);;

if ($conn->query($sql) === TRUE) {
echo "<script language='javascript'>function alerta(){alert('Removido com sucesso!'); }alerta();document.location='javascript:history.go(-1)';</script>";
}}?>


</body>
</html>