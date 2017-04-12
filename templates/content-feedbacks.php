<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
      <span itemscope itemtype="http://schema.org/Article">
    <header>
      <div class="page-header myfull">
          <h2  style="color:#000"> . </h2> 
      </div>
        <h1 itemprop="name" class="entry-title"><?php the_title(); ?></h1> 
        
      <p >  
         Published in <?php echo do_shortcode('[outlet]'); ?>, by <?php echo do_shortcode('[author]'); ?>
          on <time class="updated"><?php echo get_post_meta( get_the_ID(), 'date', true ); ?></time>
      </p>
    </header>

      
    <div class="entry-content">
        
       <p itemprop="articleSection" class=""><?php echo get_post_meta( get_the_ID(), 'cred', true ) ?> <span class="infobox"><span class="infolink"></span><span class="infoboxtext small"><a target="_blank" href="http://climatefeedback.org/process/#tit4">more about the credibility rating</a></span></span>  
        
          <?php if( get_the_term_list( get_the_ID(), 'article-tag', true ) ): ?>
<br /> A majority of reviewers tagged the article as: <?php echo do_shortcode('[article-tags]'); ?>.
          <?php endif; ?>
        </p>
        <aside class="mashsb-stretched">  <?php echo do_shortcode('[mashshare]'); ?></aside>
       
      <center>
        <?php the_post_thumbnail(array(800, 500), array( 'class' => 'img-responsive' )); ?>
      </center>
        <br />
         
        
      <p><?php the_content(); ?></p>
      <!--      <button>-->
      <!--        <a href="--><?php //echo get_post_meta( get_the_ID(), 'annotationsLink', true ); ?><!--" target="_blank">See all the scientists' annotation in context</a>-->
      <!--      </button>-->
    </div>

    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
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
