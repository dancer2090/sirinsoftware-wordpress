<form method="POST">
	<label style="font-weight: bold;"><?php echo __('All Clients link', 'sirinsoftware')?></label>
	<input type="text" name="sirin-all-clients-link" size="46" value="<?php echo (get_option('sirin-all-clients-link'))? get_option('sirin-all-clients-link') : '';?>">
	
	<div class="clients">
		<?php if(!get_option('sirin-clients')):?>
			<div class="clients-items">
				<div class="client" id="sirin-client1">
					<img src="" alt="" height="50" style="display: none;" class="sirin-client1-btn">
					<label for="sirin-client1-btn">Client Logo</label>
					<input type="text" id="sirin-client1-btn" name="sirin-client1-img" size="46" value="">
					<input type="button" name="sirin-client1-btn" class="button-secondary upload-btn" value="Upload Image">
					<label for="sirin-client1-link">Client Link</label>
					<input type="text" id="sirin-client1-link" name="sirin-client1-link" size="46" value="">
					<input type="hidden" name="sirin-clients[]" size="46" value="sirin-client1">
					<a href="#" class="remove-item">X</a>
				</div>
			</div>
			<div style="clear: both;"></div>
			<input type="button" value="<?php echo __('Add client', 'sirinsoftware')?>" name="add-new-client">
		<?php else:?>
			<div class="clients-items">
				<?php foreach (get_option('sirin-clients') as $sirin_client):?>
					<div class="client" id="<?php echo $sirin_client;?>">
						<img src="<?php echo (get_option($sirin_client.'-img'))? get_option($sirin_client.'-img') : '';?>" alt="" height="50" class="<?php echo $sirin_client;?>-btn">
						<label for="<?php echo $sirin_client;?>-btn">Client Logo</label>
						<input type="text" id="<?php echo $sirin_client;?>-btn" name="<?php echo $sirin_client;?>-img" size="46" value="<?php echo (get_option($sirin_client.'-img'))? get_option($sirin_client.'-img') : '';?>">
						<input type="button" name="<?php echo $sirin_client;?>-btn" class="button-secondary upload-btn" value="Upload Image">
						<label for="<?php echo $sirin_client;?>-btn">Client Link</label>
						<input type="text" name="<?php echo $sirin_client;?>-link" size="46" value="<?php echo (get_option($sirin_client.'-link'))? get_option($sirin_client.'-link') : '';?>">
						<input type="hidden" name="sirin-clients[]" size="46" value="<?php echo $sirin_client;?>">
						<a href="#" class="remove-item">X</a>
					</div>
				<?php endforeach;?>
			</div>
			<div style="clear: both;"></div>
			<input type="button" value="<?php echo __('Add client', 'sirinsoftware')?>" name="add-new-client">
		<?php endif;?>
	</div>
	
	<input type="submit" value="<?php echo __('Save', 'sirinsoftware')?>" class="button button-primary button-large">
	
</form>