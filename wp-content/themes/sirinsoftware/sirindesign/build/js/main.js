var animates = {
    caseMainInfo : false,
};

var global_actions = {
    "open_subscribe_popup" : false,
}
$(document).ready(function () {
    
        initHelpers();
        initPageParams();
        initAnimate();
        initPopups();
        initBlogMainPageNew();
        initTeammembers();
        initArticlePage();
        initOwlCarousel();
        initMainPageServiceEvents();
        initResizeHeaderControl();
        initFaq();
        initStaticHeader();
        initCaseStudy();
        initAnimateElements();
        initTeam();
        initForms();
        

        if($('div').is('#particles-js') && window.innerWidth > 768) {
            setTimeout(function(){
                initBannerFon();
            },1000);
        }

        $('#sendFormButtomDesign').click(function (e) {
            e.preventDefault();
            sendFormProjectNew(this);
        });

        $('#sendFormButtomDesignModal').click(function (e) {
            e.preventDefault();
            $protected = $(this).attr('type');
            console.log($protected);
            if($protected == 'protected') {
                sendFormProjectNew(this, true, true);
            } else {
                sendFormProjectNew(this, true, false);
            }
        });

    if(window.innerWidth > 768) {
        new WOW({
            // boxClass:     'wow',      // default
            // animateClass: 'animated',
            // resetAnimation: false,
            mobile: false,
            callback: afterReveal,
        }).init();
    }


    function initBannerFon() {        
        var url = parseUrl(location.href, 'hostname');
        console.log(url);
        window.particlesJS.load('particles-js', 'https://'+url+'/wp-content/themes/sirinsoftware/sirindesign/build/js/particle.json', function() {
            $('#particles-js-box').addClass('show');
        });
    }


    function parseUrl(url, type) {

      if(!url || url === null) {
          return false;
      }

      var urlParts = /^(?:\w+\:\/\/)?([^\/]+)(.*)$/.exec(url);

      if(urlParts) {
          var hostname = urlParts[1]; // www.example.com
          var path = urlParts[2]; // /path/to/somwhere

          if(!type) {
              // type = 'path';
          }

          if(type === 'path') {
              return path;
          }

          if(type === 'hostname') {
              return hostname;
          }

          return {
              hostname: hostname,
              path: path,
          }
      } else {
          return url;
      }
  }

    function afterReveal (el) {
        if(el.id == 'green-box') {
            teamGreenBoxAnimation();
        }

        if(el.id == 'eights') {
            CaseMainInfoBoxAnimation();
            console.log('init animation case');
        }
    }


    function initAnimateElements() {

      (function($) {
          'use strict';
          //set active menu color
          $('.menuItems ul > li').each(function () {
              if($(this).find('a')) {
                  var url = parseUrl(location.href);
                  var urlMenu = parseUrl($(this).find('a').attr('href'));
                  if(urlMenu.hostname === url.hostname) {
                      if(urlMenu.path === url.path || urlMenu.path+'/' === url.path) {
                          $(this).addClass('active');
                          $(this).parents('li').addClass('active');
                      }
                  }

              }
          });

        //   var $banner = $('.interactive');
        //   if ($banner.length) {
        //       var $patterns = $banner.find('.pattern');

        //       var x = 0,
        //           y = 0;

        //       // Bind animation to cursor
        //       $(window).on('mousemove', function(event) {
        //           x = event.pageX;
        //           y = event.pageY;
        //       });

        //       /**
        //        * Tell the browser that we wish to perform an animation
        //        * @see https://developer.mozilla.org/en-US/docs/Web/API/window/requestAnimationFrame
        //        */
        //       window.requestAnimationFrame(function animation() {

        //           // Loop each pattern layer
        //           $patterns.each(function(key) {

        //               // Modify the x,y coords per element to give "depth"
        //               var modifier = 20 * (key + 1);

        //               // Move background position
        //               $(this).css({
        //                   'transform': 'translate('+(x / modifier)+'px, '+(y / modifier)+'px)'
        //               });

        //           });

        //           window.requestAnimationFrame(animation);

        //       });
        //   }

      })(jQuery);

      // animate article page
      // $('.article-content').find('*').addClass('wow fadeInUp duration-900');
      // init wow.js - animation with scroll
      // animate green buttons
      $('.btn.btn-green, .btn.btn-01, .btn.btn-orange').hover(function () {
          $(this).addClass('pulse animated duration-200');
      }, function () {
          $(this).removeClass('pulse animated duration-200');
      });

      //animate blog article buttons
      $('.sirin-main-blog').on('mouseenter','.item-action a', function () {
          $(this).addClass('pulse animated duration-200');
          var that = this;
          setTimeout(function () {
              $(that).removeClass('pulse animated duration-200')
          },250);
      });



      //animate awards images
      var awards_block = $('.main-awards');
      awards_block.on('mouseenter','.awards-list-item img', function (e) {
          $(this).addClass('swing animated duration-2s');
          var _that = this;
          setTimeout(function () {
              if($(_that).hasClass('swing')) {
                  $(_that).removeClass('duration-2s swing animated');
              }
          },2200);
      });

      // animateWithScroll();
  }


  function animateSetvicesItems(tab) {
      //animate services
      var services_block = $('.main-services');
      services_block.find('.item-content-box').removeClass('animated fadeInRight');
      var itemsBox = services_block.find('.tab-content[data-tab-active='+tab+'] .item-content-box');
      itemsBox.addClass('animated fadeInRight duration-1s');
  }

//   function animateSetvices() {
//       //animate services
//       var services_block = $('.main-services');
//       services_block.find('.title').addClass('animated fadeIn delay-500 duration-900');
//       setTimeout(function () {
//           services_block.find('.description').addClass('animated fadeIn delay-500 duration-900');
//       }, 1000);
//   }

  function animateCasesItems(tab) {
      //animate cases
      var cases_block = $('.main-related');

      cases_block.find('*.animated').removeClass('animated');

      var cases_block_item = $('.tab-content[data-tab-active='+tab+']');

      cases_block_item.find('.image-main').addClass('animated fadeInRight duration-400 delay-400');
      cases_block_item.find('.content .title').addClass('animated fadeIn duration-600 delay-900');
      cases_block_item.find('.content .description').addClass('animated fadeIn duration-600 delay-1200');
      cases_block_item.find('.content .action').addClass('animated fadeIn duration-600 delay-1200');
      cases_block_item.find('.carousel-box').addClass('animated fadeIn duration-800 delay-1200');
      setTimeout(function () {
          cases_block_item.find('.image-main').removeClass('animated fadeInRight duration-400 delay-400');
          cases_block_item.find('.content .title').removeClass('animated fadeIn duration-600 delay-900');
          cases_block_item.find('.content .description').removeClass('animated fadeIn duration-600 delay-1200');
          cases_block_item.find('.content .action').removeClass('animated fadeIn duration-600 delay-1200');
          cases_block_item.find('.carousel-box').removeClass('animated fadeIn duration-800 delay-1200');
      }, 2000);
  }

  function initMainPageServiceEvents() {
      /**
       * Service clicker
       * .main-services .blocks .tab-content .item-content-box .item-box
       */

      var service_clicker = $('.main-services .item-content-box .item-box .navigation');
      service_clicker.click(function (e) {
          e.preventDefault();
          if($(this).parents('.item-box').hasClass('active')) {
              service_clicker.parents('.item-box').removeClass('active');
          } else {
              service_clicker.parents('.item-box').removeClass('active');
              $(this).parents('.item-box').addClass('active');
          }
      });

      var service_clicker_2 = $('.service-items-2 .item-content-box .item-box .navigation');
      service_clicker_2.click(function (e) {
          e.preventDefault();
          if($(this).parents('.item-box').hasClass('active')) {
              service_clicker_2.parents('.item-box').removeClass('active');
          } else {
              service_clicker_2.parents('.item-box').removeClass('active');
              $(this).parents('.item-box').addClass('active');
          }
      });

      /**
       * Main page services tabs click
       */
      var tabs = $('.main-services .blocks .tabs .tab');
      var tabs_mobile = $('.main-services .blocks .mobile-tab .tab');

      tabs.click(function(e) {
          var tabNumber = $(this).attr('data-tab');
          if(!$(this).hasClass('active')) {
              tabs.removeClass('active');
              tabs_mobile.removeClass('active');
              tabs.parents('.blocks').find('.tab-content').removeClass('active').removeClass('vision');


              $(this).addClass('active');
              tabs_mobile.parents('.mobile-tab').find('.tab[data-tab="'+tabNumber+'"]').addClass('active');
              $(this).parents('.blocks').find('.tab-content[data-tab-active="'+tabNumber+'"]').addClass('active');
              var that_ = this;
              setTimeout(function () {
                  $(that_).parents('.blocks').find('.tab-content[data-tab-active="'+tabNumber+'"]').addClass('vision');

              },300);

          } else {
              tabs.removeClass('active');
              tabs_mobile.removeClass('active');
              tabs.parents('.blocks').find('.tab-content').removeClass('active').removeClass('vision');
          }

          animateSetvicesItems(tabNumber);
      });

      tabs_mobile.click(function () {
          var tabNumber = $(this).attr('data-tab');
          if(!$(this).hasClass('active')) {
              tabs_mobile.removeClass('active');
              tabs.removeClass('active');
              tabs_mobile.parents('.blocks').find('.tab-content').removeClass('active').removeClass('vision');

              $(this).addClass('active');
              tabs.parents('.tabs').find('.tab[data-tab="'+tabNumber+'"]').addClass('active');
              $(this).parents('.blocks').find('.tab-content[data-tab-active="'+tabNumber+'"]').addClass('active');
              var that_ = this;
              setTimeout(function () {
                  $(that_).parents('.blocks').find('.tab-content[data-tab-active="'+tabNumber+'"]').addClass('vision');

              },300)

          } else {
              tabs_mobile.removeClass('active');
              tabs.removeClass('active');
              tabs_mobile.parents('.blocks').find('.tab-content').removeClass('active').removeClass('vision');
          }
          animateSetvicesItems(tabNumber);
      });
      initResizeServiceTabsControl();
  }




    /**
     * Unclickable menu with childrens
     */
    $('.menu-item-has-children > a').click(function (e) {

      var parent = $(this).parents('.menu-item-has-children');
      e.preventDefault();
      if(parent.hasClass('open')) {
          $(this).parents('.menu-item-has-children').removeClass('open');
      } else {
          $(this).parents('.menu-item-has-children').addClass('open');
      }
    });


    // $('.expertise-scrollable').addClass('active');
    // $('.experience-scrollable').addClass('active');


    /**
     * Main page related case studies Tabs click
     * @type {jQuery|HTMLElement}
     */
    var tabs_related = $('.main-related .blocks .tabs .tab');
    var tabs_related_mobile = $('.main-related .blocks .mobile-tab .tab');
    tabs_related.click(function(e) {
        var tabNumber = $(this).attr('data-tab');
        if(!$(this).hasClass('active')) {
            tabs_related.removeClass('active');
            tabs_related_mobile.removeClass('active');
            tabs_related.parents('.blocks').find('.tab-content').removeClass('active').removeClass('vision');

            $(this).addClass('active');
            tabs_related_mobile.parents('.mobile-tab').find('.tab[data-tab="'+tabNumber+'"]').addClass('active');
            $(this).parents('.blocks').find('.tab-content[data-tab-active="'+tabNumber+'"]').addClass('active');
            var that_ = this;
            setTimeout(function () {
                $(that_).parents('.blocks').find('.tab-content[data-tab-active="'+tabNumber+'"]').addClass('vision');
            },300)
        }
        animateCasesItems(tabNumber)

    });

    tabs_related_mobile.click(function () {
        var tabNumber = $(this).attr('data-tab');
        if(!$(this).hasClass('active')) {
            tabs_related_mobile.removeClass('active');
            tabs_related.removeClass('active');
            tabs_related_mobile.parents('.blocks').find('.tab-content').removeClass('active').removeClass('vision');

            $(this).addClass('active');
            tabs_related.parents('.tabs').find('.tab[data-tab="'+tabNumber+'"]').addClass('active');
            $(this).parents('.blocks').find('.tab-content[data-tab-active="'+tabNumber+'"]').addClass('active');
            var that_ = this;
            setTimeout(function () {
                $(that_).parents('.blocks').find('.tab-content[data-tab-active="'+tabNumber+'"]').addClass('vision');
            },300)
        }
        animateCasesItems(tabNumber)
    });


    /**
     * Menu 768 - 1200 px
     */



    $('#openMenuButton').click(function () {
        if(window.innerWidth > 768 && window.innerWidth<=1200) {
            if(!$(this).hasClass('opened')) {
                $(this).addClass('opened');
                $(this).parents('.sirin-header').find('.menuItems').addClass('open-desctop scrollbar-outer ');
                $('.open-desctop').scrollbar();
            } else {
                $(this).removeClass('opened');
                $(this).parents('.sirin-header').find('.menuItems').removeClass('open-desctop');
            }
        } else if (window.innerWidth <= 768) {

            if(!$(this).hasClass('opened')) {
                $(this).addClass('opened');

                document.body.style.overflow = 'hidden';
                $(this).parents('.sirin-header').addClass('mobile-header');
                $(this).parents('.sirin-header').find('.menuItems').addClass('open-mobile');
            } else {
                $(this).removeClass('opened');

                document.body.style.overflow = 'initial';
                $(this).parents('.sirin-header').removeClass('mobile-header');
                $(this).parents('.sirin-header').find('.menuItems').removeClass('open-mobile');
            }
        }
    });


    /**
     * Init resize serviceTabs control
     */
    function initResizeServiceTabsControl() {

        var tabs = $('.main-services .blocks .tabs .tab');
        var tabs_mobile = $('.main-services .blocks .mobile-tab .tab');

        setInterval(function () {

            var screen = window.innerWidth;

            if(screen > 768) {
                if(!tabs_mobile.hasClass('active') && !tabs.hasClass('active')) {
                    var tabNumber = 1;
                    var first_tab = tabs.parent('.tabs').find('.tab[data-tab="'+tabNumber+'"]');
                    var first_mobile_tab = tabs_mobile.parents('.mobile-tab').find('.tab[data-tab="'+tabNumber+'"]');
                    first_tab.addClass('active');
                    first_mobile_tab.addClass('active');

                    first_tab.parents('.blocks').find('.tab-content[data-tab-active="'+tabNumber+'"]').addClass('active');
                    var that_ = this;
                    setTimeout(function () {
                        first_tab.parents('.blocks').find('.tab-content[data-tab-active="'+tabNumber+'"]').addClass('vision');
                    },300)
                }
            }
        }, 500);
    }



    /**
     * Init resize header control
     */

    function initResizeHeaderControl() {

        setInterval(function () {
            var screen = window.innerWidth;

            if(screen <= 768) {
                if($('.sirin-header').find('.menuItems').hasClass('open-desctop')) {
                    $('.open-desctop').scrollbar('destroy');
                    $('.sirin-header').find('.menuItems').removeClass('open-desctop');
                    $('#openMenuButton').removeClass('opened');
                }
            }

            if(screen > 768 && screen<=1200) {

                if($('.sirin-header').hasClass('mobile-header')) {
                    $('.sirin-header').removeClass('mobile-header');
                    $('#openMenuButton').removeClass('opened');
                }
            }

            if(screen > 1200) {

                if($('.sirin-header').hasClass('mobile-header')) {
                    $('.sirin-header').removeClass('mobile-header');
                    $('#openMenuButton').removeClass('opened');
                }

                if($('.sirin-header').find('.menuItems').hasClass('open-desctop')) {
                    $('.open-desctop').scrollbar('destroy');
                    $('.sirin-header').find('.menuItems').removeClass('open-desctop');
                    $('#openMenuButton').removeClass('opened');
                }
            }

        },500);
    }

  /**
   * Initialize owl carusel plugin
   */
function initOwlCarousel() {

    var initMainExpertize = false;
    var initServiceLatestPosts = false;
    var initSectionLatestPosts = false;
    var initMainClients = false;
    var initMainLatestPosts = false;
    var initMainTestimonials = false;
    $(window).on('scroll', function(){
        var top = $(window).scrollTop();
         
        if($('div').hasClass('main-expertize')) {
            var currentExpertize  = $('.main-expertize').offset().top;
            if(currentExpertize - top < 800 && !initMainExpertize) {
                initCarouselExpertize();
                initMainExpertize = true;
            }
        }
        if($('div').hasClass('service-latest-posts')) {
            var currentServiceLatestPosts  = $('.service-latest-posts').offset().top;
            if(currentServiceLatestPosts - top < 800 && !initServiceLatestPosts) {
                initCarouselServiceLatestPost();
                initServiceLatestPosts = true;
            }
        }
        if($('div').hasClass('section-latest-posts')) {
            var currentSectionLatestPosts  = $('.section-latest-posts').offset().top;
            if(currentSectionLatestPosts - top < 800 && !initSectionLatestPosts) {
                initCarouselSectionLatestPost();
                initSectionLatestPosts = true;
            }
        }
     
        if($('div').hasClass('main-clients')) {
            var currentSectionLatestPosts  = $('.main-clients').offset().top;
            if(currentSectionLatestPosts - top < 800 && !initMainClients) {
                initCarouselMainClients();
                initMainClients = true;
            }
        }
        
        //for latest posts block
        if($('div').hasClass('main-latest-posts')) {
            var currentSectionLatestPosts  = $('.main-latest-posts').offset().top;
            if(currentSectionLatestPosts - top < 800 && !initMainLatestPosts) {
                initCarouselMainLatestPosts();
                initMainLatestPosts = true;
            }
        }
    
        //for testimonials block
        if($('div').hasClass('main-testimonials')) {
            var currentSectionLatestPosts  = $('.main-testimonials').offset().top;
            if(currentSectionLatestPosts - top < 800 && !initMainTestimonials) {
                initCarouselTestimonials();
                initMainTestimonials = true;
            }
        }
       
    });

    

    function initCarouselExpertize() {

        $(".main-expertize .owl-carousel").owlCarousel(
            {
                items: 6,
                margin:0,
                loop: true,
                nav: false,
                dots:true,
                autoplay:true,
                autoplayHoverPause: true,
                slideBy: 6,
                lazyLoad : true,
                responsive: {
                    0:{
                        items: 4,
  
                    },
                    400: {
                        items:4,
                    },
                    700: {
                        items: 4,
                    },
                    900: {
                        items: 4,
                    },
                    1200: {
                        items: 6,
                    },
                }
            }
        );
    }

      // service-slider
    function initCarouselServiceLatestPost() {
        $(".service-latest-posts .owl-carousel").owlCarousel(
            {
                items: 3,
                margin:0,
                loop: true,
                nav: false,
                dots:true,
                autoplay:true,
                autoplayHoverPause: true,
                lazyLoad : true,
                responsive: {
                    0:{
                        items: 1,

                    },
                    768: {
                        items: 2,
                    },
                    992: {
                        items: 3,
                    },
                    1200: {
                        items: 3,
                    }
                }
            }
        );
    }

    function initCarouselSectionLatestPost() {
        $(".section-latest-posts .owl-carousel").owlCarousel(
            {
                items: 3,
                margin:0,
                loop: true,
                nav: false,
                dots:true,
                autoplay:true,
                autoplayHoverPause: true,
                lazyLoad : true,
                responsive: {
                    0:{
                        items: 1,
  
                    },
                    768: {
                        items: 2,
                    },
                    992: {
                        items: 3,
                    },
                    1200: {
                        items: 3,
                    }
                }
            }
        );
    }

    //team-slider
    if($('div').hasClass('team-page')) {
      $('.team-page .slider .owl-carousel').owlCarousel(
          {
              items: 1,
              margin:0,
              loop: true,
              nav: false,
              dots:true,
              autoplay:true,
              autoplayTimeout: 10000,
              lazyLoad : true,
              autoplayHoverPause: true,
          }
      );
    }   


      //case-inside-slider

    if($('div').hasClass('sirin-inside-portfolio')) {
        jQuery('.sirin-inside-portfolio .owl-carousel').owlCarousel(
            {
                items: 2,
                margin:0,
                loop: true,
                nav: false,
                dots:true,
                autoplay:true,
                autoplayTimeout: 10000,
                autoplayHoverPause: true,
                lazyLoad : true,
                responsive: {
                    0:{
                        items: 1,

                    },
                    992: {
                        items: 2,
                    }
                }
            }
        );  
    }
          
    if(window.innerWidth > 768) {
        // main-slider
        $('.main-slider .owl-carousel').owlCarousel(
            {
                items: 1,
                margin:0,
                loop: true,
                nav: false,
                dots:true,
                autoplay:true,
                autoplayTimeout: 10000,
                autoplayHoverPause: true,
                lazyLoad : true,
            }
        );

        //awards-slider

        $('.main-awards .owl-carousel').owlCarousel(
            {
                items: 4,
                margin:0,
                loop: true,
                nav: true,
                dots:false,
                autoplay:true,
                autoplayHoverPause: true,
                lazyLoad : true,
                responsive: {
                    0:{
                        items: 2,

                    },
                    700: {
                        items: 2,
                    },
                    768: {
                        items: 3,
                    },
                    850: {
                        items: 4,
                    },
                    992: {
                        items: 4,
                    }
                }
            }
        );

    }

    //for expertize block

      //for clients block

    function initCarouselMainClients() {
        $(".main-clients .owl-carousel").owlCarousel(
            {
                items: 6,
                margin:0,
                loop: true,
                nav: false,
                dots:true,
                autoplay:true,
                autoplayHoverPause: true,
                lazyLoad : true,
                responsive: {
                    0:{
                        items: 3,
                    },
                    700: {
                        items: 3,
                    },
                    900: {
                        items: 6,
                    },
                    1200: {
                        items: 6,
                    }
                }
            }
        );
    }

    function initCarouselMainLatestPosts() {
        $(".main-latest-posts .owl-carousel").owlCarousel(
            {
                items: 3,
                margin:0,
                loop: true,
                nav: false,
                dots:true,
                autoplay:true,
                autoplayHoverPause: true,
                lazyLoad : true,
                responsive: {
                    0:{
                        items: 1,
  
                    },
                    768: {
                        items: 2,
                    },
                    992: {
                        items: 3,
                    },
                    1200: {
                        items: 3,
                    }
                }
            }
        );
    }

    

    function initCarouselTestimonials() {
        $(".main-testimonials .owl-carousel").owlCarousel(
          {
              items: 1,
              margin:0,
              loop: true,
              nav: false,
              dots:true,
              autoplay:true,
              autoplayHoverPause: true,
              lazyLoad : true,
          }
      );
    }

  }

});


function initAnimate(){

//   $(".outsourcing-outstaffing .outsourcing .company .circle").each(function(){
//     if ( !$("#company_circle_white").length ) return;
//     var $circle = $(this);
//     $(window).on("load scroll resize", function(){
//       if ( $circle.is(":in-viewport(-100)") && !$circle.is(".animate") ) {
//         $circle.addClass("animate");
//         animateCompanyCircleWhite();
//       }
//     });
//     function animateCompanyCircleWhite(){
//       var s = Snap("#company_circle_white");
//       var pth1 = "M128.419,129.287V2C58.917,5.597,3.67,63.088,3.67,133.484c0,21.493,5.152,41.78,14.284,59.7L128.419,129.287z";
//       var pth2 = "M142.418,129.096l110.41,63.865C261.889,175.094,267,154.889,267,133.484c0-70.34-55.158-127.793-124.582-131.475V129.096L142.418,129.096z";
//       var pth3 = "M135.584,141.314L24.97,205.299c23.493,36.031,64.144,59.852,110.364,59.852c46.313,0,87.031-23.912,110.504-60.061L135.584,141.314z";
//       var line1 = s.path(pth1).attr({
//         stroke: "#a6c850",
//         strokeWidth: 1,
//         fill: "#a6c850",
//         fillOpacity: 0,
//         strokeDasharray: Snap.path.getTotalLength(pth1),
//         strokeDashoffset: Snap.path.getTotalLength(pth1)
//       });
//       var line2 = s.path(pth2).attr({
//         stroke: "#e69f33",
//         strokeWidth: 1,
//         fill: "#e69f33",
//         fillOpacity: 0,
//         strokeDasharray: Snap.path.getTotalLength(pth2),
//         strokeDashoffset: Snap.path.getTotalLength(pth2)
//       });
//       var line3 = s.path(pth3).attr({
//         stroke: "#e0d9d7",
//         strokeWidth: 1,
//         fillOpacity: 0,
//         strokeDasharray: Snap.path.getTotalLength(pth3),
//         strokeDashoffset: Snap.path.getTotalLength(pth3)
//       });
//       line1.animate({strokeDashoffset: 0}, 1500, function(){
//         line1.animate({fillOpacity: 1, strokeWidth: 0}, 300);
//       });
//       line2.animate({strokeDashoffset: 0}, 1500, function(){
//         line2.animate({fillOpacity: 1, strokeWidth: 0}, 300);
//       });
//       line3.animate({strokeDashoffset: 0}, 1500);
//     }
//   });


//   $(".outsourcing-outstaffing .outsourcing .solution .circle").each(function(){
//     if ( !$("#solution_circle_white").length ) return;
//     var $circle = $(this);
//     $(window).on("load scroll resize", function(){
//       if ( $circle.is(":in-viewport(-100)") && !$circle.is(".animate") ) {
//         $circle.addClass("animate");
//         animateSolutionCircleWhite();
//       }
//     });
//     function animateSolutionCircleWhite(){
//       var s = Snap("#solution_circle_white");
//       var pth1 = "M236.219,88.033l19.252-7.192c-8.033-18.351-20.383-35.142-36.904-48.746c-22.59-18.6-49.525-28.406-76.664-29.835l0.008-0.053C72.421-1.674,11.324,49.556,3.771,119.547c-2.306,21.367,0.64,42.089,7.796,60.887l0.158-0.07c7.849,20.791,21.067,39.875,39.454,55.017c16.591,13.662,35.526,22.58,55.165,26.922l6.56-39.524l0,0l15.691-94.467L236.219,88.033L236.219,88.033z";
//       var pth2 = "M141.074,138.521l-20.918,126.063c42.748,4.768,86.977-11.471,116.357-47.154c29.438-35.75,36.86-82.385,23.877-123.48L141.074,138.521z";
//       line1 = s.path(pth1).attr({
//         stroke: "#a6c850",
//         fill: "#a6c850",
//         fillOpacity: 0,
//         strokeWidth: 1,
//         strokeDasharray: Snap.path.getTotalLength(pth1),
//         strokeDashoffset: Snap.path.getTotalLength(pth1)
//       });
//       line2 = s.path(pth2).attr({
//         stroke: "#e0d9d7",
//         fillOpacity: 0,
//         strokeWidth: 1,
//         strokeDasharray: Snap.path.getTotalLength(pth2),
//         strokeDashoffset: Snap.path.getTotalLength(pth2)
//       });
//       line1.animate({"stroke-dashoffset": 0}, 1500, function(){
//         line1.animate({fillOpacity: 1, strokeWidth: 0}, 300);
//       });
//       line2.animate({"stroke-dashoffset": 0}, 1500);
//     }
//   });


//   $(".outsourcing-outstaffing .outstaffing .diagram").each(function(){
//     var $diagram = $(this);
//     $(window).on("load scroll resize", function(){
//       if ( $diagram.is(":in-viewport(-200)") ) {
//         $diagram.addClass("animate");
//       }
//     });
//   });


//   $(".outsourcing-outstaffing .outsourcing .company .circle").each(function(){
//     if ( !$("#company_circle_green").length ) return;
//     var $circle = $(this);
//     $(window).on("load scroll resize", function(){
//       if ( $circle.is(":in-viewport(-100)") && !$circle.is(".animate") ) {
//         $circle.addClass("animate");
//         animateCompanyCircleGreen();
//       }
//     });
//     function animateCompanyCircleGreen(){
//       var s = Snap("#company_circle_green");
//       var pth1 = "M128.419,129.287V2C58.917,5.597,3.67,63.088,3.67,133.484c0,21.493,5.152,41.78,14.284,59.7L128.419,129.287z";
//       var pth2 = "M142.418,129.096l110.41,63.865C261.889,175.094,267,154.889,267,133.484c0-70.34-55.158-127.793-124.582-131.475V129.096L142.418,129.096z";
//       var pth3 = "M135.584,141.314L24.97,205.299c23.493,36.031,64.144,59.852,110.364,59.852c46.313,0,87.031-23.912,110.504-60.061L135.584,141.314z";
//       var line1 = s.path(pth1).attr({
//         stroke: "#ffffff",
//         strokeWidth: 1,
//         fill: "#ffffff",
//         fillOpacity: 0,
//         strokeDasharray: Snap.path.getTotalLength(pth1),
//         strokeDashoffset: Snap.path.getTotalLength(pth1)
//       });
//       var line2 = s.path(pth2).attr({
//         stroke: "#ffffff",
//         strokeWidth: 1,
//         fill: "#ffffff",
//         fillOpacity: 0,
//         strokeDasharray: Snap.path.getTotalLength(pth2),
//         strokeDashoffset: Snap.path.getTotalLength(pth2)
//       });
//       var line3 = s.path(pth3).attr({
//         stroke: "#ffffff",
//         strokeWidth: 1,
//         fillOpacity: 0,
//         strokeDasharray: Snap.path.getTotalLength(pth3),
//         strokeDashoffset: Snap.path.getTotalLength(pth3)
//       });
//       line1.animate({strokeDashoffset: 0}, 1500, function(){
//         line1.animate({fillOpacity: 1, strokeWidth: 0}, 300);
//       });
//       line2.animate({strokeDashoffset: 0}, 1500, function(){
//         line2.animate({fillOpacity: 1, strokeWidth: 0}, 300);
//       });
//       line3.animate({strokeDashoffset: 0}, 1500);
//     }
//   });


//   $(".outsourcing-outstaffing .outsourcing .solution .circle").each(function(){
//     if ( !$("#solution_circle_green").length ) return;
//     var $circle = $(this);
//     $(window).on("load scroll resize", function(){
//       if ( $circle.is(":in-viewport(-100)") && !$circle.is(".animate") ) {
//         $circle.addClass("animate");
//         animateSolutionCircleGreen();
//       }
//     });
//     function animateSolutionCircleGreen(){
//       var s = Snap("#solution_circle_green");
//       var pth1 = "M236.219,88.033l19.252-7.192c-8.033-18.351-20.383-35.142-36.904-48.746c-22.59-18.6-49.525-28.406-76.664-29.835l0.008-0.053C72.421-1.674,11.324,49.556,3.771,119.547c-2.306,21.367,0.64,42.089,7.796,60.887l0.158-0.07c7.849,20.791,21.067,39.875,39.454,55.017c16.591,13.662,35.526,22.58,55.165,26.922l6.56-39.524l0,0l15.691-94.467L236.219,88.033L236.219,88.033z";
//       var pth2 = "M141.074,138.521l-20.918,126.063c42.748,4.768,86.977-11.471,116.357-47.154c29.438-35.75,36.86-82.385,23.877-123.48L141.074,138.521z";
//       line1 = s.path(pth1).attr({
//         stroke: "#ffffff",
//         fill: "#ffffff",
//         fillOpacity: 0,
//         strokeWidth: 1,
//         strokeDasharray: Snap.path.getTotalLength(pth1),
//         strokeDashoffset: Snap.path.getTotalLength(pth1)
//       });
//       line2 = s.path(pth2).attr({
//         stroke: "#ffffff",
//         fillOpacity: 0,
//         strokeWidth: 1,
//         strokeDasharray: Snap.path.getTotalLength(pth2),
//         strokeDashoffset: Snap.path.getTotalLength(pth2)
//       });
//       line1.animate({"stroke-dashoffset": 0}, 1500, function(){
//         line1.animate({fillOpacity: 1, strokeWidth: 0}, 300);
//       });
//       line2.animate({"stroke-dashoffset": 0}, 1500);
//     }
//   });


//   $(".bnr-top .outsourcing .company .circle").each(function(){
//     var $circle = $(this);
//     $(window).on("load scroll resize", function(){
//       if ( $circle.is(":in-viewport(-100)") && !$circle.is(".animate") ) {
//         $circle.addClass("animate");
//         animateBannerCompanyCircle();
//       }
//     });
//     function animateBannerCompanyCircle(){
//       var s = Snap("#bnr_top_company_circle");
//       var pth1 = "M128.419,129.287V2C58.917,5.597,3.67,63.088,3.67,133.484c0,21.493,5.152,41.78,14.284,59.7L128.419,129.287z";
//       var pth2 = "M142.418,129.096l110.41,63.865C261.889,175.094,267,154.889,267,133.484c0-70.34-55.158-127.793-124.582-131.475V129.096L142.418,129.096z";
//       var pth3 = "M135.584,141.314L24.97,205.299c23.493,36.031,64.144,59.852,110.364,59.852c46.313,0,87.031-23.912,110.504-60.061L135.584,141.314z";
//       var line1 = s.path(pth1).attr({
//         stroke: "#a6c850",
//         strokeWidth: 1,
//         fill: "#a6c850",
//         fillOpacity: 0,
//         strokeDasharray: Snap.path.getTotalLength(pth1),
//         strokeDashoffset: Snap.path.getTotalLength(pth1)
//       });
//       var line2 = s.path(pth2).attr({
//         stroke: "#e69f33",
//         strokeWidth: 1,
//         fill: "#e69f33",
//         fillOpacity: 0,
//         strokeDasharray: Snap.path.getTotalLength(pth2),
//         strokeDashoffset: Snap.path.getTotalLength(pth2)
//       });
//       var line3 = s.path(pth3).attr({
//         stroke: "#ffffff",
//         strokeWidth: 1,
//         fillOpacity: 0,
//         strokeDasharray: Snap.path.getTotalLength(pth3),
//         strokeDashoffset: Snap.path.getTotalLength(pth3)
//       });
//       line1.animate({strokeDashoffset: 0}, 1500, function(){
//         line1.animate({fillOpacity: 1, strokeWidth: 0}, 300);
//       });
//       line2.animate({strokeDashoffset: 0}, 1500, function(){
//         line2.animate({fillOpacity: 1, strokeWidth: 0}, 300);
//       });
//       line3.animate({strokeDashoffset: 0}, 1500);
//     }
//   });


//   $(".bnr-top .outsourcing .solution .circle").each(function(){
//     var $circle = $(this);
//     $(window).on("load scroll resize", function(){
//       if ( $circle.is(":in-viewport(-100)") && !$circle.is(".animate") ) {
//         $circle.addClass("animate");
//         animateBannerSolutionCircle();
//       }
//     });
//     function animateBannerSolutionCircle(){
//       var s = Snap("#bnr_top_solution_circle");
//       var pth1 = "M236.219,88.033l19.252-7.192c-8.033-18.351-20.383-35.142-36.904-48.746c-22.59-18.6-49.525-28.406-76.664-29.835l0.008-0.053C72.421-1.674,11.324,49.556,3.771,119.547c-2.306,21.367,0.64,42.089,7.796,60.887l0.158-0.07c7.849,20.791,21.067,39.875,39.454,55.017c16.591,13.662,35.526,22.58,55.165,26.922l6.56-39.524l0,0l15.691-94.467L236.219,88.033L236.219,88.033z";
//       var pth2 = "M141.074,138.521l-20.918,126.063c42.748,4.768,86.977-11.471,116.357-47.154c29.438-35.75,36.86-82.385,23.877-123.48L141.074,138.521z";
//       line1 = s.path(pth1).attr({
//         stroke: "#a6c850",
//         fill: "#a6c850",
//         fillOpacity: 0,
//         strokeWidth: 1,
//         strokeDasharray: Snap.path.getTotalLength(pth1),
//         strokeDashoffset: Snap.path.getTotalLength(pth1)
//       });
//       line2 = s.path(pth2).attr({
//         stroke: "#ffffff",
//         fillOpacity: 0,
//         strokeWidth: 1,
//         strokeDasharray: Snap.path.getTotalLength(pth2),
//         strokeDashoffset: Snap.path.getTotalLength(pth2)
//       });
//       line1.animate({"stroke-dashoffset": 0}, 1500, function(){
//         line1.animate({fillOpacity: 1, strokeWidth: 0}, 300);
//       });
//       line2.animate({"stroke-dashoffset": 0}, 1500);
//     }
//   });


//   $(".bnr-top .outstaffing .diagram").each(function(){
//     var $diagram = $(this);
//     var $td = $("> div > div > div", $(this));
//     $(window).on("load scroll resize", function(){
//       if ( $diagram.is(":in-viewport(-100)") ) {
//         $diagram.addClass("animate");
//       }
//       $td.each(function(){
//         $(this).css("height","").css("height", $(this).parent().outerHeight() + "px");
//       });
//     });
//   });


//   $(".section.inet-things .diagram").each(function(){
//     var $this = $(this);
//     $(window).on("load scroll resize", function(){
//       if ( $this.is(":in-viewport(-200)") ) {
//         $this.addClass("animate");
//       }
//     });
//   });


//   $(".section.inet-things .diagram .circle, .section.inet-things .diagram .title").each(function(){
//     var $this = $(this);
//     $(window).on("load scroll resize", function(){
//       if ( $this.is(":in-viewport(-50)") ) {
//         $this.addClass("animate");
//       }
//     });
//   });


  $(".section.world-lines .diagram").each(function(){
    var $this = $(this);
    // $(window).on("load scroll resize", function(){
    //   if ( $this.is(":in-viewport(-200)") ) {
        $this.addClass("animate");
    //   }
    // });
  });


//   $(".section.they-are li").each(function(){
//     var $this = $(this);
//     $(window).on("load scroll resize", function(){
//       if ( $this.is(":in-viewport(-120)") ) {
//         $this.addClass("animate");
//       }
//     });
//   });


//   $(".section.according .descript").each(function(){
//     var $this = $(this);
//     $(window).on("load scroll resize", function(){
//       if ( $this.is(":in-viewport(-150)") && !$this.hasClass("animate") ) {
//         $this.addClass("animate");
//         $this.find("span.timer1").countTo();
//         $this.find("span.timer2").countTo();
//         $this.find("span.timer3").countTo({
//           formatter: function (value, options) {
//             return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
//           }
//         });
//       }
//     });
//   });


//   $(".section.mobile-approaches .diagram .svg-wrap").each(function(){
//     var $diagram = $(this);
//     $(window).on("load scroll resize", function(){
//       if ( $diagram.is(":in-viewport(-100)") && !$diagram.is(".animate") ) {
//         $diagram.addClass("animate");
//         animateMobileApproaches();
//       }
//     });
//     function animateMobileApproaches(){
//       var s = Snap("#diagram_mobile_approaches");
//       var p1 = "M260.861,367.685v69.238c0,12.68-10.316,22.996-22.996,22.996H27.995C15.315,459.919,5,449.603,5,436.923 V27.995C5,15.315,15.315,5,27.995,5h209.87c12.68,0,22.996,10.315,22.996,22.995v51.731l5-4.772V27.995 C265.861,12.559,253.303,0,237.865,0H27.995C12.559,0,0,12.559,0,27.995v408.928c0,15.438,12.559,27.996,27.995,27.996h209.87 c15.438,0,27.996-12.559,27.996-27.996v-64.467L260.861,367.685z";
//       var p2 = "M245.021,352.567v36.693H20.84V58.666h224.182v36.177l3-2.863V57.166c0-0.829-0.672-1.5-1.5-1.5H19.34 c-0.828,0-1.5,0.671-1.5,1.5v333.595c0,0.828,0.672,1.5,1.5,1.5h227.182c0.828,0,1.5-0.672,1.5-1.5v-35.33L245.021,352.567z";
//       var p3 = "M160.58,31.665h-55.299v-3h55.299V31.665z M92.596,428.724h-55.3v-3h55.3V428.724z M227.391,425.724H172.09v3h55.301V425.724z";
//       var p4 = "M132.344,444.708c-9.642,0-17.486-7.844-17.486-17.484s7.845-17.486,17.486-17.486 c9.641,0,17.484,7.846,17.484,17.486S141.984,444.708,132.344,444.708z M132.344,412.737c-7.987,0-14.486,6.5-14.486,14.486 s6.499,14.484,14.486,14.484c7.986,0,14.484-6.498,14.484-14.484S140.33,412.737,132.344,412.737z";
//       var p5 = "M297.59,168.225l-166.991,54.092L297.59,62.95V168.225z";
//       var p6 = "M518.078,168.226H300.672V62.95h217.406V168.226z";
//       var p7 = "M297.59,276.345l-166.991-52.641l166.991-52.637V276.345z";
//       var p8 = "M518.078,276.345H300.672V171.067h217.406V276.345z";
//       var p9 = "M297.59,384.46L130.599,225.093l166.991,54.092V384.46z";
//       var p10 = "M518.078,384.46H300.672V279.185h217.406V384.46z";
//       var startAttr = {
//         fill: "#ffffff",
//         stroke: "#ffffff",
//         fillOpacity: 0,
//         strokeWidth: 1,
//         //strokeOpacity: 1,
//         length: 0
//       };
//       var line1 = s.path(p1).attr($.extend(startAttr, {
//         strokeDasharray: Snap.path.getTotalLength(p1),
//         strokeDashoffset: Snap.path.getTotalLength(p1)
//       }));
//       var line2 = s.path(p2).attr($.extend(startAttr, {
//         strokeDasharray: Snap.path.getTotalLength(p2),
//         strokeDashoffset: Snap.path.getTotalLength(p2)
//       }));
//       var line3 = s.path(p3).attr($.extend(startAttr, {
//         strokeDasharray: Snap.path.getTotalLength(p3),
//         strokeDashoffset: Snap.path.getTotalLength(p3)
//       }));
//       var line4 = s.path(p4).attr({
//         fill: "#ffffff",
//         stroke: "#ffffff",
//         fillOpacity: 0,
//         strokeWidth: 1,
//         transform: "s0"
//       });
//       var line5 = s.path(p5).attr($.extend(startAttr, {
//         strokeDasharray: Snap.path.getTotalLength(p5),
//         strokeDashoffset: Snap.path.getTotalLength(p5)
//       }));
//       var line6 = s.path(p6).attr($.extend(startAttr, {
//         strokeDasharray: Snap.path.getTotalLength(p6),
//         strokeDashoffset: Snap.path.getTotalLength(p6)
//       }));
//       var line7 = s.path(p7).attr($.extend(startAttr, {
//         strokeDasharray: Snap.path.getTotalLength(p7),
//         strokeDashoffset: Snap.path.getTotalLength(p7)
//       }));
//       var line8 = s.path(p8).attr($.extend(startAttr, {
//         strokeDasharray: Snap.path.getTotalLength(p8),
//         strokeDashoffset: Snap.path.getTotalLength(p8)
//       }));
//       var line9 = s.path(p9).attr($.extend(startAttr, {
//         strokeDasharray: Snap.path.getTotalLength(p9),
//         strokeDashoffset: Snap.path.getTotalLength(p9)
//       }));
//       var line10 = s.path(p10).attr($.extend(startAttr, {
//         strokeDasharray: Snap.path.getTotalLength(p10),
//         strokeDashoffset: Snap.path.getTotalLength(p10)
//       }));

//       line1.animate({strokeDashoffset: 0}, 2000, function(){
//         line1.animate({fillOpacity: 1, strokeWidth: 0}, 500)
//       });
//       line2.animate({strokeDashoffset: 0}, 2000, function(){
//         line2.animate({fillOpacity: 1, strokeWidth: 0}, 500)
//       });
//       line3.animate({strokeDashoffset: 0}, 2000, function(){
//         line3.animate({fillOpacity: 1, strokeWidth: 0}, 500)
//       });
//       line4.animate({transform: "S1"}, 2000, mina.elastic, function(){
//         line4.animate({fillOpacity: 1, strokeWidth: 0}, 500)
//       });
//       line5.animate({strokeDashoffset: 0}, 2000, function(){
//         line5.animate({fillOpacity: 1, strokeWidth: 0}, 500)
//       });
//       line6.animate({strokeDashoffset: 0}, 2000, function(){
//         line6.animate({fillOpacity: 1, strokeWidth: 0}, 500)
//       });
//       line7.animate({strokeDashoffset: 0}, 2000, function(){
//         line7.animate({fillOpacity: 1, strokeWidth: 0}, 500)
//       });
//       line8.animate({strokeDashoffset: 0}, 2000, function(){
//         line8.animate({fillOpacity: 1, strokeWidth: 0}, 500)
//       });
//       line9.animate({strokeDashoffset: 0}, 2000, function(){
//         line9.animate({fillOpacity: 1, strokeWidth: 0}, 500)
//       });
//       line10.animate({strokeDashoffset: 0}, 2000, function(){
//         line10.animate({fillOpacity: 1, strokeWidth: 0}, 500)
//       });
//     }
//   });


//   $(".section .descript .logos").each(function(){
//     var $this = $(this);
//     $(window).on("load scroll resize", function(){
//       if ( $this.is(":in-viewport(-120)") && $this.is(":visible") ) {
//         $this.addClass("animate");
//       }
//     });
//   });
}


function initHelpers(){
    $(window).on("load resize", function(){
        $("html").attr("w", window.innerWidth);
    });

    if($('*').is('select')) {
        $("select").noosSelect({
            showElements: 5
        });
    }
    

    $('.goToLink').click(function (e) {
        console.log(e);
        var link = $(this).attr('href');
        location.href = link;
    });

    // $('[data-scrollable="y"]').mCustomScrollbar();
    //
    // $("[hint]").poshytip({
    //     alignTo: 'target',
    //     alignX: 'center',
    //     alignY: 'top',
    //     offsetX: 0,
    //     offsetY: 5,
    //     showOn: 'none',
    //     liveEvents: true,
    //
    //     content: function(){return $(this).attr("hint")}
    // });


    $(".parallax").each(function(){
        var $parallaxBlock = $(this);
        if ( window.innerWidth < 1000 ) return;
        $(window).on("scroll", function() {
            var yPos = ($parallaxBlock.offset().top - $(window).scrollTop())/5;
            $parallaxBlock.css("background-position", "center "+ yPos + "px");
        }).trigger("scroll");
    });

    // .input-wrap
    // $(window).on("load", function(){
        $(".input-wrap .placeholder").each(function(){
            $(this).closest(".field").removeClass("error");
            if ( $(this).siblings("input").val().length > 0 ) {
                $(this).addClass("small");
            } else {
                $(this).removeClass("small");
            }
        });
    // }).trigger("load");
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
            t = $(".sirin-header").outerHeight() || 0;
        if ( $trg.length ) {
            $("html, body").animate({scrollTop: $trg.offset().top - t}, 600);
        }
    });
}



function initPageParams() {
    
    var initCocciesAccept = false;

    $(window).on("scroll resize", function(){
        if(window.innerWidth > 768) {
            if($(window).scrollTop() > 500) {
                if(!initCocciesAccept) {
                    if(getCookie('accept-privancy-cookie-policy')) {
                        $('.footer-accept-line').css({display: 'none'});
                    } else {
                        setTimeout(function(){
                            $('.footer-accept-line').css({opacity: 1});
                        },50);           
                    }
                }
                initCocciesAccept = true;
            } 
        } else {
            if(getCookie('accept-privancy-cookie-policy')) {
                $('.footer-accept-line').css({display: 'none'});
            } else {
                setTimeout(function(){
                    $('.footer-accept-line').css({opacity: 1});
                },50);           
            }
        }  
        
        


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



    // .clients .slider
    // (function(){
    //     $(window).on("load resize", function(){
    //         setSlider();
    //     }).trigger("load");
    //     function setSlider(){
    //         $(".clients .slider").each(function(){
    //             var $slider = $(this).find("ul"),
    //                 $btnPrev = $(this).find(".btn-slider-prev"),
    //                 $btnNext = $(this).find(".btn-slider-next");
    //             $slider.carouFredSel({
    //                 width: "variable",
    //                 auto: {
    //                     play: false,
    //                     pauseOnHover: true,
    //                     duration: 500,
    //                     timeoutDuration: 5000
    //                 },
    //                 swipe: {
    //                     onTouch: true
    //                 },
    //                 prev: $btnPrev,
    //                 next: $btnNext
    //             }).parent().css("margin", "auto");;
    //         });
    //     }
    // })();


    // // .testimonials .slider
    // (function(){
    //     $(window).on("load resize", function(){
    //         setSlider();
    //     }).trigger("load");
    //     function setSlider(){
    //         $(".testimonials .slider").each(function(){
    //             var $slider = $(this).find("ul"),

    //                 $btnPrev = $(this).find(".btn-slider-prev"),
    //                 $btnNext = $(this).find(".btn-slider-next");
    //             $slider.carouFredSel({
    //                 width: "100%",
    //                 align: 'center',
    //                 auto: {
    //                     play: false,
    //                     pauseOnHover: true,
    //                     duration: 500,
    //                     timeoutDuration: 5000
    //                 },
    //                 swipe: {
    //                     onTouch: true
    //                 },
    //                 prev: {
    //                     button: $btnPrev,
    //                     onAfter: function (data) {
    //                         var $el = data.items.visible.eq(0);
    //                         var title = $el.data('group-title');
    //                         //console.log($el, title);
    //                         if (title) {
    //                             $(this).closest('.slider').prev('h3').text(title);
    //                         }
    //                     }
    //                 },
    //                 next: {
    //                     button: $btnNext,
    //                     items: function (c) {
    //                         return c;
    //                     },
    //                     onBefore: function () {
    //                     },
    //                     onAfter: function (data) {
    //                         var $el = data.items.visible.eq(0);
    //                         var title = $el.data('group-title');
    //                         //console.log($el, title);
    //                         if (title) {
    //                             $(this).closest('.slider').prev('h3').text(title);
    //                         }
    //                     },
    //                     onEnd: function () {
    //                     }
    //                 }
    //             }).parent().css("margin", "auto");;
    //         });
    //     }
    // })();


    // // .section .descript .areas-php ul
    // $(".section .descript .areas-php ul").each(function(){
    //     var $list = $(this);
    //     var $item = $("li", $list);
    //     $(window).on("load resize", function(){
    //         $list.css("width", "auto");
    //         var itemGabarit = parseInt($item.outerWidth()) + parseInt($item.css("margin-left")) + parseInt($item.css("margin-right"));
    //         var countInStr = Math.floor(parseInt($list.width()) / itemGabarit);
    //         $list.css("width", countInStr * itemGabarit + "px");
    //     });
    // });


    // // .section .descript .logos ul
    // $(".section .descript .logos ul").each(function(){
    //     var $list = $(this);
    //     var $item = $("li", $list);
    //     $(window).on("load resize", function(){
    //         $list.css("width", "auto");
    //         var itemGabarit = parseInt($item.outerWidth()) + parseInt($item.css("margin-left")) + parseInt($item.css("margin-right"));
    //         var countInStr = Math.floor(parseInt($list.width()) / itemGabarit);
    //         $list.css("width", countInStr * itemGabarit + "px");
    //     });
    // });


    // // .section.web-logos ul
    // $(".section.web-logos ul").each(function(){
    //     var $list = $(this);
    //     var $item = $("li", $list);
    //     var startHidden = 0;
    //     $(window).on("load resize", function(){
    //         $list.css("width", "auto");
    //         var itemGabarit = parseInt($item.outerWidth()) + parseInt($item.css("margin-left")) + parseInt($item.css("margin-right"));
    //         var countInStr = Math.floor(parseInt($list.width()) / itemGabarit);
    //         $list.css("width", countInStr * itemGabarit + "px");
    //         if ( window.innerWidth < 600 ) {
    //             $item.removeClass("hdn");
    //             var startHidden = countInStr * 4 + 1;
    //             $("li:nth-child(n + " + startHidden + ")", $list).addClass("hdn");
    //         } else {
    //             $item.removeClass("hdn");
    //         }
    //     });
    //     $(window).on("load scroll", function(){
    //         if ( $list.is(":in-viewport(-100)") ) {
    //             $list.addClass("animate");
    //         }
    //     });
    // });





    // .portfolio .btn-popup-portfolio-menu
    // .portfolio .portfolio-sidebar .menu
    // (function(){

    //     $(document).on("click", ".portfolio-sidebar .menu h2 a", function(e){
    //         e.preventDefault();
    //         $(this).closest(".sector").toggleClass("open");
    //         if ( $(this).closest(".sector").is(".open") ) {
    //             $(this).closest(".sector").find("ul").slideDown(200);
    //             $(this).closest(".sector").siblings(".sector").removeClass("open").find("ul").slideUp(200);
    //         } else {
    //             $(this).closest(".sector").find("ul").slideUp(100);
    //         }
    //     });

    // })();



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

function initPopups(){
    $(".fancybox").each(function() {
        $(this).fancybox({
            tpl: {
                closeBtn: '<a title="Close" class="fancybox-item fancybox-close" id="'+this.id+'" href="javascript:;"></a>'
            },
            padding: 0,
            margin: [10, 0, 10, 0],
            fitToView: false,
            beforeShow: function(){
                initHelpers();
                // setPortfolioMenuHeight();
            }
        });
    });

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



function initBlogMainPageNew() {

    if(!$('div').is('.categories')) {
        return false;
    }

    var categories = $('.categories');

    categories.find('.btn-more-categories').click(function (e) {

        e.preventDefault();
        if(categories.hasClass('open')) {
            categories.removeClass('auto-height');
            categories.removeClass('open');
        } else {
            categories.addClass('open');
            setTimeout(function () {
                categories.addClass('auto-height');
            },300);
        }
    });

    if($('div').is('.sirin-portfolio')) {
        var add_categories = JSON.parse($('#all_portfolio_categories').val());
        var added = [];
        if(add_categories.length) {
            add_categories.forEach((item, key) => {
                if(added.indexOf(item.class) == -1) {
                    var listclass = ''
                    if(key == 0) {
                        listclass = item.class + ' selected';
                    }
                    categories.find('ul').append('<li class="'+listclass+'"><a data-sort="'+item.class+'">'+item.name+'</a></li>');
                    added.push(item.class);                    
                    
                }                
            });
        }     
        var iso = new Isotope( '.items-iso', {            
            itemSelector: '.isotop-item',
            layoutMode: 'fitRows',
        });
        
        categories.on('click', 'li a', function(e) {
            e.preventDefault();
            categories.find('li').removeClass('selected');
            $(this).parents('li').addClass('selected');
            var sort = $(this).attr('data-sort');
            iso.arrange({ filter: '.'+sort });
        });        
    }
}

function initTeammembers() {

    if(!$('div').is('.categories')) {
        return false;
    }

    var categories = $('.categories');

    categories.find('.btn-more-categories').click(function (e) {

        e.preventDefault();
        if(categories.hasClass('open')) {
            categories.removeClass('auto-height');
            categories.removeClass('open');
        } else {
            categories.addClass('open');
            setTimeout(function () {
                categories.addClass('auto-height');
            },300);
        }
    });

    if($('div').is('.sirin-teammembers')) {
        var add_categories = JSON.parse($('#all_teammembers_categories').val());
        var added = [];
        if(add_categories.length) {
            add_categories.forEach((item, key) => {
                if(added.indexOf(item.class) == -1) {
                    var listclass = ''
                    if(key == 0) {
                        listclass = item.class + ' selected';
                    }
                    var count = '';
                    if(item.count > 0) {
                      count = ' ('+item.count+')';
                    }
                    categories.find('ul').append('<li class="'+listclass+'"><a data-sort="'+item.class+'">'+item.name+count+'</a></li>');
                    added.push(item.class);                    
                    
                }                
            });
        }     
        var iso = new Isotope( '.items-iso', {            
            itemSelector: '.isotop-item',
            layoutMode: 'fitRows',
        });
        
        categories.on('click', 'li a', function(e) {
            e.preventDefault();
            categories.find('li').removeClass('selected');
            $(this).parents('li').addClass('selected');
            var sort = $(this).attr('data-sort');
            iso.arrange({ filter: '.'+sort });
        });        
    }
}


function initArticlePage(){

    // Copy link action
    $('.copy-to-clipboard').click(function (e) {
        e.preventDefault();
        var copyText = document.getElementById('copy-link-field');
        var el = document.createElement('textarea');
        el.value = copyText.value;
        el.setAttribute('readonly', '');
        el.style.position = 'absolute';
        el.style.left = '-9999px';
        document.body.appendChild(el);
        el.select();
        document.execCommand('copy');
        document.body.removeChild(el);
    });


    // subscribe popup window in 30 sec afret page start

    if($('div').is('.sirin-article')) {
        $(document).on('scroll', function () {
            var $body = $(window);
            var block = $('.comments').offset().top;
            var position = $body.scrollTop();

            if (block - position < 800) {
                var save = getCookie('popup-subscribe');
                if(!save) {
                    $('#popup-subscribe-modal').fancybox().click();
                    setCookie('popup-subscribe', 'disable', 1);
                } else if(save === 'disable' || save==='' ) {
                    return false;
                }
            }
        });

        $('.sirin-popup-subscribe a[target="_blank"]').click(function (e) {
            e.preventDefault();
            window.open($(this).attr('href'));
        });
    }


    $('.subscribe-action').click(function () {
        global_actions['open_subscribe_popup'] = true;
    });
}

function initFaq() {

    var block = $('.faq-content .search-helper');
    var $body = $(window);


    if($('div').is('.faq-content')) {

    } else {
        return false;
    }
    /**
     * Scroll to faq position
     */

    block.find('ul li a[href^="#"]').click(function (e) {
        e.preventDefault();
        var target = $(this).attr('href');
        var top = $(target).offset().top - 150;
        $('html, body').animate({scrollTop: top}, 800);
        //close menu on mobile
        block.removeClass('open');
        return false;
    });


    /**
     * Button click on mobile version
     */
    block.find('h3').click(function () {
        var block_search = $(this).parents('.search-helper');
        if(window.innerWidth < 993) {
            if(block_search.hasClass('open')) {
                block_search.removeClass('open');
            } else {
                block_search.addClass('open')
            }
        } else {
            $(this).removeClass('open');
        }
    });


    /**
     * Close menu on desctop version
     */
    setInterval(function () {
        if(window.innerWidth >= 993) {
            block.removeClass('open');
        }
    },1000);


    /**
     * Button fixed position on mobile and desctop versions .
     */

    // basic block position
    var original_block_position = block.offset().top;
    var original_block_stop_position = $('.sirin-theme-clientform').offset().top;

    // resize control
    $(document).resize(function () {
        block.removeClass('position-fixed');
        original_block_position = block.offset().top;
        original_block_stop_position  = $('.sirin-theme-clientform').offset().top;
    });

    //scroll control
    $(document).on('scroll', function () {
        var position = $body.scrollTop();

        if(original_block_stop_position - position < 300) {
            block.removeClass('position-fixed');
        } else {
            if (position > original_block_position) { // если позиция скролла страницы больше, то ставим фикс
                block.addClass('position-fixed');
            } else {
                block.removeClass('position-fixed');
            }
        }
    });
}


function initStaticHeader() {

    /**
     * Menu fixed position
     */

    var block = $('.sirin-header');
    var $body = $(window);
    var original_block_position = 0;

    // resize control
    $(document).resize(function () {
        block.removeClass('position-fixed');
    });


    //scroll control
    $(document).on('scroll', function () {

        var position = $body.scrollTop();
        if (position < 200) {
            block.removeClass('down');
            block.removeClass('position-fixed');
            block.removeClass('no-overflow');
        } else {
            if (position > original_block_position) { // если позиция скролла страницы больше, то ставим фикс
                block.addClass('position-fixed');
                setTimeout(function () {
                    block.addClass('down');
                },100)
                setTimeout(function () {
                    block.addClass('no-overflow');
                },400)
            } else {
                block.removeClass('down');
                block.removeClass('position-fixed');
                block.removeClass('no-overflow');
            }
        }
    });
}

function initBlogMainPage() {

}

function initCaseStudy() {

    if(!$('div').hasClass('portfolio-sidebar')) {
        return false;
    }
    if(!$('div').is('.sirin-inside-portfolio')) {
        return false;
    }
    var block = $('.sirin-inside-portfolio .portfolio-sidebar');

    var $body = $(window);

    

    // basic block position
    var original_block_position = block.offset().top;
    var original_block_stop_position = $('.carousel').offset().top;

    // resize control
    $(document).resize(function () {
        block.removeClass('position-fixed');
        original_block_position = block.offset().top;
        original_block_stop_position  = $('.carousel').offset().top;
    });

    var initBar = false;

    if(initBar===false) {
        block.find('.menu').addClass('scrollbar-outer').scrollbar();
        block.find('.menu').css({height:$body.outerHeight()-250});
        initBar = true;
    }

    //scroll control
    $(document).on('scroll', function () {
        var position = $body.scrollTop();

        if(original_block_stop_position - position < 1000) {
            block.removeClass('position-fixed');
        } else {
            if (position > original_block_position) { // если позиция скролла страницы больше, то ставим фикс

                block.addClass('position-fixed');
            } else {
                block.removeClass('position-fixed');
            }
        }
    });
}

function CaseMainInfoBoxAnimation() {
    var count = 0;
    $('.bg-image svg path').each(function () {
        count++;
        var path = $(this).get(0);
        $(this).attr('stroke', '#bebebe');
        var length = path.getTotalLength();
        // Clear any previous transition
        path.style.transition = path.style.WebkitTransition =
            'none';
        // Set up the starting positions
        path.style.strokeDasharray = length + ' ' + length;
        path.style.strokeDashoffset = length;
        // Trigger a layout so styles are calculated & the browser
        // picks up the starting position before animating
        path.getBoundingClientRect();
        // Define our transition
        path.style.transition = path.style.WebkitTransition =
            'fill 1s ease-in-out, stroke-dashoffset 2s ease-in-out, stroke 1s ease-in-out';
        // Go!
        path.style.strokeDashoffset = '0';

        var _that = this;
        setTimeout(function () {
            $(_that).attr('stroke', 'transparent');
            if(count === 1) {
                $(_that).attr('fill', 'url(#paint0_linear)')
            }
            if(count === 2) {
                $(_that).attr('fill', 'url(#paint1_linear)')
            }

            $(_that).parents('.eight').find('.items').addClass('show')

            animates['caseMainInfo'] = true;
        },2000);

    });
}

function initTeam() {

}
function teamGreenBoxAnimation() {
        var count = 0;
        $('.green-box svg path').each(function () {
            count++;
            var path = $(this).get(0);
            $(this).attr('stroke', '#ffffff');
            var length = path.getTotalLength();
            // Clear any previous transition
            path.style.transition = path.style.WebkitTransition =
                'none';
            // Set up the starting positions
            path.style.strokeDasharray = length + ' ' + length;
            path.style.strokeDashoffset = length;
            // Trigger a layout so styles are calculated & the browser
            // picks up the starting position before animating
            path.getBoundingClientRect();
            // Define our transition
            path.style.transition = path.style.WebkitTransition =
                'fill 1s ease-in-out, stroke-dashoffset 2s ease-in-out, stroke 1s ease-in-out';
            // Go!
            path.style.strokeDashoffset = '0';

            var _that = this;
            setTimeout(function () {
                $(_that).attr('stroke', 'transparent');
                if(count === 1) {
                    $(_that).attr('fill', '#ffffff')
                }
                if(count === 2) {
                    $(_that).attr('fill', '#ffffff')
                }

                $('.green-box .number').addClass('animated pulse duration-200');
            },2000);
        });
}


function is_recaptcha() {
    if(recaptcha_session == true) {
        return true;
    } else {
        return  false;
    }
}


function initForms() {
    //Form state
    $('.form-group input').focusin(function () {
        $(this).parents('.form-group').addClass('focused');
    });
    $('.form-group input').focusout(function () {
        $(this).parents('.form-group').removeClass('focused');
    });
    $('.form-group textarea').focusin(function () {
        $(this).parents('.form-group').addClass('focused');
    });
    $('.form-group textarea').focusout(function () {
        $(this).parents('.form-group').removeClass('focused');
    });

    $('.form-group input').keyup(function () {
        if($(this).val().length) {
            $(this).parents('.form-group').addClass('fill');
        } else {
            $(this).parents('.form-group').removeClass('fill');
        }
    });

    $('.form-group textarea').keyup(function () {
        if($(this).val().length) {
            $(this).parents('.form-group').addClass('fill');
        } else {
            $(this).parents('.form-group').removeClass('fill');
        }
    });

    eachFormControl();

    function eachFormControl() {
        $('.form-group input').each(function () {
            if($(this).val().length) {
                $(this).parents('.form-group').addClass('fill');
            } else {
                $(this).parents('.form-group').removeClass('fill');
            }
        });
        $('.form-group textarea').each(function () {

            console.log($(this).val());
            if($(this).val().length) {
                $(this).parents('.form-group').addClass('fill');
            } else {
                $(this).parents('.form-group').removeClass('fill');
            }
        });
    }
}


function inspectletPush(param = 'c') {
    __insp.push(['tagSession', {
        'isJobs' : true
    }]);
};

//faq page clicks
$('.faq-page .box-item .header-line').click (function (e) {
    console.log(e);
    var item = $(this).parents('.box-item');
    if(item.hasClass('active')) {
        item.removeClass('active');
    } else {
        item.addClass('active');
    }
});