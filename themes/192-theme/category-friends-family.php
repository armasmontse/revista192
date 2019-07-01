<?php get_header(); ?>
<?php
//$cltvo_post = new Cltvo_Post;
//dd( $cltvo_post );
?>

<div id="infinite-scroll" class="friends-family">
	<div class="body-gradient">
		<div class="main-background">
         <?php include get_stylesheet_directory() .'/inc/general/header.php' ?>
         <?php include 'inc/medias/encabezado-friends-family.php'; ?>
         <?php include 'inc/general/footer.php'; ?>
      </div><!-- main-background -->
   </div><!-- body-gradient-->
</div><!-- friends-family -->


<?php get_footer(); ?>
