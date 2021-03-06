    <div class="popup-wrap">
        <div id="popup_form_lead" class="popup">
            <div class="inner">
                <div class="sirin-popup-clientform" id="tellabout-modal">
                    <div class="title-box">
                        <h2>TELL US ABOUT YOUR PROJECT</h2>
                        <p>We will get in touch with you within 24 business hours</p>
                    </div>
                    <div class="form modal-form" >
                        <form method="POST" action="">
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
                                                <div class="textarea-footer">
                                                    <div class="nda">
                                                        <input type="checkbox" id="cbx-nda-modal" class="cbx" name="nda" style="display: none;">
                                                        <label for="cbx-nda-modal" class="check">
                                                            <table>
                                                                <tr>
                                                                    <td>
                                                                        <svg width="32px" height="32px" viewBox="0 0 18 18">
                                                                            <path fill="#ffffff" d="M0.7,9 L0.7,0.7 L14.5,0.7 L14.5,14.5 L1,14.5 L0.7,9 Z"></path>
                                                                            <polyline points="1 9 7 14 15 4"></polyline>
                                                                        </svg>
                                                                    </td>
                                                                    <td>
                                                                        <span>Send me NDA</span>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </label>
                                                    </div>
                                                    <div class="file">
                                                        <input style="display: none" name="included_file" type="file" id="file-input-field-modal">
                                                        <span class="included_filename"></span>
                                                        <label for="file-input-field-modal">
                                                            <div class="label-box">
                                                                <div class="label-box-title">Attach a file</div>
                                                                <div class="label-box-icon">
                                                                    <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <g clip-path="url(#clip0)">
                                                                            <path d="M9.08948 13.8598V13.8599C9.08948 14.0864 9.27328 14.2702 9.49982 14.2702C9.72636 14.2702 9.91016 14.0864 9.91017 13.8599C9.91017 13.8599 9.91017 13.8599 9.91017 13.8599L9.91074 7.42305V7.42304C9.91074 7.19649 9.72694 7.0127 9.50039 7.0127C9.27385 7.0127 9.09005 7.19649 9.09005 7.42303C9.09005 7.42303 9.09005 7.42304 9.09005 7.42304L9.08948 13.8598Z" fill="#A6C950" stroke="#A6C950" stroke-width="0.25"/>
                                                                            <path d="M11.6708 10.1744L11.6713 10.1749C11.7513 10.2541 11.8563 10.2944 11.9612 10.2944C12.0662 10.2944 12.1711 10.2541 12.2512 10.1749L12.2516 10.1744C12.4117 10.0143 12.4117 9.75426 12.2516 9.59416L9.79025 7.13277C9.63015 6.97267 9.3701 6.97267 9.21 7.13277L6.74861 9.59416C6.58852 9.75426 6.58852 10.0143 6.74861 10.1744C6.90872 10.3345 7.16877 10.3345 7.32887 10.1744L9.49984 8.00344L11.6708 10.1744Z" fill="#A6C950" stroke="#A6C950" stroke-width="0.25"/>
                                                                            <path d="M3.26218 19.125H15.7392C16.5952 19.125 17.2909 18.4293 17.2909 17.5738V4.96729C17.2909 4.74074 17.1071 4.55695 16.8806 4.55695C16.654 4.55695 16.4702 4.74074 16.4702 4.96729V17.5733C16.4702 17.9762 16.1421 18.3043 15.7392 18.3043H3.26218C2.85925 18.3043 2.53114 17.9762 2.53114 17.5733V1.42673C2.53114 1.0238 2.85925 0.695691 3.26218 0.695691H12.323C12.5496 0.695691 12.7334 0.511891 12.7334 0.285345C12.7334 0.0587992 12.5496 -0.125 12.323 -0.125H3.26218C2.40676 -0.125 1.71045 0.570676 1.71045 1.42673V17.5733C1.71045 18.4293 2.40676 19.125 3.26218 19.125Z" fill="#A6C950" stroke="#A6C950" stroke-width="0.25"/>
                                                                            <path d="M11.9306 5.2538H16.4881C16.7157 5.2538 16.8985 5.06894 16.8985 4.84288C16.8985 4.61633 16.7147 4.43253 16.4881 4.43253H12.341V0.285345C12.341 0.0587991 12.1572 -0.125 11.9306 -0.125C11.7041 -0.125 11.5203 0.0587991 11.5203 0.285345V4.84345C11.5203 5.07 11.7041 5.2538 11.9306 5.2538Z" fill="#A6C950" stroke="#A6C950" stroke-width="0.25"/>
                                                                            <path d="M17.1007 5.25188C17.0265 5.25188 16.9523 5.22278 16.8964 5.16571L12.3388 0.484333C12.2292 0.371907 12.2315 0.190427 12.3445 0.0808548C12.4569 -0.0292884 12.6379 -0.026435 12.748 0.0865617L17.3055 4.76794C17.4151 4.88036 17.4128 5.06184 17.2998 5.17141C17.2445 5.22506 17.1726 5.25188 17.1007 5.25188Z" fill="#A6C950" stroke="#A6C950" stroke-width="0.25"/>
                                                                        </g>
                                                                        <defs>
                                                                            <clipPath id="clip0">
                                                                                <rect width="19" height="19" fill="white" transform="matrix(-1 0 0 1 19 0)"/>
                                                                            </clipPath>
                                                                        </defs>
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </div>
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
                                            <button class="btn btn-green icon" id="sendFormButtomDesignModal">
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
