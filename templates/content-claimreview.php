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
        <div class="fact-check-card__row row">
          <div class="col-sm-3">
            <a src=<?php echo get_post_meta( get_the_ID(), 'annotationsLink', true) ?>>
              <img
                class="fact-check-card__row__screenshot"
                src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/<?php echo get_post_meta( get_the_ID(), 'screenshot', true)?>.png"
              >
            </a>
          </div>
          <div class="col-sm-6">
            <div class="fact-check-card__row__title"> CLAIM </div>
            <div>
              "<?php echo get_post_meta( get_the_ID(), 'claimshort', true) ?>"
            </div>
          </div>
          <div>
            <div class="fact-check-card__row__title">
              VERDICT
            </div>
            <div>
              <img
                class="fact-check-card__row__verdict"
                src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/<?php echo get_post_meta( get_the_ID(), 'verdict', true)?>.png"
              >
            </div>
          </div>
        </div>
        <div class="fact-check-card__details">
          <div class="fact-check-card__row__title">
            ISSUES
          </div>
          <div class="fact-check-card__details__text">
            <?php echo get_post_meta( get_the_ID(), 'details', true) ?>
          </div>
        </div>
        <div>
          <div class="fact-check-card__row__title">
            KEY TAKE AWAY
          </div>
          <div class="fact-check-card__takeaway row">
            <div class="fact-check-card__takeaway__icon col-sm-3">
              <img
                class="fact-check-card__takeaway__icon__img"
                src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/grey_bulb.png"
              >
            </div>
            <div class="fact-check-card__takeaway__text col-sm-9">
              <?php echo get_post_meta( get_the_ID(), 'takeaway', true) ?>
            </div>
          </div>
        </div>
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
