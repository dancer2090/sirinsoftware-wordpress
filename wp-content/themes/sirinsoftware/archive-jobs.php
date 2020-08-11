<?php get_header(); ?>
	<div class="bnr-top career">
		<div class="inner">
			<div class="logo"></div>
			<h1>Welcome <br />to sirin software</h1>
			<p>Welcome to&nbsp;our&nbsp;team</p>
		</div>
	</div>
	<div class="job-search">
		<div class="inner">
			<h2><span><?php echo __('I\'m looking for', 'sirinsoftware')?></span></h2>
			<form method="post" action=".">
				<input type="hidden" name="form-name" value="jobs-search">
				<div class="fields-wrap">
					<div class="field">
						<div class="input-wrap">
							<span class="placeholder"><?php echo __('All Jobs', 'sirinsoftware')?></span>
							<input type="text" name="job_vacancy" value="<?php if(isset($_POST['job_vacancy']) && !empty($_POST['job_vacancy'])) echo $_POST['job_vacancy'];?>">
						</div>
					</div>
					<div class="field">
						<div class="select-wrap">
							<select name="job_location">
								<option name="all" value=""><?php echo __('All Offices', 'sirinsoftware')?></option>
								<?php
								$field_key='field_57c58cd0fd845';
								$field = get_field_object($field_key);
								if( $field ){
									foreach( $field['choices'] as $k => $v ){
										echo '<option value="' . $k . '" '.selected( $_POST['job_location'], $k ).'>' . $v . '</option>';
									}
								}
								?>
							</select>
						</div>
					</div>
					<div class="field">
						<div class="select-wrap">
							<select name="job_category">
								<option value="" name="all"><?php echo __('All Categories', 'sirinsoftware')?></option>
								<?php 
								$terms = get_terms( 'jobs-cat','hide_empty=0');
								foreach ( $terms as $term ){
									echo '<option value="' . $term->term_id . '" '.selected( $_POST['job_category'], $term->term_id ).'>' . $term->name . '</option>';
								}
								?>
							</select>
						</div>
					</div>
				</div>
				<button type="submit" class="btn search btn-01">
					<i class="ico ico-search-3"><i></i></i>
					<span><?php echo __('Search', 'sirinsoftware')?></span>
				</button>
			</form>
		</div>
	</div>
	<div class="job-list">
		<div class="inner">
			<h2><span><?php echo __('Latest jobs', 'sirinsoftware')?></span></h2>
			<div class="items-wrap">

                <?php
                    $args = array(
                        'post_type' => 'jobs',
                        'posts_per_page' => 99999,
                        'orderby'   =>  'date',
                    );
                    $loop = new WP_Query( $args );
                ?>

				<?php
					$hotHtml = array();
					$jobsHtml = '';
                    $hotsHtml = '';
                    $hotjobsArray = [];

                while ( $loop->have_posts() ) : $loop->the_post();?>

                <?php
					$field = get_field_object('jobs_vacancy_location');

					$hot = false;
					$marked = '';
					$hotText = '';

					if(get_field('jobs_hot_vacancy')){
						$hot = true;
						$marked = 'marked';
						$hotText = ' <b>hot vacancy</b>';
					}
					$jobHtml = '<a class="item ' . $marked . '" href="' . get_permalink() . '">' . PHP_EOL;
					$jobHtml .= '<span class="vacancy">' . get_the_title() . $hotText . '</span>' . PHP_EOL;
					$jobHtml .= '<span class="location">' . $field['choices'][get_field('jobs_vacancy_location')] . '</span>' . PHP_EOL;
					$jobHtml .= '<span class="ico-wrap"><i class="ico ico-right-12"><i></i></i></span>' . PHP_EOL;
					$jobHtml .= '</a>' . PHP_EOL;
				?>
 					<!-- <a class="item <?php if(get_field('jobs_hot_vacancy')) echo 'marked';?>" href="<?php the_permalink();?>">
						<span class="vacancy"><?php the_title();?><?php if(get_field('jobs_hot_vacancy')) echo ' <b>hot vacancy</b>';?></span>
						<?php $field = get_field_object('jobs_vacancy_location');?>
						<span class="location"><?php echo $field['choices'][get_field('jobs_vacancy_location')];?></span>
						<span class="ico-wrap"><i class="ico ico-right-12"><i></i></i></span>
					</a> -->
				<?php 
					if($hot){
                        $hotsHtml .= $jobHtml;
						array_push($hotHtml, $jobHtml);
					} else {
						$jobsHtml .= $jobHtml;
					}
					endwhile;
					// arsort($hotHtml);
//                    $hotHtml = array_reverse($hotHtml);
//					echo implode(PHP_EOL, $hotHtml);

					echo $hotsHtml;
					echo $jobsHtml;
				?>

                <?php wp_reset_postdata(); ?>
			</div>
			<?php sirin_pagination(); ?>
		</div>
	</div>
<!--	<div class="why-sirin dark">-->
<!--		<div class="inner">-->
<!--			<h2><span>Why sirin software</span></h2>-->
<!--			--><?php //$teamID=get_id_by_slug('jobs-why-sirin-software');?>
<!--			--><?php //if( have_rows('jobs_why_items',$teamID) ):?>
<!--				<div class="items-wrap">-->
<!--				--><?php // while ( have_rows('jobs_why_items',$teamID) ) : the_row();?>
<!--					<div class="item">-->
<!--						<p class="title">--><?php //the_sub_field('jobs_why_title');?><!--</p>-->
<!--						<p>--><?php //the_sub_field('jobs_why_description');?><!--</p>-->
<!--					</div>-->
<!--				--><?php //endwhile;?>
<!--				</div>-->
<!--			--><?php //endif;?>
<!--		</div>-->
<!--	</div>-->
	<div class="sirin-offices">
		<div class="inner">
			<h2><span><?php echo __('Our offices', 'sirinsoftware')?></span></h2>
			
			<div class="items-wrap">
				<?php if(get_option('sirin-offices')):?>
					<?php $i=1;?>
					<?php foreach (get_option('sirin-offices') as $office):?>
						<div class="item contacts-<?php echo $i;?>" style="background-image: url(<?php if(get_option($office.'-bg')) echo get_option($office.'-bg');?>)">
							<p class="title"><?php if(get_option($office.'-header')) echo get_option($office.'-header');?></p>
							<p class="address"><?php if(get_option($office.'-address')) echo get_option($office.'-address');?></p>
						</div>
					<?php $i++;endforeach;?>
				<?php endif;?>
			</div>
		</div>
	</div>
<?php get_footer(); ?>