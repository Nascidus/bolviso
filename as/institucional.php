<?php
session_start();
if((!isset($_SESSION['login']))
AND (!isset($_SESSION['senha'])))
Header("Location: index.php?erro=logar");
$login = $_SESSION['login'];
$senha = $_SESSION['senha'];  
?>
<!doctype html>
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

<div id="grid12">
<div class="painel-cliente-icone"><img src="img/icons/institucional.png" width="100%"/></div>
<div class="alinha14">INSTITUCIONAL</div>
</div>

<div id="painel-cliente">
	
	
	
<?php

$sql = "SELECT * FROM institucional  ";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){{
	
$id = $res['id'];
$nome = $res['nome']; 
$titulo = $res['titulo']; 
$email = $res['email'];
$telefone1 = $res['telefone1'];
$telefone2 = $res['telefone2'];
$telefone3 = $res['telefone3'];
$endereco = $res['endereco']; 
$setor = $res['setor']; 
$cidade = $res['cidade'];
$estado = $res['estado']; 
$cep = $res['cep'];
$texto_institucional = $res['texto_institucional']; 
$texto_apresentacao = $res['texto_apresentacao']; 
$missao = $res['missao']; 
$visao = $res['visao']; 
$valores = $res['valores']; 
$privacidade = $res['privacidade']; 
	
}?>

<form action='institucional?acao=editar&id=<?php echo"$id"; ?>' method='POST'>

<div class="cut1">
<div id="formulario">
<label for="nome">Nome do cliente:</label>
<input type="text" name="nome" value="<?php echo"$nome";?>" class="form3"/>
</div>

<div id="formulario">
<label for="titulo">Título do Site:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Título exibido na barra de endereços do navegador - Máximo 5 palavras</span>
</div></label>
<input type="text" name="titulo" value="<?php echo"$titulo";?>"  class="form3"/>
</div>

<div id="formulario">
<label for="email">Email:</label>
<input type="text" name="email" value="<?php echo"$email";?>"  class="form3"/>
</div>

<div id="formulario">
<label for="telefone1">Telefone 01:</label>
<input type="text" name="telefone1" value="<?php echo"$telefone1";?>" class="form3"/>
</div>

<div id="formulario">
<label for="telefone2">Telefone 02 / Whatsapp:
</label>
<input type="text" name="telefone2" value="<?php echo"$telefone2";?>" class="form3"/>
</div>

<div id="formulario">
<label for="telefone3">Telefone 03:</label>
<input type="text" name="telefone3" value="<?php echo"$telefone3";?>" class="form3"/>
</div>


<div id="formulario">
<label for="endereco">Endereço:</label>
<input type="text" name="endereco" value="<?php echo"$endereco";?>" class="form3"/>
</div>

<div id="formulario">
<label for="setor">Setor:</label>
<input type="text" name="setor" value="<?php echo"$setor";?>" class="form3"/>
</div>
<div id="formulario">
<label for="cidade">Cidade:</label>
<input type="text" name="cidade" value="<?php echo"$cidade";?>" class="form3"/>
</div>

<div id="formulario">
<label for="estado">Estado:</label>
<input type="text" name="estado" value="<?php echo"$estado";?>" class="form3"/>
</div>

<div id="formulario">
<label for="cep">CEP:</label>
<input type="text" name="cep" value="<?php echo"$cep";?>" class="form3"/>
</div></div>

<div id="grid12E">
<label for="texto_institucional">Texto Institucional:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Texto Institucional "Completo" da empresa</span>
</div></label>
<textarea class='form4' name='texto_institucional'/><?php echo"$texto_institucional";?></textarea>
</div>

<div id="grid12E" style="display: none">
<label for="texto_apresentacao">Texto Apresentação Página Inicial:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext"> Texto Institucional "Curto"  da empresa</span>
</div></label>
<textarea class='form4' name='texto_apresentacao'/><?php echo"$texto_apresentacao";?></textarea>
</div>
	
	
	
<div id="grid12E">
<label for="missao">Texto Missão:</label>
<textarea class='form4' name='missao'/><?php echo"$missao";?></textarea>
</div>
	
<div id="grid12E" >
<label for="texto_visao">Texto Visão:</label>
<textarea class='form4' name='visao'/><?php echo"$visao";?></textarea>
</div>
	
<div id="grid12E" >
<label for="texto_visao">Texto Valores:</label>
<textarea class='form4' name='valores'/><?php echo"$valores";?></textarea>
</div>
	


<div id="grid12E" >
<label for="privacidade">Texto Cookies e Privacidade:</label>
<textarea class='form4' name='privacidade'/><?php echo"$privacidade";?></textarea>
</div>
	

<div id="grid12">
<div class="alterar"><a href="sistema">
	<input type="submit" name="submit" style="cursor:pointer" class="alterar" value="ALTERAR"/></a></div>
</div></div></div>
	
</form>

<div id="sistemas-menu-lateral">
<div id="grid12"><div class="sistemas-marcador"><img src="img/marcador.png"/></div></div>
	<?php  include'menu-lateral.php';?>
</div></div></div>

<?php  include'menu-lateral-mobiles.php';?>



<?php

$id = $_GET['id'];
$acao = $_GET['acao'];
if ($acao=='editar'){


$nome = $_POST['nome'];   
$titulo = $_POST['titulo'];   
$email = $_POST['email'];
$telefone1 = $_POST['telefone1'];
$telefone2 = $_POST['telefone2'];
$telefone3 = $_POST['telefone3'];
$endereco = $_POST['endereco'];  
$setor = $_POST['setor'];  
$cidade = $_POST['cidade'];   
$estado = $_POST['estado'];   ;
$cep = $_POST['cep'];
$texto_institucional = addslashes($_POST['texto_institucional']); 
$texto_apresentacao = addslashes($_POST['texto_apresentacao']); 
$missao = addslashes($_POST['missao']); 
$visao = addslashes($_POST['visao']);
$valores = addslashes($_POST['valores']);
$privacidade = addslashes($_POST['privacidade']);	
 
$caminho = "<script language='javascript'>function alerta(){alert('Dados alterados com sucesso!');}alerta(); document.location='institucional'; </script>";


$sql="UPDATE `institucional` SET `nome` = '$nome', `titulo` = '$titulo', `email` = '$email', `telefone1` = '$telefone1', `telefone2` = '$telefone2',  `endereco` = '$endereco', `setor` = '$setor', `cidade` = '$cidade', `estado` = '$estado', `cep` = '$cep', `texto_institucional` = '$texto_institucional', `texto_apresentacao` = '$texto_apresentacao',  `missao` = '$missao', `visao` = '$visao', `valores` = '$valores',  `privacidade` = '$privacidade'   WHERE `id` =$id";     


if ($conn->query($sql) === TRUE) {

echo"$caminho";}

else{ echo "<script language='javascript'>function alerta(){alert('Erro Econtrado!');}alerta();document.location='javascript:history.go(-1)';</script>";

}}}?>



</body>
</html>