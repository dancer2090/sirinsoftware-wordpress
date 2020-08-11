=== Lazy Load Optimizer ===
Contributors: Processby
Donate link: https://www.paypal.me/processby
Tags: lazyload, lazy load, Lazy Loading, Optimize, image lazy load
Requires at least: 4.0
Tested up to: 5.2.2
Stable tag: 1.4.5
Requires PHP: 5.6
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Lazy loading images and iframes to speed up sites page load speed.

== Description ==

Lazy loading images and iframes to speed up sites page load speed. Compatible with WooCommerce.
This plugin uses [lazysizes](https://github.com/aFarkas/lazysizes) - is the most popular, high performance and SEO friendly lazy loader for images.
[Plugin demo](https://processby.com/lazy-load-wordpress/#gallery-demo)

= Features =

* Lazy loading images;
* Lazy loading iframes;
* Improves [PageSpeed Insights](https://developers.google.com/speed/pagespeed/insights/) Results,  fixes error "defer offscreen images";
* Lightweight and fast.

== Screenshots ==

1. Lazy Load Optimizer settings

== Installation ==

1. Unzip the downloaded zip file.
1. Upload the plugin folder into the `wp-content/plugins/` directory of your WordPress site.
1. Activate `Lazy Load Optimizer` from Plugins page

== Frequently Asked Questions ==

= How to use? =
Just activate the plugin. Additional settings is not required.

= What is lazy loadind? =
Lazy loading is the strategy of loading resources as they are needed, rather than in advance. This approach frees up resources during the initial page load and avoids loading assets that are never used.
Images that are offscreen during the initial pageload are ideal candidates for this technique.

= How To minimize content jumping or unpredictable behavior images before loading? =
Add width and height attributes to image.
`
<img width="200" height="100" src="image.jpg">
`

= How to lazyload a background image?
In case you want to lazyload a background image via a class you can do so by using the addClasses option:
`
<style>
      	.bg-stage.lazyloaded {
      		background-image: url(lazyloaded-bg.jpg);
      	}
      </style>

      <div class="bg-stage lazyload">
      	<!-- content -->
      </div>
`


== Changelog ==

= 1.4.5 =

Release Date: Jul 12, 2019

* Fix bug with image width

= 1.4.4 =

Release Date: Jun 29, 2019

* Improved Lazy Load styles

= 1.4.3 =

Release Date: Jun 25, 2019

* Improved Lazy Load styles

= 1.4.2 =

Release Date: Jun 07, 2019

* Optimized styles

= 1.4.1 =

Release Date: Jun 02, 2019

* Fix - bug with iframes

= 1.4.0 =

Release Date: Jun 01, 2019

* Update - lazysizes - v5.1.0
* Add - Lazyloading all template images

= 1.3.4 =

Release Date: May 04, 2019

* Fix - bugs

= 1.3.3 =

Release Date: May 01, 2019

* Add - Exclude pages by Category, Tag
* Fix - bugs

= 1.3.2 =

Release Date: Apr 28, 2019

* Add - Exclude pages by Page Type

= 1.3.1 =

Release Date: Mar 10, 2019

* Add - Exclude pages by URI

= 1.3.0 =

Release Date: Feb 10, 2019

* Add - lazy loading for iframes

= 1.2.5 =

Release Date: Feb 10, 2019

* Fix - bugs

= 1.2.4 =

Release Date: Feb 06, 2019

* Fix - bugs

= 1.2.3 =

Release Date: Jan 22, 2019

* Add - CSS classes to exclude lazy load avatar

= 1.2.2 =

Release Date: Jan 04, 2019

* Add - CSS classes to exclude

= 1.2.1 =

Release Date: Dec 31, 2018

* Fix - bugs

= 1.2.0 =

Release Date: Dec 31, 2018

* Add - Init setting
* Add - Exp. factor setting
* Fix - bug with Rss

= 1.1.9 =

Release Date: Dec 29, 2018

* Add - Expand setting
* Add - filter "lazy_load_styles"

= 1.1.8 =

Release Date: Dec 19, 2018

* Improved lazy load styles

= 1.1.7 =

Release Date: Dec 19, 2018

* Improved settings

= 1.1.6 =

Release Date: Dec 17, 2018

* Add - Transparent background

= 1.1.5 =

Release Date: Dec 17, 2018

* Add - Translation-ready


= 1.1.4 =

Release Date: Dec 16, 2018

* Fix - bugs

= 1.1.3 =

Release Date: Dec 16, 2018

* Add - spinner size setting

= 1.1.2 =

Release Date: Dec 16, 2018

* Lazysizes update
* Add - Custom spinner

= 1.1.1 =

Release Date: Dec 14, 2018

* Add - Background color setting

= 1.1 =

Release Date: Dec 13, 2018

* Add - Lazy Load styles


= 1.0.6 =

Release Date: Dec 12, 2018

* Fix - Bug with data-src

= 1.0.5 =

Release Date: Dec 10, 2018

* Added WordPress 5.0 support

= 1.0.4 =

Release Date: Nov 26, 2018

* Added support Text Widget


= 1.0.3 =

Release Date: Nov 25, 2018

* Fix bug with srcset


= 1.0.2 =

Release Date: Nov 23, 2018

* Fix bug with srcset in post content


= 1.0.1 =

Release Date: Nov 23, 2018

* Fixes bugs

= 1.0 =

Release Date: Nov 23, 2018

* Initial release






