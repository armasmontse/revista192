<?php

abstract class R192_Page_Controller
{
   public $contacto;

   /*
    * Pone valores de Contacto
    */
   protected function setContacto(){
      $this->contacto = Cltvo_SocialNet::getMetaValue( get_post( $GLOBALS['special_pages_ids']['contacto']) );
   }

}
