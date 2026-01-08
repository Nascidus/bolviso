<?php session_start(); if((!isset($_SESSION[login])) AND (!isset($_SESSION[senha])))Header("Location: index.php?erro=logar");
$login = $_SESSION['login'];
$senha = $_SESSION['senha'];  
?><!doctype html>
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

<div class="center"><div class="clearfix"><div id="sistemas-infos">

<div id="painel-banner">
<div id="painel-banner-padding">
<div id="grid12">
<div class="painel-cliente-icone"><img src="img/icons/produtos.png" width="100%"/></div>
<div class="alinha14"><a href="produtos">PRODUTOS</a> >> SUBCATEGORIAS</div></div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">	

<div style="display: none"><a href="produtos-filtro"><div class="painel-banner-botoes2"><img src="img/filtro.jpg" width="100%"/></div></a></div>

<a href="produtos-subcategorias"><div class="painel-banner-botoes1"><img src="img/subcategorias.jpg" width="100%"/></div></a>

<a href="produtos-categorias"><div class="painel-banner-botoes1"><img src="img/categorias.jpg" width="100%"/></div></a>

<a href="produtos-cadastrar"><div class="painel-banner-botoes1"><a href="produtos-cadastrar"><img src="img/novo.jpg" width="100%"/></a></div></a>
</div></div></div>
	
	
	
<div id="painel-cliente">
<div id="painel-banner">
	
<div class="alinha15">SELECIONE A CATEGORIA RAIZ</div>
	
<form action='produtos-categorias?acao=cadastrar' method='POST' enctype="multipart/form-data">

<div id="formulario">
<label for="categoria">Nome:</label>
<select name="categoria" class="form3" onchange="location.href = this.value;">
<option value="">Selecionar Categoria</option>
<?php

$sql = "SELECT * FROM categorias WHERE tipo ='produtos' ORDER BY categoria ASC";
$comando = mysqli_query($conn, $sql);
$linhas = mysqli_num_rows($comando); 
echo"<div class=\"alinha16\">EDITAR CADASTROS ($num_rows)</div>";
while($res = mysqli_fetch_assoc($comando)){

$id = $res['id'];
$categoria= $res['categoria']; 
$categoria_slug = $res ['categoria_slug'];
$i++;

echo "	
<option value=\"produtos-cadastro-subcategorias?categoria=$categoria_slug\">$categoria</option>
";}?>
	
</select>

</div>
</form>



	
	
<?php

$sql = "SELECT * FROM subcategorias WHERE tipo ='produtos' ORDER BY subcategoria ASC";
$comando = mysqli_query($conn, $sql);
$linhas = mysqli_num_rows($comando); 
echo"<div class=\"alinha16\">EDITAR CADASTROS ($linhas)</div>";
while($res = mysqli_fetch_assoc($comando)){

$id = $res['id'];
$subcategoria= $res['subcategoria']; 
$categoria_slug= $res['categoria_slug']; 
$subcategoria_slug= $res['subcategoria_slug']; 
$data_cadastro = $res ['data_cadastro'];
$i++;

echo "	
	
<div id=\"painel-banner-listagem\">
<div class=\"painel-banner-text\">$i</div>
<div class=\"painel-banner-text\">$data_cadastro</div>
<div class=\"painel-banner-text\">
<a href=\"produtos-subcategorias-listar.php?subcategoria=$subcategoria_slug\">$subcategoria</a></div>";

$sql2 = "SELECT * FROM categorias WHERE categoria_slug ='$categoria_slug'";
$comando2 = mysqli_query($conn, $sql2);
while($res = mysqli_fetch_assoc($comando2)){
$categoria = $res['categoria'];
echo"<div class=\"painel-banner-text\">Categoria: $categoria</div>";}

echo"
<div id=\"grid12F\"><div id=\"painel-banner-listagemIcon-center\">
<div class=\"painel-banner-listagem-icon\">
<a href='produtos-categorias?acao=remove&id=$id' onclick=\"return confirm('Certeza que deseja excluir?');\"><img src=\"img/excluir2.png\"/></a>
</div>
</div></div></div>
	
"; }?>	
	

</div></div></div>

<div id="sistemas-menu-lateral">
<div id="grid12"><div class="sistemas-marcador"><img src="img/marcador.png"/></div></div>
	<?php  include'menu-lateral.php';?>
</div></div></div>

<?php  include'menu-lateral-mobiles.php';?>
	
	
	
	
<script>
    document.getElementById("foo").onchange = function() {
        if (this.selectedIndex!==0) {
            window.location.href = this.value;
        }        
    };
</script>



</body>
</html>