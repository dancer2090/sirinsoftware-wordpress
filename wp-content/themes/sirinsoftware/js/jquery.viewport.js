/*
 * Viewport - jQuery selectors for finding elements in viewport
 *
 * Copyright (c) 2008-2009 Mika Tuupola
 *
 * Licensed under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
 *
 * Project home:
 *  http://www.appelsiini.net/projects/viewport
 *
 */
(function($) {
    
    $.belowthefold = function(element, settings) {
        var fold = $(window).height() + $(window).scrollTop();
        return fold <= $(element).offset().top - settings.threshold;
    };

    $.abovethetop = function(element, settings) {
        var top = $(window).scrollTop();
        return top >= $(element).offset().top + $(element).height() - settings.threshold;
    };
    
    $.rightofscreen = function(element, settings) {
        var fold = $(window).width() + $(window).scrollLeft();
        return fold <= $(element).offset().left - settings.threshold;
    };
    
    $.leftofscreen = function(element, settings) {
        var left = $(window).scrollLeft();
        return left >= $(element).offset().left + $(element).width() - settings.threshold;
    };
    
    $.inviewport = function(element, settings) {
        return !$.rightofscreen(element, settings) && !$.leftofscreen(element, settings) && !$.belowthefold(element, settings) && !$.abovethetop(element, settings);
    };
    
    $.extend($.expr[':'], {
        "below-the-fold": function(a, i, m) {
			var t = typeof m[3] == 'string' ? parseInt( m[3], 10 ) : 0;
            return $.belowthefold(a, {threshold : t}); 
        },
        "above-the-top": function(a, i, m) { 
			var t = typeof m[3] == 'string' ? parseInt( m[3], 10 ) : 0; 
            return $.abovethetop(a, {threshold : t});
        },
        "left-of-screen": function(a, i, m) {
			var t = typeof m[3] == 'string' ? parseInt( m[3], 10 ) : 0;
            return $.leftofscreen(a, {threshold : t}); 
        },
        "right-of-screen": function(a, i, m) {
			var t = typeof m[3] == 'string' ? parseInt( m[3], 10 ) : 0;
            return $.rightofscreen(a, {threshold : t}); 
        },
        "in-viewport": function(a, i, m) {
			var t = typeof m[3] == 'string' ? parseInt( m[3], 10 ) : 0;
            return $.inviewport(a, {threshold : t}); 
        }
    });

    
})(jQuery);
