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

<!--
<script type="text/javascript" src="nicEdit.js"></script>
<script type="text/javascript">
bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>	-->
	
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
<div class="painel-cliente-icone"><img src="img/icons/noticias.png" width="100%"/></div>
<div class="alinha14"><a href="equipe">EQUIPE</a> >> CADASTRAR</div></div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">
<div style="display: none"><a href="banner-filtro"><div class="painel-banner-botoes2"><img src="img/filtro.jpg" width="100%"/></div></a></div>
<a href="equipe-cadastrar"><div class="painel-banner-botoes1"><img src="img/novo.jpg" width="100%"/></div></a>
</div></div></div>

<div id="painel-cliente">
<div class="alinha15">CADASTRAR</div>
	
	
	
<?php 

$acao = $_GET ['acao'];
if ($acao=='cadastrar'){    
    
$id = $_POST ['id'];
$nome = $_POST ['nome'];
$funcao = $_POST ['funcao'];
$data_cadastro = $_POST ['data_cadastro'];
$imagem = $_POST ['imagem'];	
$desc = $_POST ['desc'];	
$numero_profissional = $_POST ['numero_profissional'];	
$categoria = $_POST ['categoria'];
$filial = $_POST ['filial'];	
$classe = $_POST ['classe'];	
$link_linkedin = $_POST ['link_linkedin'];	
$link_instagram = $_POST ['link_instagram'];	
$posicao = $_POST ['posicao'];	
		
$diaatual = date('d');
$mesatual = date('m');	
$anoatual = date('20y');
	
$pasta = '../img2/equipe';
$permitido = array('image/jpg', 'image/jpeg', 'image/pjpeg');	
$img = $_FILES['img'];
$countImg  = count($img['name']);

require('upload_func.php');		
for($i=0;$i<$countImg;$i++){
	
$tmp = $img['tmp_name'][$i];
$name = $img ['name'][$i];
$type = $img ['type'][$i];



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

if(!empty($name) && in_array($type, $permitido)){
$nome_imagem = 'asweb-' .md5(uniqid(rand(), true)).$i.'.jpg';
upload($tmp, $nome_imagem, 2000, $pasta);
chmod ("../img2/equipe/$nome_imagem", 0777);
		 
$sql = "INSERT INTO `equipe` (`id`, `nome`, `nome_slug`, `funcao`, `desc`, `filial`, `filial2`, `filial3`, `categoria`, `imagem`, `data_cadastro`, `numero_profissional`, `link_instagram`, `link_linkedin` , `classe` , `posicao`) 
VALUES (NULL, '$nome', '$nome_slug', '$funcao', '$desc', '$filial', '$filial2', '$filial3', '$categoria', '$nome_imagem', '$data', '$numero_profissional', '$link_instagram', '$link_linkedin' , '$classe' , '$posicao');";

if ($conn->query($sql) === TRUE) {  
  
  echo"<BR><script language='javascript'>
      function alerta(){
      alert('Profissional cadastrado com sucesso! ');
      }
      alerta();
      document.location='equipe';
      </script></b>";
	
}

	if ($type!=''){echo "<div id='notas'>Tipo de arquivo não aceito, favor enviar arquivos JPG</div>";}
if ($nome_imagem==''){echo "<div id='notas'>Favor, escolha uma imagem para poder realizar o cadastro</div>";}
		
}}}?>

<form  action='equipe-cadastrar.php?acao=cadastrar' method='post' enctype='multipart/form-data'>
	

<div class="cut1">
	
<div id="formulario"  style="display: none;">
<label for="classe">Classe:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Classe:</span>
</div></label>
<select name="classe" class="form3">
<option value="Sr.">Sr.</option>
<option value="Sra.">Sra.</option>
<option value="Dr.">Dr.</option>
<option value="Dra.">Dra.</option>
<option value="Me.">Me.</option>
<option value="Ma.">Ma.</option>
<option value="">Nenhum</option>
</select></div>

<div id="formulario">
<label for="nome">Nome:</label>
<input type="text" name="nome" class="form3" required/>
</div>
	
<div id="formulario">
<label for="funcao">Função:</label>
<input type="text" name="funcao" class="form3" required/>
</div>
	
<div id="formulario" style="display: none;">
<label for="numero_profissional">Número Profissional: (CRO - CRM)</label>
<input type="text" name="numero_profissional" class="form3" />
</div>
	

<div id="formulario" style="display: none;">
<label for="link_instagram">Link Instagram</label>
<input type="text" name="link_instagram" class="form3" readonly />
</div>


<div id="formulario" style="float: right;">
<label for="link_linkedin">Link Linkedin</label>
<input type="text" name="link_linkedin" class="form3" />
</div>


<div id="formulario">
<label for="categoria">Categoria:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Categoria do Produto</span>
</div></label>
<select name="categoria" class="form3" required>
<?php
$sql = "SELECT * FROM categorias WHERE tipo ='equipe' ORDER BY categoria ASC";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){
$id = $res['id'];
$categoria= $res['categoria']; 
$categoria_slug= $res['categoria_slug']; 
echo "<option value=\"$categoria_slug\">$categoria</option>"; }?>
</select></div>


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
	

<div id="formulario" style="display: none;">
<label for="filial">Filial:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Filial que o profissional atende</span>
</div></label>
<select name="filial" class="form3">
<?php
$sql = "SELECT * FROM filiais ORDER BY nome ASC";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){
$id = $res['id'];
$nome= $res['nome']; 
$nome_slug= $res['nome_slug']; 
echo "<option value=\"$nome_slug\">$nome</option>"; }?>
</select></div>

	

<div id="formulario">
<label for="nome">Foto de Capa:</label>
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Tamanho da Imagem 1000 X 1143px</span>
</div>
<div class='input-wrapper'>
	<label for='input-file'>Selecionar um arquivo</label>	
<input id='input-file' type='file' name='img[]'    class="form3" accept="image/x-png, image/gif, image/jpeg , image/ico" required />
<span id='file-name'></span>
</div></div>





<div id="grid12E">
<label for="desc">Apresentação:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Descrição</span>
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