<div id="about_development_centers" class="about-content">
		<h2><span><?php the_title();?></span></h2>
	<div class="world"></div>
	<div class="countrys">
		<div class="wrapper">
			<div class="inner inner-1">
				<?php if(get_option('sirin-offices')):?>
					<?php $offices=array();$i=1;?>
					<?php foreach (get_option('sirin-offices') as $office){
						$offices[count(get_option('sirin-offices'))-$i]=$office;
						$i++;
					}
					ksort($offices);
					?>
					<?php foreach ($offices as $office):?>
						<div class="country">
							<h3 style="background: url(<?php if(get_option($office.'-h-logo')) echo get_option($office.'-h-logo');?>) center top no-repeat"><?php if (get_option($office.'-header')) echo get_option($office.'-header');?></h3>
							<div class="text">
								<p><?php if(get_option($office.'-desc')) echo get_option($office.'-desc');?></p>
							</div>
							<div class="buttons">
								<a class="btn btn-03" href="<?php if(get_option($office.'-googlemap')) echo get_option($office.'-googlemap');?>" target="_blank">
									<span><?php echo __('On the map', 'sirinsoftware')?></span>
									<i class="ico ico-map-1"><i></i></i>
								</a>
							</div>
						</div>
					<?php endforeach;?>
				<?php endif;?>
			</div>
			<div class="inner inner-2">
				<?php if(get_option('sirin-offices')):?>
					<?php $offices=array();$i=1;?>
					<?php foreach (get_option('sirin-offices') as $office){
						$offices[count(get_option('sirin-offices'))-$i]=$office;
						$i++;
					}
					ksort($offices);
					?>
					<?php foreach ($offices as $office):?>
						<div class="buttons">
							<a class="btn btn-03" href="<?php if(get_option($office.'-googlemap')) echo get_option($office.'-googlemap');?>" target="_blank">
								<span><?php echo __('On the map', 'sirinsoftware')?></span>
								<i class="ico ico-map-1"><i></i></i>
							</a>
						</div>
					<?php $i++;endforeach;?>
				<?php endif;?>
			</div>
		</div>
	</div>
</div>