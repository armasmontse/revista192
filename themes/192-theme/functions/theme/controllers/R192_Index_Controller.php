<?php

class R192_Index_Controller extends R192_Page_Controller
{
   public $friends_family_posts;
   public $friends_family_has_page_2 = false;

   public function __construct()
   {
      $this->setFriendsFamily();
      $this->setContacto();
   }

   /**
	 * Pone valores de Friends and Family
	 */
   private function setFriendsFamily(){
      $args = [
         'posts_per_page' => get_option('posts_per_page')+1,
         'post_type' => 'post',
         'post_status' => 'publish',
         'category_name' => 'friends-family'
      ];
      $posts = get_posts($args);
      //$this->friends_family = (!empty($posts) && is_array($posts)) ? new Cltvo_Post( $posts[0] ) : NULL;

      if(count($posts) >= get_option('posts_per_page')+1){
         $this->friends_family_has_page_2 = true;
      }
      $this->friends_family_posts = $posts;
   }
}
