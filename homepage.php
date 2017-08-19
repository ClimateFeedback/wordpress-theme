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
      <h3 class="tagline half-black">A Scientific Reference to Reliable Information on Climate Change</h3>
    </div>
  </div>
</div>
<!-- IGG CAMPAIGN BANNER
<section class="campaign">
  <div class="container">
    <div class="row">

      <div class="col-xs-12 col-md-6">
        <div class="camp-left">            
           <center> <iframe class="resp-vid" width="460" height="259" src="https://www.youtube.com/embed/GYsNYvO6uVk" frameborder="0" allowfullscreen ></iframe>                  </center>
            
        </div>
      </div>
      <div class="col-xs-12 col-md-6">
        <div class="camp-body">
            <img alt="" class="img-responsive camp-fig" src="http://climatefeedback.org/wp-content/uploads/2016/04/standwithscience.png">
            <p style="padding-left: 1.3em; padding-bottom: 0.8em;">Climate Feedback relies on your support. <br /> Our crowdfunding campaign successfully raised $30k. <br /> Join hundreds supporting our work on INDIEGOGO!
                </p>
        
           <a target="_blank" href="https://www.indiegogo.com/projects/climate-feedback-a-guide-to-reliable-climate-news--2/#/" style="margin-left: 1em;" class="btn btn-primary btn-lg btn-resp">Donate Today</a>
          
        </div>
      </div>

    </div>
  </div>
</section>
/  -->

<div class="container">

  <section class="highlevel-overview">
    <div class="row ">
      <div class="col-sm-6 ">
        <h3 class="spaceup">Today’s media climate leads to confusion</h3>
        <p>With so much information available online, trying to figure out which information is credible — and what is not — is a real challenge. When so much of what we read falls outside of our own expertise, how can we know which headlines and news articles are consistent with science? </p>
      </div>
      <div class="col-sm-6">
        <img class="fig" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/i1_confusion.png">
      </div>
    </div>

    <div class="row ">
      <div class="col-sm-6 hidden-xs">
        <img alt="A daily mail article annotated by scientists." src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/i2_our-process.png" class="fig" />
      </div>
      <div class="col-sm-6 ">
        <h3 class="spaceup">What if online coverage could be peer-reviewed?</h3>
        <p>Using the <a href="https://hypothes.is" target="_blank">Hypothesis</a> annotation platform, our community of scientists go through a variety of online media articles and provide ‘feedback’ on the scientific accuracy of the information presented. Readers can view these annotations directly alongside the original texts and see exactly where the article’s information is consistent — or inconsistent — with scientific thinking and state-of-the-art knowledge in the field.</p>
      </div>
      <div class="col-sm-6 visible-xs">
        <img alt="A daily mail article annotated by scientists." src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/i2_our-process.png" class="fig" />
      </div>
    </div>

    <div class="row ">
      <div class="col-sm-6">
        <h3 class="spaceup">Accurate information: the foundation of a functioning democracy</h3>
        <p>To be properly informed, citizens need access to journalism of the highest accuracy and the tools to evaluate the credibility of what they read. This project aims to achieve both by 1) bringing the expertise of the scientific community into the world of online journalism, and 2) providing readers with top-level “credibility ratings” for a broad range of online news articles.</p>
      </div>
      <div class="col-sm-6">
        <img alt="" class="fig" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/i3_result.png">
      </div>
    </div>
  </section>

</div><!-- / .container -->

<section class="scientist-signup">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 call-to-action">
        <div class="media-left">
          <img alt="" class="sci-fig" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/scientists-logo2.png">
        </div>
        <div class="media-body">
          <h3>SCIENTISTS!</h3>
          <h4>Help us create a better informed society. Join our community today!</h4>
          <a href="/for-scientists/" class="btn btn-primary btn-lg">Apply Now</a>
        </div>
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
                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
              <?php endif; ?>
            </header>
            <div class="media-left hidden-xs">
              <?php if ( 'press' == get_post_type() ) : ?>
                    <a href="<?php $key_1_value = get_post_meta( get_the_ID(), 'link', true );
                    if( ! empty( $key_1_value ) ) { echo $key_1_value; } ?>" class="frontpagepostpic" ><?php the_post_thumbnail() ?>
                    </a>              
              <?php endif; ?>
              <?php if ( 'press' != get_post_type() ) : ?>
              <a class="frontpagepostpic" href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail() ?>
              </a>
              <?php endif; ?>
            </div>
            <div class="media-body small">
              <h4 style="margin-bottom:-1em;"><?php echo get_post_meta( get_the_ID(), 'outlet', true ); ?></h4>
              <?php the_excerpt(); ?>
            </div>
          </article>
          <hr/>
        <?php endwhile; ?>
        <a href="feedbacks/" class="btn btn-primary">More Feedbacks</a>
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

         <a href="blog-posts/" class="btn btn-primary">More Posts</a> 
      </div>

    </div>
  </section>

</div><!-- / .container -->

<section class="press-show">
  <div class="container">

    <h4>HEAR WHAT THEY’RE SAYING ABOUT US</h4>
    <div class="row">
      <div class="col-4" style="padding-left: 2em">
        <a href="https://j.mp/CF_OnTheMedia" target="_blank"> <img class="press-fig img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/press-npr.png"> </a>
      </div>
      <div class="col-4">
        <a href="https://www.theguardian.com/environment/planet-oz/2015/aug/14/scientists-get-tool-to-mark-online-climate-science-media-coverage-and-its-not-a-rusty-teaspoon" target="_blank">   <img class="press-fig img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/the-guardian-logo_grey.png"></a>
      </div>
      <div class="col-4 forbes" style="padding-left: 2em">
        <a href="https://www.forbes.com/sites/jeffmcmahon/2017/01/27/climate-scientists-launch-brainy-war-on-fake-news/" target="_blank"> <img class="press-fig img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/press-forbes.png"></a>
      </div>
      <div class="col-4">
        <a href="press/" class="btn btn-primary">More Press</a>
      </div>
    </div>
      

      
  </div>
      
</section>
