<?php

/**
 * Setup main theme options
 */
remove_action('wp_head', 'wp_generator');
add_action('after_setup_theme', 'sirinsoftware_theme_setup');

function sirinsoftware_theme_setup(){
	load_theme_textdomain('sirinsoftware', get_template_directory() . '/languages');
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
}

/**
 * Theme settings
 */
require_once ('theme-settings/init.php');

/*
 * Add new media size
*/
// add_action('init', 'update_option_add_image_sizes');
function update_option_add_image_sizes() {
	$medium=get_image_size('medium');
	remove_image_size('medium');
	add_image_size('medium', $medium['width'], $medium['height'], true);
	$large=get_image_size('large');
	remove_image_size('large');
	add_image_size('large', $large['width'], $large['height'], true);
	add_image_size('client-logo', '180', '180', false);
}

/**
 * Register menus
 */
add_action( 'init', 'sirinsoftware_init' );
function sirinsoftware_init() {
    register_nav_menus(array(
        'sidebar'=>__('Sidebar Menu','sirinsoftware'),
        'footer'=>__('Footer Menu','sirinsoftware'),
        'header'=>__('Header Menu','sirinsoftware'),
        'scrolled'=>__('Scrolled Menu','sirinsoftware')
    ));
}


/**
 * Change upload filename
 */
add_filter('sanitize_file_name', 'sirinsoftware_rename_upfile', 10, 2);
function sirinsoftware_rename_upfile($filename, $filename_raw) {
	date_default_timezone_set('Europe/Kiev');
	$info=pathinfo($filename);
	$ext=empty($info['extension']) ? '' : '.' . $info['extension'];
	$ext=str_replace('jpeg','jpg',$ext);
	$date=date('Y-m-d-H-i-s');
	$new=$date.$ext;
	if( $new != $filename_raw ) {
		$new = sanitize_file_name( $new );
	}
	return $new;
}

/*
 * Change Custom Archive Open Graph title
 */
function sirinsoftware_opengraph_title($title) {
	$postid=get_id_by_slug(get_post_type());
	$title = get_field('_yoast_wpseo_title',get_the_ID())? get_field('_yoast_wpseo_title',get_the_ID()) : $title;
	return $title.' | '.get_bloginfo('name');
}


/*
 * Change Custom Archive Open Graph descriptions
 */
function sirinsoftware_opengraph_desc() {
	$obj = get_post_type_object( get_post_type() );
	if(!empty($obj->description)) echo '<meta property="og:description" content="'.$obj->description.'" />' . PHP_EOL;
}

/*
 * Change Custom Archive Open Graph image
 */
function sirinsoftware_opengraph_image($img){
	if(is_post_type_archive('jobs')){
		$img=get_site_url().'/wp-content/uploads/2016/09/2016-09-16-18-57-54.jpg';
	}elseif(is_post_type_archive('portfolio')){
		$img=get_site_url().'/wp-content/uploads/2016/09/2016-09-16-18-58-49.jpg';
	}elseif(is_single()){
		$img=get_site_url().'/wp-content/uploads/2016/09/2016-09-16-19-14-26.jpg';
	}
	echo '<meta property="og:image" content="'.$img.'" />';
}


/*
 * Change Custom Archive Open Graph twitter image
 */
function sirinsoftware_twitter_image($img){
	if(is_post_type_archive('jobs')){
		$img=get_site_url().'/wp-content/uploads/2016/09/2016-09-16-19-08-03.jpg';
	}elseif(is_post_type_archive('portfolio')){
		$img=get_site_url().'/wp-content/uploads/2016/09/2016-09-16-19-04-12.jpg';
	}elseif(is_single()){
		$img=get_site_url().'/wp-content/uploads/2016/09/2016-09-16-19-15-05.jpg';
	}
	echo '<meta name="twitter:image" content="'.$img.'" />';
}

add_filter('the_content', 'my_regex_filter', 1); // Execute as early as possible

function my_regex_filter($content) {
	global $post;
	$output='';
	$regex = get_shortcode_regex(array('gallery'));
	
	if ( get_post_gallery($post->ID) ){
		$output='<div class="slider">';
			$output.='<div class="inner">';
				$output.='<ul>';
					$gallery = get_post_gallery( $post->ID, false );
					$gallery_ids=explode(',',$gallery['ids']);
					foreach ($gallery_ids as $id):
						$output.='<li>'.wp_get_attachment_image ( $id,'full').'</li>';
					endforeach;
				$output.='</ul>';
				$output.='<a class="btn btn-slider-prev-2" href="javascript:;"><i class="ico ico-left-3"><i></i></i></a>';
				$output.='<a class="btn btn-slider-next-2" href="javascript:;"><i class="ico ico-right-3"><i></i></i></a>';
			$output.='</div>';
		$output.='</div>';
	}
	if(!empty($output)){
		$content = preg_replace('/'.$regex.'/s', $output, $content );
	}
	return $content;
}

function template($file, $vars=array()) {
    if(file_exists($file)){
        // Make variables from the array easily accessible in the view
        extract($vars);
        // Start collecting output in a buffer
        ob_start();
        require($file);
        // Get the contents of the buffer
        $applied_template = ob_get_contents();
        // Flush the buffer
//        ob_end_clean();
        ob_get_clean();
        return $applied_template;
    }
}

function sendAutoreplyToCustomer($data) {
    $headers = array('From: Sirin Software Site <info@sirinsoftware.com>', 'Content-Type: text/html; charset=UTF-8');

    $autoreplay_subject = get_option('sirin-request-autoreplay-theme');

    $vars = array(
        'name'  =>  $data['name'],
    );

    $template_url = __DIR__.'/email-templates/customer-autoreply.php';

    $autoreplay_message = template($template_url, $vars);

    wp_mail($data['email'], $autoreplay_subject, $autoreplay_message, $headers);
}


function sendBookAutoreplyToCustomer($data) {

    $up_dir = ABSPATH."wp-content/themes/sirinsoftware/sirindesign/build/img";

    $headers = array('From: Sirin Software Site <info@sirinsoftware.com>', 'Content-Type: text/html; charset=UTF-8');
    $autoreplay_subject = 'Guide to outsourcing software development';
    $url = __DIR__.'/email-templates/book-autoreply.php';
    $vars = array(
        'name'  =>  $data['name'],
    );
    $attachments = [$up_dir.'/SW-guide-desctop.pdf'];
    $autoreplay_message = template($url, $vars);
    wp_mail($data['email'], $autoreplay_subject, $autoreplay_message, $headers, $attachments);
}



/**
 * Prevent duplicates
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_distinct
 */
function cf_search_distinct( $where ) {
	global $wpdb;
	if ( is_search() ) {
		return "DISTINCT";
	}
	return $where;
}
add_filter( 'posts_distinct', 'cf_search_distinct' );



/**
 * Get size information for all currently-registered image sizes.
 *
 * @global $_wp_additional_image_sizes
 * @uses   get_intermediate_image_sizes()
 * @return array $sizes Data for all currently-registered image sizes.
 */
function get_image_sizes() {
	global $_wp_additional_image_sizes;

	$sizes = array();

	foreach ( get_intermediate_image_sizes() as $_size ) {
		if ( in_array( $_size, array('thumbnail', 'medium', 'medium_large', 'large') ) ) {
			$sizes[ $_size ]['width']  = get_option( "{$_size}_size_w" );
			$sizes[ $_size ]['height'] = get_option( "{$_size}_size_h" );
			$sizes[ $_size ]['crop']   = (bool) get_option( "{$_size}_crop" );
		} elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {
			$sizes[ $_size ] = array(
					'width'  => $_wp_additional_image_sizes[ $_size ]['width'],
					'height' => $_wp_additional_image_sizes[ $_size ]['height'],
					'crop'   => $_wp_additional_image_sizes[ $_size ]['crop'],
			);
		}
	}

	return $sizes;
}

/**
 * Get size information for a specific image size.
 *
 * @uses   get_image_sizes()
 * @param  string $size The image size for which to retrieve data.
 * @return bool|array $size Size data about an image size or false if the size doesn't exist.
 */
function get_image_size( $size ) {
	$sizes = get_image_sizes();

	if ( isset( $sizes[ $size ] ) ) {
		return $sizes[ $size ];
	}

	return false;
}

/** 
 * Add slideshare shortcode
 */
add_shortcode( 'slideshare','tbm_slideshare' );
function tbm_slideshare( $atts ) {
	$atts = extract( shortcode_atts(
			array(
					'id'=>''
			),$atts ) );
	// Break it up so we can get the first variable = presentation ID
	$id = explode('&', $id);
	return '<div class="slideshare"><iframe src="http://www.slideshare.net/slideshow/embed_code/'.$id[0].'?rel=0" width="570" height="400" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" style="border:1px solid #CCC;border-width:1px 1px 0;margin-bottom:5px" allowfullscreen webkitallowfullscreen mozallowfullscreen> </iframe></div>';
}

/** 
 * Remove emoji
 */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

/******************
 * Allow upload svg
 */
add_filter('upload_mimes', 'beinside_mime_types');
function beinside_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}





/*
 * Gallery shortcode change
 */
remove_shortcode('sirin-gallery');
add_shortcode('sirin-gallery', 'sirin_gallery_function');
function sirin_gallery_function($atts) {

    if($atts['source']) {
        $atts['ids'] = str_replace('media: ','',$atts['source']);
        $atts['ids'] = explode(',',str_replace('media:','',$atts['ids']));
    }
    $two_three = false;
    if($atts['template'] === 'two-three') {
        $two_three = true;
    }
    $g_id = uniqid();
    $gallery = "<div class='custom-lightbox-gallery-$g_id'>";
    $index = 0;
    $template_url = get_template_directory_uri();
    foreach ( $atts['ids'] as $image ) {
        $thumbnail = wp_get_attachment_image_src($image, 'medium');
        $large = wp_get_attachment_image_src($image, 'large')[0];
        $thumbnail = $thumbnail[0];
        $gallery .= "<div class='custom-lightbox-gallery-slide'>
                <a target='__blank' href='$large' data-lightbox='image-$g_id' data-title='My caption'>
                    <img width='' src='".$thumbnail."'>
                </a>
			</div>";
        $index ++;
    }
    $gallery .= '</div>';
    $gallery .= "
    <style>
            .custom-lightbox-gallery-$g_id .custom-lightbox-gallery-slide img {
                border: none !important;
                width: 100%;              
            }
            .custom-lightbox-gallery-$g_id .custom-lightbox-gallery-slide {
                overflow: hidden;
                width: 33%;
                height: 150px;
                display: inline-block;
                margin: 1px 0.165%;   
                vertical-align: top;
                text-align: left;
                box-sizing: border-box;
            }
            .custom-lightbox-gallery-$g_id .custom-lightbox-gallery-slide:hover img {
                transform: scale(1.3);
                transition: 1s;
            }
    </style>
    <script data-chunk='sirinsoftware-frontity' src='https://code.jquery.com/jquery-3.5.1.min.js'></script>
    <script data-chunk='sirinsoftware-frontity' type='text/javascript' src='$template_url/lightbox/js/lightbox-plus-jquery.js'></script>
    <link rel='stylesheet' href='$template_url/lightbox/css/lightbox.css' type='text/css' media='all' />
    ";
    if(!$two_three) {

    } else {
        $gallery .= "
            <style>
                .custom-lightbox-gallery-$g_id .custom-lightbox-gallery-slide:nth-child(1), 
                .custom-lightbox-gallery-$g_id .custom-lightbox-gallery-slide:nth-child(2)  {                   
                    width: 49.5%;
                    height: 250px;   
                    margin: 1px 0.25%;                            
                }
            </style>
        ";
    }

    //wp_enqueue_style('lightbox-css', get_template_directory_uri(). '/lightbox/css/lightbox.css', false, '');
    //wp_enqueue_script( 'lightbox-js', get_template_directory_uri() . '/lightbox/js/lightbox-plus-jquery.js', array('jquery', 'design-main-js'), null, true );


    return $gallery;
}



function sirinsoftware_upload_mimes($mimes = array()) {

    // Add a key and value for the CSV file type
    $mimes['svg'] = 'image/svg+xml';

    return $mimes;
}

add_action('upload_mimes', 'sirinsoftware_upload_mimes');





function is_blog () {
    return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
}



function is_jobs () {

    if(get_post_type() === 'jobs') {
        return true;
    }
    return false;
}

if($_POST['sirin-download-emails-theme']) {
    add_action("admin_init", "download_csv");
}


function download_csv() {

    ob_start();
    $domain = $_SERVER['SERVER_NAME'];
    $filename = 'subscribers-' . $domain . '-' . time() . '.csv';

    $header_row = array(
        'Email',
        'First Name',
        'Last Name',
    );
    $data_rows = array();

    $emails = get_option('sirin-subscribe-emails-theme') ? get_option('sirin-subscribe-emails-theme') : [];

    foreach ( $emails as $email ) {
        $row = array(
            $email['EMAIL'],
            $email['FNAME'],
            $email['LNAME'],
        );
        $data_rows[] = $row;
    }
    $fh = @fopen( 'php://output', 'w' );
    fprintf( $fh, chr(0xEF) . chr(0xBB) . chr(0xBF) );
    header( 'Cache-Control: must-revalidate, post-check=0, pre-check=0' );
    header( 'Content-Description: File Transfer' );
    header( 'Content-type: text/csv' );
    header( "Content-Disposition: attachment; filename={$filename}" );
    header( 'Expires: 0' );
    header( 'Pragma: public' );
    fputcsv( $fh, $header_row );
    foreach ( $data_rows as $data_row ) {
        fputcsv( $fh, $data_row );
    }
    fclose( $fh );

    ob_end_flush();

    die();
}


function getHubspot($param='token') {
    $base_url = 'https://api.hubapi.com';
    $token = 'a4347c81-dae1-427d-aad9-751f15d9c5cf';

    if($param === 'base_url') {
        return $base_url;
    }
    if($param === 'token') {
        return $token;
    }
}

function getOwnerId () {
    $token = getHubspot('token');
    $base_url = getHubspot('base_url');
    $modify_url = '/owners/v2/owners';
    $concat_url = $base_url.$modify_url."?hapikey=$token";

    $params = ['email=v.samoilenko@sirinsoftware.com'];
    $concat_url = $concat_url.'&'.implode('&',$params);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $concat_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $icerik = curl_exec($ch);
    $responce = json_decode($icerik);
    $owner_person = $responce[0]->ownerId;
    return $owner_person;
}

function hubspot_integration($parameters) {
    $base_url = getHubspot('base_url');
    $modify_url = '/contacts/v1/contact';
    $token = getHubspot('token');
    $concat_url = $base_url.$modify_url."?hapikey=$token";

    $post = [
        'properties' => [
            [
                'property'  =>  'email',
                'value'     =>  $parameters['email'],
            ],
            [
                'property'  =>  'firstname',
                'value'     =>  $parameters['firstname'],
            ],
            [
                'property'  =>  'lastname',
                'value'     =>  $parameters['lastname'],
            ],
            [
                'property'  =>  'message',
                'value'     =>  $parameters['message'],
            ],
            [
                'property'  =>  'company',
                'value'     =>  $parameters['company'],
            ],
//            [
//                'property'  =>  'country',
//                'value'     =>  $parameters['country'],
//            ],
//            [
//                'property'  =>  'city',
//                'value'     =>  $parameters['country'],
//            ],
            [
                'property'  =>  'lifecyclestage',
                'value'     =>  $parameters['lifecyclestage'], //New
            ],
            [
                'property'  =>  'hs_lead_status',
                'value'     =>  $parameters['leadstatus'], //New
            ],
            [
                'property'  =>  'hubspot_owner_id',
                'value'     =>  getOwnerId(),
            ],
        ],
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $concat_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post));

    $icerik = curl_exec($ch);

    curl_close($ch);
}




function send_request_subs($url, $json_value, $user, $password) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($json_value));
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_USERPWD, $user.':'.$password);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
    curl_setopt ($ch, CURLOPT_SSLVERSION, 6);
    $output = curl_exec($ch);
    curl_close($ch);
}



function initRedirrect() {

    $is_customer = false;
    if(!$is_customer && !isset($_GET['dev']) && !is_admin() ) {
        ob_start();
        wp_redirect('https://jobs.sirinsoftware.com', 302);
        exit;
    }
}

function translator ($text) {

    $rus=array('А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','П','Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Ъ','Ы','Ь','Э','Ю','Я','а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п','р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я',' ','.','/','"','+','!','*','\'','(',')','&'); //+!*'(), "
    $lat=array('a','b','v','g','d','e','e','gh','z','i','y','k','l','m','n','o','p','r','s','t','u','f','h','c','ch','sh','sch','y','y','y','e','yu','ya','a','b','v','g','d','e','e','gh','z','i','y','k','l','m','n','o','p','r','s','t','u','f','h','c','ch','sh','sch','y','y','y','e','yu','ya','_'.'','','','','','','','','','_');

    $tr = strtolower(str_replace($rus, $lat, $text));
    return $tr;
}


if( function_exists('acf_add_options_page') ) {
  acf_add_options_page(array(
        'page_title'    => __('Theme General Settings'),
        'menu_title'    => __('Theme Settings'),
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}


function send_subscribe(WP_REST_Request $request) {
  header("Access-Control-Allow-Origin: *");

  global $wpdb;
  global $post;

  if (isset($_POST) && !empty($_POST) && $_POST['recaptchaToken']) {

        $checkcaptcha = checkCaptcha($_POST['recaptchaToken']);

        if($checkcaptcha){
            $api_key = "ac968a1e95ee54b70080fac32cb09691-us14";
            $list_id = "67b6a5dc6f";

            if(strpos($_POST['FNAME'],' ')===false){
                $merge_fields=array('FNAME' => $_POST['FNAME'], 'LNAME' => '');
            }else{
                $fname=explode(' ',$_POST['FNAME']);
                $merge_fields=array('FNAME' => $fname[0], 'LNAME' => $fname[1]);
            }

            eSputnicSubscribe($_POST['EMAIL'],$merge_fields['FNAME'], $merge_fields['LNAME']);

            $new_array = [
                'FNAME' => $merge_fields['FNAME'],
                'LNAME' => $merge_fields['LNAME'],
                'EMAIL' => $_POST['EMAIL'],
            ];

            if(!get_option('sirin-subscribe-emails-theme') || get_option('sirin-subscribe-emails-theme') === '') {
                update_option('sirin-subscribe-emails-theme', []);
            }

            $emails = get_option('sirin-subscribe-emails-theme');
            array_push($emails, $new_array);

            update_option('sirin-subscribe-emails-theme', $emails);

    // Email to us
            $to = trim(get_option('sirin-main-email'));
            //$to = "yuriy3304@gmail.com";
            $message = '';
            $subject = 'New Subscriber';
            $headers = array('From: Sirin Software Site <info@sirinsoftware.com>', 'Content-Type: text/html; charset=UTF-8');
            $message .= '<p>New subscriber</p>';
            $message .= '<p>Email : '.$_POST['EMAIL'].'</p>';
            $message .= '<p>First name : '.$merge_fields['FNAME'].'</p>';
            $message .= '<p>Last name : '.$merge_fields['LNAME'].'</p>';
            wp_mail($to, $subject, $message, $headers);

    // Email to subscriber
            if(get_option('sirin-subscribe-autoreplay') != '') {

                $headers = array('From: Sirin Software Site <info@sirinsoftware.com>','Content-Type: text/html; charset=UTF-8');
                $autoreplay_message = get_option('sirin-subscribe-autoreplay');
                $autoreplay_message .= '<p><a href="'.get_site_url().'"><img width="200px" src="'.get_template_directory_uri().'/img/email/logo.png'.'" /></a></p>';
                $autoreplay_message .= '<p><strong>Meet us:</strong><a style="margin-left: 20px" href="'.get_option('sirin-linkedin').'"><img src="'.get_template_directory_uri().'/img/email/linkendin.jpg'.'" /></a><a style="margin-left: 20px" href="'.get_option('sirin-facebook').'"><img src="'.get_template_directory_uri().'/img/email/facebook.jpg'.'" /></a><a style="margin-left: 20px" href="'.get_option('sirin-dou').'"><img src="'.get_template_directory_uri().'/img/email/dou.png'.'" /></a></p>';
                $autoreplay_subject = get_option('sirin-subscribe-autoreplay-theme') ? get_option('sirin-subscribe-autoreplay-theme') : 'Thank you for your subscribe';
                wp_mail( $_POST['EMAIL'], $autoreplay_subject, $autoreplay_message, $headers );

            }

    //      if( $result->status == 400 ){
    //          echo 'Error';
    //      } elseif( $result->status == 'pending' ){
                echo 'OK';
    //      }
        }
    }

    die();

}

add_action( 'rest_api_init', function(){

  register_rest_route( 'frontity-api', '/send-subscribe', [
    'methods'  => 'POST',
    'callback' => 'send_subscribe',
  ] );

} );


function checkCaptcha($recaptcha){
    $ch = curl_init();
    $recatpcha_data = [
        "secret" => "6LfVdacUAAAAAN9lp8VDrWvLU4-C9-lo0FIn906b",
        "response" => $recaptcha,
    ];            
    curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $recatpcha_data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec($ch);
    print_r($server_output);
    curl_close($ch);

    $recaptcha_back = json_decode($server_output, JSON_OBJECT_AS_ARRAY);

    if($recaptcha_back['success'] === true) {
        $_SESSION['captcha'] = true;
        return true;
    } else {
        $_SESSION['captcha'] = false;
        return false;
    }
}

function sendFormData2(WP_REST_Request $request)
{
    header("Access-Control-Allow-Origin: *");

      global $wpdb;
      global $post;

    require_once(ABSPATH . 'wp-admin/includes/image.php');
    require_once(ABSPATH . 'wp-admin/includes/file.php');
    require_once(ABSPATH . 'wp-admin/includes/media.php');

    $global_var = include ('inc/global_vars.php');
    $is_mail = $global_var['is_mail'];
    $hubspot_integration = $global_var['is_hubspot'];
    $is_skip_recaptcha = $global_var['is_skip_captcha'];

    if (isset($_POST) && !empty($_POST) && $_POST['recaptchaToken']) {

        $checkcaptcha = checkCaptcha($_POST['recaptchaToken']);

        if($checkcaptcha){
            if (!get_option('sirin-request-no') || trim(get_option('sirin-request-no')) == false) update_option('sirin-request-no', 1);
            $message = '';
            $args = array('name', 'email', 'company', 'description', 'nda', );
            if (isset($_POST) && !empty($_POST)) {
                foreach ($args as $arg) {
                    if (isset($_POST[$arg]) && !empty($_POST[$arg])) {
                        switch ($arg) {
                            case 'name':
                                $message .= '<strong>Name: </strong>' . $_POST[$arg] . '<br/>';
                                break;
                            case 'email':
                                $message .= '<strong>Email: </strong>' . $_POST[$arg] . '<br/>';
                                break;
                            case 'company':
                                $message .= '<strong>Company: </strong>' . $_POST[$arg] . '<br/>';
                                break;
                            case 'description':
                                $_POST[$arg] = nl2br($_POST[$arg]);
                                $message .= '<strong>Description: </strong><br/>' . $_POST[$arg] . '<br/>';
                                break;
                            case 'nda':
                                $message .= '<strong>Send NDA: Yes </strong><br/>';
                                break;
                            case 'subscribe':
                                $message .= '<strong>Subscribe: Yes </strong><br/>';
                                break;
                        }
                    }
                }

                if ($_FILES['userfile']) {
                    $movefile = wp_handle_upload($_FILES['userfile'], array('test_form' => FALSE));
                    if($movefile['url']) {
                        $message .= '<strong>Uploaded File Link:'. $movefile['url'] .'</strong>';
                    }
                }

                if ($message != '' && get_option('sirin-sales-email')) {
                    $to = trim(get_option('sirin-sales-email'));
                    $subject = 'Project Request ' . get_option('sirin-request-no');
                    $headers = array('From: Sirin Software Site <info@sirinsoftware.com>', 'Content-Type: text/html; charset=UTF-8');

                    if($is_mail) {
                        wp_mail($to, $subject, $message, $headers);
                    }


                    /*
                     * Autoreplay to customer
                     */
                    if($is_mail) {
                        $data_autoreply = [
                            'email' =>  $_POST['email'],
                            'name'  =>  $_POST['name'],
                        ];
                        sendAutoreplyToCustomer($data_autoreply);
                    }
                    /*
                     * end autoreplay
                     */


                    update_option('sirin-request-no', get_option('sirin-request-no') + 1);

                    if($hubspot_integration) {

                        if(strpos($_POST['name'],' ')===false){
                            $merge_fields=array('FNAME' => $_POST['name'], 'LNAME' => '');
                        } else {
                            $fname=explode(' ',$_POST['name']);
                            $merge_fields=array('FNAME' => $fname[0], 'LNAME' => $fname[1]);
                        }

                        $parameters = [
                            'firstname' => $merge_fields['FNAME'],
                            'lastname' => $merge_fields['LNAME'],
                            'message' => $_POST['description'],
                            'company' => $_POST['company'],
                            'email' => $_POST['email'],
                            'lifecyclestage' => 'marketingqualifiedlead',
                            'leadstatus' => 'NEW',
                        ];

                        hubspot_integration($parameters);
                    }

                    if($_POST['subscribe']) {

                    }

                    echo 'good';
                }
            } else {
                return 'bad';
            }
        }
    }

    die();
}

add_action( 'rest_api_init', function(){

  register_rest_route( 'frontity-api', '/send-form', [
    'methods'  => 'POST',
    'callback' => 'sendFormData2',
  ] );

} );

function sendFrontityComment(WP_REST_Request $request)
{
    header("Access-Control-Allow-Origin: *");

    global $wpdb;
    global $post;

    if (isset($_POST) && !empty($_POST) && $_POST['recaptchaToken']) {

        $checkcaptcha = checkCaptcha($_POST['recaptchaToken']);
        if($checkcaptcha){
            $commentdata = [
                'comment_author'=>$_POST['author_name'],
                'comment_author_email'=>$_POST['author_email'],
                'comment_content'=>$_POST['content'],
                'comment_post_ID'=>$_POST['post'],
                'comment_approved'=>0,
            ];
            wp_insert_comment( $commentdata );
            echo "good";
        } else {
            echo "bad";
        }

    }

    die();
}

add_action( 'rest_api_init', function(){

  register_rest_route( 'frontity-api', '/send-comment', [
    'methods'  => 'POST',
    'callback' => 'sendFrontityComment',
  ] );

} );

// define the wpseo_sitemap_url callback 
function filter_wpseo_sitemap_url( $output, $url ) { 
    // make filter magic happen here... 
    return str_replace("admin.","",$output); 
}; 
         
// add the filter 
add_filter( 'wpseo_sitemap_url', 'filter_wpseo_sitemap_url', 10, 2 ); 



/**
 * Send Book Form
 */
function sendBookData2(WP_REST_Request $request)
{
    header("Access-Control-Allow-Origin: *");
    $global_var = include ('inc/global_vars.php');
    $is_mail = $global_var['is_mail'];
    $hubspot_integration = $global_var['is_hubspot'];
    $is_skip_recaptcha = $global_var['is_skip_captcha'];

    if (isset($_POST) && !empty($_POST) && $_POST['recaptchaToken']) {

        $checkcaptcha = checkCaptcha($_POST['recaptchaToken']);
        if($checkcaptcha){
            $args = array('first_name', 'last_name', 'company', 'email', 'accept-with-news', );
            if (isset($_POST) && !empty($_POST)) {
                $message = '';
                foreach ($args as $arg) {
                    if (isset($_POST[$arg]) && !empty($_POST[$arg])) {
                        switch ($arg) {
                            case 'first_name':
                                $message .= '<strong>First Name: </strong>' . $_POST[$arg] . '<br/>';
                                break;
                            case 'last_name':
                                $message .= '<strong>Last Name: </strong>' . $_POST[$arg] . '<br/>';
                                break;
                            case 'email':
                                $message .= '<strong>Email: </strong>' . $_POST[$arg] . '<br/>';
                                break;
                            case 'company':
                                $message .= '<strong>Company: </strong>' . $_POST[$arg] . '<br/>';
                                break;
                            case 'accept-with-news':
                                $message .= '<strong>Subscribe: Yes </strong><br/>';
                                break;
                        }
                    }
                }
                if (!get_option('sirin-request-book-no') || trim(get_option('sirin-request-book-no')) == false) {
                     update_option('sirin-request-book-no', 1);
                } else {
                    update_option('sirin-request-book-no', get_option('sirin-request-book-no')+1);
                };

                $to = trim(get_option('sirin-sales-book-email'));
                //$to = "yuriy3304@gmail.com";
                $subject = 'Book Request ' . get_option('sirin-request-book-no');
                $headers = array('From: Sirin Software Site <info@sirinsoftware.com>', 'Content-Type: text/html; charset=UTF-8');

                if($is_mail) {
                    wp_mail($to, $subject, $message, $headers);
                    sendBookAutoreplyToCustomer([
                        'name' => $_POST['first_name'].' '.$_POST['last_name'],
                        'email' => $_POST['email'],
                    ]);
                }

                echo 'good';
                wp_die();
            }
        }
    }
    echo 'bad';
    wp_die();
}

add_action( 'rest_api_init', function(){

  register_rest_route( 'frontity-api', '/sendbookdata', [
    'methods'  => 'POST',
    'callback' => 'sendBookData2',
  ] );

} );

add_filter( 'rest_portfolio_collection_params', 'big_json_change_post_per_page', 10, 1 );
function big_json_change_post_per_page( $params ) {
    if ( isset( $params['per_page'] ) ) {
        $params['per_page']['maximum'] = 9999;
    }
    return $params;
};
add_filter( 'rest_teammembers_collection_params', 'big_json_change_teammembers_per_page', 10, 1 );
function big_json_change_teammembers_per_page( $params ) {
    if ( isset( $params['per_page'] ) ) {
        $params['per_page']['maximum'] = 9999;
    }
    return $params;
};


function menuHierarchy($menuitems) {
    $count = 0;
    $submenu = [];
    $menu = [];
    $parent_id = -1;

    foreach( array_reverse($menuitems) as $item ):

        if ( $item->menu_item_parent > 0 ):
            $parent_id = $item->menu_item_parent;
            $submenu[] = array(
                'ID' => $item->ID,
                'url' => $item->url,
                'title' => $item->title,
            );
        elseif ( $parent_id == $item->ID ):
            $menu[] = array(
                'ID' => $item->ID,
                'url' => $item->url,
                'title' => $item->title,
                'child_items' => array_reverse($submenu),
            );
            $submenu = [];
        else:
            $menu[] = array(
                'ID' => $item->ID,
                'url' => $item->url,
                'title' => $item->title,
            );
        endif;

    endforeach;

    return array_reverse($menu);
}

function getOptions(WP_REST_Request $request)
{
    header("Access-Control-Allow-Origin: *");

    global $wpdb;
    global $post;

    $acf = array();
    $acf['options'] = get_fields('options');
    $acf['faq'] = get_fields('2254');
    $acf['head_menu'] = menuHierarchy(wp_get_nav_menu_items( 100, array( 'order' => 'DESC' ) ));
    $acf['footer_menu'] = menuHierarchy(wp_get_nav_menu_items( 4, array( 'order' => 'DESC' ) ));
    print_r(json_encode($acf));

    die();
}

add_action( 'rest_api_init', function(){

  register_rest_route( 'frontity-api', '/get-options', [
    'methods'  => 'GET',
    'callback' => 'getOptions',
  ] );

} );


?>