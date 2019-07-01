<?php

/**
 * En este archivo se incluyen las taxonomías personalizadas
 *
 */
 define( 'CONTROLLERSDIR', get_template_directory().'/functions/theme/controllers/' ); // directorio de las clases de taxonomias

/** ==============================================================================================================
 *                                               agrega todos los objetos de taxonomias
 *  ==============================================================================================================
 */
include "master_controllers/R192_Page_Controller.php";
include "master_controllers/R192_Feat_and_Archive_Controller.php";

// incluye todos los archivos PHP en CONTROLLERSDIR
foreach (glob(CONTROLLERSDIR.'*.php') as $filename){
	include $filename;
}
?>
