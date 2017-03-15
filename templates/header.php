<?php if ( ! is_page_template( 'template-campaign.php' ) ) { ?>
<header class="banner navbar navbar-default navbar-static-top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only"><?= __('Toggle navigation', 'sage'); ?></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand navbar-brand__logo logo" href="<?= esc_url(home_url('/')); ?>"> <span itemprop="publisher" itemscope itemtype="http://schema.org/Organization"><img itemprop="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/Climate_Feedback_logo_s.png"> <span itemprop="name">Climate Feedback</span></span></a>
    </div>
    <nav class="collapse navbar-collapse" role="navigation">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav']);
      endif;
      ?>

      <!-- Social Media -->
      <div class="social-media pull-right">
          <a data-tooltip="Subscribe to our email news feed" class="tooltip-bottom" href="http://eepurl.com/bwqJtz"><i class="fa fa-envelope"></i></a>
          <a href="http://facebook.com/ClimateFeedback/" target="_blank"><i class="fa fa-facebook"></i></a>
          <a href="https://twitter.com/ClimateFdbk" target="_blank"><i class="fa fa-twitter"></i></a>
<!--          <a href="https://github.com/climatefeedback" target="_blank"><i class="fa fa-github"></i></a>-->
          <!-- Include hypothes.is stream link -->
           <a href="<?php bloginfo('rss2_url'); ?>" title="RSS Feed"><i class="fa fa-rss"></i></a>
      </div>
      <!-- / Social media -->
    </nav>
  </div>
</header>
<?php } ?>
