<?php
/*
Template Name: Homepage
*/
?>

</div><!-- / .row -->
</div><!-- / .container -->

<div class="sigla jumbotron">
	<div class="container">
	  <div class="row">
	    <h1>CLIMATE FEEDBACK </h1>
	    <p class="testo">A voice for science in climate change media coverage</p>
	    <!-- <p><a href="for-scientists/" class="btn btn-primary btn-lg">Scientist sign up page</a></p> -->
      </div>
	</div>
</div>

<div class="container">
    
    <section class="highlevel-overview">
        <div class="row">             
            <div class="col-sm-6">
                <h3>Today’s media climate leads to confusion</h3>
                <p>With so much information available online, trying to figure out which information is credible — and what is not — is a real challenge. When so much of what we read falls outside of our own expertise, how can we know which headlines and news articles are consistent with science? </p>
            </div>	
            <div class="col-sm-6">
                <img class="fig" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/image1.jpg">
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <img alt="A daily mail article annotated by scientists." src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/image2.jpg" class="fig" />
                <p class="caption"> Screenshot illustrating a possible use of the Hypothes.is annotator. Here a scientist added a comment and a link to a scientific publication.</p>
            </div>
            <div class="col-sm-6">
                <h3>What if online coverage could be peer-reviewed?</h3>
                <p>Using the <a href="http://hypothes.is" target="_blank">Hypothesis</a> annotation platform, our community of scientists go through a variety of online media articles and provide ‘feedback’ on the scientific accuracy of the information presented. Readers can view these annotations directly alongside the original texts and see exactly where the article’s information is consistent — or inconsistent — with scientific thinking and state-of-the-art knowledge in the field.</p>
    	    </div>
       	</div>

        <div class="row">
            <div class="col-sm-6">
                <h3>Accurate information: the foundation of a functioning democracy</h3>
                <p>To be properly informed, citizens need access to journalism of the highest accuracy and the tools to evaluate the credibility of what they read. This project aims to achieve both by 1) bringing the expertise of the scientific community into the world of online journalism, and 2) providing readers with top-level “credibility ratings” for a broad range of online news articles.</p>
            </div>
            <div class="col-sm-6">
                <img alt="" class="fig" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/image3.jpg">
            </div>
        </div>
    </section>
    
    </div><!-- / .container -->
    
    <section class="scientist-signup">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h4>Scientists!</h4>   
                    <span class="call-to-action">Help us create a better informed society. Join our community today! <a href="for-scientists/" class="btn btn-primary btn-sm">Apply Now</a></span>
                </div>
            </div>
        </div>
    </section>
    
    <div class="container">
    <section class="news-and-evaluations">
        <div class="row section">
            <div class="col-sm-6">
            <!-- Evaluations --> 
            <h2>Latest Feedbacks</h2>
            <?php 
                $args = array( 
                    'post_type' => array( 'evaluation'),
                    'posts_per_page' => 3 );
                $loop = new WP_Query( $args );
            ?>
            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                <article>
                    <header>
                    <?php if ( 'press' == get_post_type() ) : ?>
                        <h4 class="headline">
                            <a href="<?php $key_1_value = get_post_meta( get_the_ID(), 'link', true );
                                if( ! empty( $key_1_value ) ) { echo $key_1_value; } ?>"><?php the_title(); ?>
                            </a>
                        </h4>
                    <?php endif; ?>
                    <?php if ( 'press' != get_post_type() ) : ?>
                        <h4 class="headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    <?php endif; ?>
                    </header>
                    <div class="media-left hidden-xs">
                        <a class="frontpagepostpic" href="<?php the_permalink(); ?>">
                          <?php the_post_thumbnail() ?>
                        </a>
                    </div>
                    <div class="media-body small">
                        <?php the_excerpt(); ?>
                    </div>
                </article>
                <hr/>
            <?php endwhile; ?>
            <a href="feedbacks/" class="btn btn-primary">Evaluations</a>
            </div>
            
            <div class="col-sm-6">
            <!-- News --> 
            <h2>News</h2>
            <?php 
                $args = array( 
                    'post_type' => array( 'post', 'press' ),
                    'posts_per_page' => 3 );
                $loop = new WP_Query( $args );
            ?>
            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                <article>
                    <header>
                    <?php if ( 'press' == get_post_type() ) : ?>
                        <h4 class="headline">
                            <a href="<?php $key_1_value = get_post_meta( get_the_ID(), 'link', true );
                                if( ! empty( $key_1_value ) ) { echo $key_1_value; } ?>"><?php the_title(); ?>
                            </a>
                        </h4>
                    <?php endif; ?>
                    <?php if ( 'press' != get_post_type() ) : ?>
                        <h4 class="headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    <?php endif; ?>
                    </header>
                    <div class="media-left hidden-xs">
                        <a class="frontpagepostpic" href="<?php the_permalink(); ?>">
                          <?php the_post_thumbnail() ?>
                        </a>
                    </div>
                    <div class="media-body small">
                        <?php the_excerpt(); ?>
                    </div>
                </article>
                <hr/>
            <?php endwhile; ?>
            
            <a href="news-feed/" class="btn btn-primary">More News</a>
            </div>
          
        </div>
    </section>
        
</div><!-- / .container -->

    <section class="press-show">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <h4>HEAR WHAT THEY’RE SAYING ABOUT US</h4>   
                    <img class="fig" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/img_press.png"> 
                    <a href="press/" class="btn btn-primary">More</a>
                </div>
            </div>
        </div>
    </section>