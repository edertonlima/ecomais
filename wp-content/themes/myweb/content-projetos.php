<!-- slide -->
<section class="box-content box-slide">
	<div class="slide">
		<div class="carousel slide" data-ride="carousel" data-interval="6000" id="slide">

			<div class="carousel-inner" role="listbox">

				<?php $imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); 
				if($imagem[0]){ ?>

					<div class="item active" style="background-image: url('<?php echo $imagem[0]; ?>');">

						<div class="box-height">
							<div class="box-texto">
								
								<h2 class="title_page"><?php the_title(); ?></h2>
								<?php $terms = wp_get_post_terms( $post->ID, 'categoria_projeto' ); //var_dump($terms); ?>
								<p class="texto category-name"><?php echo $terms[0]->name; ?></p>

							</div>
						</div>
						
					</div>

				<?php } ?>

			</div>

		</div>

	</div>
</section>

<section class="box-content box-page-sobre sombra">
	<div class="container">

		<p class="sub-tituto text-content-medium borda-efeito">
			<?php echo get_the_excerpt(); ?>
		</p>

	</div>
</section>

<section class="box-content box-contato no-padding">

	<h3 class="sub-tituto-page center">
		<div class="container"><span>HISTÓRICO DO PROJETO</span></div>
	</h3>

	<div class="container">
		<?php if(get_field('definicao')){ ?>
			<div class="detalhe-tecnico">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_proj_definicao.png" class="" alt="" />
				<div class="conteudo-tecnico">
					<h5>DEFINIÇÃO</h5>
					<span><?php the_field('definicao'); ?></span>
				</div>
			</div>
		<?php } ?>

		<?php if(get_field('divulgacao')){ ?>
			<div class="detalhe-tecnico">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_proj_divulgacao.png" class="" alt="" />
				<div class="conteudo-tecnico">
					<h5>DIVULGAÇÃO</h5>
					<span><?php the_field('divulgacao'); ?></span>
				</div>
			</div>
		<?php } ?>

		<?php if(get_field('requisitos')){ ?>
			<div class="detalhe-tecnico">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_proj_requisitos.png" class="" alt="" />
				<div class="conteudo-tecnico">
					<h5>REQUISITOS</h5>
					<span><?php the_field('requisitos'); ?></span>
				</div>
			</div>
		<?php } ?>

		<?php if(get_field('objetivo')){ ?>
			<div class="detalhe-tecnico">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_proj_objetivo.png" class="" alt="" />
				<div class="conteudo-tecnico">
					<h5>OBJETIVO</h5>
					<span><?php the_field('objetivo'); ?></span>
				</div>
			</div>
		<?php } ?>

		<div class="imagem-tecnica"><img src="<?php the_field('imagem_tecnica'); ?>" alt="" /></div>
	</div>
</section>

<section class="box-content box-galeria-imagens no-padding">
	<?php if( have_rows('galeria') ):
		while ( have_rows('galeria') ) : the_row(); ?>

			<?php if(get_sub_field('imagem')){ ?>
				<img src="<?php the_sub_field('imagem'); ?>" class="img-destaque" />
			<?php } ?>

			<?php if(get_sub_field('texto_galeria')){ ?>
				<div class="container">
					<p class="sub-tituto text-content-medium borda-efeito">
						<?php the_sub_field('texto_galeria'); ?>
					</p>
				</div>
			<?php } ?>

		<?php endwhile;
	endif; ?>
</section>

<section class="box-content box-page-sobre sombra no-padding-bottom">
	<div class="container">

		<p class="sub-tituto text-content">
			<?php echo get_the_content(); ?>
		</p>	

	</div>
</section>

<section class="box-content box-sobre no-padding">
	<div class="container">

		<h5 class="veja-mais">VEJA MAIS NOTÍCIAS <br> RELACIONADAS</h5>

		<div class="grid">
			<?php
				$produto = get_previous_post();
				if($produto){ $terms = wp_get_post_terms( $produto->ID, 'categoria_projeto' ); ?>
					<div class="grid-item grid-left">
						<div class="">
							<a href="<?php the_permalink($produto->ID); ?>" title="<?php echo $produto->post_title; ?>">
								<article class="item">
					
									<img src="<?php the_field('imagem_listagem', $produto->ID); ?>" class="img-grid" alt="<?php echo $produto->post_title; ?>"/>

										<div class="hover-grid">
											<div class="cont-hover">
												<img src="<?php the_field('ico_listagem',$terms[0]->taxonomy.'_'.$terms[0]->term_id); ?>" class="" alt=""/>
												<span><?php echo $produto->post_title; ?></span>
												<?php echo $terms[0]->name; ?>
											</div>
										</div>
								</article>
							</a>
						</div>
					</div>
				<?php }
			?>

			<?php
				$produto = get_next_post();
				if($produto){ $terms = wp_get_post_terms( $produto->ID, 'categoria_projeto' ); ?>
					<div class="grid-item grid-right">
						<div class="">
							<a href="<?php the_permalink($produto->ID); ?>" title="<?php echo $produto->post_title; ?>">
								<article class="item">
					
									<img src="<?php the_field('imagem_listagem', $produto->ID); ?>" class="img-grid" alt="<?php echo $produto->post_title; ?>"/>

										<div class="hover-grid">
											<div class="cont-hover">
												<img src="<?php the_field('ico_listagem',$terms[0]->taxonomy.'_'.$terms[0]->term_id); ?>" class="" alt=""/>
												<span><?php echo $produto->post_title; ?></span>
												<?php echo $terms[0]->name; ?>
											</div>
										</div>
								</article>
							</a>
						</div>
					</div>
				<?php }
			?>
		</div>

	</div>
</section>

<script type="text/javascript">
	jQuery(document).ready(function(){

		jQuery('.grid-item').each(function(){
			jQuery('.hover-grid',this).height(jQuery(this).height());
		});

	});

	jQuery(window).resize(function(){
		jQuery('.grid-item').each(function(){
			jQuery('.hover-grid',this).height(jQuery(this).height());
		});
	});
</script>