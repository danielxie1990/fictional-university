<?php 
	
function university_files() {
	wp_enqueue_style('university_main_styles', get_stylesheet_uri());
	wp_enqueue_style('university_font_awesome_styles', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
}

add_action('wp_enqueue_scripts', 'university_files');


