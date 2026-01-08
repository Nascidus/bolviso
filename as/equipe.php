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

<div class="center"><div class="clearfix"><div id="sistemas-infos">

<div id="painel-banner">
<div id="painel-banner-padding">
<div id="grid12">
<div class="painel-cliente-icone"><img src="img/icons/clientes.png" width="100%"/></div>
	

<?php
$sql = "SELECT * FROM equipe ORDER BY id DESC";
$comando = mysqli_query($conn, $sql);
$linhas = mysqli_num_rows($comando); 
echo"<div class=\"alinha14\">EQUIPE ($linhas)</div>";?> 
	

</div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">	
<div style="display: none"><a href="produtos-filtro"><div class="painel-banner-botoes2"><img src="img/filtro.jpg" width="100%"/></div></a></div>
<a href="equipe-categorias"><div class="painel-banner-botoes1"><img src="img/categorias.jpg" width="100%"/></div></a>
<a href="equipe-cadastrar"><div class="painel-banner-botoes1"><a href="equipe-cadastrar"><img src="img/novo.jpg" width="100%"/></a></div></a>
</div></div></div>

<div id="painel-cliente">	
	
<?php

$sql = "SELECT * FROM equipe ORDER BY posicao ASC";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){

$id = $res ['id'];
$imagem = $res ['imagem'];
$nome = $res ['nome']; if(strlen($nome) > 17){ $nome = substr($nome, 0,  17) . "...";}
$i++;

echo "		

<div id=\"painel-banner-listagem3\">
<div class=\"painel-banner-text-produtos\"><a title=\"Data de Cadastro: $data_cadastro\">$i</a></div>
";

$sql2 = "SELECT * FROM categorias WHERE tipo ='equipe'";
$comando2 = mysqli_query($conn, $sql2);
while($res = mysqli_fetch_assoc($comando2)){

$categoriax = $res['categoria'];}
	
echo"<div class=\"painel-banner-text-produtos\"><a title=\"Categoria: $categoriax\">$nome</a></div>";



echo"
<div style=\"width: 100%; float: left;\"><div id=\"painel-banner-listagemIcon-center-produtos\"\">

<div class=\"painel-banner-listagem-icon\" style=\"margin-left: 80px; \"><a href=\"equipe-editar?id=$id\"><img src=\"img/editar2.png\"/></a></div>

<div style=\"display: none;\"  class=\"painel-banner-listagem-icon\"><a href=\"imagem-png-equipe?id=$id\"><img src=\"img/listagem.png\"/></a></div>

<div class=\"painel-banner-listagem-icon\"><a href='equipe?acao=remove&id=$id' onclick=\"return confirm('Certeza que deseja excluir?');\"><img src=\"img/excluir2.png\"/></a>

</div></div></div>";

if ($imagem==''){echo"<div id=\"showprodutos\"><img src=\"avatar.jpg\" width=\"100%\"></div></div>";}
else {echo"<div id=\"showprodutos\"><img src=\"../img2/equipe/$imagem\" width=\"100%\"></div></div>";}

 }?> 
	

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
$sql = "DELETE FROM `equipe` WHERE id = $id";
$comando = mysqli_query($conn, $sql);;

if ($conn->query($sql) === TRUE) {
echo "<script language='javascript'>function alerta(){alert('Removido com sucesso!'); }alerta();document.location='javascript:history.go(-1)';</script>";
}}?>


</body>
</html>