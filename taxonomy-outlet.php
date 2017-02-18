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
        <h2>Reviews of articles from: <?php single_tag_title(); ?></h2> 
        
        
<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <!-- <?php get_search_form(); ?> -->
        
<?php endif; ?>

  <?php
    $args = array( 'post_type' => 'evaluation' , 'outlet' => $taxonomy->slug ) ; 
    $loop = new WP_Query( $args );
?>

<?php while ($loop->have_posts() ) : $loop->the_post(); ?>

    <?php get_template_part('templates/loop-feedbacks'); ?>

<?php endwhile; ?>

<?php the_posts_navigation(); ?>

		

	</div><!-- #content -->
</div><!-- #container -->
