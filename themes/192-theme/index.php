<?php
$plantilla = new R192_Index_Controller;
//cltvo_print_r($plantilla);
get_header();
//cltvo_print_r( $plantilla );
?>
<div id="home" class="home">

	<div class="body-gradient">

		<div class="main-background">

			<?php include get_stylesheet_directory() .'/inc/general/header-home.php' ?>

			<!-- CONTENT -->
		    <div class="index__ad-horizontal">

		        <div class="container">

		            <div class="row">

		                <div class="col-xs-12 col-md-10 col-md-offset-1" style="padding: 0">

		                    <div style="padding: 0;">

                                <!-- /143452919/Test_LR_1MB -->
                                <style media="screen">
                                    #div-gpt-ad-1477335796338-0 div{
                                        padding-bottom: 60px;
                                    }
                                </style>
								<div id='div-gpt-ad-1477335796338-0' style="text-align:center;">
									<script>
										googletag.cmd.push(function() { googletag.display('div-gpt-ad-1477335796338-0'); });
									</script>
								</div>

		                    </div>

		                </div>

		            </div>

		        </div>

		    </div>

			<section class="section-content">
				<div class="container">
					<div class="row clearfix">
						<?php //cltvo_print_r(R192_PublicacionDestacada_MetaBox::Get_Home_Posts()	);?>
						<?php foreach (R192_PublicacionDestacada_MetaBox::Get_Home_Posts() as $key => $id_y_ancho_arr): //trae los posts guardados en un option para mostrar en HOME?>
							<?php if( is_array($id_y_ancho_arr) && !empty($id_y_ancho_arr)):?>
								<?php $cltvo_post = new Cltvo_Post( get_post( $id_y_ancho_arr['id'] ));?>
								<?php //cltvo_print_r($cltvo_post->getHomeFeatImg( intval($id_y_ancho_arr['ancho']) ));die;?>
								<div class="col-md-<?php echo $id_y_ancho_arr['ancho']*3?> col-sm-6 col-xs-12">
									<div class="articulo">

										<?php

										$video = array(
											"type" => "vimeo", //vimeo, youtube, tag
										    "id" => "261866912"
										);
										$video = false; //comentar esto para reactivar el video

										?>
											<?php //if ($video && !empty($video) && is_array($video) && isset($video['type']) && isset($id_y_ancho_arr['ancho']) && $id_y_ancho_arr['ancho'] == 2 && $key <= 2 ): ?>
										  <?php if ($video && !empty($video) && is_array($video) && isset($video['type']) && isset($id_y_ancho_arr['ancho']) && $id_y_ancho_arr['ancho'] == 2 && $key == 5 ): ?>
												<?php if($video['type'] == 'tag'):?>
													<video class="imagen videotag" autoplay loop>
														<source src="<?php echo THEMEURL;?>/videos/buick.mp4" type="video/mp4">
														<source src="<?php echo THEMEURL;?>/videos/buick.ogg" type="video/ogg">
														<source src="<?php echo THEMEURL;?>/videos/buick.webm" type="video/webm">
													</video>

												<?php elseif($video['type'] == 'youtube'):?>
													<iframe class="imagen videoembed" src="https://www.youtube.com/embed/<?php echo isset($video['id']) ? $video['id'] : ''; ?>?autoplay=1&rel=0" frameborder="0" allowfullscreen></iframe>

												<?php elseif($video['type'] == 'vimeo'): ?>
													<iframe class="imagen videoembed vimeo" src="https://player.vimeo.com/video/<?php echo isset($video['id']) ? $video['id'] : ''; ?>?loop=1&autoplay=1" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
												<?php endif; ?>

												<div class="textual">
													<a class="link" href="http://www.revista192.com/print/suscripciones/" target="_blank">
														<h2 class="categoria">Slippery Slope | VANS</h2>
													</a>
													<!-- <a class="link" href="http://www.revista192.com/print/suscripciones/" target="_blank"> -->
														<h3 class="ttl">Primavera - Verano 2018<h3/>
													<p class="extracto">Historia completa en nuestra edición impresa.</p>
												</div>
										<?php else: ?>

											<?php if(isset($id_y_ancho_arr['ancho']) && $img_src = $cltvo_post->getHomeFeatImgSrc($id_y_ancho_arr['ancho']) ):?>
												<div class="visual">
													<a href="<?php echo $cltvo_post->permalink; ?>">
														<img class="imagen imgtag" src="<?php echo $img_src; ?>">
														<span class="imagen" style="background-image: url(<?php echo $img_src; ?>)" ></span>
													</a>
												</div>
											<?php endif;?>

											<div class="textual">

												<?php if( isset($cltvo_post->terms->category) ):?>

												<h2 class="categoria">
													<?php
													if( isset($cltvo_post->terms->category[0]->name) )
													{
														echo $cltvo_post->terms->category[0]->name;
													}elseif( isset($cltvo_post->post->post_type) )
													{
														echo ucfirst( get_post_type_object($cltvo_post->post->post_type)->rewrite['slug'] );
													}
													?>
												</h2>
												<?php endif;?>

												<h3 class="ttl">
													<a href="<?php echo $cltvo_post->permalink; ?>" class="link">
														<?php //echo $cltvo_post->titulo_reducido;?>
														<?php echo $cltvo_post->post->post_title;?>
													</a>
												</h3>
												<p class="extracto"><?php echo $cltvo_post->extracto_home;?></p>
											</div>
										<?php endif; ?>
									</div>
								</div>
							<?php endif;?>
						<?php endforeach;?>
					</div>
				</div>
			</section>

			<?php if(!empty($plantilla->contacto)):?>

			<section class="cta">

				<h1 class="followus">
					<a class="followus" href="<?php echo BLOGURL;?>/category/friends-family/" target="_blank">Friends & Family</a>
				</h1>

			</section>

			<?php endif;?>

			<?php if(!empty($plantilla->friends_family_posts)):?>

				<?php foreach ($plantilla->friends_family_posts as $post): ?>

						<?php $cltvo_post = new Cltvo_Post($post); ?>
						<?php include 'inc/medias/friends-family-single.php'; ?>

				<?php endforeach;?>

			<?php endif;?>

			<?php if($plantilla->friends_family_has_page_2):?>

				<div class="moda">

					<div class="text-center">

						<a class="ver-mas" href="<?php echo BLOGURL;?>/category/friends-family/page/2/">Leer más...</a>

					</div>

				</div>

			<?php endif;?>

			<?php include 'inc/general/footer.php' ?>

		</div><!-- main-background -->
	</div><!-- bg-gradient -->
</div><!-- home -->

<?php get_footer(); ?>
