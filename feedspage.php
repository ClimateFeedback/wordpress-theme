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
  <div>
    <?php echo get_permalink( get_the_ID() ) ?>
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
