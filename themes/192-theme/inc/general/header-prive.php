
	<header class="header-container container">
		<div class="header not-home">
			
			<div class="menuLang">
				<?php //wp_nav_menu( array('menu'=>'lang-switch')); ?>
				<li class="lang-item active"><a class="lang-link">ESP</a></li>
				<li class="lang-item"><a class="lang-link">ENG</a></li>
			</div>
	
			<div class="logo-container">
				<a href="<?php bloginfo('url'); ?>">
					<img src="<?php bloginfo('template_url'); ?>/images/logo-negro.png" alt="192" class="logo">
				</a>
			</div>
	
			<?php include get_template_directory() . '/inc/menus/menuMain.php'; ?>
				
		</div>
	</header>
