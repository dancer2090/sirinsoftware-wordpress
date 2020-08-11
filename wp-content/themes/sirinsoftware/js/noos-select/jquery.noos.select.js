// JavaScript Document

// by noos

if(typeof jQuery != "undefined") {
	(function($) {
		var device = $(window).width() <= 1024 && $(window).width() >= 768 ? 'tablet' : $(window).width() < 768 ? 'mobile' : 'desctop';
		var notice = false;
		var methods = {
			init:function(options){
				this.each(function(){
					if(!$(this).parent().hasClass('noos-select')) {
						var t = this;

						var s = $.extend({
							lang:'ru',
							search:true,
							autohide:20000,
							mobile:false,
							centerOptions:true,
							showElements:5, // 0 все элементы
							texts:{
								ua:{
									selectedSomeOptions:'Обрано декілька параметрів',
									selectedNone:'Не обрадно жодного параметру'
								},
								en:{
									selectedSomeOptions:'Selected a few options',
									selectedNone:'No selected options'
								},
								ru:{
									selectedSomeOptions:'Выбрано несколько параметров',
									selectedNone:'Не выбрано ни одного параметра'
								}
							},
							scroll:{
								axis:"y"
							}
						}, options);
						//alert(window.navigator.userAgent);
						if(/Android/.test(window.navigator.userAgent) || /Mobile/.test(window.navigator.userAgent)) s.mobile = true;
						s = $.extend(s, $(t).data()); $(t).data(s);
						var $o = {
							s:false,
							sa:false,
							v:false,
							l:false,
							a:false,
							t:$(t),
							f:$(t).closest('form')
						};
						var v = '';
						var $selected = $o.t.find('option:selected');
						if($selected.is(':disabled')){
							if($selected.index() == 0) {
								$o.t.find('option').eq(1).prop('selected', 'true');
							} else {
								$o.t.find('option').eq(0).prop('selected', 'true');
							}
						}
						if($o.t.find('option:selected').size()) {
							if($o.t.find('option:selected').size()>1) {
								v = s.texts[s.lang].selectedSomeOptions;
							} else {
								v = $o.t.find('option:selected').text()
							}
						}

						var select = '' +
							'<div class="select noos-select'+($o.t.attr('class')?' '+$o.t.attr('class'):'')+(s.mobile?' mobile':'')+'" id="select-'+$o.t.attr('id')+'">' +
								'<div class="v">'+v+'</div>' +
								'<div class="a"></div>';
						if(!s.mobile){
							select += '<div class="l">' +
										'<div class="a"></div>' +
											($o.t.find('option').size()> s.showElements?'<div class="select-scroll">':'')+
											'<ul>';

							$o.t.find('option').each(function(){
								select += '<li class="'+($(this).is(':selected') && !$(this).is(':disabled')?'selected':'')+($(this).is(':disabled')?' disabled':'')+'">' + $(this).text() + '</li>';
							});

							select += '' +
										'</ul>' +
										($o.t.find('option').size()> s.showElements?'</div>':'')+
									'</div>';
						}
						select += '</div>';
						$o.t.after(select);

						
						$o.s = $o.t.next();
						$o.sa = $o.s.find('> .a'); 
						$o.v = $o.s.find('> .v');
						$o.l = $o.s.find('> .l');
						$o.a = $o.l.find('.a');
						
						$o.t.appendTo($o.s);
						$o.t = $o.s.find('> select');
						if($o.t.find('option').size()> s.showElements){
							$o.l.find('.select-scroll').css({
								height: $o.l.find('li').outerHeight() * s.showElements
							}).mCustomScrollbar({
								axis: s.scroll.axis,
								theme:'zoolook-scroll'
							});
						}
					};
				});
				
				if(!$('body').hasClass('noos-select-init')) {
					
					$('body').addClass('noos-select-init');
					
					$(document).on('keydown', function(e){
						
						if(e.keyCode == 9) {
							if($('.noos-select.focus').size() && (!$(e.target).is('input') && !$(e.target).is('textarea'))){
								var $form = $('.noos-select.focus').closest('form');
								var $fields = $('input, textarea, .noos-select', $form);
								var i = $fields.index($('.noos-select.focus'));
								$('.noos-select.focus').removeClass('focus');
								if(e.shiftKey) {
									if($fields.eq(i-1).size()) {
										e.preventDefault();
										$fields.eq(i-1).trigger('focus');
									}
								} else {
									if($fields.eq(i+1).size()) {
										e.preventDefault();
										$fields.eq(i+1).trigger('focus');
									}
								}
							}
						}
						if($('.noos-select.focus').size()) {
							if(e.keyCode == 40 || e.keyCode == 39) {
								e.preventDefault();
								if(!$('.noos-select.focus').hasClass('multiple')){
									methods.set.call($('.noos-select.focus select').get(0), 'next');
								} else {
									methods.show.call($('.noos-select.focus select').get(0), 'prev');
								}
							}
							if(e.keyCode == 37 || e.keyCode == 38) {
								e.preventDefault();
								if(!$('.noos-select.focus').hasClass('multiple')){
									methods.set.call($('.noos-select.focus select').get(0), 'prev');
								} else {
									methods.show.call($('.noos-select.focus select').get(0));
								}
							}
							if(e.keyCode == 13) {
								if($('.noos-select.focus').hasClass('show')){
									if(!$('.noos-select.focus').hasClass('multiple')){
										methods.hide.apply($('.noos-select.show select').get(0));
									}
								} else {
									methods.show.call($('.noos-select.focus select').get(0));
								}
							}
						}
						if($('.noos-select.show').size()){
							if(e.keyCode == 40) { // Down
								
							}
							if(e.keyCode == 38) { // Up
								
							}
							if(e.keyCode == 27 || e.keyCode == 27) {
								e.preventDefault();
								methods.hide.apply($('.noos-select.show select').get(0));
							}
						}
					}).on('keydown', 'input, textarea', function(e){
						if(e.keyCode == 9) {
							var $form = $(this).closest('form');
							var $fields, i;
							
							if($form.size()) {
								$fields = $('input, textarea, .noos-select', $form);
								i = $fields.index(this);
								if(!e.shiftKey) {
									if($fields.eq(i+1).size() && $fields.eq(i+1).hasClass('noos-select') ) { /// --------
										e.preventDefault();
										$fields.eq(i+1).addClass('focus');
										$(this).trigger('blur');
									}
								} else {
									if($fields.eq(i-1).size() && $fields.eq(i-1).hasClass('noos-select') ) { /// --------
										e.preventDefault();
										$fields.eq(i-1).addClass('focus');
										$(this).trigger('blur');
									}
								}
							}
						}
					}).on('click', function(e){
						if(!$(e.target).closest('.noos-select').size()) {
							$('.noos-select.focus').removeClass('focus');
							$('.noos-select.show').removeClass('show');
						}
					}).on('change', '.noos-select select', function(){
						var $o = {
							t:$(this),
							s:$(this).parent(),
							sa:$('> .a', $(this).parent()),
							v:$('> .v', $(this).parent()),
							l:$('> .l', $(this).parent()),
							a:$('> .l > a', $(this).parent())
						};
						var s = $o.t.data();
						if($('option:selected', this).size()){
							if($('option:selected', this).size() == 1) {
								$o.v.text($('option:selected', this).text());
							} else {
								$o.v.text(s.texts[s.lang].selectedSomeOptions);
							}
						} else {
							$o.v.text(s.texts[s.lang].selectedNone);
						}
						$('option', this).each(function(index, element) {
							var $el = $('li', $o.l).eq($(this).index());
							if($(this).is(':selected')) { $el.addClass('selected') } else { $el.removeClass('selected') }
							//console.log($el, $(this).is(':selected'));
						});
					}).on('click', '.noos-select', function(e){
						if($(e.target).closest('.l').size()) {
							if($(e.target).is('li')){
								var i = $(e.target).index();
								if(!$('select option', this).eq(i).is(':disabled')){
									$('select option', this).eq(i).prop('selected', !$('select option', this).eq(i).is(':selected'));
									$('select', this).trigger('change');
									if(!$(this).hasClass('multiple')) {
										methods.hide.call($('select',this).get(0));
									}
								}
							}
						} else {
							if($(this).hasClass('show')) {
								methods.hide.call($('select',this).get(0));
							} else {
								methods.show.call($('select',this).get(0));
							}
						}
					});
				}
			},
			checkSelect:function(){
				var $o = {
					t:$(this),
					s:$(this).parent(),
					sa:$('> .a', $(this).parent()),
					v:$('> .v', $(this).parent()),
					l:$('> .l', $(this).parent()),
					a:$('> .l > a', $(this).parent())
				};
				var s = $o.t.data();
			},
			refresh:function(){
				var $o = {
					t:$(this),
					s:$(this).parent(),
					sa:$('> .a', $(this).parent()),
					v:$('> .v', $(this).parent()),
					l:$('> .l', $(this).parent()),
					a:$('> .l > a', $(this).parent())
				};
				var s = $o.t.data();
			},
			createScroll:function(){
				
			},
			show:function(){
				var $o = {
					t:$(this),
					s:$(this).parent(),
					sa:$('> .a', $(this).parent()),
					v:$('> .v', $(this).parent()),
					l:$('> .l', $(this).parent()),
					a:$('> .l > a', $(this).parent())
				};
				var s = $o.t.data();
				
				if(methods.checkSelect.call(this)){
					methods.refresh.call(this);
					methods.createScroll.call(this);
				}
				if($('.noos-select.show').size() || $('.noos-select.focus').size()) $('.noos-select').removeClass('show focus');
				//$o.l.css({height:$o.l.get(0).scrollHeight});
				$o.s.addClass('show focus');
				if($o.l.find('.select-scroll').size()){
					//console.log($o.l.find('li.selected'), $o.l.find('li.selected').position());

					var pTop = 0;
					$o.l.find('li.selected').prevAll().each(function(){
						pTop += $(this).outerHeight();
					});

					$o.l.find('.select-scroll').mCustomScrollbar('scrollTo', pTop,{
						scrollInertia:0
					});
				}
			},
			hide:function(){
				var $o = {
					t:$(this),
					s:$(this).parent(),
					sa:$('> .a', $(this).parent()),
					v:$('> .v', $(this).parent()),
					l:$('> .l', $(this).parent()),
					a:$('> .l > a', $(this).parent())
				};
				//$o.l.css({height:0});
				$o.s.removeClass('show');
			},
			set:function(d){
				var $o = {
					t:$(this),
					s:$(this).parent(),
					sa:$('> .a', $(this).parent()),
					v:$('> .v', $(this).parent()),
					l:$('> .l', $(this).parent()),
					a:$('> .l > a', $(this).parent())
				}
				var s = $o.t.data();
				if(d=='next'){
					if($('option:selected', this).next().size()) {
						$('option:selected', this).next().prop('selected',true);
					}
				} else {
					if($('option:selected', this).prev().size()){
						$('option:selected', this).prev().prop('selected',true);
					}
				}
				$(this).trigger('change');
				if($o.l.find('.select-scroll').size()){
					$o.l.find('.select-scroll').mCustomScrollbar('scrollTo', $o.l.find('.selected').eq(0));
				}
			}
		};
		
		$.fn.noosSelect = function(method){
			if ( methods[method] ) {
				return methods[method].apply( this, Array.prototype.slice.call( arguments, 1 ));
			} else if ( typeof method === 'object' || ! method ) {
				return methods.init.apply( this, arguments );
			} else {
				$.error( 'Метод с именем ' +  method + ' не существует для jQuery.noosSelect' );
			}
		};

	})(jQuery);
}