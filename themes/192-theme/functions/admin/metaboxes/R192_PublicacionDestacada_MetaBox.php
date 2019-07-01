<?php

class R192_PublicacionDestacada_MetaBox extends Cltvo_Metabox_Master
{

 /**
  * sobre escribiendo los args del master
  */
  protected $description_metabox = "Publicación destacada";
	protected $post_type = array("post", 'R192_Print'/* , 'R192_Prive' */); // postypes
	protected $position = "side"; // posicion
  public static $max_home_posts = 8; //máximo número de posts en home
  public static $home_post_option_prefix = 'home_post_'; //prefijo para el nombre del option

	/**
	 * Es la funcion que muestra el contenido del metabox
	 * @param object $object en principio es un objeto de WP_post
	 */
	public function CltvoDisplayMetabox( $object ){
    $selected = !empty($this->meta_value) ? 'checked' : NULL;

    //Estas variables se usan si el post que se está editando es destacado
    $editing_post_orden = $editing_post_ancho = NULL;
  ?>
    <input type="checkbox" name="<?php echo $this->meta_key;?>" <?php echo $selected;?>> Destacada

    <?php if($selected): //si el post está destacado muetra las demás opciones?>
      <?php foreach (self::Get_Home_Posts() as $key => $id_y_ancho_arr): //se imprimen el título de los posts que se muestran en HOME?>
        <?php
        $ancho = $titulo = '';
        if( is_array($id_y_ancho_arr) ){
          if($id_y_ancho_arr['id'] == $object->ID){
              //Si el post que se está editando es destacado...
              $editing_post_orden = $key;
              $editing_post_ancho = $id_y_ancho_arr['ancho'];
          }
          //valores de ancho y el título del post
          $ancho = $id_y_ancho_arr['ancho'];
          $titulo = get_the_title($id_y_ancho_arr['id']);
        }
        ?>
        <p>
          <?php if(!empty($editing_post_orden)):?><strong><?php endif;?>
            <?php if($ancho):?>
            <?php echo "$key: $titulo.<br>Ancho: x $ancho";?>
          <?php endif;?>
          <?php if(!empty($editing_post_orden)):?></strong><?php endif;?>
        </p>
      <?php endforeach;?>
      <p>
        <label>Orden: </label>
        <input type="text" name="<?php echo self::$home_post_option_prefix;?>orden" value="<?php echo $editing_post_orden?>">
      </p>
      <p>
      <p>Ancho:
        <select name="<?php echo self::$home_post_option_prefix;?>ancho">
          <option <?php if($editing_post_ancho == '1')echo "selected";?> value="1">Sencillo</option>
          <option <?php if($editing_post_ancho == '2')echo "selected";?> value="2">Doble</option>
        </select>
      </p>
    <?php endif;?>
    <!-- <p><em>Las publicaciones destacadas se muestran en home.</em></p> -->
  <?php
	}

  /**
   * Guarda el valor del metabox
   */
  public function CltvoSaveMetaValue(){

    add_action( 'save_post', function($id){

      if( $this->CltvoValidateBeforeSave($id) ) {
        // Si es destacada lo guarda en el meta de la publicación
        if( !isset( $_POST[ get_called_class() ] ) && get_post_meta($id, get_called_class() ) )
          delete_post_meta( $id, get_called_class() );
        elseif( isset( $_POST[ get_called_class() ] ) )
          update_post_meta( $id, get_called_class() , $_POST[ get_called_class() ] );

        if(isset($_POST[self::$home_post_option_prefix.'orden']) && isset($_POST[self::$home_post_option_prefix.'ancho']) ){
          // Si se especifica el orden y el tamaño...

          // el número es el sufijo de la opción
          $orden = $_POST[self::$home_post_option_prefix.'orden'];
          // la opción es un arrray
          $option = array(
            'id' => $_POST['post_ID'],
            'ancho' => $_POST[self::$home_post_option_prefix.'ancho']
          );

          // Loop por cada opción
          foreach (self::Get_Home_Posts() as $key => $id_y_ancho_arr){
            // Se asegura que sea un arreglo
            if( is_array($id_y_ancho_arr) ){
              // Si el ID que se quiere guardar, ya estaba en otro option o algún option guardado es de un post que no existe...
              if($id_y_ancho_arr['id'] == $_POST['post_ID'] || (get_post($id_y_ancho_arr['id']) == NULL) ){
                //bóralo
                delete_option(self::Get_Home_Option_Name($key));
              }
            }
          }
          // Guarda el optión con el prefijo y el número como key y el arreglo como value
          update_option( self::Get_Home_Option_Name($orden), $option );
        }
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

    // Aquí pondría el Nonce.

    return true;
  }

  /**
   * @return (arr) Arreglo con el número de casillas definido ($max_home_posts)
   * cada casilla tiene un arreglo si o NULL si no hay post en esa casilla.
   */
  public static function Get_Home_Posts(){

    $home_posts = array();
    for ($i=0; $i < self::$max_home_posts; $i++) {
      $home_posts[$i] = get_option( self::Get_Home_Option_Name($i), NULL );
    }

    return $home_posts;
  }
  /**
  * @param (int) el número que será el sufijo del nombre de la opción.
   * @return (string) el prefijo más el número.
   */
  public static function Get_Home_Option_Name($int){
    return self::$home_post_option_prefix.$int;
  }
}
