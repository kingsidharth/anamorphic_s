<?php

# ================================ 
# TAXONOMIES & POST DATA 
# ================================

# REGISTER CUSTOM TAXONOMIES

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
		'slug'                       => 'authors',
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

add_action( 'init', 'anamorphic_authors_taxnomy', 0 );


// Genre (common)
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

add_action( 'init', 'anamorphic_actor', 0 );


// Series
function anamorphic_series()  {
	$labels = array(
		'name'                       => 'Series',
		'singular_name'              => 'Series',
		'menu_name'                  => 'Series',
		'all_items'                  => 'All Series',
		'new_item_name'              => 'New Series',
		'add_new_item'               => 'Add A New Series',
		'edit_item'                  => 'Edit Series Details',
		'update_item'                => 'Update Series Details',
		'separate_items_with_commas' => 'Separate series with commas',
		'search_items'               => 'Search series...',
		'add_or_remove_items'        => 'Add or remove Series',
		'choose_from_most_used'      => 'Choose from the Series',
	);

	$rewrite = array(
		'slug'                       => 'series',
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

	register_taxonomy( 'series', 'post', $args );
}

add_action( 'init', 'anamorphic_series', 0 );
