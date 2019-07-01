<?php

class Cltvo_Post extends Cltvo_PostType_Master
{
    public $credito;
    public $subtitulo;
    public $extracto;
    public $extracto_home;
    public $titulo_reducido;
    public $pixel;

    public $feat_img;
    public $date_formatted;
    public $content;

    public function __construct($post_obj = false)
    {
        parent::__construct($post_obj);
        $this->translateParent([
           'post_title',
           'post_content'
        ]);
        $this->setDate();
        $this->setContent();
        $this->setFeatImg();
    }

    private function setFeatImg(){
      $this->feat_img = new stdClass();
      $this->feat_img->vertical = $this->thumbail_img;
      $ImgMetaValue = R192_ImgDestacadaH_MetaBox::getMetaValue($this->post);
      $this->feat_img->horizontal = !empty( $ImgMetaValue ) ? new Cltvo_Img( $ImgMetaValue ) : NULL;
    }

    public function getHomeFeatImgSrc($ancho){
      if($ancho == 1){
        return isset($this->feat_img->vertical->src) ? $this->feat_img->vertical->src : NULL;
      }else{
        return isset($this->feat_img->horizontal->src) ? $this->feat_img->horizontal->src : NULL;
      }
    }

    private function setDate(){
      $this->date_formatted = date( 'dm', strtotime($this->post->post_date) );
    }

    private function setContent(){
      $content = do_shortcode($this->post->post_content);
      $content = do_shortcode($content);
      $content = wpautop($content);

      $content = preg_replace( '~\\s?<p>(\\s|&nbsp;)+</p>\\s?~', "", $content );
      $content = preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
      $content = preg_replace( '/(width|height)="\d*"\s/', "", $content );
      $content = preg_replace( '/(width|height):\s*\d+(px|%);?/', "", $content );
      $content = str_replace('<p><iframe', '<div class="iframe_wrp"><iframe', $content);
      $content = str_replace('</iframe></p>', '</iframe></div>', $content);
      //$content = preg_replace('#(<[a-z ]*)(style=("|\')(.*?)("|\'))([a-z ]*>)#', '\\1\\6', $content);
      $this->content = $content;
    }

    public function setMetas()
    {
      $this->credito = wpautop(R192_Credit_MetaBox::getMetaValue($this->post));
      $this->subtitulo = R192_Subtitulo_MetaBox::getMetaValue($this->post);
      $this->extracto = wpautop(R192_ExtractoInterior_MetaBox::getMetaValue($this->post));
      $this->extracto_home  = R192_ExtractoHome_MetaBox::getMetaValue($this->post);
      $this->titulo_reducido = R192_TituloReducido_MetaBox::getMetaValue($this->post);
      $this->pixel = R192_Track_Pixel_MetaBox::getMetaValue($this->post);

      if( empty($this->titulo_reducido) )
      {
        $this->titulo_reducido = $this->post->post_title;
      }

    }
}
