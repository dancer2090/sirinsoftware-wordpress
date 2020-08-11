<?php 
add_action( 'wp_head', 'sirin_css_hook' );
function sirin_css_hook( ) {
	echo '<style type="text/css">';
	if(get_option('sirin-video-img')){
		echo '
			.video-main{
				background-image: url("'.get_option('sirin-video-img').'") center 0 no-repeat;
			}
		';
	}
	if(get_option('sirin-logo1')){
		echo '
			.toolbar .logo a {
				background-image: url("'.get_option('sirin-logo1').'");
			}
		';
	}
	if(get_option('sirin-logo2')){
		echo '
			.scrolled .toolbar .logo a{
				background-image: url("'.get_option('sirin-logo2').'");
			}
		';
	}
	if(get_option('sirin-our-focus-img')){
		echo '
			.ourfocus{
				background-image: url("'.get_option('sirin-our-focus-img').'");
			}
		';
	}
	echo '</style>';
}
?>