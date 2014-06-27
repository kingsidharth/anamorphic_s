<?php
/**
 * @package anamorhpic
 */
?>
<?php
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

    $affiliate, $flipkart_link, $amazon_link, $amazon_us_link, $infibeam_link, $other_link,
    $extended_title;  

  $meta = get_post_meta( $post->ID );
  anamorphic_post_data($meta);

?>
<script>
  // Get the rating number
  var rating, rating_float, noStar;
  var rating = <?php echo $rating; ?>;
  var rating_float = Math.round(rating*10)/10;
  var noStar = 5 - rating;
  var is_single = true;
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

    <aside class="about entry-meta main-meta">
      <p class="byline-meta" >
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
          # The Authors
          $author_arg = array(
            'post_id' => $post->ID,
            'tax_slug' => 'authors',
            #'tax_title' => 'Authors',
            'tax_item_prop' => 'author',
            'tax_item_scope' => 'Person',
            'tax_item_child_prop' => 'name',
            'before' => '<span class="author">',
            'after' => '</span>',
          );
          anamorphic_custom_tax_list($author_arg);
        ?>
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

      # The Series
      $series_args = array(
        'post_id' => $post->ID,
        'tax_slug' => 'series',
        'tax_title' => 'Part of',
        'before' => '<p class="series">',
        'after'  => '</p>',
      );
      anamorphic_custom_tax_list($series_args);
      echo '</aside>';

      # BEGIN AFFILATE SHIT
      if($affiliate) {
        echo "<aside class='affiliate-promo left'>";
        
        # IF Rating is higher than 1.5
        echo "<h4>";
        echo "<i class='icon green icon-shopping-cart'></i>";
        echo "</span> Buy it here!</h4>";
        if($rating < 1.5) {
          echo "<p>I really don't think you should buy it, but if you must:</p>";
        } else {
          echo "<p>Use these links to make a pruchase, I will get some money for coffee:";
        }         

        echo "<ul class='nav nav--stacked'>";
        # TODO: Turn this into a for loop:
        check_print_affiliate_link($amazon_us_link, 'Amazon US');
        check_print_affiliate_link($amazon_link, 'Amazon India');
        check_print_affiliate_link($flipkart_link, 'Filpkart');
        check_print_affiliate_link($infibeam_link, 'Infibeam');
        check_print_affiliate_link($other_link, 'Other');
        echo '</ul>';

        echo '</aside>';
      }
      if ( is_user_logged_in() ) {
        echo '<aside class="admin-ui">';
        edit_post_link( __( '<i class="icon icon-edit"> </i>Edit', 'anamorhpic' ), '<span class="admin edit-link">', '</span>' );
        echo '</aside>';
      }?>
  </div><!-- .sidebar

  --><div class="format_text grid__item five-eighths palm-one-whole">
    <header class="entry-header">
      <ul class="nav breadcrumbs">
        <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
          <a itemprop="url" href="/"><span itemprop="title">Anamorphic</span></a>
        </li>
        <li class="separator"><a><i class="icon icon-chevron-right"></i></a></li>
        <?php if($itemtype =='film') { ?>
        <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
          <a itemprop="url" href="/film/"><span itemprop="title">Films</span></a>
        </li>
        <?php } elseif($itemtype =='book') { ?> 
        <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
          <a itemprop="url" href="/book/"><span itemprop="title">Books</span></a>
        </li> 
        <?php } ?>
        <li class="separator"><a><i class="icon icon-chevron-right"></i></a></li>
      </ul>
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

    <aside> 
    <p class="entry-date entry-meta">
      <span class="published">
        <meta itemprop="datePublished" content="<?php the_date('c'); ?>"/>
        Published on <?php echo get_the_date('F j, Y'); ?>.&nbsp;
      </span>
      <span class="updated">
        <meta itemprop="dateModified" content="<?php the_modified_date('c'); ?>">
        Updated on <?php the_modified_date(); ?>.
      </span>
    </p> 

    <ul class="nav nav--block social-share">
      <li><a href="//twitter.com/share?url=<?php the_permalink(); ?>&text=<?php echo $extended_title; ?>&via=kingsidharth" target="_blank"><i class="icon icon-twitter"></i> Tweet this</a></li>
      <li style="position: relative; top: 5px;"><a class="fb-like" 
            data-href="<?php the_permalink(); ?>" 
            data-layout="button_count" 
            data-width="300" 
            data-show-faces="false"> 
      </a></li>
      <li style="position: relative; top: 5px;">
<a target="_blank" 
         href="//pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo $main_image ?>&description=<?php echo $extended_title; ?>: <?php if($subheading) { echo $subheading; } ?>" 
         data-pin-do="buttonPin" 
         data-pin-config="none"><img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" alt="Pin it on Pinterest" title="Pin it on Pinterest"/></a>
      </li>
    </ul>
    </aside> 

    <?php 
     if(function_exists('related_posts')) {
       echo "<aside class='related_posts'>";
       related_posts();
       echo "</aside>";
     }
     ?>
  </div><!-- .format_text-->
</article><!-- #post-## -->
