<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <div class="page-header myfull">
          <h2  style="color:#000"> . </h2> 
      </div>
        <h1 itemprop="name" class="entry-title"><?php the_title(); ?></h1> 
      
    </header>

      
      
    <div class="entry-content">
       
        
  <div class="fact-check-card">
      <p>CLAIM <br /><?php echo get_post_meta( get_the_ID(), 'claimshort', true) ?></p>
      <p>VERDICT <br /><?php echo get_post_meta( get_the_ID(), 'verdict', true) ?></p>
      <p>DETAILS <br /><?php echo get_post_meta( get_the_ID(), 'details', true) ?></p>
      <p>TAKEAWAY <br /><?php echo get_post_meta( get_the_ID(), 'takeaway', true) ?></p>
  </div>

        <br />
         
        <h3>SCIENTISTS' REVIEW</h3>
      <p><?php the_content(); ?></p>
      <!--      <button>-->
      <!--        <a href="--><?php //echo get_post_meta( get_the_ID(), 'annotationsLink', true ); ?><!--" target="_blank">See all the scientists' annotation in context</a>-->
      <!--      </button>-->
    </div>

    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
  
  </article>



  <!--  <h1>--><?php //echo get_post_meta( get_the_ID(), 'score', true ); ?><!--</h1>-->


<?php endwhile; ?>
