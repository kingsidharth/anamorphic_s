<?php
/**
 * @package anamorhpic
 */
?>

  <div id="footer_area" class="grid">
    <div class="page">
      <footer role="contentinfo">
        <p class="grid__item one-whole right">
          &copy; <?php echo date("Y"); ?> 
        </p>
      </footer>
    </div>
  </div><!-- #footer_area -->

  <?php wp_footer(); ?>

  </body>

  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
  <script src="<?php echo bloginfo('stylesheet_directory'); ?>/assets/js/masonry.min.js"></script>
  <script src="<?php echo bloginfo('stylesheet_directory'); ?>/assets/js/app.js"></script>

  <div id="fb-root"></div>
  <script>
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=502579883131350";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  </script>
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
