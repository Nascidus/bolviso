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
<div class="alinha6">USU&Aacute;RIO</div>
</div>

<div class="cut1">
	
   <form action="dados-de-acesso-cadastro" method="post">
<div id="dados-acesso" >
<label for="nome">Nome do cliente:</label>
<input type="text" name="empresa" class="form2" required/>
</div>
	   
<div id="dados-acesso" >
<label for="responsavel">Respons&aacute;vel:</label>
<input type="text" name="responsavel" class="form2" required/>
</div>

<div id="dados-acesso">
<label for="login">Login:</label>
<input type="login" name="login" class="form2" required/>
</div>

<div id="dados-acesso">
<label for="email">Senha:</label>
<input type="text" name="senha" class="form2" required/>
</div>
	
	
<div id="dados-acesso">
<label for="data_cadastro">Data de Cadastro:</label>
<input type="text" name="data_cadastro" class="form2" value="<?php echo"$data_atual"; ?>" readonly/>
</div>
	
<div id="grid12A">
<div class="alterar"><input type="submit" name="submit" style="cursor:pointer" class="alterar" value="CADASTRAR"/></div>
</div></div>

</form>	
	
<div id="grid12">
<div class="dados-de-acesso-logo"><img src="img/icons/acesso.png" width="100%"/></div>
<div class="alinha6">LISTAR USU&Aacute;RIOS</div>
</div>	

	
<?php
$sql = "SELECT * FROM usuarios WHERE tipo='2' ORDER BY id DESC";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){
	
$id = $res['id'];
$empresa= $res['empresa'];
$responsavel= $res['responsavel'];
$data_cadastro= $res['data_cadastro'];

echo "	
<div style=\"width: 96%; height: 30px; background-color: #969696; padding: 12px 0px 0px 10px; float: left; margin: 10px 0 0 0; color: white;\">
	<div style=\"width: 25%; float: left; border-right: 1px solid white;\">$empresa</div>
	<div style=\"width: 25%; float: left; border-right: 1px solid white; margin-left: 10px;\">$responsavel</div>
	<div style=\"width: 25%; float: left; border-right: 1px solid white; margin-left: 10px;\">$data_cadastro</div>
		
	<div style=\"float: right; width: 30px; margin: 0 0 0 10px; \">
	<a href=\"dados-de-acesso.php?acao=apagar&id=$id\">
	<img src='img/excluir2.png' title=\"Excluir Usuário\" width=\"17\">
	</a></div>
	
	<div style=\"float: right; width: 30px; \">
	<a href=\"dados-de-acesso-editar.php?id=$id\">
	<img src='img/editar2.png' title=\"Editar Usuário\" width=\"23\">
	</a></div>
</div>	";}?>
		
	
</div>

<div id="sistemas-menu-lateral">
<div id="grid12"><div class="sistemas-marcador"><img src="img/marcador.png"/></div></div>
	<?php  include'menu-lateral.php';?>
</div></div></div>
	
	
<?php

$acao = $_GET ['acao'];if ($acao=='cadastrar'){

$id = $_POST ['id'];
$empresa = $_POST ['empresa'];
$responsavel = $_POST ['responsavel']; $responsavel = utf8_encode($responsavel);
$data_cadastro = $_POST ['data_cadastro'];
$login = $_POST ['login'];
$senha = $_POST ['senha'];

$sql ="
INSERT INTO `usuarios` (`id`, `login`, `senha`, `tipo`, `data_cadastro`, `empresa`, `responsavel`, `acesso`) 
VALUES (NULL, '$login', '$senha', '2', '$data_cadastro', '$empresa', '$responsavel', '');"; 

if ($conn->query($sql) === TRUE) {  
  
  echo"<BR><script language='javascript'>
      function alerta(){
      alert('Usuário cadastrado com sucesso! ');
      }
      alerta();
      document.location='javascript:history.go(-1)';
      </script></b>";
  
    }}?>

	
<?php
$acao = $_GET['acao'];
$id = $_GET['id'];
if ($acao == 'apagar'){
$sql = "DELETE FROM `usuarios` WHERE id = $id";
$comando = mysqli_query($conn, $sql);;

if ($conn->query($sql) === TRUE) {
echo "<script language='javascript'>function alerta(){alert('Removido com sucesso!'); }alerta();document.location='javascript:history.go(-1)';</script>";
}}?>





</body>
</html>