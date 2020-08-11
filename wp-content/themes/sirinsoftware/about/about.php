<div id="about_profile" class="about-profile">
    <div class="container">
        <div class="division">
            <div class="title wow fadeInUp">
                <h2>
                    <?php echo __('Business Divisions', 'sirinsoftware')?>
                </h2>
            </div>
            <div class="description">
                <p><?php the_content();?></p>
            </div>
        </div>

        <?php $divisions = get_field('about_business_divisions');
        if( $divisions ): ?>

            <div class="division-items">
                <?php foreach( $divisions as $division ):?>
                    <div class="item">
                        <div class="image">
                            <img src="<?php echo (get_field('page_icon',$division->ID))? get_field('page_icon',$division->ID) : '';?>" alt="">
                        </div>
                        <div class="info">
                            <h4><?php echo $division->post_title;?></h4>
                            <p>
                                <?php
                                $content_post = get_post($division->ID);
                                echo $content_post->post_content;
                                ?>
                            </p>
                            <div class="buttons">
                                <div class="b1">
                                    <a class="btn btn-07" href="<?php echo get_permalink( $division->ID );?>">
                                        <i class="ico ico-more-2"><i></i></i>
                                        <span><?php echo __('Learn more', 'sirinsoftware')?></span>
                                    </a>
                                </div>
                                <div class="b3">
                                    <a class="btn btn-01 btn-scroll-to" href="#tellabout">
                                        <i class="ico ico-order-1"><i></i></i>
                                        <span><?php echo __('Get started', 'sirinsoftware')?></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif;?>
    </div>

    <div class="story">
        <div class="container">
            <div class="story-box">
                <div class="title wow fadeInUp">
                    <h2>
                        <?php echo __('Our Story', 'sirinsoftware')?>
                    </h2>

                    <img src="<?php echo (get_field('about_our_history_image'))? get_field('about_our_history_image') : '';?>" alt="">

<!--                    <svg width="161" height="142" viewBox="0 0 161 142" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">-->
<!--                        <rect width="161" height="142" fill="url(#pattern0)"/>-->
<!--                        <defs>-->
<!--                            <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">-->
<!--                                <use xlink:href="#image0" transform="translate(-0.124416) scale(0.0039026 0.00442478)"/>-->
<!--                            </pattern>-->
<!--                            <image id="image0" width="320" height="226" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAUAAAADiCAMAAAAI7e7JAAAAOVBMVEVHcEymyVCmyVCmyVCmyVCmyVCmyVCmyVCmyVCmyVCmyVCmyVCmyVCmyVCmyVCmyVCmyVCmyVCmyVAhaExOAAAAEnRSTlMAqVwqjg7Z9uw5HAaATpi5yG1uljj7AAAE00lEQVR4Xu3a226jSBRG4Q3UkeJg7/d/2OmxQnY8dDfGoZyxvdZVpFxgfVKJVPzL3RWX9KBiCrNrc5EbK7l1c0hRDyq5Io/P6dHF09DJZt1winp0Th5f0hqdzl7+kj+ftEZJHp9WKrpe/lDvolbqBQCtOHhZJ35Y+ADcKo2yakyqLwgoR+T7PA7zFVDj5SrfXL9uXJt7L0dgPD2glYdgCqETS7qvvxmyfATgyrDRpTjKZ2PUpSaLBeC6zghb+ag1vk4EwI1yMMFrv5BFANzOTwvF5RSP+tHkBcDbaqNeip1It/zcigB4aznppeB90EspC4B3CDaN+QG4pxzV0pgFwJ21amkrAO7OGYmTNwEs5zlpTPO5H6fJy/cqYREJ5dUB1zfWpNrLN8v6UZb3AOzTha6Zk6oeACiNXmrkTQAn/dVURKSNhwD2UX8V+3cBDHbczocAirM3yDsA6r+FsYhISYcAFqfqyksAFpc2P2z6/HYyS5dzkQOyJ1QFrP9NsdPtDzt9/QC9yBMB1v+mON0A6INacXxuwCTHpjcAim+immB+akB9JKDVn2ddamRfAE4avYhvG70U5L8BuPmH9GBXOk3PBCiW/CRgHO2dfZLdAajq+uXfya3cEYCqKd79DgFwOH0urGRvAPa5E+lbN03D6GVPAK57J0AAAUznc7obEMA4eFsAA7gXMDpvG3QAdwNOvXzWTwDuBGy69T5Tbg3AOcuqPMsqAHf1foAAAggggAACCCCAAAIIoH4jWVXzCY8HBJAjDCCAAAIIIIAAAggggAByF+YqByBHGEAAAQQQQAABBBBAAAHkLsxVDkCOMIAAAggggAACCCCAAALIXZi7MIAcYQABBBBAAAEEEEAAAQSQqxx3YQA5wgACCCCAAAIIIIAAAgggVznuwgByhP+/gAACCCCAAAIIIIAAAshdWHa2/wlvDgjg/jjCAAIIIIAAAggggAACCCCAAAIIIIAAAggggAACCCCAAAIIIIAAAggggAACCCCAAAIIIIAAAggggAACeFwxhdm1udwKWHLr5pCiHtHTA1rxNHTbgN1wWuQAXHc6+78B+vNJrecGTFqn6Po/AfYuap3SDwA6rVUc/O8A/RC1Vu4HAItLWqs0rgHHio9z5VGAdfJ9Hof5Cqjx14C+uX7duDb3Xir0fIBWHoIZhe4rYPf1N0MWC8CrcqNLcTTAMepSk8UCcF1nhO0C2BpfJwLgRjmYoKian4Ys2wEoflrERlGVUT+avAB4W23US7FT7ZafW7k1ACUnvRRUg15KWQDcJ2jt9wNQclRLYxYAd9aqpa0AuDtnfk72B2AJi18oAN5TXgCzvCqgHpT8vkYvNWJVePYLA/ZRfxX7VwWsn3vAG+SlAYtLyRUAnycALQABBBBAAAEEEEAAAQQQQABrZRvprsiNlc420hV6MkArzkMnm3XDbHIAbmykrbob6fqASetnG+lVtpF+VKnWd4xW7Y20ZRvpx+XkgDYX0fU30tb40A/gijxRvu/GoVltpJfWG+k0D+NqI02rjbS12kjTjRtpkfVGmnZspEX2bqQphyvB1Uaa9mykRe7YSJNtpEXu2EiTbaS9/9ZGGsGmwa/GRprqb6TJmd8kVGEjTXU30mQb6bsi20hTlY001d9I1+8fLnoiqVqVgxkAAAAASUVORK5CYII="/>-->
<!--                        </defs>-->
<!--                    </svg>-->
                </div>
                <div class="description">
                    <p><?php the_field('about_our_history');?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container green-line">
        <div class="line"></div>
    </div>
    <div class="meet">
        <div class="container">
            <div class="meet-box">
                <div class="image">
                    <div class="image-box">
                        <svg width="105" height="121" viewBox="0 0 105 121" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M52.2431 1.22815C50.23 1.22815 48.5829 2.89404 48.5829 4.93013C48.5829 6.59603 49.6809 8.07675 51.328 8.44695V9.55762H53.1581V8.44695C53.7072 8.26185 54.2562 7.89165 54.8052 7.52146L55.5373 8.07673L56.4523 6.41091L55.7203 5.85563C55.9033 5.48543 55.9033 5.11517 55.9033 4.74497C55.9033 2.89397 54.2562 1.22815 52.2431 1.22815ZM52.2431 3.07914C53.3412 3.07914 54.0732 3.81954 54.0732 4.93013C54.0732 6.04073 53.3412 6.78113 52.2431 6.78113C51.145 6.78113 50.413 6.04073 50.413 4.93013C50.413 3.81954 51.145 3.07914 52.2431 3.07914ZM48.5829 6.04068L46.9358 6.96618L47.8508 8.63212L49.4979 7.70662L48.5829 6.04068ZM58.0994 7.3364L57.1844 9.00223L58.8315 9.92772L59.7465 8.2619L58.0994 7.3364ZM45.4717 7.89168L43.8246 8.81717L44.7396 10.4831L46.3867 9.55762L45.4717 7.89168ZM61.2106 9.37245L60.2956 11.0384L61.9427 11.9639L62.8577 10.2979L61.2106 9.37245ZM42.3605 9.92772L40.7134 10.8532L41.6285 12.5192L43.2756 11.5937L42.3605 9.92772ZM64.3218 11.2234L63.4068 12.8894L65.0539 13.8149L65.9689 12.1489L64.3218 11.2234ZM51.328 11.4086V13.2596H53.1581V11.4086H51.328ZM39.2493 11.7787L37.6022 12.7042L38.5173 14.3701L40.1644 13.4447L39.2493 11.7787ZM67.433 13.2596L66.518 14.9254L68.1651 15.8509L69.0801 14.1851L67.433 13.2596ZM36.1381 13.8149L34.491 14.7404L35.4061 16.4062L37.0532 15.4807L36.1381 13.8149ZM51.328 15.1106V16.9616H53.1581V15.1106H51.328ZM70.5442 15.1106L69.6291 16.7764L71.2762 17.7019L72.1913 16.0361L70.5442 15.1106ZM33.0269 15.6659L31.3798 16.5914L32.2949 18.2572L33.942 17.3317L33.0269 15.6659ZM73.6554 17.1466L72.7403 18.8126L74.3874 19.7381L75.3025 18.0721L73.6554 17.1466ZM29.9157 17.7019L28.2686 18.6274L29.1837 20.2933L30.8308 19.3679L29.9157 17.7019ZM51.328 18.8126V20.6636H53.1581V18.8126H51.328ZM76.7666 18.9976L75.8515 20.6636L77.4986 21.5891L78.4137 19.9231L76.7666 18.9976ZM26.8046 19.5529L25.1575 20.4784L26.0725 22.1443L27.7196 21.2188L26.8046 19.5529ZM79.8778 21.0337L78.9627 22.6996L80.6098 23.6251L81.5249 21.9592L79.8778 21.0337ZM23.6934 21.5891L22.0463 22.5146L22.9613 24.1804L24.6084 23.2549L23.6934 21.5891ZM51.328 22.5146V24.3656H53.1581V22.5146H51.328ZM82.9889 22.8847L82.0739 24.5506L83.721 25.4761L84.636 23.8102L82.9889 22.8847ZM20.5822 23.4401L18.9351 24.3656L19.8501 26.0314L21.4972 25.1059L20.5822 23.4401ZM86.1001 24.9208L85.1851 26.4016L86.8322 27.3271L87.7472 25.6612L86.1001 24.9208ZM17.471 25.4761L15.8239 26.4016L16.739 28.0675L18.386 27.142L17.471 25.4761ZM51.328 26.2165V27.142C45.1057 27.6973 40.3474 32.8801 40.3474 39.1735C40.3474 45.8371 45.6547 51.2049 52.2431 51.2049C58.8315 51.2049 64.1388 45.8371 64.1388 39.1735C64.1388 32.8801 59.3805 27.6973 53.1581 27.142V26.2165H51.328ZM52.2431 51.2049H42.1775C38.3343 51.2049 35.2231 53.4261 33.759 56.7579H27.5366H19.4841C15.2749 56.7579 11.9807 60.2748 11.9807 64.3469V81.0059L10.6996 81.7463L11.6146 83.4123L11.9807 83.227V84.5228H33.0269V88.2248H41.2624H43.0925H51.328V90.0758H53.1581V88.2248H71.4593V84.5228H92.5055V83.4123L93.2376 83.7824L94.1526 82.1164L92.5055 81.1909V64.1619C92.5055 59.9046 89.0283 56.5728 85.0021 56.5728H76.9496H70.7272C69.2631 53.241 66.1519 51.0198 62.3087 51.0198L52.2431 51.2049ZM76.9496 56.7579C81.5249 56.7579 85.1851 53.0559 85.1851 48.4285C85.1851 43.801 81.5249 40.099 76.9496 40.099C72.3743 40.099 68.7141 43.801 68.7141 48.4285C68.7141 52.8708 72.3743 56.7579 76.9496 56.7579ZM27.5366 56.7579C32.1119 56.7579 35.7721 53.0559 35.7721 48.4285C35.7721 43.801 32.1119 40.099 27.5366 40.099C22.9613 40.099 19.3011 43.801 19.3011 48.4285C19.3011 52.8708 22.9613 56.7579 27.5366 56.7579ZM89.2113 26.7718L88.2963 28.4376L89.9434 29.3631L90.8584 27.6973L89.2113 26.7718ZM14.3598 27.3271L12.7127 28.2526L13.6278 29.9185L15.2749 28.993L14.3598 27.3271ZM92.3225 28.8079L91.4075 30.4738L93.0546 31.3993L93.9696 29.7334L92.3225 28.8079ZM52.2431 28.993C57.7334 28.993 62.3087 33.6205 62.3087 39.1735C62.3087 44.7265 57.7334 49.354 52.2431 49.354C46.7528 49.354 42.1775 44.7265 42.1775 39.1735C42.1775 33.6205 46.7528 28.993 52.2431 28.993ZM11.2486 29.3631L9.60152 30.2886L10.5166 31.9546L12.1637 31.0291L11.2486 29.3631ZM95.4337 30.6589L94.5186 32.3248L96.1657 33.2503L97.0808 31.5844L95.4337 30.6589ZM4.66022 30.844C2.6471 30.844 1 32.5099 1 34.546C1 36.2119 2.09807 37.6926 3.74517 38.0628V39.1735H5.57528V38.0628C6.30732 37.8777 6.85635 37.5076 7.40539 36.9523L8.32044 37.5076L9.2355 35.8416L8.32044 35.2863C8.32044 34.9161 8.50345 34.731 8.50345 34.3608C8.50345 33.9906 8.50345 33.6205 8.32044 33.2503L9.2355 32.695L8.32044 31.0291L7.40539 31.5844C6.49033 31.2142 5.57528 30.844 4.66022 30.844ZM99.826 30.844C97.8128 30.844 96.1657 32.5099 96.1657 34.546C96.1657 34.9162 96.1657 35.1013 96.3487 35.4715L95.4337 36.0268L96.3487 37.6926L97.2638 37.1373C97.8128 37.6926 98.3619 38.0629 99.0939 38.248V39.1735H100.924V38.248C102.571 37.8778 103.669 36.397 103.669 34.7311C103.486 32.5099 101.839 30.844 99.826 30.844ZM4.66022 32.695C5.75829 32.695 6.49033 33.4354 6.49033 34.546C6.49033 35.6566 5.75829 36.397 4.66022 36.397C3.56215 36.397 2.83011 35.6566 2.83011 34.546C2.83011 33.4354 3.56215 32.695 4.66022 32.695ZM99.826 32.695C100.924 32.695 101.656 33.4354 101.656 34.546C101.656 35.6566 100.924 36.397 99.826 36.397C98.7279 36.397 97.9958 35.6566 97.9958 34.546C97.9958 33.4354 98.7279 32.695 99.826 32.695ZM10.6996 36.7671L9.78453 38.433L11.4316 39.3585L12.3467 37.6926L10.6996 36.7671ZM93.7866 36.7671L92.1395 37.6926L93.0546 39.3585L94.7017 38.433L93.7866 36.7671ZM13.8108 38.433L12.8957 40.099L14.5428 41.0245L15.4579 39.3585L13.8108 38.433ZM90.4924 38.433L88.8453 39.3585L89.7604 41.0245L91.4075 40.099L90.4924 38.433ZM17.105 40.284L16.1899 41.95L17.288 42.5053L18.203 40.8393L17.105 40.284ZM87.3812 40.284L86.2831 40.8393L87.1982 42.5053L88.2963 41.95L87.3812 40.284ZM98.9109 40.8393V42.6903H100.741V40.8393H98.9109ZM3.74517 40.8393V42.6903H5.57528V40.8393H3.74517ZM27.5366 41.95C31.0138 41.95 33.942 44.9116 33.942 48.4285C33.942 51.9453 31.0138 54.9069 27.5366 54.9069C24.0594 54.9069 21.1312 51.9453 21.1312 48.4285C21.1312 44.7265 24.0594 41.95 27.5366 41.95ZM76.9496 41.95C80.4268 41.95 83.355 44.9116 83.355 48.4285C83.355 51.9453 80.4268 54.9069 76.9496 54.9069C73.4724 54.9069 70.5442 51.9453 70.5442 48.4285C70.5442 44.9116 73.4724 41.95 76.9496 41.95ZM98.9109 44.5413V46.3923H100.741V44.5413H98.9109ZM3.74517 44.5413V46.3923H5.57528V44.5413H3.74517ZM98.9109 48.2433V50.0943H100.741V48.2433H98.9109ZM3.74517 48.2433V50.0943H5.57528V48.2433H3.74517ZM98.9109 51.9453V53.7963H100.741V51.9453H98.9109ZM3.74517 51.9453V53.7963H5.57528V51.9453H3.74517ZM42.1775 52.8708H62.1257C65.2369 52.8708 67.799 54.7218 68.8971 57.3132L69.0801 57.8685C69.2631 58.2387 69.2631 58.6089 69.4461 59.1642C69.4461 59.5344 69.6291 60.0897 69.6291 60.4599V84.5228V86.3738H63.2238V64.1619H61.3936V86.3738H43.0925V64.1619H41.2624V86.3738H34.857V60.4599C34.857 60.0897 34.857 59.5344 35.0401 59.1642C35.0401 58.794 35.2231 58.4238 35.4061 57.8685L35.5891 57.3132C36.6872 54.7218 39.2493 53.0559 42.1775 52.8708ZM98.9109 55.6473V57.4982H100.741V55.6473H98.9109ZM3.74517 55.6473V57.4982H5.57528V55.6473H3.74517ZM19.4841 58.4237H33.2099C33.0269 58.979 33.0269 59.7194 33.0269 60.2747V82.4868H19.3011V67.6788H17.471V82.4868H13.8108V64.1619C13.8108 61.0152 16.3729 58.4237 19.4841 58.4237ZM71.2762 58.4237H85.0021C88.1133 58.4237 90.6754 61.0152 90.6754 64.1619V82.4868H87.0152V67.6788H85.1851V82.4868H71.4593V60.2747C71.4593 59.7194 71.4593 59.1641 71.2762 58.4237ZM98.9109 59.3492V61.2002H100.741V59.3492H98.9109ZM3.74517 59.3492V61.2002H5.57528V59.3492H3.74517ZM98.9109 63.0512V64.9022H100.741V63.0512H98.9109ZM3.74517 63.0512V64.9022H5.57528V63.0512H3.74517ZM98.9109 66.7532V68.6043H100.741V66.7532H98.9109ZM3.74517 66.7532V68.6043H5.57528V66.7532H3.74517ZM98.9109 70.4553V72.3063H100.741V70.4553H98.9109ZM3.74517 70.4553V72.3063H5.57528V70.4553H3.74517ZM98.9109 74.1573V76.0083H100.741V74.1573H98.9109ZM3.74517 74.1573V76.0083H5.57528V74.1573H3.74517ZM98.9109 77.8593V79.7103H100.741V77.8593H98.9109ZM3.74517 77.8593V79.7103H5.57528V77.8593H3.74517ZM98.9109 81.5613V82.6718C98.1789 82.8569 97.6298 83.2271 97.0808 83.7824L95.6167 83.0419L94.7017 84.7079L96.1657 85.4483C96.1657 85.8185 95.9827 86.0036 95.9827 86.3738C95.9827 86.744 95.9827 87.1142 96.1657 87.4843L95.2507 88.0397L96.1657 89.7054L97.0808 89.1503C97.8128 89.7056 98.5449 90.2608 99.643 90.2608C101.656 90.2608 103.303 88.5949 103.303 86.5589C103.303 84.893 102.205 83.4121 100.558 83.0419V81.9314L98.9109 81.5613ZM3.74517 81.5613V82.6718C2.09807 83.042 1 84.5229 1 86.1887C1 88.2248 2.6471 89.8907 4.66022 89.8907C5.9413 89.8907 7.03936 89.1503 7.77141 88.2248L7.40539 88.9652L9.05249 89.8907L9.96754 88.2248L8.32044 87.4843L7.77141 88.4098C8.13743 87.8545 8.32044 87.1142 8.32044 86.3738C8.32044 84.7079 7.22238 83.2271 5.57528 82.8569V81.7463H3.74517V81.5613ZM9.05249 82.6718L7.40539 83.5973L8.32044 85.2632L9.96754 84.3378L9.05249 82.6718ZM4.66022 84.3378C5.75829 84.3378 6.49033 85.0781 6.49033 86.1887C6.49033 87.2993 5.75829 88.0397 4.66022 88.0397C3.56215 88.0397 2.83011 87.2993 2.83011 86.1887C2.83011 85.0781 3.56215 84.3378 4.66022 84.3378ZM99.826 84.3378C100.924 84.3378 101.656 85.0781 101.656 86.1887C101.656 87.2993 100.924 88.0397 99.826 88.0397C98.7279 88.0397 97.9958 87.2993 97.9958 86.1887C97.9958 85.0781 98.7279 84.3378 99.826 84.3378ZM93.7866 88.9652L92.1395 89.8907L93.0546 91.5564L94.7017 90.6309L93.7866 88.9652ZM11.4316 89.3353L10.5166 91.0013L12.1637 91.9268L13.0787 90.2608L11.4316 89.3353ZM90.6754 90.8162L89.0283 91.7417L89.9434 93.4074L91.5905 92.4819L90.6754 90.8162ZM14.5428 91.3714L13.6278 93.0373L15.2749 93.9628L16.1899 92.2969L14.5428 91.3714ZM51.328 91.7417V93.5927H53.1581V91.7417H51.328ZM87.5642 92.8523L85.9171 93.7778L86.8322 95.4437L88.4793 94.5182L87.5642 92.8523ZM17.654 93.2224L16.739 94.8883L18.386 95.8138L19.3011 94.1479L17.654 93.2224ZM84.453 94.7033L82.8059 95.6288L83.721 97.2947L85.3681 96.3692L84.453 94.7033ZM20.7652 95.2584L19.8501 96.9244L21.4972 97.8499L22.4123 96.1839L20.7652 95.2584ZM51.328 95.4437V97.2947H53.1581V95.4437H51.328ZM81.3419 96.7393L79.6947 97.6648L80.6098 99.3307L82.2569 98.4052L81.3419 96.7393ZM23.8764 97.1094L22.9613 98.7754L24.6084 99.7009L25.5235 98.0349L23.8764 97.1094ZM78.2307 98.5903L76.5836 99.5158L77.4986 101.182L79.1457 100.256L78.2307 98.5903ZM26.9876 99.1457L26.0725 100.811L27.7196 101.737L28.6347 100.071L26.9876 99.1457ZM51.328 99.1457V100.997H53.1581V99.1457H51.328ZM75.1195 100.626L73.4724 101.552L74.3874 103.218L76.0345 102.292L75.1195 100.626ZM30.0988 100.997L29.1837 102.662L30.8308 103.588L31.7459 101.922L30.0988 100.997ZM72.0083 102.477L70.3612 103.403L71.2762 105.069L72.9233 104.143L72.0083 102.477ZM51.328 102.848V104.699H53.1581V102.848H51.328ZM33.2099 103.033L32.2949 104.699L33.942 105.624L34.857 103.958L33.2099 103.033ZM68.8971 104.513L67.25 105.439L68.1651 107.105L69.8121 106.179L68.8971 104.513ZM36.3211 104.884L35.4061 106.55L37.0532 107.475L37.9682 105.809L36.3211 104.884ZM65.7859 106.364L64.1388 107.29L65.0539 108.956L66.701 108.03L65.7859 106.364ZM51.328 106.735V108.586H53.1581V106.735H51.328ZM39.4323 106.92L38.5173 108.586L40.1644 109.511L41.0794 107.845L39.4323 106.92ZM62.6747 108.401L61.0276 109.326L61.9427 110.992L63.5898 110.066L62.6747 108.401ZM42.5435 108.771L41.6285 110.437L43.2756 111.362L44.1906 109.696L42.5435 108.771ZM59.5635 110.252L57.9164 111.177L58.8315 112.843L60.4786 111.917L59.5635 110.252ZM51.328 110.437V112.288H52.2431H53.1581V110.437H51.328ZM52.2431 112.288C51.328 112.288 50.413 112.658 49.6809 113.398L48.7659 112.843L47.8508 114.509L48.7659 115.064C48.5829 115.434 48.5829 115.805 48.5829 116.175C48.5829 118.211 50.23 119.877 52.2431 119.877C54.2562 119.877 55.9033 118.211 55.9033 116.175C55.9033 115.619 55.7203 114.879 55.3543 114.324L55.7203 114.879L57.3674 113.954L56.4523 112.288L54.8052 113.213L55.1713 113.768C54.4392 112.843 53.5242 112.288 52.2431 112.288ZM45.6547 110.622L44.7396 112.288L46.3867 113.213L47.3018 111.547L45.6547 110.622ZM52.2431 114.139C53.3412 114.139 54.0732 114.879 54.0732 115.99C54.0732 117.1 53.3412 117.841 52.2431 117.841C51.145 117.841 50.413 117.1 50.413 115.99C50.413 114.879 51.145 114.139 52.2431 114.139Z" fill="#A6C950" stroke="#A6C950"/>
                        </svg>
                        <div class="title">Meet our team</div>
                    </div>
                </div>
                <div class="description">
                    <h3>
                        <?php the_field('about_map_description');?>
<!--                        100% of Sirin Software's specialists speak English, which allows us to work with clients all over the world.-->
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <div class="section world-lines">
        <div class="inner">
            <?php the_field('about_map');?>
        </div>
    </div>
    <?php
    $args = array(
        'numberposts' => 9,
        'offset' => 0,
        'orderby' => 'post_date',
        'order' => 'DESC',
        'post_type' => 'post',
        'post_status' => 'publish',
        'suppress_filters' => true
    );

    $recent_posts = wp_get_recent_posts( $args, ARRAY_A );

    $recent_posts = get_field('related_posts');
    ?>
    <?php if($recent_posts) : ?>
    <div class="container green-line">
        <div class="line"></div>
    </div>
    <div class="section-latest-posts">
        <div class="container">
            <div class="title wow fadeInUp"><h2>Related case studies</h2></div>
                <div class="mobile-version">
                    <div class="items">
                        <?php $mobile_count = 0; ?>
                        <?php foreach ($recent_posts as $recent_post): ?>
                            <?php
                            $recent_post = [
                                'ID' => $recent_post,
                                'post_title' => get_the_title($recent_post),
                            ];
                            $mobile_count++;
                            $img_id = get_post_meta($recent_post['ID'], 'post_featured_image');
                            $image = wp_get_attachment_image_src($img_id[0], 'medium');
                            $thumbnail = $image[0];
                            if(!$thumbnail) {
                                $thumbnail = get_template_directory_uri().'/sirindesign/build/img/case_3_1.jpg';
                            }
                            ?>
                            <div class="item">
                                <div class="item-box wow fadeInRight">
                                    <div class="item-image">
                                        <img width="300px" height="170px" src="<?php echo $thumbnail ?>" >
                                    </div>
                                    <div class="item-text-box">
                                        <div class="item-title">
                                            <a href="<?php echo get_permalink($recent_post['ID']) ?>">
                                                <?php echo $recent_post['post_title'] ?>
                                            </a>
                                        </div>
                                        <div class="action">
                                            <a href="<?php echo get_permalink($recent_post['ID']) ?>">
                                                <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M17.4139 7.13592L2.21095 0.141154C1.87161 -0.0149995 1.47053 0.0623375 1.21364 0.333488C0.956748 0.604504 0.900931 1.00908 1.07484 1.33954L4.5819 8.00142L1.0708 14.8388C0.89972 15.172 0.960514 15.5774 1.22185 15.8455C1.38983 16.0181 1.61647 16.1092 1.84673 16.1092C1.97464 16.1092 2.10362 16.0811 2.22427 16.0231L17.4271 8.714C17.7315 8.56766 17.9241 8.25858 17.9213 7.92072C17.9184 7.58286 17.7207 7.27714 17.4139 7.13592ZM3.81378 2.79832L13.9175 7.44701L6.28412 7.49086L3.81378 2.79832ZM6.30726 8.45966L14.0236 8.41527L3.80786 13.3266L6.30726 8.45966Z" fill="white"/>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                            if($mobile_count === 4) {
                                break;
                            }
                            ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            <div class="carousel wow fadeInUp">
                <div class="owl-carousel owl-theme">
                        <?php foreach ($recent_posts as $recent_post): ?>
                            <?php

                            $recent_post = [
                                'ID' => $recent_post,
                                'post_title' => get_the_title($recent_post),
                            ];
                            $img_id = get_post_meta($recent_post['ID'], 'post_featured_image');
                            $image = wp_get_attachment_image_src($img_id[0], 'medium');
                            $thumbnail = $image[0];
                            if(!$thumbnail) {
                                $thumbnail = get_template_directory_uri().'/sirindesign/build/img/case_3_1.jpg';
                            }
                            ?>
                            <div class="carousel-item">
                                <a href="<?php echo get_permalink($recent_post['ID']) ?>">
                                    <div class="item-box">
                                        <div class="item-image">
                                            <img width="300px" height="170px" src="<?php echo $thumbnail ?>" >
                                        </div>
                                        <div class="item-text-box">
                                            <div class="item-title">
                                                <a href="<?php echo get_permalink($recent_post['ID']) ?>">
                                                    <?php echo $recent_post['post_title'] ?>
                                                </a>
                                            </div>
                                            <div class="action">
                                                <a href="<?php echo get_permalink($recent_post['ID']) ?>">
                                                    <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M17.4139 7.13592L2.21095 0.141154C1.87161 -0.0149995 1.47053 0.0623375 1.21364 0.333488C0.956748 0.604504 0.900931 1.00908 1.07484 1.33954L4.5819 8.00142L1.0708 14.8388C0.89972 15.172 0.960514 15.5774 1.22185 15.8455C1.38983 16.0181 1.61647 16.1092 1.84673 16.1092C1.97464 16.1092 2.10362 16.0811 2.22427 16.0231L17.4271 8.714C17.7315 8.56766 17.9241 8.25858 17.9213 7.92072C17.9184 7.58286 17.7207 7.27714 17.4139 7.13592ZM3.81378 2.79832L13.9175 7.44701L6.28412 7.49086L3.81378 2.79832ZM6.30726 8.45966L14.0236 8.41527L3.80786 13.3266L6.30726 8.45966Z" fill="white"/>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>

                </div>
            </div>
            <br>
            <br>
        </div>

    </div>
<?php endif; ?>