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
        <h2>Articles reviewed by: <?php single_tag_title(); ?></h2> 
     
        
        <?php 
$usrname = single_tag_title("", false);
// echo $usrname;
            // $rev = get_users( array( 'search' => $taxonomy->slug  ) );
            $rev = get_users( array( 'search' => $usrname  ) );
// echo $rev;
$output = '';
foreach ( $rev as $usr ) {   
     $output .= get_avatar( $usr->get('ID'), $size = '256', $default = '<path_to_url>' ).' <a target="_blank" href="'.esc_html($usr->user_url).'">'.esc_html( $usr->first_name ).' '.esc_html( $usr->last_name ).'</a>, '.esc_html( $usr->title ).', '.esc_html( $usr->affiliation ).'';
    echo $output;
} 
        ?>
        
        
<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'sage'); ?>
  </div>
  <!-- <?php get_search_form(); ?> -->
        
<?php endif; ?>

  <?php
    $args = array( 'post_type' => 'evaluation' , 'reviewers' => $taxonomy->slug ) ; 
    $loop = new WP_Query( $args );
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
