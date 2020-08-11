<form method="POST">
	<table class="form-table">
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
	<!-- Email for book download -->
		<tr>
			<th scope="row" align="right"><label for="sirin-sales-book-email"><?php echo __('Sales manager Email for book', 'sirinsoftware')?>:</label></th>
			<td><input type="text" id="sirin-sales-book-email" class="regular-text" name="sirin-sales-book-email" value="<?php echo (get_option('sirin-sales-book-email'))? get_option('sirin-sales-book-email') : '';?>"></td>
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
	<!-- Twitter Link -->
		<tr>
			<th scope="row" align="right"><label for="sirin-twitter"><?php echo __('Twitter Link', 'sirinsoftware')?>:</label></th>
			<td><input type="text" id="sirin-twitter" class="regular-text" name="sirin-twitter" value="<?php echo (get_option('sirin-twitter'))? get_option('sirin-twitter') : '';?>"></td>
		</tr>
        <!-- Dou Link -->
        <tr>
            <th scope="row" align="right"><label for="sirin-dou"><?php echo __('Dou Link', 'sirinsoftware')?>:</label></th>
            <td><input type="text" id="sirin-dou" class="regular-text" name="sirin-dou" value="<?php echo (get_option('sirin-dou'))? get_option('sirin-dou') : '';?>"></td>
        </tr>
        <!-- Clutch Link -->
        <tr>
            <th scope="row" align="right"><label for="sirin-clutch"><?php echo __('Clutch Link', 'sirinsoftware')?>:</label></th>
            <td><input type="text" id="sirin-clutch" class="regular-text" name="sirin-clutch" value="<?php echo (get_option('sirin-clutch'))? get_option('sirin-clutch') : '';?>"></td>
        </tr>
        <!-- Privacy Policy Link -->
        <tr>
            <th scope="row" align="right"><label for="sirin-privacy-policy"><?php echo __('Privacy Policy Link', 'sirinsoftware')?>:</label></th>
            <td><input type="text" id="sirin-privacy-policy" class="regular-text" name="sirin-privacy-policy" value="<?php echo (get_option('sirin-privacy-policy'))? get_option('sirin-privacy-policy') : '';?>"></td>
        </tr>
        <!-- Cookies Policy Link -->
        <tr>
            <th scope="row" align="right"><label for="sirin-cookies-policy"><?php echo __('Cookies Policy Link', 'sirinsoftware')?>:</label></th>
            <td><input type="text" id="sirin-cookies-policy" class="regular-text" name="sirin-cookies-policy" value="<?php echo (get_option('sirin-cookies-policy'))? get_option('sirin-cookies-policy') : '';?>"></td>
        </tr>
        <!-- Buttom Policy and Cookie Line -->
        <tr>
            <th scope="row" align="right"><label for="sirin-cookies-policy"><?php echo __('Buttom Policy and Cookie Line', 'sirinsoftware')?>:</label></th>
            <td><input type="checkbox" value="yes" id="sirin-bottom-policy-cookie-line" name="sirin-bottom-policy-cookie-line" <?php if(get_option('sirin-bottom-policy-cookie-line') == 'yes') { echo  'checked'; } else { echo ''; } ;?>></td>
        </tr>
        <!-- Submit form -->
		<tr>
			<th scope="row"><input type="submit" value="<?php echo __('Save', 'sirinsoftware')?>" class="button button-primary button-large"></th>
			<td align="right"></td>
		</tr>
    </table>
</form>