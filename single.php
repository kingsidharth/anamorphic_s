<?php
/**
 * The Template for displaying all single posts.
 *
 * @package anamorhpic
 */

get_header(); ?>

  <div id="content_area" class="grid">
    <div class="page">
      <div id="content" role="main">
        <?php
          while ( have_posts() ) : the_post();
            get_template_part( 'content', 'single' );
          endwhile; 
        ?>
		  </div><!-- #content -->
    </div>
  </div><!-- #content_area -->

<?php get_footer(); ?>
