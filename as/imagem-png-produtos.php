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
<div class="painel-cliente-icone"><img src="img/icons/produtos.png" width="100%"/></div>
<div class="alinha14"><a href="produtos">PRODUTOS</a> >> CADASTRAR FOTOS</div></div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">	
<div style="display: none"><a href="produtos-filtro"><div class="painel-banner-botoes2"><img src="img/filtro.jpg" width="100%"/></div></a></div>
<a href="produtos-categorias"><div class="painel-banner-botoes1"><img src="img/categorias.jpg" width="100%"/></div></a>
<a href="produtos-cadastrar"><div class="painel-banner-botoes1"><a href="produtos-cadastrar"><img src="img/novo.jpg" width="100%"/></a></div></a>
</div></div></div>

<div id="painel-cliente">
<div class="alinha15">CADASTRAR</div>
	
	
<?php

$post_id = $_GET['id'];

include 'conecta.php';

$acao = $_GET ['acao'];
if ($acao=="cadastrar") {

$id= $_POST['id'];
$imagem= $_POST['imagem'];
$tipo= $_POST['tipo'];


$dir = "../img2/produtos_png";
$file = $_FILES["imagem"];
$img = $file['name'];
move_uploaded_file($file["tmp_name"], "$dir/".$file["name"]);


  
$sql="INSERT INTO `imagem_png` ( `id` , `imagem`  , `tipo` , `post_id` )
VALUES (NULL ,  '$img' ,  'Produtos' ,  '$post_id')";
if ($conn->query($sql) === TRUE) {  
  
  echo"<BR><script language='javascript'>
      function alerta(){
      alert('Imagem cadastrada com sucesso! ');
      }
      alerta();
      document.location='javascript:history.go(-1)';
      </script></b>";
  
    }}?>

	




<?php $post_id = $_GET['id']; echo"<form name='upload' action='imagem-png-produtos?acao=cadastrar&id=$post_id' method='post' enctype='multipart/form-data'>"; ?>
	
	

<div class="cut1">


<div id="formulario">
<label for="nome">Imagem:</label>
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Selecione as imagens, limite máximo de 4MB todas imagens somadas!</span>
</div>
<div class='input-wrapper'>
	<label for='input-file'>Selecionar um arquivo</label>	
<input id='input-file' type='file' name='imagem' multiple='true'   class="form3" accept="image/x-png, image/gif, image/jpeg , image/ico" required />
<span id='file-name'></span>
</div></div>
		
	
<input type='hidden'  name='post_id' size='30' value='<?php   echo"$id";  ?>' class='form'/>	
<input type='hidden'  name='tipo' size='30' value='Produtos' class='form'/>	
		

</div>	
	
<div id="grid12"><div class="cadastrar"><input type="submit" name="upload" style="cursor:pointer" class="cadastrar" value="CADASTRAR"/></div></div></form>

	
	

<div class="alinha15" style="margin-top: 40px; border-top: 1px solid #ccc; padding-top: 40px;">EXCLUIR</div>	
	
<div class="cut1">
<?php

$id= $_GET['id'];
$sql = "SELECT * FROM imagem_png WHERE '$id' = post_id";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){

$id=$res['id'];
$postid=$res['postid'];
$imagem=$res['imagem'];
	
echo"<form name='excluir' method='POST' action='imagem-png-produtos?acao=remove2&id=$id&postid=$postid'>";


echo"
<div id=grid3><input type='checkbox' name='cod[]' value='$id'><br />
<a href='imagem-png-produtos?acao=remove&id=$id&postid=$postid'><img src='../img2/produtos_png/$imagem' title='Clique na imagem para excluir' border=0 width='100%' >
</a></div>";
	
}?>
</div>	
	
	
<div id="grid12"><div class="cadastrar"><input type="submit"  style="cursor:pointer" class="cadastrar" value="APAGAR"/></div></div></form>
	
</div></div>	
	
	
	
<?php
$acao = $_GET['acao'];
$id = $_GET['id'];

if ($acao == 'remove'){

$sql = "DELETE FROM `imagem_png` WHERE id = $id";
$comando = mysqli_query($conn, $sql);;

if ($conn->query($sql) === TRUE) {
echo "<script language='javascript'>function alerta(){alert('Removido com sucesso!'); }alerta();document.location='javascript:history.go(-1)';</script>";
}}?>

	
	
	

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