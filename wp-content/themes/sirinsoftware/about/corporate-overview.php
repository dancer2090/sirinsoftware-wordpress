<div id="about_presentation" class="about-content">
	<h2><span><?php the_title();?></span></h2>
	<?php if( have_rows('presentation_items') ):?>
		<?php  while ( have_rows('presentation_items') ) : the_row();?>
			<?php if(get_sub_field('presentation_type')=='public'):?>
				<div class="section-presentation">
					<div class="inner">
						<h3><?php the_sub_field('presentation_title');?></h3>
						<div class="presentation">
							<?php echo do_shortcode(get_sub_field('presentation_code'));?>
			 			</div>
						<div class="buttons">
							<a class="btn btn-01 btn-download fancybox" href="#popup_form_general_presentation" data-link="<?php the_sub_field('presentation_link');?>">
								<span>Download</span>
								<i class="ico ico-download-1"><i></i></i>
							</a>
							<a href="#popup_form_general_presentation" class="btn btn-01 btn-email fancybox" >
								<span>Send an email to</span>
								<i class="ico ico-mail-4"><i></i></i>
							</a>
						</div>
					</div>
				</div>
			<?php else:?>
				<div class="section-presentation-extended">
					<div class="inner">
						<h3><?php the_sub_field('presentation_title');?></h3>
						<p>If you want to get an extended presentation of our works, fill out the form below.</p>
						<form action="" method="POST" id="form_popup_general_presentation" autocomplete="off">
						<input type=hidden name="oid" value="00D58000000csPr">
						<input type=hidden name="retURL" value="<?php echo get_site_url().$_SERVER['REQUEST_URI'];?>">
						<input name="presentation_link" type="hidden" value="<?php echo the_sub_field('presentation_private_link');?>">
							<div class="fields-wrap">
								<div class="field">
									<div class="input-wrap">
										<span class="placeholder">Your Name</span>
										<input type="text" name="first_name">
									</div>
								</div>
								<div class="field">
									<div class="input-wrap">
										<span class="placeholder">Your Email</span>
										<input type="text" name="email">
									</div>
								</div>
							</div>
							<button type="submit" class="btn send btn-01">
								<span>Send extended presentation</span>
								<i class="ico ico-mail-4"><i></i></i>
							</button>
						</form>	
					</div>
				</div>
			<?php endif;?>
		<?php endwhile;?>
	<?php endif;?>
</div>