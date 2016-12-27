<?php
/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */
automatic_feed_links();

// Add specific CSS class by filter
function add_slug_body_class( $classes ) {
    global $post;
    if ( isset( $post ) ) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

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

function portfolio_init() {
    // create a new taxonomy
    register_taxonomy(
        'portfolio-type','portfolio',
        array(
            'labels' => array(
        'name' => 'Portfolio Type',
        'add_new_item' => 'Add New Portfolio Type',
        'new_item_name' => "New Portfolio Type"
      ),
      'show_ui' => true,
      'show_tagcloud' => false,
      'hierarchical' => true
        )
    );
}
add_action( 'init', 'portfolio_init' );

// Beers Post Type
function create_post_type_portfolio()
{
  register_taxonomy_for_object_type('category', 'portfolio'); // Register Taxonomies for Category
  register_post_type('portfolio', // Register Custom Post Type
    array(
    'labels' => array(
        'name' => __('Portfolio', 'portfolio'),
        'singular_name' => __('Item', 'portfolio'),
        'add_new' => __('Add New Item', 'portfolio'),
        'add_new_item' => __('Add New Item', 'portfolio'),
        'edit' => __('Edit', 'portfolio'),
        'edit_item' => __('Edit Items', 'portfolio'),
        'new_item' => __('New Item', 'portfolio'),
        'view' => __('View Items', 'portfolio'),
        'view_item' => __('View Item', 'portfolio'),
        'search_items' => __('Search Portfolio', 'portfolio'),
        'not_found' => __('No Portfolio posts found', 'portfolio'),
        'not_found_in_trash' => __('No Portfolio posts found in Trash', 'portfolio')
    ),
    'public' => true,
    'menu_position' => 4,
    'menu_icon' => 'dashicons-star-filled',
    'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
    'has_archive' => true,
    'supports' => array(
        'title',
        'editor',
        'thumbnail'
    ),
    'can_export' => true, // Allows export in Tools > Export
    'taxonomies' => array(
        'portfolio-type',
        'post_tag'
    ) // Add Category support
  ));
}
add_action('init', 'create_post_type_portfolio'); // Add our Portfolio Type

// Renames "Posts" to "News"
function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'News';
    $submenu['edit.php'][5][0] = 'News';
    $submenu['edit.php'][10][0] = 'Add News';
    echo '';
}

function change_post_object_label() {
  global $wp_post_types;
  $labels = &$wp_post_types['post']->labels;
  $labels->name = 'News';
  $labels->singular_name = 'News Story';
  $labels->add_new = 'Add News Story';
  $labels->add_new_item = 'Add News Story';
  $labels->edit_item = 'Edit News Story';
  $labels->new_item = 'News Story';
  $labels->view_item = 'View News Story';
  $labels->search_items = 'Search News Stories';
  $labels->not_found = 'No News Stories found';
  $labels->not_found_in_trash = 'No News Stories found in Trash';
}
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );