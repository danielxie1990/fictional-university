<?php 
	get_header();
	// keep looping while we still have post
	while (have_posts()) {
		// Function the_post() checks whether the loop has started and then sets the current post by moving, each time, to the next post in the queue.
		the_post(); 

		

		?>

<div class="page-banner">
    <div class="page-banner__bg-image"
        style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg'); ?>);"></div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"><?php the_title(); ?></h1>
        <div class="page-banner__intro">
            <p>Rmember to replace the text here!</p>
        </div>
    </div>
</div>

<div class="container container--narrow page-section">



    <div class="generic-content">
        <div class="row group">
			<div class="one-third">
				<?php the_post_thumbnail(); ?>
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