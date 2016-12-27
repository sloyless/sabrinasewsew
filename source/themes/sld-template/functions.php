<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */
automatic_feed_links();

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</ul>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	));
}

// Add menu support
function register_my_menu() {
  register_nav_menu('main-menu',__( 'Main Menu' ));
}
add_action( 'init', 'register_my_menu' );

// Add Featured Image for posts functionality
if (function_exists( 'add_theme_support' ) ) { 
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1098, 731, false ); // default Post Thumbnail dimensions (cropped)
}

// Add page slug to body class
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// Change excerpt word cutoff length
function new_excerpt_length($length) {
	return 12;
}
add_filter('excerpt_length', 'new_excerpt_length');

// Adds thumbnail to RSS Feed
function insertThumbnailRSS($content) {
	global $post;
	if ( has_post_thumbnail( $post->ID ) ){
		$content = '' . get_the_post_thumbnail( $post->ID, 'thumbnail' ) . '' . $content;
	}
	return $content;
}

// More featured images for Pages/posts
if (class_exists('MultiPostThumbnails')) {
    new MultiPostThumbnails(
        array(
            'label' => 'Secondary Image',
            'id' => 'secondary-image',
            'post_type' => 'page'
        )
    );
    new MultiPostThumbnails(
        array(
            'label' => 'Tertiary Image',
            'id' => 'tertiary-image',
            'post_type' => 'page'
        )
    );
}