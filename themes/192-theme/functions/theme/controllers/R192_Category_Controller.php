<?php
class R192_Category_Controller extends R192_Feat_and_Archive_Controller
{
   public $query;

   public function __construct($wp_query)
   {
      $this->query = $wp_query;
      $this->category_slug = $this->query->queried_object->slug;
      $this->setFeatPost();
      $this->setPosts();
      $this->setFechasLinks($this->category_slug);
      $this->setContacto();
   }

   /**
    * Toma el post con la mayor posición en Home
    * que tenga la categoría del template
    */
   protected function setFeatPost()
   {
      global $post;
      $this->feat_post = NULL;
      $feat_posts = R192_PublicacionDestacada_MetaBox::Get_Home_Posts();

      foreach ( $feat_posts as $key => $id_y_ancho_arr)
      {
         if( is_array($id_y_ancho_arr) && !empty($id_y_ancho_arr))
         {
            $cltvo_post = new Cltvo_Post( get_post( $id_y_ancho_arr['id'] ));

            if(   ($cltvo_post)
            && isset($cltvo_post->terms->category)
            && is_array($cltvo_post->terms->category)
            && !empty($cltvo_post->terms->category)
            && reset($cltvo_post->terms->category)->slug == $this->category_slug
            )
            {
               return $this->feat_post = $cltvo_post;
            }
         }
      }
      if( isset($post) )
      {
          return $this->feat_post = new Cltvo_Post($post);
      }
      return NULL;
   }

   /**
	 * Usa el query del template para convertir los objetos de WP en lo de CLTVO
	 */
   protected function setPosts()
   {
      $i = 1;
      if($this->query->post_count > 1){
         foreach ($this->query->posts as $post)
         {
            if($post->ID != $this->feat_post->ID)
            {
               $this->posts[] = new Cltvo_Post( $post );
               $i++;
            }

            if($i>$this->posts_per_page)
               break;
         }
      }else{
         $this->posts[0] = new Cltvo_Post( $this->query->post );
      }
   }
}
