<?php
/**
 * @package anamorhpic
 */
?>
<?php
  /* Get the Posts Meta data
   * must be called inside the
   * loop.
   */
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

  $publisher  = $meta[anamorphic_publisher][0];


  # Affiliate Links 
  $flipkart_link = $meta[anamorphic_aff_flipkart][0];
  $amazon_link = $meta[anamorphic_aff_amazon][0];
  $other_link = $meta[anamorphic_aff_other][0];


  if($itemtype == 'book') {
    $extended_title = get_the_title() . ' by ' . implode(",", $authors);
  } else {
    $extended_title = get_the_title();
  }

?>
<script>
  // Get the rating number
  var rating, rating_float, noStar;
  var rateIt = function(rating, noStar, rating_float) {
    if(rating % 1 === 0) {
      for (var i = 0; i < rating; i++) {
        $('.rating').append('<i class="icon icon-star"></i> ');
      }
      for (var i = 0; i < noStar; i++) {
        $('.rating').append('<i class="icon icon-star-empty"></i> ');
      }
    } else {
      rating = Math.round(rating) - 1; // Set rating to rounded down.
      noStar = 4 - rating;
      for (var i = 0; i < rating; i++) {
        $('.rating').append('<i class="icon icon-star"></i> ');
      }
      $('.rating').append('<i class="icon icon-star-half-full"></i> ');
      for (var i = 0; i < noStar; i++) {
        $('.rating').append('<i class="icon icon-star-empty"></i> ');
      }
    }
  }
  $(document).ready(function() {
    window.rating = <?php echo $rating; ?>;
    window.rating_float = Math.round(rating*10)/10;
    window.noStar = 5 - rating;

    $('.rating').empty(); 
    rateIt(rating, noStar, rating_float);
  });

</script>
<article itemprop="review" itemscope itemtype="http://schema.org/Review" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div itemprop="itemReviewed" itemscope itemtype="
   <?php if($itemtype == 'book') {
     echo "http://schema.org/Book";
   } elseif($itemtype == 'film') {
     echo "http://schema.org/Movie";
   } ?>" class="sidebar single_sidebar grid__item three-eighths palm-one-whole right">
    <aside class="photo">
      <img src="<?php echo $main_image ?>" 
      alt="<?php echo $extended_title; ?>" title="<?php echo $extended_title; ?>" itemprop="image">
    </aside>

    <aside class="about">
    <p class="entry-meta main-meta" >
    <span class="name" itemprop="name">
    <?php 
      if($other_name) {
        echo $other_name;
      } else {
        the_title();
      }?>
    </span>
    <span class="byline">
    <?php if($itemtype == 'film') { echo 'directed '; } ?>by</span>
    <?php
        if($itemtype =='film') {
          foreach ($directors as $director) {          
            echo '<span class="creator director" itemprop="director" itemscope itemtype="http://schema.org/Person"><span itemprop="name">';
            echo $director;
            echo '</span></span>';
          }
        } elseif($itemtype == 'book') { 
          foreach ($authors as $author) {
            echo '<span class="creator author" itemprop="author" itemscope itemtype="http://schema.org/Person"><span itemprop="name">'; 
            echo $author;
            echo '</span></span>';
          }
        }
    ?></span></p>
    <?php 
      if($itemtype == 'film') {
        if(!empty($actors)){
          echo '<p class="actor entry-meta"><strong>Starring:</strong> ';
          foreach ($actors as $actor) {
            echo '<span itemprop="actor" itemscope itemtype="http://schema.org/Person">';
            echo "<span itemprop=name>$actor</span>";
            echo '</span>, ';
          }
          echo '</p>';
        }
        # end if($authors)
      } elseif($itemtype == 'book') {
        echo '<p class="entry-meta sub-meta">';
        if($bookisbn) {
          echo '<span class="entry-isbn"><strong>ISBN:</strong> ';
          echo "<span itemprop='isbn'>$bookisbn</span></span>";
        }
        if($publisher) {
          echo '<span class="entry-publisher"><strong>Publisher:</strong> ';
          echo "<span itemprop=publisher>$publisher</span></p>";
        }
        echo '</p>';
      }
 
      # BEGIN AFFILATE SHIT
      
      if($flipkart_link || $amazon_link || $other_link) {
        
        # IF Rating is higher than 1.5
        if($rating > 1.5) {
          echo "<p>Buy it on: ";
        } else {
          echo "<p>I really don't think you should buy it, but if you must: ";
        }

        # THE LINKS

        if($amazon_link) { 
          echo "<a href='$amazon_link' rel='nofollow' target='_blank'>Amazon</a>, "; 
        }
        if($flipkart_link) {
          echo "<a href='$flipkart_link' rel='nofollow' target='_blank'>Flipkart</a>, "; 
        }
        if($other_link) { 
          echo "<a href='$other_link' rel='nofollow' target='_blank'>this site</a>";
        }

        # le Fin
        echo "<br/><small>These are affiliate links.</small>";
        echo "</p>";
      }?>
    </aside> 
    <aside class="social-share">
      <ul class="nav nav--stacked">
        <!--<li><div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="true" data-layout="button_count" data-width="250" data-show-faces="false"></div></li>-->
        <!--<li><div class="fb-follow" data-href="https://www.facebook.com/KingSidharth" data-layout="button_count" data-show-faces="false" data-width="200"></div></li>-->
        <li><div class="fb-like-box" data-href="https://www.facebook.com/anamorphic.in" data-width="250" data-show-faces="false" data-stream="false" data-show-border="false" data-header="false"></div></li>
      </ul>
    </aside>
    <aside class="admin-ui">
      <?php edit_post_link( __( 'Edit', 'anamorhpic' ), '<span class="admin edit-link">', '</span>' ); ?>
    </aside>
  </div><!-- .sidebar

  --><div class="format_text grid__item five-eighths palm-one-whole">
    <header class="entry-header">
      <h1 itemprop="name" class="entry-title"><?php echo $extended_title; ?></h1>
      <div class="entry-meta">
      <?php
        if($subheading) {
          echo '<p class="subheading" itemprop="alternativeHeadline">';
          echo $subheading;
          echo '</p>';
        }
        echo '<p class="rating" itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">';
        echo '<meta itemprop="worstRating" content="1"/>';
        echo "Rating <span itemprop='ratingValue'>$rating</span> out of <span itemprop='bestRating'>5</span>";
        echo '</p>';
      ?> 
        <meta itemprop="author" content="King Sidharth"/>
      </div><!-- .entry-meta -->
    </header><!-- .entry-header -->
    <div class="entry-content" itemprop="reviewBody">
      <?php the_content(); ?>
    </div><!-- .entry-content -->
    <div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="true" data-width="450" data-show-faces="false"></div>
    <p>&nbsp;</p>
    <aside class="breadcrumbs entry-meta">
    <p class="entry-date">
      <span class="published"><meta itemprop="datePublished" content="<?php the_date('c'); ?>"/>Published on <?php echo get_the_date('F j, Y'); ?>.</span>
      <span class="updated">Updated on <meta itemprop="dateModified" content="<?php the_modified_date('c'); ?>"><?php the_modified_date(); ?>.</span>
    </p>
    <ul class="nav">
      <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
        <a itemprop="url" href="/"><span itemprop="title">Anamorphic</span></a>
      </li>
      <li class="separator"><a><i class="icon icon-chevron-right"></i></a></li>
      <?php if($itemtype =='film') { ?>
      <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
        <a itemprop="url" href="/category/film"><span itemprop="title">Films</span></a>
      </li>
      <?php } elseif($itemtype =='book') { ?> 
      <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
        <a itemprop="url" href="/category/book"><span itemprop="title">Books</span></a>
      </li> 
      <?php } ?>
      <li class="separator"><a><i class="icon icon-chevron-right"></i></a></li>
      <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
        <a itemprop="url" href="<?php the_permalink(); ?>"><span itemprop="title"><?php the_title(); ?></span></a>
      </li>
    </ul>
    </aside> 
  </div><!-- .format_text-->
</article><!-- #post-## -->
