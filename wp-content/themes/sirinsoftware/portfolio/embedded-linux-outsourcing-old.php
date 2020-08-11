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
<!---->
<!--                --><?php //if(get_field('portfolio_client_logo') || get_field('portfolio_business_area') || get_field('portfolio_geography') || get_field('portfolio_relationship_status')):?>
<!--					<div class="info-top">-->
<!---->
<!--                        --><?php //if($show): ?>
<!--                            --><?php //if(get_field('portfolio_client_logo')):?>
<!--                                <div>-->
<!--                                    <p><b>--><?php //echo  __('Client:','sirinsoftware');?><!--</b></p>-->
<!--                                    <img class="client" src="--><?php //the_field('portfolio_client_logo');?><!--" alt="--><?php //the_title();?><!-- portfolio_client_logo">-->
<!--                                </div>-->
<!--                            --><?php //else:?>
<!--                                --><?php //if(get_field('portfolio_client_title')):?>
<!--                                    <div>-->
<!--                                        <p><b>--><?php //echo  __('Client:','sirinsoftware');?><!--</b></p>-->
<!--                                        --><?php //the_field('portfolio_client_title');?>
<!--                                    </div>-->
<!--                                --><?php //endif;?>
<!--                            --><?php //endif;?>
<!--                        --><?php //else:?>
<!--                            <div>-->
<!--                                <p><b>--><?php //echo  __('Client:','sirinsoftware');?><!--</b></p>-->
<!--                                Confidential-->
<!--                            </div>-->
<!--                        --><?php //endif;?>
<!---->
<!---->
<!--						--><?php //if(get_field('portfolio_business_area')):?>
<!--						<div>-->
<!--							<p><b>--><?php //echo  __('Business area (industry):','sirinsoftware');?><!--</b></p>-->
<!--							<p>--><?php //the_field('portfolio_business_area');?><!--</p>-->
<!--						</div>-->
<!--						--><?php //endif;?>
<!--						--><?php //if(get_field('portfolio_geography')):?>
<!--						<div>-->
<!--							<p><b>--><?php //echo  __('Geography:','sirinsoftware');?><!--</b></p>-->
<!--							<p>--><?php //the_field('portfolio_geography');?><!--</p>-->
<!--						</div>-->
<!--						--><?php //endif;?>
<!--						--><?php //if(get_field('portfolio_relationship_status')):?>
<!--						<div>-->
<!--							<p><b>--><?php //echo  __('Relationship status:','sirinsoftware');?><!-- </b></p>-->
<!--							<p>--><?php //the_field('portfolio_relationship_status');?><!--</p>-->
<!--						</div>-->
<!--						--><?php //endif;?>
<!--					</div>-->
<!--				--><?php //endif;?>
				<?php if( have_rows('embedded_linux_technology_list') ):?>
					<div class="sector">
						<div class="pic">
							<img class="client" src="<?php echo get_stylesheet_directory_uri()?>/img/technology_icon.png" alt="embedded_linux_technology_list">
						</div>
						<div class="title"><?php echo  __('Technology set','sirinsoftware');?></div>
						<ul>
							<?php while ( have_rows('embedded_linux_technology_list') ) : the_row();?>
								<li>
									<?php the_sub_field('embedded_linux_technology_list_item');?>
								</li>
							<?php endwhile;?>
						</ul>
						<?php if(get_field('embedded_linux_technology_img')):?>
							<p> </p>
							<p>
								<img src="<?php the_field('embedded_linux_technology_img');?>" alt="<?php the_title();?> embedded_linux_technology_img" class="aligncenter" width="300">
							</p>
						<?php endif;?>
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
					<div class="sector">
						<div class="pic">
							<img class="client" src="<?php echo get_stylesheet_directory_uri()?>/img/img-04-04.png" alt="portfolio_client_background">
						</div>
						<div class="title"><?php echo  __('Client Background','sirinsoftware');?></div>
						<?php the_field('portfolio_client_background');?>
					</div>
				<?php endif;?>
				<?php if(get_field('portfolio_business_challenge')):?>
					<div class="sector">
						<div class="pic">
							<img class="client" src="<?php echo get_stylesheet_directory_uri()?>/img/img-04-01.png" alt="portfolio_business_challenge">
						</div>
						<div class="title"><?php echo  __('Business Challenge','sirinsoftware');?></div>
						<?php the_field('portfolio_business_challenge');?>
					</div>
				<?php endif;?>
				<?php if(get_field('portfolio_solution')):?>
					<div class="sector">
						<div class="pic">
							<img class="client" src="<?php echo get_stylesheet_directory_uri()?>/img/img-04-02.png" alt="portfolio_solution">
						</div>
						<div class="title"><?php echo  __('Solution','sirinsoftware');?></div>
						<?php the_field('portfolio_solution');?>
					</div>
				<?php endif;?>
				<?php if(get_field('portfolio_solution_img')):?>
					<div class="sector-image">
						<img src="<?php the_field('portfolio_solution_img');?>" alt="<?php the_title();?> portfolio_solution_img">
					</div>
				<?php endif;?>
				<?php if(get_field('portfolio_value_delivered')):?>
					<div class="sector">
						<div class="pic">
							<img class="client" src="<?php echo get_stylesheet_directory_uri()?>/img/img-04-03.png" alt="portfolio_value_delivered">
						</div>
						<div class="title"><?php echo  __('Value Delivered','sirinsoftware');?></div>
						<?php the_field('portfolio_value_delivered');?>
					</div>
				<?php endif;?>
				<?php if(get_field('portfolio_target_use_cases')):?>
					<div class="sector">
						<div class="pic">
							<img class="client" src="<?php echo get_stylesheet_directory_uri()?>/img/img-04-04.png" alt="portfolio_target_use_cases">
						</div>
						<div class="title"><?php echo  __('Target use cases','sirinsoftware');?></div>
						<?php the_field('portfolio_target_use_cases');?>
					</div>
				<?php endif;?>
				<?php if(get_field('portfolio_project_image_bottom')):?>
					<div class="sector-image">
						<img src="<?php the_field('portfolio_project_image_bottom');?>" alt="<?php the_title();?> portfolio_project_image_bottom">
					</div>
				<?php endif;?>
				<?php 
				$args = array( 'post_type' => 'portfolio', 'posts_per_page' => 99999, 'order' => 'ASC','orderby' => 'menu_order', 'tax_query' => array(array('taxonomy' => 'portfolio-cat','field' => 'id','terms' => $term_list[0]->term_id),));
				$postlist = get_posts( $args);
				
				$posts = array();
				foreach ( $postlist as $post ) {
					$posts[] += $post->ID;
				}
				$current = array_search( $post_id, $posts );
				if(array_key_exists($current-1,$posts)) {
					$prevID = $posts[$current-1];
				}else{
					$prevID = $posts[count($posts)-1];
				}
				if(array_key_exists($current+1,$posts)) {
					$nextID = $posts[$current+1];
				}else{
					$nextID = $posts[0];
				}
				?>
				<div class="sector-prev-next">
					<a class="btn btn-sector-prev" href="<?php echo get_permalink( $prevID ); ?>">
						<span><?php echo wp_strip_all_tags(get_the_title( $prevID )); ?></span>	
					</a>
					<a class="btn btn-sector-next" href="<?php echo get_permalink( $nextID ); ?>">
						<span><?php echo wp_strip_all_tags(get_the_title( $nextID )); ?></span>	
					</a>
				</div>