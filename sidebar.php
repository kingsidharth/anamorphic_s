<aside class="photo">
  <img src="<?php echo $main_image ?>" id="main_image_" crossorigin="http://anamorhpic.in" 
    alt="<?php echo $extended_title; ?>" title="<?php echo $extended_title; ?>" itemprop="image">
</aside><!-- .photo -->

<aside class="about entry-meta main-meta">
  <p class="byline-meta">
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
        'before' => '<span class="author strong">',
        'after' => '</span>',
      );
      anamorphic_custom_tax_list($author_arg);
    ?>
  </p>
</aside><!-- .entry-meta.main-meta -->

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
      'before' => '<p class="actors meta">',
      'after'  => '</p>',
    );
    anamorphic_custom_tax_list($actor_args);

    # Release Year
    if($release_year){
      echo '<p class="release_year"><span class="meta__title">Released in </span>';
      echo '<span class="strong" itemprop=datePublished>';
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
      echo '<p class="entry-isbn"><span class="meta__title">ISBN: </span> ';
      echo "<span itemprop='isbn' class='strong'>$bookisbn</span></p>";
    }
    if($publisher) {
      echo '<p class="entry-publisher"><span class="meta__title">Published by </strong> ';
      echo "<span itemprop=publisher class='strong'>$publisher</span></p>";
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
