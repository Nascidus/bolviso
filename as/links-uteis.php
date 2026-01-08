<?php session_start(); if((!isset($_SESSION[login])) AND (!isset($_SESSION[senha])))Header("Location: index.php?erro=logar");
$login = $_SESSION['login'];
$senha = $_SESSION['senha'];  
?>


<!doctype html>
<html>
<head>
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
<div class="painel-cliente-icone"><img src="img/icons/linksuteis.png" width="100%"/></div>

<?php
$sql = "SELECT * FROM links_uteis ORDER BY id  DESC";
$comando = mysqli_query($conn, $sql);
$linhas = mysqli_num_rows($comando); 
echo"<div class=\"alinha14\">ORIENTAÇÃO TÉCNICA ($linhas)</div>";?>

</div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">
<div class="painel-banner-botoes2"><a href="links-filtro"><img src="img/filtro.jpg" width="100%"/></a></div>
<div class="painel-banner-botoes1"><a href="links-categorias"><img src="img/categorias.jpg" width="100%"/></a></div>
<div class="painel-banner-botoes1"><a href="links-cadastrar"><img src="img/novo.jpg" width="100%"/></a></div>
</div></div></div>

<div id="painel-cliente">
	
<?php

$sql = "SELECT * FROM links_uteis ORDER BY id DESC";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){

$id = $res['id'];
$link = $res ['link'];
$titulo = $res ['titulo'];
$i++;

echo "		

<div id=\"painel-banner-listagem\">
<div class=\"painel-banner-text\">$i</div>
<div class=\"painel-banner-text\">$titulo</div>

<div id=\"grid12F\"><div id=\"painel-banner-listagemIcon-center\">


<div class=\"painel-banner-listagem-icon\"><a href='links-uteis?acao=remove&id=$id' onclick=\"return confirm('Certeza que deseja excluir?');\"><img src=\"img/excluir2.png\"/></a></div>

<div class=\"painel-banner-listagem-icon\"><a href=\"links-editar?id=$id\"><img src=\"img/editar2.png\"/></a></div>


</div></div>

</div>




"; }?>



<?php
$acao = $_GET['acao'];
$id = $_GET['id'];
if ($acao == 'remove'){
$sql = "DELETE FROM `links_uteis` WHERE id = $id";
$comando = mysqli_query($conn, $sql);;

if ($conn->query($sql) === TRUE) {
echo "<script language='javascript'>function alerta(){alert('Removido com sucesso!'); }alerta();document.location='javascript:history.go(-1)';</script>";
}}?>




</div></div>

<div id="sistemas-menu-lateral">
<div id="grid12"><div class="sistemas-marcador"><img src="img/marcador.png"/></div></div>
	<?php  include'menu-lateral.php';?>
</div></div></div>

<?php  include'menu-lateral-mobiles.php';?>

</body>
</html>