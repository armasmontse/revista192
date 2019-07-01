<?php

class R192_Track_Pixel_MetaBox extends Cltvo_Metabox_Master
{

    /**
    * sobre escribiendo los args del master
    */
    protected $description_metabox = "Pixel para medir impresiones";
    protected $post_type = array("post");
    protected $position = "side";

    /**
    * Es la funcion que muestra el contenido del metabox
    * @param object $object en principio es un objeto de WP_post
    */
    public function CltvoDisplayMetabox( $object ){ ?>

        <label>
            <p>Ingres aquí los códigos de pixeles para dar seguimiento a las impresiones de está publicación.</p>
        </label>

        <textarea class="i18n-multilingual" style="width:100%" name="<?php echo $this->meta_key;?>" ><?php echo $this->meta_value; ?></textarea>

    <?php }
}
