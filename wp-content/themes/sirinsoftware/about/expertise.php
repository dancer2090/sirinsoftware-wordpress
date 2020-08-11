<div id="about_expertise" class="about-content">
<!--	<h2><span>--><?php //the_title();?><!--</span></h2>-->
	<?php if( have_rows('expertise_items') ):?>
		<?php  while ( have_rows('expertise_items') ) : the_row();?>
			<div class="section">
				<div class="inner">
					<div class="head">
						<h3><?php the_sub_field('expertise_item_title');?></h3>				
					</div>
					<?php if( have_rows('expertise_item_images')):?>
						<div class="descript">
							<div class="logos animate">
								<ul>
									<?php  while ( have_rows('expertise_item_images') ) : the_row();?>
										<li>
											<?php $thumb=wp_get_attachment_image_src(get_sub_field('expertise_image'),'thumbnail');?>
											<span class="pic"><img src="<?php if(!empty($thumb[0])) echo $thumb[0];?>" alt="<?php the_sub_field('expertise_title');?>"></span>
											<span class="title"><?php the_sub_field('expertise_title');?></span>
										</li>
									<?php endwhile;?>
								</ul>
							</div>
						</div>
					<?php endif;?>
				</div>
			</div>
		<?php endwhile;?>
	<?php endif;?>
</div>