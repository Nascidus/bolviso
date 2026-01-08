<!doctype html>
<html>
<head>
<meta charset="UTF-8">
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
<div class="painel-cliente-icone"><img src="img/icons/obras.png" width="100%"/></div>
	

<?php
$status = $_GET['status'];
$sql = "SELECT * FROM obras WHERE status = '$status'";
$comando = mysqli_query($conn, $sql);
$num_rows = mysqli_num_rows($comando);
echo"<div class=\"alinha14\">OBRAS - $status ($num_rows)</div>";?> 
	

</div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">	

<a href="obras-sequencia.php?status=<?php echo"$status"?>"><div class="painel-banner-botoes2"><img src="img/reorder.png" width="100%"/></div></a>

<div style="display: none"><a href="produtos-categorias"><div class="painel-banner-botoes1"><img src="img/categorias.jpg" width="100%"/></div></a></div>

<a href="obras-cadastrar"><div class="painel-banner-botoes1"><a href="obras-cadastrar"><img src="img/novo.jpg" width="100%"/></a></div></a>
</div></div></div>

<div id="painel-cliente">	
	
<?php
$status = $_GET['status'];
$sql = "SELECT * FROM obras WHERE status = '$status' order by posicao ASC";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){

$id = $res ['id'];
$nome = $res ['nome'];
$data_cadastro = $res ['data'];
$video = $res ['video'];	
$desc = $res ['desc'];
$destaque = $res ['desc'];	
$status = $res ['status'];	
$i++;

echo "		

<div id=\"painel-banner-listagem\">
<div class=\"painel-banner-text\">$i</div>
<div class=\"painel-banner-text\">$nome</div>
<div class=\"painel-banner-text\"><a href=\"acompanhamento-obras-status.php?status=$status\">$status</a></div>


<div id=\"grid12F\"><div id=\"painel-banner-listagemIcon-center\">

<div class=\"painel-banner-listagem-icon\"><a href='acompanhamento-obras?acao=remove&id=$id' onclick=\"return confirm('Certeza que deseja excluir?');\"><img src=\"img/excluir2.png\"/></a></div>


<div class=\"painel-banner-listagem-icon\"><a href=\"obras-editar?id=$id\" title=\"Editar Obra\"><img src=\"img/editar2.png\"/></a></div>

<div class=\"painel-banner-listagem-icon\"><a href='fotos-produtos?id=$id&tipo=obra' title=\"Fotos da Obra\"><img src=\"img/listagem.png\"/></a></div>


<div class=\"painel-banner-listagem-icon\"><a href='arquivos?id=$id' title=\"Logotipo / Infraestrutura / Local\"><img src=\"img/arv.png\"/></a></div>


</div></div>
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

$sql = "DELETE FROM `obras` WHERE id = $id";
$comando = mysqli_query($conn, $sql);;

if ($conn->query($sql) === TRUE) {
echo "<script language='javascript'>function alerta(){alert('Removido com sucesso!'); }alerta();document.location='acompanhamento-obras';</script>";
}}?>

</body>
</html>