<form method="POST">
	<div class="slider">
	<!-- Video MP4 -->
		<div class="video">
			<label for="upload-btn3"><?php echo __('Video MP4', 'sirinsoftware')?>:</label>
		    <input type="text" name="sirin-video-mp4" id="upload-btn3" class="upload_image_link" value="<?php echo (get_option('sirin-video-mp4'))? get_option('sirin-video-mp4') : '';?>" size="46">
		    <input type="button" name="upload-btn3" class="button-secondary upload-btn" value="Upload Image">
		</div>
	<!-- Video webm -->
		<div class="video">
			<label for="upload-btn4"><?php echo __('Video WEBM', 'sirinsoftware')?>:</label>
		    <input type="text" name="sirin-video-webm" id="upload-btn4" class="upload_image_link" value="<?php echo (get_option('sirin-video-webm'))? get_option('sirin-video-webm') : '';?>" size="46">
		    <input type="button" name="upload-btn4" class="button-secondary upload-btn" value="Upload Image">
		</div>
	<!-- Video image -->
		<div <?php if(!get_option('sirin-video-img')) echo 'style="display: none;"';?>>
		    <label></label>
		    <img class="upload-btn5" src="<?php echo (get_option('sirin-video-img'))? get_option('sirin-video-img') : '';?>" height="70">
		</div>
		<div class="video">
			<label for="upload-btn5"><?php echo __('Video image', 'sirinsoftware')?>:</label>
		    <input type="text" name="sirin-video-img" id="upload-btn5" class="upload_image_link" value="<?php echo (get_option('sirin-video-img'))? get_option('sirin-video-img') : '';?>" size="46">
		    <input type="button" name="upload-btn5" class="button-secondary upload-btn" value="Upload Image">
		</div>
		<hr>
		<?php if(!get_option('sirin-home-slides')):?>
			<div class="slide" id="slide1">
				<h3 class="slide-name"><?php echo __('Slide', 'sirinsoftware')?> <span></span></h3>
				<input type="hidden" name="sirin-home-slides[]" value="slide1">
				<div class="home-slider header">
					<label><?php echo __('Slide header', 'sirinsoftware')?></label>
					<textarea name="slide1-header" rows="3" cols="46"></textarea>
				</div>
				<div class="home-slider vision">
					<label><?php echo __('Slide vision', 'sirinsoftware')?></label>
					<textarea name="slide1-vision" rows="3" cols="46"></textarea>
				</div>
				<div class="home-slider mission">
					<label><?php echo __('Slide mission', 'sirinsoftware')?></label>
					<textarea name="slide1-mission" rows="3" cols="46"></textarea>
				</div>
				<div class="home-slider link">
					<label><?php echo __('Slide link', 'sirinsoftware')?></label>
					<input name="slide1-link" size="46">
				</div>
			</div>
		<?php else: $cnt_slide=count(get_option('sirin-home-slides')); $i=1;?>
			<?php foreach (get_option('sirin-home-slides') as $slide):?>
				<div class="slide" id="<?php echo $slide;?>">
					<h3 class="slide-name"><?php echo __('Slide', 'sirinsoftware')?> <span></span></h3>
					<input type="hidden" name="sirin-home-slides[]" value="<?php echo $slide;?>">
					<div class="home-slider header">
						<label><?php echo __('Slide header', 'sirinsoftware')?></label>
						<textarea name="<?php echo $slide;?>-header" rows="3" cols="46"><?php echo (get_option($slide.'-header'))? str_replace('<br />', "",get_option($slide.'-header')) : '';?></textarea>
					</div>
					<div class="home-slider vision">
						<label><?php echo __('Slide vision', 'sirinsoftware')?></label>
						<textarea name="<?php echo $slide;?>-vision" rows="3" cols="46"><?php echo (get_option($slide.'-vision'))? str_replace('<br />', "",get_option($slide.'-vision')) : '';?></textarea>
					</div>
					<div class="home-slider mission">
						<label><?php echo __('Slide mission', 'sirinsoftware')?></label>
						<textarea name="<?php echo $slide;?>-mission" rows="3" cols="46"><?php echo (get_option($slide.'-mission'))? str_replace('<br />', "",get_option($slide.'-mission')) : '';?></textarea>
					</div>
					<div class="home-slider link">
						<label><?php echo __('Slide link', 'sirinsoftware')?></label>
						<input name="<?php echo $slide;?>-link" value="<?php echo (get_option($slide.'-link'))? get_option($slide.'-link'): '';?>" size="46">
					</div>
				</div>
				<?php if($cnt_slide>$i) echo '<hr>';?>
			<?php $i++;endforeach;?>
		<?php endif;?>
	</div>
	<div class="add-new-slide"><input type="button" value="<?php echo __('Add slide', 'sirinsoftware')?>" name="add-slide-btn"></div>
	<input type="submit" value="<?php echo __('Save', 'sirinsoftware')?>" class="button button-primary button-large">
</form>