  <div class="row">
            <div class="media-left hidden-xs">
                <a class="postfeatured" href="<?php the_permalink(); ?>">
                    <img 
              src="<?php echo simplexml_load_string(get_the_post_thumbnail())->attributes()->src;?>"
                         >
                </a>
            </div>
        <div class="media-body">
            <a class="strong" href="<?php the_permalink(); ?>">
               <h3 class="noborder"> <?php the_title(); ?></h3></a>
            </a>
            <h4 class="noborder"><span style="font-weight:normal; font-size-adjust: 0.5;">in</span> <?php echo get_post_meta( get_the_ID(), 'outlet', true ); ?>, <span style="font-weight:normal; font-size-adjust: 0.5;">by</span>  <?php echo get_post_meta( get_the_ID(), 'author', true ); ?> 
            </h4>
            <p class="small">
                <span class="square-btn">— <?php echo get_the_date( 'd M Y' ); ?> </span>
            </p>
            <div class='feed-excerpt mb1'>
              <?php echo get_trim_text(get_the_excerpt());?>
            </div>
        </div>
    </div>
	<hr />