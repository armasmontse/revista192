<?php get_header(); ?>
<?php $plantilla = new R192_Single_Controller($post); ?>
<?php $cltvo_post = $plantilla->feat_post ? $plantilla->feat_post : new Cltvo_Post; ?>
<div class="<?php echo $plantilla->category_slug; if( has_post_format('video',$post->ID)) echo ' video'; ?> single">
	<div class="body-gradient">
		<div class="main-background">
			<?php include get_stylesheet_directory() .'/inc/general/header.php'; ?>
			<?php if (isset($cltvo_post->pixel) && !empty($cltvo_post->pixel)): ?>
				<?php echo str_replace('[timestamp]', bigNumber(), $cltvo_post->pixel); ?>
			<?php endif; ?>
			<?php if (has_post_format('video',$post->ID)): ?>
			<?php include 'inc/medias/encabezado-video.php'; ?>
			<?php else: ?>
			<?php include 'inc/medias/encabezado-'.$plantilla->category_slug.'.php'; ?>
			<?php include 'inc/medias/content-'.$plantilla->category_slug.'.php'; ?>
			<?php endif; ?>
			<?php include 'inc/medias/anteriores.php'; ?>
			<?php include 'inc/general/footer.php'; ?>
		</div><!-- main-background -->
	</div><!-- bg-gradient -->
</div><!-- <?php echo $plantilla->category_slug?> -->

<?php get_footer(); ?>
