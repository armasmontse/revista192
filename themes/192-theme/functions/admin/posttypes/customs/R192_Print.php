<?php

class R192_Print extends Cltvo_PostTypeCustom_Master
{

      const nombre_plural = 'Print';
      const nombre_singular = 'Print';
      const slug = 'print';
      const hierarchical = true;
      protected static $supports = array( 'title', 'editor', 'page-attributes', 'thumbnail', 'excerpt');

      public $children;
      public $fecha;
      public $gallery = [];

      public function __construct($post_obj)
      {
         parent::__construct($post_obj);
         $this->translateParent
         ([
            'post_title',
            'post_content'
         ]);
         if( $this->post->post_parent == 0 )
         {
            $this->setChildren();
         }
         $this->setGallery();
      }

      private function setGallery()
      {
         $gallery = R192_Gallery_MetaBox::getMetaValue( $this->post );
         if( empty($gallery) ){
            return NULL;
         }

         foreach ($gallery as $img_id) {
            $this->gallery[] = new Cltvo_Img($img_id);
         }
      }

      /*
      ** Toma la última publicación destacada de print y la setea
      */
      private function setLastFeaturedPost(){
         $args =
         [
            'posts_per_page'  => 1,
            'post_type'       => get_called_class(),
            'post_status'     => 'publish',
            'meta_key'        => 'R192_PublicacionDestacada_MetaBox'
         ];
         $post = get_posts($args);
         $post = ( is_array($post) && !empty($post) ) ? reset($post): NULL;
      }
      /*
      ** Crea una nueva instacia autoreferenciada para los posts hijos del propio objeto
      */
      public function setChildren()
      {
         if(!$this->post)
            return NULL;

         $args =
         [
            'posts_per_page'  => -1,
            'post_type'       => get_called_class(),
            'post_status'     => 'publish',
            'post_parent'     => $this->ID
         ];
         $children = get_posts($args);
         foreach ($children as $child) {
            $this->children[] = new R192_Print($child);
         }
      }

      public function setMetas()
      {

      }
}
