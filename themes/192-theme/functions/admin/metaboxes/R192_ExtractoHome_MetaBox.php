<?php

class R192_ExtractoHome_MetaBox extends Cltvo_Metabox_Master
{

 /**
  * sobre escribiendo los args del master
  */
  protected $description_metabox = "Extracto Home";
	protected $post_type = array("post", 'R192_Print'/* , 'R192_Prive' */); // postypes

	/**
	 * Es la funcion que muestra el contenido del metabox
	 * @param object $object en principio es un objeto de WP_post
	 */
	public function CltvoDisplayMetabox( $object ){
  ?>
    <label><p>Texto breve que acompaña las publicaciones destacadas en el Home.</p></label>
    <textarea class="i18n-multilingual" style="width:100%" name="<?php echo $this->meta_key;?>" ><?php echo $this->meta_value; ?></textarea>
  <?php
	}
}
