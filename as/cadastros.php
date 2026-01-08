<?php
session_start();
if((!isset($_SESSION['login']))
AND (!isset($_SESSION['senha']))) {
    header("Location: /as/index.php?erro=logar");
    exit();
}
$login = $_SESSION['login'];
$senha = $_SESSION['senha'];  
include'conecta.php';
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

<div class="center"><div class="clearfix"><div id="sistemas-infos">

<div id="painel-banner">
<div id="painel-banner-padding">
<div id="grid12">
<div class="painel-cliente-icone"><img src="img/icons/cadastros.png" width="100%"/></div>
	

<?php
if ($conn) {
    $sql = "SELECT * FROM newsletter ORDER BY id DESC";
    $comando = mysqli_query($conn, $sql);
    if ($comando) {
        $linhas = mysqli_num_rows($comando); 
        echo"<div class=\"alinha14\">CADASTROS ($linhas)</div>";
    } else {
        echo"<div class=\"alinha14\">CADASTROS (0)</div>";
    }
} else {
    echo"<div class=\"alinha14\">CADASTROS - Erro de conexão</div>";
}?> 
	

</div></div>
<div id="grid12F"><div id="painel-banner-botoes-center">

<div style="display: none"><a href="produtos-filtro"><div class="painel-banner-botoes2"><img src="img/filtro.jpg" width="100%"/></div></a></div>

<div style="display: none"><a href="produtos-categorias"><div class="painel-banner-botoes1"><img src="img/categorias.jpg" width="100%"/></div></a></div>

<div style="display: none">
<a href="videos-cadastrar"><div class="painel-banner-botoes1"><a href="videos-cadastrar"><img src="img/novo.jpg" width="100%"/></a></div></a></div>
</div></div></div>

<div id="painel-cliente">	
	
<?php
if ($conn) {
    $i = 0; // Inicializa o contador
    $sql = "SELECT * FROM newsletter ORDER BY id DESC";
    $comando = mysqli_query($conn, $sql);
    if ($comando) {
        while($res = mysqli_fetch_assoc($comando)){
            $i++;
            
            $id = $res['id'] ?? '';
            $data_cadastro = $res['data_cadastro'] ?? '';
            $email = $res['email'] ?? '';	
            $nome = $res['nome'] ?? '';
            $telefone = $res['telefone'] ?? '';

            // Garante que as variáveis não sejam vazias para exibição
            $nome = !empty($nome) ? $nome : '-';
            $telefone = !empty($telefone) ? $telefone : '-';
            $email = !empty($email) ? $email : '-';
            $data_cadastro = !empty($data_cadastro) ? $data_cadastro : '-';
            
            echo "		

<div id=\"painel-banner-listagem\">
<div class=\"painel-banner-text\">$i</div>
<div class=\"painel-banner-text\">$data_cadastro</div>
<div class=\"painel-banner-text\">$nome</div>
<div class=\"painel-banner-text\">$telefone</div>
<div class=\"painel-banner-text\">$email</div>

<div id=\"grid12F\"><div id=\"painel-banner-listagemIcon-center\">

<div class=\"painel-banner-listagem-icon\"><a href='/as/cadastros.php?acao=remove&id=$id' onclick=\"return confirm('Certeza que deseja excluir?');\"><img src=\"img/excluir2.png\"/></a></div>

</div></div>

</div>




"; 
        } // fecha while
    } // fecha if comando
} // fecha if conn
?>

</div></div>

<div id="sistemas-menu-lateral">
<div id="grid12"><div class="sistemas-marcador"><img src="img/marcador.png"/></div></div>
	<?php include'menu-lateral.php';?>
</div></div></div>

<?php  include'menu-lateral-mobiles.php';?>
	
	
	
<?php
if ($conn) {
    $acao = $_GET['acao'] ?? '';
    $id = $_GET['id'] ?? 0;
    if ($acao == 'remove' && $id > 0){
        $sql = "DELETE FROM `newsletter` WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            echo "<script language='javascript'>function alerta(){alert('Removido com sucesso!'); }alerta();document.location='/as/cadastros.php';</script>";
        }
    }
}?>


</body>
</html>