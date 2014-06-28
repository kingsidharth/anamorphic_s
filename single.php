<?php
/**
 * The Template for displaying all single posts.
 *
 * @package anamorhpic
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<?php
global 
    $subheading,
    $rating, 
    $main_image, 
    $extended_title,  
    $html_title,
    $other_name,

    $itemtype, 
      $directors, $release_year,     
      $authors, $bookisbn, $publisher, 

    $affiliate, $flipkart_link, $amazon_link, $amazon_us_link, $infibeam_link, $other_link;

    $meta = get_post_meta( $post->ID );
    anamorphic_post_data($meta);

?>
<script>
  // Get the rating number
  var rating = <?php echo $rating; ?>;
  var is_single = true;
</script>

<article itemprop="review" itemscope itemtype="http://schema.org/Review" 
id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

  <div id="content_area" class="grid">
    <div class="page">
      <div id="content" role="main">

        <div id="sidebar" <?php data_schema_itemtype($itemtype); ?> 
          class="sidebar single_sidebar grid__item three-eighths palm-one-whole right">
          <?php include 'sidebar.php'; ?>
        </div><!-- .sidebar

      --><div class="format_text grid__item five-eighths palm-one-whole review--<?php echo $itemtype; ?>">
      <header class="entry-header entry__header">
        <ul class="nav breadcrumbs zeta no-bottom-margin">
          <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
            <a itemprop="url" href="/"><span itemprop="title">Anamorphic</span></a>
          </li>
          <li class="separator"><i class="icon icon-chevron-right"></i></li>
          <?php if($itemtype =='film') { ?>
          <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
            <a itemprop="url" href="/film/"><span itemprop="title">Films</span></a>
          </li>
          <?php } elseif($itemtype =='book') { ?> 
          <li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
            <a itemprop="url" href="/book/"><span itemprop="title">Books</span></a>
          </li> 
          <?php } ?>
          <li class="separator"><i class="icon icon-chevron-right"></i></li>
        </ul><!-- breadcrumbs -->

        <h1 itemprop="name" class="entry-title half-bottom-margin"><?php echo $html_title; ?></h1>

        <?php
          echo '<p class="rating half-bottom-margin" itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">';
          echo '<meta itemprop="worstRating" content="1"/>';
          echo "Rating <span itemprop='ratingValue'>$rating</span> out of <span itemprop='bestRating'>5</span>";
          echo '</p>';
          if($subheading) {
            echo '<p class="subheading no-bottom-margin" itemprop="alternativeHeadline">';
            echo $subheading;
            echo '</p>';
          }
        ?> 
        <div class="hidden review-author-meta" itemprop="author" itemscope itemtype="http://schema.org/Person">
          <meta itemprop="name" content="King Sidharth"/>
          <meta itemprop="url"  content="http://www.KingSidharth.com"/>
          <meta itemprop="url"  content="https://plus.google.com/100630005600562803456?rel=author"/>
        </div><!-- .review-author-meta -->
      </header>

    <div class="entry-content entry__body" itemprop="reviewBody">
      <?php the_content(); ?>
    </div><!-- .entry-content -->

    <aside> 
    <p class="entry-date entry-meta entry__footer">
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

		  </div><!-- #content -->
    </div>
  </div><!-- #content_area -->
</article>

<script>
  var documentData = {
    'is_single' : true,
    'rating' : '<?php echo $rating; ?>',
    'accentImage' : '<?php echo $main_image; ?>',
    'loggedIn' : <?php echo ''.(is_user_logged_in() ? 'true' : 'false'); ?>,
    'em' : 16,
  }
</script>
<?php endwhile; ?>

<?php get_footer(); ?>
