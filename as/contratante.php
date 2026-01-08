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
<div class="painel-cliente-icone"><img src="img/icons/contratante.png" width="100%"/></div>
	

<?php
$data_atual = date('20y/m/d');
$query = "SELECT * FROM contratante  ORDER BY id DESC";
$comando = mysql_query($query);
$num_rows = mysql_num_rows($comando);
echo"<div class=\"alinha14\">ARQUIVOS CONTRATANTE ($num_rows)</div>";?> 
	

</div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">	
<div style="display: none"><a href="produtos-filtro"><div class="painel-banner-botoes2"><img src="img/filtro.jpg" width="100%"/></div></a></div>
<div style="display: none"><a href="produtos-categorias"><div class="painel-banner-botoes1"><img src="img/categorias.jpg" width="100%"/></div></a></div>
<a href="contratante-cadastrar"><div class="painel-banner-botoes1"><a href="contratante-cadastrar"><img src="img/novo.jpg" width="100%"/></a></div></a>

</div></div></div>

<div id="painel-cliente">	
	
<?php
$query = "SELECT * FROM contratante ORDER BY id DESC";
$comando = mysql_query($query);
while($res = mysql_fetch_array($comando)){

$id = $res ['id'];
$nome = $res ['nome'];
$imagem = $res ['imagem'];
$data_cadastro = $res ['data_cadastro'];	
$i++;

echo "		

<div id=\"painel-banner-listagem\">
<div class=\"painel-banner-text\">$i</div>
<div class=\"painel-banner-text\">$nome</div>
<div class=\"painel-banner-text\">$data_cadastro</div>

<div id=\"grid12F\"><div id=\"painel-banner-listagemIcon-center\">

<div class=\"painel-banner-listagem-icon\"><a href='contratante?acao=remove&id=$id' onclick=\"return confirm('Certeza que deseja excluir?');\"><img src=\"img/excluir2.png\"/></a></div>

</div></div>

</div>

"; }?>	

</div>	
	</div>

<div id="sistemas-menu-lateral">
<div id="grid12"><div class="sistemas-marcador"><img src="img/marcador.png"/></div></div>
	<?php  include'menu-lateral.php';?>
</div></div></div>

<?php  include'menu-lateral-mobiles.php';?>
	
	
<?php
$acao = $_GET['acao'];
$id = $_GET['id'];

if ($acao == 'remove'){

$query = "DELETE FROM `contratante` WHERE id = $id";
$exe = mysql_query($query);

if ($exe){
echo "<script language='javascript'>function alerta(){alert('Removido com sucesso!'); }alerta();document.location='contratante';</script>";
}}?>

</body>
</html>