<!DOCTYPE html>
<html lang="pt-br">
<head>

<?php 
	$titulo_princ = get_field('titulo', 'option');
	$descricao_princ = get_field('descricao', 'option');
	$imagem_princ = get_field('imagem_principal', 'option');
	$url = get_home_url();
	$imgPage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' );

	if(is_tax()){
		$terms = get_queried_object();
		$titulo = $terms->name;
		$descricao = $terms->description;
		$imagem = get_field('imagem_listagem',$terms->taxonomy.'_'.$terms->term_id);
		$url = get_term_link($terms->term_id);
	}

	if(is_archive()){
		$titulo = get_field('titulo_pagina','option');
		$descricao = get_field('descricao_pagina','option');
		$imagem = get_field('imagem_pagina','option');
		$url = $url.'/produtos';
	}

	if(is_single()){
		$titulo = get_the_title();
		$descricao = get_the_excerpt();
		
		if($imgPage[0] != ''){
			$imagem = $imgPage[0];	
		}			
		$url = get_the_permalink();
	}

	if($titulo == ''){
		$titulo = $titulo_princ;
	}else{
		$titulo = $titulo.' - '.$titulo_princ;
	}
	
	if($descricao == ''){
		$descricao = $descricao_princ;
	}

	$autor = 'Di20 Desenvolvimento';
?>

<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="shortcut icon" href="<?php the_field('favicon', 'option'); ?>" type="image/x-icon" />
<link rel="icon" href="<?php the_field('favicon', 'option'); ?>" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-language" content="pt" />
<meta name="rating" content="General" />
<meta name="description" content="<?php echo $descricao; ?>" />
<meta name="keywords" content="" />
<meta name="robots" content="index,follow" />
<meta name="author" content="<?php echo $autor; ?>" />
<meta name="language" content="pt-br" />
<meta name="title" content="<?php echo $titulo; ?>" />

<!-- SOCIAL META -->
<meta itemprop="name" content="<?php echo $titulo; ?>" />
<meta itemprop="description" content="<?php echo $descricao; ?>" />
<meta itemprop="image" content="<?php echo $imagem; ?>" />

<html itemscope itemtype="<?php echo $url; ?>" />
<link rel="image_src" href="<?php echo $imagem; ?>" />
<link rel="canonical" href="<?php echo $url; ?>" />

<meta property="og:type" content="website">
<meta property="og:title" content="<?php echo $titulo; ?>" />
<meta property="og:type" content="article" />
<meta property="og:description" content="<?php echo $descricao; ?>" />
<meta property="og:image" content="<?php echo $imagem; ?>" />
<meta property="og:url" content="<?php echo $url; ?>" />
<meta property="og:site_name" content="<?php echo $titulo_princ; ?>" />
<meta property="fb:admins" content="<?php echo $autor; ?>" />
<meta property="fb:app_id" content="1205127349523474" /> 

<meta name="twitter:card" content="summary" />
<meta name="twitter:url" content="<?php echo $url; ?>" />
<meta name="twitter:title" content="<?php echo $titulo; ?>" />
<meta name="twitter:description" content="<?php echo $descricao; ?>" />
<meta name="twitter:image" content="<?php echo $imagem; ?>" />
<!-- SOCIAL META -->

<title><?php echo $titulo; ?></title>

<!-- CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css" media="screen" />

<!-- JQUERY -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/bootstrap.min.js"></script>


<script type="text/javascript">
	jQuery.noConflict();

	jQuery(document).ready(function(){

		jQuery('.menu-mobile').click(function(){
			if(jQuery(this).hasClass('active')){
				//jQuery('.nav').css('top','-100vh');
				jQuery(this).removeClass('active');
				jQuery('.header').removeClass('active');
			}else{
				//jQuery('.nav').css('top','0px');
				jQuery(this).addClass('active');
				jQuery('.header').addClass('active');
			}
		});

		if(jQuery('body').height() <= jQuery(window).height()){
			jQuery('.footer').css({position: 'absolute', bottom: '0px'});
		}else{
			jQuery('.footer').css({position: 'relative'});
		}

		scroll_body = jQuery(window).scrollTop();
		if(scroll_body > 400){
			jQuery('.header').addClass('scroll_menu');
		}
	});	

	jQuery(window).resize(function(){
		jQuery('.menu-mobile').removeClass('active');
		jQuery('.header').removeClass('active');
		//jQuery('.nav').css('top','-100vh');
		if(jQuery('body').height() <= jQuery(window).height()){
			jQuery('.footer').css({position: 'absolute', bottom: '0px'});
		}else{
			jQuery('.footer').css({position: 'relative'});
		}
	});

	jQuery(window).scroll(function(){
		scroll_body = jQuery(window).scrollTop();
		if(scroll_body > 400){
			jQuery('.header').addClass('scroll_menu');
		}else{
			jQuery('.header').removeClass('scroll_menu');
		}
	});
</script>

<?php /*
<!-- ZOPIM -->
<!--Start of Zendesk Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="https://v2.zopim.com/?4wUPiAqqUPHLIihFTiGQt2Su4HknexxE";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>

<!-- SUMO -->
<script src="//load.sumome.com/" data-sumo-site-id="0820f5828ba5ae1d27edd8bde6d74989a0ddbfa73cad0af4f62420486d84f071" async="async"></script>
*/ ?>

</head>
<body <?php body_class(); ?>>

	<header class="header">

			<i class="fa fa-bars menu-mobile" aria-hidden="true"></i>

			<nav class="nav">
				<ul class="menu-principal">
					<li class="<?php if((is_page('producao')) or (is_post_type_archive('produtos')) or (is_tax('produtos_taxonomy')) or (is_singular('produtos'))){ echo 'active'; } ?>">
						<a href="javascript:" title="PRODUTOS">
							PRODUTOS
						</a>
						<ul>
							<li class="submenu <?php if(is_page('producao')){ echo 'active'; } ?>">
								<a href="<?php echo get_permalink(get_page_by_path('producao')); ?>" title="">
									<img src="<?php the_field('ico_colorido',get_page_by_path('producao')); ?>">
									<?php echo get_the_title(get_page_by_path('producao')); ?>
								</a>
							</li>

							<li class="submenu <?php if((is_post_type_archive('produtos')) or (is_tax('produtos_taxonomy')) or (is_singular('produtos'))){ echo 'active'; } ?>">
								<a href="<?php echo get_home_url(); ?>/produtos" title="">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-nossos-produtos.png" class="">
									NOSSOS PRODUTOS
								</a>
							</li>
						</ul>
					</li>

					<li class="<?php if(is_page('sobre')){ echo 'active'; } ?>">
						<a href="<?php echo get_permalink(get_page_by_path('sobre')); ?>" title="SOBRE">
							<?php echo get_the_title(get_page_by_path('sobre')); ?>
						</a>
					</li>

					<li class="menu-home">
						<h1>
							<a href="<?php echo get_home_url(); ?>" title="<?php the_field('titulo', 'option'); ?>">
								<img src="<?php the_field('logo_header', 'option'); ?>" alt="<?php the_field('titulo', 'option'); ?>">
							</a>
						</h1>
					</li>

					<li class="<?php if((is_page(array( 'dicas/cortes-de-carnes', 'dicas/toque-do-chef', 'dicas/toque-do-chef/tempero-da-carne', 'dicas/toque-do-chef/carne-x-carne', 'dicas/toque-do-chef/distancia-do-briquete', 'dicas/toque-do-chef/carne-de-primeira', 'dicas/harmonizacoes', 'dicas/harmonizacoes/cervejas', 'dicas/harmonizacoes/vinhos', 'dicas/harmonizacoes/caipirinhas', 'dicas/churrascometro' ))) or (is_post_type_archive('musicas')) or (is_singular('musicas'))){ echo 'active'; } ?>">
						<a href="javascript:" title="DICAS">
							DICAS
						</a>
						<ul>
							<li class="submenu <?php if(is_page('dicas/cortes-de-carnes')){ echo 'active'; } ?>">
								<a href="<?php echo get_permalink(get_page_by_path('dicas/cortes-de-carnes')); ?>" title="<?php echo get_the_title(get_page_by_path('dicas/cortes-de-carnes')); ?>">
									<img src="<?php the_field('ico_colorido',get_page_by_path('dicas/cortes-de-carnes')); ?>">
									<?php echo get_the_title(get_page_by_path('dicas/cortes-de-carnes')); ?>
								</a>
							</li>

							<li class="submenu <?php if(is_page(array( 'dicas/toque-do-chef', 'dicas/toque-do-chef/tempero-da-carne', 'dicas/toque-do-chef/carne-x-carne', 'dicas/toque-do-chef/distancia-do-briquete', 'dicas/toque-do-chef/carne-de-primeira' ))){ echo 'active'; } ?>">
								<a href="<?php echo get_permalink(get_page_by_path('dicas/toque-do-chef')); ?>" title="<?php echo get_the_title(get_page_by_path('dicas/toque-do-chef')); ?>">
									<img src="<?php the_field('ico_colorido',get_page_by_path('dicas/toque-do-chef')); ?>">
									<?php echo get_the_title(get_page_by_path('dicas/toque-do-chef')); ?>
								</a>
							</li>

							<li class="submenu <?php if(is_page(array( 'dicas/harmonizacoes', 'dicas/harmonizacoes/cervejas', 'dicas/harmonizacoes/vinhos', 'dicas/harmonizacoes/caipirinhas' ))){ echo 'active'; } ?>">
								<a href="<?php echo get_permalink(get_page_by_path('dicas/harmonizacoes')); ?>" title="<?php echo get_the_title(get_page_by_path('dicas/harmonizacoes')); ?>">
									<img src="<?php the_field('ico_colorido',get_page_by_path('dicas/harmonizacoes')); ?>">
									<?php echo get_the_title(get_page_by_path('dicas/harmonizacoes')); ?>
								</a>
							</li>

							<li class="submenu <?php if((is_post_type_archive('musicas')) or is_singular('musicas')){ echo 'active'; } ?>">
								<a href="<?php echo get_home_url(); ?>/musicas" title="">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-musicas.png" class="">
									MÚSICAS
								</a>
							</li>

							<li class="submenu <?php if(is_page('churrascometro')){ echo 'active'; } ?>">
								<a href="<?php echo get_home_url(); ?>/dicas/churrascometro" title="">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-musicas.png" class="">
									CHURRASCOMETRO
								</a>
							</li>
						</ul>
					</li>

					<li class="<?php if(is_page('contato')){ echo 'active'; } ?>">
						<a href="<?php echo get_permalink(get_page_by_path('contato')); ?>" title="CONTATO">
							CONTATO
						</a>
					</li>
				</ul>
			</nav>


	</header>