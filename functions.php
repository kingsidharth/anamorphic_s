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
/* function anamorphic_people_taxnomy()  {
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
} */

function anamorphic_authors_taxnomy()  {
	$labels = array(
		'name'                       => 'Authors',
		'singular_name'              => 'Author',
		'menu_name'                  => 'Authors',
		'all_items'                  => 'All Authors',
		'new_item_name'              => 'New Author',
		'add_new_item'               => 'Add A New Author',
		'edit_item'                  => 'Edit Author',
		'update_item'                => 'Update Author',
		'separate_items_with_commas' => 'Separate authors with commas',
		'search_items'               => 'Search authors...',
		'add_or_remove_items'        => 'Add or remove Authors',
		'choose_from_most_used'      => 'Choose from the author',
	);

	$rewrite = array(
		'slug'                       => 'author',
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

	register_taxonomy( 'authors', 'post', $args );
}

// Hook into the 'init' action
add_action( 'init', 'anamorphic_authors_taxnomy', 0 );

/* META BOXES */
add_filter( 'cmb_meta_boxes', 'anamorphic_metaboxes' );
 
function anamorphic_metaboxes( $meta_boxes ) {
  $prefix = 'anamorphic_';

  /* Meta Box for Common Fields */
	$meta_boxes[] = array(
    'id' => 'review_data',
    'title' => 'Review Data',
    'context' => 'side',
    'priority' => 'high',
    'pages' => array('post'),
    'show_names' => true,
    'fields' => array(
      // Rating
      array(
        'name' => 'Rating',
        'id'   => $prefix . 'rating',
        'type' => 'text_small'
      ),

      // Main image [array of this for Open Graph]
      array(
        'name' => 'Main Image',
        'desc' => 'Goes in sidebar',
        'id'   => $prefix . 'imageurl',
        'type' => 'text',
      ),

      // Based On URL
      array (
        'name'  => 'Based on',
        'id'    => $prefix . 'basedon',
        'type'  => 'text',
      ),

      array(
        'name' => 'Item Type',
        'id'   => $prefix . 'item_type',
        'type' => 'text',
      )
    )
	);

  /* Meta box for Other Side Data */
  $meta_boxes[] = array(
    'id' => 'other_data',
    'title' => 'Side Data',
    'context' => 'normal',
    'priority' => 'high',
    'pages' => array('post'),
    'show_names' => true,
    'fields' =>  array(
      // Other Name 
      array(
        'name' => 'Other Name',
        'id' => $prefix . 'name',
        'type' => 'text',
      ),

      // Sub Heading
      array(
        'name' => 'Sub Heading',
        'id' => $prefix . 'subheading',
        'type' => 'text',
      )
    ),
  );
  
  /* Meta Box for Film Reviews */
  $meta_boxes[] = array(
    'id' => 'movie_data',
    'title' => 'Movie Data',
    'context' => 'normal',
    'pages' => array('post'),    
    'priority' => 'high',
    'show_names' => true,
    'fields' => array(
      // Director(s)
      array(
        'name' => 'Director(s)',
        'id'   => $prefix . 'directors',
        'type' => 'text',        
      ),

      // Actor(s)
      array(
        'name' => 'Actor(s)',
        'id'   => $prefix . 'actors_list',
        'type' => 'text',        
      ),

      // Short?
      array(
        'name' => 'Is this a Short Film?',
        'id'   => $prefix . 'film_length',
        'type' => 'checkbox',
      ),

      // Bollywood / Hollywood / Indie?
      array(
        'name' => 'Film Origin',
        'id'   => $prefix . 'origin',
        'type' => 'radio',
        'options' => array(
          array('name' => 'Hollywood', 'value' => 'hollywood'),
          array('name' => 'Bollywood', 'value' => 'bollywood'),
          array('name' => 'Indiependent', 'value' => 'indie'),
          array('name' => 'Other', 'value' => 'other')
        ),
      )
    ),
  );

  /* Meta Box for Book Reviews */
  $meta_boxes[] = array(
    'id' => 'book_data',
    'title' => 'Book Data',
    'pages' => array('post'),    
    'context' => 'normal',
    'show_names' => true,
    'priority' => 'high',
    'fields' => array(
      // Author
      array(
        'name' => 'Author(s)',
        'id'   => $prefix . 'authors',
        'type' => 'text',
      ),

      // ISBN
      array(
        'name' => 'ISBN',
        'id' => $prefix . 'isbn',
        'type' => 'text',
      ),

      // Publisher
      array(
        'name' => 'Publisher',
        'id' => $prefix . 'publisher',
        'type' => 'text',
      ),

    ),
  );

  $meta_boxes[] = array(
    'id' => 'aff_data',
    'title' => 'Affiliate Links',
    'pages' => array('post'),
    'context' => 'normal',
    'show_names' => true,
    'priority' => 'low',
    'fields' => array(
      // Flipkart
      array(
        'name' => 'Filpkart',
        'id' => $prefix . 'aff_flipkart',
        'type' => 'text',
      ),

      // Amazon 
      array(
        'name' => 'Amazon',
        'id' => $prefix . 'aff_amazon',
        'type' => 'text',
      ),

      // Other 
      array(
        'name' => 'Other Link',
        'id' => $prefix . 'aff_other',
        'type' => 'text',
      ),
    ),
  );

	return $meta_boxes;
}

add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
function be_initialize_cmb_meta_boxes() {
	if ( !class_exists( 'cmb_Meta_Box' ) ) {
		require_once( 'lib/metabox/init.php' );
	}
}

/* RATING to Star System in PHP */
function anamorhpic_rating_to_star($rating) {
  $round_rating = floor($rating); // Reset rating to down round up  
  
  if($rating != $round_rating) {
    // If Rating is in points
    // Count empty stars
    $no_star = 5 - $round_rating; // .5 rounds upwards

    // Print the full stars
    for ($i = 0; $i < $round_rating; $i++) {
      echo '<i class="icon icon-star"></i> ';
    }

    // Print the half star 
    echo '<i class="icon icon-star-half-full"></i> ';

    // Print empty stars
    for ($i = 1; $i < $no_star; $i++) {
       echo '<i class="icon icon-star-empty"></i> ';
    }
    
  } else {
    // Count the empty stars
    $no_star = 5 - $rating;                    

    // Print full stars = rating.
    for ($i = 0; $i < $rating; $i++) {
      echo '<i class="icon icon-star"></i> ';
    }

    // Print empty stars.
    for ($i = 0; $i < $no_star; $i++) {
      echo '<i class="icon icon-star-empty"></i> ';
    }
  }
}

/* ____ GET META _____ */

function anamorphic_post_data($meta) {
  global $subheading, $rating, $itemtype, $main_image, $other_name,
    $directors, $authors, $actors, $bookisbn, $publisher, $extended_title,
    $flipkart_link, $amazon_link, $other_link;
  # Fetch Subheading
  $subheading = $meta[anamorphic_subheading][0];

  # Fetch Rating out of 5
  # just contains rating
  $rating     = $meta[anamorphic_rating][0];

  # Item type film or book
  $itemtype   = $meta[anamorphic_item_type][0]; 

  # URL of main image also
  # used for Open Graph
  $main_image = $meta[anamorphic_imageurl][0];

  # In case title of Review
  # is differnt, override.
  $other_name = $meta[anamorphic_name][0];

  # Get name of a single 
  # director or CSL of
  # directors.
  $dirctr_str = $meta[anamorphic_directors][0];
  $directors  = explode(",", $dirctr_str);

  # Get CSL or single name
  # of author(s).
  $author_str= $meta[anamorphic_authors][0];
  $authors   = explode(",", $author_str);

  # Get CSL list of actors 
  # and split it in individual.
  $actors_str = $meta[anamorphic_actors_list][0];
  $actors     = explode(",",$actors_str);

  $bookisbn   = $meta[anamorphic_isbn][0];

  $publisher  = $meta[anamorphic_publisher][0];


  # Affiliate Links 
  $flipkart_link = $meta[anamorphic_aff_flipkart][0];
  $amazon_link = $meta[anamorphic_aff_amazon][0];
  $other_link = $meta[anamorphic_aff_other][0];


  if($itemtype == 'book') {
    $extended_title = get_the_title() . ' by ' . implode(",", $array);
  } else {
    $extended_title = get_the_title();
  }
}

function get_array_list($array) {
  echo implode(",", $array);
} 

function the_array_list($array) {
  echo get_array_list($array);
}
