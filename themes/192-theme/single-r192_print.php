<?php get_header(); ?>
<?php $plantilla = new R192_Print_Controller;?>
<?php // cltvo_print_r($plantilla->featured); ?>
<div class="print">
	<div class="body-gradient">
		<div class="main-background">
			<?php include get_stylesheet_directory() .'/inc/general/header.php' ?>

<!-- Imagen Large -->
			<section class="sm-container">
				<div class="imagen-container revista">
					<div class="imagen revista">
						<?php $cltvo_ft_post = new Cltvo_Post( $plantilla->featured->post );?>
						<?php if(isset($cltvo_ft_post->thumbail_img->src)):?>
							<img src="<?php echo $cltvo_ft_post->thumbail_img->src ?>" alt="" class="imagen revista">
						<?php endif;?>
						<div class="imagen-overlay">

							<?php
								$class = 'centerXY blanco';
								include get_stylesheet_directory() .'/inc/general/suscribete.php';
								unset($class);
							?>
						</div>
					</div>
				</div>
				<div class="divisor"></div>
				<div class="text-container">
					<h2 class="ttl"><?php echo $plantilla->featured->post->post_title;?></h2>
					<h2 class="ano revista">20<?php echo substr($plantilla->fecha, -2);?></h2>
				</div>
				<div class="text-container text-center">
					<div class="p main">
                  <?php echo wpautop($plantilla->featured->post->post_excerpt);?>
					</div>
				</div>


				<div class="container main-container">
					<div class="row">
						<div class="col-xs-12 mb">
                     <div class="container p">
                        <?php echo wpautop( do_shortcode($plantilla->featured->post->post_content) );?>
                     </div>
						</div>
					</div>
				</div>

				<p class="ano"><?php echo $plantilla->fecha?></p>

				<div class="imagen-container">
					<?php include get_stylesheet_directory() . '/inc/medias/slider-print.php'; ?>
				</div>

				<div class="text-container text-center">
					<h2 class="ttl"><?php if(!empty($plantilla->second_featured)) echo $plantilla->second_featured->post->post_title;?></h2>
					<div class="p main">
						<?php if(!empty($plantilla->second_featured)) echo wpautop($plantilla->second_featured->post->post_content);?>
					</div>
				</div>
			</section>

			<section class="content">
				<div class="container">
					<div class="row clearfix">
						<?php if( isset($plantilla->featured->children) && !empty($plantilla->featured->children) && is_array($plantilla->featured->children) ):?>
						<?php foreach ($plantilla->featured->children as $child):?>
							<?php //cltvo_print_r($child);die;?>
							<div class="col-md-3 col-sm-6 col-xs-12">
								<div class="articulo">

									<div class="visual">
										<a href="<?php echo $child->permalink; ?>">
											<img class="imagen imgtag" src="<?php echo $child->thumbail_img->src; ?>">
											<span class="imagen" style="background-image: url(<?php echo $child->thumbail_img->src; ?>)" ></span>
										</a>
									</div>

									<div class="textual">
										<h2 class="categoria">
											<?php echo R192_Seccion_Print_MetaBox::getMetaValue($child);?>
										</h2>
										<h3 class="ttl--print-preview">
											<a href="<?php echo $child->permalink; ?>" class="link">
												<?php echo $child->post->post_title;?>
											</a>
										</h3>
										<!-- <p class="extracto"><?php echo $cltvo_post->extracto_home;?></p> -->
									</div>
								</div>
							</div>

						<?php endforeach;?>
						<?php endif;?>
					</div>
				</div>
			</section>
<!-- SUSCRIBETE -->
			<section>
				<?php include get_stylesheet_directory() .'/inc/general/suscribete.php'; ?>
			</section>
			<section>
				<div class="suscribete">
					<h3 class="ttl"><?php echo $plantilla->puntos_venta->post_title; ?></h3>
					<div class="descripcion">
						<?php echo wpautop($plantilla->puntos_venta->post_content);?>
					</div>
				</div>
			</section>

			<?php include 'inc/general/footer.php' ?>
		</div><!-- main-background -->
	</div><!-- bg-gradient -->
</div><!-- home -->

<?php get_footer(); ?>
