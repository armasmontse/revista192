<div class="container main-container">
	<div class="row preview">
		<div class="container">
			<h2 class="ttl interview__ttl"><?php echo $cltvo_post->post->post_title; ?></h2>
			<?php include get_stylesheet_directory() . '/inc/general/navegacion.php';?>
			<div class="interview__creditos">
				<?php echo $cltvo_post->credito;?>
			</div>
		</div>
	</div>
</div>

<div class="container main-container">
	<div class="p">
		<div class="ano"><?php echo $cltvo_post->date_formatted; ?></div>
		<?php if(isset($cltvo_post->feat_img) && isset($cltvo_post->feat_img->horizontal) && !is_single()):?>
			<img src="<?php echo $cltvo_post->feat_img->horizontal->getImgSrc('large'); ?>" alt="<?php echo $cltvo_post->feat_img->horizontal->alt; ?>">
		<?php endif; ?>
	</div>
</div>

<div class="container main-container">
	<div class="p">
		<?php echo $cltvo_post->extracto; ?>
		<?php if (is_single()): ?>
			<?php echo $cltvo_post->content; ?>
		<?php endif ?>
	</div>
</div>

<?php if (! is_single() ) : ?>
	<div class="row ver-mas-container">
		<div class="text-center">
			<a href="<?php echo $cltvo_post->permalink;?>" class="ver-mas">Ver más...</a>
		</div>
	</div>
<?php endif ?>

<?php include get_stylesheet_directory() . '/inc/general/share.php'; ?>

<div class="divisor"></div>
