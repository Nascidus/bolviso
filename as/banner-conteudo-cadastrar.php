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
<div class="painel-cliente-icone"><img src="img/icons/banner.png" width="100%"/></div>
<div class="alinha14">BANNER >>
<?php
$nome_slug = $_GET['nome_slug'];
$sql = "SELECT * FROM projetos WHERE nome_slug = '$nome_slug' ORDER BY id DESC";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){
$nome = $res ['nome'];	
echo"$nome"; }?>

>> CADASTRAR</div></div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">
<a href="banner-cadastrar" style="display: none;"><div class="painel-banner-botoes1"><img src="img/novo.jpg" width="100%"/></div></a>
</div></div></div>

<div id="painel-cliente">
<div class="alinha15">CADASTRAR</div>
	
	
	
<?php 

$acao = $_GET ['acao'];
if ($acao=='cadastrar'){    
    
$id = $_POST ['id'];
$titulo = $_POST ['titulo'];
$imagem = $_POST ['imagem'];
$posicao = $_POST ['posicao'];
$estrutura = $_POST ['estrutura'];
$post_banner = $_POST ['post_banner'];
$data_cadastro = $_POST ['data_cadastro'];		
$estilo = $_POST ['estilo'];		
$diaatual = date('d');$mesatual = date('m');$anoatual = date('20y');
	

$pasta = '../img2/banner_conteudo';
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
chmod ("../img2/banner_conteudo/$nome_imagem", 0777);

		 
$sql ="INSERT INTO `banner_conteudo` (`id`, `titulo`, `link`, `categoria`, `imagem`, `posicao`, `data_cadastro`, `estrutura`, `post_banner` , `estilo`) 
VALUES ('', '$titulo', '$link', '$categoria', '$nome_imagem', '$posicao', '$diaatual/$mesatual/$anoatual', '$estrutura', '$post_banner' , '$estilo');"; 

	
if ($conn->query($sql) === TRUE) {  
  
  echo"<script language='javascript'>
      function alerta(){
      alert('Banner cadastrado com sucesso! ');
      }
      alerta();
      document.location='javascript:history.go(-2)';
      </script>";
	
}	

else {echo"<script language='javascript'>
      function alerta(){
      alert('Erro! ');
      }
      alerta();
      document.location='javascript:history.go(-1)';
      </script>";}		
}


if ($type!=''){echo "<div id='notas'>Tipo de arquivo não aceito, favor enviar arquivos JPG</div>";}
if ($nome_imagem==''){echo "<div id='notas'>Favor, escolha uma imagem para poder realizar o cadastro</div>";}


}}?>


<?php
$estrutura = $_GET['estrutura'];
$nome_slug = $_GET['nome_slug'];
?>

<form  action='banner-conteudo-cadastrar?acao=cadastrar' method='post' enctype='multipart/form-data'>
	
<div class="cut1">
	
<div id="formulario">
<label for="titulo">Título:</label>
<input type="text" name="titulo" class="form3" required/>
<input type="hidden" name="estrutura" value="<?php echo"$estrutura";?>" class="form3" required/>
<input type="hidden" name="post_banner" value="<?php echo"$nome_slug";?>" class="form3" required/>
</div>


<div id="formulario">
<label for="nome">Imagem:</label>
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Tamanho da Imagem 1920 X 900px</span>
</div>
<div class='input-wrapper'>
	<label for='input-file'>Selecionar um arquivo</label>	
<input id='input-file' type='file' name='img[]'    class="form3" accept="image/x-png, image/gif, image/jpeg , image/ico" required />
<span id='file-name'></span>
</div></div>


<div id="formulario">
<label for="estilo">Estilo:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Estilo do Banner</span>
</div></label>
<select name="estilo" class="form3" required>
	<option value="Inteiro">Inteiro</option>
	<option value="Metade">Metade</option>
</select>
</div>


<div id="formulario">
<label for="posicao">Posição:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Posição de exibição do banner</span>
</div></label>
<select name="posicao" class="form3" required>
	<option value="">Posição</option>
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
  <option value="6">6</option>
  <option value="7">7</option>
  <option value="8">8</option>
  <option value="9">9</option>
  <option value="10">10</option>
</select>
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