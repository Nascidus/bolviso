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

<div class="center"><div class="clearfix">
<div id="sistemas-infos">

<div id="painel-banner">
<div id="painel-banner-padding">
<div id="grid12">
<div class="painel-cliente-icone"><img src="img/icons/per.png" width="100%"/></div>
<div class="alinha14"><a href="fotos">PERGUNTAS E RESPOSTAS</a> >> EDITAR</div></div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">	
<div style="display: none"><a href="produtos-filtro"><div class="painel-banner-botoes2"><img src="img/filtro.jpg" width="100%"/></div></a></div>

<a href="perguntas-e-respostas-categorias"><div class="painel-banner-botoes1"><img src="img/categorias.jpg" width="100%"/></div></a>

<a href="perguntas_e_respostas-cadastrar"><div class="painel-banner-botoes1"><a href="perguntas-e-respostas-cadastrar"><img src="img/novo.jpg" width="100%"/></a></div></a>
</div></div></div>

<div id="painel-cliente">
<div class="alinha15">EDITAR PERGUNTA SELECIONADO</div>

<div class="cut1">
	
<?php
$id =$_GET['id'];
$sql = "SELECT * FROM perguntas_e_respostas WHERE id = $id";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){

$id = $res['id'];
$pergunta = $res ['pergunta'];
$resposta = $res ['resposta'];
$categoria = $res ['categoria'];
$data_cadastro = $res ['data_cadastro'];
$i++;
	
echo"	

<form action='perguntas-e-respostas-editar?acao=alterar&id=$id' method='post'>

<div id=\"formulario\">
<label for=\"pergunta\">Pergunta:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Pergunta</span>
</div></label>
<input type=\"text\" name=\"pergunta\" value=\"$pergunta\" class=\"form3\" required/>
</div>
	
<div id=\"formulario\">
<label for=\"categoria\">Categoria:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Categoria do Produto</span>
</div></label>
<select name=\"categoria\" class=\"form3\" required>
<option value=\"$categoria\">$categoria</option>";

$sql2 = "SELECT * FROM categorias WHERE tipo ='perguntas-e-respostas' ORDER BY categoria ASC";
$comando2 = mysqli_query($conn, $sql2);
while($res = mysqli_fetch_assoc($comando2)){
$id = $res['id'];
$categoria= $res['categoria']; 
$categoria_slug= $res['categoria_slug']; 
echo "<option value=\"$categoria_slug\">$categoria</option>"; }

echo"
</select></div>
	

<div id=\"grid12E\">
<label for=\"resposta\">Resposta:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Resposta</span>
</div></label>
<textarea class='form4' name='resposta'/>$resposta</textarea>
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
$pergunta = $_POST ['pergunta'];
$resposta = $_POST ['resposta'];
$categoria = $_POST ['categoria'];	
$data_cadastro = $_POST ['data_cadastro'];	

$caminho = "<script language='javascript'>function alerta(){alert('Dados Alterados com Sucesso!'); }alerta();document.location='perguntas-e-respostas';</script>";

$id = $_GET['id'];
$sql="UPDATE `perguntas_e_respostas` SET
`pergunta` =  '$pergunta', 
`resposta` =  '$resposta',
`categoria` =  '$categoria'

 WHERE  `id` ='$id'; ";

if ($conn->query($sql) === TRUE) {

echo"$caminho";}

else{ echo "<script language='javascript'>function alerta(){alert('Erro Econtrado!');}alerta();document.location='javascript:history.go(-1)';</script>";

}}?>


</body>
</html>