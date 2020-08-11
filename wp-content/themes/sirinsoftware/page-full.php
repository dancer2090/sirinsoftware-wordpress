<?php /* Template Name: Page 100% width*/ ?>
<?php get_header(); ?>
<?php while ( have_posts() ) : the_post();?>
	<div class="bnr-top web" style="background-image: url('<?php the_post_thumbnail_url( 'full' );?>')">
		<div class="inner">
			<h1><?php the_title();?></h1>
		</div>
	</div>

	<div class="section">
		<div class="inner">
			<div class="full-width-content">
                <?php the_content() ?>
			</div>
		</div>
	</div>
<?php endwhile;?>
<?php get_footer(); ?>