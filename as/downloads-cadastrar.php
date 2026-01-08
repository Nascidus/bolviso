<?php session_start(); if((!isset($_SESSION['login'])) AND (!isset($_SESSION['senha'])))Header("Location: index.php?erro=logar");
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
<div class="painel-cliente-icone"><img src="img/icons/download.png" width="100%"/></div>
<div class="alinha14"><a href="fotos">DOWNLOADS</a> >> CADASTRAR </div></div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">
<div style="display: none"><a href="banner-filtro"><div class="painel-banner-botoes2"><img src="img/filtro.jpg" width="100%"/></div></a></div>
<div style="display: none"><a href="produtos-categorias"><div class="painel-banner-botoes1"><img src="img/categorias.jpg" width="100%"/></div></a></div>
<a href="downloads-cadastrar"><div class="painel-banner-botoes1"><img src="img/novo.jpg" width="100%"/></div></a>
</div></div></div>

<div id="painel-cliente">
<div class="alinha15">CADASTRAR</div>
	
	
	
<?php

$acao = $_GET ['acao'];
if ($acao=='cadastrar'){

$id = $_POST ['id'];
$nome_arquivo = $_POST ['nome_arquivo'];
$data_cadastro = $_POST ['data_cadastro'];
$desc = $_POST ['desc'];
$link_arquivo = $_POST ['link_arquivo'];	

$diaatual = date('d');
$mesatual = date('m');	
$anoatual = date('20y');
	

$sql =" 
INSERT INTO `downloads` (`id`, `nome_arquivo`, `data_cadastro`, `link_arquivo`, `desc`) 
              VALUES (NULL, '$nome_arquivo', '$diaatual/$mesatual/$anoatual', '$link_arquivo', '$desc');"; 

if ($conn->query($sql) === TRUE) {  
  
  echo"<BR><script language='javascript'>
      function alerta(){
      alert('Download cadastrado com sucesso! ');
      }
      alerta();
      document.location='downloads';
      </script></b>";
  
    }}?>
	
	
	
	

<form  action='downloads-cadastrar?acao=cadastrar' method='post' enctype='multipart/form-data'>
	

<div class="cut1">
	
<div id="formulario">
<label for="nome_arquivo">Nome do Arquivo:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Nome do Arquivo</span>
</div></label>
<input type="text" name="nome_arquivo" class="form3" required/>
</div>
	
	
<div id="formulario">
<label for="link_arquivo">Link Arquivo:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Link Arquivo</span>
</div></label>
<input type="text" name="link_arquivo" class="form3" required/>
</div>
		

<div id="grid12E">
<label for="desc">Descrição do Arquivo:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Descrição do Arquivo</span>
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