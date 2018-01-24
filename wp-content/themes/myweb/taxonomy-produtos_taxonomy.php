<?php get_header(); ?>

	<section class="box-content no-padding">
		<h2>
			<div class="container">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-nossos-produtos_PB.png">
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

			<div class="row reduzido">

				<ul class="list-item">

					<?php while ( have_posts() ) : the_post();
						$qtd_prod = $qtd_prod+1;

						if($qtd_prod == 1){
							$col = 'col-12';
						}else{
							$col = 'col-6';
						} ?>
									
						<li class="col-6 <?php echo $col; ?>">
							<a href="<?php the_permalink(); ?>" style="background-image: url('<?php the_field('imagem_listagem'); ?>');">
								<div class="cont-list-item-box">
									<div class="cont-list-item">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-nossos-produtos.png">
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