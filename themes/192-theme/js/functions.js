(function($) {

	// var reescalaDiv = function(class) {
	// 	var elem = $(class);
	// 	var generalMaxHeight = 0;
	// 	elem.each(function() {
	// 		if ( $(this).height() > generalMaxHeight ){
	// 			generalMaxHeight = $(this).height();
	// 		}
	// 	});
	// 	elem.css('min-height', generalMaxHeight + 'px');
	// };

	var menu = {
		container: $('.js-menuMain'),
		icon: $('.js-menuMain__icon'),
		breakpoint: 768,
		is_open: false,
		is_home: ! $('.header').hasClass('not-home') ? true : false,

		init: function() {
			if (! this.is_home || $(window).width() < this.breakpoint ) {
				this.container.addClass('js-isClosed').hide();
			}
		},

		toggleOnMobile: function() {
			if (! this.is_home) { return this}

			if ($(window).width() < this.breakpoint) {
				this.container.addClass('js-isClosed').hide();
			} else {
					this.container.css('height', 'auto').fadeIn();
					this.container.removeClass('js-isClosed');
			}
			return this;
		},

		toggleWithIcon: function() {
			var self =  this;
			this.icon.on('click', function() {
				if (self.container.hasClass('js-isClosed') ) {
					self.container.stop().slideDown().removeClass('js-isClosed');
				} else {
					self.container.stop().slideUp().addClass('js-isClosed');
				}
				if (self.is_home) {
					$('html, body').animate({
						scrollTop: 0
					}, 1000);
				}
			});
		}
	};

	var toggleClassOnHover = function(elem, clss) {
		// elem = $(elem);
		// clss = clss || 'hover';
		// elem.on('mouseenter', function() {
		// 	elem.addClass(clss);
		// });
		//
		// elem.on('mouseleave', function() {
		// 	elem.removeClass(clss);
		// });
	}



	$(document).ready(function() {
		$('#user_login').attr( 'placeholder', 'Email' );
		$('#user_pass').attr( 'placeholder', 'Password' );

		$('.anterior__select_JS').on('change', function(){
			window.location.href = cltvo_js_vars.site_url + $(this).val();
		});

		// menu.toggleOnMobile();
		menu.toggleWithIcon();

		var slider = new Swiper ('.slider', {
	      // Optional parameters
		    direction: 'horizontal',
		    loop: true,
		    pagination: '.slider__pagination',
		    paginationClickable: true,
		    paginationBulletRender: function (index, className) {
		            return '<span class="' + className + '">' + (index + 1) + '</span>';
		        },
		    nextButton: '.slider__nav--next',
		    previousButton: '.slider__nav--prev'
	    });
	});

	$(window).on('load', function() {
		menu.init();

	});

	$(window).on('resize', function() {
		menu.toggleOnMobile();
	});
})(jQuery);



//Priv� - Bot�n COMPRAR

jQuery(document).ready(function($){

	$('.row').on('click','.opcion',function(){
		var price = $(this).attr('value');
		var product = $(this).attr('id');
		var title = $(this).parents('.container').find('.ttl').text();
		var id_comercio = "MM82PCARXUT2W"; // se debe sacar de la cuenta de PayPal en business prof > en settings > "Id. de cuenta de comercio / merchant ID" 

		$(this).parents('.row').find('.comprar').html('<form method="post" action="https://www.paypal.com/cgi-bin/webscr" class="paypal-button" target="_blank"><div class="hide" id="errorBox"></div><input type="hidden" name="button" value="buynow"><input type="hidden" name="amount" value="'+price+'"><input type="hidden" name="item_name" value="'+title+'\n'+product+'"><input type="hidden" name="currency_code" value="MXN"><input type="hidden" name="cmd" value="_xclick"><input type="hidden" name="business" value="'+id_comercio+'"><input type="hidden" name="bn" value="JavaScriptButton_buynow"><input type="hidden" name="env" value="www"><button type="submit" class="paypal-button large">Comprar</button></form>');
	});

});
