<?php
session_start();
if((!isset($_SESSION['login']))
AND (!isset($_SESSION['senha']))) {
    header("Location: /as/index.php?erro=logar");
    exit();
}
$login = $_SESSION['login'];
$senha = $_SESSION['senha'];  
include'conecta.php';

// Processa delete ANTES de qualquer output (evita cache e garante execução)
$acao = $_GET['acao'] ?? '';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($acao === 'remove' && $id > 0 && $conn) {
    $sql = "DELETE FROM depoimentos WHERE id = " . $id;
    if (mysqli_query($conn, $sql)) {
        header("Location: /as/depoimentos.php?msg=removido");
        exit();
    }
}
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
<div class="painel-cliente-icone"><img src="img/icons/depoimentos.png" width="100%"/></div>
	

<?php
$sql = "SELECT * FROM depoimentos ORDER BY id DESC";
$comando = mysqli_query($conn, $sql);
$linhas = mysqli_num_rows($comando); 
echo"<div class=\"alinha14\">DEPOIMENTOS ($linhas)</div>";?> 
	

</div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">	
<div style="display: none"><a href="produtos-filtro"><div class="painel-banner-botoes2"><img src="img/filtro.jpg" width="100%"/></div></a></div>


<a href="depoimentos-texto-cadastrar"><div class="painel-banner-botoes1"><a href="depoimentos-texto-cadastrar"><img src="img/novo_video.jpg" width="100%"/></a></div></a>


</div></div></div>

<div id="painel-cliente">	
	
<?php

$sql = "SELECT * FROM depoimentos ORDER BY id DESC";
$comando = mysqli_query($conn, $sql);
$i = 0;
while($res = mysqli_fetch_assoc($comando)){

$id = $res ['id'];
$nome = $res ['nome'];
$imagem = $res ['imagem'];	
$video = $res ['video'];	
$data_cadastro = $res ['data_cadastro'];
$depoimento = $res ['depoimento'];	
$formato = $res ['formato'];	
$i++;

echo "		
<div id=\"painel-banner-listagem\">
<div class=\"painel-banner-text\">$i</div>
<div class=\"painel-banner-text\">$data_cadastro</div>
<div class=\"painel-banner-text\">$nome</div>";


if (($video=='')and ($formato=='')){echo"<div class=\"painel-banner-text\">Foto</div>";}
if (($imagem=='')and ($formato=='')){echo"<div class=\"painel-banner-text\">Vídeo</div>";}
if ($formato=='Texto'){echo"<div class=\"painel-banner-text\">Texto</div>";}


echo"

<div id=\"grid12F\"><div id=\"painel-banner-listagemIcon-center\">

<div class=\"painel-banner-listagem-icon\"><a href=\"/as/depoimentos.php?acao=remove&id=$id\" onclick=\"return confirm('Certeza que deseja excluir?');\"><img src=\"img/excluir2.png\"/></a></div>

<div class=\"painel-banner-listagem-icon\"><a href=\"/as/depoimentos-editar.php?id=$id\"><img src=\"img/editar2.png\"/></a></div>
</div></div>


";
if (($video=='')and ($formato=='')){echo"<div id=\"showbanner\"><img src=\"../img2/depoimentos/$imagem\" width=\"100%\"></div>";}

if ($formato=='Texto'){echo"";}

if ($video<>''){echo"<iframe width=\"100%\" height=\"400\" src=\"https://www.youtube.com/embed/$video\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>";}
echo"






</div>




"; }?>
	

</div></div>

<div id="sistemas-menu-lateral">
<div id="grid12"><div class="sistemas-marcador"><img src="img/marcador.png"/></div></div>
	<?php  include'menu-lateral.php';?>
</div></div></div>

<?php  include'menu-lateral-mobiles.php';?>
	
	
	
<?php
if (isset($_GET['msg']) && $_GET['msg'] === 'removido'): ?>
<script>
alert('Depoimento removido com sucesso!');
history.replaceState({}, '', '/as/depoimentos.php');
</script>
<?php endif; ?>

</body>
</html>