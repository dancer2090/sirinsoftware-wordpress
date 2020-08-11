jQuery.noConflict();

(function($){
	
	
	$(document).ready(function(){	
		initHelpers();
		initPageParams();
		initGoogleMap();
		initContactsGoogleMap();
		initAnimate();
		initPopups();
		initBlogMainPage();
		initArticlePage();
		initSearchPage();
	});
	
	
	
	function initHelpers(){		
		$(window).on("load resize", function(){
			$("html").attr("w", window.innerWidth);
		});	
		
		$("select").noosSelect({
			showElements: 5
		});
		
		$("img.lazy").lazyload();
		
		$('[data-scrollable="y"]').mCustomScrollbar();		
		
		$("[hint]").poshytip({
			alignTo: 'target',
			alignX: 'center',
			alignY: 'top',
			offsetX: 0,
			offsetY: 5,		
			showOn: 'none',
			liveEvents: true, 
			
			content: function(){return $(this).attr("hint")}
		});		

		$(".parallax").each(function(){
			var $parallaxBlock = $(this);
			if ( window.innerWidth < 1000 ) return;
			$(window).on("scroll", function() {
				var yPos = ($parallaxBlock.offset().top - $(window).scrollTop())/5;
				$parallaxBlock.css("background-position", "center "+ yPos + "px");
			}).trigger("scroll");
		});	
		
		// .input-wrap
		$(window).on("load", function(){
			$(".input-wrap .placeholder").each(function(){
				$(this).closest(".field").removeClass("error");					
				if ( $(this).siblings("input").val().length > 0 ) {
					$(this).addClass("small");
				} else {
					$(this).removeClass("small");
				}
			});		
		}).trigger("load");
		$(document).on("focus", ".input-wrap input", function(e){
			$(this).prev(".placeholder").addClass('small').closest(".field").addClass("focus").removeClass("error");
		})
		.on("blur", ".input-wrap input", function(e){
			var value = $(this).val();
			var empty = false;
			// if ( (/phone/i).test($(this).attr('name')) ) {
			// 	if ( !(/^\(\d\d\d\)-\d\d\d-\d\d-\d\d$/i).test(value) ) {
			// 		empty = true;
			// 	}
			// } else 
			if ( $(this).attr('name')=='birthday' ) {
				if ( !(/^\d\d\.\d\d\.\d\d\d\d$/i).test(value) ) {
					empty = true;
				}
			} else if ( !$.trim(value).length ) {
				empty = true;
			}
			if (empty) {
				$(this).val('').prev(".placeholder").removeClass("small");
			}
			$(this).closest(".field").removeClass("focus");
		});	
			
		// .textarea-wrap
		$(window).on("load", function(){
			$(".textarea-wrap .placeholder").each(function(){
				$(this).closest(".field").removeClass("error");
				if ( $(this).siblings("textarea").val().length > 0 ) {
					$(this).addClass("small");
				} else {
					$(this).removeClass("small");
				}
			});
		}).trigger("load");
		$(document).on("input change propertychange cut paste keyup mouseup", ".textarea-wrap textarea", function(){
			var value = $(this).val();
			if ( $.trim(value).length ) {
				$(this).closest(".field").addClass("fill");
			} else {
				$(this).closest(".field").removeClass("fill");			
			}		   
		})
		.on("focusin", ".textarea-wrap textarea", function(){
			$(this).prev(".placeholder").addClass('small').closest(".field").addClass("focus").removeClass("error");
		})
		.on("focusout", ".textarea-wrap textarea", function(e){
			var value = $(this).val();			
			if ( !$.trim(value).length ) {
				$(this).val('').prev(".placeholder").removeClass("small").closest(".field").removeClass("fill");
			}
			$(this).closest(".field").removeClass("focus");
		});	
		
		// .btn-type-checkbox
		$(".btn-type-checkbox").each(function(){
			var text1 = $(this).data("default-text") || '',
				text2 = $(this).data("checked-text") || '',
				text3 = $(this).data("default-hover-text") || '',
				text4 = $(this).data("checked-hover-text") || '';
			if ($(this).hasClass("checked")) {
				if ( text2.length )  $("span", $(this)).html(text2);
			} else {
				if ( text1.length )  $("span", $(this)).html(text1);
			}
			$(this).on("click", function(){
					$(this).toggleClass("checked");
					if ($(this).hasClass("checked")) {
						if ( text2.length )  $("span", $(this)).html(text2);
					} else {
						if ( text1.length )  $("span", $(this)).html(text1);
					}
				})
				.on("mouseenter", function(){
					if ($(this).hasClass("checked")) {
						if ( text4.length ) $("span", $(this)).html(text4);
					} else {
						if ( text3.length ) $("span", $(this)).html(text3);
					}
				})
				.on("mouseleave", function(){
					if ($(this).hasClass("checked")) {
						if ( text2.length ) $("span", $(this)).html(text2);
					} else {
						if ( text1.length ) $("span", $(this)).html(text1);
					}
				});
		});
		
		// .btn-type-radio
		$(".btn-type-radio").each(function(){
			var text1 = $(this).data("default-text") || '',
				text2 = $(this).data("checked-text") || '',
				text3 = $(this).data("default-hover-text") || '',
				text4 = $(this).data("checked-hover-text") || '';
			if ($(this).hasClass("checked")) {
				if ( text2.length )  $("span", $(this)).html(text2);
			} else {
				if ( text1.length )  $("span", $(this)).html(text1);
			}
			$(this).on("click", function(){
					$(this).addClass("checked").siblings('.btn-type-radio').removeClass("checked");
					$(this).parent().addClass("checked").siblings().removeClass("checked").find(".btn-type-radio.checked").removeClass("checked");
					if ( text2.length )  $("span", $(this)).html(text2);
				})
				.on("mouseenter", function(){
					if ($(this).hasClass("checked")) {
						if ( text4.length ) $("span", $(this)).html(text4);
					} else {
						if ( text3.length ) $("span", $(this)).html(text3);
					}
				})
				.on("mouseleave", function(){
					if ($(this).hasClass("checked")) {
						if ( text2.length ) $("span", $(this)).html(text2);
					} else {
						if ( text1.length ) $("span", $(this)).html(text1);
					}
				});
		});
		
		// .btn-target-toggle
		$(document).on('click', '.btn-target-toggle', function(){
			var trg = $(this).data('target') || '';
			if ($(trg).is(":animated")) return;
			$(this).toggleClass('selected');
			if ( $(this).hasClass("selected") ) {
				$(trg).animate({opacity: 'show', height: 'show'});	
			} else {
				$(trg).animate({opacity: 'hide', height: 'hide'});				
			}
		});	
		
		// .btn-scroll-to
		$(document).on("click", ".btn-scroll-to", function(e){
			e.preventDefault(); 			
			var $trg = $($(this).attr("href")) || '', 
				t = $(".toolbar").outerHeight() || 0;			
			if ( $trg.length ) {
				$("html, body").animate({scrollTop: $trg.offset().top - t}, 600); 
			}
		});	
	}
	
	
		
	function initPageParams(){
		
		$(window).on("scroll resize", function(){
			if ( window.pageYOffset > 50 && window.innerWidth > 999 ) {
				$("body").addClass("scrolled");
				//$("body").removeClass("sidebar-open contacts-top-open");
			} else {
				$("body").removeClass("scrolled");
					
			}
			if ( window.innerWidth < 1000 ) {
				$("body").removeClass("contacts-top-open");	
			}			
		});
			
		
		// .toolbar .menu
		$(document).on("click", ".sidebar > .btn-menu", function(){
			$("body").toggleClass("sidebar-open");
		})
		.on("click touchstart", function(e){
			if ( $(e.target).closest("body.sidebar-open > .overlay").length ) {
				$("body").removeClass("sidebar-open");	
			}
		});
		
		
		// .toolbar .menu .btn-menu
		$(window).on("load scroll resize", function(){
			var bLeft = $(".toolbar .menu .btn-menu").offset().left;
			$("body > .sidebar > .btn-menu").css({left: bLeft + "px"});				
		});
		
		
		// .toolbar .menu .sidebar
		$(document).on("click", "body > .sidebar .menu-1 .started .btn", function(){
			$(this).closest(".menu-1").slideUp().siblings(".menu-2").slideDown();
		})
		.on("click", "body > .sidebar .menu-2 .back .btn", function(){
			$(this).closest(".menu-2").slideUp().siblings(".menu-1").slideDown();				
		});	
		
		
		// .blog-main .head .categories
		$(document).on("click", ".blog-main .head .categories .btn", function(){
			var posLeft = $(".blog-main .head .categories").offset().left - 80;
			$("body").addClass("sidebar-blog-categories-open");
		})
		.on("click touchstart", function(e){
			if ( $(e.target).closest("body.sidebar-blog-categories-open > .overlay").length ) {
				$("body").removeClass("sidebar-blog-categories-open");
			}
		});	
		
		
		//.sidebar-blog-categories .btn.close
		$(document).on("click", ".sidebar-blog-categories .btn.close", function(){
			$("body").removeClass("sidebar-blog-categories-open");
		})
		
		
		// .blog-main .head .searh .input-wrap *  ( показать .blog-search-modal )
		$(".blog-main .head .searh .input-wrap *").on("click focus", function(e){
			e.preventDefault();			
			$("html, body").animate({scrollTop: 120}, 600);
			$("body").addClass("blog-search-modal-open");
			$(".blog-search-modal .searh .input-wrap input").focus();
		})
		
		
		// .blog-search-modal .btn.close
		$(".blog-search-modal .btn.close").on("click", function(e){
			e.preventDefault();
			$("body").removeClass("blog-search-modal-open");
			//$(".blog-search-modal .searh .input-wrap input").val("");
		})
		
		
		// .blog-search-modal .inner
		// .blog-search-modal .searh .dropdown
		$(window).on("load scroll resize", function(){
			if ( $(".blog-main .head .searh").length ) {			
				var t = parseInt($(".blog-main .head .searh").offset().top);
				var h = parseInt($(".blog-main .head .searh").outerHeight());
				var itemHeight = 53; // это высота .blog-search-modal .searh .dropdown li
				var hDrop = Math.floor((window.innerHeight + $(window).scrollTop() - (t + h)) / itemHeight) * itemHeight;
				$(".blog-search-modal .inner").css("padding-top", t + "px");
				$(".blog-search-modal .searh .dropdown").css("height", hDrop + "px");
			}				
		}).trigger("load");
		
		
		
		// .footer .btn-page-begin
		$(".footer .btn-page-begin").each(function(){
			var $btn = $(this);
			var left = 0;
			var right = 0;
			var bottom = 0;
			$(window).on("load scroll resize", function(){			
				var p1 = $(".footer .right").offset().top + $(".footer .right").outerHeight();
				var p2 = $(window).scrollTop() + window.innerHeight;
				if ( $(window).scrollTop() > window.innerHeight/2 ) {
					$btn.addClass("show");
				} else {
					$btn.removeClass("show");
				}		
				if ( window.innerWidth >= 600 ) {					
					if ( window.innerWidth >= 1000 ) {
						left = $(".footer > .inner").offset().left + $(".footer > .inner").outerWidth() - 70 + "px";
						right = "auto";	
					} else {
						left = "auto";	
						right = 0;
					}						
					if ((p2 - p1) < 0) {
						bottom = 0;	
					} else {
						bottom = p2 - p1 + "px";		
					}
					$btn.css({
						"left": left,
						"bottom": bottom, 
						"right": right
				});
				} else {
					$btn.css({
						"left": "auto",
						"bottom": 0,
						"right": 0
					});
				}				
			});			
		}).on("click", function(e){
			e.preventDefault(); 			
			$("html, body").animate({scrollTop: 0}, 600); 
		});	
		
		
		
				
			
		// .contacts-top
		(function(){	
			$(".toolbar > .inner > .contacts .btn").on("click", function(){
				$("body").toggleClass("contacts-top-open");	
				setContactsTopParams();				
			});
						
			$(document).on("click", function(e){
				if ( !$(e.target).closest(".contacts-top").length  &&  !$(e.target).closest(".toolbar > .inner > .contacts .btn").length ) {
					$("body").removeClass("contacts-top-open");	
				}
			});
					
			$(window).on("load scroll resize", function(){				
				setTimeout(setContactsTopParams, 300);								
			}).trigger("load");	
			
			function setContactsTopParams(){
				var arrowLeftPos = $(".toolbar > .inner > .contacts .btn .ico-bottom-1").offset().left || 0;
				var maxInnerHeight = 0;
				$(".contacts-top .tail").css("left", arrowLeftPos - 6 + "px");								
				$(".contacts-top [class*='contacts-'] .list")
					.css("height", "auto")
					.each(function(){
						maxInnerHeight = $(this).outerHeight() > maxInnerHeight ? $(this).outerHeight() : maxInnerHeight;					
					})
					.css("height", maxInnerHeight + "px");		
			}					
		})();
		
		
		// .video-main
		(function(){
			//$("#bgrVideo").mb_YTPlayer();	
			$(".video-main video").on("canplay", function(){
				$(".video-main").addClass("loaded");
			});			
			
			$(window).on("load resize", function(){
				setVideoHeader();				
			}).trigger("load");
			
			function setVideoHeader(){
				var rateVideo = 16/9;				
				var rateWindow = window.innerWidth / window.innerHeight;				
				if ( rateWindow >= rateVideo ) {
					$(".video-main video").css({
						"width": window.innerWidth + "px",
						"height": ""
					});		
				} else {
					$(".video-main video").css({
						"width": "",
						"height": window.innerHeight + "px"
					});					
				}
			}
		})();
				
		
		// .slider-main
		(function(){
			$(window).on("load resize", function(){
				setSlider();		
			}).trigger("load");							
			function setSlider(){
				$(".slider-main .slider ul").each(function(){										
					$(this).carouFredSel({
						width: "100%",
						items: 1,
						auto: {
							//play: false,
							//pauseOnHover: true,	
							duration: 800,
							timeoutDuration: 8000												 
						},
						swipe: {
							onTouch: true						
						},
						pagination: $(this).closest(".slider-main").find(".slider-paginator")
					});
				});
			}
		})();
		
		
		// .divisions - items Height
		(function(){
			var maxInnerHeight = 0;	
			$(window).on("load resize", function(){
				if ( window.innerWidth >= 1000 ){
					$(".divisions .item .center p")
						.css("height", "auto")
						.each(function(){
							maxInnerHeight = $(this).outerHeight() > maxInnerHeight ? $(this).outerHeight() : maxInnerHeight;					
						})
						.css("height", maxInnerHeight + "px");
				} else {
					$(".divisions .item .center p").css("height", "auto");				
				}			
			}).trigger("load");	
		})();
		
		
		// .expertise .slider
		(function () {
			$(window).on("load resize", function () {
				setSlider();
			}).trigger("load");
			function setSlider() {
				$(".expertise .slider").each(function () {
					var g = 0;
					var gi = 0;
					$(this).find('li').each(function () {
						$(this).data('group', gi);
						if ($(this).hasClass('titles')) {
							gi++;
						}
					});
				}).each(function () {
					var $slider = $(this).find("ul"),
						$btnPrev = $(this).find(".btn-slider-prev"),
						$btnNext = $(this).find(".btn-slider-next");
					$slider.carouFredSel({
						width: "variable",
						auto: {
							play: false,
							pauseOnHover: true,
							duration: 500,
							timeoutDuration: 5000
						},
						swipe: {
							onTouch: true
						},
						prev: {
							button: $btnPrev,
							onAfter: function (data) {
								var $el = data.items.visible.eq(0);
								var g = $el.data('group');
								var title = '';
								$(this).find('li').each(function(){
									if( $(this).data('group') == g && $(this).data('group-title') ) {
										title = $(this).data('group-title');
									}
								});
								if (title) {
									$(this).closest('.slider').prev('h3').text(title);
								}
							}
						},
						onCreate: function (p) {
							//console.log(this);
							var c = p.items.size();
							var gw = 0;
							var gc = 0;
							var groups = {};
							var self = this;
							var wrapper_width = $(this).parent('.caroufredsel_wrapper').width();
							//3
							var logo_w = $(this).find('li.logo').outerWidth(true);

							$(this).find('li.empty').remove();

							$(this).find('li').each(function () {
								var g = $(this).data('group');

								if (!groups[g]) groups[g] = {
									els: [],
									w: 0
								};
								groups[g].els.push(this);
								if (groups[g].w + $(this).outerWidth(true) > wrapper_width) {
									groups[g].w = 0;
								}
								groups[g].w += $(this).outerWidth(true);
							});

							$.each(groups, function (k, v) {
								var add = 0;
								var dif = 0;
								if (v.w < wrapper_width) {
									dif = wrapper_width - v.w;
								} else if (v.w > wrapper_width) {
									dif = wrapper_width * (Math.ceil(v.w / wrapper_width)) - v.w;
								}
								//console.log(k, dif, v.w, wrapper_width);
								if (dif >= logo_w) {
									$(v.els[v.els.length - 1]).after('<li class="logo empty" style="width: ' + (dif - 40) + 'px;"></li>');
								}
							});


						},
						next: {
							button: $btnNext,
							items: function (c) {
								return c;
							},
							onBefore: function () {
							},
							onAfter: function (data) {
								var $el = data.items.visible.eq(0);
								var title = $el.data('group-title');
								//console.log($el, title);
								if (title) {
									$(this).closest('.slider').prev('h3').text(title);
								}
							},
							onEnd: function () {
							}
						}
					}).on('next', function () {

					}).parent().css("margin", "auto");
				});
			}
		})();
		
		
		// .clients .slider
		(function(){
			$(window).on("load resize", function(){
				setSlider();			
			}).trigger("load");							
			function setSlider(){	
				$(".clients .slider").each(function(){
					var $slider = $(this).find("ul"),
						$btnPrev = $(this).find(".btn-slider-prev"),
						$btnNext = $(this).find(".btn-slider-next");
					$slider.carouFredSel({ 
						width: "variable",
						auto: {
							play: false,
							pauseOnHover: true,	
							duration: 500,
							timeoutDuration: 5000												 
						},
						swipe: {
							onTouch: true						
						},
						prev: $btnPrev,
						next: $btnNext 
					}).parent().css("margin", "auto");;
				});
			}
		})();
		
		
		// .newpost .items-wrap .item-inner -> Height
		(function(){
			$(window).on("load resize", function(){
				setHeight();			
			}).trigger("load");	
			function setHeight(){
				$(".newpost .items-wrap").each(function(){  	
					var $list = $(this),
						$item = $(".item", $list), 
						countInStr = Math.floor(parseInt($list.width()) / (parseInt($item.outerWidth()) + parseInt($item.css("margin-left")) + parseInt($item.css("margin-right")))),
						strCount =  Math.ceil($item.length / countInStr);
					while ( strCount-- ) { 				    
						var maxHeight = 0;					 		
						$item.slice( parseInt(strCount * countInStr), parseInt(strCount * countInStr + countInStr) )
							.each(function(){
								$(".item-inner", this).css("height", "auto"); 				
								maxHeight =  $(".item-inner", this).height() > maxHeight ? $(".item-inner", this).height() : maxHeight;
							})
							.each(function(){ 
								$(".item-inner", this).css("height", maxHeight + "px"); 
							});		
					}
				});
			}
		})();
		
		
		// .contacts .contacts-1 .top, 
		// .contacts .contacts-2 .top
		$(window).on("load resize", function(){
			var width = $(".contacts [class*='contacts-']").outerWidth(),
				height1 = 0,
				height2 = 0,
				maxHeight = 0,
				clipPathLeft,
				clipPathRight,
				webkitClipPathLeft,
				webkitClipPathRight,
				pntLeft = [],
				pntRight = [];									
				
			if ( window.innerWidth >= 1000 ) {
				$(".contacts [class*='contacts-'] .top")
					.css("height", "auto")
					.each(function(){
						maxHeight = $(this).outerHeight() > maxHeight ? $(this).outerHeight() : maxHeight;					
					})
					.css("height", maxHeight + "px");
			} else {
				$(".contacts [class*='contacts-'] .top").css("height", "auto");
			}
			
			height1 = $(".contacts .contacts-1 .top").outerHeight();
			height2 = $(".contacts .contacts-2 .top").outerHeight();
			
			pntLeft[0] = {"x": 0, "y": 0};
			pntLeft[1] = {"x": width, "y": 0};
			pntLeft[2] = {"x": width, "y": height1};
			pntLeft[3] = {"x": width/2+30, "y": height1};
			pntLeft[4] = {"x": width/2, "y": height1-30};
			pntLeft[5] = {"x": width/2-30, "y": height1};
			pntLeft[6] = {"x": 0, "y": height1};
			
			pntRight[0] = {"x": 0, "y": 0};
			pntRight[1] = {"x": width, "y": 0};
			pntRight[2] = {"x": width, "y": height2};
			pntRight[3] = {"x": width/2+30, "y": height2};
			pntRight[4] = {"x": width/2, "y": height2-30};
			pntRight[5] = {"x": width/2-30, "y": height2};
			pntRight[6] = {"x": 0, "y": height2};
			
			clipPathLeft =  pntLeft[0].x + " " + pntLeft[0].y + ", " + 
							pntLeft[1].x + " " + pntLeft[1].y + ", " + 
							pntLeft[2].x + " " + pntLeft[2].y + ", " + 
							pntLeft[3].x + " " + pntLeft[3].y + ", " + 
							pntLeft[4].x + " " + pntLeft[4].y + ", " + 
							pntLeft[5].x + " " + pntLeft[5].y + ", " + 
							pntLeft[6].x + " " + pntLeft[6].y ;
					   
			clipPathRight = pntRight[0].x + " " + pntRight[0].y + ", " + 
							pntRight[1].x + " " + pntRight[1].y + ", " + 
							pntRight[2].x + " " + pntRight[2].y + ", " + 
							pntRight[3].x + " " + pntRight[3].y + ", " + 
							pntRight[4].x + " " + pntRight[4].y + ", " + 
							pntRight[5].x + " " + pntRight[5].y + ", " + 
							pntRight[6].x + " " + pntRight[6].y ;
					   
			webkitClipPathLeft = pntLeft[0].x + "px" + " " + pntLeft[0].y + "px" + ", " +  
								 pntLeft[1].x + "px" + " " + pntLeft[1].y + "px" + ", " +
								 pntLeft[2].x + "px" + " " + pntLeft[2].y + "px" + ", " +
								 pntLeft[3].x + "px" + " " + pntLeft[3].y + "px" + ", " +
								 pntLeft[4].x + "px" + " " + pntLeft[4].y + "px" + ", " +
								 pntLeft[5].x + "px" + " " + pntLeft[5].y + "px" + ", " +
								 pntLeft[6].x + "px" + " " + pntLeft[6].y + "px";
							 
			webkitClipPathRight = pntRight[0].x + "px" + " " + pntRight[0].y + "px" + ", " +  
								  pntRight[1].x + "px" + " " + pntRight[1].y + "px" + ", " +
								  pntRight[2].x + "px" + " " + pntRight[2].y + "px" + ", " +
								  pntRight[3].x + "px" + " " + pntRight[3].y + "px" + ", " +
								  pntRight[4].x + "px" + " " + pntRight[4].y + "px" + ", " +
								  pntRight[5].x + "px" + " " + pntRight[5].y + "px" + ", " +
								  pntRight[6].x + "px" + " " + pntRight[6].y + "px";							 
							 
			$("#clipPolygon1").find("polygon").attr("points", clipPathLeft);
			$("#clipPolygon2").find("polygon").attr("points", clipPathRight);			
			$(".contacts .contacts-1 .top").css("-webkit-clip-path", "polygon(" + webkitClipPathLeft + ")");
			$(".contacts .contacts-2 .top").css("-webkit-clip-path", "polygon(" + webkitClipPathRight + ")");
		}).trigger("load");	
		
		
		// .tellabout
		$(window).on("scroll", function(){
			if ( $(".tellabout").is(":in-viewport") ) {
				$("body").addClass("tellabout-in-viewport");
			} else {
				$("body").removeClass("tellabout-in-viewport");				
			}			
		})
		.on("load resize", function(){
			if ( window.innerWidth > 599 ) {
				$(".tellabout .form-wrap").addClass("dark");
			} else {
				$(".tellabout .form-wrap").removeClass("dark");		
			}
		}).trigger("load");
		
		
		// .services
		(function(){
			var timeout = false;						
			$(window).on("load resize", function(){
				if (!!timeout) clearTimeout(timeout);
				timeout = setTimeout(setServices, 300);				
			});			
			function setServices(){
				var h = $(".tellabout + .services").outerHeight() || 0;			
				if ( window.innerWidth >= 1000 ) {				
					$(".tellabout + .services").css("margin-top", -h + "px");
					$(".tellabout + .services").prev(".tellabout").css("padding-bottom", h + 90 + "px");
				} else if ( window.innerWidth >= 600 &&  window.innerWidth < 1000 ) {
					$(".tellabout + .services").css("margin-top", -h + "px");
					$(".tellabout + .services").prev(".tellabout").css("padding-bottom", h + 60 + "px");
				} else {
					$(".tellabout + .services").css("margin-top", "0");
					$(".tellabout + .services").prev(".tellabout").css("padding-bottom", "");
				}
			}
		})();
		
		
		// .section .descript .areas-php ul
		$(".section .descript .areas-php ul").each(function(){  	
			var $list = $(this);
			var $item = $("li", $list);
			$(window).on("load resize", function(){	
				$list.css("width", "auto");			
				var itemGabarit = parseInt($item.outerWidth()) + parseInt($item.css("margin-left")) + parseInt($item.css("margin-right"));
				var countInStr = Math.floor(parseInt($list.width()) / itemGabarit);
				$list.css("width", countInStr * itemGabarit + "px");
			});
		});
		
		
		// .section .descript .logos ul
		$(".section .descript .logos ul").each(function(){  	
			var $list = $(this);
			var $item = $("li", $list);
			$(window).on("load resize", function(){
				$list.css("width", "auto");
				var itemGabarit = parseInt($item.outerWidth()) + parseInt($item.css("margin-left")) + parseInt($item.css("margin-right"));
				var countInStr = Math.floor(parseInt($list.width()) / itemGabarit);			
				$list.css("width", countInStr * itemGabarit + "px");				
			});
		});
		
		
		// .section.web-logos ul
		$(".section.web-logos ul").each(function(){  	
			var $list = $(this);
			var $item = $("li", $list);
			var startHidden = 0;
			$(window).on("load resize", function(){					
				$list.css("width", "auto");			
				var itemGabarit = parseInt($item.outerWidth()) + parseInt($item.css("margin-left")) + parseInt($item.css("margin-right"));
				var countInStr = Math.floor(parseInt($list.width()) / itemGabarit);
				$list.css("width", countInStr * itemGabarit + "px");				
				if ( window.innerWidth < 600 ) {
					$item.removeClass("hdn");
					var startHidden = countInStr * 4 + 1;
					$("li:nth-child(n + " + startHidden + ")", $list).addClass("hdn");			
				} else {
					$item.removeClass("hdn");					
				}	
			});			
			$(window).on("load scroll", function(){	
				if ( $list.is(":in-viewport(-100)") ) {
					$list.addClass("animate");
				}
			});	
		});
		
		
		// .slider-video
		(function(){
			$(window).on("load resize", function(){
				setSlider();						
			}).trigger("load");		
									
			function setSlider(){	
				$(".slider-video .slider").each(function(){
					var $slider = $(this).find("ul");
					var $btnPrev = $(this).find(".btn-slider-prev");
					var $btnNext = $(this).find(".btn-slider-next");
					var rateVideo = 16/9;
					var w = $(this).width();
					var h = w / rateVideo;	
					
					$(this).find("iframe").css({
						width: w + "px",
						height: h + "px"
					});
					
					$btnPrev.css("top", h/2 + "px");
					$btnNext.css("top", h/2 + "px");
					
					$slider.carouFredSel({ 
						responsive  : true,
						items: {
							visible: 1,
							width: 840
						},
						auto: {
							play: false,
							pauseOnHover: true,	
							duration: 500,
							timeoutDuration: 5000												 
						},
						swipe: {
							onTouch: true						
						},
						prev: $btnPrev,
						next: $btnNext 
					});
				});
			}
		})();
		
		
		// .about-tabs
		(function(){
			$(window).on("load resize", function(){
				setTailOffset();						
			}).trigger("load");
			
			setActiveTab();
			
			function setTailOffset(){
				if ( !$(".about-tabs a.selected").length ) return;
				var tailOffset = $(".about-tabs a.selected").position().left + $(".about-tabs a.selected").outerWidth()/2 - 12;
				$(".about-tabs .outer .tail").css({
					left: tailOffset + "px",
					display: "block"
				});
			}
			
			function setActiveTab(){
				$(".about-tabs a").on("click", function(e){
					e.preventDefault(); 
					var trg = $(this).attr("href") || '';
					var t = $(".toolbar").outerHeight() || 0;
					$(this).addClass("selected").siblings().removeClass("selected");
					setTailOffset();					
					if ( window.innerWidth < 1000 && window.innerWidth >= 600 ) {
						$("html, body").animate({scrollTop: $(".about-tabs").offset().top - t}, 600);						
					}
					if ( window.innerWidth < 600 ) {
						$("html, body").animate({scrollTop: $(".about-content:visible").offset().top - t - 30}, 600);						
					}					
					if ( $(trg).length ) {
						$(trg).slideDown().siblings("[id ^= 'about_']").slideUp();
						setTimeout(function(){ $(window).trigger("resize") }, 350);
					}
				});
			}			
		})();
		
		
		// .slider-team
		(function(){
			$(window).on("load resize", function(){
				setSlider();						
			}).trigger("load");		
									
			function setSlider(){	
				$(".slider-team").each(function(){
					var $sliderTeam = $(this);
					var $slideList = $(this).find("ul");
					var $btnPrev = $(this).find(".btn-slider-prev-2");
					var $btnNext = $(this).find(".btn-slider-next-2");
					$slideList.carouFredSel({ 
						responsive  : true,
						items: {
							visible: 1,
							width: 1160
						},
						auto: {
							//play: false,
							pauseOnHover: true,	
							duration: 500,
							timeoutDuration: 5000												 
						},
						swipe: {
							onTouch: true						
						},
						onCreate: function( data ) {
							$(this).trigger("currentPosition", function( pos ) {
								var txt = (pos+1) + " of the " + $("> *", this).length;
								$sliderTeam.find(".counter").html( txt );
							});
						},								
						scroll: {
							onBefore: function( data ) {
								var imgHeight = data.items.visible.find("img").outerHeight();
								$btnPrev.css("top", imgHeight/2 + "px");
								$btnNext.css("top", imgHeight/2 + "px");
							},
							onAfter : function( data ) {
								$(this).trigger("currentPosition", function( pos ) {
									var txt = (pos+1) + " of the " + $("> *", this).length;
									$sliderTeam.find(".counter").html( txt );
								});
							}									
						},
						prev: $btnPrev,
						next: $btnNext 
					});
				});
			}
		})();
		
		
		
		
		// .portfolio-start-tabs
		(function(){
			$(window).on("load resize", function(){
				setTailOffset();						
			}).trigger("load");
			
			setActiveTab();
			
			function setTailOffset(){
				if ( !$(".portfolio-start-tabs a.selected").length ) return;
				var tailOffset = $(".portfolio-start-tabs a.selected").position().left + $(".portfolio-start-tabs a.selected").outerWidth()/2 - 12;
				$(".portfolio-start-tabs .outer .tail").css({
					left: tailOffset + "px",
					display: "block"
				});
			}
			
			function setActiveTab(){
				$(".portfolio-start-tabs a").on("click", function(e){
					e.preventDefault(); 
					var trg = $(this).attr("href") || '';
					var t = $(".toolbar").outerHeight() || 0;
					$(this).addClass("selected").siblings().removeClass("selected");
					setTailOffset();					
					if ( window.innerWidth < 1000 ) {
						$("html, body").animate({scrollTop: $(".portfolio-start-tabs").offset().top - t}, 600);						
					}					
					if ( $(trg).length ) {
						$(trg).slideDown().siblings("[id ^= 'portfolio_start_']").slideUp();
						setTimeout(function(){ $(window).trigger("resize") }, 350);
					}
				});
			}			
		})();
		
		
		
		// .portfolio .btn-popup-portfolio-menu
		// .portfolio .portfolio-sidebar .menu
		(function(){
			$(window).on("load resize scroll", function(){
				setButtonPosition();				
				setSidebarAngles();
				setSidebarHeight();	
				setSidebarMenuPosition();			
			}).trigger("load");	
			
			$(document).on("click", ".portfolio-sidebar .menu h2 a", function(e){
				e.preventDefault();
				$(this).closest(".sector").toggleClass("open");
				if ( $(this).closest(".sector").is(".open") ) {
					$(this).closest(".sector").find("ul").slideDown(200);
					$(this).closest(".sector").siblings(".sector").removeClass("open").find("ul").slideUp(200);
				} else {
					$(this).closest(".sector").find("ul").slideUp(100);	
				}				
				setTimeout(setSidebarMenuPosition, 200);
			});	
									
			function setButtonPosition(){
				$(".portfolio .btn-popup-portfolio-menu").each(function(){
					var $btn = $(this);
					var portfolioOffset = $(this).closest(".portfolio").offset().top;
					var portfolioHeight = $(this).closest(".portfolio").outerHeight();
					var toolbarHeight = $(".toolbar").outerHeight();
					var scrollTop = $(window).scrollTop();
					if ( (toolbarHeight + scrollTop) >=  portfolioOffset ) {
						if ( (scrollTop - portfolioHeight - portfolioOffset + toolbarHeight + $btn.outerHeight()) >= 0 ) {
							$btn.css({
								position: "absolute",
								top: "auto",
								bottom: 0
							});							
						} else {
							$btn.css({
								position: "fixed",
								top: toolbarHeight + "px"
							});	
						}	
					} else {
						$btn.css({
							position: "absolute",
							top: 0
						});
					}
				});
			}
			
			function setSidebarMenuPosition(){
				$(".portfolio-sidebar .menu").each(function(){
					var $menu = $(this);
					var portfolioHeight = $menu.closest(".portfolio").outerHeight();
					var posLeft = $menu.closest(".portfolio-sidebar").offset().left + parseInt($(this).closest(".portfolio-sidebar").css("padding-left"));
					var toolbarHeight = $(".toolbar").outerHeight();
					var scrollTop = $(window).scrollTop();
					if ( (toolbarHeight + scrollTop) >=  ($menu.closest(".portfolio-sidebar").offset().top + parseInt($menu.closest(".portfolio-sidebar").css("padding-top"))) ) {
						if ( (scrollTop - portfolioHeight - $menu.closest(".portfolio-sidebar").offset().top + toolbarHeight + $menu.outerHeight() ) >= 0 ) {
							$menu.css({
								position: "absolute",
								top: "auto",
								bottom: 0,
								left: "auto",
								right: "20px"
							});								
						} else {
							$menu.css({
								position: "fixed",
								right: "auto",
								left: posLeft + "px",
								top: toolbarHeight + "px",
								bottom: "auto"
							});	
						}
					} else {
						$menu.css({
							position: "static",
							left: "auto",
							top: "auto"
						});
					}
				});
			}	
			
			function setSidebarAngles(){
				var w2 = 0;
				$(".portfolio-sidebar .menu li a:visible").each(function(){
					w2 = $(this).outerHeight()/2;
					$(this).find(".corner-left").css({
						"border-top-width": w2 + "px",
						"border-bottom-width": w2 + "px"
					});
				});
			}			
			
			function setSidebarHeight(){
				$(".portfolio-sidebar .menu:visible").each(function(){
					$(this).find("li.selected").closest("ul").show().closest(".sector").addClass("open").siblings(".sector").removeClass("open").find("ul").hide();
				});
			}
								
		})();
		
		
		
		// .services-main
		(function(){
			$(window).on("load resize", function(){
				setHeight();			
			}).trigger("load");
						
			function setHeight(){
				if ( window.innerWidth < 600 ) return;				
				$(".services-main .items-wrap").each(function(){  	
					var $list = $(this),
						$item = $(".item", $list), 
						countInStr = Math.floor(parseInt($list.width()) / (parseInt($item.outerWidth()) + parseInt($item.css("margin-left")) + parseInt($item.css("margin-right")))),
						strCount =  Math.ceil($item.length / countInStr);
					while ( strCount-- ) { 				    
						var maxHeadHeight = 0;
						var maxTextHeight = 0;										 		
						$item.slice( parseInt(strCount * countInStr), parseInt(strCount * countInStr + countInStr) )
							.each(function(){
								$("h3", this).css("height", "auto"); 
								$(".text", this).css("height", "auto"); 				
								maxHeadHeight =  $("h3", this).height() > maxHeadHeight ? $("h3", this).height() : maxHeadHeight;
								maxTextHeight =  $(".text", this).height() > maxTextHeight ? $(".text", this).height() : maxTextHeight;
							})
							.each(function(){ 
								$("h3", this).css("height", maxHeadHeight + "px");
								$(".text", this).css("height", maxTextHeight + "px"); 
							});
					}
				});
			}
		})();
		
		
		// .paginator
		$(".paginator").each(function(){
			$("li", $(this)).each(function(){
				if ( $(this).is(":first-child") && $(this).find(".ico").length ) {
					$(this).addClass("prev");
				} else if ( $(this).is(":last-child") && $(this).find(".ico").length ) {
					$(this).addClass("next");
				} else if ( $(this).children("span").length ) {
					$(this).addClass("gap");
				} else if ( $(this).children("a").length ) {
					$(this).addClass("num");
				}	
			});
		});
	}
	
	
	
	function initGoogleMap(){
		var flag = false;		
		//var url = "http://maps.google.com/maps/api/js?sensor=false";
		//var url = "http://maps.google.com/maps/api/js?sensor=false&key=AIzaSyDqZ734X7oIaALfLXOjlsHjDe2EhW35JlE";
		//var url = "http://maps.googleapis.com/maps/api/js?v=3&sensor=false";
		
		$(window).on("load resize", function(){ 
			loadGoogleMap();			 
		});
				
		function loadGoogleMap(){
			if ( flag || window.innerWidth < 600 || !$("#map_left").length || !$("#map_right").length ) return;
			flag = true;
			var mapCenter1 = new google.maps.LatLng(50.4714104, 30.5153209);
			var markerPos1 = new google.maps.LatLng(50.4714104, 30.5153209);		
			var mapCenter2 = new google.maps.LatLng(28.811097, -81.2669364);
			var markerPos2 = new google.maps.LatLng(28.811097, -81.2669364);
			var mapOptions1 = {
				center: mapCenter1,
				zoom: 15,			
				panControl: false,
				scrollwheel: false,
				mapTypeControl: false
				//mapTypeId: google.maps.MapTypeId.ROADMAP
			};		
			var mapOptions2 = {
				center: mapCenter2,
				zoom: 15,			
				panControl: false,
				scrollwheel: false,
				mapTypeControl: false
				//mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			var ico = "img/ico-map.png" ;
			var map1 = new google.maps.Map( document.getElementById("map_left"), mapOptions1 );
			var map2 = new google.maps.Map( document.getElementById("map_right"), mapOptions2 );
			var marker1 = new google.maps.Marker({
				position: markerPos1,
				icon: ico,
				map: map1
			});		
			var marker2 = new google.maps.Marker({
				position: markerPos2,
				icon: ico,
				map: map2
			});					
			google.maps.event.addListener(marker1, 'click', function() {
				window.open("https://www.google.com/maps/place/вулиця+Ярославська,+56а,+Київ,+Украина/@50.4714104,30.5153209,17z");
			});
			google.maps.event.addListener(marker2, 'click', function() {
				window.open("https://www.google.com/maps/place/401+E+1st+St,+Sanford,+FL+32771/@28.811097,-81.2669364,15z");
			});			
		}
	}
	
	
	
	function initContactsGoogleMap(){
		var timeout = false;	
							
		$(window).on("load", function(){
			setGoogleMap();				
		});
		
		$(window).on("resize", function(){
			if (!!timeout) clearTimeout(timeout);
			timeout = setTimeout(setCenterGoogleMap, 500);				
		});
		
		$(".contact-main-maps .buttons .btn-map-toggle").on("click", function(e){
			e.preventDefault();
			var trg = $(this).attr("href");
			$(trg).removeClass("hdn").siblings(".map-wrap").addClass("hdn");
		});
		
		function setGoogleMap(){
			$('#contact_map_ukraine').gmap3({
				map: {
					options: {
						center: [50.4715, 30.5153209],
						zoom: 15,
						panControl: false,
						scrollwheel: false,
						mapTypeControl: false
					}
				},
				marker: {
					latLng: [50.4714104, 30.5153209],
					options: {
						icon: "img/ico-map-2.png"
					},
					events: {
						click: function() {
							window.open("https://www.google.com/maps/place/вулиця+Ярославська,+56а,+Київ,+Украина/@50.4714104,30.5153209,17z");
						}
					}
				},
				overlay: {
					latLng: [50.4714104, 30.5153209],
					options:{
						content: '<div class="map-info-window">' +
									'<div class="title">' +
									'	Kiev, Ukraine' +
									'</div>' +
									'<p class="adres">' + 
									'	Yaroslavskaya St. 56a,' +
									'	<br />' +
									'	04070 Kyiv, Ukraine' +
									'</p>' +
									'<p class="phone">' +
									'	<a href="tel:tel:+380445925087">+38 (044) 592 50 87</a>' +
									'</p>' +
								 '</div>',
						offset: {
							y: -170,
							x: 60
						}
					}
				}
			});
			
			$('#contact_map_usa').gmap3({
				map: {
					options: {
						center: [28.8112, -81.2669364],
						zoom: 15,
						panControl: false,
						scrollwheel: false,
						mapTypeControl: false
					}
				},
				marker: {
					latLng: [28.811097, -81.2669364],
					options: {
						icon: "img/ico-map-2.png"
					},
					events: {
						click: function() {
							window.open("https://www.google.com/maps/place/401+E+1st+St,+Sanford,+FL+32771/@28.811097,-81.2669364,15z");
						}
					}
				},
				overlay: {
					latLng: [28.811097, -81.2669364],
					options:{
						content: '<div class="map-info-window">' +
									'<div class="title">' +
									'	Sanford F' +
									'</div>' +
									'<p class="adres">' + 
									'	401 E 1st Street #1868 – 0060 Sanford FL, 32772' +
									'</p>' +
									'<p class="phone">' +
									'	<a href="tel:+13214308830">+1 (321) 4308830</a>' +
									'	<br />' +
									'	<a href="tel:+37121329191">+37121329191</a>' +
									'</p>' +
									'<p class="email">' +
									'	<a href="mailto:info@sirinsoftware.com">info@sirinsoftware.com</a>' +
									'</p>' +
								 '</div>',
						offset: {
							y: -170,
							x: 60
						}
					}
				}
			});
		}
		
		function setCenterGoogleMap(){
			$('#contact_map_ukraine').gmap3({
				map: {
					options: {
						center: [50.4715, 30.5153209]
					}
				}
			});	
			$('#contact_map_usa').gmap3({
				map: {
					options: {
						center: [28.8112, -81.2669364]
					}
				}
			});	
		}
	}
		
	
	
	function initAnimate(){
						
		$(".outsourcing-outstaffing .outsourcing .company .circle").each(function(){
			if ( !$("#company_circle_white").length ) return;
			var $circle = $(this);
			$(window).on("load scroll resize", function(){
				if ( $circle.is(":in-viewport(-100)") && !$circle.is(".animate") ) {
					$circle.addClass("animate");
					animateCompanyCircleWhite();
				}
			});
			function animateCompanyCircleWhite(){				
				var s = Snap("#company_circle_white");
				var pth1 = "M128.419,129.287V2C58.917,5.597,3.67,63.088,3.67,133.484c0,21.493,5.152,41.78,14.284,59.7L128.419,129.287z"; 
				var pth2 = "M142.418,129.096l110.41,63.865C261.889,175.094,267,154.889,267,133.484c0-70.34-55.158-127.793-124.582-131.475V129.096L142.418,129.096z";
				var pth3 = "M135.584,141.314L24.97,205.299c23.493,36.031,64.144,59.852,110.364,59.852c46.313,0,87.031-23.912,110.504-60.061L135.584,141.314z";
				var line1 = s.path(pth1).attr({
					stroke: "#a6c850",
					strokeWidth: 1,
					fill: "#a6c850",
					fillOpacity: 0,
					strokeDasharray: Snap.path.getTotalLength(pth1),
					strokeDashoffset: Snap.path.getTotalLength(pth1)					
				});
				var line2 = s.path(pth2).attr({
					stroke: "#e69f33",
					strokeWidth: 1,
					fill: "#e69f33",
					fillOpacity: 0,
					strokeDasharray: Snap.path.getTotalLength(pth2),
					strokeDashoffset: Snap.path.getTotalLength(pth2)					
				});
				var line3 = s.path(pth3).attr({
					stroke: "#e0d9d7",
					strokeWidth: 1,	
					fillOpacity: 0,
					strokeDasharray: Snap.path.getTotalLength(pth3),
					strokeDashoffset: Snap.path.getTotalLength(pth3)					
				});				
				line1.animate({strokeDashoffset: 0}, 1500, function(){
					line1.animate({fillOpacity: 1, strokeWidth: 0}, 300);
				});
				line2.animate({strokeDashoffset: 0}, 1500, function(){
					line2.animate({fillOpacity: 1, strokeWidth: 0}, 300);
				});
				line3.animate({strokeDashoffset: 0}, 1500);
			}	
		});			
		
		
		$(".outsourcing-outstaffing .outsourcing .solution .circle").each(function(){
			if ( !$("#solution_circle_white").length ) return;
			var $circle = $(this);
			$(window).on("load scroll resize", function(){
				if ( $circle.is(":in-viewport(-100)") && !$circle.is(".animate") ) {
					$circle.addClass("animate");
					animateSolutionCircleWhite();
				}
			});
			function animateSolutionCircleWhite(){
				var s = Snap("#solution_circle_white");
				var pth1 = "M236.219,88.033l19.252-7.192c-8.033-18.351-20.383-35.142-36.904-48.746c-22.59-18.6-49.525-28.406-76.664-29.835l0.008-0.053C72.421-1.674,11.324,49.556,3.771,119.547c-2.306,21.367,0.64,42.089,7.796,60.887l0.158-0.07c7.849,20.791,21.067,39.875,39.454,55.017c16.591,13.662,35.526,22.58,55.165,26.922l6.56-39.524l0,0l15.691-94.467L236.219,88.033L236.219,88.033z";
				var pth2 = "M141.074,138.521l-20.918,126.063c42.748,4.768,86.977-11.471,116.357-47.154c29.438-35.75,36.86-82.385,23.877-123.48L141.074,138.521z";
				line1 = s.path(pth1).attr({
					stroke: "#a6c850",
					fill: "#a6c850",
					fillOpacity: 0,
					strokeWidth: 1,
					strokeDasharray: Snap.path.getTotalLength(pth1),
					strokeDashoffset: Snap.path.getTotalLength(pth1)
				});
				line2 = s.path(pth2).attr({
					stroke: "#e0d9d7",
					fillOpacity: 0,
					strokeWidth: 1,
					strokeDasharray: Snap.path.getTotalLength(pth2),
					strokeDashoffset: Snap.path.getTotalLength(pth2)
				});
				line1.animate({"stroke-dashoffset": 0}, 1500, function(){
					line1.animate({fillOpacity: 1, strokeWidth: 0}, 300);
				});				
				line2.animate({"stroke-dashoffset": 0}, 1500);
			}
		});
		
		
		$(".outsourcing-outstaffing .outstaffing .diagram").each(function(){
			var $diagram = $(this);
			$(window).on("load scroll resize", function(){ 
				if ( $diagram.is(":in-viewport(-200)") ) {
					$diagram.addClass("animate");
				}
			});
		});
		
		
		$(".outsourcing-outstaffing .outsourcing .company .circle").each(function(){
			if ( !$("#company_circle_green").length ) return;
			var $circle = $(this);
			$(window).on("load scroll resize", function(){
				if ( $circle.is(":in-viewport(-100)") && !$circle.is(".animate") ) {
					$circle.addClass("animate");
					animateCompanyCircleGreen();
				}
			});
			function animateCompanyCircleGreen(){
				var s = Snap("#company_circle_green");
				var pth1 = "M128.419,129.287V2C58.917,5.597,3.67,63.088,3.67,133.484c0,21.493,5.152,41.78,14.284,59.7L128.419,129.287z"; 
				var pth2 = "M142.418,129.096l110.41,63.865C261.889,175.094,267,154.889,267,133.484c0-70.34-55.158-127.793-124.582-131.475V129.096L142.418,129.096z";
				var pth3 = "M135.584,141.314L24.97,205.299c23.493,36.031,64.144,59.852,110.364,59.852c46.313,0,87.031-23.912,110.504-60.061L135.584,141.314z";
				var line1 = s.path(pth1).attr({
					stroke: "#ffffff",
					strokeWidth: 1,
					fill: "#ffffff",
					fillOpacity: 0,
					strokeDasharray: Snap.path.getTotalLength(pth1),
					strokeDashoffset: Snap.path.getTotalLength(pth1)					
				});
				var line2 = s.path(pth2).attr({
					stroke: "#ffffff",
					strokeWidth: 1,
					fill: "#ffffff",
					fillOpacity: 0,
					strokeDasharray: Snap.path.getTotalLength(pth2),
					strokeDashoffset: Snap.path.getTotalLength(pth2)					
				});
				var line3 = s.path(pth3).attr({
					stroke: "#ffffff",
					strokeWidth: 1,	
					fillOpacity: 0,
					strokeDasharray: Snap.path.getTotalLength(pth3),
					strokeDashoffset: Snap.path.getTotalLength(pth3)					
				});				
				line1.animate({strokeDashoffset: 0}, 1500, function(){
					line1.animate({fillOpacity: 1, strokeWidth: 0}, 300);
				});
				line2.animate({strokeDashoffset: 0}, 1500, function(){
					line2.animate({fillOpacity: 1, strokeWidth: 0}, 300);
				});
				line3.animate({strokeDashoffset: 0}, 1500);
			}	
		});			
		
		
		$(".outsourcing-outstaffing .outsourcing .solution .circle").each(function(){
			if ( !$("#solution_circle_green").length ) return;
			var $circle = $(this);
			$(window).on("load scroll resize", function(){
				if ( $circle.is(":in-viewport(-100)") && !$circle.is(".animate") ) {
					$circle.addClass("animate");
					animateSolutionCircleGreen();
				}
			});
			function animateSolutionCircleGreen(){
				var s = Snap("#solution_circle_green");
				var pth1 = "M236.219,88.033l19.252-7.192c-8.033-18.351-20.383-35.142-36.904-48.746c-22.59-18.6-49.525-28.406-76.664-29.835l0.008-0.053C72.421-1.674,11.324,49.556,3.771,119.547c-2.306,21.367,0.64,42.089,7.796,60.887l0.158-0.07c7.849,20.791,21.067,39.875,39.454,55.017c16.591,13.662,35.526,22.58,55.165,26.922l6.56-39.524l0,0l15.691-94.467L236.219,88.033L236.219,88.033z";
				var pth2 = "M141.074,138.521l-20.918,126.063c42.748,4.768,86.977-11.471,116.357-47.154c29.438-35.75,36.86-82.385,23.877-123.48L141.074,138.521z";
				line1 = s.path(pth1).attr({
					stroke: "#ffffff",
					fill: "#ffffff",
					fillOpacity: 0,
					strokeWidth: 1,
					strokeDasharray: Snap.path.getTotalLength(pth1),
					strokeDashoffset: Snap.path.getTotalLength(pth1)
				});
				line2 = s.path(pth2).attr({
					stroke: "#ffffff",
					fillOpacity: 0,
					strokeWidth: 1,
					strokeDasharray: Snap.path.getTotalLength(pth2),
					strokeDashoffset: Snap.path.getTotalLength(pth2)
				});
				line1.animate({"stroke-dashoffset": 0}, 1500, function(){
					line1.animate({fillOpacity: 1, strokeWidth: 0}, 300);
				});				
				line2.animate({"stroke-dashoffset": 0}, 1500);
			}
		});
		
		
		$(".bnr-top .outsourcing .company .circle").each(function(){				
			var $circle = $(this);
			$(window).on("load scroll resize", function(){
				if ( $circle.is(":in-viewport(-100)") && !$circle.is(".animate") ) {
					$circle.addClass("animate");
					animateBannerCompanyCircle();
				}
			});
			function animateBannerCompanyCircle(){
				var s = Snap("#bnr_top_company_circle");				
				var pth1 = "M128.419,129.287V2C58.917,5.597,3.67,63.088,3.67,133.484c0,21.493,5.152,41.78,14.284,59.7L128.419,129.287z"; 
				var pth2 = "M142.418,129.096l110.41,63.865C261.889,175.094,267,154.889,267,133.484c0-70.34-55.158-127.793-124.582-131.475V129.096L142.418,129.096z";
				var pth3 = "M135.584,141.314L24.97,205.299c23.493,36.031,64.144,59.852,110.364,59.852c46.313,0,87.031-23.912,110.504-60.061L135.584,141.314z";
				var line1 = s.path(pth1).attr({
					stroke: "#a6c850",
					strokeWidth: 1,
					fill: "#a6c850",
					fillOpacity: 0,
					strokeDasharray: Snap.path.getTotalLength(pth1),
					strokeDashoffset: Snap.path.getTotalLength(pth1)					
				});
				var line2 = s.path(pth2).attr({
					stroke: "#e69f33",
					strokeWidth: 1,
					fill: "#e69f33",
					fillOpacity: 0,
					strokeDasharray: Snap.path.getTotalLength(pth2),
					strokeDashoffset: Snap.path.getTotalLength(pth2)					
				});
				var line3 = s.path(pth3).attr({
					stroke: "#ffffff",
					strokeWidth: 1,	
					fillOpacity: 0,
					strokeDasharray: Snap.path.getTotalLength(pth3),
					strokeDashoffset: Snap.path.getTotalLength(pth3)					
				});				
				line1.animate({strokeDashoffset: 0}, 1500, function(){
					line1.animate({fillOpacity: 1, strokeWidth: 0}, 300);
				});
				line2.animate({strokeDashoffset: 0}, 1500, function(){
					line2.animate({fillOpacity: 1, strokeWidth: 0}, 300);
				});
				line3.animate({strokeDashoffset: 0}, 1500);
			}
		});
		
		
		$(".bnr-top .outsourcing .solution .circle").each(function(){
			var $circle = $(this);
			$(window).on("load scroll resize", function(){
				if ( $circle.is(":in-viewport(-100)") && !$circle.is(".animate") ) {
					$circle.addClass("animate");
					animateBannerSolutionCircle();
				}
			});	
			function animateBannerSolutionCircle(){
				var s = Snap("#bnr_top_solution_circle");	
				var pth1 = "M236.219,88.033l19.252-7.192c-8.033-18.351-20.383-35.142-36.904-48.746c-22.59-18.6-49.525-28.406-76.664-29.835l0.008-0.053C72.421-1.674,11.324,49.556,3.771,119.547c-2.306,21.367,0.64,42.089,7.796,60.887l0.158-0.07c7.849,20.791,21.067,39.875,39.454,55.017c16.591,13.662,35.526,22.58,55.165,26.922l6.56-39.524l0,0l15.691-94.467L236.219,88.033L236.219,88.033z";
				var pth2 = "M141.074,138.521l-20.918,126.063c42.748,4.768,86.977-11.471,116.357-47.154c29.438-35.75,36.86-82.385,23.877-123.48L141.074,138.521z";
				line1 = s.path(pth1).attr({
					stroke: "#a6c850",
					fill: "#a6c850",
					fillOpacity: 0,
					strokeWidth: 1,
					strokeDasharray: Snap.path.getTotalLength(pth1),
					strokeDashoffset: Snap.path.getTotalLength(pth1)
				});
				line2 = s.path(pth2).attr({
					stroke: "#ffffff",
					fillOpacity: 0,
					strokeWidth: 1,
					strokeDasharray: Snap.path.getTotalLength(pth2),
					strokeDashoffset: Snap.path.getTotalLength(pth2)
				});
				line1.animate({"stroke-dashoffset": 0}, 1500, function(){
					line1.animate({fillOpacity: 1, strokeWidth: 0}, 300);
				});				
				line2.animate({"stroke-dashoffset": 0}, 1500);
			}
		});	
		
		
		$(".bnr-top .outstaffing .diagram").each(function(){
			var $diagram = $(this);
			var $td = $("> div > div > div", $(this));
			$(window).on("load scroll resize", function(){ 
				if ( $diagram.is(":in-viewport(-100)") ) {
					$diagram.addClass("animate");
				}
				$td.each(function(){
					$(this).css("height","").css("height", $(this).parent().outerHeight() + "px");
				});
			});
		});
		
		
		$(".section.inet-things .diagram").each(function(){
			var $this = $(this);
			$(window).on("load scroll resize", function(){
				if ( $this.is(":in-viewport(-200)") ) {
					$this.addClass("animate");
				}
			});
		});			
		
		
		$(".section.inet-things .diagram .circle, .section.inet-things .diagram .title").each(function(){
			var $this = $(this);
			$(window).on("load scroll resize", function(){
				if ( $this.is(":in-viewport(-50)") ) {
					$this.addClass("animate");
				}
			});
		});	
		
		
		$(".section.world-lines .diagram").each(function(){
			var $this = $(this);
			$(window).on("load scroll resize", function(){
				if ( $this.is(":in-viewport(-200)") ) {
					$this.addClass("animate");
				}
			});
		});	
		
		
		$(".section.they-are li").each(function(){
			var $this = $(this);
			$(window).on("load scroll resize", function(){
				if ( $this.is(":in-viewport(-120)") ) {
					$this.addClass("animate");
				}
			});
		});	
		
		
		$(".section.according .descript").each(function(){
			var $this = $(this);
			$(window).on("load scroll resize", function(){
				if ( $this.is(":in-viewport(-150)") && !$this.hasClass("animate") ) {
					$this.addClass("animate");
					$this.find("span.timer1").countTo();
					$this.find("span.timer2").countTo();
					$this.find("span.timer3").countTo({
						formatter: function (value, options) {
							return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
						}
					});
				}				
			});
		});
				
		
		$(".section.mobile-approaches .diagram .svg-wrap").each(function(){
			var $diagram = $(this);			
			$(window).on("load scroll resize", function(){
				if ( $diagram.is(":in-viewport(-100)") && !$diagram.is(".animate") ) {
					$diagram.addClass("animate");
					animateMobileApproaches();		
				}				
			});						
			function animateMobileApproaches(){
				var s = Snap("#diagram_mobile_approaches");	
				var p1 = "M260.861,367.685v69.238c0,12.68-10.316,22.996-22.996,22.996H27.995C15.315,459.919,5,449.603,5,436.923 V27.995C5,15.315,15.315,5,27.995,5h209.87c12.68,0,22.996,10.315,22.996,22.995v51.731l5-4.772V27.995 C265.861,12.559,253.303,0,237.865,0H27.995C12.559,0,0,12.559,0,27.995v408.928c0,15.438,12.559,27.996,27.995,27.996h209.87 c15.438,0,27.996-12.559,27.996-27.996v-64.467L260.861,367.685z";
				var p2 = "M245.021,352.567v36.693H20.84V58.666h224.182v36.177l3-2.863V57.166c0-0.829-0.672-1.5-1.5-1.5H19.34 c-0.828,0-1.5,0.671-1.5,1.5v333.595c0,0.828,0.672,1.5,1.5,1.5h227.182c0.828,0,1.5-0.672,1.5-1.5v-35.33L245.021,352.567z";
				var p3 = "M160.58,31.665h-55.299v-3h55.299V31.665z M92.596,428.724h-55.3v-3h55.3V428.724z M227.391,425.724H172.09v3h55.301V425.724z";
				var p4 = "M132.344,444.708c-9.642,0-17.486-7.844-17.486-17.484s7.845-17.486,17.486-17.486 c9.641,0,17.484,7.846,17.484,17.486S141.984,444.708,132.344,444.708z M132.344,412.737c-7.987,0-14.486,6.5-14.486,14.486 s6.499,14.484,14.486,14.484c7.986,0,14.484-6.498,14.484-14.484S140.33,412.737,132.344,412.737z";
				var p5 = "M297.59,168.225l-166.991,54.092L297.59,62.95V168.225z";
				var p6 = "M518.078,168.226H300.672V62.95h217.406V168.226z";
				var p7 = "M297.59,276.345l-166.991-52.641l166.991-52.637V276.345z";
				var p8 = "M518.078,276.345H300.672V171.067h217.406V276.345z";
				var p9 = "M297.59,384.46L130.599,225.093l166.991,54.092V384.46z";
				var p10 = "M518.078,384.46H300.672V279.185h217.406V384.46z";
				var startAttr = {
					fill: "#ffffff",
					stroke: "#ffffff",
					fillOpacity: 0,
					strokeWidth: 1,
					//strokeOpacity: 1,
					length: 0	
				};				
				var line1 = s.path(p1).attr($.extend(startAttr, {
					strokeDasharray: Snap.path.getTotalLength(p1), 
					strokeDashoffset: Snap.path.getTotalLength(p1)
				}));
				var line2 = s.path(p2).attr($.extend(startAttr, {
					strokeDasharray: Snap.path.getTotalLength(p2), 
					strokeDashoffset: Snap.path.getTotalLength(p2)
				}));
				var line3 = s.path(p3).attr($.extend(startAttr, {
					strokeDasharray: Snap.path.getTotalLength(p3), 
					strokeDashoffset: Snap.path.getTotalLength(p3)
				}));
				var line4 = s.path(p4).attr({
					fill: "#ffffff",
					stroke: "#ffffff",
					fillOpacity: 0,
					strokeWidth: 1,
					transform: "s0"					
				});
				var line5 = s.path(p5).attr($.extend(startAttr, {
					strokeDasharray: Snap.path.getTotalLength(p5), 
					strokeDashoffset: Snap.path.getTotalLength(p5)
				}));
				var line6 = s.path(p6).attr($.extend(startAttr, {
					strokeDasharray: Snap.path.getTotalLength(p6), 
					strokeDashoffset: Snap.path.getTotalLength(p6)
				}));
				var line7 = s.path(p7).attr($.extend(startAttr, {
					strokeDasharray: Snap.path.getTotalLength(p7), 
					strokeDashoffset: Snap.path.getTotalLength(p7)
				}));
				var line8 = s.path(p8).attr($.extend(startAttr, {
					strokeDasharray: Snap.path.getTotalLength(p8), 
					strokeDashoffset: Snap.path.getTotalLength(p8)
				}));
				var line9 = s.path(p9).attr($.extend(startAttr, {
					strokeDasharray: Snap.path.getTotalLength(p9), 
					strokeDashoffset: Snap.path.getTotalLength(p9)
				}));
				var line10 = s.path(p10).attr($.extend(startAttr, {
					strokeDasharray: Snap.path.getTotalLength(p10), 
					strokeDashoffset: Snap.path.getTotalLength(p10)
				}));
				
				line1.animate({strokeDashoffset: 0}, 2000, function(){
					line1.animate({fillOpacity: 1, strokeWidth: 0}, 500)
				});
				line2.animate({strokeDashoffset: 0}, 2000, function(){
					line2.animate({fillOpacity: 1, strokeWidth: 0}, 500)
				});
				line3.animate({strokeDashoffset: 0}, 2000, function(){
					line3.animate({fillOpacity: 1, strokeWidth: 0}, 500)
				});
				line4.animate({transform: "S1"}, 2000, mina.elastic, function(){
					line4.animate({fillOpacity: 1, strokeWidth: 0}, 500)
				});		
				line5.animate({strokeDashoffset: 0}, 2000, function(){
					line5.animate({fillOpacity: 1, strokeWidth: 0}, 500)
				});
				line6.animate({strokeDashoffset: 0}, 2000, function(){
					line6.animate({fillOpacity: 1, strokeWidth: 0}, 500)
				});
				line7.animate({strokeDashoffset: 0}, 2000, function(){
					line7.animate({fillOpacity: 1, strokeWidth: 0}, 500)
				});
				line8.animate({strokeDashoffset: 0}, 2000, function(){
					line8.animate({fillOpacity: 1, strokeWidth: 0}, 500)
				});
				line9.animate({strokeDashoffset: 0}, 2000, function(){
					line9.animate({fillOpacity: 1, strokeWidth: 0}, 500)
				});
				line10.animate({strokeDashoffset: 0}, 2000, function(){
					line10.animate({fillOpacity: 1, strokeWidth: 0}, 500)
				});				
			}
		});


		$(".section .descript .logos").each(function(){
			var $this = $(this);
			$(window).on("load scroll resize", function(){
				if ( $this.is(":in-viewport(-120)") && $this.is(":visible") ) {
					$this.addClass("animate");
				}
			});
		});
	}	
	
	
	
	function initPopups(){
		$('.fancybox').fancybox({
			padding: 0, 
			margin: [10, 0, 10, 0], 
			fitToView: false,
			beforeShow: function(){
				initHelpers();
				setPortfolioMenuHeight();
			}
		});
		
		function setPortfolioMenuHeight(){
			$(".popup-portfolio-menu:visible").each(function(){
				$(this).find("li.selected").closest("ul").slideDown().closest(".sector").addClass("open").siblings(".sector").removeClass("open").find("ul").slideUp();
			});
		}
		
		$(document).on("click", ".popup-portfolio-menu .menu h2 a", function(e){
			e.preventDefault();
			$(this).closest(".sector").toggleClass("open");
			if ( $(this).closest(".sector").is(".open") ) {
				$(this).closest(".sector").siblings(".sector").removeClass("open");
			} else {
				//$(this).closest(".sector").find("ul").slideUp();	
			}
		});
	}
	
	
	
	function initBlogMainPage(){		
		$(".blog-main").each(function(){
			var $blogMain = $(this);
			var w;
			
			$(".item .background", $blogMain).each(function(){
				if ( $(this).css("background-image") != "none" ) {
					$(this).closest(".item").addClass("bgr-img");	
				}
			});
			
			$(window).on("load resize", function(){
				if ( window.innerWidth > 999 ) {
					w = Math.ceil($(window).width() / 6) * 6;
				} else if ( window.innerWidth > 599 && window.innerWidth < 1000 ) {
					w = Math.ceil($(window).width() / 3) * 3;
				} else if ( window.innerWidth > 399 && window.innerWidth < 600 ) { 
					w = Math.ceil($(window).width() / 2) * 2;	
				} else if ( window.innerWidth < 400 ) { 
					w = $(window).width();
				}								
				$(".items-wrap", $blogMain)
					.css("width", w + "px")
					.packery({
						itemSelector: '.item',
						gutter: 0
					});
			});
		});	
	}
	
	
	
	function initArticlePage(){
		$(".article").each(function(){
			var $article = $(this);	
					
			$(".item .background", $article).each(function(){
				if ( $(this).css("background-image") != "none" ) {
					$(this).closest(".item").addClass("bgr-img");	
				}
			});
			
			$(document).on("click", ".article .article-extra .comments .item .reply .btn-reply", function(e){
				e.preventDefault();
				e.stopPropagation();
				$(this).hide();
				$(this).next(".form-reply").fadeIn();
				$(this).closest(".item").siblings(".item").find(".reply .btn-reply").show();
				$(this).closest(".item").siblings(".item").find(".reply .form-reply").fadeOut();
			});
			
			$article.find(".article-content .video > iframe[src*='youtube']").each(function(){
				var $youtube = $(this);
				$youtube.attr("scale", $(this).attr("width") / $(this).attr("height"));
				$(window).on("load resize", function(){
						$youtube.each(function(){
							var w = $(this).parent(".video").width();
							var h = $(this).parent(".video").width() / $(this).attr("scale");
							$(this).attr("width", w).attr("height", h);
						});
					})
					.trigger("load");
			});
			
			// .article-content .slider
			(function(){
				$(window).on("load resize", function(){
					setSlider();						
				}).trigger("load");										
				function setSlider(){	
					$article.find(".article-content").find(".slider").each(function(){
						var $slider = $(this);
						var $slideList = $(this).find("ul");
						var $btnPrev = $(this).find(".btn-slider-prev-2");
						var $btnNext = $(this).find(".btn-slider-next-2");
						$slideList.carouFredSel({ 
							responsive  : true,
							items: {
								visible: 1,
								width: 920
							},
							auto: {
								//play: false,
								pauseOnHover: true,	
								duration: 500,
								timeoutDuration: 5000												 
							},
							swipe: {
								onTouch: true						
							},
							onCreate: function( data ) {
								$(this).trigger("currentPosition", function( pos ) {
									var txt = (pos+1) + " of the " + $("> *", this).length;
									$slider.find(".counter").html( txt );
								});
							},								
							scroll: {
								onBefore: function( data ) {
									var imgHeight = data.items.visible.find("img").outerHeight();
									$btnPrev.css("top", imgHeight/2 + "px");
									$btnNext.css("top", imgHeight/2 + "px");
								},
								onAfter : function( data ) {
									$(this).trigger("currentPosition", function( pos ) {
										var txt = (pos+1) + " of the " + $("> *", this).length;
										$slider.find(".counter").html( txt );
									});
								}									
							},
							prev: $btnPrev,
							next: $btnNext 
						});
					});
				}
			})();
		});
	}
	
	
	
	function initSearchPage(){
		$(".search-results").each(function(){
			var $sidebar = $(".sidebar", $(this));			
			$(".item .background", $sidebar).each(function(){
				if ( $(this).css("background-image") != "none" ) {
					$(this).closest(".item").addClass("bgr-img");	
				}
			});
		});
	}
	
	
	
})(jQuery);
	











