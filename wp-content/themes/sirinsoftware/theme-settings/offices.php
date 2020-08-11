<form method="POST">
	<div class="offices">
		<?php if(!get_option('sirin-offices')):?>
			<div class="office-location" id="sirin-office1">
				<h3 class="office-name"><?php echo __('Office', 'sirinsoftware')?> <span></span></h3>
				<input type="hidden" name="sirin-offices[]" value="sirin-office1">
				<div class="sirin-office header">
					<label><?php echo __('Office header', 'sirinsoftware')?></label>
					<input type="text" id="sirin-office1-header" name="sirin-office1-header" size="46" value="">
				</div>
				<div class="sirin-office address">
					<label><?php echo __('Office address', 'sirinsoftware')?></label>
					<textarea name="sirin-office1-address" rows="3" cols="46"></textarea>
				</div>
				<div class="sirin-office phone1">
					<label><?php echo __('Office phone1', 'sirinsoftware')?></label>
					<input type="text" id="sirin-office1-phone1" name="sirin-office1-phone1" size="46" value="">
				</div>
				<div class="sirin-office phone2">
					<label><?php echo __('Office phone2', 'sirinsoftware')?></label>
					<input type="text" id="sirin-office1-phone2" name="sirin-office1-phone2" size="46" value="">
				</div>
				<div class="sirin-office email">
					<label><?php echo __('Office email', 'sirinsoftware')?></label>
					<input type="text" id="sirin-office1-email" name="sirin-office1-email" size="46" value="">
				</div>
				<div class="sirin-office googlemap">
					<label><?php echo __('Office googlemap', 'sirinsoftware')?></label>
					<input type="text" id="sirin-office1-googlemap" name="sirin-office1-googlemap" size="46" value="">
				</div>
				<div class="sirin-office logo">
					<label><?php echo __('Office logo header', 'sirinsoftware')?></label>
					<input type="text" id="sirin-office1-h-btn" name="sirin-office1-h-logo" size="46" value="">
					<input type="button" name="sirin-office1-h-btn" class="button-secondary upload-btn" value="Upload Image">
				</div>
				<div class="sirin-office logo">
					<label><?php echo __('Office logo bottom', 'sirinsoftware')?></label>
					<input type="text" id="sirin-office1-b-btn" name="sirin-office1-b-logo" size="46" value="">
					<input type="button" name="sirin-office1-b-btn" class="button-secondary upload-btn" value="Upload Image">
				</div>
				<div class="sirin-office desc">
					<label><?php echo __('Office description', 'sirinsoftware')?></label>
					<textarea name="sirin-office1-desc" rows="6" cols="46"></textarea>
				</div>
			</div>
		<?php else: $cnt_office=count(get_option('sirin-offices')); $i=1;?>
			<?php foreach (get_option('sirin-offices') as $office):?>
				<div class="office-location" id="<?php echo $office;?>">
					<h3 class="office-name"><?php echo __('Office', 'sirinsoftware')?> <span></span></h3>
					<input type="hidden" name="sirin-offices[]" value="<?php echo $office;?>">
					<div class="sirin-office header">
						<label><?php echo __('Office header', 'sirinsoftware')?></label>
						<input type="text"  name="<?php echo $office;?>-header" size="46" value="<?php echo (get_option($office.'-header'))? get_option($office.'-header') : '';?>">
					</div>
					<div class="sirin-office address">
						<label><?php echo __('Office address', 'sirinsoftware')?></label>
						<textarea name="<?php echo $office;?>-address" rows="3" cols="46"><?php echo (get_option($office.'-address'))? str_replace('<br />', "",get_option($office.'-address')) : '';?></textarea>
					</div>
					<div class="sirin-office phone1">
						<label><?php echo __('Office phone1', 'sirinsoftware')?></label>
						<input type="text" name="<?php echo $office;?>-phone1" size="46" value="<?php echo (get_option($office.'-phone1'))? get_option($office.'-phone1') : '';?>">
					</div>
					<div class="sirin-office phone2">
						<label><?php echo __('Office phone2', 'sirinsoftware')?></label>
						<input type="text" name="<?php echo $office;?>-phone2" size="46" value="<?php echo (get_option($office.'-phone2'))? get_option($office.'-phone2') : '';?>">
					</div>
					<div class="sirin-office email">
						<label><?php echo __('Office email', 'sirinsoftware')?></label>
						<input type="text" name="<?php echo $office;?>-email" size="46" value="<?php echo (get_option($office.'-email'))? get_option($office.'-email') : '';?>">
					</div>
					<div class="sirin-office googlemap">
						<label><?php echo __('Office googlemap', 'sirinsoftware')?></label>
						<input type="text" name="<?php echo $office;?>-googlemap" size="46" value="<?php echo (get_option($office.'-googlemap'))? get_option($office.'-googlemap') : '';?>">
					</div>
					<div class="sirin-office logo-img">
						<label></label>
					</div>
					<div class="sirin-office logo">
						<label><?php echo __('Office logo header', 'sirinsoftware')?></label>
						<img src="<?php echo (get_option($office.'-h-logo'))? get_option($office.'-h-logo') : '';?>" alt="<?php echo $office;?>-h-logo" height="100" <?php if(!get_option($office.'-h-logo')) echo 'style="display: none;"'?> class="<?php echo $office;?>-h-btn">
						<input type="text" id="<?php echo $office;?>-h-btn" name="<?php echo $office;?>-h-logo" size="46" value="<?php echo (get_option($office.'-h-logo'))? get_option($office.'-h-logo') : '';?>">
						<input type="button" name="<?php echo $office;?>-h-btn" class="button-secondary upload-btn" value="Upload Image">
					</div>
					<div class="sirin-office logo">
						<label><?php echo __('Office logo bottom', 'sirinsoftware')?></label>
						<img src="<?php echo (get_option($office.'-b-logo'))? get_option($office.'-b-logo') : '';?>" alt="<?php echo $office;?>-b-logo" height="100" <?php if(!get_option($office.'-b-logo')) echo 'style="display: none;"'?> class="<?php echo $office;?>-b-btn">
						<input type="text" id="<?php echo $office;?>-b-btn" name="<?php echo $office;?>-b-logo" size="46" value="<?php echo (get_option($office.'-b-logo'))? get_option($office.'-b-logo') : '';?>">
						<input type="button" name="<?php echo $office;?>-b-btn" class="button-secondary upload-btn" value="Upload Image">
					</div>
					<div class="sirin-office logo">
						<label><?php echo __('Office background', 'sirinsoftware')?></label>
						<img src="<?php echo (get_option($office.'-bg'))? get_option($office.'-bg') : '';?>" alt="<?php echo $office;?>-bg" height="100" <?php if(!get_option($office.'-bg')) echo 'style="display: none;"'?> class="<?php echo $office;?>-bg-btn">
						<input type="text" id="<?php echo $office;?>-bg-btn" name="<?php echo $office;?>-bg" size="46" value="<?php echo (get_option($office.'-bg'))? get_option($office.'-bg') : '';?>">
						<input type="button" name="<?php echo $office;?>-bg-btn" class="button-secondary upload-btn" value="Upload Image">
					</div>
					<div class="sirin-office desc">
						<label><?php echo __('Office description', 'sirinsoftware')?></label>
						<textarea name="<?php echo $office;?>-desc" rows="6" cols="46"><?php echo (get_option($office.'-desc'))? stripcslashes(str_replace('<br />', "",get_option($office.'-desc'))) : '';?></textarea>
					</div>
				</div>
				<?php if($cnt_office>$i) echo '<hr>';?>
			<?php $i++;endforeach;?>
		<?php endif;?>
	</div>
	<div class="add-new-office"><input type="button" value="<?php echo __('Add office', 'sirinsoftware')?>" name="add-office-btn"></div>
	<input type="submit" value="<?php echo __('Save', 'sirinsoftware')?>" class="button button-primary button-large">
</form>