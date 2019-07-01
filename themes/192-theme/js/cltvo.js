var cltvo = {};

var delay = (function(){
  var timer = 0;
  return function(callback, ms){
    clearTimeout (timer);
    timer = setTimeout(callback, ms);
  };
})();


/**
 * Trae los inputs basicos (text, passwrod, email, textarea y number) de una forma y permite relacionarse con ellos de una manera reactiva.
 * @param  {[type]} $ [description]
 * @return {[type]}   [description]
 */
cltvo.form = function($) {
	return {
		form:  '',
		container: '',
		is_dirty: false,
		dirtyable_inputs: [],
		dirty_inputs: [],
		inited: false,

		init: function (other_funcs) {
			this.dirtyableFormInputs();
			this.initFormInputsState();
			this.inputIsDirty();
			// this.formIsDirty();
			// console.log(this.dirtyable_inputs);
			if (typeof other_funcs === 'function') {
				other_funcs();
			}
			this.inited = true;
		},

		dirtyableFormInputs: function() {
			this.dirtyable_inputs = this.form.find('[type="text"], [type="password"], [type="email"], textarea, [type="number"]');
		},

		defineDirty: function(input) {
			if (input.value.length > 0) {
				input.is_dirty = true;
			} else {
				input.is_dirty = false;
			}

			return input.is_dirty;
		},

		initFormInputsState: function() {
			var	inputs = this.dirtyable_inputs,
				self = this;
			inputs.each(function(){
				self.defineDirty(this);
			});
		},

		inputIsDirty: function() {
			var	inputs = this.dirtyable_inputs,
				self = this;
			inputs.on('keyup', function(e) {
				var input = e.target,
					prev_state = input.is_dirty,
					new_state;
				delay(function(){
      				new_state = self.defineDirty(input);

					if (prev_state !== new_state) {
						self.formIsDirty();
					}
    			}, 100 );

			});

		},

		formIsDirty: function() {
			var	inputs = this.dirtyable_inputs,
				dirty_inputs = inputs.filter(function(elem) {
					return this.is_dirty === true;
				}, this);
				this.dirty_inputs = dirty_inputs;
				if (dirty_inputs.length > 0) {
					this.is_dirty = true;
					this.container.addClass('hover');
				} else {
					this.is_dirty = false;
					this.container.removeClass('hover');
				}

		},

		classOnDirtyInput: function(input, target, clss) {
			var dirtyArry = [],
				is_dirty = false;
			input = $('[type="text"], [type="password"]');
			target = $(target);
			input.on('change', function() {
				dirtyArry = [];
				input.map(function() {
					if (!this.value) {
						return dirtyArry.push(false) ;
					} else {
						return dirtyArry.push(true) ;
					}
				});
				dirtyArry = dirtyArry.filter(function(elem) {
					console.log(elem);
					return elem === true;
				});

				if (dirtyArry.length > 0) {
					target.addClass(clss);
				} else {
					target.removeClass(clss);
				}
			});
		}

	}
}(jQuery);

var login_form = Object.create(cltvo.form);
login_form.form = jQuery('#loginform');
// login_form.classOnDirtyInput('.prive input', '.prive .login-container', 'hover');
login_form.init();

login_form.container = jQuery('#login-container_JS');

login_form.toggleClassOnHover = function() {
	var form =  login_form,
		elem = form.container;
		console.log(this.form);
	elem.on('mouseenter', function() {
		if (! form.is_dirty) {
			console.log(form.is_dirty);
			elem.addClass('hover');
		}
	});

	elem.on('mouseleave', function() {
		if (! form.is_dirty) {
			elem.removeClass('hover');
		}
	});
}();


login_form.toggleClassOnFocus = function() {
	var form = login_form,
		inputs = login_form.form.find('input'),
		elem = login_form.container;

	inputs.on('focus', function() {
		if (! form.is_dirty) {
			console.log('focused');
			elem.addClass('hover');
		}
	});

	inputs.on('focusout', function() {
		if (! form.is_dirty) {
			elem.removeClass('hover');
		}
	});
}();



/**
 * Infinite Scroll Controller
 *
 * Provee control para llamadas AJAX que se lanzan con el scroll al llegar a cierto punto de la página.
 *
 * @type {Object}
 */
cltvo.infiniteScrollController = {
	//Required
	launching_point_id_boilerplate: '#mas-entradas-page-',//plantilla del id del elemento que funcionara como punto de lanzamiento del Ajax
	requested_section_id: '#friends-family-page-',
	launching_point_offset: 200,
	ajax_container_elem:'',

	//Constructed on init or on other events
	built_launching_point: '',//elemento con numero de pagina
	page: 1,
	next_built_launching_point_position:'',
	ajax_in_process: false,

	init: function() {
		this.updateMasEntradas();
		this.setAjaxContainerElement();
		this.ajaxCallOnScrollPosition();
	},

	setAjaxContainerElement: function(elem) {
		this.ajax_container_elem = elem || this.built_launching_point;
	},

	updateMasEntradas: function() {
		this.built_launching_point = jQuery(this.launching_point_id_boilerplate + this.page);
		this.getNextMasEntradasPosition();
		return this.built_launching_point;
	},

	getNextMasEntradasPosition: function() {
		this.next_built_launching_point_position = this.built_launching_point.offset().top;
	},

	updatePageNumber: function() {
		return this.page += 1;
	},

	ajaxCallOnScrollPosition: function() {
		var w = jQuery(window),
			screenHeight = w.height(),
			self = this,
			tops_position,
			ajax_call_position;
		w.on('scroll', function() {
			screenHeight = w.height();
			top_position = w.scrollTop() + screenHeight
			ajax_call_position =  self.next_built_launching_point_position - self.launching_point_offset;
			if ( (top_position  > ajax_call_position) && ! self.ajax_in_process) {
				self.ajax_in_process = true;
				self.ajax();
			}
		});
	},

	ajax: function() {
		var self = this,
			url,
			petition;
		this.updatePageNumber();
		url = this.built_launching_point.find('a').attr('href');
		petition = url + ' ' + this.requested_section_id + this.page;
		this.ajax_container_elem.load(petition, this.onAjaxSuccess(this));
	},

	onAjaxSuccess: function(self) {
		return function(data, textStatus, jqXHR) {
			if (jqXHR.status === 200) {
				jQuery(this).hide();
				jQuery(this).slideDown();
				self.updateMasEntradas();
				self.ajax_in_process = false;
			}
	    };
	}
};
if (jQuery('#infinite-scroll').length > 0) {
	cltvo.infiniteScrollController.init();
}

