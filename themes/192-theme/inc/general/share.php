<?php if(is_singular()):?>
<?php
$twitter = "";
if(isset($plantilla->contacto['twitter']['link'])):
	$twitter = $plantilla->contacto['twitter']['link'];
	$twitter = explode('/', $twitter);
	$twitter = count($twitter)>2 ? $twitter[count($twitter)-1] : "";
endif;
?>
<div class="share">
	<h4 class="share__ttl">Share:</h4>
	<div>
		<a	target="_blank"
			href="http://www.facebook.com/sharer/sharer.php?u=<?php echo $cltvo_post->permalink;?>"
			class="share__social"
		>Facebook</a>
		<?php if (isset($cltvo_post->thumbail_img) && is_a($cltvo_post->thumbail_img, 'Cltvo_Img')): ?>
		<a	target="_blank"
			href="http://pinterest.com/pin/create/button/?media=<?php echo $cltvo_post->thumbail_img->getImgSrc('full'); ?>&url=<?php echo $cltvo_post->permalink; ?>&description=192: <?php echo urlencode($cltvo_post->post->post_title); ?>"
			class="share__social"
		>Pinterest</a>
		<?php endif; ?>
		<a target="_blank"
			href="https://twitter.com/share?url=<?php echo $cltvo_post->permalink; ?>&text=192: <?php echo urlencode($cltvo_post->post->post_title); ?>&via=<?php echo $twitter; ?>"
			class="share__social"
		>Twitter</a>
	</div>
</div>
<?php endif;?>
