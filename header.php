<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package anamorhpic
 */
?><!DOCTYPE html>
<?php if(is_single()) {
  $meta_head = get_post_meta( $post->ID );
  if ( in_category( 'book', $post->ID )) { 
    $meta_title = 'Review of Book ' . get_the_title() . ' by ' . $meta_head[anamorphic_authors][0]; 
    $seo_title  = get_the_title() . ' by ' . $meta_head[anamorphic_authors][0] . ' — Book Review'; 
  } elseif ( in_category('film', $post->ID)) {
    $meta_title = 'Review of Film ' . get_the_title() . ' (' . $meta_head[anamorphic_release_year][0] . ')'; 
    $seo_title  = get_the_title() . ' (' . $meta_head[anamorphic_release_year][0] . ') ' . ' — Film Review'; 
  } else { 
    $meta_title = the_title();
    $seo_title  = the_title();
  }
}
?>
<html <?php language_attributes(); ?>>
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
  <title>
  <?php if(is_home()) { 
      echo bloginfo('name');
    } elseif (is_category()) {
      echo  single_cat_title( '', false );
      echo ' Reviews';
    } elseif (is_page()) {
      the_title();
    } elseif (is_single()) {
      echo $seo_title;
    }
  ?>
  </title>

  <?php wp_head(); ?>
  
  <meta name="viewport" content="width=device-width" />
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <?php if(is_tax()) { ?>
    <meta name="robots" content="noindex, follow">
  <?php } ?>

  <!-- Open Graph Data -->
  <meta property="fb:app_id" content="502579883131350" /> 
  <?php global $post;
    if(is_single()) {
    ?>
  <!-- TWITTER CARDS -->
  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="@kingsidhart">
  <meta name="twitter:title" content="<?php echo $meta_title; ?>">
  <meta name="twitter:description" content="<?php echo $meta_head[anamorphic_subheading][0]; ?>">
  <meta name="twitter:creator" content="@kingsidharth">
  <meta name="twitter:image:src" content="<?php echo $meta_head[anamorphic_imageurl][0]; ?>">
  <meta name="twitter:domain" content="anamorphic.in">
  <!-- Open Graph -->
  <meta property="og:type"                content="article" /> 
  <meta property="og:url"                 content="<?php the_permalink(); ?>" /> 
  <meta property="og:title"               content="<?php echo $meta_title; ?>" /> 
  <meta property="og:image"               content="<?php echo $meta_head[anamorphic_imageurl][0]; ?>" /> 
  <meta property="article:author"         content="http://www.kingsidharth.com"/>
  <meta property="article:published_time" content="<?php echo get_the_date('c'); ?>"/>
  <meta property="article:modified_time"  content="<?php echo the_modified_date('c'); ?>"/>
  <meta property="og:description"         content="<?php echo $meta_head[anamorphic_subheading][0]; ?>"/>
  <meta property="description"            content="<?php echo $meta_head[anamorphic_subheading][0]; ?>"/>
  <?php #end_is_single() 
    } elseif(is_front_page()) { ?>
  <meta property="og:type"                content="website" /> 
  <meta property="og:url"                 content="<?php bloginfo('url'); ?>" /> 
  <meta property="og:title"               content="<?php bloginfo('name'); ?>" /> 
  <meta property="og:description"         content="A collection of film & book reviews & other writings by King Sidharth"/>  
  <meta property="description"            content="A collection of film & book reviews & other writings by King Sidharth"/>  
  <?php } ?>
  <meta property="og:image"               content="http://anamorphic.in/wp-content/uploads/2013/06/anamorphic-color-300-sq.png" />
  <meta property="og:image"               content="http://anamorphic.in/wp-content/uploads/2013/06/anamorphic-white-300-sq.jpg"/>

  <!-- Header Scripts -->
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <link rel="icon" type="image/x-icon" href="/favicon.ico" /> 
  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?>" href="http://feeds.feedburner.com/anamorphic" />
</head>
<body <?php body_class(); ?>>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

  <div id="header_area" class="grid">
    <div class="page">
      <?php do_action( 'before' ); ?>
      
      <header id="header" role="banner">
      <div class="grid__item one-third portable-one-whole">
        <h1 id="main-logo" class="">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" 
             title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" 
             rel="home" class="brand"><?php bloginfo( 'name' ); ?>
          </a>
        </h1>
      </div><!--
      --><nav id="main-navigation" role="navigation" class="grid__item two-thirds portable-one-whole">
        <ul id="main_navigation" class="nav nav--block nav--button nav--button-red">
          <li><a <?php if(is_page('about')) {?> class="active" <?php }?>href="/about">About</a></li>
          <li><a <?php if(is_category(3) | (is_single() && has_category(3))){?> 
                 class="active"<?php }?> href="/category/film/">Film Reviews</a></li>
          <li><a <?php if(is_category(4) | (is_single() && has_category(4))){?> 
                 class="active"<?php }?>href="category/book/">Book Reviews</a></li>
        </ul>            
       </nav><!-- #main-navigation -->
       </header><!-- #header -->
    </div>
  </div><!-- #header_area -->
