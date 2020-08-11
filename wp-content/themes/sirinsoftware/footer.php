<?php
$recaptcha_key = '6Lf7SWIUAAAAAK0p8Ud2SHJc2tHkyG9eWWMo3IGO';
?>
<?php if(post_password_required()): ?>
<?php include(locate_template('popup/popup-protected.php'));?>
<?php else: ?>
<?php include(locate_template('popup/popup-clientform.php'));?>
<?php endif; ?>
<?php if(is_blog() || is_single()): ?>
<?php include(locate_template('popup/popup-subscribe.php'));?>
<?php endif; ?>



<?php if(get_post_type()!='jobs'):?>
    <div class="sirin-theme-clientform" id="tellabout">
        <div class="help">
            <div class="container">
                <h3>HOW CAN WE HELP YOU?</h3>
                <p>We will get in touch with you within 24 business hours</p>
            </div>
        </div>
        <div class="form footer-form" >
            <div class="container">
                <form method="POST" action="">
                    <div class="row">
                        <div class="md-one-third column">
                            <div class="first">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="first_name" placeholder="Name *">
                                    <p class="error-text"><?php echo __('Enter correct name', 'sirinsoftware')?></p>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="email" placeholder="Email Address *">
                                    <p class="error-text"><?php echo __('Enter correct email', 'sirinsoftware')?></p>
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="text" name="company" placeholder="Company *">
                                    <p class="error-text"><?php echo __('Enter your company', 'sirinsoftware')?></p>
                                </div>

                                <div class="form-group">
                                    <div class="accept-block">
                                        <input type="checkbox" id="cbx" class="cbx" name="accetp-with" style="display: none;">
                                        <label for="cbx" class="check">
                                            <table>
                                                <tr>
                                                    <td>
                                                        <svg width="32px" height="32px" viewBox="0 0 18 18">
                                                            <path fill="#ffffff" d="M0.7,9 L0.7,0.7 L14.5,0.7 L14.5,14.5 L1,14.5 L0.7,9 Z"></path>
                                                            <polyline points="1 9 7 14 15 4"></polyline>
                                                        </svg>
                                                    </td>
                                                    <td>
                                                        <span>I accept Sirin Software <br> <a href="<?php echo (get_option('sirin-privacy-policy')? get_option('sirin-privacy-policy'):''); ?>">privacy policy</a></span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </label>
                                        <p class="error-text"><?php echo __('Please, accept privacy policy', 'sirinsoftware')?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="md-two-thirds column">
                            <div class="second">
                                <div class="form-group">
                                    <div class="textarea-field-box">
                                        <div class="textarea-field">
                                            <textarea class="textarea-scrollbar scrollbar-outer form-control" type="text" name="description" placeholder="Message"></textarea>
                                            <p class="error-text"><?php echo __('Enter correct text', 'sirinsoftware')?></p>
                                        </div>
                                        <div class="textarea-footer">
                                            <div class="nda">
                                                <input type="checkbox" id="cbx-nda-footer" class="cbx" name="nda" style="display: none;">
                                                <label for="cbx-nda-footer" class="check">
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <svg width="32px" height="32px" viewBox="0 0 18 18">
                                                                    <path fill="#ffffff" d="M0.7,9 L0.7,0.7 L14.5,0.7 L14.5,14.5 L1,14.5 L0.7,9 Z"></path>
                                                                    <polyline points="1 9 7 14 15 4"></polyline>
                                                                </svg>
                                                            </td>
                                                            <td>
                                                                <span>Send me NDA</span>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </label>
                                            </div>
                                            <div class="file">
                                                <input style="display: none" name="included_file" type="file" id="file-input-field-footer">
                                                <span class="included_filename"></span>
                                                <label for="file-input-field-footer">
                                                    <div class="label-box">
                                                        <div class="label-box-title">Attach a file</div>
                                                        <div class="label-box-icon">
                                                            <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0)">
                                                                    <path d="M9.08948 13.8598V13.8599C9.08948 14.0864 9.27328 14.2702 9.49982 14.2702C9.72636 14.2702 9.91016 14.0864 9.91017 13.8599C9.91017 13.8599 9.91017 13.8599 9.91017 13.8599L9.91074 7.42305V7.42304C9.91074 7.19649 9.72694 7.0127 9.50039 7.0127C9.27385 7.0127 9.09005 7.19649 9.09005 7.42303C9.09005 7.42303 9.09005 7.42304 9.09005 7.42304L9.08948 13.8598Z" fill="#A6C950" stroke="#A6C950" stroke-width="0.25"/>
                                                                    <path d="M11.6708 10.1744L11.6713 10.1749C11.7513 10.2541 11.8563 10.2944 11.9612 10.2944C12.0662 10.2944 12.1711 10.2541 12.2512 10.1749L12.2516 10.1744C12.4117 10.0143 12.4117 9.75426 12.2516 9.59416L9.79025 7.13277C9.63015 6.97267 9.3701 6.97267 9.21 7.13277L6.74861 9.59416C6.58852 9.75426 6.58852 10.0143 6.74861 10.1744C6.90872 10.3345 7.16877 10.3345 7.32887 10.1744L9.49984 8.00344L11.6708 10.1744Z" fill="#A6C950" stroke="#A6C950" stroke-width="0.25"/>
                                                                    <path d="M3.26218 19.125H15.7392C16.5952 19.125 17.2909 18.4293 17.2909 17.5738V4.96729C17.2909 4.74074 17.1071 4.55695 16.8806 4.55695C16.654 4.55695 16.4702 4.74074 16.4702 4.96729V17.5733C16.4702 17.9762 16.1421 18.3043 15.7392 18.3043H3.26218C2.85925 18.3043 2.53114 17.9762 2.53114 17.5733V1.42673C2.53114 1.0238 2.85925 0.695691 3.26218 0.695691H12.323C12.5496 0.695691 12.7334 0.511891 12.7334 0.285345C12.7334 0.0587992 12.5496 -0.125 12.323 -0.125H3.26218C2.40676 -0.125 1.71045 0.570676 1.71045 1.42673V17.5733C1.71045 18.4293 2.40676 19.125 3.26218 19.125Z" fill="#A6C950" stroke="#A6C950" stroke-width="0.25"/>
                                                                    <path d="M11.9306 5.2538H16.4881C16.7157 5.2538 16.8985 5.06894 16.8985 4.84288C16.8985 4.61633 16.7147 4.43253 16.4881 4.43253H12.341V0.285345C12.341 0.0587991 12.1572 -0.125 11.9306 -0.125C11.7041 -0.125 11.5203 0.0587991 11.5203 0.285345V4.84345C11.5203 5.07 11.7041 5.2538 11.9306 5.2538Z" fill="#A6C950" stroke="#A6C950" stroke-width="0.25"/>
                                                                    <path d="M17.1007 5.25188C17.0265 5.25188 16.9523 5.22278 16.8964 5.16571L12.3388 0.484333C12.2292 0.371907 12.2315 0.190427 12.3445 0.0808548C12.4569 -0.0292884 12.6379 -0.026435 12.748 0.0865617L17.3055 4.76794C17.4151 4.88036 17.4128 5.06184 17.2998 5.17141C17.2445 5.22506 17.1726 5.25188 17.1007 5.25188Z" fill="#A6C950" stroke="#A6C950" stroke-width="0.25"/>
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0">
                                                                        <rect width="19" height="19" fill="white" transform="matrix(-1 0 0 1 19 0)"/>
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="accept-block">
                                        <input type="checkbox" id="cbx-news" class="cbx" name="subscribe" style="display: none;">
                                        <label for="cbx-news" class="check">
                                            <table>
                                                <tr>
                                                    <td>
                                                        <svg width="32px" height="32px" viewBox="0 0 18 18">
                                                            <path fill="#ffffff" d="M0.7,9 L0.7,0.7 L14.5,0.7 L14.5,14.5 L1,14.5 L0.7,9 Z"></path>
                                                            <polyline points="1 9 7 14 15 4"></polyline>
                                                        </svg>
                                                    </td>
                                                    <td>
                                                        <span>I want to stay tuned for Sirin Software latest articles and news</span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </label>
                                        <p class="error-text"><?php echo __('Please, accept privacy policy', 'sirinsoftware')?></p>
                                    </div>
                                </div>
                                <div class="action">
                                    <button class="btn btn-green icon" id="sendFormButtomDesign">
                                        send
                                        <i class="icon-fly"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php else: ?>
<?php //include(locate_template('popup/popup-clientform.php'));?>
<?php endif;?>
<?php if(!is_front_page()):?>
    <?php if(!is_page('contacts')):?>
        <div class="services <?php if(is_post_type_archive('jobs') || is_singular( 'jobs' )) echo 'jobs';?>">
            <div class="inner">
                <div class="list-wrap">
                    <span><?php echo __('Services', 'sirinsoftware')?>:</span>
                    <?php
                    $menuParameters = array(
                        'theme_location'  => 'footer',
                        'container'       => false,
                        'echo'            => false,
                        'items_wrap'      => '%3$s',
                        'depth'           => 0,
                        'link_before' => '<span><span>',
                        'link_after' => '</span></span>'
                    );

                    //echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' );
                    preg_match_all('/<li.*? class=\"(.*?)">.*?<\/li>/iU', wp_nav_menu( $menuParameters ), $menu_classes);
                    preg_match_all('/<li.*?><a href="(.*?)">.*?<\/a><\/li>/iU', wp_nav_menu( $menuParameters ), $menu_a);
                    preg_match_all('/<li.*?><a.*?>(.*?)<\/a><\/li>/s', wp_nav_menu( $menuParameters ), $menu_span);

                    if(count($menu_span[1])>0){
                        for($i=0;$i<count($menu_span[1]);$i++){
                            $span=$menu_span[1][$i];
                            $class=explode(' ', $menu_classes[1][$i]);
                            $class=$class[0];
                            $href=$menu_a[1][$i];
                            echo '<a href="'.$href.'"><span class="i-wrap"><i class="ico '.$class.'"><i></i></i></span>'.$span.'</a>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    <?php endif;?>
<?php endif;?>

<div class="sirin-footer footer">
    <div class="container">
        <div class="items-box">
            <div class="item logo">
                <div class="footer-logo">
                    <img width="160" src="<?php echo get_template_directory_uri().'/sirindesign/build/' ?>/img/logo.svg" alt="">
                </div>
                <div class="footer-awards">
                    <div class="award">
                        <img
                                src="<?php echo get_template_directory_uri().'/sirindesign/build/' ?>/img/width_srcset/footer-award-1_1x.png"
                                srcset="<?php echo get_template_directory_uri().'/sirindesign/build/' ?>/img/width_srcset/footer-award-1_1x.png 1x, <?php echo get_template_directory_uri().'/sirindesign/build/' ?>/img/width_srcset/footer-award-1_2x.png 2x"
                                alt=""
                                width="49"
                        >
                    </div>
                    <div class="award">
                        <img
                                src="<?php echo get_template_directory_uri().'/sirindesign/build/' ?>/img/width_srcset/footer-award-2_1x.png"
                                srcset="<?php echo get_template_directory_uri().'/sirindesign/build/' ?>/img/width_srcset/footer-award-2_1x.png 1x, <?php echo get_template_directory_uri().'/sirindesign/build/' ?>/img/width_srcset/footer-award-2_2x.png 2x"
                                alt=""
                                width="70"
                        >
                    </div>
                    <div class="award">
                        <img
                                src="<?php echo get_template_directory_uri().'/sirindesign/build/' ?>/img/width_srcset/footer-award-3_1x.png"
                                srcset="<?php echo get_template_directory_uri().'/sirindesign/build/' ?>/img/width_srcset/footer-award-3_1x.png 1x, <?php echo get_template_directory_uri().'/sirindesign/build/' ?>/img/width_srcset/footer-award-3_2x.png 2x"
                                alt=""
                                width="40"
                        >
                    </div>
                    <div class="award">
                        <img
                                src="<?php echo get_template_directory_uri().'/sirindesign/build/' ?>/img/width_srcset/footer-award-4_1x.png"
                                srcset="<?php echo get_template_directory_uri().'/sirindesign/build/' ?>/img/width_srcset/footer-award-4_1x.png 1x, <?php echo get_template_directory_uri().'/sirindesign/build/' ?>/img/width_srcset/footer-award-4_2x.png 2x"
                                alt=""
                                width="36"
                        >
                    </div>
                    <div class="award">
                        <img
                                src="<?php echo get_template_directory_uri().'/sirindesign/build/' ?>/img/width_srcset/footer-award-5_1x.png"
                                srcset="<?php echo get_template_directory_uri().'/sirindesign/build/' ?>/img/width_srcset/footer-award-5_1x.png 1x, <?php echo get_template_directory_uri().'/sirindesign/build/' ?>/img/width_srcset/footer-award-5_2x.png 2x"
                                alt=""
                                width="41"
                        >
                    </div>
                </div>
            </div><div class="item about">
                <h4><a href="/about">About us</a></h4>
                <ul>
                    <li>
                        <a href="/about">Profile</a>
                    </li>
                    <li>
                        <a href="/about/expertise">Expertise</a>
                    </li>
                    <li>
                        <a href="/about/testimonials">Testimonials</a>
                    </li>
                    <li>
                        <a href="/about/faq">FAQ</a>
                    </li>
                    <li>
                        <a href="/about/team">Team</a>
                    </li>
                    <li>
                        <a href="https://reward.sirinsoftware.com">Referral program</a>
                    </li>
                </ul>
            </div><div class="item case">
                <h4><a href="/case-studies/">Case Studies</a></h4>
                <ul>
                    <li>
                        <a href="/case-studies/?case=embedded-linux-outsourcing">Linux, Embedded and IoT</a>
                    </li>
                    <li>
                        <a href="/case-studies/?case=mobile-app-development">Mobile App Development</a>
                    </li>
                </ul>

                <h4><a href="/blog">Blog</a></h4>
            </div><div class="item services-contacts">
                <div>
                    <div class="item-child child-services">
                        <h4><a href="/services">Services</a></h4>
                        <ul>
                            <li>
                                <a href="/services/rd-center/">R&D Center</a>
                            </li>
                            <li>
                                <a href="/services/it-staff-augmentation/">IT Staff Augmentation</a>
                            </li>
                        </ul>
                        <br>
                        <h4><a href="https://jobs.sirinsoftware.com/jobs/">Careers</a></h4>
                    </div><div class="item-child child-contacts">
                        <div class="contacts-main-info">
                            <h4><a href="/contacts/">Contact us</a></h4>
                            <p class="contact-row">
                                321 328 8379
                                <br>
                                info@sirinsoftware.com
                            </p>
                        </div>
                        <div class="contacts-main-links">
                            <div class="rightcol">

                                <p class="follow">Follow us:</p>
                                <div class="links">
                                    <a class="btn btn-tw-1" href="https://twitter.com/Sirin_Software" target="_blank"><i class="ico ico-tw-11x15-01"><i></i></i></a>
                                    <a class="btn btn-in-1" href="https://www.linkedin.com/company/10654107" target="_blank"><i class="ico ico-in-1"><i></i></i></a>
                                    <a class="btn btn-fb-1" href="https://www.facebook.com/sirinsoftware" target="_blank"><i class="ico ico-fb-1"><i></i></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="contacts-main-serch-form">
                            <form class="search-form" action="https://sirinsoftware.com" method="get">
                                <div class="field">
                                    <div class="input-wrap">
                                        <input type="text" autocomplete="on" value="" name="s" id="s" title="">
                                        <button class="btn btn-search-1"><i class="ico ico-search-1"><i></i></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <p class="copy-right">
                        © Copyright - Sirin Software.  All Rights Reserved.
                        <br>
                        <a href="/privacy-policy/">Privacy Policy</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php if(is_singular( 'portfolio' )):?>
    <?php wp_reset_postdata(); ?>
    <?php $post_id=$wp_query->queried_object->ID;?>
    <div class="popup-wrap">
        <div id="popup_portfolio_menu" class="popup popup-portfolio-menu">
            <div class="inner">
                <div class="menu-wrap" data-scrollable="y">
                    <div class="menu">
                        <?php $terms = get_terms( 'portfolio-cat','hide_empty=1');?>
                        <?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ):?>
                            <?php foreach ( $terms as $term ):?>
                                <div class="sector open">
                                    <h2><a href="javascript:;"><?php echo $term->name;?></a></h2>
                                    <?php $args = array( 'post_type' => 'portfolio', 'posts_per_page' => 99999,'tax_query' => array(array('taxonomy' => 'portfolio-cat','field' => 'id','terms' => $term->term_id),));
                                    $loop = new WP_Query( $args );
                                    if($loop->have_posts()):?>
                                        <ul>
                                            <?php $i=1;
                                            while ( $loop->have_posts() ) : $loop->the_post();?>
                                                <li <?php if($post_id==get_the_ID()) echo 'class="selected"';?>>
                                                    <a href="<?php the_permalink();?>">
                                                        <span class="inner"><sup><?php echo ($i<10)? '0'.$i : $i;?></sup><?php echo wp_strip_all_tags(get_the_title());?></span>
                                                        <span class="corner-left"></span>
                                                    </a>
                                                </li>
                                                <?php $i++; endwhile;?>
                                        </ul>
                                    <?php endif;?>
                                    <?php wp_reset_postdata(); ?>
                                </div>
                            <?php endforeach;?>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif;?>
<?php if(is_category()):?>
    <div class="popup-wrap">
        <div id="popup_form_subscribe" class="popup">
            <div class="inner subscribe">
                <h2>Subscribe</h2>
                <form action="." method="post">
                    <div class="field">
                        <div class="input-wrap">
                            <span class="placeholder">Email</span>
                            <input type="text" name="EMAIL">
                        </div>
                        <p class="error-text">Enter correct Email</p>
                    </div>
                    <div class="field">
                        <div class="input-wrap">
                            <span class="placeholder">Your Name</span>
                            <input type="text" name="FNAME">
                        </div>
                        <p class="error-text">Enter correct name</p>
                    </div>
                    <div class="bottom">
                        <button type="submit" class="btn btn-01">
                            <span>Subscribe</span>
                            <i class="ico ico-order-1"><i></i></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endif;?>
<?php global $post;?>

<?php if(is_page('229')):?>
    <div class="popup-wrap">
        <div id="popup_form_general_presentation" class="popup">
            <div class="inner presentation">
                <h2>Send presentation</h2>
                <form action="https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST" id="form_popup_general_presentation" autocomplete="off">
                    <input type=hidden name="oid" value="00D58000000csPr">
                    <input type=hidden name="retURL" value="<?php echo get_site_url().$_SERVER['REQUEST_URI'];?>">
                    <input name="presentation_link" type="hidden" value="">
                    <div class="field">
                        <div class="input-wrap">
                            <span class="placeholder">Email</span>
                            <input type="text" name="email">
                        </div>
                        <p class="error-text">Enter your Email</p>
                    </div>
                    <div class="field">
                        <div class="input-wrap">
                            <span class="placeholder">Your Name</span>
                            <input type="text" name="first_name">
                        </div>
                        <p class="error-text">Enter your name</p>
                    </div>
                    <div class="bottom">
                        <button type="submit" class="btn btn-01 btn-email">
                            <span>send</span>
                            <i class="ico ico-mail-4"><i></i></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endif;?>


<?php if(get_option('sirin-bottom-policy-cookie-line') == 'yes') : ?>
<!--    --><?php //if(!isset($_COOKIE['accept-privancy-cookie-policy'])) : ?>
        <div class="footer-accept-line">
            <div class="box">
                <p style="color: white;font-size: 14px">Sirin Software is updating its Privacy Policy on Jan 01, 2020. See the updated Privacy Policy
                    <a href="<?php echo (get_option('sirin-privacy-policy')? get_option('sirin-privacy-policy'):''); ?>">here</a>.
                    <br>
                    We use cookies to improve your experience with our site, including analytics and personalisation. By continuing to use the service, you agree to our use of cookies as described in the Privacy Policy
                </p>
                <p>
                    <button class="btn btn-01">OK</button>
                </p>
            </div>
        </div>
<!--    --><?php //endif; ?>
<?php endif; ?>

<!-- Thank you popup -->
<div class="popup-wrap">
    <div id="popup_form_thank_you" class="popup">
        <div class="inner presentation">
            <h2>Thank you for your request</h2>
            <h4>We will get in touch with you soon</h4>
            <p>
                <a href="/blog/" class="goToLink btn btn-green">Blog</a>
            </p>
        </div>
    </div>
</div>

<?php wp_footer();?>

<script src="https://www.google.com/recaptcha/api.js?render=6LfVdacUAAAAAG8xTsC8s3qsbPEwswFD2ssxL9pd"></script>
<script>
    var recaptcha_session = false;
    grecaptcha.ready(function() {
        grecaptcha.execute('6LfVdacUAAAAAG8xTsC8s3qsbPEwswFD2ssxL9pd', {action: 'homepage'}).then(function(token) {
            var formData = new FormData();
            formData.append('token', token);
            formData.append('action', 'captcha_v3_check');
            $.ajax({
                url: '/wp-admin/admin-ajax.php', // this is the object instantiated in wp_localize_script function
                type: 'POST',
                action: 'captcha_v3_check',
                data: formData,
                processData: false,  // tell jQuery not to process the data
                contentType: false,
                success: function (data) {
                    if(data === 'OK') {
                        recaptcha_session = true;
                    }
                }
            })
        });
    });
</script>
<?php if(isset($_GET['c'])): ?>
    <script>
        setTimeout(function(){
             inspectletPush('c');
        }, 2000)
    </script>
<?php endif ?>
</body>
</html>