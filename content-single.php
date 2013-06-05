<?php
/**
 * @package anamorhpic
 */
?>
<?php
/* Get all the Meta Values */
$meta = get_post_meta( $post->ID );
# Uncomment line below to print 
# the meta values. Helpful for 
# debugging
# print_r($meta);

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
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>

		<div class="entry-meta">
			<?php anamorhpic_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'anamorhpic' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php
      /* meta here */ 
		?>
		<?php edit_post_link( __( 'Edit', 'anamorhpic' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
