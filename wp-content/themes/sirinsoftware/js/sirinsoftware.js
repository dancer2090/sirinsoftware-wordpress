(function($) {

    $('body').on('click','#topActionButton a',function () {
        gtag('event', 'ClickHeaderActionButton', {
            'event_category': 'ClickHeaderActionButton',
        });
    });

	$(document).ready(function() {
		$('body').show();
		$('.toolbar').show();
		$('.video-main').show();
		$('.sidebar').show();
		$('.contacts-top').show();
		$('.page').show();
		$('.popup-wrap').show();
		$('.sidebar-blog-categories').show();
		
		var leadRequestPopup = getCookie('popup');
	    if (leadRequestPopup != 'disable') {
	    	openFancybox();
	    }
	});


    $("body").on('click','.footer-accept-line button',function () {
        $('.footer-accept-line').hide();
        setCookie('accept-privancy-cookie-policy', '1', 30);
    });
	
	$(document).on('click', 'a.fancybox-close', function(){
		if($('.fancybox-outer .fancybox-inner .popup#popup_form_lead .notfront-page').length){
			setCookie('popup','disable',1);
		}
	}); 
	
	console.log("test");
	setTimeout(function(){ 
		console.log("timeout");
		$('body').show();
		$('.toolbar').show();
		$('.video-main').show();
		$('.sidebar').show();
		$('.contacts-top').show();
		$('.page').show();
		$('.popup-wrap').show();
		$('.sidebar-blog-categories').show(); 
	}, 1500);
	if($('li.menu-ico-about').length){
		$('li.menu-ico-about a').prepend('<span class="circle anim-1"><i class="ico ico-about-big"><i></i></i></span>');
	}
	if($('li.menu-ico-services').length){
		$('li.menu-ico-services a').prepend('<span class="circle anim-1"><i class="ico ico-services-big"><i></i></i></span>');
	}
	if($('li.menu-ico-portfolio').length){
		$('li.menu-ico-portfolio a').prepend('<span class="circle anim-1"><i class="ico ico-portfolio-big"><i></i></i></span>');
	}
	if($('li.menu-ico-carrers').length){
		$('li.menu-ico-carrers a').prepend('<span class="circle anim-1"><i class="ico ico-carrers-big"><i></i></i></span>');
	}
	if($('li.menu-ico-blog').length){
		$('li.menu-ico-blog a').prepend('<span class="circle anim-1"><i class="ico ico-blog-big"><i></i></i></span>');
	}
	if($('li.menu-ico-contact').length){
		$('li.menu-ico-contact a').prepend('<span class="circle anim-1"><i class="ico ico-contact-big"><i></i></i></span>');
	}
	
	$(".menu-1 li.menu-item a").each(function(){
		$(this).find('span').addClass('gtm-main-menu');
		$(this).find('i.ico').addClass('gtm-main-menu');
	});
	
	function fbShare(btn) {
		elem = jQuery(btn);
		postToFeed(elem.data('title'), elem.data('desc'), elem.data('link'), elem.data('image'));
		return false;
	};
	
	$('body').on('mousewheel DOMMouseScroll', '.searchwp-live-search-results-showing', function (e) {
		var scrollTo = null;

	    if (e.type == 'mousewheel') {
	        scrollTo = (e.originalEvent.wheelDelta * -1);
	    }
	    else if (e.type == 'DOMMouseScroll') {
	        scrollTo = 40 * e.originalEvent.detail;
	    }

	    if (scrollTo) {
	        e.preventDefault();
	        $(this).scrollTop(scrollTo + $(this).scrollTop());
	    }
	});
	
	$(document).ready(function(){
		if($('.page .expertise').length){
	    	$('.expertise .inner h3').html($('.expertise .inner .slider li').attr('data-group-title'));
		}
		
		$(window).on("load resize", function(){
			if($("html").attr("w")>599){
				$(".contacts.home .item .inner").each(function(){
					var imageUrl=$(this).attr('data-white-logo');
					$(this).css('background-image', 'url(' + imageUrl + ')');
				});
			}else{
				$(".contacts.home .item .inner").each(function(){
					var imageUrl=$(this).attr('data-black-logo');
					$(this).css('background-image', 'url(' + imageUrl + ')');
				});
			}
		});
	});
	$('.social-popup').click(function(event) {
		event.preventDefault();
	    var socialName   = $(this).attr('id');
	    	width  = 575,
	        height = 400,
	        left   = ($(window).width()  - width)  / 2,
	        top    = ($(window).height() - height) / 2,
	        url    = this.href,
	        opts   = 'status=1' +
	                 ',width='  + width  +
	                 ',height=' + height +
	                 ',top='    + top    +
	                 ',left='   + left;
	    
	    window.open(url, socialName, opts);
	    return false;
	  });
	
	
	$('#FileUpload').change(function() {
        var filename = $('#FileUpload').val().replace(/C:\\fakepath\\/i, '');
        $('.cover-resume .file-name').html('');
        $('.cover-resume .file-name').append('<a href="javascript:;" onclick="removeUpFile(this);" class="btn btn-del"><i class="ico ico-del-1"><i></i></i></a><span>'+filename+'</span>');
    });

	
	/* 
	 * Send CV Form 
	 */
	$('.cover-resume button.btn-send').on('click',function(event){
		event.preventDefault();
		var $form = $(this).closest("form");
		$("*").removeClass("error");
		
		// проверка поля "Your Name"
		//if ( !jQuery.trim($form.find(":input[name=name]").val()).length ) {
		var name = $form.find(":input[name=name]").val();
		if ( !(/^[a-zA-Z\s]*$/).test(name) ) {
			$form.find(":input[name=name]").focus().closest(".field").addClass("error");
			return false;						
		}
		if(jQuery.trim($form.find(":input[name=name]").val()).length>30){
			$form.find(":input[name=name]").closest(".field").find(".error-text").html('Entered data too long (Max length 30 symbols)');
			$form.find(":input[name=name]").focus().closest(".field").addClass("error");
			return false;
		}
			
		// проверка поля "Your Email"  
		var email = $form.find(":input[name=email]").val();
		if ( !(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/).test(email) ) {
			$form.find(":input[name=email]").focus().closest(".field").addClass("error");  
			return false;
		}
		if(jQuery.trim($form.find(":input[name=email]").val()).length>50){
			$form.find(":input[name=email]").closest(".field").find(".error-text").html('Entered data too long (Max length 50 symbols)');
			$form.find(":input[name=email]").focus().closest(".field").addClass("error");
			return false;
		}
			
		// проверка поля "Your Phone"
		var phone = $form.find(":input[name=phone]").val();
		//if ( !jQuery.trim($form.find(":input[name=phone]").val()).length ) {
		if ( !(/^[0-9-+\s]+$/).test(phone) ) {
			$form.find(":input[name=phone]").focus().closest(".field").addClass("error");
			return false;				
		}
		if(jQuery.trim($form.find(":input[name=phone]").val()).length>20){
			$form.find(":input[name=phone]").closest(".field").find(".error-text").html('Entered data too long (Max length 20 symbols)');
			$form.find(":input[name=phone]").focus().closest(".field").addClass("error");
			return false;
		}
		
		//проверка поля "Cover Letter / Message"
		if(jQuery.trim($form.find(":input[name=message]").val()).length>1000){
			$form.find(":input[name=message]").closest(".field").find(".error-text").html('Entered text too long (Max length 1000 symbols)');
			$form.find(":input[name=message]").focus().closest(".field").addClass("error");
			return false;
		}
		
		var ext = $('#FileUpload').val().split('.').pop().toLowerCase();
		if($.inArray(ext, ['pdf','doc','docx','rtf']) == -1) {
			$form.find(".file-attach").focus().addClass("error");
			return false;	
		}
		
		var pdata=$form.serialize()+'&action=getReCaptcha';
		$.ajax({
			url: ajax_object.ajaxurl, // this is the object instantiated in wp_localize_script function
			type: 'POST',
			data: pdata,
			success: function(response){
				if(response=='OK'){
					$form.submit();
				}else{
					$form.find(".g-recaptcha").focus().closest(".field").addClass("error");
					return false;
				}
			}
		});
	});
	
	/* 
	 * Validate comment
	 */
	$('.comment-form .btn-wrap button.btn-01').on('click',function(event){
		event.preventDefault();
		var $form = $(this).closest("form");
		$("*").removeClass("error");
		
		// проверка поля "Your Name"
		var name = $form.find(":input[name=author]").val();
		if ( !(/^[a-zA-Z\s]*$/).test(name) || !jQuery.trim($form.find(":input[name=author]").val()).length) {
			$form.find(":input[name=author]").focus().closest(".field").addClass("error");
			return false;						
		}
			
		// проверка поля "Your Email"  
		var email = $form.find(":input[name=email]").val();
		if ( !(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/).test(email) ) {
			$form.find(":input[name=email]").focus().closest(".field").addClass("error");  
			return false;
		}
		
		// проверка поля "Your Project Description" 
		if ( !jQuery.trim($form.find("textarea[name=comment]").val()).length ) {
			$form.find("textarea[name=comment]").focus().closest(".field").addClass("error");
			return false;						
		}
		if(jQuery.trim($form.find(":input[name=comment]").val()).length>1000){
			$form.find(":input[name=comment]").closest(".field").find(".error-text").html('Entered text too long (Max length 1000 symbols)');
			$form.find(":input[name=comment]").focus().closest(".field").addClass("error");
			return false;
		}
		
		var pdata=$form.serialize()+'&action=getReCaptcha';
		$.ajax({
			url: ajax_object.ajaxurl, // this is the object instantiated in wp_localize_script function
			type: 'POST',
			data: pdata,
			success: function(response){
				if(response=='OK'){
					$form.submit();
				}else{
					$form.find(".g-recaptcha").focus().closest(".field").addClass("error");
					return false;
				}
			}
		});
	});
	
	
	/* Subscribe form */
	$('.subscribe button.btn-01').on('click',function(event){
		event.preventDefault();
		var $form = $(this).closest("form");
		$("*").removeClass("error");
			
		// проверка поля "Your Email"  
		var email = $form.find(":input[name=EMAIL]").val();
		if ( !(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/).test(email) ) {
			$form.find(":input[name=EMAIL]").focus().closest(".field").addClass("error");  
			return false;
		}
		
		// проверка поля "Your Name"
		var name = $form.find(":input[name=FNAME]").val();
		if ( !(/^[a-zA-Z\s]*$/).test(name) || !jQuery.trim($form.find(":input[name=FNAME]").val()).length) {
			$form.find(":input[name=FNAME]").focus().closest(".field").addClass("error");
			return false;						
		}
		
		//$form.submit();
		
		var pdata=$form.serialize()+'&action=MailChimpSubscribe';
		$.ajax({
			url: ajax_object.ajaxurl, // this is the object instantiated in wp_localize_script function
			type: 'POST',
			data: pdata,
			success: function(response){
				if(response=='OK'){
					$form.closest(".subscribe").append("<p>Thank you for subscribing! The confirmation email was sent to your address, please validate it.</p>");
				}else{
					$form.closest(".subscribe").append("<p>Error. Try later.</p>");
				}
				$form.remove();
			}
		});
		
	});
	
	/* Subscribe form in Footer */
	$('.subscr.footer button.btn-10').on('click',function(event){
		event.preventDefault();
		var $form = $(this).closest("form");
		$("*").removeClass("error");
			
		// проверка поля "Your Email"  
		var email = $form.find(":input[name=email]").val();
		if ( !(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/).test(email) ) {
			$form.find(":input[name=email]").focus().closest(".field").addClass("error");  
			return false;
		}

		//$form.submit();
		
		var pdata=$form.serialize()+'&action=MailChimpSubscribeFooter';
		$.ajax({
			url: ajax_object.ajaxurl, // this is the object instantiated in wp_localize_script function
			type: 'POST',
			data: pdata,
			success: function(response){
				if(response=='OK'){
					$form.closest(".subscr.footer .inner").append('<div class="msg"><p class="title">Thank you for subscribing!</p><p>The confirmation email was sent to your address, please validate it.</p></div>');
				}else{
					$form.closest(".subscr.footer .inner").append('<div class="msg"><p class="title">Error. Try later.</p></div>');
				}
				$form.remove();
				$(".subscr.footer .header").hide();
			}
		});
	});
	 
	/* Get presentation Public*/
	$('.section-presentation .fancybox').hover(function(){
		var DownloadLink=$(this).closest(".buttons").find('.btn-download').attr('data-link');
		$('.popup-wrap .presentation input[name="presentation_link"]').val(DownloadLink);
		if ( $( this ).hasClass( "btn-download" ) ) {
			$('#popup_form_general_presentation form .bottom').html('<button type="submit" class="btn btn-01 btn-download"><span>download</span><i class="ico ico-download-1"><i></i></i></button><a class="btn btn-01 btn-download" style="display: none;" href="'+DownloadLink+'" download><span>Download</span><i class="ico ico-download-1"><i></i></i></a>');
			$('#popup_form_general_presentation h1').text('Download presentation');
		}
		if ( $( this ).hasClass( "btn-email" ) ) {
			$('#popup_form_general_presentation form .bottom').html('<button type="submit" class="btn btn-01 btn-email"><span>send</span><i class="ico ico-mail-4"><i></i></i></button>');
			$('#popup_form_general_presentation h1').html('Send presentation');
		}
		
	});
	
	var rejectDownload = true;
	$('body').on('click', '.presentation button.btn-01', function (event){
		var elem=$(this);
		event.preventDefault();
		
		var $form = $(this).closest("form");
		$("*").removeClass("error");
			
		// проверка поля "Your Email"  
		var email = $form.find(":input[name=email]").val();
		if ( !(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/).test(email) ) {
			$form.find(":input[name=email]").focus().closest(".field").addClass("error");  
			return false;
		}
		
		// проверка поля "Your Name"
		var name = $form.find(":input[name=first_name]").val();
		if ( !(/^[a-zA-Z\s]*$/).test(name) || !jQuery.trim($form.find(":input[name=first_name]").val()).length) {
			$form.find(":input[name=first_name]").focus().closest(".field").addClass("error");
			return false;						
		}
		
		var pdata=$form.serialize()+'&action=GetPresentation';
		$.ajax({
			url: ajax_object.ajaxurl, // this is the object instantiated in wp_localize_script function
			type: 'POST',
			data: pdata,
			success: function(response){
				if($form.find("button").hasClass( "btn-email" )){
					if(response=='OK'){
						$.ajax({
							url: $form.attr('action'), // this is the object instantiated in wp_localize_script function
							type: 'POST',
							data: pdata
						})
						$form.closest(".presentation").append("<p>Thank you for your interest. Check your email.</p>");
					}else{
						$form.closest(".presentation").append("<p>Error. Try later.</p>");
					}
					
				}
				if($form.find(".bottom a").hasClass( "btn-download" )){
					$form.closest(".presentation").append("<p>Start download</p>");
					var a = document.createElement('a');
					a.download = 'Presentation.pdf';
					a.href = $form.find(".bottom a.btn-download" ).attr('href');
					a.click();
				}
				$form.remove();
				setTimeout(function() { $form.submit() }, 3000);
			}
		});
	});
	
	/* Get presentation Private*/
	$('body').on('click', '.section-presentation-extended button.btn-01', function (event){
		event.preventDefault();
		
		var $form = $(this).closest("form");
		$("*").removeClass("error");
		
		// проверка поля "Your Name"
		var name = $form.find(":input[name=first_name]").val();
		if ( !(/^[a-zA-Z\s]*$/).test(name) || !jQuery.trim($form.find(":input[name=first_name]").val()).length) {
			$form.find(":input[name=first_name]").focus().closest(".field").addClass("error");
			return false;
		}
		
		// проверка поля "Your Email"  
		var email = $form.find(":input[name=email]").val();
		if ( !(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/).test(email) ) {
			$form.find(":input[name=email]").focus().closest(".field").addClass("error");  
			return false;
		}
		
		var pdata=$form.serialize()+'&action=GetPresentation';
		$.ajax({
			url: ajax_object.ajaxurl, // this is the object instantiated in wp_localize_script function
			type: 'POST',
			data: pdata,
			success: function(response){
				if(response=='OK'){
					$.ajax({
						url: $form.attr('action'), // this is the object instantiated in wp_localize_script function
						type: 'POST',
						data: pdata
					});
					$form.closest(".section-presentation-extended .inner").append("<p>Thank you for your interest. Check your email.</p>");
				}else {
					$form.closest(".section-presentation-extended .inner").append("<p>Error. Try later.</p>");
				}
				$form.remove();
				setTimeout(function() { $form.submit() }, 3000);
			}
		});
	});
	
	
})(jQuery);

var reCaptchaCallback = function() {
    var elements = document.getElementsByClassName('g-recaptcha');
    for (var i = 0; i < elements.length; i++) {
        var id = elements[i].getAttribute('id');
        grecaptcha.render(id, {
            // 'sitekey' : '6LecKSoTAAAAAMfMuinkWWQJ9ls0_1Q_8nTMGr7e',
            //recaptcha site_key sitekey site.key
            'sitekey' : '6LeLIDgUAAAAAAvVNV4f6ID51eeemlbTldSg2mkj',
            'theme' : 'light'
        });
    }
};

function reCaptchaChecked(){
	jQuery("#tellFormBtn").removeClass('disabled');
	jQuery("#captcha-wrap").removeClass("error");
	// console.log(jQuery("#tellFormBtn"));
}
/** 
 * Send Project From
 */
function sendFormProject(btn) {

    gtag('event', 'ClickSendFooterForm', {
        'event_category': 'ClickSendFooterForm',
    });

	//console.log('checkForm');
	var $form = jQuery(btn).closest("form");
	jQuery("*").removeClass("error");

	// проверка поля "Your Name"
	var name = jQuery.trim($form.find(":input[name=first_name]").val());
	if ( !(/^[a-zA-Z\s]*$/).test(name) || !jQuery.trim($form.find(":input[name=first_name]").val()).length) {
		$form.find(":input[name=first_name]").focus().closest(".field").addClass("error");
		return false;						
	}
	if(jQuery.trim($form.find(":input[name=first_name]").val()).length>30){
		$form.find(":input[name=first_name]").closest(".field").find(".error-text").html('Entered data too long (Max length 30 symbols)');
		$form.find(":input[name=first_name]").focus().closest(".field").addClass("error");
		return false;
	}
		
	// проверка поля "Your Email"  
	var email = $form.find(":input[name=email]").val();
	if ( !(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/).test(email) ) {
		$form.find(":input[name=email]").focus().closest(".field").addClass("error");  
		return false;
	}
	if(jQuery.trim($form.find(":input[name=email]").val()).length>50){
		$form.find(":input[name=email]").closest(".field").find(".error-text").html('Entered data too long (Max length 50 symbols)');
		$form.find(":input[name=email]").focus().closest(".field").addClass("error");
		return false;
	}
		
	// проверка поля "Your Phone"
	var phone = $form.find(":input[name=phone]").val();
	//if ( !jQuery.trim($form.find(":input[name=phone]").val()).length ) {
	if ( !(/^[0-9-+\s]+$/).test(phone) ) {
		$form.find(":input[name=phone]").focus().closest(".field").addClass("error");
		return false;						
	}
	if(jQuery.trim($form.find(":input[name=phone]").val()).length>20){
		$form.find(":input[name=phone]").closest(".field").find(".error-text").html('Entered data too long (Max length 20 symbols)');
		$form.find(":input[name=phone]").focus().closest(".field").addClass("error");
		return false;
	}
	
	// проверка поля "Your Project Description" 
	if ( !jQuery.trim($form.find(":input[name=description]").val()).length) {
		$form.find(":input[name=description]").focus().closest(".field").addClass("error");
		return false;
	}
	if(jQuery.trim($form.find(":input[name=description]").val()).length>1000) {
		$form.find(":input[name=description]").closest(".field").find(".error-text").html('Entered text too long (Max length 1000 symbols)');
		$form.find(":input[name=description]").focus().closest(".field").addClass("error");
		return false;
	}
	
	// проверка полей "Бюджет" - галка должна где-нибудь стоять, а иначе ошибка
	/*
	if($form.attr('id')!='withoutBudget'){
		if ( !$form.find("input[name=budget]:checked").length ) {
			$form.find(".part-3").addClass("error");
			//console.log('budget');
			return false;
		}
	}
	*/

	//проверка на галочку privacy policy
    if($form.find(":input[name='accetp-with']").is(":checked") === false) {
        $form.find(":input[name='accetp-with']").focus().closest(".field").addClass("error");
        return false;
    }

    //проверка на галочку privacy policy
    if($form.find(":input[name='accetp-with']").is(":checked") === false) {
        $form.find(":input[name='accetp-with']").focus().closest(".field").addClass("error");
        return false;
    }


    if($form.find('[name="g-recaptcha-response"]').val() === '') {
        $form.find('[name="g-recaptcha-response"]').parents('.field').addClass("error");
        return false;
	} else {
        $form.find('[name="g-recaptcha-response"]').parents('.field').removeClass("error")
	}

    $form.find(".field").removeClass("error");
    jQuery.ajax({
        url: ajax_object.ajaxurl, // this is the object instantiated in wp_localize_script function
        type: 'POST',
        data:{
            action: 'sendFormData', // this is the function in your functions.php that will be triggered
            name: $form.find(":input[name=first_name]").val(),
            email: $form.find(":input[name=email]").val(),
            phone: $form.find(":input[name=phone]").val(),
            description: $form.find(":input[name=description]").val(),
			recaptcha: $form.find('[name="g-recaptcha-response"]').val(),
            //budget: $form.find(":input[name=budget]:checked").val()
        },
        success:function (data) {
            setCookie('popup','disable',1);
            console.log(data);
            if(data === 'good') {
                gtag('event', 'SendEmailFromFooterForm', {
                    'event_category': 'SendEmailFromFooterForm',
                });
                jQuery('a.fancybox-close').trigger('click');
                jQuery('#popup_form_thank_you').fancybox().click();
                jQuery('#tellFormBtn').hide();
                $form.find(".field").removeClass("error");
                // $form.find(".error-text").hide();
                // jQuery('#captcha-wrap').hide();
            }
        }
    });

    if(jQuery(btn).hasClass('disabled')){
        jQuery("#captcha-wrap").addClass("error");
    } else {
        setCookie('popup','disable',1);
        jQuery(btn).poshytip('show').poshytip('hideDelayed', 2500);
        // setTimeout(function() { $form.submit() }, 3000);
    }
    // $form.find(".field").removeClass("error");
}

function sendFormProjectModal(btn) {

    gtag('event', 'ClickSendModalForm', {
        'event_category': 'ClickSendModalForm',
    });

    //console.log('checkForm');
    var $form = jQuery(btn).closest("form");
    jQuery("*").removeClass("error");

    // проверка поля "Your Name"
    var name = jQuery.trim($form.find(":input[name=first_name]").val());
    if ( !(/^[a-zA-Z\s]*$/).test(name) || !jQuery.trim($form.find(":input[name=first_name]").val()).length) {
        $form.find(":input[name=first_name]").focus().closest(".field").addClass("error");
        return false;
    }
    if(jQuery.trim($form.find(":input[name=first_name]").val()).length>30){
        $form.find(":input[name=first_name]").closest(".field").find(".error-text").html('Entered data too long (Max length 30 symbols)');
        $form.find(":input[name=first_name]").focus().closest(".field").addClass("error");
        return false;
    }

    // проверка поля "Your Email"
    var email = $form.find(":input[name=email]").val();
    if ( !(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/).test(email) ) {
        $form.find(":input[name=email]").focus().closest(".field").addClass("error");
        return false;
    }
    if(jQuery.trim($form.find(":input[name=email]").val()).length>50){
        $form.find(":input[name=email]").closest(".field").find(".error-text").html('Entered data too long (Max length 50 symbols)');
        $form.find(":input[name=email]").focus().closest(".field").addClass("error");
        return false;
    }

    // проверка поля "Your Project Description"
    if ( !jQuery.trim($form.find(":input[name=description]").val()).length) {
        $form.find(":input[name=description]").focus().closest(".field").addClass("error");
        return false;
    }
    if(jQuery.trim($form.find(":input[name=description]").val()).length>1000){
        $form.find(":input[name=description]").closest(".field").find(".error-text").html('Entered text too long (Max length 1000 symbols)');
        $form.find(":input[name=description]").focus().closest(".field").addClass("error");
        return false;
    }

    //проверка на галочку privacy policy
    if($form.find(":input[name='accetp-with']").is(":checked") === false) {
        $form.find(":input[name='accetp-with']").focus().closest(".field").addClass("error");
        return false;
    }



    if($form.find('[name="g-recaptcha-response"]').val() === '') {
        $form.find('[name="g-recaptcha-response"]').parents('.field').addClass("error");
        return false;
    } else {
        $form.find('[name="g-recaptcha-response"]').parents('.field').removeClass("error")
    }

	$form.find(".field").removeClass("error");

	jQuery.ajax({
		url: ajax_object.ajaxurl, // this is the object instantiated in wp_localize_script function
		type: 'POST',
		data:{
			action: 'sendFormData', // this is the function in your functions.php that will be triggered
			name: $form.find(":input[name=first_name]").val(),
			email: $form.find(":input[name=email]").val(),
			description: $form.find(":input[name=description]").val(),
			recaptcha: $form.find('[name="g-recaptcha-response"]').val()
		},
		success: function(data) {
			setCookie('popup','disable',1);
			console.log(data);
			if(data === 'good') {
                gtag('event', 'SendEmailFromModalForm', {
                    'event_category': 'SendEmailFromModalForm',
                });
				jQuery('a.fancybox-close').trigger('click');
				jQuery('#popup_form_thank_you').fancybox().click();
				// jQuery('#button_send_modal').hide();
			}
		}
	});

	if(jQuery(btn).hasClass('disabled')){
		jQuery("#captcha-wrap").addClass("error");
	} else {
		setCookie('popup','disable',1);
		jQuery(btn).poshytip('show').poshytip('hideDelayed', 2500);
		// setTimeout(function() { $form.submit() }, 3000);
	}
    $form.find(".field").removeClass("error");
}


function removeUpFile(btn) {
	jQuery('.cover-resume .file-name').html('');
	jQuery('#FileUpload').val('');
}


function sendFormFooter(btn) {
	var $form = jQuery(btn).closest("form");
	
	jQuery.ajax({
		url: ajax_object.ajaxurl, // this is the object instantiated in wp_localize_script function
		type: 'POST',
		data:{
			action: 'getCaptchaString', // this is the function in your functions.php that will be triggered
		},
		success: function(response){
			if(response!=$form.find(":input[name=captcha]").val()){
				$form.find(":input[name=captcha]").focus().closest(".field").addClass("error");
				return false;
			}else{
				$form.find(".field").removeClass("error");
				jQuery(btn).poshytip('show').poshytip('hideDelayed', 2500); 	
			}
		}
	});
}

function openFancybox() {
	if(jQuery('.popup-lead-timeout a.btn.fancybox').length){
		setTimeout( function() {
			jQuery('.popup-lead-timeout a.btn.fancybox').trigger('click'); 
		},15000);
	}
}
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}