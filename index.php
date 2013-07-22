<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package anamorhpic
 */

get_header(); ?>

  <div id="latest_area" class="grid">
    <div class="page">
      <div id="latest" class"" role="main">
        <div class="grid__item one-half post_list palm-one-whole">
          <h2 class="group-title">Latest Film Reviews</h2>
          <ul class="nav nav--stacked">
          <?php 
            global $post;
            $args = array( 'numberposts' => 5, 'category' => 3 );

            $myposts = get_posts( $args );

            foreach( $myposts as $post ) : setup_postdata($post); 
              $meta  = get_post_meta($post->ID);
              $rating = $meta['anamorphic_rating'][0]; ?>
              <li class="post_item_wrap"><a class="post_item" href="<?php the_permalink(); ?>">
                <span class="entry-title"><?php the_title(); ?></span>
                <div class="entry-meta">
                  <?php if($rating){ 
                    echo '<span class="rating">';
                    anamorhpic_rating_to_star($rating);
                    echo '</span>';
                  } ?>
                  <span class="entry-date"><?php echo get_the_date(); ?></span>              
                </div><!--.entry-meta-->
              </a></li>
            <?php endforeach; ?>
          </ul>
        </div><!-- #latest_films.post_list 

        --><div class="grid__item one-half post_list palm-one-whole">
          <h2 class="group-title">Latest Book Reviews</h2>
          <ul class="nav nav--stacked">
          <?php 
            global $post;
            $args = array( 'numberposts' => 5, 'category' => 4 );

            $myposts = get_posts( $args );

            foreach( $myposts as $post ) : setup_postdata($post); 
              $meta  = get_post_meta($post->ID);
              $rating = $meta['anamorphic_rating'][0]; ?>
              <li class="post_item_wrap"><a class="post_item" href="<?php the_permalink(); ?>">
                <span class="entry-title"><?php the_title(); ?></span>
                <div class="entry-meta">
                  <?php if($rating){ 
                    echo '<span class="rating">';
                    anamorhpic_rating_to_star($rating);
                    echo '</span>';
                  } ?>
                  <span class="entry-date"><?php echo get_the_date(); ?></span>              
                </div><!--.entry-meta-->
              </a></li>
            <?php endforeach; ?>
          </ul>
        </div><!-- #latest_films.post_list -->
      </div><!-- #latest -->
		</div>
	</div><!-- #latest_area -->

<?php get_footer(); ?>
