<article class="post-list">
	<?php 
		$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); 
		if($imagem[0]){ ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="imagem_principal"><img src="<?php echo $imagem[0]; ?>" alt="<?php the_title(); ?>" class="" /></a>
		<?php }
	?>

	<div class="box-content sombra no-padding">
		<div class="container">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h5><?php the_title(); ?></h5></a>
			<span class="date"><?php the_date(); ?></span>
			<?php the_excerpt(); ?>
		</div>
	</div>
</article>