<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package anamorhpic
 */

get_header(); ?>

  <?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>

	<section id="content_area" class="grid">
    <div  class="page">
      <div id="content" role="main">

      <?php if ( have_posts() ) : ?>

        <header class="page-header grid__item one-whole">
          <h1 class="page-title">
          <?php echo apply_filters( 'the_title', $term->name ); ?>
          </h1>
          <?php if ( !empty( $term->description ) ): ?>
          <div class="taxonomy-description">
            <?php echo esc_html($term->description); ?>
          </div>
          <?php endif; ?>
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
     <p class="grid__item one-whole"><?php posts_nav_link(); ?></p>
       
   </div><!-- #content -->
 </section><!-- #primary -->

<?php get_footer(); ?>
