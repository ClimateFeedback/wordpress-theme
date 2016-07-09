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
        <!-- <h2>Articles reviewed by: <?php single_tag_title(); ?></h2>  -->
     
        
        <?php 
            $usrname = single_tag_title("", false);
            $rev = get_users( array( 'search' => $usrname  ) );
            $output = '';
            foreach ( $rev as $usr ) {
              $usermeta = get_user_meta($usr->get('ID'));
               
              $output .= 
                '<div class="row">
                  <div class="media">
                    <div class="media-left">'
                      .get_avatar( $usr->get('ID'), $size = '256', $default = '<path_to_url>' )
                    .'</div>'
                  .'<div class="media-body">'
                    .'<h2 class="media-heading">
                      <a target="_blank" href="'.esc_html($usr->user_url).'">'.esc_html( $usr->first_name ).' '.esc_html( $usr->last_name )
                    .'</a></h2>'

                    .'<h3>'.esc_html( $usr->title ).', '.esc_html( $usr->affiliation ).'</h3>'
               // .'</div></div>'
                    .'</div>'

               // .'<div class="row">'
               // .'<div class="col-lg-12>'
               .'<h3>Details</h3>'
               .'<p><a href="'.esc_html( $usr->user_url ).'">Website</a></p>'
               .'<p>Hypothes.is handle: '.esc_html( $usermeta['hypothesis'][0] ).'</p>'
               
               .'<p><a href="'.esc_html( $usermeta['orcid'][0] ).'">Orcid</a></p>'

               .'<h3>Expertise</h3>'
               .'<p>'.esc_html( $usermeta['expertise'][0] ).'</p>'

               .'<h3>Qualifying articles</h3>'
               .'<p>'.esc_html( $usermeta['publicationone'][0] ).'</p>'
               .'<p>'.esc_html( $usermeta['publicationtwo'][0] ).'</p>'
               .'</div>'
               .'</div>';
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
