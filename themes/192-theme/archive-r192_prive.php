<?php
if (!is_user_logged_in()) {
	wp_redirect(BLOGURL.'/login');
	exit;
}

$plantilla = new R192_Prive_Controller;
get_header();
?>

<div class="prive">
	<div class="body-gradient">
		<div class="main-background">
			<?php //include get_template_directory() .'/inc/general/prive-login.php' ?>
			<?php include get_template_directory() .'/inc/general/header-prive.php' ?>

			<section class="content">
				<div class="container">
					<div class="container">

						<?php query_posts('post_type=r192_prive&showposts=-1'); ?>
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php $prive_post = new R192_Prive; ?>

							<div class="row clearfix">

								<div class="head">
									<a class="ttl" href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
									</a>
									<div class="creditos">
										<p class="rol"><?php echo $prive_post->detalles['rol']; ?></p>
										<strong class="nombre"><?php echo $prive_post->detalles['autor']; ?></strong>
									</div>
								</div>

								<div class="elementos">
									<div class="ano">
										<?php $prive_post->getDate(); ?>
									</div>

									<?php foreach ($prive_post->getInitGalleries() as $item) : ?>
										<div class="<?php echo $item['aspect_class']; ?> elemento">
											<div class="articulo">
												<div class="visual">
													<a href="<?php the_permalink(); ?>">
														<img class="imagen imgtag" src="<?php echo $item['imagen']->getImgSrc('large'); ?>">
														<span class="imagen" style="background-image: url(<?php echo $item['imagen']->getImgSrc('large'); ?>)"></span>
													</a>
												</div>
												<div class="textual">
													<p class="serial"><?php echo $item['imagen_serial']; ?> &mdash;</p>
													<p class="edicion">Edici&oacute;n limitada a <?php echo $item['edicion']; ?> impresiones</p>
												</div>
											</div>
										</div>
									<?php endforeach; ?>

								</div>

							</div>

						<?php endwhile; endif; ?>
						<?php wp_reset_query(); ?>

					</div>
				</div>
			</section>

			<?php include get_template_directory() .'/inc/general/footer.php' ?>

		</div>
	</div>
</div>
<?php get_footer(); // themeInc('/inc/users/register.php'); ?>
