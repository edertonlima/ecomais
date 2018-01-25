<?php get_header(); ?>

	<section class="box-content no-padding">
		<h2>
			<div class="container">
				<img src="<?php the_field('ico_preto_produtos','option'); ?>" class="">
				<span>NOSSOS PRODUTOS</span>
			</div>
		</h2>

		<div class="tit-page-child">
			<div class="container">
				<span><?php single_term_title(); ?></span>
			</div>
		</div>
	</section>

	<?php $field_cat = 'produtos_taxonomy_'.get_queried_object()->term_id; ?>
	<section class="box-content img-destaque page-child" style="background-image: url('<?php the_field('imagem_listagem', $field_cat); ?>');"></section>

	<?php 
		if(get_the_content()){ ?>
			<section class="box-content cinza">
				<div class="container">
					
					<div class="content-post">
						<?php echo term_description(); ?>
					</div>

				</div>
			</section>
		<?php }
	?>

	<section class="box-content">
		<div class="container">

			<div class="reduzido">

				<ul class="list-item list-produto">

					<?php while ( have_posts() ) : the_post(); 
						$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); ?>
									
						<li class="">
							<a href="<?php the_permalink(); ?>" style="background-image: url('<?php echo $imagem[0]; ?>">
								<div class="cont-list-item-box">
									<div class="cont-list-item">
										<img src="<?php the_field('ico_colorido_produtos','option'); ?>">
										<span><?php the_title(); ?></span>
										<p><?php the_excerpt(); ?></p>
									</div>
								</div>
							</a>
						</li>

					<?php endwhile;	?>

				</ul>

			</div>

		</div>
	</section>

<script type="text/javascript">
	jQuery(window).load(function(){

	});
</script>

<?php get_footer(); ?>