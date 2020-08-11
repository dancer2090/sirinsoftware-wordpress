	<div class="services-main">
		<div class="inner">
			<h2><span><?php the_title();?></span></h2>
			<p><?php the_content();?></p>
			<?php $services = get_field('services_selected');
			if( $services ): ?>
				<div class="items-wrap">
					<?php foreach( $services as $service ):?>
						<div class="item item-<?php echo $service->ID;?>">
							<h3 <?php if (get_field('page_icon',$service->ID)) echo 'style="background: url('.get_field('page_icon',$service->ID).')  center 7px no-repeat; background-size: 118px auto;"';?>><span><?php echo $service->post_title;?></span></h3>
							<div class="text">
								<p>
									<?php 
									$content_post = get_post($service->ID);
									echo $content_post->post_content;
									?> 
								</p>
							</div>
							<div class="bottom">
								<a class="btn btn-03 anim-1" href="<?php echo get_permalink( $service->ID );?>">
									<i class="ico ico-more-2"><i></i></i>
									<span><?php echo __('Learn more', 'sirinsoftware')?></span>
								</a>
								<a class="btn btn-01 btn-scroll-to" href="#tellabout">
									<i class="ico ico-order-1"><i></i></i>
									<span><?php echo __('Get started', 'sirinsoftware')?></span>
								</a>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif;?>
		</div>
	</div>