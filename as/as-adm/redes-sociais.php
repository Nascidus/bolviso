<?php
session_start();
if((!isset($_SESSION['login']))
AND (!isset($_SESSION['senha'])))
Header("Location: index.php?erro=logar");
$login = $_SESSION['login'];
$senha = $_SESSION['senha'];  
?><!doctype html>
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
<div class="ferramentas-painel-logo"><img src="img/icons/redes.png" width="100%"/></div>
<div class="alinha6">REDES SOCIAIS</div>
</div>
	
	
		   	
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM redes_sociais";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){
	
$id = $res['id'];
	
$facebook= $res['facebook']; 
$twitter= $res['twitter']; 
$youtube= $res['youtube']; 
$google_plus= $res['google_plus'];  
$vimeo= $res['vimeo'];
$pinterest= $res['pinterest']; 
$palco_mp3= $res['palco_mp3'];
$sua_musica= $res['sua_musica'];
$vagalume= $res['vagalume']; 
$ta_estourado= $res['ta_estourado'];
$linkedin= $res['linkedin'];	
$behance= $res['behance'];		
$itunes= $res['itunes'];
$deezer= $res['deezer'];
$spotify= $res['spotify'];
$loja_virtual= $res['loja_virtual']; 
$instagram= $res['instagram'];
$whatsapp= $res['whatsapp'];

	
}?>
	
	<form action="redes-sociais.php?acao=alterar" method="post">

<div id="ferramentas-painel-padding"><div class="cut1">
<div id="dados-acesso">
<label for="instagram">Instagram:</label>
	<select name="instagram" <?php if ($instagram=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$instagram";?>"><?php echo"$instagram";?></option>
	<?php if ($instagram=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($instagram=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>

<div id="dados-acesso">
<label for="facebook">Facebook:</label>
	<select name="facebook" <?php if ($facebook=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$facebook";?>"><?php echo"$facebook";?></option>
	<?php if ($facebook=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($facebook=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>

<div id="dados-acesso">
<label for="twitter">Twitter:</label>
	<select name="twitter"  <?php if ($twitter=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$twitter";?>"><?php echo"$twitter";?></option>
	<?php if ($twitter=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($twitter=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>

<div id="dados-acesso">
<label for="youtube">Youtube:</label>
	<select name="youtube" <?php if ($youtube=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$youtube";?>"><?php echo"$youtube";?></option>
	<?php if ($youtube=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($youtube=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>

<div id="dados-acesso">
<label for="linkedin">linkedin:</label>
	<select name="linkedin" <?php if ($linkedin=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$linkedin";?>"><?php echo"$linkedin";?></option>
	<?php if ($linkedin=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($linkedin=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>

<div id="dados-acesso">
<label for="google_plus">Google Plus:</label>
	<select name="google_plus" <?php if ($google_plus=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$google_plus";?>"><?php echo"$google_plus";?></option>
	<?php if ($google_plus=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($google_plus=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>

<div id="dados-acesso">
<label for="vimeo">Vimeo:</label>
	<select name="vimeo" <?php if ($vimeo=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$vimeo";?>"><?php echo"$vimeo";?></option>
	<?php if ($vimeo=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($vimeo=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>

<div id="dados-acesso">
<label for="pinterest">Pinterest:</label>
	<select name="pinterest" <?php if ($pinterest=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$pinterest";?>"><?php echo"$pinterest";?></option>
	<?php if ($pinterest=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($pinterest=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>

<div id="dados-acesso">
<label for="palco_mp3">Palco MP3:</label>
	<select name="palco_mp3" <?php if ($palco_mp3=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$palco_mp3";?>"><?php echo"$palco_mp3";?></option>
	<?php if ($palco_mp3=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($palco_mp3=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>

<div id="dados-acesso">
<label for="sua_musica">Sua Música:</label>
	<select name="sua_musica" <?php if ($sua_musica=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$sua_musica";?>"><?php echo"$sua_musica";?></option>
	<?php if ($sua_musica=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($sua_musica=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>

<div id="dados-acesso">
<label for="vagalume">Vagalume:</label>
	<select name="vagalume" <?php if ($vagalume=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$vagalume";?>"><?php echo"$vagalume";?></option>
	<?php if ($vagalume=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($vagalume=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>

<div id="dados-acesso">
<label for="ta_estourado">Tá Estourado:</label>
	<select name="ta_estourado" <?php if ($ta_estourado=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$ta_estourado";?>"><?php echo"$ta_estourado";?></option>
	<?php if ($ta_estourado=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($ta_estourado=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>

<div id="dados-acesso">
<label for="itunes">Itunes:</label>
	<select name="itunes"  <?php if ($itunes=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$itunes";?>"><?php echo"$itunes";?></option>
	<?php if ($itunes=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($itunes=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>

<div id="dados-acesso">
<label for="deezer">Deezer:</label>
	<select name="deezer" <?php if ($deezer=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$deezer";?>"><?php echo"$deezer";?></option>
	<?php if ($deezer=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($deezer=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>

<div id="dados-acesso">
<label for="spotify">Spotify:</label>
	<select name="spotify" <?php if ($spotify=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$spotify";?>"><?php echo"$spotify";?></option>
	<?php if ($spotify=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($spotify=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>

<div id="dados-acesso">
<label for="loja_virtual">Loja Virtual:</label>
	<select name="loja_virtual" <?php if ($loja_virtual=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$loja_virtual";?>"><?php echo"$loja_virtual";?></option>
	<?php if ($loja_virtual=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($loja_virtual=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>


<div id="dados-acesso">
<label for="behance">Behance:</label>
	<select name="behance" <?php if ($behance=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$behance";?>"><?php echo"$behance";?></option>
	<?php if ($behance=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($behance=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>

<div id="dados-acesso">
<label for="whatsapp">Whatsapp:</label>
	<select name="whatsapp" <?php if ($whatsapp=='Sim') {  echo "class=\"form2_green\"";} else{echo"class=\"form2\"";} ?>>
	<option value="<?php echo"$whatsapp";?>"><?php echo"$whatsapp";?></option>
	<?php if ($whatsapp=='Sim') {  echo "<option value=\"Não\">Não</option>";} ?>
	<?php if ($whatsapp=='Não') {  echo "<option value=\"Sim\">Sim</option>";} ?>
</select>
</div>


<div id="grid12D">
<div class="alterar"><input type="submit" name="submit" style="cursor:pointer" class="alterar" value="ALTERAR"/></div>
	</div></div></div></div> </form>

<div id="sistemas-menu-lateral">
<div id="grid12"><div class="sistemas-marcador"><img src="img/marcador.png"/></div></div>
	<?php  include'menu-lateral.php';?>
</div></div></div>

	
	
	
	
<?php

$acao = $_GET['acao']; $id = $_GET['id']; if ($acao == 'alterar'){

$facebook= $_POST['facebook'];
$twitter= $_POST['twitter'];
$youtube= $_POST['youtube'];
$google_plus= $_POST['google_plus']; 
$vimeo= $_POST['vimeo'];	
$pinterest= $_POST['pinterest'];
$palco_mp3= $_POST['palco_mp3'];
$sua_musica= $_POST['sua_musica']; 
$vagalume= $_POST['vagalume'];  
$ta_estourado= $_POST['ta_estourado'];
$linkedin= $_POST['linkedin'];
$behance= $_POST['behance'];
$whatsapp= $_POST['whatsapp'];	
$itunes= $_POST['itunes'];
$deezer= $_POST['deezer'];
$spotify= $_POST['spotify']; 
$loja_virtual= $_POST['loja_virtual'];  
$instagram= $_POST['instagram'];


 $caminho = "<script language='javascript'>
      function alerta(){
      alert('Dados Alterados com Sucesso!');
      }
      alerta();
      document.location='redes-sociais';
      </script>";

      $id = $_GET['id'];

      $sql="
UPDATE  `redes_sociais` SET  
`facebook` =  '$facebook',
`twitter` =  '$twitter',
`youtube` =  '$youtube',
`google_plus` =  '$google_plus',
`vimeo` =  '$vimeo',
`pinterest` =  '$pinterest',
`palco_mp3` =  '$palco_mp3',
`sua_musica` =  '$sua_musica',
`vagalume` =  '$vagalume',
`itunes` =  '$itunes',
`deezer` =  '$deezer',
`spotify` =  '$spotify',
`whatsapp` =  '$whatsapp',
`linkedin` =  '$linkedin',
`behance` =  '$behance',
`instagram` =  '$instagram'

WHERE  `id` ='1'; ";


if ($conn->query($sql) === TRUE) {

echo"$caminho";}

else{ echo "<script language='javascript'>function alerta(){alert('Erro Econtrado!');}alerta();document.location='javascript:history.go(-1)';</script>";

}}?>
	
	
	
</body>
</html>