<?php 
add_action("admin_menu", "add_theme_menu_item");
function add_theme_menu_item(){
	require_once ('helper.php');
	require_once ('css-hook.php');
	add_menu_page(__('Theme Panel','sirinsoftware'), __('Theme Panel','sirinsoftware'), "manage_options", "theme-panel", "theme_main_settings_init", '', 99);
	add_submenu_page('theme-panel', __('Main settings', 'sirinsoftware'), __('Main settings','sirinsoftware'),'manage_options','theme-panel', 'theme_main_settings_init');
	add_submenu_page('theme-panel', __('Offices', 'sirinsoftware'), __('Offices','sirinsoftware'),'manage_options','theme-offices-settings', 'theme_offices_settings_init');
	add_submenu_page('theme-panel', __('Autoreplay', 'sirinsoftware'), __('Autoreplay','sirinsoftware'),'manage_options','theme-autoreplay-settings', 'theme_autoreplay_settings_init');
	add_submenu_page('theme-panel', __('Subscribe Emails', 'sirinsoftware'), __('Subscribe Emails','sirinsoftware'),'manage_options','theme-subscribe-settings', 'theme_subscribe_settings_init');
//	add_submenu_page('theme-panel', __('Home Slider', 'sirinsoftware'), __('Home Slider','sirinsoftware'),'manage_options','theme-home-slider', 'theme_home_slider_init');
	//add_submenu_page('theme-panel', __('Expertise', 'sirinsoftware'), __('Expertise','sirinsoftware'),'manage_options','theme-expertise', 'theme_expertise_init');
	//add_submenu_page('theme-panel', __('Clients', 'sirinsoftware'), __('Clients','sirinsoftware'),'manage_options','theme-clients', 'theme_clients_init');
	add_action('admin_enqueue_scripts', 'sirin_admin_scripts');
	function sirin_admin_scripts(){
		wp_enqueue_media();
		wp_enqueue_script('theme-settings-js', get_template_directory_uri(). '/js/settings.js' , array('jquery'));
		wp_enqueue_style('theme-settings-css', get_template_directory_uri().'/css/settings.css');
		wp_localize_script('theme-settings-js', 'ajax_object',array( 'ajax_url' => admin_url( 'admin-ajax.php' )));
	}
}

function theme_main_settings_init(){
	echo '<h1>'.__('Main theme settings', 'sirinsoftware').'</h1>';
	require_once ('main.php');
}

function theme_autoreplay_settings_init(){
    echo '<h1>'.__('Autoreplay', 'sirinsoftware').'</h1>';
    require_once ('autoreplay.php');
}

function theme_subscribe_settings_init(){
    echo '<h1>'.__('Subscribe Emails', 'sirinsoftware').'</h1>';
    require_once ('subscribe.php');
}


function theme_offices_settings_init(){
	echo '<h1>'.__('Offices locations', 'sirinsoftware').'</h1>';
	require_once ('offices.php');
}

function theme_home_slider_init(){
	echo '<h1>'.__('Home Slider settings', 'sirinsoftware').'</h1>';
	require_once ('home-slider.php');
}
function theme_expertise_init(){
	echo '<h1>'.__('Expertise settings', 'sirinsoftware').'</h1>';
	require_once ('expertise.php');
}
function theme_clients_init(){
	echo '<h1>'.__('Clients settings', 'sirinsoftware').'</h1>';
	require_once ('clients.php');
}


/*
add_action( 'wp_ajax_remove_item', 'remove_item_wp_ajax' );
add_action( 'wp_ajax_nopriv_remove_item','remove_item_wp_ajax' );
function remove_item_wp_ajax(){
	if(isset($_POST['itemid']) && !empty($_POST['itemid'])){
	
		delete_option($_POST['itemid'].'-img');
		delete_option($_POST['itemid'].'-title');
		delete_option($_POST['itemid'].'-desc');

		$exp=substr($_POST['itemid'],0,-1).'s';
		if(get_option($exp)){
			$exp_items=get_option($exp);
			if(count($exp_items)>1){
				$key=array_search(substr($exp,0,-6),get_option('sirin-exp'));
				echo $key;
				$key=array_search($_POST['itemid'],$exp_items);
				//unset($exp_items[$key]);
				//update_option($exp,$exp_items);
			}else{
				//delete_option($exp);
				
				$key=array_search(substr($exp,0,-6),get_option('sirin-exp'));
				echo $key;
				//delete_option($exp);
			}
			
		}
	}
	die();
}
*/
?>