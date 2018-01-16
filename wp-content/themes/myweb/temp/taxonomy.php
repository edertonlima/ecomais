<?php get_header(); ?>

<section class="">
	<div class="container">
		<h2><?php single_term_title(); ?></h2>
		<h4><?php echo term_description(); ?></h4>
	</div>	

	<div class="container">
		<ul class="">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>

			<?php endwhile; ?>

		</ul>
	</div>

	<?php paginacao(); ?>
	
</section>	

<?php get_footer(); ?>