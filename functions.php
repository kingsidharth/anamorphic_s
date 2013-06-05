<?php
/**
 * anamorhpic functions and definitions
 *
 * @package anamorhpic
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'anamorhpic_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function anamorhpic_setup() {

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	# add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'anamorhpic' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
}
endif; // anamorhpic_setup
add_action( 'after_setup_theme', 'anamorhpic_setup' );

/**
 * Setup the WordPress core custom background feature.
 *
 * Use add_theme_support to register support for WordPress 3.4+
 * as well as provide backward compatibility for WordPress 3.3
 * using feature detection of wp_get_theme() which was introduced
 * in WordPress 3.4.
 *
 * @todo Remove the 3.3 support when WordPress 3.6 is released.
 *
 * Hooks into the after_setup_theme action.
 */
function anamorhpic_register_custom_background() {
	$args = array(
		'default-color' => 'ffffff',
		'default-image' => '',
	);

	$args = apply_filters( 'anamorhpic_custom_background_args', $args );

	if ( function_exists( 'wp_get_theme' ) ) {
		add_theme_support( 'custom-background', $args );
	} else {
		define( 'BACKGROUND_COLOR', $args['default-color'] );
		if ( ! empty( $args['default-image'] ) )
			define( 'BACKGROUND_IMAGE', $args['default-image'] );
		add_custom_background();
	}
}
add_action( 'after_setup_theme', 'anamorhpic_register_custom_background' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function anamorhpic_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'anamorhpic' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'anamorhpic_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function anamorhpic_scripts() {
  
  wp_enqueue_style( 'anamorhpic-style', get_stylesheet_uri() );

}
add_action( 'wp_enqueue_scripts', 'anamorhpic_scripts' );

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

// Register Custom Taxonomy
function anamorphic_people_taxnomy()  {
	$labels = array(
		'name'                       => 'People',
		'singular_name'              => 'Person',
		'menu_name'                  => 'People',
		'all_items'                  => 'All People',
		'parent_item'                => 'Parent Person',
		'parent_item_colon'          => 'Parent Person:',
		'new_item_name'              => 'New Person',
		'add_new_item'               => 'Add A New Person',
		'edit_item'                  => 'Edit Person',
		'update_item'                => 'Update Person',
		'separate_items_with_commas' => 'Separate people with commas',
		'search_items'               => 'Search people...',
		'add_or_remove_items'        => 'Add or remove Person/People',
		'choose_from_most_used'      => 'Choose from the people',
	);

	$rewrite = array(
		'slug'                       => 'person',
		'with_front'                 => true,
		'hierarchical'               => false,
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'rewrite'                    => $rewrite,
	);

	register_taxonomy( 'people', 'post', $args );
}

// Hook into the 'init' action
add_action( 'init', 'anamorphic_people_taxnomy', 0 );


