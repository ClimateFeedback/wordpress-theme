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
    $rev = get_users( array( 'search' => $usrname  ) );

//$output = '';
foreach ( $rev as $usr ) {   
  //  $output .=''
//        ;   
} 
        ?>

        <div class="row">
          <div class="med-left expert">
            <?php echo get_avatar( $usr->get('ID'), $size = '256', $default = '<path_to_url>' ); ?>
              
          </div>
          <div class="med-body">
            <h2 class="noborder"> <?php echo esc_html( $usr->first_name ); ?> <?php echo esc_html( $usr->last_name ); ?>  </h2>
            <p><?php echo esc_html( $usr->title ); ?>, <?php echo esc_html( $usr->affiliation ); ?></p>
            <p><small>Expertise:</small> <?php echo esc_html( $usr->expertise ); ?></p>
            <h4 class="spaceup">Details:</h4>
            <p> &nbsp;<i class="fa fa-globe fa-lg" style="color: grey;" aria-hidden="true"></i> &nbsp;<a target="_blank" href="<?php echo esc_html( $usr->user_url ); ?>">Website</a>
            </p>
            <?php if (!empty($usr->orchid)) {
                echo '<p>&nbsp;<img class="alignnone size-full wp-image-4610" src="http://climatefeedback.org/wp-content/uploads/icons/orcid.gif" alt="hypothesis" width="20" />&nbsp; <a target="_blank" href="https://orcid.org/'. esc_html( $usr->orchid ) .'">Orcid ID </a>
                </p>';
              } ?>
              <?php if (!empty($usr->hypothesis)) {
                echo '<p><img class="alignnone size-full wp-image-4610" src="http://climatefeedback.org/wp-content/uploads/2016/09/Hypothesis.png" alt="hypothesis" width="25" align="left" /> &nbsp; Hypothesis handle: <a target="_blank" href="https://hypothes.is/stream?q=user:'. esc_html( $usr->hypothesis ) .'" class="">'. esc_html( $usr->hypothesis ) .'</a>
                </p>';
              } ?>
              
              
              <?php $user_info = get_userdata(1);
              echo 'role: ' . implode(', ', $user_info->roles) . "\n";
                if (in_array('Scientist', $user_info->roles)) {
              
                  // echo 'its a scientist!';
                 $var = $usr->publicationone;
                 $pub2 = $usr->publicationtwo;
                 $pub3 = $usr->publicationthree;
                 if (!empty($var)) {                 
                     echo '<h4 class="spaceup1">Qualifying publication(s): <span class="infobox small"><span class="infolink"></span><span class="infoboxtext small" style="width:auto"><a href="http://climatefeedback.org/for-scientists/#ref">see criteria</a></span></span></h4>
                    <p><img class="alignnone size-full wp-image-4610" src="http://climatefeedback.org/wp-content/uploads/icons/publi_black_w.png" alt="publication" width="20" align="left" /> &nbsp; <a target="_blank" href="'.esc_html( $usr->publicationone ).'">'. substr( esc_html( $usr->publicationone ), 0, 50) .'</a>
                    </p> ';
                 }
                 if (!empty($pub2)) {
                        echo '<p><img class="alignnone size-full wp-image-4610" src="http://climatefeedback.org/wp-content/uploads/icons/publi_black_w.png" alt="publication" width="20" align="left" /> &nbsp; <a target="_blank" href="'.esc_html( $usr->publicationtwo ).'">'. substr( esc_html( $usr->publicationtwo ), 0, 50) .'</a>
                    </p> ';
                 }
                 if (!empty($pub3)) {
                        echo '<p><img class="alignnone size-full wp-image-4610" src="http://climatefeedback.org/wp-content/uploads/icons/publi_black_w.png" alt="publication" width="20" align="left" /> &nbsp; <a target="_blank" href="'.esc_html( $usr->publicationthree ).'">'. substr( esc_html( $usr->publicationthree ), 0, 50) .'</a>
                    </p> ';
                 }
               }
              ?>
          </div>
        </div>

                
<?php if (!have_posts()) : ?>
  &nbsp;
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
echo '<p class="spaceup"></p><div class="row"><section class="separator"><h3 class="inseparator"> ARTICLES REVIEWED </h3> </section></div>';
?>

<?php while ($loop->have_posts() ) : $loop->the_post(); ?>
        <?php get_template_part('templates/loop-feedbacks-noex', get_post_type()); ?>
<?php endwhile; ?>

        <!-- #content 
<?php the_posts_navigation(); ?>
        -->  
		

	</div><!-- #content -->
</div><!-- #container -->
