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
<div class="painel-cliente-icone"><img src="img/icons/imoveis.png" width="100%"/></div>
<div class="alinha14"><a href="imoveis">IMÓVEIS</a> >> CADASTRAR </div></div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">

<a href="imoveis-cadastrar"><div class="painel-banner-botoes1"><img src="img/novo.jpg" width="100%"/></div></a>
</div></div></div>

<div id="painel-cliente">
<div class="alinha15">CADASTRAR</div>
	
	
	
<?php

$acao = $_GET ['acao'];
if ($acao=='cadastrar'){

$id = $_POST ['id'];
$tipo_imovel = $_POST ['tipo_imovel'];
$finalidade = $_POST ['finalidade'];
$imagem = $_POST ['imagem'];
$area_construida = $_POST ['area_construida'];
$situacao = $_POST ['situacao'];
$valor = $_POST ['valor'];
$desc = $_POST ['desc'];
$data_cadastro = $_POST ['data_cadastro'];
$endereco = $_POST ['endereco'];
$mapa = addslashes($_POST['mapa']);

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

	
$pasta = '../img2/imoveis';
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
chmod ("../img2/imoveis/$nome_imagem", 0777);


$sql =" 
INSERT INTO `imoveis` (`id`, `tipo_imovel`, `finalidade`, `imagem`, `area_construida`, `situacao`, `valor`, `desc`, `data_cadastro` , `endereco` , `mapa`)
 VALUES (NULL, '$tipo_imovel', '$finalidade', '$nome_imagem', '$area_construida', '$situacao', '$valor', '$desc', '$diaatual/$mesatual/$anoatual' , '$endereco' , '$mapa');"; 

if ($conn->query($sql) === TRUE) {  
  
  echo"<BR><script language='javascript'>
      function alerta(){
      alert('Imóvel cadastrado com sucesso! ');
      }
      alerta();
      document.location='javascript:history.go(-2)';
      </script></b>";
	
}

	if ($type!=''){echo "<div id='notas'>Tipo de arquivo não aceito, favor enviar arquivos JPG</div>";}
if ($nome_imagem==''){echo "<div id='notas'>Favor, escolha uma imagem para poder realizar o cadastro</div>";}
		
}}}?>
	
	
	

<form  action='imoveis-cadastrar?acao=cadastrar' method='post' enctype='multipart/form-data'>
	

<div class="cut1">


<div id="formulario">
<label for="tipo_imovel">Tipo do Imóvel:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Tipo do Imóvel:</span>
</div></label>
<select name="tipo_imovel" class="form3" required/>
<option value="Casa">Casa</option>
<option value="Sobrado">Sobrado</option>
<option value="Casa Germinada">Casa Germinada</option>
<option value="Apartamento">Apartamento</option>
<option value="Comercial">Comercial</option>
<option value="Chalé">Chalé</option>
<option value="Terreno">Terreno</option>
<option value="Fazenda">Fazenda</option>
<option value="Chácara">Chácara</option>
<option value="Terreno">Terreno</option>
</select>
</div>


<div id="formulario">
<label for="finalidade">Finalidade Imóvel:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Tipo do Imóvel:</span>
</div></label>
<select name="finalidade" class="form3" required/>
<option value="Venda">Venda</option>
<option value="Aluguel">Aluguel</option>
<option value="Troca">Troca</option>
<option value="Temporada">Temporada</option>
</select>
</div>



<div id="formulario">
<label for="area_construida">Área Construída:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Área Construída:</span>
</div></label>
<input type="text" name="area_construida" class="form3" required/>
</div>


<div id="formulario">
<label for="situacao">Situação:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Situação:</span>
</div></label>
<input type="text" name="situacao" class="form3" required/>
</div>

<div id="formulario">
<label for="endereco">Endereço:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Endereço:</span>
</div></label>
<input type="text" name="endereco" class="form3" required/>
</div>


<div id="formulario">
<label for="valor">Valor:
<div class="tooltip">
<div class="iterativo Valor">i</div>
<span class="tooltiptext">Valor:</span>
</div></label>
<input type="text" name="valor" class="form3" required/>
</div>



<div id="formulario">
<label for="nome">Imagem de Capa:</label>
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Tamanho da Imagem 1000x1000px</span>
</div>
<div class='input-wrapper'>
	<label for='input-file'>Selecionar um arquivo</label>	
<input id='input-file' type='file' name='img[]'    class="form3" accept="image/x-png, image/gif, image/jpeg , image/ico" required />
<span id='file-name'></span>
</div></div>




<div id="grid12E">
<label for="desc">Descrição:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext"></span>
</div></label>
<textarea class='form4' name='desc'/></textarea>
</div>

	
<div id="grid12E">
<label for="mapa">Mapa de Localização:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Iframe Google Maps</span>
</div></label>
<textarea class='form4' name='mapa'/></textarea>
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