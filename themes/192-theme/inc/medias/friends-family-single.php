<article class="">

<div class="friends-family">
      <div class="text-container">
         <h2 class="ttl"><?php echo $cltvo_post->post->post_title ?></h2>
         <p class="ano"><?php echo $cltvo_post->date_formatted ?></p>
      </div>

      <div class="main-container--large">
         <div class="container">
            <div class="content">
               <div class="row">
                  <div class="col-xs-12">
                     <div class="container">
                         <?php if( isset($cltvo_post->thumbail_img) && !empty($cltvo_post->thumbail_img) && !has_post_format('video', $cltvo_post->ID)):?>
                         <img src="<?php echo $cltvo_post->thumbail_img->getImgSrc(''); ?>" alt="<?php echo $cltvo_post->thumbail_img->alt; ?>" class="imagen">
                        <?php endif;?>
                     </div>
                  </div><!-- /.col-xs-12 -->
               </div><!-- /.row -->
            </div><!-- /.content -->
         </div><!-- /.container -->
      </div><!-- /.imagen-container -->
   </div>

   <div class="friends-family main-container container">
      <div class="text-container">
         <div class="p">
            <?php echo $cltvo_post->content; ?>
         </div>
      </div>
   </div>
   <?php if(!is_home()):?>
      <?php include get_stylesheet_directory() . '/inc/general/share.php';?>
      <div class="divisor"></div>
   <?php else:?>
      <br><br><br>
   <?php endif;?>
</article>
