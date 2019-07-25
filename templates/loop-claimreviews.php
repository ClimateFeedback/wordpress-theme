      <div class="row">
          <a class="strong" href="<?php the_permalink(); ?>">
              <h3 class="noborder"> <?php the_title(); ?></h3></a>
        <div class="feedpages__claim__container relative">
          <div class="feedpages__claim__container__illustration col col-3 hidden-xs">
            <div class="feedpages__claim__container__illustration__screenshot">
              <img
                class="feedpages__claim__container__illustration__screenshot__img"
                src="<?php echo get_post_meta( get_the_ID(), 'screenshot', true)?>"
              >
            </div>
          </div>
          <div class="feedpages__claim__container__content col col-6">
              <div class="fact-check-card-title mb2">
                  CLAIM
              </div>
              <div class="feedpages-excerpt feedpages__claim__container__content__text mb1">
                  "<?php echo get_post_meta( get_the_ID(), 'claimshort', true) ?>"
              </div>
              
              <div class="feedpages__claim__container__content__outlet">
                  <p> <span class="fact-check-card-title">SOURCE:</span> <span class="fact-check-card__details__text small"><?php echo get_post_meta( get_the_ID(), 'author', true) ?>, <?php echo get_post_meta( get_the_ID(), 'outlet', true) ?></p> 
                  <p><span class="fact-check-card-title">Published: </span><span class="fact-check-card__details__text small"><?php echo get_the_date( 'd M Y' ); ?></span></p>
              </div>  
 
          </div>
                  
            <div class="feedpages__claim__container__content col col-3 p1">
                <div class="fact-check-card-title mb2">
                    VERDICT
                </div>
                <div class="feedpages__claim__container__content__screenshot">
                    <img
                class="fact-check-card__row__verdict__img"
                src="<?php echo get_site_url(); ?>/wp-content/uploads/tags/HTag_<?php echo get_post_meta( get_the_ID(), 'verdict', true)?>.png"
                         >  
                </div>
            </div>

        </div>
      </div>

	<hr />