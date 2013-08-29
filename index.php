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
        
        <div class="grid__item one-half post_list  palm-one-whole">
          <h2 class="group-title grid__item one-whole">Latest Book Reviews</h2>
          <ul class="nav"><!--
          <?php 
            global $post;
            $args = array( 'numberposts' => 10, 'category' => 4 );

            $myposts = get_posts( $args );

            foreach( $myposts as $post ) : setup_postdata($post); 
              $meta  = get_post_meta($post->ID);
              anamorphic_post_data($meta);
              $book_title = get_the_title() . ' by ' . get_array_list($authors);
            ?>

              --><li class="post_item_wrap grid__item one-half">
                <a class="post_item" href="<?php the_permalink(); ?>" title="Review of <?php the_title(); ?>">
                   <img src="<?php echo anamorphic_resize($main_image, 200); ?>" 
                     alt="<?php the_title(); ?> by <?php the_array_list($authors); ?>"/>
                   <h2 class="entry-title"><?php the_title(); ?></h2>
                   <div class="entry-meta">
                     <?php 
                      if($authors) {
                        echo "<span class=author><em>by</em> <strong>";
                        the_array_list($authors);
                        echo "</strong></span>";
                      }
                      if($rating){ 
                        echo '<span class="rating">';
                        anamorhpic_rating_to_star($rating);
                        echo '</span>';
                      } ?>
                     <span class="entry-date"><?php echo get_the_date(); ?></span>              
                   </div><!--.entry-meta-->
                 </a>
               </li><!--
               <?php endforeach; ?>
               --><li class="grid__item gamma one-whole">
                 <a href="/category/book/">See all book reviews <i class="icon icon-chevron-right"></i></a>
               </li>
            </ul>
          </div><!-- #latest_films.post_list

        --><div class="grid__item one-half post_list palm-one-whole">
          <h2 class="group-title grid__item one-whole">Latest Film Reviews</h2>
          <ul class="nav"><!--
          <?php 
            global $post;
            $args = array( 'numberposts' => 10, 'category' => 3 );

            $myposts = get_posts( $args );

            foreach( $myposts as $post ) : setup_postdata($post); 
              $meta  = get_post_meta($post->ID);
              anamorphic_post_data($meta); ?>
              --><li class="post_item_wrap grid__item one-half"><a class="post_item" href="<?php the_permalink(); ?>">
                <img src="<?php echo anamorphic_resize($main_image, 200); ?>" title="<?php echo $extended_title;?>" alt="<?php echo $extended_title;?>"/>
                <h2 class="entry-title"><?php the_title(); ?></h2>
                <div class="entry-meta">
                  <?php if($rating){ 
                    echo '<span class="rating">';
                    anamorhpic_rating_to_star($rating);
                    echo '</span>';
                  } ?>
                  <span class="entry-date"><?php echo get_the_date(); ?></span>              
                </div><!--.entry-meta-->
              </a></li><!--
            <?php endforeach; ?>
              --><li class="grid__item gamma one-whole">
                 <a href="/category/film/">See all film reviews <i class="icon icon-chevron-right"></i></a>
               </li>
          </ul>
        </div> 

      </div><!-- #latest -->
		</div>
	</div><!-- #latest_area -->

<?php get_footer(); ?>
