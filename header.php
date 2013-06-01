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
        <h1 id="logo" class="">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" 
             title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" 
             rel="home"><?php bloginfo( 'name' ); ?>
          </a>
        </h1>
        <p class="tagline"><?php bloginfo( 'description' ); ?></p>
      </header><!-- #header -->
    </div>
  </div><!-- #header_area -->
  <div id="navigation_area" class="grid">
    <div class="page">
       <nav role="navigation">
         <?php /* 
           $primary_menu_default = array(
              'theme_location'  => 'primary',
              'container'       => 'nav',
              'container_class' => '',
              'container_id'    => '',
              'menu_class'      => 'menu',
              'fallback_cb'     => 'wp_page_menu',
              'items_wrap'      => '<ul id="%1$s" class="%2$s nav nav--blocked">%3$s</ul>',
            );
            wp_nav_menu( $primary_menu_default ); */ 
          ?>
       </nav><!-- #site-navigation -->
    </div>
  </div><!-- #navigation_area -->
