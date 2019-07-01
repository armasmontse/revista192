<?php
$plantilla = new R192_Index_Controller;
get_header();
?>
<div id="notfound" class="home">
	<div class="body-gradient">
		<div class="main-background">
			<?php include get_stylesheet_directory() .'/inc/general/header.php' ?>
			
			<!-- CONTENT -->
			<section class="section-content">
				<div class="container">
					
					<h1 class="ttl">Error 404 &mdash; P&aacute;gina no encontrada</h1>
					
				</div>
			</section>


			<?php include 'inc/general/footer.php' ?>
		</div><!-- main-background -->
	</div><!-- bg-gradient -->
</div><!-- home -->

<?php get_footer(); ?>
