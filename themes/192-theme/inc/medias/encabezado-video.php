
<div class="container main-container">
	<div class="row preview">
		<div class="container">
			<?php if( is_single() ): ?>
				<h1 class="video__ttl"><?php echo $cltvo_post->post->post_title; ?></h1>
			<?php else:?>
				<h2 class="video__ttl"><?php echo $cltvo_post->post->post_title; ?></h2>
			<?php endif;?>
		</div>
	</div>
</div>
<div class="container main-container">
	<div class="p">
		<div class="ano">
			<?php echo $cltvo_post->date_formatted?>
		</div>
		<?php echo $cltvo_post->extracto;?>
		<?php if(isset( $cltvo_post->feat_img) && isset( $cltvo_post->feat_img->horizontal ) && !is_single()):?>
		<img src="<?php echo $cltvo_post->feat_img->horizontal->getImgSrc('large');?>" alt="<?php echo $cltvo_post->feat_img->horizontal->alt;?>">
		<?php endif;?>
	</div>
</div>
<div class="container main-container">
	<div class="p">
		<?php if ( is_single() ) : ?>
			<?php echo $cltvo_post->content ?>
		<?php endif ?>
		<div class="text-center"><?php echo $cltvo_post->credito;?></div>
        <div class="tags">
            <?php if( isset($cltvo_post->terms->post_tag) && !empty($cltvo_post->terms->post_tag)):?>
                <span class="navegacion">Navegación:</span>
                <?php foreach ($cltvo_post->terms->post_tag as $tag): ?>
                    <a href="<?php echo get_term_link($tag);?>" class="tag"><?php echo $tag->name?></a>
                <?php endforeach;?>
            <?php endif;?>
        </div>
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
