<?php
/*
Template Name: FeedsPage
*/
?>

<h2>Latest Article Reviews</h2>
<?php
  $args = array(
    'post_type' => array('evaluation'),
    'posts_per_page' => 2
  );
  $loop = new WP_Query( $args );
?>
<div class="feeds mb1 p2">
  <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <a class="col col-lg-6" href="<?php echo get_permalink( get_the_ID() ); ?>" >
      <div class='feed feed__article mb1 p2'>
        <div class='feed__article__screenshot mb1'>
          <?php echo the_post_thumbnail('medium'); ?>
        </div>
        <div class='mb2 h3'>
          <?php echo get_the_title(); ?>
        </div>
        <div class='feed-outlet mb1 h3'>
          <?php echo get_post_meta( get_the_ID(), 'outlet', true); ?>
        </div>
        <div class='mb1'>
          <?php echo get_the_excerpt(); ?>
        </div>
        <div class='mb1'>
          - <?php echo get_post_meta( get_the_ID(), 'date', true); ?>
        </div>
      </div>
    </a>
  <?php endwhile; ?>
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
          <div class="feed-outlet mb1">
            "<?php echo get_post_meta( get_the_ID(), 'claimfull', true); ?>"
          </div>
          <div>
            <div class="col col-7 feed-outlet h3">
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
        <div class='mb1'>
          <?php echo the_post_thumbnail('medium'); ?>
        </div>
        <div class='mb1 h3'>
          <?php echo get_the_title(); ?>
        </div>
        <div class='mb1'>
          <?php echo get_the_excerpt(); ?>
        </div>
        <div>
          - <?php the_date(); ?>
        </div>
      </div>
    </a>
  <?php endwhile; ?>
</div>
