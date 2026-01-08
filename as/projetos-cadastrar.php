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
<div class="painel-cliente-icone"><img src="img/icons/projetos.png" width="100%"/></div>
<div class="alinha14"><a href="projetos">PROJETOS</a> >> CADASTRAR </div></div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">

<a href="projetos-cadastrar"><div class="painel-banner-botoes1"><img src="img/novo.jpg" width="100%"/></div></a>
</div></div></div>

<div id="painel-cliente">
<div class="alinha15">CADASTRAR</div>
	
	
	
<?php

$acao = $_GET ['acao'];
if ($acao=='cadastrar'){

$id = $_POST ['id'];
$nome = $_POST ['nome'];
$nome_slug = $_POST ['nome_slug'];
$imagem = $_POST ['imagem'];
$pergunta_1 = $_POST ['pergunta_1'];
$pergunta_2 = $_POST ['pergunta_2'];
$pergunta_3 = $_POST ['pergunta_3'];
$pergunta_4 = $_POST ['pergunta_4'];
$pergunta_5 = $_POST ['pergunta_5'];
$facebook = $_POST ['facebook'];
$site = $_POST ['site'];
$instagram = $_POST ['instagram'];
$data_cadastro = $_POST ['data_cadastro'];

$setor = $_POST ['setor'];
$ano = $_POST ['ano'];
$servicos = $_POST ['servicos'];
$frase_inicial = $_POST ['frase_inicial'];

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

	
$pasta = '../img2/projetos';
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
upload($tmp, $nome_imagem, 1920, $pasta);
chmod ("../img2/projetos/$nome_imagem", 0777);


$sql =" 
INSERT INTO `projetos` (`id`, `nome`, `imagem`, `pergunta_1`, `pergunta_2`, `pergunta_3`, `pergunta_4`, `pergunta_5`, `facebook`, `instagram`, `site`, `nome_slug`, `data_cadastro` , `setor` , `ano`, `servicos` , `frase_inicial`) 

VALUES (NULL, '$nome', '$nome_imagem', '$pergunta_1', '$pergunta_2', '$pergunta_3', '$pergunta_4', '$pergunta_5', '$facebook', '$instagram', '$site', '$nome_slug', '$diaatual/$mesatual/$anoatual' , '$setor' , '$ano' , '$servicos' , '$frase_inicial');"; 

if ($conn->query($sql) === TRUE) {  
  
  echo"<BR><script language='javascript'>
      function alerta(){
      alert('Projeto cadastrado com sucesso! ');
      }
      alerta();
      document.location='javascript:history.go(-2)';
      </script></b>";
	
}

	if ($type!=''){echo "<div id='notas'>Tipo de arquivo não aceito, favor enviar arquivos JPG</div>";}
if ($nome_imagem==''){echo "<div id='notas'>Favor, escolha uma imagem para poder realizar o cadastro</div>";}
		
}}}?>
	
	
	

<form  action='projetos-cadastrar?acao=cadastrar' method='post' enctype='multipart/form-data'>
	

<div class="cut1">

<div id="formulario">
<label for="nome">Nome do Projeto:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Nome do Projeto</span>
</div></label>
<input type="text" name="nome" class="form3" required/>
</div>


<div id="formulario">
<label for="setor">Setor:</label>
<input type="text" name="setor" class="form3" />
</div>


<div id="formulario">
<label for="ano">Ano:</label>
<input type="text" name="ano" class="form3" />
</div>


<div id="formulario">
<label for="servicos">Serviços:</label>
<input type="text" name="servicos" class="form3" />
</div>


<div id="formulario">
<label for="frase_inicial">Frase Inicial:</label>
<input type="text" name="frase_inicial" class="form3" />
</div>


<div id="formulario">
<label for="nome">Imagem de Capa:</label>
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Tamanho da Imagem 1920x920px</span>
</div>
<div class='input-wrapper'>
	<label for='input-file'>Selecionar um arquivo</label>	
<input id='input-file' type='file' name='img[]'    class="form3" accept="image/x-png, image/gif, image/jpeg , image/ico" required />
<span id='file-name'></span>
</div></div>



<div id="grid12E">
<label for="pergunta_1">Contexto:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext"></span>
</div></label>
<textarea class='form4' name='pergunta_1'/></textarea>
</div>	


<div id="grid12E">
<label for="pergunta_2">Problema:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext"></span>
</div></label>
<textarea class='form4' name='pergunta_2'/></textarea>
</div>	


<div id="grid12E">
<label for="pergunta_3">Solução:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext"></span>
</div></label>
<textarea class='form4' name='pergunta_3'/></textarea>
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