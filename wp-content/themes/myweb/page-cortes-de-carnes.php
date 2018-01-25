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

		<?php if(get_field('imagem_descricao')){ ?>
			<section class="box-content">
				<div class="container">
					
					<div class="content-post">
						<img src="<?php the_field('imagem_descricao'); ?>" class="img-content img-vaca">
					</div>

				</div>
			</section>
		<?php } ?>

		<section class="box-content">
			<div class="container">

				<?php if( have_rows('cortes_carne') ): ?>
					<ul class="corte-carne row">
						<?php while ( have_rows('cortes_carne') ) : the_row(); ?>
							
							<li class="col-4">
								<span class="num"><?php the_sub_field('numero'); ?>.</span>
								<span class="txt"><?php the_sub_field('nome'); ?></span>
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
