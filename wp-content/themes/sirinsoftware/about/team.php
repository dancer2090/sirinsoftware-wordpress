<div class="team-page">
    <div class="team-content">
        <div class="container">
            <?php if( have_rows('team_members') ):?>

                <div class="main-members">
                    <div class="member introduction">
                        <div class="member-box">
                            <h3 class="title">
                                Managment team
                            </h3>
                            <div class="image">
                                <img
                                        width="96"
                                        src="<?php echo get_template_directory_uri().'/sirindesign/build/img/width_srcset/team-member_1x.png' ?>"
                                        alt=""
                                        srcset="<?php echo get_template_directory_uri().'/sirindesign/build/img/width_srcset/team-member_1x.png 1x, ' ?><?php echo get_template_directory_uri().'/sirindesign/build/img/width_srcset/team-member_1x.png 2x' ?>"
                                />
                            </div>
                            <h4 class="focus">
                                Focus where it matters and improve performance
                            </h4>
                        </div>
                    </div>

                    <?php if( have_rows('team_main_members') ):?>
                        <?php  while ( have_rows('team_main_members') ) : the_row();?>
                            <div class="member">
                                <div class="member-box">
                                    <div class="image">
                                        <img src="<?php the_sub_field('team_main_member_image'); ?>" alt="">
                                    </div>
                                    <div class="name"><?php the_sub_field('team_main_member_name');?></div>
                                    <div class="role"><?php the_sub_field('team_main_member_position');?></div>
                                    <div class="link">
                                        <a href="<?php the_sub_field('team_main_member_linkedin');?>" target="_blank">
                                            <svg width="27" height="20" viewBox="0 0 27 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect width="27" height="20" rx="2" fill="#0077B5"/>
                                                <path d="M20 11.3774V15.4019H17.428V11.647C17.428 10.7037 17.056 10.0599 16.125 10.0599C15.4143 10.0599 14.9914 10.4938 14.8054 10.9134C14.7375 11.0635 14.72 11.2723 14.72 11.4823V15.4019H12.1472C12.1472 15.4019 12.1818 9.04223 12.1472 8.38332H14.7198V9.37818C14.7146 9.38562 14.7078 9.39364 14.7029 9.40086H14.7198V9.37818C15.0616 8.90063 15.672 8.21843 17.0383 8.21843C18.731 8.21841 20 9.22157 20 11.3774ZM9.45587 5C8.5757 5 8 5.52371 8 6.21241C8 6.88611 8.55905 7.42571 9.42172 7.42571H9.43891C10.3361 7.42571 10.8941 6.88621 10.8941 6.21241C10.8772 5.52371 10.3361 5 9.45587 5ZM8.1528 15.4019H10.7247V8.38332H8.1528V15.4019Z" fill="white"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;?>
                    <?php endif;?>
                </div>

                <div class="members">
                    <?php  while ( have_rows('team_members') ) : the_row();?>
                        <div class="member">
                            <div class="member-box">
                                <div class="image">
                                    <img src="<?php the_sub_field('team_member_image'); ?>" alt="">
                                </div>
                                <div class="name"><?php the_sub_field('team_member_name');?></div>
                                <div class="role"><?php the_sub_field('team_member_position');?></div>
                                <div class="link">
                                    <a href="<?php the_sub_field('team_member_linkedin');?>" target="_blank">
                                        <svg width="27" height="20" viewBox="0 0 27 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="27" height="20" rx="2" fill="#0077B5"/>
                                            <path d="M20 11.3774V15.4019H17.428V11.647C17.428 10.7037 17.056 10.0599 16.125 10.0599C15.4143 10.0599 14.9914 10.4938 14.8054 10.9134C14.7375 11.0635 14.72 11.2723 14.72 11.4823V15.4019H12.1472C12.1472 15.4019 12.1818 9.04223 12.1472 8.38332H14.7198V9.37818C14.7146 9.38562 14.7078 9.39364 14.7029 9.40086H14.7198V9.37818C15.0616 8.90063 15.672 8.21843 17.0383 8.21843C18.731 8.21841 20 9.22157 20 11.3774ZM9.45587 5C8.5757 5 8 5.52371 8 6.21241C8 6.88611 8.55905 7.42571 9.42172 7.42571H9.43891C10.3361 7.42571 10.8941 6.88621 10.8941 6.21241C10.8772 5.52371 10.3361 5 9.45587 5ZM8.1528 15.4019H10.7247V8.38332H8.1528V15.4019Z" fill="white"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;?>
                </div>
            <?php endif;?>




        </div>
        <div id="green-box" class="green-box wow" data-wow-delay="1s">
            <div class="container">

                <div class="items">
                    <div class="left-line">
                        <svg xmlns="http://www.w3.org/2000/svg" >
                            <path stroke="transparent" stroke-width="1" fill="transparent" d="M213.5,97.53c-31.84,0-44.73-23.13-56.1-43.54-9.71-17.42-18.08-32.46-35.9-32.46-10.1,0-22.44,11.89-33.33,22.37C79.1,52.64,71.94,59.53,66.5,59.53c-5.92,0-10.94-2.64-15.79-5.19s-9.13-4.81-14.21-4.81c-5.5,0-10.46,4.14-14.83,7.79-3.83,3.19-7.45,6.21-11.17,6.21C2.44,63.53,0,57.71-.08,57.47l3.15-1.28c.07.16,1.74,3.94,7.43,3.94,2.49,0,5.65-2.63,9-5.43,4.82-4,10.27-8.57,17-8.57,5.92,0,10.94,2.64,15.79,5.2s9.13,4.8,14.21,4.8c4.07,0,11.82-7.46,19.31-14.68C97.16,30.52,110,18.13,121.5,18.13c19.81,0,29.07,16.61,38.87,34.2,11.45,20.55,23.29,41.8,53.13,41.8,23.26,0,37.66-20,49.22-36.07,7.91-11,14.74-20.48,22.69-20.92H762.5v3.4h-477c-6.23.35-12.62,9.23-20,19.52C253.46,76.75,238.51,97.53,213.5,97.53Z"/>
                        </svg>
                    </div>
                    <div class="percent">
                        <div class="number">
                            100%
                        </div>
                        <div class="title">
                            Advanced english
                            <br>
                            level
                        </div>
                    </div>
                    <div class="count">
                        <div class="number">
                            8
                        </div>
                        <div class="title">
                            YEARS AVERAGE EXPERIENCE
                            <br>
                            OF EACH DEVELOPER
                        </div>
                    </div>
                    <div class="right-line">
                        <svg xmlns="http://www.w3.org/2000/svg">
                            <path stroke="transparent" stroke-width="1" fill="transparent"  d="M553.55,104.21c-23.92,0-39.07-22.36-51.27-40.39-7.49-11.06-14-20.62-19.78-20.62H9.5V39.8h473c7.63,0,14.24,9.76,22.6,22.12,11.75,17.35,26.33,38.89,48.48,38.89h.88c19.75-.51,33.8-21.68,47.39-42.16C614.26,40,626,22.3,641.45,21.8c31.63-1,42.06,15.11,42.49,15.8l-2.88,1.8c-.1-.14-10-15.16-39.51-14.2-13.71.44-25,17.39-36.86,35.33-14.07,21.2-28.62,43.12-50.15,43.67Z"/>
                        </svg>
                    </div>
                </div>

            </div>
        </div>

        <div class="developers-team">
            <div class="container">
                <div class="title">
                    <h2><?php echo __('Developers Team', 'sirinsoftware')?></h2>
                </div>
                <div class="items">
                    <?php  while ( have_rows('developers_team') ) : the_row();?>
                        <div class="item <?php echo get_sub_field('width')==='half' ? 'item-half':'' ?>">
                            <div class="item-box">
                                <div class="item-name"><?php the_sub_field('developers_team_name');?></div>

                                <div class="item-image">
                                    <img src="<?php the_sub_field('developers_team_image'); ?>" alt="">
                                </div>
                                <div class="item-description">
                                    <?php the_sub_field('developers_team_count');?>
                                    +
                                        <?php if(get_sub_field('developers_team_description')) {
                                            echo get_sub_field('developers_team_description');
                                        } else {
                                            echo __('developers', 'sirinsoftware');
                                        }
                                        ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;?>
                </div>
            </div>
        </div>





        <div class="slider">
            <div class="container">
                <div class="owl-carousel owl-theme">
                <?php $i=0; $counter=0; $page=0; $slider_count = count(get_field('team_slider')); ?>
                <?php  while ( have_rows('team_slider') ) : the_row();?>
                    <?php $i++; $counter++; ?>
                    <?php if($i===1): ?>
                        <?php $page++; ?>
                        <div class="carousel-item">
                            <div class="items-images">
                    <?php endif;?>
                        <div class="item-image-center">
                            <div class="item-image-box">
                                <a data-fancybox="gallery" href="<?php the_sub_field('team_slide_image');?>">
                                    <img src="<?php the_sub_field('team_slide_image');?>" alt="">
                                </a>
                            </div>
                        </div>
                    <?php if($i===4 || $slider_count === $counter): ?>
                            </div>
                        </div>
                    <?php endif;?>
                        <?php if($i===4) { $i=0; $page++;} ?>
                <?php endwhile;?>
                </div>
            </div>
        </div>
    </div>
</div>

<!--<script src="//code.jquery.com/jquery-3.3.1.min.js"></script>-->
<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />-->
<!--<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>-->