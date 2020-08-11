<div id="about_testimonials" class="about-content">
<!--	<h2><span>--><?php //the_title();?><!--</span></h2>-->
	<div class="section-testimonials">
		<div class="inner">
		<?php 
			$noImg = get_template_directory_uri()."/img/blank.png";
			$args = array( 
				'post_type' => 'testimonial',
				'limit' =>  9999999,
				'fields' => 'ids',
				'meta_query' => array(
			        array(
			         'key' => '_thumbnail_id',
			         'compare' => 'EXISTS'
			        ),
			    ));
			$imageLoop = new WP_Query( $args );

			$args = array( 
				'post_type' => 'testimonial',
				'fields' => 'ids',
				'meta_query' => array(
			        array(
			         'key' => '_thumbnail_id',
			         'compare' => 'NOT EXISTS'
			        ),
			    ));
			$noImageLoop = new WP_Query( $args );

			$ids = array_merge( $imageLoop->posts, $noImageLoop->posts);
			$args = array(
			    'post_type' => array( 'testimonial' ),
			    'orderby' => 'post__in',
			    'post__in' => $ids
			);
			$loop = new WP_Query($args);
			

			if($loop->have_posts()):					
				while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<div class="testimonial">
						<div class="left">
							<div class="image<?php echo has_post_thumbnail()?"":" no-image"; ?>">
									<img src="<?php echo has_post_thumbnail()?the_post_thumbnail_url(array(120, 120)):$noImg; ?>">
							</div>
						</div>
						<div class="right">
							<?php
							$testimonial_logo = get_post_meta( get_the_ID(), 'testimonial_logo', true );
							 if(!empty($testimonial_logo)): ?>
							 <?php $project_url = get_post_meta( get_the_ID(), 'project_url', true ); ?>
							<div class="logo">
							<?php if($project_url): ?>
								<a class="class" target="_blank" href="<?php echo $project_url; ?>">
							<?php endif; ?>
								<img src="<?php echo wp_get_attachment_image_src($testimonial_logo, array(300, 300))[0] ?>">	
							<?php if($project_url): ?>
								</a>
							<?php endif; ?>
							</div>
							<?php endif; ?>
							<?php the_content(); ?>
							<p class="author">
								<?php
								$linkedin_url = get_post_meta( get_the_ID(), 'linkedin_url', true );
								if($linkedin_url):
								?>
									<a class="linkedin-url" target="_blank" href="<?php echo $linkedin_url; ?>">
                                        <svg width="27" height="20" viewBox="0 0 27 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="27" height="20" rx="2" fill="#0077B5"></rect>
                                            <path d="M20 11.3774V15.4019H17.428V11.647C17.428 10.7037 17.056 10.0599 16.125 10.0599C15.4143 10.0599 14.9914 10.4938 14.8054 10.9134C14.7375 11.0635 14.72 11.2723 14.72 11.4823V15.4019H12.1472C12.1472 15.4019 12.1818 9.04223 12.1472 8.38332H14.7198V9.37818C14.7146 9.38562 14.7078 9.39364 14.7029 9.40086H14.7198V9.37818C15.0616 8.90063 15.672 8.21843 17.0383 8.21843C18.731 8.21841 20 9.22157 20 11.3774ZM9.45587 5C8.5757 5 8 5.52371 8 6.21241C8 6.88611 8.55905 7.42571 9.42172 7.42571H9.43891C10.3361 7.42571 10.8941 6.88621 10.8941 6.21241C10.8772 5.52371 10.3361 5 9.45587 5ZM8.1528 15.4019H10.7247V8.38332H8.1528V15.4019Z" fill="white"></path>
                                        </svg>
                                    </a>
								<?php
								endif;
								$testimonial_author = get_post_meta( get_the_ID(), 'testimonial_author', true );
								if ( ! empty( $testimonial_author ) ) : ?>
								    <span><?php echo $testimonial_author ?></span>
								<?php endif; ?>
							</p>
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</div>