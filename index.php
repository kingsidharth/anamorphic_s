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

  <div id="content_area" class="grid">
    <div class="page">
      <div id="content">
        <ul class="grid__item one-whole nav nav--block nav--button nav--button-green" id="category_select">
          <li><a class="active" rel="post_item_wrap" href="/">Show All</a></li>
          <li><a rel="book" href="/category/book">Only Book Reviews</a></li>
          <li><a rel="film" href="/category/film">Only Film Reviews</a></li>
        </ul>
        <ul class="nav post_list"><!--
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
            $meta  = get_post_meta($post->ID);
            anamorphic_post_data($meta);
          ?>

            --><li class="post_item_wrap grid__item one-fifth palm-one-half <?php echo $itemtype; ?>">
              <a class="post_item" href="<?php the_permalink(); ?>" title="Review of <?php the_title(); ?>">
                 <img src="<?php echo $main_image; ?>" 
                   alt="<?php echo $extended_title; ?>" width="100%" class="image"/>
                 <h3 class="entry-title">
                   <?php if($itemtype=="film") { echo $extended_title; } else { the_title(); } ?>
                 </h3>
                 <div class="entry-meta">
                   <?php if($rating){ 
                    echo '<span class="rating">';
                    anamorhpic_rating_to_star($rating);
                    echo '</span>';
                   }
                   
                   # if FILM 
                   if($itemtype=='book') {
                     if($authors) {
                       echo "<span class=author><em>by</em> <strong>";
                       the_array_list($authors);
                       echo "</strong></span>";
                     }
                   }?>  
                    
                   <span class="entry-date"><?php echo get_the_date(); ?></span>              
                 </div><!--.entry-meta-->
               </a>
             </li><!--
             <?php endwhile; else: ?>
               --><li><?php _e('<icon class="icon icon-frown> </i>Sorry, no posts matched your criteria.'); ?></li><!--
            <?php endif; ?>
             -->
          </ul>
          <div class="grid__item one-whole pagination-nav">
            <?php posts_nav_link(' | ', '<i class="icon icon-chevron-sign-left"> </i>Previous', 'Next <i class="icon icon-chevron-sign-right"></i>'); ?> 
          </div>
        </div><!-- #content -->
		</div>
	</div><!-- #content_area -->
  
<?php get_footer(); ?>
