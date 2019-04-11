<?php 
	
function university_files() {
	wp_enqueue_script('university_js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, '1.0', true);
	wp_enqueue_style('university__fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
	wp_enqueue_style('university_main_styles', get_stylesheet_uri());
	wp_enqueue_style('university_font_awesome_styles', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
}

add_action('wp_enqueue_scripts', 'university_files');


function university_features() {
	// register_nav_menu('footerMenuLocation', 'Footer Menu Location By Daniel');
	// register_nav_menu('headerMenuLocation', 'Header Menu Location By Daniel');
	add_theme_support('title-tag');
}

add_action('after_setup_theme', 'university_features');



function university_adjust_queries($query) {
	if (!is_admin() and is_post_type_archive('event') and $query->is_main_query()) {
		// $query->set('posts_per_page', 1);
		$query->set('meta_key', 'event_date');
		$query->set('orderby', 'meta_value_num');
		$query->set('order', 'ASC');
		$query->set('meta_query', array(
			array(
				'key' => 'event_date',
				'compare' => '>=',
				'value' => date('Ymd'),
				'type' => 'numeric'
			)
		));

		}

	if (!is_admin() and is_post_type_archive('program') and $query->is_main_query()) {

		$query->set('posts_per_page', -1);
		$query->set('orderby', 'title');
		$query->set('order', 'ASC');
		}	
}
add_action('pre_get_posts', 'university_adjust_queries');


