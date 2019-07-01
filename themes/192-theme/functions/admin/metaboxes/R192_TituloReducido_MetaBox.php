<?php

class R192_TituloReducido_MetaBox extends Cltvo_Metabox_Master
{

 /**
  * sobre escribiendo los args del master
  */
  protected $description_metabox = "Título reducido";
	protected $post_type = array("post", 'R192_Print'/* , 'R192_Prive' */); // postypes
	protected $position = "side"; // posicion

	/**
	 * Es la funcion que muestra el contenido del metabox
	 * @param object $object en principio es un objeto de WP_post
	 */
	public function CltvoDisplayMetabox( $object ){
  ?>
    <label><p>Usar en caso de que el título de la publicación sea muy largo y rompa el diseño de las "Ediciones Anteriores".</p></label>
    <input class="i18n-multilingual" style="width:100%" type="text" name="<?php echo $this->meta_key;?>" value="<?php echo $this->meta_value; ?>">
  <?php
	}
}
