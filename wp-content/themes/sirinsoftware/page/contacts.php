	<div class="contact-main-top">
		<div class="inner">
			<h2><span><?php the_title();?></span></h2>

            <?php the_content();?>

			<div class="contacts-grid">
				<?php if(get_option('sirin-offices')):?>
					<?php $i=1;?>
					<?php foreach (get_option('sirin-offices') as $office):?>
						<div class="item contacts-<?php echo $i;?>">
							<div class="logo">
								<i class="ico-<?php echo ($office === 'sirin-office1')?'ukr':'usa' ?>"><i></i></i>
							</div>
							<div class="info">										
								<h3><?php echo (get_option($office.'-header'))? get_option($office.'-header'): '';?></h3>
								<div class="list">
									<span class="adres">
										<span class="ico-wrap"><i class="ico ico-map-2"><i></i></i></span>
										<?php if (get_option($office.'-address')):?>
											<span>
												<?php echo (get_option($office.'-address'))? get_option($office.'-address'): '';?>
											</span>
										<?php endif;?>
									</span>
									<?php if (get_option($office.'-phone1') || get_option($office.'-phone2')):?>
										<span class="phone">
											<span class="ico-wrap"><i class="ico ico-phone-2"><i></i></i></span>
											<span>
												<?php echo (get_option($office.'-phone1'))? '<a href="tel:'.str_replace(' ','',get_option($office.'-phone1')).'">'.get_option($office.'-phone1').'</a>' : '';?>
												<?php echo (get_option($office.'-phone2'))? '<br><a href="tel:'.str_replace(' ','',get_option($office.'-phone2')).'">'.get_option($office.'-phone2').'</a>' : '';?>
											</span>						
										</span>
									<?php endif;?>
									<?php if (get_option($office.'-email')):?>
										<span class="mail">
											<span class="ico-wrap"><i class="ico ico-mail-2"><i></i></i></span>
											<span>
												<?php echo (get_option($office.'-email'))? '<a href="mailto:'.get_option($office.'-email').'">'.get_option($office.'-email').'</a>' : '';?>
											</span>						
										</span>
									<?php endif;?>
								</div>
							</div>
						</div>
					<?php $i++;endforeach;?>
				<?php endif;?>
			</div>

		</div>
	</div>