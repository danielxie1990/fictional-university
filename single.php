<?php 
	get_header();
	// keep looping while we still have post
	while (have_posts()) {
		// Function the_post() checks whether the loop has started and then sets the current post by moving, each time, to the next post in the queue.
		the_post(); 

		pageBanner();

		?>


<div class="container container--narrow page-section">

    <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
            <a class="metabox__blog-home-link" href="<?php echo site_url('/blog'); ?>">
                <i class="fa fa-home" aria-hidden="true"></i>
                Blog Home
            </a>
            <span class="metabox__main">
                Posted by <?php the_author_posts_link(); ?> on <?php the_time('n.j.y'); ?> in
                <?php echo get_the_category_list(', ') ?>
            </span>
        </p>
    </div>

    <div class="generic-content">
        <?php the_content(); ?>
    </div>

</div>

<?php }

	get_footer();
 ?>