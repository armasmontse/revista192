<?php if( isset($cltvo_post->terms->post_tag) && !empty($cltvo_post->terms->post_tag)):?>
	<div class="tags">
		<span class="navegacion">Navegación:</span>
		<?php foreach ($cltvo_post->terms->post_tag as $tag): ?>
			<a href="<?php echo get_term_link($tag);?>" class="tag"><?php echo $tag->name?></a>
		<?php endforeach;?>
	</div>
<?php endif;?>
