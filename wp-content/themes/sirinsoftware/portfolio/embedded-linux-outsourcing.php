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

				<?php if( have_rows('embedded_linux_technology_list') ):?>


                    <div class="technology-set box-element">

                        <div class="header-image">
                            <img src="<?php echo get_stylesheet_directory_uri()?>/sirindesign/build/img/case-technology-set.svg" alt="">
                        </div>
                        <div class="content-list">
                            <ul>
                                <?php while ( have_rows('embedded_linux_technology_list') ) : the_row();?>
                                    <li>
                                        <?php the_sub_field('embedded_linux_technology_list_item');?>
                                    </li>
                                <?php endwhile;?>
                            </ul>
                        </div>
                    </div>
                <?php endif;?>
				<?php if(get_field('embedded_linux_platform') || get_field('embedded_linux_supported') || get_field('embedded_linux_host_network') || get_field('embedded_linux_in_the_box')):?>
					<div class="table-wrap">
						<p><?php echo  __('Technology set:','sirinsoftware');?></p>
						<table class="table-md-lg">
						<?php if(get_field('embedded_linux_platform')): ?>
							<tr>
								<td><p><?php echo  __('Platform','sirinsoftware');?></p></td>
								<td><p><?php the_field('embedded_linux_platform')?></p></td>
							</tr>
						<?php endif;?>
						<?php if(get_field('embedded_linux_supported')): ?>
							<tr>
								<td><p><?php echo  __('Supported programming languages under linux','sirinsoftware');?></p></td>
								<td><p><?php the_field('embedded_linux_supported')?></p></td>
							</tr>
						<?php endif;?>
						<?php if(get_field('embedded_linux_host_network')): ?>
							<tr>
								<td><p><?php echo  __('Host and Network Requirements','sirinsoftware');?></p></td>
								<td><p><?php the_field('embedded_linux_host_network')?></p></td>
							</tr>
						<?php endif;?>
						<?php if(get_field('embedded_linux_in_the_box')): ?>
							<tr>
								<td><p><?php echo  __('In the Box','sirinsoftware');?></p></td>
								<td><p><?php the_field('embedded_linux_in_the_box')?></p></td>
							</tr>
						<?php endif;?>
						</table>
						<table class="table-sm">
						<?php if(get_field('embedded_linux_platform')): ?>
							<tr>
								<td>
									<p><b><?php echo  __('Platform','sirinsoftware');?></b><br /></p>
									<p><?php the_field('embedded_linux_platform')?></p>
								</td>
							</tr>
						<?php endif;?>
						<?php if(get_field('embedded_linux_supported')): ?>
							<tr>
								<td>
									<p><b><?php echo  __('Supported programming languages under linux','sirinsoftware');?></b><br /></p>
									<p><?php the_field('embedded_linux_supported')?></p>
								</td>
							</tr>
						<?php endif;?>
						<?php if(get_field('embedded_linux_host_network')): ?>
							<tr>
								<td>
									<p><b><?php echo  __('Host and Network Requirements','sirinsoftware');?></b><br /></p>
									<p><?php the_field('embedded_linux_host_network')?></p>
								</td>
							</tr>
						<?php endif;?>
						<?php if(get_field('embedded_linux_in_the_box')): ?>
							<tr>
								<td>
									<p><b><?php echo  __('In the Box','sirinsoftware');?></b><br /></p>
									<p><?php the_field('embedded_linux_in_the_box')?></p>
								</td>
							</tr>
						<?php endif;?>
						</table>
					</div>
				<?php endif;?>
				<?php if(get_field('portfolio_project_image_top')):?>
					<div class="sector-image">
						<img src="<?php the_field('portfolio_project_image_top');?>" alt="<?php the_title();?> portfolio_project_image_top">
					</div>
				<?php endif;?>
				<?php if(get_field('portfolio_client_background')):?>

                    <div class="client-background box-element">
                        <div class="header-image">
                            <img src="<?php echo get_stylesheet_directory_uri()?>/sirindesign/build/img/case-client-background.svg" alt="client background">
                        </div>
                        <div class="content">
                            <?php the_field('portfolio_client_background');?>
                        </div>
                    </div>
				<?php endif;?>

				<?php if(get_field('portfolio_business_challenge')):?>
                    <div class="business-challenge box-element">
                        <div class="header-image">
                            <img src="<?php echo get_stylesheet_directory_uri()?>/sirindesign/build/img/case-business-challenge.svg" alt="business challenge">
                        </div>
                        <div class="content">
                            <?php the_field('portfolio_business_challenge');?>
                        </div>
                    </div>
				<?php endif;?>





                <?php if(get_field('portfolio_solution')):?>

                <div class="solution box-element">
                    <div class="header-image">
                        <img src="<?php echo get_stylesheet_directory_uri()?>/sirindesign/build/img/case-solution.svg" alt="portfolio solution">
                    </div>
                    <div class="content">
                        <?php the_field('portfolio_solution');?>
                    </div>
                </div>
				<?php endif;?>
				<?php if(get_field('portfolio_solution_img')):?>
					<div class="sector-image">
						<img src="<?php the_field('portfolio_solution_img');?>" alt="<?php the_title();?> portfolio_solution_img">
					</div>
				<?php endif;?>




				<?php if(get_field('portfolio_value_delivered')):?>


                    <div class="value-delivered box-element">
                        <div class="header-image">
                            <img src="<?php echo get_stylesheet_directory_uri()?>/sirindesign/build/img/case-value-delivered.svg" alt="portfolio solution">
                        </div>
                        <div class="content">
                            <?php the_field('portfolio_value_delivered');?>
                        </div>
                    </div>

				<?php endif;?>

<!--                --><?php //if(get_field('portfolio_target_use_cases')):?>
<!--					<div class="sector">-->
<!--						<div class="pic">-->
<!--							<img class="client" src="--><?php //echo get_stylesheet_directory_uri()?><!--/img/img-04-04.png" alt="portfolio_target_use_cases">-->
<!--						</div>-->
<!--						<div class="title">--><?php //echo  __('Target use cases','sirinsoftware');?><!--</div>-->
<!--						--><?php //the_field('portfolio_target_use_cases');?>
<!--					</div>-->
<!--				--><?php //endif;?>
				<?php if(get_field('portfolio_project_image_bottom')):?>
					<div class="sector-image">
						<img src="<?php the_field('portfolio_project_image_bottom');?>" alt="<?php the_title();?> portfolio_project_image_bottom">
					</div>
				<?php endif;?>
