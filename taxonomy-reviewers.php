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
        <p class="spaceup"></p> 
     
        
        <?php 
$usrname = single_tag_title("", false);
// echo $usrname;
            // $rev = get_users( array( 'search' => $taxonomy->slug  ) );
            $rev = get_users( array( 'search' => $usrname  ) );
// echo $rev;
$output = '';
foreach ( $rev as $usr ) {   
  
    $output .='<div class="row expert">
          <div class="med-left">
            '.get_avatar( $usr->get('ID'), $size = '256', $default = '<path_to_url>' ).'
          </div>
          <div class="med-body">
            <h2 class="noborder"> '.esc_html( $usr->first_name ).' '.esc_html( $usr->last_name ).' </h2>
            <p>'.esc_html( $usr->title ).'</p>
            <p>'.esc_html( $usr->affiliation ).'</p>
            <p><small>Expertise:</small> '.esc_html( $usr->expertise ).'</p>
            
          </div>
        </div>
        <p class="spaceup"></p>
        <div class="row"><section class="separator"><h3 class="inseparator"> DETAILS </h3> </section>
        <p class="spaceup1"><i class="fa fa-link" aria-hidden="true" style="font-size: 1.5em;"></i><a target="_blank" href="'.esc_html($usr->user_url).'">&nbsp; Website</a>
        </p>
        <p>
        <p><img class="alignnone size-full wp-image-4610" src="http://climatefeedback.org/wp-content/uploads/2016/09/Hypothesis.png" alt="hypothesis" width="25" align="left" /> &nbsp; Hypothesis handle: <a target="_blank" href="https://hypothes.is/stream?q=user:'.esc_html( $usr->hypothesis ).'" class="">'.esc_html( $usr->hypothesis ).'</a></p>
        <h4 style="padding-top: 20px; margin-bottom: 0px;">Expertise</h4>
        <p class="spaceup1"><img class="alignnone size-full wp-image-4610" src="http://climatefeedback.org/wp-content/uploads/2016/09/scientist_black_w_m.png" alt="xp" width="25" align="left" /> &nbsp; '.esc_html( $usr->expertise ).'</p>
        </div>';

    echo $output;
    
} 
        ?>
        
        
<?php if (!have_posts()) : ?>
  <!-- 
    <div class="alert alert-warning">
        <?php _e('Sorry, no results were found.', 'sage'); ?>
    </div>
  -->
  <!-- <?php get_search_form(); ?> 
        
<?php endif; ?>

  <?php
    $args = array( 'post_type' => 'evaluation' , 'reviewers' => $taxonomy->slug ) ; 
    $loop = new WP_Query( $args );
?>

<?php 
echo '<p class="spaceup"></p><div class="row"><section class="separator"><h3 class="inseparator"> ARTICLE REVIEWS </h3> </section></div>';
?>

<?php while ($loop->have_posts() ) : $loop->the_post(); ?>
  
  <div class="row">

      <div class="media-left hidden-xs">
                <a class="postpic" href=" <?php the_permalink(); ?>  ">
                    <?php echo types_render_field( "front-image", array( "width" => "275", "height" => "176", "proportional" => "true" ) ); ?>
                </a>
            </div>
      
        <div class="media-body">
            <a class="strong" href="<?php the_permalink(); ?>">
               <h3 class="noborder"> <?php the_title(); ?></h3></a>
              </a>
              <p class="small">
                <h4 class="noborder"><?php echo get_the_date( 'Y-m-d' ); ?></h4>
            <?php the_excerpt(); ?></p>
        </div>
    </div>
	
	<hr/>
<?php endwhile; ?>

<?php the_posts_navigation(); ?>

		

	</div><!-- #content -->
</div><!-- #container -->
