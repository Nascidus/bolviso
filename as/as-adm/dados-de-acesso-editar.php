<?php session_start();?>
<!doctype html>
<html>
<head>
	<?php  include'head.php'; include'verifica.php'; include'conecta.php'; $data_atual = date('d/m/20y');?>	
</head>

<body>
	<?php  include'topo-mobile.php';?>

	<?php  include'topo.php';?>	
	
    <?php  include'menu-lateral-mobiles.php';?>
	
<div class="center"><div class="clearfix">
	
<div id="sistemas-infos">
		
<div id="grid12">
<div class="dados-de-acesso-logo"><img src="img/icons/acesso.png" width="100%"/></div>
<div class="alinha6">USUÁRIO</div>
</div>


<div class="cut1">
	

	   
	   	
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM usuarios WHERE id='$id'";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){
	
$id = $res['id'];
$empresa= $res['empresa'];
$responsavel= $res['responsavel'];
$data_cadastro= $res['data_cadastro'];
$login= $res['login'];
$senha= $res['senha'];

echo "	
<form action=\"dados-de-acesso-editar.php?acao=alterar&id=$id\" method=\"post\">

<div id=\"dados-acesso\" >
<label for=\"nome\">Nome do cliente:</label>
<input type=\"text\" name=\"empresa\" value=\"$empresa\" class=\"form2\" required/>
</div>
	   
<div id=\"dados-acesso\" >
<label for=\"responsavel\">Responsável:</label>
<input type=\"text\" name=\"responsavel\" value=\"$responsavel\" class=\"form2\" required/>
</div>

<div id=\"dados-acesso\">
<label for=\"login\">Login:</label>
<input type=\"login\" name=\"login\" value=\"$login\" class=\"form2\" required/>
</div>

<div id=\"dados-acesso\">
<label for=\"email\">Senha:</label>
<input type=\"text\" name=\"senha\" value=\"$senha\" class=\"form2\" required/>
</div>

	
<div id=\"grid12A\">
<div class=\"alterar\"><input type=\"submit\" name=\"submit\" style=\"cursor:pointer\" class=\"alterar\" value=\"EDITAR\"/></div>
</div></div></form>	

";}?>



	
</div>

<div id="sistemas-menu-lateral">
<div id="grid12"><div class="sistemas-marcador"><img src="img/marcador.png"/></div></div>
<?php  include'menu-lateral.php';?>
</div></div></div>


<?php

$caminho="<script language=\"javascript\">function alerta(){alert(\"Dados Alterados com Sucesso!\");}
alerta(); document.location=\"javascript:history.go(-2)\";</script>";

$acao = $_GET['acao']; $id = $_GET['id']; if ($acao == 'alterar'){

$empresa = $_POST ['empresa'];
$responsavel = $_POST ['responsavel'];
$data_cadastro = $_POST ['data_cadastro'];
$login = $_POST ['login'];
$senha = $_POST ['senha'];

 $caminho = "<script language='javascript'>
      function alerta(){
      alert('Dados Alterados com Sucesso!');
      }
      alerta();
      document.location='dados-de-acesso';
      </script>";

      $id = $_GET['id'];

      $sql="
UPDATE  `usuarios` SET  
`empresa` =  '$empresa',
`responsavel` =  '$responsavel',
`login` =  '$login',
`senha` =  '$senha' WHERE  `id` ='$id'; ";

if ($conn->query($sql) === TRUE) {

echo"$caminho";}

else{ echo "<script language='javascript'>function alerta(){alert('Erro Econtrado!');}alerta();document.location='javascript:history.go(-1)';</script>";

}}?>

	


</body>
</html>