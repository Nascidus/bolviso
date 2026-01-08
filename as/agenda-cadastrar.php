<?php session_start(); if((!isset($_SESSION[login])) AND (!isset($_SESSION[senha])))Header("Location: index.php?erro=logar");
$login = $_SESSION['login'];
$senha = $_SESSION['senha'];  
?>
<!doctype html>
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
<div class="painel-cliente-icone"><img src="img/icons/agenda.png" width="100%"/></div>
<div class="alinha14"><a href="agenda">AGENDA</a> >> CADASTRAR </div></div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">
<div style="display: none"><a href="banner-filtro"><div class="painel-banner-botoes2"><img src="img/filtro.jpg" width="100%"/></div></a></div>
<div style="display: none"><a href="produtos-categorias"><div class="painel-banner-botoes1"><img src="img/categorias.jpg" width="100%"/></div></a></div>
<a href="agenda-cadastrar"><div class="painel-banner-botoes1"><img src="img/novo.jpg" width="100%"/></div></a>
</div></div></div>

<div id="painel-cliente">
<div class="alinha15">CADASTRAR</div>
	
	
	
<?php

$acao = $_GET ['acao'];
if ($acao=='cadastrar'){

$id = $_POST ['id'];
$data = $_POST ['data'];
$data_invertida = $_POST ['data_invertida'];
$titulo = $_POST ['titulo'];
$local = $_POST ['local'];	
$horario = $_POST ['horario'];	
$mapa = $_POST ['mapa'];
$desc = $_POST ['desc'];	
$categoria = $_POST ['categoria'];
	
$dia = $_POST ['dia'];
$mes = $_POST ['mes'];
$ano = $_POST ['ano'];
$anoatual = date('20y');
$proximoano =  '2020';

	
$sql =" 
INSERT INTO `agenda` (`id`, `data`, `data_invertida`, `titulo`, `local`, `horario`, `mapa` , `dia` , `mes` , `ano` ,  `desc` ,  `categoria`  ) 
              VALUES (NULL, '$dia/$mes/$ano', '$ano/$mes/$dia', '$titulo', '$local', '$horario', '$mapa' , '$dia' , '$mes' , '$ano' , '$desc' , '$categoria');"; 

if ($conn->query($sql) === TRUE) {  
  
  echo"<BR><script language='javascript'>
      function alerta(){
      alert('Agenda cadastrada com sucesso! ');
      }
      alerta();
      document.location='javascript:history.go(-1)';
      </script></b>";
  
    }}?>

	
	
	
	

<form  action='agenda-cadastrar?acao=cadastrar' method='post' enctype='multipart/form-data'>
	

<div class="cut1">
	
<div id="formulario">
<label for="titulo">Título do Evento:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Título ou nome do evento</span>
</div></label>
<input type="text" name="titulo" class="form3" required/>
</div>
	
	
	

<div id="formulario">
<label style="width: 100%; float: left;" for="data">Data:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Selecione a data do evento</span>
</div></label>
	
	
<select name="dia" class="form13" required>
<option value="01">01</option>	
<option value="02">02</option>	
<option value="03">03</option>	
<option value="04">04</option>	
<option value="05">05</option>	
<option value="06">06</option>	
<option value="07">07</option>	
<option value="08">08</option>	
<option value="09">09</option>	
<option value="10">10</option>	
<option value="11">11</option>	
<option value="12">12</option>	
<option value="13">13</option>	
<option value="14">14</option>	
<option value="15">15</option>	
<option value="16">16</option>	
<option value="17">17</option>	
<option value="18">18</option>	
<option value="19">19</option>	
<option value="20">20</option>	
<option value="21">21</option>	
<option value="22">22</option>	
<option value="23">23</option>	
<option value="24">24</option>	
<option value="25">25</option>	
<option value="26">26</option>	
<option value="27">27</option>	
<option value="28">28</option>	
<option value="29">29</option>	
<option value="30">30</option>	
<option value="31">31</option>		
</select>
	
	
<select name="mes" class="form13" required>
<option value="01">01</option>	
<option value="02">02</option>	
<option value="03">03</option>	
<option value="04">04</option>	
<option value="05">05</option>	
<option value="06">06</option>	
<option value="07">07</option>	
<option value="08">08</option>	
<option value="09">09</option>	
<option value="10">10</option>	
<option value="11">11</option>	
<option value="12">12</option>	
</select>
		
<select name="ano" class="form13" required>
<option value="<?php echo"$anoatual";?>"><?php echo"$anoatual";?></option>	
</select>
</div>
	
	

<div id="formulario">
<label for="categoria">Categoria:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Categoria</span>
</div></label>
<select name="categoria" class="form3" required>
<?php
$sql = "SELECT * FROM categorias WHERE tipo ='agenda' ORDER BY categoria ASC";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){
$id = $res['id'];
$categoria= $res['categoria']; 
$categoria_slug= $res['categoria_slug']; 
echo "<option value=\"$categoria_slug\">$categoria</option>"; }?>
</select></div>
	
	
<div style="display: none;">
<div id="formulario">
<label for="local">Local:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Local do Evento</span>
</div></label>
<input type="text" name="local" class="form3" />
</div>
	
	
<div id="formulario">
<label for="horario">Horário:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Horário do evento</span>
</div></label>
<input type="time" name="horario" class="form3" />
</div>	</div>	
	


<div id="grid12E">
<label for="desc">Descrição do Evento:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Mapa do Google Maps</span>
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