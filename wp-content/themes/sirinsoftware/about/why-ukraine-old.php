<div id="about_expertise" class="about-content">
	<h2><span><?php the_title();?></span></h2>
	<?php if( have_rows('facts_figures_items') ):?>
		<?php  while ( have_rows('facts_figures_items') ) : the_row();?>
			<div class="section-facts">
				<div class="inner">
					<h3><?php the_sub_field('facts_figures_item_title');?>:</h3>
					<?php if( have_rows('facts_figures_item_elements') ):?>
						<div class="items-wrap">
							<?php  while ( have_rows('facts_figures_item_elements') ) : the_row();?>
								<div class="item">
									<div class="pic pic-01"><img src="<?php the_sub_field('facts_figures_element_image');?>" alt=""></div>
									<div class="descript">
										<p><?php the_sub_field('facts_figures_element_title');?></p>	
									</div>
									<div class="pic pic-01"><img src="<?php the_sub_field('facts_figures_element_image');?>" alt=""></div>
								</div>
							<?php endwhile;?>
						</div>
					<?php endif;?>
				</div>
			</div>
		<?php endwhile;?>
	<?php endif;?>
</div>