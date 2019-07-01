<?php $class = isset($class) ? $class : '' ?>
<div class="suscribete <?php echo $class?>">
	<h3 class="ttl">Suscríbete</h3>
	<p class="cta"><?php echo $plantilla->suscribete_copy;?></p>
	<div class="buy-form">
		<?php foreach ($plantilla->suscribete as $suscribite_elem ):?>
			<p class="descripcion"><?php echo $suscribite_elem['texto'];?></p>
			<?php echo $suscribite_elem['boton'];?>
		<?php endforeach;?>
	</div>
	<!-- <a href="paypal.com" class="comprar">Comprar</a> -->
</div>
