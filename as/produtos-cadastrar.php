<?php session_start(); if((!isset($_SESSION[login])) AND (!isset($_SESSION[senha])))Header("Location: index.php?erro=logar");
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
<div class="painel-cliente-icone"><img src="img/icons/produtos.png" width="100%"/></div>
<div class="alinha14"><a href="produtos">PRODUTOS</a> >> CADASTRAR</div></div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">	

<div style="display: none"><a href="produtos-filtro"><div class="painel-banner-botoes2"><img src="img/filtro.jpg" width="100%"/></div></a></div>

<a href="produtos-subcategorias"><div class="painel-banner-botoes1"><img src="img/subcategorias.jpg" width="100%"/></div></a>

<a href="produtos-categorias"><div class="painel-banner-botoes1"><img src="img/categorias.jpg" width="100%"/></div></a>

<a href="produtos-cadastrar"><div class="painel-banner-botoes1"><a href="produtos-cadastrar"><img src="img/novo.jpg" width="100%"/></a></div></a>
</div></div></div>

<div id="painel-cliente">
<div class="alinha15">CADASTRAR</div>
	
	
	
<?php 

$acao = $_GET ['acao'];
if ($acao=='cadastrar'){    
    
$id = $_POST ['id'];
$nome = $_POST ['nome'];
$nome_slug = $_POST ['nome_slug'];
$categoria = $_POST ['categoria'];
$subcategoria = $_POST ['subcategoria'];
$desc = $_POST ['desc'];
$valor = $_POST ['valor'];
$destaque = $_POST ['destaque'];
$imagem = $_POST ['imagem'];
$estilo = $_POST ['estilo'];		

$data_cadastro=date('d/m/20y');

	
$pasta = '../img2/produtos';
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
chmod ("../img2/produtos/$nome_imagem", 0777);
		 
$sql = "INSERT INTO `produtos` (`id`, `nome`, `nome_slug`, `categoria`, `subcategoria`, `desc`, `valor`, `destaque`, `estilo`, `imagem`, `posicao`, `data_cadastro`) 

VALUES (NULL, '$nome', '$nome_slug', '$categoria', '$subcategoria', '$desc', '$valor', '$destaque', '$estilo', '$nome_imagem', '0', '$data_cadastro');";
	

if ($conn->query($sql) === TRUE) {  
  
  echo"<BR><script language='javascript'>
      function alerta(){
      alert('Produto cadastrado com sucesso! ');
      }
      alerta();
      document.location='javascript:history.go(-1)';
      </script></b>";
	
}

	if ($type!=''){echo "<div id='notas'>Tipo de arquivo não aceito, favor enviar arquivos JPG</div>";}
if ($nome_imagem==''){echo "<div id='notas'>Favor, escolha uma imagem para poder realizar o cadastro</div>";}
		
}}}?>

<form  action='produtos-cadastrar?acao=cadastrar' method='post' enctype='multipart/form-data'>
	

<div class="cut1">
	
<div id="formulario">
<label for="nome">Nome:</label>
<input type="text" name="nome" class="form3" required/>
</div>
	
<div id="formulario">
<label for="valor">Valor:</label>
<input type="text" name="valor" class="form3" disabled/>
</div>
	

<div id="formulario">
<label for="destaque">Produto em Destaque:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Produto em destaque Home</span>
</div></label>
<select name="destaque" class="form3" required>
	<option value="">Selecione o Destaque</option>
	<option value="Sim">Sim</option>
	<option value="Não">Não</option>
</select>
</div>
	

<div id="formulario">
<label for="categoria">Categoria:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Categoria do Produto</span>
</div></label>
<select name="categoria" class="form3" required>
<?php
$sql = "SELECT * FROM categorias WHERE tipo ='produtos' ORDER BY categoria ASC";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){
$id = $res['id'];
$categoria= $res['categoria']; 
$categoria_slug= $res['categoria_slug']; 
echo "<option value=\"$categoria_slug\">$categoria</option>"; }?>
</select></div>



<div id="formulario">
<label for="categoria">Subcategoria:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Subcategoria do Produto</span>
</div></label>
<select name="subcategoria" class="form3" >
<option  value="">Sem Subcategoria </option>
<?php
$sql = "SELECT * FROM subcategorias WHERE tipo ='produtos' ORDER BY subcategoria ASC";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){
$id = $res['id'];
$subcategoria= $res['subcategoria']; 
$subcategoria_slug= $res['subcategoria_slug']; 
echo "<option value=\"$subcategoria_slug\">$subcategoria</option>"; }?>
</select></div>



<div id="formulario">
<label for="estilo">Estilo:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Estilo de exibição do produto</span>
</div></label>
<select name="estilo" class="form3" >
<option  value="01">01</option>
<option  value="02">02</option>
<option  value="03">03</option>
</select></div>





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
<label for="desc">Descrição do Produto:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Descrição completa do produto</span>
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