<!DOCTYPE html>
<html lang="pt-br"> 
<head>
	<?php include'as/conecta.php'; error_reporting(0); ini_set('display_errors', 0);?> 
	<?php
	// Valores padrão caso não haja conexão com o banco
	$id = '';
	$nome = 'Clínica Bel Viso';
	$titulo = 'Clínica Bel Viso';
	$titulo2 = 'Clínica Bel Viso';
	$email = '';
	$telefone1 = ''; 
	$telefone2 = '';
	$cidade = ''; 
	$estado = '';
	$setor = '';
	$endereco = '';
	$missao = ''; 
	$visao = '';
	$valores = '';
	$texto_apresentacao = '';  
	$texto_institucional = 'Bem-vindo à Clínica Bel Viso';
	$texto_institucional_desktop = 'Bem-vindo à Clínica Bel Viso';
	$cep = '';
	$ano_atual = date('Y');
	
	if ($conn) {
		$sql = "SELECT * FROM institucional";
		$comando = mysqli_query($conn, $sql);
		if ($comando) {
			while($res = mysqli_fetch_assoc($comando)){	
	$id = $res['id'];
	$nome = $res['nome'];
	$titulo = $res['titulo'];
	$titulo2 = $res['titulo'];
	$email = $res['email'];
	$telefone1 = $res['telefone1']; 
	$telefone2 = $res['telefone2'];
	$cidade = $res['cidade']; 
	$estado = $res['estado'];
	$setor = $res['setor'];
	$endereco = $res['endereco'];
	$missao = $res['missao']; 
	$visao = $res['visao'];
	$valores = $res['valores'];
	$texto_apresentacao = $res['texto_apresentacao'];  
	$texto_institucional = $res['texto_institucional']; $texto_institucional  = nl2br($texto_institucional);
	$texto_institucional_desktop = ($texto_institucional); if(strlen($texto_institucional_desktop) > 15){ $texto_institucional_desktop = substr($texto_institucional_desktop, 0, 348) . "";}
	$cep = $res['cep'];
	$ano_atual = date('Y');
			}
		}
	}
	?>
	<?php
	// Valores padrão para Google
	$id = '';
	$google_maps = '';
	$google_analytics = '';
	$google_tag_manager = '';
	$texto_busca = '';
	
	if ($conn) {
		$sql = "SELECT * FROM google ORDER BY id DESC";
		$comando = mysqli_query($conn, $sql);
		if ($comando) {
			while($res = mysqli_fetch_assoc($comando)){	
	$id = $res['id'];
	$google_maps = $res['google_maps'];
	$google_analytics = $res['google_analytics'];
	$google_tag_manager = $res['google_tag_manager'];
	$texto_busca = $res['texto_busca'];
			}
		}
	}
	?>
	<?php
	// Valores padrão para redes sociais
	$id = '';
	$whatsapp_link = '#';
	$facebook_link = '#';
	$linkedin_link = '#';
	$instagram_link = '#';
	
	if ($conn) {
		$sql = "SELECT * FROM redes_sociais";
		$comando = mysqli_query($conn, $sql);
		if ($comando) {
			while($res = mysqli_fetch_assoc($comando)){
	$id = $res['id'];
	$whatsapp_link = $res['whatsapp_link'];
	$facebook_link = $res['facebook_link'];
	$linkedin_link = $res['linkedin_link'];
	$instagram_link = $res['instagram_link'];
			}
		}
	}
	?>
	<?php
	// Valores padrão para Facebook
	$id = '';
	$url = '';
	$title = '';
	$site_name = '';
	$image = '';
	$type = '';
	$description = '';
	
	if ($conn) {
		$sql = "SELECT * FROM facebook ORDER BY id DESC";
		$comando = mysqli_query($conn, $sql);
		if ($comando) {
			while($res = mysqli_fetch_assoc($comando)){    
	$id = $res['id'];
	$url = $res['url'];
	$title = $res['title'];
	$site_name = $res['site_name'];
	$image = $res['image'];
	$type = $res['type'];
	$description = $res['description'];
	echo"
	<meta property=\"og:url\" content=\"$url\">
	<meta property=\"og:title\" content=\"$title\">
	<meta property=\"og:site_name\" content=\"$site_name\">
	<meta property=\"og:description\" content=\"$description\">
	<meta property=\"og:image\" content=\"$image\">
	<meta property=\"og:type\" content=\"$type\">
	";			}
		}
	}
	?>

	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PZMDPFGT');</script>
<!-- End Google Tag Manager -->
	
	<title><?php echo"$titulo";?></title>
	<meta name="description" content="<?php echo"$texto_busca";?>"/>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="assets/images/marca.png" type="image/x-icon" />
    
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:700|Roboto:400,400i,700&display=swap" rel="stylesheet">
    
    <!-- FontAwesome JS-->
    <script defer src="assets/fontawesome/js/all.min.js"></script>

    <!-- Theme CSS -->  
	
    <link id="theme-style" rel="stylesheet" href="assets/css/theme.css">

	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=AW-11139651228"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'AW-11139651228');
	</script>

	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-M28SB5RNJ1"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'G-M28SB5RNJ1');
	</script>

	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=AW-11320918427"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'AW-11320918427');
	</script>


</head> 

<body>    

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PZMDPFGT"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


    <header class="header">	    
        <div class="branding">
            <div class="container-fluid position-relative py-5">
                <div class="container logo-wrapper">
	                <div class="row">
						<div class="col-6 site-logo"><a class="navbar-brand" href="index.php"><img class="logo-icon me-2" src="assets/images/logo-arisya.png" alt="logo" ></a></div>
						<div class="col-6 site-icon">
					     	<a href="<?php echo"$whatsapp_link";?>"><img src="assets/images/whatsapp.png" alt=""></a>
							<a href="<?php echo"$instagram_link";?>"><img src="assets/images/instagram.png" alt=""></a>
						</div> 
					</div>
                </div><!--//docs-logo-wrapper-->
	        
            </div><!--//container-->
        </div><!--//branding-->
    </header><!--//header-->
    
    <section class="hero-section">
	    <div class="container">
		    <div class="row">
			    <div class="col-lg-6 col-sm-12 pt-5  align-self-center">
				    <div class="promo pe-md-3 pe-lg-5">
					    <h1 class="headline mb-3">
						    Especialistas em Estética,<br> Odontologia e Bem-estar!
					    </h1><!--//headline-->
						<p>Cuide da sua saúde bucal e autoestima conosco</p>
					    <div class="subheadline mb-4">
						<?php echo"$texto_institucional";?>						    
					    </div><!--//subheading-->
					    
					    <div class="cta-holder row gx-md-3 gy-3 gy-md-0">
						    <div class="col-12 col-md-auto">
						        <a class="btn btn-primary w-100" href="<?php echo"$whatsapp_link";?>">Vamos agendar sua avaliação!!</a>
						    </div>
					    </div><!--//cta-holder-->
					    

				    </div><!--//promo-->
			    </div><!--col-->
			    <div class="col-lg-6 col-sm-12 align-self-center">
				    <div class="book-cover-holder">
					    <img class="img-fluid book-cover" src="assets/images/avatar.png" alt="book cover" >
					    
				    </div><!--//book-cover-holder-->

			    </div><!--col-->
		    </div><!--//row-->
	    </div><!--//container-->
    </section><!--//hero-section-->


	<section id="servicos">
		<div class="container">
			<div class="row">

				<div class="col-lg-6 col-sm-12">
					<div class="caixa-img">
						<a href="<?php echo"$whatsapp_link";?>">
							<img src="assets/images/camada-1.jpg" alt="DTM - Disfunção Temporomandibular" width="100%">
						</a>
					</div>
				</div>

				<div class="col-lg-6 col-sm-12">
					<div class="caixa-img">
						<a href="<?php echo"$whatsapp_link";?>">
							<img src="assets/images/camada-2.jpg" alt="Lentes de Contato" width="100%">
						</a>
					</div>
				</div>
				

			</div>
		</div>

	</section>

	<section id="antesdepois">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<h1>Diagnóstico Inicial e Conclusão do Tratamento</h1>
					<p>Confira alguns resultados de tratamentos</p>
	
					<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
	
						<div class="carousel-inner">

						<?php
if ($conn) {
	$sql = "SELECT * FROM banner WHERE categoria = 'tratamentos' ORDER BY posicao ASC";
	$comando = mysqli_query($conn, $sql);
	if ($comando) {
		$first = true;
		while($res = mysqli_fetch_assoc($comando)){

$id = $res['id'];
$imagem = $res['imagem'];
$posicao = $res['posicao'];
$categoria = $res['categoria'];
$link = $res['link'];
$active_class = $first ? 'active' : '';
$first = false;
echo"
							<div class=\"carousel-item $active_class\">
		
								<a href=\"$whatsapp_link\">
									<img id=\"sliddesktop\" class=\"w-100\" src=\"img2/banner/$imagem\" alt=\"Slide $posicao\" width=\"100%\">
								</a>
		
								<a href=\"$whatsapp_link\">
									<img id=\"slidmobile\" class=\"w-100\" src=\"img2/banner/$imagem\" alt=\"Slide $posicao\" width=\"100%\">
								</a>
							</div>
"; 		}
	}
}?>		
			
							
						</div>
						<a id="setadesk" class="carousel-control-prev" href="#carouselExampleControls" role="button"
							data-slide="prev">
							<span class="carousel-control-prev" aria-hidden="true"><img src="assets/images/seta-esquerda.png"
									alt=""></span>
							<span class="sr-only">Previous</span>
						</a>
						<a id="setadesk" class="carousel-control-next" href="#carouselExampleControls" role="button"
							data-slide="next">
							<span class="carousel-control-next" aria-hidden="true"><img src="assets/images/seta-direita.png"
									alt=""></span>
							<span class="sr-only">Next</span>
						</a>
		
					</div>

					<div class="texto"><p></p></div>
				</div>

				<div class="col-lg-4 agendamento">
				<a href="<?php echo"$whatsapp_link";?>">
						<img src="assets/images/aparelho-ultraformer.png" alt="ultraformer" width="100%">
					</a>
				</div>

			</div>
		</div>
	</section>
    
    <section id="benefits-section" class="benefits-section theme-bg-light-gradient py-5">
	    <div class="container py-5">
		    <h2 class="section-heading  mb-3">Outros Tratamentos</h2>

		    <div class="row text-center">

			
<?php
if ($conn) {
	$id =$_GET['id'];
	$sql = "SELECT * FROM tratamentos ORDER BY id ASC";
	$comando = mysqli_query($conn, $sql);
	if ($comando) {
		while($res = mysqli_fetch_assoc($comando)){

$id = $res ['id'];
$titulo = $res ['titulo'];
$titulo_slug = $res ['titulo_slug'];
$data_cadastro = $res ['data_cadastro'];	
$desc = $res ['desc'];
$desc2 = $res ['desc2'];
$icone = $res ['icone'];
$categoria = $res ['categoria'];
echo"
			    <div class=\"item col-12 col-md-6 col-lg-4\">
				    <div class=\"item-inner p-3 p-lg-4\">
					    <div class=\"item-header mb-3\">
						    <div class=\"item-icon\"><img src=\"assets/images/marca.png\" alt=\"\"></div>
						    <h3 class=\"item-heading\">$titulo</h3>
					    </div><!--//item-heading-->
					    <div class=\"item-desc\">
						   $desc
					    </div><!--//item-desc-->
				    </div><!--//item-inner-->
			    </div><!--//item-->
"; 		}
	}
}?>
			 


		    </div><!--//row-->
	    </div><!--//container-->
    </section><!--//benefits-section-->
    
 
	
	
<?php
$acao = $_GET ['acao'] ?? '';
if ($acao=='cadastrar' && $conn){

$id = $_POST ['id'] ?? '';
$nome = $_POST ['nome'] ?? '';
$email = $_POST ['email'] ?? '';
$data_cadastro = $_POST ['data_cadastro'] ?? '';
$telefone = $_POST ['telefone'] ?? '';

$diaatual = date('d');
$mesatual = date('m');	
$anoatual = date('Y');	

$sql =" 
INSERT INTO `newsletter` (`id`, `nome`, `email`, `data_cadastro` , `telefone`) 
              VALUES (NULL, '$nome', '$email',  '$diaatual/$mesatual/$anoatual' , '$telefone');"; 

if ($conn->query($sql) === TRUE) {  
  
  echo"<script language='javascript'>
      function alerta(){alert('Obrigado! Em breve retornaremos.');}
      alerta();
      document.location='javascript:history.go(-1)';
      </script>";
  
    }
}?>


    <section id="form-section" class="form-section">
	    <div class="container">
			<div class="row">
				<div class="col-12 col-lg-3">
					<h1>Quer receber<br> nosso contato?</h1>
					<p>Preencha os campos que retornaremos!</p>
				</div>

				<div class="col-lg-9" style="padding-top: 35px;">
				<form  action='index.php?acao=cadastrar' method='post' enctype='multipart/form-data' class="signup-form row g-2 align-items-center">
	                    <div class="col-12 col-lg-3" style="padding: 0 20px 0 20px;">
	                        <label for="nome">Seu Nome</label>
	                        <input type="text" id="nome" name="nome" class="form-control me-md-1 semail" required>
	                    </div>

						<div class="col-12 col-lg-3" style="padding: 0 20px 0 20px;">
	                        <label for="email">Seu melhor e-mail</label>
	                        <input type="email" id="email" name="email" class="form-control me-md-1 semail">
	                    </div>

						<div class="col-12 col-lg-3" style="padding: 0 20px 0 20px;">
	                        <label for="telefone">Seu Whastapp</label>
	                        <input type="text" id="telefone" name="telefone" class="form-control me-md-1 semail" required>
	                    </div>
	                    <div class="col-12 col-lg-3" style="padding: 0 30px 0 30px;">
	                        <button type="submit" class="btn btn-primary btn-submit  botao">Enviar</button>
	                    </div>
	                </form><!--//signup-form-->
				</div>
			</div>

	    </div><!--//container-->
    </section><!--//form-section-->
    
    <section id="reviews-section" class="reviews-section py-5">
	    <div class="container">
		    <h2 class="section-heading">Depoimentos</h2>
		    <div class="row justify-content-center">

			   
<?php
if ($conn) {
	$id =$_GET['id'];
	$sql = "SELECT * FROM depoimentos ORDER BY id DESC";
	$comando = mysqli_query($conn, $sql);
	if ($comando) {
		while($res = mysqli_fetch_assoc($comando)){

$id = $res['id'];
$nome = $res ['nome'];
$imagem = $res ['imagem'];	
$video = $res ['video'];	
$data_cadastro = $res ['data_cadastro'];
$depoimento = $res ['depoimento'];	

echo"
			    <div class=\"item col-12 col-lg-4 p-3 mb-4\">
				    <div class=\"item-inner theme-bg-light rounded p-4\">					    
					   
				        <div class=\"source row gx-md-3 gy-3 gy-md-0\">
					        <div class=\"col-12 col-md-auto text-center text-md-start\">
					            <img class=\"source-profile\" src=\"assets/images/profiles/profile-1.png\" alt=\"image\">
					        </div><!--//col-->
					        <div class=\"col source-info text-center text-md-start\">
						        <div class=\"source-name\">$nome</div>
						    </div><!--//col-->
				        </div><!--//source-->
						<blockquote class=\"quote\">
					        $depoimento   
				        </blockquote><!--//item-->
				        <div class=\"icon-holder\"><i class=\"fas fa-quote-right\"></i></div>
				    </div><!--//inner-->
			    </div><!--//item-->
"; 		}
	}
}?>

				
		    </div><!--//row-->

	    </div><!--//container-->
    </section><!--//reviews-section-->
    

    
    

    <footer class="footer">

		<div class="container">
			<div class="row">
				<div id="direitos" class="col-lg-6 col-sm-12">
					<p>Todos direitos são reservados - Clínica Bel Viso</p>
				</div>
				
	  
			</div>
		</div>
	    
    </footer>
       
    <!-- Javascript -->  
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script> 
    <script src="assets/plugins/smoothscroll.min.js"></script> 
    
    <script src="assets/js/main.js"></script>

</body>
</html> 

