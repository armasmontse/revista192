<!DOCTYPE html>
<html lang="<?php echo substr(get_bloginfo ( 'language' ), 0, 2);?>">
<head>
	<meta charset="UTF-8">
	<meta name="author" content="<?php echo THEMEURL;?>humans.txt">
	<?php
	//generar el favicon usando http://www.favicomatic.com/ y agregar los archivos a images/favicon/
	include_once('inc/favicon.php');
	?>
	<title><?php
		global $page, $paged;

		wp_title( '|', true, 'right' );

		if ( $paged >= 2 || $page >= 2 ) echo ' | ' . sprintf( __( 'Página %s', 'twentyeleven' ), max( $paged, $page ) );
	?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">

	<meta name="google-site-verification" content="BybyMPkEESvr9o6bWRA3uNz9F8VHmt8jV7YDgLxgq5Q" />

	<link href="<?php bloginfo('template_url'); ?>/style.css?clearcache=hggv567yuv" rel="stylesheet" type="text/css" />

	<script async='async' src='https://www.googletagservices.com/tag/js/gpt.js'></script>

	<script>
	  var googletag = googletag || {};
	  googletag.cmd = googletag.cmd || [];
	</script>

	<script>
	  googletag.cmd.push(function() {
		var mappingadunit = googletag.sizeMapping().
		addSize( 	[992, 0], 	[ 	[728, 90]	] 	). //desktop
		addSize( 	[818, 0], 	[ 	[728, 90]	] 	). //tablet
		addSize(	[320, 0], 	[	[320, 50]	]	). //mobile
		// addSize(	[0, 0]	, 	[	[320, 50]	, 	[1, 1]									]	). //other
		build();
	    googletag.defineSlot('/143452919/Test_LR_1MB', [[728, 90], [320, 50]], 'div-gpt-ad-1477335796338-0').defineSizeMapping(mappingadunit).addService(googletag.pubads());
	    googletag.pubads().enableSingleRequest();
	    googletag.pubads().collapseEmptyDivs();
	    googletag.enableServices();
        // .collapseEmptyDivs()
	  });

	</script>

	<!-- <script type="text/javascript" src="//embed.blivenyc.com/speed-app/2/?action=integratedEmbed&width=980&tags=eog-direct,distro,distro-mx,integrated&campaign_id=1628&responsive=1&integrated=1&gk=a0wadu"></script> -->

	<?php wp_head(); ?>
</head>
<body>
	<?php

	/**
	 *CLTVO: poner esto en true sólo en la versiones locales.
	 */

	 // Se agregaron los Analytics vía Google Tag manager plugin
	//if( !defined('CLTVO_ISLOCAL') || ( CLTVO_ISLOCAL != true) ){ include_once('inc/analytics.php'); }

	?>

	<!--[if gt IE 8]><div class="cltvo-browser-check"><p>Consider <a href="http://www.google.com/intl/es/chrome/browser/" target="_blank">updating your browser</a> in order to render this site correctly.</p></div><!-->
<!--<![endif]-->

	<!-- Aquí podría abrir el main-wrap -->
