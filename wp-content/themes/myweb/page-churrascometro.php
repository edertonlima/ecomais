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
				
				<p class="msg center"></p>
				
				<div id="calculo">
					<div class="tit-page-child">
						<div class="container">
							<span>QUANTIDADE DE PESSOAS</span>
						</div>
					</div>
					<div class="box-content churrascometro cinza row">
						<div class="qtd_pessoas col-4">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-churrascometro-1.png">
							<span class="txt_qtd_pessoas">
								<span class="tit">HOMEM</span>	
								<span class="txt">Porção de 350g</span>	
							</span>
							<span class="cont">
								<span class="nun-cont" id="homem">0</span>
								<span class="btn-nun-cont">
									<span class="mais" rel="#homem">+</span>
									<span class="menos" rel="#homem">-</span>
								</span>
							</span>
						</div>

						<div class="qtd_pessoas col-4">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-churrascometro-2.png">
							<span class="txt_qtd_pessoas">
								<span class="tit">MULHER</span>	
								<span class="txt">Porção de 350g</span>	
							</span>
							<span class="cont">
								<span class="nun-cont" id="mulher">0</span>
								<span class="btn-nun-cont">
									<span class="mais" rel="#mulher">+</span>
									<span class="menos" rel="#mulher">-</span>
								</span>
							</span>
						</div>

						<div class="qtd_pessoas col-4">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/ico-churrascometro-3.png">
							<span class="txt_qtd_pessoas">
								<span class="tit">CRIANÇA</span>	
								<span class="txt">Porção de 350g</span>	
							</span>
							<span class="cont">
								<span class="nun-cont" id="crianca">0</span>
								<span class="btn-nun-cont">
									<span class="mais" rel="#crianca">+</span>
									<span class="menos" rel="#crianca">-</span>
								</span>
							</span>
						</div>
					</div>

					<div class="tit-page-child">
						<div class="container">
							<span>TIPOS DE CARNE</span>
						</div>
					</div>
					<div class="box-content churrascometro cinza">
						<label class="item">
							<input type="checkbox" name="carne1" homem="0.110" mulher="0.078" crianca="0.073">
							Carne bovina sem osso (vazio / picanha / entrecorte / maminha / alcatra)
						</label>

						<label class="item">
							<input type="checkbox" name="carne2" homem="0.139" mulher="0.078" crianca="0.073">
							Carne bovina com osso (ripa / costela)
						</label>

						<label class="item">
							<input type="checkbox" name="carne3" homem="0.110" mulher="0.078" crianca="0.073">
							Suíno / Ovino
						</label>

						<label class="item">
							<input type="checkbox" name="carne4" homem="0.110" mulher="0.078" crianca="0.073">
							Coração de Frango
						</label>

						<label class="item">
							<input type="checkbox" name="carne5" homem="0.110" mulher="0.078" crianca="0.073">
							Linguiça / Salsichão
						</label>

					</div>

					<div class="tit-page-child">
						<div class="container">
							<span>ACOMPANHAMENTOS</span>
						</div>
					</div>
					<div class="box-content churrascometro cinza">
						<label class="item">
							<input type="checkbox" name="acompanhamentos1" homem="0" mulher="0" crianca="0">
							Alface
						</label>

						<label class="item">
							<input type="checkbox" name="acompanhamentos2" homem="0" mulher="0" crianca="0">
							Tomate
						</label>

						<label class="item">
							<input type="checkbox" name="acompanhamentos3" homem="0" mulher="0" crianca="0">
							Arroz
						</label>

						<label class="item">
							<input type="checkbox" name="acompanhamentos4" homem="0" mulher="0" crianca="0">
							Maionese
						</label>

						<label class="item">
							<input type="checkbox" name="acompanhamentos5" homem="0" mulher="0" crianca="0">
							Pão de Alho
						</label>

						<label class="item">
							<input type="checkbox" name="acompanhamentos6" homem="0" mulher="0" crianca="0">
							Abacaxi com Canela
						</label>
					</div>

					<div class="tit-page-child">
						<div class="container">
							<span>BEBIDAS</span>
						</div>
					</div>
					<div class="box-content churrascometro cinza">
						<label class="item">
							<input type="checkbox" name="bebidas1" homem="0" mulher="0" crianca="0">
							Cerveja
						</label>

						<label class="item">
							<input type="checkbox" name="bebidas2" homem="0" mulher="0" crianca="0">
							Refrigerante
						</label>

						<label class="item">
							<input type="checkbox" name="bebidas3" homem="0" mulher="0" crianca="0">
							Água
						</label>
					</div>

					<a href="javascript:" class="button calcular">CALULAR!</a>
				</div>

				<div id="resultado">
					<div class="tit-page-child">
						<div class="container">
							<span>RESULTADOS</span>
						</div>
					</div>

					<div class="box-content cinza resultado">
						<span class="tit first-child">QUANTIDADE DE CARNE</span>
						<span class="item" id="carne1">
							Carne bovina sem osso (vazio / picanha / entrecorte / maminha / alcatra)
							<span class="cont-result"><span class="resultado"></span>kg</span>
						</span>
						<span class="item" id="carne2">
							Carne bovina com osso (ripa / costela)
							<span class="cont-result"><span class="resultado"></span>kg</span>
						</span>
						<span class="item" id="carne3">
							Suíno / Ovino
							<span class="cont-result"><span class="resultado"></span>kg</span>
						</span>
						<span class="item" id="carne4">
							Coração de Frango
							<span class="cont-result"><span class="resultado"></span>kg</span>
						</span>
						<span class="item" id="carne5">
							Linguiça / Salsichão
							<span class="cont-result"><span class="resultado"></span>kg</span>
						</span>

						<span class="tit">QUANTIDADE DE ACOMPANHAMENTOS</span>
						<span class="item" id="acompanhamentos1">
							Alface
							<span class="cont-result"><span class="resultado"></span>kg</span>
						</span>
						<span class="item" id="acompanhamentos2">
							Tomate
							<span class="cont-result"><span class="resultado"></span>kg</span>
						</span>
						<span class="item" id="acompanhamentos3">
							Arroz
							<span class="cont-result"><span class="resultado"></span>kg</span>
						</span>
						<span class="item" id="acompanhamentos4">
							Maionese
							<span class="cont-result"><span class="resultado"></span>kg</span>
						</span>
						<span class="item" id="acompanhamentos5">
							Pão de Alho
							<span class="cont-result"><span class="resultado"></span>kg</span>
						</span>
						<span class="item" id="acompanhamentos6">
							Abacaxi com Canela
							<span class="cont-result"><span class="resultado"></span>kg</span>
						</span>

						<span class="tit">QUANTIDADE DE BEBIDAS</span>
						<span class="item" id="bebidas1">
							Cerveja
							<span class="cont-result"><span class="resultado"></span>Litros</span>
						</span>
						<span class="item" id="bebidas2">
							Refrigerante
							<span class="cont-result"><span class="resultado"></span>Litros</span>
						</span>
						<span class="item" id="bebidas3">
							Água
							<span class="cont-result"><span class="resultado"></span>Litros</span>
						</span>

						<span class="tit">SAL E CARVÃO</span>
						<span class="item" id="sal">
							Sal
							<span class="cont-result"><span class="resultado"></span>kg</span>
						</span>
						<span class="item" id="carvao">
							<strong>Brinquetes EcoMais</strong>
							<span class="cont-result"><span class="resultado"></span>kg</span>
						</span>
					</div>

					<a href="javascript:" class="button novo-calculo">NOVO CÁLCULO!</a>

				</div>

			</div>
		</section>


		<script type="text/javascript">
			jQuery(window).load(function(){
				jQuery('.btn-nun-cont span').click(function(){
					var elem = jQuery(this).attr('rel');
					var count_elem = jQuery(elem).html();
					if(jQuery(this).hasClass('mais')){
						jQuery(elem).html(parseInt(count_elem)+parseInt(1));
					}else{
						if(count_elem > 0){
							jQuery(elem).html(parseInt(count_elem)-parseInt(1));
						}
					}
				});

				jQuery('.novo-calculo').click(function(){
					jQuery('#resultado').hide();
					jQuery('#calculo').show();
					jQuery("html, body").animate({ scrollTop: 0 }, "slow");
					return false;
				});

				jQuery('.calcular').click(function(){
					jQuery('#resultado .item').hide();
					jQuery('#resultado .item .resultado').html('');
					jQuery('.msg').html('');

					homem_status = false;
					mulher_status = false;
					crianca_status = false;

					var qtd_homem = jQuery('#homem').html();
					var qtd_mulher = jQuery('#mulher').html();
					var qtd_crianca = jQuery('#crianca').html();

					var resultado_homem = 0;
					var resultado_mulher = 0;
					var resultado_crianca = 0;
					
					var checkbox = false;
					jQuery('input:checkbox:checked').each(function(){
						checkbox = true;
						var homem = jQuery(this).attr('homem');
						var mulher = jQuery(this).attr('mulher');
						var crianca = jQuery(this).attr('crianca');
						var nome = '#'+jQuery(this).attr('name');
						var elem_resultado = nome+' .resultado';

						if(qtd_homem > 0){
							resultado_homem = (qtd_homem*homem);
							homem_status = true;
						}
						if(qtd_mulher > 0){
							resultado_mulher = (qtd_mulher*mulher);
							mulher_status = true;
						}
						if(qtd_crianca > 0){
							resultado_crianca = (qtd_crianca*crianca);
							crianca_status = true;
						}

						if((homem_status) || (mulher_status) || (crianca_status)) {
							var resultado = parseFloat(resultado_homem)+parseFloat(resultado_mulher)+parseFloat(resultado_crianca);

							jQuery('#calculo').hide();

							jQuery('#resultado').show();
							jQuery(nome).show();
							jQuery(elem_resultado).html((resultado.toFixed(2)).replace('.', ','));

							jQuery('#sal').show();
							jQuery('#sal .resultado').html('0');
							jQuery('#carvao').show();
							jQuery('#carvao .resultado').html('0');
						}else{
							jQuery('.msg').html('Você precisa definir a quantidade de pessoas.');

							jQuery("html, body").animate({ scrollTop: 0 }, "slow");
							return false;
						}

						jQuery("html, body").animate({ scrollTop: 0 }, "slow");
						return false;
					});

					if(!checkbox){
						jQuery('.msg').html('Você precisa definir pelo menos um item.');

						jQuery("html, body").animate({ scrollTop: 0 }, "slow");
						return false;
					}

				});
			});
		</script>

	<?php endwhile;	?>

<?php get_footer(); ?>
