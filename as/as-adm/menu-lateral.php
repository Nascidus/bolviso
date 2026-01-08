<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<?php
include 'conecta.php';
$sql = "SELECT * FROM paineis";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){
	
$id = $res['id'];
	
$institucional= $res['institucional']; 
$banner= $res['banner']; 
$servicos= $res['servicos']; 
$produtos= $res['produtos']; 
$noticias= $res['noticias']; 

$clipping= $res['clipping']; 
$clientes= $res['clientes']; 
$artigos= $res['artigos']; 
$arquivos= $res['arquivos']; 
$portfolio= $res['portfolio'];	 
	
$dicas= $res['dicas'];
$cadastros= $res['cadastros']; 
$links_uteis= $res['links_uteis']; 
$receitas= $res['receitas']; 
$recados= $res['recados'];	
	
$depoimentos= $res['depoimentos'];
$imoveis= $res['imoveis'];
$fotos= $res['fotos'];
$videos= $res['videos'];
$agenda= $res['agenda'];
	
$contratante= $res['contratante'];
$discografia= $res['discografia'];
		
	
$institucional_n= $res['institucional_n']; 
$banner_n= $res['banner_n']; 
$servicos_n= $res['servicos_n'];
$produtos_n= $res['produtos_n']; 
$noticias_n= $res['noticias_n']; 

$clipping_n= $res['clipping_n']; 
$clientes_n= $res['clientes_n'];
$artigos_n= $res['artigos_n'];
$arquivos_n= $res['arquivos_n'];
$portfolio_n= $res['portfolio_n'];
	
$dicas_n= $res['dicas_n'];
$cadastros_n= $res['cadastros_n'];
$links_uteis_n= $res['links_uteis_n'];
$receitas_n= $res['receitas_n'];
$recados_n= $res['recados_n'];
	
$depoimentos_n= $res['depoimentos_n'];
$imoveis_n= $res['imoveis_n'];
$fotos_n= $res['fotos_n'];
$videos_n= $res['videos_n'];
$agenda_n= $res['agenda_n'];
	
$contratante_n= $res['contratante_n'];
$discografia_n= $res['discografia_n'];
	
$fotos_empresa= $res['fotos_empresa'];


$cursos= $res['cursos'];
$cursos_n= $res['cursos_n'];	

$equipe= $res['equipe'];
$equipe_n= $res['equipe_n'];


$obras= $res['obras'];
$obras_n= $res['obras_n'];

}?>
	
<div id="sistemas-menu-links">
<a href="dados-de-acesso"><div class="alinha0"> > </div>
<div class="sistemas-menu-icons"><img src="img/icons/acesso.png"/></div>
<div class="alinha4"><a href="dados-de-acesso">Usuário</a></div>
</div></a>

<div id="sistemas-menu-links">
<div class="alinha0"><a href="#"> > </a></div>
<div class="sistemas-menu-icons"><img src="img/icons/painel.png"/></div>
<div id="grid12">
<section class="sub-link">
<div><button href="#collapse1" class="nav-toggle sub-link-bottom"><a href="ferramentas-painel">Ferramentas Painel</a></button></div>
<div id="collapse1" style="display:none">
<div class="alinha10"><a href="ferramentas-painel">Selecionar Ferramentas</a></div>
<div class="alinha10"><a href="ferramentas-painel-nomes">Nomes Ferramentas</a></div>
</div></section></div></div>

<div id="sistemas-menu-links">
<a href="imagens-fixas"><div class="alinha0"> > </div>
<div class="sistemas-menu-icons"><img src="img/icons/redes.png"/></div>
<div class="alinha4"><a href="redes-sociais">Redes Sociais</a></div>
</div>

<div id="sistemas-menu-links">
<a href="imagens-fixas"><div class="alinha0"> > </div>
<div class="sistemas-menu-icons"><img src="img/icons/imagens.png"/></div>
<div class="alinha4"><a href="imagens-fixas">Imagens Fixas</a></div>
</div>

<div id="sistemas-menu-links">
<a href="codigos-php"><div class="alinha0"> > </div>
<div class="sistemas-menu-icons"><img src="img/icons/codigos.png"/></div>
<div id="grid12">
<section class="sub-link">
<div><button href="#collapse2" class="nav-togglee sub-link-bottom"><a href="#">Códigos PHP</a></button></div>
<div id="collapse2" style="display:none">

<?php if ($institucional=='Sim') {echo"<div class=\"alinha10\"><a href=\"institucional-codigos\">$institucional_n</a></div>";} else {echo"";} ?>
<?php if ($fotos_empresa=='Sim') {echo"<div class=\"alinha10\"><a href=\"fotos-empresa-codigos\">Fotos Empresa</a></div>";} else {echo"";} ?>
<?php if ($banner=='Sim') {echo"<div class=\"alinha10\"><a href=\"banner-codigos\">$banner_n</a></div>";} else {echo"";} ?>
<?php if ($servicos=='Sim') {echo"<div class=\"alinha10\"><a href=\"servicos-codigos\">$servicos_n</a></div>";} else {echo"";} ?>
<?php if ($produtos=='Sim') {echo"<div class=\"alinha10\"><a href=\"produtos-codigos\">$produtos_n</a></div>";} else {echo"";} ?>
<?php if ($noticias=='Sim') {echo"<div class=\"alinha10\"><a href=\"noticias-codigos\">$noticias_n</a></div>";} else {echo"";} ?>.
	
<?php if ($clipping=='Sim') {echo"<div class=\"alinha10\"><a href=\"clipping-codigos\">$clipping_n</a></div>";} else {echo"";} ?>
<?php if ($clientes=='Sim') {echo"<div class=\"alinha10\"><a href=\"clientes-codigos\">$clientes_n</a></div>";} else {echo"";} ?>
<?php if ($artigos=='Sim') {echo"<div class=\"alinha10\"><a href=\"artigos-codigos\">$artigos_n</a></div>";} else {echo"";} ?>
<?php if ($arquivos=='Sim') {echo"<div class=\"alinha10\"><a href=\"arquivos-codigos\">$arquivos_n</a></div>";} else {echo"";} ?>
<?php if ($portfolio=='Sim') {echo"<div class=\"alinha10\"><a href=\"portfolio-codigos\">$portfolio_n</a></div>";} else {echo"";} ?>
	
<?php if ($dicas=='Sim') {echo"<div class=\"alinha10\"><a href=\"dicas-codigos\">$dicas_n</a></div>";} else {echo"";} ?>
<?php if ($cadastros=='Sim') {echo"<div class=\"alinha10\"><a href=\"cadastros-codigos\">$cadastros_n</a></div>";} else {echo"";} ?>
<?php if ($links_uteis=='Sim') {echo"<div class=\"alinha10\"><a href=\"links-uteis-codigos\">$links_uteis_n</a></div>";} else {echo"";} ?>
<?php if ($receitas=='Sim') {echo"<div class=\"alinha10\"><a href=\"receitas-codigos\">$receitas_n</a></div>";} else {echo"";} ?>
<?php if ($recados=='Sim') {echo"<div class=\"alinha10\"><a href=\"recados-codigos\">$recados_n</a></div>";} else {echo"";} ?>

<?php if ($equipe=='Sim') {echo"<div class=\"alinha10\"><a href=\"equipe-codigos\">$equipe_n</a></div>";} else {echo"";} ?>
	
<?php if ($depoimentos=='Sim') {echo"<div class=\"alinha10\"><a href=\"depoimentos-codigos\">$depoimentos_n</a></div>";} else {echo"";} ?>
<?php if ($imoveis=='Sim') {echo"<div class=\"alinha10\"><a href=\"imoveis-codigos\">$imoveis_n</a></div>";} else {echo"";} ?>
<?php if ($fotos=='Sim') {echo"<div class=\"alinha10\"><a href=\"fotos-codigos\">$fotos_n</a></div>";} else {echo"";} ?>
<?php if ($videos=='Sim') {echo"<div class=\"alinha10\"><a href=\"videos-codigos\">$videos_n</a></div>";} else {echo"";} ?>
<?php if ($agenda=='Sim') {echo"<div class=\"alinha10\"><a href=\"agenda-codigos\">$agenda_n</a></div>";} else {echo"";} ?>
<?php if ($contratante=='Sim') {echo"<div class=\"alinha10\"><a href=\"contratante-codigos\">$contratante_n</a></div>";} else {echo"";} ?>

<?php if ($discografia=='Sim') {echo"<div class=\"alinha10\"><a href=\"discografia-codigos\">$discografia_n</a></div>";} else {echo"";} ?>

<?php if ($cursos=='Sim') {echo"<div class=\"alinha10\"><a href=\"cursos-codigos\">$cursos_n</a></div>";} else {echo"";} ?>
 
<div class="alinha10"><a href="redes-sociais-codigos">Redes Sociais</a></div>
<div class="alinha10"><a href="imagens-codigos">Imagens</a></div>
<div class="alinha10"><a href="google-codigos">Google</a></div>
<div class="alinha10"><a href="facebook-codigos">Facebook</a></div>
</div></section></div>
</div></a>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.js"></script>
<script>
$(document).ready(function() {
$('.nav-toggle').click(function(){
//get collapse content selector
var collapse_content_selector = $(this).attr('href');
//make the collapse content to be shown or hide
var toggle_switch = $(this);
$(collapse_content_selector).toggle(function(){
if($(this).css('display')=='none'){
//change the button label to be 'Show'
toggle_switch.html('Ferramentas Painel');
}else{
//change the button label to be 'Hide'
toggle_switch.html('Ferramentas Painel');
}});});});
</script>

<script>
$(document).ready(function() {
$('.nav-togglee').click(function(){
//get collapse content selector
var collapse_content_selector = $(this).attr('href');
//make the collapse content to be shown or hide
var toggle_switch = $(this);
$(collapse_content_selector).toggle(function(){
if($(this).css('display')=='none'){
//change the button label to be 'Show'
toggle_switch.html('Códigos PHP');
}else{
//change the button label to be 'Hide'
toggle_switch.html('Códigos PHP');
}});});});
</script>