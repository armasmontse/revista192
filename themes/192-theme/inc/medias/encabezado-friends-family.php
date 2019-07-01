<?php $page_number = (get_query_var('paged')) ? get_query_var('paged') : 1;  ?>
<div id="friends-family-page-<?php echo $page_number ?>">
	<?php if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
	<?php $cltvo_post = new Cltvo_Post;  ?>
		<?php include 'friends-family-single.php'; ?>
	<?php endwhile;?>
	<h2 class="mas-entradas">
		<span  id="mas-entradas-page-<?php echo $page_number ?>" >
			<?php
			$mas_entradas = __('Más Entradas', TRANSDOMAIN);
			echo get_next_posts_link( $mas_entradas, $wp_query->max_num_pages );
			?>
		</span>
	</h2>
</div>
<?php else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
