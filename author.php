<?php
/*
Template Name: Archives
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
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
        ?>
        <div class="page-header myfull">
          <h2  style="color:#000"> . </h2> 
      </div>
        <p class="spaceup"></p> 
        
         <div class="row">
          <div class="med-left expert">
            <?php echo get_avatar( $curauth->get('ID'), $size = '256', $default = '<path_to_url>' ); ?>
              
          </div>
          <div class="med-body">
            <h2 class="noborder"> <a style="text-decoration: none;"><?php echo esc_html( $curauth->first_name ); ?> <?php echo esc_html( $curauth->last_name ); ?> </a> </h2>
            <p><b><?php echo esc_html( $curauth->title ); ?></b></p>
            <p><?php the_author_description(); ?></p>
            <p><small><a href="https://sciencefeedback.co/team-advisors-contributors/">The Science Feedback team</a></small></p>
          </div>
        </div>
        
        


                         <!-- ARTICLE REVIEWS Listing -->
  <?php
    $args = array( 'post_type' => 'evaluation' , 'author' => $curauth->ID ) ; 
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
    $args = array( 'post_type' => 'claimreview' , 'author' => $curauth->ID ) ; 
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
    'author' => $curauth->ID,
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
       
        
	</div><!-- #content -->
</div><!-- #container -->
