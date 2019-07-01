<?php

class R192_Single_Controller extends R192_Feat_and_Archive_Controller
{

   public function __construct($wp_post)
   {
      $this->feat_post = $wp_post;
      $this->setFeatPost();
      if( $this->setCategorySlug() ){
         $this->setPosts();
         $this->setFechasLinks($this->category_slug);
         $this->setContacto();
      }
      else{
         // Si el post con el fue inicializado no tiene categoría, no sirve.
         return NULL;
      }
   }

   /**
    * Convierte el post del Single en nuestro objeto Cltvo_Post
    */
   protected function setFeatPost()
   {
      $this->feat_post = new Cltvo_Post( $this->feat_post );
   }

   /**
    * Toma el feat_post y usa su categoría para saber en qué categoría estamos
    * y por lo tanto saber que template de single usar
    * @return slug de la categoría
    */
   protected function setCategorySlug()
   {
      if( isset( $this->feat_post->terms->category) && is_array( $this->feat_post->terms->category) && !empty( $this->feat_post->terms->category) )
      {
         return $this->category_slug = reset($this->feat_post->terms->category)->slug;
      }
      else{
         return NULL;
      }
   }

   /**
	 * Usa $this->category_slug para traer otros posts de la misma categoría.
	 */
   protected function setPosts()
   {
      $args = [
         'posts_per_page'  => $this->posts_per_page,
         'post_type'       => 'post',
         'post_status'     => 'publish',
         'post__not_in'    => [$this->feat_post->ID],
         'tax_query' =>
         [
            [
              'taxonomy' => 'category',
              'field'    => 'slug',
              'terms'    => $this->category_slug,
            ],
         ],
      ];
      $posts = get_posts($args);
      foreach ($posts as $post)
      {
         $this->posts[] = new Cltvo_Post( $post );
      }
   }
}
