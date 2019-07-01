<?php

/**
 * En este archivo se incluyen el menu y sus funciones
 * el menu debe ser creado como una Funcion
 *
 */

// creamos var global para guardar el nombre y arreglo del menú
$GLOBALS['cltvo_menu'] = [
   'name' => 'r192-header-menu',
   'menu_arr' => NULL,
];

// Se registra el menú...
add_action( 'after_setup_theme', function(){
   //se registra el menú con ese nombre
   // Cuando el usuario cree el menú
   // deberá indicar relacionar el menú que creo con este menú
   register_nav_menus(
   [
      $GLOBALS['cltvo_menu']['name'] => 'Menú principal header',
   ]);
});

// Si el menú exisiste, se guarda un arreglo en $GLOBALS['cltvo_menu']['menu_arr']
add_action( 'init', function(){
   // el menú que guarde el usurio tendrá un ID
   // ese ID se obtiene en el arrglo $locations, en el key [ $menu_name ]
   if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ 'r192-header-menu'] ) )
   {
      // si el usuario ha relacionado algún menú creado por él con el menú registrado $GLOBALS['cltvo_menu']['name']...
      $term = wp_get_nav_menu_object( $locations[ $GLOBALS['cltvo_menu']['name'] ] );
      $args =
      [
         'posts_per_page'  => -1,
         'post_type'       => 'nav_menu_item',
         'post_status'     => 'publish',
         'order'           => 'ASC',
         'orderby'         => 'menu_order',
         'tax_query' =>
         [
            [
              'taxonomy' => 'nav_menu',
              'field'    => 'slug',
              'terms'    => $term->slug,
            ],
         ],
      ];
      // Los elementos del menú son posts de tipo 'nav_menu_item'
      // el nombre que el usuario, en el admin, le ponga al menú será el nombre del término de la taxonomía 'nav_menu'
      // hacemos un query con esos valores de PT y Tax
      $post_menu_items = get_posts($args);
      $menu_items = [];

      foreach ($post_menu_items as $post_menu_item)
      {
         // los datos de cada elemento del menú están en los metadatos del post
         $object = get_post_meta($post_menu_item->ID, '_menu_item_object', true);
         $object_id = get_post_meta($post_menu_item->ID, '_menu_item_object_id', true);
         $type = get_post_meta($post_menu_item->ID, '_menu_item_type', true);

         // Los elementos de menú pueden ser de varios tipos...
         if($type == 'taxonomy')
         {
            $term = get_term($object_id, $object);
            $menu_items[$post_menu_item->menu_order]['name'] = cltvo_translate($term->name);
            $menu_items[$post_menu_item->menu_order]['link'] = get_term_link($term);
         }
         elseif($type == 'post_type_archive')
         {
            $menu_items[$post_menu_item->menu_order]['name'] = get_post_type_object($object);
            $menu_items[$post_menu_item->menu_order]['name'] = $menu_items[$post_menu_item->menu_order]['name']->rewrite['slug'];
            $menu_items[$post_menu_item->menu_order]['link'] = get_post_type_archive_link($object);
         }
         elseif($type == 'post_type')
         {
            $post = get_post($object_id);
            $menu_items[$post_menu_item->menu_order]['name'] = cltvo_translate($post->post_title);
            $menu_items[$post_menu_item->menu_order]['link'] = get_permalink($post->ID);
         }
         elseif($type == 'custom')
         {
            $menu_items[$post_menu_item->menu_order]['name'] = cltvo_translate($post_menu_item->post_title);
            $menu_items[$post_menu_item->menu_order]['link'] = get_post_meta($post_menu_item->ID, '_menu_item_url', true);
         }
      }
      // finalmente se guardan en varible global para usarse en otras partes del tema.
      $GLOBALS['cltvo_menu']['menu_arr'] = $menu_items;
   }
});

/** ==============================================================================================================
 *                                                     MENU
 *  ==============================================================================================================
 */

// crea el menu
function ctlvo_menu_theme(){ ?>


<?php }




/** ==============================================================================================================
 *                                              FUNCIONES DEL MENU
 *  ==============================================================================================================
 */
