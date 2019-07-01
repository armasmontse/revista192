<?php

abstract class R192_Feat_and_Archive_Controller extends R192_Page_Controller
{
   public $category_slug;
   public $posts = [];
   public $feat_post;
   protected $posts_per_page = 12;
   public $fechas_links = [];

   protected function setFeatPost()
   {

   }

   protected function setCategorySlug()
   {

   }

   protected function setPosts()
   {

   }

   /**
    * Crea un arreglo con los links para los archivos de fecha
    */
   protected function setFechasLinks($term_slug, $tax = 'category')
   {
      $term = get_term_by('slug', $term_slug, $tax);

      global $wpdb;
      $years = $wpdb->get_col("SELECT DISTINCT YEAR(post_date) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post' ORDER BY post_date ASC");
      foreach ($years as $key => $year) {
         $this->fechas_links[$year] = $wpdb->get_col("SELECT DATE_FORMAT(post_date_gmt, '%m')
                               FROM $wpdb->posts
                               LEFT JOIN  $wpdb->term_relationships  as t
                               ON ID = t.object_id
                               WHERE post_type = 'post' AND post_status = 'publish' AND t.term_taxonomy_id = $term->term_taxonomy_id
                               AND DATE_FORMAT(post_date_gmt, '%Y') = $year
                               GROUP BY DATE_FORMAT(post_date_gmt, '%Y-%m')
                               ORDER BY post_date_gmt DESC");
      }

   }

}
