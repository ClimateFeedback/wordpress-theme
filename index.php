<?php get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

<?php
    $args = array( 'post_type' => array( 'post', 'press' ));
    $loop = new WP_Query( $args );
?>

<?php while ($loop->have_posts() ) : $loop->the_post(); ?>
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

<?php the_posts_navigation(); ?>
