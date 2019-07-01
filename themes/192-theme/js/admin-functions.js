(function($) {
	$(document).ready(function(){

		/* Imágen destacada */
		var img_destacada_h_div = $('.R192_ImgDestacadaH_MetaBox_JS');

		// Prevents the default action from occuring.
		img_destacada_h_div.on('click',"a[href='#']",function(e){
			e.preventDefault();
		});

		img_destacada_h_div.on('click','.r192_agregar_img_JS',function(e){

			// Prevents the default action from occuring.
			e.preventDefault();
			var este = $(this);
			var meta_key = este.attr('meta_key');

			if ( meta_image_frame ) {
					//wp.media.editor.open();
					meta_image_frame.open();
					return;
			}

			// Sets up the media library frame
			var meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
				title: "Seleccionar imagen destacada formato horizontal",
				button: { text:  "Seleccionar" },
				library: { type: 'image' },
				multiple: false  // Set to true to allow multiple files to be selected
			});

			// Runs when an image is selected.
	    meta_image_frame.on('select', function(){

				var img_ids = [];

				$.each(meta_image_frame.state().get('selection').toJSON() , function(i){
					img_ids[i] = this.id;
				} );

				$.ajax({
					url: cltvo_js_vars.ajax_url,
					type : 'post',
					data : {
						action : 'R192_AddImagenDestacada',
						img_ids: img_ids,
						meta_key: meta_key,
					},
					success: function( data ) {
						este.text('Cambiar imagen destacada horizontal');
						$(".r192_imgdestacadah-JS").html(data);
					}
				});

	    });

	    // Opens the media library frame.
	    meta_image_frame.open();
		});

		// elimina una imagen de una galeria
		img_destacada_h_div.on("click",".borrar-img_JS",function(){
			var gal_img_id = $(this).attr("imgbor");
				$('#'+gal_img_id).remove();
				$('.r192_agregar_img_JS').text('Añadir imagen destacada horizontal');
		});



		/*
		**	Galería de imágenes
		*/
		var r192_format_div = $('.R192_Gallery_MetaBox_JS');

		r192_format_div.on('click',"a[href='#']",function(e){
				e.preventDefault();
		});

		r192_format_div.on('click','.r192_agregar_img_JS',function(e){
			// Prevents the default action from occuring.
			e.preventDefault();
			var meta_key = $(this).attr('meta_key');

			if ( meta_image_frame ) {
					//wp.media.editor.open();
					meta_image_frame.open();
					return;
			}

			// Sets up the media library frame
			var meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
				title: "Agregar imágenes y/o fotos a galería ",
				button: { text:  "Insertar en galería" },
				library: { type: 'image' },
				multiple: true  // Set to true to allow multiple files to be selected
			});

			// Runs when an image is selected.
	    meta_image_frame.on('select', function(){

				var img_ids = [];

				$.each(meta_image_frame.state().get('selection').toJSON() , function(i){
					img_ids[i] = this.id;
				} );

				$.ajax({
					url: cltvo_js_vars.ajax_url,
					type : 'post',
					data : {
						action : 'R192_Gallery_Add_New_Img',
						img_ids: img_ids,
						meta_key: meta_key,
					},
					success: function( data ) {
						$(".r192_gallery_div_JS").append(data);
					}
				});

	    });

	    // Opens the media library frame.
	    meta_image_frame.open();
		});


		// elimina una imagen de una galeria
			r192_format_div.on("click",".borrar-img_JS",function(){
				var gal_img_id = $(this).attr("imgbor");
					$('#'+gal_img_id).remove();
			});

	});
})(jQuery);



//Privé - Agregar Item
jQuery(document).ready(function($){
    $('#R192_Prive_Galeria_mb').on('click','.add__imagen_JS',function() {
	    var meta_name = jQuery(this).attr('meta-name');
	    var lastkey = 0;
	    var nextKey = 0;
	    jQuery('#tbody__imagen_JS').find('tr').each(function(){
	        var actualKey = parseInt( jQuery(this).attr('meta-key') );
	        if (lastkey <= actualKey ){
	            lastkey = actualKey;
	        }
	    });
	    nextKey = lastkey + 1;
	    var clone = jQuery("#template_clone_JS").clone()
	    										.appendTo("#tbody__imagen_JS")
	    										.css("visibility", "visible")
	    										.attr( "meta-key", nextKey )
	    										.removeAttr('id');	
	    clone.find('*').attr('disabled', false );
	    
	    clone.find('td').attr('id',meta_name+'_'+nextKey);

	    clone.find('td:nth-child(1) > input').attr('name',meta_name+'['+nextKey+'][imagen]')
	    clone.find('td:nth-child(2) > input').attr('name',meta_name+'['+nextKey+'][edicion]');
	    clone.find('td:nth-child(3) > input').attr('name',meta_name+'['+nextKey+'][small]');
	    clone.find('td:nth-child(4) > input').attr('name',meta_name+'['+nextKey+'][large]');
	    
	    clone.find('td:nth-child(1) > input').attr('id',meta_name+'_'+nextKey+'_imagen');
	    clone.find('td:nth-child(2) > input').attr('id',meta_name+'_'+nextKey+'_edicion');
	    clone.find('td:nth-child(3) > input').attr('id',meta_name+'_'+nextKey+'_small');
	    clone.find('td:nth-child(4) > input').attr('id',meta_name+'_'+nextKey+'_large');
 	    
 	    clone.attr('id',meta_name+'_'+nextKey);
   });
});

//Privé - Eliminar Item
jQuery(document).ready(function($){
	$('#R192_Prive_Galeria_mb').on('click','.delete__imagen_JS',function(e) {
		e.preventDefault();
	    var meta_name = jQuery(this).attr('meta-name');
	    var num_ele = jQuery('#tbody__imagen_JS').children("tr").length;
	    if( num_ele > 1) { // Verifica que haya al menos un elemento con esa clase__input
	        var row = jQuery(this).parent().parent().attr('meta-key'); // Obtiene la llave del elemento a eliminar
	        jQuery("tr[meta-key="+row+"]").remove(); // Elimina los elementos con esa llave
	    }
	    var counter=0;
	    jQuery("#tbody__imagen_JS").find('tr').each(function(){
	        jQuery(this).attr('meta-key',counter);
	        jQuery(this).find('td:nth-child(1) > input').attr('name',meta_name+'['+counter+'][imagen]');
	        jQuery(this).find('td:nth-child(2) > input').attr('name',meta_name+'['+counter+'][edicion]');
	        jQuery(this).find('td:nth-child(3) > input').attr('name',meta_name+'['+counter+'][small]');
	        jQuery(this).find('td:nth-child(4) > input').attr('name',meta_name+'['+counter+'][large]');
	        
	        jQuery(this).attr('id',meta_name+'_'+counter); 
	        jQuery(this).find('td:nth-child(1) > input').attr('id',meta_name+'_'+counter+'_imagen');
	        jQuery(this).find('td:nth-child(2) > input').attr('id',meta_name+'_'+counter+'_edicion');
	        jQuery(this).find('td:nth-child(3) > input').attr('id',meta_name+'_'+counter+'_small');
	        jQuery(this).find('td:nth-child(4) > input').attr('id',meta_name+'_'+counter+'_large');
	        counter++;
	    });
	});
});

//Privé - Desplegar Imágenes
jQuery(document).ready(function($){
	
	function inputCheck() {
		if ( $(this).children('input').attr('value') !== '' ) {
			$(this).children('button').hide();
			$(this).children('#thumbnail').show();
		} else {
			$(this).children('button').show();
			$(this).children('input').required = false;
		}
	}
	
	$('td.thumbnail').each(inputCheck);
	
});

//Privé - Resetear Imágenes
jQuery(document).ready(function($){
	 $('#R192_Prive_Galeria_mb').on('click','.reset',function(){
		var id = $(this).parent().parent().attr('id');
	    $(this).parent().css('display','none');
	    $('#'+id+' .media-input').val('');
	    $('#'+id+' .media-button').css('display','block');
	    $('#'+id+' img').css('display','none');
	});
});


//Privé - Escoger Imagen de Item
jQuery(document).ready(function($){
	
    var meta_image_frame;

    $('#R192_Prive_Galeria_mb').on('click','.media-button',function(e){
	    
	    var the_id = $(this).parent().attr('id');
	    
        e.preventDefault();

        if ( meta_image_frame ) {
             meta_image_frame.open();
            return;
        }
		
        // Sets up the media library frame
		var meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
			title: "Agregar Imagen",
			multiple: false,
			library: {type: 'image'}
		});

		var media_set_image = function() {
			var selection = wp.media.frames.meta_image_frame.state().get('selection');
			
			if (!selection) { return;} // No selection
			
			// Iterate through selected elements
			selection.each(function(attachment) {
			    var id = attachment.attributes.id;
			    var thumbnail = attachment.attributes.sizes.thumbnail.url;
			    $('#'+the_id+' .reset').show();
			    $('#'+the_id+' .media-input').val(id);
			    $('#'+the_id+' .media-input').hide();
			    $('#'+the_id+' .media-button').hide();
			    $('#'+the_id+' .thumbnail_holder').show();
			    $('#'+the_id+' .thumbnail_holder').html('<div class="reset">&#10005;</div><img width="100" src="'+thumbnail+'">');
			});
		};
		
		wp.media.frames.meta_image_frame.on('close', media_set_image); // Closing event for media manger
		wp.media.frames.meta_image_frame.on('select', media_set_image); // Image selection event
		wp.media.frames.meta_image_frame.open(); // Showing media manager

    });
});


//Privé - Sort Gallery Rows
jQuery(document).ready(function($){
	
	function start_function() {
		$('body').css('cursor','move');
		$('.tr_sortable').addClass('shadow');
	}
	
	function stop_function() {
		$('body').css('cursor','default');
		$('#table__galeria').find('.tr_sortable').removeClass('shadow');
	}

	function update_function() { }
	
	$('#table__galeria').sortable({ 
		items: '.tr_sortable',
		cancel:'input',
		start: start_function,
		stop: stop_function,
		update: update_function
	});	

});





