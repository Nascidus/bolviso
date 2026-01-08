<?php
session_start();
if((!isset($_SESSION['login']))
AND (!isset($_SESSION['senha'])))
Header("Location: index.php?erro=logar");
$login = $_SESSION['login'];
$senha = $_SESSION['senha'];  
?>
<!doctype html>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<?php
include'conecta.php';
$sql = "SELECT * FROM paineis ORDER BY id DESC";
$comando = mysqli_query($conn, $sql);

while($res = mysqli_fetch_assoc($comando)){
	
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
$fotos_empresa= $res['fotos_empresa'];		
	
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

$cursos= $res['cursos'];
$cursos_n= $res['cursos_n'];

$equipe= $res['equipe'];
$equipe_n= $res['equipe_n'];

$obras= $res['obras'];
$obras_n= $res['obras_n'];

$acompanhamento_obra= $res['acompanhamento_obra'];
$acompanhamento_obra_n= $res['acompanhamento_obra_n'];

$filiais= $res['filiais'];
$filiais_n= $res['filiais_n'];

$exames= $res['exames'];
$exames_n= $res['exames_n'];

$perguntas_e_respostas= $res['perguntas_e_respostas'];
$perguntas_e_respostas_n= $res['perguntas_e_respostas_n'];

$projetos= $res['projetos'];
$projetos_n= $res['projetos_n'];

$tratamentos= $res['tratamentos'];
$tratamentos_n= $res['tratamentos_n'];

$vagas= $res['vagas'];
$vagas_n= $res['vagas_n'];

$onde_encontrar= $res['onde_encontrar'];
$onde_encontrar_n= $res['onde_encontrar_n'];

$antes_e_depois= $res['antes_e_depois'];
$antes_e_depois_n= $res['antes_e_depois_n'];

$downloads= $res['downloads'];
$downloads_n= $res['downloads_n'];
	
?>



<?php if ($institucional=='Sim'){echo"<div id=\"sistemas-menu-links\">
<a href=\"institucional\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/institucional.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"institucional\">$institucional_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($fotos_empresa=='Sim'){echo"<div id=\"sistemas-menu-links\">
<a href=\"fotos_empresa\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/fotos.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"fotos-empresa\">Fotos da Empresa</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($filiais=='Sim'){echo"<div id=\"sistemas-menu-links\">
<a href=\"filiais\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/filiais.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"filiais\">Filiais</a></div>
</div></a>";} else {echo"";} ?>



<?php if ($onde_encontrar=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"onde-encontrar\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/onde-encontrar.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"onde-encontrar\">$onde_encontrar_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($banner=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"banner\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/banner.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"banner\">$banner_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($servicos=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"servicos\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/servicos.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"servicos\">$servicos_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($produtos=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"produtos\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/produtos.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"produtos\">$produtos_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($exames=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"exames\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/exames.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"exames\">$exames_n</a></div>
</div></a>";} else {echo"";} ?>



<?php if ($tratamentos=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"tratamentos\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/exames.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"tratamentos\">$tratamentos_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($vagas=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"vagas\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/banner.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"vagas_editar\">$vagas_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($noticias=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"noticias\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/noticias.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"noticias\">$noticias_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($equipe=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"equipe\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/clientes.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"equipe\">$equipe_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($clipping=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"clipping\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/clipping.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"clipping\">$clipping_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($clientes=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"clientes\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/clientes.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"clientes\">$clientes_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($perguntas_e_respostas=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"perguntas-e-respostas\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/per.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"perguntas-e-respostas\">$perguntas_e_respostas_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($artigos=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"artigos\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/artigos.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"artigos\">$artigos_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($projetos=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"projetos\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/projetos.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"projetos\">$projetos_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($portfolio=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"portfolio\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/portfolio.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"portfolio\">Portfólio</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($dicas=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"dicas\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/dicas.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"dicas\">$dicas_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($cadastros=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"cadastros\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/cadastros.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"cadastros\">$cadastros_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($links_uteis=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"links-uteis\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/linksuteis.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"links-uteis\">$links_uteis_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($receitas=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"receitas\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/receitas.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"receitas\">$receitas_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($recados=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"recados\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/recados.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"recados\">$recados_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($depoimentos=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"depoimentos\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/depoimentos.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"depoimentos\">$depoimentos_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($imoveis=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"imoveis\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/imoveis.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"imoveis\">$imoveis_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($fotos=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"fotos\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/fotos.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"fotos\">$fotos_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($videos=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"videos\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/videos.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"videos\">$videos_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($agenda=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"agenda\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/agenda.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"agenda\">$agenda_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($contratante=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"contratante\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/contratante.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"contratante\">$contratante_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($discografia=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"discografia\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/discografia.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"discografia\">$discografia_n</a></div>
</div></a>";} else {echo"";} ?>



<?php if ($cursos=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"cursos\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/cursos.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"cursos\">$cursos_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($antes_e_depois=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"antes-e-depois\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/antes_e_depois.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"antes-e-depois\">$antes_e_depois_n</a></div>
</div></a>";} else {echo"";} ?>



<?php if ($obras=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"acompanhamento-obras\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/obras.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"acompanhamento-obras\">$obras_n</a></div>
</div></a>";} else {echo"";} ?>



<?php if ($acompanhamento_obra=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"acompanhamento-obras-completo\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/obras.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"acompanhamento-obras-completo\">$acompanhamento_obra_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($downloads=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"downloads\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/download.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"downloads\">$downloads_n</a></div>
</div></a>";} else {echo"";} ?>


<div id="sistemas-menu-links" style="display: none;">
<a href="bancodeimagens"><div class="alinha0"> </div>
<div class="sistemas-menu-icons"><img src="img/icons/banner.png" width="100%"/></div>
<div class="alinha4"><a href="bancodeimagens">Banco de Imagens </a></div>
</div></a>


<div id="sistemas-menu-links">
<a href="google"><div class="alinha0"> </div>
<div class="sistemas-menu-icons"><img src="img/icons/google.png" width="100%"/></div>
<div class="alinha4"><a href="google">Google </a></div>
</div></a>



<div id="sistemas-menu-links">
<a href="meta-tags-facebook"><div class="alinha0"></div>
<div class="sistemas-menu-icons"><img src="img/icons/facebook.png" width="100%"/></div>
<div class="alinha4"><a href="meta-tags-facebook">Meta Tags Facebook</a></div>
</div></a>


<div id="sistemas-menu-links">
<a href="meta-tags-facebook"><div class="alinha0"></div>
<div class="sistemas-menu-icons"><img src="img/icons/redes.png" width="100%"/></div>
<div class="alinha4"><a href="redes-sociais">Redes Sociais</a></div>
</div></a>


<?php } ?>

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

</div>