<?php session_start(); if((!isset($_SESSION[login])) AND (!isset($_SESSION[senha])))Header("Location: index.php?erro=logar");
$login = $_SESSION['login'];
$senha = $_SESSION['senha'];  
?>
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<?php  include'head.php'; include'verifica.php'; include'conecta.php';?>

<style>
::-webkit-input-placeholder {color: #ececec;}
:-moz-placeholder { /* Firefox 18- */color: #ececec;}
::-moz-placeholder {  /* Firefox 19+ */color: #ececec;}
:-ms-input-placeholder {color: #ececec;}
</style>

</head>

<body>
	<?php  include'topo-mobile.php';?>

    <?php  include'topo.php';?>	

	<?php  include'menu-lateral-mobiles.php';?>

<div class="center"><div class="clearfix">
<div id="sistemas-infos"><div id="grid12">
<div class="ferramentas-painel-logo"><img src="img/icons/painel.png" width="100%"/></div>
<div class="alinha6">FERRAMENTAS PAINEL (Editar Nomes)</div>
</div>
	
	
	
	   	
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM paineis";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){
	
$id = $res['id'];
	
$institucional= $res['institucional_n']; 
$banner= $res['banner_n']; 
$servicos= $res['servicos_n'];
$produtos= $res['produtos_n'];  
$noticias= $res['noticias_n'];

$clipping= $res['clipping_n']; 
$clientes= $res['clientes_n']; 
$artigos= $res['artigos_n']; 
$arquivos= $res['arquivos_n']; 
$portfolio= $res['portfolio_n'];	
	
$dicas= $res['dicas_n'];
$cadastros= $res['cadastros_n'];  
$links_uteis= $res['links_uteis_n']; 
$receitas= $res['receitas_n']; 
$recados= $res['recados_n'];
	
$depoimentos= $res['depoimentos_n'];
$imoveis= $res['imoveis_n'];
$fotos= $res['fotos_n'];
$videos= $res['videos_n'];
$agenda= $res['agenda_n'];
	
$contratante= $res['contratante_n'];
$discografia= $res['discografia_n'];
$exames= $res['exames_n'];

$onde_encontrar= $res['onde_encontrar_n'];

	
}?>
	
	

<div class="alinha8">ADMINISTRATIVO</div>
	
	
<form action="ferramentas-painel-nomes.php?acao=alterar" method="post">
	
<div id="ferramentas-painel-padding"><div class="cut1">
<div id="ferramentas-painel-editNome">
<input type="text" name="institucional" <?php if ($institucional=='Sim') {  echo "class=\"form2_green\" ";} else{echo"class=\"form2\"";} ?> value="<?php echo"$institucional";?>">
</div>
	
	

<div id="ferramentas-painel-editNome">
<input type="text" name="banner"   <?php if ($banner=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?> value="<?php echo"$banner";?>">
</div>

<div id="ferramentas-painel-editNome">
<input type="text" name="servicos"   <?php if ($servicos=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?> value="<?php echo"$servicos";?>">
</div>

<div id="ferramentas-painel-editNome">
<input type="text" name="produtos"  <?php if ($produtos=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?> value="<?php echo"$produtos";?>">
</div>

<div id="ferramentas-painel-editNome">
<input type="text" name="noticias"   <?php if ($noticias=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>value="<?php echo"$noticias";?>">
</div>

<div id="ferramentas-painel-editNome">
<input type="text" name="clipping"   <?php if ($clipping=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?> value="<?php echo"$clipping";?>">
</div>

<div id="ferramentas-painel-editNome">
<input type="text" name="clientes"   <?php if ($clientes=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?> value="<?php echo"$clientes";?>">
</div>

<div id="ferramentas-painel-editNome">
<input type="text" name="artigos"  <?php if ($artigos=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?> value="<?php echo"$artigos";?>">
</div>

<div id="ferramentas-painel-editNome">
<input type="text" name="arquivos" <?php if ($arquivos=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>value="<?php echo"$arquivos";?>">
</div>

<div id="ferramentas-painel-editNome">
<input type="text" name="portfolio"  <?php if ($portfolio=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?> value="<?php echo"$portfolio";?>">
</div>

<div id="ferramentas-painel-editNome">
<input type="text" name="dicas"   <?php if ($dicas=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?> value="<?php echo"$dicas";?>">
</div>

<div id="ferramentas-painel-editNome">
<input type="text" name="cadastros"   <?php if ($cadastros=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?> value="<?php echo"$cadastros";?>">
</div>

<div id="ferramentas-painel-editNome">
<input type="text" name="links_uteis"   <?php if ($links_uteis=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?> value="<?php echo"$links_uteis";?>">
</div>

<div id="ferramentas-painel-editNome">
<input type="text" name="receitas"   <?php if ($receitas=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?> value="<?php echo"$receitas";?>">
</div>

<div id="ferramentas-painel-editNome">
<input type="text" name="recados"   <?php if ($recados=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?> value="<?php echo"$recados";?>">
</div>

<div id="ferramentas-painel-editNome">
<input type="text" name="depoimentos"   <?php if ($depoimentos=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>value="<?php echo"$depoimentos";?>">
</div>

<div id="ferramentas-painel-editNome">
<input type="text" name="imoveis"  <?php if ($imoveis=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?> value="<?php echo"$imoveis";?>">
</div>

<div id="ferramentas-painel-editNome">
<input type="text" name="onde_encontrar"  <?php if ($onde_encontrar=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?> value="<?php echo"$onde_encontrar";?>">
</div>


<div class="alinha9">MULTIMÍDIA</div>

<div class="cut1">
<div id="ferramentas-painel-editNome">
<input type="text" name="fotos"   <?php if ($fotos=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?> value="<?php echo"$fotos";?>">
</div>

<div id="ferramentas-painel-editNome">
<input type="text" name="videos"   <?php if ($videos=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?> value="<?php echo"$videos";?>">
</div></div>

<div class="alinha9">ARTISTAS</div>


<div class="cut1">
<div id="ferramentas-painel-editNome">
<input type="text" name="agenda"   <?php if ($agenda=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?> value="<?php echo"$agenda";?>">
</div>

<div id="ferramentas-painel-editNome">
<input type="text" name="contratante"  <?php if ($contratante=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?> value="<?php echo"$contratante";?>">
</div>

<div id="ferramentas-painel-editNome">
<input type="text" name="discografia"   <?php if ($discografia=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?> value="<?php echo"$discografia";?>">
</div></div>

<div id="grid12B">
<div class="alterar"><input type="submit" name="submit" style="cursor:pointer" class="alterar" value="ALTERAR"/></div>
		</div></div></div></div> </form>

<div id="sistemas-menu-lateral">
<div id="grid12"><div class="sistemas-marcador"><img src="img/marcador.png"/></div></div>
	<?php  include'menu-lateral.php';?>
</div></div></div>
	
		
	
<?php

$acao = $_GET['acao']; $id = $_GET['id']; if ($acao == 'alterar'){

$institucional= $_POST['institucional'];  
$banner= $_POST['banner'];  
$servicos= $_POST['servicos']; 
$produtos= $_POST['produtos']; 
$noticias= $_POST['noticias']; 

$clipping= $_POST['clipping']; 
$clientes= $_POST['clientes']; 
$artigos= $_POST['artigos'];
$arquivos= $_POST['arquivos']; 
$portfolio= $_POST['portfolio'];
	
$dicas= $_POST['dicas'];
$cadastros= $_POST['cadastros'];
$links_uteis= $_POST['links_uteis'];
$receitas= $_POST['receitas'];
$recados= $_POST['recados'];
	
$depoimentos= $_POST['depoimentos']; 
$imoveis= $_POST['imoveis'];
$fotos= $_POST['fotos'];
$videos= $_POST['videos']; 
$agenda= $_POST['agenda'];
	
$contratante= $_POST['contratante']; 
$discografia= $_POST['discografia']; 

$onde_encontrar= $_POST['onde_encontrar'];

 $caminho = "<script language='javascript'>
      function alerta(){
      alert('Dados Alterados com Sucesso!');
      }
      alerta();
      document.location='ferramentas-painel-nomes';
      </script>";

      $id = $_GET['id'];

      $sql="
UPDATE  `paineis` SET  
`institucional_n` =  '$institucional',
`banner_n` =  '$banner',
`produtos_n` =  '$produtos',
`noticias_n` =  '$noticias',
`clipping_n` =  '$clipping',
`clientes_n` =  '$clientes',
`artigos_n` =  '$artigos',
`arquivos_n` =  '$arquivos',
`portfolio_n` =  '$portfolio',
`dicas_n` =  '$dicas',
`cadastros_n` =  '$cadastros',
`links_uteis_n` =  '$links_uteis',
`receitas_n` =  '$receitas',
`recados_n` =  '$recados',
`depoimentos_n` =  '$depoimentos',
`imoveis_n` =  '$imoveis',
`fotos_n` =  '$fotos',
`videos_n` =  '$videos',
`agenda_n` =  '$agenda',
`servicos_n` =  '$servicos',
`contratante_n` =  '$contratante',
`onde_encontrar_n` =  '$onde_encontrar',
`discografia_n` =  '$discografia'

WHERE  `id` ='1'; ";

if ($conn->query($sql) === TRUE) {
echo"$caminho";}
else{ echo "<script language='javascript'>function alerta(){alert('Erro Econtrado!');}alerta();document.location='javascript:history.go(-1)';</script>";

}}?>

</body>
</html>