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
<!--
<script type="text/javascript" src="nicEdit.js"></script>
<script type="text/javascript">
bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>	-->
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
<div class="painel-cliente-icone"><img src="img/icons/clientes.png" width="100%"/></div>
<div class="alinha14"><a href="noticias">EQUIPE</a> >> EDITAR</div></div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">
<div style="display: none"><a href="banner-filtro"><div class="painel-banner-botoes2"><img src="img/filtro.jpg" width="100%"/></div></a></div>
<div class="painel-banner-botoes1"><a href="equipe-cadastrar.php"><img src="img/novo.jpg" width="100%"/></a></div>
</div></div></div>

<div id="painel-cliente">



<div class="alinha15">IMAGEM DE CAPA</div>
<div class="cut3">	
<?php
$id =$_GET['id'];
$sql = "SELECT * FROM equipe WHERE id = $id";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){
$id = $res ['id'];
$imagem = $res ['imagem'];
	
echo"
<div style=\"width: 16%; background-color: ; float: left; padding: 10px;\">";

if ($imagem ==''){echo"<img src='avatar.jpg'  width='96%' border='0' >

<a href=\"equipe-editar-capa?&id=$id\">	
<div id=\"grid12\">
<div class=\"cadastrar\">
<input type=\"submit\" name=\"submit\" style=\"cursor:pointer\" class=\"cadastrar\" value=\"INSERIR IMAGEM\"/>
</div></div></a>";}

else {echo"<img src='../img2/equipe/$imagem' width='96%' border='0'>

<a href=\"equipe-editar-capa?&id=$id\">	
<div id=\"grid12\">
<div class=\"cadastrar\">
<input type=\"submit\" name=\"submit\" style=\"cursor:pointer\" class=\"cadastrar\" value=\"ALTERAR IMAGEM\">
</div></div></a>"; }  

echo"</div>";  }?>
</div>


<div class="alinha15" style="margin-top: 50px;">EDITAR PROFISSIONAL SELECIONADO</div>

<div class="cut1">
	
<?php
$id =$_GET['id'];
$sql = "SELECT * FROM equipe WHERE id = $id";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){

$id = $res ['id'];
$nome = $res ['nome'];
$nome_slug = $res ['nome_slug'];
$data_cadastro = $res ['data_cadastro'];
$numero_profissional = $res ['numero_profissional'];
$imagem = $res ['imagem'];	
$desc = $res ['desc'];	
$funcao = $res ['funcao'];
$categoria = $res ['categoria'];
$filial = $res ['filial'];	
$filial2 = $res ['filial2'];	
$filial3 = $res ['filial3'];
$classe = $res ['classe'];		
$link_linkedin = $res ['link_linkedin'];	
$link_instagram = $res ['link_instagram'];	
$posicao = $res ['posicao'];
$i++;
	
echo"	

<form action='equipe-editar?acao=alterar&id=$id' method='post'>

<div id=\"formulario\" style=\"display: none;\">
<label for=\"classe\">Classe:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Classe:</span>
</div></label>
<select name=\"classe\" class=\"form3\" required>
<option value=\"$classe\">$classe</option>
<option value=\"Sr.\">Sr.</option>
<option value=\"Sra.\">Sra.</option>
<option value=\"Dr.\">Dr.</option>
<option value=\"Dra.\">Dra.</option>
<option value=\"Me.\">Me.</option>
<option value=\"Ma.\">Ma.</option>
<option value=\"\">Nenhum</option>
</select></div>
	
<div id=\"formulario\">
<label for=\"nome\">Nome:</label>
<input type=\"text\" name=\"nome\" class=\"form3\" value=\"$nome\" required/>
</div>
	
<div id=\"formulario\">
<label for=\"funcao\">Função:</label>
<input type=\"text\" name=\"funcao\" value=\"$funcao\" class=\"form3\" />
</div>


<div id=\"formulario\" style=\"display: none;\">
<label for=\"numero_profissional\">Número Profissional:</label>
<input type=\"text\" name=\"numero_profissional\" value=\"$numero_profissional\" class=\"form3\"/>
</div>
	
<div id=\"formulario\" style=\"float: right;\">
<label for=\"categoria\">Categoria:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Categoria do Produto</span>
</div></label>
<select name=\"categoria\" class=\"form3\" required>
<option value=\"$categoria\">";
$sql3 = "SELECT * FROM categorias WHERE categoria_slug = '$categoria'";
$comando3 = mysqli_query($conn, $sql3);
while($res = mysqli_fetch_assoc($comando3)){
$id = $res['id'];
$categoriax= $res['categoria']; 
echo"$categoriax"; }
echo"</option> ";


$sql2 = "SELECT * FROM categorias WHERE tipo ='equipe' ORDER BY categoria ASC";
$comando2 = mysqli_query($conn, $sql2);
while($res = mysqli_fetch_assoc($comando2)){
$id = $res['id'];
$categoria= $res['categoria']; 
$categoria_slug= $res['categoria_slug']; 
echo"<option value=\"$categoria_slug\">$categoria</option> ";}
echo"
</select></div>


<div id=\"formulario\" style=\"display: none;\">
<label for=\"link_instagram\">Link Instagram</label>
<input type=\"text\" name=\"link_instagram\" value=\"$link_instagram\" class=\"form3\" readonly />
</div>


<div id=\"formulario\">
<label for=\"link_linkedin\">Link Linkedin</label>
<input type=\"text\" name=\"link_linkedin\" value=\"$link_linkedin\"  class=\"form3\" />
</div>


<div id=\"formulario\">
<label for=\"posicao\">Posição:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Posição de exibição do banner</span>
</div></label>
<select name=\"posicao\" class=\"form3\" required>
	<option value=\"$posicao\">$posicao</option>
	<option value=\"1\">1</option>
	<option value=\"2\">2</option>
	<option value=\"3\">3</option>
	<option value=\"4\">4</option>
	<option value=\"5\">5</option>
    <option value=\"6\">6</option>
	<option value=\"7\">7</option>
	<option value=\"8\">8</option>
	<option value=\"9\">9</option>
	<option value=\"10\">10</option>
</select>
</div>


<div id=\"formulario\" style=\"display: none;\">
<label for=\"filial\">Filial:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Filial do Profissional</span>
</div></label>
<select name=\"filial\" class=\"form3\" >
<option value=\"$filial\">$filial</option> ";
$sql3 = "SELECT * FROM filiais  ORDER BY nome ASC";
$comando3 = mysqli_query($conn, $sql3);
while($res = mysqli_fetch_assoc($comando3)){
$id = $res['id'];
$nome= $res['nome']; 
$nome_slug= $res['nome_slug']; 
echo"<option value=\"$nome_slug\">$nome</option> ";}
echo" <option value=\"\">Sem Filial</option> 
</select></div>



<div id=\"formulario\" style=\"display: none;\">
<label for=\"filial2\">Filial 2:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Filial do Profissional</span>
</div></label>
<select name=\"filial2\" class=\"form3\" >
<option value=\"$filial2\">$filial2</option> ";
$sql3 = "SELECT * FROM filiais  ORDER BY nome ASC";
$comando3 = mysqli_query($conn, $sql3);
while($res = mysqli_fetch_assoc($comando3)){
$id = $res['id'];
$nome= $res['nome']; 
$nome_slug= $res['nome_slug']; 
echo"<option value=\"$nome_slug\">$nome</option> ";}
echo"
<option value=\"\">Sem Filial</option> 
</select></div>


<div id=\"formulario\" style=\"display: none;\">
<label for=\"filial3\">Filial 3:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Filial do Profissional</span>
</div></label>
<select name=\"filial3\" class=\"form3\" >
<option value=\"$filial3\">$filial3</option> ";
$sql3 = "SELECT * FROM filiais  ORDER BY nome ASC";
$comando3 = mysqli_query($conn, $sql3);
while($res = mysqli_fetch_assoc($comando3)){
$id = $res['id'];
$nome= $res['nome']; 
$nome_slug= $res['nome_slug']; 
echo"<option value=\"$nome_slug\">$nome</option> ";}
echo"<option value=\"\">Sem Filial</option> 
</select></div>

	

<div id=\"grid12E\">
<label for=\"desc\">Apresentação:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Descrição completa da notícia</span>
</div></label>
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
$nome = $_POST ['nome'];
$funcao = $_POST ['funcao'];
$data_cadastro = $_POST ['data_cadastro'];
$imagem = $_POST ['imagem'];	
$desc = $_POST ['desc'];	
$filial = $_POST ['filial'];
$filial2 = $_POST ['filial2'];
$filial3 = $_POST ['filial3'];
$classe = $_POST ['classe'];
$numero_profissional = $_POST ['numero_profissional'];
$link_linkedin = $_POST ['link_linkedin'];	
$link_instagram = $_POST ['link_instagram'];	
$posicao = $_POST ['posicao'];	

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
		
		


$caminho = "<script language='javascript'>function alerta(){alert('Dados Alterados com Sucesso!'); }alerta();document.location='equipe';</script>";

$id = $_GET['id'];
$sql="UPDATE `equipe` SET
`nome` =  '$nome', 
`nome_slug` =  '$nome_slug',
`funcao` =  '$funcao',
`filial` =  '$filial',
`filial2` =  '$filial2',
`filial3` =  '$filial3',
`classe` =  '$classe',
`link_instagram` =  '$link_instagram',
`link_linkedin` =  '$link_linkedin',
`numero_profissional` =  '$numero_profissional',
`posicao` =  '$posicao',
`desc` =  '$desc'
 WHERE  `id` ='$id'; ";
 
if ($conn->query($sql) === TRUE) {

echo"$caminho";}

else{ echo "<script language='javascript'>function alerta(){alert('Erro Econtrado!');}alerta();document.location='javascript:history.go(-1)';</script>";

}}?>



</body>
</html>