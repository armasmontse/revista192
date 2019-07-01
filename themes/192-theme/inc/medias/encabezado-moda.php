<?php //var_dump($cltvo_post);?>
<section class="">
	<div class="container">
		<div class="container">
			<div class="row preview">
				<div class="col-sm-6 col-md-5 col-xs-12">
					<?php if(isset( $cltvo_post->thumbail_img) ):?>
					<img src="<?php echo $cltvo_post->thumbail_img->getImgSrc('full'); ?>" alt="<?php echo $cltvo_post->thumbail_img->alt; ?>" class="imagen single">
					<?php endif;?>
				</div>
				<div class="col-sm-6 col-md-7 col-xs-12">
					<article class="article">
					<?php if( is_single() ): ?>
						<h1 class="moda__ttl"><?php echo $cltvo_post->post->post_title; ?></h1>
					<?php else:?>
						<h2 class="moda__ttl"><?php echo $cltvo_post->post->post_title; ?></h2>
					<?php endif;?>
						<div class="ano"><?php echo $cltvo_post->date_formatted; ?></div>
						<div class="linea-single"></div>
						<div class="creditos">
							<!-- <span class="subttl"><?php echo $cltvo_post->subtitulo;?></span> -->
							<?php echo $cltvo_post->credito;?>
						</div>
						<div class="tags">
							<?php if( isset($cltvo_post->terms->post_tag) && !empty($cltvo_post->terms->post_tag)):?>
							<span class="navegacion">Navegación:</span>
							<?php foreach ($cltvo_post->terms->post_tag as $tag): ?>
								<a href="<?php echo get_term_link($tag); echo "?cat=$plantilla->category_slug";?>" class="tag"><?php echo $tag->name?></a>
							<?php endforeach;?>
							<?php endif;?>
						</div>
					</article>
				</div>
			</div>

			<div class="main-container--large">
				<div class="container reduced-container">
					<div class="extracto">
						<?php echo $cltvo_post->extracto;?>
					</div>
				</div>
			</div>

			<?php if (! is_single() ) : ?>
				<div class="row ver-mas-container">
					<div class="text-center">
						<a href="<?php echo $cltvo_post->permalink;?>" class="ver-mas">Ver más...</a>
					</div>
				</div>

				<?php include get_stylesheet_directory() . '/inc/general/share.php'; ?>

				<div class="divisor"></div>
			<?php endif ?>
		</div><!-- container -->
	</div><!-- container -->
</section>
