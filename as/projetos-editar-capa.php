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

<div class="center"><div class="clearfix">
<div id="sistemas-infos">
<div id="painel-banner">
<div id="painel-banner-padding">
<div id="grid12">
<div class="painel-cliente-icone"><img src="img/icons/projetos.png" width="100%"/></div>
<div class="alinha14"><a href="javascript:history.go(-1)">VOLTAR >> </a> >> EDITAR CAPA</div></div></div>
</div>


<div id="painel-cliente">
<div class="alinha15">IMAGEM DE CAPA</div>


<?php

$id = $_GET['id'];
$sql = "SELECT * FROM projetos WHERE id = '$id'";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){

$id = $res['id'];
$nome= $res['nome'];
$categoria= $res['categoria'];
$imagem= $res['imagem'];
$destaque= $res['destaque'];

if ($imagem ==''){echo"
<form action='projetos-editar-capa.php?acao=alterarx&id=$id' method='post'  enctype='multipart/form-data'>
<div style=\"float: left;\">
<img src='avatar.jpg'  width='30%' border='0' ></div>

<div id=\"formulario\">	
<label for=\"nome\">Imagem:</label>
<span class=\"tooltiptext\">Tamanho da Imagem 940px X 370px</span>
<div class='input-wrapper'>
	<label for='input-file'>Selecionar um arquivo</label>	

<input id='input-file' type='file' name='imagem'    class=\"form2\" accept=\"image/x-png, image/gif, image/jpeg , image/ico\" />
<span id='file-name'></span></div></div>

<div id=\"grid12\" style=\"margin-top: 30px;\"><div class=\"cadastrar\"><input type=\"submit\" name=\"upload\" style=\"cursor:pointer\"  class=\"cadastrar\" value=\"CADASTRAR\"/></div></div>

</form>
";}



else {  echo"
<form action='projetos-editar-capa.php?acao=alterar1&id=$id' method='post'  enctype='multipart/form-data'>

<img src='../img2/projetos/$imagem' width='50%' border='0'> <br><br>

<div id=\"grid12\" style=\"margin-top: 30px;\"><div class=\"cadastrar\"><input type=\"submit\" name=\"upload\" style=\"cursor:pointer\"  class=\"cadastrar\" value=\"APAGAR IMAGEM\"/></div></div>
</form>
"; }}

?>


</div></div>

<div id="sistemas-menu-lateral">
<div id="grid12"><div class="sistemas-marcador"><img src="img/marcador.png"/></div></div>
	<?php  include'menu-lateral.php';?>
</div></div></div>


<?php  include'menu-lateral-mobiles.php';?>
	
	
<?php

$acao = $_GET ['acao'];
$id = $_GET['id'];
if ($acao=="alterarx") {
$imagem= $_POST['imagem'];	

$msg = false;
  if(isset($_FILES['imagem'])){
    $extensao = strtolower(substr($_FILES['imagem']['name'], -4)); //pega a extensao do arquivo
    $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
    $diretorio = "../img2/projetos/"; //define o diretorio para onde enviaremos o arquivo
    move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$novo_nome); //efetua o upload
	chmod ("../img2/equipe/$novo_nome", 0777);
  
$sql="UPDATE  `projetos` SET  `imagem` =  '$novo_nome' WHERE  `id` ='$id'";

if ($conn->query($sql) === TRUE) {  
  
  echo"<script language='javascript'>function alerta(){alert('Imagem cadastrada com sucesso! ');}
      alerta();document.location='javascript:history.go(-1)';</script></b>";}}}

?>
		



<?php

$acao = $_GET['acao'];
$id = $_GET['id'];
if ($acao == 'alterar1'){

$caminho = "<script language='javascript'>
      function alerta(){alert('Imagem Deletada!');}
      alerta();document.location='javascript:history.go(-1)';</script>";
      $id = $_GET['id'];
      $sql="UPDATE  `projetos` SET `imagem` =  ''  WHERE  `id` ='$id';";

if ($conn->query($sql) === TRUE) {

echo"$caminho";}

else{ echo "<script language='javascript'>function alerta(){alert('Erro Econtrado!');}alerta();document.location='javascript:history.go(-1)';</script>";

}}?>



<?php

$acao = $_GET['acao'];
$id = $_GET['id'];
if ($acao == 'alterar1'){

$caminho = "<script language='javascript'>
      function alerta(){alert('Imagem Deletada!');}
      alerta();document.location='javascript:history.go(-1)';</script>";
      $id = $_GET['id'];
      $sql="UPDATE  `projetos` SET `imagem` =  ''  WHERE  `id` ='$id';";

if ($conn->query($sql) === TRUE) {

echo"$caminho";}

else{ echo "<script language='javascript'>function alerta(){alert('Erro Econtrado!');}alerta();document.location='javascript:history.go(-1)';</script>";

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