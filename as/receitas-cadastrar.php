<?php session_start(); if((!isset($_SESSION[login])) AND (!isset($_SESSION[senha])))Header("Location: index.php?erro=logar");
$login = $_SESSION['login'];
$senha = $_SESSION['senha'];  
?><!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php  include'head.php';?>	
<script type="text/javascript" src="nicEdit.js"></script>
<script type="text/javascript">
bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>	
	
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
<div class="painel-cliente-icone"><img src="img/icons/receitas.png" width="100%"/></div>
<div class="alinha14"><a href="receitas">RECEITAS</a> >> CADASTRAR</div></div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">
<div style="display: none"><a href="banner-filtro"><div class="painel-banner-botoes2"><img src="img/filtro.jpg" width="100%"/></div></a></div>
<a href="receitas-categorias"><div class="painel-banner-botoes1"><img src="img/categorias.jpg" width="100%"/></div></a>
<a href="receitas-cadastrar"><div class="painel-banner-botoes1"><img src="img/novo.jpg" width="100%"/></div></a>
</div></div></div>

<div id="painel-cliente">
<div class="alinha15">CADASTRAR</div>
	
	
	
<?php 

$acao = $_GET ['acao'];
if ($acao=='cadastrar'){    
    
$id = $_POST ['id'];
$titulo = $_POST ['titulo'];
$titulo_slug = $_POST ['titulo_slug'];
$data_cadastro = $_POST ['data_cadastro'];
$imagem = $_POST ['imagem'];
$video = $_POST ['video'];	
$categoria = $_POST ['categoria'];
$produto = $_POST ['produto'];
$preparo = $_POST ['preparo'];	
$rendimento = $_POST ['rendimento'];	
$ingredientes = $_POST ['ingredientes'];	
$modo_preparo = $_POST ['modo_preparo'];	
		
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

$titulo_slug = toAscii($titulo);
	
$pasta = '../img2/receitas';
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
chmod ("../img2/receitas/$nome_imagem", 0777);
		 
$sql = "INSERT INTO `receitas` (`id`, `titulo`, `titulo_slug`, `data_cadastro`, `imagem`, `video`, `categoria`, `produto`, `preparo`, `rendimento`, `ingredientes`, `modo_preparo`)
 VALUES (NULL, '$titulo', '$titulo_slug', '$diaatual/$mesatual/$anoatual', '$nome_imagem', '$video', '$categoria', '$produto', '$preparo', '$rendimento', '$ingredientes', '$modo_preparo');";

if ($conn->query($sql) === TRUE) {  
  
  echo"<BR><script language='javascript'>
      function alerta(){
      alert('Receita cadastrada com sucesso! ');
      }
      alerta();
      document.location='receitas';
      </script></b>";
	
}

	if ($type!=''){echo "<div id='notas'>Tipo de arquivo não aceito, favor enviar arquivos JPG</div>";}
if ($nome_imagem==''){echo "<div id='notas'>Favor, escolha uma imagem para poder realizar o cadastro</div>";}
		
}}}?>

<form  action='receitas-cadastrar?acao=cadastrar' method='post' enctype='multipart/form-data'>
	

<div class="cut1">
	
<div id="formulario">
<label for="titulo">Nome da Receita:</label>
<input type="text" name="titulo" class="form3" required/>
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




<div id="formulario">
<label for="video">Vídeo: (ID Youtube)</label>
<input type="text" name="video" class="form3" />
</div>
	

<div id="formulario">
<label for="rendimento">Porções de Rendimento:</label>
<input type="text" name="rendimento" class="form3" required/>
</div>


<div id="formulario">
<label for="preparo">Tempo de Preparo:</label>
<input type="text" name="preparo" class="form3" required/>
</div>

	

<div id="formulario">
<label for="categoria">Categoria:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Categoria do Produto</span>
</div></label>
<select name="categoria" class="form3" required>
<?php
$sql = "SELECT * FROM categorias WHERE tipo ='receitas' ORDER BY categoria ASC";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){
$id = $res['id'];
$categoria= $res['categoria']; 
$categoria_slug= $res['categoria_slug']; 
echo "<option value=\"$categoria_slug\">$categoria</option>"; }?>
</select></div>
	



<div id="formulario">
<label for="produto">Produto:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Produto da Receita</span>
</div></label>
<select name="produto" class="form3" required>
<?php
$sql = "SELECT * FROM produtos  ORDER BY categoria ASC";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){
$id = $res['id'];
$nome= $res['nome']; 
$categoria= $res['categoria']; 


$sql2 = "SELECT * FROM categorias WHERE tipo ='produtos' and categoria_slug = '$categoria' ORDER BY categoria ASC";
$comando2 = mysqli_query($conn, $sql2);
while($res = mysqli_fetch_assoc($comando2)){
$id = $res['id'];
$categoriax= $res['categoria']; 
$categoria_slugx= $res['categoria_slug']; 


echo "<option value=\"$nome\">$categoriax - $nome</option>"; }}?>
</select></div>
	
	

<div id="grid12E">
<label for="ingredientes">Ingredientes:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Ingredientes</span>
</div></label>
<textarea class='form4' name='ingredientes'/></textarea>
</div>	
	


	<div id="grid12E">
<label for="modo_preparo">Modo de Preparo:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Modo de Preparo</span>
</div></label>
<textarea class='form4' name='modo_preparo'/></textarea>
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