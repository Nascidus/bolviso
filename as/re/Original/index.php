<?php
include "config.php";
?>
<!doctype html>
<html >
  <head>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
     <link rel="stylesheet" href="../desktop.css"> 
    <style>
    #sortable { 
      list-style-type: none; 
      margin: 0; 
      padding: 0; 
      width: 90%; 
    }
    #sortable li { 
      margin: 3px 3px 3px 0; 
      padding: 1px; 
      float: left; 
      border: 0;
      background: none;
    }
    #sortable li img{
      width: 180px;
      height: 140px;
    }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.2/jquery.ui.touch-punch.min.js"></script>
  </head>
  <body>

    <script>
      
$(document).ready(function(){

  // Initialize sortable
  $( "#sortable" ).sortable();

  // Save order
  $('#submit').click(function(){
    var imageids_arr = [];
    // get image ids order
    $('#sortable li').each(function(){
       var id = $(this).data('id');
       imageids_arr.push(id);
    });

    // AJAX request
    $.ajax({
      url: 'ajaxfile.php',
      type: 'post',
      data: {imageids: imageids_arr},
      success: function(response){
        if(response == 1)
        alert('Save successfully.');
      }
    });
  });
});

      
    </script>

    <div style='width: 100%;'>
      <!-- List Images -->
      <ul id="sortable" >
     


  
<?php
include "config.php";
$sql = "SELECT * FROM exames ORDER BY posicao ASC";
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

<div id=\"painel-banner-listagem3\">
<div class=\"painel-banner-text-produtos\"><a title=\"Data de Cadastro: $data_cadastro\">$i</a></div>
";

$sql2 = "SELECT * FROM categorias WHERE tipo ='Exames'";
$comando2 = mysqli_query($conn, $sql2);
while($res = mysqli_fetch_assoc($comando2)){

$categoriax = $res['categoria'];}
  
echo"<div class=\"painel-banner-text-produtos\"><a title=\"Categoria: $categoriax\">$titulo</a></div>";



echo"
<div style=\"width: 100%; float: left;\"><div id=\"painel-banner-listagemIcon-center-produtos\"\">

<div class=\"painel-banner-listagem-icon\" style=\"margin-left: 80px; \"><a href=\"exames-editar?id=$id\"><img src=\"img/editar2.png\"/ title=\"Editar\"></a></div>

<div  class=\"painel-banner-listagem-icon\"><a href=\"imagem-png-exames?id=$id\"><img src=\"img/icon-icon.png\"/ title=\"Editar Ícone\"></a></div>

<div class=\"painel-banner-listagem-icon\"><a href='exames?acao=remove&id=$id' onclick=\"return confirm('Certeza que deseja excluir?');\" title=\"Excluir\"><img src=\"img/excluir2.png\"/></a>

</div></div></div>";

if ($imagem==''){echo"<div id=\"showprodutos\"><img src=\"avatar.jpg\" width=\"100%\"></div></div>";}
else {echo"<div id=\"showprodutos\"><img src=\"../img2/exames/$imagem\" width=\"100%\"></div></div>";}

echo"</li>;";

 }?> 


    
          


                 
     






      </ul>
    </div>
    <div style="clear: both; margin-top: 20px;">
      <input type='button' value='Submit' id='submit'>
    </div>

  </body>
</html>