<?php get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<section class="box-content no-padding">
			<h2>
				<div class="container">
					<img src="<?php the_field('ico_preto'); ?>">
					<span><?php the_title(); ?></span>
				</div>
			</h2>
		</section>

		<?php 
			$imagem = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), '' ); 
			if($imagem[0]){ ?>
				<section class="box-content img-destaque" style="background-image: url('<?php echo $imagem[0]; ?>');"></section>
			<?php }
		?>

		<?php 
			if(get_the_content()){ ?>
				<section class="box-content cinza">
					<div class="container">
						
						<div class="content-post">
							<?php the_content(); ?>
						</div>

					</div>
				</section>
			<?php }
		?>


		<section class="box-content">
			<div class="container">
				
				<h3>EMPRESA</h3>
				<div class="content-post cont-box ico-cont itens_detalhes">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-sobre.png" class="img-ico-cont">
					<div class="endereco row">
						<div class="col-6">
							<i class="fa fa-map-marker" aria-hidden="true"></i>
							<span><?php the_field('endereco','option') ?></span>
						</div>

						<div class="col-6">
							<i class="fa fa-mobile" aria-hidden="true"></i>
							<span>
								<?php the_field('telefone_1', 'option'); ?>

								<?php
									if(get_field('telefone_2', 'option')){ ?>
										<br><?php the_field('telefone_2', 'option'); ?>
									<?php }
								 ?>
							</span>
						</div>
					</div>
				</div>

				<iframe src="<?php the_field('google_maps','option') ?>" frameborder="0" style="border:0" allowfullscreen></iframe>

			</div>
		</section>
	
		<section class="box-content">
			<div class="container">
				
				<h3>ENVIE UMA MENSAGEM</h3>
				<div class="content-post cont-box ico-cont">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/lo_ecomais_icones-34.png" class="img-ico-cont">
					
					<form class="row contato">
						<fieldset class="col-6">
							<input type="text" name="" placeholder="Nome">								
							<input type="text" name="" placeholder="Telefone">								
							<input type="text" name="" placeholder="E-mail">								
							<input type="text" name="" placeholder="Estado">								
							<input type="text" name="" placeholder="Cidade">								
						</fieldset>

						<fieldset class="col-6">
							<input type="text" name="" placeholder="">								
							<textarea placeholder="Mensagem"></textarea>
							<button class="button">Enviar</button>						
						</fieldset>
					</form>
				</div>

			</div>
		</section>


		<script type="text/javascript">
			jQuery(window).load(function(){

			});
		</script>

	<?php endwhile;	?>

<?php get_footer(); ?>
