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
  global $subheading, $rating, $itemtype, $main_image, $other_name,
    $directors, $authors, $actors, $bookisbn, $publisher, $release_year, $extended_title,
    $flipkart_link, $amazon_link, $other_link;
  $meta = get_post_meta( $post->ID );
  anamorphic_post_data($meta);

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
          <?php if($other_name) { echo $other_name; } else { the_title(); }?>
        </span>
        <span class="byline"><?php if($itemtype == 'film') { echo 'directed '; } ?>by</span>
        <?php
          if($itemtype =='film') {
            foreach ($directors as $director) {          
              echo '<span class="creator director" itemprop="director" itemscope itemtype="http://schema.org/Person">';
                echo '<span itemprop="name">';
                  echo $director;
                echo '</span>';
              echo '</span>';
            }
          } 
          elseif($itemtype == 'book') { 
            foreach ($authors as $author) {
              echo '<span class="creator author" itemprop="author" itemscope itemtype="http://schema.org/Person">';
                echo '<span itemprop="name">'; 
                  echo $author;
                echo '</span>';
              echo '</span>';
            }
          }?>
      </p><!-- .entry-meta.main-meta -->
    </aside>
    <?php 
      if($itemtype == 'film') {
        # IF ITEM IS A FILM
        echo '<aside class="entry-meta film-meta">';
        
        # The Actors
        $actor_args = array(
          'post_id' => $post->ID,
          'tax_slug' => 'actor',
          'tax_title' => 'Starring',
          'tax_item_prop' => 'actor',
          'tax_item_scope' => 'Person',
          'tax_item_child_prop' => 'name',
          'before' => '<p class="actors">',
          'after'  => '</p>',
        );
        anamorphic_custom_tax_list($actor_args);

        # Release Year
        if($release_year){
          echo '<p class="release_year"><strong>Year of Release: </strong>';
          echo '<span itemprop=datePublished>';
          echo $release_year;
          echo '</span></p>';
        }

        # End of FILM Meta
        echo '</aside>';
      } 
      elseif($itemtype == 'book') {
        # IF ITEM IS A BOOK
        echo '<aside class="entry-meta book-meta">';
        if($bookisbn) {
          echo '<p class="entry-isbn"><strong>ISBN: </strong> ';
          echo "<span itemprop='isbn'>$bookisbn</span></p>";
        }
        if($publisher) {
          echo '<p class="entry-publisher"><strong>Publisher: </strong> ';
          echo "<span itemprop=publisher>$publisher</span></p>";
        }
        echo '</aside>';
      } else {
        # If Item is some other stuff 
      }


      # COMMON META
      echo '<aside class="entry-meta common-meta">';

      # Genre
      $genre_args = array(
        'post_id' => $post->ID,
        'tax_slug' => 'genre',
        'tax_title' => 'Genre',
        'tax_item_prop' => 'genre',
        'before' => '<p class="genre_parent">',
        'after'  => '</p>',
      );
      anamorphic_custom_tax_list($genre_args);

      # End Common Meta
      echo '</aside>';
 
      # BEGIN AFFILATE SHIT
      /*(if($flipkart_link || $amazon_link || $other_link) {
        
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
      }?>*/
?>
    <aside class="admin-ui">
      <?php edit_post_link( __( '<i class="icon icon-edit"> </i>Edit', 'anamorhpic' ), '<span class="admin edit-link">', '</span>' ); ?>
    </aside>
    <aside class="social-share palm-hidden">
      <ul class="nav nav--stacked">
        <!--<li><div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="true" data-layout="button_count" data-width="250" data-show-faces="false"></div></li>-->
        <!--<li><div class="fb-follow" data-href="https://www.facebook.com/KingSidharth" data-layout="button_count" data-show-faces="false" data-width="200"></div></li>-->
        <li><a target="_blank" href="//pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo $main_image ?>&description=<?php echo $extended_title; ?>: <?php if($subheading) { echo $subheading; } ?>" data-pin-do="buttonPin" data-pin-config="none"><img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" /></a></li>
        <li><div class="fb-like-box" data-href="https://www.facebook.com/anamorphic.in" data-width="250" data-show-faces="false" data-stream="false" data-show-border="false" data-header="false"></div></li>
      </ul>
    </aside>
    <aside>
    <!--
      -->
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
        <div class="hidden review-author-meta" itemprop="author" itemscope itemtype="http://schema.org/Person">
          <meta itemprop="name" content="King Sidharth"/>
          <meta itemprop="url"  content="http://www.KingSidharth.com"/>
          <meta itemprop="url"  content="https://plus.google.com/100630005600562803456?rel=author"/>
        </div><!-- .review-author-meta -->
      </div><!-- .entry-meta -->
    </header><!-- .entry-header -->
    <div class="entry-content" itemprop="reviewBody">
      <?php the_content(); ?>
    </div><!-- .entry-content -->
    <div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="true" data-layout="button_count" data-width="300" data-show-faces="false"></div>
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
