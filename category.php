<?php
/**
 *
 * for CATEGORY
 *
 * @package anamorhpic
 */

get_header(); ?>

	<section id="content_area" class="grid">
    <div  class="full-width">
      <div id="content" role="main">

      <?php if ( have_posts() ) : ?>

        <header class="page-header grid__item one-whole">
          <h1 class="page-title entry-title">
            <?php
              printf( __( 'All %s Reviews', 'anamorhpic' ), '<span>' . single_cat_title( '', false ) . '</span>' );
            ?>
          </h1>
          <?php
            if ( is_category() ) :
              $category_description = category_description();
              if ( ! empty( $category_description ) ) :
                echo '<p>';
                echo apply_filters( 'category_archive_meta', '<div class="category-description">' . $category_description . '</div>' );
                echo '</p>';
              endif;
            endif;
          ?>
        </header><!-- .page-header -->

        <div class="post_list"><!--
        <?php /* Start the Loop */ ?>
        <?php while ( have_posts() ) : the_post(); 
          
          $meta = get_post_meta( $post->ID );
          anamorphic_post_data($meta);
          
        ?>
          --><div class="post_item_wrap grid__item desk-one-sixth lap-one-third palm-one-half">
            <a href="<?php the_permalink(); ?>">
              <img src="<?php echo anamorphic_resize($main_image, 200); ?>" 
              alt="<?php echo $extended_title; ?>" title="<?php echo $extended_title; ?>" />
              <h2 class="entry-title"><?php echo $extended_title; ?></h2>
              <div class="entry-meta">
                <?php if($rating){ 
                  echo '<span class="rating">';
                  anamorhpic_rating_to_star($rating);
                  echo '</span>';
                }?>
                 <span class="entry-date"><?php echo get_the_date(); ?></span>             
              </div><!--.entry-meta-->

              <?php if($subheading) { echo "<p class=subheading>$subheading</p>"; } ?>
            </a>
          </div><!--
        <?php endwhile; ?>

      <?php else : ?>

        <?php get_template_part( 'no-results', 'archive' ); ?>

     <?php endif; ?>
     --><div class="grid__item one-whole pagination-nav center">
        <?php posts_nav_link(' | ', '<i class="icon icon-chevron-sign-left"> </i>Previous', 'Next <i class="icon icon-chevron-sign-right"></i>'); ?> 
     </div>
       
   </div><!-- #content -->
 </section><!-- #primary -->

 <script>var is_category = "true";</script>

<?php get_footer(); ?>
