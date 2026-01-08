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
<div class="painel-cliente-icone"><img src="img/icons/imoveis.png" width="100%"/></div>
<div class="alinha14"><a href="imoveis">IMÓVEIS</a> >> EDITAR</div></div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">

<div class="painel-banner-botoes1"><a href="imoveis-cadastrar.php"><img src="img/novo.jpg" width="100%"/></a></div>
</div></div></div>

<div id="painel-cliente">

<div class="alinha15">IMAGENS PROJETO</div>

<div class="cut3">	
<?php
$id =$_GET['id'];
$sql = "SELECT * FROM imoveis WHERE id = $id";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){
$id = $res ['id'];
$imagem = $res ['imagem'];
	
echo"
<div style=\"width: 16%; background-color: ; float: left; padding: 10px;\">";

if ($imagem ==''){echo"<img src='avatar.jpg'  width='96%' border='0' >

<a href=\"imoveis-editar-capa?&id=$id\">	
<div id=\"grid12\">
<div class=\"cadastrar\">
<input type=\"submit\" name=\"submit\" style=\"cursor:pointer\" class=\"cadastrar\" value=\"INSERIR CAPA\"/>
</div></div></a>";}

else {echo"<img src='../img2/imoveis/$imagem' width='96%' border='0'>

<a href=\"imoveis-editar-capa?&id=$id\">	
<div id=\"grid12\">
<div class=\"cadastrar\">
<input type=\"submit\" name=\"submit\" style=\"cursor:pointer\" class=\"cadastrar\" value=\"ALTERAR CAPA\">
</div></div></a>"; }  

echo"</div>";  }?>
</div>



<div class="alinha15"  style="margin-top: 50px;">EDITAR PROJETO SELECIONADO</div>

<div class="cut1">
	
<?php
$id =$_GET['id'];
$sql = "SELECT * FROM imoveis WHERE id = $id";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){

$id = $res['id'];
$tipo_imovel = $res ['tipo_imovel'];
$finalidade = $res ['finalidade'];
$imagem = $res ['imagem'];
$area_construida = $res ['area_construida'];
$situacao = $res ['situacao'];
$valor = $res ['valor'];
$desc = $res ['desc'];
$data_cadastro = $res ['data_cadastro'];
$endereco = $res ['endereco'];
$mapa = $res ['mapa'];
$i++;
	
echo"	

<form action='imoveis-editar?acao=alterar&id=$id' method='post'>



<div id=\"formulario\">
<label for=\"tipo_imovel\">Tipo do Imóvel:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Tipo do Imóvel:</span>
</div></label>
<select name=\"tipo_imovel\" class=\"form3\" required/>
<option value=\"$tipo_imovel\">$tipo_imovel</option>
<option value=\"Casa\">Casa</option>
<option value=\"Sobrado\">Sobrado</option>
<option value=\"Casa Germinada\">Casa Germinada</option>
<option value=\"Apartamento\">Apartamento</option>
<option value=\"Comercial\">Comercial</option>
<option value=\"Chalé\">Chalé</option>
<option value=\"Terreno\">Terreno</option>
<option value=\"Fazenda\">Fazenda</option>
<option value=\"Chácara\">Chácara</option>
<option value=\"Terreno\">Terreno</option>
</select>
</div>


<div id=\"formulario\">
<label for=\"finalidade\">Finalidade Imóvel:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Tipo do Imóvel:</span>
</div></label>
<select name=\"finalidade\" class=\"form3\" required/>
<option value=\"$finalidade\">$finalidade</option>
<option value=\"Venda\">Venda</option>
<option value=\"Aluguel\">Aluguel</option>
<option value=\"Troca\">Troca</option>
<option value=\"Temporada\">Temporada</option>
</select>
</div>



<div id=\"formulario\">
<label for=\"area_construida\">Área Construída:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Área Construída:</span>
</div></label>
<input type=\"text\" name=\"area_construida\" value=\"$area_construida\" class=\"form3\" required/>
</div>


<div id=\"formulario\">
<label for=\"situacao\">Situação:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Situação:</span>
</div></label>
<input type=\"text\" name=\"situacao\" value=\"$situacao\" class=\"form3\" required/>
</div>

<div id=\"formulario\">
<label for=\"endereco\">Endereço:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Endereço:</span>
</div></label>
<input type=\"text\" name=\"endereco\" value=\"$endereco\" class=\"form3\" required/>
</div>


<div id=\"formulario\">
<label for=\"valor\">Valor:
<div class=\"tooltip\">
<div class=\"iterativo Valor\">i</div>
<span class=\"tooltiptext\">Valor:</span>
</div></label>
<input type=\"text\" name=\"valor\" value=\"$valor\" class=\"form3\" required/>
</div>




<div id=\"grid12E\">
<label for=\"desc\">Descrição:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\"></span>
</div></label>
<textarea class='form4' name='desc'/>$desc</textarea>
</div>



<div id=\"grid12E\">
<label for=\"mapa\">Mapa de Localização:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Iframe Google Maps</span>
</div></label>
<textarea class='form4' name='mapa'/>$mapa</textarea>
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
$tipo_imovel = $_POST ['tipo_imovel'];
$finalidade = $_POST ['finalidade'];
$imagem = $_POST ['imagem'];
$area_construida = $_POST ['area_construida'];
$situacao = $_POST ['situacao'];
$valor = $_POST ['valor'];
$desc = $_POST ['desc'];
$data_cadastro = $_POST ['data_cadastro'];
$endereco = $_POST ['endereco'];
$mapa = $_POST ['mapa'];


$caminho = "<script language='javascript'>function alerta(){alert('Dados Alterados com Sucesso!'); }alerta();document.location='imoveis';</script>";

$id = $_GET['id'];
$sql="UPDATE `imoveis` SET `tipo_imovel` = '$tipo_imovel', `endereco` = '$endereco', `finalidade` = '$finalidade', `area_construida` = '$area_construida', `situacao` = '$situacao', `valor` = '$valor', `mapa` = '$mapa', `desc` = '$desc' WHERE  `id` ='$id'; ";

if ($conn->query($sql) === TRUE) {

echo"$caminho";}

else{ echo "<script language='javascript'>function alerta(){alert('Erro Econtrado!');}alerta();document.location='javascript:history.go(-1)';</script>";

}}?>


</body>
</html>