<?php

class R192_ExtractoInterior_MetaBox extends Cltvo_Metabox_Master
{

 /**
  * sobre escribiendo los args del master
  */
  protected $description_metabox = "Extracto";
	protected $post_type = array("post"); // postypes

	/**
	 * Es la funcion que muestra el contenido del metabox
	 * @param object $object en principio es un objeto de WP_post
	 */
	public function CltvoDisplayMetabox( $object ){

    $args = array(
      'media_buttons' => false,
      'teeny' => true,
      'textarea_rows' => 5
    );
    echo "<p>Extracto corto que se muestra en la página de la categoría (leer más)</p>";
    wp_editor( $this->meta_value, $this->meta_key, $args );

	}
}
