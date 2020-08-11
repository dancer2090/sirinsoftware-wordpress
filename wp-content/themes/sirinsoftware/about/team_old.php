<div id="about_team" class="about-content">
	<h2><span><?php the_title();?></span></h2>
	<?php if( have_rows('team_main_members') ):?>
		<?php  while ( have_rows('team_main_members') ) : the_row();?>
			<div class="section">
				<div class="inner">
					<div class="team-pic-big">
						<div class="pic" style="background: url('<?php the_sub_field('team_main_member_image');?>') 0 0 no-repeat">
							<img class="lazy" data-original="<?php the_sub_field('team_main_member_gif');?>" width="300" height="300" alt="">
						</div>
					</div>
					<div class="descript">
						<p class="team-member-name"><?php the_sub_field('team_main_member_name');?></p>
						<p class="team-member-post"><?php the_sub_field('team_main_member_position');?></p>
						<?php if(get_sub_field('team_main_member_linkedin')):?>
							<div class="team-member-social">
								<a class="btn btn-in-1" href="<?php the_sub_field('team_main_member_linkedin');?>" target="_blank"><i class="ico ico-in-1"><i></i></i></a>						
							</div>
						<?php endif;?>
						<p>
							<?php the_sub_field('team_main_member_description');?>
						</p>
					</div>
				</div>
			</div>
		<?php endwhile;?>
	<?php endif;?>
	<?php if( have_rows('team_members') ):?>
		<div class="section">
			<div class="inner">
				<?php  while ( have_rows('team_members') ) : the_row();?>
					<div class="team-small">
						<div class="pic" style="background: url('<?php the_sub_field('team_member_image');?>') 0 0 no-repeat">
							<img class="lazy" data-original="<?php the_sub_field('team_member_gif');?>" width="180" height="180" alt="">
							<?php if(get_sub_field('team_member_linkedin')):?>	
								<a class="btn btn-in-2" href="<?php the_sub_field('team_member_linkedin');?>" target="_blank"><i class="ico ico-in-2"><i></i></i></a>
							<?php endif;?>	
						</div>
						<p class="team-member-name"><?php the_sub_field('team_member_name');?></p>
						<p class="team-member-post"><?php the_sub_field('team_member_position');?></p>
					</div>
				<?php endwhile;?>
			</div>
		</div>
	<?php endif;?>
	<?php if( have_rows('team_slider') ):?>
		<div class="slider-team">
			<div class="inner">
				<ul>
					<?php  while ( have_rows('team_slider') ) : the_row();?>
						<li>
							<img src="<?php the_sub_field('team_slide_image');?>" alt="">
							<p><?php the_sub_field('team_slide_description');?></p>
						</li>
					<?php endwhile;?>
				</ul>
				<a class="btn btn-slider-prev-2" href="javascript:;"><i class="ico ico-left-3"><i></i></i></a>
				<a class="btn btn-slider-next-2" href="javascript:;"><i class="ico ico-right-3"><i></i></i></a>
			</div>
		</div>
	<?php endif;?>
</div>