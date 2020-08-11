<form method="POST">

	<label style="font-weight: bold;"><?php echo __('All Expertise link', 'sirinsoftware')?></label>
	<input type="text" name="sirin-all-exp-link" size="46" value="<?php echo (get_option('sirin-all-exp-link'))? get_option('sirin-all-exp-link') : '';?>">
	
	<?php if(!get_option('sirin-exp')):?>
			<div class="expertise" id="sirin-exp1">
				<h3 class="expertise-name"><?php echo __('Expertise', 'sirinsoftware')?> <span></span></h3>
				<div class="exp-title">
					<label><?php echo __('Expertise Title', 'sirinsoftware')?></label>
					<input type="text" name="sirin-exp1-title" size="46" value="">
					<input type="hidden" name="sirin-exp[]" value="sirin-exp1">
				</div>
				<div class="sirin-exp-items" id="sirin-exp1-items">
					<div class="sirin-exp-item" id="sirin-exp1-item1">
						<label><?php echo __('Item image', 'sirinsoftware')?></label>
						<img src="" alt="" height="100" style="display: none;" class="sirin-exp1-item1-btn">
						<input type="text" id="sirin-exp1-item1-btn" name="sirin-exp1-item1-img" size="46" value="">
						<input type="button" name="sirin-exp1-item1-btn" class="button-secondary upload-btn" value="Upload Image">
						<label><?php echo __('Item title', 'sirinsoftware')?></label>
						<input type="text" name="sirin-exp1-item1-title" size="46" value="">
						<label><?php echo __('Right description', 'sirinsoftware')?></label>
						<input type="text" name="sirin-exp1-item1-desc" size="46" value="">
						<input type="hidden" name="sirin-exp1-items[]" value="sirin-exp1-item1">
						<a href="#" class="remove-item">X</a>
					</div>
				</div>
				<div style="clear: both;"></div>
				<input type="button" value="<?php echo __('Add expertise item', 'sirinsoftware')?>" name="add-new-exp-item-btn">
			</div>
	<?php else: $cnt_exp=count(get_option('sirin-exp')); $i=1;?>
		<?php foreach (get_option('sirin-exp') as $sirin_exp):?>
			<div class="expertise" id="<?php echo $sirin_exp;?>">
				<h3 class="expertise-name"><?php echo __('Expertise', 'sirinsoftware')?> <span></span></h3>
				<div class="exp-title">
					<label><?php echo __('Expertise Title', 'sirinsoftware')?></label>
					<input type="text" name="<?php echo $sirin_exp;?>-title" size="46" value="<?php echo (get_option($sirin_exp.'-title'))? get_option($sirin_exp.'-title') : '';?>">
					<input type="hidden" name="sirin-exp[]" value="<?php echo $sirin_exp;?>">
				</div>
				<div class="sirin-exp-items" id="<?php echo $sirin_exp;?>-items">
					<?php if(get_option($sirin_exp.'-items') && !empty(get_option($sirin_exp.'-items'))):?>
						<?php foreach (get_option($sirin_exp.'-items') as $sirin_exp_item):?>
							<div class="sirin-exp-item" id="<?php echo $sirin_exp_item;?>">
								<label><?php echo __('Item image', 'sirinsoftware')?></label>
								<img src="<?php echo (get_option($sirin_exp_item.'-img'))? get_option($sirin_exp_item.'-img') : '';?>" alt="" height="100" <?php if(!get_option($sirin_exp_item.'-img')) echo 'style="display: none;"';?> class="<?php echo $sirin_exp_item;?>-btn">
								<input type="text" id="<?php echo $sirin_exp_item;?>-btn" name="<?php echo $sirin_exp_item;?>-img" size="46" value="<?php echo (get_option($sirin_exp_item.'-img'))? get_option($sirin_exp_item.'-img') : '';?>">
								<input type="button" name="<?php echo $sirin_exp_item;?>-btn" class="button-secondary upload-btn" value="Upload Image">
								<label><?php echo __('Item title', 'sirinsoftware')?></label>
								<input type="text" name="<?php echo $sirin_exp_item;?>-title" size="46" value="<?php echo (get_option($sirin_exp_item.'-title'))? get_option($sirin_exp_item.'-title') : '';?>">
								<label><?php echo __('Right description', 'sirinsoftware')?></label>
								<input type="text" name="<?php echo $sirin_exp_item;?>-desc" size="46" value="<?php echo (get_option($sirin_exp_item.'-desc'))? get_option($sirin_exp_item.'-desc') : '';?>">
								<input type="hidden" name="<?php echo $sirin_exp;?>-items[]" value="<?php echo $sirin_exp_item;?>">
								<a href="#" class="remove-item">X</a>
							</div>
						<?php endforeach;?>
					<?php else:?>
						<div class="sirin-exp-item" id="sirin-exp1-item1">
							<label><?php echo __('Item image', 'sirinsoftware')?></label>
							<img src="" alt="" height="100" style="display: none;" class="sirin-exp1-item1-btn">
							<input type="text" id="sirin-exp1-item1-btn" name="sirin-exp1-item1-img" size="46" value="">
							<input type="button" name="sirin-exp1-item1-btn" class="button-secondary upload-btn" value="Upload Image">
							<label><?php echo __('Item title', 'sirinsoftware')?></label>
							<input type="text" name="sirin-exp1-item1-title" size="46" value="">
							<label><?php echo __('Right description', 'sirinsoftware')?></label>
							<input type="text" name="sirin-exp1-item1-desc" size="46" value="">
							<input type="hidden" name="sirin-exp1-items[]" value="sirin-exp1-item1">
							<a href="#" class="remove-item">X</a>
						</div>
					<?php endif;?>
				</div>
				<input type="hidden" name="sirin-exp[]" value="<?php echo $sirin_exp;?>">
				<div style="clear: both;"></div>
				<input type="button" value="<?php echo __('Add expertise item', 'sirinsoftware')?>" name="add-new-exp-item-btn">
			</div>
		<?php if($cnt_exp>$i) echo '<hr>';?>
		<?php $i++;endforeach;?>
	<?php endif;?>
	<div class="add-new-exp-type"><input type="button" value="<?php echo __('Add expertise type', 'sirinsoftware')?>" name="add-new-exp-type"></div>
	<input type="submit" value="<?php echo __('Save', 'sirinsoftware')?>" class="button button-primary button-large">
</form>