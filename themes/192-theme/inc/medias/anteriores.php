<div class="container">
	<div class="container">
		<div class="row">
		<?php if(is_date()):?>
			<h1 class="anterior__main-ttl"><?php echo $plantilla->month_str." ".$plantilla->query->query_vars['year'];?></h1>
		<?php elseif(is_tag()):?>
			<h1 class="anterior__main-ttl"><?php echo $plantilla->query->query_vars['tag'];?></h1>
		<?php else:?>
			<h2 class="anterior__main-ttl">Ediciones anteriores</h2>
		<?php endif;?>
		<?php foreach($plantilla->posts as $cltvo_post) :?>
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
				<article class="anterior">
					<div class="anterior__main-container">
						<p class="fecha"><?php echo $cltvo_post->date_formatted?></p>
						<div class="anterior__ttl">
							<a class="anterior__link" href="<?php echo $cltvo_post->permalink;?>">
								<?php echo $cltvo_post->titulo_reducido?>
							</a>
						</div>
						<div class="well">
							<div class="img-logo-container">
								<span class="logo">192</span>
								<?php if( isset($cltvo_post->feat_img->vertical) ): ?>
								<a href="<?php echo $cltvo_post->permalink;?>">
									<img src="<?php echo $cltvo_post->feat_img->vertical->getImgSrc('responsive_thumbnail');?>" alt="<?php echo $cltvo_post->feat_img->vertical->alt?>" class="imagen">
								</a>
								<?php endif;?>
							</div>
							<p class="descripcion"><?php echo $cltvo_post->subtitulo?></p>
						</div>
					</div>
				</article>
			</div>
		<?php endforeach; ?>
		</div>
	</div>
	<div class="row">
		<div class="container">
			<div class="divisor col-xs-12"></div>
			<select class="anterior__select anterior__select_JS">
				<option value="" selected disabled>Ver por fechas</option>
				<?php foreach ($plantilla->fechas_links as $year => $months): ?>
					<?php foreach($months as $month):?>
					<option value='<?php echo "$year/$month?cat=$plantilla->category_slug";?>'><?php echo date("F Y", strtotime("$year-$month"));?></option>
					<?php endforeach;?>
				<?php endforeach;?>
			</select>
		</div>
	</div>

</div>
