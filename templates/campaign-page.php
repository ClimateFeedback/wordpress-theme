
  <article <?php post_class(); ?>>

    <header>
      <img src="<?php bloginfo('url');?>/img/campaign-splash.png" alt=""/>
      <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>

    <div class="entry-content">
      <p><?php echo get_post_meta( get_the_ID(), 'cred', true ) ?></p>
      <center>
        <?php the_post_thumbnail(array(550, 300), array( 'class' => 'img-responsive' )); ?>
      </center>
      <p><?php the_content(); ?></p>
    </div>

    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>

  </article>

  <div class="foot-notes">
    <p class="small"><?php echo get_post_meta( get_the_ID(), 'footNote', true) ?></p>
  </div>

