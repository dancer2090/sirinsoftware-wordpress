<?php /* Template Name: Page book*/ ?>
<?php get_header(); ?>
<?php while ( have_posts() ) : the_post();?>

<div class="book-page">
    <div class="book-space">
        <div class="book">
            <div class="book-content">
                <h2>Get free</h2>
                <p> insights sirin software’s guide to <br> outsourcing software development</p>
                <div class="image">
                    <img
                        src="<?php echo get_template_directory_uri().'/sirindesign/build/img/width_srcset/book_1x.png' ?>"
                        srcset="<?php echo get_template_directory_uri().'/sirindesign/build/img/width_srcset/book_1x.png' ?> 1x, <?php echo get_template_directory_uri().'/sirindesign/build/img/width_srcset/book_2x.png' ?> 2x"
                        alt="sirinsoftware book"
                    >
                </div>
            </div>
        </div>
        <div class="book-form">
            <div class="form-content">
                <div class="title">
                    <div class="image">
                        <svg width="60" height="97" viewBox="0 0 60 97" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0)">
                                <path d="M0 4.81364V82.6813C0 85.3712 2.26524 87.4949 4.95521 87.4949H50.1184V96.5559L54.7905 89.7601L59.4626 96.5559V79.9913V77.8676V0H58.3299H5.94626H4.95521C2.26524 0 0 2.12366 0 4.81364ZM57.3389 89.7601L54.7905 86.0791L52.2421 89.7601V79.9913H57.3389V89.7601ZM8.06992 2.12366H57.1973V77.8676H49.9769H8.06992V2.12366ZM49.9769 79.9913V85.2297H4.95521C3.39786 85.2297 2.12366 84.097 2.12366 82.5397C2.12366 80.9823 3.39786 79.8497 4.95521 79.8497H6.08783H49.9769V79.9913ZM5.94626 77.8676H4.95521C3.96417 77.8676 2.97313 78.1508 2.12366 78.7171V4.81364C2.12366 3.39786 3.39786 2.12366 4.95521 2.12366H6.08783L5.94626 77.8676Z" fill="white"/>
                                <path d="M16.7061 25.6255H48.8441V17.9803H16.7061V25.6255ZM18.8297 20.104H46.7205V23.5019H18.8297V20.104Z" fill="white"/>
                                <path d="M38.9339 30.4392H26.4751V32.5628H38.9339V30.4392Z" fill="white"/>
                            </g>
                            <defs>
                                <clipPath id="clip0">
                                    <rect width="59.4626" height="96.4143" fill="white"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                    <div class="text">
                        <h3>Request Brochure</h3>
                        <p>Please fill the form <br> to download <strong>PDF</strong> file</p>
                    </div>
                </div>
                <div class="form">
                    <form action="" id="Book_send">
                        <div class="form-group">
                            <label for="field-book-first-name">First name *</label>
                            <input type="text" name="first_name" id="field-book-first-name">
                            <p class="error-text">Enter first name</p>
                        </div>
                        <div class="form-group">
                            <label for="field-book-last-name">Last name *</label>
                            <input type="text" name="last_name" id="field-book-last-name">
                            <p class="error-text">Enter last name</p>
                        </div>
                        <div class="form-group">
                            <label for="field-book-company">Company *</label>
                            <input type="text" name="company" id="field-book-company">
                            <p class="error-text">Enter company</p>
                        </div>
                        <div class="form-group">
                            <label for="ield-book-email">E-mail *</label>
                            <input type="text" name="email" id="field-book-email">
                            <p class="error-text">Enter correct e-mail</p>
                        </div>
                        <div class="accept-book-space">
                            <div class="accept-policy">
                                <div class="form-group">
                                    <div class="accept-block">
                                        <input type="checkbox" id="book-cbx-accept" class="cbx" name="accetp-with" style="display: none;">
                                        <label for="book-cbx-accept" class="check">
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
                                    </div>
                                    <p class="error-text"><?php echo __('Please, accept privacy policy', 'sirinsoftware')?></p>
                                </div>
                            </div>
                            <div class="accept-news">
                                <div class="form-group">
                                    <div class="accept-block">
                                        <input type="checkbox" id="book-cbx-news" class="cbx" name="accetp-with-news" style="display: none;">
                                        <label for="book-cbx-news" class="check">
                                            <table>
                                                <tr>
                                                    <td>
                                                        <svg width="32px" height="32px" viewBox="0 0 18 18">
                                                            <path fill="#ffffff" d="M0.7,9 L0.7,0.7 L14.5,0.7 L14.5,14.5 L1,14.5 L0.7,9 Z"></path>
                                                            <polyline points="1 9 7 14 15 4"></polyline>
                                                        </svg>
                                                    </td>
                                                    <td>
                                                        <span>I want to stay tuned for Sirin Software latest articles and news</span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </label>
                                    </div>
                                    <p class="error-text"><?php echo __('Please, accept privacy policy', 'sirinsoftware')?></p>
                                </div>
                            </div>
                        </div>
                        <div class="action">
                            <button class="btn btn-orange btn-block btn-send">
                                DOWNLOAD
                                <i class="download">
                                    <svg width="25" height="30" viewBox="0 0 25 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0)">
                                            <path d="M12.367 13.8971C12.5057 13.757 12.5519 13.617 12.5519 13.4303C12.5519 13.2435 12.4594 13.0568 12.367 12.9635C12.2283 12.8234 12.0896 12.7767 11.9046 12.7767H11.1187V14.1305H11.9046C12.0433 14.1305 12.2283 14.0371 12.367 13.8971Z" fill="#F2F2F2"/>
                                            <path d="M6.40277 10.2559V18.752C6.40277 19.2188 6.77265 19.6389 7.28123 19.6389H24.0181C24.4804 19.6389 24.8965 19.2655 24.8965 18.752V10.2559C24.8965 9.7891 24.5267 9.36897 24.0181 9.36897H19.672L19.6258 0.686196C19.6258 0.312743 19.3484 0.0326538 18.9785 0.0326538H0.808414C0.438539 0.0326538 0.161133 0.312743 0.161133 0.686196V25.5675C0.161133 27.6215 1.82557 29.302 3.85988 29.302H21.1515C23.1859 29.302 24.8503 27.6215 24.8503 25.5208C24.8503 25.1473 24.5729 24.8672 24.203 24.8672H6.95759C6.58771 24.8672 6.31031 25.1473 6.31031 25.5208C6.31031 26.8746 5.24691 27.9482 3.90612 27.9482C2.56532 27.9482 1.50193 26.8746 1.50193 25.5208V1.33974H18.3312L18.3775 9.36897H7.28123C6.77265 9.41565 6.40277 9.7891 6.40277 10.2559ZM7.55863 26.221H23.5095C23.2321 27.248 22.3074 27.9949 21.1978 27.9949H6.77265C7.14252 27.5281 7.41993 26.9212 7.55863 26.221ZM18.8861 12.3566C18.8861 12.2632 18.9323 12.1699 18.9785 12.0765C19.071 11.9831 19.1172 11.9831 19.2559 11.9831H21.3827C21.4752 11.9831 21.5677 12.0298 21.6139 12.0765C21.7064 12.1699 21.7064 12.2165 21.7064 12.3566C21.7064 12.4966 21.6601 12.5433 21.6139 12.6367C21.5214 12.73 21.4752 12.73 21.3827 12.73H19.5796V13.9438H21.1053C21.1978 13.9438 21.2902 13.9904 21.3365 14.0371C21.4289 14.1305 21.4289 14.1772 21.4289 14.3172C21.4289 14.4573 21.4289 14.5039 21.3827 14.5973C21.3365 14.6907 21.244 14.6907 21.1053 14.6907H19.5796V16.2778C19.5796 16.3712 19.5333 16.4646 19.4871 16.5579C19.3946 16.6513 19.3484 16.6513 19.2097 16.6513C19.1172 16.6513 19.0248 16.6046 18.9323 16.5579C18.8398 16.5112 18.8398 16.4179 18.8398 16.2778L18.8861 12.3566ZM14.1701 12.3566C14.1701 12.2632 14.2164 12.1699 14.2626 12.0765C14.3551 11.9831 14.4013 11.9831 14.54 11.9831H15.326C15.9733 11.9831 16.4819 12.2165 16.9442 12.6834C17.4066 13.1502 17.5915 13.6637 17.5915 14.3172C17.5915 14.9708 17.3603 15.4843 16.9442 15.9511C16.4819 16.4179 15.9733 16.6513 15.326 16.6513H14.4938C14.4013 16.6513 14.3089 16.6046 14.2164 16.5579C14.1239 16.5112 14.1239 16.4179 14.1239 16.2778V12.3566H14.1701ZM10.3327 12.3566C10.3327 12.2632 10.3789 12.1699 10.4252 12.0765C10.4714 11.9831 10.5639 11.9831 10.7026 11.9831H11.8584C12.2283 11.9831 12.5982 12.1232 12.8756 12.4033C13.153 12.6834 13.2917 13.0101 13.2917 13.3836C13.2917 13.757 13.153 14.0838 12.8756 14.3639C12.5982 14.644 12.2745 14.784 11.8584 14.784H11.0724V16.2312C11.0724 16.3245 11.0262 16.4179 10.98 16.5112C10.8875 16.6046 10.8413 16.6046 10.7026 16.6046C10.6101 16.6046 10.5176 16.5579 10.4252 16.5112C10.3327 16.4646 10.3327 16.3712 10.3327 16.2778V12.3566Z" fill="#F2F2F2"/>
                                            <path d="M16.3895 15.4376C16.7131 15.1108 16.8518 14.7373 16.8518 14.3172C16.8518 13.8971 16.7131 13.5236 16.3895 13.1969C16.0659 12.8701 15.696 12.73 15.2799 12.73H14.8638V15.9044H15.2799C15.7422 15.9044 16.0659 15.7643 16.3895 15.4376Z" fill="#F2F2F2"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0">
                                                <rect width="24.7354" height="29.316" fill="white" transform="translate(0.161133 0.0326538)"/>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php endwhile;?>
<?php get_footer(); ?>