<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
      <span itemscope itemtype="https://schema.org/Article">
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
    </div>

    <div>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>

    </div>
      </span>
  </article>

      <p class="small spaceup1">
       <i class="fa fa-tags fa-lg" aria-hidden="true"></i> <?php the_tags( '<span class="bot-tag">', '</span> &nbsp;<span class="bot-tag">', '</span>'); ?>
      </p>
        <p class="small">
            Published on: <?php echo get_the_date( 'd M Y' ); ?> &#124; Editor: <?php the_author_posts_link(); ?>
        </p>
  <div class="bot-box">
      <div class="row spaceup1">
          <div class="col-sm-9">
      <p class="small ">
<em>Climate Feedback is a non-partisan, non-profit organization dedicated to science education. Our reviews are crowdsourced directly from a community of scientists with relevant expertise. We strive to explain whether and why information is or is not consistent with the science and to help readers know which news to trust. <br />
Please <a href="https://climatefeedback.org/contact-us/">get in touch</a> if you have any comment or think there is an important claim or article that would need to be reviewed.</em>
      </p>
          </div>
          <div class="col-sm-3">
              <a href="https://climatefeedback.org/climate-feedback-accredited-by-the-international-fact-checking-network-at-poynter-for-the-second-year/"><img class="alignnone size-full wp-image-2168" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/ifcn-fact-checkers-code-principles-signatory.png" alt="ifcn-fact-checkers-code-of-principles-signatory" width="140" /></a>
          </div>
      </div>
  </div>

<?php endwhile; ?>
