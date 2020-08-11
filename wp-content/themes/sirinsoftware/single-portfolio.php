<?php
$show = true;
if (get_field('block_ukraine')===true) {
    if( $curl = curl_init() ) {
        $ip = $_SERVER["REMOTE_ADDR"];
        curl_setopt($curl, CURLOPT_URL, 'http://api.sypexgeo.net/json/'.$ip);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
        $out = curl_exec($curl);
        curl_close($curl);
        $out = json_decode($out);
        $country = $out->country->iso;
        if($country === 'UA') {
            $show = false;
        } else {
            $show = true;
        }
    }
}
?>


<?php get_header(); ?>



<?php while ( have_posts() ) : the_post();?>

<?php $thumb = wp_get_attachment_image_src(get_field('archive_featured_image'),'large'); ?>

<div class="sirin-inside-portfolio <?php if(post_password_required()): ?> protected-page <?php endif; ?>">
    <div class="banner">
        <div class="banner-image"  style="background-image: url('<?php if (!empty($thumb[0])) echo $thumb[0]; ?>')"></div>
        <div class="dark"></div>
        <div class="container">
            <div class="all-posts">
                <a href="/case-studies/" class="btn btn-08">
                    <i class="ico ico-left-4"><i></i></i>
                    <span>All cases</span>
                </a>
            </div>
            <h1>
                <?php the_title();?>
            </h1>
        </div>
    </div>

    <div class="container">
        <div class="content-box">
            <div class="left-column">

                <?php if(!post_password_required()): ?>
                    <?php if(get_field('portfolio_client_logo') || get_field('portfolio_business_area') || get_field('portfolio_geography') || get_field('portfolio_relationship_status')):?>

                        <div class="eight wow" data-wow-delay="3s" id="eights">
                            <div class="bg-image">
                                <svg width="720" height="200" viewBox="0 0 720 200" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke="transparent" stroke-width="1" fill="transparent" d="M237.574 115.606C251.415 134.592 265.878 153.074 283.595 168.685C301.942 184.852 322.665 196.181 347.367 199.057C381.746 203.059 410.426 190.691 435.584 168.265C455.804 150.241 471.492 128.386 487.484 106.791C490.198 103.313 493.021 99.9153 495.605 96.3442C512.077 73.5774 528.604 50.843 550.306 32.5883C573.693 12.9175 599.998 1.75171 631.259 5.61045C687.557 12.5604 725.162 65.7809 712.794 120.985C701.928 169.489 654.148 201.723 605.05 193.934C576.521 189.407 554.13 174.141 535.125 153.608C523.197 140.721 512.74 126.473 501.494 112.943C500.624 111.897 498.74 111.694 497.327 111.1C497.455 112.624 497.026 114.551 497.793 115.611C512.519 135.95 527.991 155.678 547.504 171.751C573.423 193.099 602.544 203.964 636.573 198.27C695.79 188.363 733.07 128.55 715.731 71.2166C698.385 13.8593 634.507 -15.5907 579.577 8.38261C556.14 18.6113 537.774 35.2681 521.788 54.6265C509.785 69.1616 498.734 84.4813 487.259 99.4515C482.702 105.493 478.098 111.499 473.597 117.582C458.947 137.384 443.6 156.561 423.931 171.734C396.822 192.647 366.711 200.363 333.176 191.413C310.568 185.379 292.115 172.194 276.557 155.313C264.125 141.822 253.109 127.03 241.336 112.923C240.473 111.888 238.577 111.712 237.161 111.138C237.27 112.648 236.817 114.567 237.574 115.606Z" />
                                    <path stroke="transparent" stroke-width="1" fill="transparent" d="M482.426 84.1964C468.585 65.2112 454.121 46.7289 436.405 31.1178C418.058 14.9505 397.335 3.62185 372.633 0.745893C338.254 -3.25664 309.574 9.11189 284.416 31.5377C264.196 49.562 248.507 71.4164 232.515 93.0119C229.802 96.4897 226.979 99.8875 224.395 103.459C207.923 126.225 191.396 148.96 169.694 167.215C146.307 186.885 120.001 198.051 88.7411 194.192C32.4437 187.241 -5.16096 134.021 7.20567 78.8168C18.0715 30.3131 65.8515 -1.92151 114.949 5.86834C143.479 10.3946 165.87 25.661 184.874 46.1937C196.803 59.0812 207.26 73.3287 218.506 86.859C219.375 87.9046 221.26 88.1075 222.672 88.7017C222.545 87.178 222.974 85.2506 222.207 84.1907C207.481 63.8523 192.009 44.1243 172.495 28.0513C146.576 6.70256 117.456 -4.16229 83.4263 1.53154C24.21 11.4384 -13.0689 71.2507 4.26877 128.584C21.615 185.943 85.4918 215.394 140.423 191.42C163.86 181.191 182.226 164.535 198.211 145.176C210.214 130.641 221.266 115.322 232.741 100.351C237.298 94.3099 241.902 88.3037 246.403 82.2203C261.053 62.4191 276.399 43.2415 296.068 28.0685C323.178 7.15586 353.289 -0.56067 386.824 8.39004C409.432 14.4238 427.884 27.6085 443.442 44.49C455.875 57.9804 466.891 72.7725 478.663 86.88C479.527 87.9151 481.423 88.0903 482.839 88.6646C482.73 87.1552 483.183 85.2353 482.426 84.1964Z"/>
                                    <defs>
                                        <linearGradient id="paint0_linear" x1="695.89" y1="170.484" x2="283.699" y2="29.6871" gradientUnits="userSpaceOnUse">
                                            <stop offset="0.265" stop-color="#D3D3D3"/>
                                            <stop offset="0.3515" stop-color="#CBD1BB"/>
                                            <stop offset="0.5342" stop-color="#B6CD7D"/>
                                            <stop offset="0.7227" stop-color="#9EC838"/>
                                        </linearGradient>
                                        <linearGradient id="paint1_linear" x1="24.1099" y1="29.3183" x2="436.3" y2="170.116" gradientUnits="userSpaceOnUse">
                                            <stop offset="0.265" stop-color="#D3D3D3"/>
                                            <stop offset="0.3515" stop-color="#CBD1BB"/>
                                            <stop offset="0.5342" stop-color="#B6CD7D"/>
                                            <stop offset="0.7227" stop-color="#9EC838"/>
                                        </linearGradient>
                                    </defs>
                                </svg>
                            </div>

                            <div class="items">
                                <div class="item">
                                    <h4><?php echo  __('Client:','sirinsoftware');?></h4>
                                    <p>
                                        <?php if($show): ?>
                                            <?php if(get_field('portfolio_client_logo')):?>
                                                <img width="110" class="client" src="<?php the_field('portfolio_client_logo');?>"
                                            <?php else:?>
                                                <?php the_field('portfolio_client_title');?>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <?php echo  __('Confidential','sirinsoftware');?>
                                        <?php endif; ?>
                                    </p>
                                </div>
                                <div class="item">
                                    <h4>
                                        <?php echo  __('Business area (industry):','sirinsoftware');?>
                                    </h4>
                                    <p>
                                        <?php the_field('portfolio_business_area');?>
                                    </p>
                                </div>
                                <div class="item">
                                    <h4><?php echo  __('Geography:','sirinsoftware');?></h4>
                                    <p><?php the_field('portfolio_geography');?></p>
                                </div>
                            </div>
                        </div>

                    <?php endif;?>


                    <div class="portfolio-content">
                        <?php //include(locate_template('portfolio/'.$term_list[0]->slug.'.php'));?>
                        <?php include(locate_template('portfolio/'.get_field('portfolio_frontend_style').'.php'));?>
                    </div>
                <?php else: ?>
                    <div class="protected-content">
                        <div class="tags">
                            <?php $tags = get_field('tags'); ?>
                            <?php if($tags) : ?>
                            <ul>
                            <?php foreach ($tags as $tag): ?>

                                <li><?php echo $tag['tag_name'] ?></li>

                            <?php endforeach; ?>
                            </ul>
                            <?php endif; ?>
                        </div>
                        <h3>Get access to this case</h3>
                        <br>
                        <br>
                        <h4>This case is confidential. Send us a request and our manager will show it personal for you</h4>
                        <br>
                        <br>
                        <a href="#popup_form_protected" class="btn btn-green fancybox">Send request</a>
                        <br>
                        <br>
                        <?php if(get_field('hide_protected_code_field') != 'yes'): ?>
                            <?php echo the_content(); ?>
                        <?php endif; ?>
                        <br>
                        <br>
                        <br>
                    </div>
                    
                <?php endif; ?>
            </div>
            <div class="right-column">
                <?php if(!post_password_required()): ?>
                    <div class="portfolio-sidebar">
                        <div class="inner">
                            <div class="menu">
                                <?php $post_url=get_the_permalink() ?>
                                <?php $terms = get_terms( 'portfolio-cat','hide_empty=1');?>
                                <?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ):?>
                                    <?php $term_count = 0; ?>
                                    <?php foreach ( $terms as $term ):?>
                                        <?php $term_count++ ?>
                                        <div class="sector <?php echo $term_count===1 ? 'open' : '' ?>">
                                            <h2><a href="javascript:;"><?php echo $term->name;?></a></h2>
                                            <?php $args = array( 'has_password' => false, 'post_type' => 'portfolio', 'posts_per_page' => 99999,'tax_query' => array(array('taxonomy' => 'portfolio-cat','field' => 'id','terms' => $term->term_id),));
                                            $loop = new WP_Query( $args );
                                            if($loop->have_posts()):?>
                                                <ul style="display: <?php echo $term_count===1 ? 'block' : 'none' ?>">
                                                    <?php $i=1;
                                                    while ( $loop->have_posts() ) : $loop->the_post();?>
                                                        <li <?php if($post_url==get_the_permalink()) echo 'class="selected"';?>>
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
                <?php endif; ?>
            </div>

            <?php if(!post_password_required()): ?>

            <?php
                $terms = get_terms( 'portfolio-cat','hide_empty=1');
            ?>

            <div class="carousel">
                <div class="owl-carousel owl-theme">

                    <?php foreach ( $terms as $term ):?>

                    <?php


                    $args = array(
                        'post_type' => 'portfolio',
                        'posts_per_page' => 99999,
                        'has_password' => false,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'portfolio-cat',
                                'field' => 'id',
                                'terms' => $term->term_id
                            ),
                        )
                    );


                    $item_class = '';
                    $loop = new WP_Query( $args );
                    if($loop->have_posts()):?>
                    <?php $i=1; $pairs = 0;
                        while ( $loop->have_posts() ) : $loop->the_post();?>
                        <?php $pairs++ ?>

                        <div class="carousel-item">
                            <div class="item <?php echo $item_class ?>">
                                <div class="item-content-box">
                                    <div class="item-box">
                                        <?php $thumb=wp_get_attachment_image_src(get_field('archive_featured_image'),'large'); ?>
                                        <?php if(get_field('category_for_green_line') !== ''): ?>
                                            <div class="category"><?php echo get_field('category_for_green_line') ?></div>
                                        <?php endif; ?>
                                        <div class="image">
                                            <a href="<?php the_permalink() ?>">
                                                <div class="image-container">
                                                    <img src="<?php if (!empty($thumb[0])) echo $thumb[0]; ?>" alt="">
                                                </div>
                                            </a>
                                        </div>
                                        <div class="title"><?php echo wp_strip_all_tags(get_the_title());?></div>
                                        <div class="description">
                                            <?php echo get_field('short_description') ?>
                                        </div>
                                        <div class="action">
                                            <a class="btn btn-white" href="<?php the_permalink() ?>">
                                                <?php echo  __('Learn more','sirinsoftware');?>
                                                <i>
                                                    <svg width="23" height="22" viewBox="0 0 23 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0)">
                                                            <path d="M21.305 9.65751L1.89932 0.837164C1.46617 0.640256 0.95422 0.737777 0.62631 1.0797C0.298401 1.42144 0.227154 1.93161 0.449137 2.34832L4.9257 10.7489L0.443986 19.3708C0.225609 19.7909 0.303208 20.3021 0.636783 20.6403C0.851211 20.8579 1.14049 20.9727 1.43441 20.9727C1.59768 20.9727 1.76232 20.9373 1.91631 20.8642L21.3218 11.6475C21.7103 11.4629 21.9562 11.0732 21.9526 10.6471C21.949 10.2211 21.6966 9.83559 21.305 9.65751ZM3.94523 4.18783L16.842 10.0498L7.09848 10.1051L3.94523 4.18783ZM7.12801 11.3267L16.9775 11.2708L3.93768 17.464L7.12801 11.3267Z" fill="#A6C950"/>
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0">
                                                                <rect width="21.9751" height="21.7091" fill="white" transform="translate(0.149414)"/>
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </i>
                                            </a>
                                        </div>
                                        <div class="tags">
                                            <?php $tags = get_field('tags'); ?>

                                            <?php if($tags) : ?>
                                                <ul>
                                                    <?php foreach ($tags as $tag): ?>
                                                        <li><?php echo $tag['tag_name'] ?></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                        if($pairs == 2):
                            $pairs = 0;
                        endif;
                        ?>

                        <?php $i++; endwhile;?>

                        <?php endif;?>
                        <?php wp_reset_postdata(); ?>

                    <?php endforeach;?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php endwhile;?>

<?php get_footer(); ?>
