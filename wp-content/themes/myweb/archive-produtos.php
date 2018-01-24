<?php get_header(); ?>

		<section class="box-content no-padding">
			<h2>
				<div class="container">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-nossos-produtos_PB.png">
					<span>NOSSOS PRODUTOS</span>
				</div>
			</h2>
		</section>

		<section class="box-content">
			<div class="container">

			<div class="row reduzido">

					<ul class="list-item list-tipo2">

						<?php
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
												<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-nossos-produtos.png">
												<span><?php echo $categoria->name; ?></span>
												<p><?php echo $categoria->description; ?></p>
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

<?php get_footer(); ?>