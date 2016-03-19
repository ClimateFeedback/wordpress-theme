<?php
/*
Template Name: Tag page
*/
 ?>

<div id="container">
	<div id="content" role="main">


     <?php 
$taxonomy = get_queried_object();
        ?>
        
        <p>Tag: <?php single_tag_title(); ?></p>
        
  <?php
    $args = array( 'post_type' => 'evaluation' , 'tag' => $taxonomy->slug ) ; 
    $loop = new WP_Query( $args );
?>
    

<?php while ($loop->have_posts() ) : $loop->the_post(); ?>
  
  <div class="row">
        <div class="media-left hidden-xs">
            <a class="frontpagepostpic" href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail() ?>
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
