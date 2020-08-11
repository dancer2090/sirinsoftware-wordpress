(function($) {

    $('body').on('click','#topActionButton a',function () {
        gtag('event', 'Click header action button', {
            'event_category': 'Click header action button',
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
    function sendCV() {


        var form = document.forms.CV_send;
        var formData = new FormData(form);
        formData.append('action','sendCVFormData');
        var formFied = $('form[name="CV_send"]');
        formFied.find('.btn-send').attr('disabled', true);

        $.ajax({
            url: ajax_object.ajaxurl, // this is the object instantiated in wp_localize_script function
            action: 'sendCVFormData',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {

            	//reponse - status, name, vacancy
                var popup = $('#popup_form_thank_you');

                if(response.status === 'good'){
					console.log('good popup result');
					popup.fancybox().click();
                    popup.find('h1').html(response.name+', thank you for applying CV on our vacancy '+response.vacancy);
                    popup.find('h4').html('We will review your resume and send you our feedback during the next 5 days.')

                    gtag('event', 'CV sended', {
                        'event_category': 'CV sended'
                    });
                } else {
                    popup.fancybox().click();
                    popup.find('h1').html('Something went wrong!');
                    popup.find('h4').html('Please, contact us to hr@sirinsoftware.com');
				}

                formFied.find('input').val('');
                formFied.find('textarea').val('').html('');
            }
        });
    }

    /*
	 * Send Book Form
	 */
    function sendBook() {

        var form = document.forms.Book_send;
        var formData = new FormData(form);
        formData.append('action','sendBookData');

		$('.book-page button.btn-send').css({display:"none"});
        $.ajax({
            url: ajax_object.ajaxurl, // this is the object instantiated in wp_localize_script function
            action: 'sendBookData',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {

                var popup = $('#popup_form_thank_you');
                var template_url = $('input[name="gettepmlatedirectoryuri"]').val();
                var book_url_mobile = template_url+'/sirindesign/build/img/SW-guide-mobile.pdf';
                var book_url_desctop = template_url+'/sirindesign/build/img/SW-guide-desctop.pdf';
                var book_url;
                var device;
                if(window.innerWidth > 768) {
					book_url = 	book_url_desctop;
					device = 'desctop'
				} else {
                	book_url = book_url_mobile;
					device = 'mobile';
				}
                if(response === 'good'){
					popup.fancybox().click();
                    popup.find('h1').html('Thank you for your request!');
                    popup.find('h4').addClass('book').html('').append('<span class="'+device+'">You can download your book <a href="'+book_url+'" >here</a></span>')
                } else {
                    popup.fancybox().click();
                    popup.find('h1').html('Something went wrong!');
                    popup.find('h4').html('Please, contact us to info@sirinsoftware.com');
				}

				$('.book-page button.btn-send').css({display:"block"});
                $('#Book_send').find('input').val('');
            }
        });
    }

    $('#popup_form_thank_you').on('click', 'h4.book a', function (e) {
		e.preventDefault();
		var url = $(this).attr('href');
		downloadURI(url, 'SIRIN SOFTWARE’S GUIDE TO OUTSOUTCING SOFTWARE DEVELOPMENT');
	});


	$('.cover-resume button.btn-send').on('click',function(event){

        gtag('event', 'Click Send to CV', {
            'event_category': 'Click Send to CV'
        });

		event.preventDefault();
		var $form = $(this).closest("form");
		var error = [];
		$("*").removeClass("error");
		
		// проверка поля "Your Name"
		//if ( !jQuery.trim($form.find(":input[name=name]").val()).length ) {
		var name = $form.find(":input[name=name]").val();
		if ( name.length < 2 ) {
			$form.find(":input[name=name]").closest(".field").addClass("error");
			error.push('name');
		}
		if ( !(/^[a-zA-Z\s]*$/).test(name) ) {
			$form.find(":input[name=name]").closest(".field").addClass("error");
			error.push('name');
		}
		if(jQuery.trim($form.find(":input[name=name]").val()).length>30){
			$form.find(":input[name=name]").closest(".field").find(".error-text").html('Entered data too long (Max length 30 symbols)');
			$form.find(":input[name=name]").closest(".field").addClass("error");
			error.push('name');
		}
			
		// проверка поля "Your Email"  
		var email = $form.find(":input[name=email]").val();
		if ( !(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/).test(email) ) {
			$form.find(":input[name=email]").closest(".field").addClass("error");
			error.push('email');
		}
		if(jQuery.trim($form.find(":input[name=email]").val()).length>50){
			$form.find(":input[name=email]").closest(".field").find(".error-text").html('Entered data too long (Max length 50 symbols)');
			$form.find(":input[name=email]").closest(".field").addClass("error");
			error.push('email');
		}
			
		// проверка поля "Your Phone"
		var phone = $form.find(":input[name=phone]").val();
		//if ( !jQuery.trim($form.find(":input[name=phone]").val()).length ) {
		if ( !(/^[0-9-+\s]+$/).test(phone) ) {
			$form.find(":input[name=phone]").closest(".field").addClass("error");
			error.push('phone');
		}
		if(jQuery.trim($form.find(":input[name=phone]").val()).length>20){
			$form.find(":input[name=phone]").closest(".field").find(".error-text").html('Entered data too long (Max length 20 symbols)');
			$form.find(":input[name=phone]").closest(".field").addClass("error");
			error.push('phone');
		}
		
		//проверка поля "Cover Letter / Message"
		if(jQuery.trim($form.find(":input[name=message]").val()).length>1000){
			$form.find(":input[name=message]").closest(".field").find(".error-text").html('Entered text too long (Max length 1000 symbols)');
			$form.find(":input[name=message]").closest(".field").addClass("error");
			error.push('message');
		}
		
		var ext = $('#FileUpload').val().split('.').pop().toLowerCase();
		if($.inArray(ext, ['pdf','doc','docx','rtf']) == -1) {
			$form.find(".file-attach").addClass("error");
			error.push('file');
		}

		if(!is_recaptcha()) {
			error.push('captcha');
		}

		//проверка на галочку privacy policy
		if($form.find(":input[name='accetp-with']").is(":checked") === false) {
			$form.find(":input[name='accetp-with']").closest(".field").addClass("error");
			error.push('accetp-with');
		}

		if(error.length !== 0) {
			return false;
		}

		if($form.find(":input[name='accetp-with']").is(":checked") === true) {
			mailChimp.add(name, email);
			mailChimp.subscribe();
		}

		sendCV();
	});
    
    
    $('.book-page button.btn-send').on('click',function(event){
    	
		console.log(event);
		event.preventDefault();
		var $form = $(this).closest("form");
		var error = [];
		$("*").removeClass("error");
		
		// проверка поля "Your Name"


		var first_name = $form.find(":input[name=first_name]").val();
		if ( !jQuery.trim($form.find(":input[name=first_name]").val()).length ) {
			$form.find(":input[name=first_name]").closest(".form-group").addClass("error");
			error.push('first_name');
		}
		if ( !(/^[a-zA-Z\s]*$/).test(first_name) ) {
			console.log('fn error');
			$form.find(":input[name=first_name]").closest(".form-group").addClass("error");
			error.push('first_name');
		}
		if(jQuery.trim($form.find(":input[name=first_name]").val()).length>30){
			$form.find(":input[name=first_name]").closest(".form-group").find(".error-text").html('Entered data too long (Max length 30 symbols)');
			$form.find(":input[name=first_name]").closest(".form-group").addClass("error");
			error.push('first_name');
		}
		if ( !jQuery.trim($form.find(":input[name=last_name]").val()).length ) {
			$form.find(":input[name=last_name]").closest(".form-group").addClass("error");
			error.push('firstname');
		}
		var last_name = $form.find(":input[name=last_name]").val();
		if ( !(/^[a-zA-Z\s]*$/).test(last_name) ) {
			$form.find(":input[name=last_name]").closest(".form-group").addClass("error");
			error.push('last_name');
		}
		if(jQuery.trim($form.find(":input[name=last_name]").val()).length>30){
			$form.find(":input[name=last_name]").closest(".form-group").find(".error-text").html('Entered data too long (Max length 30 symbols)');
			$form.find(":input[name=last_name]").closest(".form-group").addClass("error");
			error.push('last_name');
		}
		if ( !jQuery.trim($form.find(":input[name=company]").val()).length ) {
			$form.find(":input[name=company]").closest(".form-group").addClass("error");
			error.push('firstname');
		}
		var company = $form.find(":input[name=company]").val();
		if ( !(/^[a-zA-Z\s]*$/).test(company) ) {
			$form.find(":input[name=company]").closest(".form-group").addClass("error");
			error.push('company');
		}
		if(jQuery.trim($form.find(":input[name=company]").val()).length>30){
			$form.find(":input[name=company]").closest(".form-group").find(".error-text").html('Entered data too long (Max length 30 symbols)');
			$form.find(":input[name=company]").closest(".form-group").addClass("error");
			error.push('company');
		}
		// проверка поля "Your Email"  
		var email = $form.find(":input[name=email]").val();
		if ( !(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/).test(email) ) {
			$form.find(":input[name=email]").closest(".form-group").addClass("error");
			error.push('email');
		}
		if(jQuery.trim($form.find(":input[name=email]").val()).length>50){
			$form.find(":input[name=email]").closest(".form-group").find(".error-text").html('Entered data too long (Max length 50 symbols)');
			$form.find(":input[name=email]").closest(".form-group").addClass("error");
			error.push('email');
		}

		//проверка на галочку privacy policy
		if($form.find(":input[name='accetp-with']").is(":checked") === false) {
			$form.find(":input[name='accetp-with']").closest(".form-group").addClass("error");
			error.push('accetp-with');
		}

		if(error.length>0) {
			return false;
		}

		sendBook();
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
		if(!is_recaptcha()) {
			return false;
		}

		$form.submit();
	});
	
	
	/* Subscribe form */
	$('.subscribe-button-send').on('click',function(event){
		event.preventDefault();
		var $form = $(this).closest("form");
		$("*").removeClass("error");

        // проверка поля "Your Name"
        var name = $form.find(":input[name=FNAME]").val();
        if ( !(/^[a-zA-Z\s]*$/).test(name) || !jQuery.trim($form.find(":input[name=FNAME]").val()).length) {
            $form.find(":input[name=FNAME]").focus().closest(".form-group").addClass("error");
            return false;
        }

        // проверка поля "Your Email"
        var email = $form.find(":input[name=EMAIL]").val();
        if ( !(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/).test(email) ) {
			$form.find(":input[name=EMAIL]").focus().closest(".form-group").addClass("error");
			return false;
        }
        $.fancybox.close();
		var pdata=$form.serialize()+'&action=MailChimpSubscribe';
		$.ajax({
			url: ajax_object.ajaxurl, // this is the object instantiated in wp_localize_script function
			type: 'POST',
			data: pdata,
			success: function(response){

				if(response=='OK') {
                    $('#popup-subscribe-modal-done').fancybox().click();
				}
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

/** 
 * Send Project From
 */
///////////////////////////////////////////////////////////////
var settings = {
    userFormFile : false,
    file : {}
};
var settingsPopup = {
    userFormFile : false,
    file : {}
};

$(document).ready(function () {


    $('.textarea-scrollbar').scrollbar();

    $(".textarea-footer input[type='file'][name='included_file']").change(function (e) {

        var target = e.currentTarget;
        var file = target.files[0];
        var filemame = file.name;

        if(filemame.length > 20) {
            filemame = filemame.slice(0, 20)+'...'
        }

        $(this).parents('.textarea-footer').find('.included_filename').html(filemame);

        if($(this).parents('.form').hasClass('modal-form')) {
            settingsPopup.userFormFile = true;
            settingsPopup.file = file;
        } else {
            settings.userFormFile = true;
            settings.file = file;
        }


    });
});

function sendFormProjectNew(btn, popup, $is_protected = false) {


	if(popup === true) {
        gtag('event', 'Click Send in modal form', {
            'event_category': 'Click Send in modal form'
        });
	} else {
        gtag('event', 'Click Send in footer form', {
            'event_category': 'Click Send in footer form'
        });
	}

    var $form = jQuery(btn).parents("form");

    jQuery("*").removeClass("error");

    // проверка поля "Your Name"
    var name = jQuery.trim($form.find(":input[name=first_name]").val());
    if ( !(/^[a-zA-Z\s]*$/).test(name) || !jQuery.trim($form.find(":input[name=first_name]").val()).length) {
        // $form.find(":input[name=first_name]").focus().closest(".field").addClass("error");
        $form.find(":input[name=first_name]").focus().closest(".form-group").addClass("error");
        return false;
    }
    if(jQuery.trim($form.find(":input[name=first_name]").val()).length>30){
        $form.find(":input[name=first_name]").closest(".form-group").find(".error-text").html('Entered data too long (Max length 30 symbols)');
        $form.find(":input[name=first_name]").focus().parents(".form-group").addClass("error");
        return false;
    }

    // проверка поля "Your Email"
    var email = $form.find(":input[name=email]").val();
    if ( !(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/).test(email) ) {
        $form.find(":input[name=email]").focus().closest(".form-group").addClass("error");
        return false;
    }
    if(jQuery.trim($form.find(":input[name=email]").val()).length>50){
        $form.find(":input[name=email]").closest(".form-group").find(".error-text").html('Entered data too long (Max length 50 symbols)');
        $form.find(":input[name=email]").focus().closest(".form-group").addClass("error");
        return false;
    }

    // проверка поля "Your Company"
    var company = jQuery.trim($form.find(":input[name=company]").val());
    if ( !(/^[a-zA-Z\s]*$/).test(company) || !jQuery.trim($form.find(":input[name=company]").val()).length) {
        // $form.find(":input[name=first_name]").focus().closest(".field").addClass("error");
        $form.find(":input[name=company]").focus().closest(".form-group").addClass("error");
        return false;
    }
    if(jQuery.trim($form.find(":input[name=company]").val()).length>30){
        $form.find(":input[name=company]").closest(".form-group").find(".error-text").html('Entered data too long (Max length 30 symbols)');
        $form.find(":input[name=company]").focus().parents(".form-group").addClass("error");
        return false;
    }

    //проверка на галочку privacy policy
    if($form.find(":input[name='accetp-with']").is(":checked") === false) {
        $form.find(":input[name='accetp-with']").focus().closest(".form-group").addClass("error");
        return false;
    }
    // проверка поля "Your Project Description"

    if ( !jQuery.trim($form.find(":input[name=description]").val()).length) {
        $form.find(":input[name=description]").focus().closest(".form-group").addClass("error");
        return false;
    }
    if(jQuery.trim($form.find(":input[name=description]").val()).length>1000) {
        $form.find(":input[name=description]").closest(".form-group").find(".error-text").html('Entered text too long (Max length 1000 symbols)');
        $form.find(":input[name=description]").focus().closest(".form-group").addClass("error");
        return false;
    }

    $form.find(".field").removeClass("error");

    var formData = new FormData();

    
    formData.append('name',$form.find(":input[name=first_name]").val());
    formData.append('email',$form.find(":input[name=email]").val());
    formData.append('company',$form.find(":input[name=company]").val());
    formData.append('description',$form.find(":input[name=description]").val());

    if($form.find(":input[name='nda']").is(":checked") === true) {
        formData.append('nda',$form.find(":input[name=nda]").val());
    }

    var subscribe = false;
    if($form.find(":input[name='subscribe']").is(":checked") === true) {
        formData.append('subscribe',$form.find(":input[name=nda]").val());
        subscribe = true;
    }

    if(popup === true) {
        if(settingsPopup.userFormFile === true) {
            formData.append('userfile', settingsPopup.file);
        }
    } else {
        if(settings.userFormFile === true) {
            formData.append('userfile', settings.file);
        }
    }
	var action;
	if($is_protected) {
		action = 'sendProtectedFormData';
		formData.append('page_request', $form.find(":input[name=page_request]").val())
	} else {
		action = 'sendFormData';
	}
	formData.append('action', action);

    jQuery.ajax({
        url: ajax_object.ajaxurl, // this is the object instantiated in wp_localize_script function
        type: 'POST',
        action: action,
        data: formData,
        success:function (data) {
			console.log(data);
            setCookie('popup','disable',1);
            if(data === 'good') {

                if(popup === true) {
                    gtag('event', 'Send email from modal form', {
                        'event_category': 'Send email from modal form'
                    });
                } else {
                    gtag('event', 'Send Email from footer form', {
                        'event_category': 'Send Email from footer form',
                    });
                }

                addToInsoectlet($form);
				$.fancybox.close();
                jQuery('#popup_form_thank_you').fancybox().click();
                jQuery('#tellFormBtn').hide();
                $form.find(".field").removeClass("error");
            }
        },
        processData: false,  // tell jQuery not to process the data
        contentType: false
    });

    if(subscribe) {
    	var name = $form.find(":input[name=first_name]").val();
    	var email = $form.find(":input[name=email]").val();
    	mailChimp.add(name, email);
    	mailChimp.subscribe();
	}

    if(jQuery(btn).hasClass('disabled')){
        jQuery("#captcha-wrap").addClass("error");
    } else {
        setCookie('popup','disable',1);
    }
}

function addToInsoectlet($form) {
    //inspectlet add Tags
    __insp.push(['identify', $form.find(":input[name=email]").val()]);
    __insp.push(['tagSession', {
        email: $form.find(":input[name=email]").val(),
        name: $form.find(":input[name=first_name]").val(),
        company: $form.find(":input[name=company]").val()
    }]);
}

$('.textarea-field-box').on('focus', 'textarea', function () {
    $(this).parents('.textarea-field-box').addClass('active');
});

$('.textarea-field-box').on('focusout', 'textarea', function () {
    $(this).parents('.textarea-field-box').removeClass('active');
});

$('.textarea-field-box').on('keyup','textarea',function () {
    console.log('change');

    console.log($(this).val());

    if($(this).val().length != 0) {
        $(this).parents('.form-group').removeClass('error');
    } else {
        $(this).parents('.form-group').addClass('error');
    }
});

///////////////////////////////////////////////////////////////

function removeUpFile(btn) {
	jQuery('.cover-resume .file-name').html('');
	jQuery('#FileUpload').val('');
}


function openFancybox() {
	if(jQuery('.popup-lead-timeout a.btn.fancybox').length){
		setTimeout( function() {
			// jQuery('.popup-lead-timeout a.btn.fancybox').trigger('click');
		},30000);
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

var mailChimp = {
	action: 'MailChimpSubscribe',
	fiels: {
		name: '',
		email: '',
	},
	subscribe: function() {
		var _that = this;
		var formData = _that.setupData();

		$.ajax({
			url: ajax_object.ajaxurl,
			type: 'POST',
			action: _that.action,
			data: formData,
			success: function(response){
				_that.callback(response);
			},
			processData: false,
			contentType: false
		});
	},
	setupData: function() {
		var formData = new FormData();
		formData.append('FNAME', this.fiels.name);
		formData.append('EMAIL', this.fiels.email);
		formData.append('action', this.action);
		return formData;
	},
	add: function(name, email) {
		if(name && email) {
			this.fiels.name = name;
			this.fiels.email = email;
		}
	},
	callback: function (response) {

	}
}

function downloadURI(uri, name) {
	var link = document.createElement("a");
	link.download = name;
	link.href = uri;
	document.body.appendChild(link);
	link.click();
	document.body.removeChild(link);
	delete link;
}