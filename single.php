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

  <div id="subscribe_area" class="grid">
    <div class="page">
      <div id="subscribe">
        <h4 class="grid__item one-whole">Liked what you read? Keep up with the new stuff:</h4>
        <div class="grid__item two-fifths palm-one-whole rss">
          <ul class="nav nav--stacked">
            <li class="gamma"><a href=""><i class="icon icon-rss"> </i> RSS Feed</a></li>
            <li><a href="https://twitter.com/kingsidharth"><i class="icon icon-twitter"> </i>Twitter</a></li>
            <li><a href="http://"><i class="icon icon-book"></i> Goodreads</a></li>
          </ul>
          <div class="fb-follow" data-href="https://www.facebook.com/KingSidharth" data-width="300" data-layout="button_count" data-show-faces="false"></div>
        </div><!--
        --><div class="grid__item three-fifths right palm-hideen fb">
          <div class="fb-like-box" data-href="https://www.facebook.com/anamorphic.in" data-width="300" data-show-faces="false" data-header="false" data-stream="false" data-show-border="false"></div>
        </div>
      </div><!-- #subscribe -->
    </div>
  </div><!-- #subscribe_area -->

<?php get_footer(); ?>
