<?php
getvar_check_or_die('cat');
get_header();
?>
<?php $plantilla = new R192_Date_Controller($_GET['cat'], $wp_query); ?>
<?php $cltvo_post = $plantilla->feat_post ? $plantilla->feat_post : new Cltvo_Post; ?>

<div class="<?php echo $plantilla->category_slug?> single">
	<div class="body-gradient">
		<div class="main-background">
			<?php include get_stylesheet_directory() .'/inc/general/header.php' ?>
			<?php //include 'inc/medias/encabezado-'.$plantilla->category_slug.'.php'; ?>
			<?php include 'inc/medias/anteriores.php'; ?>
			<?php include 'inc/general/footer.php'; ?>
		</div><!-- main-background -->
	</div><!-- bg-gradient -->
</div><!-- <?php echo $plantilla->category_slug?> -->

<?php get_footer(); ?>
