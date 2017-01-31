<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <div class="page-header myfull">
          <h2  style="color:#000"> . </h2>
      </div>
        <h1 itemprop="name" class="entry-title"><?php the_title(); ?></h1>
    </header>

    <div class="entry-content">
      <div class="fact-check-card center">
        <div class="fact-check-card__row row p2">
          <div class="fact-check-card__row__screenshot col-sm-4 p1">
            <a class="fact-check-card__row__screenshot__link"
              href=<?php echo get_post_meta( get_the_ID(), 'annotationsLink', true) ?>
            >
              <img
                class="fact-check-card__row__screenshot__img"
                src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/<?php echo get_post_meta( get_the_ID(), 'screenshot', true)?>.png"
              >
            </a>
          </div>
          <div class="col-sm-4 p1">
            <div class="fact-check-card-title mb2">
              CLAIM
            </div>
            <div>
              "<?php echo get_post_meta( get_the_ID(), 'claimshort', true) ?>"
            </div>
          </div>
          <div class="col-sm-4 p1">
            <div class="fact-check-card-title mb2">
              VERDICT
            </div>
            <div>
              <img
                class="fact-check-card__row__verdict__img"
                src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/<?php echo get_post_meta( get_the_ID(), 'verdict', true)?>.png"
              >
            </div>
          </div>
        </div>
        <div class="mb3">
          <div class="fact-check-card-title mb2">
            ISSUES
          </div>
          <div class="fact-check-card__details__text">
            <?php echo get_post_meta( get_the_ID(), 'details', true) ?>
          </div>
        </div>
        <div>
          <div class="fact-check-card-title mb2">
            KEY TAKE AWAY
          </div>
          <div class="fact-check-card__takeaway row">
            <div class="fact-check-card__takeaway__icon col-sm-2 center">
              <img
                class="fact-check-card__takeaway__icon__img"
                src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/grey_bulb.png"
              >
            </div>
            <div class="fact-check-card__takeaway__text col-sm-10">
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
