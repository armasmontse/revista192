<?php get_header(); ?>

<?php $plantilla = new R192_Category_Controller($wp_query); ?>
<?php $cltvo_post = $plantilla->feat_post ? $plantilla->feat_post : new Cltvo_Post; ?>

<div class="<?php echo $plantilla->category_slug?>">
	<div class="body-gradient">
		<div class="main-background">
         <?php include get_stylesheet_directory() .'/inc/general/header.php' ?>
         <?php include 'inc/medias/encabezado-'.$plantilla->category_slug.'.php'; ?>
         <?php include 'inc/medias/anteriores.php'; ?>
         <?php include 'inc/general/footer.php'; ?>
      </div><!-- main-background -->
   </div><!-- body-gradient-->
</div><!-- <?php echo $plantilla->slug?> -->

<?php get_footer(); ?>
