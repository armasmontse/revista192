<?php

/**
 * En este archivo se incluyen los tamaños personalizados el el adimin
 *
 */

/** ==============================================================================================================
 *                                           HOOKS
 *  ==============================================================================================================
 */

add_theme_support( 'post-thumbnails' ); // habilita el thumbnails
// add_filter('intermediate_image_sizes_advanced', 'cltvo_quita_tamanos_default'); // remueve los tamaños  estandar de las imagenes de wp

// add_filter( 'attachment_fields_to_edit', 'aca_edit_tamano_img', null, 2 ); // crea el menú de imagen titular
// add_filter( 'attachment_fields_to_save', 'aca_save_tamano_img', null, 2 ); // salva la opccion del menú de imagen titular

add_filter( 'admin_post_thumbnail_html', 'add_featured_image_instruction');




/** ==============================================================================================================
 *                                       FUNCIONES de IMGS
 *  ==============================================================================================================
 */

function add_featured_image_instruction( $content ) {
	$content .= "<ul>";
	$content .= "<li>Tamaño mínimo 334 x 500 px</li>";
	$content .= "<li>Tamaño recomendado para Moda 630 x 860 px</li>";
	$content .= "</ul>";
    return $content;
}

// agrega tamaño personalizado
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'responsive_thumbnail', 334, 500, true );
	add_image_size( 'featured_vertical', 630 , 860, true );
}

// quita tamaños estándar
function cltvo_quita_tamanos_default( $sizes) {

	unset( $sizes['thumbnail']);
	unset( $sizes['medium']);
	unset( $sizes['large']);

	return $sizes;
}

// crea el menú de imagen titular
function cltvo_edit_tamano_img( $form_fields, $post ) {
	$tamano_guardado = get_post_meta($post->ID, 'cltvo_tamano_img_meta', true);
	$tamanos = array('imagen_titular', 'poster_evento');
	$html = "<select name='attachments[{$post->ID}][cltvo_tamano_img_in]' id='attachments[{$post->ID}][cltvo_tamano_img_in]' >";
	$html .= "<option value='0'>Selecciona</option>";
	foreach ($tamanos as $tamano) {
		$tamano_impreso = ucfirst(str_replace("_", " ", $tamano));
		$selected = $tamano == $tamano_guardado ? 'selected' : '';
		$html .= "<option value=\"$tamano\" $selected >$tamano_impreso</option>";
	}
	$html .= "</select>";

	$form_fields['cltvo_tamano_img_in'] = array(
		'label' => 'Tamaño a mostrar',
		'input' => 'html',
		'html' => $html,
	);
    return $form_fields;
}

// salva la opción de imagen titular
function cltvo_save_tamano_img($post, $attachment) {
	$post_id = $post['ID'];
	if ( isset( $attachment['cltvo_tamano_img_in'] ) ) {
		update_post_meta( $post['ID'], 'cltvo_tamano_img_meta', $attachment['cltvo_tamano_img_in'] );
	}
	return $post;
}



?>
