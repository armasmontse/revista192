<div class="container">
	<div class="menuMain__fixed-positioner">
		<span class="menuMain-icon-sm js-menuMain__icon">MENU</span>
	</div>
</div>
<nav class="menuMain js-menuMain">
	<?php //var_dump( $GLOBALS['cltvo_menu'] ); ?>
	<?php foreach ($GLOBALS['cltvo_menu']['menu_arr'] as $menu_item): ?>
	<a class="link <?php echo is_home() ? 'link-'.$menu_color : ''; ?>" href="<?php echo $menu_item['link']?>"><?php echo $menu_item['name']?></a>
	<?php endforeach;?>
</nav>
