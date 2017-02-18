  <div class="row">
            <div class="media-left hidden-xs">
                <a class="postpic" href=" <?php the_permalink(); ?>  ">
                    <?php echo types_render_field( "front-image", array( "width" => "275", "height" => "176", "proportional" => "true" ) ); ?>
                </a>
            </div>
        <div class="media-body">
            <a class="strong" href="<?php the_permalink(); ?>">
               <h3 class="noborder"> <?php the_title(); ?></h3></a>
            </a>
            <h4 class="noborder"><span style="font-weight:normal; font-size-adjust: 0.5;">in</span> <?php echo get_post_meta( get_the_ID(), 'outlet', true ); ?>, <span style="font-weight:normal; font-size-adjust: 0.5;">by</span>  <?php echo get_post_meta( get_the_ID(), 'author', true ); ?> 
            </h4>
            <p class="small">  
                <em><?php the_excerpt(); ?></em>
            </p>
            <p class="small">
                <span class="square-btn">— <?php echo get_the_date( 'd M Y' ); ?> </span>
            </p>
        </div>
    </div>
	<hr/>