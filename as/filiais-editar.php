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
<div class="painel-cliente-icone"><img src="img/icons/filiais.png" width="100%"/></div>
<div class="alinha14"><a href="filiais">FILIAIS</a> >> EDITAR</div></div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">

<div class="painel-banner-botoes1"><a href="filiais-cadastrar.php"><img src="img/novo.jpg" width="100%"/></a></div>
</div></div></div>

<div id="painel-cliente">

<div class="alinha15">IMAGEM DE CAPA</div>
<div class="cut3">	
<?php
$id =$_GET['id'];
$sql = "SELECT * FROM filiais WHERE id = $id";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){
$id = $res ['id'];
$imagem = $res ['imagem'];
	
echo"
<div style=\"width: 16%; background-color: ; float: left; padding: 10px;\">";

if ($imagem ==''){echo"<img src='avatar.jpg'  width='96%' border='0' >

<a href=\"filiais-editar-capa?&id=$id\">	
<div id=\"grid12\">
<div class=\"cadastrar\">
<input type=\"submit\" name=\"submit\" style=\"cursor:pointer\" class=\"cadastrar\" value=\"INSERIR IMAGEM\"/>
</div></div></a>";}

else {echo"<img src='../img2/filiais/$imagem' width='96%' border='0'>

<a href=\"filiais-editar-capa?&id=$id\">	
<div id=\"grid12\">
<div class=\"cadastrar\">
<input type=\"submit\" name=\"submit\" style=\"cursor:pointer\" class=\"cadastrar\" value=\"ALTERAR IMAGEM\">
</div></div></a>"; }  

echo"</div>";  }?>
</div>




<div class="alinha15"  style="margin-top: 50px;">EDITAR FILIAL SELECIONADA</div>

<div class="cut1">
	
<?php
$id =$_GET['id'];
$sql = "SELECT * FROM filiais WHERE id = $id";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){

$id = $res['id'];
$cidade = $res ['cidade'];
$data_cadastro = $res ['data_cadastro'];
$endereco = $res ['endereco'];	
$telefone = $res ['telefone'];
$whatsapp = $res ['whatsapp'];
$email = $res ['email'];	
$nome = $res ['nome'];	
$nome_slug = $res ['nome_slug'];	
$desc = $res ['desc'];	
$mapa = $res ['mapa'];
$ifood = $res ['ifood'];
$ubereats = $res ['ubereats'];
$rappi = $res ['rappi'];
$i++;
	
echo"	

<form action='filiais-editar?acao=alterar&id=$id' method='post'>


<div id=\"formulario\">
<label for=\"nome\">Nome da Filial:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Nome da Filial</span>
</div></label>
<input type=\"text\" name=\"nome\" value=\"$nome\" class=\"form3\" required/>
</div>

	
<div id=\"formulario\">
<label for=\"cidade\">Cidade:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Cidade</span>
</div></label>
<input type=\"text\" name=\"cidade\" class=\"form3\" value=\"$cidade\" required/>
</div>
	
	
<div id=\"formulario\">
<label for=\"endereco\">Endereço:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Endereço Completo</span>
</div></label>
<input type=\"text\" name=\"endereco\" value=\"$endereco\" class=\"form3\" required/>
</div>
	
	

<div id=\"formulario\">
<label for=\"telefone\">Telefone:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Telefone Principal</span>
</div></label>
<input type=\"text\" name=\"telefone\" value=\"$telefone\" class=\"form3\" required/>
</div>


<div id=\"formulario\">
<label for=\"whatsapp\">Whatsapp: 
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Formato: 062988887777</span>
</div></label>
<input type=\"text\" name=\"whatsapp\" placeholder=\"Formato: 062988887777\" value=\"$whatsapp\" class=\"form3\" required/>
</div>




<div id=\"formulario\">
<label for=\"email\">E-mail:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">E-mail Principal</span>
</div></label>
<input type=\"text\" name=\"email\" class=\"form3\" value=\"$email\" required/>
</div>


<div id=\"grid12E\">
<label for=\"mapa\">Código Google Maps (Localização):
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Código Google Maps (Localização)</span>
</div></label>
<textarea class='form4' name='mapa'/>$mapa</textarea>
</div>	


	
<div id=\"grid12E\">
<label for=\"desc\">Descrição da Filial:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Descrição completa da Filiai</span>
</div></label>
<textarea class='form4' name='desc'/>$desc</textarea>
</div>	



<div class=\"alinha15\">VENDAS APPS</div>



<div id=\"formulario\">
<label for=\"ifood\">Link Ifood:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Link Ifood</span>
</div></label>
<input type=\"text\" name=\"ifood\" value=\"$ifood\" class=\"form3\" />
</div>


<div id=\"formulario\">
<label for=\"ubereats\">Link Uber Eats:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Link Uber Eats</span>
</div></label>
<input type=\"text\" name=\"ubereats\" value=\"$ubereats\" class=\"form3\" />
</div>
	

<div id=\"formulario\"> 
<label for=\"rappi\">Link Rappi:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Link Rappi</span>
</div></label>
<input type=\"text\" name=\"rappi\" value=\"$rappi\" class=\"form3\" />
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
$cidade = $_POST ['cidade'];
$nome = $_POST ['nome'];
$nome_slug = $_POST ['nome_slug'];
$desc = $_POST ['desc'];
$data_cadastro = $_POST ['data_cadastro'];
$endereco = $_POST ['endereco'];	
$telefone = $_POST ['telefone'];
$whatsapp = $_POST ['whatsapp'];
$email = $_POST ['email'];	
$mapa = addslashes($_POST['mapa']);
$ifood = $_POST ['ifood'];
$ubereats = $_POST ['ubereats'];
$rappi = $_POST ['rappi'];
	


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



$caminho = "<script language='javascript'>function alerta(){alert('Dados Alterados com Sucesso!'); }alerta();document.location='filiais';</script>";

$id = $_GET['id'];
$sql="UPDATE `filiais` SET
`cidade` =  '$cidade', 
`endereco` =  '$endereco',
`email` =  '$email',
`nome` =  '$nome',
`nome_slug` =  '$nome_slug',
`desc` =  '$desc',
`mapa` =  '$mapa',
`telefone` =  '$telefone',
`whatsapp` =  '$whatsapp',
`ifood` =  '$ifood',
`ubereats` =  '$ubereats',
`rappi` =  '$rappi'
 WHERE  `id` ='$id'; ";

if ($conn->query($sql) === TRUE) {

echo"$caminho";}

else{ echo "<script language='javascript'>function alerta(){alert('Erro Econtrado!');}alerta();document.location='javascript:history.go(-1)';</script>";

}}?>


</body>
</html>