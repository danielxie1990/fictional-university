<?php 
	get_header();
	// keep looping while we still have post
	while (have_posts()) {
		// Function the_post() checks whether the loop has started and then sets the current post by moving, each time, to the next post in the queue.
		the_post(); 		
		pageBanner();
		?>

<div class="container container--narrow page-section">

    <div class="generic-content">
        <div class="row group">
            <div class="one-third">
                <?php the_post_thumbnail('professorPortrait'); ?>
            </div>
            <div class="two-thirds">
                <?php the_content(); ?>
            </div>
        </div>
    </div>

    <?php 



	  		$relatedPrograms = get_field('related_programs');

	  		if ($relatedPrograms) {


	  			echo '<hr class="section-break">';

	  			echo '<h2 class="headline headline--medium">Subject(s) Taught</h2>';

	  			echo '<ul class="link-list min-list">';
	  			foreach($relatedPrograms as $program) { ?>

    <li><a href="<?php echo get_the_permalink($program); ?>"><?php echo get_the_title($program) ?></a></li>

    <?php	}

	  			echo '</ul>';

	  			}
	  	?>

</div>

<?php }

	get_footer();
 ?>