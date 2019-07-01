
<?php get_header(); ?>
<div class="print">
	<div class="body-gradient">
		<div class="main-background">
			<?php include get_stylesheet_directory() .'/inc/general/header.php' ?>

<!-- Imagen Large -->
			<section class="sm-container">
				<div class="imagen-container revista">
					<div class="imagen revista">
						<img src="<?php echoImg('imagen-print.gif'); ?>" alt="" class="imagen revista">
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
					<h2 class="ttl">Septiembre</h2>
					<h2 class="ano revista">2015</h2>
				</div>
				<div class="text-container text-center">
					<div class="p main">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto, consectetur minus doloribus nemo. Animi eligendi, ipsam voluptatem molestias id, harum sed odit. Ipsum, minima, assumenda.</p>
					</div>
				</div>


				<div class="container main-container">
					<div class="row">
						<div class="col-sm-6 col-xs-12 mb">
							<div class="p text-justify"><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto, consectetur minus doloribus nemo. Animi eligendi, ipsam voluptatem molestias id, harum sed odit. Ipsum, minima, assumenda.</p></div>
						</div>
						<div class="col-sm-6 col-xs-12">
							<div class="p text-justify">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto, consectetur minus doloribus nemo. Animi eligendi, ipsam voluptatem molestias id, harum sed odit. Ipsum, minima, assumenda.</p>
							</div>
						</div>
					</div>
				</div>

				<p class="ano">0515</p>

				<div class="imagen-container">
					<?php include get_stylesheet_directory() . '/inc/medias/slider-print.php'; ?>
				</div>

				<div class="text-container text-center">
					<h2 class="ttl">Septiembre</h2>
					<div class="p main">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto, consectetur minus doloribus nemo. Animi eligendi, ipsam voluptatem molestias id, harum sed odit. Ipsum, minima, assumenda.</p>
					</div>
				</div>
			</section>

			<section class="secciones main-container">
				<div class="container articulo-container">
					<div class="row">
					<?php for ($i = 0; $i < 6; $i ++) : ?>
						<div class="col-xs-12 col-xs-plus-6 col-sm-minus-4">
							<?php include get_stylesheet_directory() .'/inc/medias/articulo-print.php'; ?>
						</div>
					<?php endfor ?>
					</div>
				</div>
			</section>
<!-- SUSCRIBETE -->
			<section>
				<?php include get_stylesheet_directory() .'/inc/general/suscribete.php'; ?>
			</section>

			<?php include 'inc/general/footer.php' ?>
		</div><!-- main-background -->
	</div><!-- bg-gradient -->
</div><!-- home -->

<?php get_footer(); ?>
