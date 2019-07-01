<?php

class R192_ImgDestacadaH_MetaBox extends Cltvo_Metabox_Master
{

    /**
     * sobre escribiendo los args del master
     */
    protected $description_metabox = "Imagen Destacada Horizontal";
    protected $position = "side"; // posicion
	  protected $post_type = array("post"); // postypes

	/**
	 * Es la funcion que muestra el contenido del metabox
	 * @param object $object en principio es un objeto de WP_post
	 */
	public function CltvoDisplayMetabox( $object ){
?>
    <div class="<?php echo get_called_class().'_JS';?>">
      <p><a href="#" class="r192_agregar_img_JS" meta_key="<?php echo $this->meta_key;?>">
        <?php if( empty( $this->meta_value )):?>
          Añadir imagen destacada horizontal
        <?php else:?>
          Cambiar imagen destacada horizontal
        <?php endif;?>
      </a></p>
      <p><em>Usada en Home para mostrar la imagen al doble de ancho</em></p>
      <div class="r192_imgdestacadah-JS">
          <?php
            if( !empty( $this->meta_value )){
              $img = new Cltvo_Img($this->meta_value);
              static::CltvoDisplayEachImage($img, $this->meta_key);
            }
          ?>
      </div>
    </div>

  <?php
  }

  static function CltvoDisplayEachImage($cltvo_img, $meta_key){
    // $meta_key = get_called_class();
    // borrar parámetros.
    $meta_value = isset($_GET['post']) ? static::getMetaValue(get_post($_GET['post'])) : NULL;
  ?>

    <div class="div_img div_img_JS" img-id="<?php echo $cltvo_img->img_id; ?>" id="img_<?php echo $cltvo_img->img_id; ?>">
      <img class="ancho_100" src="<?php echo $cltvo_img->getImgSrc('large')?>">
      <input type="hidden" name="<?php echo $meta_key;?>" value="<?php echo $cltvo_img->img_id ?>">

      <p><a href="#" class="borrar-img borrar-img_JS" imgbor="img_<?php echo $cltvo_img->img_id; ?>">Borrar</a></p>
    </div>
  <?php
  }

  /**
   * Guarda el valor del metabox
   */
  public function CltvoSaveMetaValue(){

    add_action( 'save_post', function($id){

      if( $this->CltvoValidateBeforeSave($id) ) {
        if( !isset( $_POST[ get_called_class() ] ) && get_post_meta($id, get_called_class() ) )
          delete_post_meta( $id, get_called_class() );
        elseif( isset( $_POST[ get_called_class() ] ) )
          update_post_meta( $id, get_called_class() , $_POST[ get_called_class() ] );
      }

    });
  }

  /**
   * Hace las validaciones necesarias antes de efectivamente guarda los meta datos.
   */
  public function CltvoValidateBeforeSave($id){
    if( !current_user_can('edit_post', $id) ) return false;
    if( defined('DOING_AUTOSAVE') AND DOING_AUTOSAVE ) return false;
    if( wp_is_post_revision($id) OR wp_is_post_autosave($id) ) return false;

    return true;
  }
}
