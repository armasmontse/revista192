<?php

function my_load_wp_media_files() { wp_enqueue_media();}
add_action( 'admin_enqueue_scripts', 'my_load_wp_media_files' );

class R192_Prive_Galeria extends Cltvo_Metabox_Master {

    /* Sobre escribiendo las opcciones del master */
    protected $description_metabox = "Galer&iacute;a";
    protected $post_type = "r192_prive";


    /* Detalles */
    private $galeria = array(
    	'imagen'  => 'Imagen',
    	'edicion' => 'Unidades por Edici&oacute;n',
    	'small'   => 'Precio 12 x 18 in',
    	'large'   => 'Precio 18 x 27 in'
    );


    /* Define el metodo que inicializa el valor del meta */
     public static function setMetaValue($meta_value){
         if (is_array($meta_value)) {
            foreach ($meta_value as $key => $value) {
                foreach ((new static)->galeria as $galeria_key => $item) {
                    $meta_value[$key][$galeria_key] = (isset($meta_value[$key][$galeria_key]) && !empty($meta_value[$key][$galeria_key])) ? $meta_value[$key][$galeria_key] : '';
                }
            }
         } else {
         	$meta_value = array(0 => array('imagen'  => '',
			                               'edicion' => '',
			                               'small'   => '',
			                               'large'   => ''
			                               ));
         }
         return $meta_value;
     }


	/* 
	Es la funcion que muestra el contenido del metabox
	@param object $object en principio es un objeto de WP_post
	*/
     public function CltvoDisplayMetabox($object){
        //echo "<pre>"; print_r($this->meta_value); echo "</pre>";
        ?>
                
        <br>
        <div id="table__galeria">

            <table class="table__galeria" style="width:100%;" cellpadding="0" cellspacing="0">
                <thead>
                    <tr>
                        <?php foreach ($this->galeria as $item): ?>
                            <th class="th__galeria" align="left" style="padding-bottom:10px;">
                                <?php echo $item; ?> <span class="warn">*</span>
                            </th>
                        <?php endforeach; ?>
                        <th class="th__galeria" style="padding-bottom:10px;">
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody id="tbody__imagen_JS">
                	<?php $this->drawTemplate($this->meta_value); ?>
                </tbody>
            </table>
            
            <button type="button" 
            		href="#add_rank" 
            		id="#media"
            		class="button add__imagen add__imagen_JS" 
            		style="display:block;margin-top:0px;" 
            		meta-name="<?php echo $this->meta_key; ?>">
            		Agregar Imagen
            		</button>

            <table style="display:none;">
                <tr id="template_clone_JS" class="tr_sortable">
		    		<td class="td__galeria thumbnail" id="R192_Prive_Galeria_" style="padding:0 10px 10px 0;">
		    			<div class="thumbnail_holder" id="thumbnail" style="box-shadow: 0px 0px 5px #ccc; display:inline-block; display:none;"></div>
		    			<input type="text" required
		    				   style="display:none;" 
		    				   class="media-input" 
		    				   id="R192_Prive_Galeria__imagen"
		    				   name="R192_Prive_Galeria[][imagen]"
		    				   disabled />
		    			<button class="button media-button" style="display:none;">Elegir Imagen</button>		    			
		    		</td>
					<?php $count=0; foreach ($this->galeria as $key => $item): ?>
						<?php if ($count!=0) : ?>
	                        <td class="td__galeria" style="padding-bottom:10px;">
	                            <input required type="text" style="width: calc(100% - 10px);"
	                            id="<?php echo $this->meta_key; ?>__<?php echo $key; ?>"
	                            name="<?php echo $this->meta_key; ?>[][<?php echo $key; ?>]"
	                            disabled
	                            class="input__galeria" />
	                        </td>
					    <?php endif; ?>
					<?php $count++; endforeach; ?>
                    <td class="td__galeria delete__galeria">
                        <button meta-name="<?php echo $this->meta_key; ?>" class="button delete__imagen_JS">Eliminar</button>
                    </td>
                </tr>
            </table>

        </div>

 	<?php }


	public function drawTemplate($meta_value) {
	    foreach ($meta_value as $key_value => $value) { 
	    ?>
	        <tr meta-key="<?php echo $key_value; ?>" id="<?php echo $this->meta_key; ?>_<?php echo $key_value; ?>" class="tr_sortable">
	    		<td class="td__galeria thumbnail" id="<?php echo $this->meta_key; ?>_<?php echo $key_value; ?>" style="padding:0 10px 10px 0;">
		    		<div class="thumbnail_holder">
			    		<?php if ($value['imagen'] != '') : ?>
		    			<div class="reset">&#10005;</div>
			    		<?php echo wp_get_attachment_image($value['imagen'],array(100,100)); ?>
			    		<?php endif; ?>
		    		</div>
	    			<input type="text" required
	    				   id="<?php echo $this->meta_key; ?>_<?php echo $key_value; ?>_imagen" 
	    				   class="media-input" 
	    				   value="<?php echo $value['imagen']; ?>"
	    				   name="<?php echo $this->meta_key; ?>[<?php echo $key_value; ?>][imagen]"
	    				   style="display:none;" />
	    			<button class="button media-button" style="display:none;">Elegir Imagen</button>
	    		</td>
				<?php $count=0; foreach ($this->galeria as $key => $item): ?>
					<?php if ($count!=0) : ?>
					    <td class="td__galeria" style="padding-bottom:10px;">
					        <input required type="text" style="width: calc(100% - 10px);"
					        id="<?php echo $this->meta_key; ?>_<?php echo $key_value; ?>_<?php echo $key; ?>"
					        name="<?php echo $this->meta_key; ?>[<?php echo $key_value; ?>][<?php echo $key; ?>]"
					        value="<?php echo $value[$key]; ?>"
					        class="input__galeria"/>
					    </td>
				    <?php endif; ?>
				<?php $count++; endforeach; ?>
	
	            <td class="td__galeria delete__galeria">
	                <button meta-name="<?php echo $this->meta_key; ?>" class="button delete__imagen_JS">Eliminar</button>
	            </td>
	        </tr>
	    <?php }
	}



 }