<?php get_header(); ?>

<!-- slide -->
<section class="box-content box-slide">
	<div class="slide">
		<div class="carousel slide" data-ride="carousel" data-interval="6000" id="slide">

			<div class="carousel-inner" role="listbox">

				<?php if( have_rows('slide') ):
					$slide = 0;
					while ( have_rows('slide') ) : the_row();
						$slide = $slide+1;

						if(get_sub_field('video')){ ?>

							<div class="item video <?php if($slide == 1){ echo 'active'; } ?>">
								<video autoplay="true" loop="true" muted="true">
									<source src="<?php the_sub_field('video'); ?>" type="video/mp4">
								</video>
							</div>

						<?php }else{

							if(get_sub_field('imagem')){ ?>

								<div class="item <?php if($slide == 1){ echo 'active'; } ?>" style="background-image: url('<?php the_sub_field('imagem'); ?>');">

									<div class="box-height">
										<div class="box-texto">
											
											<p class="texto"><?php the_sub_field('texto'); ?></p>
											<?php if(get_sub_field('sub_texto')){ ?>
												<p class="sub-texto"><?php the_sub_field('sub_texto'); ?></p>
											<?php } ?>

										</div>
									</div>
									
								</div>

							<?php }

						}
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

<section class="box-content">
	<div class="container">
		
		<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-texto.png" class="ico-texto">
		<p class="justify"><?php the_field('texto_longo'); ?></p>

	</div>
</section>

<section class="box-content">
	<div class="row reduzido">
			
		<ul class="list-item">
			<li class="col-6">
				<a href="javascript:" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/produtos.jpg');">
					<div class="cont-list-item-box">
						<div class="cont-list-item">
							<img src="<?php the_field('ico_colorido',get_page_by_path('')); ?>" class="">
							<span>PRODUTO</span>
							<p>Conheça os briquetes da Ecomais e como são feitos.</p>
						</div>
					</div>
				</a>
			</li>

			<li class="col-6">
				<a href="<?php echo get_permalink(get_page_by_path('dicas/toque-do-chef')); ?>" style="background-image: url('<?php the_field('imagem_listagem',get_page_by_path('dicas/toque-do-chef')); ?>');">
					<div class="cont-list-item-box">
						<div class="cont-list-item">
							<img src="<?php the_field('ico_colorido',get_page_by_path('dicas/toque-do-chef')); ?>">
							<span><?php echo get_the_title(get_page_by_path('dicas/toque-do-chef')); ?></span>
							<p><?php echo get_the_excerpt(get_page_by_path('dicas/toque-do-chef')); ?></p>
						</div>
					</div>
				</a>
			</li>

			<li class="col-6">
				<a href="javascript:" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/hamonizações.jpg');">
					<div class="cont-list-item-box">
						<div class="cont-list-item">
							<img src="<?php the_field('ico_colorido',get_page_by_path('')); ?>" class="">
							<span>HARMONIZACÕES</span>
							<p>Para deixar mais delicioso seu churrasco, conheça combinações de bebidas com carnes.</p>
						</div>
					</div>
				</a>
			</li>

			<li class="col-6">
				<a href="javascript:" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/musicas.jpg');">
					<div class="cont-list-item-box">
						<div class="cont-list-item">
							<img src="<?php the_field('ico_colorido',get_page_by_path('')); ?>" class="">
							<span>MÚSICAS</span>
							<p>Encontre playlists para você ouvir nos seus churrascos com a sua família e amigos.</p>
						</div>
					</div>
				</a>
			</li>
		</ul>

	</div>
</section>

<?php /*
<section class="box-content no-padding onde-comprar" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/mapa.png');">
	<div class="box-comprar">
		<span class="tit">ONDE COMPRAR?</span>
		<div class="select-comprar">
			<p>Selecione o lugar mais perto para<br>encontrar os produtos Ecomais</p>
			<div class="col-12">
				<div class="select">
					<i class="fa fa-map-marker" aria-hidden="true"></i>
					<select name="estado" id="estado">
						<option value="Selecione um Estado">Estado</option>
						
						<?php /*
							foreach ($representantes as $key => $value) { 
								$estados[] = array(
									'uf' => $value['uf'],
									'nome' => $value['estado']
								);
							}

							foreach (array_unique($estados) as $estado) { ?>
								<option value="<?php echo $estado; ?>"><?php echo $estado; ?></option>
							<?php } */
						/*?>									

					</select>
				</div>
			</div>	

			<div class="col-12">
				<div class="select">
					<i class="fa fa-map-marker" aria-hidden="true"></i>
					<select name="cidade" id="cidade" disabled>
						<option value="">Cidade</option>
					</select>
				</div>
			</div>
		</div>
	</div>
</section> */ ?>


	<?php
		query_posts(
			array(
				'post_type' => 'representantes',
				'posts_per_page' => -1
			)
		);
		while ( have_posts() ) : the_post();

			$terms = wp_get_post_terms( $post->ID, $post->post_type.'_taxonomy' );

			$tipos[] = strtolower($terms[0]->name);

			$representantes[strtolower($terms[0]->name)][] = array(
				'categoria' => $terms[0]->name,
				'ID' => $post->ID,
				'nome' => $post->post_title,
				'estado' => get_field('estado_representantes',$post->ID),
				'uf' => strtolower(get_field('uf_representantes',$post->ID)),
				'cidade' => get_field('cidade_representantes',$post->ID),
				'email' => get_field('e-mail_representantes',$post->ID),
				'telefone' => get_field('telefone_representantes',$post->ID),
				'celular' => get_field('celular_representantes',$post->ID),
				'endereco' => get_field('endereco_representantes',$post->ID),
				'numero' => get_field('numero_representantes',$post->ID),
				'bairro' => get_field('bairro_representantes',$post->ID)
			);

		endwhile;
		wp_reset_query();
		//var_dump($representantes);
		$tipos = array_unique($tipos);
		//var_dump($representantes);
	?>

	<section class="box-content representantes">

			<div class="tit-page-child">
				<div class="container">
					<span class="center">ONDE COMPRAR?</span>
				</div>
			</div>

			<p class="center margin-top-30">Selecione seu estado para encontrar o representante mais próximo:</p>

		<div class="container">

			<div class="row">
				<div class="col-12">

					<div class="select-comprar">

						<div class="col-4">
							<div class="select">
								<i class="fa fa-map-marker" aria-hidden="true"></i>

								<select name="tipo" id="tipo">									
									<?php
										$args = array(
										    'taxonomy'      => 'representantes_taxonomy',
										    'parent'        => 0,
										    'orderby'       => 'name',
										    'order'         => 'ASC',
										    'hierarchical'  => 1,
										    'pad_counts'    => 0
										);
										$categories = get_categories( $args );
										$qtd_cat = 1;
										foreach ( $categories as $categoria ){ ?>

											<option value="<?php echo strtolower($categoria->name); ?>" <?php if($qtd_cat == 1){ echo 'selected="selected"'; } ?>><?php echo $categoria->name; ?></option>
											
										<?php
											$qtd_cat = $qtd_cat+1;
										}
									?>
								</select>

								<?php /*<select name="estado" id="estado">
									<option value="Lojas">Lojas</option>				
									<option value="Representantes">Representantes</option>


								</select> */ ?>
							</div>
						</div>

						<div class="col-4 select-estado">
							<div class="select">
								<i class="fa fa-map-marker" aria-hidden="true"></i>
								<select name="estado" id="estado">
								</select>
							</div>
						</div>

						<div class="col-4">
							<div class="select">
								<i class="fa fa-map-marker" aria-hidden="true"></i>
								<select name="cidade" id="cidade" disabled>
									<option value="">Selecione uma Cidade</option>
								</select>
							</div>
						</div>
					</div>
 
					<ul class="map on-lojas" style="">
						<?php 
							foreach ($representantes['lojas'] as $key => $value) { 
								$lojas_estados[$value['uf']] = array(
									'uf' => $value['uf'],
									'nome' => $value['estado']
								); ?>

								<li class="<?php echo $value['uf']; ?>" estado="<?php echo $value['uf']; ?>">
									<a href="javascript:" rel="<?php echo $value['uf']; ?>" class="<?php echo $value['uf']; ?> on" title="<?php echo strtoupper($value['uf']); ?>">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/null.gif" alt="<?php echo strtoupper($value['uf']); ?>" />
									</a>
								</li>
							<?php }
						?>
					</ul>

					<ul class="map on-representantes" style="display: none;">
						<?php 
							foreach ($representantes['representantes'] as $key => $value) { 
								$repre_estados[$value['uf']] = array(
									'uf' => $value['uf'],
									'nome' => $value['estado']
								); ?>

								<li class="<?php echo $value['uf']; ?>" estado="<?php echo $value['uf']; ?>">
									<a href="javascript:" rel="<?php echo $value['uf']; ?>" class="<?php echo $value['uf']; ?> on" title="<?php echo strtoupper($value['uf']); ?>">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/images/null.gif" alt="<?php echo strtoupper($value['uf']); ?>" />
									</a>
								</li>
							<?php }
						?>
					</ul>

					<div class="col-12">
						<ul class="list-representantes"></ul>
					</div>
					
				</div>
			</div>

		</div>
	</section>




<?php get_footer(); ?>

<script type="text/javascript">
	jQuery(document).ready(function(){	  

		// FORM
		jQuery(".enviar").click(function(){
			jQuery('.enviar').html('ENVIANDO').prop( "disabled", true );
			jQuery('.msg-form').removeClass('erro ok').html('');
			var nome = jQuery('#nome').val();
			var email = jQuery('#email').val();
			var telefone = jQuery('#telefone').val();
			var assunto = jQuery('#assunto').val();
			var mensagem = jQuery('#texto').val();
			var para = '<?php get_field('email', 'option'); ?>';
			var nome_site = '<?php get_field('titulo', 'option'); ?>';

			if(email!=''){
				jQuery.getJSON("<?php echo get_template_directory_uri(); ?>/mail.php", { nome:nome, email:email, telefone:telefone, assunto:assunto, mensagem:mensagem, para:para, nome_site:nome_site }, function(result){		
					if(result=='ok'){
						resultado = 'Enviado com sucesso! Obrigado.';
						classe = 'ok';
					}else{
						resultado = result;
						classe = 'erro';
					}
					jQuery('.msg-form').addClass(classe).html(resultado);
					jQuery('form').trigger("reset");
					jQuery('.enviar').html('CADASTRAR').prop( "disabled", false );
				});
			}else{
				jQuery('.msg-form').addClass('erro').html('Por favor, digite um e-mail válido.');
				jQuery('.enviar').html('CADASTRAR').prop( "disabled", false );
			}
		});
		
	});
/*
	jQuery(window).load(function(){
		jQuery('.grid-item').each(function(){
			jQuery('.hover-grid',this).height(jQuery(this).height());
		});
	});

	jQuery(window).resize(function(){
		jQuery('.grid-item').each(function(){
			jQuery('.hover-grid',this).height(jQuery(this).height());
		});
	});*/
</script>
<?php /*
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/masonry.pkgd.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/imagesloaded.pkgd.js" type="text/javascript"></script>
<script type="text/javascript">
	var $grid = jQuery('.grid').masonry({
		itemSelector: '.grid-item',
		percentPosition: true,
		columnWidth: '.grid-sizer'
	});
	// layout Masonry after each image loads
	$grid.imagesLoaded().progress( function() {
		$grid.masonry();
	});  
</script>*/ ?>

<script type="text/javascript">
	<?php 
		foreach ($tipos as $value) {
			echo 'var '.$value.' = '. json_encode($representantes[$value]).';';
		}

		echo 'var repre_estados = '. json_encode($repre_estados).';';
		echo 'var lojas_estados = '. json_encode($lojas_estados).';';
	?>

	jQuery('form.login').submit(function(event){

		jQuery('.enviar').html('Enviando').prop( "disabled", true );
		jQuery('.msg-form').removeClass('erro ok').html('');

		var usuario = jQuery('#usuario').val();
		var senha = jQuery('#senha').val();		

		var enviar = true;

		if(usuario == ''){
			jQuery('#usuario').parent().addClass('erro');
			enviar = false;
		}

		if(senha == ''){
			jQuery('#senha').parent().addClass('erro');
			enviar = false;
		}

		if(!enviar){
			jQuery('.msg-form').html('Todos os campos são obrigatórios.');
			jQuery('.enviar').html('Entrar').prop( "disabled", false );
			return false;
		}else{
			jQuery('.enviar').html('Enviar').prop( "disabled", false );
			//event.preventDefault();
		}		
		
	});

	/*jQuery(".enviar").click(function(){

	});*/

	var val_estado_map = '';
	var val_estado = '';
	var list_representantes = '';
	var val_tipo = '';
	
	function monta_estados(tipo){
		var estados = new Array();
		if(tipo == 'representantes'){
			jQuery.each(repre_estados, function (key, val) {
				estados.push({'nome':val.nome, 'uf':val.uf});
			});
		}
		if(tipo == 'lojas'){
			jQuery.each(lojas_estados, function (key, val) {
				estados.push({'nome':val.nome, 'uf':val.uf});
			});
		}
		estados = estados.filter(function(elem, pos, self) {
			return self.indexOf(elem) == pos;
		});

		estado = '<option value="Selecione um Estado">Selecione um Estado</option>';
		jQuery.each(estados, function (key, val) {
			estado += '<option value="' + val.uf + '">' + val.nome + '</option>';
		});
		jQuery("#estado").html(estado);
	}

	jQuery(document).ready(function(){

		monta_estados(jQuery('#tipo option:selected').val());

		jQuery("#tipo").change(function(){
			
			jQuery('#cidade').html('<option value="Selecione uma Cidade">Selecione uma Cidade</option>').prop('disabled', true);
			//jQuery("#estado").val('Selecione um Estado').change();
			jQuery('.list-representantes').html('');

			monta_estados(jQuery(this).val());

			jQuery(".map li a").removeClass('active');
			jQuery(".map").hide();
			jQuery('.on-'+jQuery(this).val()).show();
		}).change();

		jQuery("#estado").change(function(){
			jQuery(".map li a").removeClass('active');
			var cidade = '<option value="Selecione uma Cidade">Selecione uma Cidade</option>';
			var cidades = [];
			val_estado = jQuery('#estado option:selected').val();			
			val_tipo = jQuery('#tipo option:selected').val();

			if(val_estado != val_estado_map){
				if(val_estado != 'Selecione um Estado'){

					// MONTA SELECT CIDADES
					if(val_tipo == 'lojas'){
						jQuery.each(lojas, function (key, val) {
							if((val.uf == val_estado) && (val_tipo == val.categoria.toLowerCase())) {
								cidades.push(val.cidade);
							}
						});
					}
					if(val_tipo == 'representantes'){
						jQuery.each(representantes, function (key, val) {
							if((val.uf == val_estado) && (val_tipo == val.categoria.toLowerCase())) {
								cidades.push(val.cidade);
							}
						});
					}
					cidades = cidades.filter(function(elem, pos, self) {
						return self.indexOf(elem) == pos;
					});
					jQuery.each(cidades, function (key, val) {
						cidade += '<option value="' + val + '">' + val + '</option>';
					});
					jQuery("#cidade").html(cidade).prop('disabled', false);
					// MONTA SELECT CIDADES

					jQuery('.list-representantes').html('');
					jQuery('.map li a').removeClass('active');
					jQuery('.map li a.'+val_estado).addClass('active');
					list_representantes = '';
					
					if(val_tipo == 'representantes'){
						jQuery.each(representantes, function (key, val) {
							if((val.uf == val_estado) && (val.categoria.toLowerCase() == val_tipo)) {
								list_representantes += '<li>';
								list_representantes += '<h3>'+val.nome+'</h3><div class="content-txt">';

								if(val.email != ''){
									list_representantes += '<span class="email"><strong>E-mail</strong>'+val.email+'</span>'
								}

								if(val.telefone != ''){
									list_representantes += '<span><strong>Telefone</strong>'+val.telefone+'</span>'
								}

								if(val.celular != ''){
									list_representantes += '<span><strong>Celular</strong>'+val.celular+'</span>'
								}

								if(val.endereco != ''){
									list_representantes += '<span><strong>Endereço</strong>'+val.endereco+', '+val.numero+', '+val.bairro+'</span>'
								}

								if(val.cidade != ''){
									list_representantes += '<span><strong>Cidade</strong>'+val.cidade+', '+val.estado+'</span>'
								}

								list_representantes += '</div></li>';
							}
						});
					}

					if(val_tipo == 'lojas'){
						jQuery.each(lojas, function (key, val) {
							if((val.uf == val_estado) && (val.categoria.toLowerCase() == val_tipo)) {
								list_representantes += '<li>';
								list_representantes += '<h3>'+val.nome+'</h3><div class="content-txt">';

								if(val.email != ''){
									list_representantes += '<span class="email"><strong>E-mail</strong>'+val.email+'</span>'
								}

								if(val.telefone != ''){
									list_representantes += '<span><strong>Telefone</strong>'+val.telefone+'</span>'
								}

								if(val.celular != ''){
									list_representantes += '<span><strong>Celular</strong>'+val.celular+'</span>'
								}

								if(val.endereco != ''){
									list_representantes += '<span><strong>Endereço</strong>'+val.endereco+', '+val.numero+', '+val.bairro+'</span>'
								}

								if(val.cidade != ''){
									list_representantes += '<span><strong>Cidade</strong>'+val.cidade+', '+val.estado+'</span>'
								}

								list_representantes += '</div></li>';
							}
						});
					}
				}
				jQuery('.list-representantes').html(list_representantes);
			}
		}).change();

		jQuery("#cidade").change(function(){
			val_cidade = jQuery('#cidade option:selected').val();
			val_estado = jQuery('#estado option:selected').val();
			val_tipo = jQuery('#tipo option:selected').val();
			list_representantes = '';
			
			if(val_tipo == 'representantes'){
				if(val_cidade != 'Selecione uma Cidade'){
					jQuery.each(representantes, function (key, val) {
						if((val.uf == val_estado) && (val.cidade == val_cidade) && (val.categoria.toLowerCase() == val_tipo)) {
							list_representantes += '<li>';
							list_representantes += '<h3>'+val.nome+'</h3><div class="content-txt">';

							if(val.email != ''){
								list_representantes += '<span class="email"><strong>E-mail</strong>'+val.email+'</span>'
							}

							if(val.telefone != ''){
								list_representantes += '<span><strong>Telefone</strong>'+val.telefone+'</span>'
							}

							if(val.celular != ''){
								list_representantes += '<span><strong>Celular</strong>'+val.celular+'</span>'
							}

							if(val.endereco != ''){
								list_representantes += '<span><strong>Endereço</strong>'+val.endereco+', '+val.numero+', '+val.bairro+'</span>'
							}

							if(val.cidade != ''){
								list_representantes += '<span><strong>Cidade</strong>'+val.cidade+', '+val.estado+'</span>'
							}

							list_representantes += '</div></li>';
						}
					});
				}
			}

			if(val_tipo == 'lojas'){
				if(val_cidade != 'Selecione uma Cidade'){
					jQuery.each(lojas, function (key, val) {
						if((val.uf == val_estado) && (val.cidade == val_cidade) && (val.categoria.toLowerCase() == val_tipo)) {
							list_representantes += '<li>';
							list_representantes += '<h3>'+val.nome+'</h3><div class="content-txt">';

							if(val.email != ''){
								list_representantes += '<span class="email"><strong>E-mail</strong>'+val.email+'</span>'
							}

							if(val.telefone != ''){
								list_representantes += '<span><strong>Telefone</strong>'+val.telefone+'</span>'
							}

							if(val.celular != ''){
								list_representantes += '<span><strong>Celular</strong>'+val.celular+'</span>'
							}

							if(val.endereco != ''){
								list_representantes += '<span><strong>Endereço</strong>'+val.endereco+', '+val.numero+', '+val.bairro+'</span>'
							}

							if(val.cidade != ''){
								list_representantes += '<span><strong>Cidade</strong>'+val.cidade+', '+val.estado+'</span>'
							}

							list_representantes += '</div></li>';
						}
					});
				}
			}

			jQuery('.list-representantes').html(list_representantes);
		}).change();
		

		jQuery(".map li a").click(function(){
			jQuery('.list-representantes').html('');

			var cidade = '<option value="Selecione uma Cidade">Selecione uma Cidade</option>';
			var cidades = [];

			val_estado_map = jQuery(this).attr('rel');
			val_tipo = jQuery('#tipo option:selected').val();
			list_representantes = '';

			if(val_estado != val_estado_map){
				if(val_estado_map != ''){

					// MONTA SELECT CIDADES
					if(val_tipo == 'lojas'){
						jQuery.each(lojas, function (key, val) {
							if((val.uf == val_estado_map) && (val_tipo == val.categoria.toLowerCase())) {
								cidades.push(val.cidade);
							}
						});
					}
					if(val_tipo == 'representantes'){
						jQuery.each(representantes, function (key, val) {
							if((val.uf == val_estado_map) && (val_tipo == val.categoria.toLowerCase())) {
								cidades.push(val.cidade);
							}
						});
					}
					cidades = cidades.filter(function(elem, pos, self) {
						return self.indexOf(elem) == pos;
					});
					jQuery.each(cidades, function (key, val) {
						cidade += '<option value="' + val + '">' + val + '</option>';
					});
					jQuery("#cidade").html(cidade).prop('disabled', false);
					// MONTA SELECT CIDADES

					jQuery("#estado").val(val_estado_map).change();

					list_representantes = '';
					if(val_tipo == 'representantes'){
						jQuery.each(representantes, function (key, val) {
							if((val.uf == val_estado) && (val.categoria.toLowerCase() == val_tipo)) {
								list_representantes += '<li>';
								list_representantes += '<h3>'+val.nome+'</h3><div class="content-txt">';

								if(val.email != ''){
									list_representantes += '<span class="email"><strong>E-mail</strong>'+val.email+'</span>'
								}

								if(val.telefone != ''){
									list_representantes += '<span><strong>Telefone</strong>'+val.telefone+'</span>'
								}

								if(val.celular != ''){
									list_representantes += '<span><strong>Celular</strong>'+val.celular+'</span>'
								}

								if(val.endereco != ''){
									list_representantes += '<span><strong>Endereço</strong>'+val.endereco+', '+val.numero+', '+val.bairro+'</span>'
								}

								if(val.cidade != ''){
									list_representantes += '<span><strong>Cidade</strong>'+val.cidade+', '+val.estado+'</span>'
								}

								list_representantes += '</div></li>';
							}
						});
					}

					if(val_tipo == 'lojas'){
						jQuery.each(lojas, function (key, val) {
							if((val.uf == val_estado) && (val.categoria.toLowerCase() == val_tipo)) {
								list_representantes += '<li>';
								list_representantes += '<h3>'+val.nome+'</h3><div class="content-txt">';

								if(val.email != ''){
									list_representantes += '<span class="email"><strong>E-mail</strong>'+val.email+'</span>'
								}

								if(val.telefone != ''){
									list_representantes += '<span><strong>Telefone</strong>'+val.telefone+'</span>'
								}

								if(val.celular != ''){
									list_representantes += '<span><strong>Celular</strong>'+val.celular+'</span>'
								}

								if(val.endereco != ''){
									list_representantes += '<span><strong>Endereço</strong>'+val.endereco+', '+val.numero+', '+val.bairro+'</span>'
								}

								if(val.cidade != ''){
									list_representantes += '<span><strong>Cidade</strong>'+val.cidade+', '+val.estado+'</span>'
								}

								list_representantes += '</div></li>';
							}
						});
					}
				}
				
				jQuery('.list-representantes').html(list_representantes);
			}

			jQuery('.list-representantes').html(list_representantes);
			jQuery('.map li a').removeClass('active');
			jQuery('.map li a.'+val_estado_map).addClass('active');
		});

		jQuery('input').change(function(){
			if(jQuery(this).parent().hasClass('erro')){
				jQuery(this).parent().removeClass('erro');
			}
		});

	})
</script>