<?php //if(is_front_page()):?>
    <div class="popup-wrap">
        <div id="popup_form_protected" class="popup">
            <div class="inner">
                <div class="sirin-popup-clientform" id="tellabout-modal">
                    <div class="title-box">
                        <h2>Get access to this case</h2>
                        <p>This case is confidential. Send us a request and our manager will show it personal for you</p>
                    </div>
                    <div class="form modal-form" >
                        <form method="POST" action="">
                            <input type="hidden" name="page_request" value="<?php echo get_the_title(); ?>">
                            <div class="row">
                                <div class="md-one-third column">
                                    <div class="first">
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="first_name" placeholder="Name *">
                                            <p class="error-text"><?php echo __('Enter correct name', 'sirinsoftware')?></p>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="email" placeholder="Email Address *">
                                            <p class="error-text"><?php echo __('Enter correct email', 'sirinsoftware')?></p>
                                        </div>

                                        <div class="form-group">
                                            <input class="form-control" type="text" name="company" placeholder="Company *">
                                            <p class="error-text"><?php echo __('Enter your company', 'sirinsoftware')?></p>
                                        </div>

                                        <div class="form-group">
                                            <div class="accept-block">
                                                <input type="checkbox" id="cbx-modal" class="cbx" name="accetp-with" style="display: none;">
                                                <label for="cbx-modal" class="check">
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <svg width="32px" height="32px" viewBox="0 0 18 18">
                                                                    <path fill="#ffffff" d="M0.7,9 L0.7,0.7 L14.5,0.7 L14.5,14.5 L1,14.5 L0.7,9 Z"></path>
                                                                    <polyline points="1 9 7 14 15 4"></polyline>
                                                                </svg>
                                                            </td>
                                                            <td>
                                                                <span>I accept Sirin Software <br> <a href="<?php echo (get_option('sirin-privacy-policy')? get_option('sirin-privacy-policy'):''); ?>">privacy policy</a></span>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </label>
                                                <p class="error-text"><?php echo __('Please, accept privacy policy', 'sirinsoftware')?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="md-two-thirds column">
                                    <div class="second">
                                        <div class="form-group">
                                            <div class="textarea-field-box">
                                                <div class="textarea-field">
                                                    <textarea class="textarea-scrollbar scrollbar-outer form-control" type="text" name="description" placeholder="Message"></textarea>
                                                    <p class="error-text"><?php echo __('Enter correct text', 'sirinsoftware')?></p>
                                                </div>                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="captcha-box">
                                                <div class="g-recaptcha" data-sitekey="<?php echo $recaptcha_key ?>">
                                                </div>
                                                <p class="error-text">Please, check captcha</p>
                                            </div>
                                        </div>
                                        <div class="action">
                                            <button class="btn btn-green icon" id="sendFormButtomDesignModal" type='protected'>
                                                send
                                                <i class="icon-fly"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php //endif;?>