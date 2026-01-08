<!doctype html>
<html>
<head>
<meta charset="UTF-8">
	<?php  include'head.php';?>	
</head>

<body>
	<?php  include'topo-mobile.php';?>
 
<div id="sistemas-topo"><div class="center"><div class="clearfix">
<?php  include'topo-desktop.php';?>
</div></div></div>

<div class="center"><div class="clearfix">
<div id="sistemas-infos">

<div id="painel-banner">
<div id="painel-banner-padding">



</div></div>

<div id="painel-cliente">


<div class="alinha15">IMAGEM DE CAPA</div>


<div class="cut3">
	
<?php
$id =$_GET['id'];
$sql = "SELECT * FROM obras WHERE id = $id";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){

$id = $res ['id'];
$data = $res ['data'];
$nome = $res ['nome'];
$texto_apresentacao = $res ['texto_apresentacao'];
$aprovacao = $res ['aprovacao'];
$acabamentos = $res ['acabamentos'];
$total = $res ['total'];
$lancamento = $res ['lancamento'];
$infraestrutura = $res ['infraestrutura'];	
$imagem = $res ['imagem'];
$video1 = $res ['video1'];
$video2 = $res ['video2'];	
$video3 = $res ['video3'];
$status = $res ['status'];	
$destaque = $res ['destaque'];
$visite_o_site = $res ['visite_o_site'];
$portal_do_corretor = $res ['portal_do_corretor'];
$i++;



	
echo"	



<div style=\"width: 100%; float: left; padding: 10px;\">";

if ($imagem ==''){echo"<img src='avatar.jpg'  width='20%' border='0' >

<a href=\"editar-foto.php?&id=$id\">	
<div id=\"grid12\"><div class=\"cadastrar\"><input type=\"submit\" name=\"submit\" style=\"cursor:pointer\" class=\"cadastrar\" value=\"INSERIR IMAGEM\"/></div></div></a>


";}

else {  echo"<img src='../img2/obras/$imagem' width='60%'>

<a href=\"editar-foto.php?&id=$id\">	
<div id=\"grid12\"><div class=\"cadastrar\"><input type=\"submit\" name=\"submit\" style=\"cursor:pointer\" class=\"cadastrar\" value=\"ALTERAR IMAGEM\"/></div></div></a>

"; }

echo"</div>


<div class=\"alinha15\" style=\"margin-top: 30px;\">EDITAR OBRA SELECIONADA</div>

<form action='obras-editar?acao=alterar&id=$id' method='post'>
	
	

<div id=\"formulario\" style=\"background-color: ; width: 30%;\">
<label for=\"data\">Data:</label>
<input type=\"text\" name=\"data\" value=\"$data\" class=\"form3\" required/>
</div>


<div id=\"formulario\">
<label for=\"nome\">Nome:</label>
<input type=\"text\" name=\"nome\" value=\"$nome\" class=\"form3\" required/>
</div>


<div id=\"formulario\">
<label for=\"status\">Estatus da Obra:</label>
<select name=\"status\" class=\"form3\">
<option value=\"$status\">$status</option>
<option value=\"Lançamentos\">Lançamentos</option>
<option value=\"Entregues\">Entregues</option>
<option value=\"Obras\">Obras</option>
<option value=\"Empresas\">Empresas</option>
</select>
</div>




<div id=\"formulario\" >
<label for=\"visite_o_site\">Site do Empreendimento:</label>
<input type=\"text\" name=\"visite_o_site\" value=\"$visite_o_site\"  class=\"form3\" required/>
</div>


<div id=\"formulario\" >
<label for=\"portal_do_corretor\">Portal do Corretor:</label>
<input type=\"text\" name=\"portal_do_corretor\" value=\"$portal_do_corretor\"  class=\"form3\" required/>
</div>

<div id=\"formulario\">
<label for=\"destaque\">Obra em Destaque:</label>
<select name=\"destaque\" class=\"form3\">
<option value=\"$destaque\">$destaque</option>
<option value=\"Não\">Não</option>
<option value=\"Sim\">Sim</option>
</select>
</div>
	
	
<div id=\"grid12E\">
<label for=\"texto_apresentacao\">Texto de Apresentação:
<div class=\"tooltip\">
<div class=\"iterativo iiterativo\">i</div>
<span class=\"tooltiptext\">Texto de Apresentação</span>
</div></label>
<textarea class='form4' name='texto_apresentacao'/>$texto_apresentacao</textarea>
</div>




<div class=\"alinha15\">ANDAMENTO DA OBRA</div>




<div id=\"formulario\" style=\"background-color: ; width: 30%;\">
<label for=\"aprovacao\">Aprovação:</label>
<input type=\"text\" name=\"aprovacao\" class=\"form3\"  value=\"$aprovacao\" required/>
</div>
	
<div id=\"formulario\">
<label for=\"lancamento\">Lançamento:</label> 
<input type=\"text\" name=\"lancamento\" class=\"form3\"  value=\"$lancamento\" required/>
</div>
	
<div id=\"formulario\">
<label for=\"infraestrutura\">Infra-Estrutura:</label>
<input type=\"text\" name=\"infraestrutura\" class=\"form3\"  value=\"$infraestrutura\" required/>
</div>
	
	
<div id=\"formulario\" style=\"background-color: ; width: 30%;\">
<label for=\"acabamentos\">Acabamentos:</label>
<input type=\"text\" name=\"acabamentos\" class=\"form3\"  value=\"$acabamentos\" required/>
</div>	
	


	
<div id=\"formulario\">
<label for=\"total\">Total:</label>
<input type=\"text\" name=\"total\" value=\"$total\" class=\"form3\" required/>
</div>
		
	
	
<div class=\"alinha15\">VÍDEOS</div>


<div id=\"formulario\" style=\"background-color: ; width: 30%;\">
<label for=\"video1\">Vídeo 01 (ID Youtube):</label>
<input type=\"text\" name=\"video1\" class=\"form3\" value=\"$video1\" />
</div>
	

<div id=\"formulario\">
<label for=\"video2\">Vídeo 02 (ID Youtube):</label>
<input type=\"text\" name=\"video2\" class=\"form3\" value=\"$video2\" />
</div>


<div id=\"formulario\">
<label for=\"video3\">Vídeo 03 (ID Youtube):</label>
<input type=\"text\" name=\"video3\" class=\"form3\" value=\"$video3\" />
</div>	


	
"; }?>
	
	
</div>
	
	
<div id="grid12"><div class="cadastrar"><input type="submit" name="submit" style="cursor:pointer" class="cadastrar" value="EDITAR"/></div></div>
</div></div></form>

<div id="sistemas-menu-lateral">
<div id="grid12"><div class="sistemas-marcador"><img src="img/marcador.png"/></div></div>
	<?php  include'menu-lateral.php';?>
</div></div></div>

<?php  include'menu-lateral-mobiles.php';?>
	
	

	
<?php

$acao = $_GET['acao'];
$id = $_GET['id'];

if ($acao == 'alterar'){

$id = $_POST ['id'];
$data = $_POST ['data'];
$nome = $_POST ['nome'];
$nome_slug = $_POST ['nome_slug'];
$texto_apresentacao = $_POST ['texto_apresentacao'];
$aprovacao = $_POST ['aprovacao'];
$acabamentos = $_POST ['acabamentos'];
$total = $_POST ['total'];
$lancamento = $_POST ['lancamento'];
$infraestrutura = $_POST ['infraestrutura'];
$video1 = $_POST ['video1'];
$video2 = $_POST ['video2'];	
$video3 = $_POST ['video3'];	
$status = $_POST ['status'];
$destaque = $_POST ['destaque'];
$visite_o_site = $_POST ['visite_o_site'];
$portal_do_corretor = $_POST ['portal_do_corretor'];	



setlocale(LC_ALL, 'en_US.UTF8');
function toAscii($str, $replace=array(), $delimiter='-') {
    if( !empty($replace) ) {
        $str = str_replace((array)$replace, ' ', $str);
    } 
    $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
    $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
    $clean = strtolower(trim($clean, '-'));
    $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
     return $clean;}

$nome_slug = toAscii($nome);	
$status_slug = toAscii($status);
	
$caminho = "<script language='javascript'>function alerta(){alert('Dados Alterados com Sucesso!'); }alerta();document.location='acompanhamento-obras';</script>";

$id = $_GET['id'];
$sql="UPDATE `obras` SET
`data` =  '$data', 
`nome` =  '$nome',
`nome_slug` =  '$nome_slug',
`texto_apresentacao` =  '$texto_apresentacao',
`aprovacao` =  '$aprovacao',
`acabamentos` =  '$acabamentos',
`lancamento` =  '$lancamento',
`infraestrutura` =  '$infraestrutura',
`video1` =  '$video1',
`video2` =  '$video2',
`video3` =  '$video3',
`status` =  '$status',
`status_slug` =  '$status_slug',
`destaque` =  '$destaque',
`visite_o_site` =  '$visite_o_site',
`portal_do_corretor` =  '$portal_do_corretor',
`total` =  '$total'
 WHERE  `id` ='$id'; ";

if ($conn->query($sql) === TRUE) {

echo"$caminho";}

else{ echo "<script language='javascript'>function alerta(){alert('Erro Econtrado!');}alerta();document.location='acompanhamento-obras';</script>";

}}?>


<script>
var $input    = document.getElementById('input-file'),
    $fileName = document.getElementById('file-name');

$input.addEventListener('change', function(){
  $fileName.textContent = this.value;
});
</script>



</body>
</html>