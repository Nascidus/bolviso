<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<?php  include'head.php';
$diaatual = date('d');
$mesatual = date('m');	
$anoatual = date('20y');
$data_atual = date('d/m/20y');?>	
</head>

<body>
<?php  include'topo-mobile.php';?>

<div id="sistemas-topo"><div class="center"><div class="clearfix">
<?php  include'topo-desktop.php';?>
</div></div></div>

<div class="center"><div class="clearfix"><div id="sistemas-infos">

<div id="painel-banner">
<div id="painel-banner-padding">
<div id="grid12">
<div class="painel-cliente-icone"><img src="img/icons/obras.png" width="100%"/></div>
<div class="alinha14"><a href="acompanhamento-obras">OBRAS</a> >> CADASTRAR </div></div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">
<div style="display: none"><a href="banner-filtro"><div class="painel-banner-botoes2"><img src="img/filtro.jpg" width="100%"/></div></a></div>
<div style="display: none"><a href="produtos-categorias"><div class="painel-banner-botoes1"><img src="img/categorias.jpg" width="100%"/></div></a></div>
<a href="obras-cadastrar"><div class="painel-banner-botoes1"><img src="img/novo.jpg" width="100%"/></div></a>
</div></div></div>

<div id="painel-cliente">
<div class="alinha15">CADASTRAR s</div>
	
	
	
<?php

$acao = $_GET ['acao'];
if ($acao=='cadastrar'){

$id = $_POST ['id'];
$data = $_POST ['data'];
$nome = $_POST ['nome'];
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
$status_slug = $_POST ['status_slug'];	
$destaque = $_POST ['destaque'];
$visite_o_site = $_POST ['visite_o_site'];
$portal_do_corretor = $_POST ['portal_do_corretor'];

$diaatual = date('d');
$mesatual = date('m');	
$anoatual = date('20y');



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
	

$sql =" INSERT INTO  `obras` (`id`, `data`, `nome`, `nome_slug`, `texto_apresentacao`, `aprovacao`, `acabamentos`, `total`, `lancamento`, `infraestrutura` , `video1` , `video2` , `video3` , `status` , `status_slug` , `destaque` , `visite_o_site` , `portal_do_corretor`) 
VALUES (NULL, '$data', '$nome', '$nome_slug', '$texto_apresentacao', '$aprovacao', '$acabamentos', '$total', '$lancamento', '$infraestrutura' , '$video1' , '$video2' , '$video3'  , '$status'  , '$status_slug'  ,  '$destaque' , '$visite_o_site' , '$portal_do_corretor'); "; 

if ($conn->query($sql) === TRUE) {
	
	echo"<BR><script language='javascript'>
      function alerta(){
      alert('Obra cadastrada com sucesso! ');
      }
      alerta();
      document.location='acompanhamento-obras';
      </script></b>";
	
		}}?>
	
	
	
	

<form  action='obras-cadastrar?acao=cadastrar' method='post' enctype='multipart/form-data'>
	


<div id="formulario"  style="background-color: ; width: 30%;">
<label for="data">Data:</label>
<input type="text" name="data" value="<?php echo"$diaatual/$mesatual/$anoatual"; ?>" class="form3" required readonly/>
</div>
	

<div id="formulario" >
<label for="nome">Nome do Empreendimento:</label>
<input type="text" name="nome" class="form3" required/>
</div>


<div id="formulario">
<label for="status">Estatus da Obra:</label>
<select name="status" class="form3">
<option value="Lançamentos">Lançamentos</option>
<option value="Entregues">Entregues</option>
<option value="Obras">Obras</option>
<option value="Empresas">Empresas</option>
</select>
</div>



<div id="formulario" >
<label for="visite_o_site">Site do Empreendimento:</label>
<input type="text" name="visite_o_site" class="form3" required/>
</div>


<div id="formulario" >
<label for="portal_do_corretor">Portal do Corretor:</label>
<input type="text" name="portal_do_corretor" class="form3" required/>
</div>

<div id="formulario">
<label for="destaque">Obra em Destaque:</label>
<select name="destaque" class="form3">
<option value="Não">Não</option>
<option value="Sim">Sim</option>
</select>
</div>


	
<div id="grid12E">
<label for="texto_apresentacao">Texto de Apresentação:
<div class="tooltip">
<div class="iterativo iiterativo">i</div>
<span class="tooltiptext">Texto de Apresentação</span>
</div></label>
<textarea class='form4' name='texto_apresentacao'/></textarea>
</div>




<div class="alinha15">ANDAMENTO DA OBRA</div>


	
<div id="formulario" style="background-color: ; width: 29%;">
<label for="aprovacao"  >Aprovação:</label>
<input type="text" name="aprovacao" class="form3" />
</div>
	
<div id="formulario">
<label for="lancamento">Lançamento:</label>
<input type="text" name="lancamento" class="form3" />
</div>
	
<div id="formulario">
<label for="infraestrutura">Infra-Estrutura:</label>
<input type="text" name="infraestrutura" class="form3" />
</div>
	
	
<div id="formulario"  style="background-color: ; width: 30%;">
<label for="acabamentos">Acabamentos:</label>
<input type="text" name="acabamentos" class="form3" />
</div>	
	
	
<div id="formulario">
<label for="total">Total:</label>
<input type="text" name="total" class="form3" />
</div>
	



<div class="alinha15">VÍDEOS</div>


<div id="formulario" style="background-color: ; width: 29%;">
<label for="video1">Vídeo 01 (ID Youtube):</label>
<input type="text" name="video1" class="form3" />
</div>
	

<div id="formulario">
<label for="video2">Vídeo 02 (ID Youtube):</label>
<input type="text" name="video2" class="form3" />
</div>


<div id="formulario">
<label for="video3">Vídeo 03 (ID Youtube):</label>
<input type="text" name="video3" class="form3" />
</div>



</div>	
	
<div id="grid12"><div class="cadastrar"><input type="submit" name="upload" style="cursor:pointer" class="cadastrar" value="CADASTRAR"/></div></div>
</div>
	
	</form>
	
	



<div id="sistemas-menu-lateral">
<div id="grid12"><div class="sistemas-marcador"><img src="img/marcador.png"/></div></div>
	<?php  include'menu-lateral.php';?>
</div></div></div>

<?php  include'menu-lateral-mobiles.php';?>
	
	
<script>
var $input    = document.getElementById('input-file'),
    $fileName = document.getElementById('file-name');

$input.addEventListener('change', function(){
  $fileName.textContent = this.value;
});
</script>
	



</body>
</html>