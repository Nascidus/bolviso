<?php
session_start();
if((!isset($_SESSION['login']))
AND (!isset($_SESSION['senha'])))
Header("Location: index.php?erro=logar");
$login = $_SESSION['login'];
$senha = $_SESSION['senha'];  
?><!doctype html>
<html>
<head>
	<?php  include'head.php'; include'verifica.php'; include'conecta.php'; 
	$server = $_SERVER['SERVER_NAME'];
    $endereco = $_SERVER ['REQUEST_URI'];?>
</head>

<body>
<?php  include'topo-mobile.php';?>

<?php  include'topo.php';?>	

<?php  include'menu-lateral-mobiles.php';?>

<div class="center"><div class="clearfix">

<div id="sistemas-infos"><div id="grid12">
<div class="dados-de-acesso-logo"><img src="img/icons/imagens.png" width="100%"/></div>
<div class="alinha6">IMAGENS FIXAS</div>
</div>
	
<form id="upload" name="upload" method="post" enctype="multipart/form-data" action="imagens-fixas.php?acao=cadastrar">
	
<div id="selecionar-imagem">
<label for="nome">Imagem:</label>

<label for='input-file'>Selecionar um arquivo</label>
	
<div class='input-wrapper'>
<input id='input-file' type='file' name="imgname"  accept="image/x-png, image/gif, image/jpeg , image/ico" />
<span id='file-name'></span>
</div></div>

<div id="selecionar-imagem">
<label for="categoria">Categoria:</label>
	<select name="categoria" class="form2" required>
	<option value="">Categoria:</option>
	<option value="logotipo_principal">Logotipo Principal</option>
	<option value="logotipo_secundario">Logotipo Secundário</option>
	<option value="background_principal">Background Principal</option>
	<option value="background_secundario">Background Secundário</option>
	<option value="icone_facebook">Ícone Facebook</option>
	<option value="icone_instagram">Ícone Instagram</option>
	<option value="icone_youtube">Ícone Youtube</option>        
	<option value="icone_twitter">Ícone Twitter</option>
	<option value="icone_linkedin">Ícone Linkedin</option>	
	<option value="icone_whatsapp">Ícone WhatsApp</option>
	<option value="icone_telefone">Ícone Telefone</option>
	<option value="icone_endereco">Ícone Endereço</option>
    <option value="favicon_ico">Favicon ICO</option>
    <option value="favicon_png">Favicon PNG</option>
    <option value="outras_imagens">Outras Imagens</option>
</select>
</div>
		

<div id="selecionar-imagem"><div id="grid12C">
<div class="botaocadastrar"><input type="submit" name="upload" style="cursor:pointer" class="botaocadastrar" value="CADASTRAR"/></div>
	</div></div> </form> 
	
	

<?php

$acao = $_GET ['acao'];
if ($acao=="cadastrar") {
	
	
$categoria= $_POST['categoria'];	
$msg = false;
  if(isset($_FILES['imgname'])){
    $extensao = strtolower(substr($_FILES['imgname']['name'], -4)); //pega a extensao do arquivo
    $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
    $diretorio = "../img2/img_adm/"; //define o diretorio para onde enviaremos o arquivo
    move_uploaded_file($_FILES['imgname']['tmp_name'], $diretorio.$novo_nome); //efetua o upload
	chmod ("../img2/img_adm/$novo_nome", 0777);
  
$sql="INSERT INTO `img_adm` ( `id` , `categoria` , `imgname` )
VALUES (NULL , '$categoria', '$novo_nome' )";


if ($conn->query($sql) === TRUE) {  
  
  echo"<BR><script language='javascript'>
      function alerta(){
      alert('Imagem cadastrada com sucesso! ');
      }
      alerta();
      document.location='javascript:history.go(-1)';
      </script></b>";


}}}

?>
		
	
	

<div id="imagens-fixas">
<!-- ::::::::: CATEGORIAS ::::::::: -->
<div class="alinha11">LOGOTIPOS</div>
<div id="grid12"><div class="cut2">
	
		   	
<?php
$sql = "SELECT * FROM img_adm WHERE categoria ='logotipo_principal' or categoria ='logotipo_secundario'   ";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){	
$id = $res['id'];	$imgname= $res['imgname']; 	
echo"
<div id=\"imagens-fixas-qdro\"><div id=\"imagens-fixas-cinza\">
<div class=\"imagens-fixas-img\">
<div id=\"imagens-fixas-center\"><img src=\"../img2/img_adm/$imgname\" width=\"100%\"/></div>
</div></div>
<div id=\"grid12\"><div class=\"imagens-fixas-excluir\">
<a href='imagens-fixas.php?acao=excluir&id=$id&imgname=$imgname' onClick=\"return confirm('Tem certeza que deseja excluir esse registro ?')\"><img src=\"img/excluir.png\"/></a>
</div></div>
</div>"; }?>

	

</div></div>


<!-- ::::::::: CATEGORIAS ::::::::: -->
<div class="alinha11">BACKGROUNDS</div>
<div id="grid12"><div class="cut2">

<?php
$sql = "SELECT * FROM img_adm WHERE categoria ='background_principal' or categoria ='background_secundario'   ";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){
$id = $res['id'];	$imgname= $res['imgname']; 	
echo"
<div id=\"imagens-fixas-qdro\"><div id=\"imagens-fixas-cinza\">
<div class=\"imagens-fixas-img\">
<div id=\"imagens-fixas-center\"><img src=\"../img2/img_adm/$imgname\" width=\"100%\"/></div>
</div></div>
<div id=\"grid12\"><div class=\"imagens-fixas-excluir\">
<a href='imagens-fixas.php?acao=excluir&id=$id&imgname=$imgname' onClick=\"return confirm('Tem certeza que deseja excluir esse registro ?')\"><img src=\"img/excluir.png\"/></a>
</div></div>
</div>"; }?>

</div></div>

<!-- ::::::::: CATEGORIAS ::::::::: -->
<div class="alinha11">ÍCONES REDES SOCIAIS</div>
<div id="grid12"><div class="cut2">


<?php
$sql = "SELECT * FROM img_adm WHERE categoria ='icone_facebook' or categoria ='icone_instagram'  or categoria ='icone_twitter' or categoria ='icone_youtube' or categoria ='icone_whatsapp' or categoria ='icone_linkedin' ";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){
$id = $res['id'];	$imgname= $res['imgname']; 	
echo"
<div id=\"imagens-fixas-qdro\"><div id=\"imagens-fixas-cinza\">
<div class=\"imagens-fixas-img\">
<div id=\"imagens-fixas-center\"><img src=\"../img2/img_adm/$imgname\" width=\"100%\"/></div>
</div></div>
<div id=\"grid12\"><div class=\"imagens-fixas-excluir\">
<a href='imagens-fixas.php?acao=excluir&id=$id&imgname=$imgname' onClick=\"return confirm('Tem certeza que deseja excluir esse registro ?')\"><img src=\"img/excluir.png\"/></a>
</div></div>
</div>"; }?>

</div></div>

<!-- ::::::::: CATEGORIAS ::::::::: -->
<div class="alinha11">FAVICON</div>
<div id="grid12"><div class="cut2">

<?php
$sql = "SELECT * FROM img_adm WHERE categoria ='favicon_ico' or categoria ='favicon_png'   ";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){	
$id = $res['id'];	$imgname= $res['imgname']; 	
echo"
<div id=\"imagens-fixas-qdro\"><div id=\"imagens-fixas-cinza\">
<div class=\"imagens-fixas-img\">
<div id=\"imagens-fixas-center\"><img src=\"../img2/img_adm/$imgname\" width=\"100%\"/></div>
</div></div>
<div id=\"grid12\"><div class=\"imagens-fixas-excluir\">
<a href='imagens-fixas.php?acao=excluir&id=$id&imgname=$imgname' onClick=\"return confirm('Tem certeza que deseja excluir esse registro ?')\"><img src=\"img/excluir.png\"/></a>
</div></div>
</div>"; }?>

</div></div>

<!-- ::::::::: CATEGORIAS ::::::::: -->
<div class="alinha11">OUTRAS IMAGENS</div>
<div id="grid12"><div class="cut2">

<?php
$sql = "SELECT * FROM img_adm WHERE categoria ='outras_imagens'   ";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){
$id = $res['id'];	$imgname= $res['imgname']; 	
echo"
<div id=\"imagens-fixas-qdro\"><div id=\"imagens-fixas-cinza\">
<div class=\"imagens-fixas-img\">
<div id=\"imagens-fixas-center\"><img src=\"../img2/img_adm/$imgname\" width=\"100%\"/></div>
</div></div>
<div id=\"grid12\"><div class=\"imagens-fixas-excluir\">
<a href='imagens-fixas.php?acao=excluir&id=$id&imgname=$imgname' onClick=\"return confirm('Tem certeza que deseja excluir esse registro ?')\"><img src=\"img/excluir.png\"/></a>
</div></div>
</div>"; }?>

</div></div></div></div>
<div id="sistemas-menu-lateral">
<div id="grid12"><div class="sistemas-marcador"><img src="img/marcador.png"/></div></div>
	<?php  include'menu-lateral.php';?>
</div></div></div>
	



<?php
$acao = $_GET['acao'];
$id = $_GET['id'];
if ($acao == 'excluir'){
$sql = "DELETE FROM `img_adm` WHERE id = $id";
$comando = mysqli_query($conn, $sql);;

if ($conn->query($sql) === TRUE) {
echo "<script language='javascript'>function alerta(){alert('Removido com sucesso!'); }alerta();document.location='javascript:history.go(-1)';</script>";
}}?>




</body>
</html>



<script>
var $input    = document.getElementById('input-file'),
    $fileName = document.getElementById('file-name');

$input.addEventListener('change', function(){
  $fileName.textContent = this.value;
});
</script>