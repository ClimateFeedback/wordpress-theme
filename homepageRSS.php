<?php
/*
Template Name: Homepage 2
*/
?>

</div><!-- / .row -->
</div><!-- / .container -->

<?php function get_trim_text ($string) {
  $maxlen = 180;
  $excerpt = $string;
  $excerptlen = strlen($excerpt);
  if ($excerptlen > $maxlen) {
    $excerpt = substr($excerpt, 0, $maxlen).'...';
    $excerptlen = $maxlen + 3;
  }
  if ($excerpt[0] == '"')
    $excerpt = substr($excerpt, 0, $excerptlen-1);
  return $excerpt;
}?>

<div class="sigla feeds-hero">
    <div class="container">
  <div class="row feeds-hero__row">
    <h3 class="half-black">
      Accurate information is the foundation of a functioning democracy
    </h3>
  </div>
        </div>
</div>
<div class="feeds-aim overflow-hidden">
  <div class="container"><div class="feeds-container">
      <p class="feeds-aim__container__img col col-2"> WHAT WE DO </p>
      <p class="feeds-aim__container__text col col-10">
Health Feedback is a worldwide network of scientists sorting fact from fiction in health and medical media coverage. Our goal is to help readers know which news to trust. </p>
  </div></div>
</div>

<div class="container">

<?php
  $args = array(
    'post_type' => array('evaluation'),
    'posts_per_page' => 3
  );
  $loop = new WP_Query( $args );
?>
<div class="feeds-container">
    <div class="feeds-title h3">Latest Article Reviews</div>
  <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <?php if( $loop->current_post == 0 && !is_paged() ) : ?>
      <a href="<?php echo get_permalink( get_the_ID() ); ?>" >
        <div class='feed feed__article mb3'>
          <div class='col col-lg-8'>
              <div class='feed__article-first__screenshot' style='padding-left: 0px !important;  padding-right: 0px !important;'>
            <img
              class='feed__article-first__screenshot__img'
              src="<?php echo simplexml_load_string(get_the_post_thumbnail())->attributes()->src;?>"
            >
          </div>
              </div>
          <div class="feed__article-first__text col col-lg-4">
            <div class='feed-title h3'>
              <?php echo get_the_title(); ?>
            </div>
            <div class='feed-outlet h3'>
              <?php echo get_post_meta( get_the_ID(), 'outlet', true); ?>
            </div>
            <div class='feed-excerpt mb1'>
              <?php echo get_trim_text(get_the_excerpt());?>
            </div>
            <div>
              - <?php echo get_the_date( 'd M Y' ); ?>
            </div>
          </div>
        </div>
      </a>
    <?php else : ?>
      <a class="col col-lg-6" href="<?php echo get_permalink( get_the_ID() ); ?>" >
        <div class='feed feed__article mb3'>
          <div class='feed__article-next__screenshot mb1'>
            <img
              class='feed__article-next__screenshot__img'
              src="<?php echo simplexml_load_string(get_the_post_thumbnail())->attributes()->src;?>"
            >
          </div>
          <div class='feed-title h3'>
            <?php echo get_the_title(); ?>
          </div>
          <div class='feed-outlet h3'>
            <?php echo get_post_meta( get_the_ID(), 'outlet', true); ?>
          </div>
          <div class='feed-excerpt mb1'>
            <?php echo get_trim_text(get_the_excerpt());?>
          </div>
          <div>
            - <?php echo get_the_date( 'd M Y' ); ?>
          </div>
        </div>
      </a>
    <?php endif; ?>
  <?php endwhile; ?>
</div>
<div class="feeds-more mb1 p1">
  <a
    class="feeds-more__link h4 p1"
    href="<?php echo get_site_url(); ?>/feedbacks/"
  >
    More Article Reviews
  </a>
</div>

    </div><!-- / .container -->
        
<!-- Begin MailChimp Signup Form -->
<link href="//cdn-images.mailchimp.com/embedcode/slim-10_7.css" rel="stylesheet" type="text/css">
<style type="text/css">
    #mc_embed_signup{background:#fff; clear:left; }
</style>
    <section class="mc_embed_bar">
    <div class="container" id="mc_embed_signup" style="background-color: #F5F5F5;overflow-y:hidden;">
            <form action="https://climatefeedback.us9.list-manage.com/subscribe/post?u=e33d7323df2327db90438153a&amp;id=079e302eed" method="post" 
                  id="mc-embedded-subscribe-form" 
                  name="mc-embedded-subscribe-form" 
                  class="validate overflow-hidden" 
                  target="_blank" style="padding:5px;" novalidate>
    <div class="row">
      <div class="col-sm-12 call-to-action">
        <div class="media-left">
            <img
          class="sci-fig" style="padding-bottom: 2.0em;"
          src="<?php echo get_site_url(); ?>/wp-content/uploads/icons/paper-plane-xxl.png"
            >
        </div>
        <div class="media-body">
          <div
        class="col lg-col-4 feeds__sign-up__inputs"
        id="mc_embed_signup_scroll"
      >
              <h3 style="font-size: 21px;">Get scientists’ reviews delivered directly to your inbox</h3>
              </div>
          <div
        class="col lg-col-4 feeds__sign-up__inputs"
        id="mc_embed_signup_scroll"
      >
         <div style="width:110%;">
           <input
            class="feeds__sign-up__inputs__input mb1"
            type="email"
            value=""
            name="EMAIL"
            class="email"
            id="mce-EMAIL"
            placeholder="enter your email address"
            required
          >
             <div class="feeds__sign-up__button">
              <input
               class="button feeds-submit feeds__sign-up__inputs__input feeds__sign-up__inputs__input__button forceblue"
               type="submit"
               value="Sign Up"
               name="subscribe"
               id="mc-embedded-subscribe"
             >
           </div>
         </div>
         <div style="position: absolute; left: -5000px;" aria-hidden="true">
           <input type="text" name="b_e33d7323df2327db90438153a_e4773425e1" tabindex="-1" value="">
        </div>
       </div>
        </div>
      </div>
    </div>
  </div>

        </section>
<!--End mc_embed_signup-->

<div class="container">
<?php
//Extract ID from category name
    $theCatId2 = get_term_by( 'slug', 'featured', 'category' );
    $theCatId2 = $theCatId2->term_id;
  $args = array(
    'post_type' => array('claimreview'),
    'cat' => $theCatId2,
    'posts_per_page' => 2
  );
  $loop = new WP_Query( $args );
?>
<div class="feeds-container feeds-container__claim ">
    <div class="feeds-title h3">Latest Claim Reviews</div>
  <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <a href="<?php echo get_permalink( get_the_ID() ); ?>" >
      <div class="feed feed__claim col col-lg-6 mb1">
        <div class="feed__claim__container relative">
          <div class="feed__claim__container__illustration col col-4">
            <div class="feed__claim__container__illustration__screenshot">
              <img
                class="feed__claim__container__illustration__screenshot__img"
                src="<?php echo get_post_meta( get_the_ID(), 'screenshot', true)?>"
              >
            </div>
          </div>
          <div class="feed__claim__container__content col col-8">
            <img
              class="feed__claim__container__content__verdict__img mb1"
              src="<?php echo get_site_url(); ?>/wp-content/uploads/tags/HTag_<?php echo get_post_meta( get_the_ID(), 'verdict', true)?>.png"
            >
            <div class="feed-excerpt feed__claim__container__content__text mb1">
              "<?php echo get_post_meta( get_the_ID(), 'claimshort', true); ?>"
            </div>
            <div class="feed__claim__container__content__outlet">
              <?php echo get_post_meta( get_the_ID(), 'author', true); ?>, <?php echo get_post_meta( get_the_ID(), 'outlet', true); ?>
            </div>
          </div>
        </div>
      </div>
    </a>
  <?php endwhile; ?>
</div>
<div class="feeds-more mb1 p1">
  <a
    class="feeds-more__link h4 p1"
    href="<?php echo get_site_url(); ?>/claim-reviews/"
  >
    More Claim Reviews
  </a>
</div>


</div><!-- / .container -->

        
        <div class="container"><!-- / RSS -->
<h2><?php _e( 'Recent articles from Health Feedback:', 'my-text-domain' ); ?></h2>

            <?php // Get RSS Feed(s)
include_once( ABSPATH . WPINC . '/feed.php' );
 
// Get a SimplePie feed object from the specified feed source.
$rss = fetch_feed( 'http://healthfeedback.org/feed/' );
 
if ( ! is_wp_error( $rss ) ) : 
    $maxitems = $rss->get_item_quantity( 4 ); 
    $rss_items = $rss->get_items( 0, $maxitems );
endif;
?>
 
<ul>
    <?php if ( $maxitems == 0 ) : ?>
        <li><?php _e( 'No items', 'my-text-domain' ); ?></li>
    <?php else : ?>
        <?php foreach ( $rss_items as $item ) : ?>
            <li>
                <a href="<?php echo esc_url( $item->get_permalink() ); ?>"
                    title="<?php printf( __( 'Posted %s', 'my-text-domain' ), $item->get_date('j F Y | g:i a') ); ?>">
                    <?php echo esc_html( $item->get_title() ); ?> 
                </a><br />
                <?php echo  $item->get_description() ; ?>
                <?php echo  $item->get_date('j F Y') ; ?>
                <?php echo esc_url( $item->get_permalink() ); ?>
                <br />
                <?php 
                $graph = OpenGraph::fetch( $item->get_permalink() );
//print_r($graph);
                foreach ($graph as $key => $value) {
                  //echo htmlspecialchars("$key: ");
                    if ($key == 'image'){
                        $imgurl = $value;
                    }
                }
                ?>
                <img src="<?php echo $imgurl; ?>" width="400px" />
                
            </li>
        <?php endforeach; ?>
    <?php endif; ?>
</ul>
            
            
<h2><?php _e( 'Recent articles from Climate Feedback:', 'my-text-domain' ); ?></h2>

            <?php // Get RSS Feed(s)
include_once( ABSPATH . WPINC . '/feed.php' );
 
// Get a SimplePie feed object from the specified feed source.
$rss = fetch_feed( 'http://www.rssmix.com/u/8311644/rss.xml' );
 
if ( ! is_wp_error( $rss ) ) : 
    $maxitems = $rss->get_item_quantity( 4 ); 
    $rss_items = $rss->get_items( 0, $maxitems );
endif;
?>
 
<ul>
    <?php if ( $maxitems == 0 ) : ?>
        <li><?php _e( 'No items', 'my-text-domain' ); ?></li>
    <?php else : ?>
        <?php foreach ( $rss_items as $item ) : ?>
            <li>
                <a href="<?php echo esc_url( $item->get_permalink() ); ?>"
                    title="<?php printf( __( 'Posted %s', 'my-text-domain' ), $item->get_date('j F Y | g:i a') ); ?>">
                    <?php echo esc_html( $item->get_title() ); ?> 
                </a><br />
                <?php echo  $item->get_description() ; ?>
                <?php echo  $item->get_date('j F Y') ; ?>
                <?php echo esc_url( $item->get_permalink() ); ?>
                <br />
                <?php 
                $graph = OpenGraph::fetch( $item->get_permalink() );
//print_r($graph);
                foreach ($graph as $key => $value) {
                  //echo htmlspecialchars("$key: ");
                    if ($key == 'image'){
                        $imgurl = $value;
                    }
                }
                ?>
                <img src="<?php echo $imgurl; ?>" width="400px" />
                
            </li>
        <?php endforeach; ?>
    <?php endif; ?>
</ul>        
            
        </div><!-- / .container RSS     -->

        
<section class="scientist-signup">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 call-to-action">
        <div class="media-left">
          <img alt="" class="sci-fig" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/scientists-logo2.png">
        </div>
        <div class="media-body">
          <h3 style="font-size: 21px;">Scientists, you can help create a better informed society. Become a reviewer today!</h3>
          <p> See <a class="wht" href="/community/">who is already contributing</a>.</p>
          <a href="/for-scientists/" class="btn btn-primary btn-lg">Apply here</a>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="container">
<div class="feeds-title h3">Insights</div>
<?php
    //Extract ID from category name
    $theCatId = get_term_by( 'slug', 'insight', 'category' );
    $theCatId = $theCatId->term_id;
  $args = array(
    'post_type' => array('post'),
    // 'category_name' => array('insights'),
    'cat' => $theCatId,
    //'cat' => array('-claimreview', '-evaluation'),
    'posts_per_page' => 2
  );
  $loop = new WP_Query( $args );
?>
<div class="feeds-container mr3 p1">
  <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <a class="col col-lg-6" href="<?php echo get_permalink( get_the_ID() ); ?>" >
      <div class='feed feed__perspective mb1 p2'>
        <div class='feed__perspective__screenshot mb1'>
          <img
            class='feed__perspective__screenshot__img'
            src="<?php echo simplexml_load_string(get_the_post_thumbnail())->attributes()->src;?>"
          >
        </div>
        <div class='feed-title h3'>
          <?php echo get_the_title(); ?>
        </div>
        <div class='feed-excerpt mb1'>
          <?php echo get_trim_text(get_the_excerpt());?>
        </div>
        <div>
          - <?php echo get_the_date( 'd M Y' ); ?>
        </div>
      </div>
    </a>
  <?php endwhile; ?>
</div>
<div class="feeds-more p1 mb3">
  <a
    class="feeds-more__link h4 p1"
    href="<?php echo get_site_url(); ?>/insights/"
  >
    More Insights
  </a>
</div>


</div><!-- / .container -->