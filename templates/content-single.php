<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>

    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php get_template_part('templates/entry-meta'); ?>
      <!--      <h4>-->
      <!--        <a href="<?php echo get_post_meta( get_the_ID(), 'link', true ); ?>" target="_blank">--> <!-- THIS 'echo' IS CAUSING THE ERROR -->
      <!--          --><?php //echo get_post_meta( get_the_ID(), 'outlet', true ); ?>
      <!--        </a>-->
      <!--      </h4>-->
    </header>

    <div class="entry-content">
      <p><?php echo get_post_meta( get_the_ID(), 'cred', true ) ?></p>

      <div class="sharing-icons">
        <?php if ( function_exists( 'sharing_display' ) ) {
          sharing_display( '', true );
        }

        if ( class_exists( 'Jetpack_Likes' ) ) {
          $custom_likes = new Jetpack_Likes;
          echo $custom_likes->post_likes( '' );
        } ?>
      </div>

      <center>
        <?php the_post_thumbnail(array(550, 300), array( 'class' => 'img-responsive' )); ?>
      </center>
      <p><?php the_content(); ?></p>
      <!--      <button>-->
      <!--        <a href="--><?php //echo get_post_meta( get_the_ID(), 'annotationsLink', true ); ?><!--" target="_blank">See all the scientists' annotation in context</a>-->
      <!--      </button>-->
    </div>

    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>

  </article>

  <div class="foot-notes">
    <p class="small"><?php echo get_post_meta( get_the_ID(), 'footNote', true) ?></p>
  </div>

  <!--  <h1>--><?php //echo get_post_meta( get_the_ID(), 'score', true ); ?><!--</h1>-->


<?php endwhile; ?>
