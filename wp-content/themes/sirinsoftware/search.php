<?php get_header(); ?>
<?php if(isset($_GET['search-type']) && $_GET['search-type']=='blog'):?>
	<?php include(locate_template('search-blog.php'));?>
<?php else:?>
	<?php include(locate_template('search-all.php'));?>
<?php endif;?>
<?php get_footer(); ?>