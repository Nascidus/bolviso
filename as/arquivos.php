<!doctype html>
<html>
<head>
<meta charset="UTF-8">
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
<div class="painel-cliente-icone"><img src="img/icons/fotos.png" width="100%"/></div>
<div class="alinha14"><a href="acompanhamento-obras">OBRAS >></a> ARQUIVOS</div></div></div>

</div>

<div id="painel-cliente">
<div class="alinha15">CADASTRAR</div>



<?php $post_id = $_GET['id']; echo"<form name='upload' action='arquivos?acao=cadastrar&id=$post_id' method='post' enctype='multipart/form-data'>"; ?>
	
	

<div class="cut1">


<div id="formulario">
<label for="categoria">Categoria:</label>
<select name="categoria" class="form3">
<option value="Logotipo">Logotipo</option>
<option value="Infraestrutura">Infraestrutura</option>
<option value="Local">Local</option>
<option value="Banner">Banner</option>
</select>
</div>
	
<input type="hidden" name="post_id" value="<?php $post_id = $_GET['id']; echo"$post_id"; ?>">


<div id="formulario">
<label for="nome">Imagem:</label>
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Selecione as imagens, limite máximo de 4MB!</span>
</div>

<div class='input-wrapper'>
<label for='input-file'>Selecionar um arquivo</label>	
<input id='input-file' type='file' name='imagem' multiple='true'   class="form3" accept="image/x-png, image/gif, image/jpeg , image/ico" required />
<span id='file-name'></span>
</div></div>
		

</div>	
	
<div id="grid12"><div class="cadastrar"><input type="submit" name="upload" style="cursor:pointer" class="cadastrar" value="CADASTRAR"/></div></div></form>







<div class="alinha15" style="margin-top: 50px;">LOGOTIPO</div>
<div style="width: 100%; float: left;">
<?php
$id_get = $_GET['id'];
$sql = "SELECT * FROM arquivos WHERE categoria = 'Logotipo' and post_id = '$id_get'";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){
$id = $res['id'];
$imagem = $res ['imagem'];
echo " 	
<a href='arquivos?acao=remove&id=$id' title=\"Remover Arquivo\" onclick=\"return confirm('Certeza que deseja excluir?');\">
<img src=\"../img2/arquivos/$imagem\" width=\"30%\"></a>";	}?></div>



<div class="alinha15" style="margin-top: 50px;"> INFRAESTRUTURA</div>
<div style="width: 100%; float: left;">
<?php
$id_get = $_GET['id'];
$sql = "SELECT * FROM arquivos WHERE categoria = 'Infraestrutura' and post_id = '$id_get'";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){
$id = $res['id'];
$imagem = $res ['imagem'];
echo " 	
<a href='arquivos?acao=remove&id=$id' title=\"Remover Arquivo\" onclick=\"return confirm('Certeza que deseja excluir?');\">
<img src=\"../img2/arquivos/$imagem\" width=\"10%\"></a>";	}?></div>



<div class="alinha15" style="margin-top: 50px;">LOCAL</div>
<div style="width: 100%; float: left;">
<?php
$id_get = $_GET['id'];
$sql = "SELECT * FROM arquivos WHERE categoria = 'Local' and post_id = '$id_get'";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){
$id = $res['id'];
$imagem = $res ['imagem'];
echo " 	
<a href='arquivos?acao=remove&id=$id' title=\"Remover Arquivo\" onclick=\"return confirm('Certeza que deseja excluir?');\">
<img src=\"../img2/arquivos/$imagem\" width=\"30%\"></a>";	}?></div>
	



<div class="alinha15" style="margin-top: 50px;">BANNER</div>
<div style="width: 100%; float: left;">
<?php
$id_get = $_GET['id'];
$sql = "SELECT * FROM arquivos WHERE categoria = 'Banner' and post_id = '$id_get'";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){
$id = $res['id'];
$imagem = $res ['imagem'];
echo " 	
<a href='arquivos?acao=remove&id=$id' title=\"Remover Arquivo\" onclick=\"return confirm('Certeza que deseja excluir?');\">
<img src=\"../img2/arquivos/$imagem\" width=\"30%\"></a>";	}?></div>
	


	
</div></div>	
	






	
	
	

<div id="sistemas-menu-lateral">
<div id="grid12"><div class="sistemas-marcador"><img src="img/marcador.png"/></div></div>
	<?php  include'menu-lateral.php';?>
</div></div></div>

<?php  include'menu-lateral-mobiles.php';?>




<?php



include 'conecta.php';

$acao = $_GET ['acao'];
if ($acao=="cadastrar") {

$id= $_POST['id'];
$imagem= $_POST['imagem'];
$categoria= $_POST['categoria'];
$post_id= $_POST['post_id'];

$dir = "../img2/arquivos";
$file = $_FILES["imagem"];
$img = $file['name'];
move_uploaded_file($file["tmp_name"], "$dir/".$file["name"]);


  
$sql="INSERT INTO `arquivos` ( `id` , `imagem`  , `categoria` , `post_id` )
VALUES (NULL ,  '$img' ,  '$categoria' ,  '$post_id')";
if ($conn->query($sql) === TRUE) {  
  
  echo"<BR><script language='javascript'>
      function alerta(){
      alert('Arquivo cadastrado com sucesso! ');
      }
      alerta();
      document.location='javascript:history.go(-1)';
      </script></b>";
  
    }}?>

	

	
	
<?php
$acao = $_GET['acao'];
$id = $_GET['id'];

if ($acao == 'remove'){

$sql = "DELETE FROM `arquivos` WHERE id = $id";
$comando = mysqli_query($conn, $sql);;

if ($conn->query($sql) === TRUE) {
echo "<script language='javascript'>function alerta(){alert('Removido com sucesso!'); }alerta();document.location='javascript:history.go(-1)';</script>";
}}?>


	
	
<script>
var $input    = document.getElementById('input-file'),
    $fileName = document.getElementById('file-name');

$input.addEventListener('change', function(){
  $fileName.textContent = this.value;
});
</script>
	

	


</body>
</html>