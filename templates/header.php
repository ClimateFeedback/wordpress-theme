
<header class="banner navbar navbar-default navbar-static-top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only"><?= __('Toggle navigation', 'sage'); ?></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand navbar-brand__logo logo" href="<?= esc_url(home_url('/')); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/Climate_Feedback_logo_s.png"> <span>Climate Feedback</span></a>
    </div>
      
    <nav class="collapse navbar-collapse" role="navigation">
              <?php
      if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav']);
      endif;
      ?>
      
            <ul id="menu-main" class="nav navbar-nav">
                <li class="menu-item  menu-item-object-page  mmenu">  
                    <a href="<?php echo get_site_url(); ?>/About/">About</a>
                </li>
                <div class="ddropdown">
                    <li class="menu-item  menu-item-object-page  menu-item-has-children">  
                        <button class="dropbtn"><a href="<?php echo get_site_url(); ?>/feedbacks/"><b class="caret"></b> Scientific Feedbacks</a></button>
                        <div class="ddropdown-content">
                            <a href="<?php echo get_site_url(); ?>/feedbacks/">Article Reviews</a>
                            <a href="<?php echo get_site_url(); ?>/claim-reviews/">Claim Reviews</a>
                            <a href="<?php echo get_site_url(); ?>/insights/">Insights</a>
                        </div>
                    </li>
                </div> 
                <li class="menu-item  menu-item-object-page "> 
                    <a href="<?php echo get_site_url(); ?>/community/">Community</a>
                </li>
                <li class="menu-item  menu-item-object-page  ">
                    <a href="<?php echo get_site_url(); ?>/news-events">News &amp; Events</a>
                </li>              
            </ul>
        
      <!-- Social Media -->
      <div class="social-media pull-right">
          <a data-tooltip="Subscribe to our email news feed" class="tooltip-bottom" href="https://eepurl.com/bwqJtz"><i class="fa fa-envelope"></i></a>
          <a href="https://facebook.com/ClimateFeedback/" target="_blank"><i class="fa fa-facebook"></i></a>
          <a href="https://twitter.com/ClimateFdbk" target="_blank"><i class="fa fa-twitter"></i></a>
           <a href="<?php bloginfo('rss2_url'); ?>" title="RSS Feed"><i class="fa fa-rss"></i></a>
      </div>
      <!-- / Social media -->
    </nav>
  </div>
</header>
