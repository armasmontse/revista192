<header class="header-container header-img" style="background-image: url('<?php echo get_header_image();?>')">
	<div class="header">

		<?php
			$logo_color = get_option( 'home_color') ? 'blanco' : 'negro';
			$menu_color = get_option( 'menu_home_color') ? 'blanco' : 'negro';
			include get_stylesheet_directory() . '/inc/general/logo.php';
			include get_stylesheet_directory() . '/inc/menus/menuMain.php';
			//TODO: cambio de color opcional en el menuMain. Sólo blanco y negro.
		?>
	</div>
</header>
