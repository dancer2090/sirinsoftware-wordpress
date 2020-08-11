<div class="sector-mobile">
	<div class="title"><?php echo wp_strip_all_tags(get_the_title());?></div>
	<div class="subtitle"><?php the_field('mobile_app_subtitle');?></div>
	<div class="images">
		<img src="<?php the_field('mobile_app_image1');?>" alt="<?php echo wp_strip_all_tags(get_the_title());?>1">
		<img src="<?php the_field('mobile_app_image2');?>" alt="<?php echo wp_strip_all_tags(get_the_title());?>2">
		<img src="<?php the_field('mobile_app_image3');?>" alt="<?php echo wp_strip_all_tags(get_the_title());?>3">
	</div>
	<?php the_field('mobile_app_description');?>
</div>
<?php 
$args = array( 'post_type' => 'portfolio', 'posts_per_page' => 99999, 'order' => 'ASC','orderby' => 'menu_order', 'tax_query' => array(array('taxonomy' => 'portfolio-cat','field' => 'id','terms' => $term_list[0]->term_id),));
$postlist = get_posts( $args);

$posts = array();
foreach ( $postlist as $post ) {
	$posts[] += $post->ID;
}
$current = array_search( $post_id, $posts );
if(array_key_exists($current-1,$posts)) {
	$prevID = $posts[$current-1];
}else{
	$prevID = $posts[count($posts)-1];
}
if(array_key_exists($current+1,$posts)) {
	$nextID = $posts[$current+1];
}else{
	$nextID = $posts[0];
}
?>
<div class="sector-prev-next">
	<a class="btn btn-sector-prev" href="<?php echo get_permalink( $prevID ); ?>">
		<span><?php echo wp_strip_all_tags(get_the_title( $prevID )); ?></span>	
	</a>
	<a class="btn btn-sector-next" href="<?php echo get_permalink( $nextID ); ?>">
		<span><?php echo wp_strip_all_tags(get_the_title( $nextID )); ?></span>	
</a>
</div>