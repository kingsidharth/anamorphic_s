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
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <div id="header_area" class="grid">
    <div class="page">
      <?php do_action( 'before' ); ?>
      
      <header id="header" role="banner">
      <div class="grid__item one-third">
        <h1 id="main-logo" class="">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" 
             title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" 
             rel="home" class="brand"><?php bloginfo( 'name' ); ?>
          </a>
        </h1>
      </div><?php if(is_home()) { ?><!--
      --><div id="intro_header" class="grid__item two-thirds">
          <p>A collection of film and book reviews and some random writings. <a href="/why">Why?</a></p>
        </div>
      <?php } ?>
      </header><!-- #header -->
    </div>
  </div><!-- #header_area -->
  <div id="navigation_area" class="grid">
    <div class="page">
       <nav role="navigation">
          <ul class="nav nav--block">
            <?php if(!is_home()) {?><li><a href="/">Home</a></li><?php } ?>
            <li><a href="">About + Why?</a></li>
            <li><a href="">Film Reviews</a></li>
            <li><a href="">Book Reviews</a></li>
            <li><a href="">Other Stuff</a></li>
          </ul>            
       </nav><!-- #site-navigation -->
    </div>
  </div><!-- #navigation_area -->
