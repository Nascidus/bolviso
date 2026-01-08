<?php
// menu-lateral.php - arquivo incluído, não deve fazer redirecionamentos
// Verifica se $conn existe, senão inclui conecta.php
if (!isset($conn)) {
    include'conecta.php';
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<?php
// Usa variáveis locais para evitar conflito com variáveis de outros arquivos (como cadastros.php)
$sql_menu = "SELECT * FROM paineis ORDER BY id DESC";
$comando_menu = mysqli_query($conn, $sql_menu);

while($res_menu = mysqli_fetch_assoc($comando_menu)){
	
$institucional= $res_menu['institucional']; 
$banner= $res_menu['banner']; 
$servicos= $res_menu['servicos']; 
$produtos= $res_menu['produtos']; 
$noticias= $res_menu['noticias']; 

$clipping= $res_menu['clipping']; 
$clientes= $res_menu['clientes']; 
$artigos= $res_menu['artigos']; 
$arquivos= $res_menu['arquivos']; 
$portfolio= $res_menu['portfolio'];	 
	
$dicas= $res_menu['dicas']; 
$cadastros= $res_menu['cadastros'];  
$links_uteis= $res_menu['links_uteis']; 
$receitas= $res_menu['receitas']; 
$recados= $res_menu['recados'];	
	
$depoimentos= $res_menu['depoimentos'];
$imoveis= $res_menu['imoveis'];
$fotos= $res_menu['fotos'];
$videos= $res_menu['videos'];
$agenda= $res_menu['agenda'];	
	
$contratante= $res_menu['contratante'];
$discografia= $res_menu['discografia'];
$fotos_empresa= $res_menu['fotos_empresa'];		
	
$institucional_n= $res_menu['institucional_n']; 
$banner_n= $res_menu['banner_n'];
$servicos_n= $res_menu['servicos_n']; 
$produtos_n= $res_menu['produtos_n']; 
$noticias_n= $res_menu['noticias_n']; 

$clipping_n= $res_menu['clipping_n']; 
$clientes_n= $res_menu['clientes_n']; 
$artigos_n= $res_menu['artigos_n']; 
$arquivos_n= $res_menu['arquivos_n']; 
$portfolio_n= $res_menu['portfolio_n'];	 
	
$dicas_n= $res_menu['dicas_n'];
$cadastros_n= $res_menu['cadastros_n']; 
$links_uteis_n= $res_menu['links_uteis_n']; 
$receitas_n= $res_menu['receitas_n']; 
$recados_n= $res_menu['recados_n'];	
	
$depoimentos_n= $res_menu['depoimentos_n'];
$imoveis_n= $res_menu['imoveis_n'];
$fotos_n= $res_menu['fotos_n'];
$videos_n= $res_menu['videos_n'];
$agenda_n= $res_menu['agenda_n'];	
	
$contratante_n= $res_menu['contratante_n'];
$discografia_n= $res_menu['discografia_n'];

$cursos= $res_menu['cursos'];
$cursos_n= $res_menu['cursos_n'];

$equipe= $res_menu['equipe'];
$equipe_n= $res_menu['equipe_n'];

$obras= $res_menu['obras'];
$obras_n= $res_menu['obras_n'];

$acompanhamento_obra= $res_menu['acompanhamento_obra'];
$acompanhamento_obra_n= $res_menu['acompanhamento_obra_n'];

$filiais= $res_menu['filiais'];
$filiais_n= $res_menu['filiais_n'];

$exames= $res_menu['exames'];
$exames_n= $res_menu['exames_n'];

$perguntas_e_respostas= $res_menu['perguntas_e_respostas'];
$perguntas_e_respostas_n= $res_menu['perguntas_e_respostas_n'];

$projetos= $res_menu['projetos'];
$projetos_n= $res_menu['projetos_n'];

$tratamentos= $res_menu['tratamentos'];
$tratamentos_n= $res_menu['tratamentos_n'];

$vagas= $res_menu['vagas'];
$vagas_n= $res_menu['vagas_n'];

$onde_encontrar= $res_menu['onde_encontrar'];
$onde_encontrar_n= $res_menu['onde_encontrar_n'];

$antes_e_depois= $res_menu['antes_e_depois'];
$antes_e_depois_n= $res_menu['antes_e_depois_n'];

$downloads= $res_menu['downloads'];
$downloads_n= $res_menu['downloads_n'];
	
?>



<?php if ($institucional=='Sim'){echo"<div id=\"sistemas-menu-links\">
<a href=\"/as/institucional.php\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/institucional.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"/as/institucional.php\">$institucional_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($fotos_empresa=='Sim'){echo"<div id=\"sistemas-menu-links\">
<a href=\"/as/fotos-empresa.php\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/fotos.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"/as/fotos-empresa.php\">Fotos da Empresa</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($filiais=='Sim'){echo"<div id=\"sistemas-menu-links\">
<a href=\"/as/filiais.php\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/filiais.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"/as/filiais.php\">Filiais</a></div>
</div></a>";} else {echo"";} ?>



<?php if ($onde_encontrar=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"/as/onde-encontrar.php\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/onde-encontrar.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"/as/onde-encontrar.php\">$onde_encontrar_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($banner=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"/as/banner.php\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/banner.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"/as/banner.php\">$banner_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($servicos=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"/as/servicos.php\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/servicos.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"/as/servicos.php\">$servicos_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($produtos=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"/as/produtos.php\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/produtos.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"/as/produtos.php\">$produtos_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($exames=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"/as/exames.php\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/exames.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"/as/exames.php\">$exames_n</a></div>
</div></a>";} else {echo"";} ?>



<?php if ($tratamentos=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"/as/tratamentos.php\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/exames.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"/as/tratamentos.php\">$tratamentos_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($vagas=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"/as/vagas.php\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/banner.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"/as/vagas_editar.php\">$vagas_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($noticias=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"/as/noticias.php\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/noticias.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"/as/noticias.php\">$noticias_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($equipe=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"/as/equipe.php\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/clientes.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"/as/equipe.php\">$equipe_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($clipping=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"/as/clipping.php\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/clipping.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"/as/clipping.php\">$clipping_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($clientes=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"/as/clientes.php\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/clientes.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"/as/clientes.php\">$clientes_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($perguntas_e_respostas=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"/as/perguntas_e_respostas.php\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/per.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"/as/perguntas_e_respostas.php\">$perguntas_e_respostas_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($artigos=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"/as/artigos.php\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/artigos.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"/as/artigos.php\">$artigos_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($projetos=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"/as/projetos.php\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/projetos.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"/as/projetos.php\">$projetos_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($portfolio=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"/as/portfolio.php\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/portfolio.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"/as/portfolio.php\">Portfólio</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($dicas=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"/as/dicas.php\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/dicas.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"/as/dicas.php\">$dicas_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($cadastros=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"/as/cadastros.php\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/cadastros.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"/as/cadastros.php\">$cadastros_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($links_uteis=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"/as/links-uteis.php\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/linksuteis.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"/as/links-uteis.php\">$links_uteis_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($receitas=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"/as/receitas.php\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/receitas.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"/as/receitas.php\">$receitas_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($recados=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"/as/recados.php\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/recados.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"/as/recados.php\">$recados_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($depoimentos=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"/as/depoimentos.php\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/depoimentos.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"/as/depoimentos.php\">$depoimentos_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($imoveis=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"/as/imoveis.php\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/imoveis.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"/as/imoveis.php\">$imoveis_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($fotos=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"/as/fotos.php\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/fotos.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"/as/fotos.php\">$fotos_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($videos=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"/as/videos.php\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/videos.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"/as/videos.php\">$videos_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($agenda=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"/as/agenda.php\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/agenda.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"/as/agenda.php\">$agenda_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($contratante=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"/as/contratante.php\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/contratante.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"/as/contratante.php\">$contratante_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($discografia=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"/as/discografia.php\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/discografia.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"/as/discografia.php\">$discografia_n</a></div>
</div></a>";} else {echo"";} ?>



<?php if ($cursos=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"/as/cursos.php\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/cursos.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"/as/cursos.php\">$cursos_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($antes_e_depois=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"/as/antes-e-depois.php\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/antes_e_depois.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"/as/antes-e-depois.php\">$antes_e_depois_n</a></div>
</div></a>";} else {echo"";} ?>



<?php if ($obras=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"/as/acompanhamento-obras.php\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/obras.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"/as/acompanhamento-obras.php\">$obras_n</a></div>
</div></a>";} else {echo"";} ?>



<?php if ($acompanhamento_obra=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"/as/acompanhamento-obras-completo.php\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/obras.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"/as/acompanhamento-obras-completo.php\">$acompanhamento_obra_n</a></div>
</div></a>";} else {echo"";} ?>


<?php if ($downloads=='Sim'){echo"
<div id=\"sistemas-menu-links\">
<a href=\"/as/downloads.php\"><div class=\"alinha0\"> > </div>
<div class=\"sistemas-menu-icons\"><img src=\"img/icons/download.png\" width=\"100%\"/></div>
<div class=\"alinha4\"><a href=\"/as/downloads.php\">$downloads_n</a></div>
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
<div class="alinha4"><a href="/as/redes-sociais.php">Redes Sociais</a></div>
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