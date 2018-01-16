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

<section class="box-content box-sobre sombra">
	<div class="container">
		
		<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_cofound-page.png" class="ico_cafe" alt=""/>
		<p class="sub-tituto text-content-medium borda-efeito"><?php the_field('texto_principal'); ?></p>

	</div>
</section>

<section class="box-content box-msg no-padding" <?php if(get_field('imagem_destaque')){ ?>style="background-image: url('<?php the_field('imagem_destaque'); ?>');" <?php } ?>>
	<div class="box-height co-found-txt">
		<div class="box-texto">
		
			<?php if(get_field('texto_destaque')){ ?>
				<p class="texto"><?php the_field('texto_destaque'); ?></p>
			<?php } ?>

		</div>
	</div>
</section>

<section class="box-content box-sobre box-startups sombra">
	<div class="container">
		
		<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_startups.png" class="ico_cafe" alt=""/>
		<h5>ÚLTIMAS STARTUPS</h5>

	</div>

	<?php if( have_rows('startups') ):
		while ( have_rows('startups') ) : the_row(); ?>

			<div class="startups" style="background-image: url('<?php the_sub_field('imagem'); ?>');">
				<div class="bg-color">
					<img src="<?php the_sub_field('icone'); ?>" class="" alt=""/>
					<p class="texto"><?php the_sub_field('texto'); ?></p>
				</div>
			</div>

		<?php endwhile;
	endif; ?>
</section>

<section class="box-content box-sobre sombra">
	<div class="container">
		
		<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_page_2.png" class="ico_cafe" alt=""/>
		<p class="sub-tituto text-content-medium borda-efeito"><?php the_field('texto_secundario_1'); ?></p>

		<br><br>

		<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico_cafe.png" class="ico_cafe" alt=""/>
		<p class="sub-tituto text-content-medium borda-efeito"><?php the_field('texto_secundario_2'); ?></p>

	</div>
</section>

<section class="box-content box-contato no-padding">
	<h3 class="sub-tituto-page">
		<div class="container"><span>CONVERSE CONOSCO</span></div>
	</h3>

	<div class="container">
		<div class="row">			
			<div class="col-12">

				<form action="javascript:" class="form-contato" method="post">
					<fieldset>
						<input type="text" name="nome" placeholder="NOME DO RESPONSÁVEL*">
						<input type="text" name="email" placeholder="NOME DA STARTUP*">
						<input type="text" name="telefone" placeholder="SEGMENTO*">
						<input type="text" name="telefone" placeholder="SITE">
						<input type="text" name="telefone" placeholder="TELEFONE*">
						<input type="text" name="telefone" placeholder="ANEXO*">
						<span class="obs">*Campos obrigatórios<br>** Atendemos apenas Florianópolis e Grande florianópolis</span>
						<textarea name="mensagem">Por que deseja que sejamos parte
da sua startup?*</textarea>
					</fieldset>
					<button type="button" class="enviar borda">ENVIAR</button>
				</form>

			</div>
		</div>
	</div>
</section>