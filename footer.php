<?php
/**
 * @package anamorhpic
 */
?>

<?php if(!is_front_page()) { ?>
 <div id="promo_area" class="grid">
    <div class="page">
      <div id="promo">
        <div class="grid__item one-whole"><hr/></div>
      
        <div id="subscribe" class="grid__item one-third palm-one-whole">
          <h4><i class="icon icon-check"> </i>Subscribe</h4>
          <p>Liked what you read? You might want to subscribe to the updates:</p>
          <ul class="nav nav--stacked nav--button nav--button-green">
            <li><a class="fb-like" data-href="https://www.facebook.com/anamorphic.in" data-width="300" data-layout="button_count" data-show-faces="true"> Like on Facebook</a></li>
            <li><a href="http://feeds.feedburner.com/anamorphic"><i class="icon icon-rss"> </i> RSS Feed</a></li>
            <li><a href="https://www.goodreads.com/kingsidharth"><i class="icon icon-book"></i> Follow on Goodreads</a></li>
          </ul>
        </div><!-- #subscribe
        --><div id="get_reviewed" class="grid__item one-third palm-one-whole">
          <h4>Get Reviewed</h4>
          <p>Want me to review your book/film? Email me: king(a)kingsidharth.com</p>
        </div><!-- #get_reviewed

        --><div id="elsewhere" class="grid__item one-third palm-one-whole">
          <ul class="nav nav--stacked nav--button nav--button-red">
            <li><a href="http://bit.ly/anatwitks"><i class="icon icon-twitter"> </i>@kingsidharth</a></li>
            <li><a href="https://plus.google.com/100630005600562803456?rel=author" rel="author"><i class="icon icon-google-plus"> </i>Add on Google+</a></li>
            <li><a href="http://bit.ly/anamorfbks"><i class="icon icon-facebook"> </i> Follow on Facebook</a></li>
            <!--<li><a href=""><i class="icon icon-"> </i></a></li>-->
          </ul>
        </div><!-- #elsewhere -->
        
      </div><!-- #promo -->
    </div>
  </div><!-- #promo_area -->
<?php } ?>

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
      ga('require', 'displayfeatures');
      ga('send', 'pageview');

    </script>
  <?php } ?>
</html>
