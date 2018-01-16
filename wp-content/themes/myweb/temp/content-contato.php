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
										
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_page_sobre.png" class="" alt="Realizamos"/>
										<h2 class="title_page"><?php the_title(); ?></h2>

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

	</div>
</section>

<section class="box-content box-contato no-padding">
	<h3 class="sub-tituto-page">
		<div class="container"><span>MANDE SUA MENSAGEM</span></div>
	</h3>

	<div class="container">
		<div class="row">			
			<div class="col-12">

				<form action="javascript:" class="form-contato" method="post">
					<fieldset>
						<input type="text" name="nome" placeholder="NOME">
						<input type="text" name="email" placeholder="E-MAIL">
						<input type="text" name="telefone" placeholder="TELEFONE">
						<textarea name="mensagem" placeholder="MENSAGEM"></textarea>
					</fieldset>
					<button type="button" class="enviar borda">ENVIAR</button>
				</form>

			</div>
		</div>

		<div class="row row-contato">
			<div class="col-4">
				<div class="item-contato">
					<span class="ico-nome">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_cliente.png" class="ico_cliente" alt=""/>
						<span class="nome-item">CLIENTE</span>
					</span>
					<h5><?php the_field('nome_clientes'); ?></h5>
					<span class="sub-titulo"><?php the_field('sub_título_clientes'); ?></span>
					<p>
						<strong><?php the_field('email_clientes'); ?></strong>
						<?php if( have_rows('telefones_clientes') ):
							while ( have_rows('telefones_clientes') ) : the_row(); ?>

								<span><?php the_sub_field('telefone'); ?></span>

							<?php endwhile;
						endif; ?>
					</p>
				</div>
			</div>

			<div class="col-4">
				<div class="item-contato">
					<span class="ico-nome">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_fornecedor.png" class="ico_fornecedor" alt=""/>
						<span class="nome-item">FORNECEDOR</span>
					</span>
					<h5><?php the_field('nome_clientes'); ?></h5>
					<span class="sub-titulo"><?php the_field('sub_título_fornecedor'); ?></span>
					<p>
						<strong><?php the_field('email_fornecedor'); ?></strong>
						<?php if( have_rows('telefones_fornecedor') ):
							while ( have_rows('telefones_fornecedor') ) : the_row(); ?>

								<span><?php the_sub_field('telefone'); ?></span>

							<?php endwhile;
						endif; ?>
					</p>
				</div>
			</div>

			<div class="col-4">
				<div class="item-contato">
					<span class="ico-nome">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_trabalhe.png" class="" alt=""/>
						<span class="nome-item trabalhe">TRABALHE<br>CONOSCO</span>
					</span>
					<h5><?php the_field('nome_clientes'); ?></h5>
					<span class="sub-titulo"><?php the_field('sub_título_trabalhe'); ?></span>
					<p>
						<strong><?php the_field('email_trabalhe'); ?></strong>
						<?php if( have_rows('telefones_trabalhe') ):
							while ( have_rows('telefones_trabalhe') ) : the_row(); ?>

								<span><?php the_sub_field('telefone'); ?></span>

							<?php endwhile;
						endif; ?>
					</p>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="box-content box-contato contato-maps no-padding" style="background-image: url('<?php the_field('imagem_mapa','option'); ?>')">
	<div class="bg-maps">
		
		<div class="box-endereco">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_cafe.png" class="ico_cafe" alt=""/>
			<h5>VENHA NOS ENCONTRAR</h5>
			<p><?php the_field('endereco','option'); ?></p>
			<a href="<?php the_field('google_maps','option'); ?>" title="GOOGLE MAPS" target="_blank">GOOGLE MAPS</a>
		</div>

	</div>
</section>

<script type="text/javascript">
	jQuery(document).ready(function(){	    

	});

	jQuery(window).resize(function(){

	});
</script>