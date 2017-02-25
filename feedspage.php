<?php
/*
Template Name: FeedsPage
*/
?>

<h2>Latest Article Reviews</h2>
<?php
  $args = array(
    'post_type' => array('evaluation'),
    'posts_per_page' => 3
  );
  $loop = new WP_Query( $args );
?>
<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
  <div class='feeds__articles mb3'>
    <div class='flex' />
      <div class="feeds__articles__screenshot">
        <img
          class="feeds__articles__screenshot"
          src="<?php echo get_post_meta( get_the_ID(), 'screenshot', true)?>"
        />
      </div>
      <div class="feeds__articles__evaluation">
        <img
          class="feeds__articles__screenshot"
          src="<?php echo types_render_field( 'front-image', array('output' => 'raw'))?>"
        />
      </div>
    </div>
  </div>
<?php endwhile; ?>


<h2>Latest Claim Reviews</h2>
<?php
  $args = array(
    'post_type' => array('claimreview'),
    'posts_per_page' => 3
  );
  $loop = new WP_Query( $args );
?>
<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
  <div>
    <img
      class="fact-check-card__row__verdict__img"
      src="<?php echo get_site_url(); ?>/wp-content/uploads/tags/TagH_<?php echo get_post_meta( get_the_ID(), 'verdict', true)?>.png"
    >
  </div>
<?php endwhile; ?>

<h2>Perspectives</h2>
<?php
  $args = array(
    'post_type' => array( 'perspectives'),
    'posts_per_page' => 3
  );
  $loop = new WP_Query( $args );
?>
<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
<?php endwhile; ?>
