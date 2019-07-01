<?php
// No se usa por que Date controller funciona para ambos templates
class R192_Tag_Controller extends R192_Feat_and_Archive_Controller
{
   public $query;

   public function __construct($category_slug, $wp_query)
   {
      $this->category_slug = $category_slug;
      $this->query = $wp_query;
      $this->setFeatPost();
      $this->setPosts();
      $this->setFechasLinks($this->category_slug);
      $this->setContacto();
   }

   /**
    * Convierte el post del Single en nuestro objeto Cltvo_Post
    */
   protected function setFeatPost()
   {
      $this->feat_post = new Cltvo_Post( reset($this->query->posts) );
      //unset($this->query->posts[key($this->query->posts)]);
   }

   /**
	 * Usa $this->category_slug para filtrar los posts de la fecha
	 */
   protected function setPosts()
   {
      if($this->query->post_count > 1){
         foreach ($this->query->posts as $post)
         {
            $cltvo_post = new Cltvo_Post( $post );
            if(
               $cltvo_post->ID != $this->feat_post->ID
               && isset($cltvo_post->terms->category)
               && is_array($cltvo_post->terms->category)
               && reset($cltvo_post->terms->category)->slug == $this->category_slug
            ){
               $this->posts[] = new Cltvo_Post( $post );
            }
         }
      }else{
         $this->posts[0] = new Cltvo_Post( $this->query->post );
      }
   }


}
