<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package anamorhpic
 */

get_header(); ?>

	<div id="content_area" class="grid">
		<div class="page">
      <div id="content" role="main">

        <article id="post-0" class="post not-found">
          <header class="entry-header">
            <h1 class="entry-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'anamorhpic' ); ?></h1>
          </header><!-- .entry-header -->

          <div class="entry-content">
            <p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'anamorhpic' ); ?></p>

            <?php get_search_form(); ?>

            <?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

          </div><!-- .entry-content -->
        </article><!-- #post-0 .post .not-found -->
      </div><!-- #content -->
		</div><!-- .page -->
	</div><!-- #content_area -->

<?php get_footer(); ?>
