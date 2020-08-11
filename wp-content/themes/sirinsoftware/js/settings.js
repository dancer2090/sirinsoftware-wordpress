jQuery(document).ready(function($){
	
	/*--------------------------------------------------------------
	Upload image
	--------------------------------------------------------------*/
	$(document).on('click', '.upload-btn', function(e) {
		var clickInput=$(this);
		var name=$(this).attr('name');
		e.preventDefault();
		var image = wp.media({ 
			title: 'Upload Image',
			// mutiple: true if you want to upload multiple files at once
			multiple: false
		}).open()
		.on('select', function(e){
			// This will return the selected image from the Media Uploader, the result is an object
			var uploaded_image = image.state().get('selection').first();
			// We convert uploaded_image to a JSON object to make accessing it easier
			// Output to the console uploaded_image
			var image_url = uploaded_image.toJSON().url;
			// Let's assign the url value to the input field
			$('#'+name).val(image_url);
			$('img.'+name).attr('src',image_url);
			$('img.'+name).closest('tr').show();
			$('img.'+name).closest('img').attr('src',image_url);
			$('img.'+name).closest('img').css('display', 'block');
		});
	});

	/*--------------------------------------------------------------
	Count elements
	--------------------------------------------------------------*/
	$('h3.slide-name span').each(function (i) {
		$(this).html(i+1);
	});
	$('h3.office-name span').each(function (i) {
		$(this).html(i+1);
	});
	$('h3.expertise-name span').each(function (i) {
		$(this).html(i+1);
	});
	
	/*--------------------------------------------------------------
	Add home page slide
	--------------------------------------------------------------*/
	$('input[name="add-slide-btn"]').click(function(e) {
		var cntSlide=$(".home-slider.slide").length+1;
		var clonedEl=$(".home-slider.slide#slide1").html();
		
		clonedEl=clonedEl.replace('slide1','slide'+cntSlide);
		clonedEl=clonedEl.replace('slide1-header','slide'+cntSlide+'-header');
		clonedEl=clonedEl.replace('slide1-vision','slide'+cntSlide+'-vision');
		clonedEl=clonedEl.replace('slide1-mission','slide'+cntSlide+'-mission');
		clonedEl=clonedEl.replace('slide1-link','slide'+cntSlide+'-link');
		
		$('.slider').append('<hr><div class="home-slider slide" id="slide'+cntSlide+'">'+clonedEl+'</div>');
		$('textarea[name="slide'+cntSlide+'-header"]').val('');
		$('textarea[name="slide'+cntSlide+'-vision"]').val('');
		$('textarea[name="slide'+cntSlide+'-mission"]').val('');
		$('input[name="slide'+cntSlide+'-link"]').val('');
		$('h3.slide-name span').each(function (i) {
			$(this).html(i+1);
		});
	});
	
	/*--------------------------------------------------------------
	Add new office
	--------------------------------------------------------------*/
	$('input[name="add-office-btn"]').click(function(e) {
		var cntSlide=$(".offices .office-location").length+1;
		var clonedEl=$(".offices .office-location#sirin-office1").html();
		
		clonedEl=clonedEl.replace(/sirin-office1/g,'sirin-office'+cntSlide);
		clonedEl=clonedEl.replace(/size="46" value="(.+?)"/g,'size="46" value=""');
		
		$('.offices').append('<hr><div class="office-location" id="sirin-office'+cntSlide+'">'+clonedEl+'</div>');
		
		$('textarea[name="sirin-office'+cntSlide+'-address"]').val('');
		$('textarea[name="sirin-office'+cntSlide+'-desc"]').val('');
		$('img.sirin-office'+cntSlide+'-btn').hide();
		
		$('h3.office-name span').each(function (i) {
			$(this).html(i+1);
		});
	});
	
	/*--------------------------------------------------------------
	Add new expetrise item
	--------------------------------------------------------------*/
	$(document).on('click', '.expertise input[name="add-new-exp-item-btn"]', function(e) {
		
		var expID=$(this).parents('.expertise').attr('id');
		var clonedItem='<div class="sirin-exp-item" id="sirin-exp1-item1"><label>Item image</label><img src="" alt="" height="100" style="display: none;" class="sirin-exp1-item1-btn"><input type="text" id="sirin-exp1-item1-btn" name="sirin-exp1-item1-img" size="46" value=""><input type="button" name="sirin-exp1-item1-btn" class="button-secondary upload-btn" value="Upload Image"><label>Item title</label><input type="text" name="sirin-exp1-item1-title" size="46" value=""><label>Right description</label><input type="text" name="sirin-exp1-item1-desc" size="46" value=""><input type="hidden" name="sirin-exp1-items[]" value="sirin-exp1-item1"><a href="#" class="remove-item">X</a></div></div>';
		var countItem=$('#'+expID+'-items .sirin-exp-item').length+1;
		var cntExp=$('.expertises .expertise').length;
		
		clonedItem=clonedItem.replace(/sirin-exp1-item1/g,'sirin-exp'+cntExp+'-item'+countItem);
		clonedItem=clonedItem.replace(/sirin-exp1/g,'sirin-exp'+cntExp);
		clonedItem=clonedItem.replace(/src="(.+?)"/g,'src=""');
		
		if(countItem<9){
			$('#'+expID+' .sirin-exp-items').append(clonedItem);
		}
	});
	
	/*--------------------------------------------------------------
	Add new expetrise
	--------------------------------------------------------------*/
	$(document).on('click', 'input[name="add-new-exp-type"]', function(e) {
		var cntExp=$('.expertises .expertise').length+1;
		var clonedExp='<h3 class="expertise-name">Expertise <span></span></h3><div class="exp-title"><label>Expertise Title</label><input type="text" name="sirin-exp1-title" size="46" value=""><input type="hidden" name="sirin-exp[]" value="sirin-exp1"></div><div class="sirin-exp-items" id="sirin-exp1-items"><div class="sirin-exp-item" id="sirin-exp1-item1"><label>Item image</label><img src="" alt="" height="100" style="display: none;" class="sirin-exp1-item1-btn"><input type="text" id="sirin-exp1-item1-btn" name="sirin-exp1-item1-img" size="46" value=""><input type="button" name="sirin-exp1-item1-btn" class="button-secondary upload-btn" value="Upload Image"><label>Item title</label><input type="text" name="sirin-exp1-item1-title" size="46" value=""><label>Right description</label><input type="text" name="sirin-exp1-item1-desc" size="46" value=""><input type="hidden" name="sirin-exp1-items[]" value="sirin-exp1-item1"><a href="#" class="remove-item">X</a></div></div>';
				
		clonedExp='<hr><div class="expertise" id="sirin-exp1">'+clonedExp+'<div style="clear: both;"></div><input type="button" value="Add expertise item" name="add-new-exp-item-btn"></div>';
		clonedExp=clonedExp.replace(/sirin-exp1/g,'sirin-exp'+cntExp);
		
		$('.expertises').append(clonedExp);
		
		$('h3.expertise-name span').each(function (i) {
			$(this).html(i+1);
		});
	});
	
	/*--------------------------------------------------------------
	Remove item
	--------------------------------------------------------------*/
	$(document).on('click', '.sirin-exp-items .sirin-exp-item a.remove-item', function(e) {
		var itemID=$(this).parents('div.sirin-exp-item').attr('id');
		$('#'+itemID).hide();
		
		$('#'+itemID+' input[type="text"]').each(function (i) {
			$(this).val('');
		});
		
		/*
		$.ajax({
		    url: ajax_object.ajax_url, // this is the object instantiated in wp_localize_script function
		    type: 'POST',
		    data:{
		      action: 'remove_item', // this is the function in your functions.php that will be triggered
		      itemid: itemID
		    },
		    success: function(response){
		    	$('#'+itemID).hide();
		    	alert(response);
		    }
		}); 
		*/
	});
	/*--------------------------------------------------------------
	Add new client
	--------------------------------------------------------------*/
	$(document).on('click', '.clients input[name="add-new-client"]', function(e) {
		
		var clonedItem='<div class="client" id="sirin-client1"><img src="" alt="" height="50" style="display: none;" class="sirin-client1-btn"><label for="sirin-client1-btn">Client Logo</label><input type="text" id="sirin-client1-btn" name="sirin-client1-img" size="46" value=""><input type="button" name="sirin-client1-btn" class="button-secondary upload-btn" value="Upload Image"><label for="sirin-client1-link">Client Link</label><input type="text" id="sirin-client1-link" name="sirin-client1-link" size="46" value=""><input type="hidden" name="sirin-clients[]" size="46" value="sirin-client1"><a href="#" class="remove-item">X</a></div>';
		var countItem=$('.clients .client').length+1;
		
		clonedItem=clonedItem.replace(/sirin-client1/g,'sirin-client'+countItem);
		clonedItem=clonedItem.replace(/src="(.+?)"/g,'src=""');
		$('.clients-items').append(clonedItem);
	});
	
	/*--------------------------------------------------------------
	Remove client
	--------------------------------------------------------------*/
	$(document).on('click', '.clients .client a.remove-item', function(e) {
		var itemID=$(this).parents('div.client').attr('id');
		$('#'+itemID).hide();
		
		$('#'+itemID+' input[type="text"]').each(function (i) {
			$(this).val('');
		});
	});
});