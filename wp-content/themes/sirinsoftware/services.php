<?php /* Template Name: Services*/ ?>
<?php get_header(); ?>
<?php while ( have_posts() ) : the_post();?>
	<?php include(locate_template('services/'.$post->post_name.'.php'));?>
<?php endwhile;?>
<?php get_footer(); ?>