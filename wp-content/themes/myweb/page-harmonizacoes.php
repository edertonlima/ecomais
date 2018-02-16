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
						<img src="<?php the_field('imagem_descricao'); ?>" class="img-content">
					</div>

				</div>
			</section>
		<?php } ?>

		<section class="box-content">
			<div class="container">

			<div class="row reduzido">

					<ul class="list-item">

						<?php
							$my_wp_query = new WP_Query();
							$all_wp_pages = $my_wp_query->query(array('post_type' => 'page', 'posts_per_page' => '-1'));
							$paginas = get_page_children( $post->ID, $all_wp_pages );
							//var_dump($paginas);

							$cont_page = 0;
							foreach ($paginas as $key => $pagina) {

								$class_page = 'col-6';
								if($cont_page == 4){
									$cont_page = 0;
								}

								$cont_page = $cont_page+1; 

								if($cont_page == 1) {
									$class_page = 'col-6 row-2';
								}

								if($cont_page == 4) {
									$class_page = 'col-12';
								} 

								?>

								<li class="<?php echo $class_page; ?>" rel="<?php echo $cont_page; ?>">
									<a href="<?php echo get_permalink($pagina->ID); ?>" style="background-image: url('<?php the_field('imagem_listagem',$pagina->ID); ?>');">
										<div class="cont-list-item-box">
											<div class="cont-list-item">
												<img src="<?php the_field('ico_colorido',$pagina->ID); ?>">
												<span><?php echo $pagina->post_title; ?></span>
												<p><?php echo get_the_excerpt($pagina->ID); ?></p>
											</div>
										</div>
									</a>
								</li>

							<?php }
						?>

					</ul>

				</div>

			</div>
		</section>


		<script type="text/javascript">
			jQuery(window).load(function(){

			});
		</script>

	<?php endwhile;	?>

<?php get_footer(); ?>
