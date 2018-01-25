<?php get_header(); ?>
	<?php while ( have_posts() ) : the_post(); ?>

		<section class="box-content no-padding">
			<h2>
				<div class="container">
					<img src="<?php the_field('ico_preto_produtos','option'); ?>" class="">
					<span>NOSSOS PRODUTOS</span>
				</div>
			</h2>

			<div class="tit-page-child">
				<div class="container">
					<?php $terms = wp_get_post_terms( $post->ID, $post->post_type.'_taxonomy' ); ?>
					<a href="<?php echo get_category_link($terms[0]->term_id); ?>" title="<?php echo $terms[0]->name; ?>">
						<?php echo $terms[0]->name; ?>
					</a>
					<span class="single-produtos"><?php the_title(); ?></span>
				</div>
			</div>
		</section>

		<?php 
			if(get_the_content()){ ?>
				<section class="box-content cinza">
					<div class="container">
						
						<div class="content-post justify-left ">
							<?php the_content(); ?>
						</div>

					</div>
				</section>
			<?php }
		?>


		<!-- slide -->
		<section class="box-content box-slide slide-produto">
			<div class="">
				<div class="container">
					<div class="carousel slide" data-ride="carousel" data-interval="6000" id="slide">

						<div class="carousel-inner" role="listbox">

							<?php $images = get_field('galeria');
							$size = 'full'; // (thumbnail, medium, large, full or custom size)
							$slide = 0;

							if( $images ): ?>
							    
							        <?php foreach( $images as $image ): 
							        	$slide = $slide+1; ?>
							            <div class="item <?php if($slide == 1){ echo 'active'; } ?>">
							            	<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
							            </div>
							        <?php endforeach; ?>
							    
							<?php endif; ?>

						</div>

						<a class="left carousel-control" href="#slide" data-slide="prev">
							<i class="fa fa-angle-left" aria-hidden="true"></i>
						</a>
						<a class="right carousel-control" href="#slide" data-slide="next">
							<i class="fa fa-angle-right" aria-hidden="true"></i>
						</a>

					</div>
				</div>
			</div>
		</section>


		<section class="box-content no-padding">
			<div class="tit-page-child">
				<div class="container">
					<span>INFORMAÇÕES</span>
				</div>
			</div>
		</section>

		<section class="box-content cinza">
			<div class="container">
				<div class="informacoes justify-left ">
					<?php the_content(); ?>
				</div>

				<?php if( have_rows('detalhes_info') ): ?>
					<?php while ( have_rows('detalhes_info') ) : the_row(); ?>
						
						<div class="ico-info">		
							<img src="<?php the_sub_field('icone'); ?>" class="img-detalhe">
							<span class="tit-ico"><span><?php the_sub_field('titulo'); ?></span></span>
						</div>

					<?php endwhile; ?>
				<?php endif; ?>	
			</div>
		</section>

	<?php endwhile;
	wp_reset_query(); ?>


<?php get_footer(); ?>