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
<div class="painel-cliente-icone"><img src="img/icons/per.png" width="100%"/></div>
<div class="alinha14"><a href="perguntas-e-respostas">PERGUNTAS E RESPOSTAS</a> >> CADASTRAR </div></div></div>

<div id="grid12F"><div id="painel-banner-botoes-center">	
<div style="display: none"><a href="produtos-filtro"><div class="painel-banner-botoes2"><img src="img/filtro.jpg" width="100%"/></div></a></div>

<a href="perguntas-e-respostas-categorias"><div class="painel-banner-botoes1"><img src="img/categorias.jpg" width="100%"/></div></a>

<a href="perguntas-e-respostas-cadastrar"><div class="painel-banner-botoes1"><a href="perguntas_e_respostas-cadastrar"><img src="img/novo.jpg" width="100%"/></a></div></a>
</div></div></div>

<div id="painel-cliente">
<div class="alinha15">CADASTRAR</div>
	
	
	
<?php

$acao = $_GET ['acao'];
if ($acao=='cadastrar'){

$id = $_POST ['id'];
$pergunta = $_POST ['pergunta'];
$resposta = $_POST ['resposta'];
$categoria = $_POST ['categoria'];	
$data_cadastro = $_POST ['data_cadastro'];

$diaatual = date('d');
$mesatual = date('m');	
$anoatual = date('20y');
	

$sql =" 
INSERT INTO `perguntas_e_respostas` (`id`, `pergunta`, `resposta`, `categoria`, `data_cadastro`) VALUES (NULL, '$pergunta', '$resposta', '$categoria', '$diaatual/$mesatual/$anoatual');"; 

if ($conn->query($sql) === TRUE) {  
  
  echo"<BR><script language='javascript'>
      function alerta(){
      alert('Pergunta cadastrada com sucesso! ');
      }
      alerta();
      document.location='javascript:history.go(-1)';
      </script></b>";
  
    }}?>
	
	
	
	

<form  action='perguntas-e-respostas-cadastrar?acao=cadastrar' method='post' enctype='multipart/form-data'>
	

<div class="cut1">
	
<div id="formulario">
<label for="pergunta">Pergunta:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Pergunta</span>
</div></label>
<input type="text" name="pergunta" class="form3" required/>
</div>
	
	

<div id="formulario">
<label for="categoria">Categoria:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Categoria</span>
</div></label>
<select name="categoria" class="form3" required>
<?php
$sql = "SELECT * FROM categorias WHERE tipo ='perguntas-e-respostas' ORDER BY categoria ASC";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){
$id = $res['id'];
$categoria= $res['categoria']; 
$categoria_slug= $res['categoria_slug']; 
echo "<option value=\"$categoria_slug\">$categoria</option>"; }?>
</select></div>
	


<div id="grid12E">
<label for="resposta">Resposta:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Resposta</span>
</div></label>
<textarea class='form4' name='resposta'/></textarea>
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