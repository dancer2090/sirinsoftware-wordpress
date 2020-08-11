				<?php if(get_field('portfolio_client_logo') || get_field('portfolio_business_area') || get_field('portfolio_geography') || get_field('portfolio_relationship_status')):?>
					<div class="info-top">
						<?php if(get_field('portfolio_client_logo')):?>
							<div>
								<p><b><?php echo  __('Client:','sirinsoftware');?></b></p>
								<img class="client" src="<?php the_field('portfolio_client_logo');?>" alt="<?php the_title();?>">
							</div>
						<?php endif;?>
						<?php if(get_field('portfolio_business_area')):?>
						<div>
							<p><b><?php echo  __('Business area (industry):','sirinsoftware');?></b></p>
							<p><?php the_field('portfolio_business_area');?></p>
						</div>
						<?php endif;?>
						<?php if(get_field('portfolio_geography')):?>
						<div>
							<p><b><?php echo  __('Geography:','sirinsoftware');?></b></p>
							<p><?php the_field('portfolio_geography');?></p>
						</div>
						<?php endif;?>
						<?php if(get_field('portfolio_relationship_status')):?>
						<div>
							<p><b><?php echo  __('Relationship status:','sirinsoftware');?> </b></p>
							<p><?php the_field('portfolio_relationship_status');?></p>
						</div>
						<?php endif;?>
					</div>
				<?php endif;?>
				<?php if(get_field('web_projects_backend') || get_field('web_projects_frontend') || get_field('web_projects_3rd_party_services')):?>
					<div class="table-wrap">
						<p><?php echo  __('Technology set:','sirinsoftware');?></p>
						<table class="table-md-lg">
						<?php if(get_field('web_projects_backend')): ?>
							<tr>
								<td><p><?php echo  __('Backend','sirinsoftware');?></p></td>
								<td><p><?php the_field('web_projects_backend')?></p></td>
							</tr>
						<?php endif;?>
						<?php if(get_field('web_projects_frontend')): ?>
							<tr>
								<td><p><?php echo  __('Frontend','sirinsoftware');?></p></td>
								<td><p><?php the_field('web_projects_frontend')?></p></td>
							</tr>
						<?php endif;?>
						<?php if(get_field('web_projects_3rd_party_services')): ?>
							<tr>
								<td><p><?php echo  __('3rd-party services','sirinsoftware');?></p></td>
								<td><p><?php the_field('web_projects_3rd_party_services')?></p></td>
							</tr>
						<?php endif;?>
						</table>
						<table class="table-sm">
						<?php if(get_field('web_projects_backend')): ?>
							<tr>
								<td>
									<p><b><?php echo  __('Backend','sirinsoftware');?></b><br /></p>
									<p><?php the_field('web_projects_backend')?></p>
								</td>
							</tr>
						<?php endif;?>
						<?php if(get_field('web_projects_frontend')): ?>
							<tr>
								<td>
									<p><b><?php echo  __('Frontend','sirinsoftware');?></b><br /></p>
									<p><?php the_field('web_projects_frontend')?></p>
								</td>
							</tr>
						<?php endif;?>
						<?php if(get_field('web_projects_3rd_party_services')): ?>
							<tr>
								<td>
									<p><b><?php echo  __('3rd-party services','sirinsoftware');?></b><br /></p>
									<p><?php the_field('web_projects_3rd_party_services')?></p>
								</td>
							</tr>
						<?php endif;?>
						</table>
					</div>
					<?php if(get_field('portfolio_project_image_top')):?>
						<div class="sector-image">
							<img src="<?php the_field('portfolio_project_image_top');?>" alt="<?php the_title();?>">
						</div>
					<?php endif;?>
				<?php endif;?>
				<?php if(get_field('portfolio_client_background')):?>
					<div class="sector">
						<div class="pic">
							<img class="client" src="<?php echo get_stylesheet_directory_uri()?>/img/img-04-04.png" alt="">
						</div>
						<div class="title"><?php echo  __('Client Background','sirinsoftware');?></div>
						<?php the_field('portfolio_client_background');?>
					</div>
				<?php endif;?>
				<?php if(get_field('portfolio_business_challenge')):?>
					<div class="sector">
						<div class="pic">
							<img class="client" src="<?php echo get_stylesheet_directory_uri()?>/img/img-04-01.png" alt="">
						</div>
						<div class="title"><?php echo  __('Business Challenge','sirinsoftware');?></div>
						<?php the_field('portfolio_business_challenge');?>
					</div>
				<?php endif;?>
				<?php if(get_field('portfolio_solution')):?>
					<div class="sector">
						<div class="pic">
							<img class="client" src="<?php echo get_stylesheet_directory_uri()?>/img/img-04-02.png" alt="">
						</div>
						<div class="title"><?php echo  __('Solution','sirinsoftware');?></div>
						<?php the_field('portfolio_solution');?>
					</div>
				<?php endif;?>
				<?php if(get_field('portfolio_value_delivered')):?>
					<div class="sector">
						<div class="pic">
							<img class="client" src="<?php echo get_stylesheet_directory_uri()?>/img/img-04-03.png" alt="">
						</div>
						<div class="title"><?php echo  __('Value Delivered','sirinsoftware');?></div>
						<?php the_field('portfolio_value_delivered');?>
					</div>
				<?php endif;?>
				<?php if(get_field('portfolio_target_use_cases')):?>
					<div class="sector">
						<div class="pic">
							<img class="client" src="<?php echo get_stylesheet_directory_uri()?>/img/img-04-04.png" alt="">
						</div>
						<div class="title"><?php echo  __('Target use cases','sirinsoftware');?></div>
						<?php the_field('portfolio_target_use_cases');?>
					</div>
				<?php endif;?>
				<?php if(get_field('portfolio_project_image_bottom')):?>
					<div class="sector-image">
						<img src="<?php the_field('portfolio_project_image_bottom');?>" alt="<?php the_title();?>">
					</div>
				<?php endif;?>