<?php
include 'conecta.php';
$sql = "SELECT * FROM paineis";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){
	
$id = $res['id'];
	
$institucional= $res['institucional']; $institucional = utf8_encode($institucional);
$banner= $res['banner']; $banner = utf8_encode($banner);
$servicos= $res['servicos']; $servicos = utf8_encode($servicos);
$produtos= $res['produtos']; $produtos = utf8_encode($produtos);
$noticias= $res['noticias']; $noticias = utf8_encode($noticias);

$clipping= $res['clipping']; $clipping = utf8_encode($clipping);
$clientes= $res['clientes']; $clientes = utf8_encode($clientes);
$artigos= $res['artigos']; $artigos = utf8_encode($artigos);
$arquivos= $res['arquivos']; $arquivos = utf8_encode($arquivos); 
$portfolio= $res['portfolio'];	 $portfolio = utf8_encode($portfolio);  
	
$dicas= $res['dicas']; $dicas = utf8_encode($dicas);
$cadastros= $res['cadastros']; $cadastros = utf8_encode($cadastros); 
$links_uteis= $res['links_uteis']; $links_uteis = utf8_encode($links_uteis);
$receitas= $res['receitas']; $receitas = utf8_encode($receitas);
$recados= $res['recados'];	$recados = utf8_encode($recados);
	
$depoimentos= $res['depoimentos'];$depoimentos = utf8_encode($depoimentos);
$imoveis= $res['imoveis'];$imoveis = utf8_encode($imoveis);
$fotos= $res['fotos'];$fotos = utf8_encode($fotos);
$videos= $res['videos'];$videos = utf8_encode($videos);
$agenda= $res['agenda'];	$agenda = utf8_encode($agenda);
	
$contratante= $res['contratante'];$contratante = utf8_encode($contratante);
$discografia= $res['discografia'];$discografia = utf8_encode($discografia);
		
	
$institucional_n= $res['institucional_n']; $institucional_n = utf8_encode($institucional_n);
$banner_n= $res['banner_n']; $banner_n = utf8_encode($banner_n);
$servicos_n= $res['servicos_n']; $servicos_n = utf8_encode($servicos_n);
$produtos_n= $res['produtos_n']; $produtos_n = utf8_encode($produtos_n);
$noticias_n= $res['noticias_n']; $noticias_n = utf8_encode($noticias_n);

$clipping_n= $res['clipping_n']; $clipping_n = utf8_encode($clipping_n);
$clientes_n= $res['clientes_n']; $clientes_n = utf8_encode($clientes_n);
$artigos_n= $res['artigos_n']; $artigos_n = utf8_encode($artigos_n);
$arquivos_n= $res['arquivos_n']; $arquivos_n = utf8_encode($arquivos_n); 
$portfolio_n= $res['portfolio_n'];	 $portfolio_n = utf8_encode($portfolio_n);  
	
$dicas_n= $res['dicas_n']; $dicas_n = utf8_encode($dicas_n);
$cadastros_n= $res['cadastros_n']; $cadastros_n = utf8_encode($cadastros_n); 
$links_uteis_n= $res['links_uteis_n']; $links_uteis_n = utf8_encode($links_uteis_n);
$receitas_n= $res['receitas_n']; $receitas_n = utf8_encode($receitas_n);
$recados_n= $res['recados_n'];	$recados_n = utf8_encode($recados_n);
	
$depoimentos_n= $res['depoimentos_n'];$depoimentos_n = utf8_encode($depoimentos_n);
$imoveis_n= $res['imoveis_n'];$imoveis_n = utf8_encode($imoveis_n);
$fotos_n= $res['fotos_n'];$fotos_n = utf8_encode($fotos_n);
$videos_n= $res['videos_n'];$videos_n = utf8_encode($videos_n);
$agenda_n= $res['agenda_n'];	$agenda_n = utf8_encode($agenda_n);
	
$contratante_n= $res['contratante_n'];$contratante_n = utf8_encode($contratante_n);
$discografia_n= $res['discografia_n'];$discografia_n = utf8_encode($discografia_n);
}?>


<div id="sistemas-menu-lateral-mobiles"><div class="center"><div class="clearfix">
<div id="grid12"><div class="sistemas-marcador"><img src="img/marcador.png"/></div></div>

<div id="sistemas-menu-links">
<div class="alinha0"> > </div>
<div class="sistemas-menu-icons"><img src="img/icons/acesso.png"/></div>
<div class="alinha4"><a href="dados-de-acesso">DADOS DE ACESSO</a></div>
</div>

<div id="sistemas-menu-links">
<div class="alinha0"><a href="#"> > </a></div>
<div class="sistemas-menu-icons"><img src="img/icons/painel.png"/></div>
<div id="grid12">
<section class="sub-link">
<div><button href="#collapse3" class="nav-togglex sub-link-bottom"><a href="#">FERRAMENTAS PAINEL</a></button></div>
<div id="collapse3" style="display:none">
<div class="alinha10"><a href="ferramentas-painel">+ SELECIONAR FERRAMENTAS</a></div>
<div class="alinha10"><a href="ferramentas-painel-nomes">+ NOMES FERRAMENTAS</a></div>
</div></section></div></div>

<div id="sistemas-menu-links">
<a href="imagens-fixas"><div class="alinha0"> > </div>
<div class="sistemas-menu-icons"><img src="img/icons/redes.png"/></div>
<div class="alinha4"><a href="redes-sociais">REDES SOCIAIS</a></div>
</div>

<div id="sistemas-menu-links">
<div class="alinha0"> > </div>
<div class="sistemas-menu-icons"><img src="img/icons/imagens.png"/></div>
<div class="alinha4"><a href="imagens-fixas">IMAGENS FIXAS</a></div>
</div>

<div id="sistemas-menu-links">
<div class="alinha0"> > </div>
<div class="sistemas-menu-icons"><img src="img/icons/bd.png"/></div>
<div class="alinha4"><a href="banco-de-dados">BANCO DE DADOS</a></div>
</div>

<div id="sistemas-menu-links">
<a href="codigos-php"><div class="alinha0"> > </div>
<div class="sistemas-menu-icons"><img src="img/icons/codigos.png"/></div>
<div id="grid12">
<section class="sub-link">
<div><button href="#collapse4" class="nav-togglexx sub-link-bottom"><a href="#">Códigos PHP</a></button></div>
<div id="collapse4" style="display:none">
<?php if ($institucional=='Sim') {echo"<div class=\"alinha10\"><a href=\"#\">$institucional_n</a></div>";} else {echo"";} ?>
<div class="alinha10"><a href="#">Redes Sociais</a></div>
<div class="alinha10"><a href="#">Imagens</a></div>
</div></section></div>
</div></a>

</div></div></div>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.js"></script>
<script>
$(document).ready(function() {
$('.nav-togglex').click(function(){
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
$('.nav-togglexx').click(function(){
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