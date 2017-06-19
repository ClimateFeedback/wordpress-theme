<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <div class="page-header myfull">
          <h2  style="color:#000"> . </h2> 
      </div>
        <h1 class="entry-title"><?php the_title(); ?></h1> 
        
      <p>
        <?php if( get_post_meta( get_the_ID(), 'arttitle', true ) ): ?>
            Analysis of "<?php echo get_post_meta( get_the_ID(), 'arttitle', true ); ?>"<br />
        <?php endif; ?>
         Published in <?php echo do_shortcode('[outlet]'); ?>, by <?php echo do_shortcode('[author]'); ?>
          on <time class="updated"><?php echo get_post_meta( get_the_ID(), 'date', true ); ?></time>
      </p>
    </header>

      
    <div class="entry-content">
        
       <p class=""><?php echo get_post_meta( get_the_ID(), 'cred', true ) ?> <span class="infobox"><span class="infolink"></span><span class="infoboxtext small"><a target="_blank" href="http://climatefeedback.org/process/#tit4">more about the credibility rating</a></span></span>  
        
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

	<script type="application/ld+json">
 		{
			"@context": "http://schema.org",
			"@type": "WebPage",
			"mainEntity": {
				"@type": "Article",
				"author": {
					"@type": "Organization",
					"logo": "https://climatefeedback.org/wp-content/themes/wordpress-theme/dist/images/Climate_Feedback_logo_s.png",
					"name": "Climate Feedback"
				},
				"datePublished": "<?php echo get_the_date('d M Y'); ?>",
				"image": {
					"@type": "ImageObject",
                                        "height": "200px",
					"url": "<?php echo simplexml_load_string(get_the_post_thumbnail())->attributes()->src; ?>",
					"width": "200px"
                                },
				"headline": "<?php echo substr(esc_attr(get_the_excerpt()),0,110);?>",
				"publisher": {
					"@type": "Organization",
					"logo": "https://climatefeedback.org/wp-content/themes/wordpress-theme/dist/images/Climate_Feedback_logo_s.png",
					"name": "Climate Feedback"
				},
				"review": {
         				"@type": "Review",
         				"author": {
            					"@type": "Organization",
          			  		"logo": "https://climatefeedback.org/wp-content/themes/wordpress-theme/dist/images/Climate_Feedback_logo_s.png",
            					"name": "Climate Feedback",
						"url": "<?php echo esc_url(home_url()); ?>"
         			 	},
  					"datePublished": "<?php echo get_post_meta( get_the_ID(), 'date', true); ?>",
					"image": {
						"@type": "ImageObject",
						"height": "200px",
						"url": "<?php echo simplexml_load_string(get_the_post_thumbnail())->attributes()->src; ?>",
						"width": "200px"
					},
					"publisher": {
						"@type": "Organization",
						"logo": "https://climatefeedback.org/wp-content/themes/wordpress-theme/dist/images/Climate_Feedback_logo_s.png",
						"name": "Climate Feedback"
					},
					"itemReviewed": {
						"@type": "CreativeWork",
						"author": {
							"@type": "Person",
							"name": "<?php echo get_post_meta( get_the_ID(), 'author', true); ?>"
						},
						"headline": "<?php echo get_post_meta( get_the_ID(), 'arttitle', true ); ?>",
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
						"url": "<?php echo get_post_meta( get_the_ID(), 'link', true ); ?>"
					},
					"reviewRating": {
						"@type": "Rating",
						"alternateName": "<?php echo get_post_meta( get_the_ID(), 'score', true); ?>",
						"bestRating": 2,
						"ratingValue": <?php echo get_post_meta( get_the_ID(), 'score', true); ?>,
						"worstRating": -2
					},
					"reviewBody": "<?php echo esc_attr(get_post_meta( get_the_ID(), 'details', true)); ?>",
					"url": "<?php echo get_permalink( get_the_ID() ); ?>"	        		
				}
			}
		}
	</script>

  </article>

  <div class="foot-notes">
    <p class="small"><?php echo get_post_meta( get_the_ID(), 'footNote', true) ?></p>
  </div>

      <p class="small spaceup1">
       <i class="fa fa-tags fa-lg" aria-hidden="true"></i> <?php the_tags( '<span class="bot-tag">', '</span> &nbsp;<span class="bot-tag">', '</span>'); ?>
      </p>
      <p class="small">
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


  <!--  <h1>--><?php //echo get_post_meta( get_the_ID(), 'score', true ); ?><!--</h1>-->


<?php endwhile; ?>
