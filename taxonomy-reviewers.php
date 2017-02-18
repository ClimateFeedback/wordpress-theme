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
            <p><img class="alignnone size-full wp-image-4610" src="http://climatefeedback.org/wp-content/uploads/2016/09/Hypothesis.png" alt="hypothesis" width="25" align="left" /> &nbsp; Hypothesis handle: <a target="_blank" href="https://hypothes.is/stream?q=user:<?php echo esc_html( $usr->hypothesis ); ?>" class=""><?php echo esc_html( $usr->hypothesis ); ?></a>
            </p>
              <?php
                 $var = $usr->publicationone;
                 $pub2 = $usr->publicationtwo;
                 $pub3 = $usr->publicationthree;
                 if (!empty($var)) {                 
                    echo '<h4 class="spaceup1">Qualifying publication(s):</h4>
                    <p><img class="alignnone size-full wp-image-4610" src="http://climatefeedback.org/wp-content/uploads/icons/publi_black_w.png" alt="publication" width="20" align="left" /> &nbsp; <a target="_blank" href="'.esc_html( $usr->publicationone ).'">'. esc_html( $usr->publicationone ) .'</a>
                    </p> ';
                 }
                 if (!empty($pub2)) {
                        echo '<p><img class="alignnone size-full wp-image-4610" src="http://climatefeedback.org/wp-content/uploads/icons/publi_black_w.png" alt="publication" width="20" align="left" /> &nbsp; <a target="_blank" href="'.esc_html( $usr->publicationtwo ).'">'. esc_html( $usr->publicationtwo ) .'</a>
                    </p> ';
                 }
                 if (!empty($pub2)) {
                        echo '<p><img class="alignnone size-full wp-image-4610" src="http://climatefeedback.org/wp-content/uploads/icons/publi_black_w.png" alt="publication" width="20" align="left" /> &nbsp; <a target="_blank" href="'.esc_html( $usr->publicationthree ).'">'. esc_html( $usr->publicationthree ) .'</a>
                    </p> ';
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
                <h4 class="noborder"><span style="font-weight:normal; font-size-adjust: 0.5;">in</span> <?php echo get_post_meta( get_the_ID(), 'outlet', true ); ?>, <span style="font-weight:normal; font-size-adjust: 0.5;">by</span> <?php echo get_post_meta( get_the_ID(), 'author', true ); ?></h4>
                <p class="small">
                    <span> <?php echo get_post_meta( get_the_ID(), 'date', true ); ?> </span>
                </p>
            <?php the_excerpt(); ?></p>
        </div>
    </div>
	
	<hr/>
<?php endwhile; ?>

<?php the_posts_navigation(); ?>

		

	</div><!-- #content -->
</div><!-- #container -->
