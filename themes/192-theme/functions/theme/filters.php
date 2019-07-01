<?php

/**
 * En este archivo se incluyen los filtros que requiera el tema
 *
 */


/** ==============================================================================================================
 *                                                  HOOKS
 *  ==============================================================================================================
 */

add_action( 'pre_get_posts', 'cltvo_query_mod' ); // modifica el query prestablecido por wp



/** ==============================================================================================================
 *                                                FILTROS
 *  ==============================================================================================================
 */
add_shortcode( 'cols-2', function ( $atts, $content = null ) {
	return '<div class="cols-2">' . $content . '</div>';
} );

add_shortcode( 'col-izq', function ( $atts, $content = null ) {
	return '<div class="col-izq">' . $content . '</div>';
} );

add_shortcode( 'col-der', function ( $atts, $content = null ) {
	return '<div class="col-der">' . $content . '</div>';
} );

add_shortcode( 'cols', function ( $atts, $content = null ) {
	return '<div class="cols">' . $content . '</div>';
} );


// modifica el query prestablecido por wp
function cltvo_query_mod( $query ) {
	if( $query->is_main_query() && !is_admin() ){
		if ( $query->is_date() ){
			//Restringir query sólo a un Post Type
			$query->set( 'posts_per_page', -1 );
		}
	}
}



add_action( 'wp_login_failed', 'my_front_end_login_fail' );  // hook failed login
function my_front_end_login_fail( $username ) {
   $referrer = $_SERVER['HTTP_REFERER'];  // where did the post submission come from?
   // if there's a valid referrer, and it's not the default log-in screen
   if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') ) {
      if ( !strstr($referrer,'?login=failed') ) { // make sure we don’t append twice
         wp_redirect( $referrer . '?login=failed' ); // append some information (login=failed) to the URL for the theme to use
     } else {
         wp_redirect( $referrer );
     }
     exit;
   }
}

if( ! function_exists( 'custom_login_empty' ) ) {
    function custom_login_empty(){
    	global $user;
        $referrer = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER'] : '';
         if ( empty($referrer) && strstr($referrer,'wp-login') && strstr($referrer,'wp-admin') ){
         	return;
         }
        if ( strstr($referrer,get_home_url()) && $user==null ) { // mylogin is the name of the loginpage.
            if ( !strstr($referrer,'?login=empty') ) { // prevent appending twice
                wp_redirect( $referrer . '?login=empty' );
            } else {
                wp_redirect( $referrer );
            }
        }
    }
}
add_action( 'authenticate', 'custom_login_empty');
