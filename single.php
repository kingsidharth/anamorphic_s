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

  <div id="promo_area" class="grid">
    <div class="page">
      <div id="promo">
        <div class="grid__item one-whole"><hr/></div>
      
        <div id="subscribe" class="grid__item one-third">
          <h4><i class="icon icon-check"> </i>Subscribe</h4>
          <p>Liked what you read? You might want to subscribe to the updates:</p>
          <ul class="nav nav--stacked">
            <li><a class="fb-like" data-href="https://www.facebook.com/anamorphic.in" data-width="300" data-layout="button_count" data-show-faces="true"> Like on Facebook</a></li>
            <li><a href="http://feeds.feedburner.com/anamorphic"><i class="icon icon-rss"> </i> RSS Feed</a></li>
            <li><a href="https://www.goodreads.com/kingsidharth"><i class="icon icon-book"></i> Follow on Goodreads</a></li>
          </ul>
        </div><!-- #subscribe
        --><div id="get_reviewed" class="grid__item one-third">
          <h4>Get Reviewed</h4>
          <p>Want me to review your book/film or some specific book/film? Email me: king(a)kingsidharth.com</p>
        </div><!-- #get_reviewed

        --><div id="elsewhere" class="grid__item one-third">
          <h4>Elsewhere</h4>
          <ul class="nav nav--stacked">
            <li><a href="http://bit.ly/anatwitks"><i class="icon icon-twitter"> </i>@kingsidharth</a></li>
            <li><a href="https://plus.google.com/100630005600562803456?rel=author" rel="author"><i class="icon icon-google-plus"> </i>Add on Google+</a></li>
            <li><a href="http://bit.ly/anamorfbks"><i class="icon icon-facebook"> </i> Follow on Facebook</a></li>
            <li><a href="http://www.kingsidharth.com"><i class="icon icon-globe"> </i> Personal Website</a></li>
            <!--<li><a href=""><i class="icon icon-"> </i></a></li>-->
          </ul>
        </div><!-- #elsewhere -->
        
      </div><!-- #promo -->
    </div>
  </div><!-- #promo_area -->

<?php get_footer(); ?>
