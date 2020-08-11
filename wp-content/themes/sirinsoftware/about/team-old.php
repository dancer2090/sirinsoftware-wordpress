<div id="about_team" class="about-content">
	<h2><span><?php the_title();?></span></h2>	
	<div class="section">
		<div class="inner">
			<div class="main-wrap center-wrap">
				<?php if( have_rows('team_main_members') ):?>
					<?php  while ( have_rows('team_main_members') ) : the_row();?>
						<div class="team-main">
							<div class="pic" style="background: url('<?php the_sub_field('team_main_member_image');?>') 0 0 no-repeat">
								<?php if(get_sub_field('team_main_member_linkedin')):?>	
									<a class="btn btn-in-3" href="<?php the_sub_field('team_main_member_linkedin');?>" target="_blank"></a>
								<?php endif;?>	
							</div>
							<p class="team-member-name"><?php the_sub_field('team_main_member_name');?></p>
							<p class="team-member-post"><?php the_sub_field('team_main_member_position');?></p>
						</div>
					<?php endwhile;?>
				<?php endif;?>
			</div>
		</div>
	</div>
	<?php if( have_rows('team_members') ):?>
		<div class="section">
			<div class="inner">
				<div class="center-wrap">
					<?php  while ( have_rows('team_members') ) : the_row();?>
						<div class="team-small">
							<div class="pic" style="background: url('<?php the_sub_field('team_member_image');?>') 0 0 no-repeat">
								<?php if(get_sub_field('team_member_linkedin')):?>	
									<a class="btn btn-in-3" href="<?php the_sub_field('team_member_linkedin');?>" target="_blank"></a>
								<?php endif;?>	
							</div>
							<p class="team-member-name"><?php the_sub_field('team_member_name');?></p>
							<p class="team-member-post"><?php the_sub_field('team_member_position');?></p>
						</div>
					<?php endwhile;?>
				</div>
			</div>
		</div>
	<?php endif;?>

	<div class="section schemes">
		<div class="inner">
			<div class="list-center">
				<div class="scheme-wrap">
					<h3>Expertise</h3>
					<div class="expertise-img noselect">
						<div class="expertise-img-2 expertise-scrollable noselect"></div>
					</div>
				</div>
				<div class="scheme-wrap">
					<h3>Experience</h3>
					<div class="experience-img noselect">							
						<div class="experience-img-2 experience-scrollable noselect"></div>
					</div>
				</div>
			</div>
			<div class="info-list list-center">
				<div class="list-wrap">
					<div class="list-center text-white">
						<div class="list-item expertise-scrollable">C/C++ <span class="count">13</span></div>
						<div class="list-item">iOS <span class="count">2</span></div>
						<div class="list-item">QA <span class="count">1</span></div>
						<div class="list-item">Python <span class="count">7</span></div>
						<div class="list-item">Android <span class="count">2</span></div>
						<div class="list-item">PHDs <span class="count">2</span></div>
						<div class="list-item">Node.js <span class="count">3</span></div>
						<div class="list-item">Design <span class="count">5</span></div>
						<br>
						<div class="list-item">PHP <span class="count">8</span></div>
						<div class="list-item">PM <span class="count">4</span></div>
					</div>
				</div>
				<div class="list-wrap">
					<div class="list-center">
						<div class="list-item">2+ years</div><br>
						<div class="list-item experience-scrollable">8+ years</div><br>
						<div class="list-item">4+ years</div><br><br><br><br>
					</div>
				</div>
			</div>
		</div>
	</div>

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