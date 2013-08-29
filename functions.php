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
	add_theme_support( 'post-formats', array( 'aside', 'link' ) );
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

/* ______ REGISTER CUSTOM TAXONOMIES ______ */

// Authors (for books)
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


// Genre (common?)
function anamorphic_genre()  {
	$labels = array(
		'name'                       => 'Genre',
		'singular_name'              => 'Genre',
		'menu_name'                  => 'Genre',
		'all_items'                  => 'All Genre',
		'new_item_name'              => 'New Genre',
		'add_new_item'               => 'Add A New Genre',
		'edit_item'                  => 'Edit Genre',
		'update_item'                => 'Update Genre',
		'separate_items_with_commas' => 'Separate genre with commas',
		'search_items'               => 'Search genre...',
		'add_or_remove_items'        => 'Add or remove Genre',
		'choose_from_most_used'      => 'Choose from the genre',
	);

	$rewrite = array(
		'slug'                       => 'genre',
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

	register_taxonomy( 'genre', 'post', $args );
}


// Hook into the 'init' action
add_action( 'init', 'anamorphic_genre', 0 );


// Actor(s)
function anamorphic_actor()  {
	$labels = array(
		'name'                       => 'Actors',
		'singular_name'              => 'Actor',
		'menu_name'                  => 'Actors',
		'all_items'                  => 'All Actors',
		'new_item_name'              => 'New Actor',
		'add_new_item'               => 'Add A New Actor',
		'edit_item'                  => 'Edit Actor Details',
		'update_item'                => 'Update Actor Details',
		'separate_items_with_commas' => 'Separate actors with commas',
		'search_items'               => 'Search actor...',
		'add_or_remove_items'        => 'Add or remove Actor(s)',
		'choose_from_most_used'      => 'Choose from the Actor',
	);

	$rewrite = array(
		'slug'                       => 'actor',
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

	register_taxonomy( 'actor', 'post', $args );
}


// Hook into the 'init' action
add_action( 'init', 'anamorphic_actor', 0 );


function anamorphic_list_taxonomy($args) {
  // Unfold the Array
  $tax_slug = $args['slug'];
  $tax_title = $args['title'];
  // For schema markup
  $schema_prop = $args['prop'];
  $schema_scope = $args['scope'];
  $schema_link_prop = $args['link_prop'];

  $terms = get_terms($tax_slug);
  echo '<p class="'. $tax_slug. '">';
  if($tax_title){
    echo "<strong>$tax_title: </strong>";
  }

  foreach ($terms as $term) {
    //Always check if it's an error before continuing. get_term_link() can be finicky sometimes
    $term_link = get_term_link( $term, $tax_slug );
    if( is_wp_error( $term_link ) )
        continue;
    //We successfully got a link. Print it out.
    echo '<span ';
    if($schema_prop) {
      echo "itemprop='$schema_prop'";
    }
    if($schema_scope) {
      echo "itemscope itemtype='http://schema.org/$schema_scope'";
    }
    echo '>';
    echo '<a rel="nofllow" href="' . $term_link .'" ';
    if($schema_link_prop) {
      echo "itemprop='$schema_link_prop'";
    }
    echo '>' . $term->name . '</a>, </span>';
  }
  echo '</p>';
}

function anamorphic_custom_tax_list($args) {
  $post = $args['post_id'];
  $tax_slug = $args['tax_slug'];
  $tax_title = $args['tax_title'];
  $prop = $args['tax_item_prop'];
  $scope = $args['tax_item_scope'];
  $child_prop = $args['tax_item_child_prop'];
  $before = $args['before'];
  $after  = $args['after'];

  $before_list = '';
  if($tax_title) {
    $before_list .= "<strong>$tax_title: </strong>";
  }
  if($prop && $scope && $child_prop) {
    $before_list .= "<span itemprop='$prop' itemscope itemtype='http://schema.org/$scope'><span itemprop='$child_prop'>";
  } elseif($prop) {
    $before_list .= "<span itemprop='$prop'>";
  } else {
    $before_list .= "<span>";
  }

  $separator = '';
  if($prop && $scope && $child_prop) {
    $separator .= "</span></span>, " . 
      "<span itemprop='$prop' itemscope itemtype='http://schema.org/$scope'><span itemprop='$child_prop'>";
  } elseif($prop){
    $separator .= "</span>, " . 
      "<span itemprop='$prop'>";
  } else {
    $separator .= '</span>, <span>'; 
  }

  $after_list = '';
  if($prop && $scope && $child_prop) {
    $after_list .='</span></span>';
  } elseif($prop) {
    $after_list .='</span>';
  } else {
    $after_list .='</span>';
  }

  echo $before;

  the_terms( 
    $post,
    $tax_slug,
    $before_list,
    $separator,
    $after_list
  );

  echo $after;
}


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
      ),

      // Year Released
      array(
        'name' => 'Year Released',
        'id'   => $prefix . 'release_year',
        'type' => 'text',
      ),

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

      // Amazon India 
      array(
        'name' => 'Amazon India',
        'id' => $prefix . 'aff_amazon',
        'type' => 'text',
      ),

      array(
        'name' => 'Amazon US',
        'id'   => $prefix . 'aff_amazon_us',
        'type' => 'text',
      ),

      // Infibeam
      array(
        'name' => 'Infibeam',
        'id'   => $prefix . 'aff_infibeam',
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
  # Making the variables accessible
  # outside this function.
  # Somehow, doesn't work on
  # single post stuff.
  global $subheading,
    $rating, 
    $main_image, 
    $other_name,

    $itemtype, 
    
    $directors, 
    $release_year,     
    
    $authors, 
    $bookisbn, 
    $publisher, 

    $flipkart_link, $amazon_link, $amazon_us_link, $other_link, $infibeam_link,
    $extended_title;  
  
  # COMMON METADATA
  
  $subheading = $meta[anamorphic_subheading][0];
  $rating     = $meta[anamorphic_rating][0];
  $main_image = $meta[anamorphic_imageurl][0];  
  $other_name = $meta[anamorphic_name][0];

  # Define Item type
  # based on category 
  # assigned.
  if(in_category('book', $post->ID)) {
    $itemtype = 'book';
  } 
  elseif(in_category('film', $post->ID)) {
    $itemtype = 'film';
  } else {
    $itemtype = 'other';
  }

  # Film Specific Metadata
  $dirctr_str = $meta[anamorphic_directors][0];
  $directors  = explode(",", $dirctr_str);

  $release_year = $meta[anamorphic_release_year][0];
  
  # Book Specific Metadata
  $author_str= $meta[anamorphic_authors][0];
  $authors   = explode(",", $author_str);

  $bookisbn   = $meta[anamorphic_isbn][0];

  $publisher  = $meta[anamorphic_publisher][0];


  # Affiliate Links 
  $flipkart_link    = $meta[anamorphic_aff_flipkart][0];
  $amazon_link      = $meta[anamorphic_aff_amazon][0];
  $amazon_us_link   = $meta[anamorphic_aff_amazon_us][0];
  $infibeam_link    = $meta[anamorphic_aff_infibeam][0];
  $other_link       = $meta[anamorphic_aff_other][0];
  if($flipkart_link || $amazon_link || $other_link || $amazon_us_link) {
    global $affiliate;
    $affiliate = true;
  }
  
  # Extended Title
  if($itemtype == 'book') {
    # Book: <Book Title> by <Author>
    # TODO: Various Authors Automation
    $extended_title = get_the_title() . ' by ' . implode(",", $authors);
  } elseif ($item_type = 'film') {
    # Film: Film (<Release Year>)
    $extended_title = get_the_title() . ' ('. $release_year . ')';
  } else {
    $extended_title = get_the_title();
  }
}

function check_print_affiliate_link($link, $text) {
  if($link) {
    echo "<li><a href='$link' rel='nofollow' target='_blank'>$text</a></li>"; 
  }
}

/* _____ GET ARRAY INTO A LIST ______ */
function get_array_list($array) {
  echo implode(",", $array);
} 

function the_array_list($array) {
  echo get_array_list($array);
}


/* ______ IMAGE RESIZING _____ */
# Uses embed.ly
# TODO: Make this inhouse.
function anamorphic_resize($image_url, $width ) {
  $resized_url = 'http://i.embed.ly/1/display/resize?key=1bb0b297268c4c30bba79833f323b94f&url='
    . $image_url . '&errorUrl=' . $image_url 
    . '&width=' . $width;
  return $resized_url;
}

