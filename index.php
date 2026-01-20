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
	<?php 
	// Meta description com fallback caso texto_busca esteja vazio
	$meta_description = !empty($texto_busca) ? $texto_busca : 'Clínica Bel Viso - Especialistas em Estética, Odontologia e Bem-estar em Goiânia. Agende sua consulta!';
	?>
	<meta name="description" content="<?php echo htmlspecialchars($meta_description, ENT_QUOTES, 'UTF-8'); ?>"/>
	
	<?php
	// Meta tags essenciais para SEO
	// Keywords baseadas em serviços e localização
	$keywords_base = 'odontologia, estética facial, clínica dental, implantes dentários, dentista, tratamento estético';
	$keywords_local = !empty($cidade) ? $cidade : 'Goiânia';
	$keywords_estado = !empty($estado) ? $estado : 'Goiás';
	$meta_keywords = $keywords_base . ', ' . $keywords_local . ', ' . $keywords_estado . ', clínica odontológica, estética facial ' . $keywords_local;
	
	// Canonical URL
	$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
	$canonical_url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	// Remove query strings para canonical
	$canonical_url = strtok($canonical_url, '?');
	?>
	
	<!-- Meta Tags Essenciais para SEO -->
	<meta name="keywords" content="<?php echo htmlspecialchars($meta_keywords, ENT_QUOTES, 'UTF-8'); ?>">
	<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
	<meta name="language" content="Portuguese">
	<meta http-equiv="content-language" content="pt-BR">
	<link rel="canonical" href="<?php echo htmlspecialchars($canonical_url, ENT_QUOTES, 'UTF-8'); ?>">
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Clínica Bel Viso">    
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
						<div class="col-6 site-logo"><a class="navbar-brand" href="index.php"><img class="logo-icon me-2" src="assets/images/logo-arisya.png" alt="logo" decoding="async" fetchpriority="high"></a></div>
						<div class="col-6 site-icon">
					     	<a href="<?php echo"$whatsapp_link";?>"><img src="assets/images/whatsapp.png" alt="" loading="eager" decoding="async"></a>
							<a href="<?php echo"$instagram_link";?>"><img src="assets/images/instagram.png" alt="" loading="eager" decoding="async"></a>
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
					    <img class="img-fluid book-cover" src="assets/images/avatar.png" alt="book cover" loading="eager" decoding="async" fetchpriority="high">
					    
				    </div><!--//book-cover-holder-->

			    </div><!--col-->
		    </div><!--//row-->
	    </div><!--//container-->
    </section><!--//hero-section-->


	<section id="servicos">
		<div class="container">
			<h2 class="section-heading text-center mb-4">Nossos Serviços Especializados</h2>
			<div class="row">

				<div class="col-lg-6 col-sm-12">
					<div class="caixa-img">
						<a href="<?php echo"$whatsapp_link";?>">
							<img src="assets/images/camada-1.jpg" alt="DTM - Disfunção Temporomandibular" width="100%" loading="lazy" decoding="async">
						</a>
					</div>
				</div>

				<div class="col-lg-6 col-sm-12">
					<div class="caixa-img">
						<a href="<?php echo"$whatsapp_link";?>">
							<img src="assets/images/camada-2.jpg" alt="Lentes de Contato" width="100%" loading="lazy" decoding="async">
						</a>
					</div>
				</div>
				

			</div>
		</div>

	</section>

	<section id="antesdepois">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-8">
					<h2>Diagnóstico Inicial e Conclusão do Tratamento</h2>
					<h3 class="mb-3">Confira alguns resultados de tratamentos</h3>
	
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
$img_loading = $first ? 'eager' : 'lazy';
$img_fetchpriority = $first ? 'high' : 'auto';
$first = false;
echo"
							<div class=\"carousel-item $active_class\">
		
								<a href=\"$whatsapp_link\">
									<img id=\"sliddesktop\" class=\"w-100\" src=\"img2/banner/$imagem\" alt=\"Slide $posicao\" width=\"100%\" loading=\"$img_loading\" decoding=\"async\" fetchpriority=\"$img_fetchpriority\">
								</a>
		
								<a href=\"$whatsapp_link\">
									<img id=\"slidmobile\" class=\"w-100\" src=\"img2/banner/$imagem\" alt=\"Slide $posicao\" width=\"100%\" loading=\"$img_loading\" decoding=\"async\" fetchpriority=\"$img_fetchpriority\">
								</a>
							</div>
"; 		}
	}
}?>		
			
							
						</div>
						<a id="setadesk" class="carousel-control-prev" href="#carouselExampleControls" role="button"
							data-slide="prev">
							<span class="carousel-control-prev" aria-hidden="true"><img src="assets/images/seta-esquerda.png" loading="lazy" decoding="async"
									alt=""></span>
							<span class="sr-only">Previous</span>
						</a>
						<a id="setadesk" class="carousel-control-next" href="#carouselExampleControls" role="button"
							data-slide="next">
							<span class="carousel-control-next" aria-hidden="true"><img src="assets/images/seta-direita.png" loading="lazy" decoding="async"
									alt=""></span>
							<span class="sr-only">Next</span>
						</a>
		
					</div>

					<div class="texto"><p></p></div>
				</div>

				<div class="col-lg-4 agendamento">
					<a href="<?php echo"$whatsapp_link";?>">
						<img src="assets/images/aparelho-ultraformer.png" alt="ultraformer" width="100%" loading="lazy" decoding="async">
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
						    <div class=\"item-icon\"><img src=\"assets/images/marca.png\" alt=\"\" loading=\"lazy\" decoding=\"async\"></div>
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
	// ============================================================
	// SEO: Conteúdo + Palavras-chave (FAQ) + Schema.org FAQPage
	// ============================================================
	$faq_city = !empty($cidade) ? $cidade : 'Goiânia';
	$faq_state = !empty($estado) ? $estado : 'GO';
	$faq_address = trim((string)($endereco ?? ''));
	$faq_location_line = !empty($faq_address) ? ($faq_address . ' - ' . $faq_city . '/' . $faq_state) : ($faq_city . '/' . $faq_state);
	$faq_whatsapp = !empty($whatsapp_link) ? $whatsapp_link : '#';

	$faq_items = [
		[
			'q' => 'Onde fica a Clínica Bel Viso?',
			'a_text' => 'Estamos localizados em ' . $faq_location_line . '. Para orientações e localização atualizada, fale com a equipe pelo WhatsApp.',
			'a_html' => '<p>Estamos localizados em <strong>' . htmlspecialchars($faq_location_line, ENT_QUOTES, 'UTF-8') . '</strong>.</p><p>Para orientações e localização atualizada, fale com a equipe pelo <a href="' . htmlspecialchars($faq_whatsapp, ENT_QUOTES, 'UTF-8') . '">WhatsApp</a>.</p>',
		],
		[
			'q' => 'Como agendar uma avaliação?',
			'a_text' => 'Você pode agendar sua avaliação pelo WhatsApp. Envie seu nome e o tratamento de interesse (ex.: lentes de contato dental, clareamento, bioestimulador, botox) e a equipe orienta os horários disponíveis.',
			'a_html' => '<p>Você pode agendar sua avaliação pelo <a href="' . htmlspecialchars($faq_whatsapp, ENT_QUOTES, 'UTF-8') . '">WhatsApp</a>.</p><p>Envie seu nome e o tratamento de interesse (ex.: <strong>lentes de contato dental</strong>, <strong>clareamento</strong>, <strong>bioestimulador</strong>, <strong>toxina botulínica</strong>) e a equipe orienta os horários disponíveis.</p>',
		],
		[
			'q' => 'Quais tratamentos de Estética facial a clínica realiza?',
			'a_text' => 'Atuamos com procedimentos como bioestimulador de colágeno (Sculptra/ácido polilático e hidroxiapatita), preenchimentos faciais com ácido hialurônico, fios de sustentação (PDO), ultrassom microfocado, toxina botulínica e peelings Line Skin (Hard, Aging, Melan).',
			'a_html' => '<p>Atuamos com procedimentos de <strong>Estética facial</strong> como:</p><ul><li><strong>Bioestimulador de colágeno</strong> (ex.: ácido polilático/Sculptra e hidroxiapatita de cálcio)</li><li><strong>Preenchimentos faciais</strong> com ácido hialurônico (malar, olheiras, mandíbula, lábios, etc.)</li><li><strong>Fios de sustentação</strong> (PDO)</li><li><strong>Ultrassom microfocado</strong></li><li><strong>Toxina botulínica</strong></li><li><strong>Peelings Line Skin</strong> (Hard, Aging e Melan)</li></ul><p>Na avaliação, indicamos o melhor protocolo para seu objetivo.</p>',
		],
		[
			'q' => 'Como funciona o clareamento dental? Quanto tempo leva?',
			'a_text' => 'O clareamento dental costuma levar cerca de 21 dias (podendo variar). O clareamento combinado (em casa + consultório) pode potencializar o resultado, trazendo um sorriso mais branco com estabilidade de cor.',
			'a_html' => '<p>O <strong>clareamento dental</strong> costuma levar cerca de <strong>21 dias</strong> (podendo variar de acordo com a técnica e o caso).</p><p>O clareamento <strong>combinado</strong> (em casa + consultório) pode potencializar o resultado: o consultório traz resultado mais rápido e o caseiro ajuda na estabilidade e durabilidade da cor.</p>',
		],
		[
			'q' => 'Como funciona o tratamento com lentes de contato dental?',
			'a_text' => 'Lentes de contato dental são lâminas finas de cerâmica que podem mudar tamanho, formato e cor dos dentes. O processo inclui planejamento, escaneamento intraoral, fotos, desenho 3D e teste virtual antes da finalização.',
			'a_html' => '<p><strong>Lentes de contato dental</strong> são lâminas finas de cerâmica que podem transformar o sorriso, ajustando tamanho, formato e cor dos dentes.</p><p>O processo envolve planejamento com <strong>scanner intra-oral</strong>, fotos, <strong>desenho 3D</strong> e teste virtual antes da finalização — e você participa da escolha de formato e cor.</p>',
		],
		[
			'q' => 'Como funcionam os implantes dentários?',
			'a_text' => 'Implantes dentários são pinos de titânio biocompatíveis que se integram ao osso para substituir dentes perdidos. A prótese é a parte visível. Em alguns casos, podem ser necessários enxertos ósseos e/ou gengivais para o sucesso do tratamento.',
			'a_html' => '<p><strong>Implantes dentários</strong> são pinos de titânio biocompatíveis que se integram ao osso para substituir dentes perdidos.</p><p>A prótese é a parte visível e pode devolver função e estética. Em alguns casos, podem ser necessários <strong>enxertos ósseos</strong> e/ou <strong>gengivais</strong> para o sucesso do tratamento.</p>',
		],
		[
			'q' => 'O que é cirurgia gengival e quando é indicada?',
			'a_text' => 'A cirurgia gengival (periodontia) remove excesso de tecido e melhora a harmonia do sorriso, podendo reduzir a exposição gengival. Pode ser indicada isoladamente ou combinada com lentes de contato dental, conforme avaliação.',
			'a_html' => '<p>A <strong>cirurgia gengival</strong> (periodontia) remove excesso de tecido e melhora a harmonia do sorriso, podendo reduzir a exposição gengival.</p><p>Pode ser indicada isoladamente ou combinada com <strong>lentes de contato dental</strong>, conforme avaliação.</p>',
		],
		[
			'q' => 'Quais tipos de prótese dentária existem?',
			'a_text' => 'A prótese dentária pode ser fixa ou removível e pode substituir dentes/tecidos perdidos. Pode ser feita em resina acrílica (temporárias) ou cerâmica/porcelana (permanentes), apoiada em dentes, implantes ou mucosa, conforme o caso.',
			'a_html' => '<p>A <strong>prótese dentária</strong> pode ser <strong>fixa</strong> ou <strong>removível</strong> e substitui dentes/tecidos perdidos.</p><p>Pode ser feita em <strong>resina acrílica</strong> (temporárias) ou <strong>cerâmica/porcelana</strong> (permanentes), apoiada em dentes, implantes ou mucosa, conforme o caso.</p>',
		],
		[
			'q' => 'A clínica atende convênios?',
			'a_text' => 'Para informações atualizadas sobre convênios, formas de pagamento e condições, entre em contato com a equipe pelo WhatsApp.',
			'a_html' => '<p>Para informações atualizadas sobre <strong>convênios</strong>, formas de pagamento e condições, entre em contato com a equipe pelo <a href="' . htmlspecialchars($faq_whatsapp, ENT_QUOTES, 'UTF-8') . '">WhatsApp</a>.</p>',
		],
		[
			'q' => 'Como funciona a primeira avaliação?',
			'a_text' => 'Na primeira avaliação, a equipe entende sua necessidade, analisa o caso e recomenda as opções de tratamento. Quando necessário, são solicitados exames e definido um plano de cuidado.',
			'a_html' => '<p>Na primeira avaliação, a equipe entende sua necessidade, analisa o caso e recomenda as opções de tratamento.</p><p>Quando necessário, são solicitados exames e definido um plano de cuidado.</p>',
		],
		[
			'q' => 'Qual é o horário de atendimento?',
			'a_text' => 'Os horários podem variar. Para confirmar horários disponíveis e agendar, fale com a equipe pelo WhatsApp.',
			'a_html' => '<p>Os horários podem variar.</p><p>Para confirmar horários disponíveis e agendar, fale com a equipe pelo <a href="' . htmlspecialchars($faq_whatsapp, ENT_QUOTES, 'UTF-8') . '">WhatsApp</a>.</p>',
		],
	];

	$faq_schema = [
		'@context' => 'https://schema.org',
		'@type' => 'FAQPage',
		'mainEntity' => array_map(function ($item) {
			return [
				'@type' => 'Question',
				'name' => $item['q'],
				'acceptedAnswer' => [
					'@type' => 'Answer',
					'text' => $item['a_text'],
				],
			];
		}, $faq_items),
	];
	?>

	<script type="application/ld+json"><?php echo json_encode($faq_schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?></script>

	<section id="faq-section" class="faq-section theme-bg-light-gradient py-5">
		<div class="container py-5">
			<h2 class="section-heading mb-3">Perguntas frequentes</h2>
			<p class="mb-4">Confira respostas rápidas sobre agendamento, localização e atendimentos. Se preferir, fale com a equipe pelo WhatsApp.</p>

			<div id="faqAccordion" class="accordion">
				<?php foreach ($faq_items as $idx => $item): $i = $idx + 1; $isOpen = ($i === 1); ?>
					<div class="card faq-card">
						<div class="card-header faq-card-header" id="faqHeading<?php echo $i; ?>">
							<h3 class="mb-0 faq-question">
								<button class="btn btn-link faq-toggle <?php echo $isOpen ? '' : 'collapsed'; ?>"
									type="button"
									data-toggle="collapse"
									data-target="#faqCollapse<?php echo $i; ?>"
									aria-expanded="<?php echo $isOpen ? 'true' : 'false'; ?>"
									aria-controls="faqCollapse<?php echo $i; ?>">
									<?php echo htmlspecialchars($item['q'], ENT_QUOTES, 'UTF-8'); ?>
								</button>
							</h3>
						</div>

						<div id="faqCollapse<?php echo $i; ?>"
							class="collapse <?php echo $isOpen ? 'show' : ''; ?>"
							aria-labelledby="faqHeading<?php echo $i; ?>"
							data-parent="#faqAccordion">
							<div class="card-body faq-card-body">
								<?php echo $item['a_html']; ?>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div><!--//container-->
	</section><!--//faq-section-->
	
	
	
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
					<h2>Quer receber<br> nosso contato?</h2>
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
					            <img class=\"source-profile\" src=\"assets/images/profiles/profile-1.png\" alt=\"image\" loading=\"lazy\" decoding=\"async\">
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
			<div class="row footer-sitemap">
				<div class="col-12 col-lg-4 mb-4 mb-lg-0">
					<div class="footer-title">Mapa do site</div>
					<ul class="footer-links">
						<li><a href="#servicos">Serviços</a></li>
						<li><a href="#antesdepois">Resultados (Antes e Depois)</a></li>
						<li><a href="#benefits-section">Outros Tratamentos</a></li>
						<li><a href="#faq-section">Perguntas frequentes</a></li>
						<li><a href="#form-section">Contato</a></li>
						<li><a href="#reviews-section">Depoimentos</a></li>
					</ul>
				</div>

				<div class="col-12 col-lg-4 mb-4 mb-lg-0">
					<div class="footer-title">Links rápidos</div>
					<ul class="footer-links">
						<li><a href="<?php echo htmlspecialchars($whatsapp_link, ENT_QUOTES, 'UTF-8'); ?>">WhatsApp</a></li>
						<li><a href="<?php echo htmlspecialchars($instagram_link, ENT_QUOTES, 'UTF-8'); ?>">Instagram</a></li>
						<?php if (!empty($facebook_link) && $facebook_link !== '#'): ?>
							<li><a href="<?php echo htmlspecialchars($facebook_link, ENT_QUOTES, 'UTF-8'); ?>">Facebook</a></li>
						<?php endif; ?>
						<?php if (!empty($linkedin_link) && $linkedin_link !== '#'): ?>
							<li><a href="<?php echo htmlspecialchars($linkedin_link, ENT_QUOTES, 'UTF-8'); ?>">LinkedIn</a></li>
						<?php endif; ?>
					</ul>
				</div>

				<div class="col-12 col-lg-4">
					<div class="footer-title">Clínica Bel Viso</div>
					<div class="footer-text">
						<?php if (!empty($endereco)): ?>
							<div class="footer-line"><?php echo htmlspecialchars($endereco, ENT_QUOTES, 'UTF-8'); ?></div>
						<?php endif; ?>
						<?php if (!empty($cidade) || !empty($estado)): ?>
							<div class="footer-line"><?php echo htmlspecialchars(trim(($cidade ?? '') . (empty($estado) ? '' : ' / ' . $estado)), ENT_QUOTES, 'UTF-8'); ?></div>
						<?php endif; ?>
						<?php if (!empty($telefone1) || !empty($telefone2)): ?>
							<div class="footer-line"><?php echo htmlspecialchars(trim(($telefone1 ?? '') . (empty($telefone2) ? '' : ' | ' . $telefone2)), ENT_QUOTES, 'UTF-8'); ?></div>
						<?php endif; ?>
					</div>
				</div>
			</div>

			<div class="row">
				<div id="direitos" class="col-12">
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

