<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <div class="page-header myfull">
          <h2  style="color:#000"> . </h2>
      </div>
        <h1 itemprop="name" class="entry-title"><?php the_title(); ?></h1>
    </header>

      <aside class="mashsb-stretched">  <?php echo do_shortcode('[mashshare]'); ?></aside>

    <div class="entry-content">
      <div class="fact-check-card center">
        <div class="fact-check-card__row row p2">
          <div class="fact-check-card__row__screenshot col-sm-4 p1">
            <img
                class="fact-check-card__row__screenshot__img"
                src="<?php echo get_post_meta( get_the_ID(), 'screenshot', true)?>"
              >
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
              VERDICT <span class="infobox"><span class="infolink"></span><span class="infoboxtext small"><a target="_blank" href="http://climatefeedback.org/claim-reviews-framework">more about the rating framework</a></span></span>
            </div>
            <div>
              <img
                class="fact-check-card__row__verdict__img"
                src="<?php echo get_site_url(); ?>/wp-content/uploads/tags/HTag_<?php echo get_post_meta( get_the_ID(), 'verdict', true)?>.png"
              >  
            </div>
          </div>
        </div>
        <div >
          <div class="mb2">
            <p> <span class="fact-check-card-title">SOURCE:</span> <span class="fact-check-card__details__text small"><?php echo get_post_meta( get_the_ID(), 'author', true) ?>, <?php echo get_post_meta( get_the_ID(), 'outlet', true) ?>, <?php echo get_post_meta( get_the_ID(), 'date', true) ?>  &nbsp; <a target="_blank" title="See the claim in context" href=<?php echo get_post_meta( get_the_ID(), 'annotationsLink', true) ?> ><i class="fa fa-external-link" aria-hidden="true"></i></span></a>
            </p> 
          </div>
        </div>
          <?php if( get_post_meta( get_the_ID(), 'details', true) ): ?>
            <div class="mb3">
                <div class="fact-check-card-title mb1">
                DETAILS
                </div>
                <div class="fact-check-card__details__text">
                    <?php echo do_shortcode( get_post_meta( get_the_ID(), 'details', true) ) ?>
                </div>
            </div>
          <?php endif; ?>
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
            <blockquote> <span style="color: #808080;">CLAIM:</span> "<?php echo get_post_meta( get_the_ID(), 'claimfull', true) ?>"   
            </blockquote>
        <p><?php the_content(); ?></p>
    </div>

      
    <footer>
      <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>

	<?php
		$rating_array=explode('_', get_post_meta( get_the_ID(), 'verdict', true));
	?>
	<script type="application/ld+json">
 		{
			"@context": "http://schema.org",
			"@type": "WebPage",
			"mainEntity": {
				"@type": "Article",
				"author": {
					"@type": "Organization",
					"logo": "https://climatefeedback.org/wp-content/themes/wordpress-theme/dist/images/Climate_Feedback_logo_s.png",
					"name": "Climate Feedback",
					"url": "<?php echo esc_url(home_url()); ?>"
				},
				"datePublished": "<?php echo get_the_date('d-m-Y'); ?>",
				"headline": "<?php echo substr(get_the_excerpt(),0,110); ?>",
				"publisher": {
					"@type": "Organization",
					"logo": "https://climatefeedback.org/wp-content/themes/wordpress-theme/dist/images/Climate_Feedback_logo_s.png",
					"name": "Climate Feedback",
					"url": "<?php echo esc_url(home_url()); ?>"
				},
				"image": {
					"@type": "ImageObject",
					"height": "200px",
					"url": "<?php echo get_post_meta( get_the_ID(), 'screenshot', true); ?>",
					"width": "200px"
				},
				"review": {
					"@type": "ClaimReview",
         				"author": {
            					"@type": "Organization",
          			  		"logo": "https://climatefeedback.org/wp-content/themes/wordpress-theme/dist/images/Climate_Feedback_logo_s.png",
            					"name": "Climate Feedback",
						"url": "<?php echo esc_url(home_url()); ?>"
         				 },
          				"claimReviewed": "<?php echo get_post_meta( get_the_ID(), 'claimshort', true); ?>",
          				"datePublished": "<?php echo get_post_meta( get_the_ID(), 'date', true); ?>",
					"itemReviewed": {
						"@type": "CreativeWork",
						"author": {
							"@type": "Person",
							"name": "<?php echo get_post_meta( get_the_ID(), 'author', true); ?>"
						},
						"headline": "TBD",
							"image": {
							"@type": "ImageObject",
							"height": "200px",
							"url": "<?php echo get_post_meta( get_the_ID(), 'screenshot', true); ?>",
							"width": "200px"
						}, 
						"publisher": {
							"@type": "Organization",
							"logo": "<?php echo get_post_meta( get_the_ID(), 'outlet', true); ?>",
							"name": "<?php echo get_post_meta( get_the_ID(), 'outlet', true); ?>"
						},
						"datePublished": "<?php echo get_post_meta( get_the_ID(), 'date', true); ?>",
						"url": "TBD"
					},
					"reviewRating": {
						"@type": "Rating",
						"alternateName": "<?php echo $rating_array[0]; ?>",
						"bestRating": 2,
						"ratingValue": <?php echo end($rating_array); ?>,
						"worstRating": -2
					},
					"reviewBody": "<?php echo esc_attr(get_post_meta( get_the_ID(), 'details', true)); ?>",
					"url": "<?php echo get_permalink( get_the_ID() ); ?>"	        		
				}
			}
		}
	</script>

  </article>

      <p class="small spaceup1">
        Published on: <?php echo get_the_date( 'd M Y' ); ?>
      </p>
<div class="bot-box">
      <div class="row spaceup1">
          <div class="col-sm-9">
      <p class="small ">
<em>Climate Feedback is a non-partisan, non-profit organization dedicated to science education. Our reviews are crowdsourced directly from a community of scientists with relevant expertise. We strive to explain whether and why information is or is not consistent with the science and to help readers know which news to trust. <br />
Please <a href="http://climatefeedback.org/contact-us/">get in touch</a> if you have any comment or think there is an important claim or article that would need to be reviewed.</em>
      </p>
          </div>
          <div class="col-sm-3">
              <a href="https://climatefeedback.org/climate-feedback-accredited-international-fact-checking-network-poynter/"><img class="alignnone size-full wp-image-2168" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/ifcn-fact-checkers-code-principles-signatory.png" alt="ifcn-fact-checkers-code-of-principles-signatory" width="140" /></a>
          </div>
      </div>
  </div>

<?php endwhile; ?>
