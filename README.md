# fictional-university
This is a learning recording of wordpress theme development form udemy course

The local wordpress development tool I choosed is xampp
https://www.apachefriends.org/




-----------------------------------------------------------
10. The Famous "Loop" in WordPress

functions

#have_posts()
#the_post()
#the_title()
#the_content()

#get_permalink(), need to echo, since It only returns a value of retrived link

How do we keep the link while we at the index.php page, and remove the link, when we are at the single detailed post page?

#using single.php to control the single post(only the post not the page)
#homepage will still be powered by index.php

depending on the current url, wordpress will keep looking out different file names in our theme folder, if the single.php file not existed, 
wordpress will use index.php as an universal default

#page.php to control the single page

---------------------------------------------------------------


11. Header & Footer

functions

get_header( string $name = null )

Load header template

Description #Description
Includes the header template for a theme or if a name is specified then a specialised header will be included.

For the parameter, if the file is called "header-special.php" then specify "special".

Parameters #Parameters
$name
(string) (Optional) The name of the specialised header.

Default value: null


get_footer();


# Loading css file to wordpress

wp_head();

loads whatever needs to be loaded in our head

Plugins and WordPress core use this function to insert crucial elements into your document (e.g., scripts, styles, and meta tags). Always put wp_head() just before the closing tag of your theme (usually in header.php)

step 1: 

<head>
    <!-- First add the elements you need in <head>; then last, add: -->
    <?php wp_head(); ?>
</head>


step 2:

create new 

<!-- not a template file, where we have conversation with the wordpress core -->
functions.php file


add_action();

hooks a function on to a specific action.

Actions are the hooks that the wordpress core lanches at specific points during execution, or when specific events occur. 

/**
 * Proper way to enqueue scripts and styles.
 */
function university_files() {
    wp_enqueue_style( 'university_main_style', get_stylesheet_uri() );
    wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'university_files' ); // we don't add () to the function here, instead you and I call the function immediately, tell wordpress, this the name of the funciton, it is up to you to decide when and where to call the funciton


wp_footer();

<?php
   /* Always have wp_footer() just before the closing </body>
    * tag of your theme, or you will break many plugins, which
    * generally use this hook to reference JavaScript files.

     <!-- load the js file, or in this case, add the black admin menu bar at the top of the page -->
    */
    wp_footer();
?>
</body>
</html>




get_theme_file_uri('')

needs to echo out the result

------------------------------------------------------------------------------------------------------------


wp_equeue_script();

Usage #Usage
1
wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer );
Links a script file to the generated page at the right time according to the script dependencies, if the script has not been already included and if all the dependencies have been registered. You could either link a script with a handle previously registered using the wp_register_script() function, or provide this function with all the parameters necessary to link a script.

This is the recommended method of linking JavaScript to a WordPress generated page.z`z`


function university_files() {
    wp_enqueue_script('university_js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, '1.0', true);
    wp_enqueue_style('university__fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('university_main_styles', get_stylesheet_uri());
    wp_enqueue_style('university_font_awesome_styles', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
}

add_action('wp_enqueue_scripts', 'university_files');



----------------------------------------------

15. Parent & Child page

# how to get the current page's parent id?

wp_get_post_parent_id(get_the_ID());

# what's the difference between using 

the_title()  get the current page title no arguments! 
and 
get_the_title($id) get the specific page title via passed post id -------need echo


get_permalink($id) get the specific page url--------need to echo the result retrived




-------------------------------------------------

# 17. Menu of child page links

wp_list_pages(array())

using a filter array to decide which pages are listed as <li> element

# how to check whether a page is neither a child page or a parent page?

<?php 

        $testArray = get_pages(array(

            'child_of' => get_the_ID()
        ));


        if ($theParent or $testArray) { ?>
        
# check if current page is a parent page or a child page

if ($theParent) {
                $findChildrenOf = $theParent;
            } else {
                $findChildrenOf = get_the_ID();
            }



