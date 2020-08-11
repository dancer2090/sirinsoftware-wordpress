<?php get_header(); ?>

<?php

$cat_ids = [1];
$categories = get_categories(
    [
        'taxonomy'     => 'category',
        'type'         => 'post',
        'parent'       => 1,
        'orderby'      => 'name',
        'order'        => 'ASC',
        'hide_empty'   => 1,
        'hierarchical' => 1,
        'exclude'      => '',
        'include'      => '',
        'number'       => 0,
        'pad_counts'   => false,
    ]
);

foreach ($categories as $category) {
    array_push($cat_ids, $category->term_id);
}

$cat_id = get_query_var('cat');

$child_cat_id = false;
if($cat_id != 1) {
    $child_cat_id = $cat_id;
    $child_cat = get_category($child_cat_id);
}
?>
<a style="display: none" href="#popup-subscribe-modal" id="click-subscribe" class="btn btn-green icon fancybox">Subscribe <i class="icon-fly"></i></a>
<div class="sirin-main-blog">
    <div class="banner">
        <div id="particles-js-box">
            <div id="particles-js"></div>
        </div>
        <div class="container">
            <h1>
                <?php echo __('Our blog', 'sirinsoftware')?>
                <?php if($child_cat_id !== false) {
                    echo ' : '.$child_cat->cat_name;
                } ?>
            </h1>
        </div>
    </div>

    <div class="container">
        <div class="categories cat-sort">
            <div class="show-categories">
                <button class="btn-more-categories">
                    <i class="category-arrow">

                    </i>
                    <span>Categories</span>
                    <i class="category-arrow">

                    </i>
                </button>
            </div>



            <ul>
                <?php
                $args = array(
                    'taxonomy' => 'category',
                    'hide_empty' => false,
                );
                $terms = get_terms( $args );
                foreach ( $terms as $term ){

                    $selected = '';
                    if($term->term_id === $cat_id) {
                        $selected = 'selected';
                    }

                    if($term->name=='Blog'){
                        echo '<li class="'.$selected.'"><a href="'.site_url().'/blog/">All categories</a></li>';
                    } else if($term->name=='none') {

                    } else {
                        echo '<li class="'.$selected.'"><a href="' . get_term_link($term->term_id) . '">' . $term->name . '</a></li>';
                    }
                }
                ?>
            </ul>
        </div>
    </div>

    <div class="container">
        <div class="items items-wrap ajax-content">
            <?php

            if($child_cat_id !== false) {
                $query_cat_ids = [$child_cat_id];
            } else {
                $query_cat_ids = $cat_ids;
            }
            $args = array(
                'category__in'=> $query_cat_ids,
                'has_password' => false,
                'paged'=> $page = (get_query_var('paged')) ? get_query_var('paged') : 1,
            );
            $the_query = query_posts($args);
            $i = 1;$num_delay = 1;
            ?>
            <?php foreach ($the_query as $post) : setup_postdata($post) ; ?>

                <?php

                    if($num_delay === 4) {
                        $num_delay = 1;
                    }
                    $delay = 0.4*$num_delay;
                    $num_delay++;

                ?>
                <div class="item">
                    <div class="item-box">
                        <div class="item-image">
                            <?php
                            if(get_field('blog_image')){
                                $param=get_field('blog_image');
                            } else {
                                $param=get_post_thumbnail_id(get_the_ID());
                            }
                            $thumb=wp_get_attachment_image_src( $param,[400, 400] );
                            ?>

                            <img src="<?php echo $thumb[0] ?>" alt=""/>
                            <a href="<?php the_permalink() ?>">
                                <div class="bg"></div>
                            </a>
                        </div>
                        <div class="item-type">
                            <?php
                                $terms_list = get_the_category(get_the_ID());
                                $terms = array();
                                $term_name = 'new';
                                $terms = array();
                                $i =  0;
                                foreach ($terms_list as $term){
                                    $i++;
                                    if($term->name!='Blog'){
                                        array_push($terms, $term->name);
                                    }
                                }
                            ?>
                            <?php echo $terms[0]; ?>
                        </div>
                        <div class="item-date"><?php the_date('M d.Y');?></div>
                        <div class="item-text">
                            <div class="item-title">
                                <?php the_title();?>
                            </div>
                            <div class="item-action">
                                <a href="<?php the_permalink() ?>">
                                    <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M17.4139 7.13592L2.21095 0.141154C1.87161 -0.0149995 1.47053 0.0623375 1.21364 0.333488C0.956748 0.604504 0.900931 1.00908 1.07484 1.33954L4.5819 8.00142L1.0708 14.8388C0.89972 15.172 0.960514 15.5774 1.22185 15.8455C1.38983 16.0181 1.61647 16.1092 1.84673 16.1092C1.97464 16.1092 2.10362 16.0811 2.22427 16.0231L17.4271 8.714C17.7315 8.56766 17.9241 8.25858 17.9213 7.92072C17.9184 7.58286 17.7207 7.27714 17.4139 7.13592ZM3.81378 2.79832L13.9175 7.44701L6.28412 7.49086L3.81378 2.79832ZM6.30726 8.45966L14.0236 8.41527L3.80786 13.3266L6.30726 8.45966Z" fill="white"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach;?>
        </div>

<!--        <div class="action">-->
<!--            <button id="byscripts_ajax_posts_loader_trigger" class="btn btn-green">Load articles</button>-->
<!--        </div>-->
    </div>



</div>


<?php get_footer(); ?>