<?php
/**
 * @package anamorhpic
 */
?>

  <div id="footer_area" class="grid">
    <div class="page">
      <footer role="contentinfo" class="desk-right center">
        <div class="grid__item one-whole"><hr/></div>

        <nav class="grid__item one-whole full-bottom-margin" id="footer_navigation">
        <ul class="nav nav--spaced">
          <li><a href="/about"><i class="icon icon-disc green"></i> About Anamorphic</a></li>
          <li class="separator"> | </li>
          <li><a href="/">Goodreads</a></li>
          <li class="separator"> | </li>
          <li><a href="/"><i class="icon icon-facebook"></i> Facebook</a></li>
          <li><a href="/"><i class="icon icon-rss"></i> Feed</a></li>
        </ul>
        </nav>

        <p class="grid__item one-whole">
        Want me to review a book / film? <a href="">@kingsidharth</a> 
        or king(at)kingsidharth.com.
        </p>

        <p class="grid__item one-whole zeta">
          &copy; <?php echo date("Y"); ?> 
          <!-- TODO: Add Google Plus Authorship -->
        </p>
      </footer>
    </div>
  </div><!-- #footer_area -->


  </body>

  <link rel="stylesheet" href="http://i.icomoon.io/public/temp/fa56f8cbed/Anamorphic/style.css">
  <script src="<?php echo bloginfo('stylesheet_directory'); ?>/assets/js/masonry.min.js"></script>
  <script src="<?php echo bloginfo('stylesheet_directory'); ?>/assets/js/app.js"></script>

  <?php wp_footer(); ?>

  <?php if (!is_user_logged_in()) {
    # Do NOT load Google Analytics Code if user IS logged in
  ?>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-4910697-22', 'anamorphic.in');
      ga('send', 'pageview');
    </script>
  <?php } ?>
</html>
