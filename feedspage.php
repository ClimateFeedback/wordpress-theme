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

<h2>Latest Article Reviews</h2>
<?php
  $args = array(
    'post_type' => array('evaluation'),
    'posts_per_page' => 3
  );
  $loop = new WP_Query( $args );
?>
<div class="feeds p2">
  <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <?php if( $loop->current_post == 0 && !is_paged() ) : ?>
      <a href="<?php echo get_permalink( get_the_ID() ); ?>" >
        <div class='feed feed__article mb1 p2'>
          <div class='feed__article-first__screenshot col col-7 p3'>
            <?php echo the_post_thumbnail(array(400, 300)); ?>
          </div>
          <div class="col col-5">
            <div class='h3'>
              <?php echo get_the_title(); ?>
            </div>
            <div class='feed-outlet h4'>
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
          <div class='feed__article__screenshot mb1'>
            <?php echo the_post_thumbnail(array(325, 300)); ?>
          </div>
          <div class='h3'>
            <?php echo get_the_title(); ?>
          </div>
          <div class='feed-outlet h4'>
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
<div class="feed-more mb1 p1">
  <a
    class="h3"
    href="<?php echo get_site_url(); ?>/evaluations"
  >
    > More Article Reviews
  </a>
</div>


<h2>Latest Claim Reviews</h2>
<?php
  $args = array(
    'post_type' => array('claimreview'),
    'posts_per_page' => 2
  );
  $loop = new WP_Query( $args );
?>
<div class="feeds mb1 p2">
  <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <a href="<?php echo get_permalink( get_the_ID() ); ?>" >
      <div class="feed feed__claim mb1 p2 mr1">
        <div class="col col-4">
          <img
            class="feed__claim__screenshot"
            src="<?php echo get_post_meta( get_the_ID(), 'screenshot', true)?>"
          >
        </div>
        <div class="col col-8">
          <div class="feed-excerpt mb1">
            "<?php echo get_post_meta( get_the_ID(), 'claimfull', true); ?>"
          </div>
          <div>
            <div class="feed-outlet col col-7 h4">
              <?php echo get_post_meta( get_the_ID(), 'outlet', true); ?>
            </div>
            <div class="col col-3">
              <img
                class="feed__claim__verdict"
                src="<?php echo get_site_url(); ?>/wp-content/uploads/tags/TagH_<?php echo get_post_meta( get_the_ID(), 'verdict', true)?>.png"
              >
            </div>
          </div>
        </div>
      </div>
    </a>
  <?php endwhile; ?>
</div>
<div class="feed-more mb1 p1">
  <a
    class="h3"
    href="<?php echo get_site_url(); ?>/claim-reviews"
  >
    > More Claim Reviews
  </a>
</div>

<h2>Perspectives</h2>
<?php
  $args = array(
    'post_type' => array('post'),
    'cat' => array('-claimreview', '-evaluation'),
    'posts_per_page' => 2
  );
  $loop = new WP_Query( $args );
?>
<div class="feeds mr3 p1">
  <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <a class="col col-lg-6" href="<?php echo get_permalink( get_the_ID() ); ?>" >
      <div class='feed feed__perspective mb1 p2'>
        <div class='feed__perspective__thumbnail mb1'>
          <?php echo the_post_thumbnail(array(325, 300)); ?>
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
<div class="feed-more p1">
  <a
    class="h3"
    href="<?php echo get_site_url(); ?>/blog-posts"
  >
    > More Perspectives
  </a>
</div>
