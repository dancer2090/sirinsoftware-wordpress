<form method="POST">
	<table class="form-table">
	<!-- Logo1 -->
		<tr <?php if(!get_option('sirin-logo1')) echo 'style="display: none;"';?>>
		    <th scope="row" align="right"><label></label></th>
		    <td>
		    	<img class="upload-btn1" src="<?php echo (get_option('sirin-logo1'))? get_option('sirin-logo1') : '';?>" height="70">
		    </td>
		</tr>
		<tr>
		    <th scope="row" align="right"><label for="upload-btn1"><?php echo __('Theme logo1', 'sirinsoftware')?>:</label></th>
		    <td>
		    	<input type="text" name="sirin-logo1" id="upload-btn1" class="upload_image_link regular-text" value="<?php echo (get_option('sirin-logo1'))? get_option('sirin-logo1') : '';?>">
		    	<input type="button" name="upload-btn1" class="button-secondary upload-btn" value="Upload Image">
		    </td>
		</tr>
	<!-- Logo2 -->
		<tr <?php if(!get_option('sirin-logo2')) echo 'style="display: none;"';?>>
		    <th scope="row" align="right"><label></label></th>
		    <td>
		    	<img class="upload-btn2" src="<?php echo (get_option('sirin-logo2'))? get_option('sirin-logo2') : '';?>" height="70">
		    </td>
		</tr>
		<tr>
		    <th scope="row" align="right"><label for="upload-btn2"><?php echo __('Theme logo2', 'sirinsoftware')?>:</label></th>
		    <td>
		    	<input type="text" name="sirin-logo2" id="upload-btn2" class="upload_image_link regular-text" value="<?php echo (get_option('sirin-logo2'))? get_option('sirin-logo2') : '';?>">
		    	<input type="button" name="upload-btn2" class="button-secondary upload-btn" value="Upload Image">
		    </td>
		</tr>
	<!-- Main phone number -->
		<tr>
			<th scope="row" align="right"><label for="sirin-main-phone"><?php echo __('Main phone number', 'sirinsoftware')?>:</label></th>
			<td><input type="text" id="sirin-main-phone" class="regular-text" name="sirin-main-phone" value="<?php echo (get_option('sirin-main-phone'))? get_option('sirin-main-phone') : '';?>"></td>
		</tr>
	<!-- Main email -->
		<tr>
			<th scope="row" align="right"><label for="sirin-main-email"><?php echo __('Main email', 'sirinsoftware')?>:</label></th>
			<td><input type="text" id="sirin-main-email" class="regular-text" name="sirin-main-email" value="<?php echo (get_option('sirin-main-email'))? get_option('sirin-main-email') : '';?>"></td>
		</tr>
	<!-- Email for sales manager -->
		<tr>
			<th scope="row" align="right"><label for="sirin-sales-email"><?php echo __('Sales manager Email', 'sirinsoftware')?>:</label></th>
			<td><input type="text" id="sirin-sales-email" class="regular-text" name="sirin-sales-email" value="<?php echo (get_option('sirin-sales-email'))? get_option('sirin-sales-email') : '';?>"></td>
		</tr>
	<!-- Email for HR manager -->
		<tr>
			<th scope="row" align="right"><label for="sirin-hr-email"><?php echo __('HR manager Email', 'sirinsoftware')?>:</label></th>
			<td><input type="text" id="sirin-hr-email" class="regular-text" name="sirin-hr-email" value="<?php echo (get_option('sirin-hr-email'))? get_option('sirin-hr-email') : '';?>"></td>
		</tr>
	<!-- Header slogan -->
		<tr>
			<th scope="row" align="right"><label for="sirin-header-slogan"><?php echo __('Header slogan', 'sirinsoftware')?>:</label></th>
			<td><textarea name="sirin-header-slogan"  rows="3" cols="66" id="sirin-header-slogan"><?php echo (get_option('sirin-header-slogan'))? str_replace('<br />', "",get_option('sirin-header-slogan')) : '';?></textarea></td>
		</tr>
	<!-- Video MP4 -->
		<tr class="video">
			<th scope="row" align="right"><label for="upload-btn3"><?php echo __('Video MP4', 'sirinsoftware')?>:</label></th>
			<td>
		    	<input type="text" name="sirin-video-mp4" id="upload-btn3" class="upload_image_link regular-text" value="<?php echo (get_option('sirin-video-mp4'))? get_option('sirin-video-mp4') : '';?>">
		    	<input type="button" name="upload-btn3" class="button-secondary upload-btn" value="Upload Image">
		    </td>
		</tr>
	<!-- Video webm -->
		<tr class="video">
			<th scope="row" align="right"><label for="upload-btn4"><?php echo __('Video WEBM', 'sirinsoftware')?>:</label></th>
			<td>
		    	<input type="text" name="sirin-video-webm" id="upload-btn4" class="upload_image_link regular-text" value="<?php echo (get_option('sirin-video-webm'))? get_option('sirin-video-webm') : '';?>" >
		    	<input type="button" name="upload-btn4" class="button-secondary upload-btn" value="Upload Image">
		    </td>
		</tr>
	<!-- Video image -->
		<tr <?php if(!get_option('sirin-video-img')) echo 'style="display: none;"';?>>
		    <th scope="row" align="right"><label></label></th>
		    <td>
		    	<img class="upload-btn5" src="<?php echo (get_option('sirin-video-img'))? get_option('sirin-video-img') : '';?>" height="70">
		    </td>
		</tr>
		<div class="video">
			<th scope="row" align="right"><label for="upload-btn5"><?php echo __('Video image', 'sirinsoftware')?>:</label></th>
			<td>
		    	<input type="text" name="sirin-video-img" id="upload-btn5" class="upload_image_link regular-text" value="<?php echo (get_option('sirin-video-img'))? get_option('sirin-video-img') : '';?>" size="46">
		    	<input type="button" name="upload-btn5" class="button-secondary upload-btn" value="Upload Image">
		    </td>
		</div>
	<!-- Facebook Link -->
		<tr>
			<th scope="row" align="right"><label for="sirin-facebook"><?php echo __('Facebook Link', 'sirinsoftware')?>:</label></th>
			<td><input type="text" id="sirin-facebook" class="regular-text" name="sirin-facebook" value="<?php echo (get_option('sirin-facebook'))? get_option('sirin-facebook') : '';?>"></td>
		</tr>
	<!-- LinkedIn Link -->
		<tr>
			<th scope="row" align="right"><label for="sirin-linkedin"><?php echo __('LinkedIn Link', 'sirinsoftware')?>:</label></th>
			<td><input type="text" id="sirin-linkedin" class="regular-text" name="sirin-linkedin" value="<?php echo (get_option('sirin-linkedin'))? get_option('sirin-linkedin') : '';?>"></td>
		</tr>
	<!-- Submit form -->
		<tr>
			<th scope="row"><input type="submit" value="<?php echo __('Save', 'sirinsoftware')?>" class="button button-primary button-large"></th>
			<td align="right"></td>
		</tr>
    </table>
</form>