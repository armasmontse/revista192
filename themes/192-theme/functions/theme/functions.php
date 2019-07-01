<?php

/**
 * En este archivo se incluyen las funciones del tema
 *
 */


/** ==============================================================================================================
 *                                              FUNCIONES DEL TEMA
 *  ==============================================================================================================
 */



// funciones aqui ...
function getvar_check_or_die($var)
{
   if( !isset($_GET[$var]) )
   {
      global $wp_query;
        $wp_query->set_404();
        status_header( 404 );
        get_template_part( 404 ); exit();
   }

}

$new_general_setting = new new_general_setting();

class new_general_setting {
    function __construct( ) {
        add_filter( 'admin_init' , array( &$this , 'register_fields' ) );
    }
    function register_fields() {
        register_setting( 'general', 'home_color', 'esc_attr' );
        add_settings_field('hom_color', '<label for="home_color">'.__('Colores del Home' , TRANSDOMAIN ).'</label>' , array(&$this, 'fields_html') , 'general' );
        register_setting( 'general', 'menu_home_color', 'esc_attr' );
        add_settings_field('menu_hom_color', '<label for="menu_home_color">'.__('Colores del menu en Home' , TRANSDOMAIN ).'</label>' , array(&$this, 'fields_html2') , 'general' );
    }
    function fields_html() {
        $value = get_option( 'home_color' );
        if ($value) {
            echo '<select name="home_color" id="home_color"><option value="1" selected>Blanco</option><option value="0">Negro</option></select>';
        }else {
            echo '<select name="home_color" id="home_color"><option value="1">Blanco</option><option value="0" selected>Negro</option></select>';
        }
    }
    function fields_html2() {
        $value = get_option( 'menu_home_color' );
        if ($value) {
            echo '<select name="menu_home_color" id="menu_home_color"><option value="1" selected>Blanco</option><option value="0">Negro</option></select>';
        }else {
            echo '<select name="menu_home_color" id="menu_home_color"><option value="1">Blanco</option><option value="0" selected>Negro</option></select>';
        }
    }
}

/**
 * Imprime el template del register o login para Prive
 * @param  [string] $login_or_register si se incluye la forma de register o login
 * @author Diego Villaseñor
 */
function prive_login_or_register_template($login_or_register) {
    $plantilla = new R192_Prive_Controller;
    $prive_post = new R192_Prive;
    get_header();
    ?>
    <div class="prive login-registration-page">
        <div class="body-gradient">
            <div class="main-background">
                <?php include get_template_directory() .'/inc/general/header-prive.php' ?>
                <div class="login-page" style="background-image: url(<?php echoImg('bgprive.jpg');?>)">
                    <div id="login-container_JS" class="login-container">
                        <?php themeInc('/inc/users/' . $login_or_register . '.php'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    get_footer();
}

function bigNumber() {
    # prevent the first number from being 0
    $count = rand(1,9);
    $output = $count;

    for($i=0; $i < $count; $i++) {
        $output .= rand(0,99);
    }

    return $output;
}


add_action( 'init', 'blockusers_init' );
function blockusers_init() {
    if (is_user_logged_in() && is_admin() && !(current_user_can( 'administrator' ) || current_user_can( 'editor' )) ) {
        wp_redirect( home_url() );
    exit;
    }
}
