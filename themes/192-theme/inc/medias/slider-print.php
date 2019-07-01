<?php if( !empty($plantilla->second_featured) && isset($plantilla->second_featured->gallery) && !empty($plantilla->second_featured->gallery)):?>

<!-- Slider main container -->
<div class="swiper-container slider">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper slider__wrapper">
        <!-- Slides -->
        <?php foreach ($plantilla->second_featured->gallery as $cltvo_img):?>
        <div class="swiper-slide slider__slide"><img src="<?php echo $cltvo_img->src; ?>" alt="" class="slider__image"></div>
        <?php endforeach;?>
    </div>
    <!--
    <div class="swiper-pagination slider__pagination"></div>

    <div class="swiper-button-prev slider__nav--prev"></div>

    <div class="swiper-scrollbar slider__scrollbar"></div>
 If we need scrollbar -->
</div>
<p class="slider__nav--next">next</p>

<?php endif;?>
