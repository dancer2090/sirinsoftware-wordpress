<div class="sector-mobile">
	<div class="title"><?php echo wp_strip_all_tags(get_the_title());?></div>
	<div class="subtitle"><?php the_field('mobile_app_subtitle');?></div>
	<div class="images">
		<img src="<?php the_field('mobile_app_image1');?>" alt="<?php echo wp_strip_all_tags(get_the_title());?>1">
		<img src="<?php the_field('mobile_app_image2');?>" alt="<?php echo wp_strip_all_tags(get_the_title());?>2">
		<img src="<?php the_field('mobile_app_image3');?>" alt="<?php echo wp_strip_all_tags(get_the_title());?>3">
	</div>
	<?php the_field('mobile_app_description');?>
</div>