<?php

class R192_Subtitulo_MetaBox extends Cltvo_Metabox_Master
{

 /**
  * sobre escribiendo los args del master
  */
  protected $description_metabox = "Subtítulo";
	protected $post_type = array("post"); // postypes
  protected $position = "side"; // posicion

	/**
	 * Es la funcion que muestra el contenido del metabox
	 * @param object $object en principio es un objeto de WP_post
	 */
	public function CltvoDisplayMetabox( $object ){
  ?>
    <label><p>Texto muy breve que se muestra debajo del título en el interior de la publicación y en la parte inferior de las ediciones anteriores.</p></label>
    <textarea class="i18n-multilingual" style="width:100%" name="<?php echo $this->meta_key;?>" ><?php echo $this->meta_value; ?></textarea>
  <?php
	}
}
