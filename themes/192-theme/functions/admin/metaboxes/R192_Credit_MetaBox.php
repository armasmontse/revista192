<?php

class R192_Credit_MetaBox extends Cltvo_Metabox_Master
{

 /**
  * sobre escribiendo los args del master
  */
  protected $description_metabox = "Créditos";
	protected $post_type = array("post"); // postypes
	protected $position = "side"; // posicion

	/**
	 * Es la funcion que muestra el contenido del metabox
	 * @param object $object en principio es un objeto de WP_post
	 */
	public function CltvoDisplayMetabox( $object ){
  ?>
    <label><p>Colaboradores de esta publicación</p></label>
    <textarea class="i18n-multilingual" style="width:100%" name="<?php echo $this->meta_key;?>" ><?php echo $this->meta_value; ?></textarea>
  <?php
	}
}
