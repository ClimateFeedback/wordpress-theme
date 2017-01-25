<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
      <span itemscope itemtype="http://schema.org/Article">
    <header>
      <div class="page-header myfull">
          <h2  style="color:#000"> . </h2> 
      </div>
        <h1 itemprop="name" class="entry-title"><?php the_title(); ?></h1> 
      
    </header>

    <div class="entry-content">
       <aside class="mashsb-stretched">  <?php echo do_shortcode('[mashshare]'); ?></aside>
      <center>
        <span itemprop="image"><?php the_post_thumbnail(array(800, 500), array( 'class' => 'img-responsive' )); ?> </span>
      </center>
        <br />
        
      <p><?php the_content(); ?></p>
      <!--      <button>-->
      <!--        <a href="--><?php //echo get_post_meta( get_the_ID(), 'annotationsLink', true ); ?><!--" target="_blank">See all the scientists' annotation in context</a>-->
      <!--      </button>-->
    </div>

    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
        <p class="small">
        Published on: <?php echo get_the_date( 'Y-m-d' ); ?>
            </p>
    </footer>
      </span>
  </article>

<!--      add tags list to the post <?php the_tags( '<p>Tags: ', ', ', '</p>'); ?> 

<p> Outlet: <a href="/ "> </a><?php echo get_post_meta( get_the_ID(), 'outlet', true ); ?></p> -->

  <div class="foot-notes">
    <p class="small"><?php echo get_post_meta( get_the_ID(), 'footNote', true) ?></p>
  </div>

  <!--  <h1>--><?php //echo get_post_meta( get_the_ID(), 'score', true ); ?><!--</h1>-->


<?php endwhile; ?>
