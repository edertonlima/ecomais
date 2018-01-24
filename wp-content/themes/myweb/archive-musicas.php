<?php get_header(); ?>

		<section class="box-content no-padding">
			<h2>
				<div class="container">
					<img src="<?php the_field('ico_preto_musicas','option'); ?>">
					<span>MÚSICAS</span>
				</div>
			</h2>
		</section>

		<?php 
			if(get_field('descricao_musicas','option')){ ?>
				<section class="box-content cinza">
					<div class="container">
						
						<div class="content-post">
							<div class="ico-page">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo_preto.png" class="">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-spotify.png" class="">
							</div>
							<?php the_field('descricao_musicas','option'); ?>
						</div>

					</div>
				</section>
			<?php }
		?>

		<section class="box-content">
			<div class="container">

			<div class="row reduzido">

					<ul class="list-item list-tipo2">

						<?php
							$atd_musicas = 0;
							while ( have_posts() ) : the_post();
								$atd_musicas = $atd_musicas+1;

								if($atd_musicas == 1){
									$col = 'col-12';
								}else{
									$col = 'col-6';
								} ?>
								
								<li class="<?php echo $col; ?>">
									<a href="<?php the_permalink(); ?>" style="background-image: url('<?php the_field('imagem_listagem'); ?>');">
										<div class="cont-list-item-box">
											<div class="cont-list-item">
												<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-musicas-itens.png">
												<span><?php the_title(); ?></span>
												<p><?php the_excerpt(); ?></p>
											</div>
										</div>
									</a>
								</li>

							<?php endwhile;
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











<?php /*
<?php get_header(); ?>

<?php $category = get_queried_object(); //print_r($category); ?>

<!-- slide -->
<section class="box-content box-slide">
	<div class="slide">
		<div class="carousel slide" data-ride="carousel" data-interval="6000" id="slide">

			<div class="carousel-inner" role="listbox">

				<?php if( have_rows('slide','option') ):
					$slide = 0;
					while ( have_rows('slide','option') ) : the_row();

						if(get_sub_field('imagem','option')){
							$slide = $slide+1; ?>

							<div class="item <?php if($slide == 1){ echo 'active'; } ?>" style="background-image: url('<?php the_sub_field('imagem','option');?>')">

								<div class="box-height">
									<div class="box-texto">
										
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_projetos.png" alt="<?php echo $category->name; ?>" />
										<h2 class="title_page"><?php echo $category->name; ?></h2>

										<p class="texto"><?php the_sub_field('texto',$category->taxonomy.'_'.$category->term_id); ?></p>
										<?php if(get_sub_field('sub_texto',$category->taxonomy.'_'.$category->term_id)){ ?>
											<p class="sub-texto"><?php the_sub_field('sub_texto',$category->taxonomy.'_'.$category->term_id); ?></p>
										<?php } ?>

									</div>
								</div>
								
							</div>

						<?php }

					endwhile;
				endif; ?>

			</div>

			<ol class="carousel-indicators">
				
				<?php for($i=0; $i<$slide; $i++){ ?>
					<li data-target="#slide" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0){ echo 'active'; } ?>"></li>
				<?php } ?>
				
			</ol>

		</div>

		<ul class="ico-page">
			<?php
				$args = array(
				    'taxonomy'      => 'categoria_projeto',
				    'parent'        => 0,
				    'orderby'       => 'name',
				    'order'         => 'ASC',
				    'hierarchical'  => 1,
				    'pad_counts'    => 0
				);
				$categories = get_categories( $args );
				foreach ( $categories as $categoria ){ //print_r($categoria); ?>

						<li>
							<a href="javascript:" title="<?php echo $categoria->name; ?>" class="cat_projeto" rel="<?php echo $categoria->slug; ?>">
								<img src="<?php the_field('ico_listagem',$categoria->taxonomy.'_'.$categoria->term_id); ?>" class="" alt="<?php echo $categoria->name; ?>"/>
								<span><?php echo $categoria->name; ?></span>
							</a>
						</li>


					
				<?php
				}
			?>
		</ul>

	</div>
</section>

<section class="box-content sombra">
	<div class="container">
		<div class="grid">
			<div class="grid-sizer"></div>

			<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'content-list-projetos', get_post_format() );
				endwhile;
			?>

		</div>
		<?php paginacao(); ?>
	</div>
</section>

<?php get_footer(); ?>

<script type="text/javascript">
	jQuery(document).ready(function(){

		jQuery('.grid-item').each(function(){
			jQuery('.hover-grid',this).height(jQuery(this).height());
		});

		jQuery('.cat_projeto').click(function(){
			var item = '.'+jQuery(this).attr('rel');
			jQuery('.cat_projeto').addClass('off');
			jQuery(this).removeClass('off');

			jQuery('.grid-item').addClass('off');
			jQuery(item).removeClass('off');

			var $grid = jQuery('.grid').masonry({
				itemSelector: '.grid-item',
				percentPosition: true,
				columnWidth: '.grid-sizer'
			});
			// layout Masonry after each image loads
			$grid.imagesLoaded().progress( function() {
				$grid.masonry();
			});
		});

	});

	jQuery(window).resize(function(){
		jQuery('.grid-item').each(function(){
			jQuery('.hover-grid',this).height(jQuery(this).height());
		});
	});
</script>

<script src="<?php echo get_template_directory_uri(); ?>/assets/js/masonry.pkgd.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/imagesloaded.pkgd.js" type="text/javascript"></script>
<script type="text/javascript">
	var $grid = jQuery('.grid').masonry({
		itemSelector: '.grid-item',
		percentPosition: true,
		columnWidth: '.grid-sizer'
	});
	// layout Masonry after each image loads
	$grid.imagesLoaded().progress( function() {
		$grid.masonry();
	});  
</script>
*/ ?>