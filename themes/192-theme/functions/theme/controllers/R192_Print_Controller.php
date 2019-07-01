<?php

class R192_Print_Controller extends R192_Page_Controller
{
   public $suscribete;
   public $suscribete_copy;
   public $featured;
   public $second_featured;
   private $model = 'R192_Print';
   public $puntos_venta;

   public function __construct()
   {
      $this->setLastFeaturedPost();
      $this->setSecondPost();
      $this->setContacto();
      $this->setSuscripcion();
      $this->setFecha();
      $this->setPuntosVenta();
   }

   /*
   **
   */
   protected function setPuntosVenta()
   {
      $this->puntos_venta = get_post( $GLOBALS['special_pages_ids']['puntos-de-venta']);
      $this->puntos_venta = $this->puntos_venta;
   }

   /*
   **
   */
   private function setSecondPost()
   {
      global $post;
      if($post->post_parent == 0 && isset($this->featured->children[0]))
      {
         $this->second_featured = $this->featured->children[0];
         unset( $this->featured->children[0] );
      }
      elseif($post->post_parent != 0 && isset($this->featured->children[0]) )
      {
         $this->second_featured = new R192_Print($post);
         foreach ($this->featured->children as $key => $child)
         {
            if( $child->ID && $post->ID )
            {
               unset( $this->featured->children[$key] );
            }
         }
      }
   }

   /*
   **
   */
   private function setLastFeaturedPost()
   {
      $args =
      [
         'posts_per_page'  => 1,
         'post_type'       => $this->model,
         'post_status'     => 'publish',
         'meta_key'        => 'R192_PublicacionDestacada_MetaBox',
      ];

      $post = get_posts($args);
      $this->featured = ( is_array($post) && !empty($post) ) ? new R192_Print(reset($post)): NULL;
   }

   /**
    * Redirige al permalink del $featured (post)
    * Si no existe, muestra 404
    */
   public function lastFeaturedPostRedirect()
   {
         global $wp_query;

         if( empty($this->featured) )
         {
            $wp_query->set_404();
            status_header( 404 );
            get_template_part( 404 ); exit();
         }else
         {
            $url = $this->featured->permalink;
            header("Location: $url");
            exit;
         }
   }
   /**
    * settea la fecha a 4 caractéres.
    */
   public function setFecha()
   {
      $this->fecha = R192_Fecha_MetaBox::getMetaValue($this->featured->post);
   }

   /**
    * Pone valores de Contacto
    */
   protected function setSuscripcion()
   {
      $this->suscribete = R192_Suscribete_MetaBox::getMetaValue( get_post( $GLOBALS['special_pages_ids']['suscribete']) );
      $this->suscribete_copy = cltvo_translate( get_post( $GLOBALS['special_pages_ids']['suscribete'])->post_content );
   }

}
