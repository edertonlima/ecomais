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

				<?php if( have_rows('itens_combinacoes') ): ?>
					<ul class="itens_combinacoes">
						<?php while ( have_rows('itens_combinacoes') ) : the_row(); ?>

							<li>
								<div class="itens">
									<img src="<?php the_sub_field('imagem_1'); ?>" class="" alt="<?php the_sub_field('titulo'); ?>"/>
									<span><?php the_sub_field('nome_2'); ?></span>
								</div>
								<div class="itens mais">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-mais.png" />
								</div>
								<div class="itens">
									<img src="<?php the_sub_field('imagem_2'); ?>" class="" alt="<?php the_sub_field('titulo'); ?>"/>
									<span><?php the_sub_field('nome_2'); ?></span>
								</div>
								<div class="itens box-combinacoes">
									<span><?php the_sub_field('titulo'); ?></span>
									<p><?php the_sub_field('texto'); ?></p>
								</div>
							</li>

						<?php endwhile; ?>
					</ul>
				<?php endif; ?>	

			</div>
		</section>


		<script type="text/javascript">
			jQuery(window).load(function(){

			});
		</script>

	<?php endwhile;	?>

<?php get_footer(); ?>