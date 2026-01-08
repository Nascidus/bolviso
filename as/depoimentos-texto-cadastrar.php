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
<div class="painel-cliente-icone"><img src="img/icons/depoimentos.png" width="100%"/></div>
<div class="alinha14"><a href="depoimentos">DEPOIMENTOS EM TEXTO</a> >> CADASTRAR </div></div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">
<div style="display: none"><a href="banner-filtro"><div class="painel-banner-botoes2"><img src="img/filtro.jpg" width="100%"/></div></a></div>


</div></div></div>

<div id="painel-cliente">
<div class="alinha15">CADASTRAR</div>
	
	
	
<?php

$acao = $_GET ['acao'];
if ($acao=='cadastrar'){

$id = $_POST ['id'];
$nome = $_POST ['nome'];
$imagem = $_POST ['imagem'];	
$video = $_POST ['video'];	
$data_cadastro = $_POST ['data_cadastro'];
$depoimento = $_POST ['depoimento'];	
$cidade = $_POST ['cidade'];	
$destaque = $_POST ['destaque'];	
$curso = $_POST ['curso'];
$formato = $_POST ['formato'];		
		
$diaatual = date('d');
$mesatual = date('m');	
$anoatual = date('20y');
	

$sql =" 
INSERT INTO `depoimentos` (`id`, `nome`, `data_cadastro`, `video`, `depoimento` , `cidade` , `destaque` ,  `formato`) 
              VALUES (NULL, '$nome', '$diaatual/$mesatual/$anoatual', '$video', '$depoimento' , '$cidade' , '$destaque' , 'Texto');"; 

if ($conn->query($sql) === TRUE) {  
  
  echo"<BR><script language='javascript'>
      function alerta(){
      alert('Depoimento em texto cadastrado com sucesso! ');
      }
      alerta();
      document.location='depoimentos';
      </script></b>";
  
    }}?>
	
	
	
	

<form  action='depoimentos-texto-cadastrar?acao=cadastrar' method='post' enctype='multipart/form-data'>
	

<div class="cut1">
	
<div id="formulario">
<label for="nome">Nome:</label>
<input type="text" name="nome" class="form3" required/>
</div>
		
	
<div id="formulario">
<label for="cidade">Cidade:</label>
<input type="text" name="cidade" class="form3" required/>
</div>	


<div id="formulario">
<label for="destaque">Destaque:</label>
<select name="destaque" class="form3" required/>
<option value="Sim">Sim</option>
<option value="Não">Não</option>
</select>
</div>	

	
<div id="grid12E">
<label for="depoimento">Depoimento:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Descrição completa da Notícia</span>
</div></label>
<textarea class='form4' name='depoimento'/></textarea>
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
	



</body>
</html>