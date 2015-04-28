<header class="banner">
  <div class="container">
    <a class="brand" href="<?= esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
    <nav class="nav-primary">
      <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
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
