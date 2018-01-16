<?php get_header(); ?>

<?php $category = get_queried_object(); //print_r($category); ?>

<!-- slide -->
<section class="box-content box-slide">
	<div class="slide">
		<div class="carousel slide" data-ride="carousel" data-interval="6000" id="slide">

			<div class="carousel-inner" role="listbox">

				<?php if( have_rows('slide') ):
					$slide = 0;
					while ( have_rows('slide') ) : the_row();

						if(get_sub_field('imagem')){
							$slide = $slide+1; ?>

							<div class="item <?php if($slide == 1){ echo 'active'; } ?>" style="background-image: url('<?php the_sub_field('imagem'); ?>');">

								<div class="box-height">
									<div class="box-texto">
										
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_blog_blog.png" alt="Blog" />
										<h2 class="title_page">Blog</h2>

										<p class="texto"><?php the_sub_field('texto'); ?></p>
										<?php if(get_sub_field('sub_texto')){ ?>
											<p class="sub-texto"><?php the_sub_field('sub_texto'); ?></p>
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
				    'taxonomy'      => 'category',
				    'parent'        => 0,
				    'orderby'       => 'name',
				    'order'         => 'ASC',
				    'hierarchical'  => 1,
				    'pad_counts'    => 0
				);
				$categories = get_categories( $args );
				foreach ( $categories as $categoria ){ 
					if($categoria->term_id != $category->term_id ){ ?>

						<li>
							<a href="<?php echo get_term_link($categoria->term_id); ?>" title="<?php echo $categoria->name; ?>">
								<img src="<?php the_field('ico_listagem',$categoria->taxonomy.'_'.$categoria->term_id); ?>" class="" alt="<?php echo $categoria->name; ?>"/>
								<span><?php echo $categoria->name; ?></span>
							</a>
						</li>
					
				<?php }
				}
			?>
		</ul>

	</div>
</section>

<section class="box-content sombra">
	<div class="container">
		<p class="sub-tituto text-content-medium borda-efeito">
			<?php the_field('descricao_listagem_blog'); ?>
		</p>
	</div>

	<div class="container">
		<div class="row">

			<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array( 'post_type' => 'post', 'posts_per_page' => 20, 'paged' => $paged );
			$wp_query = new WP_Query($args);

			while ( have_posts() ) : the_post();

				get_template_part( 'content-list-blog', get_post_format() );

			endwhile; ?>

		</div>
	</div>

</section>

<?php get_footer(); ?>   

?>