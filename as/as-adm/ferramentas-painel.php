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
<html>
<head>
	<?php  include'head.php'; include'verifica.php'; include'conecta.php';?>	
</head>

<body>
	<?php  include'topo-mobile.php';?>

    <?php  include'topo.php';?>	

	<?php  include'menu-lateral-mobiles.php';?>

<div class="center"><div class="clearfix">
<div id="sistemas-infos"><div id="grid12">
<div class="ferramentas-painel-logo"><img src="img/icons/painel.png" width="100%"/></div>
<div class="alinha6">FERRAMENTAS PAINEL</div>
</div>

<div class="alinha8">ADMINISTRATIVO</div>

<div id="ferramentas-painel-padding"><div class="cut1">
	
	   	
<?php
$id = $_GET['id'];
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

$onde_encontrar= $res['onde_encontrar'];
$onde_encontrar_n= $res['onde_encontrar_n'];

$acompanhamento_obra= $res['acompanhamento_obra'];
$acompanhamento_obra_n= $res['acompanhamento_obra_n'];

$downloads= $res['downloads'];
$downloads_n= $res['downloads_n'];

}?>
	
<form action="ferramentas-painel.php?acao=alterar" method="post">
	
<div id="dados-acesso">
<label for="institucional"><?php echo"$institucional_n";?>:</label>
	<select name="institucional"  <?php if ($institucional=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$institucional";?>"><?php echo"$institucional";?></option>
	<?php if ($institucional=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($institucional=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
	</select>
</div>

<div id="dados-acesso">
<label for="banner"><?php echo"$banner_n";?>:</label>
	<select name="banner"  <?php if ($banner=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$banner";?>"><?php echo"$banner";?></option>
	<?php if ($banner=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($banner=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>

<div id="dados-acesso">
<label for="servicos"><?php echo"$servicos_n";?>:</label>
	<select name="servicos" <?php if ($servicos=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$servicos";?>"><?php echo"$servicos";?></option>
	<?php if ($servicos=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($servicos=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>

<div id="dados-acesso">
<label for="produtos"><?php echo"$produtos_n";?>:</label>
	<select name="produtos" <?php if ($produtos=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$produtos";?>"><?php echo"$produtos";?></option>
	<?php if ($produtos=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($produtos=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>


<div id="dados-acesso">
<label for="tratamentos"><?php echo"$tratamentos_n";?>:</label>
	<select name="tratamentos" <?php if ($tratamentos=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$tratamentos";?>"><?php echo"$tratamentos";?></option>
	<?php if ($tratamentos=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($tratamentos=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>


<div id="dados-acesso">
<label for="noticias"><?php echo"$noticias_n";?>:</label>
	<select name="noticias" <?php if ($noticias=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$noticias";?>"><?php echo"$noticias";?></option>
	<?php if ($noticias=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($noticias=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>

<div id="dados-acesso">
<label for="clipping"><?php echo"$clipping_n";?>:</label>
	<select name="clipping" <?php if ($clipping=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$clipping";?>"><?php echo"$clipping";?></option>
	<?php if ($clipping=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($clipping=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>

<div id="dados-acesso">
<label for="clientes"><?php echo"$clientes_n";?>:</label>
	<select name="clientes" <?php if ($clientes=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$clientes";?>"><?php echo"$clientes";?></option>
	<?php if ($clientes=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($clientes=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>


<div id="dados-acesso">
<label for="projetos"><?php echo"$projetos_n";?>:</label>
	<select name="projetos" <?php if ($projetos=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$projetos";?>"><?php echo"$projetos";?></option>
	<?php if ($projetos=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($projetos=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>



<div id="dados-acesso">
<label for="artigos"><?php echo"$artigos_n";?>:</label>
	<select name="artigos"  <?php if ($artigos=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$artigos";?>"><?php echo"$artigos";?></option>
	<?php if ($artigos=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($artigos=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>

<div id="dados-acesso">
<label for="arquivos"><?php echo"$arquivos_n";?>:</label>
	<select name="arquivos" <?php if ($arquivos=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$arquivos";?>"><?php echo"$arquivos";?></option>
	<?php if ($arquivos=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($arquivos=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>

<div id="dados-acesso">
<label for="portfolio"><?php echo"$portfolio_n";?>:</label>
	<select name="portfolio" <?php if ($portfolio=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$portfolio";?>"><?php echo"$portfolio";?></option>
	<?php if ($portfolio=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($portfolio=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>

<div id="dados-acesso">
<label for="dicas"><?php echo"$dicas_n";?>:</label>
	<select name="dicas" <?php if ($dicas=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$dicas";?>"><?php echo"$dicas";?></option>
	<?php if ($dicas=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($dicas=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>


<div id="dados-acesso">
<label for="dicas"><?php echo"$dicas_n";?>:</label>
	<select name="dicas" <?php if ($dicas=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$dicas";?>"><?php echo"$dicas";?></option>
	<?php if ($dicas=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($dicas=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>

<div id="dados-acesso">
<label for="perguntas_e_respostas"><?php echo"$perguntas_e_respostas_n";?>:</label>
	<select name="perguntas_e_respostas"  <?php if ($perguntas_e_respostas=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$perguntas_e_respostas";?>"><?php echo"$perguntas_e_respostas";?></option>
	<?php if ($perguntas_e_respostas=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($perguntas_e_respostas=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>


<div id="dados-acesso">
<label for="links_uteis"><?php echo"$links_uteis_n";?>:</label>
	<select name="links_uteis" <?php if ($links_uteis=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$links_uteis";?>"><?php echo"$links_uteis";?></option>
	<?php if ($links_uteis=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($links_uteis=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>

<div id="dados-acesso">
<label for="receitas"><?php echo"$receitas_n";?>:</label>
	<select name="receitas" <?php if ($receitas=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$receitas";?>"><?php echo"$receitas";?></option>
	<?php if ($receitas=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($receitas=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>

<div id="dados-acesso">
<label for="recados"><?php echo"$recados_n";?>:</label>
	<select name="recados"  <?php if ($recados=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$recados";?>"><?php echo"$recados";?></option>
	<?php if ($recados=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($recados=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>

<div id="dados-acesso">
<label for="depoimentos"><?php echo"$depoimentos_n";?>:</label>
	<select name="depoimentos" <?php if ($depoimentos=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$depoimentos";?>"><?php echo"$depoimentos";?></option>
	<?php if ($depoimentos=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($depoimentos=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>




<div id="dados-acesso">
<label for="imoveis"><?php echo"$imoveis_n";?>:</label>
	<select name="imoveis" <?php if ($imoveis=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$imoveis";?>"><?php echo"$imoveis";?></option>
	<?php if ($imoveis=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($imoveis=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>




<div id="dados-acesso">
<label for="cursos"><?php echo"$cursos_n";?>:</label>
	<select name="cursos" <?php if ($cursos=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$cursos";?>"><?php echo"$cursos";?></option>
	<?php if ($cursos=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($cursos=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>


<div id="dados-acesso">
<label for="equipe"><?php echo"$equipe_n";?>:</label>
	<select name="equipe" <?php if ($equipe=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$equipe";?>"><?php echo"$equipe";?></option>
	<?php if ($equipe=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($equipe=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>



<div id="dados-acesso">
<label for="obras"><?php echo"$obras_n";?>:</label>
	<select name="obras" <?php if ($obras=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$obras";?>"><?php echo"$obras";?></option>
	<?php if ($obras=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($obras=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>




<div id="dados-acesso">
<label for="filiais"><?php echo"$filiais_n";?>:</label>
	<select name="filiais" <?php if ($filiais=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$filiais";?>"><?php echo"$filiais";?></option>
	<?php if ($obras=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($obras=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>



<div id="dados-acesso">
<label for="exames"><?php echo"$exames_n";?>:</label>
	<select name="exames" <?php if ($exames=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$exames";?>"><?php echo"$exames";?></option>
	<?php if ($exames=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($exames=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>


<div id="dados-acesso">
<label for="onde_encontrar"><?php echo"$onde_encontrar_n";?>:</label>
	<select name="onde_encontrar" <?php if ($onde_econtrar=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$onde_encontrar";?>"><?php echo"$onde_encontrar";?></option>
	<?php if ($onde_encontrar=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($onde_encontrar=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>



<div id="dados-acesso">
<label for="Downloads"><?php echo"$downloads_n";?>:</label>
	<select name="downloads" <?php if ($downloads=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$downloads";?>"><?php echo"$downloads";?></option>
	<?php if ($downloads=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($downloads=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>


<div id="dados-acesso">
<label for="acompanhamento_obra"><?php echo"$acompanhamento_obra_n";?>:</label>
	<select name="acompanhamento_obra" <?php if ($acompanhamento_obra=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$acompanhamento_obra";?>"><?php echo"$acompanhamento_obra";?></option>
	<?php if ($acompanhamento_obra=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($acompanhamento_obra=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>


<div class="alinha9">MULTIMÍDIA</div>

<div class="cut1">
<div id="dados-acesso">
<label for="fotos"><?php echo"$fotos_n";?>:</label>
	<select name="fotos" <?php if ($fotos=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$fotos";?>"><?php echo"$fotos";?></option>
	<?php if ($fotos=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($fotos=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>

<div id="dados-acesso">
<label for="videos"><?php echo"$videos_n";?>:</label>
	<select name="videos" <?php if ($videos=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$videos";?>"><?php echo"$videos";?></option>
	<?php if ($videos=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($videos=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>
	
	
<div id="dados-acesso">
<label for="fotos_empresa"><?php echo"Fotos Empresa";?>:</label>
	<select name="fotos_empresa" <?php if ($fotos_empresa=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$fotos_empresa";?>"><?php echo"$fotos_empresa";?></option>
	<?php if ($fotos_empresa=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($fotos_empresa=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div></div>
	
	

<div class="alinha9">ARTISTAS</div>


<div class="cut1">
<div id="dados-acesso">
<label for="agenda"><?php echo"$agenda_n";?>:</label>
	<select name="agenda" <?php if ($agenda=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$agenda";?>"><?php echo"$agenda";?></option>
	<?php if ($agenda=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($agenda=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>

<div id="dados-acesso">
<label for="contratante"><?php echo"$contratante_n";?>:</label>
	<select name="contratante" <?php if ($contratante=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$contratante";?>"><?php echo"$contratante";?></option>
	<?php if ($contratante=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($contratante=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>

<div id="dados-acesso">
<label for="discografia"><?php echo"$discografia_n";?>:</label>
	<select name="discografia" <?php if ($discografia=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$discografia";?>"><?php echo"$discografia";?></option>
	<?php if ($discografia=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($discografia=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
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
$fotos_empresa= $_POST['fotos_empresa']; 

$cursos= $_POST['cursos']; 
$cursos_n= $_POST['cursos_n']; 

$equipe= $_POST['equipe']; 
$equipe_n= $_POST['equipe_n']; 

$obras= $_POST['obras']; 
$obras_n= $_POST['obras_n']; 

$filiais= $_POST['filiais']; 
$filiais_n= $_POST['filiais_n']; 

$exames= $_POST['exames']; 
$exames_n= $_POST['exames_n']; 

$projetos= $_POST['projetos']; 
$projetos_n= $_POST['projetos_n'];

$tratamentos= $_POST['tratamentos']; 
$tratamentos_n= $_POST['tratamentos_n']; 

$perguntas_e_respostas= $_POST['perguntas_e_respostas']; 
$perguntas_e_respostas_n= $_POST['perguntas_e_respostas_n']; 

$onde_encontrar= $_POST['onde_encontrar'];
$onde_encontrar_n= $_POST['onde_encontrar_n'];

$acompanhamento_obra= $_POST['acompanhamento_obra'];
$acompanhamento_obra_n= $_POST['acompanhamento_obra_n'];

$downloads= $_POST['downloads'];
$downloads_n= $_POST['downloads_n'];


 $caminho = "<script language='javascript'>
      function alerta(){
      alert('Dados Alterados com Sucesso!');
      }
      alerta();
      document.location='ferramentas-painel';
      </script>";

      $id = $_GET['id'];

      $sql="
UPDATE  `paineis` SET  
`institucional` =  '$institucional',
`banner` =  '$banner',
`produtos` =  '$produtos',
`noticias` =  '$noticias',
`clipping` =  '$clipping',
`clientes` =  '$clientes',
`artigos` =  '$artigos',
`arquivos` =  '$arquivos',
`portfolio` =  '$portfolio',
`dicas` =  '$dicas',
`cadastros` =  '$cadastros',
`links_uteis` =  '$links_uteis',
`receitas` =  '$receitas',
`recados` =  '$recados',
`depoimentos` =  '$depoimentos',
`imoveis` =  '$imoveis',
`fotos` =  '$fotos',
`videos` =  '$videos',
`agenda` =  '$agenda',
`servicos` =  '$servicos',
`fotos_empresa` =  '$fotos_empresa',
`contratante` =  '$contratante',
`cursos` =  '$cursos',
`equipe` =  '$equipe',
`obras` =  '$obras',
`filiais` =  '$filiais',
`exames` =  '$exames',
`perguntas_e_respostas` =  '$perguntas_e_respostas',
`discografia` =  '$discografia',
`projetos` =  '$projetos',
`onde_encontrar` =  '$onde_encontrar',
`tratamentos` =  '$tratamentos',
`vagas` =  '$vagas',
`acompanhamento_obra` =  '$acompanhamento_obra',
`downloads` =  '$downloads'
WHERE  `id` ='1'; ";

if ($conn->query($sql) === TRUE) {
echo"$caminho";}
else{ echo "<script language='javascript'>function alerta(){alert('Erro Econtrado!');}alerta();document.location='javascript:history.go(-1)';</script>";}}?>
	

</body>
</html>