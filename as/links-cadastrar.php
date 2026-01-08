<?php session_start(); if((!isset($_SESSION[login])) AND (!isset($_SESSION[senha])))Header("Location: index.php?erro=logar");
$login = $_SESSION['login'];
$senha = $_SESSION['senha'];  
?>


<!doctype html>
<html>
<head>
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
<div class="painel-cliente-icone"><img src="img/icons/linksuteis.png" width="100%"/></div>
<div class="alinha14"><a href="links-uteis">ORIENTAÇÃO TÉCNICA</a> >> CADASTRAR</div></div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">
<div class="painel-banner-botoes2"><a href="links-filtro"><img src="img/filtro.jpg" width="100%"/></a></div>
<div class="painel-banner-botoes1"><a href="links-categorias"><img src="img/categorias.jpg" width="100%"/></a></div>
<div class="painel-banner-botoes1"><a href="links-cadastrar"><img src="img/novo.jpg" width="100%"/></a></div>
</div></div></div>

<div id="painel-cliente">
<div class="alinha15">CADASTRAR</div>


<form  action='links-cadastrar?acao=cadastrar' method='post' enctype='multipart/form-data'>

<div class="cut1">
<div id="formulario">
<label for="titulo">Título:</label>
<input type="text" name="titulo" class="form3"/>
</div>

<div id="formulario">
<label for="link">Link:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Informação Extra</span>
</div></label>
<input type="text" name="link" class="form3"/>
</div>


<div id="formulario">
<label for="posicao">Posição:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Informação Extra</span>
</div></label>
<select name="posicao" class="form3">
	<option value="">Posição</option>
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
</select>
</div>



</div>
<div id="grid12"><div class="cadastrar"><input type="submit" name="submit" style="cursor:pointer" class="cadastrar" value="CADASTRAR"/></div></div> </form>
</div></div>

<div id="sistemas-menu-lateral">
<div id="grid12"><div class="sistemas-marcador"><img src="img/marcador.png"/></div></div>
	<?php  include'menu-lateral.php';?>
</div></div></div>

<?php  include'menu-lateral-mobiles.php';?>



<?php

$acao = $_GET ['acao'];
if ($acao=='cadastrar'){

$id = $_POST ['id'];
$titulo = $_POST ['titulo'];
$data_cadastro = $_POST ['data_cadastro'];
$video = $_POST ['video'];	
$desc = $_POST ['desc'];
$destaque = $_POST ['destaque'];	

$diaatual = date('d');
$mesatual = date('m');	
$anoatual = date('20y');
	

$sql =" 
INSERT INTO `links_uteis` (`id`, `titulo`, `link`, `posicao`) 
              VALUES (NULL, '$titulo', '$link', '$posicao');"; 

if ($conn->query($sql) === TRUE) {  
  
  echo"<BR><script language='javascript'>
      function alerta(){
      alert('Link cadastrado com sucesso! ');
      }
      alerta();
      document.location='javascript:history.go(-2)';
      </script></b>";
  
    }}?>



</body>
</html>