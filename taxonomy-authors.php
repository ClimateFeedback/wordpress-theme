<?php
/*
Template Name: Archives
*/
 ?>

<div id="container">
	<div id="content" role="main">

        <?php 
$taxonomy = get_queried_object();
        ?>
        <div class="page-header myfull">
          <h2  style="color:#000"> . </h2> 
      </div>
        <h2>Reviews of articles by: <?php single_tag_title(); ?></h2> 
        
        
<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <!-- <?php get_search_form(); ?> -->
<?php endif; ?>

                <!-- ARTICLE REVIEWS Listing -->
        <?php
    $args = array( 'post_type' => 'evaluation' , 'authors' => $taxonomy->slug ) ; 
    $loop = new WP_Query( $args );
        ?>
        
        <?php if ($loop->have_posts()) :?>
        <?php
    echo '<p class="spaceup"></p><div class="row"><section class="separator"><h3 class="inseparator"> ARTICLE REVIEWS </h3> </section></div>';
    while ($loop->have_posts() ) : $loop->the_post(); 
    get_template_part('templates/loop-feedbacks', get_post_type()); 
    endwhile; 
        ?>
        <?php endif; ?>
        
<?php the_posts_navigation(); ?>

		 <?php wp_reset_query(); ?>

                <!-- CLAIM REVIEWS Listing -->
        <?php
    $args = array( 'post_type' => 'claimreview' , 'authors' => $taxonomy->slug ) ; 
    $loop = new WP_Query( $args );
        ?>

        <?php if ($loop->have_posts()) :?>
        <?php
    echo '<p class="spaceup"></p><div class="row"><section class="separator"><h3 class="inseparator"> CLAIM REVIEWS </h3> </section></div>';
    while ($loop->have_posts() ) : $loop->the_post(); 
    get_template_part('templates/loop-claimreviews'); 
    endwhile; 
        ?>
        <?php endif; ?>
        
<?php the_posts_navigation(); ?>
        
	</div><!-- #content -->
</div><!-- #container -->
