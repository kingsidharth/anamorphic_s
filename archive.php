<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package anamorhpic
 */

get_header(); ?>

	<section id="content_area" class="grid">
    <div  class="page">
      <div id="content" role="main">

      <?php if ( have_posts() ) : ?>

        <header class="page-header grid__item one-whole">
          <h1 class="page-title">
            <?php
              if ( is_category() ) :
                printf( __( 'Category Archives: %s', 'anamorhpic' ), '<span>' . single_cat_title( '', false ) . '</span>' );

              elseif ( is_tag() ) :
                printf( __( 'Tag Archives: %s', 'anamorhpic' ), '<span>' . single_tag_title( '', false ) . '</span>' );

              elseif ( is_author() ) :
                /* Queue the first post, that way we know
                 * what author we're dealing with (if that is the case).
                */
                the_post();
                printf( __( 'Author Archives: %s', 'anamorhpic' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
                /* Since we called the_post() above, we need to
                 * rewind the loop back to the beginning that way
                 * we can run the loop properly, in full.
                 */
                rewind_posts();

              elseif ( is_day() ) :
                printf( __( 'Daily Archives: %s', 'anamorhpic' ), '<span>' . get_the_date() . '</span>' );

              elseif ( is_month() ) :
                printf( __( 'Monthly Archives: %s', 'anamorhpic' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

              elseif ( is_year() ) :
                printf( __( 'Yearly Archives: %s', 'anamorhpic' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

              elseif ( is_tax('post', 'genre') ) :
                _e( 'Asides', 'anamorhpic' );

              else :
                _e( 'Archives', 'anamorhpic' );

              endif;
            ?>
          </h1>
          <?php
            if ( is_category() ) :
              // show an optional category description
              $category_description = category_description();
              if ( ! empty( $category_description ) ) :
                echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );
              endif;

            elseif ( is_tag() ) :
              // show an optional tag description
              $tag_description = tag_description();
              if ( ! empty( $tag_description ) ) :
                echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' );
              endif;

            endif;
          ?>
        </header><!-- .page-header -->

        <?php /* Start the Loop */ ?>
        <?php while ( have_posts() ) : the_post(); 
          
          $meta = get_post_meta( $post->ID );
          anamorphic_post_data($meta);
          
        ?>
          <div class="post">
            <div class="media grid__item one-quarter">
              <a href="<?php the_permalink(); ?>">
                <img src="<?php echo anamorphic_resize($main_image, 200); ?>" alt="" title="" />
              </a>
            </div><!--
            --><div class="grid__item three-quarters">
              <h2 class="entry-title gamma"><a href="<?php the_permalink(); ?>"><?php echo $extended_title; ?></a></h2>
              <div class="entry-meta">
                <?php 
                  if($rating){ 
                    echo '<span class="rating">';
                    anamorhpic_rating_to_star($rating);
                    echo '</span><br/>';
                  }?>
                <span class="entry-date"><?php echo get_the_date(); ?></span>              
              </div><!--.entry-meta-->

              <?php if($subheading) { echo "<p class=subheading>$subheading</p>"; } ?>
            </div>
          </div>

        <?php endwhile; ?>

      <?php else : ?>

        <?php get_template_part( 'no-results', 'archive' ); ?>

     <?php endif; ?>
     <div class="grid__item one-whole pagination-nav">
       <?php posts_nav_link(' | ', '<i class="icon icon-chevron-sign-left"> </i>Previous', 'Next <i class="icon icon-chevron-sign-right"></i>'); ?> 
     </div>
   </div><!-- #content -->
 </section><!-- #primary -->

<?php get_footer(); ?>
