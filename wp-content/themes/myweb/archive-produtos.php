<?php get_header(); ?>

		<section class="box-content no-padding">
			<h2>
				<div class="container">
					<img src="<?php the_field('ico_preto_produtos','option'); ?>" class="">
					<span>NOSSOS PRODUTOS</span>
				</div>
			</h2>
		</section>

		<?php 
			if(get_field('descricao_produtos','option')){ ?>
				<section class="box-content cinza">
					<div class="container">
						
						<div class="content-post">
							<?php the_field('descricao_produtos','option'); ?>
						</div>

					</div>
				</section>
			<?php }
		?>

		<section class="box-content">
			<div class="container">

			<div class="row reduzido">

				<ul class="list-item list-produto">

					<?php /* $args = array(
					    'taxonomy'      => 'produtos_taxonomy',
					    'parent'        => 0,
					    'orderby'       => 'name',
					    'order'         => 'ASC',
					    'hierarchical'  => 1,
					    'pad_counts'    => 0
					); */ ?>

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

				<?php /*
					<ul class="list-item list-tipo2">

						<?php /*
							$qtd_prod = 0;
							$args = array(
							    'taxonomy'      => 'produtos_taxonomy',
							    'parent'        => 0,
							    'orderby'       => 'name',
							    'order'         => 'ASC',
							    'hierarchical'  => 1,
							    'pad_counts'    => 0
							);
							$categories = get_categories( $args );
							foreach ( $categories as $categoria ){
								$qtd_prod = $qtd_prod+1;
								$field_cat = 'produtos_taxonomy_'.$categoria->term_taxonomy_id;

								if($qtd_prod == 1){
									$col = 'col-12';
								}else{
									$col = 'col-6';
								} ?>
								
								<li class="<?php echo $col; ?>">
									<a href="<?php echo get_term_link($categoria->term_id); ?>" style="background-image: url('<?php the_field('imagem_listagem', $field_cat); ?>');">
										<div class="cont-list-item-box">
											<div class="cont-list-item">
												<img src="<?php the_field('ico_colorido_produtos','option'); ?>" class="">
												<span><?php echo $categoria->name; ?></span>
												<p><?php echo $categoria->description; ?></p>
											</div>
										</div>
									</a>
								</li>

							<?php } 
						?>

					</ul> */ ?>

				</div>

			</div>
		</section>

		<script type="text/javascript">
			jQuery(window).load(function(){

			});
		</script>

<?php get_footer(); ?>