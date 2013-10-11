<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package anamorhpic
 */
?><!DOCTYPE html>
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
      the_title();
      echo ': Review';
    }
  ?>
  </title>

  <?php wp_head(); ?>
  
  <meta name="viewport" content="width=device-width" />
  <meta charset="<?php bloginfo( 'charset' ); ?>" />

  <!-- Open Graph Data -->
  <meta property="fb:app_id" content="502579883131350" /> 
  <?php global $post;
    if(is_single()) {
    $meta_head = get_post_meta( $post->ID ); ?>
  <meta property="og:type"                content="article" /> 
  <meta property="og:url"                 content="<?php the_permalink(); ?>" /> 
  <meta property="og:title"               content="<?php the_title(); ?>" /> 
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
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" ></script>

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
        <ul class="nav nav--block">
          <li><a <?php if(is_page('about')) {?> class="active" <?php }?>href="/about">About + Why</a></li>
          <li><a <?php if(is_category(3)){?> class="active"<?php }?> href="/category/film">Films</a></li>
          <li><a <?php if(is_category(4)){?> class="active"<?php }?>href="/category/book">Books</a></li>
        </ul>            
       </nav><!-- #main-navigation -->
       </header><!-- #header -->
    </div>
  </div><!-- #header_area -->
