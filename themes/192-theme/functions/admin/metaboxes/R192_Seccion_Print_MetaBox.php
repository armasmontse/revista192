<?php

class R192_Seccion_Print_MetaBox extends Cltvo_Metabox_Master
{

 /**
  * sobre escribiendo los args del master
  */
  protected $description_metabox = "Sección";
  protected $post_type = array("R192_Print"); // postypes
  protected $position = "side"; // posicion

	/**
	 * Es la funcion que muestra el contenido del metabox
	 * @param object $object en principio es un objeto de WP_post
	 */
	public function CltvoDisplayMetabox( $object ){
  ?>
    <label><p>Nombre de la sección a la que pertenece este artículo</p></label>
    <input style="width:100%" name="<?php echo $this->meta_key;?>" value="<?php echo $this->meta_value; ?>">
  <?php
	}
}
