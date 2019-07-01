<?php get_header(); ?>
<div id="infinite-scroll" class="friends-family">
	<div class="body-gradient">
		<div class="main-background">
			<?php include get_stylesheet_directory() .'/inc/general/header.php' ?>


<!-- Imagen Large -->
			<article class="friends-family container main-container">
				<div class="text-container">
					<h2 class="ttl">Friends & Family</h2>
					<p class="ano">0515</p>
				</div>
				<div class="imagen-container">
					<img src="<?php echoImg('imagen-family.jpg'); ?>" alt="" class="imagen">
					<img src="<?php echoImg('imagen-family.jpg'); ?>" alt="" class="imagen">
				</div>
				<div class="text-container">
					<div class="p">
						<p>Kyo, aunque suena a cliché, sí es una experiencia. Desde que entras, te emociona, quieres descubrir qué hay detrás de la pesada cortina y lo que encuentras es una barra para 13 personas.</p>
						<p>Al sentarte, el tiempo no se percibe, es darte un encerrón y abrirle el paladar a los platillos (en tiempos) preparados al momento por el chef. Esto es mejor conocido como Omakase, y aquí sólo hay para escoger entre el uno y el dos. Omakase en japonés se traduce como “encomendar”. Y sí , se trata de ponerte a la disposición de la creatividad del chef con la pesca del día y, sobretodo, con sus conocimientos.</p>
						<p> Si hay algo que me gusta del Omakase es la curiosidad que trae consigo. Por lo general a simple vista no sabes exactamente qué te estás llevando a la boca. Y eso hace que los comensales invariablemente tengamos que adivinar de qué se trata y hablar de ello. Es un divertido juego en donde siempre va a haber un ingrediente que el de al lado no va a percibir y viceversa.</p>
						<p>Es obligado acompañarlo de una botella de sake y cerveza nipona. También es obligado considerar que la cuenta será igual de exquisita que lo que te acabas de comer, pero sin duda cada bocado lo vale.</p>
						<p>     <em>Indispensable reservar al 551- 8027. Havre 77, Juárez.</em>
						</p><p><em>Horarios:</p></em>
						<p><em>Lunes a Sábado</em></p>
					</div>
				</div>
				<?php include get_stylesheet_directory() . '/inc/general/share.php' ?>
				<div class="divisor"></div>
			</article>

<!-- Imagen Chica -->
			<article class="friends-family container main-container">
				<div class="text-container">
					<h2 class="ttl">Friends & Family</h2>
					<p class="ano">0515</p>
				</div>
				<div class="imagen-container--chico">
					<img src="<?php echoImg('imagen-family.jpg'); ?>" alt="" class="imagen">
					<img src="<?php echoImg('imagen-family.jpg'); ?>" alt="" class="imagen">
				</div>
				<div class="text-container">
					<div class="p">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto, consectetur minus doloribus nemo. Animi eligendi, ipsam voluptatem molestias id, harum sed odit. Ipsum, minima, assumenda.</p>
					</div>
				</div>
				<?php include get_stylesheet_directory() . '/inc/general/share.php' ?>
				<div class="divisor"></div>
			</article>
<!-- Imagen Chica y 2 medias -->
<!--
			<article class="friends-family">
				<div class="text-container">
					<h2 class="ttl">Friends & Family</h2>
					<p class="ano">0515</p>
				</div>

				<div class="imagen-container--chico">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<img src="<?php echoImg('imagen-family.jpg'); ?>" alt="" class="imagen">
							</div>
							<div class="col-xs-6">
								<img src="<?php echoImg('imagen-family.jpg'); ?>" alt="" class="imagen">
							</div>
							<div class="col-xs-6">
								<img src="<?php echoImg('imagen-family.jpg'); ?>" alt="" class="imagen">
							</div>
						</div>
					</div>
				</div>

				<div class="text-container">
					<p class="p">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto, consectetur minus doloribus nemo. Animi eligendi, ipsam voluptatem molestias id, harum sed odit. Ipsum, minima, assumenda.</p>
				</div>
				<div>to do módulo share</div>
				<div class="divisor"></div>
			</article>

<!-- Imagen Contenedor Grande y 4 medias -->
			<article class="">
				<div class="friends-family">
					<div class="text-container">
						<h2 class="ttl">Friends & Family</h2>
						<p class="ano">0515</p>
					</div>

					<div class="imagen-container--large">
						<img src="<?php echoImg('imagen-family-large.png'); ?>" alt="" class="imagen">
					</div>
				</div>

				<div class="friends-family main-container container">
					<div class="text-container">
						<div class="p">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto, consectetur minus doloribus nemo. Animi eligendi, ipsam voluptatem molestias id, harum sed odit. Ipsum, minima, assumenda.</p>
						</div>
					</div>
				</div>

				<?php include get_stylesheet_directory() . '/inc/general/share.php' ?>
				<div class="divisor"></div>
			</article>

			<?php include 'inc/general/footer.php' ?>
		</div><!-- main-background -->
	</div><!-- bg-gradient -->
</div><!-- home -->

<?php get_footer(); ?>
