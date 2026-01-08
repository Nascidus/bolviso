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
<div class="painel-cliente-icone"><img src="img/icons/filiais.png" width="100%"/></div>
<div class="alinha14"><a href="filiais">FILIAIS</a> >> CADASTRAR </div></div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">

<a href="filiais-cadastrar"><div class="painel-banner-botoes1"><img src="img/novo.jpg" width="100%"/></div></a>
</div></div></div>

<div id="painel-cliente">
<div class="alinha15">CADASTRAR</div>
	
	
	
<?php

$acao = $_GET ['acao'];
if ($acao=='cadastrar'){

$id = $_POST ['id'];
$cidade = $_POST ['cidade'];
$data_cadastro = $_POST ['data_cadastro'];
$endereco = $_POST ['endereco'];	
$telefone = $_POST ['telefone'];
$whatsapp = $_POST ['whatsapp'];
$email = $_POST ['email'];	
$nome = $_POST ['nome'];	
$nome_slug = $_POST ['nome_slug'];
$desc = $_POST ['desc'];	
$imagem = $_POST ['imagem'];
$mapa = addslashes($_POST['mapa']);
$ifood = $_POST ['ifood'];
$ubereats = $_POST ['ubereats'];
$rappi = $_POST ['rappi'];
$video = $_POST ['video'];

$diaatual = date('d');
$mesatual = date('m');	
$anoatual = date('20y');


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

	
$pasta = '../img2/filiais';
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
chmod ("../img2/filiais/$nome_imagem", 0777);


$sql =" 
INSERT INTO `filiais` (`id`, `cidade`, `data_cadastro`, `endereco`, `telefone`,  `whatsapp`,  `email`,  `nome`, `desc`,  `nome_slug`  ,  `imagem` ,  `mapa` ,  `ifood` ,  `ubereats` ,  `rappi` ,  `video`) 
              VALUES (NULL, '$cidade', '$diaatual/$mesatual/$anoatual', '$endereco', '$telefone',  '$whatsapp', '$email' , '$nome' , '$desc' , '$nome_slug' , '$nome_imagem' , '$mapa' , '$ifood' , '$ubereats' , '$rappi', '$video');"; 

if ($conn->query($sql) === TRUE) {  
  
  echo"<BR><script language='javascript'>
      function alerta(){
      alert('Filial cadastrada com sucesso! ');
      }
      alerta();
      document.location='javascript:history.go(-2)';
      </script></b>";
	
}

	if ($type!=''){echo "<div id='notas'>Tipo de arquivo não aceito, favor enviar arquivos JPG</div>";}
if ($nome_imagem==''){echo "<div id='notas'>Favor, escolha uma imagem para poder realizar o cadastro</div>";}
		
}}}?>
	
	
	

<form  action='filiais-cadastrar?acao=cadastrar' method='post' enctype='multipart/form-data'>
	

<div class="cut1">

<div id="formulario">
<label for="nome">Nome da Filial:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Nome da Filial</span>
</div></label>
<input type="text" name="nome" class="form3" required/>
</div>


	
<div id="formulario">
<label for="cidade">Cidade:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Cidade</span>
</div></label>
<input type="text" name="cidade" class="form3" required/>
</div>
	
	
<div id="formulario">
<label for="endereco">Endereço:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Endereço Completo</span>
</div></label>
<input type="text" name="endereco" class="form3" required/>
</div>
	
	

<div id="formulario">
<label for="telefone">Telefone Fixo ou Celular:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Telefone Principal</span>
</div></label>
<input type="text" name="telefone" class="form3" required/>
</div>


<div id="formulario">
<label for="whatsapp">Whatsapp: 
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Formato: 062988887777</span>
</div></label>
<input type="text" name="whatsapp" placeholder="Formato: 062988887777" class="form3" required/>
</div>




<div id="formulario">
<label for="email">E-mail:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">E-mail Principal</span>
</div></label>
<input type="text" name="email" class="form3" required/>
</div>



<div id="formulario">
<label for="video">ID Vídeo Youtube:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">ID Vídeo Youtube</span>
</div></label>
<input type="text" name="video" class="form3" required/>
</div>



<div id="formulario">
<label for="nome">Imagem de Capa:</label>
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
<label for="mapa">Código Google Maps (Localização):
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Código Google Maps (Localização)</span>
</div></label>
<textarea class='form4' name='mapa'/></textarea>
</div>	



<div id="grid12E">
<label for="desc">Descrição da Filial:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Descrição completa da Filial</span>
</div></label>
<textarea class='form4' name='desc'/></textarea>
</div>	



<div class="alinha15">VENDAS APPS</div>



<div id="formulario">
<label for="ifood">Link Ifood:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Link Ifood</span>
</div></label>
<input type="text" name="ifood" class="form3" />
</div>


<div id="formulario">
<label for="ubereats">Link Uber Eats:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Link Uber Eats</span>
</div></label>
<input type="text" name="ubereats" class="form3" />
</div>
	

<div id="formulario">
<label for="rappi">Link Rappi:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Link Rappi</span>
</div></label>
<input type="text" name="rappi" class="form3" />
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