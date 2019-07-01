<footer class="footer" id="footer">
	<div class="container">

		<div class="row  mb">
			<div class="col-xs-12">
				<p class="copyright">&copy; <?php echo date('Y') ?> Unonuevedos192</p>
			</div>
			<div class="col-xs-12">
				<?php if(!empty($plantilla->contacto)):?>
				<a class="contacto" href="mailto:<?php echo $plantilla->contacto['mail'];?>">
					Contacto
				</a>
				<?php endif;?>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12">
				<div class="clearfix footer__social-container">
					<?php if(!empty($plantilla->contacto)):?>
					<a href="<?php echo $plantilla->contacto['facebook']['link']?>" class="footer__social"><?php echo $plantilla->contacto['facebook']['cuenta'];?></a><span class="delimiter"> | </span>
					<a href="<?php echo $plantilla->contacto['instagram']['link']?>" class="footer__social"><?php echo $plantilla->contacto['instagram']['cuenta'];?></a><span class="delimiter"> | </span>
					<a href="<?php echo $plantilla->contacto['twitter']['link']?>" class="footer__social"><?php echo $plantilla->contacto['twitter']['cuenta'];?></a>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>
</footer>
