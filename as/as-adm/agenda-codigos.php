<!doctype html>
<html>
<head>
	<?php  include'head.php'; include'verifica.php'; include'conecta.php';?>	
</head>

<body>
    <?php  include'topo-mobile.php';?>

    <?php  include'topo.php';?>	

	<?php  include'menu-lateral-mobiles.php';?>

<div class="center"><div class="clearfix">
	
<div id="sistemas-infos">
	
<div id="grid12">		
<div class="ferramentas-painel-logo"><img src="img/icons/videos.png" width="100%"/></div>
<div class="alinha6">AGENDA CÓDIGOS</div>
</div>
		
<div id="ferramentas-painel-padding">
	
<div id="codigos_php"><strong>Nome do Banco de Dados:</strong> agenda</div>	
		


<div id="codigos_php">
<strong>Data:</strong> $data<BR><BR>
<strong>Data Invertida:</strong> $data_invertida<BR><BR>
<strong>Título do Evento:</strong> $titulo<BR><BR>
<strong>Local do Evento:</strong> $local<BR><BR>
<strong>Horário:</strong> $horario<BR><BR>
<strong>Mapa de Localização:</strong> $mapa<BR><BR>
<strong>Dia:</strong> $dia<BR><BR>
<strong>Mês:</strong> $mes<BR><BR>
<strong>Ano:</strong> $ano<BR><BR>
</div>
	
	
<div id="codigos_php"><strong>Exemplo de Utilização:</strong>
<br><br><br> Dentro do site na exibição da agenda iremos utilizar somente as datas que são do dia atual para frente, segue código<br><br>
SELECT * FROM agenda WHERE '$data_atual' <= data_invertida ORDER BY id ASC<br><br>	
</div>	
	
	
<div id="codigos_php"><strong>Código para inversão de variável de numerais para nome dos meses:</strong><br><br>

if ($mes=='01'){echo"JANEIRO";}<br>
if ($mes=='02'){echo"FEVEIRO";}<br>
if ($mes=='03'){echo"MARÇO";}<br>
if ($mes=='04'){echo"ABRIL";}<br>
if ($mes=='05'){echo"MAIO";}<br>
if ($mes=='06'){echo"JUNHO";}<br>
if ($mes=='07'){echo"JULHO";}<br>
if ($mes=='08'){echo"AGOSTO";}<br>
if ($mes=='09'){echo"SETEMBRO";}<br>
if ($mes=='10'){echo"OUTUBRO";}<br>
if ($mes=='11'){echo"NOVEMBRO";}<br>
if ($mes=='12'){echo"DEZEMBRO";}<br>
	
	
<br><br>	
</div>	

	
</div></div>
	 
	

	
	

<div id="sistemas-menu-lateral">
<div id="grid12"><div class="sistemas-marcador"><img src="img/marcador.png"/></div></div>
	<?php  include'menu-lateral.php';?>
	
</div></div></div>
	
	
	
	
</body>
</html>