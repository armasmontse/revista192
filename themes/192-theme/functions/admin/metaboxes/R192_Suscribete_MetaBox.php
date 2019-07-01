<?php

class R192_Suscribete_MetaBox extends Cltvo_Metabox_Master
{

 /**
  * sobre escribiendo los args del master
  */
   protected $description_metabox = "Suscríbete";
	protected $post_type = array("page"); // postypes

   /**
   * Datos a ingresar
   * $key en el que se guardará la info.
   * => $value es el texto a mostrar como título del input
   */
   protected static $campos = [
      'texto' => 'Texto:',
      'boton' => 'Código de botón de PayPal:',
   ];

   protected static $cuantos = 2;

   /**
     * define el metodo donde se mostrara el meta...
     * Sólo se debe mostrar en la página de Suscríbete
     * @return boolean si es verdadero el meta sera desplegado en el admin en caso constrario no
     */
    public static function metaboxDisplayRule(){
      return isSpecialPage("suscribete");
    }


	/**
	 * Es la funcion que muestra el contenido del metabox
	 * @param object $object en principio es un objeto de WP_post
	 */
	public function CltvoDisplayMetabox( $object ){ ?>
     <?php for ($i=0; $i < 2; $i++): ?>
        <div style="display: inline-block; width:48%; margin-right: 2%">
          <p><label>Texto:</label></p>
          <textarea class="" style="width:100%;" name='<?php echo "$this->meta_key[$i][texto]";?>'><?php echo $this->meta_value[$i]['texto'];?></textarea>
        </div><div style="display: inline-block; width:48%; margin-right: 2%">
          <p><label>Código de botón de PayPal:</label></p>
          <textarea class="" style="width:100%;" name='<?php echo "$this->meta_key[$i][boton]";?>'><?php echo $this->meta_value[$i]['boton'];?></textarea>
       </div>
     <?php endfor; ?>

  <?php
	}
}
