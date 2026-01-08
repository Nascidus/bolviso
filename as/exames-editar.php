<?php session_start(); if((!isset($_SESSION[login])) AND (!isset($_SESSION[senha])))Header("Location: index.php?erro=logar");
$login = $_SESSION['login'];
$senha = $_SESSION['senha'];  
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<?php  include'head.php';?>
	<script type="text/javascript" src="nicEdit.js"></script>
<script type="text/javascript">
bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>
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
<div class="painel-cliente-icone"><img src="img/icons/exames.png" width="100%"/></div>
<div class="alinha14"><a href="exames">EXAMES</a> >> CADASTRAR</div></div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">
<div style="display: none"><a href="banner-filtro"><div class="painel-banner-botoes2"><img src="img/filtro.jpg" width="100%"/></div></a></div>
<a href="exames-categorias"><div class="painel-banner-botoes1"><img src="img/categorias.jpg" width="100%"/></div></a>
<a href="exames-cadastrar"><div class="painel-banner-botoes1"><img src="img/novo.jpg" width="100%"/></div></a>
</div></div></div>

<div id="painel-cliente">



<div class="alinha15">IMAGEM DE CAPA</div>
<div class="cut3">	
<?php
$id =$_GET['id'];
$sql = "SELECT * FROM exames WHERE id = $id";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){
$id = $res ['id'];
$imagem = $res ['imagem'];
	
echo"
<div style=\"width: 16%; background-color: ; float: left; padding: 10px;\">";

if ($imagem ==''){echo"<img src='avatar.jpg'  width='96%' border='0' >

<a href=\"exames-editar-capa?&id=$id\">	
<div id=\"grid12\">
<div class=\"cadastrar\">
<input type=\"submit\" name=\"submit\" style=\"cursor:pointer\" class=\"cadastrar\" value=\"INSERIR IMAGEM\"/>
</div></div></a>";}

else {echo"<img src='../img2/exames/$imagem' width='96%' border='0'>

<a href=\"exames-editar-capa?&id=$id\">	
<div id=\"grid12\">
<div class=\"cadastrar\">
<input type=\"submit\" name=\"submit\" style=\"cursor:pointer\" class=\"cadastrar\" value=\"ALTERAR IMAGEM\">
</div></div></a>"; }  

echo"</div>";  }?>
</div>




<div class="alinha15" style="margin-top: 50px;">EDITAR EXAME SELECIONADO</div>

<div class="cut1">
	
<?php
$id =$_GET['id'];
$sql = "SELECT * FROM exames WHERE id = $id";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){

$id = $res ['id'];
$titulo = $res ['titulo'];
$titulo_slug = $res ['titulo_slug'];
$data_cadastro = $res ['data_cadastro'];	
$desc = $res ['desc'];
$posicao = $res ['posicao'];
$filial_bueno = $res ['filial_bueno'];
$filial_universitario = $res ['filial_universitario'];
$filial_anapolis = $res ['filial_anapolis'];
$filial_1 = $res ['filial_1'];
$icone = $res ['icone'];


		
$i++;
	
echo"	

<form action='exames-editar?acao=alterar&id=$id' method='post'>

	
<div id=\"formulario\">
<label for=\"titulo\">Título:</label>
<input type=\"text\" name=\"titulo\" class=\"form3\" value=\"$titulo\" required/>
</div>
	
	

<div id=\"formulario\">
<label for=\"filial_bueno\">Filial Bueno:</label>
<select name=\"filial_bueno\" class=\"form3\" required>
<option value=\"$filial_bueno\">$filial_bueno</option>
<option value=\"Sim\">Sim</option>
<option value=\"Não\">Não</option>
</select></div>



<div id=\"formulario\">
<label for=\"filial_universitario\">Filial Universitário:
</label>
<select name=\"filial_universitario\" class=\"form3\" required>
<option value=\"$filial_universitario\">$filial_universitario</option>
<option value=\"Sim\">Sim</option>
<option value=\"Não\">Não</option>
</select></div>



<div id=\"formulario\">
<label for=\"filial_anapolis\">Filial Anápolis:
</label>
<select name=\"filial_anapolis\" class=\"form3\" required>
<option value=\"$filial_anapolis\">$filial_anapolis</option>
<option value=\"Sim\">Sim</option>
<option value=\"Não\">Não</option>
</select></div>


	

<div id=\"grid12E\">
<label for=\"desc\">Descrição do Exame:
</label>
<textarea class='form4' name='desc'/>$desc</textarea>
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
$titulo = $_POST ['titulo'];
$titulo_slug = $_POST ['titulo_slug'];
$data_cadastro = $_POST ['data_cadastro'];	
$desc = $_POST ['desc'];
$posicao = $_POST ['posicao'];
$filial_bueno = $_POST ['filial_bueno'];
$filial_universitario = $_POST ['filial_universitario'];
$filial_anapolis = $_POST ['filial_anapolis'];
$filial_1 = $_POST ['filial_1'];
$icone = $_POST ['icone'];
		
		


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

$titulo_slug = toAscii($titulo);


$caminho = "<script language='javascript'>function alerta(){alert('Dados Alterados com Sucesso!'); }alerta();document.location='exames';</script>";

$id = $_GET['id'];
$sql="UPDATE `exames` SET
`titulo` =  '$titulo', 
`titulo_slug` =  '$titulo_slug', 
`posicao` =  '$posicao',
`filial_bueno` =  '$filial_bueno',
`filial_universitario` =  '$filial_universitario',
`filial_anapolis` =  '$filial_anapolis',
`filial_1` =  '$filial_1',
`desc` =  '$desc'
 WHERE  `id` ='$id'; ";
 
if ($conn->query($sql) === TRUE) {

echo"$caminho";}

else{ echo "<script language='javascript'>function alerta(){alert('Erro Econtrado!');}alerta();document.location='javascript:history.go(-1)';</script>";

}}?>



</body>
</html>