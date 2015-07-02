<header class="banner navbar navbar-default navbar-static-top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only"><?= __('Toggle navigation', 'sage'); ?></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?= esc_url(home_url('/')); ?>">Climate Feedback</a>
    </div>
    <nav class="collapse navbar-collapse" role="navigation">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav']);
      endif;
      ?>

      <!-- Social Media -->
      <div class="social-media pull-right">
          <a href="https://www.facebook.com/pages/Climate-Feedback/1547593572151463"><i class="fa fa-facebook"></i></a>
          <a href="https://twitter.com/ClimateFdbk"><i class="fa fa-twitter"></i></a>
          <a href="https://github.com/climatefeedback"><i class="fa fa-github"></i></a>
          <!-- Include hypothes.is stream link -->
          <!-- <a href=""><i class="fa fa-rss"></i></a> -->
      </div>
      <!-- / Social media -->
    </nav>
  </div>
</header>
