<?php

class R192_Prive_Detalles extends Cltvo_Metabox_Master
{

    /* Sobre escribiendo las opcciones del master */
    protected $description_metabox = "Detalles";
    protected $post_type = "r192_prive";


    /* Detalles */
	protected static $detalles = [
      	'rol' => 'Rol',
      	'autor' => 'Autor',
		'lugar' => 'Lugar y Fecha',
		//'edicion' => 'Unidades por Edici&oacute;n'
	];


    /* Define el metodo que inicializa el valor del meta */
    public static function setMetaValue($meta){

        $meta = is_array($meta) ? $meta : [] ;

        foreach (self::$detalles as $red => $imagen) {
			$meta[$red] = isset($meta[$red]) ? $meta[$red] :  "";
		}

        return $meta;
    }


	/* 
	Es la funcion que muestra el contenido del metabox
	@param object $object en principio es un objeto de WP_post
	*/
	public function CltvoDisplayMetabox( $object ){

	?>

		<!--
		<pre>
			Meta_key: <?php echo $this->meta_key; ?><br />
			Meta_value: <?php print_r($this->meta_value); ?>
		</pre>
		-->

		<table class="ancho_100">
			<?php foreach (self::$detalles as $slug => $nombre): ?>
				<tr>
					<td class="ancho_180">
						<label for="<?php echo $this->meta_key."_".$slug; ?>"><?php echo $nombre; ?></label>
					</td>
					<td class="ancho_auto">
						<?php $this->field_detalle($slug); ?>
					</td>
				</tr>
		
			<?php endforeach; ?>
		
		</table>
		
	<?php
	}



	/*
	Imprime los Inputs
	
	Parametros:
	@param string $slug slug de la red social
	@param array $meta array con los valores link y cuenta
	*/

    private function field_detalle($slug) {
		?>
			<p>
				<input type="text" 
					   placeholder="<?php echo self::$detalles[$slug] ?>"
					   name="<?php echo $this->meta_key."[".$slug."]"; ?>"
					   id="<?php echo $this->meta_key."_".$slug; ?>"
					   value="<?php echo $this->meta_value[$slug]; ?>"
					   class="ancho_100" />
			</p>
		<?php
    }

}
