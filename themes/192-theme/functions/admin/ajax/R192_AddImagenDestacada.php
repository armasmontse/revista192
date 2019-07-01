<?php

class R192_AddImagenDestacada extends Cltvo_Ajax_Master
{
    const isNotAdmin = false;

	/**
	 * metodo de respuesta del ayax
	 */
	static function privMethod(){

    $img_ids = isset($_POST["img_ids"]) ? $_POST["img_ids"] : array();

    foreach ($img_ids as $img_id) {
    	if (isMimeType($img_id, 'image')) {
        $img = new Cltvo_Img($img_id);
        R192_ImgDestacadaH_MetaBox::CltvoDisplayEachImage($img, $_POST["meta_key"]);
    	}
    }
    die();
  }

}
