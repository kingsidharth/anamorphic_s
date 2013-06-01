<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package anamorhpic
 */
?>

<div id="footer_area" class="grid">
  <div class="page">
    <footer role="contentinfo">
      <div class="site-info">
        <?php do_action( 'anamorhpic_credits' ); ?>
        <a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'anamorhpic' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s', 'anamorhpic' ), 'WordPress' ); ?></a>
        <span class="sep"> | </span>
        <?php printf( __( 'Theme: %1$s by %2$s.', 'anamorhpic' ), 'anamorhpic', '<a href="http://www.kingsidharth.com" rel="designer">King Sidharth</a>' ); ?>
      </div><!-- .site-info -->
    </footer>
  </div>
</div><!-- #footer_area -->

<?php wp_footer(); ?>

</body>
</html>
