<?php
	$terms = wp_get_post_terms( $post->ID, 'categoria_projeto' );
?>

<article class="grid-item <?php echo $terms[0]->slug; ?>">
	<div class="">
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<article class="item">

				<img src="<?php the_field('imagem_listagem'); ?>" class="img-grid" alt="<?php the_title(); ?>"/>

				<div class="hover-grid">
					<div class="cont-hover">
						<img src="<?php the_field('ico_listagem',$terms[0]->taxonomy.'_'.$terms[0]->term_id); ?>" class="" alt="<?php echo $terms[0]->name; ?>"/>
						<span><?php the_title(); ?></span>
						<?php echo $terms[0]->name; ?>
					</div>
				</div>
			</article>
		</a>
	</div>
</article>