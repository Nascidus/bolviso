<?php session_start(); if((!isset($_SESSION[login])) AND (!isset($_SESSION[senha])))Header("Location: index.php?erro=logar");
$login = $_SESSION['login'];
$senha = $_SESSION['senha'];  
?>

<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<?php  include'head.php';?>	
</head>


<script type="text/javascript" src="jquery-1.7.1.min.js"></script>
	<script type="text/javascript">	
		
		$(document).ready(function () {
		
			$.getJSON('estados_cidades.json', function (data) {

				var items = [];
				var options = '<option value="">Escolha um estado</option>';	

				$.each(data, function (key, val) {
					options += '<option value="' + val.nome + '">' + val.nome + '</option>';
				});					
				$("#estados").html(options);				
				
				$("#estados").change(function () {				
				
					var options_cidades = '';
					var str = "";					
					
					$("#estados option:selected").each(function () {
						str += $(this).text();
					});
					
					$.each(data, function (key, val) {
						if(val.nome == str) {							
							$.each(val.cidades, function (key_city, val_city) {
								options_cidades += '<option value="' + val_city + '">' + val_city + '</option>';
							});							
						}
					});

					$("#cidades").html(options_cidades);
					
				}).change();		
			
			});
		
		});
		
	</script>		

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
<div class="painel-cliente-icone"><img src="img/icons/onde-encontrar.png" width="100%"/></div>
<div class="alinha14"><a href="fotos">ONDE ENCONTRAR</a> >> EDITAR</div></div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">
<div style="display: none"><a href="banner-filtro"><div class="painel-banner-botoes2"><img src="img/filtro.jpg" width="100%"/></div></a></div>
<div style="display: none"><div class="painel-banner-botoes1"><a href="banner-categorias"><img src="img/categorias.jpg" width="100%"/></a></div></div>
<div class="painel-banner-botoes1"><a href="videos-cadastrar.php"><img src="img/novo.jpg" width="100%"/></a></div>
</div></div></div>

<div id="painel-cliente">
<div class="alinha15">EDITAR LOCAL SELECIONADO</div>

<div class="cut1">
	
<?php
$id =$_GET['id'];
$sql = "SELECT * FROM onde_encontrar WHERE id = $id";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){

$id = $res['id'];
$nome = $res ['nome'];
$telefone = $res ['telefone'];
$whatsapp = $res ['whatsapp'];	
$endereco = $res ['endereco'];
$cidade = $res ['cidade'];	
$estado = $res ['estado'];	
$mapa = $res ['mapa'];	
$marca = $res ['marca'];	
$i++;
	
echo"	

<form action='onde-encontrar-editar?acao=alterar&id=$id' method='post'>


<div id=\"formulario\">
<label for=\"marca\">Marca:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Marca / Produto</span>
</div></label>
<select name=\"marca\" class=\"form3\"  required >
<option value=\"$marca\">$marca</option>
			<option value=\"Fraldas Panda\">Fraldas Panda</option>
			<option value=\"Fraldas Kisses\">Fraldas Kisses</option>
		</select>
</div>


	
<div id=\"formulario\">
<label for=\"nome\">Nome:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Nome da Empresa</span>
</div></label>
<input type=\"text\" name=\"nome\" value=\"$nome\" class=\"form3\" required/>
</div>
	
	
<div id=\"formulario\">
<label for=\"telefone\">Telefone:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Telefone (xx) xxxx-xxxx</span>
</div></label>
<input type=\"text\" name=\"telefone\" value=\"$telefone\" class=\"form3\" required/>
</div>
	
	
	
<div id=\"formulario\">
<label for=\"whatsapp\">WhatsApp:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Whatsapp (xx)xxxxxxxx</span>
</div></label>
<input type=\"text\" name=\"whatsapp\" value=\"$whatsapp\" class=\"form3\" required/>
</div>
	

<div id=\"formulario\">
<label for=\"endereco\">Endereço:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Endereço</span>
</div></label>
<input type=\"text\" name=\"endereco\" value=\"$endereco\" class=\"form3\" required/>
</div>


<div id=\"formulario\">
<label for=\"estado\">Estado:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Estado: $estado</span>
</div></label>
<select id=\"estados\" name=\"estado\" class=\"form3\"   >
<option value=\"$estado\">$estado</option>
<option value=\"\"></option>
</select>
</div>



<div id=\"formulario\">
<label for=\"cidade\">Cidade:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Cidade: $cidade</span>
</div></label>
<select id=\"cidades\" name=\"cidade\" class=\"form3\" >
<option value=\"$cidade\">$cidade</option>
</select>
</div>





<div id=\"grid12E\">
<label for=\"desc\">Mapa de Localização:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Embeed Google Maps</span>
</div></label>
<textarea class='form4' name='mapa'/>$mapa</textarea>
</div>	
	
	
"; }?>
	
	
</div>
	
	
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
$nome = $_POST ['nome'];
$telefone = $_POST ['telefone'];
$whatsapp = $_POST ['whatsapp'];	
$endereco = $_POST ['endereco'];
$cidade = $_POST ['cidade'];	
$estado = $_POST ['estado'];	
$mapa = $_POST ['mapa'];	
$marca = $_POST ['marca'];	

$caminho = "<script language='javascript'>function alerta(){alert('Dados Alterados com Sucesso!'); }alerta();document.location='onde-encontrar';</script>";

$id = $_GET['id'];
$sql="UPDATE `onde_encontrar` SET
`nome` =  '$nome', 
`telefone` =  '$telefone',
`whatsapp` =  '$whatsapp',
`endereco` =  '$endereco',
`cidade` =  '$cidade',
`estado` =  '$estado',
`marca` =  '$marca',
`mapa` =  '$mapa'
 WHERE  `id` ='$id'; ";

if ($conn->query($sql) === TRUE) {

echo"$caminho";}

else{ echo "<script language='javascript'>function alerta(){alert('Erro Econtrado!');}alerta();document.location='javascript:history.go(-1)';</script>";

}}?>


</body>
</html>