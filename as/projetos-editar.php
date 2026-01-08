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
<div class="painel-cliente-icone"><img src="img/icons/projetos.png" width="100%"/></div>
<div class="alinha14"><a href="projetos">PROJETOS</a> >> EDITAR</div></div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">

<div class="painel-banner-botoes1"><a href="projetos-cadastrar.php"><img src="img/novo.jpg" width="100%"/></a></div>
</div></div></div>

<div id="painel-cliente">

<div class="alinha15">IMAGENS PROJETO</div>

<div class="cut3">	
<?php
$id =$_GET['id'];
$sql = "SELECT * FROM projetos WHERE id = $id";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){
$id = $res ['id'];
$imagem = $res ['imagem'];
	
echo"
<div style=\"width: 16%; background-color: ; float: left; padding: 10px;\">";

if ($imagem ==''){echo"<img src='avatar.jpg'  width='96%' border='0' >

<a href=\"projetos-editar-capa?&id=$id\">	
<div id=\"grid12\">
<div class=\"cadastrar\">
<input type=\"submit\" name=\"submit\" style=\"cursor:pointer\" class=\"cadastrar\" value=\"INSERIR CAPA\"/>
</div></div></a>";}

else {echo"<img src='../img2/projetos/$imagem' width='96%' border='0'>

<a href=\"projetos-editar-capa?&id=$id\">	
<div id=\"grid12\">
<div class=\"cadastrar\">
<input type=\"submit\" name=\"submit\" style=\"cursor:pointer\" class=\"cadastrar\" value=\"ALTERAR CAPA\">
</div></div></a>"; }  

echo"</div>";  }?>
</div>



<div class="cut3" style="display: none;">	
<?php
$id =$_GET['id'];
$sql = "SELECT * FROM projetos WHERE id = $id";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){
$id = $res ['id'];
$imagem2 = $res ['imagem2'];
	
echo"
<div style=\"width: 16%; background-color: ; float: left; padding: 10px;\">";

if ($imagem2 ==''){echo"<img src='avatar.jpg'  width='96%' border='0' >

<a href=\"projetos-editar-banner?&id=$id\">	
<div id=\"grid12\">
<div class=\"cadastrar\">
<input type=\"submit\" name=\"submit\" style=\"cursor:pointer\" class=\"cadastrar\" value=\"INSERIR BANNER\"/>
</div></div></a>";}

else {echo"<img src='../img2/projetos/$imagem2' width='96%' border='0'>

<a href=\"projetos-editar-capa?&id=$id\">	
<div id=\"grid12\">
<div class=\"cadastrar\">
<input type=\"submit\" name=\"submit\" style=\"cursor:pointer\" class=\"cadastrar\" value=\"ALTERAR BANNER\">
</div></div></a>"; }  

echo"</div>";  }?>
</div>







<div class="alinha15"  style="margin-top: 50px;">EDITAR PROJETO SELECIONADO</div>

<div class="cut1">
	
<?php
$id =$_GET['id'];
$sql = "SELECT * FROM projetos WHERE id = $id";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){

$id = $res['id'];
$nome = $res ['nome'];
$nome_slug = $res ['nome_slug'];
$imagem = $res ['imagem'];
$pergunta_1 = $res ['pergunta_1'];
$pergunta_2 = $res ['pergunta_2'];
$pergunta_3 = $res ['pergunta_3'];
$pergunta_4 = $res ['pergunta_4'];
$pergunta_5 = $res ['pergunta_5'];
$facebook = $res ['facebook'];
$site = $res ['site'];
$instagram = $res ['instagram'];
$data_cadastro = $res ['data_cadastro'];
$setor = $res ['setor'];
$ano = $res ['ano'];
$servicos = $res ['servicos'];
$frase_inicial = $res ['frase_inicial'];
$i++;
	
echo"	

<form action='projetos-editar?acao=alterar&id=$id' method='post'>

<div id=\"formulario\">
<label for=\"nome\">Nome do Projeto:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Nome do Projeto</span>
</div></label>
<input type=\"text\" name=\"nome\" value=\"$nome\" class=\"form3\" required/>
</div>

<div id=\"formulario\">
<label for=\"setor\">Setor:</label>
<input type=\"text\" name=\"setor\" value=\"$setor\" class=\"form3\" />
</div>

<div id=\"formulario\">
<label for=\"ano\">Ano:</label>
<input type=\"text\" name=\"ano\" value=\"$ano\" class=\"form3\" />
</div>

<div id=\"formulario\">
<label for=\"servicos\">Serviços:</label>
<input type=\"text\" name=\"servicos\" value=\"$servicos\" class=\"form3\" />
</div>

<div id=\"formulario\">
<label for=\"frase_inicial\">Frase Inicial:</label>
<input type=\"text\" name=\"frase_inicial\" value=\"$frase_inicial\" class=\"form3\" />
</div>

<div id=\"grid12E\">
<label for=\"pergunta_1\">Contexto:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\"></span>
</div></label>
<textarea class='form4' name='pergunta_1'/>$pergunta_1</textarea>
</div>	


<div id=\"grid12E\">
<label for=\"pergunta_2\">Problema:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\"></span>
</div></label>
<textarea class='form4' name='pergunta_2'/>$pergunta_2</textarea>
</div>	


<div id=\"grid12E\">
<label for=\"pergunta_3\">Solução:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\"></span>
</div></label>
<textarea class='form4' name='pergunta_3'/>$pergunta_3</textarea>
</div>	


<div id=\"grid12E\" style=\"display: none;\">
<label for=\"pergunta_4\">Nosso Objetivo:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\"></span>
</div></label>
<textarea class='form4' name='pergunta_4'/>$pergunta_4</textarea>
</div>


<div id=\"grid12E\" style=\"display: none;\">
<label for=\"pergunta_5\">Colaboradores:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\"></span>
</div></label>
<textarea class='form4' name='pergunta_5'/>$pergunta_5</textarea>
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
$nome_slug = $_POST ['nome_slug'];
$imagem = $_POST ['imagem'];
$pergunta_1 = $_POST ['pergunta_1'];
$pergunta_2 = $_POST ['pergunta_2'];
$pergunta_3 = $_POST ['pergunta_3'];
$pergunta_4 = $_POST ['pergunta_4'];
$pergunta_5 = $_POST ['pergunta_5'];
$facebook = $_POST ['facebook'];
$site = $_POST ['site'];
$instagram = $_POST ['instagram'];
$data_cadastro = $_POST ['data_cadastro'];
$setor = $_POST ['setor'];
$ano = $_POST ['ano'];
$servicos = $_POST ['servicos'];
$frase_inicial = $_POST ['frase_inicial'];


setlocale(LC_ALL, 'en_US.UTF8');
function toAscii($str, $replace=array(), $delimiter='-') {
    if( !empty($replace) ) {
        $str = str_replace((array)$replace, ' ', $str);
    } 
    $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
    $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
    $clean = strtolower(trim($clean, '-'));
    $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
     return $clean;}

$nome_slug = toAscii($nome);



$caminho = "<script language='javascript'>function alerta(){alert('Dados Alterados com Sucesso!'); }alerta();document.location='projetos';</script>";

$id = $_GET['id'];
$sql="UPDATE `projetos` SET `nome` = '$nome',  `pergunta_1` = '$pergunta_1', `pergunta_2` = '$pergunta_2', `pergunta_3` = '$pergunta_3', `pergunta_4` = '$pergunta_4', `pergunta_5` = '$pergunta_5', `facebook` = '$facebook', `instagram` = '$instagram', `site` = '$site', `nome_slug` = '$nome_slug', `setor` = '$setor', `ano` = '$ano', `servicos` = '$servicos', `frase_inicial` = '$frase_inicial' WHERE  `id` ='$id'";

if ($conn->query($sql) === TRUE) {

echo"$caminho";}

else{ echo "<script language='javascript'>function alerta(){alert('Erro Econtrado!');}alerta();document.location='javascript:history.go(-1)';</script>";

}}?>


</body>
</html>