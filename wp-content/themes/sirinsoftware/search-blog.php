	<div class="blog-main search-blog-request">
		<div class="head">
			<div class="inner">
				<h1><span><?php echo __('our blog', 'sirinsoftware')?></span></h1>
				<div class="searh">
					<div class="field">
						<div class="input-wrap">
							<input type="text" autocomplete="off" value="" name="search">
							<button class="btn btn-search-1"><i class="ico ico-search-1"><i></i></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="search-results">
		<div class="inner">
			<div class="head"><?php echo __('Search results for', 'sirinsoftware')?>: <span><?php if(isset($_GET['s']) && !empty($_GET['s'])) echo $_GET['s'];?></span></div>
			<div class="center">
				<div class="sidebar">
					<div class="related-posts">
						<h2>Related posts</h2>
						<div class="items-wrap">
							<?php 
								$args = array( 'post_type' => 'post', 'posts_per_page' => 5, 'post__not_in' => array(get_the_ID()));
								$loop = new WP_Query( $args );
								if($loop->have_posts()): while ( $loop->have_posts() ) : $loop->the_post();
							?>
								<a class="item" href="<?php the_permalink()?>">
									<?php 
										if(get_field('blog_image')){
											$param=get_field('blog_image');
										}else{
											$param=get_post_thumbnail_id(get_the_ID());
										}
										$thumb=wp_get_attachment_image_src( $param,'medium' );
									?>
									<div class="background" style="background-image: url(<?php if(!empty($thumb[0])) echo $thumb[0];?>)"></div>
									<div class="inner">
										<div class="data"><?php the_date('d M Y');?></div>
										<h2><?php the_title();?></h2>
										<p><?php the_excerpt();?></p>
									</div>
								</a>
							<?php endwhile;endif;?>
							<?php wp_reset_postdata(); ?>
						</div>
					</div>
				</div>
				<div class="content">
					<div class="items-wrap">
						<?php while ( have_posts() ) : the_post();?>
							<div class="item">
								<div class="item-pic">
									<a href="<?php the_permalink();?>">
										<?php if ( has_post_thumbnail() ):?>
											<?php the_post_thumbnail( 'thumbnail' );?>
										<?php else:?>
											<img src="<?php echo get_template_directory_uri();?>/img/default.jpg" alt="<?php the_title();?>">
										<?php endif;?>
									</a>
								</div>
								<div class="item-content">
									<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
									<div class="info">
										<span class="data"><?php the_date('F d. Y');?></span>
										<?php $comments_count = wp_count_comments(get_the_ID());?>
										<span class="comments"><?php printf( _n( '%s comment', '%s comments', $comments_count->total_comments, 'sirinsoftware' ), number_format_i18n( $comments_count->total_comments ) );?></span>
										<?php 
											$terms_list = get_the_category();
											$terms = array();
											foreach ($terms_list as $term){
												array_push($terms, $term->cat_name);
											}
										?>
										<span class="category"><?php echo  __('Category','sirinsoftware');?>: <?php echo implode(", ", $terms);?></span>
									</div>
									<div class="text">
										<a href="<?php the_permalink();?>">
											<?php echo wp_trim_words( get_the_content(), 40, '' );?>
										</a>	
									</div>
									<div class="more">
										<a class="btn btn-07" href="<?php the_permalink();?>">
											<span><?php echo  __('Read more','sirinsoftware');?></span>
											<i class="ico ico-right-12"><i></i></i>
										</a>
									</div>
								</div>
							</div>
						<?php endwhile;?>
					</div>
					<?php sirin_pagination();?>
				</div>
			</div>
		</div>
	</div>