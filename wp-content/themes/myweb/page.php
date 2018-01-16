<?php get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<section class="box-content no-padding">
			<h2>
				<div class="container">
					<img src="<?php the_field('ico_preto'); ?>">
					<span><?php the_title(); ?></span>
				</div>
			</h2>
		</section>

		<?php 
			$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); 
			if($imagem[0]){ ?>
				<section class="box-content img-destaque" style="background-image: url('<?php echo $imagem[0]; ?>');"></section>
			<?php }
		?>

		<?php 
			if(get_the_content()){ ?>
				<section class="box-content cinza">
					<div class="container">
						
						<div class="content-post">
							<?php the_content(); ?>
						</div>

					</div>
				</section>
			<?php }
		?>

		<?php
			if(is_page('sobre')){
				if(get_field('texto_desenvolvimento')){ ?>
					<section class="box-content">
						<div class="container">
							
							<h3>DESENVOLVIMENTO</h3>
							<div class="content-post cont-box ico-cont">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/lo_ecomais_icones-15.png">
								<p class="justify"><?php the_field('texto_desenvolvimento'); ?></p>
							</div>

						</div>
					</section>
				<?php } 

				if(have_rows('comprometimento')): ?>
					<section class="box-content">
						<div class="container">
							
							<h3>Comprometimento</h3>
							<div class="content-post cont-box">
								<ul class="comprometimento">
									<?php while ( have_rows('comprometimento') ) : the_row(); ?>

										<li>
											<img src="<?php the_sub_field('imagem'); ?>" class="" alt="<?php the_sub_field('titulo'); ?>"/>
											<span><?php the_sub_field('titulo'); ?></span>
										</li>

									<?php endwhile; ?>
								</ul>
							</div>

						</div>
					</section>
				<?php endif; 
			} 
		?>

		<?php if(get_field('imagem_descricao')){ ?>
			<section class="box-content">
				<div class="container">
					
					<div class="content-post">
						<img src="<?php the_field('imagem_descricao'); ?>" class="img-content">
					</div>

				</div>
			</section>
		<?php } ?>

		<?php
			if(is_page('toque-do-chef')){ ?>
			<section class="box-content">
				<div class="container">

				<div class="row reduzido">

						<ul class="list-item">
							<li class="col-6 row-2">
								<a href="<?php echo get_permalink(get_page_by_path('dicas/toque-do-chef/tempero-da-carne')); ?>" style="background-image: url('<?php the_field('imagem_listagem',get_page_by_path('dicas/toque-do-chef/tempero-da-carne')); ?>');">
									<div class="cont-list-item-box">
										<div class="cont-list-item">
											<img src="<?php the_field('ico_colorido',get_page_by_path('dicas/toque-do-chef/tempero-da-carne')); ?>">
											<span><?php echo get_the_title(get_page_by_path('dicas/toque-do-chef/tempero-da-carne')); ?></span>
											<p><?php echo get_the_excerpt(get_page_by_path('dicas/toque-do-chef/tempero-da-carne')); ?></p>
										</div>
									</div>
								</a>
							</li>

							<li class="col-6">
								<a href="<?php echo get_permalink(get_page_by_path('dicas/toque-do-chef/carne-de-primeira')); ?>" style="background-image: url('<?php the_field('imagem_listagem',get_page_by_path('dicas/toque-do-chef/carne-de-primeira')); ?>');">
									<div class="cont-list-item-box">
										<div class="cont-list-item">
											<img src="<?php the_field('ico_colorido',get_page_by_path('dicas/toque-do-chef/carne-de-primeira')); ?>">
											<span><?php echo get_the_title(get_page_by_path('dicas/toque-do-chef/carne-de-primeira')); ?></span>
											<p><?php echo get_the_excerpt(get_page_by_path('dicas/toque-do-chef/carne-de-primeira')); ?></p>
										</div>
									</div>
								</a>
							</li>

							<li class="col-6">
								<a href="<?php echo get_permalink(get_page_by_path('dicas/toque-do-chef/distancia-do-briquete')); ?>" style="background-image: url('<?php the_field('imagem_listagem',get_page_by_path('dicas/toque-do-chef/distancia-do-briquete')); ?>');">
									<div class="cont-list-item-box">
										<div class="cont-list-item">
											<img src="<?php the_field('ico_colorido',get_page_by_path('dicas/toque-do-chef/distancia-do-briquete')); ?>">
											<span><?php echo get_the_title(get_page_by_path('dicas/toque-do-chef/distancia-do-briquete')); ?></span>
											<p><?php echo get_the_excerpt(get_page_by_path('dicas/toque-do-chef/distancia-do-briquete')); ?></p>
										</div>
									</div>
								</a>
							</li>

							<li class="col-12">
								<a href="<?php echo get_permalink(get_page_by_path('dicas/toque-do-chef/carne-x-carne')); ?>" style="background-image: url('<?php the_field('imagem_listagem',get_page_by_path('dicas/toque-do-chef/carne-x-carne')); ?>');">
									<div class="cont-list-item-box">
										<div class="cont-list-item">
											<img src="<?php the_field('ico_colorido',get_page_by_path('dicas/toque-do-chef/carne-x-carne')); ?>">
											<span><?php echo get_the_title(get_page_by_path('dicas/toque-do-chef/carne-x-carne')); ?></span>
											<p><?php echo get_the_excerpt(get_page_by_path('dicas/toque-do-chef/carne-x-carne')); ?></p>
										</div>
									</div>
								</a>
							</li>
						</ul>

					</div>

				</div>
			</section>
			<?php } 
		?>

		<script type="text/javascript">
			jQuery(window).load(function(){

			});
		</script>

	<?php endwhile;	?>

<?php get_footer(); ?>
