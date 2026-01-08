<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<?php error_reporting(0);
ini_set(“display_errors”, 0 );  include'head.php';?>	


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.2/jquery.ui.touch-punch.min.js"></script>
</head>

  <style>
  #sortable { 
    list-style-type: none; 
    margin: 0; 
    padding: 0; 
    width: 100%; 
  }
  #sortable li { 
    margin: 3px 3px 3px 0; 
    padding: 1px; 
    float: left; 
    border: 0;
    background: none;
    width: 100%;
  }
  
  </style>

    <script>   
 var jq = $.noConflict();   
jq(document).ready(function(){
  // Initialize sortable
  jq( "#sortable" ).sortable();
  // Save order
  jq('#submit').click(function(){
    var imageids_arr = [];
    // get image ids order
    jq('#sortable li').each(function(){
       var id = $(this).data('id');
       imageids_arr.push(id);    });
    // AJAX request
    $.ajax({
      url: 're/reordenar-fotos-empresa.php',
      type: 'post',
      data: {imageids: imageids_arr},
      success: function(response){
        if(response == 1)
        alert('Sequência Alterada com Sucesso');
      document.location='javascript:history.go(-1)';
      }
    });
  });
});      
    </script>

<body>
<?php  include'topo-mobile.php';?>

<div id="sistemas-topo"><div class="center"><div class="clearfix">
<?php  include'topo-desktop.php';?>
</div></div></div>

<div class="center"><div class="clearfix"><div id="sistemas-infos">



<div id="painel-banner">
<div id="painel-banner-padding">
<div id="grid12">
<div class="painel-cliente-icone"><img src="img/icons/fotos.png" width="100%"/></div>
	

 

<?php
$sql = "SELECT * FROM fotos_empresa";
$comando = mysqli_query($conn, $sql);
$linhas = mysqli_num_rows($comando); 
echo"<div class=\"alinha14\">REORDENAR FOTOS DA EMPRESA ($linhas)</div>";?> 
	

</div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">	
<a href="fotos-empresa-sequencia"><div class="painel-banner-botoes2"><img src="img/reorder.png" width="100%"/></div></a>
</div></div></div>


<ul id="sortable" >

<?php

$sql = "SELECT * FROM fotos_empresa ORDER BY posicao ASC";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){

$id = $res ['id'];
$titulo = $res ['titulo']; if(strlen($titulo) > 17){ $titulo = substr($titulo, 0,  17) . "...";}
$titulo_slug = $res ['titulo_slug'];
$data_cadastro = $res ['data_cadastro'];	
$desc = $res ['desc'];
$posicao = $res ['posicao'];
$filial_bueno = $res ['filial_bueno'];
$filial_universitario = $res ['filial_universitario'];
$filial_anapolis = $res ['filial_anapolis'];
$filial_1 = $res ['filial_1'];
$icone = $res ['icone'];
$imagem = $res ['imagem'];
$i++;

echo "	

 <li class=\"ui-state-default\" data-id=\"$id\" > 

<div id=\"painel-banner-listagem\">
<div class=\"painel-banner-text\">$i</div>
<div class=\"painel-banner-text\" ><img src=\"../img2/fotos_empresa/$imagem\" width=\"60\"></div>
<div class=\"painel-banner-text\">$titulo</div><div class=\"painel-banner-text\">$categoriax</div>";

echo"</li>";

 }?> 

</ul>
	

	<div style="clear: both; margin-top: 20px;">
   
    <input type="button"  style="cursor:pointer" class="cadastrar" value="ALTERAR" id='submit'/>


    </div>


	
</div>	
	
		
	
	

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