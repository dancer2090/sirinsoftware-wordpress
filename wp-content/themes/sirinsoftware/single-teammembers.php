<?php get_header(); ?>
<?php
    $recaptcha_key = '6Lf7SWIUAAAAAK0p8Ud2SHJc2tHkyG9eWWMo3IGO';
?>
	<!--
    <div class="bnr-top career" style="background-image: url('<?php //echo get_template_directory_uri();?>/img/jobs.jpg')">
        <div class="inner">
            <div class="logo"></div>
            <h1>Welcome <br />to sirin software</h1>
            <p>Welcome to&nbsp;our&nbsp;team</p>
        </div>
    </div>
	 -->
	<div class="vacancy">
		<div class="inner">
			<?php while ( have_posts() ) : the_post();?>
				<div class="vacancy-header">
					<div class="all-jobs">
						<a href="<?php echo get_site_url();?>/jobs/" class="btn btn-02">
							<i class="ico ico-left-1"><i></i></i>
							<span><?php echo __('all Jobs', 'sirinsoftware')?></span>
						</a>
					</div>
					<h2><?php the_title();?></h2>
					<div class="info">
						<span class="data"><?php the_date('F d. Y');?></span>
						<?php 
							$terms_list = wp_get_post_terms(get_the_ID(), 'jobs-cat', array("fields" => "all"));
							$terms=array();
							foreach ($terms_list as $term){
								array_push($terms, $term->name);
							}
						?>
						<span class="filter"><?php echo implode(", ", $terms);?></span>
						<?php $field = get_field_object('jobs_vacancy_location');?>
						<span class="location"><?php echo $field['choices'][get_field('jobs_vacancy_location')];?></span>
					</div>
				</div>
				<div class="vacancy-center">
					<div class="vacancy-sidebar">
						<div class="related-jobs">
							<h2>Related Jobs</h2>
							<div class="items-wrap">
								<?php 
									$args = array( 'post_type' => 'jobs', 'posts_per_page' => 5, 'post__not_in' => array(get_the_ID()), 'meta_key'=>'jobs_archive_vacancy', 'meta_value'=>1);
									$loop = new WP_Query( $args );
									if($loop->have_posts()): while ( $loop->have_posts() ) : $loop->the_post();
								?>
									<a class="item" href="<?php the_permalink()?>">
										<span class="job">
											<?php echo wp_strip_all_tags(get_the_title());?>
										</span>
										<span class="location">
											<i class="ico ico-map-4"><i></i></i>
											<?php $field = get_field_object('jobs_vacancy_location');?>
											<span><?php echo $field['choices'][get_field('jobs_vacancy_location')];?></span>
											<i class="ico ico-right-12"><i></i></i>
										</span>
									</a>
								<?php endwhile;endif;?>
								<?php wp_reset_postdata(); ?>
							</div>
						</div>
						<?php if(!$_POST['name']):?>
						<div class="cover-resume">
							<h2><?php echo __('Cover Resume', 'sirinsoftware')?></h2>
							<?php if(!isset($_POST['form-name']) && !isset($_POST['post_id'])):?>
							<form name="CV_send" action="." method="post" id="sendFormCV" enctype="multipart/form-data">
								<div class="fields-wrap">
									<div class="field">
										<div class="input-wrap">
											<span class="placeholder"><?php echo __('Your Name', 'sirinsoftware')?></span>
											<input type="text" name="name" autocomplete="on">
										</div>
										<p class="error-text"><?php echo __('Enter your name', 'sirinsoftware')?></p>
									</div>
									<div class="field">
										<div class="input-wrap">
											<span class="placeholder"><?php echo __('Email', 'sirinsoftware')?></span>
											<input type="text" name="email" autocomplete="on">
										</div>
										<p class="error-text"><?php echo __('Enter your Email', 'sirinsoftware')?></p>
									</div>
									<div class="field">
										<div class="input-wrap">
											<span class="placeholder"><?php echo __('Phone Number', 'sirinsoftware')?></span>
											<input type="text" name="phone" autocomplete="on">
										</div>
										<p class="error-text"><?php echo __('Enter your Phone Number', 'sirinsoftware')?></p>
									</div>
									<div class="field">
										<div class="input-wrap">
											<span class="placeholder"><?php echo __('Linkedin Profile', 'sirinsoftware')?></span>
											<input type="text" name="linkedin">
										</div>
										<p class="error-text"><?php echo __('Enter your Linkedin Profile', 'sirinsoftware')?></p>
									</div>
									<div class="field">
										<div class="textarea-wrap">
											<span class="placeholder"><?php echo __('Cover Letter / Message', 'sirinsoftware')?></span>
											<textarea name="message"></textarea>
										</div>
										<p class="error-text"><?php echo __('Enter your Cover Letter / Message', 'sirinsoftware')?></p>
									</div>
									<div class="file-name">
									</div>
									<div class="file-attach field">
										<input type="file" name="upload-file" id="FileUpload" style="display: none;" value=""  accept=".pdf,.docx,.doc,.rtf"/>
										<a href="javascript:;" class="btn btn-attach btn-09" onclick='jQuery("#FileUpload").click()'>
											<span><?php echo __('Attach your CV / resume', 'sirinsoftware')?></span>
											<i class="ico ico-attach-1"><i></i></i>
										</a>
										<p class="error-text"><?php echo __('Upload correct file', 'sirinsoftware')?></p>
									</div>
									<input type="hidden" name="post_id" id="post_id" value="<?php echo get_the_ID();?>" />
									<input type="hidden" name="vacancy" value="<?php echo get_the_title();?>" />
									<input type="hidden" name="form-name" value="send-cv">

                                    <div class="field">
                                        <div class="accept-block">
                                            <input type="checkbox" id="cbx" class="cbx" name="accetp-with" style="display: none;">
                                            <label for="cbx" class="check">
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
                                    <div class="field">
                                        <div class="accept-block">
                                            <input type="checkbox" id="cbx-subs" class="cbx" name="accetp-with-subs" style="display: none;">
                                            <label for="cbx-subs" class="check">
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
                                    </div>

									<button class="btn btn-01 btn-send">
										<span><?php echo __('Send', 'sirinsoftware')?></span>
										<i class="ico ico-start"><i></i></i>
									</button>
								</div>	
							</form>
							<?php elseif($_POST['name']):?>
                            <p>
                                <?php echo $_POST['name']; ?>,
                                thank you for applying CV on our vacancy
                                <?php the_title(); ?>
                            </p>
<!--                            <p>--><?php //echo $_POST['name']; ?><!--</p>-->
<!--							<p>--><?php //echo __('Your CV was sent. We will contact with you shortly.', 'sirinsoftware')?><!--</p>-->
							<?php endif;?>
						</div>
						<?php endif;?>
					</div>
					<div class="vacancy-content">
						<?php the_content();?>
						<?php if(get_field('jobs_responsibilities')):?>
							<p>&nbsp;</p>
							<p class="big"><?php echo __('Responsibilities', 'sirinsoftware')?>:</p>
							<?php the_field('jobs_responsibilities')?>
							<p>&nbsp;</p>
						<?php endif;?>
						<?php if(get_field('jobs_requirements')):?>
							<p>&nbsp;</p>
							<p class="big"><?php echo __('Requirements', 'sirinsoftware')?>:</p>
							<?php the_field('jobs_requirements')?>
							<p>&nbsp;</p>
						<?php endif;?>
						<?php if(get_field('jobs_personal_skills')):?>
							<p>&nbsp;</p>
							<p class="big"><?php echo __('Personal skills', 'sirinsoftware')?>:</p>
							<?php the_field('jobs_personal_skills')?>
							<p>&nbsp;</p>
						<?php endif;?>
						<?php if(get_field('jobs_desirable')):?>
							<p>&nbsp;</p>
							<p class="big"><?php echo __('Desirable', 'sirinsoftware')?>:</p>
							<?php the_field('jobs_desirable')?>
							<p>&nbsp;</p>
						<?php endif;?>
						<?php if(get_field('jobs_whats_in_it_for_you')):?>
							<p>&nbsp;</p>
							<p class="big"><?php echo __('What\'s in it for you?', 'sirinsoftware')?></p>
							<?php the_field('jobs_whats_in_it_for_you')?>
							<p>&nbsp;</p>
						<?php endif;?>
					</div>
					<div class="vacancy-extra">
						<div class="social">
							<span class="share"><?php echo __('share via', 'sirinsoftware')?></span>
							<div class="buttons">
								<a class="btn btn-gp-1 social-popup" id="google" href="https://plus.google.com/share?url=<?php the_permalink();?>"><i class="ico ico-gp-24x15-01"><i></i></i></a>
								<a class="btn btn-tw-1 social-popup" id="twitter" href="http://twitter.com/share?text=<?php the_title();?>&url=<?php the_permalink();?>&hashtags=SirinSoftware"><i class="ico ico-tw-11x15-01"><i></i></i></a>
								<a class="btn btn-in-1 social-popup" id=linkedin href="https://www.linkedin.com/cws/share?url=<?php the_permalink();?>"><i class="ico ico-in-1"><i></i></i></a>					
								<a class="btn btn-fb-1 social-popup" id="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>"><i class="ico ico-fb-1"><i></i></i></a>
							</div>
						</div>
						<div class="all-jobs">
							<a href="<?php echo get_site_url();?>/jobs/" class="btn btn-02">
								<i class="ico ico-left-1"><i></i></i>
								<span><?php echo __('all Jobs', 'sirinsoftware')?></span>
							</a>
						</div>
					</div>
				</div>
			<?php endwhile;?>
		</div>
	</div>
<?php get_footer(); ?>