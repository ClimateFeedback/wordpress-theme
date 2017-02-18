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
        
        <?php 
$url = $_SERVER["REQUEST_URI"];

$isItAcc = strpos($url, 'accurate');
$isItIns = strpos($url, 'insightful');

        ?>
        
        
      <div class="page-header myfull">
          <h2  style="color:#000"> . </h2> 
      </div>
      <h2>Articles tagged as: <?php single_tag_title(); ?> <span class="infobox small"><span class="infolink"></span><span class="infoboxtext small"><a target="_blank" href="http://climatefeedback.org/process/#definition">definition</a></span></span>
      </h2> 
        
<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <!-- <?php get_search_form(); ?> -->
        
<?php endif; ?>

  <?php
    $args = array( 'post_type' => 'evaluation' , 'article-tag' => $taxonomy->slug ) ; 
    $loop = new WP_Query( $args );
  ?>

<?php while ($loop->have_posts() ) : $loop->the_post(); ?>
  
        <?php get_template_part('templates/loop-feedbacks'); ?>
	
<?php endwhile; ?>

<?php the_posts_navigation(); ?>

		

	</div><!-- #content -->
</div><!-- #container -->
