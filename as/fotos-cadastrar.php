<?php session_start(); if((!isset($_SESSION[login])) AND (!isset($_SESSION[senha])))Header("Location: index.php?erro=logar");
$login = $_SESSION['login'];
$senha = $_SESSION['senha'];  
?><!doctype html>
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
<div class="alinha14"><a href="fotos">FOTOS</a> >> CADASTRAR GALERIA</div></div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">
<div style="display: none"><a href="banner-filtro"><div class="painel-banner-botoes2"><img src="img/filtro.jpg" width="100%"/></div></a></div>
<div style="display: none"><a href="produtos-categorias"><div class="painel-banner-botoes1"><img src="img/categorias.jpg" width="100%"/></div></a></div>
<a href="noticias-cadastrar"><div class="painel-banner-botoes1"><img src="img/novo.jpg" width="100%"/></div></a>
</div></div></div>

<div id="painel-cliente">
<div class="alinha15">CADASTRAR</div>
	
	
	
<?php 

$acao = $_GET ['acao'];
if ($acao=='cadastrar'){    
    
$id = $_POST ['id'];
$titulo = $_POST ['titulo'];
$local = $_POST ['local'];
$data_cadastro = $_POST ['data_cadastro'];
$imagem = $_POST ['imagem'];	
$desc = $_POST ['desc'];	
		
	
$pasta = '../img2/capa_galeria';
$permitido = array('image/jpg', 'image/jpeg', 'image/pjpeg');	
$img = $_FILES['img'];
$countImg  = count($img['name']);

require('upload_func.php');		
for($i=0;$i<$countImg;$i++){
	
$tmp = $img['tmp_name'][$i];
$name = $img ['name'][$i];
$type = $img ['type'][$i];

if(!empty($name) && in_array($type, $permitido)){
$nome_imagem = 'asweb-' .md5(uniqid(rand(), true)).$i.'.jpg';
upload($tmp, $nome_imagem, 2000, $pasta);
chmod ("../img2/capa_galeria/$nome_imagem", 0777);
		 
$sql = "INSERT INTO `fotos` (`id`, `titulo`, `local`, `imagem`, `desc`, `data_cadastro`) 
                     VALUES (NULL, '$titulo', '$local', '$nome_imagem', '$desc', '$data_cadastro');";
	

if ($conn->query($sql) === TRUE) {  
  
  echo"<BR><script language='javascript'>
      function alerta(){
      alert('Galeria cadastrada com sucesso! ');
      }
      alerta();
      document.location='javascript:history.go(-2)';
      </script></b>";
	
}

	if ($type!=''){echo "<div id='notas'>Tipo de arquivo não aceito, favor enviar arquivos JPG</div>";}
if ($nome_imagem==''){echo "<div id='notas'>Favor, escolha uma imagem para poder realizar o cadastro</div>";}
		
}}}?>

<form  action='fotos-cadastrar?acao=cadastrar' method='post' enctype='multipart/form-data'>
	

<div class="cut1">
	
<div id="formulario">
<label for="titulo">Título da Galeria:</label>
<input type="text" name="titulo" class="form3" required/>
</div>
	
	
<div id="formulario">
<label for="local">Local:</label>
<input type="text" name="local" class="form3" required/>
</div>
	
	
<div id="formulario">
<label for="data_cadastro">Data da Galeria:</label>
<input type="text" name="data_cadastro" class="form3" value="<?php echo"$data_atual";?>" required/>
</div>
		

<div id="formulario">
<label for="nome">Imagem:</label>
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Tamanho da Imagem 0x0px</span>
</div>
<div class='input-wrapper'>
	<label for='input-file'>Selecionar um arquivo</label>	
<input id='input-file' type='file' name='img[]'    class="form3" accept="image/x-png, image/gif, image/jpeg , image/ico" required />
<span id='file-name'></span>
</div></div>
	

<div id="grid12E">
<label for="desc">Descrição da Galeria:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Descrição completa da Galeria</span>
</div></label>
<textarea class='form4' name='desc'/></textarea>
</div>	
	

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