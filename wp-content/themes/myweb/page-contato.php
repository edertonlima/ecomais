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
					
					<form action="javascript:" class="row contato">
						<div class="col-6">
							<fieldset><input type="text" id="nome" name="nome" placeholder="Nome *"></fieldset>
							<fieldset><input type="text" id="telefone" name="telefone" placeholder="Telefone *" class="mask-telefone"></fieldset>							
							<fieldset><input type="text" id="email" name="email" placeholder="E-mail *"></fieldset>
							<fieldset><input type="text" id="estado" name="estado" placeholder="Estado *"></fieldset>								
							<fieldset><input type="text" id="cidade" name="cidade" placeholder="Cidade *"></fieldset>								
						</div>

						<div class="col-6">
							<fieldset><input type="text" id="assunto" name="assunto" placeholder="Assunto *"></fieldset>								
							<fieldset><textarea id="mensagem" name="mensagem" placeholder="Mensagem *"></textarea>
							<p class="msg-form right"></p>
							<button class="button enviar">Enviar</button>						
						</div>
					</form>
				</div>

			</div>
		</section>


		<script type="text/javascript">
			jQuery(document).ready(function(){	  

				jQuery(".enviar").click(function(){
					jQuery('.enviar').html('Enviando').prop( "disabled", true );
					jQuery('.msg-form').removeClass('erro ok').html('');
					var nome = jQuery('#nome').val();
					var telefone = jQuery('#telefone').val();
					var email = jQuery('#email').val();
					var estado = jQuery('#estado').val();
					var cidade = jQuery('#cidade').val();
					var assunto = jQuery('#assunto').val();
					var mensagem = jQuery('#mensagem').val();
					var para = '<?php the_field('email', 'option'); ?>';
					var nome_site = '<?php bloginfo('name'); ?>';

					if(nome == ''){
						jQuery('#nome').parent().addClass('erro');
					}

					if(telefone == ''){
						jQuery('#telefone').parent().addClass('erro');
					}

					if(email == ''){
						jQuery('#email').parent().addClass('erro');
					}

					if(estado == ''){
						jQuery('#estado').parent().addClass('erro');
					}

					if(cidade == ''){
						jQuery('#cidade').parent().addClass('erro');
					}

					if(assunto == ''){
						jQuery('#assunto').parent().addClass('erro');
					}

					if(mensagem == ''){
						jQuery('#mensagem').parent().addClass('erro');
					}

					if((nome == '') || (email == '') || (mensagem == '')){
						jQuery('.msg-form').html('Campos obrigatórios não podem estar vazios.');
						jQuery('.enviar').html('Enviar').prop( "disabled", false );
					}else{
						jQuery.getJSON("<?php echo get_template_directory_uri(); ?>/mail.php", { nome:nome, telefone:telefone, email:email, estado:estado, cidade:cidade, assunto:assunto, mensagem:mensagem, para:para, nome_site:nome_site }, function(result){		
							if(result=='ok'){
								resultado = 'Enviado com sucesso! Obrigado.';
								classe = 'ok';
							}else{
								resultado = result;
								classe = 'erro';
							}
							jQuery('.msg-form').addClass(classe).html(resultado);
							jQuery('.contato').trigger("reset");
							jQuery('.enviar').html('Enviar').prop( "disabled", false );
						});
					}
				});

				jQuery('input').change(function(){
					if(jQuery(this).parent().hasClass('erro')){
						jQuery(this).parent().removeClass('erro');
					}
				});

				jQuery('textarea').change(function(){
					if(jQuery(this).parent().hasClass('erro')){
						jQuery(this).parent().removeClass('erro');
					}
				});
			});
		</script>

		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/maskedinput.js"></script>
		<script type="text/javascript">
			jQuery(function(jQuery){
			   jQuery(".mask-telefone").mask("(99) 9999-9999?9");
			});
		</script>

	<?php endwhile;	?>

<?php get_footer(); ?>
