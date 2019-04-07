<?php 

	get_header();
	// keep looping while we still have post
	while (have_posts()) {
		// Function the_post() checks whether the loop has started and then sets the current post by moving, each time, to the next post in the queue.
		the_post(); ?>
		<h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php the_content(); ?>
		<hr>
	<?php }
 

	get_footer();
 ?>