<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php  include'head.php';
$diaatual = date('d');
$mesatual = date('m');	
$anoatual = date('20y');
$data_atual = date('d/m/20y');?>	
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
<div class="alinha14"><a href="contratante">CONTRATANTE</a> >> ARQUIVOS</div></div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">
<div style="display: none"><a href="banner-filtro"><div class="painel-banner-botoes2"><img src="img/filtro.jpg" width="100%"/></div></a></div>
<div style="display: none"><a href="produtos-categorias"><div class="painel-banner-botoes1"><img src="img/categorias.jpg" width="100%"/></div></a></div>
<a href="contratante-cadastrar"><div class="painel-banner-botoes1"><img src="img/novo.jpg" width="100%"/></div></a>
</div></div></div>

<div id="painel-cliente">
<div class="alinha15">CADASTRAR</div>
	
	
<?php

$acao = $_GET ['acao'];
if ($acao=="cadastrar") {
	
$nome = $_POST ['nome'];
$data_cadastro = $_POST ['data_cadastro'];	
	
		
$msg = false;
  if(isset($_FILES['arquivo'])){
    $extensao = strtolower(substr($_FILES['arquivo']['name'], -4)); //pega a extensao do arquivo
    $novo_nome = md5(time()) . $extensao; //define o nome do arquivo
    $diretorio = "../img2/contratante/"; //define o diretorio para onde enviaremos o arquivo
    move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome); //efetua o upload
	chmod ("../img2/contratante/$novo_nome", 0777);
  
$comando="INSERT INTO `contratante` (`id`, `nome`, `arquivo`, `data_cadastro`) 
                             VALUES (NULL, '$nome', '$novo_nome', '$data_cadastro');";

$executa= mysql_query($comando);

if ($executa)     {


echo "<script language='javascript'>
      function alerta(){
      alert('Arquivo cadastrado com sucesso!');
      }
      alerta();
      document.location='contratante';
      </script>";


}}}

?>

<form  action='contratante-cadastrar?acao=cadastrar' method='post' enctype='multipart/form-data'>
	

<div class="cut1">
	
<div id="formulario">
<label for="titulo">Nome do Arquivo:</label>
<input type="text" name="nome" class="form3" required/>
</div>
		
	
	
<div id="formulario">
<label for="data_cadastro">Data de Cadastro:</label>
<input type="text" name="data_cadastro" class="form3" value="<?php echo"$data_atual";?>" required readonly/>
</div>
		

<div id="formulario">
<label for="nome">Imagem:</label>
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Tamanho máximo 4MB</span>
</div>
<div class='input-wrapper'>
	<label for='input-file'>Selecionar um arquivo</label>	
<input id='input-file' type='file' name='arquivo'    class="form3"  required />
<span id='file-name'></span>
</div></div>
	

</div>	
	
<div id="grid12"><div class="cadastrar"><input type="submit" name="upload" style="cursor:pointer" class="cadastrar" value="CADASTRAR"/></div></div>
</div></div>
	
</form>
	



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