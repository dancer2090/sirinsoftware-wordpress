<?php 
//print_r($_POST);
$settings=array(
		'sirin-logo1',
		'sirin-logo2',
		'sirin-main-phone',
		'sirin-main-email',
		'sirin-header-slogan',
		'sirin-offices',
		'sirin-video-mp4',
		'sirin-video-webm',
		'sirin-video-img',
		'sirin-video-mp4',
		'sirin-video-webm',
		'sirin-video-img',
		'sirin-home-slides',
		'sirin-sales-email',
		'sirin-sales-book-email',
		'sirin-hr-email',
		'sirin-business-divisions',
		'sirin-business-divisions-graphics',
		'sirin-exp',
		'remove-element',
		'sirin-our-focus',
		'sirin-all-exp-link',
		'sirin-all-clients-link',
		'sirin-clients',
		'sirin-our-focus-img',
		'sirin-facebook',
		'sirin-linkedin',
		'sirin-twitter',
		'sirin-dou',
		'sirin-clutch',
        'sirin-privacy-policy',
        'sirin-cookies-policy',
        'sirin-bottom-policy-cookie-line',
        'sirin-request-autoreplay',
        'sirin-summary-autoreplay',
        'sirin-subscribe-autoreplay',
        'sirin-request-autoreplay-theme',
        'sirin-summary-autoreplay-theme',
        'sirin-subscribe-autoreplay-theme',
);

if(isset($_POST) && !empty($_POST)){
	foreach ($settings as $setting){

	    if ($setting == 'sirin-bottom-policy-cookie-line') {
            if(isset($_POST[$setting])) {
                if($_POST[$setting] == 'yes') {
                    update_option($setting,'yes');
                }
            } else {
//                update_option($setting,'no');
            }
        }

		if(isset($_POST[$setting])){
			if($setting=='sirin-home-slides'){
				update_option($setting,$_POST[$setting]);
				if(is_array($_POST[$setting]) && !empty($_POST[$setting])){
					foreach ($_POST[$setting] as $slide){
						$slide_params=array('header','vision','mission','link');
						foreach ($slide_params as $slide_param){
							$param=$slide.'-'.$slide_param;
							if(isset($_POST[$param]) && !empty($_POST[$param])){
								$datasetting=nl2br($_POST[$param]);
								$datasetting=trim($datasetting);
								update_option($param,$datasetting);
							}
						}
					}
				}
			} elseif($setting=='sirin-offices'){
				update_option($setting,$_POST[$setting]);
				if(is_array($_POST[$setting]) && !empty($_POST[$setting])){
					foreach ($_POST[$setting] as $slide){
						$slide_params=array('header','address','phone1','phone2', 'email', 'googlemap' , 'h-logo', 'b-logo', 'desc', 'bg');
						foreach ($slide_params as $slide_param){
							$param=$slide.'-'.$slide_param;
							if(isset($_POST[$param])){
								$datasetting=nl2br($_POST[$param]);
								$datasetting=trim($datasetting);
								if($slide_param=='desc') $datasetting=stripcslashes($datasetting);
								update_option($param,$datasetting);
							}
						}
					}
				}
			}elseif($setting=='sirin-exp'){
				if(isset($_POST[$setting]) && is_array($_POST[$setting]) && !empty($_POST[$setting])){
					$_POST[$setting]=array_unique($_POST[$setting]);
					sort($_POST[$setting]);
					update_option($setting,$_POST[$setting]);
					//delete_option($setting);
					foreach ($_POST[$setting] as $slide){
						$exp_type=false;
						
						if(isset($_POST[$slide.'-title']) && !empty($_POST[$slide.'-title'])){
							update_option($slide.'-title',$_POST[$slide.'-title']);
							$exp_type=true;
							//delete_option($slide.'-title');
						}else{
							delete_option($slide.'-title');
							$exp_type=false;
						}
		
						if(isset($_POST[$slide.'-items']) && is_array($_POST[$slide.'-items']) && !empty($_POST[$slide.'-items'])){
							$_POST[$slide.'-items']=array_unique($_POST[$slide.'-items']);
							sort($_POST[$slide.'-items']);
							$exp_items=array();
							//delete_option($slide.'-items');
							
							foreach ($_POST[$slide.'-items'] as $slide_elem){
								$slide_params=array('img','title','desc');
								foreach ($slide_params as $slide_param){
									$param=$slide_elem.'-'.$slide_param;
									if(isset($_POST[$param]) && !empty($_POST[$param])){
										$datasetting=nl2br($_POST[$param]);
										$datasetting=trim($datasetting);
										update_option($param,$datasetting);
										array_push($exp_items,$slide_elem);
										//delete_option($param);
									}
								}
							}
							if(!empty($exp_items)){
								$exp_items=array_unique($exp_items);
								sort($exp_items);
								update_option($slide.'-items',$exp_items);
								$exp_type=true;
							}	
						}
						
						if(!$exp_type){
							if(count($_POST[$setting])>1){
								$key=array_search($slide,$_POST[$setting]);
								unset($_POST[$setting][$key]);
								update_option($setting,$_POST[$setting]);
							}else{
								delete_option($setting);
							}
						}
					}
				}else{
					delete_option($setting);
				}
			}elseif($setting=='sirin-business-divisions-graphics'){
				update_option($setting,$_POST[$setting]);
			}elseif($setting=='sirin-clients'){
				$clients=array();
				if(isset($_POST[$setting]) && !empty($_POST[$setting])){
					foreach ($_POST[$setting] as $client){
						if(!empty($client)){
							$client_params=array('img','link');
							foreach ($client_params as $client_param){
								if(isset($_POST[$client.'-'.$client_param]) && !empty($_POST[$client.'-'.$client_param])){
									update_option($client.'-'.$client_param,$_POST[$client.'-'.$client_param]);
									array_push($clients,$client);
									$clients=array_unique($clients);
									sort($clients);
								}
							}
						}
					}
				}
				update_option($setting,$clients);
			}else{
				$datasetting=nl2br($_POST[$setting]);
				$datasetting=trim($datasetting);
				update_option($setting,$datasetting);
			}
		}
	}
}

?>