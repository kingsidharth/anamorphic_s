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
      </div><!-- .site-info -->
      <p class="grid__item one-whole center">
        &copy; <?php echo date("Y"); ?> 
        <br/>
          <a href="https://plus.google.com/100630005600562803456?rel=author"><i class="icon icon-google-plus"></i></a> 
          <a href="http://bit.ly/anatwitks"><i class="icon icon-twitter"></i></a> 
          <a href="http://bit.ly/anamorfbks"><i class="icon icon-facebook"></i></a>
          <a href="http://feeds.feedburner.com/anamorphic"><i class="icon icon-rss"></i></a>
      </p>
    </footer>
  </div>
</div><!-- #footer_area -->

<?php wp_footer(); ?>
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
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
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-4910697-22', 'anamorphic.in');
    ga('send', 'pageview');

  </script>
</body>
</html>
