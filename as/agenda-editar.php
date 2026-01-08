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

<div class="center"><div class="clearfix">
<div id="sistemas-infos">

<div id="painel-banner">
<div id="painel-banner-padding">
<div id="grid12">
<div class="painel-cliente-icone"><img src="img/icons/agenda.png" width="100%"/></div>
<div class="alinha14"><a href="agenda">AGENDA</a> >> EDITAR</div></div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">
<div style="display: none"><a href="banner-filtro"><div class="painel-banner-botoes2"><img src="img/filtro.jpg" width="100%"/></div></a></div>
<div style="display: none"><div class="painel-banner-botoes1"><a href="banner-categorias"><img src="img/categorias.jpg" width="100%"/></a></div></div>
<div class="painel-banner-botoes1"><a href="agenda-cadastrar.php"><img src="img/novo.jpg" width="100%"/></a></div>
</div></div></div>

<div id="painel-cliente">



<div class="alinha15">IMAGEM AGENDA</div>

<div class="cut3">	
<?php
$id =$_GET['id'];
$sql = "SELECT * FROM agenda WHERE id = $id";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){
$id = $res ['id'];
$imagem = $res ['imagem'];
	
echo"
<div style=\"width: 16%; background-color: ; float: left; padding: 10px;\">";

if ($imagem ==''){echo"<img src='avatar.jpg'  width='96%' border='0' >

<a href=\"agenda-editar-capa?&id=$id\">	
<div id=\"grid12\">
<div class=\"cadastrar\">
<input type=\"submit\" name=\"submit\" style=\"cursor:pointer\" class=\"cadastrar\" value=\"INSERIR IMAGEM\"/>
</div></div></a>";}

else {echo"<img src='../img2/agenda/$imagem' width='96%' border='0'>

<a href=\"projetos-editar-capa?&id=$id\">	
<div id=\"grid12\">
<div class=\"cadastrar\">
<input type=\"submit\" name=\"submit\" style=\"cursor:pointer\" class=\"cadastrar\" value=\"ALTERAR IMAGEM\">
</div></div></a>"; }  

echo"</div>";  }?>
</div>



<div class="alinha15" style="margin-top: 50px;">EDITAR DATA SELECIONADA</div>

<div class="cut1">
	
<?php
$id =$_GET['id'];
$sql = "SELECT * FROM agenda WHERE id = $id";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){

$id = $res ['id'];
$data = $res ['data'];
$data_invertida = $res ['data_invertida'];
$titulo = $res ['titulo'];
$local = $res ['local'];	
$horario = $res ['horario'];	
$imagem = $res ['imagem'];
$dia = $res ['dia'];
$mes = $res ['mes'];
$ano = $res ['ano'];
$categoria = $res ['categoria'];
$desc = $res ['desc'];
$i++;
	
echo"	

<form action='agenda-editar?acao=alterar&id=$id' method='post'>
	
	
	


	
<div id=\"formulario\">
<label for=\"titulo\">Título do Evento:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Título ou nome do evento</span>
</div></label>
<input type=\"text\" name=\"titulo\" value=\"$titulo\" class=\"form3\" required/>
</div>
	
	
	

<div id=\"formulario\">
<label style=\"width: 100%; float: left;\" for=\"data\">Data:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Selecione  a data do evento</span>
</div></label>
	
	 
<select name=\"dia\" class=\"form13\" required>
<option value=\"$dia\">$dia</option>	
<option value=\"01\">01</option>	
<option value=\"02\">02</option>	
<option value=\"03\">03</option>	
<option value=\"04\">04</option>	
<option value=\"05\">05</option>	
<option value=\"06\">06</option>	
<option value=\"07\">07</option>	
<option value=\"08\">08</option>	
<option value=\"09\">09</option>	
<option value=\"10\">10</option>	
<option value=\"11\">11</option>	
<option value=\"12\">12</option>	
<option value=\"13\">13</option>	
<option value=\"14\">14</option>	
<option value=\"15\">15</option>	
<option value=\"16\">16</option>	
<option value=\"17\">17</option>	
<option value=\"18\">18</option>	
<option value=\"19\">19</option>	
<option value=\"20\">20</option>	
<option value=\"21\">21</option>	
<option value=\"22\">22</option>	
<option value=\"23\">23</option>	
<option value=\"24\">24</option>	
<option value=\"25\">25</option>	
<option value=\"26\">26</option>	
<option value=\"27\">27</option>	
<option value=\"28\">28</option>	
<option value=\"29\">29</option>	
<option value=\"30\">30</option>	
<option value=\"31\">31</option>		
</select>
	
	
	
	
<select name=\"mes\" class=\"form13\" required>
<option value=\"$mes\">$mes</option>	
<option value=\"01\">01</option>	
<option value=\"02\">02</option>	
<option value=\"03\">03</option>	
<option value=\"04\">04</option>	
<option value=\"05\">05</option>	
<option value=\"06\">06</option>	
<option value=\"07\">07</option>	
<option value=\"08\">08</option>	
<option value=\"09\">09</option>	
<option value=\"10\">10</option>	
<option value=\"11\">11</option>	
<option value=\"12\">12</option>		
</select>
	
	
<select name=\"ano\" class=\"form13\" required>
<option value=\"$ano\">$ano</option>	
</select>
	
</div>
	
	


	
<div id=\"formulario\">
<label for=\"categoria\">Categoria:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Categoria do Produto</span>
</div></label>
<select name=\"categoria\" class=\"form3\" required>
<option value=\"$categoria\">$categoria</option>";

$sql2 = "SELECT * FROM categorias WHERE tipo ='agenda' ORDER BY categoria ASC";
$comando2 = mysqli_query($conn, $sql2);
while($res = mysqli_fetch_assoc($comando2)){
$id = $res['id'];
$categoria= $res['categoria']; 
$categoria_slug= $res['categoria_slug']; 
echo "<option value=\"$categoria_slug\">$categoria</option>"; }

echo"
</select></div>


<div style=\"display: none;\">
	
<div id=\"formulario\">
<label for=\"local\">Local:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Local do Evento</span>
</div></label>
<input type=\"text\" name=\"local\" value=\"$local\" class=\"form3\" />
</div>
	
	
<div id=\"formulario\">
<label for=\"horario\">Horário:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Horário do evento</span>
</div></label>
<input type=\"time\" name=\"horario\" value=\"$horario\" class=\"form3\" />
</div>	
	
</div>	



<div id=\"grid12E\">
<label for=\"desc\">Descrição do Evento:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Descrição do Evento</span>
</div></label>
<textarea class='form4' name='desc'/>$desc</textarea>
</div>	
	

	
"; }?>
	
	
</div>
	-
	
<div id="grid12"><div class="cadastrar"><input type="submit" name="submit" style="cursor:pointer" class="cadastrar" value="EDITAR"/></div></div>
</div></div></form>

<div id="sistemas-menu-lateral">
<div id="grid12"><div class="sistemas-marcador"><img src="img/marcador.png"/></div></div>
	<?php  include'menu-lateral.php';?>
</div></div></div>

<?php  include'menu-lateral-mobiles.php';?>
	
	

	
<?php

$acao = $_GET['acao'];
$id = $_GET['id'];

if ($acao == 'alterar'){

$id = $_POST ['id'];
$data = $_POST ['data'];
$data_invertida = $_POST ['data_invertida'];
$titulo = $_POST ['titulo'];
$local = $_POST ['local'];	
$horario = $_POST ['horario'];	
$mapa = $_POST ['mapa'];	
$dia = $_POST ['dia'];
$mes = $_POST ['mes'];
$ano = $_POST ['ano'];
$categoria = $_POST ['categoria'];
$desc = $_POST ['desc'];

$caminho = "<script language='javascript'>function alerta(){alert('Dados Alterados com Sucesso!'); }alerta();document.location='agenda';</script>";

$id = $_GET['id'];
$sql="UPDATE `agenda` SET
`data` =  '$dia/$mes/$ano', 
`data_invertida` =  '$ano/$mes/$dia', 
`titulo` =  '$titulo', 
`local` =  '$local', 
`horario` =  '$horario', 
`mapa` =  '$mapa',
`dia` =  '$dia',
`categoria` =  '$categoria',
`desc` =  '$desc',
`mes` =  '$mes',
`ano` =  '$ano'
 WHERE  `id` ='$id'; ";

if ($conn->query($sql) === TRUE) {

echo"$caminho";}

else{ echo "<script language='javascript'>function alerta(){alert('Erro Econtrado!');}alerta();document.location='javascript:history.go(-1)';</script>";

}}?>




</body>
</html>