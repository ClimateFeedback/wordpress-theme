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
