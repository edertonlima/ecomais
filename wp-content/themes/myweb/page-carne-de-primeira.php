<?php get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<section class="box-content no-padding">
			<h2>
				<div class="container">
					<img src="<?php the_field('ico_preto',$post->post_parent); ?>">
					<span><?php echo get_the_title($post->post_parent); ?></span>
				</div>
			</h2>

			<div class="tit-page-child">
				<div class="container">
					<span><?php the_title(); ?></span>
				</div>
			</div>
		</section>

		<?php 
			$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); 
			if($imagem[0]){ ?>
				<section class="box-content img-destaque page-child" style="background-image: url('<?php echo $imagem[0]; ?>');"></section>
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

		<?php if(get_field('imagem_descricao')){ ?>
			<section class="box-content">
				<div class="container">
					
					<div class="content-post">
						<img src="<?php the_field('imagem_descricao'); ?>" class="img-content">
					</div>

				</div>
			</section>
		<?php } ?>

		<section class="box-content">
			<div class="container">

				<?php if( have_rows('itens_detalhes_carne_primeira') ): ?>
					<?php while ( have_rows('itens_detalhes_carne_primeira') ) : the_row(); ?>
									
						<h3><?php the_sub_field('titulo'); ?></h3>
						<div class="content-post cont-box ico-cont tempero-da-carne">
							<?php if(get_sub_field('icone')){ ?>
								<img src="<?php the_sub_field('icone'); ?>" class="img-ico-cont">
							<?php } ?>
							<p class="justify">
								<?php the_sub_field('texto'); ?>
							</p>
							<img src="<?php the_sub_field('imagem_carne_primeira'); ?>" class="img-destaque-item">
							
							<?php if( have_rows('cortes') ): ?>
								<ul class="itens_corte_carneprimeira row">
									<?php while (has_sub_field('cortes')) { 
										$cor = ' style="color: '.get_sub_field('cor').';"'; ?>
										<li class="col-6">
											<h4<?php echo $cor; ?>><?php the_sub_field('titulo'); ?></h3>
											<p class="justify"><?php the_sub_field('texto'); ?></p>
											<div class="tempo">
												<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-relogio.png">
												<span><?php the_sub_field('tempo'); ?></span>
											</div>

											<div class="ponto">
												<img src="<?php the_sub_field('ponto_da_carne'); ?>">
												<span class="ponto1">Mal passada</span>
												<span class="ponto2">Ao ponto</span>
												<span class="ponto3">Bem passada</span>
											</div>
										</li>
									<?php } ?>
								</ul>
							<?php endif; ?>	
						</div>

					<?php endwhile; ?>
				<?php endif; ?>	

			</div>
		</section>

		<script type="text/javascript">
			jQuery(window).load(function(){

			});
		</script>

	<?php endwhile;	?>

<?php get_footer(); ?>