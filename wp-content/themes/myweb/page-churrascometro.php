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
							<input type="checkbox" name="carne1" tipo="carne">
							Carne bovina sem osso (picanha / entrecorte / maminha / alcatra)
						</label>

						<label class="item">
							<input type="checkbox" name="carne2" tipo="carne">
							Carne bovina com osso (ripa / costela)
						</label>

						<label class="item">
							<input type="checkbox" name="carne3" tipo="carne">
							Frango
						</label>

						<label class="item">
							<input type="checkbox" name="carne4" tipo="carne">
							Suíno / Ovino
						</label>

						<label class="item">
							<input type="checkbox" name="carne5" tipo="carne">
							Coração de Frango
						</label>

						<label class="item">
							<input type="checkbox" name="carne6" tipo="carne">
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
							<input type="checkbox" name="acompanhamentos1" tipo="acompanhamentos">
							Arroz
						</label>

						<label class="item">
							<input type="checkbox" name="acompanhamentos2" tipo="acompanhamentos">
							Maionese
						</label>

						<label class="item">
							<input type="checkbox" name="acompanhamentos3" tipo="acompanhamentos">
							Abacaxi com Canela
						</label>

						<label class="item">
							<input type="checkbox" name="acompanhamentos4" tipo="acompanhamentos">
							Pão de Alho
						</label>

						<label class="item">
							<input type="checkbox" name="acompanhamentos5" tipo="acompanhamentos">
							Tomate
						</label>

						<label class="item">
							<input type="checkbox" name="acompanhamentos6" tipo="acompanhamentos">
							Alface
						</label>
					</div>

					<div class="tit-page-child">
						<div class="container">
							<span>BEBIDAS</span>
						</div>
					</div>
					<div class="box-content churrascometro cinza">
						<label class="item">
							<input type="checkbox" name="bebidas1" tipo="bebidas">
							Cerveja
						</label>

						<label class="item">
							<input type="checkbox" name="bebidas2" tipo="bebidas">
							Refrigerante
						</label>

						<label class="item">
							<input type="checkbox" name="bebidas3" tipo="bebidas">
							Água
						</label>
					</div>

					<a href="javascript:" class="button calcular">CALCULAR!</a>
				</div>

				<div id="resultado">
					<div class="tit-page-child">
						<div class="container">
							<span>RESULTADOS</span>
						</div>
					</div>

					<div class="box-content cinza resultado">
						<span class="tit tit-result-carne first-child">QUANTIDADE DE CARNE</span>
						<span class="item" id="carne1">
							Carne bovina sem osso (picanha / entrecorte / maminha / alcatra)
							<span class="cont-result"><span class="resultado"></span>kg</span>
						</span>
						<span class="item" id="carne2">
							Carne bovina com osso (ripa / costela)
							<span class="cont-result"><span class="resultado"></span>kg</span>
						</span>
						<span class="item" id="carne3">
							Frango
							<span class="cont-result"><span class="resultado"></span>kg</span>
						</span>
						<span class="item" id="carne4">
							Suíno / Ovino
							<span class="cont-result"><span class="resultado"></span>kg</span>
						</span>
						<span class="item" id="carne5">
							Coração de Frango
							<span class="cont-result"><span class="resultado"></span>kg</span>
						</span>
						<span class="item" id="carne6">
							Linguiça / Salsichão
							<span class="cont-result"><span class="resultado"></span>kg</span>
						</span>

						<span class="tit tit-result-acompanhamentos">QUANTIDADE DE ACOMPANHAMENTOS</span>
						<span class="item" id="acompanhamentos1">
							Arroz
							<span class="cont-result"><span class="resultado"></span>kg</span>
						</span>
						<span class="item" id="acompanhamentos2">
							Maionese
							<span class="cont-result"><span class="resultado"></span>kg</span>
						</span>
						<span class="item" id="acompanhamentos3">
							Abacaxi com Canela
							<span class="cont-result"><span class="resultado"></span>uni.</span>
						</span>
						<span class="item" id="acompanhamentos4">
							Pão de Alho
							<span class="cont-result"><span class="resultado"></span>uni.</span>
						</span>
						<span class="item" id="acompanhamentos5">
							Tomate
							<span class="cont-result"><span class="resultado"></span>uni.</span>
						</span>
						<span class="item" id="acompanhamentos6">
							Alface
							<span class="cont-result"><span class="resultado"></span>uni.</span>
						</span>

						<span class="tit tit-result-bebidas">QUANTIDADE DE BEBIDAS</span>
						<span class="item" id="bebidas1">
							Cerveja
							<span class="cont-result"><span class="resultado"></span>Latas</span>
						</span>
						<span class="item" id="bebidas2">
							Refrigerante
							<span class="cont-result"><span class="resultado"></span>Litros</span>
						</span>
						<span class="item" id="bebidas3">
							Água
							<span class="cont-result"><span class="resultado"></span>Litros</span>
						</span>

						<span class="tit tit-result-sal-carvao">CARVÃO</span>
						<?php /*<span class="tit tit-result-sal-carvao">SAL E CARVÃO</span>
						<span class="item" id="sal">
							Sal
							<span class="cont-result"><span class="resultado"></span>kg</span>
						</span>*/?>
						<span class="item" id="carvao">
							<strong>Brinquetes EcoMais</strong>
							<span class="cont-result"><span class="resultado"></span>kg</span>
						</span>
						<span class="item" id="mix" style="margin-top: -10px; padding-top: 0;">
							ou <strong>Mix Carvão com Briquete</strong>
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

					var qtd_homem = jQuery('#homem').html();
					var qtd_mulher = jQuery('#mulher').html();
					var qtd_crianca = jQuery('#crianca').html();

					var peso_carne = 0;

					if((qtd_homem > 0) || (qtd_mulher > 0) || (qtd_crianca > 0)) {

						var checkbox = false;
						var val_carne = '';
						var val_acompanhamentos = '';
						var val_bebidas = '';

						jQuery('input:checkbox').each(function(){

							if(jQuery(this).is(':checked')){
								checkbox = true;

								if(jQuery(this).attr('tipo') == 'carne'){
									val_carne = val_carne+'1';
								}

								if(jQuery(this).attr('tipo') == 'acompanhamentos'){
									val_acompanhamentos = val_acompanhamentos+'1';
								}

								if(jQuery(this).attr('tipo') == 'bebidas'){
									val_bebidas = val_bebidas+'1';
								}
								
							}else{

								if(jQuery(this).attr('tipo') == 'carne'){
									val_carne = val_carne+'0';
								}

								if(jQuery(this).attr('tipo') == 'acompanhamentos'){
									val_acompanhamentos = val_acompanhamentos+'0';
								}

								if(jQuery(this).attr('tipo') == 'bebidas'){
									val_bebidas = val_bebidas+'0';
								}

							}
						});

						if(checkbox){
							jQuery.getJSON('<?php echo get_template_directory_uri(); ?>/variavel_calc.json', function (data) {

								jQuery('#calculo').hide();
								jQuery('#resultado').show();
		 						
		 						if(val_carne != 000000){ //alert('tem carne');
		 							jQuery('.tit-result-carne').show();
									jQuery.each( data, function( key, val ) { //alert('linha = '+key);

										if(key == val_carne){ //alert('achou');
											carne_h = val[0].homem;
											carne_m = val[0].mulher;
											carne_c = val[0].crianca;
											for(var i=0; i<6; i++){
												if(carne_h[i] != 0){ //alert(carne_h[i]);
													calc_carne_h = qtd_homem*carne_h[i]; //alert('calculo homem = '+calc_carne_h);
													calc_carne_m = qtd_mulher*carne_m[i]; //alert('calculo mulher = '+calc_carne_m);
													calc_carne_c = qtd_crianca*carne_c[i]; //alert('calculo crianca = '+calc_carne_c);

													calc_carne = calc_carne_h+calc_carne_m+calc_carne_c;
													peso_carne = peso_carne+calc_carne; //alert('peso carne = '+peso_carne);

													jQuery('#carne'+(i+1)).show();
													jQuery('#carne'+(i+1)+' .resultado').html(calc_carne.toFixed(2).replace('.', ','));
												}
											}
										}

									});

									/*if(Math.ceil(peso_carne) <= 4){
										var txt_brinquetes = '2,5';
										var qtd_brinquetes = '2.5';
									}else{
										if(Math.ceil(peso_carne) > 8){
											var txt_brinquetes = '7,5';
											var qtd_brinquetes = '7.5';
										}else{
											var txt_brinquetes = '5';
											var qtd_brinquetes = '5';
										}
									}*/

									var qtd_brinquetes = peso_carne*0.8;
									var mix = peso_carne;
									//var sal = peso_carne*0.5;

									jQuery('.tit-result-sal-carvao').show();
									jQuery('#carvao').show();
									jQuery('#carvao .resultado').html(qtd_brinquetes);

									jQuery('#mix').show();
									jQuery('#mix .resultado').html(mix.toFixed(2).replace('.', ','));

									/*jQuery('#sal').show();
									jQuery('#sal .resultado').html(sal.toFixed(2).replace('.', ','));*/

								}

								if(val_acompanhamentos != '000000'){
									if(val_acompanhamentos == '100000'){
										var acompanhamentos_h = [0.07,0,0,0,0,0];
										var acompanhamentos_m = [0.065,0,0,0,0,0];
										var acompanhamentos_c = [0.036,0,0,0,0,0];
									}else{
										var acompanhamentos_h = [0.035,0.075,3,1,1,1];
										var acompanhamentos_m = [0.028,0.06,3,1,1,1];
										var acompanhamentos_c = [0.018,0.038,2,1,1,1];
									}

									jQuery('.tit-result-acompanhamentos').show();
									for(var i=0; i<6; i++){
										if(val_acompanhamentos[i] != 0){ //alert(val_acompanhamentos[i]);
											calc_acompanhamentos_h = qtd_homem*acompanhamentos_h[i]; //alert('calculo homem = '+calc_carne_h);
											calc_acompanhamentos_m = qtd_mulher*acompanhamentos_m[i]; //alert('calculo mulher = '+calc_carne_m);
											calc_acompanhamentos_c = qtd_crianca*acompanhamentos_c[i]; //alert('calculo crianca = '+calc_carne_c);

											calc_acompanhamentos = calc_acompanhamentos_h+calc_acompanhamentos_m+calc_acompanhamentos_c;

											jQuery('#acompanhamentos'+(i+1)).show();
											if(i > 1){
												jQuery('#acompanhamentos'+(i+1)+' .resultado').html(calc_acompanhamentos);
											}else{
												jQuery('#acompanhamentos'+(i+1)+' .resultado').html(calc_acompanhamentos.toFixed(2).replace('.', ','));
											}
										}
									}
								}

								if(val_bebidas != '000'){
									//if(val_bebidas == '100'){
										var bebidas_h = [4,1,1];
										var bebidas_m = [1,0.5,0.5];
										var bebidas_c = [0,0.5,0.5];
									//}

									for(var i=0; i<3; i++){
										if(val_bebidas[i] != 0){ //alert(val_bebidas[i]);
											calc_bebidas_h = qtd_homem*bebidas_h[i]; //alert('calculo homem = '+calc_bebidas_h);
											calc_bebidas_m = qtd_mulher*bebidas_m[i]; //alert('calculo mulher = '+calc_carne_m);
											calc_bebidas_c = qtd_crianca*bebidas_c[i]; //alert('calculo crianca = '+calc_carne_c);

											calc_bebidas = calc_bebidas_h+calc_bebidas_m+calc_bebidas_c;
											//alert(calc_bebidas);

											if(calc_bebidas > 0){
												jQuery('.tit-result-bebidas').show();
												jQuery('#bebidas'+(i+1)).show();
												if(i == 0){
													jQuery('#bebidas'+(i+1)+' .resultado').html(calc_bebidas);
												}else{
													jQuery('#bebidas'+(i+1)+' .resultado').html(calc_bebidas.toFixed(2).replace('.', ','));
												}
											}
										}
									}
								}
							});

							jQuery("html, body").animate({ scrollTop: 0 }, "slow");

						}else{
							jQuery('.msg').html('Você precisa definir pelo menos um item para o seu churrasco.');

							jQuery("html, body").animate({ scrollTop: 0 }, "slow");
							return false;
						}

					}else{
						jQuery('.msg').html('Você precisa definir a quantidade de pessoas.');

						jQuery("html, body").animate({ scrollTop: 0 }, "slow");
						return false;
					}
				});					
			});
		</script>

	<?php endwhile;	?>

<?php get_footer(); ?>
