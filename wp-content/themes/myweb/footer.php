
	<footer class="footer">
		<div class="container">
			<div class="row">

				<?php if( have_rows('redes_sociais','option') ): ?>
					<div class="redes">						
						<?php while ( have_rows('redes_sociais','option') ) : the_row(); ?>

							<a href="<?php the_sub_field('url','option'); ?>" title="<?php the_sub_field('nome','option'); ?>" target="_blank">
								<img src="<?php the_sub_field('icone','option'); ?>" alt="<?php the_field('nome', 'option'); ?>">
							</a>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>

				<div class="tel_footer">
					<span><?php the_field('telefone_1', 'option'); ?></span>
					<?php
						if(get_field('telefone_2', 'option')){ ?>
							<span><?php the_field('telefone_2', 'option'); ?></span>
						<?php }
					 ?>
				</div>
				<img src="<?php the_field('logo_header', 'option'); ?>" alt="<?php the_field('titulo', 'option'); ?>" class="logo_footer">
				
			</div>
		</div>
	</footer>

</body>
</html>

