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
	    <p><a href="for-scientists/" class="btn btn-primary btn-lg">Scientist sign up page</a></p>
      </div>
	</div>
</div>

<div class="container">
    
    <section>
        <div class="row section">             
            <div class="col-lg-6">
                <h3>What’s the issue?</h3>
                <p>With so much information available online, trying to figure out which information is credible — and what is not — is a real challenge. When so much of what we read falls outside of our own expertise, how can we know which headlines and news articles are consistent with science?</p>
            </div>	
            <div class="col-lg-6">
                <img src="">
            </div>
        </div>

        <div class="row section">
            <div class="col-lg-6">
                <img alt="A daily mail article annotated by scientists." src="http://climatefeedback.org/img/cherry.png" class="fig" />
                <p class="caption"> Screenshot illustrating a possible use of the Hypothes.is annotator. Here a scientist added a comment and a link to a scientific publication.</p>
            </div>
            <div class="col-lg-6">
                <h3>What if online coverage could be peer-reviewed?</h3>
                <p>Through the use of the Hypothesis annotation web browser plug-in, the community of scientists go through a variety of online news articles and provide ‘feedback’ on the scientific accuracy of the information presented. Readers can view these annotations directly alongside the original texts and see exactly where the article’s information is consistent — or inconsistent — with scientific thinking and state-of-the-art knowledge in the field.</p>
    	    </div>
       	</div>

        <div class="row section">
            <div class="col-lg-6">
                <h3>Why should we care?</h3>
                <p>An informed citizenry is essential for a functioning democracy. And to be properly informed, citizens need access to journalism of the highest accuracy and the tools to evaluate the credibility of what they read. This project aims to achieve both by 1) bringing the expertise of the scientific community into the world of online journalism, and 2) providing readers with top-level “credibility ratings” for a broad range of online news articles.</p>
            </div>
            <div class="col-lg-6">
                <img alt="" src="">
            </div>
        </div>
    </section>
    
    <hr/>

    <section>
        <div class="row section">
          <div class="col-lg-6">
            <!-- News --> 
            <h2>News</h2>
            <?php 
                $args = array( 
                    'post_type' => array( 'post', 'press' ),
                    'posts_per_page' => 5 );
                $loop = new WP_Query( $args );
            ?>
            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                <article>
                    <header>
                    <?php if ( 'press' == get_post_type() ) : ?>
                        <h3>
                            <a href="<?php $key_1_value = get_post_meta( get_the_ID(), 'link', true );
                                if( ! empty( $key_1_value ) ) { echo $key_1_value; } ?>"><?php the_title(); ?>
                            </a>
                        </h3>
                    <?php endif; ?>
                    <?php if ( 'press' != get_post_type() ) : ?>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
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
            <?php endwhile; ?>
            <?php the_posts_navigation(); ?>
          </div>
          
          <div class="col-lg-6">
            <!-- Evaluations --> 
            <h2>Evaluations</h2>
            <?php 
                $args = array( 
                    'post_type' => array( 'evaluation'),
                    'posts_per_page' => 5 );
                $loop = new WP_Query( $args );
            ?>
            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                <article>
                    <header>
                    <?php if ( 'press' == get_post_type() ) : ?>
                        <h3>
                            <a href="<?php $key_1_value = get_post_meta( get_the_ID(), 'link', true );
                                if( ! empty( $key_1_value ) ) { echo $key_1_value; } ?>"><?php the_title(); ?>
                            </a>
                        </h3>
                    <?php endif; ?>
                    <?php if ( 'press' != get_post_type() ) : ?>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
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
            <?php endwhile; ?>
            <?php the_posts_navigation(); ?>
          </div>
        </div>
    </section>

</div><!-- / .container -->
