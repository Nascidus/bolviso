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
<div class="painel-cliente-icone"><img src="img/icons/servicos.png" width="100%"/></div>
<div class="alinha14"><a href="filiais">SERVIÇOS</a> >> CADASTRAR FOTOS</div></div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">


<?php
$id= $_GET['id'];
$sql = "SELECT * FROM servicos WHERE id = '$id'";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){
$id=$res['id'];

echo"<a href=\"fotos-servicos-sequencia?id=$id\"><div class=\"painel-banner-botoes2\"><img src=\"img/reorder.png\" width=\"100%\"/></div></a>";}?>

</div></div></div>

<div id="painel-cliente">
<div class="alinha15">CADASTRAR</div>
	
	
	
<?php  

$id = $_GET['id'];
if(isset($_POST['upload'])){	
	
$pasta = '../img2/fotos_servicos';
$permitido = array('image/jpg', 'image/jpeg', 'image/pjpeg');	
$img = $_FILES['img'];
$countImg  = count($img['name']);

require('upload_func.php');	
	
for($i=0;$i<$countImg;$i++){
	
$postid = $_POST['postid'];

$tmp = $img['tmp_name'][$i];
$name = $img ['name'][$i];
$type = $img ['type'][$i];


if(!empty($name) && in_array($type, $permitido)){
	$nome_imagem = 'asweb-' .md5(uniqid(rand(), true)).$i.'.jpg';
	upload($tmp, $nome_imagem, 1400, $pasta);
	
	
$sql = "INSERT INTO fotos_servicos (postid, `imagem` )
VALUES ('$postid','$nome_imagem')";


if ($conn->query($sql) === TRUE) {  
  
  echo"<BR><script language='javascript'>
      function alerta(){
      alert('Fotos Cadastradas com Sucesso! ');
      }
      alerta();
      document.location='javascript:history.go(-1)';
      </script></b>";
	
}

	if ($type!=''){echo "<div id='notas'>Tipo de arquivo não aceito, favor enviar arquivos JPG</div>";}
if ($nome_imagem==''){echo "<div id='notas'>Favor, escolha uma imagem para poder realizar o cadastro</div>";}
		
}}}?>





<?php echo"<form name='upload' action='servicos-fotos.php?id=$id' method='post' enctype='multipart/form-data'>"; ?>
	
	

<div class="cut1">


<div id="formulario">
<label for="nome">Imagem:</label>
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Selecione as imagens, limite máximo de 4MB todas imagens somadas!</span>
</div>
<div class='input-wrapper'>
	<label for='input-file'>Selecionar um arquivo</label>	
<input id='input-file' type='file' name='img[]' multiple='true'   class="form3" accept="image/x-png, image/gif, image/jpeg , image/ico" required />
<span id='file-name'></span>
</div></div>
		
	
<input type='hidden'  name='postid' size='30' value='<?php   echo"$id";  ?>' class='form'/>	
	

</div>	
	
<div id="grid12"><div class="cadastrar"><input type="submit" name="upload" style="cursor:pointer" class="cadastrar" value="CADASTRAR"/></div></div></form>

	
	

<div class="alinha15" style="margin-top: 40px; border-top: 1px solid #ccc; padding-top: 40px;">EXCLUIR</div>	
	
<div class="cut1">
<?php

$id= $_GET['id'];
$sql = "SELECT * FROM fotos_servicos WHERE postid = '$id' ORDER BY posicao ASC";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){

$id=$res['id'];
$postid=$res['postid'];
$imagem=$res['imagem'];
	
echo"<form name='excluir' method='POST' action='servicos-fotos.php?acao=remove2&id=$id&postid=$postid'>";


echo"
<div id=grid3><input type='checkbox' name='cod[]' value='$id'><br />
<a href='servicos-fotos.php?acao=remove&id=$id&postid=$postid'><img src='../img2/fotos_servicos/$imagem' title='Clique na imagem para excluir' border=0 width='100%' >
</a></div>";
	
}?>
</div>	
	
	
<div id="grid12"><div class="cadastrar"><input type="submit"  style="cursor:pointer" class="cadastrar" value="APAGAR"/></div></div></form>
	
</div></div>	
	
	
<?php
$acao = $_GET['acao'];
$id = $_GET['id'];
if ($acao == 'remove'){
$sql = "DELETE FROM `fotos_servicos` WHERE id = $id";
$comando = mysqli_query($conn, $sql);;

if ($conn->query($sql) === TRUE) {
echo "<script language='javascript'>function alerta(){alert('Removido com sucesso!'); }alerta();document.location='javascript:history.go(-1)';</script>";
}}?>

	






	
<?php

$acao = $_GET['acao'];
$postid = $_GET['postid'];
$id = $_GET['id'];
$cod = $_GET['cod'];
$cod = $_POST['cod'];
if ($acao == 'remove2')

{if($cod ==""){
echo "É necessário escolher alguma imagem!<br>"; echo "<a href='javascript: history.back();'>Voltar</a>";}

else {
$opcoes = $_POST['cod'];	
$opcoes_text = implode(", ", $opcoes);

$sql = "DELETE FROM fotos_filiais WHERE id in (" . $opcoes_text . ")";
$comando = mysqli_query($conn, $sql);;


 echo "<script language='javascript'>function alerta(){alert('Removido com sucesso!'); }alerta();document.location='filiais-fotos?id=$postid';
      </script>"; }}?>
	
	
	
	
	

<div id="sistemas-menu-lateral">
<div id="grid12"><div class="sistemas-marcador"><img src="img/marcador.png"/></div></div>
	<?php  include'menu-lateral.php';?>
</div></div></div>

<?php  include'menu-lateral-mobiles.php';?>
	
	
<script>
var $input    = document.getElementById('input-file'),
    $fileName = document.getElementById('file-name');

$input.addEventListener('change', function(){
  $fileName.textContent = this.value;
});
</script>
	

	


</body>
</html>