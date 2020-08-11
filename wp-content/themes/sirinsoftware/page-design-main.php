    <?php

    $main_sliders = get_field('main_sliders');

    ?>

    <div class="main-banner">
		<div class="container pointer">
            <?php if($main_sliders): ?>
			<div class="main-slider">
				<div class="owl-carousel owl-theme onmain">
                    <?php foreach ($main_sliders as $main_slider): ?>
					<div class="main-slider-item">
						<div class="header">
							<h1>
                                <?php echo $main_slider['title'] ?>
							</h1>
						</div>

						<div class="description">
							<p>
                                <?php echo $main_slider['description'] ?>
							</p>
						</div>
						<div class="action">
                            <span
                                class="wow swing"
                                data-wow-delay="2s"
                                style="display: table"
                            >
                                <a
                                    href="<?php echo $main_slider['link'] ?>"
                                    class="btn btn-green icon"

                                >
                                    learn more
                                    <i class="icon-fly"></i>
                                </a>
                            </span>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
            <?php endif; ?>
		</div>

        <div class="main-awards">
            <div class="container">
                <div class="title">
                    <div class="symbol"></div>
                    <h2>our awards</h2>
                    <div class="symbol"></div>
                </div>
                <div class="awards-list owl-carousel owl-theme">
                <?php
                    if( have_rows('awards') ):
                        $awards = get_field('awards');
                        foreach ($awards as $award):
                            $award_url = false;
                            $award_image = false;
                            if($award['url']) {
                                $award_url = $award['url'];
                            }

                            if($award['image']) {
                                $award_image = $award['image'];
                            }
                ?>
                        <div class="awards-list-item">

                            <?php if($award_url): ?>
                                <a target="_blank" href="<?php echo $award_url ?>">
                            <?php endif; ?>
                                <?php if($award_image): ?>
                                    <?php
                                       $award_image['url'] = $award_image['sizes']['medium'];
                                    ?>
                                    <img
                                        src="<?php echo $award_image['url'] ?>"
                                        height="80px"
                                        alt="<?php echo $award_image['alt'] ?>"
                                    >
                                <?php endif; ?>
                            <?php if($award_url): ?>
                                </a>
                            <?php endif; ?>
                        </div>
                <?php
                        endforeach;
                    endif;
                ?>
                </div>
            </div>
        </div>
	</div>


    <?php

        $services = get_field('services');
        $services_description = get_field('services_description');

    ?>
    <div class="main-services">
        <div class="container">
            <div class="title"><h2>Services</h2></div>
            <div class="description">
                <?php echo $services_description ?>
            </div>
            <?php if($services): ?>
            <div class="blocks">
                <div class="tabs">
                    <?php $i = 0; ?>
                    <?php foreach ($services as $service): ?>
                        <?php $i++; $active = false; ?>
                        <?php if($i === 1) {
                            $active = true;
                        } ?>
                        <div class="tab <?php echo $active ? 'active' : '' ?>" data-tab="<?php echo $i ?>">
                            <?php echo $service['service_name'] ?>
                        </div>
                    <?php endforeach; ?>
                </div>

                <?php $i = 0; ?>
                <?php foreach ($services as $service): ?>
                    <?php $i++; $active = false; $tab = ''; ?>
                    <?php if($i === 1) {
                        $active = true;
                        $tab = 'rd';
                    } elseif ($i === 2) {
                        $tab = 'it';
                    }

                    $tab = '';
                    ?>
                <div class="mobile-tab <?php echo $active ? 'active':'' ?>">
                    <div class="tab <?php echo $tab ?> <?php echo $active ? 'active':'' ?>" data-tab="<?php echo $i ?>">
                        <span>
                            <?php echo $service['service_name'] ?>
                        </span>
                    </div>
                </div>
                <div class="tab-content <?php echo $active ? 'active vision':'' ?>" data-tab-active="<?php echo $i ?>">
                    <div class="row block-few">
                        <?php if($service['sevice_caregories'] && count($service['sevice_caregories'] > 0)):  ?>
                        <?php $services_num = 0; ?>
                        <?php foreach ($service['sevice_caregories'] as $sevice_caregory): ?>
                        <?php $services_num++; ?>
                        <div class="item-content-box wow bounceInRight delay-<?php echo $services_num*300; ?>">
                            <div class="item-box">
                                <div class="item-image">
                                    <?php if($sevice_caregory['category_motion_type'] === 'firmware') : ?>
                                        <img src="<?php echo get_template_directory_uri() ?>/sirindesign/build/img/fimware-software-hardware-design.svg" alt="">
                                    <?php endif; ?>

                                    <?php if($sevice_caregory['category_motion_type'] === 'architecture') : ?>
                                        <img src="<?php echo get_template_directory_uri() ?>/sirindesign/build/img/system-architecture-design.svg" alt="">
                                    <?php endif; ?>

                                    <?php if($sevice_caregory['category_motion_type'] === 'bugfix') : ?>
                                        <img src="<?php echo get_template_directory_uri() ?>/sirindesign/build/img/maintenance-bugfix-qa.svg" alt="">
                                    <?php endif; ?>

                                    <?php if($sevice_caregory['category_motion_type'] === 'webmobile') : ?>
                                        <img src="<?php echo get_template_directory_uri() ?>/sirindesign/build/img/mobile-web-development.svg" alt="">
                                    <?php endif; ?>

                                    <?php if($sevice_caregory['category_motion_type'] === 'team') : ?>
                                        <img src="<?php echo get_template_directory_uri() ?>/sirindesign/build/img/recruitment-team-scaling.svg" alt="">
                                    <?php endif; ?>

                                    <?php if($sevice_caregory['category_motion_type'] === 'detection') : ?>
                                        <img src="<?php echo get_template_directory_uri() ?>/sirindesign/build/img/detection-of-motivation.svg" alt="">
                                    <?php endif; ?>

                                    <?php if($sevice_caregory['category_motion_type'] === 'managing') : ?>
                                        <img src="<?php echo get_template_directory_uri() ?>/sirindesign/build/img/managing-replacements.svg" alt="">
                                    <?php endif; ?>

                                    <?php if($sevice_caregory['category_motion_type'] === 'staff') : ?>
                                        <img src="<?php echo get_template_directory_uri() ?>/sirindesign/build/img/equiping-staff-with-all-resources.svg" alt="">
                                    <?php endif; ?>
                                </div>
                                <div class="item-title"><?php echo $sevice_caregory['category_name'] ?></div>
                                <div class="item-description">
                                    <?php echo $sevice_caregory['category_description'] ?>
                                </div>
                                <div class="navigation">
                                    <svg width="42" height="40" viewBox="0 0 42 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <rect width="34.0222" height="33.0222" rx="16.5111" transform="matrix(-1 8.74228e-08 8.74228e-08 1 38 2)" fill="#888888"/>
                                        </g>
                                        <path d="M15.1299 15.7815L15.7812 15.1303C15.8679 15.0433 15.9679 15 16.0809 15C16.1937 15 16.2936 15.0433 16.3804 15.1303L21.4999 20.2496L26.6193 15.1304C26.7061 15.0435 26.806 15.0001 26.9189 15.0001C27.0318 15.0001 27.1317 15.0435 27.2185 15.1304L27.8697 15.7817C27.9567 15.8685 28 15.9684 28 16.0813C28 16.1942 27.9565 16.2941 27.8697 16.3809L21.7996 22.4511C21.7128 22.538 21.6128 22.5814 21.4999 22.5814C21.3871 22.5814 21.2873 22.538 21.2005 22.4511L15.1299 16.3809C15.0431 16.294 15 16.1941 15 16.0813C15 15.9684 15.0431 15.8685 15.1299 15.7815Z" fill="white"/>
                                        <defs>
                                            <filter id="filter0_d" x="0.688894" y="0.355556" width="40.6" height="39.6" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                                                <feOffset dy="1.64444"/>
                                                <feGaussianBlur stdDeviation="1.64444"/>
                                                <feColorMatrix type="matrix" values="0 0 0 0 0.329412 0 0 0 0 0.431373 0 0 0 0 0.478431 0 0 0 0.24 0"/>
                                                <feBlend mode="multiply" in2="BackgroundImageFix" result="effect1_dropShadow"/>
                                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
                                            </filter>
                                        </defs>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <div class="action">
                            <a href="<?php echo $service['service_link'] ?>" class="btn btn-green icon">
                                Learn more
                                <i class="icon-fly"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>


            <?php endif; ?>
        </div>
    </div>

<?php

$related_case_studies = get_field('related_case_studies');

?>

    <div class="main-related">
        <div class="container">
            <div class="title"><h2>Related Case Studies</h2></div>
            <?php $related_tabs = [] ?>
            <?php if($related_case_studies && count($related_case_studies) > 0) : ?>
            <div class="mobile-version">
                <div class="items">
                    <?php foreach ($related_case_studies as $related_case_study): ?>
                        <?php array_push($related_tabs, $related_case_study['group_tabname']); ?>
                        <div class="item ">
                        <div class="item-content">
                            <div class="item-box">
                                <div class="item-image">
                                    <div class="image">
                                            <?php if($related_case_study['group_image']) : ?>
                                                <?php 
                                                    $img  = $related_case_study['group_image']; 
                                                    $img['url']  = $img['sizes']['medium'];
                                                ?>
                                                <img width="710" height="315" src="<?php echo $img['url'] ?>" alt="<?php echo $img['alt'] ?>">
                                            <?php else: ?>
                                                <img width="710" height="315" src="<?php echo get_template_directory_uri() ?>/sirindesign/build/img/width_srcset/iot-image_1x.jpg" srcset="<?php echo get_template_directory_uri() ?>/sirindesign/build/img/width_srcset/iot-image_1x.jpg 1x, <?php echo get_template_directory_uri() ?>/sirindesign/build/img/width_srcset/iot-image_2x.jpg 2x" alt="">
                                            <?php endif; ?>
                                    </div>
                                    <div class="item-title">
                                        <?php echo $related_case_study['group_tabname'] ?>
                                    </div>
                                </div>
                                <div class="item-description">
                                    <div class="item-description-text">
                                        <?php echo $related_case_study['group_title'] ?>
                                    </div>
                                    <div class="action">
                                        <a href="<?php echo $related_case_study['group_link'] ?>">
                                            <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M17.4139 7.13592L2.21095 0.141154C1.87161 -0.0149995 1.47053 0.0623375 1.21364 0.333488C0.956748 0.604504 0.900931 1.00908 1.07484 1.33954L4.5819 8.00142L1.0708 14.8388C0.89972 15.172 0.960514 15.5774 1.22185 15.8455C1.38983 16.0181 1.61647 16.1092 1.84673 16.1092C1.97464 16.1092 2.10362 16.0811 2.22427 16.0231L17.4271 8.714C17.7315 8.56766 17.9241 8.25858 17.9213 7.92072C17.9184 7.58286 17.7207 7.27714 17.4139 7.13592ZM3.81378 2.79832L13.9175 7.44701L6.28412 7.49086L3.81378 2.79832ZM6.30726 8.45966L14.0236 8.41527L3.80786 13.3266L6.30726 8.45966Z" fill="white"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="action-bottom">
                    <a href="/case-studies/" class="btn btn-green icon">
                        Show all
                        <i class="icon-fly"></i>
                    </a>
                </div>
            </div>

            <?php endif; ?>

            <div class="blocks">
                <?php if($related_tabs && count($related_tabs) > 0): ?>
                <div class="tabs">
                    <?php $tab_i = 0; ?>
                    <?php foreach ($related_tabs as $related_tab): ?>
                        <?php $tab_i ++; $active = false ?>
                        <?php if($tab_i===1) $active = true;  ?>
                        <div class="tab <?php echo $active ? 'active' : '' ?>" data-tab="<?php echo $tab_i ?>">
                            <?php echo $related_tab ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
                <?php if($related_case_studies && count($related_case_studies) > 0) : ?>
                    <?php $tab_i = 0; ?>
                    <?php foreach ($related_case_studies as $related_case_study): ?>
                        <?php $tab_i ++; $active = false ?>
                        <?php if($tab_i===1) $active = true;  ?>
                        <div class="mobile-tab">
                            <div class="tab" data-tab="<?php echo $tab_i ?>"><?php echo $related_case_study['group_tabname'] ?></div>
                        </div>
                        <div class="tab-content <?php echo $active ? 'active vision' : '' ?> " data-tab-active="<?php echo $tab_i ?>">
                            <div class="image-main">
                                <a href="<?php echo $related_case_study['group_link'] ?>">
                                    <?php if($related_case_study['group_image']) : ?>
                                        <?php 
                                            $img  = $related_case_study['group_image']; 
                                            $img['url'] = $img['sizes']['large'];    
                                        ?>
                                        <img width="710" height="315" src="<?php echo $img['url'] ?>" alt="<?php echo $img['alt'] ?>">
                                    <?php else: ?>
                                        <img width="710" height="315" src="<?php echo get_template_directory_uri() ?>/sirindesign/build/img/width_srcset/iot-image_1x.jpg" srcset="<?php echo get_template_directory_uri() ?>/sirindesign/build/img/width_srcset/iot-image_1x.jpg 1x, <?php echo get_template_directory_uri() ?>/sirindesign/build/img/width_srcset/iot-image_2x.jpg 2x" alt="">
                                    <?php endif; ?>
                                </a>
                            </div>
                            <div class="content">
                                <div class="title">
                                    <h4><?php echo $related_case_study['group_title'] ?></h4>
                                </div>
                                <div class="description">
                                    <?php echo $related_case_study['group_description'] ?>
                                </div>
                                <div class="action">
                                    <a href="<?php echo $related_case_study['group_link'] ?>" class="btn btn-green icon">
                                        learn more
                                        <i class="icon-fly"></i>
                                    </a>
                                </div>
                            </div>

                            <?php
                                $group_cases = $related_case_study['group_cases'];
                            ?>


                            <?php if($group_cases) : ?>
                            <div class="carousel-box">
                                <div class="carusel">
                                    <!-- <div class="owl-carousel owl-theme"> -->
                                        <?php foreach ($group_cases as $group_case) : ?>

                                        <?php $img_id = get_post_meta($group_case->ID, 'post_featured_image'); ?>
                                        <?php $image = wp_get_attachment_image_src($img_id[0], 'medium'); ?>
                                        <div class="carusel-item">
                                            <a href="<?php echo get_permalink($group_case->ID) ?>">
                                                <div class="item-box" style="background-image:url('<?php echo $image[0] ?>')">
                                                    <div class="item-title">
                                                        <?php echo $group_case->post_title ?>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>

                                        <?php endforeach; ?>
                                    <!-- </div> -->
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php $benefits = get_field('benefits_for_customer'); ?>

    <div class="main-why">
        <div class="container">
            <div class="title"><h2>benefits for customer</h2></div>
            <div class="description">
                <?php echo get_field('benefits_for_customer_description'); ?>
            </div>
            <div class="blocks">
                <div class="tab-content active vision">
                    <?php if($benefits): ?>
                    <?php $benefits_num = 0; ?>
                    <?php foreach ($benefits as $benefit): ?>
                        <?php $benefits_num++; ?>
                        <div class="item-content-box wow fadeInRight delay-<?php echo $benefits_num*300 ?>">
                            <div class="item-box">
                                <div class="item-image">
                                    <?php
                                        $benefit_image = $benefit['item_image'];
                                    ?>
                                    <?php if($benefit_image === 'team'): ?>
                                        <svg id="my-svg" width="74" height="74" viewBox="0 0 74 74" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                  style="transition: stroke-dashoffset 2s ease-in-out"
                                                  d="M62.9713 51.3978L64.0395 40.1832C64.5244 40.4291 65.0652 40.5806 65.6451 40.5806C67.619 40.5806 69.2257 38.9739 69.2257 37V22.9915C69.2257 20.8702 67.802 18.9831 65.7634 18.4009L60.8709 17.0034V14.8716C62.332 13.5597 63.258 11.6633 63.258 9.54839V7.16129C63.258 3.21174 60.0463 0 56.0967 0C52.1472 0 48.9354 3.21174 48.9354 7.16129V9.54839C48.9354 11.6622 49.8615 13.5585 51.3225 14.8716V17.0034L46.43 18.4009C44.3914 18.982 42.9677 20.8702 42.9677 22.9915V24.5062L41.7741 24.1647V22.0329C43.2352 20.721 44.1612 18.8246 44.1612 16.7097V14.3226C44.1612 10.373 40.9495 7.16129 36.9999 7.16129C33.0504 7.16129 29.8386 10.373 29.8386 14.3226V16.7097C29.8386 18.8234 30.7647 20.7198 32.2257 22.0329V24.1647L31.0322 24.5062V22.9915C31.0322 20.8702 29.6084 18.9831 27.5699 18.4009L22.6774 17.0034V14.8716C24.1384 13.5597 25.0645 11.6633 25.0645 9.54839V7.16129C25.0645 3.21174 21.8527 0 17.9032 0C13.9536 0 10.7419 3.21174 10.7419 7.16129V9.54839C10.7419 11.6622 11.6679 13.5585 13.129 14.8716V17.0034L8.23647 18.4009C6.19788 18.982 4.77413 20.8702 4.77413 22.9915V37C4.77413 38.9739 6.38088 40.5806 8.35478 40.5806C8.93465 40.5806 9.47548 40.4291 9.96036 40.1832L11.0286 51.3978C3.91219 53.8233 -6.10352e-05 57.1674 -6.10352e-05 60.871C-6.10352e-05 67.2362 12.9681 74 36.9999 74C61.0318 74 73.9999 67.2362 73.9999 60.871C73.9999 57.1674 70.0877 53.8233 62.9713 51.3978ZM52.4077 59.6774L50.2473 37H54.9032V59.6774H52.4077ZM57.2903 37H61.9462L59.7858 59.6774H57.2903V37ZM51.3225 7.16129C51.3225 4.52826 53.4637 2.3871 56.0967 2.3871C58.7297 2.3871 60.8709 4.52826 60.8709 7.16129V9.54839C60.8709 12.1814 58.7297 14.3226 56.0967 14.3226C53.4637 14.3226 51.3225 12.1814 51.3225 9.54839V7.16129ZM56.0967 16.7097C56.9348 16.7097 57.7355 16.557 58.4838 16.2918V17.574C58.1878 18.0309 57.3654 19.0968 56.0967 19.0968C54.8257 19.0968 54.0022 18.0262 53.7096 17.5751V16.2918C54.4579 16.557 55.2587 16.7097 56.0967 16.7097ZM45.3548 22.9915C45.3548 21.9315 46.0675 20.9873 47.0857 20.6959L52.0026 19.2914C52.6962 20.1936 54.0424 21.4839 56.0967 21.4839C58.151 21.4839 59.4973 20.1936 60.1896 19.2914L65.1066 20.6959C66.1259 20.9873 66.8375 21.9315 66.8375 22.9915V37C66.8375 37.6574 66.3025 38.1936 65.6439 38.1936C64.9848 38.1936 64.4504 37.6574 64.4504 37V25.0645H62.0633V34.6129H50.129V25.0645H47.7419V26.0372C47.4068 25.8414 47.0519 25.6718 46.6666 25.5622L45.3548 25.1875V22.9915ZM32.2257 14.3226C32.2257 11.6895 34.3669 9.54839 36.9999 9.54839C39.633 9.54839 41.7741 11.6895 41.7741 14.3226V16.7097C41.7741 19.3427 39.633 21.4839 36.9999 21.4839C34.3669 21.4839 32.2257 19.3427 32.2257 16.7097V14.3226ZM36.9999 23.871C37.838 23.871 38.6387 23.7183 39.387 23.4531V24.7352C39.091 25.1921 38.2687 26.2581 36.9999 26.2581C35.7312 26.2581 34.9089 25.1921 34.6128 24.7352V23.4531C35.3611 23.7183 36.1619 23.871 36.9999 23.871ZM32.907 26.4527C33.5994 27.3549 34.9456 28.6452 36.9999 28.6452C39.0543 28.6452 40.4005 27.3549 41.0929 26.4527L46.0098 27.8572C47.0291 28.1486 47.7407 29.0927 47.7407 30.1528V44.1613C47.7407 44.8187 47.2057 45.3548 46.5472 45.3548C45.888 45.3548 45.3536 44.8187 45.3536 44.1613V32.2258H42.9665V41.7742H31.0322V32.2258H28.6451V44.1613C28.6451 44.8187 28.1101 45.3548 27.4516 45.3548C26.793 45.3548 26.258 44.8187 26.258 44.1613V30.1528C26.258 29.0927 26.9708 28.1486 27.9889 27.8572L32.907 26.4527ZM33.3109 66.8387L31.1505 44.1613H35.8064V66.8387H33.3109ZM38.1935 44.1613H42.8494L40.689 66.8387H38.1935V44.1613ZM14.2141 59.6774L12.0537 37H16.7096V59.6774H14.2141ZM19.0967 37H23.7526L21.5922 59.6774H19.0967V37ZM13.129 7.16129C13.129 4.52826 15.2701 2.3871 17.9032 2.3871C20.5362 2.3871 22.6774 4.52826 22.6774 7.16129V9.54839C22.6774 12.1814 20.5362 14.3226 17.9032 14.3226C15.2701 14.3226 13.129 12.1814 13.129 9.54839V7.16129ZM17.9032 16.7097C18.7412 16.7097 19.542 16.557 20.2903 16.2918V17.574C19.9942 18.0309 19.1719 19.0968 17.9032 19.0968C16.6344 19.0968 15.8121 18.0309 15.5161 17.574V16.2918C16.2644 16.557 17.0651 16.7097 17.9032 16.7097ZM8.35478 38.1936C7.69623 38.1936 7.16123 37.6574 7.16123 37V22.9915C7.16123 21.9315 7.87398 20.9873 8.89211 20.6959L13.8091 19.2914C14.5026 20.1936 15.8488 21.4839 17.9032 21.4839C19.9575 21.4839 21.3037 20.1936 21.9961 19.2914L26.9131 20.6959C27.9324 20.9873 28.6439 21.9315 28.6439 22.9915V25.1875L27.3321 25.5622C26.9469 25.6718 26.5919 25.8414 26.2568 26.0372V25.0645H23.8697V34.6129H11.9354V25.0645H9.54833V37C9.54833 37.6574 9.01333 38.1936 8.35478 38.1936ZM36.9999 71.6129C16.6024 71.6129 2.38704 65.9517 2.38704 60.871C2.38704 58.4157 5.67745 55.8328 11.2611 53.842L12.0438 62.0645H23.7625L25.2043 46.9255C25.8209 47.4278 26.596 47.7419 27.4516 47.7419C28.0314 47.7419 28.5723 47.5904 29.0571 47.3445L31.1406 69.2258H42.8593L44.9427 47.3445C45.4276 47.5904 45.9685 47.7419 46.5483 47.7419C47.4039 47.7419 48.179 47.4278 48.7956 46.9255L50.2374 62.0645H61.9561L62.7387 53.842C68.3224 55.8328 71.6128 58.4157 71.6128 60.871C71.6128 65.9517 57.3975 71.6129 36.9999 71.6129Z"
                                                  fill="#555555"
                                                />
                                        </svg>
                                    <?php endif; ?>

                                    <?php if($benefit_image === 'project'): ?>
                                        <svg width="74" height="74" viewBox="0 0 74 74" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0)">
                                                <path d="M11.5625 50.875C12.201 50.875 12.7187 50.3573 12.7187 49.7188V42.7812C12.7187 40.8687 14.2749 39.3125 16.1875 39.3125H35.8437V49.7188C35.8437 50.3573 36.3614 50.875 37 50.875C37.6385 50.875 38.1562 50.3573 38.1562 49.7188V39.3125H57.8125C59.725 39.3125 61.2812 40.8687 61.2812 42.7812V49.7188C61.2812 50.3573 61.7989 50.875 62.4375 50.875C63.076 50.875 63.5937 50.3573 63.5937 49.7188V42.7812C63.5937 39.5935 61.0002 37 57.8125 37H38.1562V33.5312C38.1562 32.8927 37.6385 32.375 37 32.375C36.3614 32.375 35.8437 32.8927 35.8437 33.5312V37H16.1875C12.9997 37 10.4062 39.5935 10.4062 42.7812V49.7188C10.4062 50.3573 10.9239 50.875 11.5625 50.875Z" fill="#555555"/>
                                                <path d="M20.8125 30.0625H53.1875C53.826 30.0625 54.3437 29.5448 54.3437 28.9062C54.3437 28.2677 53.826 27.75 53.1875 27.75H52.0312V4.625C52.0312 3.98646 51.5135 3.46875 50.875 3.46875H23.125C22.4864 3.46875 21.9687 3.98646 21.9687 4.625V27.75H20.8125C20.1739 27.75 19.6562 28.2677 19.6562 28.9062C19.6562 29.5448 20.1739 30.0625 20.8125 30.0625ZM24.2812 5.78125H49.7187V27.75H24.2812V5.78125Z" fill="#555555"/>
                                                <path d="M32.375 17.3438C31.7364 17.3438 31.2187 17.8615 31.2187 18.5V19.6562C31.2187 20.2948 31.7364 20.8125 32.375 20.8125C33.0135 20.8125 33.5312 20.2948 33.5312 19.6562V18.5C33.5312 17.8615 33.0135 17.3438 32.375 17.3438Z" fill="#555555"/>
                                                <path d="M37 17.3438C36.3614 17.3438 35.8437 17.8615 35.8437 18.5V19.6562C35.8437 20.2948 36.3614 20.8125 37 20.8125C37.6385 20.8125 38.1562 20.2948 38.1562 19.6562V18.5C38.1562 17.8615 37.6385 17.3438 37 17.3438Z" fill="#555555"/>
                                                <path d="M41.625 17.3438C40.9864 17.3438 40.4687 17.8615 40.4687 18.5V19.6562C40.4687 20.2948 40.9864 20.8125 41.625 20.8125C42.2635 20.8125 42.7812 20.2948 42.7812 19.6562V18.5C42.7812 17.8615 42.2635 17.3438 41.625 17.3438Z" fill="#555555"/>
                                                <path d="M46.25 17.3438C45.6114 17.3438 45.0937 17.8615 45.0937 18.5V19.6562C45.0937 20.2948 45.6114 20.8125 46.25 20.8125C46.8885 20.8125 47.4062 20.2948 47.4062 19.6562V18.5C47.4062 17.8615 46.8885 17.3438 46.25 17.3438Z" fill="#555555"/>
                                                <path d="M27.75 17.3438C27.1114 17.3438 26.5937 17.8615 26.5937 18.5V19.6562C26.5937 20.2948 27.1114 20.8125 27.75 20.8125C28.3885 20.8125 28.9062 20.2948 28.9062 19.6562V18.5C28.9062 17.8615 28.3885 17.3438 27.75 17.3438Z" fill="#555555"/>
                                                <path d="M32.375 21.9688C31.7364 21.9688 31.2187 22.4865 31.2187 23.125V24.2812C31.2187 24.9198 31.7364 25.4375 32.375 25.4375C33.0135 25.4375 33.5312 24.9198 33.5312 24.2812V23.125C33.5312 22.4865 33.0135 21.9688 32.375 21.9688Z" fill="#555555"/>
                                                <path d="M37 21.9688C36.3614 21.9688 35.8437 22.4865 35.8437 23.125V24.2812C35.8437 24.9198 36.3614 25.4375 37 25.4375C37.6385 25.4375 38.1562 24.9198 38.1562 24.2812V23.125C38.1562 22.4865 37.6385 21.9688 37 21.9688Z" fill="#555555"/>
                                                <path d="M41.625 21.9688C40.9864 21.9688 40.4687 22.4865 40.4687 23.125V24.2812C40.4687 24.9198 40.9864 25.4375 41.625 25.4375C42.2635 25.4375 42.7812 24.9198 42.7812 24.2812V23.125C42.7812 22.4865 42.2635 21.9688 41.625 21.9688Z" fill="#555555"/>
                                                <path d="M46.25 21.9688C45.6114 21.9688 45.0937 22.4865 45.0937 23.125V24.2812C45.0937 24.9198 45.6114 25.4375 46.25 25.4375C46.8885 25.4375 47.4062 24.9198 47.4062 24.2812V23.125C47.4062 22.4865 46.8885 21.9688 46.25 21.9688Z" fill="#555555"/>
                                                <path d="M27.75 21.9688C27.1114 21.9688 26.5937 22.4865 26.5937 23.125V24.2812C26.5937 24.9198 27.1114 25.4375 27.75 25.4375C28.3885 25.4375 28.9062 24.9198 28.9062 24.2812V23.125C28.9062 22.4865 28.3885 21.9688 27.75 21.9688Z" fill="#555555"/>
                                                <path d="M47.4062 68.2188V54.3438C47.4062 53.7052 46.8885 53.1875 46.25 53.1875H27.75C27.1114 53.1875 26.5937 53.7052 26.5937 54.3438V68.2188C25.9552 68.2188 25.4375 68.7365 25.4375 69.375C25.4375 70.0135 25.9552 70.5312 26.5937 70.5312H47.4062C48.0447 70.5312 48.5625 70.0135 48.5625 69.375C48.5625 68.7365 48.0447 68.2188 47.4062 68.2188ZM28.9062 55.5H45.0937V68.2188H28.9062V55.5Z" fill="#555555"/>
                                                <path d="M32.375 57.8125C31.7364 57.8125 31.2187 58.3302 31.2187 58.9688V60.125C31.2187 60.7635 31.7364 61.2812 32.375 61.2812C33.0135 61.2812 33.5312 60.7635 33.5312 60.125V58.9688C33.5312 58.3302 33.0135 57.8125 32.375 57.8125Z" fill="#555555"/>
                                                <path d="M37 57.8125C36.3614 57.8125 35.8437 58.3302 35.8437 58.9688V60.125C35.8437 60.7635 36.3614 61.2812 37 61.2812C37.6385 61.2812 38.1562 60.7635 38.1562 60.125V58.9688C38.1562 58.3302 37.6385 57.8125 37 57.8125Z" fill="#555555"/>
                                                <path d="M41.625 57.8125C40.9864 57.8125 40.4687 58.3302 40.4687 58.9688V60.125C40.4687 60.7635 40.9864 61.2812 41.625 61.2812C42.2635 61.2812 42.7812 60.7635 42.7812 60.125V58.9688C42.7812 58.3302 42.2635 57.8125 41.625 57.8125Z" fill="#555555"/>
                                                <path d="M32.375 62.4375C31.7364 62.4375 31.2187 62.9552 31.2187 63.5938V64.75C31.2187 65.3885 31.7364 65.9062 32.375 65.9062C33.0135 65.9062 33.5312 65.3885 33.5312 64.75V63.5938C33.5312 62.9552 33.0135 62.4375 32.375 62.4375Z" fill="#555555"/>
                                                <path d="M37 62.4375C36.3614 62.4375 35.8437 62.9552 35.8437 63.5938V64.75C35.8437 65.3885 36.3614 65.9062 37 65.9062C37.6385 65.9062 38.1562 65.3885 38.1562 64.75V63.5938C38.1562 62.9552 37.6385 62.4375 37 62.4375Z" fill="#555555"/>
                                                <path d="M41.625 62.4375C40.9864 62.4375 40.4687 62.9552 40.4687 63.5938V64.75C40.4687 65.3885 40.9864 65.9062 41.625 65.9062C42.2635 65.9062 42.7812 65.3885 42.7812 64.75V63.5938C42.7812 62.9552 42.2635 62.4375 41.625 62.4375Z" fill="#555555"/>
                                                <path d="M32.375 12.7188C31.7364 12.7188 31.2187 13.2365 31.2187 13.875V15.0312C31.2187 15.6698 31.7364 16.1875 32.375 16.1875C33.0135 16.1875 33.5312 15.6698 33.5312 15.0312V13.875C33.5312 13.2365 33.0135 12.7188 32.375 12.7188Z" fill="#555555"/>
                                                <path d="M37 12.7188C36.3614 12.7188 35.8437 13.2365 35.8437 13.875V15.0312C35.8437 15.6698 36.3614 16.1875 37 16.1875C37.6385 16.1875 38.1562 15.6698 38.1562 15.0312V13.875C38.1562 13.2365 37.6385 12.7188 37 12.7188Z" fill="#555555"/>
                                                <path d="M41.625 12.7188C40.9864 12.7188 40.4687 13.2365 40.4687 13.875V15.0312C40.4687 15.6698 40.9864 16.1875 41.625 16.1875C42.2635 16.1875 42.7812 15.6698 42.7812 15.0312V13.875C42.7812 13.2365 42.2635 12.7188 41.625 12.7188Z" fill="#555555"/>
                                                <path d="M46.25 12.7188C45.6114 12.7188 45.0937 13.2365 45.0937 13.875V15.0312C45.0937 15.6698 45.6114 16.1875 46.25 16.1875C46.8885 16.1875 47.4062 15.6698 47.4062 15.0312V13.875C47.4062 13.2365 46.8885 12.7188 46.25 12.7188Z" fill="#555555"/>
                                                <path d="M27.75 12.7188C27.1114 12.7188 26.5937 13.2365 26.5937 13.875V15.0312C26.5937 15.6698 27.1114 16.1875 27.75 16.1875C28.3885 16.1875 28.9062 15.6698 28.9062 15.0312V13.875C28.9062 13.2365 28.3885 12.7188 27.75 12.7188Z" fill="#555555"/>
                                                <path d="M32.375 8.09375C31.7364 8.09375 31.2187 8.61146 31.2187 9.25V10.4062C31.2187 11.0448 31.7364 11.5625 32.375 11.5625C33.0135 11.5625 33.5312 11.0448 33.5312 10.4062V9.25C33.5312 8.61146 33.0135 8.09375 32.375 8.09375Z" fill="#555555"/>
                                                <path d="M37 8.09375C36.3614 8.09375 35.8437 8.61146 35.8437 9.25V10.4062C35.8437 11.0448 36.3614 11.5625 37 11.5625C37.6385 11.5625 38.1562 11.0448 38.1562 10.4062V9.25C38.1562 8.61146 37.6385 8.09375 37 8.09375Z" fill="#555555"/>
                                                <path d="M41.625 8.09375C40.9864 8.09375 40.4687 8.61146 40.4687 9.25V10.4062C40.4687 11.0448 40.9864 11.5625 41.625 11.5625C42.2635 11.5625 42.7812 11.0448 42.7812 10.4062V9.25C42.7812 8.61146 42.2635 8.09375 41.625 8.09375Z" fill="#555555"/>
                                                <path d="M46.25 8.09375C45.6114 8.09375 45.0937 8.61146 45.0937 9.25V10.4062C45.0937 11.0448 45.6114 11.5625 46.25 11.5625C46.8885 11.5625 47.4062 11.0448 47.4062 10.4062V9.25C47.4062 8.61146 46.8885 8.09375 46.25 8.09375Z" fill="#555555"/>
                                                <path d="M27.75 8.09375C27.1114 8.09375 26.5937 8.61146 26.5937 9.25V10.4062C26.5937 11.0448 27.1114 11.5625 27.75 11.5625C28.3885 11.5625 28.9062 11.0448 28.9062 10.4062V9.25C28.9062 8.61146 28.3885 8.09375 27.75 8.09375Z" fill="#555555"/>
                                                <path d="M21.9687 68.2188V54.3438C21.9687 53.7052 21.451 53.1875 20.8125 53.1875H2.31245C1.67392 53.1875 1.1562 53.7052 1.1562 54.3438V68.2188C0.517665 68.2188 -4.57764e-05 68.7365 -4.57764e-05 69.375C-4.57764e-05 70.0135 0.517665 70.5312 1.1562 70.5312H21.9687C22.6072 70.5312 23.125 70.0135 23.125 69.375C23.125 68.7365 22.6072 68.2188 21.9687 68.2188ZM3.4687 55.5H19.6562V68.2188H3.4687V55.5Z" fill="#555555"/>
                                                <path d="M6.93745 57.8125C6.29892 57.8125 5.7812 58.3302 5.7812 58.9688V60.125C5.7812 60.7635 6.29892 61.2812 6.93745 61.2812C7.57599 61.2812 8.0937 60.7635 8.0937 60.125V58.9688C8.0937 58.3302 7.57599 57.8125 6.93745 57.8125Z" fill="#555555"/>
                                                <path d="M11.5625 57.8125C10.9239 57.8125 10.4062 58.3302 10.4062 58.9688V60.125C10.4062 60.7635 10.9239 61.2812 11.5625 61.2812C12.201 61.2812 12.7187 60.7635 12.7187 60.125V58.9688C12.7187 58.3302 12.201 57.8125 11.5625 57.8125Z" fill="#555555"/>
                                                <path d="M16.1875 57.8125C15.5489 57.8125 15.0312 58.3302 15.0312 58.9688V60.125C15.0312 60.7635 15.5489 61.2812 16.1875 61.2812C16.826 61.2812 17.3437 60.7635 17.3437 60.125V58.9688C17.3437 58.3302 16.826 57.8125 16.1875 57.8125Z" fill="#555555"/>
                                                <path d="M6.93745 62.4375C6.29892 62.4375 5.7812 62.9552 5.7812 63.5938V64.75C5.7812 65.3885 6.29892 65.9062 6.93745 65.9062C7.57599 65.9062 8.0937 65.3885 8.0937 64.75V63.5938C8.0937 62.9552 7.57599 62.4375 6.93745 62.4375Z" fill="#555555"/>
                                                <path d="M11.5625 62.4375C10.9239 62.4375 10.4062 62.9552 10.4062 63.5938V64.75C10.4062 65.3885 10.9239 65.9062 11.5625 65.9062C12.201 65.9062 12.7187 65.3885 12.7187 64.75V63.5938C12.7187 62.9552 12.201 62.4375 11.5625 62.4375Z" fill="#555555"/>
                                                <path d="M16.1875 62.4375C15.5489 62.4375 15.0312 62.9552 15.0312 63.5938V64.75C15.0312 65.3885 15.5489 65.9062 16.1875 65.9062C16.826 65.9062 17.3437 65.3885 17.3437 64.75V63.5938C17.3437 62.9552 16.826 62.4375 16.1875 62.4375Z" fill="#555555"/>
                                                <path d="M72.8437 68.2188V54.3438C72.8437 53.7052 72.326 53.1875 71.6875 53.1875H53.1875C52.5489 53.1875 52.0312 53.7052 52.0312 54.3438V68.2188C51.3927 68.2188 50.875 68.7365 50.875 69.375C50.875 70.0135 51.3927 70.5312 52.0312 70.5312H72.8437C73.4822 70.5312 74 70.0135 74 69.375C74 68.7365 73.4822 68.2188 72.8437 68.2188ZM54.3437 55.5H70.5312V68.2188H54.3437V55.5Z" fill="#555555"/>
                                                <path d="M57.8125 57.8125C57.1739 57.8125 56.6562 58.3302 56.6562 58.9688V60.125C56.6562 60.7635 57.1739 61.2812 57.8125 61.2812C58.451 61.2812 58.9687 60.7635 58.9687 60.125V58.9688C58.9687 58.3302 58.451 57.8125 57.8125 57.8125Z" fill="#555555"/>
                                                <path d="M62.4375 57.8125C61.7989 57.8125 61.2812 58.3302 61.2812 58.9688V60.125C61.2812 60.7635 61.7989 61.2812 62.4375 61.2812C63.076 61.2812 63.5937 60.7635 63.5937 60.125V58.9688C63.5937 58.3302 63.076 57.8125 62.4375 57.8125Z" fill="#555555"/>
                                                <path d="M67.0625 57.8125C66.4239 57.8125 65.9062 58.3302 65.9062 58.9688V60.125C65.9062 60.7635 66.4239 61.2812 67.0625 61.2812C67.701 61.2812 68.2187 60.7635 68.2187 60.125V58.9688C68.2187 58.3302 67.701 57.8125 67.0625 57.8125Z" fill="#555555"/>
                                                <path d="M57.8125 62.4375C57.1739 62.4375 56.6562 62.9552 56.6562 63.5938V64.75C56.6562 65.3885 57.1739 65.9062 57.8125 65.9062C58.451 65.9062 58.9687 65.3885 58.9687 64.75V63.5938C58.9687 62.9552 58.451 62.4375 57.8125 62.4375Z" fill="#555555"/>
                                                <path d="M62.4375 62.4375C61.7989 62.4375 61.2812 62.9552 61.2812 63.5938V64.75C61.2812 65.3885 61.7989 65.9062 62.4375 65.9062C63.076 65.9062 63.5937 65.3885 63.5937 64.75V63.5938C63.5937 62.9552 63.076 62.4375 62.4375 62.4375Z" fill="#555555"/>
                                                <path d="M67.0625 62.4375C66.4239 62.4375 65.9062 62.9552 65.9062 63.5938V64.75C65.9062 65.3885 66.4239 65.9062 67.0625 65.9062C67.701 65.9062 68.2187 65.3885 68.2187 64.75V63.5938C68.2187 62.9552 67.701 62.4375 67.0625 62.4375Z" fill="#555555"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0">
                                                    <rect width="74" height="74" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    <?php endif; ?>

                                    <?php if($benefit_image === 'confidentiality'): ?>
                                        <svg width="75" height="74" viewBox="0 0 75 74" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M37.4757 50.129C34.1851 50.129 31.508 52.8062 31.508 56.0968C31.508 57.9623 32.4079 59.7264 33.8951 60.8459V69.2258H41.0564V60.8459C42.5435 59.7252 43.4435 57.9623 43.4435 56.0968C43.4435 52.8062 40.7664 50.129 37.4757 50.129ZM39.2625 59.1773L38.6693 59.5223V66.8387H36.2822V59.5223L35.689 59.1773C34.5659 58.5233 33.8951 57.3715 33.8951 56.0968C33.8951 54.1226 35.5016 52.5161 37.4757 52.5161C39.4499 52.5161 41.0564 54.1226 41.0564 56.0968C41.0564 57.3715 40.3856 58.5233 39.2625 59.1773Z" fill="#555555"/>
                                            <path d="M15.9918 15.5162C12.7012 15.5162 10.024 18.1934 10.024 21.484C10.024 24.7746 12.7012 27.4517 15.9918 27.4517C19.2824 27.4517 21.9595 24.7746 21.9595 21.484C21.9595 18.1934 19.2824 15.5162 15.9918 15.5162ZM15.9918 25.0646C14.0177 25.0646 12.4111 23.4581 12.4111 21.484C12.4111 19.5098 14.0177 17.9033 15.9918 17.9033C17.9659 17.9033 19.5724 19.5098 19.5724 21.484C19.5724 23.4581 17.9659 25.0646 15.9918 25.0646Z" fill="#555555"/>
                                            <path d="M58.9596 27.4517C62.2502 27.4517 64.9274 24.7746 64.9274 21.484C64.9274 18.1934 62.2502 15.5162 58.9596 15.5162C55.669 15.5162 52.9919 18.1934 52.9919 21.484C52.9919 24.7746 55.669 27.4517 58.9596 27.4517ZM58.9596 17.9033C60.9338 17.9033 62.5403 19.5098 62.5403 21.484C62.5403 23.4581 60.9338 25.0646 58.9596 25.0646C56.9855 25.0646 55.379 23.4581 55.379 21.484C55.379 19.5098 56.9855 17.9033 58.9596 17.9033Z" fill="#555555"/>
                                            <path d="M37.4757 15.5162C34.1851 15.5162 31.508 18.1934 31.508 21.484C31.508 24.7746 34.1851 27.4517 37.4757 27.4517C40.7664 27.4517 43.4435 24.7746 43.4435 21.484C43.4435 18.1934 40.7664 15.5162 37.4757 15.5162ZM37.4757 25.0646C35.5016 25.0646 33.8951 23.4581 33.8951 21.484C33.8951 19.5098 35.5016 17.9033 37.4757 17.9033C39.4499 17.9033 41.0564 19.5098 41.0564 21.484C41.0564 23.4581 39.4499 25.0646 37.4757 25.0646Z" fill="#555555"/>
                                            <path d="M52.9918 42.9677C64.8378 42.9677 74.4757 33.3298 74.4757 21.4839C74.4757 9.6379 64.8378 0 52.9918 0H21.9596C10.1136 0 0.475708 9.6379 0.475708 21.4839C0.475708 26.387 2.16816 31.16 5.2499 34.9745V50.03C5.2499 52.059 6.90177 53.7097 8.93081 53.7097C9.95964 53.7097 10.9479 53.274 11.6425 52.5161L20.4462 42.9116C20.963 42.9486 21.4702 42.9677 21.9596 42.9677H24.3467V45.8609C22.2425 46.7847 20.766 48.8818 20.766 51.3226V68.0323C20.766 71.3229 23.4432 74 26.7338 74H48.2176C51.5083 74 54.1854 71.3229 54.1854 68.0323V51.3226C54.1854 48.8818 52.709 46.7847 50.6047 45.8609V42.9677H52.9918ZM51.7983 51.3226V68.0323C51.7983 70.0064 50.1918 71.6129 48.2176 71.6129H26.7338C24.7596 71.6129 23.1531 70.0064 23.1531 68.0323V51.3226C23.1531 49.3485 24.7596 47.7419 26.7338 47.7419H48.2176C50.1918 47.7419 51.7983 49.3485 51.7983 51.3226ZM37.4757 33.4194C32.8698 33.4194 29.1209 37.1671 29.1209 41.7742V45.3548H26.7338V41.7742C26.7338 35.8518 31.5521 31.0323 37.4757 31.0323C43.3993 31.0323 48.2176 35.8518 48.2176 41.7742V45.3548H45.8305V41.7742C45.8305 37.1671 42.0816 33.4194 37.4757 33.4194ZM43.4435 42.9677V45.3548H31.508V42.9677H43.4435ZM31.6285 40.5806C32.1835 37.8605 34.5933 35.8065 37.4757 35.8065C40.3581 35.8065 42.7679 37.8605 43.3229 40.5806H31.6285ZM50.5439 40.5806C49.9387 33.8992 44.3124 28.6452 37.4757 28.6452C30.6391 28.6452 25.0127 33.8992 24.4075 40.5806H21.9596C21.3509 40.5806 20.7362 40.5496 20.0785 40.4852L19.4865 40.4267L9.88326 50.9025C9.63977 51.1698 9.29245 51.3226 8.93081 51.3226C8.21706 51.3226 7.637 50.7425 7.637 50.03V34.1092L7.35651 33.7762C4.45858 30.3376 2.8628 25.9716 2.8628 21.4839C2.8628 10.9544 11.4301 2.3871 21.9596 2.3871H52.9918C63.5213 2.3871 72.0886 10.9544 72.0886 21.4839C72.0886 32.0134 63.5213 40.5806 52.9918 40.5806H50.5439Z" fill="#555555"/>
                                        </svg>
                                    <?php endif; ?>
                                </div>
                                <div class="item-title">
                                    <?php echo $benefit['item_name'] ?>
                                </div>
                                <div class="item-description">
                                    <?php echo $benefit['item_description'] ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>


	<div class="main-expertize ">
		<div class="container">
			<div class="title"><h2>Expertise</h2></div>
			<div class="description">
                <?php echo get_field('expertise_description'); ?>
			</div>
			<div class="application-dev">
				<div class="carusel">
					<div class="owl-carousel owl-theme">

                        <?php
                            if( have_rows('home_expertise') ):
                                $my_fields = get_field_object('home_expertise');
                                $count_expertize = (count($my_fields));
                            endif;
                        ?>
                        <?php while (have_rows('home_expertise') ) : the_row();?>

                                <?php if( have_rows('home_expertise_items')):?>

                                        <?php $i=1;?>
                                        <?php  while ( have_rows('home_expertise_items') ) : the_row();?>


                                        <?php $thumb=wp_get_attachment_image_src(get_sub_field('home_expertise_item_image'),'thumbnail');?>

                                        <?php if($i % 2 == 0): ?>
                                            <div class="element-bottom">
                                                <div class="image">
                                                    <img src="<?php if(!empty($thumb[0])) echo $thumb[0];?>" width="100" height="100" alt="<?php the_sub_field('home_expertise_item_title');?>">
                                                </div>
                                                <div class="langs">
                                                    <?php the_sub_field('home_expertise_item_title');?>
                                                </div>
                                            </div>
                                            </div>
                                            </div>
                                        <?php else: ?>
                                            <div class="carusel-item" id="<?php echo strtolower(str_replace(' ','_',get_sub_field('home_expertise_title'))); ?>" data-group-title="<?php the_sub_field('home_expertise_title');?>">
                                                <div class="box">
                                                    <div class="element-top">
                                                        <div class="image">
                                                            <img src="<?php if(!empty($thumb[0])) echo $thumb[0];?>" width="100" height="100" alt="<?php the_sub_field('home_expertise_item_title');?>">
                                                        </div>
                                                        <div class="langs">
                                                            <?php the_sub_field('home_expertise_item_title');?>
                                                        </div>
                                                    </div>
                                        <?php endif; ?>
                                        <?php if($count_expertize === $i && $i % 2 != 0): ?>
                                                </div>
                                            </div>
                                        <?php endif;?>
                                        <?php $i++;
                                        endwhile;?>
                                <?php endif;?>
                        <?php endwhile;?>
					    </div>
					</div>

					<div class="action wow bounceInRight" data-wow-delay="1s">
						<a href="/about/expertise/" class="btn btn-green icon">
							learn more
							<i class="icon-fly"></i>
						</a>
					</div>
				</div>

			</div>
		</div>
	</div>

    <?php $our_clients = get_field('our_clients') ?>

	<div class="main-clients">
		<div class="container">
			<div class="title"><h2>our Clients</h2></div>
			<div class="description ">
                <?php echo get_field('our_client_description'); ?>
			</div>
			<div class="carousel">
				<div class="owl-carousel owl-theme ongrey">
                    <?php if($our_clients): ?>
                    <?php foreach ($our_clients as $our_client): ?>
					<div class="carusel-item">
						<div class="client-box">
							<a <?php echo $our_client['url'] !='' ? 'href="'.$our_client['url'].'"':'' ?>>
								<div class="client-image">
									<img
										width="174"
										height="82"
										src="<?php echo $our_client['image']['url'] ?>"
										alt="<?php echo $our_client['image']['alt'] ?>"
									/>
								</div>
								<div class="client-image-hover">
									<img
										width="174"
										height="82"
                                        src="<?php echo $our_client['image_hover']['url'] ?>"
                                        alt="<?php echo $our_client['image_hover']['alt'] ?>"
									/>
								</div>
							</a>
						</div>
					</div>
					<?php endforeach; ?>
                    <?php endif; ?>
				</div>
			</div>
		</div>
	</div>


    <?php
    $args = array(
        'numberposts' => 9,
        'offset' => 0,
        'orderby' => 'post_date',
        'order' => 'DESC',
        'post_type' => 'post',
        'post_status' => 'publish',
        'suppress_filters' => true
    );

    $recent_posts = wp_get_recent_posts( $args, ARRAY_A );

    ?>

    <div class="main-latest-posts">
        <div class="container">
            <div class="title"><h2>Latest articles</h2></div>

            <?php if($recent_posts) : ?>
                <div class="mobile-version">
                    <div class="items">
                <?php $mobile_count = 0; ?>
                <?php foreach ($recent_posts as $recent_post): ?>
                    <?php
                        $mobile_count++;
                        $thumbnail = get_the_post_thumbnail_url($recent_post['ID'], 'medium');
                        if(!$thumbnail) {
                            $thumbnail = get_template_directory_uri().'/sirindesign/build/img/case_3_1.jpg';
                        }
                    ?>
                            <div class="item">
                                <div class="item-box">
                                    <div class="item-image">
                                        <img width="300px" height="170px" src="<?php echo $thumbnail ?>" >
                                    </div>
                                    <div class="item-text-box">
                                        <div class="item-title">
                                            <a href="<?php echo get_permalink($recent_post['ID']) ?>">
                                                <?php echo $recent_post['post_title'] ?>
                                            </a>
                                        </div>
                                        <div class="action">
                                            <a href="<?php echo get_permalink($recent_post['ID']) ?>">
                                                <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M17.4139 7.13592L2.21095 0.141154C1.87161 -0.0149995 1.47053 0.0623375 1.21364 0.333488C0.956748 0.604504 0.900931 1.00908 1.07484 1.33954L4.5819 8.00142L1.0708 14.8388C0.89972 15.172 0.960514 15.5774 1.22185 15.8455C1.38983 16.0181 1.61647 16.1092 1.84673 16.1092C1.97464 16.1092 2.10362 16.0811 2.22427 16.0231L17.4271 8.714C17.7315 8.56766 17.9241 8.25858 17.9213 7.92072C17.9184 7.58286 17.7207 7.27714 17.4139 7.13592ZM3.81378 2.79832L13.9175 7.44701L6.28412 7.49086L3.81378 2.79832ZM6.30726 8.45966L14.0236 8.41527L3.80786 13.3266L6.30726 8.45966Z" fill="white"/>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    <?php
                        if($mobile_count === 4) {
                            break;
                        }
                    ?>
                <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
            <div class="carousel">
                <div class="owl-carousel owl-theme">
                    <?php if($recent_posts) : ?>
                        <?php foreach ($recent_posts as $recent_post): ?>
                            <?php
                                $thumbnail = get_the_post_thumbnail_url($recent_post['ID'], 'medium');
                                if(!$thumbnail) {
                                    $thumbnail = get_template_directory_uri().'/sirindesign/build/img/case_3_1.jpg';
                                }
                            ?>
                            <div class="carousel-item">
                                <a href="<?php echo get_permalink($recent_post['ID']) ?>">
                                    <div class="item-box">
                                        <div class="item-image">
                                            <img width="300px" height="170px" src="<?php echo $thumbnail ?>" >
                                        </div>
                                        <div class="item-text-box">
                                            <div class="item-title">
                                                <a href="<?php echo get_permalink($recent_post['ID']) ?>">
                                                    <?php echo $recent_post['post_title'] ?>
                                                </a>
                                            </div>
                                            <div class="action">
                                                <a href="<?php echo get_permalink($recent_post['ID']) ?>">
                                                    <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M17.4139 7.13592L2.21095 0.141154C1.87161 -0.0149995 1.47053 0.0623375 1.21364 0.333488C0.956748 0.604504 0.900931 1.00908 1.07484 1.33954L4.5819 8.00142L1.0708 14.8388C0.89972 15.172 0.960514 15.5774 1.22185 15.8455C1.38983 16.0181 1.61647 16.1092 1.84673 16.1092C1.97464 16.1092 2.10362 16.0811 2.22427 16.0231L17.4271 8.714C17.7315 8.56766 17.9241 8.25858 17.9213 7.92072C17.9184 7.58286 17.7207 7.27714 17.4139 7.13592ZM3.81378 2.79832L13.9175 7.44701L6.28412 7.49086L3.81378 2.79832ZM6.30726 8.45966L14.0236 8.41527L3.80786 13.3266L6.30726 8.45966Z" fill="white"/>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="action wow bounceInRight" data-wow-delay="1s">
                <a href="/blog/" class="btn btn-green icon">
                    learn more
                    <i class="icon-fly"></i>
                </a>
            </div>

        </div>

    </div>




<?php
    $testmonials = get_field('testimonials');
?>



	<div class="main-testimonials">
		<div class="container">
			<div class="title"><h2>Why companies trust Sirin Software?</h2></div>

			<div class="carousel">
				<div class="owl-carousel owl-theme">
                    <?php if($testmonials): ?>

                    <?php
                        $slide = 0;
                        $testmonial_count = 0;
                        $testmonial_counts = count($testmonials);
                    ?>
                    <?php foreach ($testmonials as $testmonial): ?>

                        <?php $testmonial++ ?>
                        <?php $slide++ ?>

                        <?php if($slide === 1): ?>
                            <div class="carousel-item">
                                <div class="items">
                        <?php endif; ?>
                        <?php if($slide === 2): ?>
                                <div class="items">
                        <?php endif; ?>
                                    <div class="item">
                                        <div class="logo">
                                            <img
                                                    width="174"
                                                    height="82"
                                                    src="<?php echo $testmonial['image']['sizes']['medium'] ?>"
                                                    alt="<?php echo $testmonial['image']['alt'] ?>"
                                            />
                                        </div>
                                        <div class="text">
                                            <?php echo $testmonial['description'] ?>
                                        </div>
                                        <div class="link">
                                            <a <?php echo $our_client['linkedin_url'] !='' ? 'href="'.$our_client['linkedin_url'].'"':'' ?>>
                                                <i class="icon linkendin"></i>
                                                <?php echo $testmonial['linkedin_name'] ?>
                                            </a>
                                        </div>
                                    </div>

                            <?php if($testmonial_counts === $testmonial_count): ?>
                                    <?php if($slide === 1): ?>
                                        <div class="items"></div>
                                        </div>
                                        </div>
                                    <?php elseif ($slide === 2): ?>
                                        </div>
                                        </div>
                                    <?php endif; ?>
                            <?php elseif($slide === 1): ?>
                                </div>
                            <?php elseif($slide === 2): ?>
                                </div>
                                </div>
                                <?php $slide = 0; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>

                    <?php endif; ?>
				</div>
			</div>
			<div class="action wow bounceInRight" data-wow-delay="1s">
				<a href="/about/testimonials/#tabs" class="btn btn-green icon">
					learn more
					<i class="icon-fly"></i>
				</a>
			</div>
		</div>
	</div>
