<?php session_start(); if((!isset($_SESSION[login])) AND (!isset($_SESSION[senha])))Header("Location: index.php?erro=logar");
$login = $_SESSION['login'];
$senha = $_SESSION['senha'];  
?>
<!doctype html> 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<?php  include'head.php';?>	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.2/jquery.ui.touch-punch.min.js"></script>

</head>

<link rel="stylesheet" href="jquery-ui.min.css">
  
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
      url: 're/reordenar-categorias-produtos.php',
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
<div class="painel-cliente-icone"><img src="img/icons/produtos.png" width="100%"/></div>
	
 

<?php
$categoria_slug = $_GET['categoria_slug'];
$sql = "SELECT * FROM produtos WHERE categoria = '$categoria_slug' ORDER BY id DESC";
$comando = mysqli_query($conn, $sql);
$linhas = mysqli_num_rows($comando); 
echo"<div class=\"alinha14\">REORDENAR SEQUÊNCIA PRODUTOS ($linhas)</div>";?> 
	</div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">

<a href="javascript:history.go(-1)"><div class="painel-banner-botoes"><img src="img/voltar.jpg" width="100%"/></div></a>

</div></div></div>

<div id="painel-cliente">	

<ul id="sortable" >

<?php
$categoria_slug = $_GET['categoria_slug'];
$sql = "SELECT * FROM produtos WHERE categoria = '$categoria_slug' ORDER BY posicao ASC";
$comando = mysqli_query($conn, $sql);
while($res = mysqli_fetch_assoc($comando)){

$id = $res ['id'];
$nome = $res ['nome']; if(strlen($nome) > 17){ $nome = substr($nome, 0,  17) . "...";}
$categoria = $res ['categoria'];
$imagem = $res ['imagem'];
$i++;

echo "	

 <li class=\"ui-state-default\" data-id=\"$id\" > 

<div id=\"painel-banner-listagem\">
<div class=\"painel-banner-text\">$i</div>
<div class=\"painel-banner-text\" ><img src=\"../img2/produtos/$imagem\" width=\"40\"></div>
<div class=\"painel-banner-text\">$nome</div>";


$sql2 = "SELECT * FROM categorias WHERE tipo ='Produtos' and categoria_slug = '$categoria_slug' ";
$comando2 = mysqli_query($conn, $sql2);
while($res = mysqli_fetch_assoc($comando2)){
$categoriax = $res['categoria'];	
echo"<div class=\"painel-banner-text\">$categoriax</div>";}
echo"</li>";
 }?> 

</ul>
	<div style="clear: both; margin-top: 20px;">
       <input type="submit"  style="cursor:pointer" class="cadastrar" value="ALTERAR" id='submit'/>   </div>


</div></div>

<div id="sistemas-menu-lateral">
<div id="grid12"><div class="sistemas-marcador"><img src="img/marcador.png"/></div></div>
	<?php  include'menu-lateral.php';?>
</div></div></div>

<?php  include'menu-lateral-mobiles.php';?>
	
	
	


</body>
</html>