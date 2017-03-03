<?php
/*
Template Name: FeedsPage
*/
?>

<?php function get_trim_text ($string) {
  $maxlen = 180;
  $excerpt = $string;
  $excerptlen = strlen($excerpt);
  if ($excerptlen > $maxlen) {
    $excerpt = substr($excerpt, 0, $maxlen).'...';
    $excerptlen = $maxlen + 3;
  }
  if ($excerpt[0] == '"')
    $excerpt = substr($excerpt, 1, $excerptlen-1);
  return $excerpt;
}?>

<div class="sigla feeds-hero">
  <div class="container">
    <div class="row feeds-hero__row">
      <h3 class="tagline half-black">A Scientific Reference to Reliable Information on Climate Change</h3>
    </div>
  </div>
</div>
<div class="feeds-aim p3 overflow-hidden">
  <img
    class="feeds-aim__img col col-2 p2"
    src="<?php echo get_site_url(); ?>/wp-content/uploads/2017/02/cf_photoicons_logo.png"
  >
  <p class="feeds-aim__text col col-10 p2">
    We aim to help Internet users - from the general public to key policymakers -
    distinguish inacuurate climate change narratives from scientifically sound
    and trustworthy information web.
  </p>
</div>

<div class="feeds-title h3">Latest Article Reviews</div>
<?php
  $args = array(
    'post_type' => array('evaluation'),
    'posts_per_page' => 3
  );
  $loop = new WP_Query( $args );
?>
<div class="feeds-container p2">
  <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <?php if( $loop->current_post == 0 && !is_paged() ) : ?>
      <a href="<?php echo get_permalink( get_the_ID() ); ?>" >
        <div class='feed feed__article mb1 p2'>
          <div class='feed__article-first__screenshot col col-lg-8'>
            <img
              class='feed__article-first__screenshot__img'
              src="<?php echo simplexml_load_string(get_the_post_thumbnail())->attributes()->src;?>"
            >
          </div>
          <div class="feed__article-first__text col col-lg-4">
            <div class='h3'>
              <?php echo get_the_title(); ?>
            </div>
            <div class='feed-outlet h3'>
              <?php echo get_post_meta( get_the_ID(), 'outlet', true); ?>
            </div>
            <div class='feed-excerpt mb1'>
              <?php echo get_trim_text(get_the_excerpt());?>
            </div>
            <div>
              - <?php echo get_post_meta( get_the_ID(), 'date', true); ?>
            </div>
          </div>
        </div>
      </a>
    <?php else : ?>
      <a class="col col-lg-6" href="<?php echo get_permalink( get_the_ID() ); ?>" >
        <div class='feed feed__article mb1 p2'>
          <div class='feed__article-next__screenshot mb1'>
            <img
              class='feed__article-next__screenshot__img'
              src="<?php echo simplexml_load_string(get_the_post_thumbnail())->attributes()->src;?>"
            >
          </div>
          <div class='h3'>
            <?php echo get_the_title(); ?>
          </div>
          <div class='feed-outlet h3'>
            <?php echo get_post_meta( get_the_ID(), 'outlet', true); ?>
          </div>
          <div class='feed-excerpt mb1'>
            <?php echo get_trim_text(get_the_excerpt());?>
          </div>
          <div>
            - <?php echo get_post_meta( get_the_ID(), 'date', true); ?>
          </div>
        </div>
      </a>
    <?php endif; ?>
  <?php endwhile; ?>
</div>
<div class="feeds-more mb1 p1">
  <a
    class="feeds-more__link h4 p1"
    href="<?php echo get_site_url(); ?>/evaluations"
  >
    More Article Reviews
  </a>
</div>

<!-- Begin MailChimp Signup Form -->
<link href="//cdn-images.mailchimp.com/embedcode/slim-10_7.css" rel="stylesheet" type="text/css">
<style type="text/css">
    #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
    /* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
       We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>
<div id="mc_embed_signup" style="background-color: #F5F5F5;overflow-y:hidden;">
  <form action="//climatefeedback.us9.list-manage.com/subscribe/post?u=e33d7323df2327db90438153a&amp;id=e4773425e1"
    method="post" id="mc-embedded-subscribe-form"
    name="mc-embedded-subscribe-form"
    class="validate overflow-hidden"
    target="_blank"
    style="padding:5px;"
  novalidate>
    <div class="overflow-hidden p2">
      <div class="feeds__sign-up__icon col col-md-2 p2">
        <img
          src="<?php echo get_site_url(); ?>/wp-content/uploads/2017/02/paper-plane-xxl.png"
          style="width:60px;height:60px;"
        >
      </div>
      <div class="col col-md-6 p2" style="color:#424242;line-height:1.3px;">
        <label class="mt2 mb2" for="mce-EMAIL">Sign up for updates</label>
        <p>
          Help us create a better informed society. Join our community today!
        </p>
      </div>
       <div
        class="col col-md-4 feeds-inputs"
        id="mc_embed_signup_scroll"
      >
         <div style="width:100%;">
           <input type="email"
            value=""
            name="EMAIL"
            class="email"
            id="mce-EMAIL"
            placeholder="enter your email address"
            required
            style="width:300px;"
          >
           <input type="submit"
            value="Sign Up"
            name="subscribe"
            id="mc-embedded-subscribe"
            class="button feeds-submit"
            style="display:initial;width:300px;"
          >
         </div>
         <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
         <div style="position: absolute; left: -5000px;" aria-hidden="true">
           <input type="text" name="b_e33d7323df2327db90438153a_e4773425e1" tabindex="-1" value="">
        </div>
       </div>
     </div>
  </form>
</div>
<!--End mc_embed_signup-->

<div class="feeds-title h3">Latest Claim Reviews</div>
<?php
  $args = array(
    'post_type' => array('claimreview'),
    'posts_per_page' => 2
  );
  $loop = new WP_Query( $args );
?>
<div class="feeds-container mb1 p2">
  <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <a href="<?php echo get_permalink( get_the_ID() ); ?>" >
      <div class="feed feed__claim col col-lg-6 mb1">
        <div class="feed__claim__container relative p1">
          <div class="feed__claim__container__illustration col col-md-4 p2">
            <div class="mb2">
              <img
                class="feed__claim__container__illustration__verdict__img"
                src="<?php echo get_site_url(); ?>/wp-content/uploads/tags/TagH_<?php echo get_post_meta( get_the_ID(), 'verdict', true)?>.png"
              >
            </div>
            <div>
              <img
                class="feed__claim__container__illustration__screenshot__img"
                src="<?php echo get_post_meta( get_the_ID(), 'screenshot', true)?>"
              >
            </div>
          </div>
          <div class="feed__claim__container__text col col-md-8 p2">
            <div class="feed-excerpt mb1">
              "<?php echo get_post_meta( get_the_ID(), 'claimfull', true); ?>"
            </div>
            <div class="feed__claim__container__text__outlet h4">
              <?php echo get_post_meta( get_the_ID(), 'outlet', true); ?>
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
    href="<?php echo get_site_url(); ?>/claim-reviews"
  >
    More Claim Reviews
  </a>
</div>

<div class="feeds-title h3">Insights</div>
<?php
  $args = array(
    'post_type' => array('post'),
    'cat' => array('-claimreview', '-evaluation'),
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
        <div class='mb1 h3'>
          <?php echo get_the_title(); ?>
        </div>
        <div class='feed-excerpt mb1'>
          <?php echo get_trim_text(get_the_excerpt());?>
        </div>
        <div>
          - <?php the_date(); ?>
        </div>
      </div>
    </a>
  <?php endwhile; ?>
</div>
<div class="feeds-more p1 mb3">
  <a
    class="feeds-more__link h4 p1"
    href="<?php echo get_site_url(); ?>/blog-posts"
  >
    More Insights
  </a>
</div>
