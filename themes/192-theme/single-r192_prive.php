<?php
if (!is_user_logged_in()) {
	wp_redirect(BLOGURL.'/login');
	exit;
}


$plantilla = new R192_Prive_Controller;
$prive_post = new R192_Prive;
get_header();
?>

<div class="prive single">
	<div class="body-gradient">
		<div class="main-background">
			<?php include get_template_directory() .'/inc/general/header-prive.php' ?>


			<section class="content">
				<div class="container">

					<div class="head">
						<h2 class="ttl"><?php the_title(); ?></h2>
						<div class="creditos">
							<p class="rol"><?php echo $prive_post->detalles['rol']; ?></p>
							<strong class="nombre"><?php echo $prive_post->detalles['autor']; ?></strong>
							<p class="lugar">&mdash;<br /><?php echo $prive_post->detalles['lugar']; ?></p>
							<a class="back" href="<?php echo BLOGURL; ?>/prive">&larr; back</a>
						</div>
					</div>

					<?php foreach ($prive_post->getInitGalleries() as $item) : ?>

						<div class="images">
							<img class="imagen <?php echo $item['imagen']->proporcion ?>" src="<?php echo $item['imagen']->getImgSrc('large'); ?>">
						</div>

						<div class="row padding-row">
							<div class="col col-md-4 col col-sm-4 col-xs-12">
								<p class="meta"><?php echo $item['imagen_serial']; ?></p>
								<p class="meta">Edición limitada a <?php echo $item['edicion']; ?> impresiones</p>
							</div>
							<div class="col col-md-8 col-sm-8 col-xs-12">
								<div class="col-md-6 col-sm-6 col-xs-12 nopadding">
									<div class="check">
										<input type="radio"
											   class="opcion"
											   value="<?php echo $item['small']; ?>"
											   name="<?php echo $item['imagen_serial']; ?>"
											   id="<?php echo  $item['imagen_serial']; ?>-small">
									</div>
									<label class="label"
										   for="<?php echo $item['imagen_serial']; ?>-small">
									12 x 18 pulgadas <br />
									30.48 x 45.72 centímetros <br />
									<span class="price">$ <?php echo number_format($item['small']); ?></span>
									</label>
								</div>
								<div class="col-md-6 col-sm-6 col-xs-12 nopadding">
									<div class="check">
										<input type="radio"
											   class="opcion"
											   value="<?php echo $item['large']; ?>"
											   name="<?php echo  $item['imagen_serial']; ?>"
											   id="<?php echo  $item['imagen_serial']; ?>-large">
									</div>
									<label class="label"
										   for="<?php echo  $item['imagen_serial']; ?>-large">
									18 x 27 pulgadas <br />
									30.48 x 45.72 centímetros <br />
									<span class="price">$ <?php echo number_format($item['large']); ?></span>
									</label>
								</div>
							</div>
							<div href="#" class="col-md-offset-8 col-md-4 col-sm-12 col-xs-12 comprar"></div>

						</div>

					<?php endforeach; ?>


				</div>
			</section>

			<?php include get_template_directory() .'/inc/general/footer.php' ?>

		</div>
	</div>
</div>


<?php
get_footer();
?>
