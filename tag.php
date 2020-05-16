<?php
/*
Template Name: Tag page
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
    $excerpt = substr($excerpt, 0, $excerptlen-1);
  return $excerpt;
}?>

<div id="container">
	<div id="content" role="main">


     <?php 
$taxonomy = get_queried_object();
        ?>
        <div class="page-header myfull">
          <h2  style="color:#000"> . </h2> 
        </div>
        <h2>Articles tagged with: <?php single_tag_title(); ?></h2>  
      
        
        
                               <!-- ARTICLE REVIEWS Listing -->
  <?php
    $args = array( 'post_type' => 'evaluation' , 'tag' => $taxonomy->slug ) ; 
    $loop = new WP_Query( $args );
  ?>
        
        <?php if ($loop->have_posts()) :?>
        <?php
    echo '<p class="spaceup"></p><div class="row"><section class="separator"><h3 class="inseparator"> ARTICLE REVIEWS </h3> </section></div>';
    while ($loop->have_posts() ) : $loop->the_post(); 
    get_template_part('templates/loop-feedbacks-noex', get_post_type()); 
    endwhile; 
        ?>
        <?php endif; ?>

        <?php wp_reset_query(); ?>
        
                        <!-- CLAIM REVIEWS Listing -->
  <?php
    $args = array( 'post_type' => 'claimreview' , 'tag' => $taxonomy->slug ) ; 
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

        <?php wp_reset_query(); ?>

                        <!-- INSIGHTS Listing -->
        <?php
    $theCatId = get_term_by( 'slug', 'insight', 'category' );
    $theCatId = $theCatId->term_id;
    $args = array(
    'post_type' => array('post'),
    'cat' => $theCatId,
    'tag' => $taxonomy->slug,
    'posts_per_page' => 10
  );
  $loop = new WP_Query( $args );
?>
        
        <?php if ($loop->have_posts()) :?>
        <?php
    echo '<p class="spaceup"></p><div class="row"><section class="separator"><h3 class="inseparator"> INSIGHTS </h3> </section></div>';
    while ($loop->have_posts() ) : $loop->the_post(); 
    get_template_part('templates/loop-insights'); 
    endwhile; 
        ?>
        <?php endif; ?>
        
<?php the_posts_navigation(); ?> 
        

<?php the_posts_navigation(); ?>

		

	</div><!-- #content -->
</div><!-- #container -->
