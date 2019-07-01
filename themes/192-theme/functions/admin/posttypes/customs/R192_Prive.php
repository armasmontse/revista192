<?php

class R192_Prive extends Cltvo_PostTypeCustom_Master
{

    const nombre_plural = 'Privé';
    const nombre_singular = 'Privé';
    const slug = 'prive';
	const hierarchical = true;
	protected static $supports = array('title');

    public $detalles;
    public $galeria;

    private $title_words;

    private $title_acronym = "";

    function __construct($post_obj = false) {
        
        // Se carga el post
        if (!$post_obj) { // Se carga el que se encuentre en el loop
            global $post;
            $post_obj= $post;
        }


        $this->title_words = explode(' ', $post->post_title ); 

        foreach ($this->title_words as $word) { $this->title_acronym .= $word[0]; } 

        parent::__construct(
            get_post( $post_obj )
        );
    }


    public function setMetas() {
	    $this->detalles = R192_Prive_Detalles::getMetaValue($this->post);
	    $this->galeria = R192_Prive_Galeria::getMetaValue($this->post);
    }


    private function getSerial($i) {
        return $this->title_acronym.str_pad($i, 3, "0", STR_PAD_LEFT);
    }

    public function getInitGalleries() {
        $galerias = array();
        
        foreach ($this->galeria as $key => $galeria) {
            
            $galeria["imagen_id"] = $galeria["imagen"]; 
            $galeria["imagen"] = new Cltvo_img($galeria["imagen"]);

            $galeria["imagen_serial"] = $this->getSerial($key+1);
            if(!is_null($galeria["imagen"]->img_id) ){
                $galeria['aspect_class'] = $galeria["imagen"]->proporcion == 'horizontal' ? 'col-md-6 col-sm-6 col-xs-12' : 'col-md-3 col-sm-6 col-xs-12';
                $galerias[$key] = $galeria;
            }
            
        }

        return $galerias;

    }

    public function getDate() {
        return get_the_time('j') < 10 ? the_time('0jm') : the_time('jm');
    }

}

