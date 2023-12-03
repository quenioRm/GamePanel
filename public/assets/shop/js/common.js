$(function() {
	// init();
	ui.init();
	
});

var ui = {
	init:function() {
		this.gnb.init();
		this.form.init();
		//this.layerpopup.init();
	},
	gnb:{
		init:function() {
			// gnb headroom.js

			this.bt_nav = $('.bt-gnb-nav');
			this.bt_mem = $('.bt-gnb-mem');
			this.glink = $('.gnb nav a, .bt-gnb-mem');
			this.flink = $('.footer a');
			this.lang = $('.bt-change-lang');

			this.tooltip = $('.bt-tooltip');
			this.tooltip_close = $('.tooltip-box .bt-close');

			this.bindEvt();
			var options = {}
			if( ! $('.contents').hasClass('game') ) $("#gnb").headroom(options);
		},
		bindEvt:function() {
			this.bt_nav.on('click',function(e) {
				e.preventDefault();
				$('body').removeClass('gnb-mem-on');
				if( $('body').hasClass('gnb-nav-on') ) {
					ui.hideScroll.off();
					$('body').removeClass('gnb-nav-on');
				} else {
					ui.hideScroll.on();
					$('.gnb-nav nav').css('height', $('html').height() - 50);
					$('body').addClass('gnb-nav-on');
				}
				return false;
			});
			this.bt_mem.on('click',function(e) {
				e.preventDefault();
				$('body').removeClass('gnb-nav-on');
				if( $('body').hasClass('gnb-mem-on') ) {
					ui.hideScroll.off();
					$('body').removeClass('gnb-mem-on');
				} else {
					ui.hideScroll.on();
					$('.gnb-mem nav').css('height', $('html').height() - 50);
					$('body').addClass('gnb-mem-on');
				}
				return false;
			});

			this.tooltip.on('click',function(e) {
				e.preventDefault();
				var t = $(this).attr('href');
				if( $(t).length > 0 ) {
					$(t).toggleClass('open');
					if( $(t).hasClass('open') ) $(t).parents('.box').addClass('box-top');
					else $(t).parents('.box').removeClass('box-top');
				} 
				return false;
			});
			this.tooltip_close.on('click',function(e) {
				e.preventDefault();
				var t = $(this).parents('.tooltip-box');
				t.toggleClass('open');
				if( t.hasClass('open') ) t.parents('.box').addClass('box-top');
				else t.parents('.box').removeClass('box-top');
				return false;
			});

			$this = this;
			/* 2023-02-06 */
			this.footerBind();

			$(window).on('resize.gnb',function() {
				/* 2021-07-26 window.innerWidth 로 변경*/
				$this.footerBind();
				/* 2021-07-26 trigger 제거 */
			});
			/* footer 동작 신규는 동일 click 동작으로 변경 */
			$('.footer_v2 .bt-change-lang').off('click.lang').on('click.lang',function(e) {
				e.preventDefault();
				/* 2021-07-09 */
				$(this).parents('.footer-wrap').toggleClass('on');
				$(this).parents('div.lang').toggleClass('on');
				return false;
			});
			/* 2023-02-20 수정 */
			$('body').on('click',function(e) {
				if( $(e.target).parents('.lang').length == 0 && $('.footer_v2 .bt-change-lang').parent('div.lang').hasClass('on') ) {
					$('.footer_v2 .bt-change-lang').trigger('click.lang');
				}
			});
		},
		/* 2023-02-06 */
		footerBind:function() {
			if( window.innerWidth < 1024 ) {
				if( ! $('.footer').hasClass('footer_v2') ) {
					/* footer 동작 개선 2023-02-06 */
					$('.footer-wrap').off('mouseenter').off('mouseleave');
					/*2021-07-23 bind 이중 제거*/
					$this.lang.off('click.lang').on('click.lang', function (e) {
						e.preventDefault();
						$('.footer-wrap .dimmed').toggle();
						/* 2021-07-09 */
						$('.footer-wrap').toggleClass('on');
						$('div.lang').toggleClass('on');
						return false;
					});
					if ($('body').hasClass('gnb-nav-on')) $('.gnb-nav nav').css('height', $('html').height() - 50);
					if ($('body').hasClass('gnb-mem-on')) $('.gnb-mem nav').css('height', $('html').height() - 50);
				}
			} else {
				/*2021-07-23 bind 이중 제거*/
				/* 2023-02-09 footer 이원화 */
				if( ! $('.footer').hasClass('footer_v2') ) {
					$this.lang.off('.click.lang').on('click.lang',function(e) {
						e.preventDefault();return false;
					});
					$('div.lang').removeClass('on');
					$('.dimmed').hide();

					$('body').removeClass('gnb-mem-on gnb-nav-on');
					ui.hideScroll.off();
					/* footer 동작 개선 2023-02-06 */
					$('.footer-wrap').on('mouseenter',function() {
						$(this).addClass('on');
					}).on('mouseleave',function() {
						$(this).removeClass('on');
					});
				}
			}
		}
		/* // 2023-02-06 */
	},

	hideScroll:{
		on:function() {
			var pr = $(window).outerWidth() - $('#wrap').outerWidth();
			/* 조건 변경 2021-07-11 */
			/* 2021-07-26 class 추가 */
			$('html').addClass('scroll-hidden');
			/* 2021-07-26 딤드 click 이벤트 적용 2021-07-26 */
			$('body').on('scroll touchmove mousewheel', function(e){
				if(window.innerWidth < 1024 ) e.preventDefault();
			}).on('click',function(e) {
				if(  $('html').hasClass('scroll-hidden') && window.innerWidth > 1023  && $(e.target).parents('.gnb-mem').length == 0 && $('body').hasClass('gnb-mem-on') ) {
					$('.bt-gnb-mem').trigger('click');
				}
			});
		},
		off:function(){
			/* 2021-07-26 class 추가 */
			$('html').removeClass('scroll-hidden');
			$('body').off('scroll touchmove mousewheel');
		}
	},
	form:{
		init:function() {
			this.input = $('.fe-input input');
			this.textarea = $('.fe-textarea textarea');
			this.select = $('.fe-select select');
			this.select_label = $('.fe-select label');
			this.input_caps = $('input[type=password]');
			
			this.bt_eye = $('.bt-toggle-eye');
			this.bt_msg_close = $('.bt-close-msg');

			this.bindEvt();
		},
		bindEvt:function() {
			/* input */
			this.input.on('focus.input_all',function() {
				$(this).closest('.fe-input').addClass('on');
				if( $(this).parents('.fe-row').hasClass('has-err') ) {
					$(this).parents('.fe-row').removeClass('has-err');
					$(this).select();
				}
			}).on('blur.input_all',function() {
				if( $(this).val().length > 0 ) return
				$(this).closest('.fe-input').removeClass('on');
			});

			this.input.each(function() {
				if( $(this).val().length > 0 ) $(this).closest('.fe-input').addClass('on');
			});
			$(window).load($.debounce(200, function () {
				if ($('input:-webkit-autofill').length > 0) {
				   $('input:-webkit-autofill').each(function () {
					   if ($(this).val() !== "") {
						   $(this).closest('.fe-input').addClass('on');
					   }
				   });
				}
			}));			

			this.textarea.on('focus.textarea_all',function() {
				$(this).closest('.fe-textarea').addClass('focus');
				if( $(this).parents('.fe-row').hasClass('has-err') ) {
					$(this).parents('.fe-row').removeClass('has-err');
					$(this).select();
				}
			}).on('blur.textarea_all',function() {
				$(this).closest('.fe-textarea').removeClass('focus');
			});


			this.input_caps.on('keydown.input_password,keyup.input_password,click.input_password,focus.input_password,blur.input_password',function(e) {
				var feinput = $(this).parents('.fe-input');
				
				if (e.type === "focus") {
					e.target.trigger('click');
					return;
				}

				if (e.originalEvent.getModifierState && e.originalEvent.getModifierState("CapsLock")) {
					feinput.addClass('caps-on');
				} else {
					feinput.removeClass('caps-on');
				}
			});
			/* password view */
			this.bt_eye.on('click',function() {
				var tp = $(this).siblings('.fe-input');
				if( tp.length > 0 ) {
					if( tp.hasClass('view-pwd') ) {
						tp.find('input').attr('type', 'password').end().removeClass('view-pwd');
					} else {
						tp.find('input').attr('type', 'text').end().addClass('view-pwd');
					}
				}
			});
			/* form msg close button sample */
			this.bt_msg_close.on('click',function(e) {
				e.preventDefault();
				$(this).parents('.form-msg').fadeOut();
				return false;
			});

			this.checkSize();

			$(window).on('resize.form', this.checkSize);

			this.select.on('change', function() {
				console.log($(this).val());
				if( $(this).val() == '' || $(this).find('option:selected').hasClass('default') ) {
					$(this).closest('.fe-select').removeClass('selected');
				} else {
					$(this).closest('.fe-select').addClass('selected');
					if($(this).closest('.fe-select').hasClass('on')) $(this).parents('.fe-row').removeClass('has-err');
				}
			}).on('focus focusin',function(e) {
				$(this).closest('.fe-select').addClass('on');
				if( $(this).parents('.fe-row').hasClass('has-err') ) {
					$(this).parents('.fe-row').removeClass('has-err');
				}
			}).on('blur focusout',function() {
				$(this).closest('.fe-select').removeClass('on');
			}).trigger('change');
		},
		checkSize:function() {
			var md = new MobileDetect(window.navigator.userAgent);
			if( md.mobile() ) {
				$('html').addClass('mobile');
				$('select').each(function() {
					if( $(this).hasClass("select2-hidden-accessible") ) {
						$(this).select2('destroy').off('select2:open').off('select2:close');
					}
				});
			} else {
				$('html').removeClass('mobile');
				var check_close1st = $('#contents').hasClass('close1st-wrap') ? 'close1st-dropdown' : '';
				
				$('select').each(function() {
					if( ! $(this).parents('.fe-select').hasClass('no-style') ) {
						$(this).each(function() {
							var tit = $(this).siblings('label').text();
							var parent = $(this).parents('.fe-select');
							if( tit ) {
								$(this).select2({
									dropdownParent:parent,
									dropdownCssClass:check_close1st,
									minimumResultsForSearch: Infinity,
									placeholder:tit 
								});
							} else {
								$(this).select2({
									dropdownParent:parent,
									dropdownCssClass:check_close1st,
									minimumResultsForSearch: Infinity
								});
							}
						}).on('select2:open',function() {
							$(this).closest('.fe-select').addClass('on');
							if( $(this).parents('.fe-row').hasClass('has-err') ) {
								$(this).parents('.fe-row').removeClass('has-err');
							}
						}).on('select2:close',function() {
							$(this).closest('.fe-select').removeClass('on');
						});
					}
				});

			}
			/*
			if (window.matchMedia("(min-width: 1024px)").matches) {
				$('select').each(function() {
					var tit = $(this).siblings('label').text();
					$(this).select2({
						minimumResultsForSearch: Infinity,
						placeholder:tit 
					});
				}).on('select2:open',function() {
					$(this).closest('.fe-select').addClass('on');
				}).on('select2:close',function() {
					$(this).closest('.fe-select').removeClass('on');
				});
			} else {

			}
			*/
		}
	},
	otp:{
		init:function() {
			this.input = $('.fe-otp .fe-input input');
			this.bindEvt();
		},
		bindEvt:function() {
			this.input.on('keyup', function() {
				var t = $(this).closest('.fe-input').parent('li').next().find('.fe-input input').eq(0);
				if( t.length > 0 ) {
					t.focus();
				}
			}).on('focus',function() {
				if( $(this).val().length > 0 ) $(this).select()
			});
		}
	},
	article:{
		init:function() {
			this.bt = $('.bt-article-top');
			this.ac = $('.mo-top-area');
			this.acw = $('.pc-top-area');

			this.bindEvt();
		},
		bindEvt:function() {
			var $this = this;
			$(window).on('scroll.article_top',function() {
				var wt = $(window).scrollTop();
				if( wt > 0 ) $this.bt.addClass('on');
				else $this.bt.removeClass('on');
				/* 2021-07-26 window.innerWidth 로 변경*/
				if( window.innerWidth > 1023 ) {
					var addpx = 0;
					if( $('.pc-top-area').find('.article-box').length > 0 ) {
						addpx = parseInt($('.pc-top-area').find('.article-box').last().parent('li').css('padding-bottom').replace(/px/g,''))
					} else if( $('.pc-top-area').css('margin-bottom') ) {
						addpx = parseInt($('.pc-top-area').css('margin-bottom').replace(/px/g,'')) + parseInt($('.pc-top-area').css('padding-top').replace(/px/g,''))
					}

					if( wt + $(window).height() > $this.acw.offset().top + $this.acw.outerHeight() ) $this.bt.addClass('stop').css('bottom', wt + $(window).height() - ($this.ac.offset().top + $this.acw.outerHeight(true) - addpx ));
					else $this.bt.removeClass('stop').removeAttr('style');
				} else {
					$this.bt.removeAttr('style');
					if( wt + $(window).height() > $this.ac.offset().top + $this.ac.height() ) $this.bt.addClass('stop');
					else $this.bt.removeClass('stop');
				}
			});
			this.bt.on('click',function(e) {
				e.preventDefault();
				$('html,body').animate({scrollTop:0},300);
				return false;
			});
		}

	}
}



/*
 *  jquery-boilerplate - v4.0.0
 *  A jump-start for jQuery plugins development.
 *  http://jqueryboilerplate.com
 *
 *  Made by Zeno Rocha
 *  Under MIT License
 */
// the semi-colon before function invocation is a safety net against concatenated
// scripts and/or other plugins which may not be closed properly.
;( function( $, window, document, undefined ) {

	"use strict";

		// undefined is used here as the undefined global variable in ECMAScript 3 is
		// mutable (ie. it can be changed by someone else). undefined isn't really being
		// passed in so we can ensure the value of it is truly undefined. In ES5, undefined
		// can no longer be modified.

		// window and document are passed through as local variable rather than global
		// as this (slightly) quickens the resolution process and can be more efficiently
		// minified (especially when both are regularly referenced in your plugin).

		// Create the defaults once
		var pluginName = "lpopup",
			defaults = {};

		// The actual plugin constructor
		function Plugin ( element, options ) {
			this.element = element;

			// jQuery has an extend method which merges the contents of two or
			// more objects, storing the result in the first object. The first object
			// is generally empty as we don't want to alter the default options for
			// future instances of the plugin
			this.settings = $.extend( {}, defaults, options );
			this._defaults = defaults;
			this._name = pluginName;
			this.init();
		}

		// Avoid Plugin.prototype conflicts
		$.extend( Plugin.prototype, {
			init: function() {
				var $element = $(this.element);
				$element.find('[data-close]').on('click',function(e) {
					e.preventDefault();
					$element.removeClass('open');
					ui.hideScroll.off();
					return false;
				});
			},
			open: function() {
				ui.hideScroll.on();
				$(this.element).addClass('open');

			},
			close: function() {
				ui.hideScroll.off();
				$(this.element).removeClass('open');
			}
		} );

		// A really lightweight plugin wrapper around the constructor,
		// preventing against multiple instantiations
		$.fn[ pluginName ] = function( options ) {
			this.each( function() {
				
				if ( !$.data( this, "cp_" + pluginName ) ) {
					$.data( this, "cp_" +
						pluginName, new Plugin( this, options ) );
				} 
				//return $.data( "plugin_" + pluginName )
			} );

			return this;
		};

} )( jQuery, window, document );


/*
	additional service 2022-03-15
	기존 팝업과 다른 구조로 움직여야 합니다.
*/
;( function( $, window, document, undefined ) {

	"use strict";

	// undefined is used here as the undefined global variable in ECMAScript 3 is
	// mutable (ie. it can be changed by someone else). undefined isn't really being
	// passed in so we can ensure the value of it is truly undefined. In ES5, undefined
	// can no longer be modified.

	// window and document are passed through as local variable rather than global
	// as this (slightly) quickens the resolution process and can be more efficiently
	// minified (especially when both are regularly referenced in your plugin).

	// Create the defaults once
	var pluginName = "lpopup2",
		defaults = {};

	// The actual plugin constructor
	function Plugin ( element, options ) {
		this.element = element;

		// jQuery has an extend method which merges the contents of two or
		// more objects, storing the result in the first object. The first object
		// is generally empty as we don't want to alter the default options for
		// future instances of the plugin
		this.settings = $.extend( {}, defaults, options );
		this._defaults = defaults;
		this._name = pluginName;
		this.init();
	}

	// Avoid Plugin.prototype conflicts
	$.extend( Plugin.prototype, {
		init: function() {
			var $element = $(this.element);
			$element.find('[data-close]').on('click',function(e) {
				e.preventDefault();
				$element.removeClass('open');

				$('html').removeClass('scroll-hidden2');
				$('body').off('scroll touchmove mousewheel');


				return false;
			});
		},
		open: function() {
			if( $('html').hasClass('scroll-hidden') ) {
				$('body').trigger('click');
				$('html').removeClass('scroll-hidden');

			}
			$('html').addClass('scroll-hidden2');
			$('body').on('scroll touchmove mousewheel', function(e){
				if(window.innerWidth < 1024 ) e.preventDefault();
			});
			$(this.element).addClass('open');
			/* scrollbar 갱신 */
			var scrollbar = Scrollbar.getAll();
			$.each(scrollbar, function(a,b) {
				if( b != undefined && $(b.containerEl).hasClass('lp-scroll-cont') ) {
					b.update();
				}
			});

		},
		close: function() {
			$('html').removeClass('scroll-hidden2');
			$('body').off('scroll touchmove mousewheel');

			$(this.element).removeClass('open');
		}
	} );

	// A really lightweight plugin wrapper around the constructor,
	// preventing against multiple instantiations
	$.fn[ pluginName ] = function( options ) {
		this.each( function() {

			if ( !$.data( this, "cp_" + pluginName ) ) {
				$.data( this, "cp_" +
					pluginName, new Plugin( this, options ) );
			}
			//return $.data( "plugin_" + pluginName )
		} );

		return this;
	};

} )( jQuery, window, document );