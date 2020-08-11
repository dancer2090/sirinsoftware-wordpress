<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta name="google-site-verification" content="Au83ZhNB_PWQqOun049mxVB9Kc_8E0JfljOPgDhXxqQ" />
    <meta name="ahrefs-site-verification" content="536adeb6b14f0590753fa2f8b6dc7f0118070029bb2412300fe9e9cef301059e">
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri();?>/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Martel|Montserrat:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-PN5W3K4');</script>
    <!-- End Google Tag Manager -->

   <?php wp_head(); ?>
</head>
<body class="<?php if(is_single() || is_blog()) {echo "can-subscribe";} ?>">
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PN5W3K4"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<input type="hidden" name="gettepmlatedirectoryuri" value="<?php echo get_template_directory_uri(); ?>">
<div class="overlay"></div>
<div id="before-load">
    <img src="<?php echo get_template_directory_uri(); ?>/sirindesign/build/img/logo.svg" alt="preload-icon">
</div>

<style>
    #before-load {
        position: fixed; /*фиксированное положение блока*/
        left: 0; /*положение элемента слева*/
        top: 0; /*положение элемента сверху*/
        right: 0; /*положение элемента справа*/
        bottom: 0; /*положение элемента снизу*/
        background: #fff; /*цвет заднего фона блока*/
        z-index: 1001; /*располагаем его над всеми элементами на странице*/
        opacity: 1;
        transition: opacity 1s ease-in-out;
        /* display: none; */
    }
    #before-load img {
        width: 300px;
        font-size: 70px; /*размер иконки*/
        position: absolute; /*положение абсолютное, позиционируется относительно его ближайшего предка*/
        left: 50%; /*слева 50% от ширины родительского блока*/
        top: 50%; /*сверху 50% от высоты родительского блока*/
        margin: -35px 0 0 -150px; /*смещение иконки, чтобы она располагалась по центру*/
    }

    .grecaptcha-badge { visibility: hidden; }

    @media(max-width:768px) {
        #before-load {
            display: none;
        }
    }
</style>
<script>
    window.onload = function() {
        if(window.innerWidth > 768) {
             $('#before-load').css({opacity: 0})
            setTimeout(function(){
                $('#before-load').css({display:'none'});
            },1000)
        } else {
            $('#before-load').css({display:'none'});
        }
    };
</script>
<?php if(is_category() || is_search()):?>
    <div class="sidebar-blog-categories" >
        <a href="javascript:;" class="btn btn-02 close">
            <i class="ico ico-close-1"><i></i></i>
        </a>
        <div class="inner" data-scrollable="y">
            <div class="menu">
                <ul>
                    <li class="selected"><a href="<?php echo site_url()?>/blog/">All categories</a></li>
                    <?php
                    $args = array(
                        'taxonomy' => 'category',
                        'hide_empty' => false,
                    );
                    $terms = get_terms( $args );
                    foreach ( $terms as $term ){
                        if($term->name!='Blog'){
                            echo '<li><a href="' . get_term_link($term->term_id) . '">' . $term->name . '</a></li>';
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="blog-search-modal">
        <div class="inner">
            <a href="javascript:;" class="btn btn-02 close">
                <i class="ico ico-close-2"><i></i></i>
            </a>
            <div class="searh">
                <div class="field">
                    <div class="input-wrap">
                        <form class="search-form" action="<?php echo home_url(); ?>" method="get">
                            <input type="hidden" name="search-type" value="blog">
                            <input type="text" autocomplete="on" value="" name="s" id="s" title="" data-swplive="true">
                            <button class="btn btn-search-1"><i class="ico ico-search-2"><i></i></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif;?>
<header class="sirin-header">
    <div class="over-flow">
        <div class="container">
            <div class="menu">
                <div class="logo">
                    <a href="/">
                        <div class="image-logo">

                        </div>
                    </a>
                </div><div class="menuItems">
                    <?php wp_nav_menu( [
                        'theme_location'  => 'header',
                        'container'       => false,
                    ] ) ?>
                </div><div class="menuButton" id="topActionButton">
                    <?php if(get_post_type()!='jobs'): ?>
                        <a class="btn btn-green btn-scroll-to" href="#tellabout" id="fx-landing-close" >
                            Get a free quote
                        </a>
                    <?php else: ?>
                        <a class="btn btn-green fancybox" href="#popup_form_lead" id="fx-landing-close" >
                            Get a free quote
                        </a>
                    <?php endif; ?>
                </div><div class="menuMobileButton">
                    <button id="openMenuButton">
                        <img class="open" src="<?php echo get_template_directory_uri() ?>/sirindesign/build/img/menu-open.svg">
                        <img class="close" src="<?php echo get_template_directory_uri() ?>/sirindesign/build/img/menu-close.svg">
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>